<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ketuplak_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->role = 'Ketuplak';
    cek_login('Ketuplak');
    $this->load->model('Dashboard_model', 'Dashboard');
  }

  public function index()
  {
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation(),
      'registration'  => $this->Dashboard->getRegistration(),
      'graduation'    => $this->Dashboard->getGraduation(),
    ];
    $page = '/dashboard/ketuplak_dashboard';
    pageBackend($this->role, $page, $data);
  }
}

/* End of file Dashboard.php */