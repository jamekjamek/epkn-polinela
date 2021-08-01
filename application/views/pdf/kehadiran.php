<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAFTAR HADIR PKN</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <p style="text-align: center;">
    <strong style="font-size:18px">DAFTAR HADIR PRATIK KERJA NYATA (PKN)</strong>
    <br>
    <?php if ($row) : ?>
      <span style="text-align: center; font-weight:bold; text-transform:uppercase">MAHASISWA POLITEKNIK NEGERI LAMPUNG TAHUN AKADEMIK <?= @$row->academic_year; ?> <?= @$row->period; ?></span>
      <br>
  </p>
  <table style="margin-left:10px" border="0">
    <tbody>
      <tr>
        <td>Mahasiswa </td>
        <td>: <?= $row->npm ?> / <?= $row->fullname ?></td>
      </tr>
      <tr>
        <td>Perusahaan </td>
        <td>: <?= $row->company_name ?></td>
      </tr>
      <tr>
        <td>Kabupaten / Province </td>
        <td>: <?= ucwords(strtolower($row->regency)) ?> / <?= ucwords(strtolower($row->province)) ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr>
        <th style="text-align: center; padding: 5px">No</th>
        <th>Tanggal</th>
        <th>Kehadiran</th>
        <th>Catatan</th>
        <th>Verifikasi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($attendances->num_rows() > 0) : ?>
        <?php $i = 1;
        foreach ($attendances->result() as $attends) : ?>
          <tr>
            <td style="text-align: center; padding: 3px"><?= $i++ ?></td>
            <td style="text-align: center;"><?= date('d F Y', strtotime($attends->created_at)) ?></td>
            <td style="text-align: center;"><?= $attends->attendance ?></td>
            <td><?= $attends->note ?></td>
            <td><?php  if($attends->validation == 1) {
                echo 'Diverifkasi';
            } else {
                echo 'Belum Diverifikasi';
            }
            ?></td>
          </tr>
        <?php endforeach ?>
      <?php else : ?>
        <tr style="height: 18px;">
          <td style="height: 50px; text-align:center" colspan="5">
            <strong>
              Data Masih Kosong
            </strong>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  </p>
  <p style="padding-left: 400px;"></p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;"></p>
  <p style="padding-left: 400px;"></p>
  <div style="padding-left: 440px;">&nbsp;</div>
  </div>

<?php
    else :
      echo ' <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">Data belum tersedia</p>';
    endif ?>
</body>

</html>