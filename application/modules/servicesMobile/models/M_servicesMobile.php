<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_servicesMobile extends CI_Model {

    public function getKecamatan()
    {
        // $this->db->where(['kode !='=> '0']);
        $this->db->order_by("id_kecamatan", "ASC");
        $data = $this->db->get("tb_kecamatan")->result();

        return $data;
    }

    public function getUpdate()
    {
        $data = $this->db->query("SELECT * FROM tb_update ORDER BY update_at DESC LIMIT 1");
        if ($data->num_rows() != 0) {
            $hsl['data'] = $data->row();
        } else {
            $hsl['update_at'] = date("Y-m-d H:i");
            $hsl['data'] = 0;
        }
        
        return $hsl;
    }


    public function getData($kondisi, $id_kec)
    {
        if ($kondisi == "covid_dalam") {
            $where = array(
                "id_kecamatan" => $id_kec,
                "validasi" => "1",
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "rujuk" => "0"
            );
        } elseif ($kondisi == "covid_luar") {
            $where = array(
                "id_kecamatan" => $id_kec,
                "validasi" => "1",
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "rujuk" => "1"
            );
        } elseif ($kondisi == "covid_sehat") {
            $where = array(
                "id_kecamatan" => $id_kec,
                "validasi" => "1",
                "kondisi" => "2",
                "covid" => "1",
                "st" => "1"
            );
        } elseif ($kondisi == "covid_md") {
            $where = array(
                "id_kecamatan" => $id_kec,
                "validasi" => "1",
                "kondisi" => "2",
                "covid" => "1",
                "st" => "2"
            );
        }

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();
        
        return $data;
    }
}

/* End of file M_home.php */
