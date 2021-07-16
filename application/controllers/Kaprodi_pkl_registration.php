<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_pkl_registration extends Kaprodi_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kaprodi/Pkl_Registration_Model', 'Registration');
    $this->load->model('Kaprodi/Pkl_Prodi_Model', 'Prodi');
    $this->load->model('Kaprodi/Pkl_Academic_year_model', 'Academic');
    $this->load->model('Kaprodi/Ref_Lecture_model', 'RefLecture');
    $this->load->model('Kaprodi/Ref_User_model', 'RefUser');
    $this->load->model('Kaprodi/Pkl_Supervisor_model', 'Supervisor');
    $this->load->model('Kaprodi/Pkl_Location_Model', 'Location');
    $this->load->model('Kaprodi/Pkl_Response_Letter_model', 'ResponseLetter');
    $this->title = 'Kelompok PKL';
    $this->viewpath = $this->parentviewpath . '/pkl_verifikasi/';
    $this->route = $this->parentroute . '/pkl_verifikasi/';
  }

  public function index($academic_year_id = null)
  {

    // get data prodi
    $prodi = $this->Prodi->getByEmail($this->session->user);
    $data = [
      'title'             => 'Registrasi ' . $this->title,
      'academic_id'       => $academic_year_id,
      'desc'              => 'Berfungsi untuk meregistrasi data ' . $this->title,
      'data_registration' => $this->Registration->getRegistrationByProdiAndStatus($prodi->id, $academic_year_id),
      '__url_approval'    => base_url($this->parentroute . '/pkl_registrasi/approval/'),
      '__url_index'       => base_url($this->parentroute . '/pkl_registrasi/period/'),
      '__url_verifikasi'  => base_url($this->route . 'verifikasi/'),
      '__url_detail'      => base_url($this->parentroute . '/pkl_registrasi/detail/'),
      '__url_upload'      => base_url($this->parentroute . '/pkl_registrasi/uploaded/'),
      '__url_file'        => base_url('/assets/uploads/'),
    ];
    $page = $this->parentviewpath . '/pkl_registrasi/index';
    pageBackend($this->role, $page, $data);
  }

  public function verifikasi($id)
  {
    $decodeId   = decodeEncrypt($id);
    $update     = $this->Registration->update(['group_status' => 'diverifikasi'], $decodeId);
    if ($update > 0) {
      $this->session->set_flashdata('success', '<b>Verifikasi data berhasil</b>');
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }
    // redirect($this->route, 'refresh');
    redirect('config/historyVerfication/' . $decodeId);
  }

  public function approval($group_id, $status, $redirect = null)
  {
    $decodeId   = decodeEncrypt($group_id);
    $update     = $this->Registration->updatebyGroupId(['group_status' => $status], $decodeId);
    if ($update > 0) {
      $this->session->set_flashdata('success', '<b>Approval data berhasil</b>');
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }
    if ($redirect != 'index') {
      redirect($this->parentroute . '/pkl_registrasi/detail/' . str_replace('detail-', '', $redirect), 'refresh');
    }
    redirect($this->parentroute . '/pkl_registrasi', 'refresh');
  }

  private function generateSupervisor()
  {
    $prodi = $this->Prodi->getByEmail($this->session->user);
    $latest_supervisor = $this->Supervisor->getLatest($prodi->code);
    if ($latest_supervisor) {
      $arrayusername = explode('_', $latest_supervisor->username);
      $index = (int) $arrayusername[2];
      $arrayusername[2] = $index + 1;

      $strnewsupervisor = implode('_', $arrayusername);
    } else {
      $strnewsupervisor = 'pl_' . $prodi->code . '_1';
    }
    return $strnewsupervisor;
  }

  public function uploaded()
  {
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 3000;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $data = $this->input->post();
    if ($this->upload->do_upload('file')) {
      $fileData = $this->upload->data();
      $upload = [
        'letter_number'         => $data['letter_number'],
        'file'                  => $fileData['file_name'],
        'registration_group_id' => $data['registration_group_id'],
      ];
      $this->db->set('id', 'UUID()', false);
      if ($this->ResponseLetter->insert($upload)) {
        $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di simpan!</p>');
      } else {
        $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
      }
      redirect(base_url($this->parentroute . '/pkl_registrasi/'));
    } else {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect(base_url($this->parentroute . '/pkl_registrasi/'));
    }
  }

  // AJAX
  public function getLecture()
  {
    $data = $this->RefLecture->getAll();

    $response = array(
      'status' => 'OK',
      'data'  => $data
    );

    outputJson($response);
  }

  public function getPklLocation($group_id)
  {
    $prodi = $this->Prodi->getByEmail($this->session->user);
    $data = $this->Location->getPklLocationRegistrationNotGroupId($prodi->id, $group_id);

    $response = array(
      'status' => 'OK',
      'data'  => $data
    );

    outputJson($response);
  }

  public function getPklAcademicYear()
  {
    $data = $this->Academic->getAll();

    $response = array(
      'status' => 'OK',
      'data'  => $data
    );

    outputJson($response);
  }

  public function approvalAPI()
  {
    $data = $this->input->post();

    $dataUpdate = array(
      "group_status" => $data['grp_status']
    );

    if ($data['grp_status'] == 'diterima') {
      $str_msg = 'diterima.';
      $dataUpdate["lecture_id"] = $data['lecture'];
      $prodi = $this->Prodi->getByEmail($this->session->user);

      $regisration = $this->Registration->getOneRegistrationMemberByGrpId($data['grp_id']);
      if (!$regisration) {
        $company = $this->Registration->getCompanyById($prodi->id, $data['id']);
        $username = $this->generateSupervisor();
        // insert new supervisor
        $this->db->set('id', 'UUID()', false);
        $supervisor_id = $this->Supervisor->insert(array(
          'username' => $username,
          'company_id' => $company->company_id
        ));
        // insert new user supervisor
        $this->db->set('id', 'UUID()', FALSE);
        $this->RefUser->insert(array(
          'username'  => $username,
          'password'  => password_hash('123456', PASSWORD_DEFAULT),
          'role_id'   => '775b0fa8-b7a8-11eb-a91e-0cc47abcfaa6',
        ));
      }

      // get latest inserted supervisor
      $latest_supervisor = $this->Supervisor->getLatest($prodi->code);
      $dataUpdate["supervisor_id"] = $latest_supervisor->id;
    } else {
      $dataUpdate['verify_member'] = 'Ditolak';
      $str_msg = 'ditolak.';
    }

    $update = $this->Registration->update($dataUpdate, $data['id']);
    if ($update > 0) {
      $this->session->set_flashdata('success', "<b>data berhasil $str_msg</b>");
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }

    $response = array(
      'status'    => 'OK',
      // 'redirect'  => base_url($this->parentroute . "/pkl_registrasi/$data[redirect]")
      'redirect'  => base_url($this->parentroute . "/config/historyapproval/" . $data['grp_id'])
    );

    outputJson($response);
  }

  public function changeLocation()
  {
    $data = $this->input->post();

    $jointoregistration = $this->Registration->getRegistrationId($data['join_to_id']);
    $datachange = [
      "group_id" => $jointoregistration->group_id,
      "company_id" => $jointoregistration->company_id,
      "start_date" => $jointoregistration->start_date,
      "finish_date" => $jointoregistration->finish_date,
      "group_status" => $jointoregistration->group_status,
      "verify_member" => $jointoregistration->verify_member,
      "lecture_id" => $jointoregistration->lecture_id,
      "supervisor_id" => $jointoregistration->supervisor_id
    ];

    $update = $this->Registration->update($datachange, $data['id']);
    if ($update > 0) {
      $this->session->set_flashdata('success', '<b>Berhasil Memindah Lokasi</b>');
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }

    $response = array(
      'status' => 'OK',
      'redirect'  => base_url($this->parentroute . "/pkl_registrasi/$data[redirect]")
    );

    outputJson($response);
  }
}
