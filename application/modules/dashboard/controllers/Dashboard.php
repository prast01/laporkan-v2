<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

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
            $api = $model->get_realtime();
            $api2 = $model->get_cut_off();

            $data['update_at_realtime'] = $api['updated_at'];
            $data['suspek'] = $api['suspek'];
            $data['probable'] = $api['probable'];
            $data['konfirmasi'] = $api['konfirmasi'];

            $data['update_at_cutoff'] = $api2['updated_at'];
            $data['suspek_cut'] = $api2['suspek'];
            $data['probable_cut'] = $api2['probable'];
            $data['konfirmasi_cut'] = $api2['konfirmasi'];

            $this->template('dashboard', $data);

            // echo json_encode($api);
        } else {
            redirect('../', 'refresh');
        }
    }
}

/* End of file Dashboard.php */
