<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ServicesV2 extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_services');
        $this->load->model('M_peta');
    }

    public function get_data_cut_off()
    {
        $model = $this->M_services;

        $data = $model->get_cut_off();

        echo json_encode($data);
    }

    public function get_data_kecamatan()
    {
        $model = $this->M_services;
        $data = $model->get_kecamatan();

        echo json_encode($data);
    }

    public function get_data_kelurahan($kode)
    {
        $model = $this->M_services;
        $data = $model->get_kelurahan($kode);

        echo json_encode($data);
    }

    public function get_data_kelurahan_all()
    {
        $model = $this->M_services;
        $data = $model->get_kelurahan_all();

        echo json_encode($data);
    }

    public function get_peta()
    {
        header('Access-Control-Allow-Origin: *');
        $model = $this->M_services;
        $peta = $this->M_peta;
        $kel = $model->get_kelurahan_all();

        $data['type'] = "FeatureCollection";

        $i = 0;
        foreach ($kel as $key) {
            $geo = $peta->get_desa($key->kode_capil);
            if ($geo != 0) {
                $data['features'][$i]['type'] = "Feature";
                $data['features'][$i]['properties'] = array(
                    "id_kelurahan" => $key->id_kelurahan2,
                    "kode_capil" => $key->kode_capil,
                    "name" => $key->nama_kelurahan,
                    "suspek" => $key->suspek_dirawat + $key->suspek_isolasi,
                    "suspek_discarded" => $key->suspek_discard,
                    "probable" => $key->probable_dirawat + $key->probable_isolasi,
                    "probable_sembuh" => $key->probable_sembuh,
                    "probable_meninggal" => $key->probable_meninggal,
                    "konfirmasi" => $key->konfirmasi_dirawat + $key->konfirmasi_isolasi,
                    "konfirmasi_sembuh" => $key->konfirmasi_sembuh,
                    "konfirmasi_meninggal" => $key->konfirmasi_meninggal,
                );
                $data['features'][$i]['geometry'] = $geo;

                $i++;
            }
        }

        echo json_encode($data);
    }

    public function get_peta_by($id_kec, $jenis)
    {
        header('Access-Control-Allow-Origin: *');
        $model = $this->M_services;
        $peta = $this->M_peta;
        $kec = $model->get_kecamatan_by($id_kec);
        $kel = $model->get_kelurahan($id_kec);

        if ($jenis == "konfirmasi") {
            $data['jenis'] = 1;
        } elseif ($jenis == "probable") {
            $data['jenis'] = 2;
        } elseif ($jenis == "suspek") {
            $data['jenis'] = 3;
        }
        $data['lat'] = floatval($kec->lat);
        $data['long'] = floatval($kec->long);
        $data['zoom'] = floatval($kec->zoom);
        $data['type'] = "FeatureCollection";

        $i = 0;
        foreach ($kel as $key) {
            $geo = $peta->get_desa($key->kode_capil);
            if ($geo != 0) {
                $data['features'][$i]['type'] = "Feature";

                if ($jenis == "konfirmasi") {
                    $data['features'][$i]['properties'] = array(
                        "id_kelurahan" => $key->id_kelurahan2,
                        "kode_capil" => $key->kode_capil,
                        "name" => $key->nama_kelurahan,
                        "saat_ini" => $key->konfirmasi_dirawat + $key->konfirmasi_isolasi,
                        "sembuh" => $key->konfirmasi_sembuh,
                        "meninggal" => $key->konfirmasi_meninggal,
                    );
                } elseif ($jenis == "probable") {
                    $data['features'][$i]['properties'] = array(
                        "id_kelurahan" => $key->id_kelurahan2,
                        "kode_capil" => $key->kode_capil,
                        "name" => $key->nama_kelurahan,
                        "saat_ini" => $key->probable_dirawat + $key->probable_isolasi,
                        "sembuh" => $key->probable_sembuh,
                        "meninggal" => $key->probable_meninggal,
                    );
                } elseif ($jenis == "suspek") {
                    $data['features'][$i]['properties'] = array(
                        "id_kelurahan" => $key->id_kelurahan2,
                        "kode_capil" => $key->kode_capil,
                        "name" => $key->nama_kelurahan,
                        "saat_ini" => $key->suspek_dirawat + $key->suspek_isolasi,
                        "discarded" => $key->suspek_discard,
                    );
                }

                $data['features'][$i]['geometry'] = $geo;

                $i++;
            }
        }

        echo json_encode($data);
    }

    public function get_data_harian()
    {
        $model = $this->M_services;
        $awal = $model->get_first_date();
        $akhir = $model->get_last_date();
        // $tanggal1 = date('Y-m-d', strtotime('2019-03-01'));
        // $tanggal2 = date('Y-m-d', strtotime('2019-03-13'));

        $i = 0;
        while ($awal <= $akhir) {
            $d = $model->get_update_tgl($awal);
            $data[$i]['tanggal'] = $awal;
            $data[$i]['covid'] = $d->konfirmasi_dirawat_baru + $d->konfirmasi_isolasi_baru;
            $data[$i]['sembuh'] = $d->konfirmasi_sembuh_baru;
            $data[$i]['meninggal'] = $d->konfirmasi_meninggal_baru;
            $data[$i]['suspek'] = $d->suspek_dirawat_baru + $d->suspek_isolasi_baru;
            $data[$i]['probable'] = $d->probable_dirawat_baru + $d->probable_isolasi_baru;

            $data[$i]['covid_sum'] = $d->konfirmasi_dirawat + $d->konfirmasi_isolasi;
            $data[$i]['sembuh_sum'] = $d->konfirmasi_sembuh;
            $data[$i]['meninggal_sum'] = $d->konfirmasi_meninggal;
            $data[$i]['suspek_sum'] = $d->suspek_dirawat + $d->suspek_isolasi;
            $data[$i]['probable_sum'] = $d->probable_dirawat + $d->probable_isolasi;

            $awal = date('Y-m-d', strtotime('+1 days', strtotime($awal)));
            $i++;
        }

        echo json_encode($data);
    }

    public function get_data_harian_2()
    {
        $model = $this->M_services;
        $awal = $model->get_first_date();
        $akhir = $model->get_last_date();
        // $awal = date('Y-m-d', strtotime('2019-03-01'));
        // $akhir = date('Y-m-d', strtotime('2020-12-31'));

        // $i = 0;
        // while ($awal <= $akhir) {
        //     $d = $model->get_update_tgl_2($awal);
        //     $data[$i]['tanggal'] = $awal;
        //     if ($d->num_rows() > 0) {
        //         $dt = $d->row();
        //         $data[$i]['covid'] = $dt->konfirmasi_total;
        //         $data[$i]['suspek'] = $dt->suspek_total;
        //         $data[$i]['probable'] = $dt->probable_total;
        //         $data[$i]['week'] = $dt->week;
        //     } else {
        //         $data[$i]['covid'] = "0";
        //         $data[$i]['suspek'] = "0";
        //         $data[$i]['probable'] = "0";
        //         $data[$i]['week'] = "0";
        //     }


        //     $awal = date('Y-m-d', strtotime('+1 days', strtotime($awal)));
        //     $i++;
        // }

        $i = 0;
        $d = $model->get_update_tgl_2()->result();
        foreach ($d as $key) {
            $data[$i]['minggu'] = $key->minggu;
            $data[$i]['covid'] = $key->konfirmasi_total;

            $i++;
        }

        echo json_encode($data);
    }

    public function get_data_gender()
    {
        $model = $this->M_services;
        $data[0] = $model->get_gender('1');
        $data[1] = $model->get_gender('2');

        echo json_encode($data);
    }

    public function get_data_faskes()
    {
        $model = $this->M_services;

        $rs = $model->get_rs();
        $no = 0;
        $tgl = $model->get_update_rs();
        $data['tgl_update'] = $tgl;
        foreach ($rs as $key) {
            $telp = $model->getFaskesTelp($key->id_faskes);
            $suspek = $model->get_pasien_by($key->nama_faskes, "3");
            $probable = $model->get_pasien_by($key->nama_faskes, "2");
            $konfirmasi = $model->get_pasien_by($key->nama_faskes, "1");

            $data['data'][$no]['id_faskes'] = $key->id_faskes;
            $data['data'][$no]['nama_faskes'] = $key->nama_faskes;
            $data['data'][$no]['gmaps'] = $key->gmaps;
            $data['data'][$no]['alamat'] = $key->alamat;
            $data['data'][$no]['telp'] = $telp;
            $data['data'][$no]['suspek'] = $suspek;
            $data['data'][$no]['probable'] = $probable;
            $data['data'][$no]['konfirmasi'] = $konfirmasi;
            $no++;
        }

        $suspek2 = $model->get_pasien_luar("3");
        $probable2 = $model->get_pasien_luar("2");
        $konfirmasi2 = $model->get_pasien_luar("1");

        $data['data'][$no]['id_faskes'] = 99;
        $data['data'][$no]['nama_faskes'] = "RS LUAR DAERAH";
        $data['data'][$no]['gmaps'] = "x";
        $data['data'][$no]['alamat'] = "x";
        $data['data'][$no]['telp'] = array(
            array(
                "id_faskel_telp" => 99,
                "id_faskes" => 99,
                "v_telp" => "x",
                "l_telp" => "x"
            )
        );
        $data['data'][$no]['suspek'] = $suspek2;
        $data['data'][$no]['probable'] = $probable2;
        $data['data'][$no]['konfirmasi'] = $konfirmasi2;

        echo json_encode($data);
    }

    public function get_data_penyakit()
    {
        $model = $this->M_services;

        $data = $model->get_penyakit();

        echo json_encode($data);
    }

    public function generate_nik()
    {
        $token = $this->session->userdata("token");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/generate-nik",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $token,
                "Accept: application/json",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}

/* End of file ServicesV2.php */
