<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permohonan PKL</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body>
  <br />
  <br />
  <br />
  <br />
  <br />
  <p>
    Nomor&nbsp; &nbsp; &nbsp; : <?= $settingletter->letter_number; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= date('d F Y') ?>
    <br>
    Lampiran&nbsp; : satu berkas
    <br>
    Perihal&nbsp; &nbsp; &nbsp; : Permohonan penempatan mahasiswa untuk praktik kerja lapang
  </p>
  <br>
  <p style="padding-left: 80px;">Yth.
    <strong>
      <?= $row->copy_later ?> <?= $row->company_name; ?>
    </strong>
    <br>
    <strong>
      <?= $row->address; ?>
    </strong>
  </p>
  <br>
  <p style="padding-left: 80px;">Dengan Hormat,</p>
  <div style=" text-align: justify; text-justify: inter-word;">
    <p style="padding-left: 80px;">Dalam rangka menunjang proses pendidikan dan mempersiapkan lulusan Politeknik Negeri Lampung serta melatih kemampuan diri dalam menghadapi dunia kerja, dengan ini dimohon kiranya Bapak/Ibu dapat menerima mahasiswa kami untuk melaksanakan Praktik Kerja Lapang (PKL) di <?= $row->company_name; ?> yang Bapak/Ibu Pimpin.</p>
    <?php
    $tgl_mulai = $row->start_date;
    $tgl_selesai = $row->finish_date;
    //convert
    $timeStart = strtotime($tgl_mulai);
    $timeEnd = strtotime($tgl_selesai);
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y", $timeEnd) - date("Y", $timeStart)) * 12;
    // hitung selisih bulan
    $numBulan += date("m", $timeEnd) - date("m", $timeStart);
    ?>
    <p style="padding-left: 80px;">Kegiatan Praktik Kerja Lapang (PKL) akan dilaksanakan selama <?= $numBulan; ?> bulan dari tanggal <?= date('d F Y', strtotime($row->start_date)) ?> s.d <?= date('d F Y', strtotime($row->finish_date)) ?> dengan mahasiswa yang akan ditempatkan sebagai berikut:</p>
  </div>
  <div style="padding-left: 80px;">
    <table style="border-collapse: collapse; width: 100%; font-size:12px" border="1">
      <thead>
        <tr>
          <th style="width: 4.51542%; text-align: center;">No</th>
          <th style="width: 45.4846%; text-align: center;">Nama Mahasiswa</th>
          <th style="width: 25%; text-align: center;">NPM</th>
          <th style="width: 25%; text-align: center;">Program Studi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        foreach ($students as $student) : ?>
          <tr>
            <td style="width: 4.51542%; text-align: center;"><?= $i++; ?></td>
            <td style="width: 45.4846%; padding-left:5px"><?= $student->student; ?></td>
            <td style="width: 25%; padding-left:5px"><?= $student->npm; ?></td>
            <td style="width: 25%; padding-left:5px"><?= $student->prodi_name; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div style=" text-align: justify; text-justify: inter-word;">
    <p style="padding-left: 80px;">Bila berkenan, dimohon balasan surat ini dikirim ke alamat kami atau Fax. 0721-787309,&nbsp;<em>contact person&nbsp;</em>a.n
      <?php if ($kaprodi) : ?>
        <?= $kaprodi->name ?> (<?= $kaprodi->no_hp; ?>)
      <?php else : ?>
        Dewi Riniarti (081369044634):
      <?php endif; ?>


      e-mail: <a href="mailto:up2ai@polinela.ac.id">up2ai@polinela.ac.id</a>.</p>
  </div>
  <p style="padding-left: 80px;">Demikian permohonan kami, atas bantuan dan kerajasamanya diucapkan terimakasih.</p>
  <p style="padding-left: 400px;">
    <span>
      a.n Direktur
    </span>
    <br />
    <span>
      Pembantu Direktur I
    </span>

  </p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;">&nbsp;</p>
  <p style="padding-left: 400px;">
    <span>
      Dwi Puji Hartono
    </span>
    <br />
    <span style="font-weight: 400;"> NIP: 197602202000031002</span>
  </p>
  <!-- <p style="padding-left: 400px;">NIP <span style="font-weight: 400;">197602202000031002</span></p> -->


</body>

</html>