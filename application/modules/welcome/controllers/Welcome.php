<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{

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
		$this->load->model("M_welcome");
	}

	public function index()
	{
		if ($this->session->userdata('id_user') != '') {
			redirect('../dashboard', 'refresh');
		} else {
			$this->load->view('welcome_message');
		}
	}

	public function login()
	{
		$login = $this->M_welcome;

		$hasil = json_decode($login->cek_login(), true);

		if ($hasil['res']) {
			$this->session->set_userdata('id_user', $hasil['data']['id_user']);
			$this->session->set_userdata('nama_user', $hasil['data']['nama_user']);
			$this->session->set_userdata('level', $hasil['data']['level_user']);

			if ($hasil['data']['level_user'] == '5') {
				redirect('../data', 'refresh');
			} elseif ($hasil['data']['level_user'] == '6') {
				redirect('../pp', 'refresh');
			} else {
				redirect('../dashboard', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', $hasil['msg']);
			redirect('../', 'refresh');
		}
	}

	public function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->M_welcome->search($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->username_user;
				echo json_encode($arr_result);
			}
		}
	}

	public function maintenis()
	{
		$this->load->view('maintenis');
	}
}
