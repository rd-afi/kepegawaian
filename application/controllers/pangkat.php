<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pangkat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pangkat','pangkat');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('datapangkat');
	}

	public function ajax_list()
	{
		$list = $this->pangkat->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pangkat) {
			$no++;
			$row = array();
			$row[] = $pangkat->kdPangkat;
			$row[] = $pangkat->namaPangkat;
			// $row[] = $pangkat->gajiPokok;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pangkat('."'".$pangkat->kdPangkat."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pangkat('."'".$pangkat->kdPangkat."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pangkat->count_all(),
						"recordsFiltered" => $this->pangkat->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($kdPangkat)
	{
		$data = $this->pangkat->get_by_id($kdPangkat);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->db->select("MAX(kdPangkat) AS id");
		$this->db->from("pangkat");
		$query = $this->db->get();
	    $this->db->limit(1);
	    $rows = $query->row()->id;
	    $jum = $query->num_rows();
	    if ($jum == 0) {
	      $nomor = 1;
	    } else {
	      $nomor =  $rows+1;
		$data = array(
				'kdPangkat' => $this->input->post('kdPangkat'),
				'namaPangkat' => $this->input->post('namaPangkat')
			);
	    }
		$insert = $this->pangkat->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'namaPangkat' => $this->input->post('namaPangkat')
			);
		$this->pangkat->update(array('kdPangkat' => $this->input->post('kdPangkat')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($kdPangkat)
	{
		$this->pangkat->delete_by_id($kdPangkat);
		echo json_encode(array("status" => TRUE));
	}

}
