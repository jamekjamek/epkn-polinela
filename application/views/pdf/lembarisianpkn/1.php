<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Isian PKN</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <br>
    <div class="cover-border" style="border: 3px solid black; border-style: double;">
        <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">
            Jurnal <br>Kegiatan Praktik Kerja Nyata (PKN)
        </p>
        <br>
        <br>
        <?php if ($cover) : ?>
            <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">
                PROGRAM STUDI <br><?= $cover->prodi_name ?>
            </p>
            <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">
                JURUSAN <br><?= $cover->major_name ?>
            </p>
            <br>

            <p style="text-align: center; font-size:18px; font-weight:bold">
                Oleh
            </p>
            <br>
            <br>
            <br>
            <br>
            <table style="width: 100%;margin-left: 15%; margin-right: 15%; font-size:18px; font-weight:bold" border="0">
                <tbody>
                    <tr>
                        <td>NAMA</td>
                        <br>
                        <br>
                        <td>: <?= $cover->fullname ?></td>
                        <br>
                        <br>
                    </tr>
                    <tr>
                        <td>NPM</td>
                        <td>: <?= $cover->npm ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img src="<?= base_url('assets/img/logo/logo.png') ?>" alt="" width="150" height="150" style="display: block;
  margin-left: 38%;" />
            <br>
            <br>
            <br>
            <br>
            <br>
            <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">
                POLITEKNIK NEGERI LAMPUNG <br>BANDAR LAMPUNG <br> <?= date('Y', strtotime($cover->created_at)) ?>
            </p>
    </div>
<?php
        else :
            echo ' <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">Data belum tersedia</p>';
        endif ?>
</body>

</html>