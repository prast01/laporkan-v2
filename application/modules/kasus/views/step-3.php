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
            <div class="row">
                <div class="col-6">
                    <a href="<?= site_url('../kasus'); ?>" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <a href="<?= site_url('../kasus/cetak_pe/' . $laporan->id_laporan); ?>" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i> Cetak PE
                    </a>
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
                                        <a class="nav-link active" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-3/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-stethoscope"></i> &nbsp;Diagnosis</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-4/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-plane"></i> &nbsp;Faktor Riwayat Perjalanan</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-5/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-handshake"></i> &nbsp;Faktor Kontak/Paparan</a>
                                        <a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-6/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-address-card"></i> &nbsp;Daftar Kontak Erat Kasus</a>
                                    </div>
                                </div>
                                <div class="col-1 col-sm-2"></div>
                                <div class="col-6 col-sm-7">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

                                            <form class="form-horizontal" method="POST" action="<?= site_url('../kasus/add_step/step-3/' . $laporan->id_laporan); ?>">

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Pneumonia (Klinis atau Radiologi)</label>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="pneumonia1" name="pneumonia" value="1" <?= ($pe['pneumonia'] == '1') ? "checked" : ""; ?>>
                                                            <label for="pneumonia1" class="custom-control-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="pneumonia2" name="pneumonia" value="2" <?= ($pe['pneumonia'] == '2') ? "checked" : ""; ?>>
                                                            <label for="pneumonia2" class="custom-control-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="pneumonia3" name="pneumonia" value="3" <?= ($pe['pneumonia'] == '3') ? "checked" : ""; ?>>
                                                            <label for="pneumonia3" class="custom-control-label">Tidak Tahu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">ARDS (Acute Respiratory Distress Syndrome)</label>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="ards1" name="ards" value="1" <?= ($pe['ards'] == '1') ? "checked" : ""; ?>>
                                                            <label for="ards1" class="custom-control-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="ards2" name="ards" value="2" <?= ($pe['ards'] == '2') ? "checked" : ""; ?>>
                                                            <label for="ards2" class="custom-control-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 pt-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="ards3" name="ards" value="3" <?= ($pe['ards'] == '3') ? "checked" : ""; ?>>
                                                            <label for="ards3" class="custom-control-label">Tidak Tahu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Diagnosa Lainnya (jika ada)</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="diagnosa_lain" class="form-control" value="<?= $pe['diagnosa_lain']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status Pasien</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" disabled class="form-control" value="<?= $status; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Faskes Akhir</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" disabled class="form-control" value="<?= $laporan->faskes_akhir; ?>">
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