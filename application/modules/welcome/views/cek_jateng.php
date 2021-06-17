<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table style="border-collapse: collapse; width: 100%;">
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $key) : ?>
                <?php $jekel = ($key->jekel == 1) ? "L" : "P"; ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>'<?= $key->nik; ?></td>
                    <td><?= $key->nama; ?></td>
                    <td>JEPARA</td>
                    <td><?= $key->nama_kecamatan; ?></td>
                    <td><?= $key->nama_kelurahan; ?></td>
                    <td><?= $key->rt; ?></td>
                    <td><?= $key->rw; ?></td>
                    <td>'<?= $key->alamat_domisili; ?></td>
                    <td><?= $key->umur; ?></td>
                    <td><?= $jekel; ?></td>
                    <td><?= $key->nama_status; ?></td>
                    <td><?= $key->faskes_akhir; ?></td>
                    <td></td>
                    <td><?= date("Y-m-d", strtotime($key->tgl_periksa)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>