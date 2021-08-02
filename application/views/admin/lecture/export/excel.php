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
            <th>PRODI ID</th>
            <th>NIP</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($allData as $student) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $student->id; ?></td>
                <td><?= $student->prodi_id; ?></td>
                <td><?= $student->nip; ?></td>
                <td><?= $student->name; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>