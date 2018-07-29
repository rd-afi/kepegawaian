<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jabatan','jabatan');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('datajabatan');
	}

	public function ajax_list()
	{
		$list = $this->jabatan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jabatan) {
			$no++;
			$row = array();
			$row[] = $jabatan->kdJabatan;
			$row[] = $jabatan->namaJabatan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jabatan('."'".$jabatan->kdJabatan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jabatan('."'".$jabatan->kdJabatan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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

	public function ajax_edit($kdJabatan)
	{
		$data = $this->jabatan->get_by_id($kdJabatan);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->db->select("MAX(kdJabatan) AS id");
		$this->db->from("jabatan");
		$query = $this->db->get();
	    $this->db->limit(1);
	    $rows = $query->row()->id;
	    $jum = $query->num_rows();
	    if ($jum == 0) {
	      $nomor = 1;
	    } else {
	      $nomor =  $rows+1;
		$data = array(
				'kdJabatan' => $nomor,
				'namaJabatan' => $this->input->post('namaJabatan')
			);
	    }
		$insert = $this->jabatan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'namaJabatan' => $this->input->post('namaJabatan'),
			);
		$this->jabatan->update(array('kdJabatan' => $this->input->post('kdJabatan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($kdJabatan)
	{
		$this->jabatan->delete_by_id($kdJabatan);
		echo json_encode(array("status" => TRUE));
	}

}
