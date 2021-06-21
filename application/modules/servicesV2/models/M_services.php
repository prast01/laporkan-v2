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
        $this->db->where("id_kecamatan !=", 17);
        $this->db->order_by("konfirmasi_total", "DESC");
        $data = $this->db->get("tb_kecamatan_baru")->result();

        return $data;
    }

    // get data kelurahan
    public function get_kelurahan($kode)
    {
        $this->db->order_by("konfirmasi_total", "DESC");
        $data = $this->db->get_where("tb_kelurahan_baru", ["kode_kec" => $kode])->result();

        return $data;
    }

    // get data kelurahan ALL
    public function get_kelurahan_all()
    {
        $this->db->where("kode_kec !=", 0);
        $this->db->order_by("konfirmasi_total", "DESC");
        $data = $this->db->get("tb_kelurahan_baru")->result();

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
    public function get_update_tgl_2()
    {
        $data = $this->db->get("view_week_2");

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

    public function get_rs()
    {
        $data = $this->db->get_where("tb_faskes", ["kode_kecamatan" => "3320"])->result();

        return $data;
    }

    public function getFaskesTelp($id)
    {
        $data = $this->db->get_where("tb_faskes_telp", ["id_faskes" => $id])->result();

        return $data;
    }

    public function get_pasien_by($nama, $status)
    {
        $this->db->from("tb_laporan_baru");
        // $this->db->where("id_kecamatan !=", '17');
        $this->db->where("faskes_akhir", $nama);

        if ($status == "1") {
            $status = array("1", "5", "6");
        } elseif ($status == "2") {
            $status = array("7", "11", "12");
        } elseif ($status == "3") {
            $status = array("13", "16", "17");
        }

        $this->db->where_in("status_baru", $status);

        $data = $this->db->get()->num_rows();

        return $data;
    }

    public function get_pasien_luar($status)
    {
        $this->db->from("tb_laporan_baru");
        $this->db->where("id_kecamatan !=", '17');
        $faskes = array("RSUD R.A KARTINI", "RSUD REHATTA", "RSI SULTAN HADLIRIN", "RS GRAHA HUSADA", "RS PKU AISYIYAH", "RS PKU MUHAMMADIYAH MAYONG");
        $this->db->where_not_in("faskes_akhir", $faskes);
        // $status = array("1", "7", "13");

        if ($status == "1") {
            $status = array("1", "5", "6");
        } elseif ($status == "2") {
            $status = array("7", "11", "12");
        } elseif ($status == "3") {
            $status = array("13", "16", "17");
        }

        $this->db->where_in("status_baru", $status);

        $data = $this->db->get()->num_rows();

        return $data;
    }

    public function get_penyakit()
    {
        $data = $this->db->get("v_10besar")->result();

        return $data;
    }

    public function get_update_rs()
    {
        $this->db->from("tb_laporan_baru");
        $status = array("1", "7", "13");
        $this->db->where("id_kecamatan !=", '17');
        $this->db->where_in("status_baru", $status);
        $this->db->order_by("updated_at", "DESC");

        $data = $this->db->get()->row();

        return $data->updated_at;
    }

    public function get_kecamatan_by($kode)
    {
        $data = $this->db->get_where("tb_kecamatan_baru", ["kode" => $kode])->row();

        return $data;
    }

    public function get_data_rumah_isolasi()
    {
        $hsl = array();
        $data = $this->db->get_where("tb_rumah_isolasi", ["aktif" => 1]);
        if ($data->num_rows() > 0) {
            // CEK JUMLAH PASIEN
            $rumah = $data->result();
            $hari_ini = date("Y-m-d");
            foreach ($rumah as $key) {
                $jumlah = $this->db->get_where("tb_isolasi", ["aktif" => 1, "id_rumah_isolasi" => $key->id_rumah_isolasi])->num_rows();
                $baru = $this->db->get_where("tb_isolasi", ["aktif" => 1, "id_rumah_isolasi" => $key->id_rumah_isolasi, "DATE(created_at)" => $hari_ini])->num_rows();
                $hsl["lokasi"][$key->id_rumah_isolasi] = array(
                    "nama" => $key->nama_rumah_isolasi,
                    "jumlah" => $jumlah,
                    "baru" => $baru,
                    "gmaps" => $key->gmaps,
                );
            }

            // CEK UPDATE AT
            $dt = $this->db->query("SELECT updated_at FROM tb_isolasi ORDER BY updated_at DESC LIMIT 1");
            if ($dt->num_rows() > 0) {
                $d = $dt->row();
                $hsl["update"] = date("Y-m-d H:i:s", strtotime($d->updated_at));
            } else {
                $hsl["update"] = date("Y-m-d H:i:s");
            }

            $hsl["show"] = 1;
        } else {
            $hsl["show"] = 0;
        }


        return $hsl;
    }
}

/* End of file M_services.php */
