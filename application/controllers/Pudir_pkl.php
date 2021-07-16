<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pudir_pkl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->role         = 'pudir';
        $this->redirect     = 'pudir/pkl';
        cek_login('Pudir');
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

        $page = '/pudir/pkl/index';
        pageBackend($this->role, $page, $data);
    }
}
