<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_recap extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Major/Major_recap_model', 'Recap');
    $this->load->model('Major/Major_config_model', 'Config');
    $this->role = 'Sekjur';
    cek_login('Sekjur');

    // get academic year
    $this->academic = $this->Config->getDataAcademicYear();
  }

  public function registration()
  {
    $prodi     = $this->input->get('prodi');
    $period    = $this->input->get('periode');
    $group     = $this->Recap->getData($prodi, $period)->result();
    $data = [
      'title'       => 'Kelompok PKN',
      'desc'        => 'Berfungsi untuk melihat data Kelompok PKN',
      'group'       => $group,
      'prodi'       => $prodi,
      'role'        => 'major',
      'allPeriode'  => $this->academic
    ];
    $page = '/major/register';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLog()
  {
    $prodi      = $this->input->get('prodi');
    $period     = $this->input->get('periode');
    $students   = $this->Recap->getDailyLogByStudent($prodi, $period)->result();
    $data = [
      'title'       => 'Jurnal Harian PKN',
      'desc'        => 'Berfungsi untuk melihat data jurnal harian PKN',
      'students'    => $students,
      'role'        => 'major',
      'allPeriode'  => $this->academic
    ];
    $page = '/major/daily_log';
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
      'role'      => 'major',
    ];
    $page = '/major/daily_log_detail';
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
    $prodi      = $this->input->get('prodi');
    $period     = $this->input->get('periode');
    $students   = $this->Recap->getAttendanceByStudent($prodi,  $period)->result();
    $data = [
      'title'       => 'Absensi Mahasiswa PKN',
      'desc'        => 'Berfungsi untuk melihat data absensi harian mahasiswa',
      'students'    => $students,
      'role'        => 'major',
      'allPeriode'  => $this->academic
    ];
    $page = '/major/attendance';
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
      'role'      => 'major',
    ];
    $page = '/major/attendance_detail';
    pageBackend($this->role, $page, $data);
  }

  public function supervisionReport()
  {
    $prodi    = $this->input->get('prodi');
    $period   = $this->input->get('periode');
    $groups   = $this->Recap->getSupervisionReportByGroup($prodi, $period)->result();
    $data = [
      'title'       => 'Laporan Supervisi PKN',
      'desc'        => 'Berfungsi untuk melihat laporan supervisi',
      'groups'      => $groups,
      'role'        => $this->role,
      'role'        => 'major',
      'allPeriode'  => $this->academic
    ];
    $page = '/major/supervision_report';
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
    $prodi      = $this->input->get('prodi');
    $period     = $this->input->get('periode');
    $scoreData  = $this->Recap->getScoringBy($prodi, $period)->result();
    $row        = $this->Recap->getScoringBy($prodi, $period)->row();
    $data = [
      'title'       => 'Nilai Akhir PKN',
      'desc'        => 'Berfungsi untuk melihat nilai akhir PKN',
      'scores'      => $scoreData,
      'row'         => $row,
      'prodi'       => $prodi,
      'role'        => 'major',
      'allPeriode'  => $this->academic
    ];
    $page = '/major/scoring';
    pageBackend($this->role, $page, $data);
  }

  public function statusPkn()
  {
    $prodi = $this->Prodi->getByEmail($this->session->user);
    $lecturers    = $this->Recap->getDataStatusPkn($prodi)->result();
    $data = [
      'title'       => 'Data Laporan dan Video PKN',
      'desc'        => 'Berfungsi untuk melihat Data laporan dan video PKN',
      'data'        => $lecturers,
      'role'        => 'major',
    ];
    $page = '/major/status_pkn';
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
