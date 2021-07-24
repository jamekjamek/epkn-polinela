<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_guidebook extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_guidebook_model', 'Guidebook');
    $this->role         = 'admin';
    $this->redirect     = 'admin/guidebook';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Buku Panduan',
      'desc'          => 'Berfungsi untuk melihat buku panduan',
      'guidebooks'     => $this->Guidebook->getAllData()->result()
    ];

    $page = '/admin/guidebook/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $data = [
      'title'         => 'Tambah Buku Panduan',
      'desc'          => 'Berfungsi untuk menambah data buku panduan',
    ];
    $page = '/admin/guidebook/create';
    pageBackend($this->role, $page, $data);
  }

  public function insert()
  {
    $cekData    = $this->Guidebook->getAllData();
    if ($cekData->num_rows() > 0) {
      $update = $this->Guidebook->update(['status' => '0']);
      if ($update > 0) {
        $config['upload_path'] = './assets/uploads/guidebook/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
          $fileData = $this->upload->data();
          $this->db->set('id', 'UUID()', FALSE);
          $datainsert = [
            'file'    => $fileData['file_name'],
          ];
          if ($this->Guidebook->insert($datainsert)) {
            $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di simpan!</p>');
          } else {
            $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
          }
          redirect($this->redirect);
        } else {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          redirect($this->redirect);
        }
      }
    } else {
      $config['upload_path'] = './assets/uploads/guidebook/';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = 10000;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file')) {
        $fileData = $this->upload->data();
        $this->db->set('id', 'UUID()', FALSE);
        $datainsert = [
          'file'    => $fileData['file_name'],
        ];
        if ($this->Guidebook->insert($datainsert)) {
          $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di simpan!</p>');
        } else {
          $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
        }
        redirect($this->redirect);
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect($this->redirect);
      }
    }
  }

  public function detail()
  {
    $guidebookId  = $this->input->post('guidebookId');
    $getData      = $this->Guidebook->getFilterData(['id' => $guidebookId])->result();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";
      foreach ($getData as $row) {
        $output     .= "
        <div class='embed-responsive embed-responsive-16by9'>
          <embed class='embed-responsive-item' src='" . base_url('assets/uploads/guidebook/' . $row->file) . "' type='application/pdf' height='800px' width='100%'>
        </div>
            ";
      }
      $result['data']   = $output;
    } else {
      $result['status'] = 'bad';
      $result['data']   = null;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  public function update()
  {
    $id         = $this->input->post('guidebookId');
    $dataRow    = $this->Guidebook->getFilterData(['id' => $id])->row();
    if ($dataRow) {
      $config['upload_path'] = './assets/uploads/guidebook/';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = 10000;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file')) {
        $fileData = $this->upload->data();
        $dataUpdate = [
          'file'    => $fileData['file_name'],
        ];
        if ($this->Guidebook->update($dataUpdate, ['id' => $id])) {
          $this->session->set_flashdata('success', '<p>File <strong>' . $fileData['file_name'] . '</strong> berhasil di simpan!</p>');
        } else {
          $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan!</p>');
        }
        redirect($this->redirect);
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect($this->redirect);
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan salah');
      redirect($this->redirect);
    }
  }
}
