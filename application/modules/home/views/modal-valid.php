
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
										<?php
											if ($laporan->validasi == '0') {
										?>
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/valid/'.$laporan->id_laporan); ?>" enctype="multipart/form-data">
										<?php
											} else {
										?>
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home/validNo/'.$laporan->id_laporan); ?>" enctype="multipart/form-data">
										<?php
											}
										?>
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
													<div class="col-sm-10">
														<select disabled name="rawat" class="form-control select2" style="width: 100%" required>
															<option disabled>Pilih</option>
															<option <?php if($laporan->rawat == "RAWAT JALAN"){ echo "selected"; } ?> value="RAWAT JALAN">RAWAT JALAN</option>
															<?php
																foreach ($rs as $key) {
															?>
															<option <?php if($laporan->rawat == $key->nama_faskes){ echo "selected"; } ?> value="<?php echo $key->nama_faskes; ?>">RAWAT INAP DI <?php echo $key->nama_faskes; ?></option>
															<?php
																}
															?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Domisili</label>
													<div class="col-sm-10">
														<textarea disabled class="form-control" name="alamat_domisili"><?php echo $laporan->alamat_domisili; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Riwayat Perjalanan</label>
													<div class="col-sm-10">
														<textarea disabled class="form-control" name="riwayat_jalan" required><?php echo $laporan->riwayat_jalan; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Lain</label>
													<div class="col-sm-10">
														<textarea disabled class="form-control" name="keterangan"><?php echo $laporan->keterangan; ?></textarea>
													</div>
												</div>
											</div>
											<!-- /.card-body -->
											<div class="card-footer">
                                                <div class="row">
                                                    <div class="col-2 hidden-xs"></div>
														<?php
															if ($laporan->validasi != '0') {
														?>
													<div class="col-md-2 col-xs-10">
                                                        <button type="submit" class="btn btn-info btn-block" onclick="return confirm('Anda yakin batalkan validasi data ini?')">Batalkan Validasi</button>
                                                    </div>
														<?php
															}
														?>
													<?php
														if ($laporan->validasi == '0') {
													?>
                                                    <div class="col-md-2 col-xs-10">
														<button type="submit" class="btn btn-info btn-block" onclick="return confirm('Anda yakin validasi data ini?')"><i class="fa fa-check"></i> Validasi</button>
														<!-- <a href="<?php echo site_url('../home/positif/'.$laporan->id_laporan); ?>" class="btn btn-danger btn-block text-white" onclick="return confirm('Positif COVID-19?')" title="Data Positif"><i class="fa fa-plus"></i> positif</a> -->
                                                    </div>
                                                    <div class="col-md-2 col-xs-10">
														<a href="<?php echo site_url('../home/nonValid/'.$laporan->id_laporan); ?>" class="btn btn-warning btn-block text-white" onclick="return confirm('Anda yakin data ini TIDAK VALID?')" title="Data Negatif"><i class="fa fa-times"></i> Tidak Valid</a>
														<!-- <a href="<?php echo site_url('../home/negatif/'.$laporan->id_laporan); ?>" class="btn btn-success btn-block text-white" onclick="return confirm('Negatif COVID-19?')" title="Data Negatif"><i class="fa fa-minus"></i> Negatif</a> -->
                                                    </div>
													<?php
														}
													?>
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