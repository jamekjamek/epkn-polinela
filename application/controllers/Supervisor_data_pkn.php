<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supervisor_data_pkn extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Supervisor/Supervisor_data_pkl_model', 'DataPkl');
    $this->load->model('Supervisor/Supervisor_planning_model', 'Plannings');
    cek_login('Supervisor');
    $this->redirecUrl = 'supervisor/data_pkn';
  }

  public function index()
  {
    $data = [
      'title'         => 'Penilaian PKN',
      'desc'          => 'Berfungsi untuk menampilkan data penilaian PKN',
      'dataPkl'       => $this->DataPkl->listForScore()->result(),
    ];
    $page = '/supervisor/data_pkn/index';
    pageBackend($this->role, $page, $data);
  }

  public function assessment($id)
  {
    $decode           = decodeEncrypt($id);
    $detail           = $this->DataPkl->getDataPklBy(['a.id' => $decode])->row();
    $supervisor       = $this->DataPkl->getBySupervisorScore(['registration_id' => $decode])->row();
    $data = [
      'title'           => 'Penilaian Pembimbing Lapang',
      'desc'            => 'Berfungsi untuk melihat data penilaian pembimbing lapang',
      'detail'          => $detail,
      'supervisor'      => $supervisor,
    ];
    $page = '/supervisor/data_pkn/assesment';
    pageBackend($this->role, $page, $data);
  }

  public function save($id)
  {
    $decodeId   = decodeEncrypt($id);
    $data = $this->input->post();
    $supervisor = [
      'registration_id'   => $data['registration_id'],
      'nilai_1'           => $data['nilai_1'],
      'nilai_2'           => $data['nilai_2'],
      'nilai_3'           => $data['nilai_3'],
      'nilai_4'           => $data['nilai_4'],
      'nilai_5'           => $data['nilai_5'],
      'nilai_6'           => $data['nilai_6'],
      'nilaitertimbang_1' => number_format($data['jumlah_1'], 2, '.', ''),
      'nilaitertimbang_2' => number_format($data['jumlah_2'], 2, '.', ''),
      'nilaitertimbang_3' => number_format($data['jumlah_3'], 2, '.', ''),
      'nilaitertimbang_4' => number_format($data['jumlah_4'], 2, '.', ''),
      'nilaitertimbang_5' => number_format($data['jumlah_5'], 2, '.', ''),
      'nilaitertimbang_6' => number_format($data['jumlah_6'], 2, '.', ''),
      'nilai_total'       => number_format($data['total'], 2, '.', ''),
      'updated_at'        => date('Y-m-d H:i:s')
    ];
    if (@$data['supervisor_score_id']) {
      $result = $this->DataPkl->update($supervisor, ['id' => $data['supervisor_score_id']]);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di rubah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    } else {
      $result = $this->DataPkl->insert($supervisor);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    }
    redirect($this->redirecUrl . '/assessment/' . encodeEncrypt($decodeId));
  }
}
