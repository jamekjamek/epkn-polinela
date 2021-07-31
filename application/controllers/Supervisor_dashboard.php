<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Auth_model', 'Auth');
    $this->load->model('Dashboard_model', 'Dashboard');
    cek_login('Supervisor');
  }

  public function index()
  {
    $data = [
      'title'         => 'Dashboard',
      'desc'          => 'Sistem Informasi PKN Politeknik Negeri Lampung',
      'showName'      => $this->Auth->showNameLogin(),
      'students'      => $this->Dashboard->getGuidanceStudentBySupervisor()->result(),
    ];
    $page = '/dashboard/supervisor_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
