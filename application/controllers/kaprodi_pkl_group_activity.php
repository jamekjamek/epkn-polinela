<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kaprodi_pkl_group_activity extends Kaprodi_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kaprodi/Pkl_Registration_Model', 'Registration');
        $this->load->model('Kaprodi/Pkl_Prodi_model', 'Prodi');
        $this->load->model('Kaprodi/Pkl_DailyLog_model', 'DailyLog');
        $this->load->model('Kaprodi/Pkl_CheckPoint_model', 'CheckPoint');
        $this->title = 'Daily Log PKL';
        $this->viewpath = $this->parentviewpath . '/pkl_group_activity/';
        $this->route = $this->parentroute . '/pkl_group_activity/';
    }

    public function index()
    {
        // get data prodi
        $prodi = $this->Prodi->getByEmail($this->session->user);

        $data = [
            'title'         => 'Data ' . $this->title,
            'data_registration' => $this->Registration->getOnlyKetuaByProdi($prodi->id),
            'desc'          => 'Berfungsi untuk melihat data ' . $this->title,
            '__url_detail'  => base_url($this->route . 'detail/'),
        ];
        $page = $this->viewpath . 'index';
        pageBackend($this->role, $page, $data);
    }

    public function detail($id)
    {
        $decodeId   = decodeEncrypt($id);
        // get data prodi
        $prodi = $this->Prodi->getByEmail($this->session->user);
        $data_registration = $this->Registration->getRegistrationById($prodi->id, $decodeId);
        $data = [
            'title'             => 'Detail Kelompok PKL',
            'desc'              => 'List detail kelompok pkl',
            'registration'      => $data_registration,
            'data_registration_member' => $this->Registration->getRegistrationMemberByGrpId($data_registration->group_id),
            '__url_index'       => base_url($this->route),
            '__url_file'        => base_url('/assets/uploads/'),
            '__url_dailylog'    => base_url($this->route . 'dailylog/'),
            '__url_present'     => base_url($this->route . 'present/'),
            '__url_finalScore'  => base_url($this->route . 'final_score/'),
        ];
        $page = $this->viewpath . 'detail';
        pageBackend($this->role, $page, $data);
    }

    public function memberDailyLog($id)
    {
        $decodeId   = decodeEncrypt($id);

        $student = $this->Registration->getJoinStudentById($decodeId);

        $data = [
            'title'         => 'Daily Log ' . $student->npm,
            'student'       => $student,
            'data_daily'    => $this->DailyLog->getByRegId($decodeId),
            'desc'          => 'Berfungsi untuk melihat data daily log mahasiswa/i',
            '__url_back'       => base_url($this->route . 'detail/' . $id),
        ];
        $page = $this->viewpath . 'dailylog';
        pageBackend($this->role, $page, $data);
    }

    public function memberPresent($id)
    {
        $decodeId   = decodeEncrypt($id);

        $student = $this->Registration->getJoinStudentById($decodeId);

        $data = [
            'title'         => 'Kehadiran ' . $student->npm,
            'student'       => $student,
            'data_present'    => $this->CheckPoint->getByRegId($decodeId),
            'desc'          => 'Berfungsi untuk melihat data kehadiran mahasiswa/i',
            '__url_back'       => base_url($this->route . 'detail/' . $id),
        ];
        $page = $this->viewpath . 'present';
        pageBackend($this->role, $page, $data);
    }

    public function memberFinalScore($id)
    {
        $decodeId   = decodeEncrypt($id);

        $student = $this->Registration->getJoinStudentById($decodeId);

        $data = [
            'title'         => 'Skor Akhir ' . $student->npm,
            'student'       => $student,
            'data_score'    => $this->Registration->getFinalScoreByRegId($decodeId),
            'desc'          => 'Berfungsi untuk melihat data skor akhir mahasiswa/i',
            '__url_back'    => base_url($this->route . 'detail/' . $id),
        ];
        $page = $this->viewpath . 'finalscore';
        pageBackend($this->role, $page, $data);
    }
}
