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

  public function amplop()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  [241, 104], 'default_font_size' => 10, ['orientation' => 'L']]);
    $data = [
      'getAmplopByLeader'     =>  $this->Documents->getEnvelopeByLeader(),
    ];
    $view   = $this->load->view('pdf/amplop', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($view);
    $mpdf->Output('Amplop.pdf', 'I');
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
    $settingLetter      = $this->Documents->getDataBy(['document_id' => '23e30f0f-db92-11eb-9096-0cc47abcfaa6'])->row();
    $leaderGroupId      = $this->Documents->getUserInRegistration($this->session->userdata('user'))->row();
    $rowRegistration    = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id], 'leader')->row();
    $dataRegistration   = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id])->result();
    $dataKaprodi        = $this->Documents->getKaprodi($rowRegistration->prodi_id)->row();
    $dataBody           = [
      'settingletter' => $settingLetter,
      'row'           => $rowRegistration,
      'students'      => $dataRegistration,
      'kaprodi'       => $dataKaprodi
    ];
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
    $settingLetter      = $this->Documents->getDataBy(['document_id' => '23e30eb7-db92-11eb-9096-0cc47abcfaa6'])->row();
    $leaderGroupId      = $this->Documents->getUserInRegistration($this->session->userdata('user'))->row();
    $rowRegistration    = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id], 'leader')->row();
    $dataRegistration   = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id])->result();
    $dataKaprodi        = $this->Documents->getKaprodi($rowRegistration->prodi_id)->row();
    $dataBody           = [
      'settingletter' => $settingLetter,
      'row'           => $rowRegistration,
      'students'      => $dataRegistration,
      'kaprodi'       => $dataKaprodi
    ];
    $body               = $this->load->view('pdf/suratpengantar', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Surat Pengantar");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Surat Pengantar.pdf', 'I');
  }

  public function penilaianpembimbinglapang($id)
  {
    $decodeId = decodeEncrypt($id);
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [
      'data' => $this->Documents->getBySupervisorScore($decodeId)->row()
    ];
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

  public function penilaiansupervisi($id)
  {
    $decodeId = decodeEncrypt($id);
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    // $mpdf->SetHTMLFooter($footer);
    $dataBody           = [
      'data' => $this->Documents->getSupervisionValue($decodeId)->row()
    ];
    $body               = $this->load->view('pdf/penilaiansupervisi', $dataBody, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Formulir penilaian supervisi PKN (F-PAI-035)");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($body);
    $mpdf->Output('Formulir penilaian supervisi PKN (F-PAI-035).pdf', 'I');
  }

  public function penilaianujian($id)
  {
    $decodeId = decodeEncrypt($id);
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

  public function nilaiakhir($id)
  {
    $decodeId = decodeEncrypt($id);
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

  public function penilaiandosenpembimbing($id)
  {
    $decodeId = decodeEncrypt($id);
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

  public function suratpenarikan()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'default_font_size' => 10]);
    $settingLetter      = $this->Documents->getDataBy(['document_id' => '23e30fa3-db92-11eb-9096-0cc47abcfaa6'])->row();
    $leaderGroupId      = $this->Documents->getUserInRegistration($this->session->userdata('user'))->row();
    $rowRegistration    = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id], 'leader')->row();
    $dataRegistration   = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id])->result();
    $dataKaprodi        = $this->Documents->getKaprodi($rowRegistration->prodi_id)->row();
    // var_dump($dataKaprodi);
    // die;
    $template           = [
      'header' => $settingLetter,
    ];
    $templatePdf        = $this->load->view('pdf/template', $template, true);

    $mpdf->SetHTMLHeader($templatePdf);
    $mpdf->SetHTMLFooter($this->footer);

    $data               = [
      'settingletter' => $settingLetter,
      'row'           => $rowRegistration,
      'students'      => $dataRegistration,
      'kaprodi'       => $dataKaprodi
    ];
    $view   = $this->load->view('pdf/penarikan', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Surat Penarikan");
    $mpdf->WriteHTML($view);
    $mpdf->Output('Surat Penarikan', 'I');
  }

  public function planningSheet()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P']);
    $data = [
      'getPlanningBy'   =>  $this->Documents->getPlanningBy()->row(),
      'getPlanningList' =>  $this->Documents->getPlanningBy()->result(),
    ];
    $view   = $this->load->view('pdf/lembarperencanaankegiatanpkl', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output('Program', 'I');
  }

  public function supervisionReport($id)
  {
    $decode         = decodeEncrypt($id);
    $mpdf                 = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $mpdf->SetHTMLFooter($this->footer);
    $data = [
      'report'     =>  $this->Documents->getSupervisionReport(['supervision_report.registration_group_id' => $decode])->row(),
    ];
    $view   = $this->load->view('pdf/laporansupervisipkn', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  public function kesediaanperusahaan($id = null)
  {
    $decodeId = decodeEncrypt($id);
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'default_font_size' => 10]);
    $dataHeader         = [];
    $header             = $this->load->view('pdf/header', $dataHeader, true);
    $mpdf->SetHTMLHeader($header);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    $mpdf->SetHTMLFooter($footer);
    $data               = [
      'company'  => $this->Documents->getWillingness($decodeId)->row(),
      'data'     => $this->Documents->getWillingness($decodeId)->result(),
      'prodi'    => $this->Documents->getProdi()->result(),
    ];
    $view1               = $this->load->view('pdf/kesediaanperusahaan', $data, TRUE);
    $view2               = $this->load->view('pdf/kesediaanperusahaan2', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Kesediaan Perusahaan");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($view1);
    $mpdf->AddPage();
    $mpdf->WriteHTML($view2);
    $mpdf->Output();
  }
}
