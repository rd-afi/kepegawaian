<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('m_akun','akun');
		$this->load->model('m_absensi','absensi');
		$this->load->model('m_absensi_non','absensinon');
		$this->load->model('m_data');
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

	public function laporanBulanan(){
		$data['data'] = $this->m_data->ambil_data()->result();
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
		$data['tunjangan'] = $this->db->query("SELECT * FROM tunjangan");
		if(isset($_POST['bulan']) && isset($_POST['tahun'])){
				$data['bulan'] = $this->input->post('bulan');
				$data['tahun'] = $this->input->post('tahun');
				$bulan = $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
			}else{
				$data['bulan'] = date('m');
				$data['tahun'] = date('Y');
			}
		$this->load->view('laporanbulanan',$data);
	}

	public function laporanTahunan(){
		$data['data'] = $this->m_data->ambil_data()->result();
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
		$data['tunjangan'] = $this->db->query("SELECT * FROM tunjangan");
		if(isset($_POST['bulan']) && isset($_POST['tahun'])){
				$data['bulan'] = $this->input->post('bulan');
				$data['tahun'] = $this->input->post('tahun');
				$bulan = $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
			}else{
				$data['bulan'] = date('m');
				$data['tahun'] = date('Y');
			}
		$this->load->view('laporanbulanan',$data);
	}
// LAPORAN NON ----------------------------------------------------------------------------
	public function laporanBulananNon(){
		// $data['data'] = $this->m_data->ambil_data()->result();
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
		$data['tunjangan'] = $this->db->query("SELECT * FROM tunjangan");
		if(isset($_POST['bulan']) && isset($_POST['tahun'])){
				$data['bulan'] = $this->input->post('bulan');
				$data['tahun'] = $this->input->post('tahun');
				$bulan = $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
				$data['data'] = $this->m_data->get_gaji_bulanan_non($bulan,$tahun);
			}else{
				$data['bulan'] = date('F');
				$data['tahun'] = date('Y');
				$data['data'] = $this->m_data->get_gaji_bulanan_non(date('F'),date('Y'));
			}
		$this->load->view('laporanbulanannon',$data);
	}

	public function laporanTahunanNon(){
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
		$data['tunjangan'] = $this->db->query("SELECT * FROM tunjangan");
		if(isset($_POST['tahun'])){
				$data['bulan'] = $this->input->post('bulan');
				$data['tahun'] = $this->input->post('tahun');
				$bulan = $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
				$data['data'] = $this->m_data->get_gaji_tahunan_non($tahun);
			}else{
				$data['bulan'] = date('m');
				$data['tahun'] = date('Y');
				$data['data'] = $this->m_data->get_gaji_tahunan_non(date('Y'));
			}
		$this->load->view('laporanTahunanNon',$data);
	}
