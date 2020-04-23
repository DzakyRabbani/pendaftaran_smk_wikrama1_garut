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
		$nama_lengkap      =  $this->input->post('nama_lengkap');
		$img               =  $_FILES['img_source'];
		$nama_panggilan    =  $this->input->post('nama_panggilan');
		$jk                =  $this->input->post('jk');
		$ttl               =  $this->input->post('ttl');
		$agama 			   =  $this->input->post('agama');
		$cita_cita     	   =  $this->input->post('cita_cita');
		$hoby              =  $this->input->post('hoby');
		$anak_ke           =  $this->input->post('anak_ke');
		$jumlah_bersaudara =  $this->input->post('jumlah_bersaudara');
		$tinggi_badan      =  $this->input->post('tinggi_badan');
		$berat_badan       =  $this->input->post('berat_badan');
		$golongan_darah    =  $this->input->post('golongan_darah');

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
				'nama_lengkap' 			=> $nama_lengkap,
				'img_source'  			=> $img,
				'nama_panggilan'        => $nama_panggilan,
				'jk'		  		    => $jk,
				'ttl'					=> $ttl,
				'agama'		  		    => $agama,
				'cita_cita' 			=> $cita_cita,
				'hoby'      			=> $hoby,
				'anak_ke'      			=> $anak_ke,
				'jumlah_bersaudara'     => $jumlah_bersaudara,
				'berat_badan'           => $berat_badan,
				'tinggi_badan'          => $tinggi_badan,
				'golongan_darah'        => $golongan_darah
			);
		$save = $this->db->insert('property',$data);
		
		if ($save) {
			$alert = '<div class="alert alert-Success"><strong>Insert Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('Property/index');
		}
	}
	public function delete($id)
	{
		$where = array('property_id' => $id);
		$img = $this->db->get_where('property',$where)->row_array();
		$delete =$this->M_property->deletedata($where,'property');
		if ($delete) {
			$alert = '<div class="alert alert-success"><strong>Delete Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
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
		$property_id 	   = $this->input->post('property_id');
		$nama_lengkap	   = $this->input->post('nama_lengkap');
		$img_source	   	   = $_FILES['img_source'];
		$nama_panggilan    = $this->input->post('nama_panggilan');
		$jk			  	   = $this->input->post('jk');
		$ttl   			   =  $this->input->post('ttl');
		$agama		   	   = $this->input->post('agama');
		$cita_cita         =  $this->input->post('cita_cita');
		$hoby              =  $this->input->post('hoby');
		$anak_ke           =  $this->input->post('anak_ke');
		$jumlah_bersaudara =  $this->input->post('jumlah_bersaudara');
		$tinggi_badan      =  $this->input->post('tinggi_badan');
		$berat_badan       =  $this->input->post('berat_badan');
		$golongan_darah    =  $this->input->post('golongan_darah');



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
			'nama_lengkap'	    	=> $nama_lengkap,
			'img_source'	    	=> $img_source,
			'nama_panggilan'    	=> $nama_panggilan,
			'jk'			    	=> $jk,
			'ttl'			    	=> $ttl,
			'agama'			    	=> $agama,
			'cita_cita' 	     	=> $cita_cita,
			'hoby'                  => $hoby,
			'anak_ke'               => $anak_ke,
			'jumlah_bersaudara'     => $jumlah_bersaudara,
			'berat_badan'           => $berat_badan,
			'tinggi_badan'          => $tinggi_badan,
			'golongan_darah'        => $golongan_darah
		);
		$where = array(
			'property_id' => $property_id 
			);
		$update = $this->M_property->updatedata('property',$data,$where);
		if($update) {
			$alert = '<div class="alert alert-success"><strong>Update Data Success</strong></div>';
			$this->session->set_flashdata('message',$alert);
		}
		redirect('Property/index');
	}
}
 ?>