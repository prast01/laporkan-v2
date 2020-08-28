<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ServicesMobile extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model("M_servicesMobile");
	}

    public function index()
    {
        $data['hasil'] = "1";
        echo json_encode($data);
    }

    public function tgl_ind($date) {

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

    public function getData()
    {
        $model = $this->M_servicesMobile;
        // $model->cekPasien();
        $d = $model->getUpdate();
        if ($d['data'] != '0') {
            $a = $d['data'];
            $tgl = $this->tgl_ind($a->update_at);
            
            $data = array(
                "tgl_update" => "Update: ".$tgl,
                "odp_total" => $a->odp_all,
                "odp_lulus" => $a->odp_lulus,
                "odp_proses" => $a->odp_proses,
                "ranap" => $a->pdp_ranap,
                "rajal" => $a->pdp_rajal,
                "rujuk" => $a->pdp_rujuk,
                "sehat" => $a->pdp_sembuh,
                "komulatif" => $a->pdp_all,
                "pdp_meninggal" => $a->pdp_meninggal,
                "rawat" => $a->rawat,
                "sembuh" => $a->sembuh,
                "meninggal" => $a->meninggal,
                "komulatif" => $a->covid_all,
                "rawat_luar" => $a->rawat_luar
            );

        }

        echo json_encode($data);
    }

    public function getCovid()
    {
        $model = $this->M_servicesMobile;
        $d = $model->getKecamatan();

        $no = 0;
        $data = array();
        foreach ($d as $key) {
            $id = $key->id_kecamatan;
            $rawat = $model->getData("covid_dalam", $id);
            $rawat_luar = $model->getData("covid_luar", $id);
            $sehat = $model->getData("covid_sehat", $id);
            $meninggal = $model->getData("covid_md", $id);

            if ($rawat != 0 || $rawat_luar != 0 || $sehat != 0 || $meninggal != 0) {
                $data['data'][$no] = array(
                    "nama_kec" => $key->nama_kecamatan,
                    "rawat" => "".$rawat,
                    "rawat_luar" => "".$rawat_luar,
                    "sehat" => "".$sehat,
                    "meninggal" => "".$meninggal
                );
                $no++;
            }

        }

        echo json_encode($data);
    }

    public function getPdp()
    {
        $model = $this->M_servicesMobile;
        $d = $model->getKecamatan();

        $no = 0;
        $data = array();
        foreach ($d as $key) {
            $id = $key->id_kecamatan;
            $ranap = $model->getData("pdp_ranap", $id);
            $rujuk = $model->getData("pdp_rujuk", $id);
            $rajal = $model->getData("pdp_rajal", $id);
            $sehat = $model->getData("pdp_sehat", $id);
            $meninggal = $model->getData("pdp_meniggal", $id);

            // if ($rawat != 0 || $rawat_luar != 0 || $sehat != 0 || $meninggal != 0) {
                $data['data'][$no] = array(
                    "nama_kec" => $key->nama_kecamatan,
                    "ranap" => "".$ranap,
                    "rujuk" => "".$rujuk,
                    "rajal" => "".$rajal,
                    "sehat" => "".$sehat,
                    "meninggal" => "".$meninggal
                );
                $no++;
            // }

        }

        echo json_encode($data);
    }

}

/* End of file Services.php */
