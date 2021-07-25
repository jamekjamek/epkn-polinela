<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Auth_model', 'Auth');
    cek_login('Dosen');
    $this->load->model('Dashboard_model', 'Dashboard');
  }

  public function index()
  {
    $lecture = $this->Auth->showNameLogin()->row();
    // die(var_dump($lecture));
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation($lecture->id),
      'registration'  => $this->Dashboard->getRegistration($lecture->id),
      'graduation'    => $this->Dashboard->getGraduation($lecture->id),
      'showName'      => $this->Auth->showNameLogin()->row()
    ];
    $page = '/dashboard/lecture_dashboard';
    pageBackend($this->role, $page, $data);
  }
}
