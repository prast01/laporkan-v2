
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered datatable-swab" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" width="5%">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">Umur</th>
                                                                <th rowspan="2">Jekel</th>
                                                                <th rowspan="2">Swab ke</th>
                                                                <th rowspan="2">Lab Tujuan</th>
                                                                <th rowspan="2">Hasil</th>
                                                                <th rowspan="2">Sumber</th>
                                                                <th colspan="4">Tanggal</th>
                                                                <th rowspan="2">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Swab</th>
                                                                <th>Kirim Labkesda</th>
                                                                <th>Kirim Lab Tujuan</th>
                                                                <th>Selesai</th>
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