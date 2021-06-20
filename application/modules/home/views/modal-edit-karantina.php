<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<!-- form start -->
						<form class="form-horizontal" method="post" action="<?php echo site_url('../home/edit_karantina/' . $pasien_karantina->id_pasien_karantina); ?>" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-4">
										<select name="id_laporan" id="id_laporan" class="form-control select2" style="width: 100%" required>
											<option disabled>Pilih</option>
											<?php
											foreach ($covid2 as $key) {
											?>
												<option <?php if ($pasien_karantina->id_laporan == $key->id_laporan) {
															echo "selected";
														} ?> value="<?php echo $key->id_laporan; ?>"><?php echo $key->nama . " || " . $key->alamat; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Rumah Isolasi</label>
									<div class="col-sm-4">
										<select name="id_karantina" id="id_karantina" class="form-control select2" style="width: 100%" required>
											<option disabled>Pilih</option>
											<?php
											foreach ($karantina as $key) {
											?>
												<option <?php if ($pasien_karantina->id_rumah_isolasi == $key->id_rumah_isolasi) {
															echo "selected";
														} ?> value="<?php echo $key->id_rumah_isolasi; ?>"><?php echo $key->nama_rumah_isolasi; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<div class="row">
									<div class="col-2 hidden-xs"></div>
									<div class="col-md-2 col-xs-10">
										<button type="submit" class="btn btn-info btn-block">Simpan</button>
									</div>
									<div class="col-md-2 col-xs-10">
										<a href="<?php echo site_url('../home/hapus_karantina/' . $pasien_karantina->id_pasien_karantina); ?>" class="btn btn-warning btn-block text-white" onclick="return confirm('Hapus?')" title="Hapus Kegiatan"><i class="fa fa-trash"></i> Hapus</a>
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

		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
	// $(function () {
	//     $('.select2').select2();
	// });
	$(document).ready(function() {
		$('.select2').select2();
	});
</script>