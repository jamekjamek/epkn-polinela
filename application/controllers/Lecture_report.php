<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_report_model', 'Reports');
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
    $detail         = $this->Reports->getSupervisionReport(['supervision_report.id' => $decode])->row();
    if ($detail) {
      $data = [
        'title'     => 'Detail Data Laporan Supervisi PKL',
        'desc'      => 'Berfungsi untuk melihat detail data laporan supervisi PKL',
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
    $detail     = $this->Reports->getSupervisionReport(['supervision_report.group_id' => $decodeId])->row();
    $this->_validation('supervision');
    if ($this->form_validation->run() == false && $type == 'edit') {
      if ($detail->time) {
        $explode    = explode(",", $detail->time);
        $day        = $explode[0];
        $date       = date('Y-m-d', strtotime($explode[1]));
      } else {
        $day        = null;
        $date       = null;
      }
      $data = [
        'title'         => 'Isi Laporan Supervisi PKL',
        'desc'          => 'Berfungsi untuk isi hasil laporan supervisi PKL',
        'supervision'   => $detail,
        'day'           => $day,
        'date'          => $date
      ];
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

      $this->form_validation->set_rules(
        'progress',
        'Kemajuan pelaksanaan pkl',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'result_problem',
        'Permasahalan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'result_solve',
        'Permasahalan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'result_note',
        'Pemecahan Masalah',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'suggestion',
        'Saran',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }
  }
}
