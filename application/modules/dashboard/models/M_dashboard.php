<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function getApi()
    {
        // $this->cekPasien();
        $url = "http://localhost/laporkan/services/getData";
        $result = file_get_contents($url);
        // Will dump a beauty json :3
        $data = json_decode($result, true);

        return $data["Data"];
    }

    // cek data real time
    // rekap
    public function get_realtime()
    {
        $data['suspek'] = array(
            "total" => $this->cek_suspek("all"),
            "dirawat" => array(
                "total" => $this->cek_suspek("dirawat"),
                "baru" => $this->cek_suspek("dirawat baru"),
            ),
            "isolasi" => array(
                "total" => $this->cek_suspek("isolasi"),
                "baru" => $this->cek_suspek("isolasi baru"),
            ),
            "discard" => array(
                "total" => $this->cek_suspek("discard"),
                "baru" => $this->cek_suspek("discard baru"),
            ),
        );

        $data['probable'] = array(
            "total" => $this->cek_probable("all"),
            "dirawat" => array(
                "total" => $this->cek_probable("dirawat"),
                "baru" => $this->cek_probable("dirawat baru"),
            ),
            "isolasi" => array(
                "total" => $this->cek_probable("isolasi"),
                "baru" => $this->cek_probable("isolasi baru"),
            ),
            "sembuh" => array(
                "total" => $this->cek_probable("sembuh"),
                "baru" => $this->cek_probable("sembuh baru"),
            ),
            "meninggal" => array(
                "total" => $this->cek_probable("meninggal"),
                "baru" => $this->cek_probable("meninggal baru"),
            ),
        );

        $data['konfirmasi'] = array(
            "total" => $this->cek_konfirmasi("all"),
            "dirawat" => array(
                "total" => $this->cek_konfirmasi("dirawat"),
                "baru" => $this->cek_konfirmasi("dirawat baru"),
            ),
            "isolasi" => array(
                "total" => $this->cek_konfirmasi("isolasi"),
                "baru" => $this->cek_konfirmasi("isolasi baru"),
            ),
            "sembuh" => array(
                "total" => $this->cek_konfirmasi("sembuh"),
                "baru" => $this->cek_konfirmasi("sembuh baru"),
            ),
            "meninggal" => array(
                "total" => $this->cek_konfirmasi("meninggal"),
                "baru" => $this->cek_konfirmasi("meninggal baru"),
            ),
            "luar" => array(
                "total" => $this->cek_konfirmasi("luar"),
                "baru" => $this->cek_konfirmasi("luar baru"),
            ),
        );

        $data['updated_at'] = $this->cek_last_update();

        return $data;
    }
    // cek suspek
    private function cek_suspek($kondisi)
    {
        $this->db->select('id_laporan');
        $this->db->from('tb_laporan_baru');
        if ($kondisi == "all") {
            $this->db->where(["status_baru >=" => 13]);
            $this->db->where(["status_baru <=" => 17]);
        } elseif ($kondisi == "dirawat") {
            $status = array("13", "16", "17");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "dirawat baru") {
            $this->db->where(["validasi" => 0]);
            $status = array("13", "16", "17");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "isolasi") {
            $this->db->where(["status_baru" => 14]);
        } elseif ($kondisi == "isolasi baru") {
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 14]);
        } elseif ($kondisi == "discard") {
            $this->db->where(["status_baru" => 15]);
        } elseif ($kondisi == "discard baru") {
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 15]);
        }

        $data = $this->db->get();

        return $data->num_rows();
    }

    // cek probable
    private function cek_probable($kondisi)
    {
        $this->db->select('id_laporan');
        $this->db->from('tb_laporan_baru');
        if ($kondisi == "all") {
            $this->db->where(["status_baru >=" => 7]);
            $this->db->where(["status_baru <=" => 12]);
        } elseif ($kondisi == "dirawat") {
            $status = array("7", "11", "12");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "dirawat baru") {
            $this->db->where(["validasi" => 0]);
            $status = array("7", "11", "12");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "isolasi") {
            $this->db->where(["status_baru" => 8]);
        } elseif ($kondisi == "isolasi baru") {
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 8]);
        } elseif ($kondisi == "sembuh") {
            $this->db->where(["status_baru" => 9]);
        } elseif ($kondisi == "sembuh baru") {
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 9]);
        } elseif ($kondisi == "meninggal") {
            $this->db->where(["status_baru" => 10]);
        } elseif ($kondisi == "meninggal baru") {
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 10]);
        }

        $data = $this->db->get();

        return $data->num_rows();
    }

    // cek konfirmasi
    private function cek_konfirmasi($kondisi)
    {
        $this->db->select('id_laporan');
        $this->db->from('tb_laporan_baru');
        if ($kondisi == "all") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["status_baru >=" => 1]);
            $this->db->where(["status_baru <=" => 6]);
        } elseif ($kondisi == "dirawat") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $status = array("1", "5", "6");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "dirawat baru") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["validasi" => 0]);
            $status = array("1", "5", "6");
            $this->db->where_in("status_baru", $status);
        } elseif ($kondisi == "isolasi") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["status_baru" => 2]);
        } elseif ($kondisi == "isolasi baru") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 2]);
        } elseif ($kondisi == "sembuh") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["status_baru" => 3]);
        } elseif ($kondisi == "sembuh baru") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 3]);
        } elseif ($kondisi == "meninggal") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["status_baru" => 4]);
        } elseif ($kondisi == "meninggal baru") {
            $this->db->where(["id_kecamatan !=" => 17]);
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru" => 4]);
        } elseif ($kondisi == "luar") {
            $this->db->where(["id_kecamatan" => 17]);
            $this->db->where(["status_baru >=" => 1]);
            $this->db->where(["status_baru <=" => 6]);
        } elseif ($kondisi == "luar baru") {
            $this->db->where(["id_kecamatan" => 17]);
            $this->db->where(["validasi" => 0]);
            $this->db->where(["status_baru >=" => 1]);
            $this->db->where(["status_baru <=" => 6]);
        }

        $data = $this->db->get();

        return $data->num_rows();
    }

    // cek last update
    private function cek_last_update()
    {
        $data = $this->db->query("SELECT updated_at FROM tb_laporan_baru ORDER BY updated_at DESC LIMIT 1")->row();

        return $data->updated_at;
    }

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
}

/* End of file M_dashboard.php */
