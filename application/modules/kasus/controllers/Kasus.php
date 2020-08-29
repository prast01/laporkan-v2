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

    public function modal_tambah()
    {
        $model = $this->M_kasus;
        $data['kecamatan'] = $model->get_kecamatan();
        $data['status'] = $model->get_status();
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-tambah', $data);
    }

    public function get_faskes()
    {
        $model = $this->M_kasus;
        $data = $model->get_faskes();
        $hsl = array();

        $no = 0;
        foreach ($data as $key) {
            $hsl[$no]['nama_hospital'] = $key->nama_hospital;
            // $hsl[$no]['diag'] = $key->diag;

            $no++;
        }

        echo json_encode($hsl);
    }

    public function add()
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->save(), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        // redirect('../kasus', 'refresh');
    }
}

/* End of file Kasus.php */
