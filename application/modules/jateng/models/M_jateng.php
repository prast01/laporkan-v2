<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_jateng extends CI_Model
{
    // GET DATA
    public function get_data($id)
    {
        if ($id == "1") {
            $status = array("1", "2", "3", "4", "5", "6");
        } elseif ($id == "2") {
            $status = array("7", "8", "9", "10", "11", "12");
        } elseif ($id == "3") {
            $status = array("13", "14", "15", "16", "17");
        } elseif ($id == "4") {
            $status = array("18", "19");
        }

        $this->db->from("view_data_laporan");
        $this->db->where("id_kecamatan !=", 17);
        $this->db->where_in("status_baru", $status);

        if ($id == "1") {
            $this->db->where("data_id", null);
            $this->db->order_by("kasus", "DESC");
        } else {
            $this->db->order_by("tgl_periksa", "DESC");
        }


        $data = $this->db->get()->result();

        return $data;
    }

    // GET TOKEN
    public function get_token()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('username' => 'jeparakab@tanggap.in', 'password' => '70l935803'),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: multipart/form-data"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $hsl = json_decode($response, true);
        // $token = $hsl['token_type'] . " " . $hsl['access_token'];
        $token = $hsl['access_token'];

        return $token;
    }

    // GET DATA BY NIK
    public function get_data_nik($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik])->row_array();

        return $data;
    }
    public function get_data_nik_2($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik])->row();

        return $data;
    }

    // GET NAMA KECAMATAN
    public function get_kecamatan($kode)
    {
        $data = $this->db->get_where("tb_kecamatan_baru", ["kode2" => $kode])->row_array();

        return $data['nama_kecamatan'];
    }

    // GET NAMA KELURAHAN
    public function get_kelurahan($kode)
    {
        $data = $this->db->get_where("tb_kelurahan_baru", ["id_kelurahan2" => $kode])->row_array();

        return $data['nama_kelurahan'];
    }

    // GET NIK
    public function get_nik($id)
    {
        if ($id == "1") {
            $data = $this->db->query("SELECT nik FROM view_data_laporan WHERE cek_nik='0' AND status_baru IN ('1', '2', '3', '4', '5', '6') AND id_kecamatan != '17' AND data_id is null LIMIT 1");
        } elseif ($id == "2") {
            $data = $this->db->query("SELECT nik FROM view_data_laporan WHERE cek_nik='0' AND status_baru IN ('7', '8', '9', '10', '11', '12') AND id_kecamatan != '17' LIMIT 1");
        } elseif ($id == "3") {
            $data = $this->db->query("SELECT nik FROM view_data_laporan WHERE cek_nik='0' AND status_baru IN ('13', '14', '15', '16', '17') AND id_kecamatan != '17' LIMIT 1");
        } elseif ($id == "4") {
            $data = $this->db->query("SELECT nik FROM view_data_laporan WHERE cek_nik='0' AND status_baru IN ('18', '19') AND id_kecamatan != '17' LIMIT 1");
        }

        return $data;
    }

    // CEK ID
    public function cek_id($id)
    {
        $data = $this->db->get_where("view_data_laporan", ["data_id" => $id]);

        return $data;
    }

    // CEK NIK
    public function cek_nik($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik]);

        return $data;
    }

    // GET FASKES
    public function get_faskes($id)
    {
        $data = $this->db->get_where("tb_hospital", ["id_prov_hospital" => $id])->row();

        return $data->nama_hospital;
    }

    // GET STATUS
    public function get_status($id)
    {
        $data = $this->db->get_where("tb_status_2", ["id_status_jateng" => $id])->row();

        return $data->nama_status;
    }

    // CRUD
    public function update_id($nik, $id_jateng)
    {
        $where = array("nik" => $nik);
        $data = array("data_id" => $id_jateng);

        $this->db->update("tb_laporan_baru", $data, $where);
    }
    public function update_id_manual($nik, $nik2, $id_jateng)
    {
        $where = array("nik" => $nik);
        $data = array("data_id" => $id_jateng, "nik" => $nik2);

        $this->db->update("tb_laporan_baru", $data, $where);
    }
    public function update_id_all($nik, $id_jateng)
    {
        $where = array("nik" => $nik);
        $data = array("data_id" => $id_jateng, "cek_nik" => 1);

        $this->db->update("tb_laporan_baru", $data, $where);
    }

    // get_pekerjaan
    public function get_pekerjaan($id)
    {
        $data = $this->db->get_where("tb_pekerjaan", ["id_pekerjaan" => $id])->row();

        $hsl = ($id == '') ? '3' : $data->id_job_jateng;

        return $hsl;
    }
    // get_pekerjaan
    public function get_hospital($id)
    {
        $data = $this->db->get_where("tb_hospital", ["nama_hospital" => $id])->row();

        return $data->id_prov_hospital;
    }
}

/* End of file M_jateng.php */
