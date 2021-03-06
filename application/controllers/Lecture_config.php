<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_config extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_config_model', 'Config');
    cek_login('Dosen');
  }

  public function getAcademicYear()
  {
    $searchTerm = $this->input->post('searchTerm');
    $response = $this->Config->getAcademicYearS($searchTerm);
    echo json_encode($response);
  }
}
