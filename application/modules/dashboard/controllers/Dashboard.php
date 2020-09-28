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

            if ($data['level'] == '5') {
                redirect('../data', 'refresh');
            } else {
                $this->template('dashboard', $data);
            }

            // echo json_encode($api);
        } else {
            redirect('../', 'refresh');
        }
    }

    public function update()
    {
        $model = $this->M_dashboard;

        $model->update();

        redirect('../dashboard/update_desa', 'refresh');
    }

    public function update_desa()
    {
        $model = $this->M_dashboard;

        $desa = $model->_get_desa();
        if ($desa->num_rows() > 0) {
            $kel = $desa->row();
            $dt = $model->_update_kel($kel->id_kelurahan);
            $data['nama_kel'] = $kel->nama_kelurahan;
            $data['suspek_dirawat'] = $dt['suspek_dirawat'];
            $data['suspek_discard'] = $dt['suspek_discard'];
            $data['probable_dirawat'] = $dt['probable_dirawat'];
            $data['probable_sembuh'] = $dt['probable_sembuh'];
            $data['probable_meninggal'] = $dt['probable_meninggal'];
            $data['konfirmasi_dirawat'] = $dt['konfirmasi_dirawat'];
            $data['konfirmasi_sembuh'] = $dt['konfirmasi_sembuh'];
            $data['konfirmasi_meninggal'] = $dt['konfirmasi_meninggal'];
            $this->load->view('v_desa', $data);
        } else {
            $this->db->query("UPDATE tb_kelurahan_baru SET updated='0'");
            $this->session->set_flashdata('success', 'Berhasil Dipublish');
            redirect('../dashboard', 'refresh');
        }
    }
}

/* End of file Dashboard.php */
