<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=Laporan-Pembimbing-Lapang.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
    <thead>
        <tr>
            <td><strong>No</strong></td>
            <td><strong>Nama</strong></td>
            <td><strong>NPM</strong></td>
            <td><strong>Tempat PKN</strong></td>
            <td><strong>Pembimbing Lapang</strong></td>
            <td><strong>No Rekening</strong></td>
            <td><strong>Nama Bank</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php if ($supervisors->num_rows() > 0) : ?>
            <?php $i = 1;
            foreach ($supervisors->result() as $supervisor) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $supervisor->fullname; ?></td>
                    <td><?= $supervisor->npm; ?></td>
                    <td><?= $supervisor->company_name; ?></td>
                    <td><?= $supervisor->pic; ?></td>
                    <td>'<?= $supervisor->norek; ?></td>
                    <td><?= $supervisor->bank_name; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td>
                    <strong>
                        Data Masih Kosong
                    </strong>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>