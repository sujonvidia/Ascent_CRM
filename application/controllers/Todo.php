<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	/*  
		*  @author : ITL
		*  04 Dec, 2016
	*/
	
	class Todo extends CI_Controller
	{
		function __construct() {
			parent::__construct();
			$this->load->model('crud_model');
			$this->load->database();
			$this->load->library('session');
			$this->load->model('Common_model');
			$this->load->model('Calendarmodel');
			$this->load->model('Modulemodel');

			$this->load->helper('url');
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			/* cache control */
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			$this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
		}
		
		public function index() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				// $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus");
				$page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus",array('picklist_valueid'=>'0'));
				$page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
				$page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
				$page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
				$page_data['allcategory'] = $this->Modulemodel->getAll("crm_category", array('workspace' => $sessionData['org_id']));
				$page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'],$page_data['org_id']);
				
				//$page_data['users'] = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$page_data['id']."'")->result();
				
				$this->load->view('todoview', $page_data);
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function todoview($autoid='') {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				$page_data['autoid'] = $autoid;

				$page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group",array('org_id'=>$page_data['org_id']));
				$page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");
				
				// $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus");
				$page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus",array('picklist_valueid'=>'0'));
				$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
				$page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
				$page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
				$page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
				$page_data['allcategory'] = $this->Modulemodel->getAll("crm_category", array('workspace' => $sessionData['org_id']));
				
				$page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'],$page_data['org_id']);
				$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

				$page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'],$page_data['id']);
				
				//$page_data['users'] = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$page_data['id']."'")->result();
				
				$this->load->view('todoview', $page_data);
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		 public function newMsgFile()
    {
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
            
        $sessionData = $this->session->userdata('yeezyCRM');
        $json = array();
        // $path = "./require/chat/";
        $postMsg = "";

       
        $i = 0;

        foreach($_FILES["fileinput"]["tmp_name"] as $key=>$tmp_name){
            $path = "./uploads/comment_attachment/";
            $attachment = $_FILES["fileinput"]["tmp_name"][$key];
            $attachment_path = $_FILES["fileinput"]["name"][$key];
            $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
            $attachment_new =(time().$key.'.'.$attachment_ext);
            
            if(is_uploaded_file($attachment)){
                if(move_uploaded_file($attachment,$path.$attachment_new)){
                    $postMsg = base_url("uploads/comment_attachment")."/".$attachment_new;
                    $postMsg='<img style="vertical-align: top;width:120px;height:100px;border-radius: 0px;" src="'.$postMsg.'">';
                    
                    //if(! empty($msg)){ // if message empty, do nothing
                       		$data['acessType'] = $sessionData['accessType'];
                       		$data['id'] = $sessionData['user_id'];
                       		$data['org_id'] = $sessionData['org_id'];
                       		
                       		$currrentDate = date('Y-m-d H:i:s');

                       		$inputdata = array(
                       				"Type" => 'Comment',
                                   	"Title" => "Todo",
                                   	"Description" => $postMsg,
                                   	"CreatedBy" => $data['id'],
                                   	"CreatedDate" => $currrentDate,
                                   	"HasParentId" => $this->input->post('projectID')
                                   );
                       		$array["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);                      
                        $i++;
                    //}
                }
            }
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }

     /*  Open file transfer window  */
    public function openattach($typeid,$location,$nowid){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $data['id'] = $sessionData['user_id'];
        $data['user_email'] = $sessionData['user_email'];
        $acdata = $this->Modulemodel->selectOneData("crm_activity",array('Id'=>$typeid));
        $data['Title']=$acdata[0]->Title;
        $data['Type'] = $acdata[0]->Type;
        $data['Location'] = $location;
        $data['Typeid'] = $typeid;
        $data['Nowid'] = $nowid;
        $this->load->view('uploadattach',$data);
        
    }
		
		public function getAllCategory(){
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$json['allcategory'] = $this->Modulemodel->getAll("crm_category", array('workspace' => $sessionData['org_id']));

				$json['all_todos']=$this->Calendarmodel->getTodoHDByID($_POST['todo_serial']);
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
		}

		public function getAllClient(){
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$json['allclient'] = $this->Modulemodel->getAll("crm_contactdetails");
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
		}

		public function getUsersForTodo(){
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$array = array();

				$array['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($sessionData['user_id'],$sessionData['org_id']);

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function getUsersForTodoNew(){
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$array = array();

			if($_POST['viewtype']==2){
				$array['users'] = $this->Modulemodel->getWorkspaceUsers($sessionData['user_id'],$sessionData['org_id']);
			}else if($_POST['viewtype']==3){
				//$array['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($sessionData['user_id'],$sessionData['org_id']);
				$array['users'] = $this->Modulemodel->getProjectUsersHD($_POST['parentID'],$_POST['UserStatus']);
			}else{
				//$array['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($sessionData['user_id'],$sessionData['org_id']);
				$array['users'] = $this->Modulemodel->getProjectUsersHD($_POST['parentID'],$_POST['UserStatus']);
			}

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function insertCmnt(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$currrentDate = date('Y-m-d H:i:s');

			$inputdata = array(
					"Type" => 'Todo',
	            	"Title" => 'Comment',
	            	"Description" => $this->input->post('comment'),
	            	"CreatedBy" => $data['id'],
	            	"CreatedDate" => $currrentDate,
	            	"HasParentId" => $this->input->post('projectID')
	            );
			$array["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function insertAlarm(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$currrentDate = date('Y-m-d H:i:s');

			$inputdata = array(
					"post_id" => $_POST['serial'],
	            	"type" => 'popup,15,minutes,before,startof',
	            	
	            );
			$array["activityid"] = $this->Modulemodel->insertData("calendar_alarm", $inputdata);

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function insertProjectGroup(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$currrentDate = date('Y-m-d H:i:s');

			$inputdata = array(
				"title" => $this->input->post('newname'),
				"type" => $this->input->post('newname'),
				"admin" => $sessionData['user_id'],
				"org_id" => $sessionData['org_id'],
				"create_date" => $currrentDate,

				);

			$array["ID"] = $this->Modulemodel->insertData("crm_project_group", $inputdata);

			$array['projectGroup'] = $this->Modulemodel->getAll("crm_project_group",array('org_id'=>$sessionData['org_id']));

			header('Content-Type: application/json');
			echo json_encode($array);
		}
		
		public function getPropertyInfo(){
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$json['detail'] = $this->Modulemodel->getAll("crm_projecttask", array('projecttaskid' => $_POST['todo_serial']));

				$json['tags_admin']= $this->db->join('crm_users', 'crm_users.ID=crm_tag.userteamid')->get_where('crm_tag', array('relateTask' => $_POST['todo_serial'], 'user_status' => 1))->result();

				$json['tags_member']= $this->db->join('crm_users', 'crm_users.ID=crm_tag.userteamid')->get_where('crm_tag', array('relateTask' => $_POST['todo_serial'], 'user_status' => 2))->result();
				

				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
		}

		public function getPropertyInfoHD(){
			if ($this->session->userdata('admin_login') == 1){
	            $sessionData = $this->session->userdata('yeezyCRM');
	            $uid = $sessionData['user_id'];
	            $org_id = $sessionData['org_id'];
	        }else{
	            $uid = $_POST["user_id"];
	            $org_id = $_POST["org_id"];
	        }        
	        
			
			$json['detail'] = $this->Modulemodel->getAll("crm_activity", array('Id' => $_POST['todo_serial']));

			$json['tags_admin']= $this->db->join('crm_users', 'crm_users.ID=crm_tagHD.userid')->get_where('crm_tagHD', array('RelatedTo' => $_POST['todo_serial'], 'UserStatus' => 1))->result();

			$json['tags_member']= $this->db->join('crm_users', 'crm_users.ID = crm_tagHD.userid')->get_where('crm_tagHD', array('RelatedTo' => $_POST['todo_serial'], 'UserStatus' => 2))->result();
			$json['allComm'] = $this->Modulemodel->getAllcommentforproject($this->input->post('todo_serial'));
			$json['allStatus'] = $this->Modulemodel->getAllStatusforproject($this->input->post('todo_serial'));
			
			$json['allStory'] = $this->db->get_where('crm_story', array('typeid' => $_POST['todo_serial']))->result();

			$json['users_admin'] = $this->Modulemodel->getProjectUsersHD($_POST['parentID'],'1');

			$json['users_member'] = $this->Modulemodel->getProjectUsersHD($_POST['parentID'],'2');

			$json['ws_users'] = $this->Modulemodel->getWorkspaceUsers($uid,$org_id);

			$json['projectGroup'] = $this->Modulemodel->getAll("crm_project_group",array('org_id'=>$org_id));

			$json['client'] = $this->Modulemodel->getAll("crm_contactdetails");

			$json['all_todos']=$this->Calendarmodel->getTodoHDByID($_POST['todo_serial']);
			$json['tagAdmin'] = $this->Modulemodel->getAll("crm_tagHD",array('RelatedTo'=>$this->input->post('projectID'),'UserStatus'=>'1'));
			$json['tagMember'] = $this->Modulemodel->getAll("crm_tagHD",array('RelatedTo'=>$this->input->post('projectID'),'UserStatus'=>'2'));
			

			header('Content-type: application/json');
			echo json_encode($json);
		}
		

		public function updateTodoEntry() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post_details", array('end_date'=>$_POST['due_date'] ), array('post_id'=>$_POST['cal_id']) );
			
			$this->Modulemodel->updateOneData("crm_activity", array('Enddate'=>$_POST['due_date'] ), array('Id'=>$_POST['cal_id']) );
			
		}

		public function updateTodoDueHD() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$this->Modulemodel->updateOneData("crm_activity", array('Enddate'=>$_POST['due_date'] ), array('Id'=>$_POST['cal_id']) );
			
		}
		
		public function updateNotyFile() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			
			if($_POST['status']=="update"){
				$this->db->where('relateTask', $_POST["taskid"]);
				//$this->db->where('userteamid', $sessionData['user_id']);
				$this->db->set('status_attach', 'status_attach+1', FALSE);
				$this->db->update('crm_tag');
				}else{
				$this->db->where('relateTask', $_POST["taskid"]);
				$this->db->where('userteamid', $sessionData['user_id']);
				$this->db->set('status_attach', '0', FALSE);
				$this->db->update('crm_tag');
			}
			
		}

		public function updateNotyFilehd() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			if($_POST['status']=="update"){
				$this->db->where('RelatedTo', $_POST["taskid"]);
				//$this->db->where('userid <>', $sessionData['user_id']);
				$this->db->set('status_attach', 'status_attach+1', FALSE);
				$this->db->update('crm_tagHD');
			}else{
				$this->db->where('RelatedTo', $_POST["taskid"]);
				$this->db->where('userid', $sessionData['user_id']);
				$this->db->set('status_attach', '0', FALSE);
				$this->db->update('crm_tagHD');
			}
			
		}
		
		public function updateNotyComment() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			if($_POST['status']=="update"){
				$this->db->where('relateTask', $_POST["taskid"]);
				//$this->db->where('userteamid', $sessionData['user_id']);
				$this->db->set('status_chat', 'status_chat+1', FALSE);
				$this->db->update('crm_tag');
				}else{
	       		$this->db->where('relateTask', $_POST["taskid"]);
	       		$this->db->where('userteamid', $sessionData['user_id']);
				$this->db->set('status_chat', '0', FALSE);
				$this->db->update('crm_tag');
			}
			
		}

		public function updateNotyCommenthd() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			if($_POST['status']=="update"){
				$this->db->where('RelatedTo', $_POST["taskid"]);
				//$this->db->where('userteamid', $sessionData['user_id']);
				$this->db->set('status_chat', 'status_chat+1', FALSE);
				$this->db->update('crm_tagHD');
				}else{
	       		$this->db->where('RelatedTo', $_POST["taskid"]);
	       		$this->db->where('userid', $sessionData['user_id']);
				$this->db->set('status_chat', '0', FALSE);
				$this->db->update('crm_tagHD');
			}
			
		}

		public function convert2Task() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			 $date = date('Y-m-d H:i:s');

			$inputdata = array(
					"Type" => 'Task',
	            	"Title" => $_POST["taskName"],
	            	"Description" => "",
	            	"Startdate" => $date,
	            	"Enddate" => $date,
	            	"Duration" => '1',
	            	"Status" => 'live',
	            	"CreatedBy" => $sessionData['user_id'],
	            	"CreatedDate" => $date,
	            	"HasGroup" => '',
	            	"HasClient" => '',
	            	"HasParentId" => $_POST["pid"]
	            );

				$ara["taskInsertID"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

			$this->db->where('projecttaskid', $_POST['todo_id']);
			$this->db->delete('crm_projecttask');
			
		}

		public function convert2TaskHD() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$date = date('Y-m-d H:i:s');

			$sessionData = $this->session->userdata('yeezyCRM');
			
			 if($_POST['status']=="move"){
				$json=$this->Modulemodel->updateOneData("crm_activity", array('Type'=>$_POST['newType'],'HasParentId'=>$_POST['pid'] ), array('Id'=>$_POST['todo_id']) );

			}elseif($_POST['status']=="duplicate"){

				$inputdata = array(
					"Type" => 'Todo',
					"Title" => $_POST["taskName"],
					"Description" => "",
					"Startdate" => '0000-00-00 00:00:00',
					"Enddate" => '0000-00-00 00:00:00',
					"Duration" => '1',
					"Status" => 'none',
					"Priority" => 'Medium',
					"CreatedBy" => $sessionData['user_id'],
					"CreatedDate" => $date,
					"HasGroup" => '',
					"HasClient" => '',
					"HasParentId" => 0,
					"Workspaces" => $sessionData['org_id']
					);

				$data['new_taskid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);
			}elseif($_POST['status']=="copy"){
				$inputdata = array(
					"Type" => 'Task',
					"Title" => $_POST["taskName"],
					"Description" => "",
					"Startdate" => '0000-00-00 00:00:00',
					"Enddate" => '0000-00-00 00:00:00',
					"Duration" => '1',
					"Status" => 'none',
					"Priority" => null,
					"CreatedBy" => $sessionData['user_id'],
					"CreatedDate" => $date,
					"HasGroup" => '',
					"HasClient" => '',
					"HasParentId" => $_POST['pid'],
					"Workspaces" => $sessionData['org_id']
					);

				$data['new_taskid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);
			}

			// $this->db->where('RelatedTo', $_POST['todo_id']);
			// $this->db->delete('crm_tagHD');
			
		}


		
		public function updateCompleteStatus() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$json=$this->Modulemodel->updateOneData("crm_projecttask", array('checked'=>$_POST['status'] ), array('projecttaskid'=>$_POST['serial']) );
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}

		public function updateCompleteStatusHD() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$json=$this->Modulemodel->updateOneData("crm_activity", array('Checked'=>$_POST['status'] ), array('Id'=>$_POST['serial']) );
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}
		
		public function updateTodoPriority() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post", array('priority'=>$_POST['priority'] ), array('ID'=>$_POST['serial']) );
			
			$this->Modulemodel->updateOneData("crm_projecttask", array('projecttaskpriority'=>$_POST['priority'] ), array('projecttaskid'=>$_POST['serial']) );
			
		}

		public function updateTodoPriorityHD() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post", array('priority'=>$_POST['priority'] ), array('ID'=>$_POST['serial']) );
			
			$this->Modulemodel->updateOneData("crm_activity", array('Priority'=>$_POST['priority'] ), array('Id'=>$_POST['serial']) );
			
		}
		
		public function updateTodoStatus() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post", array('priority'=>$_POST['priority'] ), array('ID'=>$_POST['serial']) );
			
			$arrData['projectstatus']=$_POST['status'];
			$arrData['checked']="NO";
			if($_POST['status']=='completed') $arrData['checked']="YES";
			
			$this->Modulemodel->updateOneData("crm_projecttask", $arrData, array('projecttaskid'=>$_POST['serial']) );
			
		}
		public function saveStatus() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$inputdata = array(
				"projectstatus" => $this->input->post('status'),
				"presence" => '1',
				"picklist_valueid" => isset($_POST['projectID']) ? $_POST['projectID'] : 0
			);

			$array["ID"] = $this->Modulemodel->insertData("crm_projectstatus", $inputdata);

			header('Content-type: application/json');
			echo json_encode($array);
			
		}

		public function deleteStatus() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$array['status'] = $this->Modulemodel->deleteItem("crm_projectstatus",array('projectstatus' =>$_POST["value"],'picklist_valueid' => $_POST["ele"]));
			
			$maxid = 0;
			$row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_modcomments` WHERE `typeID` = '".$_POST["serial"]."'")->row();
			if ($row) {
			    $maxid = $row->maxid; 
			}

			$vlu['name'] = $sessionData['username'];
			$vlu['action'] = 'delete status';
			$vlu['detail'] = 'for this task';
			$vlu['parentid'] = $maxid;
			$vlu['typeid'] = $_POST["serial"];
			
			$this->Calendarmodel->insertData("crm_story", $vlu);

			header('Content-type: application/json');
			echo json_encode($array);
			
		}

		public function updateTodoStatusHD() {
			
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$arrData['Status']=$_POST['status'];
			$arrData['Checked']="NO";
			$arrData['LastModified'] = date('Y-m-d H:i:s');
			$type = $_POST['status'];
			
			if($_POST['status']=='completed'){
				$arrData['Checked']="YES";
				$arrData['CompletedAt'] = date('Y-m-d H:i:s');
			}

			$serilActivityID = $_POST['serial'];
			$activity = $this->db->select("Type,HasParentId")->get_where("crm_activity", array("Id" => $serilActivityID))->result();
			
			if($activity[0]->Type == 'SubTask'){
				if($type == 'completed'){
					if ($this->Modulemodel->updateOneData("crm_activity", $arrData, array('Id' => $serilActivityID)) === TRUE) {
						if($this->checkalltsstatus($activity[0]->HasParentId) === $this->checktotaltsstatus($activity[0]->HasParentId)){
							$data['HasParentId'] = $activity[0]->HasParentId;
							$this->Modulemodel->updateOneData("crm_activity", array('Status' => 'completed'), array('Id' => $activity[0]->HasParentId));
						}
						$data['msg'] = "Done";
					} else {
						$data['msg'] = "Fail";
					}
				}else{
					if ($this->Modulemodel->updateOneData("crm_activity", $arrData, array('Id' => $serilActivityID)) === TRUE) {
						$this->Modulemodel->updateOneData("crm_activity", $arrData, array('Id' => $activity[0]->HasParentId));
						$data['msg'] = "Done";
						$data['HasParentId'] = $activity[0]->HasParentId;
					} else {
						$data['msg'] = "Fail";
					}
				}
			}else{
				if ($this->Modulemodel->updateOneData("crm_activity", $arrData, array('Id' => $serilActivityID)) === TRUE) {
					$data['msg'] = "Done";
					$data['HasParentId'] = $activity[0]->HasParentId;
				} else {
					$data['msg'] = "Fail";
				}
			}

			// $this->Modulemodel->updateOneData("crm_activity", $arrData, array('Id'=>$_POST['serial']) );
			
			$maxid = 0;
			$row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_modcomments` WHERE `typeID` = '".$_POST["serial"]."'")->row();
			if ($row) {
			    $maxid = $row->maxid; 
			}

			$vlu['name'] = $sessionData['username'];
			$vlu['action'] = 'changed status';
			$vlu['detail'] = 'for this task';
			$vlu['parentid'] = $maxid;
			$vlu['typeid'] = $_POST["serial"];
			
			$this->Calendarmodel->insertData("crm_story", $vlu);


			header('Content-type: application/json');
			echo json_encode($data);
		}


		function checkalltsstatus($parentID){
			$total = $this->db->where('HasParentId',$parentID)
							->where('Status =', 'completed')
							->where('isDelete =', '1')
							->count_all_results('crm_activity');
			return $total;
		}

		function checktotaltsstatus($parentID){
			$total = $this->db->where('HasParentId',$parentID)
							->where('isDelete =', '1')
							->count_all_results('crm_activity');
			return $total;
		}
		
		public function updateTodoAssign() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post", array('tag_ids'=>implode(",", $_POST['select_user_new']) ), array('ID'=>$_POST['todo_serial']) );
			
			$this->db->where('type', 'todo');
			$this->db->where('relateTask', $_POST['todo_serial']);
			$this->db->where('user_status', $_POST['user_status']);
			$this->db->delete('crm_tag');
			
			
			if(isset($_POST['select_user_new'])){
				foreach ($_POST['select_user_new'] as $selectedOption) {
					
					$dataarray = array(
					'relateTask' => $_POST['todo_serial'],
					'userteamid' => $selectedOption,
					'type' => 'todo',
					'user_status' => $_POST['user_status'],
					'idtype' => 'userid'
					);
					$this->Calendarmodel->insertData("crm_tag", $dataarray);
				}
			}
		}

		public function updateTodoAssignHD() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			//$this->Modulemodel->updateOneData("post", array('tag_ids'=>implode(",", $_POST['select_user_new']) ), array('ID'=>$_POST['todo_serial']) );
			
			//$this->db->where('Type', $_POST['viewtype']);
			$this->db->where('RelatedTo', $_POST['todo_serial']);
			$this->db->where('UserStatus', $_POST['user_status']);
			$this->db->delete('crm_tagHD');
			
			if(isset($_POST['select_user_new'])){
				foreach ($_POST['select_user_new'] as $selectedOption) {
					
					$dataarray = array(
						'RelatedTo' => $_POST['todo_serial'],
						'userid' => $selectedOption,
						'Type' => $_POST['viewtype'],
						'UserStatus' => $_POST['user_status'],
					//'idtype' => 'userid'
					);
					$this->Calendarmodel->insertData("crm_tagHD", $dataarray);
				}
			}


			$json['tags_member'] = $this->db->join('crm_users', 'crm_users.ID=crm_tagHD.userid')->get_where('crm_tagHD', array('RelatedTo' => $_POST['todo_serial'], 'UserStatus' => 2))->result();
				
				
			header('Content-type: application/json');
			echo json_encode($json);
		}

		// public function updateTodoAssignAdmin() {
		// 	if ($this->session->userdata('admin_login') != 1)
		// 	redirect(base_url(), 'refresh');
			
		// 	$sessionData = $this->session->userdata('yeezyCRM');
			
		// 	//$this->Modulemodel->updateOneData("post", array('tag_ids'=>implode(",", $_POST['select_user_new']) ), array('ID'=>$_POST['todo_serial']) );
			
		// 	$this->db->where('type', 'todo');
		// 	$this->db->where('relateTask', $_POST['todo_serial']);
		// 	$this->db->where('user_status', 2);
		// 	$this->db->delete('crm_tag');
			
			
		// 	if(isset($_POST['select_user_new'])){
		// 		foreach ($_POST['select_user_new'] as $selectedOption) {
					
		// 			$dataarray = array(
		// 			'relateTask' => $_POST['todo_serial'],
		// 			'userteamid' => $selectedOption,
		// 			'type' => 'todo',
		// 			'user_status' => 2,
		// 			'idtype' => 'userid'
		// 			);
		// 			$this->Calendarmodel->insertData("crm_tag", $dataarray);
		// 		}
		// 	}
		// }
		
		public function addNewCat() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			
			$dataarray = array(
			'cat_name' => $_POST['cat_name'],
			'cat_color' => $_POST['cat_color'],
			'relate_type' => 'todo',
			'user_id' => $sessionData['user_id'],
			'workspace' => $sessionData['org_id'],
			
			);
			$json['id']=$this->Calendarmodel->insertData("crm_category", $dataarray);
			$json['user_id']=$sessionData['user_id'];
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}

		public function addNewClient() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			
			$dataarray = array(
			'firstname' => $_POST['fname'],
			'lastname' => $_POST['lname'],
			'creator' => $sessionData['user_id'],
			'accountid' => 0,
			'org_id' => $sessionData['org_id']
			
			);
			$json['id']=$this->Calendarmodel->insertData("crm_contactdetails", $dataarray);
			$json['user_id']=$sessionData['user_id'];
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}
		
		public function upNewCat() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$this->Modulemodel-> updateOneData("crm_projecttask", array('category_id'=>$_POST['catserial'] ), array('projecttaskid'=>$_POST['todoserial']) );
			
			$q = $this->db->get_where('crm_category', array('id' => $_POST['catserial']));
			$json= $q->row();
			
			header('Content-type: application/json');
			echo json_encode($json);
			
			
		}
		
		public function upNewCatHD() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$this->Modulemodel-> updateOneData("crm_activity", array('HasCategoryId'=>$_POST['catserial'] ), array('Id'=>$_POST['todoserial']) );
			
			$q = $this->db->get_where('crm_category', array('id' => $_POST['catserial']));
			$json= $q->row();
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}

		public function upNewClientHD() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$this->Modulemodel-> updateOneData("crm_activity", array('HasClient'=>$_POST['setid'] ), array('Id'=>$_POST['todoserial']) );
			
			$q = $this->db->get_where('crm_category', array('id' => $_POST['setid']));
			$json= $q->row();
			
			header('Content-type: application/json');
			echo json_encode($json);
			
		}

		public function updateTodoName() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$json=$this->Modulemodel->updateOneData("crm_projecttask", array('projecttaskname'=>$_POST['todoname'] ), array('projecttaskid'=>$_POST['todoserial']));
			
			
			header('Content-type: application/json');
			echo json_encode($json);
			
			
		}

		public function updateTodoNameHD() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$json=$this->Modulemodel->updateOneData("crm_activity", array('Title'=>$_POST['todoname'] ), array('Id'=>$_POST['todoserial']));
			
			
			header('Content-type: application/json');
			echo json_encode($json);
			
			
		}

		public function updateTodoNameWithStory() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$json = $this->Modulemodel->updateOneData("crm_activity", array('Title'=>$_POST['todoname'] ), array('Id'=>$_POST['todoserial']));
			
			$maxid = 0;
			$row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_modcomments` WHERE `typeID` = '".$_POST['todoserial']."'")->row();
			if ($row) {
			    $maxid = $row->maxid; 
			}

			$vlu['name'] = $sessionData['username'];
			$vlu['action'] = 'changed';
			$vlu['detail'] = 'the name to "'.$_POST['todoname'].'"';
			$vlu['parentid'] = $maxid;
			$vlu['typeid'] = $_POST['todoserial'];
			
			$this->Calendarmodel->insertData("crm_story", $vlu);
			
			header('Content-type: application/json');
			echo json_encode($json);
			
			
		}
		
		public function upSelfCat() {
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$this->Modulemodel-> updateOneData("crm_category", array('cat_name'=>$_POST['edit_catname'],'cat_color'=>$_POST['edit_catcolor'] ), array('id'=>$_POST['setid']) );
			
			$q = $this->db->get_where('crm_category', array('id' => $_POST['setid']));
			$json= $q->row();
			
			header('Content-type: application/json');
			echo json_encode($json);
			
			
		}
		
		
		
		
		public function addTodoEntry() {
			
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['useremail'] = $sessionData['user_email'];
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['username'] = $sessionData['username'];
				$data['org_id'] = $sessionData['org_id'];
				
				$data['new_taskid']=0;
				
				//if($_POST['entry_type']=='task'){
				$vlu['projecttaskname'] = $_POST["entry_name"];
				$vlu['projectid'] = $_POST["taskloc-pid"];
				$vlu['tasklistID'] = $_POST["taskloc-tlid"];
				$vlu['projectstatus'] = 'prospecting';
				$vlu['projecttaskpriority'] = $_POST["priority"];
				$vlu['opened_by'] = $data['id'];
				
				$vlu['assignTO'] = 0;
				$vlu['projecttaskcode'] = 0;
				$vlu['workspaces'] = $data['org_id'];
				
				$vlu['startdate'] =$_POST["start_date"]; 
				$vlu['enddate'] = $_POST["end_date"]; 
				
				$vlu['projecttaskhours'] = 0;
				$vlu['projecttasktype'] = 'administrative';
				$vlu['description'] = $_POST["descr"];
				$vlu['this_type'] = $_POST['entry_type'];
				$vlu['CreatedDate'] = date('Y-m-d H:i:s');
				
				$data['new_taskid']=$this->Calendarmodel->insertData("crm_projecttask", $vlu);
				$id=$data['new_taskid'];
				//}
				
				
				//$data['EmailUsers'] = $this ->Calendarmodel-> getEmailUsers();
				$data['menuName'] = "Calendar";
				$data['subMenuName'] = '';
				
				$data['page'] = "admindash";
				
				
				
				$assign_new = isset($_POST['assign_new']) ? $_POST['assign_new'] : false;
				
				
				$this->Modulemodel-> updateOneData("crm_projecttask", array('calendar_id'=>$id ), array('projecttaskid'=>$data['new_taskid']) );
				
				
				
				// insert recur data
				$dataarray_recur = array(
				'post_id' => $id,
				'recur_every' => isset($_POST['input_recur_every']) ? $_POST['input_recur_every'] : null,
				'recur_pattern' => isset($_POST['sel_recur_pattern']) ? $_POST['sel_recur_pattern'] : null,
				'recur_type' => isset($_POST['recur_fuf']) ? $_POST['recur_fuf'] : null,
				'recur_occur' => isset($_POST['input_recur_occur']) ? $_POST['input_recur_occur'] : null,
				'recur_until' => isset($_POST['datetimepicker_recur']) ? $_POST['datetimepicker_recur'] : null,
				//'exceptions' => 'ex'
				);
				
				$this->Calendarmodel->insertData("calendar_recur", $dataarray_recur);
				
				
				
				//date_default_timezone_set('Asia/Dhaka');
				$cal_subject= $_POST['entry_name'];
				$sdate =date( "Y-m-d H:i:s",strtotime($_POST['start_date']));
				
				$edate =date( "Y-m-d H:i:s",strtotime($_POST['end_date']));
				
				
				$creator_id = $sessionData['user_id'];
				
				
				if(isset($_POST['select_user_new'])){
					foreach ($_POST['select_user_new'] as $selectedOption) {
						
						$dataarray = array(
						'relateTask' => $_POST['todo_serial'],
						'userteamid' => $selectedOption,
						'type' => 'todo',
						'user_status' => 1,
						'idtype' => 'userid'
						);
						$this->Calendarmodel->insertData("crm_tag", $dataarray);
					}
				}
				
				$dataarrayhd = array(
					'RelatedTo' => $id,
					'userid' => $creator_id,
					'Type' => 'Todo',
					'UserStatus' => 1,
					//'idtype' => 'userid'
					);
					$this->Calendarmodel->insertData("crm_tagHD", $dataarrayhd);

				//$return_arr=$this->Calendarmodel->getMyTodoByID($sessionData['user_id'],$id);
				$return_arr=$this->Modulemodel->getUnCatTaskDetails($data['new_taskid']);
				
				
				header('Content-type: application/json');
				echo json_encode($return_arr);
				
				} else {
				redirect('login', 'refresh');
			}
		}

		public function addTodoEntryHD() {
			
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['useremail'] = $sessionData['user_email'];
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['username'] = $sessionData['username'];
				$data['org_id'] = $sessionData['org_id'];
				
				$data['new_taskid']=0;
				
				$date = date('Y-m-d H:i:s');
				$inputdata = array(
					"Type" => 'Todo',
					"Title" => $_POST["entry_name"],
					"Description" => "",
					"Startdate" => '0000-00-00 00:00:00',
					 "Enddate" => '0000-00-00 00:00:00',
					"Duration" => '1',
					 "Status" => 'none',
					"Priority" => 'Medium',
					"CreatedBy" => $data['id'],
					"CreatedDate" => $date,
					"HasGroup" => '',
					"HasClient" => '',
					"HasParentId" => $_POST["pid"],
					"Workspaces" => $data['org_id']
					);

				$data['new_taskid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);

				$id=$data['new_taskid'];
				//$data['EmailUsers'] = $this ->Calendarmodel-> getEmailUsers();
				$data['menuName'] = "Calendar";
				$data['subMenuName'] = '';
				
				$data['page'] = "admindash";
				
				$assign_new = isset($_POST['assign_new']) ? $_POST['assign_new'] : false;
				
				// insert recur data
				$dataarray_recur = array(
					'post_id' => $id,
					'recur_every' => isset($_POST['input_recur_every']) ? $_POST['input_recur_every'] : null,
					'recur_pattern' => isset($_POST['sel_recur_pattern']) ? $_POST['sel_recur_pattern'] : null,
					'recur_type' => isset($_POST['recur_fuf']) ? $_POST['recur_fuf'] : null,
					'recur_occur' => isset($_POST['input_recur_occur']) ? $_POST['input_recur_occur'] : null,
					'recur_until' => isset($_POST['datetimepicker_recur']) ? $_POST['datetimepicker_recur'] : null,
					//'exceptions' => 'ex'
					);
				
				$this->Calendarmodel->insertData("calendar_recur", $dataarray_recur);
				
				$dataarrayhd = array(
					'RelatedTo' => $id,
					'userid' => $sessionData['user_id'],
					'Type' => 'Todo',
					'UserStatus' => 1,
					//'idtype' => 'userid'
					);
				
				$this->Calendarmodel->insertData("crm_tagHD", $dataarrayhd);

				//$return_arr=$this->Calendarmodel->getMyTodoByID($sessionData['user_id'],$id);
				$return_arr=$this->Modulemodel->getUnCatTaskDetailsHD($data['new_taskid']);
				
				header('Content-type: application/json');
				echo json_encode($return_arr);
				
				} else {
				redirect('login', 'refresh');
			}
		}
		
		public function taskDetail() {
			
			$Vid = $this->input->post('taskID');
			$projectID = $this->input->post('projectID');
			$taskLsitID = $this->input->post('taskLsitID');
			$taskType = $this->input->post('taskType');
			$user_id = $this->input->post('user_id');
			
			$data = array();
			
	        // if($taskType == 'UnCat'){
	        //     $data['dataList'] = $this->Modulemodel->getUnCatTaskDetails($Vid);
	        // }else{
			$data['dataList'] = $this->Modulemodel->getTodoDetails($Vid);
	        //}
			
			$data['docList'] = $this->Modulemodel->getDocList($Vid);
			$data['commentList'] = $this->Modulemodel->getComment($Vid,'TODO');
			$data['feedbackList'] = $this->Modulemodel->getFeedback($Vid);
			$data['tasklistName'] = $this->Modulemodel->getAll("crm_tasklist", array('inputDiv' => $taskLsitID));
			
			$data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
			$data['tag'] = $this->Modulemodel->getAllTag($projectID,'todo',$Vid);
			$data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID,'todo',$Vid);
			
			$data['updated_items'] = $this->Modulemodel->getAllTaskItem($Vid);
	        // updated by sujon @ 10-06-16
			
			if($_POST['get_status']==1){
				$data['updated_quotes'] = $this->Modulemodel->getAllQuotes($Vid);
				$data['task_invoices'] = $this->Modulemodel->getTaskInvoices($Vid);
			}else{
				$data['updated_quotes'] = $this->Modulemodel->getUserQuotes($Vid,$user_id);
				$data['task_invoices'] = $this->Modulemodel->getUserInvoices($Vid,$user_id);
			}
			
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function getTodoUsers() {
			
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['acessType'] = $sessionData['accessType'];
			$page_data['id'] = $sessionData['user_id'];
			$page_data['org_id'] = $sessionData['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			
			$return_arr=$this->Calendarmodel->getMyTodoByID($sessionData['user_id'],$_POST['todo_serial']);
			
			
			header('Content-type: application/json');
			echo json_encode($return_arr);
		}
		
		public function saveNewTodo() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$data_array = array(
				'todo_name' => $_POST['todo_name'],
				'user_id' => $_POST['user_id'],
				
				);
				
				$this->db->insert("crm_todo", $data_array);
				$id = $this->db->insert_id();
				$q = $this->db->get_where('crm_todo', array('id' => $id));
				$json= $q->row();
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function getTodoAssigneeHD() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				
				$json['tags_member'] = $this->db->join('crm_users', 'crm_users.ID=crm_tagHD.userid')->get_where('crm_tagHD', array('RelatedTo' => $_POST['todo_serial'], 'UserStatus' => 2))->result();

				$json['tags_admin'] = $this->db->join('crm_users', 'crm_users.ID=crm_tagHD.userid')->get_where('crm_tagHD', array('RelatedTo' => $_POST['todo_serial'], 'UserStatus' => 1))->result();
				
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function delNewTodo() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$json=$this->db->delete('crm_todo', array('id' => $_POST['todo_id'],'user_id' => $_POST['user_id']));
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function delNewCat() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$json=$this->db->delete('crm_category', array('id' => $_POST['catserial']));
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		
		public function fileUp() {
			
	        $sessionData = $this->session->userdata('yeezyCRM');
			
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
			
	        if (!is_dir("./uploads/tempUpload/fileupload")) {
	            mkdir('./uploads/tempUpload/fileupload', 0777, TRUE);
			}
			
			
	        $path = "./uploads/tempUpload/fileupload/";
			
	        $filevlu['folderName'] = "fileupload";
	        $filevlu['name'] = $_POST["commentFile"];
	        $filevlu['type'] = 'TASK';
	        $filevlu['typeID'] = $_POST["taskid2"];
	        $filevlu['proID'] = $_POST["proID"];
	        $filevlu['user'] = $data['id'];
	        $filevlu['user_id'] = $_POST["userName2"];
	        $filevlu['comment_id'] = $_POST["commentid"];
	        $filde = array();
	        foreach ($_FILES["fileinput"]["tmp_name"] as $key => $tmp_name) {
	            $attachment = $_FILES["fileinput"]["tmp_name"][$key];
	            $file_size = round($_FILES["fileinput"]["size"][$key]/1024, 2);
	            $attachment_path = $_FILES["fileinput"]["name"][$key];
	            $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
	            $attachment_new = (time() . $key . '.' . $attachment_ext);
	            if (is_uploaded_file($attachment)) {
	                if (move_uploaded_file($attachment, $path . $attachment_new)) {
						
	                    $filevlu['file_name'] = $attachment_new;
	                    $filevlu['file_size'] = $file_size;
	                    $filevlu['ori_name'] = $attachment_path;
	                    $data["fileID"] = $this->Modulemodel->insertData("crm_file", $filevlu);
	                    if ($data["fileID"] > 0) {
	                        $filde['filelist'] = $this->Modulemodel->getAll("crm_file", array('typeID' => $_POST["taskid2"], 'comment_id' => $_POST["commentid"]));
	                        $filde['fileID'] = $data["fileID"];
	                        $filde['file_name'] = $attachment_new;
	                        $filde['ori_name'] = $attachment_path;
	                        $filde['file_size'] = $file_size;
	                        $filde['file_title'] = $_POST["commentFile"];
							
						}
						
					}
				}
			}
	        
	        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask",array('projecttaskid'=>$_POST["taskid2"],'this_type'=>'todo'));
			
	        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskid2"],$_POST["proID"]);
			
	        $body = "New file uploaded on task: ".$getTaskDetail[0]->projecttaskname;
			
	        if(!empty($getAllFornotification)){
	            $this->Modulemodel->deleteItem("crm_notification",array('type'=>'comment','type_id' =>$_POST["proID"],'relatedTo' => $_POST["taskid2"]));
				foreach ($getAllFornotification as $key => $value) {
					$inputInsertData[] = array(
					'type' => 'comment',
					'type_id' => $_POST["proID"],
					'relatedTo' => $_POST["taskid2"],
					'user_id' => $value->user_id,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'File uploaded',
					'body' => $body,
					'createdby' => $data['id']
	                );
				}
	            
				$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
			}
			
	        header('Content-Type: application/json');
	        echo json_encode($filde);
		}
		
		public function delCalendarEntry() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$createdBY = 'CreatedBy';
				$creator = $this-> db
								-> get_where('crm_activity',array('Id'=>$this->input->post('serial')))
								-> row()->$createdBY;
		    	
		    	
				$this->db->where('post_id', $_POST['serial']);
				$this->db->delete('calendar_alarm');
				
				$this->db->where('post_id', $_POST['serial']);
				$this->db->delete('calendar_exception');
				
				$this->db->where('post_id', $_POST['serial']);
				$this->db->delete('calendar_recur');

		    	if($creator == $sessionData['user_id']){
		    		if($this->Modulemodel->deleteItem("crm_activity",array('Id'=>$_POST['serial']))){
					
						$this->db->where('RelatedTo', $_POST['serial']);
						$this->db->delete('crm_tagHD');
						$this->db->delete("crm_docs", array("parentID"=>$_POST['serial']));
						$array['msg'] = "Done";
					}else{
						$array['msg'] = "Fail";
					}
		    	}else{
		    		$array['msg'] = "Fail";
		    	}
				
				
			} else {
				redirect('login', 'refresh');
			}

			header('Content-Type: application/json');
			echo json_encode($array);
		}
		
		public function updateTask(){
			
		    if (isset($_POST['taskID'])) {
		        $this->load->helper('date');
				
		        $date = date('Y-m-d H:i:s');
				
		        $sessionData = $this->session->userdata('yeezyCRM');
				
		        $data['acessType'] = $sessionData['accessType'];
		        $data['id'] = $sessionData['user_id'];
		        $data['org_id'] = $sessionData['org_id'];
		        $url ="/yzy-projects/index/newPro/".$_POST['taskListID']."/".$_POST['projecteid'];
				
		        $vlu['projecttaskname'] = $_POST["tasknametitle"];
		        $vlu['projecttasktype'] = $_POST["projecttasktype"];
		        $vlu['projecttaskpriority'] = $_POST["ticketpriorities"];
		        $vlu['projecttaskprogress'] = $_POST["projecttaskprogress"];
		        $vlu['projectstatus'] = $_POST["projectstatus"];
		        
		        if($_POST["projectstatus"]=='completed')
		        	$vlu['checked']=="YES";
		        else $vlu['checked']=="NO";

		        $vlu['projecttaskhours'] = $_POST["workhour"];
		        $vlu['startdate'] = $_POST["startdate"];
		        $vlu['enddate'] = $_POST["duedate"];
		        $vlu['projectid'] = $_POST["projecteid"];
		        $vlu['description'] = $_POST["taskdescription"];
		        $vlu['label'] = $_POST["label"];
		        // $vlu['assignTO'] = $_POST["assignto"];
		        $vlu['lastupdate'] = $date;
				
				
						$table = 'crm_projecttask';
						$type = 'todo';
						
				
		        $this->Modulemodel-> updateOneData($table, $vlu, array('projecttaskid'=>$_POST["taskID"]));
				
				
				
				
		        if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
		            $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 0);
		            if($ul !== FALSE){
		                foreach ($ul as $k=>$v) {
		                    if(array_search($v->userteamid, $_POST["assignto"]) === FALSE){
		                        //if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filenameassignto.txt", $v->email);
							}
		                    else
							echo "error";
							// file_put_contents("errorfilenameassignto.txt", $k);
						}
					}
					
		            // To access this task, share the project autometically 
		            $this->Modulemodel->deleteItem("crm_tag",array('type'=>"project", 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
		            
		            $this->Modulemodel->deleteItem("crm_tag",array('type'=>$type, 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
		            foreach ($_POST['assignto'] as $key => $value) {
		                $inputdata1[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
		                $inputdata1[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
					}
		            $this->Modulemodel->insertbatchinto("crm_tag", $inputdata1);
				}
				
		        if (isset($_POST['member']) && $_POST['member'] != "" ) {
		            $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 1);
		            if($ul !== FALSE){
		                foreach ($ul as $k=>$v) {
		                    if(array_search($v->userteamid, $_POST["member"]) === FALSE){
		                        //if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filename.txt", $v->email);
							}
		                    else
							echo "error";
							// file_put_contents("errorfilename.txt", $k);
						}
					}
		            
		            // To access this task, share the project autometically 
		            $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>"project", 'user_status' => 1));
		            
		            $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>$type, 'user_status' => 1));
		            foreach ($_POST['member'] as $key => $value) {
		                $inputdata2[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
		                $inputdata2[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
					}
		            $this->Modulemodel->insertbatchinto("crm_tag", $inputdata2);
				}
				
		        if (isset($_POST['followers']) && $_POST['followers'] != "" ) {
		            $this->Modulemodel->deleteItem("crm_taskfollower",array('relateTask'=>$this->input->post('taskID'),'type'=>$type));
		            foreach ($_POST['followers'] as $key => $value) {
		                $inputdata3[] = array(
		                'type' => $type,
		                'relatedto' => $this->input->post('projecteid'),
		                'relateTask' => $this->input->post('taskID'),
		                'idtype' => 'userid',
		                'userteamid' => $value
		                );
					}
					
		            $this->Modulemodel->insertbatchinto("crm_taskfollower", $inputdata3);
				}
				
		        if (isset($_POST['tag']) && $_POST['tag'] != "" ) {
		            $this->Modulemodel->deleteItem("crm_taskTag",array('task_id'=>$this->input->post('taskID')));
		            if(isset($_POST['tag']) && $_POST['tag'] != ""){
		                foreach ($_POST['tag'] as $key => $value) {
		                    $inputTagData[] = array(
		                    'type' => $type,
		                    'task_id' => $this->input->post('taskID'),
		                    'tag' => $value
		                    );
						}
		                $this->Modulemodel->insertbatchinto("crm_taskTag", $inputTagData);
					}
				}
				
		        if((isset($_POST['member']) && $_POST['member'] != "") || (isset($_POST['assignto']) && $_POST['assignto'] != "") ){
					$this->Modulemodel->deleteItem("crm_notification",array('type'=>$type,'type_id'=>$this->input->post('projecteid'),'relatedTo'=>$this->input->post('taskID')));
					$margeForNotify = $_POST['member'];
					
					$body = "You are tagged in Task. Task Name: ".$vlu['projecttaskname'];
					foreach ($margeForNotify as $key => $value) {
						
						$inputInsertData[] = array(
						'type' => $type,
						'type_id' => $this->input->post('projecteid'),
						'relatedTo' => $this->input->post('taskID'),
						'user_id' => $value,
						'notification_for' => '1',
						'status' => '0',
						'title' => 'Tagged in a Task!!!',
						'body' => $body,
						'createdby' => $data['id']
						);
					}
					
					$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
					
				}
				
		        // This is for development time
		        // Only developer team can receive this email notification
		        // if($_POST['projecteid'] == 329 || $_POST['projecteid'] == 353){ //  Project ID 329 = YeezY Development 
		        //     $body = "<br><br><b>Navigate Connect Development</b> project task is updated. Please check if any is your concern.";
		        //     $body .= "<br><b>Task Name:</b>".$_POST["tasknametitle"];
		        //     $body .= "<br><b>Priorities:</b>".$_POST["ticketpriorities"];
		        //     $body .= "<br><b>Start Date:</b>".$_POST["startdate"];
		        //     $body .= "<br><b>End Date:</b>".$_POST["duedate"];
		        //     $body .= "<br><b>Current Status:</b>".$_POST["projectstatus"];
		        //     $body .= "<br><b>Progress:</b>".$_POST["projecttaskprogress"]."%";
		        //     $body .= "<br><b>Description:</b>".$_POST["taskdescription"];
				
		        //     $listOfTag = $this->Modulemodel->getAllTag($_POST["projecteid"], "task", $_POST['taskID']);
		        //     $body .= "<br><b>Supervisor:</b>";
		        //     $nameemail = "";
		        //     foreach($listOfTag as $k => $v){
		        //         if($v->user_status == 0)
		        //             $nameemail .= $v->full_name." (".$v->email.") <br>";
		        //     }
		        //     $body .= $nameemail;
				
		        //     $body .= "<br><b>Members:</b>";
		        //     $nameemail = "";
		        //     foreach($listOfTag as $k => $v){
		        //         if($v->user_status == 1)
		        //             $nameemail .= $v->full_name." (".$v->email.") <br>";
		        //     }
		        //     $body .= $nameemail;
				
		        //     //$projectMem = $this->Modulemodel->getAll("crm_notification_setup",array('user_id'=>$data['id']));
				
				
		        //     foreach ($listOfTag as $k => $v) {
				
				
		        //         $projectMem[$k] = $this->Modulemodel->selectOneData("crm_notification_setup",array('user_id' => $v->ID));
		        //         //$body .= $projectMem[$k][0]->assignToMe;
		        //         if($projectMem[$k][0]->assignToMe == 1 ){
		        //             $this->sendEmailNotification($v->email, $_POST["tasknametitle"]." task assign is Navigate Connect Development Project", $body);
		        //         }
				
		        //         $projectMem[] = 0;
				
		        //     }
		        //     // file_put_contents("devproject.txt", $body);
		        // } 
		        redirect($url, 'refresh');      
				}else{
		        redirect($url, 'refresh');
			}
		}
		
		public function sendComment() {
	        $sessionData = $this->session->userdata('yeezyCRM');
			
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
	        $projectID= $_POST["projectID"];
	        $ara = array();
			
			
			
	        $vlu['comment'] = $_POST["comment"];
			
	        $baseURL = base_url("require/emotion/");
			
			
	        $vlu['img'] = $_POST["UserImg"];
	        $vlu['name'] = $_POST["userName"];
	        $vlu['type'] = "TODO";
	        $vlu['typeID'] = $_POST["taskId"];
	        $vlu['user'] = $data['id'];
			
	        $data["flderID"] = $this->Modulemodel->insertData("crm_modcomments", $vlu);
			
	        $emotionImgSymble = array('data-commentid=""');
	        $emotionImg = array('data-commentid="' . $data["flderID"] . '"');
			
	        $vlu['comment'] = str_replace($emotionImgSymble, $emotionImg, $_POST["comment"]);
			
	        $data["upflderID"] = $this->Modulemodel->updateData("crm_modcomments", array('comment' => $vlu['comment']), $data["flderID"]);
	        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask",array('projecttaskid'=>$_POST["taskId"],'this_type'=>'todo'));
			
	        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskId"],$projectID);
			
	        $body = "New comment on task: ".$getTaskDetail[0]->projecttaskname;
			
	        if(!empty($getAllFornotification)){
	            $this->Modulemodel->deleteItem("crm_notification",array('type'=>'comment','type_id' =>$projectID,'relatedTo' => $_POST["taskId"]));
				foreach ($getAllFornotification as $key => $value) {
					$inputInsertData[] = array(
					'type' => 'comment',
					'type_id' => $projectID,
					'relatedTo' => $_POST["taskId"],
					'user_id' => $value->user_id,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'Comment',
					'body' => $body,
					'createdby' => $data['id']
	                );
				}
	            
				$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
			}
			
			
	        if ($data["upflderID"] > 0) {
				
				} elseif ($data["flderID"] > 0) {
	            
	            $body = "<br><br><b>Task Name: ".$getTaskDetail[0]->projecttaskname."</b> has new comment. Please check if any is your concern.";
	            $body .= "<br><b>Project ID:</b> ".$projectID;
	            $body .= "<br><b>Task Name:</b> ".$getTaskDetail[0]->projecttaskname;
	            $body .= "<br><b>Comment:</b> ".$_POST["comment"];
				
	            $listOfTag = $this->Modulemodel->getAllTag($projectID, "task", $_POST['taskId']);
	            $body .= "<br><b>Supervisor:</b>";
	            $nameemail = "";
	            foreach($listOfTag as $k => $v){
	                if($v->user_status == 0)
					$nameemail .= $v->full_name." (".$v->email.") <br>";
				}
	            $body .= $nameemail;
				
	            $body .= "<br><b>Members:</b>";
	            $nameemail = "";
	            foreach($listOfTag as $k => $v){
	                if($v->user_status == 1)
					$nameemail .= $v->full_name." (".$v->email.") <br>";
				}
	            $body .= $nameemail;
				
	            //$projectMem = $this->Modulemodel->getAll("crm_notification_setup",array('user_id'=>$data['id']));
	            
				
	            // foreach ($listOfTag as $k => $v) {
				
				
	            //     $projectMem[$k] = $this->Modulemodel->selectOneData("crm_notification_setup",array('user_id' => $v->ID));
	            //     //$body .= $projectMem[$k][0]->assignToMe;
	            //     if($projectMem[$k][0]->commentOnTask == 1 ){
	            //         $this->sendEmailNotification($v->email, "Comment for Yeezy Project Task", $body);
	            //     }
				
	            //     $projectMem[] = 0;
				
	            // }
				
	            $ara['msg'] = $data["flderID"];
				} else {
	            $ara['msg'] = "FAIL";
			}
			
			
	        header('Content-Type: application/json');
	        echo json_encode($ara);
		}
		
		public function getMyTodos() {
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$page_data['id'] = $_POST['user_id'];
			$page_data['org_id'] = $_POST['org_id'];
			$page_data['username'] = $sessionData['username'];
			$page_data['user_img'] = $sessionData['user_img'];
			$page_data['user_email'] = $sessionData['user_email'];
			
			$page_data['page_name']  = 'todo';
			$page_data['page_title'] = 'Navcon :: Todo';
			$json = array();
			$json['all_todos']=$this->Calendarmodel->getMyTodoHD($page_data['id'],$page_data['org_id'],$_POST['order'],$_POST['sortname']);
			
			$json['assg_users']=$this->Calendarmodel->getMyTodoUsersAsg($page_data['id'],$page_data['org_id'],$_POST['order']);
			
			header('Content-type: application/json');
			echo json_encode($json);
		}
		
		public function getMyTodosByID() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				
				$json['all_todos']=$this->Calendarmodel->getTodoHDByID($_POST['todo_serial']);
				
				//$json['assg_users']=$this->Calendarmodel->getMyTodoUsers($sessionData['user_id'],$sessionData['org_id'],$_POST['order']);
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		
		public function getMyTodoUsers() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$json=$this->Calendarmodel->getMyTodoUsers($sessionData['user_id'],$sessionData['org_id'],'');
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function getUserTodoByID() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$json=$this->Calendarmodel->getTodoByID($_POST['serial'],$sessionData['user_id'],$sessionData['org_id']);
				
				header('Content-type: application/json');
				echo json_encode($json);
				
				}else{
				$this->load->view('login');
			}
			
			
		}
		
		public function delUserTodoAlarm() {
			if ($this->session->userdata('admin_login') == 1){
				if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'todo';
				$page_data['page_title'] = 'Navcon :: Todo';
				
				$this->db->where('post_id', $_POST['serial']);
				$this->db->delete('calendar_alarm');
				
				header('Content-type: application/json');
				echo json_encode($page_data);
				
				}else{
				$this->load->view('login');
			}
			
			
		}

		public function makeStarCom(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');
			$parentID = $this->input->post('docid');
			$currrentDate = date('Y-m-d H:i:s');

			$vlu['HasStar'] = $this->input->post('status');
			$vlu['LastUpdate'] = $currrentDate;

			if($this->Modulemodel->updateOneData('crm_docs',$vlu , array('id'=>$parentID))){
				$array['msg'] = "Done";
			}else{
				$array['msg'] = "Fail";
			}
		}

		public function deleteMsg(){
        $projectsid = $_POST["projectsid"];
        $this->db->where("HasParentId", $projectsid);
        $this->db->where("Title", "Todo");
        $json = $this->db->delete("crm_activity");
        header('Content-type: application/json');
        echo json_encode($projectsid);
    }

		public function getCommentForTodo(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$array['allComm'] = $this->Modulemodel->getAllcommentfortodo($this->input->post('projectID'));
			$array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
			$array['creator'] = $this->Modulemodel->getcreatorproject($this->input->post('projectID'));

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function saveTodoSet(){
			$array = array();
			$projectArray = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			$username = $data['username'] = $sessionData['username'];
			$currrentDate = date('Y-m-d H:i:s');
			$parentID = $this->input->post('parentid');
			$thisid = $this->input->post('thisid');

			$projectname = 'projectname';
			$checkedstatus = 'NO';

			if($this->input->post('projectStatus')=="completed"){
				$checkedstatus = 'YES';

			}
				// file_put_contents("filenamessttuss.txt", $checkedstatus);
			$inputdata = array(
				"Description" => $this->input->post('projectDescription'),
            	"Startdate" => $this->input->post('newstartdate'),
            	"Enddate" => $this->input->post('newenddate'),
            	"Duration" => $this->input->post('projectDuration'),
            	"Status" => $this->input->post('projectStatus'),
            	//"CreatedDate" => $currrentDate,
            	"HasGroup" => $this->input->post('projectGroup'),
            	"HasClient" => $this->input->post('projectCLient'),
            	"Checked" => $checkedstatus,
            	//"HasParentId" => $thisid
            );
			
			
			//$array['newid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);
			
			if($this->Modulemodel->updateOneData('crm_activity',$inputdata , array('Id'=>$parentID ))){
				$array['newid'] = $parentID;

				$row_parent = $this->db->get_where("crm_activity", array("Id"=>$this->input->post('thisid')))->row();

				$row_rel = $this->db->get_where("crm_activity", array("Id"=>$this->input->post('parentid')))->row();

				$relatedTo=$this->input->post('thisid');
				$type_id=$this->input->post('parentid');
				$ChangeType=$this->input->post('display_type');

				if($_POST['display_type']=="SubTask"){
					
					$row_pro = $this->db->get_where("crm_activity", array("Id"=> $row_parent->HasParentId ) )->row();

					$msgbody="Project: <b>{$row_pro->Title}</b>, Task: <b>{$row_parent->Title}</b>, Subtask: <b>{$row_rel->Title}</b> due date has been changed by <b>{$username}</b>";

				}elseif($_POST['display_type']=="Task"){
					$msgbody="Project: <b>{$row_parent->Title}</b>, Task: <b>{$row_rel->Title}</b> due date has been changed by <b>{$username}</b>";

					// check subtasks
						 $array['taskSubtask'] = $this->db->select("*")->get_where("crm_activity", array("HasParentId"=>$row_rel->Id))->result();

						if(COUNT($array['taskSubtask'])>0){
							foreach ($array['taskSubtask'] as $keysub => $valsub) {
								
								if(new DateTime($valsub->Enddate) > new DateTime($_POST['newenddate'])){

									if($valsub->CreatedBy != $data['id']){

										$inputInsertData = array(
											'type' => "TaskToastSub",
											'type_id' => $valsub->Id,
											'relatedTo' => $valsub->HasParentId,
											'org_id' => $data['org_id'],
											'user_id' => $valsub->CreatedBy,
											'notification_for' => '1',
											'status' => '0',
											'title' => "Task Due Date Change",
											'body' => "Project: <b>{$row_parent->Title}</b>, Task: <b>{$row_rel->Title}</b>, Subtask: <b>{$valsub->Title}</b> due date has been changed by <b>{$username}</b>",
											'createdby' => $data['id']
											);

										$arr['notification_for_subtask']=$this->Modulemodel->insertData("crm_notification", $inputInsertData);

									}else{

										$array['upstatus_sub'][$key] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate'=>$_POST['newenddate'] ), array('Id'=>$valsub->Id));
									}
								 }
							}
						}

				}

				if(new DateTime($row_parent->Enddate) < new DateTime($_POST['newenddate'])){
					
					if($row_rel->CreatedBy != $data['id']){

						$inputInsertData = array(
							'type' => "{$ChangeType}Toast",
							'type_id' => $type_id,
							'relatedTo' => $row_rel->HasParentId,
							'org_id' => $data['org_id'],
							'user_id' => $row_rel->CreatedBy,
							'notification_for' => '1',
							'status' => '0',
							'title' => "{$ChangeType} Due Date Change",
							'body' => "$msgbody",
							'createdby' => $data['id']
							);

						$arr['notification_for']=$this->Modulemodel->insertData("crm_notification", $inputInsertData);

					}else{

						$arr['upstatus'] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate'=>$_POST['newenddate'] ), array('Id'=>$row_rel->HasParentId));


					}
				}

			}else{
				$array['newid'] = 0;
			}
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}
		
	}		