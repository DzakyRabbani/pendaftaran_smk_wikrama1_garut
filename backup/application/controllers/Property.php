	<?php 

class Property extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') !="login") {
			redirect(base_url("Auth"));
		}
		$this->load->library(array('form_validation','session'));

	}
	
	public function index()
	{
		$data['property'] = $this->M_property->getdata('property');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('property/v_property',$data);
		$this->load->view('template/footer');
	}
	public function insert_action()
	{
		$update = '1';
		$name_property   =  $this->input->post('name_property');
		$img    =  $_FILES['img_source'];
		$status =  $this->input->post('status');

		if ($img == '') {}else{
			$config['upload_path']  = './assets/img/';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				echo json_encode(array('error' => $this->upload->display_errors()));die();
			}else{
				$img = $this->upload->data('file_name');
			}
		}

		$data = array(
				'name_property' 	=> $name_property,
				'img_source'  		=> $img,
				'update'	  		=> $update,
				'status'	  		=> $status 
			);
		$save = $this->db->insert('property',$data);
		if ($save) {
			$alert = '<div class="alert alert-danger"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Property/index');
		}
	}
	public function delete($id)
	{
		$where = array('property_id' => $id);
		$img = $this->db->get_where('property',$where)->row_array();
		$hapus =$this->M_property->deletedata($where,'property');
		if ($hapus) {
				unlink("assets/img/".$img['img_source']);
		}
		redirect('Property/index');
	}
	public function edit($id)
	{
		$where = array('property_id' => $id);
		$data['property'] = $this->M_property->editdata($where,'property')->result();

		$this->load->view('template/header');
		$this->load->view('/template/sidebar');
		$this->load->view('property/edit_property',$data);
		$this->load->view('template/footer');		
	}
	public function update()
	{
		$update = '1';
		$property_id 	= $this->input->post('property_id');
		$name_property 	= $this->input->post('name_property');
		$img_source	   	= $_FILES['img_source'];
		$status		  	= $this->input->post('status');

		if ($img_source =='') {}else{
			$config['upload_path']   = './assets/img/';
			$config['allowed_types'] = 'jpg|png|gif';
			
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				$img_source = $this->input->post('img_update');

			}else{
				$where = array('property_id' => $property_id);
				$img   = $this->db->get_where('property',$where)->row_array();
				unlink("assets/img/".$img['img_source']);
				$img_source = $this->upload->data('file_name');
			}
		}
		$data = array(
			'name_property'		=> $name_property,
			'img_source'		=> $img_source,
			'update'			=> $update,
			'status'			=> $status
			);
		$where = array(
			'property_id' => $property_id 
			);
		$this->M_property->updatedata('property',$data,$where);
		redirect('Property/index');
	}
}
 ?>