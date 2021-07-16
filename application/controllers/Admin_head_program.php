<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_head_program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_head_program_model', 'Kajur');
        $this->load->model('Admin/Admin_config_model', 'Config');


        $this->role         = 'admin';
        $this->redirect     = 'admin/master/head-of-program';


        cek_login('Admin');
    }

    public function index()
    {
        $allKajur           = $this->Kajur->getAllData()->result();
        $data = [
            'title'         => 'Data ketua Jurusan',
            'desc'          => 'Berfungsi untuk melihat Data ketua Jurusan',
            'allKajur'      => $allKajur
        ];

        $page = '/admin/kajur/index';
        pageBackend($this->role, $page, $data);
    }
    public function create()
    {

        $this->_validation();
        if ($this->form_validation->run() === false) {
            $data = [
                'title'         => 'Tambah Data Ketua Jurusan',
                'desc'          => 'Berfungsi untuk menambah Data Ketua Jurusan',
                'lectures'      => $this->Kajur->getLecture()->result()
            ];
            $page = '/admin/kajur/create';
            pageBackend($this->role, $page, $data);
        } else {
            $this->db->set('id', 'UUID()', FALSE);
            $stringPost = $this->input->post('lecture');
            $explode    = explode(":", $stringPost);
            $dataInput = [
                'lecture_id'    => htmlspecialchars($explode[0]),
                'major_id'      => htmlspecialchars($explode[1])
            ];
            $insertKajur      = $this->Kajur->insert($dataInput);
            if ($insertKajur > 0) {
                $this->session->set_flashdata('success', 'Data berhasil di tambah');
            } else {
                $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
            }
            redirect($this->redirect);
        }
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $status     = $this->input->post('status');
        $dataUpdate = [
            'status'        => $status,
            'updated_at'    => date('Y-m-d H:i:s')
        ];
        $update     = $this->Kajur->update($dataUpdate, ['id' => $id]);
        $this->output->set_content_type('application/json')->set_output(json_encode($update));
    }

    private function _validation()
    {
        $this->form_validation->set_rules(
            'lecture',
            'Kajur',
            'trim|required',
            [
                'required' => '%s wajib di isi',
            ]
        );
    }
}
