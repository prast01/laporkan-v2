<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pp extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pp");
  
    }
    public function index()
    {
        $model = $this->M_pp;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");

        $data['kecamatan'] = $model->getKecamatan();
        $this->template("dashboard", $data);
    }

    public function simpan()
    {
        $model = $this->M_pp;
        $hasil = $model->save();

        if($hasil){
            $this->session->set_flashdata('success', 'BERHASIL DI UBAH');
            redirect('../pp','location');
        } else {
            $this->session->set_flashdata('gagal', 'GAGAL DIUBAH');
            redirect('../pp','location');
        }
        
    }
}

/* End of file Controllername.php */
