<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
          $this->load->model("M_pasien");
  
    }
    
    public function index()
    {
        $model = $this->M_pasien;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $nama_user = $this->session->userdata("nama_user");
        $nm = explode(" ",$nama_user);
        $data['nama_user'] = $nm[0];
        if ($this->session->userdata('id_user') != '') {
            if ($data['level'] == '2' || $data['level'] == '3') {
              $this->template('dashboard', $data);
            }
        } else {
            redirect('../','refresh');
        }
    }

}

/* End of file Pasien.php */
