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
    $this->tableDistric       = 'districts';
    $this->tableStudent       = 'student';
    $this->tableProdi         = 'prodi';
    $this->tableMajor         = 'major';
    $this->tableUser          = 'user';
    $this->tableLecture       = 'lecture';
    $this->tableKaprodi       = 'head_of_study_program';
    $this->tableAcademic      = 'academic_year';
    $this->tableReportSupervision = 'supervision_report';
    $this->tableDailyLog = 'daily_log';
    $this->tableCheckPoint = 'check_point';
    $this->tableSupervisor = 'supervisor';
    $this->tableWillingness = 'willingness_to_accept';
    $this->tableListCheckValidation = 'list_check_validation';
  }

  public function list()
  {
    return $this->db->get('document')->result();
  }

  public function getEnvelopeByLeader()
  {
    $query = "SELECT registration.company_id, registration.copy_later, company.pic, company.name, company.address, company.telp FROM registration JOIN company ON company.id = registration.company_id JOIN student ON student.id = registration.student_id WHERE student.npm = '" . $this->session->userdata('user') . "'";
    return $this->db->query($query)->row_array();
  }

  public function updateGroupStatus($data)
  {
    $this->db->update('registration', $data, ['group_id' => $data['group_id'], 'verify_member' => 'Diterima']);
    return $this->db->affected_rows();
  }

  public function isCheckWithVerifiedMajor()
  {
    $query = "SELECT * FROM list_check_validation JOIN student ON student.id=list_check_validation.student_id WHERE student.npm = '" . $this->session->userdata('user') . "'";
    return $this->db->query($query);
  }

  //Agung
  public function getDataBy($data)
  {
    return $this->db->get_where($this->tableLetterConfig, $data);
  }

  public function getSuratTugas($data)
  {
    return $this->db->query("SELECT student.fullname as student, prodi.name as prodi_name, student.npm FROM registration JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = student.prodi_id WHERE registration.group_id = '$data'");
  }

  public function getRegistrationDataBy($data, $leader = null)
  {
    $this->db->select('a.*,b.name company_name,g.name as district_name,c.name as address,d.fullname as student,d.npm,d.email student_email,e.name prodi_name,f.name as academicyear');
    $this->db->join($this->tableCompany . ' b', 'a.company_id=b.id', 'LEFT');
    $this->db->join($this->tableRegency . ' c', 'b.regency_id=c.id', 'LEFT');
    $this->db->join($this->tableDistric . ' g', 'g.id=b.districts_id', 'LEFT');
    $this->db->join($this->tableStudent . ' d', 'a.student_id=d.id', 'LEFT');
    $this->db->join($this->tableProdi . ' e', 'd.prodi_id=e.id', 'LEFT');
    $this->db->join($this->tableAcademic . ' f', 'a.academic_year_id=f.id', 'LEFT');
    $this->db->where($data);
    $this->db->where('a.group_status !=', 'ditolak');
    $this->db->where('a.verify_member !=', 'Ditolak');
    $this->db->where('d.npm', $this->session->userdata('user'));
    $this->db->order_by('d.npm', 'ASC');
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

  public function getPlanningBy($id)
  {
    $query = "SELECT planning.*,student.fullname, student.npm,major.name as major_name,prodi.name as prodi_name, company.name as company_name, company.pic, lecture.nip, lecture.name as lecture_name FROM planning JOIN registration on registration.id=planning.registration_id JOIN student on student.id=registration.student_id JOIN prodi ON prodi.id=student.prodi_id JOIN major ON major.id=prodi.major_id JOIN company on company.id=registration.company_id JOIN lecture on lecture.id=registration.lecture_id WHERE planning.approval = 1 AND registration.group_id = '$id'";
    return $this->db->query($query);
  }

  public function responseLetterFile()
  {
    $query = "SELECT response_letter.* FROM response_letter JOIN registration ON registration.group_id=response_letter.registration_group_id JOIN student ON student.id=registration.student_id WHERE student.npm = " . $this->session->userdata('user');
    return $this->db->query($query);
  }

  public function getKaprodi($prodi)
  {
    $this->db->select('a.*,b.name');
    $this->db->join($this->tableKaprodi . ' a', 'a.lecture_id=b.id');
    return $this->db->get_where($this->tableLecture . ' b', ['a.prodi_id' => $prodi, 'a.status' => '1']);
  }

  public function getSupervisionReport($id)
  {
    $this->_joinSupervisonReport();
    $this->db->where('lecture.nip', $this->session->userdata('user'));
    $this->db->where($id);
    $this->db->group_by('registration.group_id');
    return $this->db->get($this->tableReportSupervision);
  }

  private function _joinSupervisonReport()
  {
    $this->db->select('registration.group_id, company.name company_name, COUNT(registration.group_id) as studentcount, supervision_report.*, lecture.name as lecture_name, lecture.nip,prodi.name as prodi_name, major.name as major_name');
    $this->db->join($this->tableRegistration, 'registration.group_id = supervision_report.registration_group_id', 'RIGHT');
    $this->db->join($this->tableCompany, 'company.id=registration.company_id');
    $this->db->join($this->tableAcademic, 'academic_year.id=registration.academic_year_id');
    $this->db->join($this->tableLecture, 'lecture.id=registration.lecture_id');
    $this->db->join($this->tableProdi, 'prodi.id=registration.prodi_id');
    $this->db->join($this->tableMajor, 'major.id=prodi.major_id');
  }

  public function dailyList()
  {
    $this->_logJoin();
    $this->db->where('student.npm', $this->session->userdata('user'));
    $this->db->where('daily_log.validation', 1);
    return $this->db->get($this->tableDailyLog);
  }

  private function _logJoin()
  {
    $this->db->select('daily_log.*,company.pic');
    $this->db->join($this->tableRegistration, 'registration.id=daily_log.registration_id');
    $this->db->join($this->tableStudent, 'student.id=registration.student_id');
    $this->db->join($this->tableCompany, 'company.id=registration.company_id');
  }

  public function getWillingness($id = null)
  {
    $this->db->select('company.name as company_name,company.address,company.pic,company.telp, willingness_to_accept.*, academic_year.name as academic_year, prodi.name as prodi_name');
    $this->db->join($this->tableCompany, 'company.id=willingness_to_accept.company_id');
    $this->db->join($this->tableSupervisor, 'supervisor.company_id=company.id');
    $this->db->join($this->tableAcademic, 'academic_year.id=willingness_to_accept.academic_year_id');
    $this->db->join($this->tableProdi, 'willingness_to_accept.prodi_id=prodi.id');
    if ($this->session->userdata('role') == 'Supervisor') {
      $this->db->where('supervisor.username', $this->session->userdata('user'));
    } else {
      $this->db->where('willingness_to_accept.company_id', $id);
    }
    $this->db->or_where('willingness_to_accept.prodi_id', $id);
    $this->db->group_by('prodi.id');
    return $this->db->get($this->tableWillingness);
  }

  public function getProdi()
  {
    return $this->db->get($this->tableProdi);
  }

  public function getBySupervisorScore($id)
  {
    return $this->db->query("SELECT supervisor_score.*, student.fullname, student.npm, major.name as major_name, prodi.name as prodi_name, company.name as company_name, company.pic FROM supervisor_score RIGHT JOIN registration ON registration.id = supervisor_score.registration_id RIGHT JOIN student ON student.id = registration.student_id RIGHT JOIN prodi ON prodi.id = student.prodi_id RIGHT JOIN major ON major.id = prodi.major_id RIGHT JOIN company ON company.id = registration.company_id WHERE registration.id = '$id'");
  }

  public function getSupervisionValue($id)
  {
    return $this->db->query("SELECT supervision_value.*, student.fullname, student.npm, prodi.name as prodi_name, major.name as major_name, supervision_report.time, company.name as company_name, lecture.name as lecture_name, lecture.nip FROM supervision_value JOIN registration ON registration.id = supervision_value.registration_id JOIN lecture ON lecture.id = registration.lecture_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN major ON major.id = prodi.major_id JOIN company on company.id = registration.company_id JOIN supervision_report ON supervision_report.registration_group_id = registration.group_id WHERE supervision_value.registration_id = '$id'");
  }

  public function getStudentData($id)
  {
    return $this->db->query("SELECT registration.id, student.fullname, student.npm, prodi.name as prodi_name, major.id as major_id,major.name as major_name, company.name as company_name, lecture.name as lecture_name, lecture.nip, academic_year.name as academic_year FROM registration JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = student.prodi_id JOIN major ON major.id = prodi.major_id JOIN company ON company.id = registration.company_id JOIN lecture ON lecture.id = registration.lecture_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.id = '$id'");
  }

  public function getHeadOfDepartement($id)
  {
    return $this->db->query("SELECT head_of_department.id, head_of_department.major_id, lecture.name as lecture_name, lecture.nip FROM head_of_department JOIN lecture ON lecture.id = head_of_department.lecture_id JOIN major ON major.id = head_of_department.major_id WHERE head_of_department.major_id = '$id'");
  }

  public function getHeadOfStudyProgram($id)
  {
    return $this->db->query("SELECT registration.id, lecture.name as lecture_name, lecture.nip FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN head_of_study_program ON head_of_study_program.lecture_id = lecture.id WHERE registration.id = '$id'");
  }

  public function attendance()
  {
    $this->db->select('list_check_validation.*');
    $this->db->join($this->tableStudent, 'student.id=list_check_validation.student_id');
    return $this->db->get_where($this->tableListCheckValidation, ['student.npm' => $this->session->userdata('user')]);
  }

  public function getSupervisorValue($id)
  {
    return $this->db->query("SELECT supervisor_score.* FROM supervisor_score JOIN registration ON registration.id = supervisor_score.registration_id JOIN student ON student.id = registration.student_id WHERE student.npm = '$id'");
  }

  public function getDailyLog($id)
  {
    return $this->db->query("SELECT districts.name as districts, regency.name as regency, province.name as province, daily_log.*, student.fullname, student.npm, major.name as major_name, prodi.name as prodi_name, company.name as company_name, company.pic, lecture.nip, lecture.name as lecture_name FROM daily_log JOIN registration ON registration.id = daily_log.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN major ON major.id = prodi.major_id JOIN company ON company.id = registration.company_id JOIN lecture ON lecture.id = registration.lecture_id JOIN regency ON regency.id = company.regency_id JOIN province ON province.id = company.province_id JOIN districts ON districts.id = company.districts_id WHERE daily_log.registration_id = '$id'");
  }
  
  public function getSupervisorUser() {
      return $this->db->query("SELECT company.name as company_name, supervisor.username FROM supervisor JOIN company ON company.id = supervisor.company_id JOIN registration ON registration.company_id = company.id JOIN student ON student.id = registration.student_id WHERE student.npm = '".$this->session->userdata('user')."'");
  }
}
