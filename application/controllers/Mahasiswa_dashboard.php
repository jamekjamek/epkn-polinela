<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->load->model('Auth_model', 'Auth');
    $this->role = 'mahasiswa';
    cek_login('Mahasiswa');
  }

  public function index()
  {
    $data = [
      'title'         => 'Dashboard',
      'desc'          => 'Sistem Informasi PKN Politeknik Negeri Lampung',
      'check'         => $this->Registration->list()->row(),
      'showName'      => $this->Auth->showNameLogin()
    ];
    $page = '/dashboard/mahasiswa_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
