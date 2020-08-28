
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
									<form class="form-horizontal" id="add-swab" method="post" action="<?php echo site_url('../swab/add_swab_selesai'); ?>" enctype="multipart/form-data">
										<!-- form start -->
										<div class="card-body">
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Kirim Labkesda Jepara</label>
												<div class="col-sm-4">
													<input type="date" class="form-control" name="tgl_kirim_faskes" value="<?php echo $swab->tgl_kirim_faskes; ?>" disabled>
												</div>
												<label for="inputEmail3" class="col-sm-2 col-form-label">Swab Ke</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="tgl_kirim_faskes" value="<?php echo $swab->swab_ke; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Lab Tujuan</label>
												<div class="col-sm-4">
													<select name="id_lab" class="form-control select2" style="width: 100%" disabled>
														<option value="">Pilih</option>
														<?php
															foreach ($lab as $key) {
														?>
														<option <?php if($swab->id_lab == $key->id_lab){ echo "selected"; } ?> value="<?php echo $key->id_lab; ?>"><?php echo $key->nama_lab; ?></option>
														<?php
															}
														?>
													</select>
												</div>
												<label for="inputEmail3" class="col-sm-2 col-form-label">Hasil Swab</label>
												<div class="col-sm-4">
													<select name="hasil_swab" class="form-control select2" style="width: 100%" required>
														<option selected disabled value="">Pilih</option>
														<option value="NEGATIF">NEGATIF</option>
														<option value="POSITIF">POSITIF</option>
													</select>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-md-2 col-xs-10">
													<input type="hidden" name="id_swab" value="<?php echo $swab->id_swab; ?>">
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