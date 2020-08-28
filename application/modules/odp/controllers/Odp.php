<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Odp extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_odp");
  }

  public function index()
  {
    $model = $this->M_odp;
    $data['id_user'] = $this->session->userdata("id_user");
    $data['level'] = $this->session->userdata("level");

    if ($this->session->userdata('id_user') != '') {
      if ($data['level'] == '2' || $data['level'] == '3') {
        $this->template('dashboard', $data);
      }
    } else {
      redirect('../', 'refresh');
    }
  }
}

/* End of file Odp.php */
