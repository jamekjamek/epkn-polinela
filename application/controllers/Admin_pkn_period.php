<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_pkn_period extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_pkn_period_model', 'Period');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role     = 'admin';
    $this->redirect = 'admin/pkn_period';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Periode Pelaksanaan PKN',
      'desc'          => 'Berfungsi untuk melihat data periode pelaksanaan PKN',
      'periods'       => $this->Period->list()->result(),
      'check'         => $this->Period->check()->num_rows(),
    ];

    $page = '/admin/pkn_period/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation();
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Periode Pelaksanaan PKN',
        'desc'          => 'Berfungsi untuk menambah periode pelaksanaan PKN',
      ];
      $page = '/admin/pkn_period/create';
      pageBackend($this->role, $page, $data);
    } else {
      $academic       = $this->Config->getDataAcademicYear(['status' => 1])->row();
      $academicId     = $academic->id;
      $this->db->set('id', 'UUID()', FALSE);
      $dataInsert = [
        'title'             => htmlspecialchars($this->input->post('title')),
        'academic_year_id'  => htmlspecialchars($academicId),
        'start_time_pkl'    => htmlspecialchars($this->input->post('starttimepkl')),
        'finish_time_pkl'   => htmlspecialchars($this->input->post('finishtimepkl')),
      ];
      $insert     = $this->Period->insert($dataInsert);
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
    $decodeId   = decodeEncrypt($id);
    $period       = $this->Period->getDataBy(['id' => $decodeId])->row();
    if ($period) {
      $this->_validation();
      if ($this->form_validation->run() === false) {
        $data = [
          'title'         => 'Ubah Periode Pelaksanaan PKL',
          'desc'          => 'Berfungsi untuk mengubah periode pelaksanaan PKL',
          'data'          => $period
        ];
        $page = '/admin/pkn_period/update';
        pageBackend($this->role, $page, $data);
      } else {
        $dataUpdate = [
          'title'             => htmlspecialchars($this->input->post('title')),
          'start_time_pkl'    => htmlspecialchars($this->input->post('starttimepkl')),
          'finish_time_pkl'   => htmlspecialchars($this->input->post('finishtimepkl')),
          'updated_at'        => date('Y-m-d H:i:s')
        ];
        $update     = $this->Period->update($dataUpdate, ['id' => $decodeId]);
        if ($update > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di update');
        } else {
          $this->session->set_flashdata('error', 'Server Sedang sibuk, silahkan coba lagi');
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
      'title',
      'Jenis periode',
      'trim|required',
      [
        'required'  => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'starttimepkl',
      'Tanggal mulai pkl',
      'trim|required',
      [
        'required'  => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'finishtimepkl',
      'Tanggal selesai pkl',
      'trim|required|callback_endtime_check',
      [
        'required'  => '%s wajib diisi',
      ]
    );
  }

  public function endtime_check()
  {
    if (strtotime($this->input->post('finishtimepkl')) < strtotime($this->input->post('starttimepkl'))) {
      $this->form_validation->set_message(__FUNCTION__, 'Tanggal Selesai lebih kecil dari tanggal mulai');
      return false;
    } else {
      return true;
    }
  }
}
