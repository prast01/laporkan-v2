<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tempatKarantina extends CI_Model
{

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

    public function get_rumah_isolasi()
    {
        $data = $this->db->get_where("tb_rumah_isolasi", ["aktif" => 1])->result();
        return $data;
    }

    public function get_pasien_rumah_isolasi()
    {
        $hsl = array();
        $rumah = $this->get_rumah_isolasi();
        foreach ($rumah as $key) {
            $hsl[$key->id_rumah_isolasi] = $this->_get_pasien($key->id_rumah_isolasi);
        }

        return $hsl;
    }

    // PRIVATE
    private function _get_pasien($id_rumah_isolasi)
    {
        $data = $this->db->query("SELECT * FROM tb_isolasi a, tb_rumah_isolasi b, tb_laporan_baru c WHERE a.id_rumah_isolasi=b.id_rumah_isolasi AND a.id_laporan=c.id_laporan AND a.id_rumah_isolasi='$id_rumah_isolasi' AND a.aktif=1 ORDER BY a.created_at DESC")->result();

        $hsl = array();
        $no = 0;
        foreach ($data as $key) {
            $hsl[$no++] = array(
                "id_isolasi" => $key->id_isolasi,
                "nama" => $key->nama,
                "umur" => $key->umur,
                "kecamatan" => $this->_get_kecamatan($key->id_kecamatan),
                "kelurahan" => $this->_get_kelurahan($key->id_kelurahan),
                "alamat_domisili" => $key->alamat_domisili,
            );
        }

        return $hsl;
    }

    private function _get_kecamatan($id_kecamatan)
    {
        $data = $this->db->get_where("tb_kecamatan_baru", ["id_kecamatan" => $id_kecamatan])->row();

        return $data->nama_kecamatan;
    }

    private function _get_kelurahan($id_kelurahan)
    {
        $data = $this->db->get_where("tb_kelurahan_baru", ["id_kelurahan" => $id_kelurahan])->row();

        return $data->nama_kelurahan;
    }
}

/* End of file M_odp.php */
