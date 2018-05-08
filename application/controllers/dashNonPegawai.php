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

	function detail($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_data($where,'pegawainon')->result();
		$this->load->view('detailpegawai_nonP',$data);
	}

	function detail_gaji($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_gaji($where,'pegawainon')->result();
		$this->load->view('detailgaji_nonP',$data);
	}

	function edit($kdPegawai){
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatannon");
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->edit_data($where,'pegawainon')->result();
		$this->load->view('editpegawainon_P',$data);
	}

	function ubah(){
		$kdPegawai = $this->input->post('kdPegawai');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('rbJk');
		$jabatan = $this->input->post('cbJabatan');

		$data = array(
			'kdPegawai' => $kdPegawai,
			'nama' => $nama,
			'jkNon' => $jk,
			'kdJabatanNon' => $jabatan
			);
		$where = array(
			'kdPegawai' => $kdPegawai
		);
		$this->m_pegawainon->update_data($where,$data,'pegawainon');
		redirect('dashNonPegawai/detail/'. $kdPegawai .'');
	}

}
