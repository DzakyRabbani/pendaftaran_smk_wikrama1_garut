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
		$alamat_rumah   	=  $this->input->post('alamat_rumah');
		$property_id   		=  $this->input->post('nama_lengkap');
		$kelurahan 			=  $this->input->post('kelurahan');
		$kecamatan 			=  $this->input->post('kecamatan');
		$kota_kabupaten 	=  $this->input->post('kota_kabupaten');
		$propinsi 			=  $this->input->post('propinsi');
		$kode_pos 			=  $this->input->post('kode_pos');
		$no_telepon_rumah   =  $this->input->post('no_telepon_rumah');
		$email 			    =  $this->input->post('email');
		$tinggal_dengan 	=  $this->input->post('tinggal_dengan');

		

		$data = array(
			'alamat_rumah' 		=> $alamat_rumah,
			'property_id' 		=> $property_id,	
			'kelurahan'  		=> $kelurahan,
			'kecamatan'	  		=> $kecamatan,
			'kota_kabupaten'	=> $kota_kabupaten,
			'propinsi'			=> $propinsi,
			'kode_pos'			=> $kode_pos,
			'no_telepon_rumah'  => $no_telepon_rumah,
			'email'			    => $email,
			'tinggal_dengan'    => $tinggal_dengan 
			);
		// echo json_encode($data);
		// die();	
		$save = $this->db->insert('room',$data);
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Room/index');
		}
	}
	public function delete($id)
	{
		$where = array('room_id' => $id);
		$delete = $this->M_property->deletedata($where,'room');
		if($delete) {
			$alert = '<div class="alert alert-success"><strong>Delete Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
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
		$room_id   			=  $this->input->post('room_id');
		$alamat_rumah   	=  $this->input->post('alamat_rumah');
		$kelurahan 			=  $this->input->post('kelurahan');
		$kecamatan 			=  $this->input->post('kecamatan');
		$kota_kabupaten 	=  $this->input->post('kota_kabupaten');
		$propinsi 			=  $this->input->post('propinsi');
		$kode_pos 			=  $this->input->post('kode_pos');
		$no_telepon_rumah   =  $this->input->post('no_telepon_rumah');
		$email 			    =  $this->input->post('email');
		$tinggal_dengan 	=  $this->input->post('tinggal_dengan');

		$data = array(
			'alamat_rumah' 		=> $alamat_rumah,	
			'kelurahan'  		=> $kelurahan,
			'kecamatan'	  		=> $kecamatan,
			'kota_kabupaten'	=> $kota_kabupaten,
			'propinsi'			=> $propinsi,
			'kode_pos'			=> $kode_pos,
			'no_telepon_rumah'  => $no_telepon_rumah,
			'email'			    => $email,
			'tinggal_dengan'    => $tinggal_dengan 
			);
		$where = array(
			'room_id' => $room_id 
			);
		$update = $this->M_property->updatedata('room',$data,$where);
		if($update) {
			$alert = '<div class="alert alert-success"><strong>Update Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('Room/index');
	}
}
 ?>