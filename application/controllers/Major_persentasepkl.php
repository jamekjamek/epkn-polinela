<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Major_persentasepkl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Major/Major_config_model', 'ConfigMajor');
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->load->model('Major/Major_persentasepkl_model', 'PKL');
        $this->role     = 'Sekjur';
        $this->login    = $this->ConfigMajor->getDataBy(['email' => $this->session->userdata()['username']->username]);
        cek_login('Sekjur');
    }

    public function index($academiyear = null)
    {
        $where      = ['major_id' => $this->login->row()->id];
        $prodi      = $this->PKL->getDataBy($where)->result();
        $academic   = $this->Config->getDataAcademicYear()->result();
        $data       = [
            'title'         => 'Data PKL Program Studi',
            'desc'          => 'Berfungsi untuk melihat Data PKL Program Studi',
            'user'          => $this->login->row(),
            'allProdi'      => $prodi,
            'academicyear'  => $academic,
        ];

        $page = '/major/pkl/index';
        pageBackend($this->role, $page, $data);
    }
}
