<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->tableLetterConfig  = 'letter_config';
    $this->tableDocument      = 'document';
    $this->tableRegistration  = 'registration';
    $this->tableCompany       = 'company';
    $this->tableRegency       = 'regency';
    $this->tableStudent       = 'student';
    $this->tableProdi         = 'prodi';
    $this->tableUser          = 'user';
    $this->tableLecture       = 'lecture';
    $this->tableKaprodi       = 'head_of_study_program';
    $this->tableAcademic      = 'academic_year';
  }

  public function list()
  {
    return $this->db->get('document')->result();
  }

  public function getEnvelopeByLeader()
  {
    $query = "SELECT registration.company_id, registration.copy_later, company.pic, company.name, company.address, company.telp FROM registration JOIN company ON company.id = registration.company_id JOIN student ON student.id = registration.student_id WHERE registration.status = 'Ketua' AND student.npm = '" . $this->session->userdata('user') . "'";
    return $this->db->query($query)->row_array();
  }

  public function getPermohonanPkl()
  {
  }

  public function isCheck()
  {
    return $this->db->get_where('v_group_pkl_student', ['npm' => $this->session->userdata('user')])->row_array();
  }

  public function updateGroupStatus($data)
  {
    $this->db->update('registration', $data, ['group_id' => $data['group_id'], 'verify_member' => 'Diterima']);
    return $this->db->affected_rows();
  }



  //Agung
  public function getDataBy($data)
  {
    return $this->db->get_where($this->tableLetterConfig, $data);
  }

  public function getRegistrationDataBy($data, $leader = null)
  {
    $this->db->select('a.*,b.name company_name,c.name as address,d.fullname as student,d.npm,d.email student_email,e.name prodi_name,f.name as academicyear');
    $this->db->join($this->tableCompany . ' b', 'a.company_id=b.id', 'LEFT');
    $this->db->join($this->tableRegency . ' c', 'b.regency_id=c.id', 'LEFT');
    $this->db->join($this->tableStudent . ' d', 'a.student_id=d.id', 'LEFT');
    $this->db->join($this->tableProdi . ' e', 'd.prodi_id=e.id', 'LEFT');
    $this->db->join($this->tableAcademic . ' f', 'a.academic_year_id=f.id', 'LEFT');
    $this->db->where($data);
    $this->db->where('a.group_status !=', 'ditolak');
    $this->db->where('a.verify_member !=', 'Ditolak');
    if ($leader) {
      $this->db->where('a.status', 'Ketua');
    } else {
      $this->db->order_by('d.npm', 'ASC');
    }
    return $this->db->get($this->tableRegistration . ' a');
  }

  public function getUserInRegistration($user)
  {
    $this->db->select('a.group_id');
    $this->db->join($this->tableStudent . ' b', 'a.student_id=b.id');
    $this->db->join($this->tableUser . ' c', 'b.npm=c.username');
    $this->db->where('c.username', $user);
    $this->db->where('a.group_status !=', 'ditolak');
    return $this->db->get($this->tableRegistration . ' a');
  }

  public function getPlanningBy()
  {
    $query = "SELECT planning.*,student.fullname, student.npm,major.name as major_name,prodi.name as prodi_name, company.name as company_name, lecture.nip, lecture.name as lecture_name FROM planning JOIN registration on registration.id=planning.registration_id JOIN student on student.id=registration.student_id JOIN prodi ON prodi.id=student.prodi_id JOIN major ON major.id=prodi.major_id JOIN company on company.id=registration.company_id JOIN lecture on lecture.id=registration.lecture_id WHERE student.npm =" . $this->session->userdata('user');
    return $this->db->query($query);
  }

  public function responseLetterFile()
  {
    $query = "SELECT response_letter.file FROM response_letter JOIN registration ON registration.group_id=response_letter.registration_group_id JOIN student ON student.id=registration.student_id WHERE student.npm = " . $this->session->userdata('user');
    return $this->db->query($query)->row();
  }


  public function getKaprodi($prodi)
  {
    $this->db->select('a.*,b.name');
    $this->db->join($this->tableKaprodi . ' a', 'a.lecture_id=b.id');
    return $this->db->get_where($this->tableLecture . ' b', ['a.prodi_id' => $prodi, 'a.status' => '1']);
  }
}
