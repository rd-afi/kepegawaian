<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

	}

	public function index()
	{
		$data['jumPegawai'] = $this->db->query('SELECT * FROM pegawai')->num_rows();
		$this->load->view('dashboard',$data);
	}

}
