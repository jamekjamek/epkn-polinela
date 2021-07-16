<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecture_report_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableReportSupervision = 'supervision_report';
    $this->tableLecture = 'lecture';
    $this->tableMajor = 'major';
    $this->tableProdi = 'prodi';
    $this->tableCompany = 'company';
    $this->tableStudent = 'student';
    $this->tableRegistration = 'registration';
    $this->tableAcademicYear = 'academic_year';
  }

  // laporan supervisi
  public function getSupervisionReport($academic_year_id = null, $id = null)
  {
    $this->_joinSupervisonReport();
    $this->db->where('lecture.nip', $this->session->userdata('user'));
    if ($academic_year_id && $id) {
      $this->db->where('academic_year.id', $academic_year_id);
      $this->db->where('supervision_report.id', $id);
    } else {
      $this->db->where('academic_year.status', 1);
    }
    $this->db->group_by('registration.group_id');
    return $this->db->get($this->tableReportSupervision);
  }

  private function _joinSupervisonReport()
  {
    $this->db->select('registration.group_id, company.name company_name, COUNT(registration.group_id) as studentcount, supervision_report.*');
    $this->db->join($this->tableRegistration, 'registration.group_id = supervision_report.registration_group_id', 'RIGHT');
    $this->db->join($this->tableCompany, 'company.id=registration.company_id');
    $this->db->join($this->tableAcademicYear, 'academic_year.id=registration.academic_year_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
  }

  public function insertSupervisonReport($data, $id = null)
  {
    if ($id) {
      $this->db->update($this->tableReportSupervision, $data, $id);
    } else {
      $this->db->insert($this->tableReportSupervision, $data);
    }
    return $this->db->affected_rows();
  }

  public function reportCheck()
  {
    $this->db->select('supervision_report.id, supervision_report.registration_group_id');
    $this->db->join($this->tableRegistration, 'registration.group_id=supervision_report.registration_group_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
    return $this->db->get_where($this->tableReportSupervision, ['lecture.nip' => $this->session->userdata('user')])->row();
  }
}
