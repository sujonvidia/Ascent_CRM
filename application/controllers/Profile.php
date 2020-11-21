<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	/*  
		*  @author : ITL
		*  29 Dec, 2016
	*/
	
	class Profile extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->helper('directory');
			$this->load->database();
			$this->load->library('session');
			
			$this->load->model('Common_model');
			/*cache control*/
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			
		}
		
		/***default functin, redirects to login page if no admin logged in yet***/
		public function index()
		{
			
			if ($this->session->userdata('admin_login') == 1){
				$sessionData = $this->session->userdata('yeezyCRM');
			
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['crm_users_data'] = $this->db->get_where("crm_users", array("ID"=>$page_data['id']))->result();

				$page_data['page_name']  = 'profile';
				$page_data['page_title'] = 'Navcon :: My Profile';
				// $page_data['page_body'] = 'menu';
				
				$this->load->view('profile/index', $page_data);
			}

			if ($this->session->userdata('admin_login') != 1)
            	$this->load->view('login');
			
		}

		public function check_cur_pass(){
			if ($this->session->userdata('admin_login') == 1){
				
				$uid = $_POST["uid"];
				$cur_pass = md5($_POST["cur_pass"]);
				$json = $this->db->select("ID")
						->get_where("crm_users", array("ID"=>$uid, "user_password"=>$cur_pass))
						->result();
				if(! count($json)>0)
					$json = false;

				header('Content-type: application/json');
    			echo json_encode($json);
			}

			if ($this->session->userdata('admin_login') != 1)
            	$this->load->view('login');
		}


		public function change_pass(){
	        if ($this->session->userdata('admin_login') == 1){
				$sessionData = $this->session->userdata('yeezyCRM');
			
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'profile';
				$page_data['page_title'] = 'Navcon :: My Profile';
				$page_data['profile_msg_title'] = false;
				$page_data['profile_msg_body'] = "Password changed error!!!";
				$page_data['profile_msg_type'] = "error";
				if($this->db->update("crm_users", array("user_password"=>md5($_POST["new_pass"])), array("ID"=>$page_data['id'], "user_password"=>md5($_POST["cur_pass"])))){
					$page_data['profile_msg_title'] = "Confirmation";
					$page_data['profile_msg_body'] = "Password changed successfully...";
					$page_data['profile_msg_type'] = "success";
				}
				
				$this->load->view('profile/index', $page_data);
			}

			if ($this->session->userdata('admin_login') != 1)
            	$this->load->view('login');
	    }

		public function uploadprofileimg(){
			$sessionData = $this->session->userdata('yeezyCRM');
			$data['id'] = $sessionData['user_id'];
			if($_FILES['propic']['error'] == 0){
				//upload and update the file
				$config['upload_path'] = './asset/img/avatars/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = false;
				$config['remove_spaces'] = true;
				// $config['max_width']  = '128';
				// $config['max_height']  = '128';
				//$config['max_size']   = '100';// in KB

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('propic')) {
					$result["upload_error"] = $this->upload->display_errors(); 
				} else {
					//Image Resizing
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = 128;
					$config['height'] = 128;

					$this->load->library('image_lib', $config);

					if ( ! $this->image_lib->resize()){
						$result["resize_error"] = $this->upload->display_errors(); 
					}
				}
				$filename = $this->upload->file_name;
				$sessionData['user_img'] = $filename; // set user img name
				$this->session->set_userdata('yeezyCRM',$sessionData); // set new name into session
				$this->db->update("crm_users", array("img"=>$filename), array("ID" => $data['id']));
				$result["filename"] = $filename;
			}
			header('Content-type: application/json');
			echo json_encode($result);
		}


		public function updateprofile(){
			$sessionData = $this->session->userdata('yeezyCRM');
			$id = $sessionData['user_id'];
			
			$formvalue["full_name"] = $_POST["full_name"];
			$formvalue["phone_mobile"] = $_POST["phone_mobile"];
			$formvalue["designation"] = $_POST["designation"];
			$formvalue["address_city"] = $_POST["address_city"];
			$formvalue["dob"] = date("Y-m-d", strtotime($_POST["dob"]));
			$this->db->update("crm_users", $formvalue, array("ID"=>$id));
			$result = true;
			header('Content-type: application/json');
			echo json_encode($result);
		}

		public function update_secondmail(){
			$sessionData = $this->session->userdata('yeezyCRM');
			$id = $sessionData['user_id'];
			
			$formvalue["email2"] = $_POST["email2"];
			$this->db->update("crm_users", $formvalue, array("ID"=>$id));
			$result = true;
			redirect('profile');
		}


		/*  Open file transfer window  */
	    public function logoFile(){
	        if ($this->session->userdata('admin_login') != 1)
	           redirect(base_url(), 'refresh');
	        
	        $sessionData = $this->session->userdata('yeezyCRM');
	        $data['id'] = $sessionData['user_id'];
	        $this->load->view('uploadlogo',$data);
	    }

	    public function uploadLogo(){
	    	if ($this->session->userdata('admin_login') != 1)
	           redirect(base_url(), 'refresh');
	        
	        $sessionData = $this->session->userdata('yeezyCRM');
	        $data['id'] = $sessionData['user_id'];
	        $result = array();
	        if($_FILES['fileinput']['error'] == 0){
	        	//upload and update the file
				$config['upload_path'] = './asset/img/logo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = false;
				$config['remove_spaces'] = true;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fileinput')) {
					$result["upload_error"] = $this->upload->display_errors(); 
				} else {
					//Image Resizing
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = 275;
					$config['height'] = 86;

					$this->load->library('image_lib', $config);

					if ( ! $this->image_lib->resize()){
						$result["resize_error"] = $this->upload->display_errors(); 
					}
				}
				$filename = $this->upload->file_name;
				$this->db->update("crm_users", array("logo_img"=>$filename), array("ID" => $data['id']));
				$result["filename"] = $filename;
			}
			header('Content-type: application/json');
			echo json_encode($result);
	    }

	}
