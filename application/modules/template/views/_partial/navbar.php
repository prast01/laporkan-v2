
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
				<div class="container">
					<!-- Left navbar links -->
					<!-- <ul class="navbar-nav">
						<li class="nav-item">
							<h4><?php echo SITE_NAME; ?></h4>
						</li>
					</ul> -->
					
					<a href="<?php echo site_url('../'); ?>" class="navbar-brand">
						<img src="<?php echo base_url(LOGO2); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
							style="opacity: .8">
						<span class="brand-text font-weight-light"><?php echo SITE_NAME; ?></span>
					</a>

					<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse order-3" id="navbarCollapse">
						<!-- Left navbar links -->
						<?php
							if($this->session->userdata("id_user") != ''){
						?>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="<?php echo site_url('../'); ?>" class="nav-link">Dashboard</a>
							</li>
							<?php
								if($level == '1'){
							?>
							<li class="nav-item">
								<a href="<?php echo site_url('../reg'); ?>" class="nav-link">Buat Akun</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('../home/faskes'); ?>" class="nav-link">Rekap Faskes</a>
							</li>
							<?php
								}
								if($level == '5'){
							?>
							<li class="nav-item dropdown">
								<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data ODP</a>
								<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
									<!-- Level two dropdown-->
									<li class="dropdown-submenu dropdown-hover">
										<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Kecamatan</a>
										<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
											<li>
												<a tabindex="-1" href="<?php echo site_url('../data/odp/kecamatan/all'); ?>" class="dropdown-item">Semua Kecamatan</a>
											</li>
											<?php
												foreach ($kecamatan as $key) {
											?>
											<li class="dropdown-submenu">
												<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?php echo $key->nama_kecamatan; ?></a>
												<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
													<li><a href="<?php echo site_url('../data/odp/kecamatan/'.$key->id_kecamatan); ?>" class="dropdown-item">Semua Desa</a></li>
													<?php
														foreach ($kel[$key->kode] as $key => $value) {
													?>
													<li><a href="<?php echo site_url('../data/odp/desa/'.$value['id_kel']); ?>" class="dropdown-item"><?php echo $value['nama_kel']; ?></a></li>
													<?php
														}
													?>
												</ul>
											</li>
											<?php
												}
											?>
										</ul>
									</li>
									<li class="dropdown-submenu dropdown-hover">
										<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Faskes</a>
										<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
											<li>
												<a tabindex="-1" href="<?php echo site_url('../data/odp/faskes/all'); ?>" class="dropdown-item">Semua Faskes</a>
											</li>

											<!-- Level three dropdown-->
											<li class="dropdown-submenu">
												<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Rumah Sakit</a>
												<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
													<li><a href="<?php echo site_url('../data/odp/faskes/rs'); ?>" class="dropdown-item">Semua RS</a></li>
													<?php
														foreach ($rs as $key) {
													?>
													<li><a href="<?php echo site_url('../data/odp/rs/'.$key->id_user); ?>" class="dropdown-item"><?php echo $key->nama_user; ?></a></li>
													<?php
														}
													?>
												</ul>
											</li>
											<!-- Level three dropdown-->
											<li class="dropdown-submenu">
												<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Puskesmas</a>
												<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
													<li><a href="<?php echo site_url('../data/odp/faskes/puskesmas'); ?>" class="dropdown-item">Semua Puskesmas</a></li>
													<?php
														foreach ($pkm as $key) {
													?>
													<li><a href="<?php echo site_url('../data/odp/puskesmas/'.$key->id_user); ?>" class="dropdown-item"><?php echo $key->nama_user; ?></a></li>
													<?php
														}
													?>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data PDP</a>
								<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

									<li class="dropdown-submenu dropdown-hover">
										<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Ranap Jepara</a>
										<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

											<li><a href="<?php echo site_url('../data/pdp/ranap/all'); ?>" class="dropdown-item">Semua RS</a></li>
											<?php
												foreach ($rs as $key) {
											?>
											<li><a href="<?php echo site_url('../data/pdp/ranap/'.$key->nama_user); ?>" class="dropdown-item"><?php echo $key->nama_user; ?></a></li>
											<?php
												}
											?>
										</ul>
									</li>
									<li><a href="<?php echo site_url('../data/pdp/rujuk'); ?>" class="dropdown-item">Ranap Luar Jepara</a></li>
									<li class="dropdown-submenu dropdown-hover">
										<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Pengawasan Faskes</a>
										<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
											<li>
												<a tabindex="-1" href="<?php echo site_url('../data/pdp/rajal/all'); ?>" class="dropdown-item">Semua Faskes</a>
											</li>

											<!-- Level three dropdown-->
											<li class="dropdown-submenu">
												<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Rumah Sakit</a>
												<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
													<!-- <li><a href="<?php echo site_url('../data/pdp/faskes/all&gol=1'); ?>" class="dropdown-item">Semua RS</a></li> -->
													<?php
														foreach ($rs as $key) {
													?>
													<li><a href="<?php echo site_url('../data/pdp/rajal/'.$key->id_user); ?>" class="dropdown-item"><?php echo $key->nama_user; ?></a></li>
													<?php
														}
													?>
												</ul>
											</li>
											<!-- Level three dropdown-->
											<li class="dropdown-submenu">
												<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Puskesmas</a>
												<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
													<!-- <li><a href="<?php echo site_url('../data/pdp/rajal/all'); ?>" class="dropdown-item">Semua Puskesmas</a></li> -->
													<?php
														foreach ($pkm as $key) {
													?>
													<li><a href="<?php echo site_url('../data/pdp/rajal/'.$key->id_user); ?>" class="dropdown-item"><?php echo $key->nama_user; ?></a></li>
													<?php
														}
													?>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="<?php echo site_url('../data/pdp/pulang'); ?>" class="dropdown-item">Pulang/Sehat</a></li>
									<li><a href="<?php echo site_url('../data/pdp/meninggal'); ?>" class="dropdown-item">Meninggal</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data COVID-19</a>
								<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

									<li class="dropdown-submenu dropdown-hover">
										<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Perawatan</a>
										<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

											<li><a href="<?php echo site_url('../data/covid/ranap/all'); ?>" class="dropdown-item">Semua</a></li>
											<li><a href="<?php echo site_url('../data/covid/ranap/dalam'); ?>" class="dropdown-item">Dalam Wilayah</a></li>
											<li><a href="<?php echo site_url('../data/covid/ranap/luar'); ?>" class="dropdown-item">Luar Wilayah</a></li>
										</ul>
									</li>
									<li><a href="<?php echo site_url('../data/covid/sembuh'); ?>" class="dropdown-item">Sembuh</a></li>
									<li><a href="<?php echo site_url('../data/covid/meninggal'); ?>" class="dropdown-item">Meninggal</a></li>
								</ul>
							</li>
							<?php
								}

								if ($level == "2" || $level == "3") {
							?>
							<li class="nav-item">
								<a href="<?php echo site_url('../odp'); ?>" class="nav-link">ODP</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('../pasien'); ?>" class="nav-link">Pasien</a>
							</li>
							<?php
								}
								
								if ($level == "2") {
							?>
							<li class="nav-item">
								<a href="<?php echo site_url('../home/faskes_luar'); ?>" class="nav-link">Faskes Luar Daerah</a>
							</li>
							<?php
								}
							?>
						</ul>
						<?php
							}
						?>
					</div>

					<!-- Right navbar links -->
					<ul class="order-1 order-md-3 navbar-nav ml-auto navbar-no-expand">
						<li class="nav-item">
							<a href="#" class="nav-link">
								Hallo, <?php echo $this->session->userdata("nama_user"); ?>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('../home/gantiPassword') ?>" class="nav-link" title="Ganti Password">
								<i class="fa fa-unlock"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('../logout') ?>" class="nav-link" title="Keluar">
								<i class="fa fa-sign-out-alt"></i>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- /.navbar -->