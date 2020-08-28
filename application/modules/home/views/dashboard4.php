
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
                                                        <th rowspan="2">Fasilitas Kesehatan</th>
                                                        <th colspan="2">Jumlah TT ODP</th>
                                                        <th colspan="2">Jumlah TT PDP</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kapasitas</th>
                                                        <th>Terisi</th>
                                                        <th>Kapasitas</th>
                                                        <th>Terisi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $odp = 0;
                                                        $pdp = 0;
                                                        foreach ($faskes as $key) {
                                                            $nama = $key->nama_faskes;
                                                            $dt = $this->db->get_where("tb_user", ["nama_user" => $nama])->row();
                                                            $id_user = $dt->id_user;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td class="text-center"><?php echo $key->tt_odp; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                                // $d1 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='1' AND created_by='$key->id_user'")->row();
                                                                // $odp = $odp + $d1->jml;
                                                                // echo $d1->jml;
                                                            ?>
                                                        </td>
                                                        <td class="text-center"><?php echo $key->tt_pdp; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                                // $d1 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='1' AND created_by='$key->id_user'")->row();
                                                                // $odp = $odp + $d1->jml;
                                                                // echo $d1->jml;
                                                            ?>
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
                                                        <td class="text-center"><?php echo number_format($odp, 0, ',', '.'); ?></td>
                                                        <td class="text-center"><?php echo number_format($pdp, 0, ',', '.'); ?></td>
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