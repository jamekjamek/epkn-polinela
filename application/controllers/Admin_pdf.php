<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_pdf extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Document/Document_model', 'Documents');
    $this->footer = '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 50px; height:80px">';
  }

  public function surattugas()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/surattugas', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Surat Tugas");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Surat Tugas.pdf', 'I');
  }

  public function suratpengantar()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/suratpengantar', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Surat Pengantar");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Surat Pengantar.pdf', 'I');
  }
}
