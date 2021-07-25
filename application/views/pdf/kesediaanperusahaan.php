<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan PKL</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        .prodi td,
        th {
            border: 1px solid #0000;
            text-align: left;
            padding: 4px;
        }
    </style>
</head>

<body>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <p style="text-align:center;font-weight:bold">
        INFORMASI KESEDIAAN INSTANSI / PERUSAHAAN MENERIMA MAHASISWA PKL TAHUN AKADEMIK <?= $company->academic_year ?>
    </p>

    <table style="width: 100%;" border="0">
        <tr>
            <td style="width: 20%;">Nama Perusahaan</td>
            <td style="width: 80%;">: <?= $company->company_name ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Alamat</td>
            <td style="width: 80%;">: <?= $company->address ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">No Telp atau Fax</td>
            <td style="width: 80%;">: <?= $company->telp ?></td>
        </tr>
    </table>
    <br>
    <span>Pada Tahun <?= $company->year_accepted ?> (<?= $company->start_month ?> s.d. <?= $company->finish_month ?>) Instansi / Perusahaan kami dapat menerima mahasiswa Praktik Kerja Lapang mahasiswa Politeknik Negeri Lampung antara lain :
    </span>
    <br>
    <br>
    <table style="border-collapse: collapse;width:100%" class="prodi">
        <tr>
            <th style="width: 10%; text-align:center; height:20px" rowspan="2">No</th>
            <th style="width: 70%; text-align:center; height:20px" rowspan="2">Program Study</th>
            <th style="width: 20%; text-align:center; height:20px" colspan="2">Kesediaan Menerima</th>
        </tr>
        <tr>
            <th style="text-align:center;height:20px">Ya</th>
            <th style="text-align:center;height:20px">Tidak</th>
        </tr>


        <!-- //LOOP PORDI HERE -->
        <?php
        $this->load->model('Document/Document_model', 'Documents');

        $i = 1;
        foreach ($prodi as $row) :
            $data = $this->Documents->getWillingness($row->id)->result();
        ?>
            <tr>
                <td style="font-size: 10px;height:10px"><?= $i++; ?></td>
                <td style="font-size: 10px;height:10px">
                    <?= $row->name ?> (<?= $row->degree ?>)
                </td>
                <?php foreach ($data as $r) :
                    if ($r->prodi_id === $row->id) {
                        echo '<td style="text-align:center; font-size: 10px;height:10px">YA</td>';
                        echo '<td style="font-size: 10px;height:10px"></td>';
                    }
                endforeach ?>
                <td style="font-size: 10px;height:10px; border:none"></td>
                <td style="font-size: 10px;height:10px; border:1"></td>
            </tr>
        <?php endforeach; ?>

        <!-- //End LOOP PORDI HERE -->
    </table>
    <br />
    <span style="text-align: justify;">Demikian informasi ini kami sampaikan, dan bila ada perubahan rencana akan kami sampaikan kepada Politeknik Negeri Lampung di kemudian hari. </span>
    <br />
    <br />
    <p style="padding-left: 400px;">
        <span>
            Instansi / Perusahaan,
        </span>
        <br />
        <br />
        <br />
        <br />
        <br />
        <?= $company->company_name ?>
    </p>

</body>

</html>