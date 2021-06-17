<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{


    public function getODP($kondisi, $id)
    {
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");

        if ($kondisi == "kec") {
            if ($id != 'all') {
                $this->db->where(['tb_laporan.id_kecamatan' => $id]);
            }
        }
        if ($kondisi == "desa") {
            if ($id != 'all') {
                $this->db->where(['tb_laporan.id_kelurahan' => $id]);
            }
        }
        if ($kondisi == "faskes") {
            if ($id != 'all') {
                if ($id == "rs") {
                    $this->db->where(['tb_laporan.created_by >=' => "24"]);
                    $this->db->where(['tb_laporan.created_by <=' => "29"]);
                } elseif ($id == "puskesmas") {
                    $this->db->where(['tb_laporan.created_by >=' => "3"]);
                    $this->db->where(['tb_laporan.created_by <=' => "23"]);
                }
            }
        }
        if ($kondisi == "rs" || $kondisi == "puskesmas") {
            if ($id != 'all') {
                $this->db->where(['tb_laporan.created_by' => $id]);
            }
        }

        $this->db->where(['kondisi' => '1']);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi' => '1']);
        $this->db->order_by("validasi", "ASC");
        $this->db->order_by("created_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function getPDP($kondisi, $id)
    {
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");

        if ($kondisi == "ranap") {
            if ($id != "all") {
                $x = str_replace("%20", " ", $id);
                $this->db->where(['rawat' => $x]);
                $this->db->where(['st' => 0]);
                $this->db->where(['rujuk' => 0]);
            } else {
                $this->db->where(['rawat !=' => "RAWAT JALAN"]);
                $this->db->where(['st' => 0]);
                $this->db->where(['rujuk' => 0]);
            }
        } elseif ($kondisi == "rujuk") {
            $this->db->where(['st' => 0]);
            $this->db->where(['rujuk' => 1]);
        } elseif ($kondisi == "rajal") {
            if ($id != "all") {
                $this->db->where(['rawat' => "RAWAT JALAN"]);
                $this->db->where(['st' => 0]);
                $this->db->where(['rujuk' => 0]);
                $this->db->where(['created_by' => $id]);
            } else {
                $this->db->where(['rawat' => "RAWAT JALAN"]);
                $this->db->where(['st' => 0]);
                $this->db->where(['rujuk' => 0]);
            }
        } elseif ($kondisi == "pulang") {
            $this->db->where(['st' => 1]);
        } elseif ($kondisi == "meninggal") {
            $this->db->where(['st' => 2]);
        } elseif ($kondisi == "rajal_rs") {
            $this->db->where(['rawat' => "RAWAT JALAN"]);
            $this->db->where(['st' => 0]);
            $this->db->where(['rujuk' => 0]);
            $this->db->where(['created_by >=' => "24"]);
            $this->db->where(['created_by <=' => "29"]);
        } elseif ($kondisi == "rajal_pkm") {
            $this->db->where(['rawat' => "RAWAT JALAN"]);
            $this->db->where(['st' => 0]);
            $this->db->where(['rujuk' => 0]);
            $this->db->where(['created_by >=' => "3"]);
            $this->db->where(['created_by <=' => "23"]);
        }

        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi' => '1']);
        $this->db->order_by("validasi", "ASC");
        $this->db->order_by("created_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function getCovid($kondisi, $id)
    {
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");

        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);

        if ($kondisi == "ranap") {
            $this->db->where(['st' => '0']);
            if ($id != 'all') {
                if ($id == "dalam") {
                    $this->db->where(['rujuk' => '0']);
                } else {
                    $this->db->where(['rujuk' => '1']);
                }
            }
        }

        if ($kondisi == "sembuh") {
            $this->db->where(['st' => '1']);
        }
        if ($kondisi == "meninggal") {
            $this->db->where(['st' => '2']);
        }

        $this->db->order_by("valid_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function getKecamatan()
    {
        $data = $this->db->get("tb_kecamatan")->result();

        return $data;
    }

    public function getKelurahan($id)
    {
        $data = $this->db->get_where('tb_kelurahan', ["kode_kec" => $id])->result();

        return $data;
    }

    public function getFaskes($id)
    {
        if ($id == "RS") {
            $data = $this->db->query("SELECT * FROM tb_user WHERE level_user='3' AND nama_user LIKE 'RS%'")->result();
        } else {
            $data = $this->db->query("SELECT * FROM tb_user WHERE level_user='3' AND nama_user LIKE 'PKM%'")->result();
        }

        return $data;
    }

    public function get_penyakit($kondisi)
    {
        if ($kondisi == "covid") {
            $data = $this->db->query("SELECT * FROM v_penyakit_covid LIMIT 10")->result();
        } else {
            $data = $this->db->query("SELECT * FROM v_penyakit_non_covid LIMIT 10")->result();
        }

        return $data;
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
        $this->db->where(["id_kecamatan !=" => 17]);
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
        $this->db->where(["id_kecamatan !=" => 17]);
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


    public function get_nama_kec($id)
    {
        $data = $this->db->get_where("tb_kecamatan_baru", ["id_kecamatan" => $id])->row();

        return $data->nama_kecamatan;
    }

    public function get_nama_kel($id)
    {
        $data = $this->db->get_where("tb_kelurahan_baru", ["id_kelurahan" => $id])->row();

        return $data->nama_kelurahan;
    }


    public function get_suspek($kondisi, $d)
    {
        $this->db->from("view_data_laporan");
        if ($kondisi == "1") {
            if ($d != "all") {
                $this->db->where("id_kecamatan", $d);
            }
        } else {
            $this->db->where("id_kelurahan", $d);
        }

        $this->db->where(["status_baru >=" => 13]);
        $this->db->where(["status_baru <=" => 17]);

        $this->db->where("updated_at !=", NULL);
        $this->db->order_by("updated_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function get_probable($kondisi, $d)
    {
        $this->db->from("view_data_laporan");
        if ($kondisi == "1") {
            if ($d != "all") {
                $this->db->where("id_kecamatan", $d);
            }
        } else {
            $this->db->where("id_kelurahan", $d);
        }

        $this->db->where(["status_baru >=" => 7]);
        $this->db->where(["status_baru <=" => 12]);

        $this->db->where("updated_at !=", NULL);
        $this->db->order_by("updated_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function get_konfirmasi($kondisi, $d)
    {
        $this->db->from("view_data_laporan");
        if ($kondisi == "1") {
            if ($d != "all") {
                $this->db->where("id_kecamatan", $d);
            }
        } else {
            $this->db->where("id_kelurahan", $d);
        }

        $this->db->where(["status_baru >=" => 1]);
        $this->db->where(["status_baru <=" => 6]);

        $this->db->where("updated_at !=", NULL);
        $this->db->order_by("updated_at", "DESC");

        $data = $this->db->get()->result();

        return $data;
    }

    public function ambilLama($jns, $tgl, $tgl2)
    {
        $this->db->select("nama, nama_kecamatan, alamat_domisili");
        $this->db->from("tb_laporan_baru");
        $this->db->join('tb_kecamatan_baru', 'tb_laporan_baru.id_kecamatan = tb_kecamatan_baru.id_kecamatan');
        $this->db->join('tb_kelurahan_baru', 'tb_laporan_baru.id_kelurahan = tb_kelurahan_baru.id_kelurahan');

        $this->db->where('tb_laporan_baru.tgl_periksa >=', $tgl);
        $this->db->where('tb_laporan_baru.tgl_periksa <=', $tgl2);
        $this->db->where('tb_laporan_baru.validasi', 1);

        if ($jns == "1") {
            $this->db->where('tb_laporan_baru.kondisi', 1);
        } elseif ($jns == "2") {
            $this->db->where('tb_laporan_baru.kondisi', 2);
            $this->db->where('tb_laporan_baru.covid', 0);
        } elseif ($jns == "3") {
            $this->db->where('tb_laporan_baru.kondisi', 2);
            $this->db->where('tb_laporan_baru.covid', 1);
        }

        return $this->db->get();
    }

    public function ambilBaru($jns, $tgl, $tgl2)
    {
        $this->db->select("nama, nama_kecamatan, alamat_domisili");
        $this->db->from("tb_laporan_baru");
        $this->db->join('tb_kecamatan_baru', 'tb_laporan_baru.id_kecamatan = tb_kecamatan_baru.id_kecamatan');
        $this->db->join('tb_kelurahan_baru', 'tb_laporan_baru.id_kelurahan = tb_kelurahan_baru.id_kelurahan');

        $this->db->where('tb_laporan_baru.tgl_periksa >=', $tgl);
        $this->db->where('tb_laporan_baru.tgl_periksa <=', $tgl2);
        $this->db->where('tb_laporan_baru.validasi', 1);
        $this->db->where('tb_laporan_baru.id_kecamatan !=', 17);

        if ($jns == "1") {
            $this->db->where('tb_laporan_baru.status_baru >=', 13);
            $this->db->where('tb_laporan_baru.status_baru <=', 17);
        } elseif ($jns == "2") {
            $this->db->where('tb_laporan_baru.status_baru >=', 7);
            $this->db->where('tb_laporan_baru.status_baru <=', 12);
        } elseif ($jns == "3") {
            $this->db->where('tb_laporan_baru.status_baru >=', 1);
            $this->db->where('tb_laporan_baru.status_baru <=', 6);
        }

        return $this->db->get();
    }
}

/* End of file ModelName.php */
