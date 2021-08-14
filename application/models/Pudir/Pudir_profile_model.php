<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pudir_profile_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableUser = 'user';
  }

  public function getBy()
  {
    return $this->db->query("SELECT user.id as user_id,user.username, user.password FROM user WHERE user.username = '" . $this->session->userdata('user') . "'")->row();
  }

  public function updateUserPassword($data)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->tableUser, $data, ['id' => $data['id']]);
    return $this->db->affected_rows();
  }
}
