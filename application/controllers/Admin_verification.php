<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_verification extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_verification_model', 'Verification');
    $this->role     = 'admin';
    $this->redirect = 'admin/verification';
    cek_login('Admin');
  }

  public function index()
  {
    $prodi      = $this->input->get('prodi');
    $student    = $this->Verification->getDataStudent(['prodi_id' => $prodi])->result();
    $data = [
      'title'     => 'Data Verifikasi Mahasiswa',
      'desc'      => 'Berfungsi untuk melihat Data Verifikasi Mahasiswa',
      'students'  => $student,
    ];

    $page = '/admin/verification/index';
    pageBackend($this->role, $page, $data);
  }
}
