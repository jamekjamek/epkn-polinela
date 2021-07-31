<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_dashboard extends Kaprodi_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard_model', 'Dashboard');
    $this->load->model('Kaprodi/Pkl_Prodi_Model', 'Prodi');
    $this->role = 'prodi';
  }

  public function index()
  {
    $prodi = $this->Prodi->getByEmail($this->session->user);
    // die(var_dump($prodi));
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation($prodi->id),
      'registration'  => $this->Dashboard->getRegistration($prodi->id),
      'graduation'    => $this->Dashboard->getGraduation($prodi->id),
    ];
    $page = '/dashboard/kaprodi_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
