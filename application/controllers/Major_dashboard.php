<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Major_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Major/Major_config_model', 'Config');
    $this->role     = 'Sekjur';
    $this->login    = $this->Config->getDataBy(['email' => $this->session->userdata()['username']->username]);
    cek_login('Sekjur');
  }

  public function index()
  {
    $data = [
      'user'  => $this->login->row()
    ];
    $page = '/dashboard/jurusan_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
