
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<!-- <h1 class="m-0 text-dark">
                                    Data <?php echo ucfirst($this->uri->segment(1)); ?>
                                </h1> -->
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
							<div class="col-2"></div>
							<div class="col-8">
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
							<div class="col-2"></div>
							<div class="col-8">
								<div class="card">
									<div class="card-header">
										Ganti Password
									</div>
									<div class="card-body">
                                        <!-- form start -->
                                        <form class="form-horizontal" method="post" action="<?php echo site_url('../home/changePass'); ?>">
                                            <div class="card-body">
                                                <!-- <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password Lama</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="pass_l" placeholder="Password Lama">
                                                    </div>
                                                </div> -->
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password Baru</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="pass_b" placeholder="Password Baru">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ulangi Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="pass_b2" placeholder="Ulangi Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn-info btn-block">Simpan</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="<?php echo site_url('../home'); ?>" class="btn btn-danger btn-block">Batal</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-footer -->
                                        </form>
									</div>
								</div>
							</div>
							
						</div>
					</div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->