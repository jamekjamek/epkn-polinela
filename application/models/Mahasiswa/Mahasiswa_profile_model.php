<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_profile_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'student';
  }

  public function getBy()
  {
    $this->db->select('student.*,prodi.name as prodi_name');
    $this->db->join('prodi', 'prodi.id=student.prodi_id');
    return $this->db->get_where($this->table, ['npm' => $this->session->userdata('user')])->row();
  }

  public function update($data)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->table, $data, ['npm' => $data['npm']]);
    return $this->db->affected_rows();
  }
}
