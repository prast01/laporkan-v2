<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table width="100%" border="1">
        <thead>
            <tr>
                <th width="10%">No</th>
                <th>Bulan</th>
                <th>Tanggal 1</th>
                <th>Tanggal 2</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($bulan as $key => $val) : ?>
                <?php
                $date = date("Y-m-d", strtotime("2020-" . $key . "-01"));
                if ($key <= "07") {
                    $date_min = date("Y-m-d", strtotime("2020-" . $key . "-01" . "-13 day"));
                } else {
                    $date_min = date("Y-m-d", strtotime("2020-" . $key . "-01" . "-9 day"));
                }

                if ($key == "12") {
                    $date2 = date("Y-m-d", strtotime("2020-" . $key . "-27"));
                } else {
                    $date2 = date("Y-m-t", strtotime("2020-" . $key . "-01"));
                }

                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $val; ?></td>
                    <td><?= $date_min; ?></td>
                    <td><?= $date2; ?></td>
                    <td>
                        <a target="_blank" href="<?= site_url("../data/cetakData/" . $key . "/" . $date_min . "/" . $date2); ?>">Cetak</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>