<?php
function cek($var)
{
    if ($var == "1") {
        $has = "Ya";
    } elseif ($var == "2") {
        $has = "Tidak";
    } elseif ($var == "3") {
        $has = "Tidak Tahu";
    } else {
        $has = "";
    }

    return $has;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php
        // echo strtoupper(SITE_NAME);
        if ($this->uri->segment(1)) {
            $judul = explode('_', $this->uri->segment(1));
            if (isset($judul[1])) {
                $judul2 = $judul[1];
            } else {
                $judul2 = '';
            }
            // echo " - ". ucfirst($judul[0].' '). ucfirst($judul2);
            echo ucfirst($judul[0] . ' ') . ucfirst($judul2);
        }
        ?>
        - Cetak PE
    </title>
    <link rel="shortcut icon" href="<?php echo base_url(LOGO2); ?>" type="image/x-icon">

    <!-- Bootstrap core CSS-->
    <!-- <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"> -->

    <!-- Custom fonts for this template-->
    <!-- <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css"> -->
    <!-- <script src="https://kit.fontawesome.com/d7e44cf594.js" crossorigin="anonymous"></script> -->

    <!-- Page level plugin CSS-->
    <!-- <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet"> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-buttons/css/buttons.bootstrap4.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css') ?>">

    <script src="<?= site_url("../"); ?>dist/js/echarts.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <style>
        th,
        td {
            font-size: 14px;
        }

        .text-uppercase {
            font-weight: 700;
        }
    </style>
</head>

<body class="py-3">
    <h4 class="text-center">Hasil Penyelidikan Epidemiologi</h4>
    <p class="text-center">Pasien : <b><?= $laporan->nama; ?></b> - <?= $kec; ?>, <?= $kel; ?></p>
    <table border="1" width="100%">
        <tr>
            <td>
                <p class="text-uppercase mb-2">Informasi Klinis</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5">
                    <table border="0" width="70%" style="border-collapse: collapse;">
                        <tr>
                            <td width="50%">Tanggal Timbul Gejala</td>
                            <td width="5%">:</td>
                            <td><?= $pe['tgl_gejala']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Demam</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['demam']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Riwayat Demam</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['riwayat_demam']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Batuk</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['batuk']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Pilek</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['pilek']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Sakit Tenggorokan</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['sakit_tenggorokan']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Sesak Napas</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['sesak_napas']); ?></td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-uppercase mb-2">Kondisi Penyerta</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5">
                    <table border="0" width="70%" style="border-collapse: collapse;">
                        <tr>
                            <td width="50%">Penyakit</td>
                            <td width="5%">:</td>
                            <td><?= $laporan->penyakit; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Penyakit Lainnya</td>
                            <td width="5%">:</td>
                            <td><?= $pe['penyakit_lain']; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-uppercase mb-2">Diagnosis</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5">
                    <table border="0" width="70%" style="border-collapse: collapse;">
                        <tr>
                            <td width="50%">Pneumonia (Klinis atau Radiologi)</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['pneumonia']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">ARDS (Acute Respiratory Distress Syndrome)</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['ards']); ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Diagnosa Lain</td>
                            <td width="5%">:</td>
                            <td><?= $pe['diagnosa_lain']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Status Pasien</td>
                            <td width="5%">:</td>
                            <td><?= $status; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Faskes Terakhir</td>
                            <td width="5%">:</td>
                            <td><?= $laporan->faskes_akhir; ?></td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-uppercase mb-2">Faktor Riwayat Perjalanan</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5">
                    <table border="0" width="70%" style="border-collapse: collapse;">
                        <tr>
                            <td width="80%">Dalam 14 hari sebelum sakit, apakah memiliki riwayat perjalanan dari luar negeri</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['luar_negeri']); ?></td>
                        </tr>
                        <tr>
                            <td width="80%">Dalam 14 hari sebelum sakit, apakah memiliki riwayat perjalanan dari area transmisi lokal</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['jalan_lokal']); ?></td>
                        </tr>
                        <tr>
                            <td width="80%">Dalam 14 hari sebelum sakit, apakah memiliki riwayat tinggal di area transmisi lokal</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['tinggal_lokal']); ?></td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-uppercase mb-2">Faktor Kontak/Paparan</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5">
                    <table border="0" width="70%" style="border-collapse: collapse;">
                        <tr>
                            <td width="80%">Dalam 14 hari sebelum sakit, apakah memiliki kontak dengan kasus suspek</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['kontak_suspek']); ?></td>
                        </tr>
                        <tr>
                            <td width="80%">Dalam 14 hari sebelum sakit, apakah memiliki kontak dengan kasus konfirmasi atau probable</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['kontak_konfirmasi']); ?></td>
                        </tr>
                        <tr>
                            <td width="80%">Apakah pasien memiliki hewan peliharaan</td>
                            <td width="5%">:</td>
                            <td><?= cek($pe['hewan']); ?></td>
                        </tr>
                        <tr>
                            <td width="80%">Apakah pasien seorang petugas kesehatan</td>
                            <td width="5%">:</td>
                            <td>
                                <?php
                                if ($laporan->nakes == 0) {
                                    echo "BUKAN NAKES";
                                } else {
                                    echo "NAKES";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p class="text-uppercase mb-2">Daftar Kontak Erat Kasus</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="px-5 py-1">
                    <table border="1" width="100%" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat</th>
                                <th>Nomer Telepon</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Hubungan</th>
                                <th>Jenis Kontak</th>
                            </tr>
                        </thead>
                        <tbody id="body-list"></tbody>
                    </table>

                    <?php
                    $hub = str_replace('"', "&quot;", json_encode($hubungan));
                    $jk = str_replace('"', "&quot;", json_encode($jenis_kontak));
                    ?>
                    <input type="hidden" id="list-relationship-type" value="<?php echo $hub; ?>">
                    <input type="hidden" id="list-contact-type" value="<?php echo $jk; ?>">

                </div>
            </td>
        </tr>
    </table>

    <script>
        var row_num = 1;
        var dataTracing = [];
        var removeDataTracing = [];
        var dataSearch = null;
        var dataOTG = null;
        var cekOTG = null;
        var relationshipType = '';
        var contactType = '';
        $(document).ready(function() {
            relationshipType = JSON.parse($('#list-relationship-type').val());
            contactType = JSON.parse($('#list-contact-type').val());

            function drawTableTracing() {
                let html = '';
                dataTracing.forEach(item => {
                    html += '<tr>';
                    html += '<td>' + item.nama;
                    html += '<input type="hidden" name="id[]" value="' + item.id_laporan + '">';
                    html += '<input type="hidden" name="status[]" value="' + item.tipe + '">';
                    html += '</td>';
                    html += '<td>' + item.status + '</td>';
                    html += '<td>' + item.nama_kecamatan + '</td>';
                    html += '<td>' + item.nama_kelurahan + '</td>';
                    html += '<td>' + item.alamat_domisili + '</td>';
                    html += '<td>' + item.no_telp + '</td>';
                    html += '<td>' + item.umur + '</td>';
                    html += '<td>' + item.jekel + '</td>';
                    html += '<td>' + addSelectRelationship(item.row_num, item.id_hubungan) + '</td>';
                    html += '<td>' + addSelectContactType(item.row_num, item.id_jenis_kontak) + '</td>';
                    html += '</tr>';
                });
                $('#body-list').html(html);
                $('.relationship-type').on('change', changeSelectRelationship);
                $('.contact-type').on('change', changeSelectContact);
            }

            function addSelectRelationship(row_num, relationship_type_id) {
                relationshipType.forEach(item => {
                    if (item.id_hubungan == relationship_type_id)
                        result = item.nama_hubungan;
                });

                return result;
            }

            function addSelectContactType(row_num, contact_type_id) {
                contactType.forEach(item => {
                    if (item.id_jenis_kontak == contact_type_id)
                        result = item.jenis_kontak;
                });

                return result;
            }

            function changeSelectRelationship() {
                let id = $(this).data('num');
                let value = $(this).val();
                dataTracing.forEach(item => {
                    if (item.row_num == id) {
                        item.id_hubungan = value;
                        return false;
                    }
                })
            }

            function changeSelectContact() {
                let id = $(this).data('num');
                let value = $(this).val();
                dataTracing.forEach(item => {
                    if (item.row_num == id) {
                        item.id_jenis_kontak = value;
                        return false;
                    }
                })
            }

            function personContact() {
                $.get("<?php echo base_url("kasus/data_tracing/") . $laporan->id_laporan; ?>", function(data) {
                    var data = JSON.parse(data);
                    if (data.data.length > 0) {
                        data.data.forEach(item => {
                            item.row_num = row_num;
                            item.is_form_input = false;
                            dataTracing.push(item);
                            row_num++;
                        });
                        drawTableTracing();
                    }

                    console.log(data.data.length);
                })
            }
            personContact();
        });
    </script>
</body>

</html>