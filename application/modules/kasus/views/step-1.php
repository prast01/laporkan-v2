<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>Data Penyedikan Epidemiologi Covid-19</h4>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-edit"></i>
						PASIEN : <b><?= $laporan->nama; ?> - <?= $kec; ?>, <?= $kel; ?></b>
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-5 col-sm-3">
							<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-1/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-bullhorn"></i> &nbsp;Informasi Klinis</a>
								<a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-2/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-heartbeat"></i> &nbsp;Kondisi Penyerta</a>
								<a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-3/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-stethoscope"></i> &nbsp;Diagnosis</a>
								<a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-4/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-plane"></i> &nbsp;Faktor Riwayat Perjalanan</a>
								<a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-5/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-handshake"></i> &nbsp;Faktor Kontak/Paparan</a>
								<a class="nav-link" id="vert-tabs-home-tab" href="<?= site_url('../kasus/epid/step-6/' . $laporan->id_laporan); ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i class="fa fa-address-card"></i> &nbsp;Daftar Kontak Erat Kasus</a>
							</div>
						</div>
						<div class="col-1 col-sm-2"></div>
						<div class="col-6 col-sm-7">
							<div class="tab-content" id="vert-tabs-tabContent">
								<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

									<form class="form-horizontal" method="POST" action="<?= site_url('../kasus/add_step/step-1/' . $laporan->id_laporan); ?>">
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Timbul Gejala</label>
											<div class="col-sm-5">
												<input type="date" name="tgl_gejala" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Demam >= 38&deg;C</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="demam1" name="demam" value="1">
													<label for="demam1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="demam2" name="demam" value="2">
													<label for="demam2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="demam3" name="demam" value="3">
													<label for="demam3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Riwayat Demam</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="riwayat_demam1" name="riwayat_demam" value="1">
													<label for="riwayat_demam1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="riwayat_demam2" name="riwayat_demam" value="2">
													<label for="riwayat_demam2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="riwayat_demam3" name="riwayat_demam" value="3">
													<label for="riwayat_demam3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Batuk</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="batuk1" name="batuk" value="1">
													<label for="batuk1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="batuk2" name="batuk" value="2">
													<label for="batuk2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="batuk3" name="batuk" value="3">
													<label for="batuk3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Pilek</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="pilek1" name="pilek" value="1">
													<label for="pilek1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="pilek2" name="pilek" value="2">
													<label for="pilek2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="pilek3" name="pilek" value="3">
													<label for="pilek3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Sakit Tenggorokan</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sakit_tenggorokan1" name="sakit_tenggorokan" value="1">
													<label for="sakit_tenggorokan1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sakit_tenggorokan2" name="sakit_tenggorokan" value="2">
													<label for="sakit_tenggorokan2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sakit_tenggorokan3" name="sakit_tenggorokan" value="3">
													<label for="sakit_tenggorokan3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPassword3" class="col-sm-2 col-form-label">Sesak Napas</label>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sesak_napas1" name="sesak_napas" value="1">
													<label for="sesak_napas1" class="custom-control-label">Ya</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sesak_napas2" name="sesak_napas" value="2">
													<label for="sesak_napas2" class="custom-control-label">Tidak</label>
												</div>
											</div>
											<div class="col-sm-2 pt-2">
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="sesak_napas3" name="sesak_napas" value="3">
													<label for="sesak_napas3" class="custom-control-label">Tidak Tahu</label>
												</div>
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-2">
												<button type="submit" class="btn btn-info btn-block">Simpan</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->