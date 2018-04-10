<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();


		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($this->session->userdata('role') != "0"){
			redirect(base_url("login"));
		}

	}

	public function index()
	{
		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$data['jumAkun'] = $this->db->query('SELECT * FROM user')->num_rows();
		$data['jkpnsprg1'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "perempuan" && kdPangkat LIKE "1%"')->num_rows();
		$data['jkpnslkg1'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "laki-laki" && kdPangkat LIKE "1%"')->num_rows();
		$data['jkpnsprg2'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "perempuan" && kdPangkat LIKE "2%"')->num_rows();
		$data['jkpnslkg2'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "laki-laki" && kdPangkat LIKE "2%"')->num_rows();
		$data['jkpnsprg3'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "perempuan" && kdPangkat LIKE "3%"')->num_rows();
		$data['jkpnslkg3'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "laki-laki" && kdPangkat LIKE "3%"')->num_rows();
		$data['jkpnsprg4'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "perempuan" && kdPangkat LIKE "4%"')->num_rows();
		$data['jkpnslkg4'] = $this->db->query('SELECT * FROM pegawai WHERE jk = "laki-laki" && kdPangkat LIKE "4%"')->num_rows();
		$this->load->view('dashboard',$data);
	}

}
