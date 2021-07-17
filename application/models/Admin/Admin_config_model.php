<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_config_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableUser            = 'user';
    $this->tableMajor           = 'major';
    $this->tableProdi           = 'prodi';
    $this->tableRegency         = 'regency';
    $this->tableProvince        = 'province';
    $this->tableStudent         = 'student';
    $this->tableRegistration    = 'registration';
    $this->tableCompany         = 'company';
    $this->tableHistory         = 'history_registration';
    $this->tableKajur           = 'head_of_department';
    $this->tableAcademic        = 'academic_year';
    $this->tableDistrics        = 'districts';
  }

  public function insertUserTable($data)
  {
    $this->db->insert($this->tableUser, $data);
    return $this->db->affected_rows();
  }

  public function getDataUserBy($where)
  {
    return $this->db->get_where($this->tableUser, $where);
  }

  public function updateUser($data, $where)
  {
    $this->db->update($this->tableUser, $data, $where);
    return $this->db->affected_rows();
  }

  public function deleteUser($data)
  {
    $this->db->delete($this->tableUser, $data);
    return $this->db->affected_rows();
  }

  public function getMajor()
  {
    return $this->db->get($this->tableMajor);
  }




  //SELECT 2 AJAX
  public function getProdiBy($input, $majorEmail = null) //getprodi atau major
  {
    $query = "SELECT `a`.`id` `prodi_id`, `a`.`name` `prodi_name`, `b`.`name` `major_name`, `b`.`email` `major_email` 
                    FROM `prodi` `a` 
                    JOIN `major` `b` ON `a`.`major_id`=`b`.`id` 
                    WHERE ( `a`.`name` LIKE '%$input%' ESCAPE '!' OR `b`.`name` LIKE '%$input%' ESCAPE '!')";
    if ($majorEmail) {
      $query .= "AND `b`.`email` = '" . $majorEmail . "' LIMIT 10";
    }

    return $this->db->query($query);
  }

  public function getRegencyBy($input = null)
  {
    $this->db->select('a.id regency_id,a.name regency_name,b.id province_id,b.name province_name,c.id districs_id, c.name districs');
    $this->db->join($this->tableProvince . ' b', 'a.province_id=b.id');
    $this->db->join($this->tableDistrics . ' c', 'c.regency_id=a.id');
    if ($input) {
      $this->db->like('a.name', $input);
      $this->db->or_like('b.name', $input);
      $this->db->or_like('c.name', $input);
      $this->db->limit(10);
    }
    return $this->db->get_where($this->tableRegency . ' a');
  }

  public function getStudent($input = null, $prodiId = null, $leaderId = null)
  {
    $query = "SELECT `a`.*,`b`.`name` `prodi_name`,`c`.`name` `major_name`
                    FROM `" . $this->tableStudent . "` `a` 
                    LEFT JOIN `" . $this->tableProdi . "` `b` ON `a`.`prodi_id`=`b`.`id`
                    LEFT JOIN `" . $this->tableMajor . "` `c` ON `b`.`major_id`=`c`.`id`";
    if ($input) {
      $query .=   "WHERE (`a`.`fullname` LIKE '%$input%' ESCAPE '!' OR `b`.`name` LIKE '%$input%' ESCAPE '!' OR `a`.`npm` LIKE '%$input%' ESCAPE '!')";
    }

    if ($leaderId) {
      $query .= "WHERE `a`.`id` != '" . $leaderId . "'";
    }
    $query .= 'AND `b`.`id` ="' . $prodiId . '" ';
    $query .=      "AND `a`.`id` NOT IN (SELECT `student_id` FROM `" . $this->tableRegistration . "` WHERE `verify_member` != 'Ditolak' AND `group_status` != 'ditolak')";
    return $this->db->query($query);
  }

  public function getCompany($input)
  {
    $query = "SELECT `a`.*,`b`.`name` `regency_name`, `c`.`name` `province_name`
                    FROM `" . $this->tableCompany . "` `a`
                    LEFT JOIN `" . $this->tableRegency . "` `b` ON `a`.`regency_id`=`b`.`id`
                    LEFT JOIN `" . $this->tableProvince . "` `c` ON `b`.`province_id`=`c`.`id`
                    WHERE (`a`.`name` LIKE '%$input%' ESCAPE '!' OR `b`.`name` LIKE '%$input%' ESCAPE '!' OR `c`.`name` LIKE '%$input%' ESCAPE '!') 
                    LIMIT 10
        ";
    return $this->db->query($query);
  }

  public function cekProv($regencyId)
  {
    return $this->db->get_where($this->tableRegency, ['id' => $regencyId])->row();
  }

  public function importData($data = array())
  {
    $jumlah = count($data);
    if ($jumlah > 0) {
      $this->db->set('id', 'UUID()', FALSE);
      $this->db->replace($this->tableUser, $data);
    }
  }

  public function getLastIdRegistration($params = null)
  {
    $this->db->order_by('updated_at', 'DESC');
    $this->db->limit(1);
    if ($params) {
      $this->db->where($params);
    }
    return $this->db->get($this->tableRegistration);
  }


  public function insertHistory($data)
  {
    $this->db->insert($this->tableHistory, $data);
    return $this->db->affected_rows();
  }

  public function insert($table, $data)
  {
    $this->db->insert($table, $data);
    return $this->db->affected_rows();
  }

  public function delete($table, $data)
  {
    $this->db->delete($table, $data);
    return $this->db->affected_rows();
  }


  public function update($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
    return $this->db->affected_rows();
  }

  public function getDataAcademicYear($data = null)
  {
    if ($data) {
      $this->db->where($data);
    }
    return $this->db->get($this->tableAcademic);
  }

  public function getAllMajor()
  {
    $this->db->select('a.*,b.id as prodi_id,b.name as prodi');
    $this->db->join($this->tableProdi . ' b', 'b.major_id=a.id', 'LEFT');
    return $this->db->get($this->tableMajor . ' a');
  }

  public function getDataProdiBy($data = null)
  {
    return $this->db->get_where($this->tableProdi, $data);
  }
}
