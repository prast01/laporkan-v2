<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jateng extends MY_Controller
{

    // DOKUMENTASI JATENG
    // http://bit.ly/docs-api-corona-jateng

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_jateng');

        $this->_base = "https://admin.corona.jatengprov.go.id/api";
    }

    public function refresh()
    {
        $model = $this->M_jateng;
        $data['token'] = $model->get_refresh_token();
        $this->session->set_userdata('token', $data['token']);
        redirect('../jateng', 'refresh');
    }

    public function home()
    {
        $model = $this->M_jateng;
        $data['data'] = $model->get_data("1");
        $token = $this->session->userdata("token");
        if ($token == '') {
            $data['token'] = $model->get_refresh_token();
            $this->session->set_userdata('token', $data['token']);
        } else {
            $data['token'] = $token;
        }

        $this->load->view('home', $data);
    }

    public function index()
    {
        $model = $this->M_jateng;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['konfirmasi'] = $model->get_data("1");
        $data['suspek'] = $model->get_data("3");
        $token = $this->session->userdata("token");
        if ($token == '') {
            $data['token'] = $model->get_token();
            $this->session->set_userdata('token', $data['token']);
        } else {
            $data['token'] = $token;
        }

        if ($this->session->userdata('id_user') != '') {
            $this->template("dashboard", $data);
        } else {
            redirect('../', 'refresh');
        }
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
            CURLOPT_URL => BASE_JATENG . "people/nik?nik=" . $nik,
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
        if ($hsl['message'] ==  "Berhasil mendapatkan data!") {
            if (count($hsl['data']) > 0) {
                $data['jateng']['nama'] = $hsl['data'][0]['name'];
                $data['jateng']['nama_kecamatan'] = $model->get_kecamatan($hsl['data'][0]['sub_district_id']);
                $data['jateng']['nama_kelurahan'] = $model->get_kelurahan($hsl['data'][0]['village_id']);
                $data['jateng']['alamat_domisili'] = $hsl['data'][0]['address'];
                $data['jateng']['patient_id'] = $hsl['data'][0]['patient_id'];
            } else {
                $data['jateng'] = 0;
            }
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
                CURLOPT_URL => BASE_JATENG . "people/nik?nik=" . $nik->nik,
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
            if ($hsl['message'] ==  "Berhasil mendapatkan data!") {
                if (count($hsl['data']) > 0) {
                    $data['jateng']['nama'] = $hsl['data'][0]['name'];
                    $data['jateng']['nama_kecamatan'] = $model->get_kecamatan($hsl['data'][0]['sub_district_id']);
                    $data['jateng']['nama_kelurahan'] = $model->get_kelurahan($hsl['data'][0]['village_id']);
                    $data['jateng']['alamat_domisili'] = $hsl['data'][0]['address'];
                    $data['jateng']['patient_id'] = $hsl['data'][0]['patient_id'];
                    $this->update_id_all($nik->nik, $data['jateng']['patient_id']);
                } else {
                    $data['jateng'] = 0;
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
                CURLOPT_URL => BASE_JATENG . "people/nik?nik=" . $nik->nik,
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

    public function get_data_all($status, $token)
    {
        $model = $this->M_jateng;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/all?is_patient_district=1&is_hospital_district=0&status_id=" . $status,
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

        if ($status == 1) {
            $st = "TERKONFIRMASI DIRAWAT RS LUAR DAERAH";
        } elseif ($status == 2) {
            $st = "TERKONFIRMASI ISOLASI";
        } elseif ($status == 14) {
            $st = "TERKONFIRMASI DIRUJUK RS LUAR";
        } elseif ($status == 3) {
            $st = "TERKONFIRMASI SEMBUH";
        } elseif ($status == 4) {
            $st = "TERKONFIRMASI MENINGGAL";
        }


        $hasil['status'] = $st;
        $hasil['token'] = $token;

        $no = 0;
        foreach ($hsl['data'] as $key => $val) {
            $case_id = $val['last_case_id'];
            foreach ($val['cases'] as $key => $val2) {
                if ($val2['case_id'] == $case_id) {
                    $id_status = $val2['status_id'];
                    $status = $model->get_status($id_status);
                    $faskes_akhir = $model->get_faskes($val2['treatment_place_id']);
                    break;
                }
            }

            $cek_nik = $this->cek_nik_lokal($val['nik'], $val['patient_id']);

            if ($cek_nik) {
                $hasil['data'][$no] = array(
                    "nik" => $val['nik'],
                    "nama" => $val['name'],
                    "alamat" => $model->get_kecamatan($val['sub_district_id']) . ", " . $model->get_kelurahan($val['village_id']) . ", " . $val['rt'] . "/" . $val['rw'],
                    "status" => $status,
                    "faskes" => $faskes_akhir,
                    "id" => $val['patient_id'],
                );
                $no++;
            }
        }

        // echo $response;
        // echo "<pre>";
        // print_r($hsl['data']);
        // echo "</pre>";
        $this->load->view('data_jateng', $hasil);
    }

    public function get_data($token)
    {
        $model = $this->M_jateng;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/all",
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

    public function cek_nar($nik, $token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->_base . "/people/check-nik?nik=" . $nik,
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

        $data = (isset($hsl['message']) && $hsl['message'] == "Data Tidak di temukan di Capil dan NAR !") ? $hsl['message'] : $response;

        echo $data;
    }

    public function cek_nar_2($nik, $token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->_base . "/people/check-nik?nik=" . $nik,
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

        $data = (isset($hsl['message']) && $hsl['message'] == "Data Tidak di temukan di Capil dan NAR !") ? $hsl['message'] : 1;

        return $data;
    }

    // insert jateng data baru
    public function insert_jateng($nik, $token)
    {
        $model = $this->M_jateng;
        $ps = $model->get_data_nik_2($nik);

        $sex = ($ps->jekel == '1') ? "L" : "P";
        $phone = ($ps->no_telp != '') ? $ps->no_telp : '0800-0000-0000';
        $job_place = ($ps->tempat_kerja == '') ? 'TIDAK TAHU' : $ps->tempat_kerja;

        $cek_rt_rw = ($ps->rt == '' && $ps->rw == '') ? false : true;
        $cek_status = ($ps->status_baru == '1' || $ps->status_baru == '5' || $ps->status_baru == '6' || $ps->status_baru == '7' || $ps->status_baru == '11' || $ps->status_baru == '12' || $ps->status_baru == '13' || $ps->status_baru == '16' || $ps->status_baru == '17') ? false : true;

        $data = array(
            'nik' => $nik,
            'name' => $ps->nama,
            'age' => $ps->umur,
            'sex' => $sex,
            'phone_number' => $phone,
            'kdc' => $ps->kode_capil,
            'job_id' => $model->get_pekerjaan($ps->id_pekerjaan),
            'job_place_name' => $job_place,
            'address' => $ps->alamat_domisili,
            'rt' => $ps->rt,
            'rw' => $ps->rw,
            'common_condition' => $ps->keterangan,
            'treatment' => $ps->keterangan,
            'hospital_id' => $model->get_hospital($ps->faskes_akhir),
            'status_id' => $ps->id_status_jateng,
            'reported_date' => date("Y-m-d", strtotime($ps->tgl_periksa)),
            'patient_created_at' => date("Y-m-d H:i:s", strtotime($ps->updated_at)),
            'case_created_at' => date("Y-m-d H:i:s", strtotime($ps->updated_at))
        );

        if ($cek_rt_rw && $cek_status) {
            // $cek_nar = $this->cek_nar_2($nik, $token);
            // if ($cek_nar == 1) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_JATENG . "people/old",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $token,
                    "Accept: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $hsl = json_decode($response, true);
            if ($hsl['message'] != "Data Duplicate !" || $hsl['message'] != "The given data was invalid.") {
                $this->update_id_all($nik, $hsl['data']['id']);
                echo $response;
            } else {
                echo $response;
            }
            // } else {
            //     echo $cek_nar;
            // }
        } else {
            echo "HARUS ADA SYMTON, RW dan RT <br>";
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }

    // GET KODE PEKERJAAN JATENG
    public function get_job($token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/job/place",
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
        $data = json_decode($response, true);

        foreach ($data['data'] as $key) {
            // $dt = array(
            //     "id_job_jateng" => $key['id']
            // );
            // $where = array(
            //     "pekerjaan" => $key['name'],
            //     "id_job_jateng" => NULL
            // );

            // $this->db->update("tb_pekerjaan", $dt, $where);

            // $dt = array(
            //     'id_place_jateng' => $key['id'],
            //     'place' => $key['name']
            // );
            // $this->db->insert("tb_job_place", $dt);
        }
    }

    // cek NIK LOKAL]
    private function cek_nik_lokal($nik, $id)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik])->num_rows();
        $data2 = $this->db->get_where("view_data_laporan", ["data_id" => $id])->num_rows();

        $cek = ($data > 0 || $data2 > 0) ? 0 : 1;

        return $cek;
    }

    // AMBIL DATA JATENG
    public function ambil_jateng($nik, $token)
    {
        $model = $this->M_jateng;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/nik?nik=" . $nik,
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

        $case_id = $hsl['data'][0]['last_case_id'];
        foreach ($hsl['data'][0]['cases'] as $key => $val2) {
            if ($val2['case_id'] == $case_id) {
                $id_status = $val2['status_id'];
                $tgl_lapor = $val2['tgl_lapor'];
                $status = $model->get_status_id($id_status);
                $faskes_akhir = $model->get_faskes($val2['treatment_place_id']);
                break;
            }
        }

        $kasus = $this->_get_last_case();
        $sex = ($hsl['data'][0]['sex'] == 'L') ? 1 : 2;

        $data2 = array(
            'id_kecamatan' => $model->get_kecamatan_id($hsl['data'][0]['sub_district_id']),
            'tgl_periksa' => $tgl_lapor,
            'nik' => $hsl['data'][0]['nik'],
            'nama' => $hsl['data'][0]['name'],
            'alamat_domisili' => $hsl['data'][0]['address'],
            'rt' => $hsl['data'][0]['rt'],
            'rw' => $hsl['data'][0]['rw'],
            'created_at' => $hsl['data'][0]['created_at'],
            'wn' => 1,
            'keterangan' => 'GET DATA DARI JATENG',
            'created_by' => 2,
            'jekel' => $sex,
            'umur' => $hsl['data'][0]['age'],
            'no_telp' => $hsl['data'][0]['phone_number'],
            'id_kelurahan' => $model->get_kelurahan_id($hsl['data'][0]['village_id']),
            'kasus' => $kasus,
            'nakes' => 0,
            'kdiag' => 'BLM',
            'penyakit' => 'BELUM DIISI',
            "faskes_akhir" => $faskes_akhir,
            "id_pekerjaan" => $model->get_pekerjaan_id($hsl['data'][0]['job_id'])->id_pekerjaan,
            "pekerjaan" => $model->get_pekerjaan_id($hsl['data'][0]['job_id'])->pekerjaan,
            "tempat_kerja" => $model->get_job_place($hsl['data'][0]['job_place_id']),
            "updated_at" => date("Y-m-d H:i:s"),
            'data_id' => $hsl['data'][0]['patient_id'],
            'status_baru' => $status
        );

        $curl2 = curl_init();

        curl_setopt_array($curl2, array(
            CURLOPT_URL => "http://lapor-covid19.mi-kes.net/kasus/add2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data2,
        ));

        $response2 = curl_exec($curl2);

        curl_close($curl2);
        $hsl2 = json_decode($response2, true);
        // echo $response2;
        echo "<pre>";
        print_r($hsl2);
        echo "</pre>";
    }

    private function _get_last_case()
    {
        $data = $this->db->query("SELECT MAX(kasus) as kasus FROM tb_laporan_baru")->row();

        return $data->kasus + 1;
    }

    public function get_pasien($status, $token)
    {
        $model = $this->M_jateng;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/all?is_patient_district=1&is_hospital_district=0&status_id=" . $status,
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
        $no = 0;
        $no2 = 1;
        foreach ($hsl['data'] as $key => $val) {
            $case_id = $val['last_case_id'];
            foreach ($val['cases'] as $key => $val2) {
                if ($val2['case_id'] == $case_id) {
                    $id_status = $val2['status_id'];
                    $tgl_lapor = $val2['tgl_lapor'];
                    $status = $model->get_status($id_status);
                    $faskes_akhir = $model->get_faskes($val2['treatment_place_id']);
                    break;
                }
            }

            $cek_nik = $this->cek_nik_lokal($val['nik'], $val['patient_id']);

            if ($cek_nik) {
                $hasil['data'][$no] = array(
                    "no" => $no2,
                    "nik" => $val['nik'],
                    "tgl_lapor" => $tgl_lapor,
                    "nama" => $val['name'],
                    "alamat" => $model->get_kecamatan($val['sub_district_id']) . ", " . $model->get_kelurahan($val['village_id']) . ", " . $val['rt'] . "/" . $val['rw'],
                    "status" => $status,
                    "faskes" => $faskes_akhir,
                    "id" => $val['patient_id'],
                );
                $no++;
                $no2++;
            }

            if ($no > 0) {
                $hsl = array("res" => 1, "data" => $hasil['data']);
            } else {
                $hsl = array("res" => 0);
            }
        }


        return $hsl;
    }

    public function ambil_data()
    {
        $model = $this->M_jateng;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $token = $this->session->userdata("token");
        $data['konfirmasi_rawat'] = $this->get_pasien("1", $token);
        $data['konfirmasi_isolasi'] = $this->get_pasien("2", $token);
        $data['konfirmasi_md'] = $this->get_pasien("4", $token);
        if ($token == '') {
            $data['token'] = $model->get_refresh_token();
            $this->session->set_userdata('token', $data['token']);
        } else {
            $data['token'] = $token;
        }

        $this->template("dashboard-2", $data);
    }
}

/* End of file Jateng.php */
