<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Pengantar</title>
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
        <td style="width: 60%;" align="left">
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
                <td>: <strong>Praktik Kerja Lapang</strong></td>
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

  <p style="text-align: left;padding-left:130px; margin-top:50px">
    <span>
      Yth. <?= $row->copy_later ?>
    </span>
    <br>
    <span>
      <?= $row->company_name ?>
    </span>
    <br>
    <span>
      Kecamatan <?= $row->district_name ?>
    </span>
    <br>
    <br>
    <br>
    <span>
      Dengan hormat,
    </span>
    <br>
    <br>
  </p>
  <?php $regency = strtolower($row->address) ?>
  <div style="text-align:justify;text-justify: inter-word;padding-left:130px;">
    Sehubungan dengan pelaksanaan Praktik Kerja Nyata (PKN) mahasiswa Politeknik Negeri Lampung di <?= ucwords($regency) ?>, bersama ini kami kirimkan mahasiswa yang akan melaksanakan PKN. Praktik Kerja Nyata (PKN) akan dilaksanakan dari tanggal <?= date('d F ', strtotime($row->start_date)) ?> s.d. <?= date('d F ', strtotime($row->finish_date)) ?> <?= date('Y', strtotime($row->finish_date)) ?> (surat tugas mahasiswa terlampir).
  </div>

  <p style="padding-left:130px;">
    <span>
      Demikian surat ini, atas perhatian dan bantuan Bapak/Ibu kami ucapkan terima kasih.
    </span>

  </p>
  <div>
    <br>
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
      <br>
      <br>
      <br>
      <br>
      <br>
      <span>
        Dwi Puji Hartono
      </span>
      <br>
      <span>

        NIP <span style="font-weight: 400;">197602202000031002</span>
      </span>


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