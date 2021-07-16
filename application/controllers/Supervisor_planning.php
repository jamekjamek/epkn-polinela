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

  public function index($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Capaian Mahasiswa PKL',
      'desc'          => 'Berfungsi untuk melihat data capaian PKL',
      'academicyear'  => $academic_year_id,
      'dataPkl'       => $this->DataPkl->list($academic_year_id)->result(),
    ];
    $page = '/supervisor/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function detail($id)
  {
    $decode         = decodeEncrypt($id);
    $planning       = $this->Plannings->list(['planning.registration_id' => $decode])->row();
    if ($planning) {
      $plannings    = $this->Plannings->list(['planning.registration_id' => $decode])->result();
      $data = [
        'title'     => 'Detail Capaian Mahasiswa PKL',
        'desc'      => 'Berfungsi untuk melihat detail capaian PKL',
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

  public function verification($stringUrl, $status)
  {
    $explode    = explode(":", $stringUrl);
    $id         = $explode[0];
    $uri        = $explode[1];
    if ($status === '1') {
      $approval    = 1; // verifikasi supervisor
    } else {
      $approval    = 3;
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
