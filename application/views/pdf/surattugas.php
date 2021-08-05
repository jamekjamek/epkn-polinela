<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Tugas</title>
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
  <p style="text-align: center;">
    <strong style="font-size:18px">SURAT TUGAS</strong>
    <br>
    <span style="text-align: center; font-weight:bold">Nomor: <?= $settingletter->letter_number; ?></span>
  </p>
  <p style="text-align: center;">&nbsp;</p>
  <p style="text-align: left;">Direktur Politeknik Negeri Lampung, memberikan tugas kepada:</p>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr style="height: 18px;">
        <td style="width: 6.96023%; text-align: center; height: 18px;"><strong>No</strong></td>
        <td style="width: 43.0398%; text-align: center; height: 18px;"><strong>Nama</strong></td>
        <td style="width: 25%; text-align: center; height: 18px;"><strong>NPM</strong></td>
        <td style="width: 25%; text-align: center; height: 18px;"><strong>Program Studi</strong></td>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($students as $student) : ?>
        <tr style="height: 18px;">
          <td style="width: 6.96023%; height: 18px; text-align:center"><?= $i++; ?></td>
          <td style="width: 43.0398%; height: 18px;"><?= $student->student ?></td>
          <td style="width: 25%; height: 18px; text-align:center"><?= $student->npm ?></td>
          <td style="width: 25%; height: 18px;"><?= $student->prodi_name ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <p>
    <?php $regency = strtolower($row->address) ?>
    <?php $distric = strtolower($row->district_name) ?>
    <span>
      Untuk melaksanakan Praktik Kerja Nyata (PKN) Tahun <?= date('Y', strtotime($row->finish_date)) ?> di :
    </span>
    <br>
    <span style="font-weight:bold;">
      Desa <?= $row->company_name ?>, Kecamatan <?= ucwords($distric) ?> <?= ucwords($regency) ?>
    </span>
    <br>
    <span style="font-weight:bold;font-style:italic">
      Terhitung mulai tanggal: <?= date('d F ', strtotime($row->start_date)) ?> s.d. <?= date('d F ', strtotime($row->finish_date)) ?> <?= date('Y', strtotime($row->finish_date)) ?>
    </span>
    <br>
    <br>
    <span>
      Demikian surat tugas ini dikeluarkan untuk dapat dilaksanakan sebagaimana mestinya .
    </span>

  </p>
  <div>
    <br>
    <div style="padding-left: 400px;"><?= date('d F Y') ?></div>
    <br>
    <p style="padding-left: 400px;">
      <span>
        a.n Direktur
      </span>
      <br>
      <span>
        Pembantu Direktur I,
      </span>
      <br>
      <img src="<?= base_url('assets/img/ttd/ttd_cap_pudir.png') ?>" width="160" />
      <br>
      <span>
        Dwi Puji Hartono
      </span>
      <br>
      <span>

        NIP <span style="font-weight: 400;">197602202000031002</span>
      </span>


    </p>

    <div style="padding-left: 440px;">&nbsp;</div>
  </div>
</body>

</html>