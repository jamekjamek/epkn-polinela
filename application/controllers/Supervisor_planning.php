<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supervisor_planning extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Supervisor/Supervisor_planning_model', 'Plannings');
    $this->load->model('Supervisor/Supervisor_data_pkl_model', 'DataPkl');
    cek_login('Supervisor');
    $this->redirecUrl = 'supervisor/planning';
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Program',
      'desc'          => 'Berfungsi untuk melihat data program',
      'dataPkl'       => $this->DataPkl->list()->result(),
    ];
    $page = '/supervisor/planning/index';
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
      $page = '/supervisor/planning/detail';
      pageBackend($this->role, $page, $data);
    } else {
      $this->session->set_flashdata('error', 'Maaf data capaian belum tersedia');
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
