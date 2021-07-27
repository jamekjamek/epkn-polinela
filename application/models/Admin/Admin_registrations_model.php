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

  public function getStudent($data, $academicId = null, $prodi_id = null, $gender = null)
  {
    $academicwhere = ($academicId) ? "AND `academic_year_id` ='$academicId'" : "";
    $query  = "SELECT * FROM `" . $this->tableStudent . "` `a` WHERE `id` NOT IN (SELECT `student_id` FROM `" . $this->table . "` WHERE `verify_member` != 'Ditolak' AND `group_status` != 'ditolak' $academicwhere )";
    if ($prodi_id) {
      $query .= "AND `prodi_id` = '$prodi_id'";
    }
    if ($gender) {
      $query .= "AND `gender` = '$gender'";
    }
    if ($data === 'random') {
      $query .= "ORDER BY RAND()";
    }
    if ($data === 'randomlimit') {
      $query .= "ORDER BY RAND() LIMIT 2";
    }
    return $this->db->query($query);
  }

  public function getCompany($orderBy = null, $academicId = null)
  {
    $academicwhere = ($academicId) ? "AND `academic_year_id` ='$academicId'" : "";
    $query = "SELECT * FROM `company`";
    $query .= "WHERE `id` NOT IN (SELECT `company_id` FROM `" . $this->table . "` WHERE `verify_member` != 'Ditolak' AND `group_status` != 'ditolak' AND `status` = 'Ketua' $academicwhere )";
    if ($orderBy === 'random') {
      $query .= "ORDER BY rand() LIMIT 1";
    } else if ($orderBy === 'prodi') {
      $query .= "ORDER BY prodi_id DESC LIMIT 1";
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

  public function getProdiIdWhereProdi($id, $academicId, $limit, $isProdi = true)
  {
    $queryisProdi = ($isProdi) ? "a.`prodi_id` = '$id'" : "a.`prodi_id` <> '$id'";
    $query = "SELECT a.prodi_id, count(a.id) AS jumlahmhs, count(case when a.gender='L' then 1 end) as male_cnt, count(case when a.gender='P' then 1 end) as female_cnt FROM `student` a WHERE a.`id` NOT IN (SELECT student_id FROM `registration` WHERE student_id = a.id AND academic_year_id='$academicId') AND $queryisProdi AND a.`academic_year_id` ='$academicId' AND a.`status` = '-' GROUP BY a.prodi_id ORDER BY jumlahmhs DESC LIMIT $limit";
    return $this->db->query($query);
  }

  public function getLectureIdByProdiIdLeader($prodi_id, $academicId, $checkinRegisterTable = true)
  {
    if ($checkinRegisterTable) {
      $query = "SELECT
                  COUNT(b.id) cnt_lecture_used,
                  a.id
                FROM
                  lecture a
                  LEFT JOIN registration b ON a.id = b.lecture_id
                WHERE
                  a.prodi_id = '$prodi_id'
                  AND b.academic_year_id = '$academicId'
                GROUP BY
                  a.id
                ORDER BY
                  cnt_lecture_used DESC
                LIMIT
                  1";
    }

    $query = "SELECT
                a.id
              FROM
                lecture a
              WHERE
                a.id NOT IN (
                  SELECT
                    student_id
                  FROM
                    `registration`
                  WHERE
                    lecture_id = a.id
                    AND academic_year_id = '$academicId'
                )
              AND 
              a.prodi_id = '$prodi_id'
              ORDER BY RAND() LIMIT 1";

    return $this->db->query($query)->row();
  }
}
