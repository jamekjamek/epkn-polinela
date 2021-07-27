<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_data_pkn extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_data_pkl_model', 'DataPKL');
    $this->role = 'mahasiswa';
    $this->redirectUrl = 'mahasiswa/data_pkn';
    cek_login('Mahasiswa');
  }

  public function index()
  {
    $data = [
      'title'         => 'Rekap PKN',
      'desc'          => 'Berfungsi untuk melihat data PKN',
      'detail'        => $this->DataPKL->getDetailValue(),
      'file'          => $this->DataPKL->getFile()->row()
    ];
    $page = '/mahasiswa/data_pkl/index';
    pageBackend($this->role, $page, $data);
  }

  public function upload()
  {
    $config['upload_path'] = './assets/uploads/laporan/';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 8000;
    $this->upload->initialize($config);
    $data = $this->input->post();
    if ($this->upload->do_upload('file')) {
      $fileData = $this->upload->data();
      $upload = [
        'file'            => $fileData['file_name'],
        'youtube_link'    => $fileData['file_name'],
        'updated_at'  => date('Y-m-d H:i:s')
      ];
      if ($this->DataPKL->upload($upload, ['id' => $data['registration_id']])) {
        $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di upload!</p>');
      } else {
        $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
      }
      redirect($this->redirectUrl);
    } else {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect($this->redirectUrl);
    }
  }
}
