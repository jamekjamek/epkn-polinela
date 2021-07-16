<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_pkl_location extends Kaprodi_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kaprodi/Pkl_Location_Model', 'Location');
    $this->load->model('Kaprodi/Ref_Province_model', 'RefProvince');
    $this->load->model('Kaprodi/Ref_Regency_model', 'RefRegency');
    $this->title = 'Lokasi PKL';
    $this->viewpath = $this->parentviewpath . '/location/';
    $this->route = $this->parentroute . '/pkl_location/';
  }

  public function index()
  {
    $data = [
      'title'         => 'Data ' . $this->title,
      'desc'          => 'Berfungsi untuk melihat data ' . $this->title,
      'locations'      => $this->Location->getAll(),
      '__url_create'  => base_url($this->route . 'create'),
      '__url_edit'  => base_url($this->route . 'edit/'),
      '__url_verifikasi'  => base_url($this->route . 'verifikasi/'),
      '__url_delete'  => base_url($this->route . 'delete/'),
    ];
    $page = $this->viewpath . 'index';
    pageBackend($this->role, $page, $data);
  }

  //- Add logic create, Buat view create location.
  public function create()
  {
    $data = [
      'title'         => 'Tambah Data ' . $this->title,
      'desc'          => 'Berfungsi untuk menambah Data ' . $this->title,
      '__url_index'  => base_url($this->route),
      '__url_store'  => base_url($this->route . 'store')
    ];

    $page = $this->viewpath . 'create';
    pageBackend($this->role, $page, $data);
  }

  //- Add logic store, save ke db.
  public function store()
  {
    $this->_validation('insert');
    if ($this->form_validation->run() != FALSE) {
      $insert = $this->save();
      if ($insert > 0) {
        $this->session->set_flashdata('success', '<b>Penambahan data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->route);
    } else {
      $this->create();
    }
  }

  //- Add logic edit, Buat view edit location.
  public function edit($id)
  {
    $decodeId   = decodeEncrypt($id);
    $location   = $this->Location->getById($decodeId);

    if (!$location) {
      redirect($this->route);
    }
    $data = [
      'title'         => 'Ubah Data ' . $this->title,
      'desc'          => 'Berfungsi untuk mengupdate data ' . $this->title,
      'location'      => $location,
      '__url_index'  => base_url($this->route),
      '__url_update'  => base_url($this->route . 'update/' . $id)
    ];
    $page = $this->viewpath . 'edit';
    pageBackend($this->role, $page, $data);
  }

  //- Update logic update, save ke db.
  public function update($id)
  {
    $decodeId   = decodeEncrypt($id);

    $this->_validation('update');
    if ($this->form_validation->run() != FALSE) {
      $update = $this->save($decodeId);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Penambahan data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      // var_dump($update);
      redirect($this->route);
    } else {
      $this->edit($id);
    }
  }

  public function verifikasi($id)
  {
    $decodeId   = decodeEncrypt($id);
    $verify = $this->Location->update(['status' => 'verify'], $decodeId);
    if ($verify > 0) {
      $this->session->set_flashdata('success', '<b>Verifikasi data berhasil</b>');
    } else {
      $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
    }
    redirect($this->route);
  }

  //- Destroy logic delete row.
  public function destroy($id)
  {
    $decodeId   = decodeEncrypt($id);
    $location    = $this->Location->getById($decodeId);
    if ($location) {
      $deleteLocation    = $this->Location->delete(['id' => $decodeId]);
      if ($deleteLocation > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di hapus');
      } else {
        $this->session->set_flashdata('error', 'Server data user sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
    }
    redirect($this->route);
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

  private function save($id = null)
  {
    $data = $this->input->post();
    $location = [
      'name'        => htmlspecialchars($data['name']),
      'address'     => htmlspecialchars($data['address']),
      'regency_id'  => htmlspecialchars($data['regency_id']),
      'province_id' => htmlspecialchars($data['province_id']),
      'email'       => htmlspecialchars($data['email']),
      'telp'        => htmlspecialchars($data['telp']),
      'pic'         => htmlspecialchars($data['pic'])
    ];
    if ($id) {
      $output     = $this->Location->update($location, $id);
    } else {
      $this->db->set('id', 'UUID()', false);
      $location['status'] = 'verify';
      $output     = $this->Location->insert($location);
    }
    return $output;
  }

  function email_check()
  {
    $post   = $this->input->post(NULL, TRUE);
    $decodeId   = decodeEncrypt($this->uri->segments[4]);

    if ($this->Location->checkEmail($post['email'], $decodeId)) {
      $this->form_validation->set_message('email_check', '%s ini sudah di pakai, silahkan ganti');
      return true;
    }
    return false;
  }

  //List API AJAX
  public function getRegecy()
  {
    $data = $this->RefRegency->getAll();

    $response = array(
      'status' => 'OK',
      'data'  => $data
    );

    outputJson($response);
  }

  public function getProvince()
  {
    $data = $this->RefProvince->getAll();

    $response = array(
      'status' => 'OK',
      'data'  => $data
    );

    outputJson($response);
  }
}
