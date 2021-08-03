<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AMPLOP</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body>
  <table style="width: 100%; height: 59px;" border="0">
    <tbody>
      <tr>
        <td style="width: 19.5775%;"><img src="<?= base_url('assets/img/logo/logo-new.png') ?>" alt="" width="100" height="100" /></td>
        <td style="text-align: center;">
          <p style="text-align: center; font-size:18px">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN</p>
          <p style="text-align: center; font-size:18px">RISET, DAN TEKNOLOGI</p>
          <p style="text-align: center; font-size:18px"><strong>POLITEKNIK NEGERI LAMPUNG</strong></p>
          <p style="text-align: center; font-size:16px">Jl. Soekarno Hatta Rajabasa Bandar Lampung</p>
          <p style="text-align: center; font-size:12px">Telepon (0721) 703995 Faksimili (0721) 787309</p>
          <p style="text-align: center; font-size:12px">laman : www.polinela.ac.id</p>
        </td>
      </tr>
    </tbody>
  </table>
  <hr style="height: 2px;background-color:black" />
  <p style="padding-left: 240px;">&nbsp;</p>
  <p style="padding-left: 240px;">Yth. <strong><?= $getAmplopByLeader['copy_later'] ?> <?= $getAmplopByLeader['name'] ?></strong><br /><span><?= $getAmplopByLeader['address'] ?> </span><br /><span><?= $getAmplopByLeader['telp'] ?></span></p>
</body>

</html>