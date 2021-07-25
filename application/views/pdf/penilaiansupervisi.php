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
    <p style="text-align: center;">
        <strong style="font-size:14px">NILAI SUPERVISI</strong>
    </p>
    <table style="width: 70%; height: 59px; padding-left:50px" border="0">
        <tbody>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>: <?= $data->fullname ?> </td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>: <?= $data->npm ?> </td>
            </tr>
            <tr>
                <td>Jurusan </td>
                <td>: <?= $data->major_name ?></td>
            </tr>
            <tr>
                <td>Program Studi </td>
                <td>: <?= $data->prodi_name ?> </td>
            </tr>
            <tr>
                <td>Waktu Supervisi (hari,tgl) </td>
                <td>: <?= $data->time ?> </td>
            </tr>
            <tr>
                <td>Tempat PKN </td>
                <td>: <?= $data->company_name ?> </td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center;">&nbsp;</p>
    <table style="border-collapse: collapse; width: 100%; height: 144px; padding:20px" border="1">
        <thead>
            <tr style="height: 18px;">
                <td style="width: 10%; text-align: center; height: 18px;"><strong>No</strong></td>
                <td style="width: 35%; text-align: center; height: 18px;"><strong>Uraian</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Bobot (%)</strong></td>
                <td style="width: 15%; text-align: center; height: 18px;"><strong>Nilai Tertimbang</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">1</td>
                <td style="height: 18px; padding-left:10px">Kemajuan pelaksanaan PKN
                    (Persentase rencana kegiatan yang telah dilakukan)
                </td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilai_1 ?>
                </td>
                <td style="height: 18px;text-align:center">40</td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilaitertimbang_1 ?>
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">2</td>
                <td style="height: 18px; padding-left:10px">Pengisian lembar isian kegiatan
                    (Kelengkapan isi lembar isian kegiatan)
                </td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilai_2 ?>
                </td>
                <td style="height: 18px;text-align:center">40</td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilaitertimbang_2 ?>
                </td>
            </tr>
            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center">3</td>
                <td style="height: 18px; padding-left:10px">Konsultasi/Diskusi</td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilai_3 ?>
                </td>
                <td style="height: 18px;text-align:center">20</td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilaitertimbang_3 ?>
                </td>
            </tr>

            <tr style="height: 18px;">
                <td style="height: 18px; text-align:center" colspan="2">Nilai</td>
                <td style="height: 18px; text-align: center;">
                    <!-- Score Here -->
                </td>
                <td style="height: 18px;text-align:center">100</td>
                <td style="height: 18px; text-align: center;">
                    <?= $data->nilai_total ?>
                </td>
            </tr>
        </tbody>
    </table>


    <br>
    <br>
    <div>
        <p style="padding-left: 400px;">
            <br>
            <span>
                Dosen Pembimbing,
            </span>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>
                <?= $data->lecture_name ?>
            </span>
            <br>
            <span>
                NIP <?= $data->nip ?>
            </span>



        </p>
        <table style="width: 30%; height: 59px;font-size:10px" border="0">
            <tbody>
                <tr>
                    <td>Kriteria Nilai :</td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Sangat Baik</td>
                    <td>: &#62; 75.4</td>
                </tr>
                <tr>
                    <td>Baik </td>
                    <td>: 65.5 - 75.4 </td>
                </tr>
                <tr>
                    <td>Cukup </td>
                    <td>: 55.0 - 65.4 </td>
                </tr>
                <tr>
                    <td>Kurang </td>
                    <td>: 45.0 - 54.9 </td>
                </tr>
                <tr>
                    <td>Sangat Kurang </td>
                    <td>: &lt; 45.0 </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>