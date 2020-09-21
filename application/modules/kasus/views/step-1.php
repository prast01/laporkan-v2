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
			<div class="row">
				<div class="col-6">
					<a href="<?= site_url('../kasus'); ?>" class="btn btn-warning">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<a href="<?= site_url('../kasus/cetak_pe/' . $laporan->id_laporan); ?>" target="_blank" class="btn btn-primary">
						<i class="fa fa-print"></i> Cetak PE
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Sukses!</h5>
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('gagal')) : ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Eror!</h5>
							<?php echo $this->session->flashdata('gagal'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
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
														<input type="date" name="tgl_gejala" class="form-control" value="<?= $pe['tgl_gejala']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Demam >= 38&deg;C</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="demam1" name="demam" value="1" <?= ($pe['demam'] == '1') ? "checked" : ""; ?>>
															<label for="demam1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="demam2" name="demam" value="2" <?= ($pe['demam'] == '2') ? "checked" : ""; ?>>
															<label for="demam2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="demam3" name="demam" value="3" <?= ($pe['demam'] == '3') ? "checked" : ""; ?>>
															<label for="demam3" class="custom-control-label">Tidak Tahu</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Riwayat Demam</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="riwayat_demam1" name="riwayat_demam" value="1" <?= ($pe['riwayat_demam'] == '1') ? "checked" : ""; ?>>
															<label for="riwayat_demam1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="riwayat_demam2" name="riwayat_demam" value="2" <?= ($pe['riwayat_demam'] == '2') ? "checked" : ""; ?>>
															<label for="riwayat_demam2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="riwayat_demam3" name="riwayat_demam" value="3" <?= ($pe['riwayat_demam'] == '3') ? "checked" : ""; ?>>
															<label for="riwayat_demam3" class="custom-control-label">Tidak Tahu</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Batuk</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="batuk1" name="batuk" value="1" <?= ($pe['batuk'] == '1') ? "checked" : ""; ?>>
															<label for="batuk1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="batuk2" name="batuk" value="2" <?= ($pe['batuk'] == '2') ? "checked" : ""; ?>>
															<label for="batuk2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="batuk3" name="batuk" value="3" <?= ($pe['batuk'] == '3') ? "checked" : ""; ?>>
															<label for="batuk3" class="custom-control-label">Tidak Tahu</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Pilek</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="pilek1" name="pilek" value="1" <?= ($pe['pilek'] == '1') ? "checked" : ""; ?>>
															<label for="pilek1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="pilek2" name="pilek" value="2" <?= ($pe['pilek'] == '2') ? "checked" : ""; ?>>
															<label for="pilek2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="pilek3" name="pilek" value="3" <?= ($pe['pilek'] == '3') ? "checked" : ""; ?>>
															<label for="pilek3" class="custom-control-label">Tidak Tahu</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Sakit Tenggorokan</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sakit_tenggorokan1" name="sakit_tenggorokan" value="1" <?= ($pe['sakit_tenggorokan'] == '1') ? "checked" : ""; ?>>
															<label for="sakit_tenggorokan1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sakit_tenggorokan2" name="sakit_tenggorokan" value="2" <?= ($pe['sakit_tenggorokan'] == '2') ? "checked" : ""; ?>>
															<label for="sakit_tenggorokan2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sakit_tenggorokan3" name="sakit_tenggorokan" value="3" <?= ($pe['sakit_tenggorokan'] == '3') ? "checked" : ""; ?>>
															<label for="sakit_tenggorokan3" class="custom-control-label">Tidak Tahu</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3" class="col-sm-2 col-form-label">Sesak Napas</label>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sesak_napas1" name="sesak_napas" value="1" <?= ($pe['sesak_napas'] == '1') ? "checked" : ""; ?>>
															<label for="sesak_napas1" class="custom-control-label">Ya</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sesak_napas2" name="sesak_napas" value="2" <?= ($pe['sesak_napas'] == '2') ? "checked" : ""; ?>>
															<label for="sesak_napas2" class="custom-control-label">Tidak</label>
														</div>
													</div>
													<div class="col-sm-2 pt-2">
														<div class="custom-control custom-radio">
															<input class="custom-control-input" type="radio" id="sesak_napas3" name="sesak_napas" value="3" <?= ($pe['sesak_napas'] == '3') ? "checked" : ""; ?>>
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
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->