<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('m_akun','akun');
	}

	public function index(){
		$data['data'] = $this->akun->ambil_data()->result();
		$data['pegawai'] = $this->db->query("SELECT * FROM pegawai");
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['akunPegawai']=$this->akun->get_pegawai()->result();
		$data['akunPegawaiNon']=$this->akun->get_pegawai_non()->result();
		$this->load->view('dataakun.php',$data);
	}

	public function ajax_list()
	{
		$list = $this->akun->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $akun) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $akun->username;
			// $row[] = $akun->password;
			if ($akun->role == 0){
				$row[] = 'Admin';
			} elseif ($akun->role == 1) {
				$row[] = 'Pegawai';
			} else {
				$row[] = 'Non-Pegawai';
			}
			// $row[] = $akun->role;
			if ($akun->status == 0) {
				$row[] = '<a class="btn btn-sm bg-red">Non-Aktif</a>';
			} else {
				$row[] = '<a class="btn btn-sm bg-orange">Aktif</a>';
			}
			// $row[] = $akun->status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ubahDataAkun('."'".$akun->username."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_akun('."'".$akun->username."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->akun->count_all(),
						"recordsFiltered" => $this->akun->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($username)
	{
		$data = $this->akun->get_by_id($username);
		echo json_encode($data);
	}

	function data_akun(){
      $data = $this->akun->akun_list();
      echo json_encode($data);
  }

	function get_akun(){
        $username = $this->input->get('username');
        $data=$this->akun->get_akun($username);
        echo json_encode($data);
  }

	function tambahAkunPegawai(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		$data = array(
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'status' => '1'
		);
		$this->akun->input_data($data,'user');
		$pesan = array(
        'tmpuname'  => $username,
        'tmppass'   => $password
			);
		$this->session->set_tempdata($pesan, NULL, 10);
		redirect('akun');
	}

	function tambahAkunNonPegawai(){
		$username = $this->input->post('nusername');
		$password = $this->input->post('npassword');
		$role = $this->input->post('nrole');

		$data = array(
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'status' => '1'
		);
		$this->akun->input_data($data,'user');
		$pesan = array(
        'tmpuname'  => $username,
        'tmppass'   => $password
			);
		$this->session->set_tempdata($pesan, NULL, 10);
		redirect('akun');
	}

	public function ajax_update()
	{
		if ($this->input->post('cbStatus') == 'Aktif') {
			$stat = '1';
		} else {
			$stat = '0';
		}
		$data = array(
				'password' => $this->input->post('epassword'),
				'status' => $stat
				// 'role' => $this->input->post('erole'),
			);
		$this->akun->update(array('username' => $this->input->post('eusername')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($username)
	{
		$this->akun->delete_by_id($username);
		echo json_encode(array("status" => TRUE));
	}
}
