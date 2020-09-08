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
        $data = $this->db->get_where("tb_laporan_baru", ["id_laporan" => $id])->row();

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

    // CRUD
    public function save()
    {
        $post = $this->input->post();

        $telp = explode("-", $post['no_telp']);
        if ($telp[1] == "____" || substr($telp[0], 0, 2) != "08") {
            $msg = array('res' => 0, 'msg' => 'Nomor Telp Harus Diisi dengan BENAR');
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
                $msg = array('res' => 0, 'msg' => $cek_nik['msg'] . " Pada kasus : " . $cek_nik['data'] . "di Faskes : " . $cek_nik['faskes']);
                return json_encode($msg);
            }
        }

        if ($post['status'] == '1') {
            if ($post['kasus'] == '') {
                $msg = array('res' => 0, 'msg' => 'Nomor Kasus Harus Diisi dengan BENAR karena statusnya TERKONFIRMASI.');
                return json_encode($msg);
            } else {
                $kasus = $post['kasus'];
            }
        } else {
            $kasus = NULL;
        }

        $p = $this->get_penyakit_by($post['penyakit']);
        if ($post['job'] != "") {
            $pd = $this->get_job_by($post['job']);
            $pk = $pd->pekerjaan;
        } else {
            $pk = "";
        }

        $data = array(
            'id_kecamatan' => $post['id_kecamatan'],
            'tgl_periksa' => $post['tgl_periksa'],
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
                    $msg = array('res' => 0, 'msg' => $cek_nik['msg'] . " Pada kasus : " . $cek_nik['data']);
                    return json_encode($msg);
                }
            }
        }

        if ($post['job'] != "") {
            $pd = $this->get_job_by($post['job']);
            $pk = $pd->pekerjaan;
        } else {
            $pk = "";
        }

        $data = array(
            'id_kecamatan' => $post['id_kecamatan'],
            'tgl_periksa' => $post['tgl_periksa'],
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'alamat_domisili' => $post['alamat_domisili'],
            'wn' => $post['wn'],
            'keterangan' => $post['keterangan'],
            'jekel' => $post['jekel'],
            'umur' => $post['umur'],
            'no_telp' => $post['no_telp'],
            'id_kelurahan' => $post['id_kelurahan'],
            'kasus' => $post['kasus'],
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
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res' => 0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function delete($id)
    {
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

        if ($post['status'] == '1' || $post['status'] == '2') {
            $kasus = $this->_get_last_case();
        } else {
            $kasus = null;
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
            $this->_add_riwayat_baru($id);
            $msg = array('res' => 1, 'msg' => 'Laporan Berhasil Diubah');
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
            $kasus = $this->_get_last_case();
        } else {
            $kasus = null;
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

        // if ($post['status'] == '1' || $post['status'] == '7' || $post['status'] == '13') {
        //     if ($post['faskes_akhir'] == '') {
        //         $msg = array('res' => 0, 'msg' => 'Rumah Sakit Harus Diisi dengan BENAR');
        //         return json_encode($msg);
        //     } else {
        //         $faskes = $post['faskes_akhir'];
        //     }
        // } else {
        //     if ($post['status'] == '') {
        //         $msg = array('res' => 0, 'msg' => 'Status Harus Diisi dengan BENAR');
        //         return json_encode($msg);
        //     } else {
        $nama_user = $this->session->userdata("nama_user");
        $faskes = $nama_user;
        //     }
        // }

        if ($post['status'] == '1' || $post['status'] == '2' || $post['status'] == '5' || $post['status'] == '6') {
            $kasus = $this->_get_last_case();
        } else {
            $kasus = null;
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
        $this->db->insert('tb_riwayat', $data);
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
}

/* End of file M_kasus.php */
