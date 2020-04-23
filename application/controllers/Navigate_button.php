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
		$room_id				 =  $this->input->post('room_id');
		$keterangan   		 =  $this->input->post('keterangan');
		$detail   			 =  $this->input->post('detail');
		$data_bimbingan		 =  $this->input->post('data_bimbingan');
		$nama 				 =  $this->input->post('nama');
		$tempat_lahir   	 =  $this->input->post('tempat_lahir');
		$tanggal_lahir 		 =  $this->input->post('tanggal_lahir');
		$pekerjaan 	         =  $this->input->post('pekerjaan');
		$pendidikan_terakhir =  $this->input->post('pendidikan_terakhir');
		$agama_				 =  $this->input->post('agama_');
		$no_hp 				 =  $this->input->post('no_hp');

		$data = array(
				'room_id'					=> $room_id,
				'keterangan'  				=> $keterangan,
				'detail' 					=> $detail,
				'data_bimbingan'	        => $data_bimbingan,				
				'nama'	     	         	=> $nama,
				'tempat_lahir'	  		    => $tempat_lahir,
				'tanggal_lahir'	  		    => $tanggal_lahir,
				'pekerjaan'	  	   		    => $pekerjaan,
				'pendidikan_terakhir'	    => $pendidikan_terakhir, 
				'agama_'	 				    => $agama_, 
				'no_hp'	 				    => $no_hp
			);
		$save = $this->db->insert('navigate_button',$data);
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Navigate_button/index');
		}
	}
	public function delete($id)
	{
		$where = array('button_id' => $id);
		$delete =$this->M_property->deletedata($where,'navigate_button');
		if($delete) {
			$alert = '<div class="alert alert-success"><strong>Delete Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
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
		$button_id 	         =  $this->input->post('button_id');
		$keterangan   		 =  $this->input->post('keterangan');
		$detail   			 =  $this->input->post('detail');
		$data_bimbingan		 =  $this->input->post('data_bimbingan');
		$nama 				 =  $this->input->post('nama');
		$tempat_lahir   	 =  $this->input->post('tempat_lahir');
		$tanggal_lahir 		 =  $this->input->post('tanggal_lahir');
		$pekerjaan 	         =  $this->input->post('pekerjaan');
		$pendidikan_terakhir =  $this->input->post('pendidikan_terakhir');
		$agama_ 		     =  $this->input->post('agama_');
		$no_hp 				 =  $this->input->post('no_hp');

	
		$data = array(
				'keterangan'  				=> $keterangan,
				'detail' 					=> $detail,
				'data_bimbingan'	        => $data_bimbingan,				
				'nama'	     	         	=> $nama,
				'tempat_lahir'	  		    => $tempat_lahir,
				'tanggal_lahir'	  		    => $tanggal_lahir,
				'pekerjaan'	  	   		    => $pekerjaan,
				'pendidikan_terakhir'	    => $pendidikan_terakhir, 
				'agama_'	 				=> $agama_, 
				'no_hp'	 				    => $no_hp
			);

		$where = array(
			'button_id' => $button_id 
			);
		$update = $this->M_property->updatedata('navigate_button',$data,$where);
		if($update) {
			$alert = '<div class="alert alert-success"><strong>Update Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('Navigate_button/index');
	}
}
 ?>