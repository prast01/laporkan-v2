<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jateng extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_jateng');
    }

    public function index()
    {
        $model = $this->M_jateng;
        $data['data'] = $model->get_data("1");
        $data['token'] = $model->get_token();
        $this->load->view('home', $data);
    }

    public function suspek()
    {
        $model = $this->M_jateng;
        $data['data'] = $model->get_data("3");
        $data['token'] = $model->get_token();
        $this->load->view('home_suspek', $data);
    }

    public function cek_nik($nik, $token)
    {
        $model = $this->M_jateng;
        $data['token'] = $token;
        $data['laporan'] = $model->get_data_nik($nik);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/people/nik?nik=" . $nik,
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
                "Content-Transfer-Encoding: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $hsl = json_decode($response, true);
        if ($hsl['status'] ==  "success") {
            $data['jateng']['nama'] = $hsl['data'][0]['name'];
            $data['jateng']['nama_kecamatan'] = $model->get_kecamatan($hsl['data'][0]['sub_district_id']);
            $data['jateng']['nama_kelurahan'] = $model->get_kelurahan($hsl['data'][0]['village_id']);
            $data['jateng']['alamat_domisili'] = $hsl['data'][0]['address'];
            $data['jateng']['patient_id'] = $hsl['data'][0]['patient_id'];
        } else {
            $data['jateng'] = 0;
        }

        $this->load->view('cek_nik', $data);
    }

    public function cek_nik_all_k($token)
    {
        $model = $this->M_jateng;
        $cek_nik = $model->get_nik("1");
        if ($cek_nik->num_rows() > 0) {
            $nik = $cek_nik->row();
            $data['token'] = $token;
            $data['laporan'] = $model->get_data_nik($nik->nik);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/people/nik?nik=" . $nik->nik,
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
                    "Content-Transfer-Encoding: application/json"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $hsl = json_decode($response, true);
            if ($hsl['status'] ==  "success") {
                $data['jateng']['nama'] = $hsl['data'][0]['name'];
                $data['jateng']['nama_kecamatan'] = $model->get_kecamatan($hsl['data'][0]['sub_district_id']);
                $data['jateng']['nama_kelurahan'] = $model->get_kelurahan($hsl['data'][0]['village_id']);
                $data['jateng']['alamat_domisili'] = $hsl['data'][0]['address'];
                $data['jateng']['patient_id'] = $hsl['data'][0]['patient_id'];

                $this->update_id_all($nik->nik, $data['jateng']['patient_id']);
            } else {
                $this->update_id_all($nik->nik, null);
                $data['jateng'] = 0;
            }

            $this->load->view('cek_nik_all', $data);
        } else {
            $this->db->query("UPDATE tb_laporan_baru SET cek_nik='0'");
            redirect('../jateng', 'refresh');
        }
    }

    public function cek_nik_all_s($token)
    {
        $model = $this->M_jateng;
        $cek_nik = $model->get_nik("3");
        if ($cek_nik->num_rows() > 0) {
            $nik = $cek_nik->row();
            $data['token'] = $token;
            $data['laporan'] = $model->get_data_nik($nik->nik);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/people/nik?nik=" . $nik->nik,
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
                    "Content-Transfer-Encoding: application/json"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $hsl = json_decode($response, true);
            if ($hsl['status'] ==  "success") {
                $data['jateng']['nama'] = $hsl['data'][0]['name'];
                $data['jateng']['nama_kecamatan'] = $model->get_kecamatan($hsl['data'][0]['sub_district_id']);
                $data['jateng']['nama_kelurahan'] = $model->get_kelurahan($hsl['data'][0]['village_id']);
                $data['jateng']['alamat_domisili'] = $hsl['data'][0]['address'];
                $data['jateng']['patient_id'] = $hsl['data'][0]['patient_id'];

                if ($hsl['data'][0]['district_id'] == "38706" && $data['jateng']['nama_kecamatan'] == $data['laporan']['nama_kecamatan'] && $data['jateng']['nama_kelurahan'] == $data['laporan']['nama_kelurahan']) {
                    $this->update_id_all($nik->nik, $data['jateng']['patient_id']);
                } else {
                    $this->update_id_all($nik->nik, null);
                }
            } else {
                $this->update_id_all($nik->nik, null);
                $data['jateng'] = 0;
            }

            $this->load->view('cek_nik_all', $data);
        } else {
            $this->db->query("UPDATE tb_laporan_baru SET cek_nik='0'");
            redirect('../jateng', 'refresh');
        }
    }


    // CRUD
    public function update_id($nik, $id_jateng, $token)
    {
        $model = $this->M_jateng;
        $model->update_id($nik, $id_jateng);

        redirect('../jateng/cek_nik/' . $nik . "/" . $token, 'refresh');
    }

    public function update_id_all($nik, $id_jateng)
    {
        $model = $this->M_jateng;
        $model->update_id_all($nik, $id_jateng);
    }
}

/* End of file Jateng.php */
