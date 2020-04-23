<?php 

class Navigate_button extends CI_Controller
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
		$data['navigate_button'] = $this->M_property->inner_join();
		$data['room'] = $this->M_property->getdata('room');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('navigate_button/v_navigate_button',$data);
		$this->load->view('template/footer');
	}
	public function insert_action()
	{
		$update = '1';
		$detil   =  $this->input->post('detil');
		$room	=  $this->input->post('room');
		$img    =  $_FILES['img_source'];
		$status =  $this->input->post('status');

		if ($img == '') {}else{
			$config['upload_path']  = './assets/img_button/';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				echo json_encode(array('error' => $this->upload->display_errors()));die();
			}else{
				$img = $this->upload->data('file_name');
			}
		}

		$data = array(
				'img_source'  		=> $img,
				'detil' 			=> $detil,
				'room_id'			=> $room,
				'update'	  		=> $update,
				'status'	  		=> $status 
			);
		$save = $this->db->insert('navigate_button',$data);
		if ($save) {
			$alert = '<div class="alert alert-danger"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Navigate_button/index');
		}
	}
	public function delete($id)
	{
		$where = array('button_id' => $id);
		$img = $this->db->get_where('navigate_button',$where)->row_array();
		$hapus =$this->M_property->deletedata($where,'navigate_button');
		if ($hapus) {
			unlink("assets/img_button/".$img['img_source']);
		}
		redirect('Navigate_button/index');
	}
	public function edit($id)
	{
		$where = array('button_id' => $id);
		$data['navigate_button'] = $this->M_property->editdata($where,'navigate_button')->result();
		$data['room'] = $this->M_property->getdata('room');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('navigate_button/edit_navigate_button',$data);
		$this->load->view('template/footer');		
	}
	public function update()
	{
		$button_id 	    = $this->input->post('button_id');
		$update = '1';
		$detil 	= $this->input->post('detil');
		$room	=  $this->input->post('room');
		$img_source	   	= $_FILES['img_source'];
		$status		  	= $this->input->post('status');

		if ($img_source =='') {}else{
			$config['upload_path']   = './assets/img_button/';
			$config['allowed_types'] = 'jpg|png|gif';
			
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img_source')) {
				$img_source = $this->input->post('img_update');

			}else{
				$where = array('button_id' => $button_id);
				$img   = $this->db->get_where('navigate_button',$where)->row_array();
				unlink("assets/img_button/".$img['img_source']);
				$img_source = $this->upload->data('file_name');
			}
		}
		$data = array(
			'img_source'		=> $img_source,
			'detil'				=> $detil,
			'room_id'			=> $room,
			'update'			=> $update,
			'status'			=> $status
			);
		$where = array(
			'button_id' => $button_id 
			);
		$this->M_property->updatedata('navigate_button',$data,$where);
		redirect('Navigate_button/index');
	}
}
 ?>