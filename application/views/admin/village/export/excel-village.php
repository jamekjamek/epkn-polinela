<?php
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition:attachment; filename=" . $title . ".xls");

header("Pragma: no-cache");

header("Expires:0");
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Desa</th>
            <th>Alamat</th>
            <th>PIC</th>
            <th>Label</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($allData as $company) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $company->id; ?></td>
                <td><?= $company->name; ?></td>
                <td>
                    <?= $company->regency_name; ?>,<?= $str = $company->address; ?>, <?= $company->province_name; ?>
                </td>
                <td>
                    <strong><?= $company->pic; ?></strong>
                    <?= $company->email; ?> | <?= $company->telp; ?>
                </td>
                <td>
                    <?php if ($company->label === 'bersama') : ?>
                        Bersama
                    <?php elseif ($company->label === 'prodi') : ?>
                        PRODI
                    <?php else : ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($company->status === 'verify') : ?>
                        Verifikasi
                    <?php else : ?>
                        Tidak Verifikasi
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>