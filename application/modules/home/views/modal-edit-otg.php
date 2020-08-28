
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<!-- form start -->
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/edit_otg/'.$otg->id_laporan); ?>" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" name="nik" placeholder="NIK" value="<?php echo $otg->nik; ?>">
														<input type="hidden" class="form-control" name="nik2" placeholder="NIK" value="<?php echo $otg->nik; ?>">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $otg->nama; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" name="umur" placeholder="Umur" required value="<?php echo $otg->umur; ?>">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-4">
														<select name="jekel" class="form-control select2" style="width: 100%" required>
															<option <?php if($otg->jekel == ""){ echo "selected"; } ?> disabled value="">Pilih</option>
															<option <?php if($otg->jekel == "1"){ echo "selected"; } ?> value="1">Laki-laki</option>
															<option <?php if($otg->jekel == "2"){ echo "selected"; } ?> value="2">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" required value="<?php echo $otg->no_telp; ?>" data-inputmask="'mask': ['9999-9999-9999']" data-mask>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
													<div class="col-sm-4">
														<select name="wn" class="form-control select2" style="width: 100%">
															<option <?php if($otg->wn == ""){ echo "selected"; } ?> disabled>Pilih</option>
															<option <?php if($otg->wn == "1"){ echo "selected"; } ?> value="1">WNI</option>
															<option <?php if($otg->wn == "2"){ echo "selected"; } ?> value="2">WNA</option>
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
															<option <?php if($otg->id_kecamatan == $key->id_kecamatan){ echo "selected"; } ?> value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
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
															<option <?php if($otg->id_kelurahan == $key->id_kelurahan){ echo "selected"; } ?> value="<?php echo $key->id_kelurahan; ?>"><?php echo $key->nama_kelurahan; ?></option>
															<?php
																}
															?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
													<div class="col-sm-10">
														<textarea class="form-control" name="alamat_domisili"><?php echo $otg->alamat_domisili; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Hasil RDT<br><small>(Diisi jika melakukan RDT)</small></label>
													<div class="col-sm-4">
														<select name="rdt" class="form-control select2" style="width: 100%">
															<option <?php if($otg->rdt == "0"){ echo "selected"; } ?> value="0" disabled>Pilih</option>
															<option <?php if($otg->rdt == "1"){ echo "selected"; } ?> value="1">Raktif</option>
															<option <?php if($otg->rdt == "2"){ echo "selected"; } ?> value="2">Non Raktif</option>
														</select>
													</div> -->
													<!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Dilakukan SWAB?</label>
													<div class="col-sm-4">
														<select name="swab" class="form-control select2" style="width: 100%">
															<option <?php if($otg->swab == "0"){ echo "selected"; } ?> value="0" disabled>Pilih</option>
															<option <?php if($otg->swab == "1"){ echo "selected"; } ?> value="1">SWAB</option>
															<option <?php if($otg->swab == "2"){ echo "selected"; } ?> value="2">TIDAK SWAB</option>
														</select>
													</div> -->
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Lain</label>
													<div class="col-sm-4">
														<textarea class="form-control" name="keterangan"><?php echo $otg->keterangan; ?></textarea>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Apakah Tenaga Kesehatan?</label>
													<div class="col-sm-4">
														<select name="nakes" class="form-control select2" style="width: 100%" required>
															<option <?php if($otg->nakes == ""){ echo "selected"; } ?> value="" disabled>Pilih</option>
															<option <?php if($otg->nakes == "NAKES"){ echo "selected"; } ?> value="NAKES">NAKES</option>
															<option <?php if($otg->nakes == "0"){ echo "selected"; } ?> value="0">BUKAN NAKES</option>
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
														<a href="<?php echo site_url('../home/hapus_otg/'.$otg->id_laporan); ?>" class="btn btn-warning btn-block text-white" onclick="return confirm('Hapus?')" title="Hapus Kegiatan"><i class="fa fa-trash"></i> Hapus</a>
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
					});
                </script>