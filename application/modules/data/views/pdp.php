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
                    <h3>DATA PASIEN DALAM PENGAWASAN (PDP)</h3>
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Kecamatan</th>
                                            <th>Keterangan</th>
                                            <th>Sumber</th>
                                            <th>Status</th>
                                            <th>Penyakit Penyerta</th>
                                            <th>NAKES</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($laporan as $key) {
                                        if ($key->id_kelurahan != '') {
                                            $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                            $desa = $d->nama_kelurahan . ", ";
                                        } else {
                                            $desa = "";
                                        }

                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $key->tgl_periksa; ?></td>
                                            <td><?php echo $key->nik; ?></td>
                                            <td><?php echo $key->nama; ?><br>-<?php echo $key->no_telp; ?></td>
                                            <td><?php echo $key->umur; ?></td>
                                            <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                            <td>
                                                Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                <?php
                                                if ($key->rujuk == '1') {
                                                ?>
                                                    Rujuk ke: <br>
                                                    -<?php echo $key->rs; ?><br>
                                                <?php
                                                }
                                                ?>
                                                Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                Ket lain: <br>-<?php echo $key->keterangan; ?>
                                            </td>
                                            <td><?php echo $key->nama_user; ?></td>
                                            <td>
                                                <?php
                                                if ($key->rawat != "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                    echo "RANAP JEPARA";
                                                } elseif ($key->covid == "0" && $key->rujuk == "1" && $key->st == "0") {
                                                    echo "RANAP LUAR JEPARA";
                                                } elseif ($key->rawat == "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                    echo "PENGAWASAN FASYANKES";
                                                } elseif ($key->covid == "0" && $key->st == "1") {
                                                    echo "PULANG/SEHAT";
                                                } elseif ($key->st == "2") {
                                                    echo "MENINGGAL";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($key->penyakit != '') {
                                                    $data = $this->db->get_where("tb_penyakit", ['kdiag' => $key->penyakit])->row();

                                                    echo $data->diag;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($key->nakes == '1') {
                                                    echo "NAKES";
                                                } else {
                                                    echo "NON NAKES";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
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