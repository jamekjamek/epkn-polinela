<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_daily_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableDailyLog = 'daily_log';
    $this->tableCheckPoint = 'check_point';
    $this->tableRegistration = 'registration';
    $this->tableStudent = 'student';
  }

  public function dailyList()
  {
    $this->_logJoin();
    $this->db->where('student.npm', $this->session->userdata('user'));
    return $this->db->get($this->tableDailyLog)->result();
  }

  public function getDataLogBy($id)
  {
    return $this->db->get_where($this->tableDailyLog, $id);
  }

  public function insert($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->tableDailyLog, $data);
    return $this->db->affected_rows();
  }

  public function update($data, $where)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->tableDailyLog, $data, ['id' => $where]);
    return $this->db->affected_rows();
  }

  public function checkPointList()
  {
    $this->_cpJoin();
    $this->db->where('student.npm', $this->session->userdata('user'));
    return $this->db->get($this->tableCheckPoint)->result();
  }

  public function insertCP($data)
  {

    $this->db->insert($this->tableCheckPoint, $data);
    return $this->db->affected_rows();
  }

  public function isCheck()
  {
    return $this->db->get_where('v_group_pkl_student', ['npm' => $this->session->userdata('user')]);
  }

  public function btnCheckAttendance()
  {
    $query = "SELECT check_point.id, check_point.registration_id, check_point.time_in, check_point.time_out, check_point.attendance, check_point.validation, check_point.created_at FROM check_point JOIN registration ON registration.id=check_point.registration_id JOIN student ON student.id=registration.student_id WHERE student.npm = '" . $this->session->userdata('user') . "' ORDER BY check_point.created_at DESC LIMIT 1";
    return $this->db->query($query);
  }

  private function _logJoin()
  {
    $this->db->select('*');
    $this->db->join($this->tableRegistration, 'registration.id=daily_log.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
  }

  private function _cpJoin()
  {
    $this->db->select('*');
    $this->db->join($this->tableRegistration, 'registration.id=check_point.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
  }
}
