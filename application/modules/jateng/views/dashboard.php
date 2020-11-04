<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-2 col-6">
                    <h1 class="m-0 text-dark">
                        Data Kasus
                    </h1>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="<?= site_url("../jateng/refresh"); ?>" class="btn btn-success"><span class="fa fa-sync"></span> Refresh Token</a>
                        </div>
                        <!-- <div class="col-md-12">
                            <a href="<?= site_url("../jateng/ambil_data"); ?>" target="_blank" class="btn btn-warning"><span class="fa fa-sync"></span> Ambil Data JATENG</a>
                        </div> -->
                    </div>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Terkonfirmasi Pemkab</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="true">Suspek Pemkab</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?= site_url("../jateng/ambil_data"); ?>" target="_blank" class="btn btn-warning mb-3"><span class="fa fa-sync"></span> Ambil Data JATENG</a>
                                            <a href="<?= site_url("../jateng/cek_nik_all_k/" . $token); ?>" target="_blank" class="btn btn-success mb-3"><span class="fa fa-sync"></span> CEK NIK KE JATENG</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kasus</th>
                                                            <th>Tgl Periksa</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>RW</th>
                                                            <th>RT</th>
                                                            <th>Alamat</th>
                                                            <th>Status</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($konfirmasi as $row) : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $row->kasus; ?></td>
                                                                <td><?= $row->tgl_periksa; ?></td>
                                                                <td><?= $row->nik; ?></td>
                                                                <td><?= $row->nama; ?></td>
                                                                <td><?= $row->umur; ?></td>
                                                                <td><?= $row->nama_kecamatan; ?></td>
                                                                <td><?= $row->nama_kelurahan; ?></td>
                                                                <td><?= $row->rw; ?></td>
                                                                <td><?= $row->rt; ?></td>
                                                                <td><?= $row->alamat_domisili; ?></td>
                                                                <td><?= $row->nama_status; ?></td>
                                                                <td><?= $row->faskes_akhir; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                        Aksi </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/cek_nik/" . $row->nik . "/" . $token); ?>"><span class="fa fa-check"></span> Cek NIK</a>
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/cek_nar/" . $row->nik . "/" . $token); ?>"><span class="fa fa-check"></span> Cek NAR</a>
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/insert_jateng/" . $row->nik . "/" . $token); ?>"><span class="fa fa-share-square"></span> Kirim Data</a>
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
                                <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel" aria-labelledby="custom-tabs-one-contact-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?= site_url("../jateng/ambil_data_2"); ?>" target="_blank" class="btn btn-warning mb-3"><span class="fa fa-sync"></span> Ambil Data JATENG</a>
                                            <a href="<?= site_url("../jateng/cek_nik_all_s/" . $token); ?>" target="_blank" class="btn btn-success mb-3"><span class="fa fa-sync"></span> CEK NIK KE JATENG</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>RW</th>
                                                            <th>RT</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($suspek as $row) : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $row->tgl_periksa; ?></td>
                                                                <td><?= $row->nama; ?></td>
                                                                <td><?= $row->umur; ?></td>
                                                                <td><?= $row->nama_kecamatan; ?></td>
                                                                <td><?= $row->nama_kelurahan; ?></td>
                                                                <td><?= $row->rw; ?></td>
                                                                <td><?= $row->rt; ?></td>
                                                                <td><?= $row->alamat_domisili; ?></td>
                                                                <td><?= $row->no_telp; ?></td>
                                                                <td><?= $row->nama_status; ?></td>
                                                                <td><?= $row->faskes_akhir; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                        Aksi </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/cek_nik/" . $row->nik . "/" . $token); ?>"><span class="fa fa-check"></span> Cek NIK</a>
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/cek_nar/" . $row->nik . "/" . $token); ?>"><span class="fa fa-check"></span> Cek NAR</a>
                                                                        <a class="dropdown-item" target="_blank" href="<?= site_url("../jateng/insert_jateng/" . $row->nik . "/" . $token); ?>"><span class="fa fa-share-square"></span> Kirim Data</a>
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