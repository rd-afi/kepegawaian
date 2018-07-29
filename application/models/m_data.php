<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function ambil_data(){
		$this->db->select('*')
		->join('pangkat','pangkat.kdPangkat=pegawai.kdPangkat')
		->join('jabatan','jabatan.kdJabatan=pegawai.kdJabatan')
		->join('tunjangan','tunjangan.id=jabatan.kdJabatan');
		return $this->db->get('pegawai');
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

	function detail_gaji($where,$table){
		$this->db->select('*')
		->join('pangkat','pangkat.kdPangkat=pegawai.kdPangkat')
		->join('jabatan','jabatan.kdJabatan=pegawai.kdJabatan')
		->join('tunjangan','tunjangan.id=jabatan.kdJabatan');
		return $this->db->get_where($table,$where);
	}

	public function get_gaji_bulanan_non($bulan,$tahun){
			$data = $this->db->query("SELECT * FROM pegawainon JOIN absensi ON absensi.kdPegawai = pegawainon.kdPegawai
				JOIN jabatannon ON jabatannon.kdJabatanNon = pegawainon.kdJabatanNon
				JOIN tunjangannon ON tunjangannon.kdJabatanNon = pegawainon.kdJabatanNon
				WHERE bulan_tahun = '".$bulan." - ".$tahun."'")->result();
			return $data;
	}

	public function get_absensi_non($bulan,$tahun){
		$not = "(SELECT kdPegawai, bulan_tahun FROM absensi
			WHERE (pegawainon.kdPegawai = absensi.kdPegawai)
			AND (bulan_tahun = '".$bulan." - ".$tahun."'))";
			$data = $this->db->query("SELECT kdPegawai, nama FROM pegawainon WHERE NOT EXISTS".$not);
			return $data;
	}

	public function get_list_absensi_non($bulan,$tahun){
			$data = $this->db->query("SELECT pegawainon.kdPegawai, nama, absen
				FROM pegawainon JOIN absensi ON absensi.kdPegawai = pegawainon.kdPegawai
				WHERE bulan_tahun = '".$bulan." - ".$tahun."'");
			return $data;
	}

	public function get_gaji_tahunan_non($tahun){
		$select = "pegawainon.kdPegawai, nama, bulan_tahun, absen, gajiPokok, SUM((((gajiPokok/22)*absen)-64000)) as gaji_bulanan";
		$where = "(bulan_tahun LIKE '%".$tahun."')";
			$data = $this->db->query("SELECT ".$select." FROM pegawainon
			JOIN absensi ON absensi.kdPegawai = pegawainon.kdPegawai
			JOIN jabatannon ON jabatannon.kdJabatanNon = pegawainon.kdJabatanNon
			JOIN tunjangannon ON tunjangannon.kdJabatanNon = pegawainon.kdJabatanNon
			WHERE ".$where."
			GROUP BY bulan_tahun")->result();
			return $data;
	}


}
