<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_activity_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableDailyLog = 'daily_log';
    $this->tableAttendance = 'check_point';
    $this->tableRegistration = 'registration';
    $this->tableStudent = 'student';
    $this->tableSupervisor = 'supervisor';
  }

  public function getListDailyLog()
  {
    $this->db->select('daily_log.*,student.npm,student.fullname');
    $this->db->join($this->tableRegistration, 'registration.id=daily_log.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableSupervisor, 'supervisor.id=registration.supervisor_id');
    $this->db->order_by('daily_log.created_at', 'DESC');
    return $this->db->get_where($this->tableDailyLog, ['supervisor.username' => $this->session->userdata('user')]);
  }

  public function updateDailyLog($data, $where)
  {
    $this->db->update($this->tableDailyLog, $data, $where);
    return $this->db->affected_rows();
  }

  public function getListAttendance()
  {
    $this->db->select('check_point.*,student.npm,student.fullname');
    $this->db->join($this->tableRegistration, 'registration.id=check_point.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableSupervisor, 'supervisor.id=registration.supervisor_id');
    $this->db->order_by('check_point.created_at', 'DESC');
    return $this->db->get_where($this->tableAttendance, ['supervisor.username' => $this->session->userdata('user')]);
  }

  public function updateAttendance($data, $where)
  {
    $this->db->update($this->tableAttendance, $data, $where);
    return $this->db->affected_rows();
  }
}
