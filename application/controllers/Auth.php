<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model', 'Auth');
  }

  public function index()
  {
    $session = $this->session->userdata('username');
    if ($session) {
      $password = "123456";
      if (password_verify($password, $session->password) && $session->name != 'Admin') {
        return redirect('/auth/changedefault');
      }
      if ($session->name === 'Sekjur') {
        redirect('major/dashboard');
      }
      redirect(strtolower($session->name)  . '/dashboard');
    }
    $page = '/auth/index';
    pageAuth($page);
  }

  public function indexchangepasswordfromdefault()
  {
    $page = '/auth/change_pass_default';
    $data = [
      '__url_form' => base_url('/auth/changedefault'),
    ];
    pageAuth($page, $data);
  }

  public function forgotPassword()
  {
    $page = '/auth/index_forgot';
    pageAuth($page);
  }

  public function reset()
  {
    $check = $this->Auth->userCheck($this->input->post('username'))->row();
    if ($check->username == $this->input->post('username')) {
      $passnew = random_string('alnum', 15);
      $data = [
        'password'  =>  password_hash($passnew, PASSWORD_DEFAULT),
      ];
      $updateUser = $this->Auth->update($data, $check->id);
      if ($updateUser > 0) {
        $this->session->set_flashdata('sukses', 'Silahkan copy password baru anda dibawah ini <br>' . $passnew);
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
      redirect('auth/forgot_password');
    } else {
      $this->session->set_flashdata('error', 'Username ' . $this->input->post('username') . ' tidak ditemukan!');
      redirect('auth/forgot_password');
    }
    $this->output->delete_cache();
  }


  public function login()
  {
    $this->_validation();
    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $this->_login();
    }
  }

  public function changepasswordfromdefault()
  {
    cek_login();
    $this->_validationNewPass();
    if ($this->form_validation->run() == FALSE) {
      $this->indexchangepasswordfromdefault();
    } else {
      $this->_setnewpasswodfromdefault();
    }
  }

  public function logout()
  {

    date_default_timezone_set("ASIA/JAKARTA");
    $date = array('last_login' => date('Y-m-d H:i:s'));
    $username = $this->session->userdata('user');
    $this->Auth->logout($date, $username);
    $this->session->sess_destroy();
    redirect(base_url());
  }

  private function _validation()
  {
    $this->form_validation->set_rules(
      'username',
      'Email',
      'trim|required',
      [
        'required'      => 'Username wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'password',
      'password',
      'trim|required',
      [
        'required' => 'Password wajib diisi',
      ]
    );
  }

  private function _validationNewPass()
  {
    $this->form_validation->set_rules(
      'new_password',
      'Sandi Baru',
      'trim|required|min_length[8]',
      [
        'required'      => 'Sandi wajib diisi',
        'min_length'      => 'Sandi minimal 8 karakter',
      ]
    );

    $this->form_validation->set_rules(
      'retype_new_password',
      'Ulang Sandi Baru',
      'trim|required|matches[new_password]',
      [
        'required' => 'Ulang Sandi wajib diisi',
        'matches' => 'Harus sama dengan kolom Sandi Baru',
      ]
    );
  }

  private function _login()
  {
    $username   = $this->input->post('username');
    $password   = $this->input->post('password');
    $ceKemail   = $this->Auth->userCheck($username);
    if ($ceKemail->num_rows() > 0) {
      $dataUser    =  $ceKemail->row();
      if (password_verify($password, $dataUser->password)) {
        if ($dataUser->name == 'Prodi') {
          $this->load->model('Kaprodi/Pkl_Prodi_Model', 'Prodi');
          if (!$this->Prodi->getByEmailCheckStatusKaprodi($dataUser->username)) {
            $this->session->set_flashdata('errorpassword', 'Password yang anda masukan salah');
            return redirect('/auth');
          }
        }
        $this->session->set_userdata('username', $dataUser);
        $this->session->set_userdata('role', $dataUser->name);
        $this->session->set_userdata('user', $dataUser->username);
        if ((string)$password == "123456" && $dataUser->name != 'Admin') {
          return redirect('/auth/changedefault');
        }
        switch ($dataUser->name) {
          case 'Admin':
            return redirect('/admin/dashboard');
            break;
          case 'Mahasiswa':
            return redirect('/mahasiswa/dashboard');
            break;
          case 'Prodi':
            return redirect('/prodi/dashboard');
            break;
          case 'Dosen':
            return redirect('/dosen/dashboard');
            break;
          case 'Supervisor':
            return redirect('/supervisor/dashboard');
            break;
          case 'Sekjur':
            return redirect('/major/dashboard');
            break;
          case 'Pudir':
            return redirect('/pudir/dashboard');
            break;
          case 'Ketuplak':
            return redirect('/ketuplak/dashboard');
            break;
          default:
            return redirect('/auth');
            break;
        }
      } else {
        $this->session->set_flashdata('errorpassword', 'Password yang anda masukan salah');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('errorusername', '' . $username . ' tidak ada di sistem');
      redirect('auth');
    }
  }

  private function _setnewpasswodfromdefault()
  {
    $session = $this->session->userdata('username');
    $newpassword   = $this->input->post('new_password');
    $result   = $this->Auth->update(['password' => password_hash($newpassword, PASSWORD_DEFAULT)], $session->id);
    if ($result) {
      if ($session->name === 'Sekjur') {
        redirect('major/dashboard');
      } else {
        redirect(strtolower($session->name)  . '/dashboard');
      }
    }
  }

  public function login_page()
  {
    $this->load->view('auth/new_index');
  }
}
