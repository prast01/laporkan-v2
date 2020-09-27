<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
    <meta http-equiv="refresh" content="0.5" />
</head>

<body>
    <h4>CEK NIK</h4>
    <h6>DATABASE</h6>
    <table border="1" style="border-collapse: collapse;" width="50%">
        <thead>
            <tr>
                <td width="20%">Nama</td>
                <td width="20%">Kecamatan</td>
                <td width="20%">Kelurahan</td>
                <td width="20%">Alamat</td>
                <td width="20%">Data ID</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $laporan['nama']; ?></td>
                <td><?= $laporan['nama_kecamatan']; ?></td>
                <td><?= $laporan['nama_kelurahan']; ?></td>
                <td><?= $laporan['alamat_domisili']; ?></td>
                <td><?= $laporan['data_id']; ?></td>
            </tr>
        </tbody>
    </table>
    ------------------------------------------------------------------------------
    <h6>JATENG</h6>
    <table border="1" style="border-collapse: collapse;" width="50%">
        <thead>
            <tr>
                <td width="20%">Nama</td>
                <td width="20%">Kecamatan</td>
                <td width="20%">Kelurahan</td>
                <td width="20%">Alamat</td>
                <td width="20%">Data ID</td>
            </tr>
        </thead>
        <tbody>
            <?php if ($jateng != 0) : ?>
                <tr>
                    <td><?= $jateng['nama']; ?></td>
                    <td><?= $jateng['nama_kecamatan']; ?></td>
                    <td><?= $jateng['nama_kelurahan']; ?></td>
                    <td><?= $jateng['alamat_domisili']; ?></td>
                    <td><?= $jateng['patient_id']; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>