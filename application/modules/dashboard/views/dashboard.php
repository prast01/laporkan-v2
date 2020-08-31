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

$tglku = tgl_ind($tgl_update);

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
                            <p class="mb-3">update terakhir : </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-outline card-success">
                                <div class="card-header" style="background-color: #c9ffde;">
                                    <p class="text-center text-success mb-0">Suspek</p>
                                    <h1 class="text-center text-success mb-0">100</h1>
                                    <p class="text-center text-success mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-success">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-success">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Discard</p>
                                    <h3 class="text-center mb-0 text-success">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-warning">
                                <div class="card-header" style="background-color: #fffadb;">
                                    <p class="text-center text-warning mb-0">Probable</p>
                                    <h1 class="text-center text-warning mb-0">100</h1>
                                    <p class="text-center text-warning mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-danger">
                                <div class="card-header" style="background-color: #ffeded;">
                                    <p class="text-center text-danger mb-0">Terkonfirmasi</p>
                                    <h1 class="text-center text-danger mb-0">100</h1>
                                    <p class="text-center text-danger mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="mb-0">DATA CUT OFF</p>
                            <p class="mb-3">update terakhir : </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-outline card-success">
                                <div class="card-header" style="background-color: #c9ffde;">
                                    <p class="text-center text-success mb-0">Suspek</p>
                                    <h1 class="text-center text-success mb-0">100</h1>
                                    <p class="text-center text-success mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-success">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-success">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Discard</p>
                                    <h3 class="text-center mb-0 text-success">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-warning">
                                <div class="card-header" style="background-color: #fffadb;">
                                    <p class="text-center text-warning mb-0">Probable</p>
                                    <h1 class="text-center text-warning mb-0">100</h1>
                                    <p class="text-center text-warning mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-warning">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-outline card-danger">
                                <div class="card-header" style="background-color: #ffeded;">
                                    <p class="text-center text-danger mb-0">Terkonfirmasi</p>
                                    <h1 class="text-center text-danger mb-0">100</h1>
                                    <p class="text-center text-danger mb-0">Total Kasus</p>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="pt-2 pb-2">
                                    <p class="text-center mb-0">Dirawat</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        50 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Isolasi</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        5 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Sembuh</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
                                    </h3>
                                    <hr class="my-md-0">
                                    <p class="text-center mb-0">Meninggal</p>
                                    <h3 class="text-center mb-0 text-danger">
                                        45 <span class="additional" style="font-size: 16px;"><i class="fa fa-angle-double-up"></i> 5</span>
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