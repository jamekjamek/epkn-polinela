<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_planning_attachment extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_planning_attachment_model', 'Planning');
    $this->load->model('Admin/Admin_config_model', 'Config');
    $this->role         = 'admin';
    $this->redirect     = 'admin/master/planning_attachment';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'         => 'Capaian Pembelajaran',
      'desc'          => 'Berfungsi untuk melihat data capaian pembelajaran',
      'plannings'     => $this->Planning->getAllData()->result(),
    ];

    $page = '/admin/planning/index';
    pageBackend($this->role, $page, $data);
  }

  public function create()
  {
    $data = [
      'title'         => 'Upload Capaian Pembelajaran',
      'desc'          => 'Berfungsi untuk mengupload data capaian pembelajaran',
    ];
    $page = '/admin/planning/create';
    pageBackend($this->role, $page, $data);
  }

  public function insert()
  {
    $config['upload_path'] = './assets/uploads/planning/';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 5000;
    $this->upload->initialize($config);
    if ($this->upload->do_upload('file')) {
      $fileData = $this->upload->data();
      $this->db->set('id', 'UUID()', FALSE);
      $datainsert = [
        'file'      => $fileData['file_name'],
        'prodi_id'  => htmlspecialchars($this->input->post('prodi')),
      ];
      if ($this->Planning->insert($datainsert)) {
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

  public function detail()
  {
    $planningId  = $this->input->post('guidebookId');
    $getData      = $this->Planning->getFilterData(['id' => $planningId])->result();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";
      foreach ($getData as $row) {
        $output     .= "
        <div class='embed-responsive embed-responsive-16by9'>
          <embed class='embed-responsive-item' src='" . base_url('assets/uploads/planning/' . $row->file) . "' type='application/pdf' height='800px' width='100%'>
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
    $id         = $this->input->post('planningId');
    $dataRow    = $this->Planning->getFilterData(['id' => $id])->row();
    if ($dataRow) {
      $config['upload_path'] = './assets/uploads/planning/';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = 5000;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file')) {
        $fileData = $this->upload->data();
        $dataUpdate = [
          'file'      => $fileData['file_name'],
          'prodi_id'  => htmlspecialchars($this->input->post('prodiId')),
        ];
        if ($this->Planning->update($dataUpdate, ['id' => $id])) {
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
