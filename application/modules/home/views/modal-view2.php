
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<?php
											if ($kondisi == '1') {
												echo "ORANG DENGAN PEMANTAUAN (ODP)";
											} else {
												echo "PASIEN DALAM PENGAWASAN (PDP)";
											}
										?>
									</div>
									<div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>NIK</th>
                                                                        <th>Nama</th>
                                                                        <th>Kecamatan</th>
                                                                        <th>Alamat</th>
                                                                        <!-- <th>Status</th> -->
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no = 1;
                                                                        $total = 0;
                                                                        if ($kondisi == '1') {
                                                                            foreach ($laporan_odp as $key) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?></td>
                                                                        <td><?php echo $key->alamat_domisili; ?></td>
                                                                        <!-- <td>
                                                                            <?php
                                                                                if($key->validasi == '1'){
                                                                                    echo "Tervalidasi";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "Belum Tervalidasi";
                                                                                }
                                                                            ?>
                                                                        </td> -->
                                                                        <td>
                                                                        <?php
                                                                            // if ($key->kondisi == '1') {
                                                                        ?>
                                                                            <a href="<?php echo site_url('../home/sendPDP/'.$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data PDP?')">
                                                                                <i class="fa fa-plus"></i> PDP
                                                                            </a>
                                                                            <!-- <a href="<?php echo site_url('../home/sembuh/'.$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin sembuh?')">
                                                                                <i class="fa fa-check"></i> Sembuh
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/meninggal/'.$key->id_laporan); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Meninggal?')">
                                                                                <i class="fa fa-times"></i> Meninggal
                                                                            </a> -->
                                                                        <?php
                                                                            // } else {
                                                                            //     if ($key->st == '1') {
                                                                            //         echo "Sembuh";
                                                                            //     } else {
                                                                            //         echo "Meninggal";
                                                                            //     }
                                                                                
                                                                            // }
                                                                        ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                                $total++;
                                                                                $no++;
                                                                            }
                                                                        } else {
                                                                            foreach ($laporan_pdp as $key) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?></td>
                                                                        <td><?php echo $key->alamat_domisili; ?></td>
                                                                        <!-- <td>
                                                                            <?php
                                                                                if($key->validasi == '1'){
                                                                                    echo "Tervalidasi";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "Belum Tervalidasi";
                                                                                }
                                                                            ?>
                                                                        </td> -->
                                                                        <td>
                                                                        <?php
                                                                            if ($key->kondisi == '3') {
                                                                        ?>
                                                                            <!-- <a href="<?php echo site_url('../home/sembuh/'.$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin sembuh?')">
                                                                                <i class="fa fa-check"></i> Sembuh
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/meninggal/'.$key->id_laporan); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Meninggal?')">
                                                                                <i class="fa fa-times"></i> Meninggal
                                                                            </a> -->
                                                                        <?php
                                                                            } elseif ($key->kondisi == '2') {
                                                                        ?>
                                                                            <a href="<?php echo site_url('../home/negatif/'.$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin Negatif?')">
                                                                                <i class="fa fa-minus"></i> Negatif
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/positif/'.$key->id_laporan); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Positif?')">
                                                                                <i class="fa fa-plus"></i> Positif
                                                                            </a>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                                $total++;
                                                                                $no++;
                                                                            }
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="4">TOTAL</th>
                                                                        <th><?php echo number_format($total, 0, ',', '.'); ?></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
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
				</section>
				<!-- /.content -->
                <script>
                    $(function () {
                        $('.datatable3').DataTable();
                    });
                </script>