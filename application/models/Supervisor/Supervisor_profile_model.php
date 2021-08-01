<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_profile_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'company';
  }

  public function getBy()
  {
    $this->db->select('company.*, supervisor.username');
    $this->db->join('supervisor', 'supervisor.company_id=company.id');
    return $this->db->get_where($this->table, ['supervisor.username' => $this->session->userdata('user')])->row();
  }

  public function update($data)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->table, $data, ['id' => $data['id']]);
    return $this->db->affected_rows();
  }
}
