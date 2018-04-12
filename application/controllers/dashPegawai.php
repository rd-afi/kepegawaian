<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashPegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_data');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($this->session->userdata('role') != "1"){
			redirect(base_url("login"));
		}

	}

	public function index()
	{
		$nip = $this->session->userdata("username");
		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data->detail_data($where,'pegawai')->result();

		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$data['jumAkun'] = $this->db->query('SELECT * FROM user')->num_rows();
		$this->load->view('dashPegawai',$data);
	}

}
