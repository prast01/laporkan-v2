<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
          $this->load->model("M_rekap");
  
    }
    
    public function index()
    {
        $model = $this->M_rekap;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $this->template('dashboard', $data);
    }

}

/* End of file Awal.php */
