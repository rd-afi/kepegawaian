<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatannon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jabatannon','jabatannon');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('datajabatannon');
	}

	public function ajax_list()
	{
		$list = $this->jabatannon->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jabatannon) {
			$no++;
			$row = array();
			$row[] = $jabatannon->kdJabatanNon;
			$row[] = $jabatannon->namaJabatanNon;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jabatan('."'".$jabatannon->kdJabatanNon."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jabatan('."'".$jabatannon->kdJabatanNon."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jabatannon->count_all(),
						"recordsFiltered" => $this->jabatannon->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($kdJabatanNon)
	{
		$data = $this->jabatannon->get_by_id($kdJabatanNon);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->db->select("MAX(kdJabatanNon) AS id");
		$this->db->from("jabatannon");
		$query = $this->db->get();
	    $this->db->limit(1);
	    $rows = $query->row()->id;
	    $jum = $query->num_rows();
	    if ($jum == 0) {
	      $nomor = 1;
	    } else {
	      $nomor =  $rows+1;
		$data = array(
				'kdJabatanNon' => $nomor,
				'namaJabatanNon' => $this->input->post('namaJabatanNon')
			);
	    }
		$insert = $this->jabatannon->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'namaJabatanNon' => $this->input->post('namaJabatanNon'),
			);
		$this->jabatannon->update(array('kdJabatanNon' => $this->input->post('kdJabatanNon')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($kdJabatanNon)
	{
		$this->jabatannon->delete_by_id($kdJabatanNon);
		echo json_encode(array("status" => TRUE));
	}

}
