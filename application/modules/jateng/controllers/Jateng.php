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
    public function cek_id($nik, $token)
    {
        $model = $this->M_jateng;
        $data['laporan'] = $model->get_data_nik($nik);

        if (isset($_POST['data_id'])) {
            $model->update_id_manual($nik, $_POST['nik'], $_POST['data_id']);
            redirect('../jateng/cek_id/' . $_POST['nik'] . "/" . $token, 'refresh');
        } else {
            $this->load->view('cek_id', $data);
        }
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

    public function get_data_all($token)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/people/all",
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
        $hsl = json_decode($response, true);

        echo "<pre>";
        print_r($hsl);
        echo "</pre>";
    }

    public function get_data($token)
    {
        $model = $this->M_jateng;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/people/all",
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
        $hsl = json_decode($response, true);

        if ($hsl['status'] == "success") {
            $no = 0;
            foreach ($hsl['data'] as $key => $val) {
                $case_id = $val['last_case_id'];
                foreach ($val['cases'] as $key => $val2) {
                    if ($val2['case_id'] == $case_id) {
                        $cek_status = 1;
                        $id_status = $val2['status_id'];
                        $status = $model->get_status($id_status);
                        $faskes_akhir = $model->get_faskes($val2['treatment_place_id']);
                        break;
                    } else {
                        $cek_status = 0;
                    }
                }

                if ($cek_status) {
                    if ($val['district_id'] == "38706") {
                        if (($id_status >= 1 && $id_status <= 4) || ($id_status >= 14 && $id_status <= 15)) {
                            $cek_id = $model->cek_id($val['patient_id']);
                            if ($cek_id->num_rows() == 0) {
                                if ($val['nik'] != "") {
                                    $cek_nik = $model->cek_nik($val['nik']);
                                    if ($cek_nik->num_rows() > 0) {
                                        $dt = $cek_nik->row();
                                        // echo $no++ . ". " . $val['name'] . " - SUDAH ADA (" . $dt->nama_status . ")<br>";
                                    } else {
                                        // echo $no++ . ". " . $val['name'] . " - " . $faskes_akhir . " ( " . $val['patient_id'] . " )<br>";

                                        $data['jateng'][$no]['nama'] = $val['name'];
                                        $data['jateng'][$no]['nama_kecamatan'] = $model->get_kecamatan($val['sub_district_id']);
                                        $data['jateng'][$no]['nama_kelurahan'] = $model->get_kelurahan($val['village_id']);
                                        $data['jateng'][$no]['alamat_domisili'] = $val['address'];
                                        $data['jateng'][$no]['patient_id'] = $val['patient_id'];
                                        $data['jateng'][$no]['status'] = $status;
                                        $data['jateng'][$no]['faskes'] = $faskes_akhir;

                                        $no++;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $this->load->view('get_data_jateng', $data);
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
