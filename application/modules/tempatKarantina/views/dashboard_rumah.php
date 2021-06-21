<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Data Rumah Isolasi
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
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
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-success" onclick="modalKarantina()" title="Tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <?php foreach ($rumah_isolasi as $key) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($key->id_rumah_isolasi == 1) ? "active" : ""; ?>" id="custom-tabs-one-<?= $key->id_rumah_isolasi; ?>-tab" data-toggle="pill" href="#custom-tabs-one-<?= $key->id_rumah_isolasi; ?>" role="tab" aria-controls="custom-tabs-one-<?= $key->id_rumah_isolasi; ?>" aria-selected="true"><?= strtoupper($key->nama_rumah_isolasi); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <br>
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <?php foreach ($rumah_isolasi as $key) : ?>
                                    <div class="tab-pane fade <?= ($key->id_rumah_isolasi == 1) ? "show active" : ""; ?>" id="custom-tabs-one-<?= $key->id_rumah_isolasi; ?>" role="tabpanel" aria-labelledby="custom-tabs-one-<?= $key->id_rumah_isolasi; ?>-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm datatable" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Umur</th>
                                                                <th>Kec</th>
                                                                <th>Kel/Desa</th>
                                                                <th>Alamat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1; ?>
                                                            <?php foreach ($pasien[$key->id_rumah_isolasi] as $key => $val) : ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $val["nama"]; ?></td>
                                                                    <td><?= $val["umur"]; ?></td>
                                                                    <td><?= $val["kecamatan"]; ?></td>
                                                                    <td><?= $val["kelurahan"]; ?></td>
                                                                    <td><?= $val["alamat_domisili"]; ?></td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="<?= site_url("../rumah-isolasi/hapus/" . $val["id_isolasi"]); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
                                                                            <a href="<?= site_url("../rumah-isolasi/keluar_isolasi/" . $val["id_isolasi"]); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin Keluar dari Rumah Isolasi?')"><i class="fa fa-check"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="modal fade" id="modalku">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <!-- <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->