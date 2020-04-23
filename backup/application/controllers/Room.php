<?php 

class Room extends CI_Controller
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
		$data['room'] = $this->M_property->join_table();
		$data['property'] = $this->M_property->getdata('property');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('room/v_room',$data);
		$this->load->view('template/footer');
	}
	public function insert_action()
	{
		$update = '1';
		$name_room = $this->input->post('name_room');
		$property_id   =  $this->input->post('name_property');
		$img    =  $_FILES['img_source'];
		$status =  $this->input->post('status');

		if ($img == '') {}else{
			$config['upload_path']  = './assets/img_room/';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				echo json_encode(array('error' => $this->upload->display_errors()));die();
			}else{
				$img = $this->upload->data('file_name');
			}
		}

		$data = array(
				'name_room'			=> $name_room,
				'property_id' 		=> $property_id,
				'img_source'  		=> $img,
				'update'	  		=> $update,
				'status'	  		=> $status 
			);
		// echo json_encode($data);
		// die();	
		$save = $this->db->insert('room',$data);
		if ($save) {
			$alert = '<div class="alert alert-danger"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Room/index');
		}
	}
	public function delete($id)
	{
		$where = array('room_id' => $id);
		$img = $this->db->get_where('room',$where)->row_array();
		$hapus = $this->M_property->deletedata($where,'room');
		if ($hapus) {
			unlink("assets/img_room/".$img['img_source']);
		}
		redirect('Room/index');
	}
	public function edit($id)
	{
		$where = array('room_id' => $id);
		$data['room'] = $this->M_property->editdata($where,'room')->result();
		$data['property'] = $this->M_property->getdata('property');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('room/edit_room',$data);
		$this->load->view('template/footer');		
	}
	public function update()
	{
		$update = '1';
		$room_id 	= $this->input->post('room_id');
		$name_room		= $this->input->post('name_room');
		$property_id 	= $this->input->post('name_property');
		$img_source	   	= $_FILES['img_source'];
		$status		  	= $this->input->post('status');

		if ($img_source =='') {}else{
			$config['upload_path']   = './assets/img_room/';
			$config['allowed_types'] = 'jpg|png|gif';
			
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				$img_source = $this->input->post('img_update');

			}else{
				$where = array('room_id' =>$room_id);
				$img   = $this->db->get_where('room',$where)->row_array();
				 unlink("assets/img_room/".$img['img_source']);
				$img_source = $this->upload->data('file_name');
			}
		}
		$data = array(
			'name_room'			=> $name_room,
			'property_id'		=> $property_id,
			'img_source'		=> $img_source,
			'update'			=> $update,
			'status'			=> $status
			);
		$where = array(
			'room_id' => $room_id 
			);
		$this->M_property->updatedata('room',$data,$where);
		redirect('Room/index');
	}
}
 ?>