<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Supervisi PKL</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body>
  <table style="width: 100%; height: 59px;" border="0">
    <tbody>
      <tr>
        <td style="width: 19.5775%;"><img src="http://1.bp.blogspot.com/-KT28ePy6kJc/UNLEPC3aBgI/AAAAAAAAIMM/gG9DtCR6BNs/s1600/LOGO+POLITEKNIK+NEGERI+LAMPUNG.png" alt="" width="100" height="100" /></td>
        <td style="text-align: center;">
          <p style="text-align: center; font-size:18px">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
          <p style="text-align: center; font-size:18px"><strong>POLITEKNIK NEGERI LAMPUNG</strong></p>
          <p style="text-align: center; font-size:16px">Jl. Soekarno Hatta No. 10, Rajabasa - Bandar Lampung</p>
          <p style="text-align: center; font-size:12px">Telepon (0721) 703995, Faksimili (0721) 787309</p>
          <p style="text-align: center; font-size:12px">laman : www.polinela.ac.id</p>
        </td>
      </tr>
    </tbody>
  </table>
  <hr style="height: 2px;background-color:black" />
  <p style="text-align: center;font-size:20px"><strong>LAPORAN SUPERVISI</strong></p>
  <table style="width: 100%; height: 59px;" border="0">
    <tbody>
      <tr>
        <td>Nama Dosen Pembimbing </td>
        <td>: <?= $report->lecture_name ?></td>
      </tr>
      <tr>
        <td>NIP </td>
        <td>: <?= $report->nip ?></td>
      </tr>
      <tr>
        <td>Jurusan </td>
        <td>: <?= $report->major_name ?></td>
      </tr>
      <tr>
        <td>Program Studi </td>
        <td>: <?= $report->prodi_name ?></td>
      </tr>
      <tr>
        <td>Waktu Supervisi(hari.tgl) </td>
        <td>: <?= $report->time ?></td>
      </tr>
      <tr>
        <td>Tempat PKN </td>
        <td>: Desa <?= $report->company_name ?></td>
      </tr>
      <tr>
        <td>Jumlah Mahasiswa </td>
        <td>: <?= $report->studentcount ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="border-collapse: collapse; width: 100%;" border="1">
    <tbody>
      <tr>
        <td style="width: 9.11584%; text-align: center;"><strong>No</strong></td>
        <td style="width: 66.6117%; text-align: center;"><strong>Uraian</strong></td>
        <td style="width: 24.2724%; text-align: center;"><strong>Keterangan</strong></td>
      </tr>
      <tr>
        <td style="width: 9.11584%; text-align: center; height:100px;">I</td>
        <td style="width: 66.6117%; text-align: left;">
          &nbsp;KEADAAN UMUM
          <br>
          &nbsp;<?= $report->general_situation ?>
        </td>
        <td style="width: 24.2724%; text-align: center;">
          <strong>&nbsp;</strong>
          <p>&nbsp;<?= $report->general_situation_note ?></p>
        </td>
      </tr>
      <tr>
        <td style="width: 9.11584%; text-align: center; height:100px;">II</td>
        <td style="width: 66.6117%; text-align: left;">
          <p>&nbsp;KEMAJUAN PELAKSANAAN PKN</p>
          <p>&nbsp;(Berkaitan dengan materi kegiatan yang dilakukan&nbsp; oleh mahasiswa)</p>
          <p>&nbsp;<?= $report->progress ?></p>
        </td>
        <td style="width: 24.2724%; text-align: center;">
          <strong>&nbsp;</strong>
          <p>&nbsp;<?= $report->progress_note ?></p>
        </td>
      </tr>
      <tr>
        <td style="width: 9.11584%; text-align: center; height:100px;">III</td>
        <td style="width: 66.6117%; text-align: left;">
          <p>&nbsp;HASIL SUPERVISI</p>
          <p>&nbsp;1. Permasalahan :</p>
          <p>&nbsp; &nbsp; (Permasalahan yang terjadi, baik yang dialami oleh</p>
          <p>&nbsp;<?= $report->result_problem ?></p>
          <p>&nbsp; &nbsp; &nbsp;dosen pembimbing atau mahasiswa PKN)</p>
          <p>&nbsp;2. Pemecahan masalah :</p>
          <p>&nbsp;<?= $report->result_solve ?></p>
        </td>
        <td style="width: 24.2724%; text-align: center;">
          <strong>&nbsp;</strong>
          <p>&nbsp;<?= $report->result_note ?></p>
        </td>
      </tr>
      <tr>
        <td style="width: 9.11584%; text-align: center; height:100px;">IV</td>
        <td style="width: 66.6117%; text-align: left;">
          <p>&nbsp;Saran</p>
          <p>&nbsp;<?= $report->suggestion ?></p>
        </td>
        <td style="width: 24.2724%; text-align: center;">
          <strong>&nbsp;</strong>
          <p>&nbsp;<?= $report->suggestion_note ?></p>
        </td>
      </tr>
    </tbody>
  </table>
  <br />
  <p style="padding-left: 400px;">Dosen Pembimbing</p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;">
    <?= $report->lecture_name ?>
    <br>
    NIP <span style="font-weight: 400;"><?= $report->nip ?></span>
  </p>

</body>

</html>