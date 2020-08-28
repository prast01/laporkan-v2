<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model("M_services");
	}

    public function index()
    {
        
    }

    public function getData()
    {
        $model = $this->M_services;
        $model->cekPasien();
        $t = $model->getTgl();
        $data['tgl_update'] = $t->valid_at;
        $data['odp'] = $model->getOP("1");
        $data['pdp'] = $model->getOP("2");
        $data['pdp_rawat'] = $model->getPDPrawat();
        $data['covid_all'] = $model->getCovidAll();
        $data['rawat'] = $model->getCovid("0");
        $data['sembuh'] = $model->getCovid("1");
        $data['meninggal'] = $model->getCovid("2");

        $msg = array("Data" => $data);
        echo json_encode($msg);
    }

    public function getKecamatan()
    {
        $model = $this->M_services;

        $kec = $model->getKecamatan();

        $no = 0;
        foreach ($kec as $key) {
            $id = $key->id_kecamatan;

            $data[$no]['nama_kec'] = "KEC. ".$key->nama_kecamatan;
            $data[$no]['odp'] = $model->getOP2("1", $id);
            $data[$no]['pdp'] = $model->getOP2("2", $id);
            $data[$no]['covid_all'] = $model->getCovidAll2($id);
            $data[$no]['rawat'] = $model->getCovid2("0", $id);
            $data[$no]['sembuh'] = $model->getCovid2("1", $id);
            $data[$no]['meninggal'] = $model->getCovid2("2", $id);
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $no++;
        }

        echo json_encode($data);
    }

    public function getHarian()
    {
        $model = $this->M_services;
        $a = 0;
        for ($i=4; $i >= 0 ; $i--) { 
            $sblm = mktime(0, 0, 0, date('n'), date('j')-$i, date('Y'));
            $tgl = date("Y-m-d", $sblm);
            $d = $model->getHarian($tgl);
            $data[$a]['tanggal'] = $tgl;
            $data[$a]['odp'] = $d->jumlah_odp;
            $data[$a]['pdp'] = $d->jumlah_pdp;
            $data[$a]['covid'] = $d->jumlah_covid;
            $a++;
        }

        echo json_encode($data);
    }
}

/* End of file Services.php */
