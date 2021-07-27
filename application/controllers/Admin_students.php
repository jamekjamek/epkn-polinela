<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin_students extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_students_model', 'Student');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role         = 'admin';
    $this->redirect     = 'admin/master/student';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Mahasiswa',
      'desc'          => 'Berfungsi untuk melihat Data Mahasiswa',
      'students'      => $this->Student->getAllData()->result()
    ];

    $page = '/admin/student/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation();
    if ($this->form_validation->run() === false) {
      $data = [
        'title'         => 'Tambah Data Mahasiswa',
        'desc'          => 'Berfungsi untuk menambah Data Mahasiswa',
      ];
      $page = '/admin/student/create';
      pageBackend($this->role, $page, $data);
    } else {
      $npm            = htmlspecialchars($this->input->post('npm'));
      $academic       = $this->Config->getDataAcademicYear(['status' => 1])->row();
      $academicId     = $academic->id;
      $this->db->set('id', 'UUID()', FALSE);
      $dataInputStudent = [
        'fullname'          => htmlspecialchars($this->input->post('fullname')),
        'npm'               => $npm,
        'email'             => htmlspecialchars($this->input->post('email')),
        'prodi_id'          => htmlspecialchars($this->input->post('prodi')),
        'address'           => htmlspecialchars($this->input->post('address')),
        'birth_date'        => htmlspecialchars($this->input->post('birthdate')),
        'no_hp'             => htmlspecialchars($this->input->post('nohp')),
        'gender'            => htmlspecialchars($this->input->post('gender')),
        'academic_year_id'  => $academicId,
      ];
      $insertStudent      = $this->Student->insert($dataInputStudent);
      $getRole            = $this->Config->getRoleBy('role', ['name' => 'Mahasiswa']);
      if ($insertStudent > 0) {
        $this->db->set('id', 'UUID()', FALSE);
        $dataInsertUser = [
          'username'  => $npm,
          'password'  => password_hash('123456', PASSWORD_DEFAULT),
          'role_id'   => $getRole->id,
        ];
        $insertUser = $this->Config->insertUserTable($dataInsertUser);
        if ($insertUser > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di tambah');
        } else {
          $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
        }
      } else {
        $this->session->set_flashdata('error', 'Server Data Prodi sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirect);
    }
  }

  public function update($id)
  {
    $decode     = decodeEncrypt($id);
    $student    = $this->Student->getDataBy(['a.id' => $decode])->row();
    if ($student) {
      $oldNpm     = $student->npm;
      $this->_validation($oldNpm, $student->email);
      if ($this->form_validation->run() === false) {
        $data = [
          'title'         => 'Ubah Data Dosen',
          'desc'          => 'Berfungsi untuk mengubah Data Dosen',
          'student'       => $student,
        ];
        $page = '/admin/student/update';
        pageBackend($this->role, $page, $data);
      } else {
        $npm          = htmlspecialchars($this->input->post('npm'));
        $dataUpdateStudent = [
          'fullname'      => htmlspecialchars($this->input->post('fullname')),
          'npm'           => $npm,
          'email'         => htmlspecialchars($this->input->post('email')),
          'prodi_id'      => htmlspecialchars($this->input->post('prodi')),
          'address'       => htmlspecialchars($this->input->post('address')),
          'birth_date'    => htmlspecialchars($this->input->post('birthdate')),
          'no_hp'         => htmlspecialchars($this->input->post('nohp')),
          'gender'        => htmlspecialchars($this->input->post('gender')),
          'status'        => htmlspecialchars($this->input->post('status')),
          'updated_at'    => date('Y-m-d H:i:s')
        ];
        $updateStudent      = $this->Student->update($dataUpdateStudent, ['id' => $decode]);
        if ($updateStudent > 0) {
          $cekUserByNpm   = $this->Config->getDataUserBy(['username' => $oldNpm])->row();
          $dataUpdateUser = [
            'username'      => $npm,
            'updated_at'    => date('Y-m-d H:i:s')
          ];

          $userId         = $cekUserByNpm->id;
          $updateUser     = $this->Config->updateUser($dataUpdateUser, ['id' => $userId]);
          if ($updateUser > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di ubah');
          } else {
            $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
          }
        } else {
          $this->session->set_flashdata('error', 'Server Data Dosen sedang sibuk, silahkan coba lagi');
        }
        redirect($this->redirect);
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
      redirect($this->redirect);
    }
  }

  public function delete($id)
  {
    $decodeId   = decodeEncrypt($id);
    $student    = $this->Student->getDataBy(['a.id' => $decodeId])->row();
    if ($student) {
      $deleteprodi    = $this->Student->delete(['id' => $decodeId]);
      if ($deleteprodi > 0) {
        $deleteUser = $this->Config->deleteUser(['username' => $student->npm]);
        if ($deleteUser > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di hapus');
        } else {
          $this->session->set_flashdata('error', 'Server data user sedang sibuk, silahkan coba lagi');
        }
      } else {
        $this->session->set_flashdata('error', 'Server data mahasiswa sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
    }
    redirect($this->redirect);
  }

  public function import()
  {
    $data = [
      'title'         => 'Import Data Mahasiswa',
      'desc'          => 'Berfungsi untuk menambah banyak Data Mahasiswa',
    ];

    $page = '/admin/student/import';
    pageBackend($this->role, $page, $data);
  }

  public function importstudent()
  {
    $config = [
      'upload_path'       => './assets/uploads/',
      'allowed_types'     => 'xlsx|xls',
      'file_name'         => 'doc' . time(),
    ];
    $this->upload->initialize($config);
    if ($this->upload->do_upload('importstudent')) {
      $file   = $this->upload->data();
      $reader = ReaderEntityFactory::createXLSXReader();
      $reader->open('assets/uploads/' . $file['file_name']);

      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow = 1;
        foreach ($sheet->getRowIterator() as $row) {
          if ($numRow > 1) {
            // $email      = $this->Student->getDataBy(['a.email' => $row->getCellAtIndex(2)])->num_rows();
            $npm            = $this->Student->getDataBy(['a.npm' => $row->getCellAtIndex(1)])->num_rows();
            $academic       = $this->Config->getDataAcademicYear(['status' => 1])->row();
            $academicId     = $academic->id;

            if ($npm < 1) {
              $dataInputStudent = array(
                'fullname'          => $row->getCellAtIndex(0),
                'npm'               => $row->getCellAtIndex(1),
                'email'             => $row->getCellAtIndex(2),
                'prodi_id'          => $row->getCellAtIndex(3),
                'address'           => $row->getCellAtIndex(4),
                'birth_date'        => $row->getCellAtIndex(5),
                'no_hp'             => $row->getCellAtIndex(6),
                'gender'             => $row->getCellAtIndex(7),
                'academic_year_id'  => $academicId
              );
              $this->Student->importData($dataInputStudent);
              $getRole            = $this->Config->getRoleBy('role', ['name' => 'Mahasiswa']);
              $dataInputUser  =   [
                'username'  => $row->getCellAtIndex(1),
                'password'  => password_hash('123456', PASSWORD_DEFAULT),
                'role_id'   => $getRole->id,
              ];
              $this->Config->importData($dataInputUser);
            }
          }
          $numRow++;
        }
        $reader->close();
        unlink(FCPATH . 'assets/uploads/' . $file['file_name']);
        $this->session->set_flashdata('success', 'Import Data Berhasil');
        redirect($this->redirect);
      }
    } else {
      echo "Error :" . $this->upload->display_errors();
    }
  }

  public function export()
  {
    $data   =   [
      'title'             => 'Data Mahasiswa',
      'allData'           => $this->Student->getAllData()->result()
    ];

    $this->load->view('admin/student/export/excel', $data);
  }

  private function _validation($npm = null, $email = null)
  {
    if ($this->input->post('npm') !== $npm) {
      $is_unique  = '|is_unique[user.username]';
    } else {
      $is_unique  = '';
    }
    $this->form_validation->set_rules(
      'npm',
      'NPM',
      'trim|required|max_length[8]|min_length[8]' . $is_unique,
      [
        'required' => '%s wajib di isi',
      ]
    );

    $this->form_validation->set_rules(
      'fullname',
      'Nama Lengkap',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    if ($this->input->post('email') !== $email) {
      $is_unique  = '|is_unique[student.email]';
    } else {
      $is_unique  = '';
    }
    $this->form_validation->set_rules(
      'email',
      'Email',
      'trim|valid_email' . $is_unique,
      [
        'required'      => '%s wajib di isi',
        'valid_email'   => 'Format %s salah'
      ]
    );

    if ($this->input->post('prodi') === "") {
      $this->form_validation->set_rules(
        'prodi',
        'Program Studi',
        'trim|required',
        [
          'required' => '%s wajib di isi',
        ]
      );
    }
  }
}
