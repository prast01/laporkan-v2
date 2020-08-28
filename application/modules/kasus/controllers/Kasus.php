<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasus');
    }

    public function index()
    {
        $model = $this->M_kasus;

        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        $data['rs'] = $model->get_sumber();

        if ($this->session->userdata('id_user') != '') {
            $this->template('dashboard', $data);
        } else {
            redirect('../', 'refresh');
        }
    }
}

/* End of file Kasus.php */
