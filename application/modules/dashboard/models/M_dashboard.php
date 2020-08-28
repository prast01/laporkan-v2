<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function getApi()
    {
        // $this->cekPasien();
        $url = "http://localhost/laporkan/services/getData";
        $result = file_get_contents($url);
        // Will dump a beauty json :3
        $data = json_decode($result, true);

        return $data["Data"];
    }

}

/* End of file M_dashboard.php */
