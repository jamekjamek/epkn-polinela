<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_pkl_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableProdi   = 'prodi';
        $this->tableMajor   = 'major';
    }


    public function getAllMajor()
    {
        $this->db->select('a.*,b.id as prodi_id,b.name as prodi');
        $this->db->join($this->tableProdi . ' b', 'b.major_id=a.id', 'LEFT');
        return $this->db->get($this->tableMajor . ' a');
    }

    public function getDataBy($data = null)
    {
        return $this->db->get_where($this->tableProdi, $data);
    }
}
