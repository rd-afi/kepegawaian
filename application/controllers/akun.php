<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('m_akun');
	}

	public function index(){
		$data['data'] = $this->m_akun->ambil_data()->result();
		$data['pegawai'] = $this->db->query("SELECT * FROM pegawai");
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['akunPegawai']=$this->m_akun->get_pegawai()->result();
		$data['akunPegawaiNon']=$this->m_akun->get_pegawai_non()->result();
		$this->load->view('dataakun.php',$data);
	}

	function data_akun(){
      $data = $this->m_akun->akun_list();
      echo json_encode($data);
    }

	function get_akun(){
        $username = $this->input->get('username');
        $data=$this->m_akun->get_akun($username);
        echo json_encode($data);
  }

	function tambahAkunPegawai(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		$data = array(
			'username' => $username,
			'password' => md5($password),
			'role' => $role,
			'status' => '1'
		);
		$this->m_akun->input_data($data,'user');
		$pesan = array(
        'tmpuname'  => $username,
        'tmppass'   => $password
			);
		$this->session->set_tempdata($pesan, NULL, 60);
		redirect('akun');
	}

	function tambahAkunNonPegawai(){
		$username = $this->input->post('nusername');
		$password = $this->input->post('npassword');
		$role = $this->input->post('nrole');

		$data = array(
			'username' => $username,
			'password' => md5($password),
			'role' => $role,
			'status' => '1'
		);
		$this->m_akun->input_data($data,'user');
		$pesan = array(
        'tmpuname'  => $username,
        'tmppass'   => $password
			);
		$this->session->set_tempdata($pesan, NULL, 10);
		redirect('akun');
	}

	function update_akun(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			$status = $this->input->post('status');
			$data = $this->m_akun->update_akun($username,$password,$role,$status);
			echo json_encode($data);
	}

	function hapus($username){
		$where = array('username' => $username);
		$this->m_akun->hapus_data($where,'user');
		redirect('akun');
	}
}
