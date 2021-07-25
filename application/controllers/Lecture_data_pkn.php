<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_data_pkn extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_data_pkn_model', 'DataPkl');
    $this->load->model('Lecture/Lecture_report_model', 'Report');
    cek_login('Dosen');
    $this->redirecUrl = 'dosen/data_pkn';
  }

  public function index($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data PKN',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data PKN',
      'dataPkl'       => $this->DataPkl->list($academic_year_id)->result(),
      'supervision'   => $this->Report->reportCheck()
    ];
    $page = '/lecture/data_pkn/index';
    pageBackend($this->role, $page, $data);
  }

  // penilaian: bimbingan, ujian akhir dan nilai akhir
  public function assessment($id)
  {
    $decode           = decodeEncrypt($id);
    $detail           = $this->DataPkl->getDataPklBy(['a.id' => $decode])->row();
    $supervisionId    = $this->DataPkl->getBySupervisionValue(['registration_id' => $decode])->row();
    $supervisionJoin  = $this->DataPkl->getTimeSupervisionValue(['supervision_value.registration_id' => $decode])->row();
    $guidanceId       = $this->DataPkl->getByIdGuidanceValue(['registration_id' => $decode])->row();
    $degree           = $this->DataPkl->checkStudentDegree(['registration.id' => $decode])->row();
    $testScoreId      = $this->DataPkl->getByIdTestScore(['registration_id' => $decode])->row();
    $finalScoreId     = $this->DataPkl->getByIdFinalScore(['registration_id' => $decode])->row();
    $days       = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    $data = [
      'title'           => 'Penilaian Dosen Pembimbing',
      'desc'            => 'Berfungsi untuk melihat data penilaian dosen pembimbing',
      'detail'          => $detail,
      'supervision'     => $supervisionId,
      'supervisionTime' => $supervisionJoin,
      'guidance'        => $guidanceId,
      'degree'          => $degree,
      'testScore'       => $testScoreId,
      'days'            => $days,
      'finalScore'      => $finalScoreId,
    ];
    $page = '/lecture/data_pkn/assesment';
    pageBackend($this->role, $page, $data);
  }

  public function saveAssesmentSupervision($id)
  {
    $decodeId   = decodeEncrypt($id);
    $data = $this->input->post();
    $supervision = [
      'registration_id'   => $data['registration_id'],
      'nilai_1'           => $data['nilai_1'],
      'nilai_2'           => $data['nilai_2'],
      'nilai_3'           => $data['nilai_3'],
      'nilaitertimbang_1' => number_format($data['jumlah_1'], 2, '.', ''),
      'nilaitertimbang_2' => number_format($data['jumlah_2'], 2, '.', ''),
      'nilaitertimbang_3' => number_format($data['jumlah_3'], 2, '.', ''),
      'nilai_total'       => number_format($data['total'], 2, '.', ''),
      'updated_at'        => date('Y-m-d H:i:s')
    ];
    if ($data['supervision_id']) {
      $result = $this->DataPkl->updateSupervisionValue($supervision, ['id' => $data['supervision_id']]);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di rubah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    } else {
      $result = $this->DataPkl->insertSupervisionValue($supervision);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    }
    redirect($this->redirecUrl . '/assessment/' . encodeEncrypt($decodeId));
  }

  public function pushed($stringUrl, $status)
  {
    $explode    = explode(":", $stringUrl);
    // die(var_dump($explode));
    $id         = $explode[0];
    $uri        = $explode[1];
    $groupId    = $explode[2];
    if ($status === '1') {
      $approval    = 1; // verifikasi penarikan sukses
    } else {
      $approval    = 0; // verifikasi penarikan di batalkan
    }
    $dataUpdate = [
      'pushed'       => $approval,
      'updated_at'  => date('Y-m-d H:i:s')
    ];
    $where      = [
      'group_id'      => $groupId,
      'group_status'  => 'diterima'
    ];
    $update     = $this->DataPkl->pushed($dataUpdate, $where);
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Verifikasi penarikan sukses');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirecUrl . '/assessment/' . $uri);
  }

  public function saveAssesmentGuidance($id)
  {
    $decodeId   = decodeEncrypt($id);
    $data = $this->input->post();
    $guidance = [
      'registration_id'   => $data['registration_id'],
      'nilai_1'           => $data['nilai_1'],
      'nilai_2'           => $data['nilai_2'],
      'nilai_3'           => $data['nilai_3'],
      'nilai_4'           => $data['nilai_4'],
      'nilaitertimbang_1' => number_format($data['jumlah_1'], 2, '.', ''),
      'nilaitertimbang_2' => number_format($data['jumlah_2'], 2, '.', ''),
      'nilaitertimbang_3' => number_format($data['jumlah_3'], 2, '.', ''),
      'nilaitertimbang_4' => number_format($data['jumlah_4'], 2, '.', ''),
      'nilai_total'       => number_format($data['total'], 2, '.', ''),
      'updated_at'        => date('Y-m-d H:i:s')
    ];
    if ($data['guidance_id']) {
      $result = $this->DataPkl->updateGuidanceValue($guidance, ['id' => $data['guidance_id']]);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di rubah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    } else {
      $result = $this->DataPkl->insertGuidanceValue($guidance);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    }
    redirect($this->redirecUrl . '/assessment/' . encodeEncrypt($decodeId));
  }

  public function saveAssesmentFinalTest($id)
  {
    $decodeId   = decodeEncrypt($id);
    $data = $this->input->post();
    $finalTest = [
      'registration_id'   => $data['registration_id'],
      'hari'              => $data['hari'],
      'tgl'               => $data['tgl'],
      'room'              => $data['room'],
      'waktu'             => $data['waktu'],
      'nilai_1'           => $data['nilai_1'],
      'nilai_2'           => $data['nilai_2'],
      'nilai_3'           => $data['nilai_3'],
      'nilaitertimbang_1' => number_format($data['jumlah_1'], 2, '.', ''),
      'nilaitertimbang_2' => number_format($data['jumlah_2'], 2, '.', ''),
      'nilaitertimbang_3' => number_format($data['jumlah_3'], 2, '.', ''),
      'nilai_total'       => number_format($data['total'], 2, '.', ''),
      'keterangan'        => $data['keterangan'],
      'updated_at'        => date('Y-m-d H:i:s')
    ];
    if ($data['final_score_id']) {
      $result = $this->DataPkl->updateFinalTestValue($finalTest, ['id' => $data['final_score_id']]);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di rubah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    } else {
      $result = $this->DataPkl->insertFinalTestValue($finalTest);
      $graduated = [
        'status' => 'graduated'
      ];
      $this->DataPkl->graduated($graduated, ['id'   => $data['student_id'],]);
      if ($result > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
    }
    redirect($this->redirecUrl . '/assessment/' . encodeEncrypt($decodeId));
  }
}
