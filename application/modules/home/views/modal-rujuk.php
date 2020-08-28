
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<!-- <div class="card-header">
										<?php
											if ($laporan->kondisi == '1') {
												echo "ORANG DENGAN PEMANTAUAN (ODP)";
											} else {
												echo "PASIEN DALAM PENGAWASAN (PDP)";
											}
											
										?>
									</div> -->
									<div class="card-body">
										<!-- form start -->
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/rujuk/'.$laporan->id_laporan); ?>" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
													<div class="col-sm-10">
														<input disabled type="date" class="form-control" name="tgl_periksa" placeholder="Tanggal Pemeriksaan" value="<?php echo date("Y-m-d", strtotime($laporan->tgl_periksa)); ?>">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
													<div class="col-sm-4">
														<input disabled type="number" class="form-control" name="nik" placeholder="NIK" value="<?php echo $laporan->nik; ?>">
														<input type="hidden" class="form-control" name="nik2" placeholder="NIK" value="<?php echo $laporan->nik; ?>">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-4">
														<input disabled type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $laporan->nama; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
													<div class="col-sm-4">
														<input disabled type="number" class="form-control" name="umur" placeholder="Umur" required value="<?php echo $laporan->umur; ?>">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-4">
														<select disabled name="jekel" class="form-control select2" style="width: 100%" required>
															<option <?php if($laporan->jekel == ""){ echo "selected"; } ?> disabled value="">Pilih</option>
															<option <?php if($laporan->jekel == "1"){ echo "selected"; } ?> value="1">Laki-laki</option>
															<option <?php if($laporan->jekel == "2"){ echo "selected"; } ?> value="2">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
													<div class="col-sm-4">
														<input disabled type="text" class="form-control" name="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" required value="<?php echo $laporan->no_telp; ?>" data-inputmask="'mask': ['9999-9999-9999']" data-mask>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
													<div class="col-sm-4">
														<select disabled name="wn" class="form-control select2" style="width: 100%">
															<option <?php if($laporan->wn == ""){ echo "selected"; } ?> disabled>Pilih</option>
															<option <?php if($laporan->wn == "1"){ echo "selected"; } ?> value="1">WNI</option>
															<option <?php if($laporan->wn == "2"){ echo "selected"; } ?> value="2">WNA</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
													<div class="col-sm-4">
														<select disabled name="id_kecamatan" id="id_kec" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
															<?php
																foreach ($kecamatan as $key) {
															?>
															<option <?php if($laporan->id_kecamatan == $key->id_kecamatan){ echo "selected"; } ?> value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
															<?php
																}
															?>
														</select>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
													<div class="col-sm-4">
														<select disabled name="id_kelurahan" id="id_kel" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
															<?php
																foreach ($kelurahan as $key) {
															?>
															<option <?php if($laporan->id_kelurahan == $key->id_kelurahan){ echo "selected"; } ?> value="<?php echo $key->id_kelurahan; ?>"><?php echo $key->nama_kelurahan; ?></option>
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
															<option <?php if($laporan->rujuk == "0"){ echo "selected"; } ?> value="0">DALAM DAERAH</option>
															<option <?php if($laporan->rujuk == "1"){ echo "selected"; } ?> value="1">LUAR DAERAH</option>
														</select>
													</div>
													<div class="col-sm-5">
														<select name="rawat" id="rawat" class="form-control select2" style="width: 100%" required>
															<option selected disabled>Pilih</option>
														</select>
													</div>
													<!-- <div class="col-sm-5">
														<select name="kota" id="kota" class="select2 form-control" style="width: 100%">
															<option disabled selected>Pilih Kota</option>
															<?php
																foreach ($kota as $key) {
															?>
															<option <?php if($laporan->kota == $key->kota){ echo "selected"; } ?> value="<?php echo $key->kota; ?>"><?php echo $key->kota; ?></option>
															<?php
																}
															?>
														</select>
													</div>
													<div class="col-sm-5">
														<select name="rs" id="rs" class="select2 form-control" style="width: 100%">
															<option disabled selected>Pilih</option>
															<?php
																// if($laporan->rujuk == "1"){
																	foreach ($rs as $key) {
															?>
															<option <?php if($laporan->rs == $key->nama_faskes_luar){ echo "selected"; } ?> value="<?php echo $key->nama_faskes_luar; ?>"><?php echo $key->nama_faskes_luar; ?></option>
															<?php
																	}
																// }
															?>
														</select>
													</div> -->
												</div>
											</div>
											<!-- /.card-body -->
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-2 hidden-xs"></div>
                                                    <div class="col-md-2 col-xs-10">
                                                        <button type="submit" class="btn btn-info btn-block">Simpan</button>
														<input type="hidden" name="rwt" value="<?php echo $laporan->rawat; ?>">
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
						$('#kota').change(function(){
							var id=$(this).val();
							$.ajax({
								url : "<?php echo site_url("../services/getFaskes3");?>",
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
									$('#rs').html(html);
									
								}
							});
						});
						var rujuk="<?php echo $laporan->rujuk; ?>";
						<?php
							if($laporan->rujuk == "0"){
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
							url : "<?php echo site_url("../services/getFaskes2");?>",
							method : "POST",
							data : {id: rujuk, rawat: rawat},
							async : false,
							dataType : 'json',
							success: function(data){
								var html = '<option selected disabled>Pilih</option>';
								var i;
								for(i=0; i<data.length; i++){
									html += '<option '+data[i].sel+' value="'+data[i].nama_faskes+'">'+data[i].nama_faskes+'</option>';
								}
								$('#rawat').html(html);
								
							}
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