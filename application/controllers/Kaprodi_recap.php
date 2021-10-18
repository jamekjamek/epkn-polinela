<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_recap extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kaprodi/Kaprodi_recap_model', 'Recap');
    $this->load->model('Kaprodi/Pkl_Prodi_Model', 'Prodi');
    $this->load->model('Major/Major_config_model', 'Config');
    $this->role = 'prodi';
    cek_login('Prodi');

    $this->academic = $this->Config->getDataAcademicYear();
  }

  public function registration()
  {
    $period    = $this->input->get('periode');
    $prodi     = $this->Prodi->getByEmail($this->session->user);
    $group     = $this->Recap->getData($prodi->id, $period)->result();
    $data = [
      'title'       => 'Peserta PKN',
      'desc'        => 'Berfungsi untuk melihat data peserta PKN',
      'group'       => $group,
      'prodi'       => $prodi->id,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/prodi/register';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLog()
  {
    $period     = $this->input->get('periode');
    $prodi      = $this->Prodi->getByEmail($this->session->user);
    $students   = $this->Recap->getDailyLogByStudent($prodi->id, $period)->result();
    $data = [
      'title'       => 'Jurnal Harian PKN',
      'desc'        => 'Berfungsi untuk melihat data jurnal harian PKN',
      'students'    => $students,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/prodi/daily_log';
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
    $page = '/prodi/daily_log_detail';
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
    $period     = $this->input->get('periode');
    $prodi      = $this->Prodi->getByEmail($this->session->user);
    $students   = $this->Recap->getAttendanceByStudent($prodi->id, $period)->result();
    $data = [
      'title'       => 'Kehadiran Mahasiswa PKN',
      'desc'        => 'Berfungsi untuk melihat data kehadiran harian mahasiswa',
      'students'    => $students,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/prodi/attendance';
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
    $page = '/prodi/attendance_detail';
    pageBackend($this->role, $page, $data);
  }

  public function supervisionReport()
  {
    $period   = $this->input->get('periode');
    $prodi    = $this->Prodi->getByEmail($this->session->user);
    $groups   = $this->Recap->getSupervisionReportByGroup($prodi->id, $period)->result();
    $data = [
      'title'       => 'Laporan Supervisi PKN',
      'desc'        => 'Berfungsi untuk melihat laporan supervisi',
      'groups'      => $groups,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/prodi/supervision_report';
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

  public function scoring()
  {
    $period     = $this->input->get('periode');
    $prodi      = $this->Prodi->getByEmail($this->session->user);
    $scoreData  = $this->Recap->getScoringBy($prodi->id, $period)->result();
    $row        = $this->Recap->getScoringBy($prodi->id, $period)->row();
    $data = [
      'title'       => 'Nilai Akhir PKN',
      'desc'        => 'Berfungsi untuk melihat nilai akhir PKN',
      'scores'      => $scoreData,
      'row'         => $row,
      'prodi'       => $prodi->id,
      'role'        => $this->role,
      'allPeriode'  => $this->academic
    ];
    $page = '/prodi/scoring';
    pageBackend($this->role, $page, $data);
  }

  public function statusPkn()
  {
    $period     = $this->input->get('periode');
    $prodi      = $this->Prodi->getByEmail($this->session->user);
    $lecturers  = $this->Recap->getDataStatusPkn($prodi->id, $period)->result();
    $data = [
      'title'       => 'Data Laporan dan Video PKN',
      'desc'        => 'Berfungsi untuk melihat Data laporan dan video PKN',
      'data'        => $lecturers,
      'role'        => $this->role
    ];
    $page = '/prodi/status_pkn';
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
