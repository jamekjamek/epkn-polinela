<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Dosen Pembimbing</title>
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
    <strong style="font-size:18px">DOSEN PEMBIMBING PKN</strong>
    <br>
    <span style="text-align: center; font-weight:bold">TAHUN AJARAN <?= @$row->name; ?></span>
  </p>
  <p style="text-align: center;">&nbsp;</p>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr style="height: 18px;">
        <td style="width: 5%; text-align: center; height: 18px;"><strong>No</strong></td>
        <td style="width: 18%; text-align: center; height: 18px;"><strong>Nama</strong></td>
        <td style="width: 10%; text-align: center; height: 18px;"><strong>NPM</strong></td>
        <td style="width: 20%; text-align: center; height: 18px;"><strong>Program Studi</strong></td>
        <td style="width: 23%; text-align: center; height: 18px;"><strong>Dosen Pembimbing</strong></td>
        <td style="width: 14%; text-align: center; height: 18px;"><strong>NIP</strong></td>
        <td style="width: 20%; text-align: center; height: 18px;"><strong>Tempat PKN</strong></td>
      </tr>
    </thead>
    <tbody>
      <?php if ($lecturers->num_rows() > 0) : ?>
        <?php $i = 1;
        foreach ($lecturers->result() as $lecture) : ?>
          <tr style="height: 18px;">
            <td style="height: 18px; text-align:center"><?= $i++; ?></td>
            <td style="height: 18px; padding:5px"><?= $lecture->fullname; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->npm; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->prodi_name; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->lecture_name; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->nip; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->company_name; ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr style="height: 18px;">
          <td style="height: 50px; text-align:center" colspan="7">
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
</body>

</html>