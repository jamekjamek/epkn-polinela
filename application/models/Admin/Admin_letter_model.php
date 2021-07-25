<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_letter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableDocument     = 'document';
        $this->tableLetter       = 'letter_config';
    }

    public function getAllData($data = null)
    {
        $this->db->select('a.*,b.name as document');
        $this->db->join($this->tableDocument . ' b', 'a.document_id=b.id');
        if ($data) {
            $this->db->where($data);
        }
        return $this->db->get($this->tableLetter . ' a');
    }

    public function getDocument()
    {
        return $this->db->get($this->tableDocument);
    }

    public function insert($data)
    {
        $this->db->insert($this->tableLetter, $data);
        return $this->db->affected_rows();
    }

    public function update($data, $where)
    {
        $this->db->update($this->tableLetter, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($where)
    {
        $this->db->delete($this->tableLetter, $where);
        return $this->db->affected_rows();
    }
}
