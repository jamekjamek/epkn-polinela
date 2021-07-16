<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Auth_model', 'Auth');
    cek_login('Dosen');
  }

  public function index()
  {
    $data = [
      'title'         => 'Dashboard',
      'desc'          => 'Sistem Informasi PKL Politeknik Negeri Lampung',
      'showName'      => $this->Auth->showNameLogin()
    ];
    $page = '/dashboard/lecture_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
