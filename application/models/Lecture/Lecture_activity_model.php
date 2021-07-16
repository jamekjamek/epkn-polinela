<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecture_activity_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableDailyLog = 'daily_log';
    $this->tableAttendance = 'check_point';
    $this->tableRegistration = 'registration';
    $this->tableStudent = 'student';
    $this->tableLecture = 'lecture';
    $this->tableAcademicYear = 'academic_year';
  }

  public function getListDailyLog($academic_year_id = null)
  {
    $this->db->select('daily_log.*,student.npm,student.fullname');
    $this->db->join($this->tableRegistration, 'registration.id=daily_log.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
    $this->db->join($this->tableAcademicYear, 'academic_year.id=registration.academic_year_id');
    if ($academic_year_id) {
      $this->db->where('academic_year.id', $academic_year_id);
    } else {
      $this->db->where('academic_year.status', 1);
    }
    return $this->db->get_where($this->tableDailyLog, ['lecture.nip' => $this->session->userdata('user')])->result();
  }

  public function getListAttendance($academic_year_id = null)
  {
    $this->db->select('check_point.*,student.npm,student.fullname');
    $this->db->join($this->tableRegistration, 'registration.id=check_point.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
    $this->db->join($this->tableAcademicYear, 'academic_year.id=registration.academic_year_id');
    if ($academic_year_id) {
      $this->db->where('academic_year.id', $academic_year_id);
    } else {
      $this->db->where('academic_year.status', 1);
    }
    return $this->db->get_where($this->tableAttendance, ['lecture.nip' => $this->session->userdata('user')])->result();
  }
}
