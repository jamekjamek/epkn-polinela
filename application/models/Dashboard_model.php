<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableAcademicYear = 'academic_year';
    $this->tableCompany = 'company';
    $this->tableRegistration = 'registration';
    $this->tableStudent = 'student';
  }

  public function getAcademicYear()
  {
    $this->db->select('name');
    return $this->db->get_where($this->tableAcademicYear, ['status' => 1])->row();
  }

  public function getLocation($id = null)
  {
    if ($this->session->userdata('role') == 'Dosen') {
      $query = $this->db->query("SELECT COUNT(registration.company_id) as location_count FROM registration JOIN company On company.id=registration.company_id JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=registration.academic_year_id WHERE registration.lecture_id = '$id' AND academic_year.status = 1 GROUP BY registration.company_id");
    } else if ($this->session->userdata('role') == 'Prodi') {
      $query = $this->db->query("SELECT COUNT(DISTINCT registration.company_id) as location_count FROM registration JOIN company On company.id=registration.company_id JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=registration.academic_year_id WHERE registration.prodi_id = '$id' AND academic_year.status = 1 GROUP BY registration.company_id");
    } else {
      $query = $this->db->select('COUNT(*) as location_count')
        ->from($this->tableCompany)
        ->get();
    }
    return $query->row();
  }

  public function getRegistration($id = null)
  {
    if ($this->session->userdata('role') == 'Prodi') {
      $query = $this->db->select('COUNT(registration.id ) as registration_count')
        ->from($this->tableRegistration)
        ->join($this->tableAcademicYear, 'academic_year.id = registration.academic_year_id')
        ->where('registration.prodi_id', $id)
        ->where('academic_year.status', 1)
        ->get();
    } elseif ($this->session->userdata('role') == 'Dosen') {
      $query = $this->db->query("SELECT COUNT(registration.lecture_id) as registration_count FROM registration JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=registration.academic_year_id WHERE registration.lecture_id = '$id' AND academic_year.status = 1");
    } elseif ($this->session->userdata('role') == 'Prodi') {
      $query = $this->db->query("SELECT COUNT(registration.lecture_id) as registration_count FROM registration JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=registration.academic_year_id WHERE registration.prodi_id = '$id' AND academic_year.status = 1");
    } else {
      $query = $this->db->select('COUNT(registration.id ) as registration_count')
        ->from($this->tableRegistration)
        ->join($this->tableAcademicYear, 'academic_year.id = registration.academic_year_id')
        ->where('academic_year.status', 1)
        ->get();
    }
    return $query->row();
  }

  public function getGraduation($id = null)
  {
    if ($this->session->userdata('role') == 'Prodi') {
      $query = $this->db->select('COUNT(student.id ) as graduation_count')
        ->from($this->tableStudent)
        ->join($this->tableAcademicYear, 'academic_year.id = student.academic_year_id')
        ->where('academic_year.status', 1)
        ->where('student.status', 'graduated')
        ->where('prodi_id', $id)
        ->get();
    } elseif ($this->session->userdata('role') == 'Dosen') {
      $query = $this->db->query("SELECT COUNT(student.id) as graduation_count FROM student JOIN registration ON registration.student_id=student.id JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=student.academic_year_id WHERE student.status = 'graduated' AND registration.lecture_id = '$id' AND academic_year.status = 1");
    } elseif ($this->session->userdata('role') == 'Prodi') {
      $query = $this->db->query("SELECT COUNT(student.id) as graduation_count FROM student JOIN registration ON registration.student_id=student.id JOIN lecture ON lecture.id=registration.lecture_id JOIN academic_year ON academic_year.id=student.academic_year_id WHERE student.status = 'graduated' AND registration.prodi_id = '$id' AND academic_year.status = 1");
    } else {
      $query = $this->db->select('COUNT(student.id ) as graduation_count')
        ->from($this->tableStudent)
        ->join($this->tableAcademicYear, 'academic_year.id = student.academic_year_id')
        ->where('academic_year.status', 1)
        ->where('student.status', 'graduated')
        ->get();
    }
    return $query->row();
  }

  public function getGuidanceStudentByLecturer()
  {
    return $this->db->query("SELECT registration.id, registration.status, registration.file, registration.youtube_link, student.fullname, student.npm,academic_year.name as academic_year, company.name as company_name, company.pic FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE lecture.nip = '" . $this->session->userdata('user') . "'");
  }

  public function getGuidanceStudentBySupervisor()
  {
    return $this->db->query("SELECT registration.status, student.fullname, student.npm,academic_year.name as academic_year, company.name as company_name, company.pic, lecture.name as lecture_name FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN supervisor ON supervisor.id = registration.supervisor_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE supervisor.username = '" . $this->session->userdata('user') . "'");
  }
}
