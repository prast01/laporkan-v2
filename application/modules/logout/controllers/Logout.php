<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
{

    public function index()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('token');
        redirect('../', 'refresh');
    }
}

/* End of file Logout.php */
