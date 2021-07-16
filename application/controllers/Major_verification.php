<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_verification extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Major/Major_config_model', 'Config');
    $this->load->model('Major/Major_verification_model', 'Verification');
    $this->role     = 'Sekjur';
    $this->login    = $this->Config->getDataBy(['email' => $this->session->userdata()['username']->username]);
    cek_login('Sekjur');
  }

  public function index()
  {
    $prodi      = $this->input->get('prodi');
    $student    = $this->Verification->getDataStudent(['prodi_id' => $prodi])->result();
    $data = [
      'title'     => 'Data Verifikasi Mahasiswa',
      'desc'      => 'Berfungsi untuk melihat Data Verifikasi Mahasiswa',
      'user'      => $this->login->row(),
      'students'  => $student,
    ];

    $page = '/major/verification/index';
    pageBackend($this->role, $page, $data);
  }
}
