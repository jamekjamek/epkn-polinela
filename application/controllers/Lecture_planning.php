<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_planning extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_planning_model', 'Plannings');
    $this->load->model('Lecture/Lecture_data_pkn_model', 'DataPkl');
    cek_login('Dosen');
    $this->redirecUrl = 'dosen/planning';
  }

  public function index($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Program',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data program',
      'dataPkl'      => $this->DataPkl->listnew($academic_year_id)->result(),
    ];
    $page = '/lecture/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function detail($id)
  {
    $decode         = decodeEncrypt($id);
    $planning       = $this->Plannings->list(['registration.group_id' => $decode])->row();
    if ($planning) {
      $plannings    = $this->Plannings->list(['registration.group_id' => $decode])->result();
      $data = [
        'title'     => 'Detail Data Program',
        'desc'      => 'Berfungsi untuk melihat detail data program',
        'planning'  => $planning,
        'plannings' => $plannings,
      ];
      $page = '/lecture/planning/detail';
      pageBackend($this->role, $page, $data);
    } else {
      $this->session->set_flashdata('error', 'Maaf data program belum tersedia');
      redirect($this->redirecUrl, 'refresh');
      if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
      }
    }
  }

  public function verification($id)
  {
    $approval = $this->input->post('approval');
    $planning = $this->input->post('planning');
    pretty_dump($planning);
    $this->db->trans_start();
    for ($i = 0; $i < count($approval); $i++) {
      $data = [
        'approval'  => $approval[$i]
      ];
      $update =  $this->Plannings->update($data, ['id' => $planning[$i]]);
    }
    $this->db->trans_complete();
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirecUrl . '/detail/' . $id);
  }
}
