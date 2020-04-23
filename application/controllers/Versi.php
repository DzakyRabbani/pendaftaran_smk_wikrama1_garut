<?php 

class Versi extends CI_Controller
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
		$data['versi'] = $this->M_property->getdata('version');

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('versi/v_versi',$data);
		$this->load->view('template/footer');
	}
	public function insert_action()
	{
		$version_id   		  =  $this->input->post('version_id');
		$mata_pelajaran    	  =  $this->input->post('mata_pelajaran');
		$tingkat_kelas        =  $this->input->post('tingkat_kelas');
		$semester        	  =  $this->input->post('semester');
		$nilai   	     	  =  $this->input->post('nilai');
		$prestasi             =  $this->input->post('prestasi');
		$informasi            =  $this->input->post('informasi');
		
		$data = array(
				'version_id' 		  		    => $version_id,
				'mata_pelajaran'                => $mata_pelajaran,
				'tingkat_kelas'                 => $tingkat_kelas,
				'semester'   	                => $semester,
				'nilai' 	  	                => $nilai,
				'prestasi'   	                => $prestasi,
				'informasi'   	                => $informasi

			);
		$save = $this->db->insert('version',$data);
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Versi/index');
		}
	}
	public function delete($id)
	{
		$where = array('version_id' => $id);
		$delete = $this->M_property->deletedata($where,'version');
		if ($delete) {
			$alert = '<div class="alert alert-success"><strong>Delete Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('Versi/index');

	}
	public function edit($id)
	{
		$where = array('version_id' => $id);
		$data['versi'] = $this->M_property->editdata($where,'version')->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('versi/edit_versi',$data);
		$this->load->view('template/footer');		
	}
	public function update()
	{
		$version_id   		  =  $this->input->post('version_id');
		$mata_pelajaran    	  =  $this->input->post('mata_pelajaran');
		$tingkat_kelas        =  $this->input->post('tingkat_kelas');
		$semester        	  =  $this->input->post('semester');
		$nilai   	     	  =  $this->input->post('nilai');
		$prestasi             =  $this->input->post('prestasi');
		$informasi            =  $this->input->post('informasi');

		$data = array(
				'mata_pelajaran'                => $mata_pelajaran,
				'tingkat_kelas'                 => $tingkat_kelas,
				'semester'   	                => $semester,
				'nilai' 	  	                => $nilai,
				'prestasi'   	                => $prestasi,
				'informasi'   	                => $informasi
			);
		$where = array(
			'version_id' => $version_id 
			);
		$update = $this->M_property->updatedata('version',$data,$where);
		if ($update) {
			$alert = '<div class="alert alert-success"><strong>Update Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('Versi/index');
	}
}
 ?>