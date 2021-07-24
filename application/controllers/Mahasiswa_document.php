<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_document extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Document/Document_model', 'Documents');
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->load->model('Auth_model', 'Auth');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
    $this->redirectUrl = "mahasiswa/document";
  }

  public function index()
  {
    $data = [
      'title'         => 'Berkas Kegiatan PKN',
      'desc'          => 'Berfungsi untuk melihat berkas kegiatan PKN',
      'documents'     =>  $this->Documents->list(),
      'isCheck'       =>  $this->Registration->list()->row_array(),
      'isCheckWith'   =>  $this->Documents->isCheckWithVerifiedMajor()->row(),
      'file'          =>  $this->Documents->responseLetterFile()->row(),
    ];
    $page = '/mahasiswa/document/index';
    pageBackend($this->role, $page, $data);
  }

  // edit group status by group_id
  public function edit()
  {
    $input = $this->input->post();
    $data = [
      'group_status'  => 'dalam_proses_penerimaan',
      'group_id'      => $input['group_id']
    ];
    $output     = $this->Documents->updateGroupStatus($data);
    if ($output) {
      redirect($this->redirectUrl);
    }
  }
}
