<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<?php
						if ($laporan->kondisi == '1') {
							echo "ORANG DENGAN PEMANTAUAN (ODP)";
							$kondisi = '1';
						} elseif ($laporan->kondisi == '2' && $laporan->covid == '0') {
							echo "PASIEN DALAM PENGAWASAN (PDP)";
							$kondisi = '2';
						} else {
							echo "TERKONFIRMASI COVID-19";
							$kondisi = '3';
						}

						?>
					</div>
					<div class="card-body">
						<!-- form start -->
						<form class="form-horizontal" method="post" action="<?php echo site_url('../home/edit/' . $laporan->id_laporan); ?>" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
									<?php
									if ($laporan->covid == '0') {
									?>
										<div class="col-sm-10">
											<input type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" value="<?php echo date("Y-m-d", strtotime($laporan->tgl_periksa)); ?>">
										</div>
									<?php
									} else {
									?>
										<div class="col-sm-4">
											<input type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" value="<?php echo date("Y-m-d", strtotime($laporan->tgl_periksa)); ?>">
										</div>
										<label for="inputEmail3" class="col-sm-2 col-form-label">Kasus Ke</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="kasus" placeholder="Gunakan Angka. Contoh: 1, 2, 28, dll" value="<?php echo $laporan->kasus; ?>" required>
										</div>
									<?php
									}
									?>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-4">
										<input type="number" class="form-control" name="nik" placeholder="NIK" value="<?php echo $laporan->nik; ?>">
										<input type="hidden" class="form-control" name="nik2" placeholder="NIK" value="<?php echo $laporan->nik; ?>">
									</div>
									<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $laporan->nama; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
									<div class="col-sm-4">
										<input type="number" class="form-control" name="umur" placeholder="Umur" required value="<?php echo $laporan->umur; ?>">
									</div>
									<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-4">
										<select name="jekel" class="form-control select2" style="width: 100%" required>
											<option <?php if ($laporan->jekel == "") {
														echo "selected";
													} ?> disabled value="">Pilih</option>
											<option <?php if ($laporan->jekel == "1") {
														echo "selected";
													} ?> value="1">Laki-laki</option>
											<option <?php if ($laporan->jekel == "2") {
														echo "selected";
													} ?> value="2">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" required value="<?php echo $laporan->no_telp; ?>" data-inputmask="'mask': ['9999-9999-9999']" data-mask>
									</div>
									<label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
									<div class="col-sm-4">
										<select name="wn" class="form-control select2" style="width: 100%">
											<option <?php if ($laporan->wn == "") {
														echo "selected";
													} ?> disabled>Pilih</option>
											<option <?php if ($laporan->wn == "1") {
														echo "selected";
													} ?> value="1">WNI</option>
											<option <?php if ($laporan->wn == "2") {
														echo "selected";
													} ?> value="2">WNA</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-4">
										<select name="id_kecamatan" id="id_kec" class="form-control select2" style="width: 100%" required>
											<option selected disabled>Pilih</option>
											<?php
											foreach ($kecamatan as $key) {
											?>
												<option <?php if ($laporan->id_kecamatan == $key->id_kecamatan) {
															echo "selected";
														} ?> value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
									<div class="col-sm-4">
										<select name="id_kelurahan" id="id_kel" class="form-control select2" style="width: 100%" required>
											<option selected disabled>Pilih</option>
											<?php
											foreach ($kelurahan as $key) {
											?>
												<option <?php if ($laporan->id_kelurahan == $key->id_kelurahan) {
															echo "selected";
														} ?> value="<?php echo $key->id_kelurahan; ?>"><?php echo $key->nama_kelurahan; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Perawatan</label>
									<div class="col-sm-5">
										<select name="rujuk" class="form-control select2" id="rujuk" style="width: 100%" required>
											<option selected disabled>Pilih</option>
											<option <?php if ($laporan->rujuk == "0") {
														echo "selected";
													} ?> value="0">DALAM DAERAH</option>
											<option <?php if ($laporan->rujuk == "1") {
														echo "selected";
													} ?> value="1">LUAR DAERAH</option>
										</select>
									</div>
									<div class="col-sm-5">
										<select name="rawat" id="rawat" class="form-control select2" style="width: 100%" required>
											<option selected disabled>Pilih</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="alamat_domisili"><?php echo $laporan->alamat_domisili; ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Riwayat Perjalanan</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="riwayat_jalan" required><?php echo $laporan->riwayat_jalan; ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Lain</label>
									<div class="col-sm-4">
										<textarea class="form-control" name="keterangan"><?php echo $laporan->keterangan; ?></textarea>
									</div>
									<label for="inputEmail3" class="col-sm-2 col-form-label">Apakah Tenaga Kesehatan?</label>
									<div class="col-sm-4">
										<select name="nakes" class="form-control select2" style="width: 100%" required>
											<option <?php if ($laporan->nakes == "") {
														echo "selected";
													} ?> value="" disabled>Pilih</option>
											<option <?php if ($laporan->nakes == "NAKES") {
														echo "selected";
													} ?> value="NAKES">NAKES</option>
											<option <?php if ($laporan->nakes == "0") {
														echo "selected";
													} ?> value="0">BUKAN NAKES</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Penyakit Penyerta</label>
									<div class="col-sm-10">
										<select name="penyakit" id="penyakit" class="form-control select2" style="width: 100%" required>
											<?php if ($laporan->penyakit != '') { ?>
												<option value="<?= $penyakit->kdiag; ?>"><?= $penyakit->diag . " (<b>" . $penyakit->kdiag . "</b>)"; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<div class="row">
									<div class="col-2 hidden-xs"></div>
									<div class="col-md-2 col-xs-10">
										<input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
										<button type="submit" class="btn btn-info btn-block">Simpan</button>
									</div>
									<div class="col-md-2 col-xs-10">
										<a href="<?php echo site_url('../home/hapus/' . $laporan->id_laporan . '/' . $kondisi); ?>" class="btn btn-warning btn-block text-white" onclick="return confirm('Hapus?')" title="Hapus Kegiatan"><i class="fa fa-trash"></i> Hapus</a>
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
		$('[data-mask]').inputmask();
		$('.select2').select2();
		$('#id_kec').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url("../services/getKelurahan"); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '<option selected disabled>Pilih</option>';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].id_kelurahan + '">' + data[i].nama_kelurahan + '</option>';
					}
					$('#id_kel').html(html);

				}
			});
		});
		var rujuk = "<?php echo $laporan->rujuk; ?>";
		<?php
		if ($laporan->rujuk == "0") {
		?>
			var rawat = "<?php echo $laporan->rawat; ?>";
		<?php
		} else {
		?>
			var rawat = "<?php echo $laporan->rs; ?>";
		<?php
		}
		?>
		$.ajax({
			url: "<?php echo site_url("../services/getFaskes2"); ?>",
			method: "POST",
			data: {
				id: rujuk,
				rawat: rawat
			},
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '<option disabled>Pilih</option>';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<option ' + data[i].sel + ' value="' + data[i].nama_faskes + '">' + data[i].nama_faskes + '</option>';
				}
				$('#rawat').html(html);

			}
		});
		$('#rujuk').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url("../services/getFaskes"); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '<option selected disabled>Pilih</option>';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].nama_faskes + '">' + data[i].nama_faskes + '</option>';
					}
					$('#rawat').html(html);

				}
			});
		});

		$('#penyakit').select2({
			ajax: {
				url: "<?php echo base_url('services/get_penyakit') ?>",
				dataType: 'json',
				delay: 500,
				data: function(params) {
					return {
						search: params.term
					};
				},
				processResults: function(data) {
					return {
						results: $.map(data, function(item) {
							return {
								text: item.diag + ' (<b>' + item.kdiag + '</b>)',
								id: item.kdiag
							}
						})
					}
				},
				cache: true
			},
			placeholder: 'Masukkan Nama atau Kode ICD10',
			minimumInputLength: 3,
			escapeMarkup: function(markup) {
				return markup;
			},
			templateResult: function(data) {
				return data.text;
			},
			templateSelection: function(data) {
				return data.text;
			}
		});

	});
</script>