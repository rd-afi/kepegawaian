<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tunjangannon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tunjangannon','tunjangannon');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$query = 'SELECT kdJabatanNon, namaJabatanNon FROM jabatannon WHERE NOT EXISTS (SELECT kdJabatanNon FROM tunjangannon WHERE jabatannon.kdJabatanNon = tunjangannon.kdJabatanNon)';
		$data['jabatannon'] = $this->db->query($query);
		$this->load->helper('url');
		$this->load->view('datatunjangannon',$data);
	}

	public function ajax_list()
	{
		$list = $this->tunjangannon->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tunjangannon) {
			$no++;
			$row = array();
			$row[] = $tunjangannon->id;
			$row[] = $tunjangannon->namaJabatanNon;
			$row[] = $tunjangannon->gajiPokok;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tunjangan('."'".$tunjangannon->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_tunjangan('."'".$tunjangannon->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tunjangannon->count_all(),
						"recordsFiltered" => $this->tunjangannon->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->tunjangannon->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->db->select("MAX(id) AS id");
		$this->db->from("tunjangannon");
		$query = $this->db->get();
	    $this->db->limit(1);
	    $rows = $query->row()->id;
	    $jum = $query->num_rows();
	    if ($jum == 0) {
	      $nomor = 1;
	    } else {
	      $nomor =  $rows+1;
		$data = array(
				'id' => $nomor,
				'kdJabatanNon' => $this->input->post('cbJabatanNon'),
				'gajiPokok' => $this->input->post('gajiPokok')
			);
	    }
		$insert = $this->tunjangannon->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
      // 'kdPangkat' => $this->input->post('kdPangkat'),
      'gajiPokok' => $this->input->post('gajiPokok')
			);
		$this->tunjangannon->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->tunjangannon->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
