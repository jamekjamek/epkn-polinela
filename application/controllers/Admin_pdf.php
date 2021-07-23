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

  public function penilaianpembimbinglapang()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/penilaianpembimbinglapang', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Formulir penilaian mahasiswa PKN oleh pembimbing lapang PKN (F-PAI-032)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Formulir penilaian mahasiswa PKN oleh pembimbing lapang PKN (F-PAI-032).pdf', 'I');
  }

  public function laporansupervisi()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/laporansupervisi', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Laporan Supervisi PKN (F-PAI-034)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Laporan Supervisi PKN (F-PAI-034).pdf', 'I');
  }

  public function penilaiansupervisi()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/penilaiansupervisi', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Formulir penilaian supervisi PKN (F-PAI-035)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Formulir penilaian supervisi PKN (F-PAI-035).pdf', 'I');
  }

  public function penilaianujian()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/penilaianujian', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Formulir penilaian ujian PKN (F-PAI-036)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Formulir penilaian ujian PKN (F-PAI-036).pdf', 'I');
  }

  public function nilaiakhir()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/nilaiakhir', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Nilai akhir PKN (F-PAI-037)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Nilai akhir PKN (F-PAI-037).pdf', 'I');
  }

  public function penilaiandosenpembimbing()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [];
    $body               = $this->load->view('pdf/penilaiandosenpembimbing', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("15.Penilaian dosen pembimbing (F-PAI-038)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('15.Penilaian dosen pembimbing (F-PAI-038).pdf', 'I');
  }
}
