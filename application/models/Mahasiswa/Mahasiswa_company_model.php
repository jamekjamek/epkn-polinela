<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_company_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'company';
    $this->provinceTable = 'province';
    $this->regencyTable = 'regency';
  }

  public function list()
  {
    $this->db->select('a.id,a.name,a.address,a.email,a.telp,a.pic,a.label,a.status,a.created_at,b.name as province_name,c.name as regency_name');
    $this->db->join('province b', 'b.id=a.province_id');
    $this->db->join('regency c', 'c.id=a.regency_id');
    $this->db->order_by('a.created_at', 'DESC');
    return $this->db->get($this->table . ' a')->result();
  }

  public function getDataPeriode()
  {
    $today  = date('Y-m-d');
    $this->db->where('finish_time >=', $today);
    return $this->db->get('periode');
  }

  public function getCompanyById($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row();
  }

  public function insert($data)
  {
    $this->db->set('id', 'UUID()', FALSE);
    $this->db->insert($this->table, $data);
  }

  public function edit($data, $where)
  {
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->update($this->table, $data, ['id' => $where]);
    return $this->db->affected_rows();
  }

  public function getAllProvince()
  {
    return $this->db->get($this->provinceTable)->result();
  }

  public function getAllRegency($province_id = null)
  {
    if ($province_id) {
      $this->db->where(['province_id' => $province_id]);
    }
    return $this->db->get($this->regencyTable)->result();
  }
}
