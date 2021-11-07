<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=Laporan-Dosen-Pembimbing.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table>
    <thead>
        <tr>
            <td><strong>No</strong></td>
            <td><strong>Nama</strong></td>
            <td><strong>NPM</strong></td>
            <td><strong>Program Studi</strong></td>
            <td><strong>Dosen Pembimbing</strong></td>
            <td><strong>NIP</strong></td>
            <td><strong>Tempat PKN</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php if ($lecturers->num_rows() > 0) : ?>
            <?php $i = 1;
            foreach ($lecturers->result() as $lecture) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $lecture->fullname; ?></td>
                    <td><?= $lecture->npm; ?></td>
                    <td><?= $lecture->prodi_name; ?></td>
                    <td><?= $lecture->lecture_name; ?></td>
                    <td>'<?= $lecture->nip; ?></td>
                    <td><?= $lecture->company_name; ?></td>
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