<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pudir_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->role = 'Pudir';
    cek_login('Pudir');
  }

  public function index()
  {
    $page = '/dashboard/pudir_dashboard';
    pageBackend($this->role, $page);
  }
}

/* End of file Dashboard.php */