<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_verification_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table        = 'list_check_validation';
    $this->tableStudent = 'student';
  }

  public function getDataStudent($data)
  {
    return $this->db->get_where($this->tableStudent, $data);
  }
}
