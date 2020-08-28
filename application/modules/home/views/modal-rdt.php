
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<?php
											echo strtoupper($laporan->nama)."(".$laporan->umur." th) - ";
											echo $laporan->nama_kelurahan.", ".$laporan->nama_kecamatan;
										?>
									</div>
									<div class="card-body">
										<!-- form start -->
										<div class="card-body">
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Rapid Test</label>
												<div class="col-sm-3">
													<input type="date" class="form-control" id="tgl_rdt" placeholder="" required>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Hasil Rapid Test</label>
												<div class="col-sm-3">
													<select id="hasil_rdt" class="form-control select2" style="width: 100%" required>
														<option selected disabled value="">Pilih</option>
														<option value="1">Reaktif</option>
														<option value="2">Non Reaktif</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi Rapid Test</label>
												<div class="col-sm-3">
													<input type="text" class="form-control" id="lokasi_rdt" placeholder="Contoh: Mall,Pasar,dll" required>
												</div>
												<div class="col-md-2 col-xs-10">
													<button type="button" class="btn btn-success" id="btn-add">Pilih</button>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12 table-responsive">
													<table class="table table-hover table-bordered" width="100%">
														<thead>
															<tr>
																<th>Tanggal RDT</th>
																<th>Hasil RDT</th>
																<th>Lokasi RDT</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody id="body-list"></tbody>
													</table>
												</div>
											</div>
										</div>
										<form class="form-horizontal" id="add-rdt" method="post" action="<?php echo site_url('../home/add_rdt'); ?>" enctype="multipart/form-data">
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-2 col-xs-10">
														<input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan; ?>">
														<input type="hidden" name="covid" value="<?php echo $laporan->covid; ?>">
														<input type="hidden" name="rdt" id="rdt" value="[]">
														<input type="hidden" name="lokasi" id="lokasi" value="[]">
														<input type="hidden" name="remove_rdt" id="remove-rdt" value="[]">
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
					var row_num = 1;
					var dataRDT = [];
    				var removeData = [];
					var data = null;
					$(document).ready(function(){
						$('#btn-add').click(addData);
						$('.select2').select2();
						
						function isEmpty(val){
							return (val === undefined || val == null || val == 'null' || val.length <= 0) ? true : false;
						}

						function addData() {
							let tgl = !isEmpty($('#tgl_rdt').val())? $('#tgl_rdt').val() : null;
							let hasil = !isEmpty($('#hasil_rdt').val())? $('#hasil_rdt').val() : null;
							if (hasil == '1') {
								var hsl = "REAKTIF";
							} else if(hasil == '2') {
								var hsl = "NON REAKTIF";
							}
							let lokasi = !isEmpty($('#lokasi_rdt').val())? $('#lokasi_rdt').val() : null;
							data = { 'row_num': row_num, 'tgl_rdt': tgl, 'id_hasil_rdt': hasil, 'hasil_rdt': hsl, 'lokasi_rdt': lokasi, 'is_form_input': true};
							dataRDT.push(data);
							data = null;
							resetForm();
							row_num++;
							drawTable();
						}

						function isDuplicate(){
							let duplicate = false;
							if(dataRDT){
								dataRDT.forEach(i=>{
									if(i.tgl_rdt == data.tgl_rdt && i.hasil_rdt == data.hasil_rdt){
										duplicate = true;
										return false;
									}
								})
							}
							return duplicate;
						}

						function resetForm() {
							$('#tgl_rdt').val("");
							$('#hasil_rdt').val("").trigger('change');
						}

						function drawTable() {
							let html = '';
							dataRDT.forEach( item => {
								html += '<tr>';
								html += '<td>'+item.tgl_rdt+'</td>';
								html += '<td>'+item.hasil_rdt+'</td>';
								html += '<td>'+item.lokasi_rdt+'</td>';
								html += '<td>'+addRemove(item.id_rdt,item.row_num,item.is_form_input)+'</td>';
								html += '</tr>';
							});
							$('#body-list').html(html);
							$('.remove').on('click',removeRDT);
						}

						function addRemove(id,row_num,is_from_input){
							return "<button type='button' class='btn btn-danger remove' data-id="+id+" data-num="+row_num+" data-is_form_input="+is_from_input+"><i class='fa fa-trash'></i></button>";
						}
						
						function removeRDT(){
							let id = $(this).data('id');
							let rowNum = $(this).data('num');
							let isFormInput = $(this).data('is_form_input');
							// if(!isFormInput){
							// 	const cek = confirm('Apakah anda ingin menghapus?');
							// 	if(cek){
							// 		// deleteTracing(id,rowNum);
							// 	}
							// }else{
								spliceRDT(rowNum);
							// }
							drawTable();
						}

						function spliceRDT(rowNum){
							let index=0;
							dataRDT.forEach(item=>{
								if(item.row_num == rowNum){
									if(!item.is_from_input) removeData.push(item);
									dataRDT.splice(index,1);
								}
								index++;
							})
						}

						function listRDT(){
							$.get("<?php echo base_url("services/dataRDT/").$laporan->id_laporan; ?>", function(data) {
								var dt = JSON.parse(data);
								console.log(dt);
								if(dt.data.length>0){
									dt.data.forEach(item => {
										item.row_num = row_num;
										item.is_form_input = false;
										dataRDT.push(item);
										row_num++;
									});
									drawTable();
								}
							})
						}
						listRDT();
						
						$('#add-rdt').submit(function(event) {
							event.preventDefault();
							event.stopImmediatePropagation();
							if(dataRDT.length>0){
								$('#rdt').val(JSON.stringify(dataRDT));
								$('#remove-rdt').val(JSON.stringify(removeData));
								let form = $(this);
								postdata(form);
							}else{
								alert("Data Masih Kosong");
							}
						})
						
						//Insert data
						function postdata(form){
							var formData = new FormData($('form')[0]);

							$.ajax({
								type: form.attr('method'),
								url: form.attr('action'),
								data: formData,
								contentType: false,
								processData: false,
								success:function(data) {
									alert("Berhasil Simpan Data");
									$("#modalku").modal('hide');
								},
								error:function(data) {
									alert("Gagal Simpan Data");
								}
							})
						}

					});
                </script>