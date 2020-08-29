<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-2">
                    <h1 class="m-0 text-dark">
                        Data Kasus
                    </h1>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-success text-white" onclick="tambah_kasus()" title="Tambah Kasus"><i class="fa fa-plus"></i> Tambah Kasus</button>
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
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Terkonfirmasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-home-tab2" data-toggle="pill" href="#custom-tabs-one-home2" role="tab" aria-controls="custom-tabs-one-home2" aria-selected="true">Probable</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-home-tab3" data-toggle="pill" href="#custom-tabs-one-home3" role="tab" aria-controls="custom-tabs-one-home3" aria-selected="true">Suspek</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-home-tab4" data-toggle="pill" href="#custom-tabs-one-home4" role="tab" aria-controls="custom-tabs-one-home4" aria-selected="true">Kontak Erat</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <?php if ($id_user <= 23) : ?>
                                            <div class="col-md-2">
                                                <select name="filterByHospitalConfirmed" id="filterByHospitalConfirmed" class="form-control select2" style="width: 100%">
                                                    <option value="">Semua Sumber</option>
                                                    <?php
                                                    foreach ($rs as $key) {
                                                    ?>
                                                        <option value="<?= $key->id_user; ?>"><?= $key->nama_user; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2">
                                            <select name="filterByStatusConfirmed" id="filterByStatusConfirmed" class="form-control select2" style="width: 100%">
                                                <option value="">Semua Status</option>
                                                <option value="1">Terkonfirmasi Dirawat</option>
                                                <option value="2">Terkonfirmasi Isolasi</option>
                                                <option value="3">Terkonfirmasi Sembuh</option>
                                                <option value="4">Terkonfirmasi Meninggal</option>
                                                <option value="5">Terkonfirmasi Dirujuk</option>
                                                <option value="6">Terkonfirmasi Dirujuk Luar Jateng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn btn-success btn-sm text-white btn-block" onclick="modal('1')" title="Tambah ODP"><i class="fa fa-plus"></i> Tambah ODP</button> -->
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-terkonfirmasi" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>No</th> -->
                                                            <th>Kasus</th>
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>Nakes</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="custom-tabs-one-home2" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab2">
                                    <div class="row">
                                        <?php if ($id_user <= 23) : ?>
                                            <div class="col-md-2">
                                                <select name="filterByHospitalProbable" id="filterByHospitalProbable" class="form-control select2" style="width: 100%">
                                                    <option value="">Semua Sumber</option>
                                                    <?php
                                                    foreach ($rs as $key) {
                                                    ?>
                                                        <option value="<?= $key->id_user; ?>"><?= $key->nama_user; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2">
                                            <select name="filterByStatusProbable" id="filterByStatusProbable" class="form-control select2" style="width: 100%">
                                                <option value="">Semua Status</option>
                                                <option value="7">Probabel Dirawat</option>
                                                <option value="8">Probabel Isolasi</option>
                                                <option value="9">Probabel Sembuh</option>
                                                <option value="10">Probabel Meninggal</option>
                                                <option value="11">Probabel Dirujuk</option>
                                                <option value="12">Probabel Dirujuk Luar Jateng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-probable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <!-- <th>Kasus</th> -->
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>Nakes</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade show" id="custom-tabs-one-home3" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab3">
                                    <div class="row">
                                        <?php if ($id_user <= 23) : ?>
                                            <div class="col-md-2">
                                                <select name="filterByHospitalSuspek" id="filterByHospitalSuspek" class="form-control select2" style="width: 100%">
                                                    <option value="">Semua Sumber</option>
                                                    <?php
                                                    foreach ($rs as $key) {
                                                    ?>
                                                        <option value="<?= $key->id_user; ?>"><?= $key->nama_user; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2">
                                            <select name="filterByStatusSuspek" id="filterByStatusSuspek" class="form-control select2" style="width: 100%">
                                                <option value="">Semua Status</option>
                                                <option value="13">Suspek Dirawat</option>
                                                <option value="14">Suspek Isolasi</option>
                                                <option value="15">Suspek Discard</option>
                                                <option value="16">Suspek Dirujuk</option>
                                                <option value="17">Suspek Dirujuk Luar Jateng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-suspek" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <!-- <th>Kasus</th> -->
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>Nakes</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade show" id="custom-tabs-one-home4" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab4">
                                    <div class="row">
                                        <?php if ($id_user <= 23) : ?>
                                            <div class="col-md-2">
                                                <select name="filterByHospitalKontak" id="filterByHospitalKontak" class="form-control select2" style="width: 100%">
                                                    <option value="">Semua Sumber</option>
                                                    <?php
                                                    foreach ($rs as $key) {
                                                    ?>
                                                        <option value="<?= $key->id_user; ?>"><?= $key->nama_user; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2">
                                            <select name="filterByStatusKontak" id="filterByStatusKontak" class="form-control select2" style="width: 100%">
                                                <option value="">Semua Status</option>
                                                <option value="18">Kontak Erat Isolasi</option>
                                                <option value="19">Kontak Erat Discard</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-kontak" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <!-- <th>Kasus</th> -->
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>Nakes</th>
                                                            <th>RS Terakhir</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
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