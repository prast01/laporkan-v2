<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGING JATENG</title>
</head>

<body>

    <h4>DATA JATENG - <?= $status; ?></h4>

    <table border="1" style="border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>RS</th>
                <th>patient_id</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php if (isset($data)) { ?>
                <?php foreach ($data as $key) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $key['nik']; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= $key['alamat']; ?></td>
                        <td><?= $key['status']; ?></td>
                        <td><?= $key['faskes']; ?></td>
                        <td><?= $key['id']; ?></td>
                        <td>
                            <a href="<?= site_url("../jateng/ambil_jateng/" . $key['nik'] . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">AMBIL DATA</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } else { ?>
                <tr>
                    <td colspan="8" align="center">TIDAK ADA DATA</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>