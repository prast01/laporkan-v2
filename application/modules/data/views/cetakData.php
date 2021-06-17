<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media print {
            .pagebreak {
                clear: both;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

    <center>
        <h4>Rekap Pasien Bulan <?= $bulan; ?></h4>
    </center>
    <table border="1" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kasus</th>
                <th>Jumlah Kasus</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($rekap as $key => $val) : ?>
                <tr>
                    <td align="center" width="5%"><?= $no++; ?></td>
                    <td><?= $key; ?></td>
                    <td align="center"><?= $val; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagebreak"> </div>

    <center>
        <h4>Daftar Nama Pasien Bulan <?= $bulan; ?></h4>
    </center>
    <table border="1" width="100%" style="border-collapse: collapse;">

        <thead>
            <tr>
                <th rowspan="2" width="5%">No</th>
                <th rowspan="2" width="17%">Nama</th>
                <th rowspan="2" width="17%">Kecamatan</th>
                <th rowspan="2">Alamat</th>
                <th colspan="3">Status</th>
            </tr>
            <tr>
                <?php if ($bln <= "07") { ?>
                    <th width="12%">ODP</th>
                    <th width="12%">PDP</th>
                    <th width="12%">POSITIF</th>
                <?php } else { ?>
                    <th width="12%">SUSPEK</th>
                    <th width="12%">PROBABEL</th>
                    <th width="12%">TERKONFIRMASI</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php $t1 = 0; ?>
            <?php $t2 = 0; ?>
            <?php $t3 = 0; ?>
            <?php foreach ($kasus_1 as $ks) : ?>
                <?php $t1 = $t1 + 1; ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $ks->nama; ?></td>
                    <td><?= $ks->nama_kecamatan; ?></td>
                    <td><?= $ks->alamat_domisili; ?></td>
                    <td align="center"><b>V</b></td>
                    <td align="center"></td>
                    <td align="center"></td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($kasus_2 as $ks) : ?>
                <?php $t2 = $t2 + 1; ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $ks->nama; ?></td>
                    <td><?= $ks->nama_kecamatan; ?></td>
                    <td><?= $ks->alamat_domisili; ?></td>
                    <td align="center"></td>
                    <td align="center"><b>V</b></td>
                    <td align="center"></td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($kasus_3 as $ks) : ?>
                <?php $t3 = $t3 + 1; ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $ks->nama; ?></td>
                    <td><?= $ks->nama_kecamatan; ?></td>
                    <td><?= $ks->alamat_domisili; ?></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"><b>V</b></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" align="right"><b>TOTAL</b></td>
                <td align="center"><b><?= $t1; ?></b></td>
                <td align="center"><b><?= $t2; ?></b></td>
                <td align="center"><b><?= $t3; ?></b></td>
            </tr>
        </tbody>
    </table>

</body>

</html>