<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Quesioner extends CI_Controller
{

  public function index()
  {
    $data = [
      'title'         => 'Kuesioner PKL',
      'desc'          => 'Berfungsi untuk mengisi Kuesioner PKL',
    ];

    $page = '/quesioner/index';
    if ($this->session->userdata('role') == 'Mahasiswa') {
      pageBackend('Mahasiswa', $page, $data);
    } else {
      pageBackend('Supervisor', $page, $data);
    }
  }
}
