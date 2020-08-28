
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
											} elseif ($kondisi == '2') {
												echo "PASIEN DALAM PENGAWASAN (PDP)";
											} else {
												echo "TERKONFIRMASI COVID-19";
											}
										?>
									</div>
									<div class="card-body">
										<!-- form start -->
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/add'); ?>" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
													<?php
														if($kondisi != "3"){
													?>
													<div class="col-sm-10">
														<input type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" required>
													</div>
													<?php
														} else {
													?>
													<div class="col-sm-4">
														<input type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" required>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kasus Ke</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="kasus" placeholder="Gunakan Angka. Contoh: 1, 2, 28, dll" required>
													</div>
													<?php
														}
													?>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" name="nik" placeholder="NIK" required>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="nama" placeholder="Nama" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" name="umur" placeholder="Umur" required>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-4">
														<select name="jekel" class="form-control select2" style="width: 100%" required>
															<option selected disabled value="">Pilih</option>
															<option value="1">Laki-laki</option>
															<option value="2">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" required data-inputmask="'mask': ['9999-9999-9999']" data-mask>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
													<div class="col-sm-4">
														<select name="wn" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
															<option value="1">WNI</option>
															<option value="2">WNA</option>
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
															<option value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
															<?php
																}
															?>
														</select>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
													<div class="col-sm-4">
														<select name="id_kelurahan" id="id_kel" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Perawatan</label>
													<div class="col-sm-5">
														<select name="rujuk" class="form-control select2" id="rujuk" style="width: 100%" required>
															<option selected disabled>Pilih</option>
															<option value="0">DALAM DAERAH</option>
															<?php
																if($level == "2"){
															?>
															<option value="1">LUAR DAERAH</option>
															<?php
																}
															?>
														</select>
													</div>
													<div class="col-sm-5">
														<select name="rawat" id="rawat" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
														</select>
													</div>
												</div>
												
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label required>
													<div class="col-sm-10">
														<textarea class="form-control" name="alamat_domisili" required></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Riwayat Perjalanan</label>
													<div class="col-sm-10">
														<textarea class="form-control" name="riwayat_jalan" required></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Lain</label>
													<div class="col-sm-4">
														<textarea class="form-control" name="keterangan"></textarea>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Apakah Tenaga Kesehatan?</label>
													<div class="col-sm-4">
														<select name="nakes" class="form-control select2" style="width: 100%" required>
															<option selected disabled value="0">Pilih</option>
															<option value="1">NAKES</option>
															<option value="2">BUKAN NAKES</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Hasil RDT<br><small>(Diisi jika melakukan RDT)</small></label>
													<div class="col-sm-4">
														<select name="rdt" class="form-control select2" style="width: 100%" required>
															<option selected disabled value="0">Pilih</option>
															<option value="1">Reaktif</option>
															<option value="2">Non Reaktif</option>
														</select>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Apakah Dilakukan SWAB?</label>
													<div class="col-sm-4">
														<select name="swab" class="form-control select2" style="width: 100%" required>
															<option selected disabled value="0">Pilih</option>
															<option value="1">SWAB</option>
															<option value="2">TIDAK SWAB</option>
														</select>
													</div>
												</div>
											</div>
											<!-- /.card-body -->
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-2 hidden-xs"></div>
                                                    <div class="col-md-2 col-xs-10">
                                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                                                        <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                                        <input type="hidden" name="created_by" value="<?php echo $created_by; ?>">
                                                        <button type="submit" class="btn btn-info btn-block">Simpan</button>
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
					$(document).ready(function(){
						$('[data-mask]').inputmask();
                        $('.select2').select2();
						$('#id_kec').change(function(){
							var id=$(this).val();
							$.ajax({
								url : "<?php echo site_url("../services/getKelurahan");?>",
								method : "POST",
								data : {id: id},
								async : false,
								dataType : 'json',
								success: function(data){
									var html = '<option selected disabled>Pilih</option>';
									var i;
									for(i=0; i<data.length; i++){
										html += '<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>';
									}
									$('#id_kel').html(html);
									
								}
							});
						});
						$('#rujuk').change(function(){
							var id=$(this).val();
							$.ajax({
								url : "<?php echo site_url("../services/getFaskes");?>",
								method : "POST",
								data : {id: id},
								async : false,
								dataType : 'json',
								success: function(data){
									var html = '<option selected disabled>Pilih</option>';
									var i;
									for(i=0; i<data.length; i++){
										html += '<option value="'+data[i].nama_faskes+'">'+data[i].nama_faskes+'</option>';
									}
									$('#rawat').html(html);
									
								}
							});
						});
					});
                </script>