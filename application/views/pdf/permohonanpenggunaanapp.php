<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permohonan Penggunaan Aplikasi</title>
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
                <td>: Petunjuk Aplikasi E-PKN</td>
              </tr>
              <tr>
                <td>Perihal</td>
                <td>: <strong>Permohonan Penggunaan Aplikasi E-PKN</strong></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" style="padding-top: -50px;">
          <table style="width: 100%; height: 59px;" border="0">
            <tbody>
              <tr>
                <td><?= date('d-m-Y') ?></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <p style="text-align: left; margin-top:20px">
    <span>
      Yth. Kepala Desa / Lurah
    </span>
    <br>
    <span>
      <?= @$row->company_name ?>
    </span>
    <br>
    <span>
      Di <br>
      &nbsp;&nbsp;&nbsp;Tempat
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
  <div style="text-align:justify;text-justify: inter-word;">
    <p>
      Kami ucapkan terima kasih kepada Bapak/Ibu yang telah bersedia menjadi Pembimbing Lapang Bagi Mahasiswa/i kami yang melaksanakan Praktik Kerja Nyata (PKN) di wilayah Bapak/Ibu.
    </p>
    <p>
      Dalam rangka untuk memudahkan administrasi kegiatan PKN mahasiswa/i kami, mohon kiranya Bapak/Ibu berkenan untuk menggunakan aplikasi E-PKN (petunjuk penggunaan terlampir). Aplikasi E-PKN dapat Bapak/Ibu akses di <strong><span style="color:blue">pembelajaran.polinela.ac.id.</span></strong> Login aplikasi E-PKN dapat Bapak/Ibu gunkan untuk memverifikasi kehadiran mahasiswa, memverikasi jurnal harian mahasiswa, dan memberikan nilai ke mahasiswa. Berikut kami sertakan username dan password untuk login di aplikasi tersebut. Username dan password setelah login bersifat rahasia dan kami harapkan tidak diberikan ke mahasiswa.
    </p>
  </div>
  <table>
    <tr>
      <td width="20%">Username</td>
      <td>: <?= @$row->username ?></td>
    </tr>
    <tr>
      <td>Password (Default)</td>
      <td>: 123456</td>
    </tr>
  </table>

  <p>
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

    </p>
    <img src="<?= base_url('assets/img/ttd/ttd_cap_pudir.png') ?>" width="160" style="padding-left: 320px; padding-top:-50px; padding-bottom:-40px" />
    <p style="padding-left: 400px;">
      <span>
        Dwi Puji Hartono
      </span>
      <br>
      <span>
        NIP 197602202000031002
      </span>
    </p>
  </div>
</body>

</html>