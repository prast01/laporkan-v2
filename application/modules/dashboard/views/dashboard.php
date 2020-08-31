<?php

date_default_timezone_set('Asia/Jakarta');
function tgl_ind($date)
{

    /** ARRAY HARI DAN BULAN**/
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array("Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    /** MEMISAHKAN FORMAT TANGGAL, BULAN, TAHUN, DENGAN SUBSTRING**/
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 8);
    $hari = date("w", strtotime($date));
    $jam = date("H:i", strtotime($date));

    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . ", " . $jam . " WIB";
    return $result;
}

$tgl = date("Y-m-d");

$update_at_realtime = tgl_ind($update_at_realtime);
$update_at_cutoff = tgl_ind($update_at_cutoff);

$bln = array(01 => "Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="m-0 text-dark"> Selamat datang <small><br />di Sistem Administrasi <strong>Covid-19</strong> Kabupaten Jepara</small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('gagal')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Eror!</h5>
                            <?php echo $this->session->flashdata('gagal'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="mb-0">DATA REAL TIME</p>
                            <p class="mb-3">update terakhir : <?= $update_at_realtime; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-outline card-success">
                                <div class="card-header" style="background-color: #c9ffde;">
                                    <p class="text-center text-success mb-0">Suspek</p>
                                    <h1 class="text-center text-success mb-0"><?= $suspek['total']; ?></h1>
                                    <p class="text-center text-success mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Discard</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek['discard']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek['discard']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-warning">
                                <div class="card-header" style="background-color: #fffadb;">
                                    <p class="text-center text-warning mb-0">Probable</p>
                                    <h1 class="text-center text-warning mb-0"><?= $probable['total']; ?></h1>
                                    <p class="text-center text-warning mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable['sembuh']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable['sembuh']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable['meninggal']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable['meninggal']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-danger">
                                <div class="card-header" style="background-color: #ffeded;">
                                    <p class="text-center text-danger mb-0">Terkonfirmasi</p>
                                    <h1 class="text-center text-danger mb-0"><?= $konfirmasi['total']; ?></h1>
                                    <p class="text-center text-danger mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi['sembuh']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi['sembuh']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi['meninggal']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi['meninggal']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Luar Daerah</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi['luar']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi['luar']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="mb-0">DATA CUT OFF</p>
                            <p class="mb-3">update terakhir : <?= $update_at_cutoff; ?></p>
                        </div>
                        <div class="col-lg-2">
                            <?php if ($level == "2") : ?>
                                <a href="<?= site_url("../dashboard/update"); ?>" class="btn btn-danger">PUBLISH</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-outline card-success">
                                <div class="card-header" style="background-color: #c9ffde;">
                                    <p class="text-center text-success mb-0">Suspek</p>
                                    <h1 class="text-center text-success mb-0"><?= $suspek_cut['total']; ?></h1>
                                    <p class="text-center text-success mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek_cut['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek_cut['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek_cut['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek_cut['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Discard</p>
                                    <h3 class="text-center mb-0 text-success">
                                        <?= $suspek_cut['discard']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $suspek_cut['discard']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-warning">
                                <div class="card-header" style="background-color: #fffadb;">
                                    <p class="text-center text-warning mb-0">Probable</p>
                                    <h1 class="text-center text-warning mb-0"><?= $probable_cut['total']; ?></h1>
                                    <p class="text-center text-warning mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable_cut['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable_cut['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable_cut['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable_cut['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable_cut['sembuh']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable_cut['sembuh']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        <?= $probable_cut['meninggal']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $probable_cut['meninggal']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-danger">
                                <div class="card-header" style="background-color: #ffeded;">
                                    <p class="text-center text-danger mb-0">Terkonfirmasi</p>
                                    <h1 class="text-center text-danger mb-0"><?= $konfirmasi_cut['total']; ?></h1>
                                    <p class="text-center text-danger mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi_cut['dirawat']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi_cut['dirawat']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi_cut['isolasi']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi_cut['isolasi']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi_cut['sembuh']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi_cut['sembuh']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi_cut['meninggal']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi_cut['meninggal']['baru']; ?></span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Luar Daerah</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        <?= $konfirmasi_cut['luar']['total']; ?> <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> <?= $konfirmasi_cut['luar']['baru']; ?></span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->