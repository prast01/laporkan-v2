<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempatKarantina extends CI_Model {

    public function getKarantina()
    {
        $data = $this->db->get("v_lap_karantina")->result();

        return $data;
    }

    public function getIsman($id)
    {
        if ($id == '0') {
            $q1 = $this->db->query("SELECT * FROM tb_laporan WHERE kondisi='2' AND covid='1' AND st='0' AND validasi='1' AND id_kecamatan!='17' AND rawat='RAWAT JALAN'")->num_rows();
            $q2 = $this->db->query("SELECT * FROM tb_pasien_karantina WHERE st='0' AND id_karantina != '0'")->num_rows();
            $data = $q1 - $q2;
        } else {
            $data = $this->db->query("SELECT * FROM tb_pasien_karantina WHERE id_karantina='$id' AND st='0'")->num_rows();
        }
        
        return $data;
    }
    
    public function keluar($id)
    {
        $data = array(
            "st" => 1
        );
        $where = array(
            "id_pasien_karantina" => $id
        );

        $cek = $this->db->update("tb_pasien_karantina", $data, $where);

        return $cek;
    }
}

/* End of file M_odp.php */
