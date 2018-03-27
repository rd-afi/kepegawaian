<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_akun extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function ambil_data(){
		// $this->db->select('*')
		// ->join('pegawai','pegawai.nip=akun.nip');
		return $this->db->get('user');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function detail_data($where,$table){
		$this->db->select('*')
		->join('pangkat','pangkat.kdPangkat=pegawai.kdPangkat')
		->join('jabatan','jabatan.kdJabatan=pegawai.kdJabatan');
		return $this->db->get_where($table,$where);
	}

}
