<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa_registration extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
    $this->load->model('Mahasiswa/Mahasiswa_profile_model', 'Profile');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
  }

  public function index()
  {

    $dataRow = $this->Registration->getDataLeaderId();

    if ($dataRow) {
      @$leaderId   = $dataRow->leaderid;
      @$prodiId    = $dataRow->prodi_id;
      @$members    = $this->Registration->getStudent(null, $prodiId, $leaderId)->result();
    }
    $data = [
      'title'         => 'Data Pendaftaran PKL',
      'desc'          => 'Berfungsi untuk melihat data pendafaftaran PKL',
      'group_id'      => $this->Registration->list()->row_array(),
      'registerCheck' => $this->Registration->registerCheck(),
      'periode'       => $this->Registration->getDataPeriode()->row(),
      'verification'  => $this->Registration->list()->row_array(),
      'isCheckLetter' => $this->Registration->isCheckLetter()->row_array(),
      'profile'       => $this->Profile->getBy(),
      'members'       => @$members,
      'leader'        => @$dataRow
    ];

    $page = '/mahasiswa/registration/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $data = [
      'title'         => 'Pendaftaran PKL',
      'desc'          => 'Berfungsi untuk pendaftaran PKL',
      'student'       => $this->Registration->getStudentProdi(),
      'periode'       => $this->Registration->getDataPeriode()->row(),
    ];
    $page = '/mahasiswa/registration/create';
    pageBackend($this->role, $page, $data);
  }

  public function addnewmember()
  {
    $id         = $this->input->post('id');
    $leader     = $this->Registration->getDataBy(['a.id' => $id])->row();
    $memberId   = $this->input->post('member');
    if ($memberId !== null) {
      $insert         = 0;
      foreach ($memberId as $member) {
        $this->db->set('id', 'UUID()', FALSE);
        $dataInsertMember   = [
          'group_id'          => $leader->group_id,
          'company_id'        => $leader->company_id,
          'start_date'        => $leader->start_date,
          'finish_date'       => $leader->finish_date,
          'student_id'        => $member,
          'status'            => 'Anggota',
          'prodi_id'          => $leader->prodi_id,
          'group_status'      => $leader->group_status,
          'academic_year_id'  => $leader->academic_year_id,
        ];
        $this->Registration->insert($dataInsertMember);
        $insert++;
      }
      if ($insert > 0) {
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Tidak ada anggota group yang di pilih');
    }
    redirect('mahasiswa/registration');
  }

  public function getCompany()
  {
    $input      = $this->input->post('search');
    $results    = $this->Registration->getCompany($input)->result();
    $selectAjax = array();
    foreach ($results as $row) {
      $selectAjax[]   = [
        'id'    => $row->id,
        'text'  => strtoupper($row->name)  . ' - ' . strtoupper($row->regency_name)  . ' - ' . strtoupper($row->province_name)
      ];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($selectAjax));
  }

  public function getMember()
  {
    $leaderId   = $this->input->post("leaderId");
    $prodiId    = $this->input->post("prodiId");
    $data       = $this->Registration->getStudent(null, $prodiId, $leaderId)->result();
    $output     = "";
    foreach ($data as $student) {
      $output     .= "
                <tr>
                    <td><input type='checkbox' class='member-checkbox' name='member[]' value='" . $student->id . "'></td>
                    <td>" . $student->fullname . "</td>
                    <td>" . $student->prodi_name . "</td>
                </tr>
            ";
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function createGroup()
  {
    $leaderId   = $this->input->post('leaderId');
    $companyId  = $this->input->post('companyId');
    $memberId   = $this->input->post('memberId');
    $startDate  = $this->input->post('startDate');
    $finishDate = $this->input->post('finishDate');
    $cekCompany = $this->Registration->getDataCompanyBy(['id' => $companyId])->row();

    if ($cekCompany->label === 'prodi') {
      $cekPeriode                 = $this->Registration->getDataPeriode()->row();
      $cekCompanyInRegistration   = $this->Registration->getDataCompanyInRegistration(['company_id' => $companyId], $cekPeriode->start_time, $cekPeriode->finish_time);
      if ($cekCompanyInRegistration->num_rows() > 0) {
        $status['message'] = 'failedcompany';
      } else {
        $status                   = $this->_insertRegistration($leaderId, $startDate, $finishDate, $companyId, $memberId);
      }
    } else {
      $status = $this->_insertRegistration($leaderId, $startDate, $finishDate, $companyId, $memberId);
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($status));
  }

  private function _insertRegistration($leaderId, $startDate, $finishDate, $companyId, $memberId)
  {
    $prodiLeader    = $this->Registration->getDataStudentBy(['id' => $leaderId])->row();
    $academic       = $this->Registration->getDataAcademicYear(['status' => 1])->row();
    $academicId     = $academic->id;
    $groupId        = strtotime($startDate) . $leaderId;
    $this->db->set('id', 'UUID()', FALSE);
    $dataInsertLeader   = [
      'group_id'      => $groupId,
      'company_id'    => $companyId,
      'start_date'    => $startDate,
      'finish_date'   => $finishDate,
      'student_id'    => $leaderId,
      'status'        => 'Ketua',
      'prodi_id'      => $prodiLeader->prodi_id,
      'academic_year_id'  => $academicId,
      'verify_member' => 'Diterima'
    ];
    $insertLeader       = $this->Registration->insert($dataInsertLeader);
    $status             = [];
    if ($insertLeader > 0) {
      //insert member
      if ($memberId !== null) {
        $insert         = 0;
        foreach ($memberId as $member) {
          $prodiMember    = $this->Registration->getDataStudentBy(['id' => $member])->row();
          $this->db->set('id', 'UUID()', FALSE);
          $dataInsertMember   = [
            'group_id'          => $groupId,
            'company_id'        => $companyId,
            'start_date'        => $startDate,
            'finish_date'       => $finishDate,
            'student_id'        => $member,
            'status'            => 'Anggota',
            'prodi_id'          => $prodiMember->prodi_id,
            'group_status'      => 'belum_terverifikasi',
            'academic_year_id'  => $academicId,
          ];
          $this->Registration->insert($dataInsertMember);
          $insert++;
        }
        if ($insert > 0) {
          $status['message']  = 'success';
        } else {
          $status['message']  = 'failedmember';
        }
      } else {
        $status['message']  = 'success';
      }
    } else {
      $status['message']  = 'failed';
    }
    return $status;
  }

  public function invited()
  {
    $data = $this->input->post();
    $invited = [
      'verify_member'     => $data['invited'],
      'student_id'        => $data['student_id']
    ];
    $output     = $this->Registration->invited($invited);
    if ($output) {
      redirect('config/historyupdate/' . $data['student_id'] . '/' . $data['invited']);
    }
  }

  public function uploaded()
  {
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 3000;
    $this->upload->initialize($config);
    $data = $this->input->post();
    if ($this->upload->do_upload('file')) {
      $fileData = $this->upload->data();
      $upload = [
        'letter_number'         => $data['letter_number'],
        'file'                  => $fileData['file_name'],
        'registration_group_id' => $data['registration_group_id'],
      ];
      if ($this->Registration->uploaded($upload)) {
        $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di simpan!</p>');
      } else {
        $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
      }
      redirect(base_url('mahasiswa/registration'));
    } else {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect(base_url('mahasiswa/registration'));
    }
  }
}
