<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supervisor_activity extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Supervisor/Supervisor_activity_model', 'Activity');
    cek_login('Supervisor');
    $this->redirectUrlDailyLog = 'supervisor/activity/daily_log';
    $this->redirectUrlAttendance = 'supervisor/activity/attendance';
  }

  public function dailyLog()
  {
    $data = [
      'title'         => 'Data Log Harian Mahasiswa PKL',
      'desc'          => 'Berfungsi untuk melihat data log harian mahasiswa PKL',
      'dailyLog'      => $this->Activity->getListDailyLog(),
    ];
    $page = '/supervisor/activity/daily_log';
    pageBackend($this->role, $page, $data);
  }

  public function verificationDailyLog($stringUrl, $status)
  {
    $explode    = explode(":", $stringUrl);
    $id         = $explode[0];
    if ($status === '1') {
      $validation    = 1; // verifikasi supervisor
    } else {
      $validation    = 0;
    }
    $dataUpdate = [
      'validation'    => $validation,
      'updated_at'    => date('Y-m-d H:i:s')
    ];
    $where      = [
      'id'    => $id,
    ];
    $update     = $this->Activity->updateDailyLog($dataUpdate, $where);
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil di update');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirectUrlDailyLog);
  }

  public function attendance()
  {
    $data = [
      'title'         => 'Data Kehadiran Mahasiswa PKL',
      'desc'          => 'Berfungsi untuk melihat data kehadiran mahasiswa PKL',
      'attendance'    => $this->Activity->getListAttendance(),
    ];
    $page = '/supervisor/activity/attendance';
    pageBackend($this->role, $page, $data);
  }

  public function verificationAttendance($stringUrl, $status)
  {
    $explode    = explode(":", $stringUrl);
    $id         = $explode[0];
    if ($status === '1') {
      $validation    = 1; // verifikasi supervisor
    } else {
      $validation    = 0;
    }
    $dataUpdate = [
      'validation'    => $validation,
      'updated_at'    => date('Y-m-d H:i:s')
    ];
    $where      = [
      'id'    => $id,
    ];
    $update     = $this->Activity->updateAttendance($dataUpdate, $where);
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil di update');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirectUrlAttendance);
  }
}
