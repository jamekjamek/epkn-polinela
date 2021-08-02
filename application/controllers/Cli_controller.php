<?php

class Cli_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_daily_model', 'Daily');
  }

  public function index()
  {
  }

  public function insertAttandance()
  {
    // check student in registration with academic year now is active and check registration_id not in check point
    $getAllRegistration = $this->Daily->getRegistrationNotInCurrentCP();
    foreach ($getAllRegistration as $attendance) {
      $dataInsert = [
        'registration_id' => $attendance->id,
        'attendance'      => 'A',
        'note'            => 'automatically by system'
      ];
      $this->db->set('id', 'UUID()', false);
      $this->Daily->insertCP($dataInsert);
      sleep(1);
    }
  }
}
