<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Supervisi PKL</title>
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
  <p style="text-align: center;font-size:18px"><strong>Lembar Perencanaan Kegiatan</strong></p>
  <table style="width: 100%; height: 59px; margin-left:20px" border="0">
    <tbody>
      <tr>
        <td>Nama Mahasiswa </td>
        <td>: <?= $getPlanningBy->fullname ?></td>
      </tr>
      <tr>
        <td>NPM </td>
        <td>: <?= $getPlanningBy->npm ?></td>
      </tr>
      <tr>
        <td>Jurusan </td>
        <td>: <?= $getPlanningBy->major_name ?></td>
      </tr>
      <tr>
        <td>Program Studi </td>
        <td>: <?= $getPlanningBy->prodi_name ?></td>
      </tr>
      <tr>
        <td>Tempat PKL </td>
        <td>: <?= $getPlanningBy->company_name ?></td>
      </tr>

    </tbody>
  </table>
  <br>
  <table style="border-collapse: collapse; width: 100%;" border="1">
    <tbody>
      <tr>
        <td style="width: 9.11584%; text-align: center; font-size:12px"><strong>No</strong></td>
        <td style="width: 40.6117%; text-align: center; font-size:12px"><strong>Kegiatan*</strong></td>
        <td style="width: 24.2724%; text-align: center; font-size:12px"><strong>Jumlah Jam</strong></td>
        <td style="width: 24.2724%; text-align: center; font-size:12px"><strong>Persetujuan dan Revisi **</strong></td>
      </tr>
      <?php
      $i = 1;
      foreach ($getPlanningList as $row) : ?>
        <tr>
          <td style="width: 9.11584%; text-align: center; font-size:12px; height:20px"><?= $i++ ?></td>
          <td style="width: 40.6117%; font-size:12px; height:20px"><?= $row->learning_achievement ?></td>
          <td style="width: 24.2724%; text-align: center; font-size:12px; height:20px"><?= $row->time_qty ?></td>
          <td style="width: 24.2724%; text-align: center; font-size:12px; height:20px">Disetujui</td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <span style="font-size: 10px;">*Mengacu pada materi kegiatan di buku panduan PKL</span>
  <br>
  <span style="font-size: 10px;">**diisi setelah diskusi dengan pembimbing lapang</span>
  <br />
  <br />
  <table style="border-collapse: collapse; width: 100%;" border="0">
    <tbody>
      <tr>
        <td style="width: 70%;">
          <p><span style="font-weight: 400;">Dosen Pembimbing,</span></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p><span style="font-weight: 400;"><?= $getPlanningBy->lecture_name ?></span></p>
          <p><span style="font-weight: 400;">NIP : <?= $getPlanningBy->nip ?></span></p>
        </td>
        <td style="width: 30%;">
          <p><span style="font-weight: 400;">Pembimbing Lapang,</span></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p><span style="font-weight: 400;"><?= $getPlanningBy->lecture_name ?></span></p>
          <p><span style="font-weight: 400;">NIP : <?= $getPlanningBy->nip ?></span></p>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>