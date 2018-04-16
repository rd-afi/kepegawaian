<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
    if($this->session->userdata('status') == "login"){
      if($this->session->userdata('role') == "0"){
  			redirect(base_url("dashboard"));
  		} else {
        redirect(base_url("dashPegawai"));
      }
    }

		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = '';
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("user",$where);
		$cekrole = $this->m_login->cek_login("user",$where)->result();
		if($cek->num_rows() > 0){
 			foreach($cek->result() as $data){
				$data_session = array(
					'username' => $username,
					'role' => $data->role,
					'status' => "login"
				);
 			}

			$this->session->set_userdata($data_session);

 			if($this->session->userdata('role') == '0')
			{
				redirect('dashboard');
			}
			elseif($this->session->userdata('role') == '1')
			{
				redirect('dashPegawai');
			}
			elseif($this->session->userdata('role') == '2')
			{
				redirect('dashNonPegawai');
			}

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
