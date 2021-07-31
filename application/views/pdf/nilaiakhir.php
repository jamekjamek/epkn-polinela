<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai akhir PKN (F-PAI-037)</title>
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
    <strong style="font-size:14px; text-transform:uppercase">Nilai Akhir</strong>
  </p>
  <table style="width: 70%; height: 59px; padding-left:50px" border="0">
    <tbody>
      <tr>
        <td>Nama Mahasiswa</td>
        <td>: <?= $student->fullname ?></td>
      </tr>
      <tr>
        <td>NPM</td>
        <td>: <?= $student->npm ?></td>
      </tr>
      <tr>
        <td>Jurusan </td>
        <td>: <?= $student->major_name ?></td>
      </tr>
      <tr>
        <td>Program Studi </td>
        <td>: <?= $student->prodi_name ?></td>
      </tr>
      <tr>
        <td>Tempat PKN </td>
        <td>: <?= $student->company_name ?></td>
      </tr>
      <tr>
        <td>Dosen pembimbing </td>
        <td>: <?= $student->lecture_name ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr style="height: 18px;">
        <td style="width: 10%; text-align: center; height: 18px;"><strong>No</strong></td>
        <td style="width: 35%; text-align: center; height: 18px;"><strong>Sumber Penilaian</strong></td>
        <td style="width: 15%; text-align: center; height: 18px;"><strong>Bobot (%)</strong></td>
        <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai</strong></td>
        <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai Tertimbang</strong></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height: 18px; text-align:center">1</td>
        <td style="height: 18px; padding-left:10px">Pembimbing Lapangan
        </td>
        <td style="height: 18px;text-align:center">40</td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->supervisor_value ?>
        </td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->supervisor_value_total ?>
        </td>
      </tr>
      <tr>
        <td style="height: 18px; text-align:center">2</td>
        <td style="height: 18px; padding-left:10px">Dosen Pendamping
        </td>
        <td style="height: 18px;text-align:center">35</td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->lecture_value ?>
        </td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->lecture_value_total ?>
        </td>
      </tr>
      <tr>
        <td style="height: 18px; text-align:center">3</td>
        <td style="height: 18px; padding-left:10px">Ujian</td>
        <td style="height: 18px;text-align:center">25</td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->final_score_value ?>
        </td>
        <td style="height: 18px; text-align:center">
          <?= $finalScore->final_score_value_total ?>
        </td>
      </tr>
      <tr>
        <td style="height: 18px; text-align:center; font-weight:bold;" colspan="2">Total</td>
        <td style="height: 18px;text-align:center">100</td>
        <td style="height: 18px; ">
        </td>
        <td style="height: 18px; text-align:center">
          <?= number_format($HM->result_final_score, 2) ?>
        </td>
      </tr>
    </tbody>
  </table>
  <p style="padding-left:20px">Nilai akhir PKN : <?= number_format($HM->result_final_score, 2) ?> (<?= $HM->HM ?>) </p>

  <br>
  <br>
  <div>
    <p style="padding-left: 400px;">
      <span>Bandar Lampung, <?= date('d-m-Y', strtotime($testScore->tgl)) ?></span>
      <br>
      <span>
        Ketua Jurusan,
      </span>
      <br>
      <br>
      <br>
      <br>
      <br>
      <span>
        <?= $major->lecture_name ?>
      </span>
      <br>
      <span>
        NIP <?= $major->nip ?>
      </span>



    </p>
  </div>
</body>

</html>