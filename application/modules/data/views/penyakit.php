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
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>DATA 10 Besar Penyakit</h3>
                    <h3><?= $nama_lap; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode ICD10</th>
                                            <th>Nama Penyakit</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no3 = 1;
                                    foreach ($laporan as $key2) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no3; ?></td>
                                            <td><?php echo $key2->kdiag; ?></td>
                                            <td><?php echo $key2->diag; ?></td>
                                            <td><?php echo $key2->jumlah; ?></td>
                                        </tr>
                                    <?php
                                        $no3++;
                                    }
                                    ?>
                                </table>
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