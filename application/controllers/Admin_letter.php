<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_letter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->load->model('Admin/Admin_letter_model', 'Letter');
    $this->role         = 'admin';
    $this->redirect     = 'admin/letter';
    cek_login('Admin');
  }

  public function index()
  {
    $letters    = $this->Letter->getAllData()->result();
    $data       = [
      'title'         => 'Data Konfigusari Surat',
      'desc'          => 'Berfungsi untuk melihat Data Konfigusari Surat',
      'letters'       => $letters,
    ];

    $page = '/admin/letter/index';
    pageBackend($this->role, $page, $data);
  }

  public function add()
  {
    $this->_validation();
    if ($this->form_validation->run() === false) {
      $document   = $this->Letter->getDocument()->result();
      $data       = [
        'title'         => 'Tambah Data Konfigusari Surat',
        'desc'          => 'Berfungsi untuk menambah Data Konfigusari Surat',
        'document'      => $document
      ];
      $page = '/admin/letter/create';
      pageBackend($this->role, $page, $data);
    } else {
      $this->db->set('id', 'UUID()', FALSE);
      $dataInput  = [
        'document_id'   => $this->input->post('document'),
        'letter_number' => $this->input->post('letter-number')
      ];
      $insert     = $this->Letter->insert($dataInput);
      if ($insert > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirect);
    }
  }

  public function detail($id)
  {
    $decode = decodeEncrypt($id);
    $letter = $this->Letter->getAllData(['a.id' => $decode])->row();
    if ($letter) {
      $this->_validation();
      if ($this->form_validation->run() === false) {
        $document   = $this->Letter->getDocument()->result();
        $data       = [
          'title'         => 'Tambah Data Konfigusari Surat',
          'desc'          => 'Berfungsi untuk menambah Data Konfigusari Surat',
          'document'      => $document,
          'letter'        => $letter
        ];
        $page = '/admin/letter/detail';
        pageBackend($this->role, $page, $data);
      } else {
        $dataUpdate = [
          'document_id'   => $this->input->post('document'),
          'letter_number' => $this->input->post('letter-number'),
          'updated_at'    => date('Y-m-d H:i:s')
        ];
        $update     = $this->Letter->update($dataUpdate, ['id' => $decode]);
        if ($update > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di ubah');
        } else {
          $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
        }
        redirect($this->redirect);
      }
    } else {
      $this->session->set_flashdata('error', 'Maaf data yang dicari tidak ditemukan');
      redirect($this->redirect);
    }
  }

  public function delete($id)
  {
    $decode = decodeEncrypt($id);
    $letter = $this->Letter->getAllData(['a.id' => $decode])->row();
    if ($letter) {
      $delete = $this->Letter->delete(['id' => $decode]);
      if ($delete > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di hapus');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirect);
    } else {
      $this->session->set_flashdata('error', 'Maaf data yang dicari tidak ditemukan');
      redirect($this->redirect);
    }
  }

  private function _validation()
  {

    $this->form_validation->set_rules(
      'document',
      'Dokumen',
      'trim|required',
      [
        'required' => '%s wajib diisi'
      ]
    );
    $this->form_validation->set_rules(
      'letter-number',
      'Nomor surat',
      'trim|required',
      [
        'required' => '%s wajib diisi'
      ]
    );
  }
}
