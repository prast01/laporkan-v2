<?php

    date_default_timezone_set('Asia/Jakarta');
    function tgl_ind($date) {

    /** ARRAY HARI DAN BULAN**/	
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            
    /** MEMISAHKAN FORMAT TANGGAL, BULAN, TAHUN, DENGAN SUBSTRING**/		
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 8);		
        $hari = date("w", strtotime($date));
        $jam = date("H:i", strtotime($date));
        
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun.", ".$jam." WIB";
        return $result;
    }

    $tgl = date("Y-m-d");

    $tglku = tgl_ind($tgl_update);
    
    $bln = array(01=>"Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

    $bl = (isset($_POST['bln'])) ? $_POST['bln'] : date('m') ;
?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0 text-dark">
                                    <!-- Data Planning Pegawai -->
                                </h1>
							</div>
						</div>
					</div>
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<!-- Small boxes (Stat box) -->
                        <?php
                            if($level == '2'){
                        ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4>Update Terakhir : <?php echo $tglku; ?></h4>
                                <h5>(Data yang <span class="text-red">AKAN</span> dilihat masyarakat)</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="service_block text-center">
                                    <h3>Orang Dalam Pemantauan (ODP)</h3>
                                    <h1 class="animated fadeInUp wow"><?php echo $odp['komulatif']; ?></h1>
                                    <table border="0" width="100%">
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Proses Pemantauan</p>
                                            </td>
                                            <td>
                                                <p><?php echo $odp['proses']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Selesai Pemantauan</p>
                                            </td>
                                            <td>
                                                <p><?php echo $odp['lulus']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="service_block2 text-center">
                                    <h3>Pasien Dalam Pengawasan (PDP)</h3>
                                    <h1 class="animated fadeInUp wow"><?php echo $pdp['komulatif']; ?></h1>
                                    <table border="0" width="100%">
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Rawat Inap Jepara</p>
                                            </td>
                                            <td>
                                                <p><?php echo $pdp['ranap']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Rawat Inap Luar Jepara</p>
                                            </td>
                                            <td>
                                                <p><?php echo $pdp['rujuk']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Pengawasan Fasyankes</p>
                                            </td>
                                            <td>
                                                <p><?php echo $pdp['rajal']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; PULANG/SEHAT</p>
                                            </td>
                                            <td>
                                                <p><?php echo $pdp['sembuh']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Meninggal</p>
                                            </td>
                                            <td>
                                                <p><?php echo $pdp['meninggal']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="service_block3 text-center">
                                    <h3>Kasus Terkonfirmasi COVID-19</h3>
                                    <h1 class="animated fadeInUp wow"><?php echo $covid['komulatif']; ?></h1>
                                    <table border="0" width="100%">
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Perawatan Di Jepara</p>
                                            </td>
                                            <td>
                                                <p><?php echo $covid['rawat']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Perawatan Luar Jepara</p>
                                            </td>
                                            <td>
                                                <p><?php echo $covid['rawat_luar']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Sembuh</p>
                                            </td>
                                            <td>
                                                <p><?php echo $covid['sembuh']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"></td>
                                            <td align="left">
                                                <p>&bull; Meninggal</p>
                                            </td>
                                            <td>
                                                <p><?php echo $covid['meninggal']; ?></p>
                                            </td>
                                            <td width="15%"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a href="<?php echo site_url('../home/updateData'); ?>" class="btn btn-danger btn-block" onclick="return confirm('Yakin Update?')">
                                    <i class="fa fa-plus"></i> PUBLIS DATA
                                </a>
                            </div>
                        </div>
                        <br>
                        <?php
                            }
                        ?>
                        <div class="row">
							<div class="col-md-12">
				                <?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-check"></i> Sukses!</h5>
									<?php echo $this->session->flashdata('success'); ?>
								</div>
				                <?php endif; ?>
                                
				                <?php if ($this->session->flashdata('gagal')): ?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-ban"></i> Eror!</h5>
									<?php echo $this->session->flashdata('gagal'); ?>
								</div>
				                <?php endif; ?>
							</div>
                        </div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
                                        <?php
                                            // if($level == '2'){
                                        ?>
										<!-- <form class="form-horizontal" method="post" action="<?php echo site_url('../home'); ?>" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Bulan Periksa</label>
                                                <div class="col-sm-2">
                                                    <select name="bln" class="form-control select2" style="width: 100%" required>
                                                        <option <?php if($bl == ''){ echo "selected"; } ?> disabled>Pilih</option>
                                                        <?php
                                                            foreach ($bln as $key => $val) {
                                                        ?>
                                                        <option <?php if($bl == $key){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                                </div>
                                            </div>
                                        </form> -->
                                        <?php
                                            // } else {
                                                echo "DAFTAR DATA";
                                            // }
                                        ?>
									</div>
									<div class="card-body">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ORANG DALAM PEMANTAUAN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PASIEN DALAM PENGAWASAN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">PASIEN COVID 19</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-success btn-sm text-white btn-block" onclick="modal('1')" title="Tambah ODP"><i class="fa fa-plus"></i> Tambah ODP</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>Nama</th>
                                                                        <th>Umur</th>
                                                                        <th>Kec</th>
                                                                        <th>Kel</th>
                                                                        <th>Alamat</th>
                                                                        <th>Telp</th>
                                                                        <th>Status</th>
                                                                        <th>Sumber</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-warning btn-sm text-white btn-block" onclick="modal('2')" title="Tambah PDP"><i class="fa fa-plus"></i> Tambah PDP</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable2" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>Nama</th>
                                                                        <th>Umur</th>
                                                                        <th>Kec</th>
                                                                        <th>Kel</th>
                                                                        <th>Alamat</th>
                                                                        <th>Telp</th>
                                                                        <th>Status</th>
                                                                        <th>Sumber</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger btn-sm text-white btn-block" onclick="modal('3')" title="Tambah COVID-19"><i class="fa fa-plus"></i> Tambah COVID-19</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable3" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Kasus</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>Nama</th>
                                                                        <th>Umur</th>
                                                                        <th>Kec</th>
                                                                        <th>Kel</th>
                                                                        <th>Alamat</th>
                                                                        <th>Telp</th>
                                                                        <th>Status</th>
                                                                        <th>Sumber</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
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
					</div><!-- /.container-fluid -->
                    
                    <div class="modal fade" id="modalku">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <!-- <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
