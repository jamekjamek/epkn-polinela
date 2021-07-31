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
  <br>
  <p style="text-align: center;">
    <strong style="font-size:18px">DOSEN PEMBIMBING PKN</strong>
    <br>
    <span style="text-align: center; font-weight:bold; text-transform:uppercase">PROGRAM STUDI <?= @$row->prodi_name; ?></span>
    <br>
    <span style="text-align: center; font-weight:bold">TAHUN AJARAN <?= @$row->academic_year; ?></span>
  </p>
  <p style="text-align: center;">&nbsp;</p>
  <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
    <thead>
      <tr style="height: 18px;">
        <td style="width: 5%; text-align: center; height: 18px;"><strong>No</strong></td>
        <td style="width: 18%; text-align: center; height: 18px;"><strong>Nama</strong></td>
        <td style="width: 10%; text-align: center; height: 18px;"><strong>NPM</strong></td>
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
            <td style="height: 18px; text-align:center"><?= $lecture->lecture_name; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->nip; ?></td>
            <td style="height: 18px; text-align:center"><?= $lecture->company_name; ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr style="height: 18px;">
          <td style="height: 50px; text-align:center" colspan="6">
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