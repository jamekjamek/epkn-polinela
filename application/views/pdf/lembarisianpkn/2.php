<body>
    <p style="text-align: center;">
        <strong style="font-size:14px; text-transform:uppercase">JURNAL KEGIATAN <br> PRAKTIK KERJA NYATA (PKN)</strong>
    </p>
    <br>
    <br>
    <br>
    <?php if ($cover) : ?>
        <table style="width: 100%; height: 59px; padding-left:15%" border="0">
            <tbody>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>: <?= $cover->fullname ?></td>
                </tr>
                <tr>
                    <td>NPM</td>
                    <td>: <?= $cover->npm ?></td>
                </tr>

                <tr>
                    <td>Program Studi </td>
                    <td>: <?= $cover->prodi_name ?></td>
                </tr>
                <tr>
                    <td>Jurusan </td>
                    <td>: <?= $cover->major_name ?></td>
                </tr>
                <tr>
                    <td>Lokasi PKN </td>
                    <td>: <?= $cover->company_name ?></td>
                </tr>
                <tr>
                    <td>Pembimbing Lapang </td>
                    <td>: <?= $cover->pic ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">
            POLITEKNIK NEGERI LAMPUNG <br>BANDAR LAMPUNG <br> <?= date('Y', strtotime($cover->created_at)) ?>
        </p>
    <?php
    else :
        echo ' <p style="text-align: center; font-size:18px; font-weight:bold; text-transform:uppercase">Data belum tersedia</p>';
    endif ?>
</body>