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

  // amplop
  public function envelope()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  [241, 104], 'default_font_size' => 10, ['orientation' => 'L']]);
    $data = [
      'getAmplopByLeader'     =>  $this->Documents->getEnvelopeByLeader(),
    ];
    $view   = $this->load->view('pdf/amplop', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // permohonan pkl //AGUNG
  public function supplication()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'default_font_size' => 10]);
    $settingLetter      = $this->Documents->getDataBy(['document_id' => '23e30eb7-db92-11eb-9096-0cc47abcfaa6'])->row();
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
    $view               = $this->load->view('pdf/permohonanpkl', $data, TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Permohonan PKL");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // permohonan pkl dengan waktu
  public function supplicationWithTime()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'default_font_size' => 10]);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/permohonanpkldenganwaktu', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Permohonan PKL dengan Waktu");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // surat pengantar dan surat tugas tanpa balasan Agung
  public function coveringLetterNotReply()
  {
    $mpdf                 = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $settingLetter        = $this->Documents->getDataBy(['document_id' => '23e30eb7-db92-11eb-9096-0cc47abcfaa6'])->row(); //Tinggal ganti ID

    $template             = [
      'header' => $settingLetter,
    ];
    $templatePdf          = $this->load->view('pdf/template', $template, true);
    $mpdf->SetHTMLHeader($templatePdf);
    $mpdf->SetHTMLFooter($this->footer);

    $leaderGroupId      = $this->Documents->getUserInRegistration($this->session->userdata('user'))->row();
    $rowRegistration    = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id], 'leader')->row();

    $dataRegistration   = $this->Documents->getRegistrationDataBy(['a.group_id' => $leaderGroupId->group_id])->result();

    $dataPengantarSurat   = [
      'row'           => $rowRegistration,
      'settingletter' => $settingLetter,
    ]; //load model panggil data
    $pengantarsurat       = $this->load->view('pdf/pengantardantugastanpabalasan/pengantar', $dataPengantarSurat, TRUE);

    $dataSuratTugas     = [
      'students'      => $dataRegistration,
      'row'           => $rowRegistration,
      'settingletter' => $settingLetter,
    ];
    $suratTugas           = $this->load->view('pdf/pengantardantugastanpabalasan/surattugas', $dataSuratTugas, TRUE);

    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($pengantarsurat);
    $mpdf->AddPage();
    $mpdf->WriteHTML($suratTugas);
    $mpdf->Output();
  }

  // surat pengantar dan surat tugas dengan balasan
  public function coveringLetterWithReply()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/pengantardantugasdenganbalasan', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // surat penarikan
  public function finishLeter()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/penarikan', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Amplop");
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // laporan supervisi
  public function supervisionReport()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/laporansupervisipkl', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // nila supervisi
  public function supervisionValue()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P', 'default_font_size' => 10,]);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/nilaisupervisi', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // lembar perencanaan kegiatan pkl
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
    $mpdf->Output();
  }

  // penilaian mahasiswa oleh pembimbing lapang
  public function supervisorScore()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P']);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/penilaianmahasiswapembimbinglapang', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  //daily log
  public function dailyLog()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P']);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/logharian', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  // nilai dosen pembimbing
  public function guidanceValue()
  {
    $mpdf   = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' =>  'A4-P']);
    $data   = ''; //load model panggil data
    $view   = $this->load->view('pdf/nilaidosenpembimbing', [], TRUE);
    $mpdf->SetProtection(array('print'));
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }

  public function kesediaanperusahaan()
  {
    $mpdf               = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'default_font_size' => 10]);
    $settingLetter      = $this->Documents->getDataBy(['document_id' => '23e30eb7-db92-11eb-9096-0cc47abcfaa6'])->row(); //Masih Pake Header Surat Permohonan PKL
    $template           = [
      'header' => $settingLetter,
    ];
    $templatePdf        = $this->load->view('pdf/template', $template, true);
    $mpdf->SetHTMLHeader($templatePdf);
    $footer             =
      '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3jRWlSapnKSh27jOWiQMx-ZVfS89ybLRCEN7va4k_NMV90roL11mN1-56y72O6_0I8GQ&usqp=CAU" alt="" style="width: 60px; height:80px">';
    $mpdf->SetHTMLFooter($footer);
    $data               = [];
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
