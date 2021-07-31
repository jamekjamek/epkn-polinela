<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supervisor_activity extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Supervisor/Supervisor_activity_model', 'Activity');
    $this->load->model('Supervisor/Supervisor_data_pkl_model', 'DataPkl');
    cek_login('Supervisor');
    $this->redirectUrlDailyLog = 'supervisor/activity/daily_log';
    $this->redirectUrlAttendance = 'supervisor/activity/attendance';
  }

  public function dailyLog()
  {
    $data = [
      'title'         => 'Data Log Harian Mahasiswa PKN',
      'desc'          => 'Berfungsi untuk melihat data log harian mahasiswa PKN',
      'dataPkl'       => $this->DataPkl->listByStudent()->result(),
    ];
    $page = '/supervisor/activity/daily_log';
    pageBackend($this->role, $page, $data);
  }

  public function dailyLogDetail($id)
  {
    $decode         = decodeEncrypt($id);
    $data = [
      'title'         => 'Detail Log Harian Mahasiswa PKN',
      'desc'          => 'Berfungsi untuk melihat detail log harian mahasiswa PKN',
      'dailyLog'      => $this->Activity->getListDailyLog(['registration.id' => $decode])->result(),
      'row'      => $this->Activity->getListDailyLog(['registration.id' => $decode])->row(),
    ];
    $page = '/supervisor/activity/daily_log_detail';
    pageBackend($this->role, $page, $data);
  }

  public function verificationDailyLog()
  {
    $approval = $this->input->post('approval');
    $dailyLog = $this->input->post('dailyLog');

    $this->db->trans_start();
    for ($i = 0; $i < count($approval); $i++) {
      $data = [
        'validation'  => $approval[$i]
      ];
      $update =  $this->Activity->updateDailyLog($data, ['id' => $dailyLog[$i]]);
    }
    $this->db->trans_complete();
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirectUrlDailyLog);
  }

  public function attendance()
  {
    $data = [
      'title'         => 'Data Kehadiran Mahasiswa PKN',
      'desc'          => 'Berfungsi untuk melihat data kehadiran mahasiswa PKN',
      'dataPkl'       => $this->DataPkl->listByStudent()->result(),
    ];
    $page = '/supervisor/activity/attendance';
    pageBackend($this->role, $page, $data);
  }

  public function attendanceDetail($id)
  {
    $decode           = decodeEncrypt($id);
    $data = [
      'title'         => 'Detail Kehadiran Mahasiswa PKN',
      'desc'          => 'Berfungsi untuk melihat detail kehadiran mahasiswa PKN',
      'attendance'    => $this->Activity->getListAttendance(['registration.id' => $decode])->result(),
    ];
    $page = '/supervisor/activity/attendance_detail';
    pageBackend($this->role, $page, $data);
  }

  public function verificationAttendance()
  {
    $approval = $this->input->post('approval');
    $attendance = $this->input->post('attendance');
    $this->db->trans_start();
    for ($i = 0; $i < count($approval); $i++) {
      $data = [
        'validation'  => $approval[$i]
      ];
      $update =  $this->Activity->updateAttendance($data, ['id' => $attendance[$i]]);
    }
    $this->db->trans_complete();
    if ($update > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    } else {
      $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirectUrlAttendance);
  }
}
