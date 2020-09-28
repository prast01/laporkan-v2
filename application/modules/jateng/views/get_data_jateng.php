<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
    <!-- <meta http-equiv="refresh" content="0.5" /> -->
</head>

<body>
    <h4>DATA JATENG</h4>
    <h6>BEDA DENGAN JEPARA</h6>
    <table border="1" style="border-collapse: collapse;" width="50%">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Kecamatan</td>
                <td>Kelurahan</td>
                <td width="20%">Alamat</td>
                <td>Status</td>
                <td>Faskes</td>
                <td width="20%">Data ID</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jateng as $key => $val) : ?>
                <tr>
                    <td><?= $val['nama']; ?></td>
                    <td><?= $val['nama_kecamatan']; ?></td>
                    <td><?= $val['nama_kelurahan']; ?></td>
                    <td><?= $val['alamat_domisili']; ?></td>
                    <td><?= $val['status']; ?></td>
                    <td><?= $val['faskes']; ?></td>
                    <td><?= $val['patient_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>