<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_registration_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'registration';
    $this->studentTable = 'student';
    $this->t_responseLetter = 'response_letter';
    $this->tableCompany = 'company';
    $this->tableProdi = 'prodi';
    $this->tableMajor = 'major';
    $this->tablePeriode = 'periode';
    $this->tableHistory = 'history_registration';
    $this->tableAcademicYear = 'academic_year';
    $this->tableLecture = 'lecture';
    $this->tableResponseLetter = 'response_letter';
    $this->tableSupervisor = 'supervisor';
  }

  public function list()
  {
    $this->_joinTable();
    $this->db->order_by('registration.created_at', 'DESC');
    return $this->db->get_where($this->table, ['student.npm' => $this->session->userdata('user')]);
  }

  public function getAll($groupId, $leader = null)
  {
    $this->_joinTable();
    $this->db->where('registration.group_id', $groupId);
    if ($leader) {
      $this->db->where('registration.status', $leader);
    }
    return $this->db->get($this->table);
  }

  private function _joinTable()
  {
    $this->db->select('registration.*, company.name as company_name,company.pic, student.npm,student.fullname, student.status as student_status, prodi.name as prodi_name, lecture.name as lecture_name, academic_year.name as academic_year, academic_year.status as academic_year_status');
    $this->db->join($this->tableCompany, 'company.id=registration.company_id');
    $this->db->join($this->studentTable, 'student.id=registration.student_id');
    $this->db->join($this->tableProdi, 'prodi.id=registration.prodi_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id', 'LEFT');
    $this->db->join($this->tableSupervisor, 'supervisor.id=registration.supervisor_id', 'LEFT');
    $this->db->join($this->tableAcademicYear, 'academic_year.id=registration.academic_year_id');
  }

  public function getDataStudentBy($data)
  {
    $this->db->select('student.*,major.id as major_id');
    $this->db->join($this->tableProdi, 'prodi.id=student.prodi_id');
    $this->db->join($this->tableMajor, 'major.id=prodi.major_id');
    return $this->db->get_where($this->studentTable, $data);
  }

  public function getStudentProdi()
  {
    return $this->db->get_where($this->studentTable, ['npm' => $this->session->userdata('user')])->row_array();
  }

  public function uploaded($data)
  {
    $this->db->set('id', 'UUID()', false);
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->insert($this->t_responseLetter, $data);
    return $this->db->affected_rows();
  }
}
