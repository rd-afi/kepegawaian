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

	function akun_list(){
      $hasil=$this->db->query("SELECT * FROM user");
      return $hasil->result();
  }

	function get_akun_by_username($username){
        $hsl=$this->db->query("SELECT * FROM user WHERE username = '$username'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'username' => $data->username,
                    'password' => $data->password,
                    'role' => $data->role,
                    'status' => $data->status,
                    );
            }
        }
        return $hasil;
  }

	function update_akun($username,$password,$role,$status){
  		$hasil = $this->db->query("UPDATE user SET username='$username',password='$password',role='$role',status='$status' WHERE username='$username'");
      return $hasil;
  }

    function hapus_akun($username){
        $hasil=$this->db->query("DELETE FROM user WHERE username='$username'");
        return $hasil;
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
        return "P-" . $kd;
   }

	 public function get_pegawai(){
		 $query=$this->db->query("SELECT * FROM pegawai a join pangkat b on (a.kdPangkat = b.kdPangkat) WHERE NOT EXISTS (SELECT * FROM user WHERE a.nip = user.username)");
		 return $query;
	 }

	 public function get_pegawai_non(){
		 $query=$this->db->query("SELECT * FROM pegawainon a join jabatannon b on (a.kdJabatanNon = b.kdJabatanNon) WHERE NOT EXISTS (SELECT * FROM user WHERE a.kdPegawai = user.username)");
		 return $query;
	 }

 	 public function get_pegawaiNip($nip){
 		 $query=$this->db->query("select nip from pegawai where nip ='$nip'");
 		 return $query;
 	 }

	 public function inputAkun(){
		 $username = $this->input->post('username');
		 $password = $this->input->post('password');
		 $role = $this->input->post('role');
		 $query = $this->db->query("insert into user (username,password,role) values  ('$username','$password','$role')");
		 return $query;
	 }

}
