<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_recap_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->tableProdi   = 'prodi';
    $this->tableMajor   = 'major';
  }

  public function getData($prodi)
  {
    return $this->db->query("SELECT registration.id, registration.group_id, company.name as company_name, company.pic, districts.name as district, regency.name as regency, province.name as province, registration.start_date, registration.finish_date, registration.status, student.fullname, student.npm, student.status as student_status, prodi.name as prodi_name, lecture.nip, lecture.name as lecture_name, academic_year.name as academic_year, registration.file, registration.youtube_link, registration.pushed FROM registration JOIN company ON company.id = registration.company_id JOIN regency ON regency.id = company.regency_id JOIN districts ON districts.id = company.districts_id JOIN province ON province.id = company.province_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN lecture ON lecture.id = registration.lecture_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi'");
  }

  public function getDataLecturer($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, lecture.prodi_id, prodi.name as prodi_name, lecture.nip, lecture.name as lecture_name, student.fullname, student.npm, company.name as company_name, registration.group_status FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = lecture.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE lecture.prodi_id = '$prodi'");
  }

  public function getDataLecturerByPeriod($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, lecture.prodi_id, prodi.name as prodi_name, lecture.nip, lecture.name as lecture_name, student.fullname, student.npm, company.name as company_name, registration.group_status FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = lecture.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE lecture.prodi_id = '$prodi'");
  }

  public function getDataLecturerGroupBy($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, lecture.prodi_id, prodi.name as prodi_name, lecture.nip, lecture.name as lecture_name, student.fullname, student.npm, company.name as company_name, registration.group_status FROM registration JOIN lecture ON lecture.id = registration.lecture_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = lecture.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE lecture.prodi_id = '$prodi' GROUP BY registration.id");
  }

  public function getDataSupervisor($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, company.name as company_name, company.pic, company.norek, company.bank_name, prodi.name as prodi_name, student.fullname, student.npm, registration.group_status FROM registration JOIN supervisor ON supervisor.id = registration.supervisor_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = registration.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi'");
  }

  public function getDataSupervisorByPeriod($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, company.name as company_name, company.pic, company.norek, company.bank_name, prodi.name as prodi_name, student.fullname, student.npm, registration.group_status FROM registration JOIN supervisor ON supervisor.id = registration.supervisor_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = registration.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi'");
  }

  public function getDataSupervisorGroupBy($prodi)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, company.name as company_name, company.pic, company.norek, company.bank_name,prodi.name as prodi_name, student.fullname, student.npm, registration.group_status FROM registration JOIN supervisor ON supervisor.id = registration.supervisor_id JOIN student ON student.id = registration.student_id JOIN company ON company.id = registration.company_id JOIN prodi ON prodi.id = registration.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi' GROUP BY registration.id");
  }

  public function getDailyLogByStudent($prodi)
  {
    return $this->db->query("SELECT daily_log.*, academic_year.name as academic_year, student.fullname, student.npm, prodi.name as prodi_name, company.name as company_name FROM daily_log JOIN registration ON registration.id = daily_log.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN company ON company.id = registration.company_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi' GROUP BY student.id, daily_log.id");
  }

  public function getDailyLogByRegistration($data)
  {
    return $this->db->query("SELECT daily_log.*, registration.prodi_id, student.fullname, student.npm, prodi.name as prodi_name FROM daily_log JOIN registration ON registration.id = daily_log.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id WHERE registration.id = '$data'");
  }

  public function getDailyLogById($data)
  {
    return $this->db->query("SELECT daily_log.*, student.fullname, student.npm, prodi.name as prodi_name FROM daily_log JOIN registration ON registration.id = daily_log.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id WHERE daily_log.id = '$data'");
  }

  public function getAttendanceByStudent($data)
  {
    return $this->db->query("SELECT check_point.*, academic_year.name as academic_year, student.fullname, student.npm, prodi.name as prodi_name, company.name as company_name FROM check_point JOIN registration ON registration.id = check_point.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN company ON company.id = registration.company_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$data' GROUP BY student.id, check_point.id");
  }

  public function getAttendanceByRegistration($data)
  {
    return $this->db->query("SELECT check_point.*,registration.prodi_id, student.fullname, student.npm, prodi.name as prodi_name, company.name as company_name FROM check_point JOIN registration ON registration.id = check_point.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN company ON company.id = registration.company_id WHERE registration.id = '$data'");
  }

  public function getAttendanceByRegistrationWithPeriod($id)
  {
    return $this->db->query("SELECT check_point.*, student.fullname, student.npm, prodi.name as prodi_name, major.name as major_name, academic_year.name as academic_year FROM check_point JOIN registration ON registration.id = check_point.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = student.prodi_id JOIN major on major.id = prodi.major_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE check_point.registration_id = '$id'");
  }

  public function getAttendanceByRegistrationGroup($id)
  {
    return $this->db->query("SELECT check_point.*, company.name as company_name, company.address, regency.name as regency, province.name as province, student.fullname, student.npm, prodi.name as prodi_name, major.name as major_name, academic_year.name as academic_year FROM check_point JOIN registration ON registration.id = check_point.registration_id JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = student.prodi_id JOIN major on major.id = prodi.major_id JOIN academic_year ON academic_year.id = registration.academic_year_id JOIN company ON company.id = registration.company_id JOIN regency ON regency.id = company.regency_id JOIN province ON province.id = company.province_id WHERE check_point.registration_id = '$id' GROUP BY student.id");
  }

  public function getSupervisionReportByGroup($prodi)
  {
    return $this->db->query("SELECT registration.prodi_id, prodi.name as prodi_name, lecture.name as lecture_name, company.name as company_name, supervision_report.*, academic_year.name as academic_year FROM supervision_report RIGHT JOIN registration ON registration.group_id = supervision_report.registration_group_id JOIN lecture ON lecture.id = registration.lecture_id JOIN prodi ON prodi.id = lecture.prodi_id JOIN company ON company.id = registration.company_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$prodi' GROUP BY supervision_report.registration_group_id, prodi.name, lecture.name,company.name, supervision_report.id,academic_year.name");
  }

  public function getSupervisionReportById($id)
  {
    return $this->db->query("SELECT registration.prodi_id, major.name as major_name, prodi.name as prodi_name, lecture.name as lecture_name, lecture.nip, company.name as company_name, COUNT(registration.group_id) as studentcount,  supervision_report.* FROM supervision_report RIGHT JOIN registration ON registration.group_id = supervision_report.registration_group_id JOIN lecture ON lecture.id = registration.lecture_id JOIN prodi ON prodi.id = lecture.prodi_id JOIN company ON company.id = registration.company_id JOIN major ON major.id = prodi.major_id WHERE supervision_report.id = '$id' GROUP BY supervision_report.registration_group_id, registration.prodi_id,major.name,prodi.name,lecture.name,lecture.nip,company.name");
  }

  public function getAllMajor()
  {
    $this->db->select('a.*,b.id as prodi_id,b.name as prodi');
    $this->db->join($this->tableProdi . ' b', 'b.major_id=a.id', 'LEFT');
    return $this->db->get($this->tableMajor . ' a');
  }

  public function getScoringBy($prodi)
  {
    return $this->db->query("SELECT supervision_value.nilai_total as supervision_value, v_final_score.supervisor_value,v_final_score.lecture_value,v_final_score.final_score_value, v_final_score_result_with_hm.*, CASE
    WHEN v_final_score_result_with_hm.HM = 'E' THEN 'Tidak Lulus'
    ELSE 'Lulus'
    END as student_status, prodi.degree,
    lecture.name as lecture_name, lecture.nip,
    prodi.name as prodi_name,
    academic_year.name as academic
    FROM v_final_score 
    JOIN v_final_score_result_with_hm ON v_final_score_result_with_hm.registration_id=v_final_score.registration_id
    JOIN supervision_value ON supervision_value.registration_id=v_final_score.registration_id
    JOIN prodi ON prodi.id=v_final_score_result_with_hm.prodi_id
    JOIN head_of_study_program ON head_of_study_program.prodi_id = prodi.id
    JOIN lecture ON lecture.id = head_of_study_program.lecture_id
    JOIN registration ON registration.id = v_final_score.registration_id
    JOIN academic_year ON academic_year.id = registration.academic_year_id
    WHERE prodi.id = '$prodi'");
  }

  public function getProdiBy($prodi)
  {
    return $this->db->query("SELECT lecture.nip, lecture.name as lecture, prodi.name FROM registration JOIN prodi ON prodi.id = registration.prodi_id JOIN head_of_study_program ON head_of_study_program.prodi_id = prodi.id JOIN lecture ON lecture.id = head_of_study_program.lecture_id WHERE head_of_study_program.prodi_id = '$prodi' GROUP BY head_of_study_program.prodi_id");
  }

  public function getYotubeLink($id)
  {
    return $this->db->query("SELECT youtube_link FROM registration WHERE id = '$id'");
  }

  public function getDataStatusPkn($id)
  {
    return $this->db->query("SELECT academic_year.name as academic_year, registration.id,registration.file,registration.youtube_link,student.fullname,student.npm,prodi.name as prodi_name FROM registration JOIN student ON student.id = registration.student_id JOIN prodi ON prodi.id = registration.prodi_id JOIN academic_year ON academic_year.id = registration.academic_year_id WHERE registration.prodi_id = '$id'");
  }
}
