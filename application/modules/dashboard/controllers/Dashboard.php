<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
          $this->load->model("M_dashboard");
  
    }
    
    public function index()
    {
        $model = $this->M_dashboard;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        
        if ($this->session->userdata('id_user') != '') {
            if ($data['level'] == '2' || $data['level'] == '3') {
                $api = $model->getApi();
                $data['tgl_update'] = $api['tgl_update'];
                $data['odp'] = $api['odp'];
                $data['pdp'] = $api['pdp'];
                $data['covid'] = $api['covid'];
                $this->template('dashboard', $data);
            } elseif ($data['level'] == '4') {
                redirect('../home','refresh');
            } elseif($data['level'] == '1') {
                redirect('../home','refresh');
            } elseif($data['level'] == '5') {
                redirect('../data','refresh');
            } elseif($data['level'] == '6') {
                redirect('../pp','refresh');
            }
        } else {
          redirect('../','refresh');
        }
    }

}

/* End of file Dashboard.php */
