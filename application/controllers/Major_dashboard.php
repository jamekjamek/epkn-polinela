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
    $this->load->model('Dashboard_model', 'Dashboard');
    cek_login('Sekjur');
  }

  public function index()
  {
    $major = $this->login->row();
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation($major->id),
      'registration'  => $this->Dashboard->getRegistration($major->id),
      'graduation'    => $this->Dashboard->getGraduation($major->id),
    ];
    $page = '/dashboard/jurusan_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
