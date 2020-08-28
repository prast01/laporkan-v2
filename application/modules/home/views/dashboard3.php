
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
				                <?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-check"></i> Sukses!</h5>
									<?php echo $this->session->flashdata('success'); ?>
								</div>
				                <?php endif; ?>
                                
				                <?php if ($this->session->flashdata('gagal')): ?>
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
									<div class="card-header">
                                        Data Laporan ODP dan PDP
									</div>
									<div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered datatable">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">No</th>
                                                        <th rowspan="2">Faskes</th>
                                                        <th colspan="3">Jumlah</th>
                                                        <!-- <th colspan="3">Tervalidasi</th> -->
                                                        <th rowspan="2">Sembuh</th>
                                                        <th rowspan="2">Meninggal</th>
                                                        <th rowspan="2">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ODP</th>
                                                        <th>PDP</th>
                                                        <th>COVID 19</th>
                                                        <!-- <th>Belum</th>
                                                        <th>Valid</th>
                                                        <th>Tidak</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $odp = 0;
                                                        $pdp = 0;
                                                        $cvd = 0;
                                                        $bv = 0;
                                                        $v = 0;
                                                        $tv = 0;
                                                        $s = 0;
                                                        $m = 0;
                                                        foreach ($faskes as $key) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $key->nama_user; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d1 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='1' AND kondisi='1' AND created_by='$key->id_user'")->row();
                                                                $odp = $odp + $d1->jml;
                                                                echo $d1->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d2 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='1' AND kondisi='2' AND created_by='$key->id_user'")->row();
                                                                $pdp = $pdp + $d2->jml;
                                                                echo $d2->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d8 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='1' AND covid='1' AND created_by='$key->id_user'")->row();
                                                                $cvd = $cvd + $d8->jml;
                                                                echo $d8->jml;
                                                            ?>
                                                        </td>
                                                        <!-- <td class="text-center">
                                                            <?php
                                                                $d3 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='0' AND created_by='$key->id_user'")->row();
                                                                $bv = $bv + $d3->jml;
                                                                echo $d3->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d4 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='1' AND created_by='$key->id_user'")->row();
                                                                $v = $v + $d4->jml;
                                                                echo $d4->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d5 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE validasi='2' AND created_by='$key->id_user'")->row();
                                                                $tv = $tv + $d5->jml;
                                                                echo $d5->jml;
                                                            ?>
                                                        </td> -->
                                                        <td class="text-center">
                                                            <?php
                                                                $d6 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE covid='1' AND st='1' AND created_by='$key->id_user'")->row();
                                                                $s = $s + $d6->jml;
                                                                echo $d6->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                                $d7 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE covid='1' AND st='2' AND created_by='$key->id_user'")->row();
                                                                $m = $m + $d7->jml;
                                                                echo $d7->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <!-- <button type="button" class="btn btn-warning btn-sm text-white" onclick="modal4('<?php echo $key->id_user; ?>')" title="Lihat Data"><i class="fa fa-eye"></i></button> -->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                            $no++;
                                                        }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" align="right">TOTAL</td>
                                                        <td class="text-center"><?php echo number_format($odp, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($pdp, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($cvd, 0, ',', '.'); ?></td>
                                                        <!-- <td class="text-center"><?php echo number_format($bv, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($v, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($tv, 0, ',', '.'); ?></td> -->
                                                        <td class="text-center"><?php echo number_format($s, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($m, 0, ',', '.'); ?></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
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