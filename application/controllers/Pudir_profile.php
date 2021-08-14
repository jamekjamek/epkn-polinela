<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pudir_profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pudir/Pudir_profile_model', 'Profile');
    $this->role = 'Pudir';
    cek_login('Pudir');
  }

  public function index()
  {
    $profile  = $this->Profile->getBy();
    $data = [
      'title'         => 'Ubah password',
      'desc'          => 'Berfungsi untuk merubah password',
      'profile'       => $profile,
    ];
    $page       = '/pudir/profile/index';
    pageBackend($this->role, $page, $data);
    $data = $this->input->post();
    if (password_hash(@$data['password'], PASSWORD_DEFAULT) == $profile->password) {
    } else {
      $user = [
        'id'            => @$data['user_id'],
        'password'      => password_hash(@$data['password'], PASSWORD_DEFAULT),
      ];
      $update = $this->Profile->updateUserPassword($user);
    }
    if ($update > 0) {
      $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }
  }
}