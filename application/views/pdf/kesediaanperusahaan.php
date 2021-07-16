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
        INFORMASI KESEDIAAN INSTANSI / PERUSAHAAN MENERIMA MAHASISWA PKL TAHUN AKADEMIK 2020/2021
    </p>

    <table style="width: 100%;" border="0">
        <tr>
            <td style="width: 20%;">Nama Perusahaan</td>
            <td style="width: 80%;">: Lorem, ipsum dolor.</td>
        </tr>
        <tr>
            <td style="width: 20%;">Alamat</td>
            <td style="width: 80%;">: Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid esse quas iure laborum unde repudiandae veniam quaerat? Eaque, ducimus ad!.</td>
        </tr>
        <tr>
            <td style="width: 20%;">No Telp atau Fax</td>
            <td style="width: 80%;">: 081398376224.</td>
        </tr>
    </table>
    <br>
    <span>Pada Tahun 2021 (....... s.d. .........) Instansi / Perusahaan kami dapat menerima mahasiswa Praktik Kerja Lapang mahasiswa Politeknik Negeri Lampung antara lain :
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
        <?php for ($i = 1; $i < 19; $i++) : ?>
            <tr>
                <td style="font-size: 10px;height:10px"><?= $i; ?></td>
                <td style="font-size: 10px;height:10px">A</td>
                <td style="font-size: 10px;height:10px"></td>
                <td style="font-size: 10px;height:10px"></td>
            </tr>
        <?php endfor; ?>

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
    </p>

</body>

</html>