<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Dosen pembimbing lapang</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        td {
            padding: 8px;
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
        <strong style="font-size:14px">LEMBAR PENILAIAN MAHASISWA</strong>
        <br>
        <span style="text-align: center; font-weight:bold">OLEH PEMBIMBING LAPANG</span>
    </p>
    <table style="width: 70%; height: 59px; padding-left:50px" border="0">
        <tbody>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>: <?= $data->fullname ?></td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>: <?= $data->npm ?>
                <td>
            </tr>
            <tr>
                <td>Jurusan </td>
                <td>: <?= $data->major_name ?>
                <td>
            </tr>
            <tr>
                <td>Program Studi </td>
                <td>: <?= $data->prodi_name ?>
                <td>
            </tr>
            <tr>
                <td>Tempat PKN </td>
                <td>: Desa <?= $data->company_name ?>
                <td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center;">&nbsp;</p>
    <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
        <thead>
            <tr style="height: 18px;">
                <td style="width: 10%; text-align: center; height: 18px;"><strong>No</strong></td>
                <td style="width: 35%; text-align: center; height: 18px;"><strong>Kelompok Kegiatan</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Bobot (%)</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai Tertimbang</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">1</td>
                <td style="height: 18px; padding-left:10px">Perencanaan Kegiatan</td>
                <td style="height: 18px;text-align:center">
                </td>
                <td style="height: 18px;text-align:center">20</td>
                <td style="height: 18px;text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">2</td>
                <td style="height: 18px; padding-left:10px">Pelaksanaan Pekerjaan*</td>
                <td style="height: 18px;text-align:center">
                </td>
                <td style="height: 18px;text-align:center">30</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">3</td>
                <td style="height: 18px; padding-left:10px">Kerjasama dan Teamwork*</td>
                <td style="height: 18px; text-align:center">
                </td>
                <td style="height: 18px;text-align:center">20</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">4</td>
                <td style="height: 18px; padding-left:10px">Kreativitas*</td>
                <td style="height: 18px; text-align:center">
                </td>
                <td style="height: 18px;text-align:center">10</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">5</td>
                <td style="height: 18px; padding-left:10px">Kedisiplinan*</td>
                <td style="height: 18px; text-align:center">
                </td>
                <td style="height: 18px;text-align:center">10</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">6</td>
                <td style="height: 18px; padding-left:10px">Sikap*</td>
                <td style="height: 18px; text-align:center">

                </td>
                <td style="height: 18px;text-align:center">10</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center" colspan="2">Nilai</td>
                <td style="height: 18px;">
                </td>
                <td style="height: 18px;text-align:center">100</td>
                <td style="height: 18px; text-align:center">
                </td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 10px;">
        * Penilaian mengacu pada rubrik
    </span>

    <br>
    <br>
    <div>
        <p style="padding-left: 400px;">
            <br>
            <span>
                Pembibing Lapang,
            </span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>
                <?= $data->pic ?>
            </span>
            <br>
        </p>

    </div>
</body>

</html>