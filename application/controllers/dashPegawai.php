<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashPegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');

	}

	public function index()
	{
		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$data['jumAkun'] = $this->db->query('SELECT * FROM user')->num_rows();
		$this->load->view('dashPegawai',$data);
	}

}