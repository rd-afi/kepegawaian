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
		$this->load->view('dataakun.php',$data);
	}

	function tambahAkun($nip){
		$nip = $this->uri->segment(3);
		$data['tampil_nip'] = $this->m_akun->get_pegawaiNip($nip);
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		//$status = 1;
		$simpan = $this->input->post('simpan');
		 if($simpan == 'simpan'){
		$query = $this->db->query("update pegawai set status=1 WHERE nip='$nip'");

		$this->m_akun->inputAkun();
		redirect('akun/tambahacc');
		 }
			$this->load->view('tambahAkun.php',$data);

			//echo var_dump($simpan);
	}

	function tambahacc(){
        $data_pegawai['data_pegawai']=$this->m_akun->get_pegawai()->result();
		//$data['pegawai'] = $this->db->query("SELECT * FROM pegawai");
		$this->load->view('tambahAkunView.php',$data_pegawai);
	}

	function tambah(){
		$nip = $this->input->post('nip');
		$namaPegawai = $this->input->post('namaPegawai');
		$tempat = $this->input->post('tempat');
		$ttl = date('Y-m-d', strtotime($this->input->post('ttl')));
		$agama = $this->input->post('cbAgama');
		$jk = $this->input->post('rbJk');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$pangkat = $this->input->post('cbPangkat');
		$tmtPang = date('Y-m-d', strtotime($this->input->post('tmtPang')));
		$jabatan = $this->input->post('cbJabatan');
		$tmtJab = date('Y-m-d', strtotime($this->input->post('tmtJab')));
		$mulJab = date('Y-m-d', strtotime($this->input->post('mulJab')));

		$data = array(
			'nip' => $nip,
			'namaPegawai' => $namaPegawai,
			'tempat' => $tempat,
			'tglLahir' => $ttl,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'telepon' => $telepon,
			'kdPangkat' => $pangkat,
			'tmtPangkat' => $tmtPang,
			'kdJabatan' => $jabatan,
			'tmtJabatan' => $tmtJab,
			'mulaiJabatan' => $mulJab
			);
		$this->m_data->input_data($data,'pegawai');
		redirect('datapegawai');
	}

	function hapus($nip){
		$where = array('nip' => $nip);
		$this->m_data->hapus_data($where,'pegawai');
		redirect('datapegawai');
	}

	function edit($nip){
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan");
		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data->edit_data($where,'pegawai')->result();
		$this->load->view('editpegawai',$data);
	}

	function ubah(){
		$nip = $this->input->post('nip');
		$namaPegawai = $this->input->post('namaPegawai');
		$tempat = $this->input->post('tempat');
		$ttl = date('Y-m-d', strtotime($this->input->post('ttl')));
		$agama = $this->input->post('cbAgama');
		$jk = $this->input->post('rbJk');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$pangkat = $this->input->post('cbPangkat');
		$tmtPang = date('Y-m-d', strtotime($this->input->post('tmtPang')));
		$jabatan = $this->input->post('cbJabatan');
		$tmtJab = date('Y-m-d', strtotime($this->input->post('tmtJab')));
		$mulJab = date('Y-m-d', strtotime($this->input->post('mulJab')));

		$data = array(
			'nip' => $nip,
			'namaPegawai' => $namaPegawai,
			'tempat' => $tempat,
			'tglLahir' => $ttl,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'telepon' => $telepon,
			'kdPangkat' => $pangkat,
			'tmtPangkat' => $tmtPang,
			'kdJabatan' => $jabatan,
			'tmtJabatan' => $tmtJab,
			'mulaiJabatan' => $mulJab
			);
		$where = array(
			'nip' => $nip
		);
		$this->m_data->update_data($where,$data,'pegawai');
		redirect('datapegawai');
	}

	function detail($nip){
		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data->detail_data($where,'pegawai')->result();
		$this->load->view('detailpegawai',$data);
	}

	function report($nip){
		$this->load->library('pdf');

		$where = array('nip' => $nip);
		$data['pegawai'] = $this->m_data->detail_data($where,'pegawai')->result();

		$this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan.pdf";
    $this->pdf->load_view('printdetailpegawai', $data);
	}
}
