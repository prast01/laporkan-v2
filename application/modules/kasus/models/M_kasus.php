<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasus extends CI_Model {

    public function get_sumber()
    {
        $data = $this->db->get_where('tb_user', ['level_user' => 3])->result();

        return $data;
        
    }

}

/* End of file M_kasus.php */
