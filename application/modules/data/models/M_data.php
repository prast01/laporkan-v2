<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    
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

        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->order_by("st", "DESC");
        $this->db->order_by("validasi", "ASC");
        $this->db->order_by("created_at", "DESC");

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
}

/* End of file ModelName.php */
