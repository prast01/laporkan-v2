<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pp extends CI_Model {

    public function getKecamatan()
    {
        $this->db->order_by("pp", "ASC");
        $data = $this->db->get("tb_kecamatan")->result();

        return $data;
    }

    public function save()
    {
        $post = $this->input->post();

        $id = $post['id_kec'];
        $pp = $post['pp'];
        $no = 0;
        foreach ($id as $key => $value) {
            $i = $pp[$no];
            $where = array(
                "id_kecamatan" => $value
            );

            $data = array(
                "pp" => $i
            );

            $cek = $this->db->update("tb_kecamatan", $data, $where);
            if ($cek) {
                $hasil = 1;
            } else {
                $hasil = 0;
                break;
            }
            
            $no++;
        }
        
        return $hasil;
    }
    
}

/* End of file ModelName.php */
