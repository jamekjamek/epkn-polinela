<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function userCheck($username)
  {
    $this->db->select('a.*,b.id role_id,b.name');
    $this->db->join('role as b', 'a.role_id=b.id');
    $query = $this->db->get_where('user as a', ['a.username' => $username, 'a.is_active' => 1]);
    return $query;
  }

  function cek_login()
  {
    if (empty($this->session->userdata('is_login'))) {
      redirect('auth');
    }
  }

  function showNameLogin()
  {
    switch ($this->session->userdata('role')) {
      case 'Mahasiswa':
        $query = "SELECT student.fullname FROM student WHERE npm = '" . $this->session->userdata('user') . "'";
        return $this->db->query($query)->row_array();
        break;
      case 'Dosen':
        $query = "SELECT lecture.id, lecture.name as lecture_name FROM lecture WHERE nip = '" . $this->session->userdata('user') . "'";
        return $this->db->query($query);
        break;
      case 'Supervisor':
        $query = "SELECT supervisor.id, company.pic FROM company JOIN supervisor ON supervisor.company_id=company.id WHERE supervisor.username = '" . $this->session->userdata('user') . "'";
        return $this->db->query($query)->row_array();
        break;
      default:
        echo 'NOT USER FOUND!';
    }
  }

  public function update($data, $id)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update('user', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }
}
