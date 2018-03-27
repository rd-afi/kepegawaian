<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_login->cek_login("user",$where);
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));

		}else{
			echo "Username dan password salah !";
		}
	}

    public function logout()
	{
		$this->session->sess_destroy();
        redirect('auth');
	}
}
