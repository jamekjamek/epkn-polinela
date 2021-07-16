<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_report_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'willingness_to_accept';
    $this->tableProdi = 'prodi';
    $this->tableMajor = 'major';
    $this->tableCompany = 'company';
    $this->tableSupervisor = 'supervisor';
    $this->tableAcademicYear = 'academic_year';
  }

  public function getByReport($id)
  {
    return $this->db->get_where($this->table, $id);
  }

  public function getProdi()
  {
    $this->db->select('prodi.id as prodi_id, prodi.name as prodi_name, prodi.degree');
    $this->db->join($this->tableMajor, 'major.id=prodi.major_id');
    $this->db->order_by('major.id', 'ASC');
    return $this->db->get($this->tableProdi);
  }

  public function getMyCompany()
  {
    $this->db->select('company.*');
    $this->db->join($this->tableSupervisor, 'supervisor.company_id=company.id');
    return $this->db->get_where($this->tableCompany, ['supervisor.username' => $this->session->userdata('user')]);
  }

  public function getAcademicYearIsActive()
  {
    return $this->db->get_where($this->tableAcademicYear, ['status' => 1]);
  }

  public function insert($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->table, $data);
    return $this->db->affected_rows();
  }

  public function update($data, $where)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete($this->table, $id);
    return $this->db->affected_rows();
  }
}
