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
                                            if($level == '2'){
                                        ?>
										<form class="form-horizontal" method="post" action="<?php echo site_url('../home'); ?>" enctype="multipart/form-data">
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
                                        </form>
                                        <?php
                                            } else {
                                                echo "DAFTAR DATA";
                                            }
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
                                                            <table class="table table-bordered datatable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>NIK</th>
                                                                        <th>Nama</th>
                                                                        <th>Kecamatan</th>
                                                                        <th>Keterangan</th>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <th>Sumber</th>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <th>Status</th>
                                                                        <th>BPJS</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no = 1;
                                                                        foreach ($laporan_odp as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }

                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $key->tgl_periksa; ?></td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                                            Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                    if ($key->covid == '0') {
                                                                                        echo "PROSES PANTAU";
                                                                                    } elseif ($key->covid == '2') {
                                                                                        echo "SELESAI PANTAU";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if($key->validasi == "0" || $level == "2"){
                                                                            ?>
                                                                            <button class="btn btn-warning text-white btn-sm" onclick="modal2('<?php echo $key->id_laporan; ?>')"><span class="fa fa-edit"></span></button>
                                                                            <?php
                                                                                }

                                                                                if ($key->validasi == "1" && $key->covid == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/negatif/".$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin Sudah Selesai Pantau?')">
                                                                                <span class="fa fa-plus"></span> Selesai Pantau
                                                                            </a>
                                                                            <button class="btn btn-danger text-white btn-sm" onclick="modal7('<?php echo $key->id_laporan; ?>')"><span class="fa fa-plus"></span> PDP</button>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                        foreach ($laporan_odp_2 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?> <br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                    if ($key->covid == '0') {
                                                                                        echo "PROSES PANTAU";
                                                                                    } elseif ($key->covid == '2') {
                                                                                        echo "SELESAI PANTAU";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->validasi == "1" && $key->covid == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/negatif/".$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin Sudah Selesai Pantau?')">
                                                                                <span class="fa fa-plus"></span> Selesai Pantau
                                                                            </a>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                        foreach ($laporan_odp_3 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?> <br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                    if ($key->covid == '0') {
                                                                                        echo "PROSES PANTAU";
                                                                                    } elseif ($key->covid == '2') {
                                                                                        echo "SELESAI PANTAU";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->validasi == "1" && $key->covid == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/negatif/".$key->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin Sudah Selesai Pantau?')">
                                                                                <span class="fa fa-plus"></span> Selesai Pantau
                                                                            </a>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="row">
                                                    <!-- <div class="col-md-3">
                                                        <h3>DATA PASIEN DALAM PENGAWASAN</h3>
                                                    </div> -->
                                                    <?php
                                                        // if($level == '3'){
                                                    ?>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-warning btn-sm text-white btn-block" onclick="modal('2')" title="Tambah PDP"><i class="fa fa-plus"></i> Tambah PDP</button>
                                                    </div>
                                                    <!-- <div class="col-md-2">
                                                        <button type="button" class="btn btn-warning btn-sm text-white btn-block" onclick="modal5('2')" title="Lihat PDP Validasi"><i class="fa fa-eye"></i> Lihat PDP Validasi</button>
                                                    </div> -->
                                                    <?php
                                                        // }
                                                    ?>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>NIK</th>
                                                                        <th>Nama</th>
                                                                        <th>Kecamatan</th>
                                                                        <th>Keterangan</th>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <th>Sumber</th>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <th>Status</th>
                                                                        <th>BPJS</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no2 = 1;
                                                                        foreach ($laporan_pdp as $key2) {
                                                                            if ($key2->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key2->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key2->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key2->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no2; ?></td>
                                                                        <td><?php echo $key2->tgl_periksa; ?></td>
                                                                        <td><?php echo $key2->nik; ?></td>
                                                                        <td><?php echo $key2->nama." (".$key2->umur.")"; ?><br>-<?php echo $key2->no_telp; ?></td>
                                                                        <td><?php echo $key2->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key2->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key2->rawat; ?><br>
                                                                            <?php
                                                                                if($key2->rujuk == '1'){
                                                                            ?>
                                                                            Rujuk ke: <br>-<?php echo $key2->rs; ?><br>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            Riwayat: <br>-<?php echo $key2->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key2->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key2->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key2->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key2->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                if ($key2->rawat != "RAWAT JALAN" && $key2->covid == "0" && $key2->rujuk == "0" && $key2->st == "0") {
                                                                                    echo "RANAP JEPARA";
                                                                                } elseif ($key2->covid == "0" && $key2->rujuk == "1" && $key2->st == "0") {
                                                                                    echo "RANAP LUAR JEPARA";
                                                                                } elseif ($key2->rawat == "RAWAT JALAN" && $key2->covid == "0" && $key2->rujuk == "0" && $key2->st == "0") {
                                                                                    echo "PENGAWASAN FASYANKES";
                                                                                } elseif ($key2->covid == "0" && $key2->st == "1") {
                                                                                    echo "PULANG/SEHAT";
                                                                                } elseif ($key2->st == "2") {
                                                                                    echo "MENINGGAL";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key2->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if (($key2->validasi == "0" && $key2->covid == "0" && $key2->st == "0") || $level == "2") {
                                                                            ?>
                                                                            <button class="btn btn-warning text-white btn-sm" onclick="modal2('<?php echo $key2->id_laporan; ?>')">
                                                                                <span class="fa fa-edit"></span>
                                                                            </button>
                                                                            <?php
                                                                                }

                                                                                if ($key2->covid == "0" && $key2->rujuk == "1" && $key2->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key2->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key2->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key2->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key2->covid == "0" && $key2->rujuk == "0" && $key2->st == "0") {
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key2->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <a href="<?php echo site_url("../home/positif/".$key2->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key2->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key2->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key2->st == "2") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key2->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no2++;
                                                                        }
                                                                        foreach ($laporan_pdp_2 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no2; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?> <br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                                            <?php
                                                                                if($key->rujuk == '1'){
                                                                            ?>
                                                                            Rujuk ke: <br>-<?php echo $key->rs; ?><br>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                if ($key->rawat != "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                                    echo "RANAP JEPARA";
                                                                                } elseif ($key->covid == "0" && $key->rujuk == "1" && $key->st == "0") {
                                                                                    echo "RANAP LUAR JEPARA";
                                                                                } elseif ($key->rawat == "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                                    echo "PENGAWASAN FASYANKES";
                                                                                } elseif ($key->covid == "0" && $key->st == "1") {
                                                                                    echo "PULANG/SEHAT";
                                                                                } elseif ($key->st == "2") {
                                                                                    echo "MENINGGAL";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->covid == "0" && $key->rujuk == "1" && $key->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key->st == "2") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no2++;
                                                                        }
                                                                        foreach ($laporan_pdp_3 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no2; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?> <br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                                            <?php
                                                                                if($key->rujuk == '1'){
                                                                            ?>
                                                                            Rujuk ke: <br>-<?php echo $key->rs; ?><br>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>-
                                                                            <?php
                                                                                if ($key->validasi == '0') {
                                                                                    echo "BELUM DIVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "DIVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                            <br>-
                                                                            <?php
                                                                                if ($key->rawat != "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                                    echo "RANAP JEPARA";
                                                                                } elseif ($key->covid == "0" && $key->rujuk == "1" && $key->st == "0") {
                                                                                    echo "RANAP LUAR JEPARA";
                                                                                } elseif ($key->rawat == "RAWAT JALAN" && $key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                                    echo "PENGAWASAN FASYANKES";
                                                                                } elseif ($key->covid == "0" && $key->st == "1") {
                                                                                    echo "PULANG/SEHAT";
                                                                                } elseif ($key->st == "2") {
                                                                                    echo "MENINGGAL";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->covid == "0" && $key->rujuk == "1" && $key->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key->covid == "0" && $key->rujuk == "0" && $key->st == "0") {
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/sembuh/".$key->id_laporan); ?>" class="btn btn-success btn-sm text-white" onclick="return confirm('Yakin Pasien PULANG/SEHAT?')">
                                                                                <span class="fa fa-check"></span> PULANG/SEHAT
                                                                            </a>
                                                                            <a href="<?php echo site_url("../home/meninggal/".$key->id_laporan); ?>" class="btn btn-warning btn-sm text-white" onclick="return confirm('Yakin Pasien Meninggal?')">
                                                                                <span class="fa fa-plus"></span> MENINGGAL
                                                                            </a>
                                                                            <?php
                                                                                } elseif ($key->st == "2") {
                                                                            ?>
                                                                            <a href="<?php echo site_url("../home/positif/".$key->id_laporan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Pasien POSITIF?')">
                                                                                <span class="fa fa-plus"></span> POSITIF
                                                                            </a>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no2++;
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                                <?php
                                                    // if($level == "2"){
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger btn-sm text-white btn-block" onclick="modal('3')" title="Tambah COVID-19"><i class="fa fa-plus"></i> Tambah COVID-19</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <?php
                                                    // }
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered datatable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tgl Periksa</th>
                                                                        <th>NIK</th>
                                                                        <th>Nama</th>
                                                                        <th>Kecamatan</th>
                                                                        <th>Keterangan</th>
                                                                        <th>BPJS</th>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <th>Sumber</th>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <th>Kondisi</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no3 = 1;
                                                                        foreach ($laporan_cvd as $key2) {
                                                                            if ($key2->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key2->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key2->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key2->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no3; ?></td>
                                                                        <td><?php echo $key2->tgl_periksa."<br>Kasus : ".$key2->kasus; ?></td>
                                                                        <td><?php echo $key2->nik; ?></td>
                                                                        <td><?php echo $key2->nama." (".$key2->umur.")"; ?><br>-<?php echo $key2->no_telp; ?></td>
                                                                        <td><?php echo $key2->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key2->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key2->rawat; ?><br>
                                                                            <?php
                                                                                if($key2->rujuk == '1'){
                                                                            ?>
                                                                            Rujuk ke: <br>-<?php echo $key2->rs; ?><br>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            Riwayat: <br>-<?php echo $key2->riwayat_jalan; ?><br>Ket lain: <br>-<?php echo $key2->keterangan; ?>
                                                                        </td>
                                                                        <td><?php echo $key2->bpjs; ?></td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key2->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>
                                                                            <?php
                                                                                if ($key2->st == '1') {
                                                                                    echo "SEMBUH";
                                                                                } elseif ($key2->st == '2') {
                                                                                    echo "MENINGGAL";
                                                                                } else {
                                                                                    if ($key2->rujuk == "0") {
                                                                                        echo "PERAWATAN DALAM DAERAH";
                                                                                        if ($key2->rawat == "RAWAT JALAN") {
                                                                                            echo "<br>- ISOLASI MANDIRI";
                                                                                        } else {
                                                                                            echo "<br>- ".$key2->rawat;
                                                                                        }
                                                                                    } else {
                                                                                        echo "PERAWATAN LUAR DAERAH";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key2->validasi == '1') {
                                                                                    echo "TERVERIFIKASI";
                                                                                } elseif ($key2->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "BELUM TERVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if($key2->validasi == "0" || $level == "2"){
                                                                            ?>
                                                                            <button type="button" class="btn btn-warning btn-sm text-white" onclick="modal2('<?php echo $key2->id_laporan; ?>')" title="Ubah Data"><i class="fa fa-edit"></i></button>
                                                                            <?php
                                                                                }

                                                                                if ($key2->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url('../home/sembuh/'.$key2->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin sembuh?')">
                                                                                <i class="fa fa-check"></i> Sembuh
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/meninggal/'.$key2->id_laporan); ?>" class="btn btn-warning text-white btn-sm" onclick="return confirm('Yakin Meninggal?')">
                                                                                <i class="fa fa-times"></i> Meninggal
                                                                            </a>
                                                                            <?php
                                                                                }

                                                                                if($key2->st == "0"){
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key2->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no3++;
                                                                        }
                                                                        foreach ($laporan_cvd_2 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no3; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?><br>
                                                                            Kasus : <br><?php echo $key->kasus; ?><br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                                            Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->st == '1') {
                                                                                    echo "SEMBUH";
                                                                                } elseif ($key->st == '2') {
                                                                                    echo "MENINGGAL";
                                                                                } else {
                                                                                    if ($key->rujuk == "0") {
                                                                                        echo "PERAWATAN DALAM DAERAH";
                                                                                        if ($key->rawat == "RAWAT JALAN") {
                                                                                            echo "<br>- ISOLASI MANDIRI";
                                                                                        } else {
                                                                                            echo "<br>- ".$key->rawat;
                                                                                        }
                                                                                    } else {
                                                                                        echo "PERAWATAN LUAR DAERAH";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->validasi == '1') {
                                                                                    echo "TERVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "BELUM TERVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key2->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url('../home/sembuh/'.$key2->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin sembuh?')">
                                                                                <i class="fa fa-check"></i> Sembuh
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/meninggal/'.$key2->id_laporan); ?>" class="btn btn-warning text-white btn-sm" onclick="return confirm('Yakin Meninggal?')">
                                                                                <i class="fa fa-times"></i> Meninggal
                                                                            </a>
                                                                            <?php
                                                                                }

                                                                                if($key2->st == "0"){
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key2->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no3++;
                                                                        }
                                                                        foreach ($laporan_cvd_3 as $key) {
                                                                            if ($key->id_kelurahan != '') {
                                                                                $d = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $key->id_kelurahan])->row();
                                                                                $desa = $d->nama_kelurahan.", ";
                                                                            } else {
                                                                                $desa = "";
                                                                            }
                                                                            if ($key->validasi == '0') {
                                                                                $wr = "";
                                                                            } elseif ($key->validasi == '1') {
                                                                                $wr = "lightgreen";
                                                                            }
                                                                    ?>
                                                                    <tr style="background-color: <?php echo $wr; ?>">
                                                                        <td><?php echo $no3; ?></td>
                                                                        <td>
                                                                            <?php echo $key->tgl_periksa; ?> <br>
                                                                            Kasus : <br><?php echo $key->kasus; ?><br>
                                                                            Sumber : <br><?php echo $key->nama_user; ?>
                                                                        </td>
                                                                        <td><?php echo $key->nik; ?></td>
                                                                        <td><?php echo $key->nama." (".$key->umur.")"; ?><br>-<?php echo $key->no_telp; ?></td>
                                                                        <td><?php echo $key->nama_kecamatan; ?>, <?php echo $desa; ?><?php echo $key->alamat_domisili; ?></td>
                                                                        <td>
                                                                            Dirawat di: <br>-<?php echo $key->rawat; ?><br>
                                                                            Riwayat: <br>-<?php echo $key->riwayat_jalan; ?><br>
                                                                            Ket lain: <br>-<?php echo $key->keterangan; ?>
                                                                        </td>
                                                                        <td><?php echo $key->bpjs; ?></td>
                                                                        <?php
                                                                            if($level == '2'){
                                                                        ?>
                                                                        <td><?php echo $key->nama_user; ?></td>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->st == '1') {
                                                                                    echo "SEMBUH";
                                                                                } elseif ($key->st == '2') {
                                                                                    echo "MENINGGAL";
                                                                                } else {
                                                                                    if ($key->rujuk == "0") {
                                                                                        echo "PERAWATAN DALAM DAERAH";
                                                                                        if ($key->rawat == "RAWAT JALAN") {
                                                                                            echo "<br>- ISOLASI MANDIRI";
                                                                                        } else {
                                                                                            echo "<br>- ".$key->rawat;
                                                                                        }
                                                                                    } else {
                                                                                        echo "PERAWATAN LUAR DAERAH";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key->validasi == '1') {
                                                                                    echo "TERVERIFIKASI";
                                                                                } elseif ($key->validasi == '2') {
                                                                                    echo "Tidak Tervalidasi";
                                                                                } else {
                                                                                    echo "BELUM TERVERIFIKASI";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                if ($key2->st == "0") {
                                                                            ?>
                                                                            <a href="<?php echo site_url('../home/sembuh/'.$key2->id_laporan); ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin sembuh?')">
                                                                                <i class="fa fa-check"></i> Sembuh
                                                                            </a>
                                                                            <a href="<?php echo site_url('../home/meninggal/'.$key2->id_laporan); ?>" class="btn btn-warning text-white btn-sm" onclick="return confirm('Yakin Meninggal?')">
                                                                                <i class="fa fa-times"></i> Meninggal
                                                                            </a>
                                                                            <?php
                                                                                }

                                                                                if($key2->st == "0"){
                                                                            ?>
                                                                            <button class="btn btn-primary btn-sm" onclick="modal6('<?php echo $key2->id_laporan; ?>')">
                                                                                <span class="fa fa-arrow-right"></span> RUJUK
                                                                            </button>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                            $no3++;
                                                                        }
                                                                    ?>
                                                                </tbody>
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