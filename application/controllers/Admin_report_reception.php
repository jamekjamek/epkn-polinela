<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_report_reception extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin/Admin_reception_model', 'Reception');
    $this->role     = 'admin';
    cek_login('Admin');
  }

  public function index()
  {
    $data = [
      'title'      => 'Data Kesediaan Penerimaan Tahun Depan',
      'desc'       => 'Berfungsi untuk melihat data kesediaan penerimaan di tahun depan',
      'receptions' => $this->Reception->list()->result()
    ];
    $page = '/admin/reception/index';
    pageBackend($this->role, $page, $data);
  }

  public function detail($company_id)
  {
    $decodeId = decodeEncrypt($company_id);
    $data = [
      'title'   => 'Detail Kesediaan Penerimaan Tahun Depan',
      'desc'    => 'Berfungsi untuk melihat data kesediaan penerimaan di tahun depan',
      'detail'  => $this->Reception->detail($decodeId)->row(),
      'data'    => $this->Reception->detail($decodeId)->result()
    ];
    $page = '/admin/reception/detail';
    pageBackend($this->role, $page, $data);
  }
}
