
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
												<div class="col-sm-4">
													<select id="id_kec" class="form-control select2" style="width: 100%">
														<option selected disabled value="">Pilih Kecamatan</option>
														<?php
															foreach ($kecamatan as $key) {
														?>
														<option value="<?php echo $key->id_kecamatan; ?>"><?php echo $key->nama_kecamatan; ?></option>
														<?php
															}
														?>
													</select>
												</div>
												<div class="col-sm-6">
													<select name="id_name" id="id_name" class="form-control" style="width: 100%">
													</select>
												</div>
												<div class="col-md-2">
													<button type="button" class="btn btn-success" id="btn-add">Pilih</button>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h7 class="text-muted">Atau,Klik tambah OTG Baru jika tidak menemukan nama individu yang di maksud</h7>
												</div>
												<div class="col-md-12">
													<button class="btn btn-success" id="btn-show-form-otg">TAMBAH OTG BARU <i class="fa fa-plus"></i></button>
												</div>
											</div>
											<hr>
											<?php
												$hub = str_replace('"',"&quot;",json_encode($hubungan));
												$jk = str_replace('"',"&quot;",json_encode($jenis_kontak));
											?>
											<input type="hidden" id="list-relationship-type" value="<?php echo $hub; ?>">
											<input type="hidden" id="list-contact-type" value="<?php echo $jk; ?>">
											
											<div class="form-otg" style="display: none;">
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" id="nik" placeholder="NIK">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="nama" placeholder="Nama">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
													<div class="col-sm-4">
														<input type="number" class="form-control" id="umur" placeholder="Umur">
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-4">
														<select id="jekel" class="form-control select2" style="width: 100%">
															<option selected disabled value="">Pilih</option>
															<option value="1">Laki-laki</option>
															<option value="2">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">No. Telp</label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="no_telp" placeholder="Contoh : 08xx-xxxx-xxxx" data-inputmask="'mask': ['9999-9999-9999']" data-mask>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Warga Negara</label>
													<div class="col-sm-4">
														<select id="wn" class="form-control select2" style="width: 100%">
															<option selected disabled value="">Pilih</option>
															<option value="1">WNI</option>
															<option value="2">WNA</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
													<div class="col-sm-4">
														<select name="id_kecamatan" id="id_kec2" class="form-control select2" style="width: 100%">
															<option selected disabled value="">Pilih</option>
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
														<select name="id_kelurahan" id="id_kel" class="form-control select2" style="width: 100%">
															<option selected disabled value="">Pilih</option>
														</select>
													</div>
												</div>
												
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Detail Alamat</label>
													<div class="col-sm-10">
														<textarea class="form-control" id="alamat_domisili"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Hubungan</label>
													<div class="col-sm-4">
														<select name="hubungan" class="form-control select2" id="hubungan" style="width: 100%">
															<option selected disabled value="">Pilih</option>
															<?php
																foreach ($hubungan as $key) {
															?>
															<option value="<?php echo $key->id_hubungan; ?>"><?php echo $key->nama_hubungan; ?></option>
															<?php
																}
															?>
														</select>
													</div>
													<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kontak</label>
													<div class="col-sm-4">
														<select name="jenis_kontak" id="jenis_kontak" class="form-control select2" style="width: 100%">
															<option selected disabled value="">Pilih</option>
															<?php
																foreach ($jenis_kontak as $key) {
															?>
															<option value="<?php echo $key->id_jenis_kontak; ?>"><?php echo $key->jenis_kontak; ?></option>
															<?php
																}
															?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-12">
														<button class="btn btn-primary" id="btn-add-otg"><i class="fa fa-save"></i> Simpan</button>
													</div>
												</div>
											</div>
											<hr class="form-otg" style="display: none;">

											<div class="row">
												<div class="col-md-12 table-responsive">
													<table class="table table-hover table-bordered" width="100%">
														<thead>
															<tr>
																<th>Nama</th>
																<th>Status</th>
																<th>Kecamatan</th>
																<th>Kelurahan</th>
																<th>Alamat</th>
																<th>Nomer Telepon</th>
																<th>Umur</th>
																<th>Jenis Kelamin</th>
																<th>Hubungan</th>
																<th>Jenis Kontak</th>
																<th>Aksi</th>
															</tr>
														</thead>
														<tbody id="body-list"></tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- /.card-body -->
										<form class="form-horizontal" id="add-tracing" method="post" action="<?php echo site_url('../home/tracing'); ?>" enctype="multipart/form-data">
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-2 col-xs-10">
														<input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan; ?>">
														<input type="hidden" name="tracing" id="tracing" value="[]">
														<input type="hidden" name="remove_tracing" id="remove-tracing" value="[]">
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
					var dataTracing = [];
    				var removeDataTracing = [];
					var dataSearch = null;
					var dataOTG = null;
					var cekOTG = null;
					var relationshipType = '';
					var contactType = '';
					$(document).ready(function(){
						$('#btn-add').click(addDataTracing);
						$('#btn-add-otg').click(addDataOtg);
        				$('#btn-show-form-otg').click(showFormOTG)
						relationshipType = JSON.parse($('#list-relationship-type').val());
						contactType = JSON.parse($('#list-contact-type').val());
						$('[data-mask]').inputmask();
                        $('.select2').select2();

						$('#id_name').select2({
							ajax : {
								url : "<?php echo base_url('services/get_pasien') ?>",
								dataType: 'json',
								delay : 500,
								data : function(params) {
									return {
										search: params.term,
										id_kecamatan : $('#id_kec').val()
									};
								},
								processResults: function (data) {
									return {
										results: $.map(data, function (item) {
											return {
												text: item.nama + ' (<b>' + item.status + '</b>)',
												alamat: item.nama + ' (<b>' + item.status + '</b>)<br>Alamat : '+item.nama_kelurahan+' - '+item.nama_kecamatan,
												id: JSON.stringify(item)
											}
										})
									}
								},
								cache : true
							},
							placeholder: 'Masukkan Nama Pasien COVID-19/PDP/ODP Riwayat Kontak',
							minimumInputLength: 1,
							escapeMarkup: function (markup) {
								return markup;
							},
							templateResult: function (data) {
								return data.alamat;
							},
							templateSelection: function (data) {
								return data.text;
							}
						});

						$('#id_kec2').change(function(){
							var id=$(this).val();
							$.ajax({
								url : "<?php echo site_url("../services/getKelurahan");?>",
								method : "POST",
								data : {id: id},
								async : false,
								dataType : 'json',
								success: function(data){
									var html = '<option selected disabled value="">Pilih</option>';
									var i;
									for(i=0; i<data.length; i++){
										html += '<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>';
									}
									$('#id_kel').html(html);
									
								}
							});
						});

						async function addDataOtg() {
							let kec = $('#id_kec2').select2('data')[0];
							let kel = $('#id_kel').select2('data')[0];
							let hub = $('#hubungan').select2('data')[0];
							let jk = $('#jenis_kontak').select2('data')[0];
							let jenis_kel = $('#jekel').select2('data')[0];
							let wn = $('#wn').select2('data')[0];

							if ($('#jekel').val() == '1') {
								var jekel = "L";
							} else {
								var jekel = "P";
							}
							dataOTG = {
								id              		: null,
								nik                     : $('#nik').val(),
								nama                    : $('#nama').val().toUpperCase(),
								umur                    : $('#umur').val(),
								id_jekel                : (jenis_kel != "")?jenis_kel.id:null,
								jekel                   : jekel,
								wn                      : (wn != "")?wn.id:null,
								no_telp                 : $('#no_telp').val(),
								id_kecamatan            : (kec != "")?kec.id:null,
								nama_kecamatan          : (kec != "")?kec.text:null,
								id_kelurahan            : (kel != "")?kel.id:null,
								nama_kelurahan          : (kel != "")?kel.text:null,
								alamat_domisili         : $('#alamat_domisili').val(),
								tipe                    : '4',
								status                  : 'OTG',
								id_hubungan     		: (hub != "")?hub.id:null,
								nama_hubungan  			: (hub != "")?hub.text:null,
								id_jenis_kontak         : (jk != "")?jk.id:null,
								jenis_kontak		    : (jk != "")?jk.text:null
							}
							let personExist = await isPersonExist();
							if (validasiOTG()) {
								if (!isDuplicateOtg() && personExist.is_exist == 0) {
									dataOTG.row_num = row_num;
									dataOTG.is_form_input = true;
									dataTracing.push(dataOTG);
									dataOTG = null;
									row_num++;
									resetFormOTG();
									drawTableTracing();
								}
							}
						}

						function isEmpty(val){
							return (val === undefined || val == null || val == 'null' || val.length <= 0) ? true : false;
						}

						function validasiOTG(){
							let message = null;
							if(isEmpty(dataOTG.id_jenis_kontak)) message = 'Jenis Kontak';
							if(isEmpty(dataOTG.id_hubungan)) message = 'Hubungan';
							if(isEmpty(dataOTG.id_jekel)) message = 'Jenis Kelamin';
							if(isEmpty(dataOTG.alamat_domisili)) message = 'Detail Alamat';
							if(isEmpty(dataOTG.id_kelurahan)) message = 'Kelurahan';
							if(isEmpty(dataOTG.id_kecamatan)) message = 'Kecamatan';
							if(isEmpty(dataOTG.umur)) message = 'Umur';
							if(isEmpty(dataOTG.nama)) message = 'Nama';
							if(isEmpty(dataOTG.nik)) message = 'NIK';
							if(isEmpty(dataOTG.wn)) message = 'Warga Negara';
							if(isEmpty(dataOTG.no_telp)) message = 'No Telepon';
							if(!isEmpty(message)){
								alert(message+" Tidak Boleh Kosong");
								return false
							}else{
								return true
							}
						}

						function isDuplicateOtg(){
							var duplicate = false;
							if(dataTracing){
								dataTracing.forEach(i=>{
									if(i.nik == dataOTG.nik && i.status == dataOTG.status){
										duplicate = true;
										return false;
									}
								});
								
							}

							return duplicate;
						}

						async function isPersonExist() {
							var nik = dataOTG.nik;
							if (isEmpty(nik)) return {"is_exist": 0};
							let isExist = null;
							return await $.ajax({
								type: "GET",
								url: "<?php echo base_url('services/cekOtg'); ?>",
								data: { 'nik' : dataOTG.nik },
								success:function(data) {
									console.log(data.is_exist);
									// var dt = JSON.parse(data);
									// if (data.is_exist == 1) {
									// 	alert("Duplikat Data OTG atau cek by Name di Form Pencarian");
									// }
								}
							});
						}
						function resetFormOTG(){
							$('#nik').val('');
							$('#nama').val('');
							$('#umur').val('');
							$('#jekel').val("").trigger('change');
							$('#wn').val("").trigger('change');
							$('#no_telp').val('');
							$('#id_kec2').val("").trigger('change');
							var html = '<option selected disabled value="">Pilih</option>';
							$('#id_kel').html(html);
							$('#alamat_domisili').val('');
							$('#hubungan').val("").trigger('change');
							$('#jenis_kontak').val("").trigger('change');
						}

						function showFormOTG(){
							$('.form-otg').toggle()
						}        
						
						function addDataTracing() {
							let searchValue = $('#id_name').val();
							dataSearch = searchValue?JSON.parse(searchValue):null;
							if (dataSearch != null) {
								if(!isDuplicateTracing()){
									dataSearch.row_num = row_num;
									dataTracing.push(dataSearch);
									dataSearch = null;
									resetSearchForm();
									row_num++;
								}else{
									alert('Data Sudah Di Pilih.');
								}
							}
							drawTableTracing();
						}

						function isDuplicateTracing(){
							let duplicate = false;
							if(dataTracing){
								dataTracing.forEach(i=>{
									if(i.id == dataSearch.id && i.status == dataSearch.status){
										duplicate = true;
										return false;
									}
								})
							}
							return duplicate;
						}

						function drawTableTracing() {
							let html = '';
							dataTracing.forEach( item => {
								html += '<tr>';
								html += '<td>'+item.nama;
								html += '<input type="hidden" name="id[]" value="'+item.id_laporan+'">';
								html += '<input type="hidden" name="status[]" value="'+item.tipe+'">';
								html += '</td>';
								html += '<td>'+item.status+'</td>';
								html += '<td>'+item.nama_kecamatan+'</td>';
								html += '<td>'+item.nama_kelurahan+'</td>';
								html += '<td>'+item.alamat_domisili+'</td>';
								html += '<td>'+item.no_telp+'</td>';
								html += '<td>'+item.umur+'</td>';
								html += '<td>'+item.jekel+'</td>';
								html += '<td>'+addSelectRelationship(item.row_num,item.id_hubungan)+'</td>';
								html += '<td>'+addSelectContactType(item.row_num,item.id_jenis_kontak)+'</td>';
								html += '<td>'+addRemoveTracing(item.person_contact_id,item.row_num,item.is_form_input)+'</td>';
								html += '</tr>';
							});
							$('#body-list').html(html);
							$('.relationship-type').on('change',changeSelectRelationship);
							$('.contact-type').on('change',changeSelectContact);
							$('.remove').on('click',removeTracing);
						}

						function resetSearchForm() {
							$('#id_name').val(null).trigger('change');
							$('#id_kec').val("").trigger('change');
						}

						function addSelectRelationship(row_num,relationship_type_id){
							let result = '<select class="form-control relationship-type select2" name="hubungan[]" data-num='+row_num+'>';
							result += '<option selected disabled>Pilih Status</option>';
							relationshipType.forEach(item => {
								if(item.id_hubungan == relationship_type_id)
									result += "<option value="+item.id_hubungan+" selected>"+item.nama_hubungan+"</option>";
								else
									result += "<option value="+item.id_hubungan+">"+item.nama_hubungan+"</option>";
							});
							result += '</select>';

							return result;
						}

						function addSelectContactType(row_num,contact_type_id){
							let result = '<select class="form-control contact-type" name="kontak[]" data-num='+row_num+'>';
							result += '<option selected disabled>Pilih Kontak</option>';
							contactType.forEach(item => {
								if(item.id_jenis_kontak == contact_type_id)
									result += "<option value="+item.id_jenis_kontak+" selected>"+item.jenis_kontak+"</option>";
								else
									result += "<option value="+item.id_jenis_kontak+">"+item.jenis_kontak+"</option>";
							});
							result += '</select>';

							return result;
						}

						function addRemoveTracing(id,row_num,is_from_input){
							return "<button type='button' class='btn btn-danger remove' data-id="+id+" data-num="+row_num+" data-is_form_input="+is_from_input+"><i class='fa fa-trash'></i></button>";
						}
						
						function changeSelectRelationship(){
							let id = $(this).data('num');
							let value = $(this).val();
							dataTracing.forEach(item=>{
								if(item.row_num == id){
									item.id_hubungan = value;
									return false;
								}
							})
						}
						
						function changeSelectContact(){
							let id = $(this).data('num');
							let value = $(this).val();
							dataTracing.forEach(item=>{
								if(item.row_num == id){
									item.id_jenis_kontak = value;
									return false;
								}
							})
						}

						function removeTracing(){
							let id = $(this).data('id');
							let rowNum = $(this).data('num');
							let isFormInput = $(this).data('is_form_input');
							if(!isFormInput){
								const cek = confirm('Apakah anda ingin menghapus?');
								if(cek){
									// deleteTracing(id,rowNum);
								}
							}else{
								spliceTracing(rowNum);
							}
							drawTableTracing();
						}

						function spliceTracing(rowNum){
							let index=0;
							dataTracing.forEach(item=>{
								if(item.row_num == rowNum){
									if(!item.is_from_input) removeDataTracing.push(item);
									dataTracing.splice(index,1);
								}
								index++;
							})
						}

						
						$('#add-tracing').submit(function(event) {
							event.preventDefault();
							event.stopImmediatePropagation();
							if(dataTracing.length>0){
								if(validasiTracing()){
									$('#tracing').val(JSON.stringify(dataTracing));
									$('#remove-tracing').val(JSON.stringify(removeDataTracing));
									let form = $(this);
									postdata(form);
									// console.log(JSON.stringify(dataTracing));
									// console.log(JSON.stringify(removeDataTracing));
								}
							}else{
								alert("Data Masih Kosong");
							}
						})
						
						function validasiTracing(){
							let valid = true;
							let message = '';
							dataTracing.forEach(item=>{
								if(item.id_hubungan == null || item.id_jenis_kontak == null){
									message = 'Lengkapi Hubungan dan Jenis Kontak !';
									valid = false;
									return false;
								}
							})

							if(!valid){
								alert("Data Tidak Valid");
							}
							return valid;
						}
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
									// Swal.fire(
									// 	'Success!',
									// 	data.message,
									// 	'success'
									// )
									alert("Berhasil Simpan Data");
									$("#modalku").modal('hide');
								},
								error:function(data) {
									alert("Gagal Simpan Data");
								}
							})
						}

						function personContact(){
							$.get("<?php echo base_url("services/dataTracing/").$laporan->id_laporan; ?>", function(data) {
								var data = JSON.parse(data);
								if(data.data.length>0){
									data.data.forEach(item => {
										item.row_num = row_num;
										item.is_form_input = false;
										dataTracing.push(item);
										row_num++;
									});
									drawTableListTracing();
								}
							})
						}
						personContact();
					});
                </script>