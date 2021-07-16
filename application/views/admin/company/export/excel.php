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
            <th>ID Kabupaten</th>
            <th>Kabupaten</th>
            <th>ID Provinsi</th>
            <th>Provinsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($allData as $prodi) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $prodi->regency_id; ?></td>
                <td><?= $prodi->regency_name; ?></td>
                <td><?= $prodi->province_id; ?></td>
                <td><?= $prodi->province_name; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>