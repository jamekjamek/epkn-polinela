<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecture_data_pkl_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'registration';
    $this->tableCompany = 'company';
    $this->tableStudent = 'student';
    $this->tableLecture = 'lecture';
    $this->tableSupervisor = 'supervisor';
    $this->tableAcademicYear = 'academic_year';
    $this->tableSupervisionValue = 'supervision_value';
    $this->tableSupervisionReport = 'supervision_report';
    $this->tableGuidanceValue = 'guidance_value';
    $this->tableTestScore = 'test_score';
    $this->tableFinalScore = 'v_final_score_result_with_hm';
    $this->tableProdi = 'prodi';
    $this->tableRoom = 'room';
  }

  public function list($academic_year_id)
  {
    $this->_join();
    $this->db->where('d.nip', $this->session->userdata('user'));
    if ($academic_year_id) {
      $this->db->where('f.id', $academic_year_id);
    } else {
      $this->db->where('f.status', 1);
    }
    return $this->db->get($this->table . ' a');
  }

  public function getDataPklBy($id)
  {
    $this->_join();
    return $this->db->get_where($this->table . ' a', $id);
  }

  private function _join()
  {
    $this->db->select('a.*,b.id company_id, b.pic, b.telp, b.name company_name,c.fullname,c.npm,c.email student_email,c.no_hp,c.address,d.name as lecture_name,e.username pl');
    $this->db->join($this->tableCompany . ' b', 'a.company_id=b.id', 'LEFT');
    $this->db->join($this->tableStudent . ' c', 'a.student_id=c.id', 'LEFT');
    $this->db->join($this->tableLecture . ' d', 'a.lecture_id=d.id', 'LEFT');
    $this->db->join($this->tableSupervisor . ' e', 'a.supervisor_id=e.id', 'LEFT');
    $this->db->join($this->tableAcademicYear . ' f', 'a.academic_year_id=f.id');
  }

  public function getAcademicYears($searchTerm = null)
  {
    $this->db->select('*');
    $this->db->where("name like '%" . $searchTerm . "%' ");
    $fetched_records = $this->db->get($this->tableAcademicYear);
    $users = $fetched_records->result_array();
    $data = array();
    foreach ($users as $user) {
      $data[] = array("id" => $user['id'], "text" => $user['name']);
    }
    return $data;
  }

  public function getBySupervisionValue($id)
  {
    return $this->db->get_where($this->tableSupervisionValue, $id);
  }

  public function getTimeSupervisionValue($id)
  {
    $this->db->select('supervision_value.*, supervision_report.time');
    $this->db->join($this->table, 'registration.id = supervision_value.registration_id');
    $this->db->join($this->tableSupervisionReport, 'supervision_report.registration_group_id=registration.group_id');
    return $this->db->get_where($this->tableSupervisionValue, $id);
  }

  public function insertSupervisionValue($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->tableSupervisionValue, $data);
    return $this->db->affected_rows();
  }

  public function updateSupervisionValue($data, $where)
  {
    $this->db->update($this->tableSupervisionValue, $data, $where);
    return $this->db->affected_rows();
  }

  public function getByIdGuidanceValue($id)
  {
    return $this->db->get_where($this->tableGuidanceValue, $id);
  }

  public function checkStudentDegree($id)
  {
    $this->db->select('prodi.degree');
    $this->db->join($this->table, 'registration.id=guidance_value.registration_id', 'RIGHT');
    $this->db->join($this->tableProdi, 'prodi.id=registration.prodi_id');
    return $this->db->get_where($this->tableGuidanceValue, $id);
  }

  public function insertGuidanceValue($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->tableGuidanceValue, $data);
    return $this->db->affected_rows();
  }

  public function updateGuidanceValue($data, $where)
  {
    $this->db->update($this->tableGuidanceValue, $data, $where);
    return $this->db->affected_rows();
  }

  public function getByIdTestScore($id)
  {
    return $this->db->get_where($this->tableTestScore, $id);
  }

  public function getRoom()
  {
    return $this->db->get($this->tableRoom);
  }

  public function getRoomTestScore($id)
  {
    $this->db->select('test_score.room_id,room.name as room_name');
    $this->db->join($this->tableRoom, 'room.id=test_score.room_id');
    return $this->db->get_where($this->tableTestScore, $id);
  }

  public function insertFinalTestValue($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->tableTestScore, $data);
    return $this->db->affected_rows();
  }

  public function updateFinalTestValue($data, $where)
  {
    $this->db->update($this->tableTestScore, $data, $where);
    return $this->db->affected_rows();
  }

  public function getByIdFinalScore($id)
  {
    return $this->db->get_where($this->tableFinalScore, $id);
  }
}
