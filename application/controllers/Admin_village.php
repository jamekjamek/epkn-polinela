<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin_village extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_village_model', 'Village');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role         = 'admin';
    $this->redirect     = 'admin/master/village';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Desa PKN',
      'desc'          => 'Berfungsi untuk melihat Data Desa PKN',
      'allvillage'    => $this->Village->getAllData()->result()
    ];

    $page = '/admin/village/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $this->_validation();
    if ($this->form_validation->run() === false) {
      $data = [
        'title'         => 'Tambah Desa PKN',
        'desc'          => 'Berfungsi untuk menambah desa PKN',
      ];
      $page = '/admin/village/create';
      pageBackend($this->role, $page, $data);
    } else {
      $this->db->set('id', 'UUID()', FALSE);
      $postRegency      = htmlspecialchars($this->input->post('regency'));
      $explode          = explode(":", $postRegency);
      $regencyId        = $explode[0];
      $districtsId      = $explode[1];
      $cekProv          = $this->Config->cekProv($regencyId);
      $provId           = $cekProv->province_id;
      $dataInput = [
        'name'          => htmlspecialchars($this->input->post('name')),
        'address'       => htmlspecialchars($this->input->post('address')),
        'districts_id'  => $districtsId,
        'regency_id'    => $regencyId,
        'province_id'   => $provId,
        'prodi_id'      => htmlspecialchars($this->input->post('prodi')),
        'email'         => htmlspecialchars($this->input->post('email')),
        'telp'          => htmlspecialchars($this->input->post('telp')),
        'pic'           => htmlspecialchars($this->input->post('pic')),
        'label'         => htmlspecialchars($this->input->post('label')),
        'status'        => 'verify',
        'norek'         => htmlspecialchars($this->input->post('norek')),
        'bank_name'     => htmlspecialchars($this->input->post('account_name')),
      ];
      $insertvillage      = $this->Village->insert($dataInput);
      if ($insertvillage > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirect);
    }
  }

  public function update($id)
  {
    $decode     = decodeEncrypt($id);
    $village    = $this->Village->getDataBy(['a.id' => $decode])->row();
    if ($village) {
      $this->_validation($village->email);
      if ($this->form_validation->run() === false) {
        $data = [
          'title'         => 'Ubah Data PKN',
          'desc'          => 'Berfungsi untuk mengubah desa PKN',
          'village'       => $village,
        ];
        $page = '/admin/village/update';
        pageBackend($this->role, $page, $data);
      } else {
        $postRegency      = htmlspecialchars($this->input->post('regency'));
        $explode          = explode(":", $postRegency);
        $regencyId        = $explode[0];
        $districtsId      = $explode[1];
        $cekProv          = $this->Config->cekProv($regencyId);
        $provId           = $cekProv->province_id;
        $dataUpdate       = [
          'name'          => htmlspecialchars($this->input->post('name')),
          'address'       => htmlspecialchars($this->input->post('address')),
          'districts_id'  => $districtsId,
          'regency_id'    => $regencyId,
          'province_id'   => $provId,
          'prodi_id'      => htmlspecialchars($this->input->post('prodi')),
          'email'         => htmlspecialchars($this->input->post('email')),
          'telp'          => htmlspecialchars($this->input->post('telp')),
          'pic'           => htmlspecialchars($this->input->post('pic')),
          'label'         => htmlspecialchars($this->input->post('label')),
          'status'        => 'verify',
          'norek'         => htmlspecialchars($this->input->post('norek')),
          'bank_name'     => htmlspecialchars($this->input->post('bank_name')),
          'updated_at'    => date('Y-m-d H:i:s')
        ];
        $update         = $this->Village->update($dataUpdate, ['id' => $decode]);
        if ($update > 0) {
          $this->session->set_flashdata('success', 'Data berhasil di ubah');
        } else {
          $this->session->set_flashdata('error', 'Server Sedang sibuk, silahkan coba lagi');
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
    $village    = $this->village->getDataBy(['a.id' => $decodeId])->row();
    if ($village) {
      $deleteprodi    = $this->village->delete(['id' => $decodeId]);
      if ($deleteprodi > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di hapus');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
    }
    redirect($this->redirect);
  }

  public function exportRegency()
  {
    $data   =   [
      'title'             => 'Data Daerah',
      'allData'           => $this->Config->getRegencyBy()->result()
    ];

    $this->load->view('admin/village/export/excel', $data);
  }

  public function export()
  {
    $data   =   [
      'title'             => 'Desa PKN',
      'allData'           => $this->Village->getAllData()->result()
    ];

    $this->load->view('admin/village/export/excel-village', $data);
  }

  public function import()
  {
    $data = [
      'title'         => 'Import Desa PKN',
      'desc'          => 'Berfungsi untuk menambah banyak data desa PKN',
    ];

    $page = '/admin/village/import';
    pageBackend($this->role, $page, $data);
  }

  public function importvillage()
  {
    $config = [
      'upload_path'       => './assets/uploads/',
      'allowed_types'     => 'xlsx|xls',
      'file_name'         => 'doc' . time(),
    ];
    $this->upload->initialize($config);
    if ($this->upload->do_upload('importvillage')) {
      $file   = $this->upload->data();
      $reader = ReaderEntityFactory::createXLSXReader();
      $reader->open('assets/uploads/' . $file['file_name']);
      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow = 1;
        foreach ($sheet->getRowIterator() as $row) {
          if ($numRow > 1) {

            $dataInputvillage = array(
              'name'          => $row->getCellAtIndex(0),
              'address'       => $row->getCellAtIndex(1),
              'districts_id'  => $row->getCellAtIndex(2),
              'regency_id'    => $row->getCellAtIndex(4),
              'province_id'   => $row->getCellAtIndex(6),
              'email'         => $row->getCellAtIndex(8),
              'telp'          => $row->getCellAtIndex(9),
              'pic'           => $row->getCellAtIndex(10),
              'label'         => $row->getCellAtIndex(11),
              'norek'         => $row->getCellAtIndex(12),
              'bank_name'     => $row->getCellAtIndex(13),
              'status'        => 'verify',
            );
            $this->Village->importData($dataInputvillage);
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

  private function _validation($email = null)
  {
    $this->form_validation->set_rules(
      'name',
      'Nama Lengkap',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    if ($this->input->post('email') !== $email) {
      $is_unique  = '|is_unique[company.email]';
    } else {
      $is_unique  = '';
    }

    $this->form_validation->set_rules(
      'email',
      'Email',
      'trim|valid_email' . $is_unique,
      [
        // 'required'      => '%s wajib di isi',
        'valid_email'   => 'Format %s salah'
      ]
    );


    $this->form_validation->set_rules(
      'telp',
      'Nomor Telpon',
      'trim|numeric|min_length[8]|max_length[14]',
      [
        // 'required'  => '%s wajib di isi',
        'numeric'   => '%s wajib angka'
      ]
    );

    $this->form_validation->set_rules(
      'address',
      'Alamat',
      'trim|required',
      [
        'required' => '%s wajib di isi',
      ]
    );

    if ($this->input->post('regency') === "") {
      $this->form_validation->set_rules(
        'regency',
        'Daerah',
        'trim|required',
        [
          'required' => '%s wajib di isi',
        ]
      );
    }
  }
}
