<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_recap extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_recap_model', 'Recap');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role = 'admin';
    cek_login('Admin');

    $this->academic = $this->Config->getDataAcademicYear()->result();
  }

  public function adviser($academic_year_id = null)
  {
    $lecturers    = $this->Recap->getDataLecturer($academic_year_id)->result();
    $data = [
      'title'         => 'Dosen Pembimbing PKN',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk melihat Data Dosen Pembimbing PKN',
      'lecturers'     => $lecturers,
      'role'          => $this->role,
    ];
    $page = '/admin/recap/adviser';
    pageBackend($this->role, $page, $data);
  }

  public function exceldosenpembimbing($academic = null)
  {
    $data = [
      'lecturers'   => $this->Recap->getDataLecturer($academic),
    ];
    $this->load->view('excel/dosenpembimbing', $data);
  }

  public function excelpembimbinglapang($academic = null)
  {
    $data               = [
      'supervisors' => $this->Recap->getDataSupervisor($academic),
    ];
    $this->load->view('excel/pembimbinglapang', $data);
  }

  public function supervisor($academic_year_id = null)
  {
    $prodi        = $this->input->get('prodi');
    $supervisors  = $this->Recap->getDataSupervisor($academic_year_id)->result();
    $data = [
      'title'         => 'Pembimbing Lapang PKN',
      'desc'          => 'Berfungsi untuk melihat Data Pembimbing Lapang PKN',
      'academicyear'  => $academic_year_id,
      'supervisors'   => $supervisors,
      'role'          => $this->role
    ];
    $page = '/admin/recap/supervisor';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLog()
  {
    $prodi     = $this->input->get('prodi');
    $period    = $this->input->get('periode');
    $students  = $this->Recap->getDailyLogByStudent($prodi, $period)->result();
    $data = [
      'title'       => 'Jurnal Harian PKN',
      'desc'        => 'Berfungsi untuk melihat data jurnal harian PKN',
      'students'    => $students,
      'role'        => $this->role,
      'allPeriode'  => $this->academic

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
      'role'      => $this->role
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
    $prodi     = $this->input->get('prodi');
    $period    = $this->input->get('periode');
    $students     = $this->Recap->getAttendanceByStudent($prodi, $period)->result();
    $data = [
      'title'       => 'Kehadiran Mahasiswa PKN',
      'desc'        => 'Berfungsi untuk melihat data kehadiran harian mahasiswa',
      'students'    => $students,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/admin/recap/attendance';
    pageBackend($this->role, $page, $data);
  }

  public function attendanceDetail($id)
  {
    $details      = $this->Recap->getAttendanceByRegistration($id)->result();
    $row          = $this->Recap->getAttendanceByRegistration($id)->row();
    $data = [
      'title'     => 'Kehadiran Mahasiswa PKN',
      'desc'      => 'Berfungsi untuk melihat detail kehadiran harian mahasiswa',
      'details'   => $details,
      'row'       => $row,
      'role'      => $this->role
    ];
    $page = '/admin/recap/attendance_detail';
    pageBackend($this->role, $page, $data);
  }

  public function supervisionReport()
  {
    $prodi     = $this->input->get('prodi');
    $period    = $this->input->get('periode');
    $groups    = $this->Recap->getSupervisionReportByGroup($prodi, $period)->result();
    $data = [
      'title'       => 'Laporan Supervisi PKN',
      'desc'        => 'Berfungsi untuk melihat laporan supervisi',
      'groups'      => $groups,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
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
      'majors'        => $major,
      'role'          => $this->role
    ];

    $page = '/admin/recap/status_pkl';
    pageBackend($this->role, $page, $data);
  }

  public function scoring()
  {
    $prodi     = $this->input->get('prodi');
    $period    = $this->input->get('periode');
    $scoreData = $this->Recap->getScoringBy($prodi, $period)->result();
    $row       = $this->Recap->getScoringBy($prodi, $period)->row();
    $data = [
      'title'       => 'Nilai Akhir PKN',
      'desc'        => 'Berfungsi untuk melihat nilai akhir PKN',
      'scores'      => $scoreData,
      'row'         => $row,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/admin/recap/scoring';
    pageBackend($this->role, $page, $data);
  }

  public function statusPkn()
  {
    $prodi      = $this->input->get('prodi');
    $period     = $this->input->get('periode');
    $lecturers  = $this->Recap->getDataStatusPknNew($prodi, $period)->result();
    $data = [
      'title'       => 'Data Laporan dan Video PKN',
      'desc'        => 'Berfungsi untuk melihat Data laporan dan video PKN',
      'data'        => $lecturers,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/admin/recap/status_pkn';
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
