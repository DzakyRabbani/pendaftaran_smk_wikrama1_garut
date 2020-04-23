<?php 

class User extends CI_Controller
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
		$data['user'] = $this->M_property->getdata('user');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/v_user',$data);
		$this->load->view('template/footer');
	}
	public function insert_action()
	{
		$name     =  $this->input->post('name');
		$username =  $this->input->post('username');
		$password =  $this->input->post('password');


		$data = array(
				'name' 		  => $name,
				'username'    => $username,
				'password'	  => base64_encode($password) 
			);
		$save = $this->db->insert('user',$data);
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('User/index');
		}
	}
	public function delete($id)
	{
		$where = array('user_id' => $id);
		$delete = $this->M_property->deletedata($where,'user');
		if($delete) {
			$alert = '<div class="alert alert-success"><strong>Delete Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('User/index');
		
	}
	public function edit($id)
	{
		$where = array('user_id' => $id);
		$data['user'] = $this->M_property->editdata($where,'user')->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/edit_user',$data);
		$this->load->view('template/footer');		
	}
	public function update()
	{
		$user_id 	   = $this->input->post('user_id');
		$name 		   = $this->input->post('name');
		$username	   = $this->input->post('username');
		$password	   = $this->input->post('password');

		$data = array(
			'name'			=> $name,
			'username'		=> $username,
			'password'		=> base64_encode($password)
			);
		$where = array(
			'user_id' => $user_id 
			);
		$update =	$this->M_property->updatedata('user',$data,$where);
		if ($update) {
		$alert = '<div class="alert alert-success"><strong>Update Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('User/index');

	}
}
 ?>