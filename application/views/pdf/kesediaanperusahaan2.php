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
    <p style="text-align:left;">
        Lampiran : Kompetensi Mahasiswa PKL yang diharapkan
    </p>

    <br>
    <table style="border-collapse: collapse;width:100%" class="prodi">
        <tr>
            <th style="width: 10%; text-align:center; height:20px">No</th>
            <th style="width: 20%; text-align:center; height:20px">Program Studi</th>
            <th style="width: 30%; text-align:center; height:20px">Kompetensi mahasiswa yang diharapkan oleh instansi / perusahaan</th>
            <th style="width: 30%; text-align:center; height:20px">Jlh mahasiswa yang dapat ditampung</th>
        </tr>


        <!-- //LOOP PORDI HERE -->
        <?php for ($i = 1; $i < 5; $i++) : ?>
            <tr>
                <td style="font-size: 12px;height:150px"><?= $i; ?></td>
                <td style="font-size: 12px;height:150px"></td>
                <td style="font-size: 12px;height:150px"></td>
                <td style="font-size: 12px;height:150px"></td>
            </tr>
        <?php endfor; ?>

        <!-- //End LOOP PORDI HERE -->
    </table>


</body>

</html>