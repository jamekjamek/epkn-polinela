<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_planning extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_planning_model', 'Plannings');
    $this->load->model('Lecture/Lecture_data_pkl_model', 'DataPkl');
    cek_login('Dosen');
    $this->redirecUrl = 'dosen/planning';
  }

  public function index($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Capaian',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data capaian',
      'dataPkl'      => $this->DataPkl->list($academic_year_id)->result(),
    ];
    $page = '/lecture/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function detail($id)
  {
    $decode         = decodeEncrypt($id);
    $planning       = $this->Plannings->list(['planning.registration_id' => $decode])->row();
    if ($planning) {
      $plannings    = $this->Plannings->list(['planning.registration_id' => $decode])->result();
      $data = [
        'title'     => 'Detail Data Capaian Mahasiswa PKL',
        'desc'      => 'Berfungsi untuk melihat detail data capaian PKL',
        'planning'  => $planning,
        'plannings' => $plannings,
      ];
      $page = '/lecture/planning/detail';
      pageBackend($this->role, $page, $data);
    } else {
      $this->session->set_flashdata('error', 'Maaf data capaian belum tersedia');
      redirect($this->redirecUrl, 'refresh');
      if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
      }
    }
  }

  public function verification($stringUrl, $status)
  {
    $explode    = explode(":", $stringUrl);
    $id         = $explode[0];
    $uri        = $explode[1];
    if ($status === '1') {
      $approval    = 2; // verifikasi dosen pembimbing
    } else {
      $approval    = 0;
    }
    $dataUpdate = [
      'approval'    => $approval,
      'updated_at'  => date('Y-m-d H:i:s')
    ];
    $where      = [
      'id'    => $id,
    ];
    $update     = $this->Plannings->update($dataUpdate, $where);
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil di update');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirecUrl . '/detail/' . $uri);
  }
}
