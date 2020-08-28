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
        
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun;
        return $result;
    }

    $tgl = date("Y-m-d");

    $tglku = tgl_ind($tgl);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rekapitulasi COVID-19 Kab. Jepara</title>
		<link rel="shortcut icon" href="<?php echo base_url(LOGO2); ?>" type="image/x-icon">
        <meta http-equiv="refresh" content="10"/>
    </head>
    <body>
        <center>
            <h3 style="margin-bottom: -15px">Rekapitulasi Data Laporan COVID-19 Kab. Jepara</h3>
            <h4>Update sampai dengan <?php echo $tglku; ?></h4>
        </center>
        <table class="table table-bordered" border="1" width="100%" style="border-collapse: collapse">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center" width="10%">ODP Hari ini</th>
                    <th class="text-center" width="10%">PDP Hari ini</th>
                    <th class="text-center" width="10%">ODP Komulatif</th>
                    <th class="text-center" width="10%">PDP Komulatif</th>
                    <th class="text-center" width="10%">COVID</th>
                    <th class="text-center" width="10%">Sembuh</th>
                    <th class="text-center" width="10%">Meninggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $odp_a = 0;
                    $pdp_a = 0;
                    $odp = 0;
                    $pdp = 0;
                    $cvd = 0;
                    $s = 0;
                    $m = 0;
                    foreach ($kecamatan as $key) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>KEC. <?php echo $key->nama_kecamatan; ?></td>
                    <td align="center">
                        <?php
                            $d1 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='1' AND validasi='1' AND covid ='0' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $odp = $odp + $d1->jml;
                            echo $d1->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            //  AND tgl_periksa = '$tgl'
                            $d2 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='2' AND validasi='1' AND covid ='0' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $pdp = $pdp + $d2->jml;
                            echo $d2->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $d1 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='1' AND validasi='1' AND covid !='1' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $odp_a = $odp_a + $d1->jml;
                            echo $d1->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $d2 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE kondisi='2' AND validasi='1' AND covid !='1' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $pdp_a = $pdp_a + $d2->jml;
                            echo $d2->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $d3 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE covid='1' AND validasi='1' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $cvd = $cvd + $d3->jml;
                            echo $d3->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $d6 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE covid='1' AND st='1' AND validasi='1' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $s = $s + $d6->jml;
                            echo $d6->jml;
                        ?>
                    </td>
                    <td align="center">
                        <?php
                            $d7 = $this->db->query("SELECT COUNT(nik) as jml FROM tb_laporan WHERE covid='1' AND st='2' AND validasi='1' AND id_kecamatan='$key->id_kecamatan'")->row();
                            $m = $m + $d7->jml;
                            echo $d7->jml;
                        ?>
                    </td>
                </tr>
                <?php
                        $no++;
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" align="right"><b>TOTAL</b></td>
                    <td align="center"><b><?php echo number_format($odp, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($pdp, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($odp_a, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($pdp_a, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($cvd, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($s, 0, ',', '.'); ?></b></td>
                    <td align="center"><b><?php echo number_format($m, 0, ',', '.'); ?></b></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>