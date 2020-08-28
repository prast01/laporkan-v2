<?php

    date_default_timezone_set('Asia/Jakarta');
    function tgl_ind($date) {

    /** ARRAY HARI DAN BULAN**/	
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nov","Desember");
            
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
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>Monitoring Data COVID-19 <?php echo $nama_faskes; ?></h3>
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