<body>
    <p style="text-align: center;">
        <strong style="font-size:14px; text-transform:uppercase">LEMBAR ISIAN KEGIATAN PKN</strong>
    </p>
    <br>
    <?php if ($log) : ?>
        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td>Kegiatan</td>
                    <td>: <?= $log->learning_achievement ?></td>

                </tr>
                <tr>
                    <td>Materi</td>
                    <td>: </td>
                </tr>
            </tbody>
        </table>
        <p>
            <?= $log->topic ?>
        </p>

        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td style="width: 40%;">Bahan dan Alat yang digunakan</td>
                    <td>: </td>

                </tr>

            </tbody>
        </table>
        <p>
            <?= $log->tool ?>
        </p>
        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td>Tempat Pelaksanaan</td>
                    <td>: <?= $log->implement_place ?></td>

                </tr>
                <tr>
                    <td>Tanggal Pelaksanaan</td>
                    <td>: <?= date('d F Y', strtotime($log->implementation_date)) ?></td>
                </tr>
                <tr>
                    <td>Jumlah Peserta</td>
                    <td>: <?= $log->qty ?></td>
                </tr>
                <tr>
                    <td>Prosedur</td>
                    <td>: </td>
                </tr>
            </tbody>
        </table>
        <p>
            <?= $log->procedure ?>
        </p>

        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td>Hasil Pelaksanaan</td>
                    <td>: </td>

                </tr>
            </tbody>
        </table>
        <p>
            <?= $log->description ?>
        </p>
        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td>Komentar</td>
                    <td>: </td>

                </tr>
            </tbody>
        </table>
        <p>
            <?= $log->comment ?>
        </p>
        <p style="padding-left: 400px;">
            <span><?= $log->regency ?>, <?= date('d F Y', strtotime($log->implementation_date)) ?></span>
        </p>

        <table style="width: 100%;" border="0">
            <tbody>
                <tr>
                    <td style="width: 60%;">
                        <span>Mengetahui,</span>
                        <br>
                        <span>
                            Pembimbing Lapang,
                        </span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <span>
                            (<?= $log->pic ?>)
                        </span>
                        <br>
                    </td>
                    <td style="width: 40%;">
                        <span></span>
                        <br>
                        <span>
                            Mahasiswa,
                        </span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <span>
                            (<?= $log->fullname ?>)
                        </span>
                        <br>
                    </td>

                </tr>
            </tbody>
        </table>
    <?php
    else :
        echo '<p>Data belum tersedia</p>';
    endif ?>
</body>