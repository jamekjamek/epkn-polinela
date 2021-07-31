<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_program_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'planning';
    $this->tableRegistration = 'registration';
    $this->tableCompany = 'company';
    $this->tableStudent = 'student';
    $this->tableProdi = 'prodi';
    $this->tableMajor = 'major';
    $this->tableLecture = 'lecture';
  }

  public function list($data)
  {
    $this->_join();
    $this->db->where('registration.group_id', $data);
    return $this->db->get($this->table);
  }

  public function getDataById($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row();
  }

  public function insert($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->table, $data);
    return $this->db->affected_rows();
  }

  public function update($data, $where)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->table, $data, ['id' => $where]);
    return $this->db->affected_rows();
  }

  public function isCheck()
  {
    return $this->db->get_where('v_group_pkl_student', ['npm' => $this->session->userdata('user')]);
  }

  public function _join()
  {
    $this->db->select('planning.id,planning.learning_achievement,planning.learning_achievement_sub,planning.time_qty,planning.approval ,registration.company_id,company.name, registration.student_id, registration.group_id, registration.group_status, student.npm, student.fullname, registration.prodi_id, prodi.name AS prodi_name, major.name AS major_name,registration.lecture_id, lecture.nip ,lecture.name AS lecture_name, company.pic,registration.supervisor_id');
    $this->db->join($this->tableRegistration, 'registration.id=planning.registration_id');
    $this->db->join($this->tableCompany, 'company.id= registration.company_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableProdi, 'prodi.id=registration.prodi_id');
    $this->db->join($this->tableMajor, 'major.id=prodi.major_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
  }

  public function getCapaian($id)
  {
    // SELECT learning_achievement FROM planning JOIN registration ON registration.id=planning.registration_id JOIN student ON student.id=registration.student_id WHERE planning.approval=1 AND student.npm = '18751013' ORDER BY planning.updated_at
    $this->db->select('learning_achievement');
    $this->db->join($this->tableRegistration, 'registration.id=planning.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->where('planning.approval', 1);
    $this->db->where('registration.group_id', $id);
    return $this->db->get($this->table);
  }

  public function getSubCapaian()
  {
    // SELECT learning_achievement FROM planning JOIN registration ON registration.id=planning.registration_id JOIN student ON student.id=registration.student_id WHERE planning.approval=1 AND student.npm = '18751013' ORDER BY planning.updated_at
    $this->db->select('learning_achievement_sub');
    $this->db->join($this->tableRegistration, 'registration.id=planning.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->where('planning.approval', 1);
    $this->db->where('student.npm', $this->session->userdata('user'));
    return $this->db->get($this->table);
  }

  public function groupByCheck()
  {
    return $this->db->query("SELECT registration.group_id, registration.group_status FROM registration JOIN student ON student.id = registration.student_id WHERE student.npm = '" . $this->session->userdata('user') . "'");
  }
}
