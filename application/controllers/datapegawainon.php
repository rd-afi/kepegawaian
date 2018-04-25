<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datapegawainon extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('m_pegawainon');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index(){
		$data['data'] = $this->m_pegawainon->ambil_data()->result();
		$data['kdPegawai'] = $this->m_pegawainon->getkodeunik();
		$data['kdJabatanNon'] = $this->db->query("SELECT * FROM jabatannon");
		$this->load->view('datanonpegawai.php',$data);
	}

	public function datagajipegawainon(){
		$data['data'] = $this->m_pegawainon->ambil_data()->result();
		$data['jabatannon'] = $this->db->query("SELECT * FROM jabatannon");
		$data['tunjangannon'] = $this->db->query("SELECT * FROM tunjangannon");
		$this->load->view('datagajipegawainon.php',$data);
	}

	public function ajax_list()
	{
		$list = $this->datapegawainon->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jabatan) {
			$no++;
			$row = array();
			$row[] = $jabatan->kdJabatan;
			$row[] = $jabatan->namaJabatan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_nonPegawa('."'".$jabatan->kdJabatan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_nonPegawai('."'".$jabatan->kdJabatan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jabatan->count_all(),
						"recordsFiltered" => $this->jabatan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	function tambah(){
		$kdPegawai = $this->input->post('kdPegawai');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');

		$data = array(
			'kdPegawai' => $kdPegawai,
			'nama' => $nama,
			'kdJabatanNon' => $jabatan
			);
		$this->m_pegawainon->input_data($data,'pegawainon');
		redirect('datapegawainon');
	}


	function hapus($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$this->m_pegawainon->hapus_data($where,'pegawai');
		redirect('datapegawai');
	}

	function edit($kdPegawai){
		$data['pangkat'] = $this->db->query("SELECT * FROM pangkat");
		$data['kdJabatanNon'] = $this->db->query("SELECT * FROM jabatannon");
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->edit_data($where,'pegawainon')->result();
		$this->load->view('editpegawai',$data);
	}

	function ubah(){
		$kdPegawai = $this->input->post('kdPegawai');
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
			'kdPegawai' => $kdPegawai,
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
			'kdPegawai' => $kdPegawai
		);
		$this->m_pegawainon->update_data($where,$data,'pegawai');
		redirect('datapegawai');
	}

	function detail($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawai'] = $this->m_pegawainon->detail_data($where,'pegawai')->result();
		$this->load->view('detailpegawai',$data);
	}

	function detail_gaji($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_gaji($where,'pegawainon')->result();
		$this->load->view('detailgaji_nonP',$data);
	}

	function print_gaji($kdPegawai){
		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_gaji($where,'pegawainon')->result();
		$this->load->view('printdetailgaji_nonP',$data);
	}

	function report($kdPegawai){
		$this->load->library('pdf');

		$where = array('kdPegawai' => $kdPegawai);
		$data['pegawainon'] = $this->m_pegawainon->detail_gaji($where,'pegawainon')->result();

		$this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan.pdf";
    $this->pdf->load_view('printdetailgaji_nonP', $data);
	}


}
