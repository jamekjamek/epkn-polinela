<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_report_model', 'Reports');
    $this->load->model('Lecture/Lecture_data_pkn_model', 'DataPkl');
    cek_login('Dosen');
    $this->redirecUrlSupervision = 'dosen/report_supervision';
    $this->redirecUrlReception = 'dosen/report_reception';
  }

  public function reportSupervision($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Laporan Supervisi',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data laporan supervisi',
      'reports'       => $this->Reports->getSupervisionReport($academic_year_id)->result(),
    ];
    $page = '/lecture/report/supervision_report';
    pageBackend($this->role, $page, $data);
  }

  public function detailReportSupervision($id)
  {
    $decode         = decodeEncrypt($id);
    $detail         = $this->Reports->getSupervisionReport($decode)->row();
    if ($detail) {
      $data = [
        'title'     => 'Detail Data Laporan Supervisi',
        'desc'      => 'Berfungsi untuk melihat detail data laporan supervisi',
        'detail'    => $detail,
      ];
      $page = '/lecture/report/detail_supervision_report';
      pageBackend($this->role, $page, $data);
    } else {
      $this->session->set_flashdata('error', 'Maaf data laporan supervisi belum tersedia');
      redirect($this->redirecUrl, 'refresh');
      if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
      }
    }
  }

  public function updateReportSupervision($id, $type)
  {
    $decodeId   = $this->encrypt->decode($id, keyencrypt());
    $detail     = $this->Reports->getSupervisionReport($decodeId)->row();
    $this->_validation('supervision');
    if ($this->form_validation->run() == false && $type == 'edit') {
      if ($detail->time) {
        $explode    = explode(",", $detail->time);
        $day        = $explode[0];
        $days       = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $date       = date('Y-m-d', strtotime($explode[1]));
        $data = [
          'title'         => 'Isi Laporan Supervisi',
          'desc'          => 'Berfungsi untuk isi hasil laporan supervisi',
          'supervision'   => $detail,
          'day'           => $day,
          'days'          => $days,
          'date'          => $date
        ];
      } else {
        $days       = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $date       = null;
        $data = [
          'title'         => 'Isi Laporan Supervisi',
          'desc'          => 'Berfungsi untuk isi hasil laporan supervisi',
          'supervision'   => $detail,
          'days'          => $days,
          'date'          => $date
        ];
      }
      $page       = '/lecture/report/create_supervision_report';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($detail));
      $data = $this->input->post();
      $supervision = [
        'registration_group_id'   => $data['group_id'],
        'time'                    => $data['day'] . ', ' . date('d-m-Y', strtotime($data['date'])),
        'general_situation'       => $data['general_situation'],
        'general_situation_note'  => $data['general_situation_note'],
        'progress'                => $data['progress'],
        'progress_note'           => $data['progress_note'],
        'result_problem'          => $data['result_problem'],
        'result_solve'            => $data['result_solve'],
        'result_note'             => $data['result_note'],
        'suggestion'              => $data['suggestion'],
        'suggestion_note'         => $data['suggestion_note'],
        'updated_at'              => date('Y-m-d H:i:s')
      ];
      $this->db->set('id', 'UUID()', FALSE);
      if ($detail->id) {
        $update = $this->Reports->insertSupervisonReport($supervision, ['registration_group_id' => $decodeId]);
      } else {
        $update = $this->Reports->insertSupervisonReport($supervision);
      }
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Data berhasil disimpan</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->redirecUrlSupervision);
    }
  }

  private function _validation($type = '')
  {
    if ($type == 'supervision') {
      $this->form_validation->set_rules(
        'day',
        'Hari',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'date',
        'Tanggal',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'general_situation',
        'Keadaan umum',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }
  }

  public function reportReception()
  {
    $data = [
      'title'      => 'Kesediaan Penerimaan Tahun Depan',
      'desc'       => 'Berfungsi untuk melihat kesediaan penerimaan pkn di tahun depan',
      'receptions' => $this->Reports->listReception()->result()
    ];
    $page = '/lecture/report/reception';
    pageBackend($this->role, $page, $data);
  }

  public function detailReception($company_id)
  {
    $decodeId = decodeEncrypt($company_id);
    $data = [
      'title'   => 'Detail Kesediaan Penerimaan',
      'desc'    => 'Berfungsi untuk melihat detail kesediaan penerimaan pkn di tahun depan',
      'detail'  => $this->Reports->detailReception($decodeId)->row(),
      'data'    => $this->Reports->detailReception($decodeId)->result()
    ];
    $page = '/lecture/report/reception_detail';
    pageBackend($this->role, $page, $data);
  }

  public function pushed($groupId, $status)
  {
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
    redirect($this->redirecUrlSupervision);
  }
}
