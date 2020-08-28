<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
		$this->load->model("M_default");
		$this->load->model("M_register");
	}
	
	public function index()
	{
		$model = $this->M_register;
		$data['faskes'] = $model->getFaskes()->result();
		if ($this->session->userdata("level") == '1') {
			$this->load->view('register', $data);
		} else {
			redirect('../','location');
		}
		
		// $this->template('welcome_message');
	}

	public function add()
	{
		$user = $this->M_register;

		$hasil = json_decode($user->save(), true);

		if($hasil['res']){
            $this->session->set_flashdata('success', $hasil['msg']);
		} else {
			$this->session->set_flashdata('gagal', $hasil['msg']);
		}

        
		redirect('../reg','location');
		
	}
}
