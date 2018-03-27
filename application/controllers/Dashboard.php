<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$data['jumAkun'] = $this->db->query('SELECT * FROM user')->num_rows();
		$this->load->view('dashboard',$data);
	}

}
