<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_quesioner_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table        = 'quesioner';
    $this->tableMajor   = 'role';
  }

  public function getData()
  {
    $this->db->select('quesioner.*, role.name');
    $this->db->join($this->tableMajor, 'role.id=quesioner.role_id');
    return $this->db->get($this->table);
  }

  public function getDataById($id)
  {
    return $this->db->get_where($this->table, $id);
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
}
