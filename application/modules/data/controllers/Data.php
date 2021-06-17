<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_data");
    }

    public function index()
    {
        $model = $this->M_data;
        $data['kecamatan'] = $model->getKecamatan();
        $data['rs'] = $model->getFaskes("RS");
        $data['pkm'] = $model->getFaskes("PKM");

        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");


        $api = $model->get_realtime();
        $api2 = $model->get_cut_off();

        $data['update_at_realtime'] = $api['updated_at'];
        $data['suspek'] = $api['suspek'];
        $data['probable'] = $api['probable'];
        $data['konfirmasi'] = $api['konfirmasi'];

        $data['update_at_cutoff'] = $api2['updated_at'];
        $data['suspek_cut'] = $api2['suspek'];
        $data['probable_cut'] = $api2['probable'];
        $data['konfirmasi_cut'] = $api2['konfirmasi'];

        $this->template('dashboard', $data);
    }

    public function odp($kondisi, $d)
    {
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        $data['rs'] = $model->getFaskes("RS");
        $data['pkm'] = $model->getFaskes("PKM");

        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }
        if ($kondisi == "kecamatan") {
            $data['nama_lap'] = "PER KECAMATAN";
            $data['laporan'] = $model->getODP("kec", $d);
        } elseif ($kondisi == "faskes") {
            $data['nama_lap'] = "PER FASYANKES";
            $data['laporan'] = $model->getODP("faskes", $d);
        } elseif ($kondisi == "rs") {
            $data['nama_lap'] = "PER RUMAH SAKIT";
            $data['laporan'] = $model->getODP("rs", $d);
        } elseif ($kondisi == "puskesmas") {
            $data['nama_lap'] = "PER PUSKESMAS";
            $data['laporan'] = $model->getODP("puskesmas", $d);
        } elseif ($kondisi == "desa") {
            $data['nama_lap'] = "PER DESA/KELURAHAN";
            $data['laporan'] = $model->getODP("desa", $d);
        }
        $this->template('odp', $data);
    }

    public function pdp($kondisi, $d = "")
    {
        $model = $this->M_data;
        $data['kecamatan'] = $model->getKecamatan();
        $data['rs'] = $model->getFaskes("RS");
        $data['pkm'] = $model->getFaskes("PKM");

        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");

        if ($kondisi == "ranap") {
            $data['nama_lap'] = "RAWAT INAP DI JEPARA";
            $data['laporan'] = $model->getPDP("ranap", $d);
        } elseif ($kondisi == "rujuk") {
            $data['nama_lap'] = "RAWAT INAP DILUAR JEPARA";
            $data['laporan'] = $model->getPDP("rujuk", $d);
        } elseif ($kondisi == "rajal") {
            $data['nama_lap'] = "PENGAWASAN FASYANKES";
            $data['laporan'] = $model->getPDP("rajal", $d);
        } elseif ($kondisi == "pulang") {
            $data['nama_lap'] = "PULANG/SEHAT";
            $data['laporan'] = $model->getPDP("pulang", $d);
        } elseif ($kondisi == "meninggal") {
            $data['nama_lap'] = "MENINGGAL";
            $data['laporan'] = $model->getPDP("meninggal", $d);
        } elseif ($kondisi == "rajal_rs") {
            $data['nama_lap'] = "PENGAWASAN FASYANKES";
            $data['laporan'] = $model->getPDP("rajal_rs", $d);
        } elseif ($kondisi == "rajal_pkm") {
            $data['nama_lap'] = "PENGAWASAN FASYANKES";
            $data['laporan'] = $model->getPDP("rajal_pkm", $d);
        }
        $this->template('pdp', $data);
    }

    public function covid($kondisi, $d = "")
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        $data['rs'] = $model->getFaskes("RS");
        $data['pkm'] = $model->getFaskes("PKM");

        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }

        if ($kondisi == "ranap") {
            if ($d == "dalam") {
                $data['nama_lap'] = "PERAWATAN DI JEPARA";
            } elseif ($d == "luar") {
                $data['nama_lap'] = "PERAWATAN LUAR JEPARA";
            } else {
                $data['nama_lap'] = "DALAM PERAWATAN";
            }
            $data['laporan'] = $model->getCovid("ranap", $d);
        } elseif ($kondisi == "sembuh") {
            $data['nama_lap'] = "SEMBUH";
            $data['laporan'] = $model->getCovid("sembuh", $d);
        } elseif ($kondisi == "meninggal") {
            $data['nama_lap'] = "MENINGGAL";
            $data['laporan'] = $model->getCovid("meninggal", $d);
        } elseif ($kondisi == "semua") {
            $data['nama_lap'] = "Keseluruhan";
            $data['laporan'] = $model->getCovid("semua", $d);
        }

        if ($kondisi == "semua") {
            $this->template('covid2', $data);
        } else {
            $this->template('covid', $data);
        }
    }

    public function penyakit($kondisi)
    {
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        $data['rs'] = $model->getFaskes("RS");
        $data['pkm'] = $model->getFaskes("PKM");
        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }

        if ($kondisi == "covid") {
            $data['nama_lap'] = "PASIEN TERKONFIRMASI POSITIF";
        } else {
            $data['nama_lap'] = "PASIEN SUSPEK (ODP dan PDP)";
        }
        $data['laporan'] = $model->get_penyakit($kondisi);
        $this->template("penyakit", $data);
    }

    public function suspek($posisi, $d)
    {
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }

        if ($posisi == "kecamatan") {
            if ($d == "all") {
                $data['nama_lap'] = "SEMUA KECAMATAN";
            } else {
                $data['nama_lap'] = "KECAMATAN " . $model->get_nama_kec($d);
            }

            $data['laporan'] = $model->get_suspek("1", $d);
        } else {
            $data['nama_lap'] = "DESA/KELURAHAN " . $model->get_nama_kel($d);
            $data['laporan'] = $model->get_suspek("2", $d);
        }

        $this->template('suspek', $data);
    }

    public function probable($posisi, $d)
    {
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }

        if ($posisi == "kecamatan") {
            if ($d == "all") {
                $data['nama_lap'] = "SEMUA KECAMATAN";
            } else {
                $data['nama_lap'] = "KECAMATAN " . $model->get_nama_kec($d);
            }

            $data['laporan'] = $model->get_probable("1", $d);
        } else {
            $data['nama_lap'] = "DESA/KELURAHAN " . $model->get_nama_kel($d);
            $data['laporan'] = $model->get_probable("2", $d);
        }

        $this->template('probable', $data);
    }

    public function konfirmasi($posisi, $d)
    {
        $model = $this->M_data;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['kecamatan'] = $model->getKecamatan();
        foreach ($data['kecamatan'] as $key) {
            $kel = $model->getKelurahan($key->kode);
            $no = 0;
            foreach ($kel as $key2) {
                $data['kel'][$key->kode][$no] = array(
                    "id_kel" => $key2->id_kelurahan,
                    "nama_kel" => $key2->nama_kelurahan
                );
                $no++;
            }
        }

        if ($posisi == "kecamatan") {
            if ($d == "all") {
                $data['nama_lap'] = "SEMUA KECAMATAN";
            } else {
                $data['nama_lap'] = "KECAMATAN " . $model->get_nama_kec($d);
            }

            $data['laporan'] = $model->get_konfirmasi("1", $d);
        } else {
            $data['nama_lap'] = "DESA/KELURAHAN " . $model->get_nama_kel($d);
            $data['laporan'] = $model->get_konfirmasi("2", $d);
        }

        $this->template('konfirmasi', $data);
    }


    public function ambilData()
    {
        $data["bulan"] = array(
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
        );

        $this->load->view('ambilData', $data);
    }

    public function cetakData($bln, $tgl, $tgl2)
    {
        $model = $this->M_data;
        $bulan = array(
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
        );

        $data['bulan'] = $bulan[$bln];
        $data['bln'] = $bln;

        if ($bln <= "07") {
            $data['kasus_1'] = $model->ambilLama("1", $tgl, $tgl2)->result();
            $data['kasus_2'] = $model->ambilLama("2", $tgl, $tgl2)->result();
            $data['kasus_3'] = $model->ambilLama("3", $tgl, $tgl2)->result();

            $data['rekap'] = array(
                "ODP" => $model->ambilLama("1", $tgl, $tgl2)->num_rows(),
                "PDP" => $model->ambilLama("2", $tgl, $tgl2)->num_rows(),
                "POSITIF" => $model->ambilLama("3", $tgl, $tgl2)->num_rows(),
            );
        } else {
            $data['kasus_1'] = $model->ambilBaru("1", $tgl, $tgl2)->result();
            $data['kasus_2'] = $model->ambilBaru("2", $tgl, $tgl2)->result();
            $data['kasus_3'] = $model->ambilBaru("3", $tgl, $tgl2)->result();

            $data['rekap'] = array(
                "SUSPEK" => $model->ambilBaru("1", $tgl, $tgl2)->num_rows(),
                "PROBABEL" => $model->ambilBaru("2", $tgl, $tgl2)->num_rows(),
                "TERKONFIRMASI" => $model->ambilBaru("3", $tgl, $tgl2)->num_rows(),
            );
        }


        $this->load->view('cetakData', $data);
    }
}

/* End of file Data.php */