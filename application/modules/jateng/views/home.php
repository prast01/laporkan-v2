<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
</head>

<body style="padding: 0 20px;">
    <h4>DATA TERKONFIRMASI</h4>
    <a href="<?= site_url("../jateng/cek_nik_all_k/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">CEK NIK DAN UPDATE ID JATENG KE LOKAL</button>
    </a>
    &nbsp;&nbsp;
    <a href="<?= site_url("../jateng/refresh"); ?>">
        <button style="cursor: pointer;">REFRESH TOKEN</button>
    </a>
    &nbsp;&nbsp;
    <br><br>
    <a href="<?= site_url("../jateng/get_data_all/1/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">GET DATA JATENG DIRAWAT</button>
    </a>
    &nbsp;&nbsp;
    <a href="<?= site_url("../jateng/get_data_all/2/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">GET DATA JATENG ISOLASI</button>
    </a>
    &nbsp;&nbsp;
    <a href="<?= site_url("../jateng/get_data_all/14/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">GET DATA JATENG DIRUJUK</button>
    </a>
    &nbsp;&nbsp;
    <a href="<?= site_url("../jateng/get_data_all/3/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">GET DATA JATENG SEMBUH</button>
    </a>
    &nbsp;&nbsp;
    <a href="<?= site_url("../jateng/get_data_all/4/" . $token); ?>" target="_blank">
        <button style="cursor: pointer;">GET DATA JATENG MENINGGAL</button>
    </a>
    <br>
    <table border="1" style="border-collapse: collapse; margin-top: 10px" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>RW</th>
                <th>RT</th>
                <th>Alamat</th>
                <th>Faskes Akhir</th>
                <th>Status</th>
                <th>Cek NAR</th>
                <th>CEK NIK</th>
                <th>KIRIM</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $key) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key->nik; ?></td>
                    <td><?= $key->nama; ?></td>
                    <td><?= $key->nama_kecamatan; ?></td>
                    <td><?= $key->nama_kelurahan; ?></td>
                    <td><?= $key->rw; ?></td>
                    <td><?= $key->rt; ?></td>
                    <td><?= $key->alamat_domisili; ?></td>
                    <td><?= $key->faskes_akhir; ?></td>
                    <td><?= $key->nama_status; ?></td>
                    <td>
                        <a href="<?= site_url("../jateng/cek_nar/" . $key->nik . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">
                            NAR
                        </a>
                    </td>
                    <td>
                        <a href="<?= site_url("../jateng/cek_nik/" . $key->nik . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">
                            CEK
                        </a>
                        <!-- <a href="<?= site_url("../jateng/cek_id/" . $key->nik . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">CEK ID</a> -->
                    </td>
                    <td>
                        <a href="<?= site_url("../jateng/insert_jateng/" . $key->nik . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">KIRIM</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>