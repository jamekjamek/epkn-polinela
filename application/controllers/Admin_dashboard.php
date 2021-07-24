<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->role = 'admin';
    $this->load->model('Dashboard_model', 'Dashboard');
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation(),
      'registration'  => $this->Dashboard->getRegistration(),
      'graduation'    => $this->Dashboard->getGraduation(),
    ];
    $page = '/dashboard/admin_dashboard';
    pageBackend($this->role, $page, $data);
  }
}

/* End of file Dashboard.php */