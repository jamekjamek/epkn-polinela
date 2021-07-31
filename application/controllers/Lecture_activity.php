<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_activity extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_activity_model', 'Activity');
    $this->load->model('Lecture/Lecture_data_pkn_model', 'DataPkl');
    cek_login('Dosen');
    $this->redirecUrlDailyLog = 'dosen/activity/daily_log';
    $this->redirecUrlAttendance = 'dosen/activity/attendance';
  }

  public function dailyLog($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Log Harian Mahasiswa',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data log harian mahasiswa',
      'dataPkl'       => $this->DataPkl->listByStudent($academic_year_id)->result(),
    ];
    $page = '/lecture/activity/daily_log';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLogDetail($id)
  {
    $decode         = decodeEncrypt($id);
    $data = [
      'title'         => 'Detail Log Harian Mahasiswa',
      'desc'          => 'Berfungsi untuk menampilkan detail log harian mahasiswa',
      'dailyLog'      => $this->Activity->getListDailyLog(['registration.id' => $decode])->result(),
      'row'           => $this->Activity->getListDailyLog(['registration.id' => $decode])->row(),
    ];
    $page = '/lecture/activity/daily_log_detail';
    pageBackend($this->role, $page, $data);
  }

  public function attendance($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Kehadiran Mahasiswa',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data kehadiran mahasiswa',
      'dataPkl'       => $this->DataPkl->listByStudent($academic_year_id)->result(),
    ];
    $page = '/lecture/activity/attendance';
    pageBackend($this->role, $page, $data);
  }

  public function attendanceDetail($id)
  {
    $decode         = decodeEncrypt($id);
    $data = [
      'title'         => 'Detail Kehadiran Mahasiswa',
      'desc'          => 'Berfungsi untuk menampilkan detail kehadiran mahasiswa',
      'attendance'    => $this->Activity->getListAttendance(['registration.id' => $decode]),
    ];
    $page = '/lecture/activity/attendance_detail';
    pageBackend($this->role, $page, $data);
  }
}
