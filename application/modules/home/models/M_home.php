<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function getPelapor()
    {
        $data = $this->db->get_where("tb_user", ["level_user"=> "3"]);

        return $data;
    }

    public function getPelapor2()
    {
        $data = $this->db->get_where("tb_faskes", ["kode_kecamatan"=>"3320"]);

        return $data;
    }

    public function getPelaporBy($id)
    {
        $data = $this->db->get_where("tb_user", ["id_user"=> $id]);

        return $data;
    }
    public function getLaporanBy($id)
    {
        
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_laporan.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['id_laporan' => $id]);
        $data = $this->db->get()->row();

        return $data;
    }

    public function getLaporan($id)
    {
        $id_user = $this->session->userdata("id_user");
        $level = $this->session->userdata("level");
        $bl = (isset($_POST['bln'])) ? $_POST['bln'] : date('m') ;
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => $id]);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        if ($level != '2') {
            $this->db->where(['created_by' => $id_user]);
            // if ($id == '1') {
            // }
            // $this->db->order_by("covid", "DESC");
        } else {
            $this->db->where(['MONTH(tgl_periksa)' => $bl]);
        }
        $this->db->order_by("validasi", "ASC");
        $this->db->order_by("created_at", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getCovid()
    {
        $id_user = $this->session->userdata("id_user");
        $level = $this->session->userdata("level");
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        if ($level != '2') {
            $this->db->where(['created_by' => $id_user]);
        } else {
            // $this->db->order_by("st", "DESC");
        }
        // $this->db->order_by("validasi", "ASC");
        // $this->db->order_by("created_at", "DESC");
        $this->db->order_by("kasus", "DESC");

        $data = $this->db->get();

        return $data;
    }


    public function getLaporanPusk($id)
    {
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => $id]);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        $this->db->where(['created_by !=' => $id_user]);
        $this->db->where(['kode' => $data->kode_kecamatan]);
        $this->db->order_by("created_at", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getCovidPusk()
    {
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");
        $data = $this->db->get_where("tb_faskes", ["nama_faskes" => $nama_user])->row();

        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->where(['created_by !=' => $id_user]);
        $this->db->where(['kode' => $data->kode_kecamatan]);
        // $this->db->order_by("created_at", "DESC");
        $this->db->order_by("kasus", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getLaporanRs($id)
    {
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");

        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => $id]);
        $this->db->where(['covid !=' => '1']);
        $this->db->where(['validasi !=' => '2']);
        $this->db->where(['created_by !=' => $id_user]);
        $this->db->where(['rawat' => $nama_user]);
        // $this->db->order_by("created_at", "DESC");
        $this->db->order_by("kasus", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getCovidRs()
    {
        $id_user = $this->session->userdata("id_user");
        $nama_user = $this->session->userdata("nama_user");

        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['kondisi' => '2']);
        $this->db->where(['covid' => '1']);
        $this->db->where(['created_by !=' => $id_user]);
        $this->db->where(['rawat' => $nama_user]);
        $this->db->order_by("created_at", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getLaporan2($id, $id_user)
    {
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['tb_laporan.id_kecamatan' => $id_user]);
        $this->db->where(['kondisi' => $id]);
        $this->db->order_by("id_laporan", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getLaporan3($id, $id_user)
    {
        $this->db->select("*");
        $this->db->from("tb_laporan");
        $this->db->join("tb_user", "tb_laporan.created_by = tb_user.id_user");
        $this->db->join("tb_kecamatan", "tb_laporan.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->where(['tb_laporan.created_by' => $id_user]);
        $this->db->where(['kondisi' => $id]);
        $this->db->where(['validasi !=' => '0']);
        $this->db->order_by("id_laporan", "DESC");

        $data = $this->db->get();

        return $data;
    }

    public function getKecamatan()
    {
        $data = $this->db->get("tb_kecamatan");

        return $data;
    }
    public function getKelurahan()
    {
        $data = $this->db->get("tb_kelurahan");

        return $data;
    }

    public function getKelurahanBy($id_k)
    {
        $a = $this->db->get_where("tb_kecamatan", ["id_kecamatan" => $id_k])->row();
        $data = $this->db->get_where("tb_kelurahan", ["kode_kec" => $a->kode])->result();

        return $data;
    }

    public function getKecamatanBy($id)
    {
        $data = $this->db->get_where("tb_kecamatan", ["id_kecamatan" => $id])->row();

        return $data;
    }

    public function save()
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0],0,2) != "08") {
            $msg = array('res'=>0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR', 'kondisi' => $post['kondisi']);
            return json_encode($msg);
        }
        // if ($post['umur'] == '' || $post['umur'] == '0') {
        if ($post['umur'] == '') {
            $msg = array('res'=>0, 'msg' => 'Umur Harus Diisi dengan BENAR', 'kondisi' => $post['kondisi']);
            return json_encode($msg);
        }

        if ($post['kondisi'] == "3") {
            $covid = "1";
            $kondisi = "2";
        } else {
            $covid = "0";
            $kondisi = $post['kondisi'];
        }

        if ($post['rujuk'] == "0") {
            $rawat = $post['rawat'];
            $rujuk = "0";
            $rs = "";
            $kota = "";
        } else {
            $faskes = explode("-", $post['rawat']);
            $rawat = "LUAR DAERAH";
            $rujuk = "1";
            $rs = $faskes[0];
            $kota = $faskes[1];
        }
        

        if ($post['nik'] != '' && strlen($post['nik']) == '16') {
            $cekNik = $this->cekNik($post['nik']);
            if ($cekNik == '0') {
                if ($post['alamat_domisili'] != '' && $post['jekel'] != '' && $post['riwayat_jalan'] != '') {
                    $bpjs = $this->getBpjs($post['nik']);
                    $data = array (
                        'id_kecamatan' => $post['id_kecamatan'],
                        'tgl_periksa' => $post['tgl_periksa'],
                        'nik' => $post['nik'],
                        'nama' => $post['nama'],
                        'alamat_domisili' => $post['alamat_domisili'],
                        'kondisi' => $kondisi,
                        'bpjs' => $bpjs,
                        'created_at' => $post['created_at'],
                        'wn' => $post['wn'],
                        'rawat' => $rawat,
                        'keterangan' => $post['keterangan'],
                        'created_by' => $post['created_by'],
                        'jekel' => $post['jekel'],
                        'umur' => $post['umur'],
                        'no_telp' => $post['no_telp'],
                        'id_kelurahan' => $post['id_kelurahan'],
                        'riwayat_jalan' => $post['riwayat_jalan'],
                        'kasus' => $post['kasus'],
                        'rujuk' => $rujuk,
                        'rs' => $rs,
                        'kota' => $kota,
                        "covid" => $covid,
                        'rdt' => $post['rdt'],
                        'nakes' => $post['nakes'],
                        'swab' => $post['swab']
                    );
            
                    if ($this->session->userdata("id_user") != "") {
                        $cek = $this->db->insert('tb_laporan', $data);
                    } else {
                        $cek = 0;
                    }
                    
                    if ($cek) {
                        $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Dibuat', 'kondisi' => $post['kondisi']);
                    } else {
                        $msg = array('res'=>0, 'msg' => 'Laporan Gagal Dibuat', 'kondisi' => $post['kondisi']);
                    }
                } else {
                    $msg = array('res'=>0, 'msg' => 'Jenis Kelamin, Alamat Domisili dan Riwayat Perjalanan Tidak Boleh Kosong', 'kondisi' => $post['kondisi']);
                }
            } else {
                $msg = array('res'=>0, 'msg' => 'NIK Sudah Digunakan', 'kondisi' => $post['kondisi']);
            }
            
        } else {
            $msg = array('res'=>0, 'msg' => 'NIK tidak berjumlah 16 karakter', 'kondisi' => $post['kondisi']);
        }
        
        
        return json_encode($msg);
    }

    public function edit($id)
    {
        $post = $this->input->post();

        $where = array(
            'id_laporan' => $id
        );

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0],0,2) != "08") {
            $msg = array('res'=>0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR', 'kondisi' => $post['kondisi']);
            return json_encode($msg);
        }
        // if ($post['umur'] == '' || $post['umur'] == '0') {
        if ($post['umur'] == '') {
            $msg = array('res'=>0, 'msg' => 'Umur Harus Diisi dengan BENAR', 'kondisi' => $post['kondisi']);
            return json_encode($msg);
        }

        if ($post['rujuk'] == "0") {
            $rawat = $post['rawat'];
            $rujuk = "0";
            $rs = "";
            $kota = "";
        } else {
            $faskes = explode("-", $post['rawat']);
            $rawat = "LUAR DAERAH";
            $rujuk = "1";
            $rs = $faskes[0];
            $kota = $faskes[1];
        }

        if ($post['nik'] != '' && strlen($post['nik']) == '16') {
            if ($post['nik'] != $post['nik2']) {
                $cekNik = $this->cekNik($post['nik']);
            } else {
                $cekNik = "0";
            }
            if ($cekNik == '0') {
                if ($post['alamat_domisili'] != '' && $post['jekel'] != '' && $post['riwayat_jalan'] != '') {
                    $bpjs = $this->getBpjs($post['nik']);
    
                    $data = array(
                        'id_kecamatan' => $post['id_kecamatan'],
                        'tgl_periksa' => $post['tgl_periksa'],
                        'nik' => $post['nik'],
                        'nama' => $post['nama'],
                        'bpjs' => $bpjs,
                        'wn' => $post['wn'],
                        'rawat' => $rawat,
                        'keterangan' => $post['keterangan'],
                        'alamat_domisili' => $post['alamat_domisili'],
                        'jekel' => $post['jekel'],
                        'umur' => $post['umur'],
                        'no_telp' => $post['no_telp'],
                        'id_kelurahan' => $post['id_kelurahan'],
                        'riwayat_jalan' => $post['riwayat_jalan'],
                        'kasus' => $post['kasus'],
                        'rujuk' => $rujuk,
                        'rs' => $rs,
                        'kota' => $kota,
                        'kirim' => 0,
                        'rdt' => $post['rdt'],
                        'nakes' => $post['nakes'],
                        'swab' => $post['swab']
                    );
    
                    $cek = $this->db->update('tb_laporan', $data, $where);
            
                    if ($cek) {
                        $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Diperbarui', 'kondisi' => $post['kondisi']);
                    } else {
                        $msg = array('res'=>0, 'msg' => 'Laporan Gagal Diperbarui', 'kondisi' => $post['kondisi']);
                    }
                } else {
                    $msg = array('res'=>0, 'msg' => 'Umur, Jenis Kelamin, No. Telepon, Alamat Domisili dan Riwayat Perjalanan Tidak Boleh Kosong', 'kondisi' => $post['kondisi']);
                }
            } else {
                $msg = array('res'=>0, 'msg' => 'NIK Sudah Digunakan', 'kondisi' => $post['kondisi']);
            }
        } else {
            $msg = array('res'=>0, 'msg' => 'NIK tidak berjumlah 16 karakter', 'kondisi' => $post['kondisi']);
        }
        
        return json_encode($msg);
    }

    public function delete($id)
    {
        $where = array(
            'id_laporan' => $id
        );

        $data_id = $this->getDataId($id);
        $cek = $this->db->delete('tb_laporan', $where);

        if ($cek) {
            $data = array(
                'data_id' => $data_id
            );
            $this->db->insert("tb_delete", $data);
            $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Dihapus');
        } else {
            $msg = array('res'=>0, 'msg' => 'Laporan Gagal Dihapus');
        }

        return json_encode($msg);
    }

    public function getDataId($id)
    {
        $data = $this->db->get_where("tb_laporan", ["id_laporan" => $id])->row();

        return $data->data_id;
    }

    public function positif($id)
    {
        $q = $this->db->query("SELECT kasus FROM tb_laporan WHERE validasi='1' AND kondisi='2' AND covid='1' ORDER BY kasus DESC LIMIT 1")->row();
        $kasus = $q->kasus + 1;

        $data = array(
            'covid' => 1,
            'kasus' => $kasus,
            'valid_at' => date("Y-m-d H.i.s")
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            // $this->_insertData(date("Y-m-d"));
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function negatif($id)
    {
        $data = array(
            'covid' => 2,
            'valid_at' => date("Y-m-d H.i.s")
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            // $this->_insertData(date("Y-m-d"));
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function meninggal($id)
    {
        $data = array(
            'st' => 2,
            'valid_at' => date("Y-m-d H.i.s")
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            // $this->_insertData(date("Y-m-d"));
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }
    
    public function sendPDP($id)
    {
        $post = $this->input->post();
        $data = array(
            'validasi' => 0,
            'valid_at' => "",
            'created_at' => date("Y-m-d H:i:s"),
            'kondisi' => 2,
            'rawat' => $post['rawat'],
            'riwayat_jalan' => $post['riwayat_jalan'],
            'keterangan' => $post['keterangan']
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            // $this->_insertData(date("Y-m-d"));
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function sembuh($id)
    {
        $data = array(
            'st' => 1,
            'valid_at' => date("Y-m-d H.i.s")
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            // $this->_insertData(date("Y-m-d"));
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }
    
    public function changePass($id_user)
    {
        $post = $this->input->post();
        $pass_b = $post['pass_b'];
        $pass_b2 = $post['pass_b2'];

        $where = array(
            'id_user' => $id_user
        );

        $data = array(
            'pass_user' => hash('sha256', $pass_b)
        );

        if ($pass_b == $pass_b2) {
            $this->db->where($where);
            $cek = $this->db->update('tb_user', $data);
            if ($cek) {
                $msg = array("res"=> 1, "msg"=>"Berhasil Merubah Password");
            } else {
                $msg = array("res"=> 0, "msg"=>"Gagal Merubah Password");
            }
            
        } else {
            $msg = array("res"=> 0, "msg"=>"Ulangi Input Password, Password Tidak sama.");
        }
        
        return json_encode($msg);
    }

    public function getBpjs($nik)
    {
        $sub = substr($nik, 0, 2);
        if ($sub == "33") {
            $url = "http://dkk.sikdkkjepara.net/sik/pages/simpus/bridging-bpjs/data_get_peserta.php?jnsKartu=nik&nokartuku=$nik";
            $result = file_get_contents($url);
            // Will dump a beauty json :3
            $data = json_decode($result, true);
    
            if ($data['ketAktif'] == '' || $data['ketAktif'] == 'MENINGGAL') {
            } else {
                $hsl = $data['ketAktif'];
            }
        } else {
            $hsl = 'NIK TIDAK BENAR';
        }
        
        return $hsl;
    }

    public function cekNik($nik)
    {
        $data = $this->db->get_where("tb_laporan", ["nik" => $nik])->num_rows();

        return $data;
    }

    public function cekNikOtg($nik)
    {
        $data = $this->db->get_where("tb_otg", ["nik" => $nik])->num_rows();

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

    public function getApi()
    {
        // $this->cekPasien();
        $url = "http://localhost/laporkan/services/getData";
        $result = file_get_contents($url);
        // Will dump a beauty json :3
        $data = json_decode($result, true);

        return $data["Data"];
    }


    public function getApi2($id)
    {
        // $this->cekPasien();
        $url = "http://lapor-covid19.mi-kes.net/services/getData3/".$id;
        $result = file_get_contents($url);
        // Will dump a beauty json :3
        $data = json_decode($result, true);

        return $data["Data"];
    }

    // UPDATE KE KOMINFO
    
    public function updateAll()
    {
        $data = array(
            "update_at" => date("Y-m-d H:i:s"),
            "odp_lama" => $this->getODP("lama"),
            "odp_baru" => $this->getODP("baru"),
            "odp_all" => $this->getODP("komulatif"),
            "odp_lulus" => $this->getODP("lulus"),
            "odp_proses" => $this->getODP("proses"),
            "pdp_ranap" => $this->getPDP("ranap"),
            "pdp_rajal" => $this->getPDP("rajal"),
            "pdp_rujuk" => $this->getPDP("rujuk"),
            "pdp_sembuh" => $this->getPDP("sembuh"),
            "pdp_all" => $this->getPDP("komulatif"),
            "pdp_lama" => $this->getPDP("lama"),
            "pdp_baru" => $this->getPDP("baru"),
            "pdp_meninggal" => $this->getPDP("meninggal"),
            "covid_all" => $this->getCov("komulatif"),
            "rawat" => $this->getCov("rawat"),
            "sembuh" => $this->getCov("sembuh"),
            "meninggal" => $this->getCov("meninggal"),
            "rawat_luar" => $this->getCov("rawat_luar")
        );

        $cek = $this->db->insert("tb_update", $data);
        
        if ($cek) {
            $this->updateLaporan("1");
            $this->updateLaporan("2");
            $this->updateHarian();
            $this->updateKec();
            $msg = array("res"=> 1, "msg"=>"Berhasil Update Data ke CORONA.JEPARA.GO.ID");
        } else {
            $msg = array("res"=> 0, "msg"=>"Gagal Update Data ke CORONA.JEPARA.GO.ID");
        }

        return $msg;
    }

    public function updateLaporan($id)
    {
        $where = array(
            "kondisi" => $id,
            "validasi" => "0"
        );
        $data = array(
            "validasi" => "1",
            "valid_at" => date("Y-m-d H:i:s")
        );
        $this->db->update("tb_laporan", $data, $where);
    }
    public function getODP($id)
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

    public function getCovidAll()
    {
        $where = array(
            "kondisi" => "2",
            "covid" => "1"
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        return number_format($data, 0, ",", ".");
    }

    public function getCov($id)
    {
        // $where = array(
        //     "kondisi" => "2",
        //     "covid" => "1",
        //     "st" => $id
        // );
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

    public function updateHarian()
    {
        $msg = 0;
        $this->db->truncate("tb_harian");
        for ($i=4; $i >= 0 ; $i--) { 
            $sblm = mktime(0, 0, 0, date('n'), date('j')-$i, date('Y'));

            if ($i == 4) {
                $tgl2 = date("Y-m-d", $sblm);
                $tgl = $tgl2." 23:59:00";
                echo $tgl."<br>";
                $odp = $this->db->query("SELECT * FROM tb_laporan WHERE validasi != '2' AND kondisi='1' AND covid != '1' AND valid_at <= '$tgl'")->num_rows();
                $pdp = $this->db->query("SELECT * FROM tb_laporan WHERE validasi != '2' AND kondisi='2' AND covid != '1' AND valid_at <= '$tgl'")->num_rows();
                $covid = $this->db->query("SELECT * FROM tb_laporan WHERE kondisi='2' AND covid='1' AND valid_at <= '$tgl'")->num_rows();
            } else {
                $tgl = date("Y-m-d", $sblm);
                echo $tgl."<br>";
                $odp = $this->db->query("SELECT * FROM tb_laporan WHERE validasi != '2' AND kondisi='1' AND covid != '1' AND valid_at LIKE '$tgl%'")->num_rows();
                $pdp = $this->db->query("SELECT * FROM tb_laporan WHERE validasi != '2' AND kondisi='2' AND covid != '1' AND valid_at LIKE '$tgl%'")->num_rows();
                $covid = $this->db->query("SELECT * FROM tb_laporan WHERE kondisi='2' AND covid='1' AND valid_at LIKE '$tgl%'")->num_rows();
            }
            
            
            $data = array(
                "tanggal" => date("Y-m-d", strtotime($tgl)),
                "jumlah_odp" => $odp,
                "jumlah_pdp" => $pdp,
                "jumlah_covid" => $covid
            );
            $where = array(
                "tanggal" => date("Y-m-d", strtotime($tgl))
            );
    
            $hsl = $this->db->insert("tb_harian", $data);
            if ($hsl) {
                $msg = 1;
            } else {
                $msg = 0;
            }
            
        }
        return $msg;
    }

    public function getOP2($id, $id_k)
    {
        $where = array(
            "kondisi" => $id,
            "validasi" => "1",
            "covid !=" => "1",
            "id_kecamatan" => $id_k
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        // return $data;
        if ($id == "1") {
            $d = array(
                "id_kecamatan" => $id_k,
                "odp" => $data
            );
        } else {
            $d = array(
                "id_kecamatan" => $id_k,
                "pdp" => $data
            );
        }
        $w = array(
            "id_kecamatan" => $id_k
        );
        $this->db->update("tb_kecamatan", $d, $w);
    }

    public function getCovidAll2($id_k)
    {
        $where = array(
            "kondisi" => "2",
            "validasi" => "1",
            "covid" => "1",
            "id_kecamatan" => $id_k
        );

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        // return $data;
        $d = array(
            "id_kecamatan" => $id_k,
            "covid_all" => $data
        );
        $w = array(
            "id_kecamatan" => $id_k
        );
        $this->db->update("tb_kecamatan", $d, $w);
    }

    public function _updateDataKec($id, $id_k)
    {
        if ($id == "odp") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "0",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "odp_selesai") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "2",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "pdp") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "0",
                "st" => "0",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "pdp_sehat") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "0",
                "st" => "1",
                "id_kecamatan" => $id_k
            );
        } elseif($id == "pdp_meninggal") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "0",
                "st" => "2",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "covid") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "0",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "covid_sembuh") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "1",
                "id_kecamatan" => $id_k
            );
        } elseif ($id == "covid_md") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "2",
                "id_kecamatan" => $id_k
            );
        }

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        // return $data;
        if ($id == "odp") {
            $d = array(
                "odp" => $data
            );
        } elseif ($id == "odp_selesai") {
            $d = array(
                "odp_selesai" => $data
            );
        } elseif ($id == "pdp") {
            $d = array(
                "pdp" => $data
            );
        } elseif ($id == "pdp_sehat") {
            $d = array(
                "pdp_sehat" => $data
            );
        } elseif($id == "pdp_meninggal") {
            $d = array(
                "pdp_meninggal" => $data
            );
        } elseif ($id == "covid") {
            $d = array(
                "covid_all" => $data
            );
        } elseif ($id == "covid_sembuh") {
            $d = array(
                "covid_sembuh" => $data
            );
        } elseif ($id == "covid_md") {
            $d = array(
                "covid_meninggal" => $data
            );
        }

        $w = array(
            "id_kecamatan" => $id_k
        );
        $this->db->update("tb_kecamatan", $d, $w);
    }

    public function updateKec()
    {
        $d = $this->getKecamatan()->result();
        foreach ($d as $key) {
            $id = $key->id_kecamatan;
            // $this->getOP2("1",$id);
            // $this->getOP2("2",$id);
            // $this->getCovidAll2($id);
            $this->_updateDataKec("odp",$id);
            $this->_updateDataKec("odp_selesai",$id);
            $this->_updateDataKec("pdp",$id);
            $this->_updateDataKec("pdp_sehat",$id);
            $this->_updateDataKec("pdp_meninggal",$id);
            $this->_updateDataKec("covid",$id);
            $this->_updateDataKec("covid_sembuh",$id);
            $this->_updateDataKec("covid_md",$id);
        }
    }

    public function _updateDataKel($id, $id_k)
    {
        if ($id == "odp") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "0",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "odp_selesai") {
            $where = array(
                "kondisi" => "1",
                "validasi" => "1",
                "covid" => "2",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "pdp") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "0",
                "st" => "0",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "pdp_sehat") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "0",
                "st" => "1",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "covid") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "0",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "covid_sembuh") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "1",
                "id_kelurahan" => $id_k
            );
        } elseif ($id == "covid_md") {
            $where = array(
                "kondisi" => "2",
                "validasi" => "1",
                "covid" => "1",
                "st" => "2",
                "id_kelurahan" => $id_k
            );
        }

        $data = $this->db->get_where("tb_laporan", $where)->num_rows();

        // return $data;
        if ($id == "odp") {
            $d = array(
                "odp" => $data
            );
        } elseif ($id == "odp_selesai") {
            $d = array(
                "odp_selesai" => $data
            );
        } elseif ($id == "pdp") {
            $d = array(
                "pdp" => $data
            );
        } elseif ($id == "pdp_sehat") {
            $d = array(
                "pdp_sehat" => $data
            );
        } elseif ($id == "covid") {
            $d = array(
                "covid_all" => $data
            );
        } elseif ($id == "covid_sembuh") {
            $d = array(
                "covid_sembuh" => $data
            );
        } elseif ($id == "covid_md") {
            $d = array(
                "covid_meninggal" => $data
            );
        }

        $w = array(
            "id_kelurahan" => $id_k
        );
        $this->db->update("tb_kelurahan", $d, $w);
    }

    public function updateKel()
    {
        $d = $this->getKelurahan()->result();
        foreach ($d as $key) {
            $id = $key->id_kelurahan;
            $this->_updateDataKel("odp",$id);
            $this->_updateDataKel("odp_selesai",$id);
            $this->_updateDataKel("pdp",$id);
            $this->_updateDataKel("pdp_sehat",$id);
            $this->_updateDataKel("covid",$id);
            $this->_updateDataKel("covid_sembuh",$id);
            $this->_updateDataKel("covid_md",$id);
        }
    }
    
    
    public function rujuk($id)
    {
        $post = $this->input->post();

        if ($post['rujuk'] == "0") {
            $rawat = $post['rawat'];
            $rujuk = "0";
            $rs = "";
            $kota = "";
        } else {
            $faskes = explode("-", $post['rawat']);
            $rawat = $post['rwt'];
            $rujuk = "1";
            $rs = $faskes[0];
            $kota = $faskes[1];
        }

        $data = array(
            'rawat' => $rawat,
            'rujuk' => $rujuk,
            'rs' => $rs,
            'kota' => $kota,
            'valid_at' => date("Y-m-d H.i.s")
        );

        $where = array(
            'id_laporan' => $id
        );

        $cek = $this->db->update('tb_laporan', $data, $where);

        if ($cek) {
            
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function getFaskes($nama)
    {
        $data = $this->db->get_where("tb_faskes", ["nama_faskes"=> $nama])->row();

        $data2 = $this->db->get_where("tb_faskes", ["id_faskes"=> $data->kode_kecamatan])->row();
        $data3 = $this->db->get_where("tb_user", ["nama_user"=> $data2->nama_faskes])->row();
        $hasil["id_faskes"] = $data3->id_user;
        $hasil["nama_faskes"] = $data3->nama_user;
        return $hasil;
    }

    public function getFaskesLuar()
    {
        $data = $this->db->get("tb_faskes_luar")->result();

        return $data;
    }
    public function getFaskesLuarById($id)
    {
        $data = $this->db->get_where("tb_faskes_luar", ["id_faskes_luar" => $id])->row();

        return $data;
    }

    public function getFaskesLuarByKota($id)
    {
        $data = $this->db->get_where("tb_faskes_luar", ["kota" => $id])->result();

        return $data;
    }
    
    public function add_faskes()
    {
        $post = $this->input->post();
        $data = array(
            "nama_faskes_luar" => strtoupper($post['nama_faskes']),
            "kota" => strtoupper($post['kota'])
        );
        $cek = $this->db->insert('tb_faskes_luar', $data);

        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Ditambah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Ditambah');
        }

        return json_encode($msg);
    }
    public function edit_faskes($id)
    {
        $post = $this->input->post();
        $data = array(
            "nama_faskes_luar" => strtoupper($post['nama_faskes']),
            "kota" => strtoupper($post['kota'])
        );
        $where = array(
            "id_faskes_luar" => $id
        );
        $cek = $this->db->update('tb_faskes_luar', $data, $where);

        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Diubah');
        }

        return json_encode($msg);
    }
    public function del_faskes($id)
    {
        $where = array(
            "id_faskes_luar" => $id
        );
        $cek = $this->db->delete('tb_faskes_luar', $where);

        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Dihapus');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Dihapus');
        }

        return json_encode($msg);
    }

    public function getKota()
    {
        $data = $this->db->query("SELECT DISTINCT(kota) as kota FROM tb_faskes_luar")->result();

        return $data;
    }

    public function get_hubungan()
    {
        $data = $this->db->get("tb_hubungan")->result();
        return $data;
    }

    public function get_jenis_kontak()
    {
        $data = $this->db->get("tb_jenis_kontak")->result();
        return $data;
    }

    public function save_tracing()
    {
        # code...
    }
    
    public function save_otg_tracing()
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0],0,2) != "08") {
            $msg = array('res'=>0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
            return json_encode($msg);
        }
        // if ($post['umur'] == '' || $post['umur'] == '0') {
        if ($post['umur'] == '') {
            $msg = array('res'=>0, 'msg' => 'Umur Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['nik'] != '' && strlen($post['nik']) == '16') {
            $cekNik = $this->cekNik($post['nik']);
            $cekNik2 = $this->cekNikOtg($post['nik']);
            if ($cekNik == '0' && $cekNik2 == '0') {
                if ($post['alamat_domisili'] != '' && $post['jekel'] != '') {
                    $data = array (
                        'id_kecamatan' => $post['id_kecamatan'],
                        'nik' => $post['nik'],
                        'nama' => $post['nama'],
                        'alamat_domisili' => $post['alamat_domisili'],
                        'created_at' => $post['created_at'],
                        'wn' => $post['wn'],
                        'keterangan' => $post['keterangan'],
                        'created_by' => $post['created_by'],
                        'jekel' => $post['jekel'],
                        'umur' => $post['umur'],
                        'no_telp' => $post['no_telp'],
                        'id_kelurahan' => $post['id_kelurahan'],
                        'rdt' => $post['rdt'],
                        'nakes' => $post['nakes'],
                        'swab' => $post['swab']
                    );
            
                    if ($this->session->userdata("id_user") != "") {
                        $cek = $this->db->insert('tb_otg', $data);
                    } else {
                        $cek = 0;
                    }
                    
                    if ($cek) {
                        $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Dibuat');
                    } else {
                        $msg = array('res'=>0, 'msg' => 'Laporan Gagal Dibuat');
                    }
                } else {
                    $msg = array('res'=>0, 'msg' => 'Jenis Kelamin dan Alamat Domisili Tidak Boleh Kosong');
                }
            } else {
                $msg = array('res'=>0, 'msg' => 'NIK Sudah Digunakan');
            }
            
        } else {
            $msg = array('res'=>0, 'msg' => 'NIK tidak berjumlah 16 karakter');
        }
        
        
        return json_encode($msg);
    }

    public function save_otg()
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0],0,2) != "08") {
            $msg = array('res'=>0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
            return json_encode($msg);
        }
        // if ($post['umur'] == '' || $post['umur'] == '0') {
        if ($post['umur'] == '') {
            $msg = array('res'=>0, 'msg' => 'Umur Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['nik'] != '' && strlen($post['nik']) == '16') {
            $cekNik = $this->cekNik($post['nik']);
            $cekNik2 = $this->cekNikOtg($post['nik']);
            if ($cekNik == '0' && $cekNik2 == '0') {
                if ($post['alamat_domisili'] != '' && $post['jekel'] != '') {
                    $data = array (
                        'id_kecamatan' => $post['id_kecamatan'],
                        'nik' => $post['nik'],
                        'nama' => $post['nama'],
                        'alamat_domisili' => $post['alamat_domisili'],
                        'created_at' => $post['created_at'],
                        'wn' => $post['wn'],
                        'keterangan' => $post['keterangan'],
                        'created_by' => $post['created_by'],
                        'jekel' => $post['jekel'],
                        'umur' => $post['umur'],
                        'no_telp' => $post['no_telp'],
                        'id_kelurahan' => $post['id_kelurahan'],
                        'rdt' => $post['rdt'],
                        'nakes' => $post['nakes'],
                        'swab' => $post['swab']
                    );
            
                    if ($this->session->userdata("id_user") != "") {
                        $cek = $this->db->insert('tb_otg', $data);
                    } else {
                        $cek = 0;
                    }
                    
                    if ($cek) {
                        $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Dibuat');
                    } else {
                        $msg = array('res'=>0, 'msg' => 'Laporan Gagal Dibuat');
                    }
                } else {
                    $msg = array('res'=>0, 'msg' => 'Jenis Kelamin dan Alamat Domisili Tidak Boleh Kosong');
                }
            } else {
                $msg = array('res'=>0, 'msg' => 'NIK Sudah Digunakan');
            }
            
        } else {
            $msg = array('res'=>0, 'msg' => 'NIK tidak berjumlah 16 karakter');
        }
        
        
        return json_encode($msg);
    }

    public function edit_otg($id)
    {
        $post = $this->input->post();

        $where = array(
            'id_otg' => $id
        );

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0],0,2) != "08") {
            $msg = array('res'=>0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
            return json_encode($msg);
        }
        // if ($post['umur'] == '' || $post['umur'] == '0') {
        if ($post['umur'] == '') {
            $msg = array('res'=>0, 'msg' => 'Umur Harus Diisi dengan BENAR');
            return json_encode($msg);
        }


        if ($post['nik'] != '' && strlen($post['nik']) == '16') {
            if ($post['nik'] != $post['nik2']) {
                $cekNik = $this->cekNik($post['nik']);
                $cekNik2 = $this->cekNikOtg($post['nik']);
            } else {
                $cekNik = "0";
                $cekNik2 = "0";
            }
            if ($cekNik == '0' && $cekNik2 == "0") {
                if ($post['alamat_domisili'] != '' && $post['jekel'] != '') {
                    $data = array(
                        'id_kecamatan' => $post['id_kecamatan'],
                        'nik' => $post['nik'],
                        'nama' => $post['nama'],
                        'wn' => $post['wn'],
                        'keterangan' => $post['keterangan'],
                        'alamat_domisili' => $post['alamat_domisili'],
                        'jekel' => $post['jekel'],
                        'umur' => $post['umur'],
                        'no_telp' => $post['no_telp'],
                        'id_kelurahan' => $post['id_kelurahan'],
                        'rdt' => $post['rdt'],
                        'nakes' => $post['nakes'],
                        'swab' => $post['swab']
                    );
    
                    $cek = $this->db->update('tb_otg', $data, $where);
            
                    if ($cek) {
                        $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Diperbarui');
                    } else {
                        $msg = array('res'=>0, 'msg' => 'Laporan Gagal Diperbarui');
                    }
                } else {
                    $msg = array('res'=>0, 'msg' => 'Umur, Jenis Kelamin, No. Telepon, Alamat Domisili dan Riwayat Perjalanan Tidak Boleh Kosong');
                }
            } else {
                $msg = array('res'=>0, 'msg' => 'NIK Sudah Digunakan');
            }
        } else {
            $msg = array('res'=>0, 'msg' => 'NIK tidak berjumlah 16 karakter');
        }
        
        return json_encode($msg);
    }

    public function delete_otg($id)
    {
        $where = array(
            'id_otg' => $id
        );

        $cek = $this->db->delete('tb_otg', $where);

        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Dihapus');
        } else {
            $msg = array('res'=>0, 'msg' => 'Laporan Gagal Dihapus');
        }

        return json_encode($msg);
    }

    public function getOtgBy($id)
    {
        
        $this->db->select("*");
        $this->db->from("tb_otg");
        $this->db->join("tb_kecamatan", "tb_otg.id_kecamatan = tb_kecamatan.id_kecamatan");
        $this->db->join("tb_kelurahan", "tb_otg.id_kelurahan = tb_kelurahan.id_kelurahan");
        $this->db->where(['id_otg' => $id]);
        $data = $this->db->get()->row();

        return $data;
    }

    public function save_swab($id, $tgl, $hsl)
    {
        $data = array (
            'id_laporan' => $id,
            'tgl_swab' => $tgl,
            'hasil_swab' => $hsl
        );

        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->insert('tb_swab', $data);
        } else {
            $cek = 0;
        }
    }

    public function remove_swab($id)
    {
        $where = array(
            'id_laporan' => $id
        );

        $this->db->delete('tb_swab', $where);
    }

    public function changeStatus($id, $covid, $hsl)
    {
        if ($covid == '3') {
            $where = array(
                'id_otg' => $id
            );
        } else {
            $where = array(
                'id_laporan' => $id
            );
        }
        
        if ($covid == '0') {
            if ($hsl == '1') {
                $data = array (
                    'covid' => '1'
                );
            } elseif ($hsl == '2')  {
                $data = array (
                    'st' => '1'
                );
            }
            
        } elseif ($covid == '1') {
            if ($hsl == '1') {
                $data = array (
                    'st' => '0'
                );
            } elseif ($hsl == '2')  {
                $data = array (
                    'st' => '1'
                );
            }
        }
        
        $cek = $this->db->update('tb_laporan', $data, $where);
    }
}

/* End of file ModelName.php */
