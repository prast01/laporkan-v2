<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
</head>

<body>
    <h4>CEK ID</h4>
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

    <br>
    <h4>UPDATE DATA ID</h4>
    <form action="" method="post">
        <table border="0" width="100%">
            <tr>
                <td width="15%">NIK</td>
                <td>
                    <input type="number" name="nik" value="<?= $laporan['nik']; ?>">
                </td>
            </tr>
            <tr>
                <td width="15%">DATA ID JATENG</td>
                <td>
                    <input type="text" name="data_id">
                </td>
            </tr>
        </table>
        <br>
        <button type="submit" name="simpan">SIMPAN</button>
    </form>

</body>

</html>