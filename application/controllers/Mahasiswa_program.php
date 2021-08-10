<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_program extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_program_model', 'Planning');
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
    $this->redirect = ('mahasiswa/program');
  }

  public function index()
  {
    $groupBy = $this->Planning->groupByCheck()->row();
    // die(var_dump($groupBy));
    $data = [
      'title'         => 'Data Program PKN',
      'desc'          => 'Berfungsi untuk melihat data program PKN',
      'check'         => $groupBy,
      'plannings'     => $this->Planning->list($groupBy->group_id)->result()
    ];
    $page = '/mahasiswa/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation('insert');
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Program PKN',
        'desc'          => 'Berfungsi untuk menambah data data program PKN',
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
      redirect($this->redirect);
    }
  }

  public function update($id, $type)
  {
    $decryptId      = $this->encrypt->decode($id, keyencrypt());
    $plan           = $this->Planning->getDataById($decryptId);
    if (!$plan) {
      redirect('mahasiswa/program');
    };
    $this->_validation('update');
    if ($this->form_validation->run() == false && $type == 'edit') {
      $data = [
        'title'         => 'Update Program PKN',
        'desc'          => 'Berfungsi untuk merubah data data program PKN',
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
      redirect($this->redirect);
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
  
  public function delete($id)
  {
    $decodeId   = decodeEncrypt($id);
    $program    = $this->Planning->getDataById($decodeId);
    if ($program) {
      $deleteprogram    = $this->Planning->delete($decodeId);
      if ($deleteprogram > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di hapus');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
    }
    redirect($this->redirect);
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
    $groupBy = $this->Planning->groupByCheck()->row();
    $input      = $this->input->post('search');
    $results    = $this->Planning->getCapaian($groupBy->group_id)->result();
    $selectAjax = array();
    foreach ($results as $row) {
      $selectAjax[]   = [
        'id'    => $row->learning_achievement,
        'text'  => $row->learning_achievement
      ];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($selectAjax));
  }
}
