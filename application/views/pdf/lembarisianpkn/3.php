<body>
    <p style="text-align: center;">
        <strong style="font-size:14px; text-transform:uppercase">REKAPITULASI KEGIATAN PKN</strong>
    </p>
    <br>
    <br>
    <?php if ($cover) : ?>
        <table style="width: 100%; padding-left:10%" border="0">
            <tbody>
                <tr>
                    <td>Lokasi PKN</td>
                    <td>: <?= $cover->company_name ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table style="border-collapse: collapse; width: 100%;padding-left:10%" border="1">
            <thead>
                <tr style="height: 18px;">
                    <td style="width: 10%; text-align: center;"><strong>No</strong></td>
                    <td style="width: 35%; text-align: center;"><strong>Kegiatan</strong></td>
                    <td style="width: 15%; text-align: center;"><strong>Tanggal Kegiatan</strong></td>
                    <td style="width: 15%; text-align: center;"><strong>Tanda Tangan Pembimbing Lapang</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($recaps as $recap) : ?>
                    <tr>
                        <td style="height: 18px; text-align:center;font-size:10px"><?= $i++; ?></td>
                        <td style="height: 18px; padding-left:10px;font-size:10px"> <?= $recap->learning_achievement ?> </td>
                        <td style="height: 18px;text-align:center;font-size:10px"><?= date('d F Y', strtotime($recap->implementation_date)) ?></td>
                        <td style="height: 50px;font-size:10px">
                            <!-- Score Here -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="padding-left: 400px;">
            <span>Bandar Lampung, <?= date('d F Y') ?></span>
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
                <?= $cover->lecture_name ?>
            </span>
            <br>
            <span>
                NIP <?= $cover->nip ?>
            </span>
        </p>
    <?php
    else :
        echo ' <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">Data belum tersedia</p>';
    endif ?>
</body>