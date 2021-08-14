<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Major_pkl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->load->model('Major/Major_config_model', 'Major');
        $this->login    = $this->Major->getDataByProdi(['major.email' => $this->session->userdata()['username']->username]);
        $this->role         = 'sekjur';
        $this->redirect     = 'major/pkl';
        cek_login('Sekjur');
    }

    public function index()
    {
        $major      = $this->login->result();
        $academic   = $this->Config->getDataAcademicYear()->result();
        $data       = [
            'title'         => 'Data PKN',
            'desc'          => 'Berfungsi untuk melihat Data PKN',
            'academicyear'  => $academic,
            'majors'        => $major
        ];
        $page = '/major/pkl/index';
        pageBackend($this->role, $page, $data);
    }
}
