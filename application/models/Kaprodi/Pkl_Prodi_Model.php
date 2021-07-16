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
}
