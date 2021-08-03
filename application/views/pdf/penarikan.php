<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Penarikan</title>
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
  <table style="width: 100%; height: 59px;" border="0">
    <tbody>
      <tr>
        <td style="width: 50%;" align="left">
          <table style="width: 100%; height: 59px;" border="0">
            <tbody>
              <tr>
                <td>Nomor</td>
                <td>: <?= $settingletter->letter_number; ?></td>
              </tr>
              <tr>
                <td>Lampiran</td>
                <td>: 1 berkas</td>
              </tr>
              <tr>
                <td>Perihal</td>
                <td>: <strong>Penarikan Mahasiswa PKN</strong></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" style="padding-top: -50px;">
          <table style="width: 100%; height: 59px;" border="0">
            <tbody>
              <tr>
                <td>Bandar Lampung, <?= date('d-m-Y') ?></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <?php $distric = strtolower($row->district_name) ?>
  <p style="text-align: left;padding-left:100px;">
    <span>
      Yth. <?= $row->copy_later ?>
    </span>
    <br>
    <span>
      <?= $row->company_name ?>
    </span>
    <br>
    <span>
      Kecamatan <?= ucwords($distric) ?>
    </span>
    <br><br>
    <span>
      Dengan hormat,
    </span>
  </p>
  <div style=" text-align: justify; text-justify: inter-word;">
    <p style="padding-left: 100px;">Disampaikan dengan hormat, Sehubungan dengan Praktik Kerja Nyata Mahasiswa Politeknik Negeri Lampung yang dilaksanakan di Kelurahan Bapak/Ibu, berakhir pada tanggal <?= date('d F Y', strtotime($row->finish_date)) ?> kami mohon izin untuk menarik kembali mahasiswa berikut:</p>
  </div>
  <div style="padding-left: 100px;">
    <table style="border-collapse: collapse; width: 100%;" border="1">
      <tbody>
        <tr>
          <td style="width: 4.51542%; text-align: center;">No</td>
          <td style="width: 45.4846%; text-align: center;">Nama Mahasiswa</td>
          <td style="width: 25%; text-align: center;">NPM</td>
          <td style="width: 25%; text-align: center;">Program Studi</td>
        </tr>
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
    <p style="padding-left: 100px;">Selanjutnya mahasiswa tersebut akan menyelesaikan Ujian Praktik Kerja Nyata di Politeknik Negeri Lampung.</p>
    <p style="padding-left: 100px;">Atas bantuan dan kerjasama Bapak/Ibu, Kami ucapkan terima kasih. Semoga kerjasama yang sudah terjalin dengan baik, dapat terus berlanjut di masa mendatang.
      <br>
      <br>
      Demikian permohonan kami, atas bantuan dan kerajasamanya diucapkan terimakasih.
    </p>
  </div>
  <p style="padding-left: 400px;">a.n Direktur <br>Pembantu Direktur I,</p>
  <img style="padding-left: 400px;" src="<?= base_url('assets/img/ttd/ttd_cap_pudir.png') ?>" width="160" />
  <p style="padding-left: 400px;">Dwi Puji Hartono <br>NIP <span style="font-weight: 400;">197602202000031002</span></p>

</body>

</html>