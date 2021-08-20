<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->role = 'admin';
    $this->load->model('Dashboard_model', 'Dashboard');
    $this->load->model('Admin/Admin_config_model', 'Profile');
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'academic'      => $this->Dashboard->getAcademicYear(),
      'location'      => $this->Dashboard->getLocation(),
      'registration'  => $this->Dashboard->getRegistration(),
      'graduation'    => $this->Dashboard->getGraduation(),
    ];
    $page = '/dashboard/admin_dashboard';
    pageBackend($this->role, $page, $data);
  }
  
  public function changePassword()
  {
    $profile  = $this->Profile->getyByUsernameAdmin();
    $data = [
      'title'         => 'Ubah password',
      'desc'          => 'Berfungsi untuk merubah password',
      'profile'       => $profile,
    ];
    $page       = '/admin/changepassword';
    pageBackend($this->role, $page, $data);
    $data = $this->input->post();
    if (password_hash(@$data['password'], PASSWORD_DEFAULT) == $profile->password) {
    } else {
      $user = [
        'id'            => @$data['user_id'],
        'password'      => password_hash(@$data['password'], PASSWORD_DEFAULT),
      ];
      $update = $this->Profile->updateUserPassword($user);
      if (@$update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
    }
  }
}

/* End of file Dashboard.php */