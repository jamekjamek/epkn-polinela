<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ketuplak_pkl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->role         = 'ketuplak';
        $this->redirect     = 'ketuplak/pkl';
        cek_login('Ketuplak');
    }

    public function index()
    {
        $major      = $this->Config->getAllMajor()->result();
        $academic   = $this->Config->getDataAcademicYear()->result();
        $data       = [
            'title'         => 'Data PKL',
            'desc'          => 'Berfungsi untuk melihat Data PKL',
            'academicyear'  => $academic,
            'majors'        => $major
        ];

        $page = '/ketuplak/pkl/index';
        pageBackend($this->role, $page, $data);
    }
}
