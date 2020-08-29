<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kasus extends CI_Model
{

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

    public function get_status()
    {
        $this->db->where(["input" => 1]);
        $this->db->order_by('id_status_2', 'desc');
        $data = $this->db->get("tb_status_2")->result();

        return $data;
    }

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
                $msg = array('res' => 0, 'msg' => $cek_nik['msg'] . " pada kasus : " . $cek_nik['data']);
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
            'penyakit' => $post['penyakit'],
            "faskes_akhir" => $faskes,
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

    private function _get_nik($nik)
    {
        $data = $this->db->get_where("view_data_laporan", ["nik" => $nik]);

        if ($data->num_rows() > 0) {
            $d = $data->row();
            $msg = array('res' => 1, 'msg' => 'NIK Sudah digunakan.', 'data' => $d->nama_status);
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
}

/* End of file M_kasus.php */
