<?php 

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('login/login');
	}
	public function login_action()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
					'username' => $username,
					'password' => base64_encode($password)
					);
		$cek = $this->M_property->cek_login("user",$where)->num_rows();
		if($cek >0 ) {
			
			$data_session = array(
					'username' => $username,
					'status'   => 'login' 
					);
			$this->session->set_userdata($data_session);
			redirect('Property');
		}else{
			$alert = '<div class="alert alert-danger"><strong>Username / Password wrong!</strong></div>';
			$this->session->set_flashdata('message',$alert);
			redirect('Auth/index');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Auth'));
	}
}
 ?>