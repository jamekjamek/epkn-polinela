<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar dan Surat Tugas Tanpa Balasan</title>
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
    <p>Nomor&nbsp; &nbsp; &nbsp; : <?= $settingletter->letter_number; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?= date('d F Y') ?></p>
    <p>Lampiran&nbsp; : Satu Berkas</p>
    <p>Perihal&nbsp; &nbsp; &nbsp; : Praktik Kerja Lapang</p>
    <p>&nbsp;</p>
    <p style="padding-left: 80px;">Yth. <span><?= $row->copy_later ?> <?= $row->company_name; ?></span>
        <br>
        <span>
            <?= $row->address; ?>
        </span>
    </p>
    <br>
    <?php
    $tgl_mulai = $row->start_date;
    $tgl_selesai = $row->finish_date;
    //convert
    $timeStart = strtotime($tgl_mulai);
    $timeEnd = strtotime($tgl_selesai);
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y", $timeEnd) - date("Y", $timeStart)) * 12;
    // hitung selisih bulan
    $numBulan += date("m", $timeEnd) - date("m", $timeStart);
    ?>
    <div style=" text-align: justify; text-justify: inter-word;">
        <p style="padding-left: 80px;">Disampaikan dengan hormat, Menindaklanjuti izin pelaksanaan Praktik Kerja Lapang (PKL) yang telah Bapak/Ibu berikan, bersama ini kami kirimkan mahasiswa yang akan melaksanakan PKL. PKL akan dilaksanakan dari tanggal <?= date('d F Y', strtotime($row->start_date)) ?> s.d <?= date('d F Y', strtotime($row->finish_date)) ?> (surat tugas mahasiswa terlampir). Dalam pelaksanaan PKL, kami memohon Bapak/Ibu berkenan menunjuk Pembimbing Lapang bagi mahasiswa tersebut.</p>
        <p style="padding-left: 80px;">Demikian surat ini dibuat, atas perhatian dan bantuan Bapak/Ibu kami ucapkan terima kasih.</p>
    </div>



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

</body>

</html>