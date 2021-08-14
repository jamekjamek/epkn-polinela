<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_config_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'major';
    $this->tableProdi = 'prodi';
    $this->tableAcademicYear = 'academic_year';
  }

  public function getDataBy($data)
  {
    return $this->db->get_where($this->table, $data);
  }

  public function getDataByProdi($data)
  {
    $this->db->select('major.*,prodi.id as prodi_id,prodi.name as prodi_name');
    $this->db->join($this->tableProdi, 'prodi.major_id=major.id');
    return $this->db->get_where($this->table, $data);
  }

  public function getByEmail($email)
  {
    return $this->db->get_where($this->table, ['email' => $email])->row();
  }

  public function getDataAcademicYear()
  {
    return $this->db->get($this->tableAcademicYear)->result();
  }
}
