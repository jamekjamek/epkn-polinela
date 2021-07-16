<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar dan Surat Tugas Tanpa Balasan</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p style="text-align: center; font-size:24px"><strong>SURAT TUGAS</strong></p>
    <p style="text-align: center;">Nomor: 123/PL15/KM/2021</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: left;">Direktur Politeknik Negeri Lampung, memberikan tugas kepada:</p>
    <table style="border-collapse: collapse; width: 100%; height: 144px;" border="1">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 6.96023%; text-align: center; height: 18px;"><strong>No</strong></td>
                <td style="width: 43.0398%; text-align: center; height: 18px;"><strong>Nama</strong></td>
                <td style="width: 25%; text-align: center; height: 18px;"><strong>NPM</strong></td>
                <td style="width: 25%; text-align: center; height: 18px;"><strong>Program Studi</strong></td>
            </tr>

            <?php $i = 1;
            foreach ($students as $student) : ?>
                <tr style="height: 18px;">
                    <td style="width: 6.96023%; height: 18px; text-align:center"><?= $i++; ?></td>
                    <td style="width: 43.0398%; height: 18px;"><?= $student->student; ?></td>
                    <td style="width: 25%; height: 18px;"><?= $student->npm; ?></td>
                    <td style="width: 25%; height: 18px;"><?= $student->prodi_name; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Untuk dapat melaksanakan kegiatan Praktik kerja Lapang Tahun Ajaran <?= $row->academicyear; ?> bertempat di:</p>
    <div>
        <div><?= $row->company_name; ?>, terhitung mulai tanggal <?= date('d F Y', strtotime($row->start_date)) ?> s.d <?= date('d F Y', strtotime($row->finish_date)) ?>.</div>
        <div>&nbsp;</div>
        <div>Surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div style="padding-left: 400px;">22 Ferbuari 2021</div>
        <p style="padding-left: 400px;">
            <span>
                a.n Direktur
            </span>
            <br>
            <span>
                Pembantu Direktur I,
            </span>
        </p>
        <p style="padding-left: 400px;"></p>
        <p style="padding-left: 400px;">&nbsp;</p>
        <p style="padding-left: 400px;">&nbsp;</p>
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