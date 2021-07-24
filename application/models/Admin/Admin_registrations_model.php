<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_registrations_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table                = 'registration';
    $this->tableCompany         = 'company';
    $this->tableStudent         = 'student';
    $this->tableProdi           = 'prodi';
    $this->tableMajor           = 'major';
    $this->tablePeriode         = 'periode';
    $this->tableHistory         = 'history_registration';
    $this->tableAcademicYear    = 'academic_year';
    $this->tableLecture         = 'lecture';
    $this->tableResponseLetter  = 'response_letter';
    $this->tableSupervisor      = 'supervisor';
    $this->tableRegency         = 'regency';
    $this->tableProvince        = 'province';
    $this->tableDistricts       = 'districts';
  }

  public function getAllData()
  {
    $this->_join();
    // $this->db->group_by('a.group_id');
    $this->db->where('a.status =', 'Ketua');
    $this->db->order_by('a.created_at', 'DESC');
    return $this->db->get($this->table . ' a');
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->affected_rows();
  }

  public function update($data, $where)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function getDataBy($data, $where = null, $groupId = null)
  {
    $this->_join();
    if ($where && $groupId) {
      $this->db->where($where);
      $this->db->where('a.group_id !=', $groupId);
      $this->db->where('a.group_status !=', 'ditolak');
    }
    return $this->db->get_where($this->table . ' a', $data);
  }

  public function getLecture($prodiId)
  {
    $this->db->where_in('prodi_id', $prodiId);
    return $this->db->get($this->tableLecture);
  }

  public function getDataStudentBy($data)
  {
    return $this->db->get_where($this->tableStudent, $data);
  }

  public function getDataPeriode()
  {
    $today  = date('Y-m-d');
    $this->db->where('finish_time >=', $today);
    $this->db->where('type =', 3);
    $this->db->limit(1);
    $this->db->order_by('finish_time', 'ASC');
    return $this->db->get($this->tablePeriode);
  }

  private function _join()
  {
    $this->db->select('a.*,b.id company_id, b.pic, b.telp, b.name company_name,b.prodi_id prodi_company_id,c.fullname,c.npm,c.gender,c.email student_email,d.id prodi_id,d.name prodi_name,d.code prodi_code, e.name major_name,f.name as lecture_name,g.username pl,i.name districts,j.name regency,k.name province');
    $this->db->join($this->tableCompany . ' b', 'a.company_id=b.id', 'LEFT');
    $this->db->join($this->tableStudent . ' c', 'a.student_id=c.id', 'LEFT');
    $this->db->join($this->tableProdi . ' d', 'c.prodi_id=d.id', 'LEFT');
    $this->db->join($this->tableMajor . ' e', 'd.major_id=e.id', 'LEFT');
    $this->db->join($this->tableLecture . ' f', 'a.lecture_id=f.id', 'LEFT');
    $this->db->join($this->tableSupervisor . ' g', 'a.supervisor_id=g.id', 'LEFT');
    $this->db->join($this->tableDistricts . ' i', 'b.districts_id=i.id', 'LEFT');
    $this->db->join($this->tableRegency . ' j', 'b.regency_id=j.id');
    $this->db->join($this->tableProvince . ' k', 'b.province_id=k.id');
  }

  public function getDataHistory()
  {
    $this->db->select('a.*,b.username');
    $this->db->join('user b', 'a.user_id=b.id');
    $this->db->order_by('a.created_at', 'DESC');
    return $this->db->get($this->tableHistory . ' a');
  }

  public function getDataCompanyBy($data)
  {
    return $this->db->get_where($this->tableCompany, $data);
  }

  public function getDataCompanyInRegistration($data, $start, $finish)
  {
    $this->db->where($data);
    $this->db->where('created_at >=', $start);
    $this->db->where('created_at <=', $finish);
    $this->db->where('group_status !=', 'ditolak');
    $this->db->where('verify_member !=', 'Ditolak');
    return $this->db->get($this->table);
  }

  public function uploaded($data)
  {
    $this->db->set('id', 'UUID()', false);
    $this->db->insert($this->tableResponseLetter, $data);
    return $this->db->affected_rows();
  }

  public function getResponseLetter($data)
  {
    return $this->db->get_where($this->tableResponseLetter, $data);
  }

  public function lastSupervisorData()
  {
    $this->db->select('*');
    $this->db->order_by('created_at', 'DESC');
    $this->db->limit(1);
    return $this->db->get($this->tableSupervisor)->row();
  }

  public function getStudent($data = null, $prodi_id = null)
  {
    $query  = "SELECT * FROM `" . $this->tableStudent . "` `a` WHERE `id` NOT IN (SELECT `student_id` FROM `" . $this->table . "` WHERE `verify_member` != 'Ditolak' AND `group_status` != 'ditolak')";
    if ($prodi_id) {
      $query .= "AND `prodi_id` = '$prodi_id'";
    }
    if ($data === 'random') {
      $query .= "ORDER BY RAND()";
    }
    if ($data === 'randomlimit') {
      $query .= "ORDER BY RAND() LIMIT 2";
    }
    return $this->db->query($query);
  }

  public function getCompany($data = null)
  {
    $query = "SELECT * FROM `company`";
    $query .= "WHERE `id` NOT IN (SELECT `company_id` FROM `" . $this->table . "` WHERE `verify_member` != 'Ditolak' AND `group_status` != 'ditolak' AND `status` = 'Ketua')";
    if ($data === 'random') {
      $query .= "ORDER BY rand() LIMIT 1";
    }
    return $this->db->query($query);
  }

  public function getRegistrationBy($data = null)
  {
    if ($data === 'limit') {
      $this->db->order_by('created_at', 'DESC');
      $this->db->limit(1);
    }
    return $this->db->get($this->table);
  }

  public function getProdiWhereProdiNot($id)
  {
    $this->db->order_by('id', 'RAND()');
    $this->db->limit(3);
    return $this->db->get_where('prodi', ['id !=' => $id])->result();
  }

  public function getProdiWhereProdi($id)
  {
    return $this->db->get_where('prodi', ['id' => $id])->row();
  }
}
