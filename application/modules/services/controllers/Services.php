<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{
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
        // $model->cekPasien();
        $t = $model->getTgl();
        $odp = array(
            "lama" => $model->getODP("lama"),
            "baru" => $model->getODP("baru"),
            "proses" => $model->getODP("proses"),
            "komulatif" => $model->getODP("komulatif"),
            "lulus" => $model->getODP("lulus")
        );
        $pdp = array(
            "ranap" => $model->getPDP("ranap"),
            "rajal" => $model->getPDP("rajal"),
            "rujuk" => $model->getPDP("rujuk"),
            "sembuh" => $model->getPDP("sembuh"),
            "komulatif" => $model->getPDP("komulatif"),
            "lama" => $model->getPDP("lama"),
            "baru" => $model->getPDP("baru"),
            "meninggal" => $model->getPDP("meninggal")
        );
        $covid = array(
            "rawat" => $model->getCovid("rawat"),
            "sembuh" => $model->getCovid("sembuh"),
            "meninggal" => $model->getCovid("meninggal"),
            "komulatif" => $model->getCovid("komulatif"),
            "rawat_luar" => $model->getCovid("rawat_luar")
        );
        $data['tgl_update'] = $t->valid_at;
        $data['odp'] = $odp;
        $data['pdp'] = $pdp;
        $data['covid'] = $covid;

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

            $data[$no]['id_kec'] = $key->id_kecamatan;
            $data[$no]['nama_kec'] = "KEC. " . $key->nama_kecamatan;
            $data[$no]['odp'] = $key->odp;
            $data[$no]['odp_selesai'] = $key->odp_selesai;
            $data[$no]['pdp'] = $key->pdp;
            $data[$no]['pdp_sehat'] = $key->pdp_sehat;
            $data[$no]['pdp_meninggal'] = $key->pdp_meninggal;
            $data[$no]['covid_all'] = $key->covid_all;
            $data[$no]['covid_sembuh'] = $key->covid_sembuh;
            $data[$no]['covid_meninggal'] = $key->covid_meninggal;
            $data[$no]['pp'] = $key->pp;
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $data[$no]['kode'] = $key->kode;
            $data[$no]['pp'] = $model->getPPByIdKec($key->id_kecamatan);
            $no++;
        }

        echo json_encode($data);
    }

    public function getKecamatan2()
    {
        $model = $this->M_services;

        $kec = $model->getKecamatan();

        $no = 0;
        foreach ($kec as $key) {
            $id = $key->id_kecamatan;

            $data[$no]['id_kec'] = $key->id_kecamatan;
            $data[$no]['nama_kec'] = "KEC. " . $key->nama_kecamatan;
            $data[$no]['odp'] = $key->odp;
            $data[$no]['odp_selesai'] = $key->odp_selesai;
            $data[$no]['pdp'] = $key->pdp;
            $data[$no]['pdp_sehat'] = $key->pdp_sehat;
            $data[$no]['pdp_meninggal'] = $key->pdp_meninggal;
            $data[$no]['covid_all'] = $key->covid_all;
            $data[$no]['covid_sembuh'] = $key->covid_sembuh;
            $data[$no]['covid_meninggal'] = $key->covid_meninggal;
            $data[$no]['pp'] = $key->pp;
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $data[$no]['kode'] = $key->kode;
            $data[$no]['pp'] = $model->getPPByIdKec($key->id_kecamatan);
            $no++;
        }

        echo json_encode($data);
    }

    public function getDataKelurahan()
    {
        $model = $this->M_services;

        $kec = $model->getKelurahan();

        $no = 0;
        foreach ($kec as $key) {
            $data[$no]['id_kec'] = $key->id_kelurahan;
            $data[$no]['nama_kec'] = $key->nama_kelurahan;
            $data[$no]['odp'] = $key->odp;
            $data[$no]['odp_selesai'] = $key->odp_selesai;
            $data[$no]['pdp'] = $key->pdp;
            $data[$no]['pdp_sehat'] = $key->pdp_sehat;
            $data[$no]['pdp_meninggal'] = $key->pdp_meninggal;
            $data[$no]['covid_all'] = $key->covid_all;
            $data[$no]['covid_sembuh'] = $key->covid_sembuh;
            $data[$no]['covid_meninggal'] = $key->covid_meninggal;
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $data[$no]['kd_capil'] = $key->kode_capil;
            $no++;
        }

        echo json_encode($data);
    }

    public function getDataKelurahanById($id)
    {
        $model = $this->M_services;

        $kec = $model->getKelurahanById($id);

        $no = 0;
        foreach ($kec as $key) {
            $data[$no]['id_kec'] = $key->id_kelurahan;
            $data[$no]['nama_kec'] = $key->nama_kelurahan;
            $data[$no]['odp'] = $key->odp;
            $data[$no]['odp_selesai'] = $key->odp_selesai;
            $data[$no]['pdp'] = $key->pdp;
            $data[$no]['pdp_sehat'] = $key->pdp_sehat;
            $data[$no]['pdp_meninggal'] = $key->pdp_meninggal;
            $data[$no]['covid_all'] = $key->covid_all;
            $data[$no]['covid_sembuh'] = $key->covid_sembuh;
            $data[$no]['covid_meninggal'] = $key->covid_meninggal;
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $data[$no]['kd_capil'] = $key->kode_capil;
            $data[$no]['pp'] = $model->getPPByIdKel($key->id_kelurahan);
            $no++;
        }

        echo json_encode($data);
    }

    public function getDataKelurahanById2($id)
    {
        $model = $this->M_services;

        $kec = $model->getKelurahanById2($id);

        $no = 0;
        foreach ($kec as $key) {
            $data[$no]['id_kec'] = $key->id_kelurahan;
            $data[$no]['nama_kec'] = $key->nama_kelurahan;
            $data[$no]['odp'] = $key->odp;
            $data[$no]['odp_selesai'] = $key->odp_selesai;
            $data[$no]['pdp'] = $key->pdp;
            $data[$no]['pdp_sehat'] = $key->pdp_sehat;
            $data[$no]['pdp_meninggal'] = $key->pdp_meninggal;
            $data[$no]['covid_all'] = $key->covid_all;
            $data[$no]['covid_sembuh'] = $key->covid_sembuh;
            $data[$no]['covid_meninggal'] = $key->covid_meninggal;
            $data[$no]['lat'] = $key->lat;
            $data[$no]['long'] = $key->long;
            $data[$no]['kd_capil'] = $key->kode_capil;
            $data[$no]['pp'] = $model->getPPByIdKel($key->id_kelurahan);
            $no++;
        }

        echo json_encode($data);
    }

    public function getLuarDaerah()
    {
        $model = $this->M_services;

        $key = $model->getLuarDaerah();

        $data['id_kec'] = $key->id_kecamatan;
        $data['nama_kec'] = $key->nama_kecamatan;
        $data['odp'] = $key->odp;
        $data['odp_selesai'] = $key->odp_selesai;
        $data['pdp'] = $key->pdp;
        $data['pdp_sehat'] = $key->pdp_sehat;
        $data['pdp_meninggal'] = $key->pdp_meninggal;
        $data['covid_all'] = $key->covid_all;
        $data['covid_sembuh'] = $key->covid_sembuh;
        $data['covid_meninggal'] = $key->covid_meninggal;
        $data['pp'] = $key->pp;
        $data['lat'] = $key->lat;
        $data['long'] = $key->long;
        $data['kode'] = $key->kode;
        $data['pp'] = $model->getPPByIdKec($key->id_kecamatan);

        echo json_encode($data);
    }

    public function getLuarDaerah2()
    {
        $model = $this->M_services;

        $key = $model->getLuarDaerah2();

        $data['id_kec'] = $key->id_kecamatan;
        $data['nama_kec'] = $key->nama_kecamatan;
        $data['odp'] = $key->odp;
        $data['odp_selesai'] = $key->odp_selesai;
        $data['pdp'] = $key->pdp;
        $data['pdp_sehat'] = $key->pdp_sehat;
        $data['pdp_meninggal'] = $key->pdp_meninggal;
        $data['covid_all'] = $key->covid_all;
        $data['covid_sembuh'] = $key->covid_sembuh;
        $data['covid_meninggal'] = $key->covid_meninggal;
        $data['pp'] = $key->pp;
        $data['lat'] = $key->lat;
        $data['long'] = $key->long;
        $data['kode'] = $key->kode;
        $data['pp'] = $model->getPPByIdKec($key->id_kecamatan);

        echo json_encode($data);
    }

    public function getHarian2()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_services;
        $a = 0;
        $odp = 0;
        $pdp = 0;
        $cvd = 0;
        for ($i = 4; $i >= 0; $i--) {
            $sblm = mktime(0, 0, 0, date('n'), date('j') - $i, date('Y'));
            $tgl = date("Y-m-d", $sblm);
            $d = $model->getUpdateHarian($tgl);
            $data[$a]['tanggal'] = $tgl;

            if ($d == 0) {
                $sblm2 = mktime(0, 0, 0, date('n'), date('j') - 1, date('Y'));
                $tgl2 = date("Y-m-d", $sblm2);
                $d2 = $model->getUpdateHarian($tgl2);

                $data[$a]['odp'] = $d2->odp_proses;
                $data[$a]['pdp'] = $d2->pdp_ranap + $d2->pdp_rajal + $d2->pdp_rujuk;
                $data[$a]['covid'] = $d2->rawat + $d2->rawat_luar + $d2->rajal;
            } else {
                $data[$a]['odp'] = $d->odp_proses;
                $data[$a]['pdp'] = $d->pdp_ranap + $d->pdp_rajal + $d->pdp_rujuk;
                $data[$a]['covid'] = $d->rawat + $d->rawat_luar + $d->rajal;
            }

            $a++;
        }

        echo json_encode($data);
    }
    public function getHarian3()
    {
        // error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_services;
        $a = 0;
        $tgl = "2020-03-31";
        $ke = date("Y-m-d");
        while (strtotime($tgl) <= strtotime($ke)) {

            $d = $model->getUpdateHarian2($tgl);
            $data[$a]['tanggal'] = $tgl;

            $data[$a]['odp'] = $d->odp_proses;
            $data[$a]['pdp'] = $d->pdp_ranap + $d->pdp_rajal + $d->pdp_rujuk;
            $data[$a]['covid'] = $d->rawat + $d->rawat_luar + $d->rajal;

            $tgl = date("Y-m-d", strtotime("+1 day", strtotime($tgl))); //looping tambah 1 date
            $a++;
        }

        echo json_encode($data);
    }
    public function getHarian4()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_services;
        $a = 0;
        $odp = 0;
        $pdp = 0;
        $cvd = 0;
        for ($i = 4; $i >= 0; $i--) {
            $sblm = mktime(0, 0, 0, date('n'), date('j') - $i, date('Y'));
            $tgl = date("Y-m-d", $sblm);
            $d = $model->getUpdateHarian($tgl);
            $data[$a]['tanggal'] = $tgl;

            if ($d == 0) {
                $sblm2 = mktime(0, 0, 0, date('n'), date('j') - 1, date('Y'));
                $tgl2 = date("Y-m-d", $sblm2);
                $d2 = $model->getUpdateHarian($tgl2);

                $data[$a]['odp'] = $d2->odp_proses;
                $data[$a]['pdp'] = $d2->pdp_ranap + $d2->pdp_rajal + $d2->pdp_rujuk;
                $data[$a]['covid'] = $d2->rawat + $d2->rawat_luar + $d2->rajal;
            } else {
                $data[$a]['odp'] = $d->odp_proses;
                $data[$a]['pdp'] = $d->pdp_ranap + $d->pdp_rajal + $d->pdp_rujuk;
                $data[$a]['covid'] = $d->rawat + $d->rawat_luar + $d->rajal;
            }

            $a++;
        }

        echo json_encode($data);
    }
    public function getHarian5()
    {
        // error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_services;
        $a = 0;
        $tgl = "2020-07-13";
        $ke = date("Y-m-d");
        while (strtotime($tgl) <= strtotime($ke)) {

            $d = $model->getUpdateHarian($tgl);
            $data[$a]['tanggal'] = $tgl;

            $data[$a]['odp'] = $d->odp_proses;
            $data[$a]['pdp'] = $d->pdp_ranap + $d->pdp_rajal + $d->pdp_rujuk;
            $data[$a]['covid'] = $d->rawat + $d->rawat_luar + $d->rajal;

            $tgl = date("Y-m-d", strtotime("+1 day", strtotime($tgl))); //looping tambah 1 date
            $a++;
        }

        echo json_encode($data);
    }
    public function getHarian()
    {
        // error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_services;
        $a = 0;
        $odp = 0;
        $pdp = 0;
        $cvd = 0;
        for ($i = 4; $i >= 0; $i--) {
            $sblm = mktime(0, 0, 0, date('n'), date('j') - $i, date('Y'));
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

    public function getKelurahan()
    {
        $model = $this->M_services;
        $id = $this->input->post('id');

        $kec = $model->getKecamatanBy($id);
        $kel = $model->getKelurahanBy($kec->kode);
        $no = 0;
        foreach ($kel as $key) {
            $data[$no]['id_kelurahan'] = $key->id_kelurahan;
            $data[$no]['nama_kelurahan'] = $key->nama_kelurahan;

            $no++;
        }

        echo json_encode($data);
    }

    public function getData2()
    {
        $model = $this->M_services;
        $d = $model->getUpdate();
        if ($d['data'] != '0') {
            $a = $d['data'];
            $odp = array(
                "lama" => $a->odp_lama,
                "baru" => $a->odp_baru,
                "komulatif" => $a->odp_all,
                "lulus" => $a->odp_lulus,
                "proses" => $a->odp_proses
            );
            $pdp = array(
                "ranap" => $a->pdp_ranap,
                "rajal" => $a->pdp_rajal,
                "rujuk" => $a->pdp_rujuk,
                "sembuh" => $a->pdp_sembuh,
                "komulatif" => $a->pdp_all,
                "lama" => $a->pdp_lama,
                "baru" => $a->pdp_baru,
                "meninggal" => $a->pdp_meninggal
            );
            $covid = array(
                "rawat" => $a->rawat,
                "sembuh" => $a->sembuh,
                "meninggal" => $a->meninggal,
                "komulatif" => $a->covid_all,
                "rawat_luar" => $a->rawat_luar,
                "rajal" => $a->rajal
            );
            $data['tgl_update'] = $a->update_at;
            $data['odp'] = $odp;
            $data['pdp'] = $pdp;
            $data['covid'] = $covid;
        } else {
            $data['tgl_update'] = $d['update_at'];
            $odp = array(
                "lama" => $d['data'],
                "baru" => $d['data'],
                "komulatif" => $d['data'],
                "lulus" => $d['data'],
                "proses" => $d['data']
            );
            $pdp = array(
                "ranap" => $d['data'],
                "rajal" => $d['data'],
                "rujuk" => $d['data'],
                "sembuh" => $d['data'],
                "komulatif" => $d['data'],
                "lama" => $d['data'],
                "baru" => $d['data'],
                "meninggal" => $d['data']
            );
            $covid = array(
                "rawat" => $d['data'],
                "sembuh" => $d['data'],
                "meninggal" => $d['data'],
                "komulatif" => $d['data'],
                "rawat_luar" => $d['data'],
                "rajal" => $d['data']
            );
            $data['odp'] = $odp;
            $data['pdp'] = $pdp;
            $data['covid'] = $covid;
        }


        $msg = array("Data" => $data);
        echo json_encode($msg);
    }

    public function getData2uji()
    {
        $model = $this->M_services;
        $d = $model->getUpdate2();
        if ($d['data'] != '0') {
            $a = $d['data'];
            $odp = array(
                "lama" => $a->odp_lama,
                "baru" => $a->odp_baru,
                "komulatif" => $a->odp_all,
                "lulus" => $a->odp_lulus,
                "proses" => $a->odp_proses
            );
            $pdp = array(
                "ranap" => $a->pdp_ranap,
                "rajal" => $a->pdp_rajal,
                "rujuk" => $a->pdp_rujuk,
                "sembuh" => $a->pdp_sembuh,
                "komulatif" => $a->pdp_all,
                "lama" => $a->pdp_lama,
                "baru" => $a->pdp_baru,
                "meninggal" => $a->pdp_meninggal
            );
            $covid = array(
                "rawat" => $a->rawat,
                "sembuh" => $a->sembuh,
                "meninggal" => $a->meninggal,
                "komulatif" => $a->covid_all,
                "rawat_luar" => $a->rawat_luar,
                "rajal" => $a->rajal
            );
            $data['tgl_update'] = $a->update_at;
            $data['odp'] = $odp;
            $data['pdp'] = $pdp;
            $data['covid'] = $covid;
        } else {
            $data['tgl_update'] = $d['update_at'];
            $odp = array(
                "lama" => $d['data'],
                "baru" => $d['data'],
                "komulatif" => $d['data'],
                "lulus" => $d['data'],
                "proses" => $d['data']
            );
            $pdp = array(
                "ranap" => $d['data'],
                "rajal" => $d['data'],
                "rujuk" => $d['data'],
                "sembuh" => $d['data'],
                "komulatif" => $d['data'],
                "lama" => $d['data'],
                "baru" => $d['data'],
                "meninggal" => $d['data']
            );
            $covid = array(
                "rawat" => $d['data'],
                "sembuh" => $d['data'],
                "meninggal" => $d['data'],
                "komulatif" => $d['data'],
                "rawat_luar" => $d['data'],
                "rajal" => $d['data']
            );
            $data['odp'] = $odp;
            $data['pdp'] = $pdp;
            $data['covid'] = $covid;
        }


        $msg = array("Data" => $data);
        echo json_encode($msg);
    }

    public function getData3($id)
    {
        $model = $this->M_services;
        // $model->cekPasien();
        $t = $model->getTgl();
        $odp = array(
            "lama" => $model->getODP2("lama", $id),
            "baru" => $model->getODP2("baru", $id),
            "proses" => $model->getODP2("proses", $id),
            "komulatif" => $model->getODP2("komulatif", $id),
            "lulus" => $model->getODP2("lulus", $id)
        );
        $pdp = array(
            "ranap" => $model->getPDP2("ranap", $id),
            "rajal" => $model->getPDP2("rajal", $id),
            "rujuk" => $model->getPDP2("rujuk", $id),
            "sembuh" => $model->getPDP2("sembuh", $id),
            "komulatif" => $model->getPDP2("komulatif", $id),
            "lama" => $model->getPDP2("lama", $id),
            "baru" => $model->getPDP2("baru", $id),
            "meninggal" => $model->getPDP2("meninggal", $id)
        );
        $covid = array(
            "rawat" => $model->getCovid2("rawat", $id),
            "sembuh" => $model->getCovid2("sembuh", $id),
            "meninggal" => $model->getCovid2("meninggal", $id),
            "komulatif" => $model->getCovid2("komulatif", $id),
            "rawat_luar" => $model->getCovid2("rawat_luar", $id)
        );
        $data['tgl_update'] = $t->valid_at;
        $data['odp'] = $odp;
        $data['pdp'] = $pdp;
        $data['covid'] = $covid;

        $msg = array("Data" => $data);
        echo json_encode($msg);
    }


    public function getRS()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_services->search($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->nama_faskes;
            }
            echo json_encode($arr_result);
        }
    }

    public function getFaskes()
    {
        $model = $this->M_services;
        $id = $_POST['id'];
        if ($id == "0") {
            $no = 1;
            $data[0]['nama_faskes'] = "RAWAT JALAN";
            $faskes = $model->getFaskes();
            foreach ($faskes as $key) {
                $data[$no]['nama_faskes'] = $key->nama_faskes;
                $no++;
            }
        } else {
            $no = 0;
            $faskes = $model->getFaskesLuar();
            foreach ($faskes as $key) {
                $data[$no]['nama_faskes'] = $key->nama_faskes_luar . "-" . $key->kota;
                $no++;
            }
        }

        echo json_encode($data);
    }
    public function getFaskes2()
    {
        $model = $this->M_services;
        $id = $_POST['id'];
        $rawat = $_POST['rawat'];
        $sel = "";
        if ($id == "0") {
            $no = 1;
            if ($rawat == "RAWAT JALAN") {
                $sel = "selected";
            } else {
                $sel = "";
            }
            $data[0]['sel'] = $sel;
            $data[0]['nama_faskes'] = "RAWAT JALAN";
            $faskes = $model->getFaskes();
            foreach ($faskes as $key) {
                if ($rawat == $key->nama_faskes) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                $data[$no]['sel'] = $sel;
                $data[$no]['nama_faskes'] = $key->nama_faskes;
                $no++;
            }
        } else {
            $no = 0;
            $faskes = $model->getFaskesLuar();
            foreach ($faskes as $key) {
                if ($rawat == $key->nama_faskes_luar) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                $data[$no]['sel'] = $sel;
                $data[$no]['nama_faskes'] = $key->nama_faskes_luar . "-" . $key->kota;
                $no++;
            }
        }

        echo json_encode($data);
    }
    public function getFaskes3()
    {
        $model = $this->M_services;
        $id = $_POST['id'];
        $no = 0;
        $faskes = $model->getFaskesLuarByKota($id);
        foreach ($faskes as $key) {
            $data[$no]['nama_faskes'] = $key->nama_faskes_luar;
            $no++;
        }
        echo json_encode($data);
    }

    public function getDataFaskes()
    {
        $model = $this->M_services;
        $faskes = $model->getFaskes();
        $no = 0;
        foreach ($faskes as $key) {
            $telp = $model->getFaskesTelp($key->id_faskes);
            $pdp = $model->getPasien("pdp", $key->nama_faskes);
            $covid = $model->getPasien("covid", $key->nama_faskes);

            $data[$no]['id_faskes'] = $key->id_faskes;
            $data[$no]['nama_faskes'] = $key->nama_faskes;
            $data[$no]['gmaps'] = $key->gmaps;
            $data[$no]['alamat'] = $key->alamat;
            $data[$no]['jml_tt'] = $key->tt_pdp;
            $data[$no]['telp'] = $telp;
            $data[$no]['pdp'] = $pdp;
            $data[$no]['covid'] = $covid;
            $no++;
        }

        echo json_encode($data);
    }

    public function getDataPP()
    {
        $model = $this->M_services;
        $a = 0;
        for ($i = 4; $i >= 0; $i--) {
            $sblm = mktime(0, 0, 0, date('n'), date('j') - $i, date('Y'));
            $tgl = date("Y-m-d", $sblm);

            $tgl2 = date('Y-m-d', strtotime('-14 days', strtotime($tgl)));
            $d = $model->getPP($tgl2);
            $data[$a]['tanggal'] = $tgl;
            $data[$a]['transmisi'] = $d['transmisi'];
            $data[$a]['terjangkit'] = $d['terjangkit'];

            $a++;
        }

        echo json_encode($data);
    }

    public function get_pasien()
    {
        $model = $this->M_services;
        $data = $model->get_pasien();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            if ($key->kondisi == '1') {
                $status = "ODP";
                $tipe = "1";
            } elseif ($key->kondisi == '2' && $key->covid == '0') {
                $status = "PDP";
                $tipe = "2";
            } elseif ($key->kondisi == '2' && $key->covid == '1') {
                $status = "COVID-19";
                $tipe = "3";
            } elseif ($key->kondisi == '3') {
                $status = "OTG";
                $tipe = "4";
            }

            if ($key->jekel == '1') {
                $jekel = "L";
            } else {
                $jekel = "P";
            }

            $hsl[$no]['id'] = $key->id_laporan;
            $hsl[$no]['nik'] = $key->nik;
            $hsl[$no]['nama'] = $key->nama;
            $hsl[$no]['status'] = $status;
            $hsl[$no]['tipe'] = $tipe;
            $hsl[$no]['id_kecamatan'] = $key->id_kecamatan;
            $hsl[$no]['nama_kecamatan'] = $key->nama_kecamatan;
            $hsl[$no]['id_kelurahan'] = $key->id_kelurahan;
            $hsl[$no]['nama_kelurahan'] = $key->nama_kelurahan;
            $hsl[$no]['no_telp'] = $key->no_telp;
            $hsl[$no]['alamat_domisili'] = $key->alamat_domisili;
            $hsl[$no]['umur'] = $key->umur;
            $hsl[$no]['id_jekel'] = $key->jekel;
            $hsl[$no]['jekel'] = $jekel;
            $hsl[$no]['wn'] = $key->wn;
            $hsl[$no]['is_form_input'] = true;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function dataTracing($id)
    {
        $model = $this->M_services;
        $data = $model->get_kontak($id);
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            // if ($key->status != '4') {
            $dt = $model->get_tracing($key->kontak);
            $hsl['data'][$no]['id'] = $dt->id_laporan;
            // } else {
            //     $dt = $model->get_tracing_otg($key->kontak);
            //     $hsl['data'][$no]['id'] = $dt->id_otg;
            // }

            if ($key->status == '4') {
                $status = "OTG";
            } elseif ($key->status == '2') {
                $status = "PDP";
            } elseif ($key->status == '1') {
                $status = "ODP";
            } else {
                $status = "COVID-19";
            }

            if ($dt->jekel == '1') {
                $jekel = "L";
            } else {
                $jekel = "P";
            }


            $hsl['data'][$no]['nama'] = $dt->nama;
            $hsl['data'][$no]['status'] = $status;
            $hsl['data'][$no]['tipe'] = $key->status;
            $hsl['data'][$no]['nama_kecamatan'] = $dt->nama_kecamatan;
            $hsl['data'][$no]['nama_kelurahan'] = $dt->nama_kelurahan;
            $hsl['data'][$no]['no_telp'] = $dt->no_telp;
            $hsl['data'][$no]['alamat_domisili'] = $dt->alamat_domisili;
            $hsl['data'][$no]['umur'] = $dt->umur;
            $hsl['data'][$no]['jekel'] = $jekel;
            $hsl['data'][$no]['id_jekel'] = $dt->jekel;
            $hsl['data'][$no]['id_hubungan'] = $key->id_hubungan;
            $hsl['data'][$no]['id_jenis_kontak'] = $key->id_jenis_kontak;
            $hsl['data'][$no]['nik'] = $dt->nik;
            $hsl['data'][$no]['wn'] = $dt->wn;
            $hsl['data'][$no]['id_kecamatan'] = $dt->id_kecamatan;
            $hsl['data'][$no]['id_kelurahan'] = $dt->id_kelurahan;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function dataSwab($id)
    {
        $model = $this->M_services;
        $data = $model->get_swab($id);
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            if ($key->hasil_swab == '1') {
                $swab = "POSITIF";
            } else {
                $swab = "NEGATIF";
            }

            $hsl['data'][$no]['id_swab'] = $key->id_swab;
            $hsl['data'][$no]['tgl_swab'] = $key->tgl_swab;
            $hsl['data'][$no]['id_hasil_swab'] = $key->hasil_swab;
            $hsl['data'][$no]['hasil_swab'] = $swab;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function cekOtg()
    {
        $nik = $_GET['nik'];

        $cek = $this->db->get_where("tb_laporan", ["nik" => $nik])->num_rows();
        $cek2 = $this->db->get_where("tb_otg", ["nik" => $nik])->num_rows();

        if ($cek != 0 || $cek2 != 0) {
            $hsl['is_exist'] = "1";
        } else {
            $hsl['is_exist'] = "0";
        }

        echo json_encode($hsl);
    }

    public function deleteTracing($id_lap, $id)
    {
        $where = array(
            'id_laporan' => $id_lap,
            'kontak' => $id
        );

        $this->db->delete("tb_kontak", $where);
    }

    public function dataRDT($id)
    {
        $model = $this->M_services;
        $data = $model->get_rdt($id);
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            if ($key->hasil_rdt == '1') {
                $rdt = "REAKTIF";
            } else {
                $rdt = "NON REAKTIF";
            }

            $hsl['data'][$no]['id_rdt'] = $key->id_rdt;
            $hsl['data'][$no]['tgl_rdt'] = $key->tgl_rdt;
            $hsl['data'][$no]['id_hasil_rdt'] = $key->hasil_rdt;
            $hsl['data'][$no]['hasil_rdt'] = $rdt;
            $hsl['data'][$no]['lokasi_rdt'] = $key->lokasi_rdt;
            $no++;
        }

        echo json_encode($hsl);
    }

    public function get_penyakit()
    {
        $model = $this->M_services;
        $data = $model->get_penyakit();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            $hsl[$no]['kdiag'] = $key->kdiag;
            $hsl[$no]['diag'] = $key->diag;

            $no++;
        }

        echo json_encode($hsl);
    }
}

/* End of file Services.php */
