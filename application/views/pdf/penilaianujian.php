<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Penialain Ujian</title>
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
        <strong style="font-size:14px; text-transform:uppercase">Lembar Penilaian Ujian PKN</strong>
    </p>
    <table style="width: 90%; height: 59px; padding-left:50px" border="0">
        <tbody>
            <tr>
                <td style="font-weight: bold;">Identitas Mahasiswa</td>
            </tr>
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
                <td style="font-weight: bold;">Pelaksanaan Ujian </td>
                <td></td>
            </tr>
            <tr>
                <td>Hari/ Tanggal </td>
                <td>: <?= $testScore->hari ?>, <?= date('d-m-Y', strtotime($testScore->tgl)) ?></td>
            </tr>
            <tr>
                <td>Waktu/ Ruang </td>
                <td>: <?= $testScore->waktu ?> / <?= $testScore->room ?></td>
            </tr>
        </tbody>
    </table>
    <p style="padding-left:55px;font-weight:bold">Penilaian</p>
    <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
        <thead>
            <tr style="height: 18px;">
                <td style="width: 10%; text-align: center; height: 18px;"><strong>No</strong></td>
                <td style="width: 35%; text-align: center; height: 18px;"><strong>Kriteria</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Bobot (%)</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai Tertimbang</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">1</td>
                <td style="height: 18px; padding-left:10px">Penyampaian Materi
                </td>
                <td style="height: 18px;text-align:center">35</td>
                <td style="height: 18px;">
                    <?= $testScore->nilai_1 ?>
                </td>
                <td style="height: 18px;">
                    <?= $testScore->nilaitertimbang_1 ?>
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">2</td>
                <td style="height: 18px; padding-left:10px">Lembar Isian Kegiatan
                </td>
                <td style="height: 18px;text-align:center">15</td>
                <td style="height: 18px;">
                    <?= $testScore->nilai_2 ?>
                </td>
                <td style="height: 18px;">
                    <?= $testScore->nilaitertimbang_2 ?>
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">3</td>
                <td style="height: 18px; padding-left:10px">Kemampuan Argumentasi</td>
                <td style="height: 18px;text-align:center">50</td>
                <td style="height: 18px;">
                    <?= $testScore->nilai_3 ?>
                </td>
                <td style="height: 18px;">
                    <?= $testScore->nilaitertimbang_3 ?>
                </td>
            </tr>

            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center" colspan="2">Total</td>
                <td style="height: 18px;text-align:center">100</td>
                <td style="height: 18px;">
                    <!-- Score Here -->
                </td>
                <td style="height: 18px;">
                    <?= $testScore->nilai_total ?>
                </td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 12px;">Kisaran Nilai: 0 – 100 </span>

    <br>
    <br>
    <div>
        <p style="padding-left: 400px;">
            <span>Bandar Lampung, <?= date('d-m-Y', strtotime($testScore->tgl)) ?></span>
            <br>
            <span>
                Dosen Penguji,
            </span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>
                <?= $student->lecture_name ?>
            </span>
            <br>
            <span>
                NIP <?= $student->nip ?>
            </span>



        </p>
    </div>
</body>

</html>