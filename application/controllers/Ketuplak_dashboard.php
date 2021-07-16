<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ketuplak_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->role = 'Ketuplak';
    cek_login('Ketuplak');
  }

  public function index()
  {
    $page = '/dashboard/ketuplak_dashboard';
    pageBackend($this->role, $page);
  }
}

/* End of file Dashboard.php */