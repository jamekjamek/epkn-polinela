<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_students_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table        = 'student';
    $this->tableProdi   = 'prodi';
    $this->tableMajor   = 'major';
  }

  public function getAllData()
  {
    $this->_join();
    return $this->db->get($this->table . ' as a');
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->affected_rows();
  }

  public function getDataBy($data)
  {
    $this->_join();
    return $this->db->get_where($this->table . ' as a', $data);
  }

  public function update($data, $where)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete($data)
  {
    $this->db->delete($this->table, $data);
    return $this->db->affected_rows();
  }

  public function importData($data = array())
  {
    $jumlah = count($data);
    if ($jumlah > 0) {
      $this->db->set('id', 'UUID()', FALSE);
      $this->db->replace($this->table, $data);
    }
  }

  private function _join()
  {
    $this->db->select('a.*,b.name prodi_name,c.name major_name');
    $this->db->join($this->tableProdi . ' as b', 'a.prodi_id=b.id');
    $this->db->join($this->tableMajor . ' as c', 'b.major_id=c.id');
  }
}
