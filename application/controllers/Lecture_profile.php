<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecture_profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Lecture/Lecture_profile_model', 'Profile');
    $this->role = 'dosen';
    cek_login('Dosen');
    $this->redirectUrl = 'dosen/profile';
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
      $page       = '/lecture/profile/index';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($profile));
      $data = $this->input->post();
    //   die(var_dump($data));
      if(password_hash($data['password'], PASSWORD_DEFAULT) == $profile->password) {
          $profile = [
            'id'            => $data['id'],
            'email'         => $data['email']
          ];
          $update = $this->Profile->update($profile);
      } elseif($data['password'] == '') {
          $profile = [
            'id'            => $data['id'],
            'email'         => $data['email']
          ];
          $update = $this->Profile->update($profile);
      } else {
          $profile = [
            'id'            => $data['id'],
            'email'         => $data['email']
          ];
          $update = $this->Profile->update($profile);
           $user = [
           'id'            => $data['user_id'],
           'password'      => password_hash($data['password'], PASSWORD_DEFAULT),
          ];
          $update = $this->Profile->updateUserPassword($user);
      }
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
      'email',
      'Email',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );
  }
}
