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
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Suspek Dirawat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-isolasi-tab" data-toggle="pill" href="#custom-tabs-one-isolasi" role="tab" aria-controls="custom-tabs-one-isolasi" aria-selected="true">Suspek Isolasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-discard-tab" data-toggle="pill" href="#custom-tabs-one-discard" role="tab" aria-controls="custom-tabs-one-discard" aria-selected="true">Suspek Discarded</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-rujuk-tab" data-toggle="pill" href="#custom-tabs-one-rujuk" role="tab" aria-controls="custom-tabs-one-rujuk" aria-selected="true">Suspek Dirujuk</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Status</th>
                                                            <th>RS</th>
                                                            <th>patient_id</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($suspek_rawat['res'] == 1) { ?>
                                                            <?php foreach ($suspek_rawat['data'] as $key) : ?>
                                                                <tr>
                                                                    <td><?= $key['no']; ?></td>
                                                                    <td><?= $key['nik']; ?></td>
                                                                    <td><?= $key['nama']; ?></td>
                                                                    <td><?= $key['alamat']; ?></td>
                                                                    <td><?= $key['status']; ?></td>
                                                                    <td><?= $key['faskes']; ?></td>
                                                                    <td><?= $key['id']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-primary" href="<?= site_url("../jateng/ambil_jateng/" . $key['nik'] . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">Ambil Data</a>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-isolasi" role="tabpanel" aria-labelledby="custom-tabs-one-isolasi-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Status</th>
                                                            <th>RS</th>
                                                            <th>patient_id</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($suspek_isolasi['res'] == 1) { ?>
                                                            <?php foreach ($suspek_isolasi['data'] as $key) : ?>
                                                                <tr>
                                                                    <td><?= $key['no']; ?></td>
                                                                    <td><?= $key['nik']; ?></td>
                                                                    <td><?= $key['nama']; ?></td>
                                                                    <td><?= $key['alamat']; ?></td>
                                                                    <td><?= $key['status']; ?></td>
                                                                    <td><?= $key['faskes']; ?></td>
                                                                    <td><?= $key['id']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-primary" href="<?= site_url("../jateng/ambil_jateng/" . $key['nik'] . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">Ambil Data</a>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-discard" role="tabpanel" aria-labelledby="custom-tabs-one-discard-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Status</th>
                                                            <th>RS</th>
                                                            <th>patient_id</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($suspek_discard['res'] == 1) { ?>
                                                            <?php foreach ($suspek_discard['data'] as $key) : ?>
                                                                <tr>
                                                                    <td><?= $key['no']; ?></td>
                                                                    <td><?= $key['nik']; ?></td>
                                                                    <td><?= $key['nama']; ?></td>
                                                                    <td><?= $key['alamat']; ?></td>
                                                                    <td><?= $key['status']; ?></td>
                                                                    <td><?= $key['faskes']; ?></td>
                                                                    <td><?= $key['id']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-primary" href="<?= site_url("../jateng/ambil_jateng/" . $key['nik'] . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">Ambil Data</a>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-rujuk" role="tabpanel" aria-labelledby="custom-tabs-one-rujuk-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Status</th>
                                                            <th>RS</th>
                                                            <th>patient_id</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($suspek_rujuk['res'] == 1) { ?>
                                                            <?php foreach ($suspek_rujuk['data'] as $key) : ?>
                                                                <tr>
                                                                    <td><?= $key['no']; ?></td>
                                                                    <td><?= $key['nik']; ?></td>
                                                                    <td><?= $key['nama']; ?></td>
                                                                    <td><?= $key['alamat']; ?></td>
                                                                    <td><?= $key['status']; ?></td>
                                                                    <td><?= $key['faskes']; ?></td>
                                                                    <td><?= $key['id']; ?></td>
                                                                    <td>
                                                                        <a class="btn btn-primary" href="<?= site_url("../jateng/ambil_jateng/" . $key['nik'] . "/" . $token); ?>" target="_blank" rel="noopener noreferrer">Ambil Data</a>
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