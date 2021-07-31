<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recap_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_recap_model', 'Recap');
    $this->load->model('Admin/Admin_config_model', 'Config');
  }

  public function adviser()
  {
    $prodi        = $this->input->get('prodi');
    $lecturers    = $this->Recap->getDataLecturer($prodi)->result();
    $data = [
      'title'       => 'Dosen Pembimbing PKN',
      'desc'        => 'Berfungsi untuk melihat Data Dosen Pembimbing PKN',
      'lecturers'   => $lecturers,
    ];
    $page = '/admin/recap/adviser';
    pageBackend($this->role, $page, $data);
  }

  public function supervisor()
  {
    $prodi        = $this->input->get('prodi');
    $supervisors  = $this->Recap->getDataSupervisor($prodi)->result();
    $data = [
      'title'       => 'Pembimbing Lapang PKN',
      'desc'        => 'Berfungsi untuk melihat Data Pembimbing Lapang PKN',
      'supervisors' => $supervisors
    ];
    $page = '/admin/recap/supervisor';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLog()
  {
    $prodi        = $this->input->get('prodi');
    $students     = $this->Recap->getDailyLogByStudent($prodi)->result();
    $data = [
      'title'       => 'Jurnal Harian PKN',
      'desc'        => 'Berfungsi untuk melihat data jurnal harian PKN',
      'students'    => $students,
    ];
    $page = '/admin/recap/daily_log';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLogDetail($id)
  {
    $details      = $this->Recap->getDailyLogByRegistration($id)->result();
    $row          = $this->Recap->getDailyLogByRegistration($id)->row();
    $data = [
      'title'     => 'Detail Jurnal Harian PKN',
      'desc'      => 'Berfungsi untuk melihat detail jurnal harian PKN',
      'details'   => $details,
      'row'       => $row,
    ];
    $page = '/admin/recap/daily_log_detail';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLogDetailMore()
  {
    $id         = $this->input->post('logId');
    $getData    = $this->Recap->getDailyLogById($id)->result();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";
      foreach ($getData as $log) {
        $output     .= "
                <tr>
                    <td>#</td>
                    <td>" . $log->topic . "</td>
                    <td>" . $log->procedure . "</td>
                    <td>" . $log->description . "</td>
                    <td>" . $log->comment . "</td>
                </tr>
            ";
      }
      $result['data']   = $output;
    } else {
      $result['status'] = 'bad';
      $result['data']   = null;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  public function attendance()
  {
    $prodi        = $this->input->get('prodi');
    $students     = $this->Recap->getAttendanceByStudent($prodi)->result();
    $data = [
      'title'       => 'Absensi Mahasiswa PKL',
      'desc'        => 'Berfungsi untuk melihat data absensi harian mahasiswa',
      'students'    => $students,
    ];
    $page = '/admin/recap/attendance';
    pageBackend($this->role, $page, $data);
  }

  public function attendanceDetail($id)
  {
    $details      = $this->Recap->getAttendanceByRegistration($id)->result();
    $row          = $this->Recap->getAttendanceByRegistration($id)->row();
    $data = [
      'title'     => 'Absensi Mahasiswa PKN',
      'desc'      => 'Berfungsi untuk melihat detail absensi harian mahasiswa',
      'details'   => $details,
      'row'       => $row,
    ];
    $page = '/admin/recap/attendance_detail';
    pageBackend($this->role, $page, $data);
  }

  public function supervisionReport()
  {
    $prodi        = $this->input->get('prodi');
    $groups     = $this->Recap->getSupervisionReportByGroup($prodi)->result();
    $data = [
      'title'     => 'Laporan Supervisi PKN',
      'desc'      => 'Berfungsi untuk melihat laporan supervisi',
      'groups'    => $groups,
    ];
    $page = '/admin/recap/supervision_report';
    pageBackend($this->role, $page, $data);
  }

  public function supervisionReportDetail()
  {
    $id         = $this->input->post('logId');
    $getData    = $this->Recap->getSupervisionReportById($id)->row();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";

      $output     .= "
                <tr>
                    <td>Keadaan Umum</td>
                    <td>: " . $getData->general_situation . "</td>
                </tr>
                <tr>
                    <td>Catatan Keadaan Umum</td>
                    <td>: " . $getData->general_situation_note . "</td>
                </tr>
                <tr>
                    <td>Kemajuan Pelaksanaan PKL</td>
                    <td>: " . $getData->progress . "</td>
                </tr>
                <tr>
                    <td>Catat Kemajuan</td>
                    <td>: " . $getData->progress_note . "</td>
                </tr>
                <tr>
                    <td>Permasalahan</td>
                    <td>: " . $getData->result_problem . "</td>
                </tr>
                <tr>
                    <td>Pemecahan Masalah</td>
                    <td>: " . $getData->result_solve . "</td>
                </tr>
                <tr>
                    <td>Catatan Hasil Supervisi</td>
                    <td>: " . $getData->result_note . "</td>
                </tr>
                <tr>
                    <td>Saran</td>
                    <td>: " . $getData->suggestion . "</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: " . $getData->suggestion_note . "</td>
                </tr>
            ";

      $result['data']   = $output;
    } else {
      $result['status'] = 'bad';
      $result['data']   = null;
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  public function statusPKL()
  {
    $major      = $this->Recap->getAllMajor()->result();
    $academic   = $this->Config->getDataAcademicYear()->result();
    $data       = [
      'title'         => 'Data PKL Program Studi',
      'desc'          => 'Berfungsi untuk melihat Data PKL Program Studi',
      'academicyear'  => $academic,
      'majors'        => $major
    ];

    $page = '/admin/recap/status_pkl';
    pageBackend($this->role, $page, $data);
  }

  public function scoring()
  {
    $prodi        = $this->input->get('prodi');
    $scoreData    = $this->Recap->getScoringBy($prodi)->result();
    $row          = $this->Recap->getScoringBy($prodi)->row();
    $data = [
      'title'       => 'Nilai Akhir PKN',
      'desc'        => 'Berfungsi untuk melihat nilai akhir PKN',
      'scores'      => $scoreData,
      'row'         => $row,
    ];
    $page = '/admin/recap/scoring';
    pageBackend($this->role, $page, $data);
  }

  public function video()
  {
    $id         = $this->input->post('logId');
    $decodeId = decodeEncrypt($id);
    $getData    = $this->Recap->getYotubeLink($decodeId)->row();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";
      $output     .= "
                  <iframe class='embed-responsive-item' src='" . $getData->youtube_link . "' allowfullscreen></iframe>
            ";

      $result['data']   = $output;
    } else {
      $result['status'] = 'bad';
      $result['data']   = null;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }
}
