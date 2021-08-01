<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor_profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Supervisor/Supervisor_profile_model', 'Profile');
    $this->role = 'supervisor';
    cek_login('Supervisor');
    $this->redirectUrl = 'supervisor/profile';
  }

  public function index()
  {
    $profile  = $this->Profile->getBy();
    $this->_validation();
    if ($this->form_validation->run() == false) {
      $data = [
        'title'         => 'Update Profile',
        'desc'          => 'Berfungsi untuk merubah data profil',
        'profile'       => $profile,
      ];
      $page       = '/supervisor/profile/index';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($profile));
      $data = $this->input->post();
      $profile = [
        'id'            => $data['id'],
        'telp'          => $data['telp'],
        'pic'           => htmlspecialchars($data['pic']),
        'norek'         => htmlspecialchars($data['norek']),
        'bank_name'     => htmlspecialchars($data['bank_name']),
      ];
      $update = $this->Profile->update($profile);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->redirectUrl);
    }
  }

  private function _validation()
  {
    $this->form_validation->set_rules(
      'pic',
      'Nama Lengkap',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    $this->form_validation->set_rules(
      'norek',
      'Nomor Rekening',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    $this->form_validation->set_rules(
      'bank_name',
      'Nama Bank',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    $this->form_validation->set_rules(
      'telp',
      'Nomor telp',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );
  }
}
