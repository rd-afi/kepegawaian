<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pegawainon extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function ambil_data(){
		$this->db->select('*')
		->join('jabatannon','jabatannon.kdJabatanNon=pegawainon.kdJabatanNon');
		return $this->db->get('pegawainon');
	}

	public function getkodeunik() {
        $q = $this->db->query("SELECT MAX(RIGHT(kdPegawai,2)) AS idmax FROM pegawainon");
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "1";
        }
       // $kar = "B-."; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return "P" . $kd;

   }


	public function get_pegawai(){
		$query=$this->db->query("select a.nip,a.namaPegawai,b.namaPangkat from pegawai a join pangkat b on (a.kdPangkat=b.kdPangkat) where a.status=0  ");
		return $query;
	}

		public function get_pegawaiNip($nip){
		$query=$this->db->query("select nip from pegawai where nip ='$nip'");
		return $query;
	}

	function detail_data($where,$table){
		$this->db->select('*')
		->join('jabatannon','jabatannon.kdJabatanNon=pegawainon.kdJabatanNon');
		return $this->db->get_where($table,$where);
	}

	public function inputAkun(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$query = $this->db->query("insert into user (username,password,role) values  ('$username','$password','$role')");
		return $query;
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

	function detail_gaji($where,$table){
		$this->db->select('*')
		->join('jabatannon','jabatannon.kdJabatanNon=pegawainon.kdJabatanNon')
		->join('tunjangannon','tunjangannon.id=jabatannon.kdJabatanNon')
		->join('absensi','absensi.kdPegawai=pegawainon.kdPegawai')
		->where('bulan_tahun',date('F',strtotime('-1 month')).' - '.date('Y'));
		return $this->db->get_where($table,$where);
	}

}

?>
