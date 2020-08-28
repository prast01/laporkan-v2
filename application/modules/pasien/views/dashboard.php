<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <!-- Data Planning Pegawai -->
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
                                    <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PDP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">COVID 19</a>
                                </li>
                                <?php
                                if ($nama_user != 'PKM' && $level == '3') {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab2" data-toggle="pill" href="#custom-tabs-one-messages2" role="tab" aria-controls="custom-tabs-one-messages2" aria-selected="false">PDP RAWAT INAP</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab3" data-toggle="pill" href="#custom-tabs-one-messages3" role="tab" aria-controls="custom-tabs-one-messages3" aria-selected="false">COVID 19 RAWAT INAP</a>
                                    </li>
                                <?php
                                } elseif ($level == '2') {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab4" data-toggle="pill" href="#custom-tabs-one-messages4" role="tab" aria-controls="custom-tabs-one-messages4" aria-selected="false">COVID 19 JATENG</a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <br>
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <!-- <button type="button" class="btn btn-warning btn-sm text-white btn-block" onclick="modal('2')" title="Tambah PDP"><i class="fa fa-plus"></i> Tambah PDP</button> -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-pdp" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tgl Periksa</th>
                                                            <th>Nama</th>
                                                            <th>Umur</th>
                                                            <th>Kec</th>
                                                            <th>Kel</th>
                                                            <th>Alamat</th>
                                                            <th>Telp</th>
                                                            <th>Status</th>
                                                            <th>Sumber</th>
                                                            <th>Nakes</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <!-- <button type="button" class="btn btn-danger btn-sm text-white btn-block" onclick="modal('3')" title="Tambah COVID-19"><i class="fa fa-plus"></i> Tambah COVID-19</button> -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered datatable-covid" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
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
                                                            <th>Sumber</th>
                                                            <th>Penyerta</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($nama_user != 'PKM' && $level == '3') {
                                ?>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages2" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-pdp-rs" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tgl Periksa</th>
                                                                <th>Nama</th>
                                                                <th>Umur</th>
                                                                <th>Kec</th>
                                                                <th>Kel</th>
                                                                <th>Alamat</th>
                                                                <th>Telp</th>
                                                                <th>Status</th>
                                                                <th>Sumber</th>
                                                                <th>Nakes</th>
                                                                <th>Penyerta</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages3" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-covid-rs" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kasus</th>
                                                                <th>Tgl Periksa</th>
                                                                <th>Nama</th>
                                                                <th>Umur</th>
                                                                <th>Kec</th>
                                                                <th>Kel</th>
                                                                <th>Alamat</th>
                                                                <th>Telp</th>
                                                                <th>Status</th>
                                                                <th>Sumber</th>
                                                                <th>Nakes</th>
                                                                <th>Penyerta</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } elseif ($level == '2') {
                                ?>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages4" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-covid-jateng" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tgl Periksa</th>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>Umur</th>
                                                                <th>Kec</th>
                                                                <th>Kel</th>
                                                                <th>Alamat</th>
                                                                <th>Telp</th>
                                                                <th>Status</th>
                                                                <th>Sumber</th>
                                                                <th>Nakes</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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