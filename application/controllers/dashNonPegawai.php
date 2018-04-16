<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashNonPegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pegawainon');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($this->session->userdata('role') != "2"){
			redirect(base_url("login"));
		}

	}

	public function index()
	{
		$kdPegawai = $this->session->userdata("username");
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_data($where,'pegawainon')->result();

		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$data['jumAkun'] = $this->db->query('SELECT * FROM user')->num_rows();
		$this->load->view('dashNonPegawai',$data);
	}

}
