<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Data Penyedikan Epidemiologi Covid-19</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                PASIEN : <b><?= $laporan->nama; ?> - <?= $kec; ?>, <?= $kel; ?></b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-1/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-bullhorn"></i> &nbsp;Informasi Klinis</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-2/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-heartbeat"></i> &nbsp;Kondisi Penyerta</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-3/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-stethoscope"></i> &nbsp;Diagnosis</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-4/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-plane"></i> &nbsp;Faktor Riwayat Perjalanan</a>
                                        <a class="nav-link active" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-5/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-handshake"></i> &nbsp;Faktor Kontak/Paparan</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-6/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-address-card"></i> &nbsp;Daftar Kontak Erat Kasus</a>
                                    </div>
                                </div>
                                <div class="col-1 col-sm-1"></div>
                                <div class="col-6 col-sm-8">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

                                            <form class="form-horizontal" method="POST" action="<?= site_url('../kasus/add_step/step-4/' . $laporan->id_laporan); ?>">

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-6 col-form-label">Dalam 14 hari sebelum sakit, apakah memiliki kontak dengan kasus suspek</label>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_suspek1" name="kontak_suspek" value="1">
                                                            <label for="kontak_suspek1" class="custom-control-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_suspek2" name="kontak_suspek" value="2">
                                                            <label for="kontak_suspek2" class="custom-control-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_suspek3" name="kontak_suspek" value="3">
                                                            <label for="kontak_suspek3" class="custom-control-label">Tidak Tahu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-6 col-form-label">Dalam 14 hari sebelum sakit, apakah memiliki kontak dengan kasus konfirmasi atau probable</label>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_konfirmasi1" name="kontak_konfirmasi" value="1">
                                                            <label for="kontak_konfirmasi1" class="custom-control-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_konfirmasi2" name="kontak_konfirmasi" value="2">
                                                            <label for="kontak_konfirmasi2" class="custom-control-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="kontak_konfirmasi3" name="kontak_konfirmasi" value="3">
                                                            <label for="kontak_konfirmasi3" class="custom-control-label">Tidak Tahu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-6 col-form-label">Apakah pasien memiliki hewan peliharaan</label>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="hewan1" name="hewan" value="1">
                                                            <label for="hewan1" class="custom-control-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="hewan2" name="hewan" value="2">
                                                            <label for="hewan2" class="custom-control-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="hewan3" name="hewan" value="3">
                                                            <label for="hewan3" class="custom-control-label">Tidak Tahu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-6 col-form-label">Apakah pasien seorang petugas kesehatan</label>
                                                    <div class="col-sm-5">
                                                        <?php
                                                        if ($laporan->nakes == 0) {
                                                            echo "BUKAN NAKES";
                                                        } else {
                                                            echo "NAKES";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-2">
                                                        <button type="submit" class="btn btn-info btn-block">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->