<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_company extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_company_model', 'Company');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Lokasi PKL',
      'desc'          => 'Berfungsi untuk melihat data lokasi PKL',
      'comapnies'     => $this->Company->list(),
      'periode'       => $this->Company->getDataPeriode()->row(),
    ];
    $page = '/mahasiswa/company/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation('insert');
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Data Lokasi PKL',
        'desc'          => 'Berfungsi untuk menambah data lokasi PKL',
        'provinces'      => $this->Company->getAllProvince(),
      ];
      $page = '/mahasiswa/company/create';
      pageBackend($this->role, $page, $data);
    } else {
      $insert = $this->save();
      if ($insert > 0) {
        $this->session->set_flashdata('success', '<b>Penambahan data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect('mahasiswa/company');
    }
  }

  public function update($id, $type)
  {
    $decodeId   = $this->encrypt->decode($id, keyencrypt());
    $company   = $this->Company->getCompanyById($decodeId);

    if (!$company) {
      redirect('mahasiswa/company');
    }
    $this->_validation('update');
    if ($this->form_validation->run() == false && $type == 'edit') {
      $data = [
        'title'         => 'Ubah Data Lokasi PKL',
        'desc'          => 'Berfungsi untuk mengupdate data lokasi PKL',
        'company'       => $company,
        'provinces'     => $this->Company->getAllProvince(),
        'regences'      => $this->Company->getAllRegency()
      ];
      $page       = '/mahasiswa/company/update';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($company));
      $update = $this->save($company->id);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect('mahasiswa/company');
    }
  }

  private function save($id = null)
  {
    $data = $this->input->post();
    $company = [
      'name'        => htmlspecialchars($data['name']),
      'address'     => htmlspecialchars($data['address']),
      'regency_id'  => htmlspecialchars($data['regency_id']),
      'province_id' => htmlspecialchars($data['province_id']),
      'email'       => htmlspecialchars($data['email']),
      'telp'        => htmlspecialchars($data['telp']),
      'pic'         => htmlspecialchars($data['pic']),
    ];
    if ($id) {
      $output     = $this->Company->edit($company, $id);
    } else {
      $output     = $this->Company->insert($company);
    }
    return $output;
  }

  public function regency()
  {
    $province_id = $this->input->post('id');
    $kabupaten   = $this->input->post('kabupaten');

    $data = $this->Company->getAllRegency($province_id);
    $output = '<option value=""> -- Pilih Kabupaten --</option>';
    foreach ($data as $row) {
      if ($kabupaten) {
        if ($kabupaten === $row->id) {
          $output .= '<option value="' . $row->id . '" selected> ' . $row->name . ' </option>';
        } else {
          $output .= '<option value="' . $row->id . '"> ' . $row->name . ' </option>';
        }
      } else {
        $output .= '<option value="' . $row->id . '"> ' . $row->name . ' </option>';
      }
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  private function _validation($type = '')
  {
    if ($type == 'insert') {
      $this->form_validation->set_rules(
        'name',
        'Nama perusahaan',
        'trim|required|min_length[3]',
        [
          'required'      => '%s wajib diisi',
          'min_length'    => '%s minimal 3',
        ]
      );

      $this->form_validation->set_rules(
        'address',
        'Alamat perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'province_id',
        'Provinsi perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'regency_id',
        'Kabupaten perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'email',
        'Email perusahaan',
        'trim|required|valid_email|min_length[5]|is_unique[company.email]',
        [
          'required'      => '%s wajib diisi',
          'valid_email'   => '%s tidak valid',
          'min_length'    => '%s minimal 5',
          'is_unique'     => '%s sudah ada'
        ]
      );

      $this->form_validation->set_rules(
        'telp',
        'Telephone perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'pic',
        'PIC perusahaan',
        'trim|required|min_length[5]',
        [
          'required'      => '%s wajib diisi',
          'min_length'    => '%s minimal 5',
        ]
      );
    }

    if ($type == 'update') {
      $this->form_validation->set_rules(
        'name',
        'Nama perusahaan',
        'trim|required|min_length[3]',
        [
          'required'      => '%s wajib diisi',
          'min_length'    => '%s minimal 3',
        ]
      );

      $this->form_validation->set_rules(
        'address',
        'Alamat perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'province_id',
        'Provinsi perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'regency_id',
        'Kabupaten perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'email',
        'Email perusahaan',
        'trim|required|valid_email|min_length[5]|callback_email_check',
        [
          'required'      => '%s wajib diisi',
          'valid_email'   => '%s tidak valid',
          'min_length'    => '%s minimal 5',
        ]
      );

      $this->form_validation->set_rules(
        'telp',
        'Telephone perusahaan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'pic',
        'PIC perusahaan',
        'trim|required|min_length[5]',
        [
          'required'      => '%s wajib diisi',
          'min_length'    => '%s minimal 5',
        ]
      );
    }
  }

  public function getByIdCompany()
  {
    $companyId = $this->input->post('company_id');
    $results    = $this->Company->getCompanyById($companyId);
    $this->output->set_content_type('application/json')->set_output(json_encode($results));
  }

  // Cek ketika update apakah datanya sama tidak di luar id dirinya sendiri
  function email_check()
  {
    $post   = $this->input->post(NULL, TRUE);
    $query  = $this->db->query("SELECT * FROM company WHERE email = '$post[email]' AND id != '$post[id]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('email_check', '%s ini sudah di pakai, silahkan ganti');
      return FALSE;
    } else {
      return TRUE;
    }
  }
}
