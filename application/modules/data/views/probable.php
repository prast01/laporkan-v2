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
                    <h3>DATA PROBABLE</h3>
                    <h3><?php echo $nama_lap; ?></h3>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($laporan as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->tgl_periksa; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->umur; ?></td>
                                                <td><?= $row->nama_kecamatan; ?></td>
                                                <td><?= $row->nama_kelurahan; ?></td>
                                                <td><?= $row->alamat_domisili; ?></td>
                                                <td><?= $row->no_telp; ?></td>
                                                <td><?= $row->nama_status; ?></td>
                                                <td><?= ($row->nakes == "NAKES") ? "NAKES" : "-"; ?></td>
                                                <td><?= $row->faskes_akhir; ?></td>
                                                <td><?= $row->penyakit; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
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