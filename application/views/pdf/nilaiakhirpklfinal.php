<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Akhir PKN</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }

    th,
    td {
      padding: 5px;
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
    <strong style="font-size:18px">NILAI AKHIR PKN</strong>
    <br>
    <span style="text-align: center; font-weight:bold; text-transform:uppercase">PROGRAM STUDI <?= $prodi->name; ?></span>
    <br>
    <span style="text-align: center; font-weight:bold">TAHUN AJARAN <?= $row->academic; ?></span>
  </p>
  <p style="text-align: center;">&nbsp;</p>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama Mahasiswa</th>
        <th rowspan="2">NPM</th>
        <th colspan="4">Nilai</th>
        <th rowspan="2">NA</th>
        <th rowspan="2">HM</th>
      </tr>
      <tr>
        <th>Pembimbing Lapang</th>
        <th>Supervisi</th>
        <th>Bimbingan</th>
        <th>Ujian</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data->num_rows() > 0) : ?>
        <?php $i = 1;
        foreach ($data->result() as $data_score) : ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $data_score->fullname ?></td>
            <td><?= $data_score->npm ?></td>
            <td><?= $data_score->supervisor_value ?></td>
            <td><?= $data_score->supervision_value ?></td>
            <td><?= $data_score->lecture_value ?></td>
            <td><?= $data_score->final_score_value ?></td>
            <td><?= number_format($data_score->result_final_score, 2) ?></td>
            <td><?= $data_score->HM ?></td>
          </tr>
        <?php endforeach; ?>
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
  <div>
    <br>
    <br>
    <br>
    <div style="padding-left: 400px;"><?= date('d F Y') ?></div>
    <p style="padding-left: 400px;">
      <span>
        Ketua Program Studi
      </span>
      <br>
      <span style="text-transform:capitalize;">
        <?= $prodi->name; ?>
      </span>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <span style="font-weight: bold;">
        <?= $prodi->lecture; ?>
      </span>
      <br>
      <span style="font-weight: bold;"><?= $prodi->nip; ?></span>


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