<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

    public function delete($id)
    {
        $where = array(
            "id_laporan" => $id
        );

        $data = array(
            "validasi" => 1
        );

        $cek = $this->db->update('tb_laporan_copy', $data, $where);

        if ($cek) {
            $msg = array('res'=>1, 'msg' => 'Data Berhasil Dihapus');
        } else {
            $msg = array('res'=>0, 'msg' => 'Data Gagal Dihapus');
        }

        return json_encode($msg);
    }


}

/* End of file M_pasien.php */
