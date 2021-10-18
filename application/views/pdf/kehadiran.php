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
  <!-- <htmlpageheader> -->
  <table style="width: 100%; height: 59px;" border="0">
    <tbody>
      <tr>
        <td style="width: 23%;" align="center">
          <img src="<?= base_url('assets/img/logo/logo-new.png') ?>" alt="" width="100" height="100" />
        </td>
        <td style="text-align: center;">
          <p></p>
          <h4 style="text-align: center;"><span style="font-family: Times New Roman;"><b>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN</b></span></h4>
          <h4 style="text-align: center;"><span style="font-family: Times New Roman;"><b>RISET, DAN TEKNOLOGI</b></span></h4>
          <h4 style="text-align: center;"><span style="font-family: Times New Roman;"><b>POLITEKNIK NEGERI LAMPUNG</b></span></h4>
          <span style="text-align: center;"><span style="font-family: Times New Roman;">Jl. Soekarno Hatta Rajabasa Bandar Lampung</span></span>
          <p style="text-align: center;"><span style="font-family: Times New Roman;">Telepon (0721) 703995 Faksimili (0721) 787309<br></span><span style="font-family: Times New Roman;">laman : www.polinela.ac.id</span></p>
          <p></p>
        </td>
      </tr>
    </tbody>
  </table>
  <hr style="height: 2px;background-color:black" />
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
            <td style="text-align: center;"><?php if ($attends->validation == 1) {
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
  <p></p>
  <table style="border-collapse: collapse; width:30%; height: 144px; padding:20px" border="1">
    <thead>
      <tr>
        <th width="20%">Kehadiran</th>
        <th width="10%">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($count->num_rows() > 0) : ?>
        <?php $i = 1;
        foreach ($count->result() as $c) : ?>
          <tr>
            <td style="text-align: center;"><?= $c->attendance ?></td>
            <td style="text-align: center;"><?= $c->att_recap ?></td>
          </tr>
        <?php endforeach ?>
      <?php else : ?>
        <tr style="height: 18px;">
          <td style="height: 50px; text-align:center" colspan="4">
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
  </div>

<?php
    else :
      echo ' <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">Data belum tersedia</p>';
    endif ?>
</body>

</html>