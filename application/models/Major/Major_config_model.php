<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_config_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table    = 'major';
  }

  public function getDataBy($data)
  {
    return $this->db->get_where($this->table, $data);
  }

  public function getByEmail($email)
  {
    return $this->db->get_where($this->table, ['email' => $email])->row();
  }
}
