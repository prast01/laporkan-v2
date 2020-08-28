
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
												<label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal SWAB</label>
												<div class="col-sm-3">
													<input type="date" class="form-control" id="tgl_swab" placeholder="" required>
												</div>
												<label for="inputEmail3" class="col-sm-2 col-form-label">Hasil Swab</label>
												<div class="col-sm-3">
													<select id="hasil_swab" class="form-control select2" style="width: 100%" required>
														<option selected disabled value="">Pilih</option>
														<option value="1">POSITIF</option>
														<option value="2">NEGATIF</option>
													</select>
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
																<th>Tanggal Swab</th>
																<th>Hasil Swab</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody id="body-list"></tbody>
													</table>
												</div>
											</div>
										</div>
										<form class="form-horizontal" id="add-swab" method="post" action="<?php echo site_url('../home/add_swab'); ?>" enctype="multipart/form-data">
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-2 col-xs-10">
														<input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan; ?>">
														<input type="hidden" name="covid" value="<?php echo $laporan->covid; ?>">
														<input type="hidden" name="swab" id="swab" value="[]">
														<input type="hidden" name="remove_swab" id="remove-swab" value="[]">
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
					var dataSwab = [];
    				var removeData = [];
					var data = null;
					$(document).ready(function(){
						$('#btn-add').click(addData);
						$('.select2').select2();
						
						function isEmpty(val){
							return (val === undefined || val == null || val == 'null' || val.length <= 0) ? true : false;
						}

						function addData() {
							let tgl = !isEmpty($('#tgl_swab').val())? $('#tgl_swab').val() : null;
							let hasil = !isEmpty($('#hasil_swab').val())? $('#hasil_swab').val() : null;
							if (hasil == '1') {
								var hsl = "POSITIF";
							} else if(hasil == '2') {
								var hsl = "NEGATIF";
							}
							data = { 'row_num': row_num, 'tgl_swab': tgl, 'id_hasil_swab': hasil, 'hasil_swab': hsl, 'is_form_input': true};
							dataSwab.push(data);
							data = null;
							resetForm();
							row_num++;
							drawTable();
						}

						function isDuplicate(){
							let duplicate = false;
							if(dataSwab){
								dataSwab.forEach(i=>{
									if(i.tgl_swab == data.tgl_swab && i.hasil_swab == data.hasil_swab){
										duplicate = true;
										return false;
									}
								})
							}
							return duplicate;
						}

						function resetForm() {
							$('#tgl_swab').val("");
							$('#hasil_swab').val("").trigger('change');
						}

						function drawTable() {
							let html = '';
							dataSwab.forEach( item => {
								html += '<tr>';
								html += '<td>'+item.tgl_swab+'</td>';
								html += '<td>'+item.hasil_swab+'</td>';
								html += '<td>'+addRemove(item.id_swab,item.row_num,item.is_form_input)+'</td>';
								html += '</tr>';
							});
							$('#body-list').html(html);
							$('.remove').on('click',removeSwab);
						}

						function addRemove(id,row_num,is_from_input){
							return "<button type='button' class='btn btn-danger remove' data-id="+id+" data-num="+row_num+" data-is_form_input="+is_from_input+"><i class='fa fa-trash'></i></button>";
						}
						
						function removeSwab(){
							let id = $(this).data('id');
							let rowNum = $(this).data('num');
							let isFormInput = $(this).data('is_form_input');
							// if(!isFormInput){
							// 	const cek = confirm('Apakah anda ingin menghapus?');
							// 	if(cek){
							// 		// deleteTracing(id,rowNum);
							// 	}
							// }else{
								spliceSwab(rowNum);
							// }
							drawTable();
						}

						function spliceSwab(rowNum){
							let index=0;
							dataSwab.forEach(item=>{
								if(item.row_num == rowNum){
									if(!item.is_from_input) removeData.push(item);
									dataSwab.splice(index,1);
								}
								index++;
							})
						}

						function listSwab(){
							$.get("<?php echo base_url("services/dataSwab/").$laporan->id_laporan; ?>", function(data) {
								var dt = JSON.parse(data);
								console.log(dt);
								if(dt.data.length>0){
									dt.data.forEach(item => {
										item.row_num = row_num;
										item.is_form_input = false;
										dataSwab.push(item);
										row_num++;
									});
									drawTable();
								}
							})
						}
						listSwab();
						
						$('#add-swab').submit(function(event) {
							event.preventDefault();
							event.stopImmediatePropagation();
							if(dataSwab.length>0){
								$('#swab').val(JSON.stringify(dataSwab));
								$('#remove-swab').val(JSON.stringify(removeData));
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