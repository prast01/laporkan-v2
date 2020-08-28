<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_swab extends CI_Model {

    public function hapus_swab($id)
    {
        $data = array(
            "id_swab" => $id
        );

        $cek = $this->db->delete("tb_swab", $data);
        if ($cek) {
            $msg = array("res" => 1, "msg" => "Berhasil Hapus Data");
        } else {
            $msg = array("res" => 0, "msg" => "Gagal Hapus Data");
        }
        
        return json_encode($msg);
    }

    public function save_swab_kirim()
    {
        $post = $this->input->post();

        $where = array(
            "id_swab" => $post['id_swab']
        );

        $data = array (
            'id_lab' => $post['id_lab'],
            'tgl_kirim_dkk' => date("Y-m-d H:i:s")
        );

        if ($post['id_lab'] == '') {
            $msg = array('res'=>0, 'msg' => 'Lab Tujuan Harus Diisi !');
            return json_encode($msg);
        }

        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->update('tb_swab', $data, $where);
        } else {
            $cek = 0;
        }
        
        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }
    
    public function save_swab_selesai()
    {
        $post = $this->input->post();

        $where = array(
            "id_swab" => $post['id_swab']
        );

        $data = array (
            'hasil_swab' => $post['hasil_swab'],
            'tgl_selesai_dkk' => date("Y-m-d H:i:s")
        );

        if ($post['hasil_swab'] == '') {
            $msg = array('res'=>0, 'msg' => 'Hasil Swab Harus Diisi !');
            return json_encode($msg);
        }

        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->update('tb_swab', $data, $where);
        } else {
            $cek = 0;
        }
        
        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function save_swab_edit()
    {
        $post = $this->input->post();

        $where = array(
            "id_swab" => $post['id_swab']
        );

        $data = array (
            'tgl_kirim_faskes' => $post['tgl_kirim_faskes'],
            'swab_ke' => $post['swab_ke'],
            'id_lab' => $post['id_lab'],
            'hasil_swab' => $post['hasil_swab'],
            'tgl_selesai_dkk' => date("Y-m-d H:i:s")
        );

        if ($post['hasil_swab'] == '') {
            $msg = array('res'=>0, 'msg' => 'Hasil Swab Harus Diisi !');
            return json_encode($msg);
        }

        if ($post['id_lab'] == '') {
            $msg = array('res'=>0, 'msg' => 'Lab Tujuan Harus Diisi !');
            return json_encode($msg);
        }

        if ($post['tgl_kirim_faskes'] == '') {
            $msg = array('res'=>0, 'msg' => 'Tanggal Kirim ke Labkesda Harus Diisi !');
            return json_encode($msg);
        }
        if ($post['swab_ke'] == '') {
            $msg = array('res'=>0, 'msg' => 'Swab Ke Harus Diisi !');
            return json_encode($msg);
        }

        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->update('tb_swab', $data, $where);
        } else {
            $cek = 0;
        }
        
        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Laporan Berhasil Diubah');
        } else {
            $msg = array('res'=>0, 'msg' => 'Laporan Gagal Diubah');
        }

        return json_encode($msg);
    }

    public function gantiStatus($id_lap, $hasil)
    {
        if ($hasil == 'NEGATIF') {
            $data = array(
                "st" => 1
            );
        } else {
            $data = array(
                "covid" => 1
            );
        }
        
        $where = array(
            "id_laporan" => $id_lap
        );
        
        if ($this->session->userdata("id_user") != "") {
            $cek = $this->db->update('tb_laporan', $data, $where);
        } else {
            $cek = 0;
        }
        
        if ($cek) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        return $msg;
    }
}

/* End of file M_swab.php */