// ABSENSII -----------------------------------------------------------------------------
	public function absensi()
	{
		$query = 'SELECT nip, namaPegawai FROM pegawai WHERE NOT EXISTS (SELECT nip FROM absensi WHERE pegawai.nip = absensi.nip)';
		// $query = 'SELECT nip, namaPegawai FROM pegawai WHERE NOT EXISTS (SELECT kdPangkat FROM tunjangan WHERE pangkat.kdPangkat = tunjangan.kdPangkat)';
		$data['absensi'] = $this->db->query($query);
		$this->load->helper('url');
		$this->load->view('absensi',$data);
	}

	public function ajax_list_absensi()
	{
		$list = $this->absensi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $absensi) {
			$no++;
			$row = array();
			$row[] = $absensi->no;
			$row[] = $absensi->nip;
			$row[] = $absensi->namaPegawai;
			$row[] = $absensi->absen;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tunjangan('."'".$absensi->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_tunjangan('."'".$absensi->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->absensi->count_all(),
						"recordsFiltered" => $this->absensi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}


		public function ajax_add_absensi()
		{
			$this->db->select("MAX(no) AS no");
			$this->db->from("absensi");
			$query = $this->db->get();
		    $this->db->limit(1);
		    $rows = $query->row()->no;
		    $jum = $query->num_rows();
		    if ($jum == 0) {
		      $nomor = 1;
		    } else {
		      $nomor =  $rows+1;
			$data = array(
					'no' => $nomor,
					'nip' => $this->input->post('cbAbsensi'),
					'bulan_tahun' => $this->input->post('bulan'),
					'absen' => $this->input->post('kehadiran')
				);
		    }
			$insert = $this->absensi->save($data);
			echo json_encode(array("status" => TRUE));
		}

		public function ajax_update_absensi()
		{
			$data = array(
	      // 'kdPangkat' => $this->input->post('kdPangkat'),
				'nip' => $this->input->post('cbAbsensi'),
				'bulan_tahun' => $this->input->post('bulan'),
				'absen' => $this->input->post('kehadiran')
				);
			$this->absensi->update(array('no' => $this->input->post('no')), $data);
			echo json_encode(array("status" => TRUE));
		}

		public function ajax_delete_absensi($id)
		{
			$this->absensi->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}

// ABSENSI NON -----------------------------------------------------------------------------
			// public function absensi_non()
			// {
			// 	$query = 'SELECT kdPegawai, nama FROM pegawainon WHERE NOT EXISTS (SELECT kdPegawai FROM absensi WHERE pegawainon.kdPegawai = absensi.kdPegawai)';
			// 	// $query = 'SELECT nip, namaPegawai FROM pegawai WHERE NOT EXISTS (SELECT kdPangkat FROM tunjangan WHERE pangkat.kdPangkat = tunjangan.kdPangkat)';
			// 	$data['absensi'] = $this->db->query($query);
			// 	$this->load->helper('url');
			// 	$this->load->view('absensinon',$data);
			// }

			public function absensi_non(){
				$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
				$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
				$data['tunjangan'] = $this->db->query("SELECT * FROM tunjangan");
				if(isset($_POST['bulan']) && isset($_POST['tahun'])){
						$data['bulan'] = $this->input->post('bulan');
						$data['tahun'] = $this->input->post('tahun');
						$bulan = $this->input->post('bulan');
						$tahun = $this->input->post('tahun');
						$data['absensi'] = $this->m_data->get_absensi_non($bulan,$tahun);
					}else{
						$data['bulan'] = date('F');
						$data['tahun'] = date('Y');
						$data['absensi'] = $this->m_data->get_absensi_non(date('F'),date('Y'));
					}
				$this->load->view('absensinon',$data);
			}

			public function ajax_list_absensi_non()
			{
				// $list = $this->absensinon->get_datatables();
				if(isset($_POST['bulan']) && isset($_POST['tahun'])){
						$data['bulan'] = $this->input->post('bulan');
						$data['tahun'] = $this->input->post('tahun');
						$bulan = $this->input->post('bulan');
						$tahun = $this->input->post('tahun');
						$list = $this->db->query("SELECT * FROM pegawainon JOIN absensi ON absensi.kdPegawai = pegawainon.kdPegawai
							JOIN jabatannon ON jabatannon.kdJabatanNon = pegawainon.kdJabatanNon
							WHERE bulan_tahun = '".$bulan." - ".$tahun."'")->result();
					}else{
						$data['bulan'] = date('F');
						$data['tahun'] = date('Y');
						$list = $this->db->query("SELECT * FROM pegawainon JOIN absensi ON absensi.kdPegawai = pegawainon.kdPegawai
							JOIN jabatannon ON jabatannon.kdJabatanNon = pegawainon.kdJabatanNon
							WHERE bulan_tahun = '".date('F')." - ".date('Y')."'")->result();
					}
				$data = array();
				$no = $_POST['start'];
				foreach ($list as $absensi) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $absensi->kdPegawai;
					$row[] = $absensi->nama;
					$row[] = $absensi->namaJabatanNon;
					$row[] = $absensi->absen;

					//add html for action
					$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_absensi('."'".$absensi->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_absensi('."'".$absensi->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

					$data[] = $row;
				}

				$output = array(
								"draw" => $_POST['draw'],
								"recordsTotal" => $this->absensinon->count_all(),
								"recordsFiltered" => $this->absensinon->count_filtered(),
								"data" => $data,
						);
				//output to json format
				echo json_encode($output);
			}

			public function ajax_edit_absensi_non($id)
			{
				$data = $this->absensinon->get_by_id($id);
				echo json_encode($data);
			}
				public function ajax_add_absensi_non()
				{
					$this->db->select("MAX(no) AS no");
					$this->db->from("absensi");
					$query = $this->db->get();
				    $this->db->limit(1);
				    $rows = $query->row()->no;
				    $jum = $query->num_rows();
				    if ($jum == 0) {
				      $nomor = 1;
				    } else {
				      $nomor =  $rows+1;
					$data = array(
							'no' => $nomor,
							'kdPegawai' => $this->input->post('cbAbsensi'),
							'bulan_tahun' => $this->input->post('bulanku'),
							'absen' => $this->input->post('kehadiran')
						);
				    }
					$insert = $this->absensi->save($data);
					echo json_encode(array("status" => TRUE));
				}

				public function ajax_update_absensi_non()
				{
					$data = array(
			      // 'kdPangkat' => $this->input->post('kdPangkat'),
						'kdPegawai' => $this->input->post('cbAbsensi'),
						'bulan_tahun' => $this->input->post('bulan'),
						'absen' => $this->input->post('kehadiran')
						);
					$this->absensi->update(array('no' => $this->input->post('no')), $data);
					echo json_encode(array("status" => TRUE));
				}

				public function ajax_delete_absensi_non($id)
				{
					$this->absensi->delete_by_id($id);
					echo json_encode(array("status" => TRUE));
				}
}
