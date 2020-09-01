<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ServicesV2 extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_services');
    }

    public function get_data_cut_off()
    {
        $model = $this->M_services;

        $data = $model->get_cut_off();

        echo json_encode($data);
    }

    public function get_data_kecamatan()
    {
        $model = $this->M_services;
        $data = $model->get_kecamatan();

        echo json_encode($data);
    }

    public function get_data_kelurahan($kode)
    {
        $model = $this->M_services;
        $data = $model->get_kelurahan($kode);

        echo json_encode($data);
    }
}

/* End of file ServicesV2.php */
