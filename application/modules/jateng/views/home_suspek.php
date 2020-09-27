<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
</head>

<body style="padding: 0 20px; width: 1000px;">
    <h4>DATA SUSPEK</h4>
    <a href="<?= site_url("../jateng/cek_nik_all_s/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">CEK NIK DAN UPDATE ID JATENG KE LOKAL</button>
    </a>
    <table border="1" style="border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Alamat</th>
                <th>Faskes Akhir</th>
                <th>Status</th>
                <th>Cek NIK</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $key) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key->nama; ?></td>
                    <td><?= $key->nama_kecamatan; ?></td>
                    <td><?= $key->nama_kelurahan; ?></td>
                    <td><?= $key->alamat_domisili; ?></td>
                    <td><?= $key->faskes_akhir; ?></td>
                    <td><?= $key->nama_status; ?></td>
                    <td>
                        <a href="<?= site_url("../jateng/cek_nik/" . $key->nik . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">CEK</a>
                    </td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>