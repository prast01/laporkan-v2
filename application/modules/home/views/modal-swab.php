
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header text-center">
										<h3 class="text-bold"><?php echo strtoupper($laporan->nama)."(".$laporan->umur." th)"; ?></h3>
										<?php
											echo $laporan->nama_kecamatan.", ".$laporan->nama_kelurahan.", ".$laporan->alamat_domisili;
										?>
									</div>
									<form class="form-horizontal" id="add-swab" method="post" action="<?php echo site_url('../home/add_swab'); ?>" enctype="multipart/form-data">
										<!-- form start -->
										<div class="card-body">
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Ambil Swab</label>
												<div class="col-sm-4">
													<input type="date" class="form-control" name="tgl_swab" placeholder="" required>
												</div>
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kirim Labkesda Jepara</label>
												<div class="col-sm-4">
													<input type="date" class="form-control" name="tgl_kirim_faskes" placeholder="" required>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Swab Ke</label>
												<div class="col-sm-4">
													<select name="swab_ke" class="form-control select2" style="width: 100%" required>
														<option selected disabled value="">Pilih</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-md-2 col-xs-10">
													<input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan; ?>">
													<button type="submit" class="btn btn-info btn-block">Kirim</button>
												</div>
												<div class="col-md-2 col-xs-10">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
												</div>
											</div>
										</div>
										<!-- /.card-footer -->
									</form>
								</div>
							</div>
							
						</div>
					</div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
                <script>
					$(document).ready(function(){
						$('.select2').select2();
					});
                </script>