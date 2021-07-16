<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->load->model('Mahasiswa/Mahasiswa_Company_model', 'Company');
    $this->load->model('Auth_model', 'Auth');
    $this->role = 'mahasiswa';
    cek_login('Mahasiswa');
  }

  public function index()
  {
    $data = [
      'title'         => 'Dashboard',
      'desc'          => 'Sistem Informasi PKL Politeknik Negeri Lampung',
      'group_id'      => $this->Registration->list()->row_array(),
      'registration'  => $this->Registration->getDataPeriode()->row(),
      'location'      => $this->Company->getDataPeriode()->row(),
      'showName'      => $this->Auth->showNameLogin()
    ];
    $page = '/dashboard/mahasiswa_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
