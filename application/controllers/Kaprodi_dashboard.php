<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_dashboard extends Kaprodi_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $page = '/dashboard/kaprodi_dashboard';
    pageBackend($this->role, $page);
  }
}

/* End of file Dashboard.php */