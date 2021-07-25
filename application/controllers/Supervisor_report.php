<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supervisor_report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role = 'Supervisor';
    $this->load->model('Supervisor/Supervisor_report_model', 'Report');
    cek_login('Supervisor');
    $this->redirectUrl = 'supervisor/report_reception';
    $this->month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  }

  public function index()
  {
    $data = [
      'title'         => 'Data Kesediaan Perusahaan',
      'desc'          => 'Berfungsi untuk melihat data kesediaan Perusahaan',
      'prodi'         => $this->Report->getProdi()->result(),
      'company'       => $this->Report->getMyCompany()->row(),
      'academic_year' => $this->Report->getAcademicYearIsActive()->row(),
      'months'        => $this->month
    ];
    $page = '/supervisor/report/index';
    pageBackend($this->role, $page, $data);
  }

  public function add()
  {
    $data = $this->input->post();
    $report = [
      'company_id'        => $data['company_id'],
      'prodi_id'          => $data['prodi_id'],
      'academic_year_id'  => $data['academic_year_id'],
      'year_accepted'     => $data['year_accepted'],
      'start_month'       => $data['start_month'],
      'finish_month'      => $data['finish_month'],
      'competence'        => $data['competence'],
      'qty'               => $data['qty'],
      'status'            => $data['status']
    ];

    $result = $this->Report->insert($report);
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Data berhasil di tambah');
    } else {
      $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
    }
    redirect($this->redirectUrl);
  }

  public function update($id)
  {
    $decodeId   = $this->encrypt->decode($id, keyencrypt());
    $accepted   = $this->Report->getByReport(['prodi_id' => $decodeId])->row();
    if (!$accepted) {
      redirect($this->redirectUrl);
    }
    $this->_validation();
    if ($this->form_validation->run() == false) {
      $data = [
        'title'         => 'Ubah Data Kesediaan Menerima',
        'desc'          => 'Berfungsi untuk mengupdate data kesediaan menerima',
        'accepted'      => $accepted,
        'months'        => $this->month
      ];
      $page       = '/supervisor/report/edit';
      pageBackend($this->role, $page, $data);
    } else {
      $data = $this->input->post();
      $report = [
        'year_accepted'     => $data['year_accepted'],
        'start_month'       => $data['start_month'],
        'finish_month'      => $data['finish_month'],
        'competence'        => $data['competence'],
        'qty'               => $data['qty'],
        'updated_at'        => date('Y-m-d H:i:s')
      ];
      $update     = $this->Report->update($report, ['prodi_id' => $decodeId]);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->redirectUrl);
    }
  }

  public function cancel($id)
  {
    $decodeId   = decodeEncrypt($id);
    $accepted   = $this->Report->getByReport(['prodi_id' => $decodeId])->row();
    if ($accepted) {
      $deleted    = $this->Report->delete(['prodi_id' => $decodeId]);
      if ($deleted > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di batalkan');
      } else {
        $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
      }
    } else {
      $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
    }
    redirect($this->redirectUrl);
  }

  private function _validation()
  {
    $this->form_validation->set_rules(
      'year_accepted',
      'Tahun penerimaan',
      'trim|required',
      [
        'required'      => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'start_month',
      'Bulan awal',
      'trim|required',
      [
        'required'      => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'finish_month',
      'Bulan akhir',
      'required',
      [
        'required'      => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'competence',
      'Kompentensi yang di harapkan',
      'trim|required',
      [
        'required'      => '%s wajib diisi',
      ]
    );

    $this->form_validation->set_rules(
      'qty',
      'Jumlah mahasiswa',
      'trim|required',
      [
        'required'      => '%s wajib diisi'
      ]
    );
  }
}
