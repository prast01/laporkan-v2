
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<!-- form start -->
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/edit_faskes/'.$faskes->id_faskes_luar); ?>" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Faskes</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="nama_faskes" placeholder="Nama Faskes" required value="<?php echo $faskes->nama_faskes_luar; ?>">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kota</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="kota" placeholder="Kota" required value="<?php echo $faskes->kota; ?>">
													</div>
												</div>
											</div>
											<!-- /.card-body -->
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-info btn-block">Simpan</button>
                                                    </div>
                                                    <div class="col-md-2 col-xs-10">
                                                        <a href="<?php echo site_url('../home/del_faskes/'.$faskes->id_faskes_luar); ?>" class="btn btn-warning btn-block" onclick="return confirm('Yakin Hapus?');">Hapus</a>
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