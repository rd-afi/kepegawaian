<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		if($cek -> num_rows() > 0){
			foreach($cek->result() as $data){
				$sess_data['username'] = $username;
				$sess_data['role'] = $data->role;
				$sess_data['status'] = "login";
				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('role') == 'administrator')
			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == 'buyer')
			{
				redirect('buyer');
			}
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
