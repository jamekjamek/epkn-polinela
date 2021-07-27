<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_pkn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->load->model('Admin/Admin_pkn_model', 'PKL');
        $this->role         = 'admin';
        $this->redirect     = 'admin/master/pkn';
        cek_login('Admin');
    }

    public function index()
    {

        $major      = $this->PKL->getAllMajor()->result();
        $academic   = $this->Config->getDataAcademicYear()->result();
        $data       = [
            'title'         => 'Rekap Mahasiswa PKN',
            'desc'          => 'Berfungsi untuk melihat rekap mahasiswa PKN',
            'academicyear'  => $academic,
            'majors'        => $major
        ];

        $page = '/admin/pkn/index';
        pageBackend($this->role, $page, $data);
    }
}
