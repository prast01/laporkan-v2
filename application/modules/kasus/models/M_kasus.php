<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kasus extends CI_Model
{

    // ambil data
    public function get_sumber()
    {
        $data = $this->db->get_where('tb_user', ['level_user' => 3])->result();

        return $data;
    }

    public function get_kecamatan()
    {
        $data = $this->db->get("tb_kecamatan")->result();

        return $data;
    }

    public function get_faskes()
    {
        $search = $_GET['search'];

        $this->db->from('tb_hospital');
        $this->db->like("nama_hospital", $search);
        $data = $this->db->get()->result();

        return $data;
    }

    public function get_status($t = "")
    {
        if ($t == "1") {
            $this->db->where(["input" => 1]);
            $this->db->or_where(["input" => 2]);
            $this->db->or_where(["input" => 4]);
        } elseif ($t == "2") {
            $this->db->where(["input" => 1]);
            $this->db->or_where(["input" => 2]);
            $this->db->or_where(["input" => 3]);
            $this->db->or_where(["input" => 4]);
        } elseif ($t == "3") {
            $this->db->where(["input" => 1]);
        } else {
            $this->db->or_where(["input" => 4]);
        }

        $this->db->order_by('id_status_2', 'desc');
        $data = $this->db->get("tb_status_2")->result();

        return $data;
    }

    public function get_status_riwayat($k)
    {
        if ($k >= "1" && $k <= "6") {
            $where = array("1", "2", "5", "6");
        } elseif ($k >= "7" && $k <= "12") {
            $where = array("1", "2", "5", "6", "7", "8", "11", "12");
        } elseif ($k >= "13" && $k <= "17") {
            $where = array("1", "2", "5", "6", "7", "8", "11", "12", "13", "14", "16", "17");
        } elseif ($k >= "18" && $k <= "19") {
            $where = array("1", "2", "5", "6", "7", "8", "11", "12", "13", "14", "16", "17", "18");
        }

        $this->db->where_in("id_status_2", $where);
        $this->db->order_by('id_status_2', 'desc');
        $data = $this->db->get("tb_status_2")->result();

        return $data;
    }

    public function get_data($id)
    {
        $data = $this->db->get_where("view_data_laporan", ["id_laporan" => $id])->row();

        return $data;
    }

    public function get_kelurahan_by($id)
    {
        $kec = $this->db->get_where("tb_kecamatan", ["id_kecamatan" => $id])->row();
        $data = $this->db->get_where("tb_kelurahan", ["kode_kec" => $kec->kode])->result();

        return $data;
    }

    public function get_penyakit_by($id)
    {
        $data = $this->db->get_where("tb_penyakit", ["kdiag" => $id])->row();

        return $data;
    }

    public function get_riwayat($id)
    {
        $data = $this->db->query("SELECT * FROM tb_riwayat a, tb_status_2 b WHERE a.id_status = b.id_status_2 AND a.id_laporan='$id'")->result();

        return $data;
    }

    public function get_pasien_by($nik)
    {
        $data = $this->db->get_where("tb_laporan_baru", ["nik" => $nik]);

        return $data;
    }

    public function get_status_by_id($id)
    {
        $data = $this->db->get_where("tb_status_2", ["id_status_2" => $id])->row();

        return $data->nama_status;
    }

    public function get_kecamatan_by_id($id)
    {
        $data = $this->db->get_where("tb_kecamatan", ["id_kecamatan" => $id])->row();

        return $data->nama_kecamatan;
    }

    public function get_kelurahan_by_id($id)
    {
        $data = $this->db->get_where("tb_kelurahan", ["id_kelurahan" => $id])->row();

        return $data->nama_kelurahan;
    }

    public function get_job()
    {
        $search = $_GET['search'];

        $this->db->from('tb_pekerjaan');
        $this->db->like("pekerjaan", $search);
        $data = $this->db->get()->result();

        return $data;
    }

    public function get_job_place()
    {
        $search = $_GET['search'];

        $this->db->distinct("tempat_kerja");
        $this->db->from('tb_laporan_baru');
        $this->db->like("tempat_kerja", $search);
        $data = $this->db->get();

        return $data;
    }

    public function get_job_by($id)
    {
        if ($id != "") {
            $data = $this->db->get_where("tb_pekerjaan", ["id_pekerjaan" => $id])->row();
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_job_place_by($id)
    {
        if ($id != "") {
            $data = $this->db->get_where("tb_laporan_baru", ["tempat_kerja" => $id])->row();
        } else {
            $data = "";
        }

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

    public function get_data_pasien()
    {
        $search = $_GET['search'];
        $id_kec = $_GET['id_kecamatan'];

        $this->db->from("view_data_laporan");
        $this->db->where("id_kecamatan", $id_kec);
        $this->db->like("nama", $search);
        $data = $this->db->get()->result();

        return $data;
    }

    public function get_kontak($id)
    {
        $data = $this->db->get_where("tb_kontak", ['id_laporan' => $id])->result();

        return $data;
    }

    public function get_kontak_by_id($id_laporan, $kontak)
    {
        $data = $this->db->get_where("tb_kontak", ['kontak' => $kontak, "id_laporan" => $id_laporan])->num_rows();

        return $data;
    }

    public function get_total_kontak($id_laporan)
    {
        $jml = $this->db->get_where("tb_kontak", ["id_laporan" => $id_laporan])->num_rows();

        $where = array(
            "id_laporan" => $id_laporan
        );

        $data = array(
            'kontak' => $jml
        );

        $this->db->update("tb_laporan_baru", $data, $where);
    }

    public function get_pe($id)
    {
        $cek = $this->db->get_where("tb_pe", ["id_laporan" => $id]);

        if ($cek->num_rows() > 0) {
            $data = $cek->row_array();
        } else {
            $data = array(
                "tgl_gejala" => "",
                "demam" => "",
                "riwayat_demam" => "",
                "batuk" => "",
                "pilek" => "",
                "sakit_tenggorokan" => "",
                "sesak_napas" => "",
                "penyakit_lain" => "",
                "pneumonia" => "",
                "ards" => "",
                "diagnosa_lain" => "",
                "luar_negeri" => "",
                "jalan_lokal" => "",
                "tinggal_lokal" => "",
                "kontak_suspek" => "",
                "kontak_konfirmasi" => "",
                "hewan" => "",
            );
        }

        return $data;
    }

    // CRUD
    public function save()
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0], 0, 2) != "08") {
            $msg = array('res' => 0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['rt'] == "" || $post['rw'] == "") {
            $msg = array('res' => 0, 'msg' => 'RT RW harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['umur'] == '') {
            $msg = array('res' => 0, 'msg' => 'Umur Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['nakes'] == '') {
            $msg = array('res' => 0, 'msg' => 'Pertanyaan Nakes Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['status'] == '1' || $post['status'] == '7' || $post['status'] == '13') {
            if ($post['faskes_akhir'] == '') {
                $msg = array('res' => 0, 'msg' => 'Rumah Sakit Harus Diisi dengan BENAR');
                return json_encode($msg);
            } else {
                $faskes = $post['faskes_akhir'];
            }
        } else {
            $nama_user = $this->session->userdata("nama_user");
            $faskes = $nama_user;
        }

        if ($post['penyakit'] == '') {
            $msg = array('res' => 0, 'msg' => 'Penyakit Harus Diisi dengan BENAR. Jika <b>TIDAK ADA</b> penyakit, silahkan ketikkan Tidak Ada.');
            return json_encode($msg);
        }

        if ($post['id_kecamatan'] == '' || $post['id_kelurahan'] == '') {
            $msg = array('res' => 0, 'msg' => 'Kecamatan dan Kelurahan Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if (strlen($post['nik']) < "16") {
            $msg = array('res' => 0, 'msg' => 'NIK Harus Diisi dengan BENAR');
            return json_encode($msg);
        } else {
            $cek_nik = $this->_get_nik($post['nik']);
            if ($cek_nik['res']) {
                $msg = array('res' => 0, 'msg' => $cek_nik['msg'] . " Pada kasus : " . $cek_nik['data'] . " oleh : " . $cek_nik['faskes']);
                return json_encode($msg);
            }
        }

        if ($post['status'] == '1' || $post['status'] == '2' || $post['status'] == '5' || $post['status'] == '6') {
            if ($post['kasus'] == '') {
                $msg = array('res' => 0, 'msg' => 'Nomor Kasus Harus Diisi dengan BENAR karena statusnya TERKONFIRMASI.');
                return json_encode($msg);
            } else {
                $kasus = $post['kasus'];
            }
        } else {
            $kasus = NULL;
        }

        if ($post['status'] == "1" || $post['status'] == "7" || $post['status'] == "13") {
            $id_gejala = $post['id_gejala'];
            $tgl_gejala = $post['tgl_gejala'];
        } else {
            $id_gejala = 13;
            $tgl_gejala = NULL;
        }

        $p = $this->get_penyakit_by($post['penyakit']);
        if ($post['job'] != "") {
            $pd = $this->get_job_by($post['job']);
            $pk = $pd->pekerjaan;
        } else {
            $pk = "";
        }

        $data = array(
            'id_gejala' => $id_gejala,
            'tgl_gejala' => $tgl_gejala,
            'id_kecamatan' => $post['id_kecamatan'],
            'tgl_periksa' => $post['tgl_periksa'],
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'alamat_domisili' => $post['alamat_domisili'],
            'rt' => $post['rt'],
            'rw' => $post['rw'],
            'created_at' => $post['created_at'],
            'wn' => $post['wn'],
            'keterangan' => $post['keterangan'],
            'created_by' => $post['created_by'],
            'jekel' => $post['jekel'],
            'umur' => $post['umur'],
            'no_telp' => $post['no_telp'],
            'id_kelurahan' => $post['id_kelurahan'],
            'kasus' => $kasus,
            'nakes' => $post['nakes'],
            'kdiag' => $post['penyakit'],
            'penyakit' => $p->diag,
            "faskes_akhir" => $faskes,
            "id_pekerjaan" => $post['job'],
            "pekerjaan" => $pk,
            "tempat_kerja" => $post['job_place'],
            "updated_at" => date("Y-m-d H:i:s"),
            'status_baru' => $post['status']
        );

        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->insert('tb_laporan_baru', $data);
            $this->_add_riwayat($post['nik']);
            $this->insert_jateng($post['nik']);
        } else {
            $cek = 0;
        }

        if ($cek) {
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Dibuat');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Dibuat');
        }

        return json_encode($msg);
    }

    public function edit($id)
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0], 0, 2) != "08") {
            $msg = array('res' => 0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['rt'] == "" || $post['rw'] == "") {
            $msg = array('res' => 0, 'msg' => 'RT RW harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['umur'] == '') {
            $msg = array('res' => 0, 'msg' => 'Umur Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['nakes'] == '') {
            $msg = array('res' => 0, 'msg' => 'Pertanyaan Nakes Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if ($post['penyakit'] == '') {
            $msg = array('res' => 0, 'msg' => 'Penyakit Harus Diisi dengan BENAR. Jika <b>TIDAK ADA</b> penyakit, silahkan ketikkan Tidak Ada.');
            return json_encode($msg);
        }

        if ($post['id_kecamatan'] == '' || $post['id_kelurahan'] == '') {
            $msg = array('res' => 0, 'msg' => 'Kecamatan dan Kelurahan Harus Diisi dengan BENAR');
            return json_encode($msg);
        }

        if (strlen($post['nik']) < "16") {
            $msg = array('res' => 0, 'msg' => 'NIK Harus Diisi dengan BENAR');
            return json_encode($msg);
        } else {
            if ($post['nik'] != $post['nik_lama']) {
                $cek_nik = $this->_get_nik($post['nik']);
                if ($cek_nik['res']) {
                    $msg = array('res' => 0, 'msg' => $cek_nik['msg'] . " Pada kasus : " . $cek_nik['data'] . " oleh : " . $cek_nik['faskes']);
                    return json_encode($msg);
                }
            }
        }

        if (isset($post['status']) and $post['status'] <= 6) {
            if ($post['kasus'] == '') {
                $msg = array('res' => 0, 'msg' => 'Nomor Kasus Harus Diisi dengan BENAR karena statusnya TERKONFIRMASI.');
                return json_encode($msg);
            } else {
                $kasus = $post['kasus'];
            }
        } else {
            $kasus = NULL;
        }

        if ($post['status'] == "1" || $post['status'] == "7" || $post['status'] == "13") {
            $id_gejala = $post['id_gejala'];
            $tgl_gejala = $post['tgl_gejala'];
        } else {
            $id_gejala = 13;
            $tgl_gejala = NULL;
        }

        if ($post['job'] != "") {
            $pd = $this->get_job_by($post['job']);
            $pk = $pd->pekerjaan;
        } else {
            $pk = "";
        }

        $data = array(
            'id_gejala' => $id_gejala,
            'tgl_gejala' => $tgl_gejala,
            'id_kecamatan' => $post['id_kecamatan'],
            'tgl_periksa' => $post['tgl_periksa'],
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'alamat_domisili' => $post['alamat_domisili'],
            'rt' => $post['rt'],
            'rw' => $post['rw'],
            'wn' => $post['wn'],
            'keterangan' => $post['keterangan'],
            'jekel' => $post['jekel'],
            'umur' => $post['umur'],
            'no_telp' => $post['no_telp'],
            'id_kelurahan' => $post['id_kelurahan'],
            'kasus' => $kasus,
            'nakes' => $post['nakes'],
            "id_pekerjaan" => $post['job'],
            "pekerjaan" => $pk,
            "tempat_kerja" => $post['job_place'],
            'penyakit' => $post['penyakit']
        );

        if ($this->session->userdata("id_user") != "") {
            $where = array(
                "id_laporan" => $id
            );
            $cek = $this->db->update('tb_laporan_baru', $data, $where);
        } else {
            $cek = 0;
        }

        if ($cek) {
            $a = $this->update_jateng($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah', 'r' => $a);
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function delete($id)
    {
        $this->delete_jateng($id);
        $cek = $this->db->delete("tb_laporan_baru", ["id_laporan" => $id]);

        if ($cek) {
            $this->_del_riwayat($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Dihapus');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Dihapus');
        }

        return json_encode($msg);
    }

    public function add_riwayat($id)
    {
        $post = $this->input->post();

        if ($post['status'] == '1' || $post['status'] == '5' || $post['status'] == '7' || $post['status'] == '11' || $post['status'] == '13' || $post['status'] == '16') {
            if ($post['faskes_akhir'] == '') {
                $msg = array('res' => 0, 'msg' => 'Rumah Sakit Harus Diisi dengan BENAR');
                return json_encode($msg);
            } else {
                $faskes = $post['faskes_akhir'];
            }
        } else {
            if ($post['status'] == '') {
                $msg = array('res' => 0, 'msg' => 'Status Harus Diisi dengan BENAR');
                return json_encode($msg);
            } else {
                $nama_user = $this->session->userdata("nama_user");
                $faskes = $nama_user;
            }
        }

        if ($post['status'] == '1' || $post['status'] == '2' || $post['status'] == '5' || $post['status'] == '6') {
            if ($post['kasus_lama'] == "") {
                $kasus = $this->_get_last_case();
            } else {
                $kasus = $post['kasus_lama'];
            }
        } else {
            if ($post['kasus_lama'] == "") {
                $kasus = null;
            } else {
                $kasus = $post['kasus_lama'];
            }
        }


        $where = array(
            "id_laporan" => $id
        );

        $data = array(
            "faskes_akhir" => $faskes,
            "kasus" => $kasus,
            "keterangan" => $post['keterangan'],
            "status_baru" => $post['status'],
            "updated_at" => date("Y-m-d H:i:s"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $r = $this->_add_riwayat_baru($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah', 'r' => $r);
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function add_riwayat_lama()
    {
        $post = $this->input->post();

        if ($post['status'] == '1' || $post['status'] == '7' || $post['status'] == '13') {
            if ($post['faskes_akhir'] == '') {
                $msg = array('res' => 0, 'msg' => 'Rumah Sakit Harus Diisi dengan BENAR');
                return json_encode($msg);
            } else {
                $faskes = $post['faskes_akhir'];
            }
        } else {
            if ($post['status'] == '') {
                $msg = array('res' => 0, 'msg' => 'Status Harus Diisi dengan BENAR');
                return json_encode($msg);
            } else {
                $nama_user = $this->session->userdata("nama_user");
                $faskes = $nama_user;
            }
        }

        if ($post['status'] == '1' || $post['status'] == '2' || $post['status'] == '5' || $post['status'] == '6') {
            if ($post['kasus_lama'] == "") {
                $kasus = $this->_get_last_case();
            } else {
                $kasus = $post['kasus_lama'];
            }
        } else {
            if ($post['kasus_lama'] == "") {
                $kasus = null;
            } else {
                $kasus = $post['kasus_lama'];
            }
        }


        $where = array(
            "id_laporan" => $post['id_laporan']
        );

        $data = array(
            "faskes_akhir" => $faskes,
            "kasus" => $kasus,
            "keterangan" => $post['keterangan'],
            "status_baru" => $post['status'],
            "updated_at" => date("Y-m-d H:i:s"),
            "tgl_periksa" => date("Y-m-d"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $this->_add_riwayat_baru($post['id_laporan']);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Ditambahkan');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Ditambahkan');
        }

        return json_encode($msg);
    }

    public function add_transfer()
    {
        $post = $this->input->post();
        $nama_user = $this->session->userdata("nama_user");
        $faskes = $nama_user;

        if ($post['status'] == '1' || $post['status'] == '2' || $post['status'] == '5' || $post['status'] == '6') {
            if ($post['kasus_lama'] == "") {
                $kasus = $this->_get_last_case();
            } else {
                $kasus = $post['kasus_lama'];
            }
        } else {
            if ($post['kasus_lama'] == "") {
                $kasus = null;
            } else {
                $kasus = $post['kasus_lama'];
            }
        }


        $where = array(
            "id_laporan" => $post['id_laporan']
        );

        $data = array(
            "faskes_akhir" => $faskes,
            "kasus" => $kasus,
            "keterangan" => $post['keterangan'],
            "status_baru" => $post['status'],
            "updated_at" => date("Y-m-d H:i:s"),
            "tgl_periksa" => date("Y-m-d"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $this->_add_riwayat_baru($post['id_laporan']);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Ditambahkan');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Ditambahkan');
        }

        return json_encode($msg);
    }

    public function selesai_isolasi($kode, $id)
    {
        if ($kode == '1') {
            $status = 3;
            $wh = array(
                "id_laporan" => $id,
            );
            $dt = array(
                "aktif" => 0,
                "updated_at" => date("Y-m-d H:i:s"),
            );
            $this->db->update("tb_isolasi", $dt, $wh);
        } elseif ($kode == '2') {
            $status = 9;
        } elseif ($kode == '3') {
            $status = 15;
        } elseif ($kode == '4') {
            $status = 19;
        }

        $where = array(
            "id_laporan" => $id
        );

        $data = array(
            "keterangan" => '-',
            "status_baru" => $status,
            "updated_at" => date("Y-m-d H:i:s"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $this->_add_riwayat_baru($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function meninggal($kode, $id)
    {
        if ($kode == '1') {
            $status = 4;
        } elseif ($kode == '2') {
            $status = 10;
        }

        $where = array(
            "id_laporan" => $id
        );

        $data = array(
            "keterangan" => 'MD',
            "status_baru" => $status,
            "updated_at" => date("Y-m-d H:i:s"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $this->_add_riwayat_baru($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function positif($id)
    {
        $where = array(
            "id_laporan" => $id
        );

        $kasus = $this->_get_last_case();

        $data = array(
            "kasus" => $kasus,
            "keterangan" => 'MD',
            "status_baru" => 4,
            "updated_at" => date("Y-m-d H:i:s"),
            "validasi" => 0
        );


        $cek = $this->db->update("tb_laporan_baru", $data, $where);

        if ($cek) {
            $this->_add_riwayat_baru($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function save_kontak($data)
    {
        $this->db->insert('tb_kontak', $data);
    }

    public function save_pasien($data, $data2)
    {
        $this->db->insert('tb_laporan_baru', $data);

        $dt = $this->get_pasien_by($data2['nik'])->row();

        $datax = array(
            'id_laporan' => $data2['id_laporan'],
            'kontak' => $dt->id_laporan,
            'status' => $dt->status_baru,
            'id_hubungan' => $data2['id_hubungan'],
            'id_jenis_kontak' => $data2['id_jenis_kontak'],
        );

        $this->save_kontak($datax);


        $this->insert_jateng($data2['nik']);
    }

    public function save_step($step, $id)
    {
        $this->_cek_pe($id);

        $post = $this->input->post();
        $tgl_gejala = (isset($post['tgl_gejala'])) ? $post['tgl_gejala'] : null;
        $demam = (isset($post['demam'])) ? $post['demam'] : null;
        $riwayat_demam = (isset($post['riwayat_demam'])) ? $post['riwayat_demam'] : null;
        $batuk = (isset($post['batuk'])) ? $post['batuk'] : null;
        $pilek = (isset($post['pilek'])) ? $post['pilek'] : null;
        $sakit_tenggorokan = (isset($post['sakit_tenggorokan'])) ? $post['sakit_tenggorokan'] : null;
        $sesak_napas = (isset($post['sesak_napas'])) ? $post['sesak_napas'] : null;
        $penyakit_lain = (isset($post['penyakit_lain'])) ? $post['penyakit_lain'] : null;
        $pneumonia = (isset($post['pneumonia'])) ? $post['pneumonia'] : null;
        $ards = (isset($post['ards'])) ? $post['ards'] : null;
        $diagnosa_lain = (isset($post['diagnosa_lain'])) ? $post['diagnosa_lain'] : null;
        $luar_negeri = (isset($post['luar_negeri'])) ? $post['luar_negeri'] : null;
        $jalan_lokal = (isset($post['jalan_lokal'])) ? $post['jalan_lokal'] : null;
        $tinggal_lokal = (isset($post['tinggal_lokal'])) ? $post['tinggal_lokal'] : null;
        $kontak_suspek = (isset($post['kontak_suspek'])) ? $post['kontak_suspek'] : null;
        $kontak_konfirmasi = (isset($post['kontak_konfirmasi'])) ? $post['kontak_konfirmasi'] : null;
        $hewan = (isset($post['hewan'])) ? $post['hewan'] : null;

        $data = array(
            "tgl_gejala" => $tgl_gejala,
            "demam" => $demam,
            "riwayat_demam" => $riwayat_demam,
            "batuk" => $batuk,
            "pilek" => $pilek,
            "sakit_tenggorokan" => $sakit_tenggorokan,
            "sesak_napas" => $sesak_napas,
        );
        $data2 = array(
            "penyakit_lain" => $penyakit_lain,
        );
        $data3 = array(
            "pneumonia" => $pneumonia,
            "ards" => $ards,
            "diagnosa_lain" => $diagnosa_lain,
        );
        $data4 = array(
            "luar_negeri" => $luar_negeri,
            "jalan_lokal" => $jalan_lokal,
            "tinggal_lokal" => $tinggal_lokal,
        );
        $data5 = array(
            "kontak_suspek" => $kontak_suspek,
            "kontak_konfirmasi" => $kontak_konfirmasi,
            "hewan" => $hewan,
        );

        if ($this->session->userdata("id_user") != "") {
            $where = array(
                "id_laporan" => $id
            );
            if ($step == 'step-1') {
                $cek = $this->db->update('tb_pe', $data, $where);
            } elseif ($step == 'step-2') {
                $cek = $this->db->update('tb_pe', $data2, $where);
            } elseif ($step == 'step-3') {
                $cek = $this->db->update('tb_pe', $data3, $where);
            } elseif ($step == 'step-4') {
                $cek = $this->db->update('tb_pe', $data4, $where);
            } elseif ($step == 'step-5') {
                $cek = $this->db->update('tb_pe', $data5, $where);
            }
        } else {
            $cek = 0;
        }

        if ($cek) {
            $msg = array('res' => 1, 'msg' => 'Berhasil Dientri');
        } else {
            $msg = array('res' => 0, 'msg' => 'Gagal Dientri');
        }

        return json_encode($msg);
    }

    // private fungsi
    private function _get_nik($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik]);

        if ($data->num_rows() > 0) {
            $d = $data->row();
            $msg = array('res' => 1, 'msg' => 'NIK Sudah digunakan.', 'data' => $d->nama_status, 'faskes' => $d->faskes_akhir);
        } else {
            $msg = array('res' => 0);
        }

        return $msg;
    }

    private function _add_riwayat($nik)
    {
        $d = $this->db->get_where("tb_laporan_baru", ['nik' => $nik])->row();

        $data = array(
            "id_laporan" => $d->id_laporan,
            "id_status" => $d->status_baru,
            "kondisi_umum" => $d->keterangan,
            "lokasi_rs" => $d->faskes_akhir,
            "updated_at" => date("Y-m-d H:i:s")
        );
        $this->db->insert('tb_riwayat', $data);
    }

    private function _add_riwayat_baru($id)
    {
        $d = $this->db->get_where("tb_laporan_baru", ['id_laporan' => $id])->row();

        $data = array(
            "id_laporan" => $d->id_laporan,
            "id_status" => $d->status_baru,
            "kondisi_umum" => $d->keterangan,
            "lokasi_rs" => $d->faskes_akhir,
            "updated_at" => date("Y-m-d H:i:s")
        );
        $cek = $this->db->insert('tb_riwayat', $data);
        if ($cek && $d->data_id != "") {
            return $this->status_jateng($d->nik);
        }
    }

    private function _del_riwayat($id)
    {
        $this->db->delete("tb_riwayat", ["id_laporan" => $id]);
    }

    private function _get_last_case()
    {
        $data = $this->db->query("SELECT MAX(kasus) as kasus FROM tb_laporan_baru")->row();

        return $data->kasus + 1;
    }

    private function _cek_pe($id)
    {
        $cek = $this->db->get_where("tb_pe", ["id_laporan" => $id])->num_rows();
        if ($cek == 0) {
            $data = array(
                "id_laporan" => $id
            );

            $this->db->insert("tb_pe", $data);
        }
    }


    public function insert_jateng($nik)
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $token = $this->session->userdata("token");
        $ps = $this->get_data_nik_2($nik);

        $sex = ($ps->jekel == '1') ? "L" : "P";
        $phone = ($ps->no_telp != '') ? $ps->no_telp : '0800-0000-0000';
        $job_place = ($ps->tempat_kerja == '') ? 'TIDAK TAHU' : $ps->tempat_kerja;
        $ket = ($ps->keterangan == "") ? "-" : $ps->keterangan;

        $cek_rt_rw = ($ps->rt == '' && $ps->rw == '') ? false : true;
        $cek_status = ($ps->status_baru == '1' || $ps->status_baru == '5' || $ps->status_baru == '6' || $ps->status_baru == '7' || $ps->status_baru == '11' || $ps->status_baru == '12' || $ps->status_baru == '13' || $ps->status_baru == '16' || $ps->status_baru == '17') ? false : true;

        if ($cek_status) {
            $data = array(
                'nik' => $nik,
                'name' => $ps->nama,
                'age' => $ps->umur,
                'sex' => $sex,
                'phone_number' => $phone,
                'kdc' => $ps->kode_capil,
                'job_id' => $this->get_pekerjaan($ps->id_pekerjaan),
                'job_place_name' => $job_place,
                'address' => $ps->alamat_domisili,
                'rt' => $ps->rt,
                'rw' => $ps->rw,
                'common_condition' => $ket,
                'treatment' => $ket,
                'hospital_id' => $this->get_hospital($ps->faskes_akhir),
                'status_id' => $ps->id_status_jateng,
                'reported_date' => date("Y-m-d", strtotime($ps->tgl_periksa)),
                'patient_created_at' => date("Y-m-d H:i:s"),
                'case_created_at' => date("Y-m-d H:i:s")
            );
        } else {
            $tgl_gejala = ($ps->tgl_gejala == "") ? date('Y-m-d', strtotime('-7 days', date("Y-m-d", strtotime($ps->tgl_periksa)))) : date("Y-m-d", strtotime($ps->tgl_gejala));

            $data = array(
                'symptom[0]' => $ps->id_gejala,
                'symptom_date' => $tgl_gejala,
                'nik' => $nik,
                'name' => $ps->nama,
                'age' => $ps->umur,
                'sex' => $sex,
                'phone_number' => $phone,
                'kdc' => $ps->kode_capil,
                'job_id' => $this->get_pekerjaan($ps->id_pekerjaan),
                'job_place_name' => $job_place,
                'address' => $ps->alamat_domisili,
                'rt' => $ps->rt,
                'rw' => $ps->rw,
                'common_condition' => $ket,
                'treatment' => $ket,
                'hospital_id' => $this->get_hospital($ps->faskes_akhir),
                'status_id' => $ps->id_status_jateng,
                'reported_date' => date("Y-m-d", strtotime($ps->tgl_periksa)),
                'patient_created_at' => date("Y-m-d H:i:s"),
                'case_created_at' => date("Y-m-d H:i:s")
            );
        }

        if ($cek_rt_rw) {
            // $cek_nar = $this->cek_nar_2($nik, $token);
            // if ($cek_nar == 1) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_JATENG . "people/new",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $token,
                    "Accept: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $hsl = json_decode($response, true);
            $cek_error = (count($hsl['errors']) > 0 || !isset($hsl['errors'])) ? 0 : 1;
            if ($hsl['message'] != "Data Duplicate !" || $hsl['message'] != "The given data was invalid.") {
                $this->update_id($nik, $hsl['data']['id']);
            } else {
                $this->update_id($nik, null);
            }
        }
    }

    public function update_jateng($id)
    {
        $token = $this->session->userdata("token");
        $ps = $this->get_data($id);
        if ($ps->data_id != "") {
            $nama = str_replace(" ", '%20', $ps->nama);
            $alamat_domisili = str_replace(" ", '%20', $ps->alamat_domisili);
            $jk = ($ps->jekel == 1) ? "L" : "P";
            $data = "patient_id=" . $ps->data_id . "&nik=" . $ps->nik . "&name=" . $nama . "&age=" . $ps->umur . "&sex=" . $jk . "&phone_number=" . $ps->no_telp . "&kdc=" . $ps->kode_capil . "&rt=" . $ps->rt . "&rw=" . $ps->rw . "&address=" . $alamat_domisili;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_JATENG . "people?" . $data,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $token,
                    "Accept: application/json",
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        }
    }

    public function status_jateng($nik)
    {
        $token = $this->session->userdata("token");
        $ps = $this->get_data_nik_2($nik);

        $ket = ($ps->keterangan == "") ? "-" : $ps->keterangan;

        $cek_status = ($ps->status_baru == '3' || $ps->status_baru == '4' || $ps->status_baru == '5' || $ps->status_baru == '6' || $ps->status_baru == '9' || $ps->status_baru == '10' || $ps->status_baru == '11' || $ps->status_baru == '12' || $ps->status_baru == '15' || $ps->status_baru == '16' || $ps->status_baru == '17') ? false : true;

        if ($cek_status) {
            $data = array(
                'patient_id' => $ps->data_id,
                'common_condition' => $ket,
                'treatment' => $ket,
                'status_id' => $ps->id_status_jateng,
                'hospital_id' => $this->get_hospital($ps->faskes_akhir),
                'case_created_at' => date("Y-m-d H:i:s")
            );
        } else {
            $data = array(
                'patient_id' => $ps->data_id,
                'common_condition' => $ket,
                'treatment' => $ket,
                'status_id' => $ps->id_status_jateng,
                'hospital_id' => $this->get_hospital($ps->faskes_akhir),
                'date_out' => date("Y-m-d"),
                'case_created_at' => date("Y-m-d H:i:s")
            );
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_JATENG . "people/case/new",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $token,
                "Accept: application/json",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // return json_encode($data);
        return $response;
    }

    public function delete_jateng($id)
    {
        $token = $this->session->userdata("token");
        $ps = $this->get_data($id);
        if ($ps->data_id != "") {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_JATENG . "people?patient_id=" . $ps->data_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $token,
                    "Accept: application/json",
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $hsl = json_decode($response, true);
        }
        // return json_encode($ps->data_id);
    }

    public function get_data_nik_2($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik])->row();

        return $data;
    }

    public function get_pekerjaan($id)
    {
        $data = $this->db->get_where("tb_pekerjaan", ["id_pekerjaan" => $id])->row();

        $hsl = ($id == '') ? '3' : $data->id_job_jateng;

        return $hsl;
    }

    public function get_hospital($id)
    {
        $data = $this->db->get_where("tb_hospital", ["nama_hospital" => $id])->row();

        return $data->id_prov_hospital;
    }

    public function update_id($nik, $id_jateng)
    {
        $where = array("nik" => $nik);
        $data = array("data_id" => $id_jateng);

        $this->db->update("tb_laporan_baru", $data, $where);
    }

    public function get_gejala()
    {
        $data = $this->db->get("tb_gejala")->result();

        return $data;
    }
}

/* End of file M_kasus.php */
