<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_planning extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_planning_model', 'Planning');
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Perencanaan Kegiatan PKL',
      'desc'          => 'Berfungsi untuk melihat data perencanaan kegiatan PKL',
      'group_id'      => $this->Registration->list()->row_array(),
      'plannings'     => $this->Planning->list()->result(),
      'isCheck'       => $this->Planning->isCheck()->row()
    ];
    $page = '/mahasiswa/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation('insert');
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Perencanaan Kegiatan PKL',
        'desc'          => 'Berfungsi untuk menambah data perencanaan kegiatan PKL',
        'registration'  => $this->Registration->list()->row_array(),
      ];
      $page = '/mahasiswa/planning/create';
      pageBackend($this->role, $page, $data);
    } else {
      $insert = $this->save();
      if ($insert > 0) {
        $this->session->set_flashdata('success', '<b>Penambahan data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect('mahasiswa/planning');
    }
  }

  public function update($id, $type)
  {
    $decryptId      = $this->encrypt->decode($id, keyencrypt());
    $plan           = $this->Planning->getDataById($decryptId);
    if (!$plan) {
      redirect('mahasiswa/planning');
    };
    $this->_validation('update');
    if ($this->form_validation->run() == false && $type == 'edit') {
      $data = [
        'title'         => 'Update Perencanaan Kegiatan PKL',
        'desc'          => 'Berfungsi untuk merubah data perencanaan kegiatan PKL',
        'plan'          => $plan,
        'registration'  => $this->Registration->list()->row_array(),
      ];
      $page       = '/mahasiswa/planning/update';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($plan));
      $update = $this->save($plan->id);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect('mahasiswa/planning');
    }
  }

  private function save($id = null)
  {
    $data = [
      'registration_id'           => $this->input->post('registration_id'),
      'learning_achievement'      => $this->input->post('learning_achievement'),
      'learning_achievement_sub'  => $this->input->post('learning_achievement_sub'),
      'time_qty'                  => $this->input->post('time_qty')
    ];
    if ($id) {
      $output     = $this->Planning->update($data, $id);
    } else {
      $output     = $this->Planning->insert($data);
    }
    return $output;
  }

  private function _validation($type = '')
  {
    if ($type == 'insert') {
      $this->form_validation->set_rules(
        'learning_achievement',
        'Capaian kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'learning_achievement_sub',
        'Sub capaian kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'time_qty',
        'Jumlah Jam',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }


    if ($type == 'update') {
      $this->form_validation->set_rules(
        'learning_achievement',
        'Capaian kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'learning_achievement_sub',
        'Sub capaian kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'time_qty',
        'Jumlah Jam',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }
  }

  public function getCapaian()
  {
    $input      = $this->input->post('search');
    $results    = $this->Planning->getCapaian($input)->result();
    $selectAjax = array();
    foreach ($results as $row) {
      $selectAjax[]   = [
        'id'    => $row->learning_achievement,
        'text'  => $row->learning_achievement
      ];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($selectAjax));
  }

  public function getSubCapaian()
  {
    $input      = $this->input->post('search');
    $results    = $this->Planning->getSubCapaian($input)->result();
    $selectAjax = array();
    foreach ($results as $row) {
      $selectAjax[]   = [
        'id'    => $row->learning_achievement_sub,
        'text'  => $row->learning_achievement_sub
      ];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($selectAjax));
  }
}
