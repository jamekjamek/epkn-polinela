<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkl_Prodi_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'prodi';
  }

  public function getByEmail($email)
  {
    return $this->db->get_where($this->table, ['email' => $email])->row();
  }

  public function getByEmailCheckStatusKaprodi($email)
  {
    $this->db->select('a.*,b.no_hp,c.name lecture,c.nip');
    $this->db->join($this->tableKaprodi . ' b', 'b.prodi_id=a.id');
    $this->db->join($this->tableLecture . ' c', 'b.lecture_id=c.id');
    $this->db->where('b.status', 1);
    return $this->db->get_where($this->table . ' a', ['a.email' => $email])->row();
  }
}
