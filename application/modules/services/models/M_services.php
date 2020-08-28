<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_services extends CI_Model {

    public function getTgl()
    {
        $data = $this->db->query("SELECT valid_at FROM tb_laporan ORDER BY valid_at DESC LIMIT 1")->row();

        return $data;
    }

    public function getODP($id, $tgl = "")
    {
        if ($id == "baru") {
            $this->db->like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0"
            );
        } elseif ($id == "lama") {
            $this->db->not_like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0"
            );
        } elseif ($id == "komulatif") {
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid !=" => "1"
            );
        } elseif($id == "lulus") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "2"
            );
        } elseif($id == "proses") {
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0"
            );
        } elseif ($id == "komulatif2") {
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid !=" => "1"
            );
            $this->db->like('valid_at', $tgl, 'after');
        }
        
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getPDP($id)
    {
        if ($id == "ranap") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "0",
                "st" => "0",
                "rawat !=" => "RAWAT JALAN"
            );
        } elseif ($id == "rajal") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "0",
                "st" => "0",
                "rawat" => "RAWAT JALAN"
            );
        } elseif ($id == "rujuk") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "1",
                "st" => "0"
            );
        } elseif ($id == "sembuh") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "st" => "1"
            );
        } elseif($id == "komulatif") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid !=" => "1"
            );
        } elseif($id == "lama") {
            $this->db->not_like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0"
            );
        } elseif($id == "baru") {
            $this->db->like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0"
            );
        } elseif($id == "meninggal") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "st" => "2"
            );
        }
        
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
        
    }

    public function getPDPrawat()
    {
        $where = array(
            "kondisi" => "2",
            "validasi" => "1",
            "covid" => "0",
            "rujuk" => "0",
            "st" => "0",
            "rawat !=" => "RAWAT JALAN"
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getCovidAll()
    {
        $where = array(
            "kondisi" => "2",
            "covid" => "1"
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getCovid($id)
    {
        if ($id == "rawat") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "rujuk" => "0"
            );
        } elseif ($id == "sembuh") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "1"
            );
        } elseif ($id == "meninggal") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "2"
            );
        } elseif ($id == "komulatif") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1"
            );
        } elseif ($id == "rawat_luar") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "rujuk" => "1"
            );
        }

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getKecamatan()
    {
        // $this->db->where(['kode !='=> '0']);
        $this->db->order_by("id_kecamatan", "ASC");
        $data = $this->db->get("tb_kecamatan")->result();

        return $data;
    }

    public function getKelurahan()
    {
        // $this->db->where(['kode_kec !='=> '0']);
        $this->db->order_by("id_kelurahan", "ASC");
        $data = $this->db->get("tb_kelurahan")->result();

        return $data;
    }

    public function cekPasien()
    {
        $sblm = mktime(0, 0, 0, date('n'), date('j')-14, date('Y'));

        $tgl = date("Y-m-d", $sblm);
        
        $data = array(
            "covid" => "2"
        );

        $where = array(
            "tgl_periksa <=" => $tgl,
            "validasi" => "1",
            "covid" => "0"
        );

        $this->db->update("tb_laporan", $data, $where);
    }

    
    public function getHarian($tgl)
    {
        $data = $this->db->query("SELECT SUM(jumlah_odp) as jumlah_odp, SUM(jumlah_pdp) as jumlah_pdp, SUM(jumlah_covid) as jumlah_covid FROM tb_harian WHERE tanggal <= '$tgl'")->row();

        return $data;
    }
    
    public function getKecamatanBy($id)
    {
        $data = $this->db->get_where("tb_kecamatan", ["id_kecamatan" => $id])->row();

        return $data;
    }

    public function getKelurahanBy($id_k)
    {
        $data = $this->db->get_where("tb_kelurahan", ["kode_kec" => $id_k])->result();

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

    public function search($title){
        $this->db->where(["kode_kecamatan" => "3320"]);
        $this->db->like('nama_faskes', $title , 'both');
        $this->db->order_by('nama_faskes', 'ASC');
        $this->db->limit(5);
        return $this->db->get('tb_faskes')->result();
    }

    
    public function getODP2($id, $id_f)
    {
        if ($id == "baru") {
            $this->db->like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0",
                "created_by" => $id_f
            );
        } elseif ($id == "lama") {
            $this->db->not_like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0",
                "created_by" => $id_f
            );
        } elseif ($id == "komulatif") {
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid !=" => "1",
                "created_by" => $id_f
            );
        } elseif($id == "lulus") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "2",
                "created_by" => $id_f
            );
        } elseif($id == "proses") {
            $where = array(
                "kondisi" => "1",
                "validasi !=" => "2",
                "covid" => "0",
                "created_by" => $id_f
            );
        }
        
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    
    public function getPDP2($id, $id_f)
    {
        if ($id == "ranap") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "0",
                "st" => "0",
                "rawat !=" => "RAWAT JALAN",
                "created_by" => $id_f
            );
        } elseif ($id == "rajal") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "0",
                "st" => "0",
                "rawat" => "RAWAT JALAN",
                "created_by" => $id_f
            );
        } elseif ($id == "rujuk") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "rujuk" => "1",
                "st" => "0",
                "created_by" => $id_f
            );
        } elseif ($id == "sembuh") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "st" => "1",
                "created_by" => $id_f
            );
        } elseif($id == "komulatif") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid !=" => "1",
                "created_by" => $id_f
            );
        } elseif($id == "lama") {
            $this->db->not_like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "created_by" => $id_f
            );
        } elseif($id == "baru") {
            $this->db->like('valid_at', date("Y-m-d"));
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "created_by" => $id_f
            );
        } elseif($id == "meninggal") {
            $where = array(
                "kondisi" => "2",
                "validasi !=" => "2",
                "covid" => "0",
                "st" => "2",
                "created_by" => $id_f
            );
        }
        
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
        
    }

    public function getCovidAll2($id_f)
    {
        $where = array(
            "kondisi" => "2",
            "covid" => "1",
            "created_by" => $id_f
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getCovid2($id, $id_f)
    {
        if ($id == "rawat") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "created_by" => $id_f
            );
        } elseif ($id == "sembuh") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "1",
                "created_by" => $id_f
            );
        } elseif ($id == "meninggal") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "2",
                "created_by" => $id_f
            );
        } elseif ($id == "komulatif") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "created_by" => $id_f
            );
        } elseif ($id == "rawat_luar") {
            $where = array(
                "kondisi" => "2",
                "covid" => "1",
                "st" => "0",
                "rujuk" => "1",
                "created_by" => $id_f
            );
        }
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getFaskesLuarByKota($id)
    {
        $data = $this->db->get_where("tb_faskes_luar", ["kota" => $id])->result();

        return $data;
    }
    public function getFaskesLuar()
    {
        $data = $this->db->get("tb_faskes_luar")->result();

        return $data;
    }
    public function getFaskes()
    {
        $data = $this->db->get_where("tb_faskes", ["kode_kecamatan"=>"3320"])->result();

        return $data;
    }

    public function getUpdateHarian($tgl)
    {
        $cek = $this->db->query("SELECT * FROM tb_update WHERE update_at LIKE '$tgl%' ORDER BY update_at DESC LIMIT 1")->num_rows();
        if ($cek == 0) {
            $data = $this->db->query("SELECT * FROM tb_update WHERE update_at LIKE '$tgl%' ORDER BY update_at DESC LIMIT 1")->num_rows();
        } else {
            $data = $this->db->query("SELECT * FROM tb_update WHERE update_at LIKE '$tgl%' ORDER BY update_at DESC LIMIT 1")->row();
        }
        
        return $data;
    }

    public function getFaskesTelp($id)
    {
        $data = $this->db->get_where("tb_faskes_telp", ["id_faskes" => $id])->result();

        return $data;
    }

    public function getPasien($kondisi, $nama_faskes)
    {
        if ($kondisi == "pdp") {
            $where = array(
                "rawat" => $nama_faskes,
                "kondisi" => "2",
                "validasi" => "1",
                "st" => "0",
                "covid" => "0",
                "rujuk" => "0"
            );
        } elseif ($kondisi == "covid") {
            $where = array(
                "rawat" => $nama_faskes,
                "kondisi" => "2",
                "validasi" => "1",
                "st" => "0",
                "covid" => "1",
                "rujuk" => "0"
            );
        }
        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return $data;
    }

    
    public function getPP($tgl)
    {
        $transmisi = $this->db->query("SELECT * FROM pelaku_perjalanan WHERE tgl_kedatangan >= '$tgl' AND id_transmisi_lokal NOT IN ('29', '30')")->num_rows();
        $terjangkit = $this->db->query("SELECT * FROM pelaku_perjalanan WHERE tgl_kedatangan >= '$tgl' AND id_transmisi_lokal IN ('29', '30')")->num_rows();
        $data['transmisi'] = $transmisi;
        $data['terjangkit'] = $terjangkit;

        return $data;
    }

    public function get_pasien()
    {
        $search = $_GET['search'];
        $id_kec = $_GET['id_kecamatan'];

        $this->db->from('tb_laporan');
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi' => '1']);
        $this->db->where(['tb_laporan.id_kecamatan' => $id_kec]);
        $this->db->like("nama", $search);
        $data = $this->db->get()->result();

        return $data;
    }
    public function get_pasien_otg()
    {
        $search = $_GET['search'];
        $id_kec = $_GET['id_kecamatan'];

        $this->db->from('tb_otg');
        $this->db->join("tb_kecamatan", "tb_otg.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_otg.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi' => '1']);
        $this->db->where(['tb_otg.id_kecamatan' => $id_kec]);
        $this->db->like("nama", $search);
        $data = $this->db->get()->result();

        return $data;
    }

    public function get_kontak($id)
    {
        $data = $this->db->get_where("tb_kontak", ["id_laporan" => $id])->result();
        return $data;
    }
    public function get_swab($id)
    {
        $data = $this->db->get_where("tb_swab", ["id_laporan" => $id])->result();
        return $data;
    }
    public function get_tracing($id)
    {
        $this->db->from('tb_laporan');
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi' => '1']);
        $this->db->where(['tb_laporan.id_laporan' => $id]);
        $data = $this->db->get()->row();

        return $data;
    }
    public function get_tracing_otg($id)
    {
        $this->db->from('tb_otg');
        $this->db->join("tb_kecamatan", "tb_otg.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_otg.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['validasi' => '1']);
        $this->db->where(['tb_otg.id_otg' => $id]);
        $data = $this->db->get()->row();

        return $data;
    }

}

/* End of file M_home.php */
