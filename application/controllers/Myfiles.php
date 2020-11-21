<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	/*  
		*  @author : ITL
		*  29 Dec, 2016
	*/
	
	class Myfiles extends CI_Controller
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

        	$this->load->helper('url');
		}
		
		/***default functin, redirects to login page if no admin logged in yet***/
		public function index()
		{
			
			if ($this->session->userdata('admin_login') == 1)
            	$this->dashboard();
			
			if ($this->session->userdata('admin_login') != 1)
            	$this->load->view('login');
			
		}
		
		/*  Open, file upload window  */
	    public function openlightbox($page){
	        if ($this->session->userdata('admin_login') != 1)
	           redirect(base_url(), 'refresh');
	        
	        $sessionData = $this->session->userdata('yeezyCRM');
	        $data['id'] = $sessionData['user_id'];
	        $data['user_email'] = $sessionData['user_email'];

	        $this->load->view('my_files/'.$page, $data);
	        
	    }
		
		/***DASHBOARD***/
		function dashboard()
		{
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			$page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
			$page_data['gnpcontacts'] = $this->db->get("crm_message_group")->result(); 
			$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			$page_data['page_body'] = 'menu';
			
			$this->load->view('my_files/index', $page_data);
		}

    	/***PERSONAL FILES***/
		function explorer($menu)
		{
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			$page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
			$page_data['gnpcontacts'] = $this->db->get("crm_message_group")->result(); 
			$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			$page_data['page_body'] = $menu;
			
			if($menu == "addons")
				$this->load->view('my_files/addons', $page_data);
			else
				$this->load->view('my_files/index', $page_data);
		}

    	public function scan(){
    		$sessionData = $this->session->userdata('yeezyCRM');
			$uid = $sessionData['user_id'];

    		$dir = $_POST["dir"];
    		$dir = "$dir";

			$this->load->helper('file');
			$dir_file_lsits = get_dir_file_info($dir, true);

			// $db_file_lists = $this->db->select("*")
			// 						->from("crm_docs")
			// 						->join("crm_docs_share", "name = docs_name", "left")
			// 						->where("user_id",$uid)
			// 						->get()
			// 						->result();
			$db_file_lists = $this->db->query("SELECT DISTINCT name, crm_docs.*, crm_docs_share.* FROM  `crm_docs` 
												LEFT JOIN  `crm_docs_share` ON name = docs_name
												LEFT JOIN  `crm_tagHD` ON RelatedTo = parentID
												LEFT JOIN  `crm_activity` ON `crm_activity`.Id = parentID
												WHERE `userid` =$uid OR user_id =$uid OR CreatedBy =$uid")->result();
			$data = array();
			
			if(count($dir_file_lsits)>0){
				foreach($dir_file_lsits as $k=>$v){
					$dbinfo = $this->checkMyFiles($db_file_lists, $v["name"]);
					if($dbinfo[0] !== FALSE){
						$temp["name"] = $v["name"];
						$temp["display_name"] = $dbinfo[0];
						$temp["favourite"] = $dbinfo[1];
						$temp["relative_path"] = $v["relative_path"];
						$temp["path"] = base_url($v["relative_path"]."/".$v["name"]);
						$temp["size"] = $v["size"];
						$temp["date"] = $v["date"];
						$temp["has_shared"] = $dbinfo[2];
						$temp["pass"] = $dbinfo[3];

						if(is_dir($v["relative_path"]."/".$v["name"])){
							$temp["type"] = "dir";
						} else {
							$temp["type"] = "file";
						}
						array_push($data, $temp);
					}
				}
			}
			header('Content-type: application/json');
			echo json_encode($data);
    	}

    	public function checkMyFiles($data, $key){
    		foreach($data as $k=>$v){
    			if($v->name == $key){
    				if($v->share_plain_pass != "")
    					$pass = $v->share_plain_pass;
    				else
    					$pass = false;

    				if($v->docs_name != "")
    					$has_shared = true;
    				else
    					$has_shared = false;
    				return array($v->original_name, $v->favourite, $has_shared, $pass);
    			}
    		}
    		return array(false, false);
    	}

    	public function do_upload(){
    		if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

    		$target_dir = $_POST["cururl"];
			$msg = "";
			foreach($_FILES["fileToUpload"]["tmp_name"] as $key=>$value){	
				$file_origin_name = basename($_FILES["fileToUpload"]["name"][$key]);

				$file_ext = pathinfo("$target_dir/".$file_origin_name,PATHINFO_EXTENSION);

				$file_new_name = $_POST["uid"] ."_". $key . time() .".". $file_ext;

				$target_file = "$target_dir/". $file_new_name;
				$file_size = $_FILES["fileToUpload"]["size"][$key];
				$uploadOk = 1;
				// Check if file already exists
				if (file_exists($target_file)) {
				    $msg .= "Sorry, file already exists.\n\r";
				    $uploadOk = 0;
				}
				if ($uploadOk == 0) {
					// Check if $uploadOk is set to 0 by an error
				    $msg .= "Sorry, your file was not uploaded.\n\r";
				    return false;
				} else {
					// if everything is ok, try to upload file
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
				    	$pid = NULL;
				    	$ptype = NULL;
				    	if(strpos($target_dir, "ProjectsFiles/") !== FALSE){
				    		$project = explode("/", $target_dir);
				    		$project_id = $this->db->select("parentID")->get_where("crm_docs", array("name"=>$project[1]))->result();
				    		$pid = $project_id[0]->parentID;
				    		$ptype = "Project";
				    	}
				    	$this->db->insert("crm_docs", array("name"=>$file_new_name, "original_name"=>$file_origin_name, "path"=>$target_dir, "type"=>'file', "user_id"=>$_POST["uid"], "parentType"=>$ptype, "parentID"=>$pid, "size"=>$file_size));
				        $msg .= "The file ". $file_origin_name . " has been uploaded.\n\r";
				    } else {
				        $msg .= "Sorry, there was an error uploading your file.\n\r";
				    }
				}
			}
			header('Content-type: application/json');
			echo json_encode($msg);
    	}

    	public function mkdir(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

    		$structure = "./";
			$structure .= $_POST['cururl'];
			$structure .= "/";
			$folder_name = $_POST["uid"] ."_". time();
			$structure .= $folder_name;
			
			$uid = $_POST['uid']; 

			if (!mkdir($structure, 0777, true)) {
			    $msg["result"] = false;
			    $msg["error"] = 'Failed to create folders...';
			}else{
				$file_size = filesize($structure);
				$this->db->insert("crm_docs", array("name"=>$folder_name, "original_name"=> $_POST['newfolder-name'], "path"=>$_POST['cururl'], "type"=> 'folder', "user_id"=> $_POST["uid"], "size"=>$file_size));
				$msg["result"] = true;
				$msg["cur_url"] = $structure;
			}

			header('Content-type: application/json');
			echo json_encode($msg);
    	}

    	public function createfile(){
    		if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh'); 

	    	$newfile = "./";
			$newfile .= $_POST['cururl'];
			$newfile .= "/";
			$physical_name = $_POST["uid"] ."_". time() .".txt";
			$newfile .= $physical_name;
			
			$filebody = $_POST["filebody"];
			$filename = $_POST["filename"];
			
			$uid = $_POST['uid']; 

			if (!file_put_contents($newfile, $filebody)) {
			    $msg["result"] = false;
			    $msg["error"] = 'Failed to create file...';
			}else{
				$file_size = filesize($newfile);
				$pid = NULL;
		    	$ptype = NULL;
		    	if(strpos($_POST['cururl'], "ProjectsFiles/") !== FALSE){
		    		$project = explode("/", $_POST['cururl']);
		    		$project_id = $this->db->select("parentID")->get_where("crm_docs", array("name"=>$project[1]))->result();
		    		$pid = $project_id[0]->parentID;
		    		$ptype = "Project";
		    	}
		    	$this->db->insert("crm_docs", array("name"=> $physical_name, "original_name"=>$filename, "path"=>$_POST['cururl'], "type"=>'file', "user_id"=>$uid, "parentType"=>$ptype, "parentID"=>$pid, "size"=>$file_size));
				$msg["result"] = true;
				$msg["cur_url"] = $newfile;
			}

			header('Content-type: application/json');
			echo json_encode($msg);
		}


		public function favourite(){
			$physical_name = $_POST['physical_name'];
			$fileurl = $_POST['fileurl'];
			$q =$this->db->select("favourite")
						 ->where(array("name"=>$physical_name))
						 ->get("crm_docs")
						 ->result();
			if($q[0]->favourite == "N"){
				$this->db->update("crm_docs", array("favourite"=>$fileurl), array("name"=>$physical_name));
				$msg["feedback"] = "Successfully add to favourite list.";
			}
			else{
				$this->db->update("crm_docs", array("favourite"=>"N"), array("name"=>$physical_name));
				$msg["feedback"] = "Successfully remove from favourite list.";
			}
			
			$msg["result"] = true;
			
			header('Content-type: application/json');
			echo json_encode($msg);
		}

		public function removethis($dir=FALSE){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			if($dir === FALSE)
				$dir = "./".$_POST["dir"];
			$msg = "";
			if (is_dir($dir)) {
				$objects = scandir($dir);
				foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (filetype($dir."/".$object) == "dir") 
							$this->removethis($dir."/".$object); 
						else{ 
							$this->db->delete("crm_docs", array("name"=>$object));
							unlink($dir."/".$object);
						}
					}
				}
				reset($objects);
				$list = explode("/", $dir);
				$this->db->delete("crm_docs", array("name"=>$list[count($list)-1]));
				$msg = rmdir($dir);
			}
			elseif(is_file($dir)){
				$list = explode("/", $dir);
				$this->db->delete("crm_docs", array("name"=>$list[count($list)-1]));
				$msg = unlink($dir);
			}

			header('Content-type: application/json');
			echo json_encode($msg);
		}

		public function detailsinfo(){
			$fn = $_POST["file_name"];

			$crm_docs_info = $this->db->get_where("crm_docs", array("name"=>$fn))->result();
			header('Content-type: application/json');
			echo json_encode($crm_docs_info);
		}



		public function rename_file(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$fn = $_POST["physical_name"];
			$fon = $_POST["display_name"];

			$this->db->update("crm_docs", array("original_name"=>$fon), array("name"=>$fn));
			$r = $this->db->get_compiled_update();

			header('Content-type: application/json');
			echo json_encode($r);
		}

		public function download_file($fn, $url){
			$filename = base64_decode($url);
			$physical_name = $this->db->select("original_name")->get_where("crm_docs", array("name"=>$fn))->result();
			if(file_exists($filename)){
				$this->load->helper('download');
				$data = file_get_contents ( $filename );
				force_download ( $physical_name[0]->original_name, $data );
			}
		}


		public function download_dir($fn, $url){
			$relative_dir_path = base64_decode($url);
			$physical_name = $this->db->select("original_name")->get_where("crm_docs", array("name"=>$fn))->result();
			
			$this->load->library('zip');
		    $path = FCPATH.'/'.$relative_dir_path;
		    $this->zip->read_dir($path,FALSE);
		    $this->zip->download($physical_name[0]->original_name.'.zip');
		}


		public function sharednow(){
			$sessionData = $this->session->userdata('yeezyCRM');
			$data["docs_name"] = $_POST["fn"];
			$data["shareby"] = $sessionData["user_id"];
			$data["shareto"] = $_POST["shared_user_email"];
			$data["path"] = str_replace('/'.$_POST["fn"], '', base64_decode(str_replace('/'.$_POST["fn"], '', str_replace(base_url("myfiles/shared_file/"), '', $_POST["url"]))));
			$data["share_link"] = $_POST["url"];
			$data["share_plain_pass"] = $_POST["pass"];
			$data["exp_date"] = ($_POST["shared_expire"] != "")?$_POST["shared_expire"]:"2020-12-31";

			$fileinfo = $this->db->get_where("crm_docs", array("name"=>$_POST["fn"]))->result();
			$find_file = $this->db->get_where("crm_docs_share", array("docs_name"=>$_POST["fn"]))->result();
			
			if(count($find_file) == 1){
				if($find_file[0]->shareto != $data["shareto"])
					$data["shareto"] = $find_file[0]->shareto .",".$_POST["shared_user_email"];

				$this->db->update("crm_docs_share", $data, array("docs_name"=>$_POST["fn"]));
			}else{
				$this->db->insert("crm_docs_share", $data);
			}
			$dear_to = explode("@", $data["shareto"]);
			$sub = $fileinfo[0]->original_name." - Invitation to view";
			$msg_body = $sessionData["username"]." has invited you to view the following document:<br><br>";
			$msg_body .= "<a href='".$data["share_link"]."' target='_blank'>".$fileinfo[0]->original_name."</a>";
			if($_POST["pass"] != ""){
				$msg_body .= "<br><br>Your password is: ".$_POST["pass"];
			}

			$data["status"] = $this->Email_model->do_email($data["shareto"], $dear_to[0], $sub, $msg_body);
				

			header("Content-type: application/json");
			echo json_encode($data);
		}

		public function shared_file($url, $fn)
		{
			if ($this->session->userdata('admin_login') == 1){
				$sessionData = $this->session->userdata('yeezyCRM');
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
			} 
			else {
				$page_data['id'] = 0;
				$page_data['user_id'] = 0;
				$page_data['org_id'] = 'org';
				$page_data['username'] = 'guest';
				$page_data['user_img'] = 'male.png';
				$page_data['user_email'] = 'guest@guest.com';
				$this->session->set_userdata('yeezyCRM',$page_data);
			}
			$page_data['allprojectANDTask'] = array();

			$menu = base64_decode($url);
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			if(file_exists($menu)){
				// if(is_file($menu))
					$menu = str_replace('/'.$fn, '', $menu);
			}
			$page_data['page_body'] = $menu;
			$page_data['shared_file_name'] = $fn;
			
			// echo $menu;
			$this->load->view('my_files/shared_file', $page_data);
			
		}

		public function shared_scan(){
    		$sessionData = $this->session->userdata('yeezyCRM');
			$uid = $sessionData['user_id'];

    		$dir = $_POST["dir"];
    		$dir = "$dir";

			$this->load->helper('file');
			$dir_file_lsits = get_dir_file_info($dir, true);

			$db_file_lists = $this->db->select("*")
									->from("crm_docs")
									->join("crm_docs_share","name = docs_name")
									->where("name", $_POST["shared_name"])
									->get()
									->result();
			$data = array();
			
			if(count($dir_file_lsits)>0){
				foreach($dir_file_lsits as $k=>$v){
					$dbinfo = $this->checkMyFiles($db_file_lists, $v["name"]);
					if($dbinfo[0] !== FALSE AND ($db_file_lists[0]->exp_date > date("Y-m-d"))){
						$temp["name"] = $v["name"];
						$temp["display_name"] = $dbinfo[0];
						$temp["favourite"] = $dbinfo[1];
						$temp["relative_path"] = $v["relative_path"];
						$temp["path"] = base_url($v["relative_path"]."/".$v["name"]);
						$temp["size"] = $v["size"];
						$temp["date"] = $v["date"];
						$temp["has_shared"] = $dbinfo[2];
						$temp["pass"] = $dbinfo[3];

						if(is_dir($v["relative_path"]."/".$v["name"])){
							$temp["type"] = "dir";
						} else {
							$temp["type"] = "file";
						}
						array_push($data, $temp);
					}
				}
			}
			header('Content-type: application/json');
			echo json_encode($data);
    	}

    	public function scanintodb(){
    		$sessionData = $this->session->userdata('yeezyCRM');
			$uid = $sessionData['user_id'];

    		$dir = $_POST["dir"];
    		$dir = "$dir";

			$this->load->helper('file');
			// $dir_file_lsits = get_dir_file_info($dir, true);

			$db_file_lists = $this->db->select("*")
									->from("crm_docs")
									->join("crm_docs_share", "name = docs_name", "left")
									->where("user_id",$uid)
									->where("favourite !=","N")
									->get()
									->result();
			$data = array();
			
			if(count($db_file_lists)>0){
				foreach($db_file_lists as $k=>$v){
					$temp["name"] = $v->name;
					$temp["display_name"] = $v->original_name;
					$temp["favourite"] = true;
					$temp["relative_path"] = $v->favourite;
					$temp["path"] = base_url($v->favourite);
					$temp["size"] = filesize($v->favourite);
					$temp["date"] = $v->create_date;
					$temp["has_shared"] = ($v->docs_name != "")?true:false;
					$temp["pass"] = ($v->share_plain_pass != "")?$v->share_plain_pass:false;

					if(is_dir($temp["relative_path"])){
						$temp["type"] = "dir";
					} else {
						$temp["type"] = "file";
					}
					array_push($data, $temp);
				}
			}
			header('Content-type: application/json');
			echo json_encode($data);
    	}


    	public function scanjs_inside(){
    		$sessionData = $this->session->userdata('yeezyCRM');
			$uid = $sessionData['user_id'];

    		$dir = $_POST["dir"];
    		$dir = "$dir";

			$this->load->helper('file');
			$dir_file_lsits = get_dir_file_info($dir, true);

			$db_file_lists = $this->db->select("*")
									->from("crm_docs")
									->join("crm_docs_share", "name = docs_name", "left")
									// ->where("user_id",$uid)
									->get()
									->result();
			$data = array();
			
			if(count($dir_file_lsits)>0){
				foreach($dir_file_lsits as $k=>$v){
					$dbinfo = $this->checkMyFiles($db_file_lists, $v["name"]);
					if($dbinfo[0] !== FALSE){
						$temp["name"] = $v["name"];
						$temp["display_name"] = $dbinfo[0];
						$temp["favourite"] = $dbinfo[1];
						$temp["relative_path"] = $v["relative_path"];
						$temp["path"] = base_url($v["relative_path"]."/".$v["name"]);
						$temp["size"] = $v["size"];
						$temp["date"] = $v["date"];
						$temp["has_shared"] = $dbinfo[2];
						$temp["pass"] = $dbinfo[3];

						if(is_dir($v["relative_path"]."/".$v["name"])){
							$temp["type"] = "dir";
						} else {
							$temp["type"] = "file";
						}
						array_push($data, $temp);
					}
				}
			}
			header('Content-type: application/json');
			echo json_encode($data);
    	}

    	
    	public function delete_selected(){
    		foreach($_POST["fn_list"] as $k=>$v){
    			$dir = $v;
				$msg = "";
				if (is_dir($dir)) {
					$objects = scandir($dir);
					foreach ($objects as $object) {
						if ($object != "." && $object != "..") {
							if (filetype($dir."/".$object) == "dir") 
								$this->removethis($dir."/".$object); 
							else{ 
								$this->db->delete("crm_docs", array("name"=>$object));
								unlink($dir."/".$object);
							}
						}
					}
					reset($objects);
					$list = explode("/", $dir);
					$this->db->delete("crm_docs", array("name"=>$list[count($list)-1]));
					$msg = rmdir($dir);
				}
				elseif(is_file($dir)){
					$list = explode("/", $dir);
					$this->db->delete("crm_docs", array("name"=>$list[count($list)-1]));
					$msg = unlink($dir);
				}
    		}
    		header('Content-type: application/json');
			echo json_encode($msg);
    	}


    	public function addons(){
    		$params['key'] = 'teo4qb2kv57suqo';
			$params['secret'] = 'gtihfampee1a5zk';
			
			$this->load->library('dropbox', $params);
			$data = $this->dropbox->get_request_token(site_url("myfiles/access_dropbox"));
			$this->session->set_userdata('token_secret', $data['token_secret']);
			redirect($data['redirect']);
    	}

    	//This method should not be called directly, it will be called after 
	    //the user approves your application and dropbox redirects to it
		public function access_dropbox()
		{
			$params['key'] = 'teo4qb2kv57suqo';
			$params['secret'] = 'gtihfampee1a5zk';
			
			$this->load->library('dropbox', $params);
			
			$oauth = $this->dropbox->get_access_token($this->session->userdata('token_secret'));
			
			$this->session->set_userdata('oauth_token', $oauth['oauth_token']);
			$this->session->set_userdata('oauth_token_secret', $oauth['oauth_token_secret']);
	        redirect('myfiles/test_dropbox');
	        // $this->load->view("dropbox", $data);
		}
		//Once your application is approved you can proceed to load the library
	    //with the access token data stored in the session. If you see your account
	    //information printed out then you have successfully authenticated with
	    //dropbox and can use the library to interact with your account.
		public function test_dropbox()
		{
			$params['key'] = 'teo4qb2kv57suqo';
			$params['secret'] = 'gtihfampee1a5zk';
			$params['access'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
									  'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
			
			$this->load->library('dropbox', $params);
			
	        $dbobj = $this->dropbox->account();
			
	        print_r($dbobj);
		}


		public function onedrive(){
			$menu = "One Drive";
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			$page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
			$page_data['gnpcontacts'] = $this->db->get("crm_message_group")->result(); 
			$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			$page_data['page_body'] = $menu;
			
			$this->load->view('my_files/onedrive/index', $page_data);
		}

		public function onedrive_callback(){
			$menu = "One Drive";
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			$page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
			$page_data['gnpcontacts'] = $this->db->get("crm_message_group")->result(); 
			$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			$page_data['page_body'] = $menu;
			
			$this->load->view('my_files/onedrive/callback', $page_data);
		}


		public function google_drive(){
			$menu = "Google Drive";
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			$page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
			$page_data['gnpcontacts'] = $this->db->get("crm_message_group")->result(); 
			$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
			$page_data['page_name']  = 'my_files';
			$page_data['page_title'] = 'Navcon :: My Files';
			$page_data['page_body'] = $menu;
			
			$this->load->view('my_files/google_drive', $page_data);
		}
    	
	}
