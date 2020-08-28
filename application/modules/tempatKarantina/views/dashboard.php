<style>
            .card2 {
                box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.2);
                border-radius: 10px;
                height: 300px;
                padding : 10px 10px 10px 10px;
            }
            .card-bodi {
                height: 100px;
                padding : 10px 10px 10px 10px;
            }
            .card-bodi2 {
                height: 140px;
                padding : 10px 10px 10px 10px;
            }
            .card-foot {
                border-top: 1px solid #eee;
                padding-top: 5px;
            }
            .table-rs {
                font-size: 12pt;
                text-align: justify;
            }
            .table-rs2 {
                font-size: 14pt;
                text-align: justify;
            }
			
</style>
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
									<div class="card-body">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pasien</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Laporan</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-success btn-sm text-white btn-block" onclick="modalKarantina()" title="Tambah"><i class="fa fa-plus"></i> Tambah</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable-karantina" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Umur</th>
                                                                        <th>Kec</th>
                                                                        <th>Kel</th>
                                                                        <th>Alamat</th>
                                                                        <th>Karantina</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="row">
													<?php 
														foreach ($karantina as $key) { 
													?>
												
													<div class="col-lg-4" style="margin-bottom: 10px">
														<div class="card2">
															<div class="card-bodi">
																<table border="0" width="100%">
																	<tr>
																		<td width="10%" class="table-rs"><span class="fa fa-hospital-o" style="color: green"></span></td>
																		<td class="table-rs" colspan="2"><h2><?php echo $key['karantina']; ?></h2></td>
																	</tr>
																	<tr>
																		<td width="10%"></td>
																		<td class="table-rs" colspan="2"><?php echo $key['alamat']; ?></td>
																	</tr>
																</table>
															</div>
															<div class="card-bodi2">
																<table border="0" width="100%">
																<tr>
																	<td width="10%"></td>
																	<td class="table-rs2" colspan="2"><b>Info Karantina</b></td>
																</tr>
																	<tr>
																		<td width="10%"></td>
																		<td width="60%" class="table-rs2"><b>Jumlah</b></td>
																		<td width="30%" class="table-rs2">: <b><?php echo $key['jumlah']; ?></b></td>
																	</tr>
																</table>
															</div>
															<!-- <div class="card-foot">
																<a href="#" class="btn success rounded-15" target="_blank"><span class="fa fa-map-marker"></span> Lokasi</a>
																<a href="#" class="btn btn-success rounded-15"><span class="fa fa-phone"></span></a>
															</div> -->
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
