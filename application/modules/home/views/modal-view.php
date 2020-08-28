
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										KEC. <?php echo strtoupper($kecamatan->nama_kecamatan); ?>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="card">
													<div class="card-header">
														<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
															<li class="nav-item">
																<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ODP</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PDP</a>
															</li>
														</ul>
													</div>
													<div class="card-body">
														<div class="tab-content" id="custom-tabs-one-tabContent">
															<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
																
																<div class="row">
																	<div class="col-md-12">
																		<div class="table-responsive">
																			<table class="table table-bordered datatable3">
																				<thead>
																					<tr>
																						<th>No</th>
																						<th>NIK</th>
																						<th>Nama</th>
																						<th>Alamat</th>
																						<th>Sumber</th>
																						<th>Status</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						$no = 1;
																						$total = 0;
																						foreach ($laporan_odp as $key) {
																					?>
																					<tr>
																						<td><?php echo $no; ?></td>
																						<td><?php echo $key->nik; ?></td>
																						<td><?php echo $key->nama; ?></td>
																						<td><?php echo $key->alamat_domisili; ?></td>
																						<td><?php echo $key->nama_user; ?></td>
																						<td>
																							<?php
																								if($key->validasi == '1'){
																									echo "Tervalidasi";
																								} elseif ($key->validasi == '2') {
																									echo "Tidak Tervalidasi";
																								} else {
																									echo "Belum Tervalidasi";
																								}
																							?>
																						</td>
																					</tr>
																					<?php
																							$total++;
																							$no++;
																						}
																					?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th colspan="5">TOTAL</th>
																						<th><?php echo number_format($total, 0, ',', '.'); ?></th>
																					</tr>
																				</tfoot>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
																<div class="row">
																	<div class="col-md-12">
																		<div class="table-responsive">
																			<table class="table table-bordered datatable3">
																				<thead>
																					<tr>
																						<th>No</th>
																						<th>NIK</th>
																						<th>Nama</th>
																						<th>Alamat</th>
																						<th>Sumber</th>
																						<th>Status</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						$no2 = 1;
																						$total2 = 0;
																						foreach ($laporan_pdp as $key2) {
																					?>
																					<tr>
																						<td><?php echo $no2; ?></td>
																						<td><?php echo $key2->nik; ?></td>
																						<td><?php echo $key2->nama; ?></td>
																						<td><?php echo $key2->alamat_domisili; ?></td>
																						<td><?php echo $key2->nama_user; ?></td>
																						<td>
																							<?php
																								if($key2->validasi == '1'){
																									echo "Tervalidasi";
																								} elseif ($key2->validasi == '2') {
																									echo "Tidak Tervalidasi";
																								} else {
																									echo "Belum Tervalidasi";
																								}
																							?>
																						</td>
																					</tr>
																					<?php
																							$total2++;
																							$no2++;
																						}
																					?>
																				</tbody>
																				<tfoot>
																					<tr>
																						<th colspan="5">TOTAL</th>
																						<th><?php echo number_format($total2, 0, ',', '.'); ?></th>
																					</tr>
																				</tfoot>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
                <script>
                    $(function () {
                        $('.datatable3').DataTable();
                    });
                </script>