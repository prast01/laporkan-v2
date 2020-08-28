<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tempatKarantina extends MY_Controller {

    public function __construct()
    {
      parent::__construct();
          $this->load->model("M_tempatKarantina");
  
    }
    
    public function index()
    {
        $model = $this->M_tempatKarantina;
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        
        if ($this->session->userdata('id_user') != '') {
            if ($data['level'] == '7') {
              $no = 0;
              $kara = $model->getKarantina();
              foreach ($kara as $key) {
                $is = $model->getIsman($key->id_karantina);
                $data['karantina'][$no]['karantina'] = $key->karantina;
                $data['karantina'][$no]['alamat'] = $key->alamat;
                $data['karantina'][$no]['jumlah'] = $is;

                $no++;
              }

              $this->template('dashboard', $data);
            }
          } else {
            redirect('../','refresh');
          }
    }

    public function keluar($id)
    {
      $model = $this->M_tempatKarantina;
      if($model->keluar($id)){
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
      } else {
        $this->session->set_flashdata('gagal', 'Data Gagal Diubah');
      }
      redirect('../','refresh');
    }
}

/* End of file Odp.php */
