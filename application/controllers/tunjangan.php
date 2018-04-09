<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tunjangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tunjangan','tunjangan');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$query = 'SELECT kdPangkat, namaPangkat FROM pangkat WHERE NOT EXISTS (SELECT kdPangkat FROM tunjangan WHERE pangkat.kdPangkat = tunjangan.kdPangkat)';
		$data['pangkat'] = $this->db->query($query);
		$this->load->helper('url');
		$this->load->view('datatunjangan',$data);
	}

	public function ajax_list()
	{
		$list = $this->tunjangan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tunjangan) {
			$no++;
			$row = array();
			$row[] = $tunjangan->id;
			$row[] = $tunjangan->namaPangkat;
			$row[] = $tunjangan->gajiPokok;
			$row[] = $tunjangan->tjIstri;
			$row[] = $tunjangan->tjAnak;
			$row[] = $tunjangan->tjUpns;
			$row[] = $tunjangan->tjStruk;
			$row[] = $tunjangan->tjFungsi;
			$row[] = $tunjangan->tjDaerah;
			$row[] = $tunjangan->tjPencil;
			$row[] = $tunjangan->tjLain;
			$row[] = $tunjangan->tjKompen;
			$row[] = $tunjangan->tjBeras;
			$row[] = $tunjangan->tjPph;
			$row[] = $tunjangan->pembul;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tunjangan('."'".$tunjangan->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_tunjangan('."'".$tunjangan->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tunjangan->count_all(),
						"recordsFiltered" => $this->tunjangan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->tunjangan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->db->select("MAX(id) AS id");
		$this->db->from("tunjangan");
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
				'kdPangkat' => $this->input->post('cbPangkat'),
				'gajiPokok' => $this->input->post('gajiPokok'),
				'tjIstri' => $this->input->post('tjIstri'),
				'tjAnak' => $this->input->post('tjAnak'),
				'tjUpns' => $this->input->post('tjUpns'),
				'tjStruk' => $this->input->post('tjStruk'),
				'tjFungsi' => $this->input->post('tjFungsi'),
				'tjDaerah' => $this->input->post('tjDaerah'),
				'tjPencil' => $this->input->post('tjPencil'),
				'tjLain' => $this->input->post('tjLain'),
				'tjKompen' => $this->input->post('tjKompen'),
				'tjBeras' => $this->input->post('tjBeras'),
				'tjPph' => $this->input->post('tjPph'),
				'pembul' => $this->input->post('pembul')
			);
	    }
		$insert = $this->tunjangan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
      // 'kdPangkat' => $this->input->post('cbPangkat'),
      'gajiPokok' => $this->input->post('gajiPokok'),
      'tjIstri' => $this->input->post('tjIstri'),
      'tjAnak' => $this->input->post('tjAnak'),
      'tjUpns' => $this->input->post('tjUpns'),
      'tjStruk' => $this->input->post('tjStruk'),
      'tjFungsi' => $this->input->post('tjFungsi'),
      'tjDaerah' => $this->input->post('tjDaerah'),
      'tjPencil' => $this->input->post('tjPencil'),
      'tjLain' => $this->input->post('tjLain'),
      'tjKompen' => $this->input->post('tjKompen'),
      'tjBeras' => $this->input->post('tjBeras'),
      'tjPph' => $this->input->post('tjPph'),
      'pembul' => $this->input->post('pembul')
			);
		$this->tunjangan->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->tunjangan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
