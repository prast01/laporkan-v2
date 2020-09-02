<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_services extends CI_Model
{


    // cek data CUT OFF
    public function get_cut_off()
    {
        $dt = $this->db->query("SELECT * FROM tb_update_baru ORDER BY updated_at DESC LIMIT 1");
        if ($dt->num_rows() > 0) {
            $d = $dt->row();
            $data['suspek'] = array(
                "total" => $d->suspek_total,
                "dirawat" => array(
                    "total" => $d->suspek_dirawat,
                    "baru" => $d->suspek_dirawat_baru,
                ),
                "isolasi" => array(
                    "total" => $d->suspek_isolasi,
                    "baru" => $d->suspek_isolasi_baru,
                ),
                "discard" => array(
                    "total" => $d->suspek_discard,
                    "baru" => $d->suspek_discard_baru,
                ),
            );

            $data['probable'] = array(
                "total" => $d->probable_total,
                "dirawat" => array(
                    "total" => $d->probable_dirawat,
                    "baru" => $d->probable_dirawat_baru,
                ),
                "isolasi" => array(
                    "total" => $d->probable_isolasi,
                    "baru" => $d->probable_isolasi_baru,
                ),
                "sembuh" => array(
                    "total" => $d->probable_sembuh,
                    "baru" => $d->probable_sembuh_baru,
                ),
                "meninggal" => array(
                    "total" => $d->probable_meninggal,
                    "baru" => $d->probable_meninggal_baru,
                ),
            );

            $data['konfirmasi'] = array(
                "total" => $d->konfirmasi_total,
                "dirawat" => array(
                    "total" => $d->konfirmasi_dirawat,
                    "baru" => $d->konfirmasi_dirawat_baru,
                ),
                "isolasi" => array(
                    "total" => $d->konfirmasi_isolasi,
                    "baru" => $d->konfirmasi_isolasi_baru,
                ),
                "sembuh" => array(
                    "total" => $d->konfirmasi_sembuh,
                    "baru" => $d->konfirmasi_sembuh_baru,
                ),
                "meninggal" => array(
                    "total" => $d->konfirmasi_meninggal,
                    "baru" => $d->konfirmasi_meninggal_baru,
                ),
                "luar" => array(
                    "total" => $d->konfirmasi_luar,
                    "baru" => $d->konfirmasi_luar_baru,
                ),
            );

            $data['updated_at'] = $d->updated_at;
        } else {
            $data['suspek'] = array(
                "total" => 0,
                "dirawat" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "isolasi" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "discard" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
            );

            $data['probable'] = array(
                "total" => 0,
                "dirawat" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "isolasi" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "sembuh" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "meninggal" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
            );

            $data['konfirmasi'] = array(
                "total" => 0,
                "dirawat" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "isolasi" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "sembuh" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "meninggal" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
                "luar" => array(
                    "total" => 0,
                    "baru" => 0,
                ),
            );

            $data['updated_at'] = date("Y-m-d H:i:s");
        }
        return $data;
    }

    // get data kecamatan
    public function get_kecamatan()
    {
        $data = $this->db->get("tb_kecamatan_baru")->result();

        return $data;
    }

    // get data kelurahan
    public function get_kelurahan($kode)
    {
        $data = $this->db->get_where("tb_kelurahan_baru", ["kode_kec" => $kode])->result();

        return $data;
    }

    // get first date
    public function get_first_date()
    {
        $data = $this->db->query("SELECT updated_at FROM tb_update_baru ORDER BY updated_at ASC LIMIT 1")->row();

        $date = date("Y-m-d", strtotime($data->updated_at));

        return $date;
    }

    // get last date
    public function get_last_date()
    {
        $data = $this->db->query("SELECT updated_at FROM tb_update_baru ORDER BY updated_at DESC LIMIT 1")->row();

        $date = date("Y-m-d", strtotime($data->updated_at));

        return $date;
    }

    // get update by tanggal
    public function get_update_tgl($tgl)
    {
        $data = $this->db->query("SELECT * FROM tb_update_baru WHERE updated_at LIKE '%$tgl%' ORDER BY updated_at DESC LIMIT 1")->row();

        return $data;
    }

    // get gender
    public function get_gender($jk)
    {
        if ($jk == "1") {
            $data = array(
                "sex" => "Laki-laki",
                "covid" => $this->_gender_konfirmasi($jk),
                "probable" => $this->_gender_probable($jk),
                "suspek" => $this->_gender_suspek($jk),
            );
        } else {
            $data = array(
                "sex" => "Perempuan",
                "covid" => $this->_gender_konfirmasi($jk),
                "probable" => $this->_gender_probable($jk),
                "suspek" => $this->_gender_suspek($jk),
            );
        }

        return $data;
    }

    // get gender konfirmasi
    private function _gender_konfirmasi($jk)
    {
        $this->db->select("id_laporan");
        $this->db->from("tb_laporan_baru");
        $this->db->where("jekel", $jk);
        $status = array("1", "2", "3", "4", "5", "6");
        $this->db->where_in("status_baru", $status);

        $data = $this->db->get();

        return $data->num_rows();
    }

    // get gender probable
    private function _gender_probable($jk)
    {
        $this->db->select("id_laporan");
        $this->db->from("tb_laporan_baru");
        $this->db->where("jekel", $jk);
        $status = array("7", "8", "9", "10", "11", "12");
        $this->db->where_in("status_baru", $status);

        $data = $this->db->get();

        return $data->num_rows();
    }

    // get gender suspek
    private function _gender_suspek($jk)
    {
        $this->db->select("id_laporan");
        $this->db->from("tb_laporan_baru");
        $this->db->where("jekel", $jk);
        $status = array("13", "14", "15", "16", "17");
        $this->db->where_in("status_baru", $status);

        $data = $this->db->get();

        return $data->num_rows();
    }
}

/* End of file M_services.php */
