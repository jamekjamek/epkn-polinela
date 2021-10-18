<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_quesioner extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_quesioner_model', 'Quesioner');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role         = 'admin';
    $this->redirect     = 'admin/master/quesioner';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Quesioner',
      'desc'          => 'Berfungsi untuk melihat Data Quesioner',
      'quesioner'     => $this->Quesioner->getData()->result()
    ];
    $page = '/admin/quesioner/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation();
    if ($this->form_validation->run() === false) {
      $data = [
        'title'         => 'Tambah Data Quesioner',
        'desc'          => 'Berfungsi untuk menambah Data Quesioner',
        'getRole'       => $this->Config->getRole()->result()
      ];
      $page = '/admin/quesioner/create';
      pageBackend($this->role, $page, $data);
    } else {
      $this->db->set('id', 'UUID()', FALSE);
      $dataInput = [
        'role_id'       => htmlspecialchars($this->input->post('role_id')),
        'link'          => htmlspecialchars($this->input->post('link')),
      ];
      $insert           = $this->Quesioner->insert($dataInput);
      if ($insert > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirect);
    }
  }

  public function update($id)
  {
    $decode     = decodeEncrypt($id);
    $quesioner    = $this->Quesioner->getDataById(['id' => $decode])->row();
    if ($quesioner) {
      $this->_validation();
      if ($this->form_validation->run() === false) {
        $data = [
          'title'         => 'Ubah Data Dosen',
          'desc'          => 'Berfungsi untuk mengubah Data Dosen',
          'quesioner'     => $quesioner,
          'getRole'       => $this->Config->getRole()->result()
        ];
        $page = '/admin/quesioner/update';
        pageBackend($this->role, $page, $data);
      } else {
        $dataInput = [
          'role_id'       => htmlspecialchars($this->input->post('role_id')),
          'link'          => htmlspecialchars($this->input->post('link')),
        ];
        $update      = $this->Quesioner->update($dataInput, ['id' => $decode]);
        if ($update > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di ubah');
        } else {
          $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
        }
        redirect($this->redirect);
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
      redirect($this->redirect);
    }
  }

  private function _validation()
  {

    $this->form_validation->set_rules(
      'role_id',
      'Role',
      'required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    $this->form_validation->set_rules(
      'link',
      'Link quesioner',
      'required',
      [
        'required' => '%s wajib di isi',
      ]
    );
  }
}

/* End of file Dashboard.php */