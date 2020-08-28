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
                    <h3>DATA TERKONFIRMASI COVID-19</h3>
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
                                            <th>Tgl Periksa</th>
                                            <th>Update Terakhir</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Kecamatan</th>
                                            <th>Keterangan</th>
                                            <th>Nakes</th>
                                            <th>Sumber</th>
                                            <th>Penyakit Penyerta</th>
                                            <th>Kondisi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no3 = 1;
                                    foreach ($laporan as $key2) {
                                        if ($key2->id_kelurahan != '') {
                                            $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key2->id_kelurahan])->row();
                                            $desa = $d->nama_kelurahan . ", ";
                                        } else {
                                            $desa = "";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $no3; ?></td>
                                            <td><?php echo $key2->tgl_periksa; ?></td>
                                            <td><?php echo $key2->valid_at; ?></td>
                                            <td><?php echo $key2->nik; ?></td>
                                            <td><?php echo $key2->nama; ?><br>-<?php echo $key2->no_telp; ?></td>
                                            <td><?php echo $key2->umur; ?></td>
                                            <td><?php echo $key2->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key2->alamat_domisili; ?></td>
                                            <td>
                                                Dirawat di: <br>-<?php echo $key2->rawat; ?><br>
                                                <?php
                                                if ($key2->rujuk == '1') {
                                                ?>
                                                    Rujuk ke: <br>
                                                    -<?php echo $key2->rs; ?><br>
                                                <?php
                                                }
                                                ?>
                                                Riwayat: <br>-<?php echo $key2->riwayat_jalan; ?><br>Ket lain: <br>-<?php echo $key2->keterangan; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($key2->nakes == 'NAKES') {
                                                    echo "NAKES";
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $key2->nama_user; ?></td>
                                            <td>
                                                <?php
                                                if ($key2->penyakit != '') {
                                                    $data = $this->db->get_where("tb_penyakit", ['kdiag' => $key2->penyakit])->row();

                                                    echo $data->diag;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($key2->st == '1') {
                                                    echo "SEMBUH";
                                                } elseif ($key2->st == '2') {
                                                    echo "MENINGGAL";
                                                } else {
                                                    echo "PERAWATAN";
                                                }
                                                ?>
                                            </td>
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