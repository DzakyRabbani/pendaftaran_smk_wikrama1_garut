<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	use Firebase\JWT\JWT;

	class C_property extends MY_Controller
	{
		
		function __construct($config= 'rest')
		{
			parent::__construct($config);
			$this->load->helper(array('url','form'));
			$this->load->database();
			$this->cekToken();
			$this->load->model('M_versi');
			$this->load->model('M_gallery');
			// $this->load->model('M_property');
		}

		public function getAll_post()
		{
			$params   = $_REQUEST;
			$this->form_validation->set_rules("id", "Property Id");
			$this->form_validation->set_rules("type", "Type", "required");

			if ($this->form_validation->run() === FALSE){
				// set the flash data error message if there is one
				exit($this->response([
					"status" 			=> FALSE,
					"header" 			=> REST_Controller::HTTP_BAD_REQUEST,
					"message_system" 	=> "error input",
					"data"				=> ["message"		=> explode("\n", strip_tags(validation_errors())) ? explode("\n", strip_tags(validation_errors())) : $this->session->flashdata("message")]
				],REST_Controller::HTTP_BAD_REQUEST));
			} else {
				
				$get_property = $this->M_property->getdata('property');
				
					if ($params['type'] == 'property') {
						if (!empty($get_property)) {
						for ($i=0; $i<count($get_property); $i++) { 
							if ($get_property[$i]->status == 1) {
								$status_active = 'active';
							}else{
								$status_active = 'inactive';
							}
							if ($get_property[$i]->update == 1) {
								$status_update = 'yes';
							}else{
								$status_update = 'no';
							}

							$get_gallery[$i] = $this->M_gallery->getdata('tbl_gallery', ["property_id"	=> $get_property[$i]->property_id])->result();
							
							for($a=0;$a<count($get_gallery[$i]);$a++) {
								
								$data_gallery[$a] =[
													'gallery_id'  => $get_gallery[$i][$a]->gallery_id,
													'img_gallery' => base_url("assets/img/" . $get_gallery[$i][$a]->img_gallery),
												];
							}
							
							$data_content[$i] = [
								'propety_id'	  => $get_property[$i]->property_id,
								'name_property'  => $get_property[$i]->name_property,
								'detail'         => $get_property[$i]->detail,
								'status_update'  => $status_update,
								'status_active'  => $status_active,
								'img_source'	  => base_url("assets/img/" . $get_property[$i]->img_source),
								'gallery'        => $data_gallery
							   ];
							
							
							
						}
							//echo json_encode($data_gallery);
							//die();
						}else{
							$this->displayDataNotFound("Id not found","Id  " . $params["id"] . " not found");
						}

					}elseif ($params['type'] == 'room') {
						$get_room = $this->M_property->getdata_v('room',['property_id' =>$params['id']]);
						if (!empty($get_room)) {
						for ($i=0; $i<count($get_room) ; $i++) { 
							if ($get_room[$i]->status == 1) {
								$status_active = 'active';
							}else{
								$status_active = 'inactive';
							}
							if ($get_room[$i]->update == 1) {
								$status_update = 'yes';
							}else{
								$status_update = 'no';
							}

							$data_content[$i] = [
											 'room_id'	   	  => $get_room[$i]->room_id,
											 'property_id' 	  => $get_room[$i]->property_id,
											 'name_room'   	  => $get_room[$i]->name_room,
											 'status_update'  => $status_update,
											 'status_active'  => $status_active,
											 'img_source'	  => base_url("assets/img_room/" . $get_room[$i]->img_source),
											];
						}
						}else{
							$this->displayDataNotFound("Id not found","Id  " . $params["id"] . " not found");
						}			
					}elseif ($params['type'] == 'button') {

						
						if ($params['id'] != '') {
							$get_button = $this->M_property->room_button('navigate_button',$params['id']);
							if(!empty($get_button)){
								for ($i=0; $i<count($get_button) ; $i++) { 
									if ($get_button[$i]->status == 1) {
										$status_active = 'active';
									}else{
										$status_active = 'inactive';
									}
									if ($get_button[$i]->update == 1) {
										$status_update = 'yes';
									}else{
										$status_update = 'no';
									}

									$data_content[$i] = [
													 'button_id'		=> $get_button[$i]->button_id,
													 'room_id'	   		=> $get_button[$i]->room_id,
													 'detil'   			=> $get_button[$i]->detil,
													 'status_update' 	=> $status_update,
													 'status_active' 	=> $status_active,
													 'img_source'		=> base_url("assets/img_button/" . $get_button[$i]->img_source),
													];
								}
								}else{
									$this->displayDataNotFound("Id not found","Id  " . $params["id"] . " not found");
								}

						}else{
									$this->displayDataNotFound("Id not found","Id  " . $params["id"] . " not found");
								}
					}
						
					// $respond['test'] = $data_content;
					$get_versi = $this->M_versi->getdata('version');
					$versi = $get_versi->versi;
					$data_respond = [
			            		$params['type'] => $data_content,
							     	 ];
					$respond["status"] 			= TRUE;
					$respond['header'] 			= REST_Controller::HTTP_OK;
					$respond['message_system'] 	="success get content";
					$respond["version"]			= $versi;
					$respond['data']			= $data_respond;
					//display sukses login
					$this->displayToJSON($respond);
			}
		}
		public function updateStatus_post() {
			// form validation
			$params   = $_REQUEST;
			$this->form_validation->set_rules("id", "ID", "required|numeric");
			$this->form_validation->set_rules("type" , "Type" , "required");

			if ($this->form_validation->run() === FALSE){
				// set the flash data error message if there is one
				exit($this->response([
					"status" 			=> FALSE,
					"header" 			=> REST_Controller::HTTP_BAD_REQUEST,
					"message_system" 	=> "error input",
					"data"				=> ["message"		=> explode("\n", strip_tags(validation_errors())) ? explode("\n", strip_tags(validation_errors())) : $this->session->flashdata("message")]
				],REST_Controller::HTTP_BAD_REQUEST));
			} else {
				$get_property = $this->M_property->getdata_v('property',['property_id' =>$params['id']]);
				$get_room = $this->M_property->getdata_v('room',['room_id' =>$params['id']]);
				$get_button = $this->M_property->getdata_v('navigate_button',['button_id' =>$params['id']]);

			if ($params['type'] == "property") {
				if(!empty($get_property)) {
					$update_status = $this->M_property->updatedata('property',["update"	=> 0],["property_id"	=> $params['id']]);
				} else {
					$this->displayDataNotFound("property not found","Property id " . $params["id"] . " not found");
				}
			}elseif ($params['type'] == "room") {
				if (!empty($get_room)) {					
					$update_status_room = $this->M_property->updatedata('room',["update" => 0],["room_id" => $params['id']]);
				}else {
					$this->displayDataNotFound("room not found","Room id " . $params["id"] . " not found");
				}
			}elseif ($params['type'] == "button") {
				if (!empty($get_button)) {
					$update_status_button = $this->M_property->updatedata('navigate_button',["update" => 0],["button_id" => $params['id']]);
				}else {
					$this->displayDataNotFound("button not found","Button id " . $params["id"] . " not found");
				}
			}
					$message		= [
						"message"				=> [],
					];

					//Respond Sukses
					$respond["status"] 			= TRUE;
					$respond["header"]			= REST_Controller::HTTP_OK;
					$respond["message_system"]	= "successfully update status";
					$respond["data"]			= $message;
					
					$this->displayToJSON($respond);
			}
		}
	}


 ?>