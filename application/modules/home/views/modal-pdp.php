
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
											} else {
												echo "PASIEN DALAM PENGAWASAN (PDP)";
											}
											
										?>
									</div>
									<div class="card-body">
										<!-- form start -->
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/sendPDP/'.$laporan->id_laporan); ?>" enctype="multipart/form-data">
											<div class="card-body">
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
													<label for="inputEmail3" class="col-sm-2 col-form-label">Riwayat Perjalanan</label>
													<div class="col-sm-10">
														<textarea class="form-control" name="riwayat_jalan" required><?php echo $laporan->riwayat_jalan; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Lain</label>
													<div class="col-sm-10">
														<textarea class="form-control" name="keterangan"><?php echo $laporan->keterangan; ?></textarea>
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