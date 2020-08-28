<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Swab extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_swab");
  
    }
    
    public function index()
    {
        $data['id_user'] = $this->session->userdata("id_user");
        $data['level'] = $this->session->userdata("level");
        if ($this->session->userdata('id_user') != '') {
            $this->template('dashboard', $data);
        } else {
            redirect('../','refresh');
        }
    }

    public function hapus($id)
    {
        $model = $this->M_swab;
        $hasil = json_decode($model->hapus_swab($id), true);
  
        if($hasil['res']){
          $this->session->set_flashdata('success', $hasil['msg']);
        } else {
          $this->session->set_flashdata('gagal', $hasil['msg']);
        }
        redirect('../swab','location');
    }

    public function add_swab_kirim()
    {
      $model = $this->M_swab;
      $hasil = json_decode($model->save_swab_kirim(), true);

      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
      }
      redirect('../swab','location');
    }
	
    public function add_swab_selesai()
    {
      $model = $this->M_swab;
      $hasil = json_decode($model->save_swab_selesai(), true);

      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
      }
      redirect('../swab','location');
    }
	
    public function add_swab_edit()
    {
      $model = $this->M_swab;
      $hasil = json_decode($model->save_swab_edit(), true);

      if($hasil['res']){
        $this->session->set_flashdata('success', $hasil['msg']);
      } else {
        $this->session->set_flashdata('gagal', $hasil['msg']);
      }
      redirect('../swab','location');
    }
	
}

/* End of file Swab.php */
