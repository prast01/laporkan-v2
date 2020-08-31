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

    // modal
    public function modal_tambah()
    {
        $model = $this->M_kasus;
        $data['kecamatan'] = $model->get_kecamatan();
        $data['status'] = $model->get_status();
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-tambah', $data);
    }

    public function modal_ubah($id)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['penyakit'] = $model->get_penyakit_by($data['laporan']->penyakit);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-ubah', $data);
    }

    public function modal_detail($id)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['penyakit'] = $model->get_penyakit_by($data['laporan']->penyakit);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-detail', $data);
    }

    public function modal_riwayat($id)
    {
        $model = $this->M_kasus;
        $data['laporan'] = $model->get_data($id);
        $data['kecamatan'] = $model->get_kecamatan();
        $data['kelurahan'] = $model->get_kelurahan_by($data['laporan']->id_kecamatan);
        $data['status'] = $model->get_status("1");
        $data['riwayat'] = $model->get_riwayat($id);
        $data['created_by'] = $this->session->userdata('id_user');

        $this->load->view('modal-riwayat', $data);
    }

    // ambil data
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

    // CRUD
    public function add()
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->save(), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function edit($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->edit($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function delete($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->delete($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function add_riwayat($id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->add_riwayat($id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function selesai_isolasi($kode, $id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->selesai_isolasi($kode, $id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }

    public function meninggal($kode, $id)
    {
        $model = $this->M_kasus;

        $hasil = json_decode($model->meninggal($kode, $id), true);

        if ($hasil['res']) {
            $this->session->set_flashdata('success', $hasil['msg']);
        } else {
            $this->session->set_flashdata('gagal', $hasil['msg']);
        }

        redirect('../kasus', 'refresh');
    }
}

/* End of file Kasus.php */
