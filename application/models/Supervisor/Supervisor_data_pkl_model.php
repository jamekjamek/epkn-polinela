<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_data_pkl_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'registration';
    $this->tableCompany = 'company';
    $this->tableStudent = 'student';
    $this->tableLecture = 'lecture';
    $this->tableSupervisor = 'supervisor';
    $this->tableAcademicYear = 'academic_year';
    $this->tableProdi = 'prodi';
    $this->tableSupervisorScore = 'supervisor_score';
  }

  public function listForScore()
  {
    $this->_join();
    $this->db->where('e.username', $this->session->userdata('user'));
    $where  = "(c.status = 'active' OR c.status = 'graduated')";
    $this->db->where($where);
    return $this->db->get($this->table . ' a');
  }

  public function list()
  {
    $this->_join();
    $this->db->where('e.username', $this->session->userdata('user'));
    $this->db->group_by('a.group_id');
    return $this->db->get($this->table . ' a');
  }

  public function listNew()
  {
    $this->_join();
    $this->db->where('e.username', $this->session->userdata('user'));
    $this->db->where('a.status', 'Ketua');
    $this->db->group_by('a.group_id');
    $this->db->group_by('a.id');
    $where  = "(c.status = 'active' OR c.status = 'graduated')";
    $this->db->where($where);
    return $this->db->get($this->table . ' a');
  }


  public function listByStudent()
  {
    $this->_join();
    $this->db->where('e.username', $this->session->userdata('user'));
    $where  = "(c.status = 'active' OR c.status = 'graduated')";
    $this->db->where($where);
    $this->db->group_by('a.id');
    return $this->db->get($this->table . ' a');
  }

  public function getDataPklBy($id)
  {
    $this->_join();
    return $this->db->get_where($this->table . ' a', $id);
  }

  private function _join()
  {
    $this->db->select('a.*,b.id company_id, b.pic, b.telp, b.name company_name,c.fullname,c.npm,c.email student_email,c.no_hp,c.address,d.name as lecture_name,e.username pl,g.name prodi_name,h.nilai_total as score');
    $this->db->join($this->tableCompany . ' b', 'a.company_id=b.id', 'LEFT');
    $this->db->join($this->tableStudent . ' c', 'a.student_id=c.id', 'LEFT');
    $this->db->join($this->tableLecture . ' d', 'a.lecture_id=d.id', 'LEFT');
    $this->db->join($this->tableSupervisor . ' e', 'a.supervisor_id=e.id', 'LEFT');
    $this->db->join($this->tableAcademicYear . ' f', 'a.academic_year_id=f.id');
    $this->db->join($this->tableProdi . ' g', 'g.id=a.prodi_id');
    $this->db->join($this->tableSupervisorScore . ' h', 'a.id=h.registration_id', 'LEFT');
  }

  public function getBySupervisorScore($id)
  {
    return $this->db->get_where($this->tableSupervisorScore, $id);
  }

  public function insert($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->tableSupervisorScore, $data);
    return $this->db->affected_rows();
  }

  public function update($data, $where)
  {
    $this->db->update($this->tableSupervisorScore, $data, $where);
    return $this->db->affected_rows();
  }
}
