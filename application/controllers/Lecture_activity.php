<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lecture_activity extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Dosen';
    $this->load->model('Lecture/Lecture_activity_model', 'Activity');
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
      'dailyLog'      => $this->Activity->getListDailyLog($academic_year_id),
    ];
    $page = '/lecture/activity/daily_log';
    pageBackend($this->role, $page, $data);
  }

  public function attendance($academic_year_id = null)
  {
    $data = [
      'title'         => 'Data Kehadiran Mahasiswa',
      'academicyear'  => $academic_year_id,
      'desc'          => 'Berfungsi untuk menampilkan data kehadiran mahasiswa',
      'attendance'    => $this->Activity->getListAttendance($academic_year_id),
    ];
    $page = '/lecture/activity/attendance';
    pageBackend($this->role, $page, $data);
  }
}
