<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*  
*  @author : ITL
*  04 Dec, 2016
	*/

class Report extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Modulemodel');
		$this->load->model('Common_model');
		$this->load->model('Calendarmodel');
		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

	}

	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{


		if ($this->session->userdata('admin_login') == 1)
			$this->report();

		if ($this->session->userdata('admin_login') != 1)
			$this->load->view('login');

	}

	function getPreferences(){
		$sessionData = $this->session->userdata('yeezyCRM');
		$result = $this->db->select("crm_user_preferences")
		->get_where("crm_users", array("ID"=>$sessionData['user_id']))
		->result();
		header('Content-type: application/json');
		echo json_encode($result[0]->crm_user_preferences);			
	}

	function setPreferences(){
		$sessionData = $this->session->userdata('yeezyCRM');
		$result = $this->db->set("crm_user_preferences", $_POST["leftMenu"])
		->where("ID", $sessionData['user_id'])
		->update("crm_users");
		header('Content-type: application/json');
		echo json_encode($result);			
	}

	/***DASHBOARD***/
	function report()
	{
		if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
		
		$sessionData = $this->session->userdata('yeezyCRM');

		$page_data['acessType'] = $sessionData['accessType'];
		$page_data['id'] = $sessionData['user_id'];
		$page_data['org_id'] = $sessionData['org_id'];
		$page_data['username'] = $sessionData['username'];
		$page_data['user_img'] = $sessionData['user_img'];
		$page_data['user_email'] = $sessionData['user_email'];

		$page_data['page_name']  = 'reports';
		$page_data['page_title'] = 'Navcon :: Status Reports';

		$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

		$page_data['allProjectList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Project','Workspaces'=>$page_data['org_id']));
		$page_data['allTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Task','Workspaces'=>$page_data['org_id']));
		$page_data['allSubTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'SubTask','Workspaces'=>$page_data['org_id']));
		$page_data['allTodoList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Todo','Workspaces'=>$page_data['org_id']));

		$this->load->view('reportview_status', $page_data);
	}

	/***Blnak***/
		// public function blank()
		// {


		// 	$page_data['page_name']  = 'blank';
		// 	$page_data['page_title'] = 'blank';


		// 	//$page_data['module_files'] = $this->dir_to_array(base_url() . 'uploads');
		// 	$this->load->view('blank', $page_data);


		// }

	/*** Chatting Report***/
	public function report_chat()
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

		$page_data['page_name']  = 'reports';
		$page_data['page_title'] = 'Navcon :: Chatting Reports';

		$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

		$page_data['allProjectList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Project','Workspaces'=>$page_data['org_id']));
		$page_data['allTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Task','Workspaces'=>$page_data['org_id']));
		$page_data['allSubTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'SubTask','Workspaces'=>$page_data['org_id']));
		$page_data['allTodoList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Todo','Workspaces'=>$page_data['org_id']));
		$page_data['allGroupList'] = $this->Modulemodel->getAll("crm_message_group", array('pid'=>0));


		$this->load->view('reportview_chat', $page_data);


	}

	/*** Workforce Report by sujon @ 7/11/2017 ***/
	public function report_workforce()
	{
		if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
		
		$sessionData = $this->session->userdata('yeezyCRM');

		$page_data['acessType'] = $sessionData['accessType'];
		$page_data['id'] = $sessionData['user_id'];
		$page_data['org_id'] = $sessionData['org_id'];
		$page_data['username'] = $sessionData['username'];
		$page_data['user_img'] = $sessionData['user_img'];
		$page_data['user_email'] = $sessionData['user_email'];

		$page_data['page_name']  = 'reports';
		$page_data['page_title'] = 'Navcon :: Workforce Analysis Reports';

		$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

		$page_data['allProjectList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Project','Workspaces'=>$page_data['org_id']));
		$page_data['allTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Task','Workspaces'=>$page_data['org_id']));
		$page_data['allSubTaskList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'SubTask','Workspaces'=>$page_data['org_id']));
		$page_data['allTodoList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Todo','Workspaces'=>$page_data['org_id']));

		$this->load->view('reportview_workforce', $page_data);


	}

	/*** Dashboard Report by sujon @ 5/8/2017 ***/
	public function report_dashboard()
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

		$page_data['page_name']  = 'reports';
		$page_data['page_title'] = 'Navcon :: Dashboard Reports';

		$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

		$page_data['allProjectList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Project','Workspaces'=>$page_data['org_id']));


		$this->load->view('reportview_dashboard', $page_data);


	}

	/*** Gantt Report by sujon @ 5/15/2017 ***/
	public function report_gantt()
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

		$page_data['page_name']  = 'reports';
		$page_data['page_title'] = 'Navcon :: Gantt Chart Reports';

		$page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

		$page_data['allProjectList'] = $this->Modulemodel->getAll("crm_activity", array('Type'=>'Project','Workspaces'=>$page_data['org_id']));


		$this->load->view('reportview_gantt', $page_data);


	}



	function getProjectCSV(){

		$sessionData = $this->session->userdata('yeezyCRM');

		$csvdata[] = array(
			'Task ID', 
			'Created At', 
			'Completed At', 
			'Last Modified',
			'Name',
			'Assignee',
			'Due Date',
			'Tags',
			'Notes',
			'Projects',
			'Parent Task',
			);

		$prorow = $this->db->query("SELECT * FROM crm_activity WHERE Id = '".$_POST['proid']."'")->row();

		$arr_tasks = $this->db->query("SELECT * FROM crm_activity WHERE HasParentId = '".$_POST['proid']."'");

		foreach ($arr_tasks->result() as $taskrow)
		{
			$arr_subtasks = $this->db->query("SELECT * FROM crm_activity WHERE HasParentId = '".$taskrow->Id."'");

			if($arr_subtasks->num_rows()==0){

				$assqry="SELECT GROUP_CONCAT(DISTINCT cuser.display_name) as tag_names
				FROM crm_tagHD ctag
				join crm_users cuser on ctag.userid = cuser.Id
				WHERE ctag.RelatedTo = '".$taskrow->Id."'";

				$arr_ass = $this->db->query($assqry)->row();

				$csvdata[] = array(
					'ID'=> $taskrow->Id, 
					'Created At'=> ($taskrow->CreatedDate =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($taskrow->CreatedDate)), 
					'Completed At'=> ($taskrow->CompletedAt =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($taskrow->CompletedAt)), 
					'Last Modified'=>  	($taskrow->LastModified =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($taskrow->LastModified)),
					'Name'=> $taskrow->Title,
					'Assignee'=> $arr_ass->tag_names,
					'Due Date'=> ($taskrow->Enddate =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($taskrow->Enddate)),
					'Tags'=> '',
					'Notes'=> $taskrow->Description,
					'Projects'=> $prorow->Title,
					'Parent Task'=> ''
					);
			}else{
				foreach ($arr_subtasks->result() as $subrow)
				{
					$assqry="SELECT GROUP_CONCAT(DISTINCT cuser.display_name) as tag_names
					FROM crm_tagHD ctag
					join crm_users cuser on ctag.userid = cuser.Id
					WHERE ctag.RelatedTo = '".$subrow->Id."'";

					$arr_ass = $this->db->query($assqry)->row();

					$csvdata[] = array(
						'ID'=> $subrow->Id, 
						'Created At'=> ($subrow->CreatedDate =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($subrow->CreatedDate)), 
						'Completed At'=> ($subrow->CompletedAt =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($subrow->CompletedAt)), 
						'Last Modified'=>  ($subrow->LastModified =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($subrow->LastModified)),
						'Name'=> $subrow->Title,
						'Assignee'=> $arr_ass->tag_names,
						'Due Date'=> ($subrow->Enddate =="0000-00-00 00:00:00") ? "" :  date('Y-m-d', strtotime($subrow->Enddate)),
						'Tags'=> '',
						'Notes'=> $subrow->Description,
						'Projects'=> $prorow->Title,
						'Parent Task'=> $taskrow->Title,
						);
				}
			}
		}

		$uid=$_POST['proid'];
		$handle = fopen("temp/project_$uid.csv", 'w');

		foreach ($csvdata as $key => $datain) {
			fputcsv($handle, ($datain));

		}

		fclose($handle);

		header('Content-type: application/json');
		echo json_encode($uid);	

	}

	function parseCSVfile(){

		$sessionData = $this->session->userdata('yeezyCRM');

		$tmpName = $_FILES['csvfile']['tmp_name'];
		$csvAsArray = array_map('str_getcsv', file($tmpName));

		header('Content-type: application/json');
		echo json_encode($csvAsArray);	

	}

	function processImports(){

		$sessionData = $this->session->userdata('yeezyCRM');
		$data['acessType'] = $sessionData['accessType'];
		$data['id'] = $sessionData['user_id'];
		$data['org_id'] = $sessionData['org_id'];
		$data['username'] = $sessionData['username'];
		$data['user_img'] = $sessionData['user_img'];
		$data['assData'] = array();

		$array = array();
		$arr_pro = array();

			// project creation
		foreach ($_POST['prodata'] as $rowkey => $prodata)
		{

			$currrentDate = date('Y-m-d H:i:s');
			if($prodata !=""){
				$inputdata = array(
					"Type" => 'Project',
					"Title" => $prodata,
					"Description" => '',
					"Startdate" => $currrentDate,
					"Enddate" => $currrentDate,
					"CreatedBy" => $data['id'],
					"CreatedDate" => $currrentDate,
					"HasParentId" => 0,
					"Workspaces" => $data['org_id'],
					"importLevel" => $prodata,
					);

				$data["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

				$arr_pro[$data["activityid"]] = $prodata;

				$inputInsertData = array(
					'type' => 'Project',
					'type_id' => $data["activityid"],
					'relatedTo' => '',
					'org_id' => $data['org_id'],
					'user_id' => 0,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'New Project',
					'body' => $prodata,
					'createdby' => $data['id']
				);

				$this->Modulemodel->insertData("crm_notification", $inputInsertData);
			}
		}

			// task / subtask / todo creation
		foreach ($_POST['idata'] as $rowkey => $rowdata)
		{

			$date = date('Y-m-d H:i:s');

			if($rowdata[9]==""){
					// create todo
				$inputdatatodo = array(
					"Type" => 'Todo',
					"Title" => $rowdata[4],
					"Description" => $rowdata[8],
					"Startdate" => $date,
					"Enddate" => ($rowdata[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[6])),
					"Duration" => '1',
					"Status" => 'initiated',
					"Priority" => 'Medium',
					"CreatedBy" => $data['id'],
					"CreatedDate" => ($rowdata[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[1])),
					"CompletedAt" => ($rowdata[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[2])),
					"LastModified" => ($rowdata[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[3])),
					"HasGroup" => '',
					"HasClient" => '',
					"HasParentId" => 0,
					"Workspaces" => $data['org_id'],
					"importLevel" => '1'
					);

				$data['new_todoid'] = $this->Modulemodel->insertData("crm_activity", $inputdatatodo);
			}else{
				
				if($rowdata[10] == "") $taskname=$rowdata[4];
				else $taskname=$rowdata[10];

				$taskcheck = $this->db->query("SELECT * FROM crm_activity WHERE Title = '".$taskname."' AND HasParentId = '".array_search($rowdata[9],$arr_pro)."'");

				if($taskcheck->num_rows()==0){
					// create task 

					$inputdatatask = array(
						"Type" => 'Task',
						"Title" => $taskname,
						"Description" => $rowdata[8],
						"Startdate" => $date,
						"Enddate" => ($rowdata[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[6])),
						"Duration" => '1',
						"Status" => 'none',
						"CreatedBy" => $data['id'],
						"CreatedDate" => ($rowdata[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[1])),
						"CompletedAt" => ($rowdata[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[2])),
						"LastModified" => ($rowdata[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[3])),
						"HasGroup" => '',
						"HasClient" => '',
						"HasParentId" => array_search($rowdata[9],$arr_pro),
						"Workspaces" => $data['org_id'],
						"importLevel" => '1'
						);


					$data["taskInsertID"] = $this->Modulemodel->insertData("crm_activity", $inputdatatask);
				}else{
					$data["taskInsertID"] = $taskcheck->row()->Id;
				}

				if($rowdata[10] != ""){

					$inputdatasub = array(
						"Type" => 'SubTask',
						"Title" => $rowdata[4],
						"Description" => $rowdata[8],
						"Startdate" => $date,
						"Enddate" => ($rowdata[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[6])),
						"Duration" => '1',
						"hour" => '',
						"Status" => 'none',
						"CreatedBy" => $data['id'],
						"CreatedDate" => ($rowdata[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[1])),
						"CompletedAt" => ($rowdata[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[2])),
						"LastModified" => ($rowdata[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($rowdata[3])),
						"HasGroup" => '',
						"HasClient" => '',
						"HasParentId" => $data["taskInsertID"],
						"Workspaces" => $data['org_id'],
						"importLevel" => '1'
						);

					$data["insertID"] = $this->Modulemodel->insertData("crm_activity", $inputdatasub);
				}
			}

			$inputHDdata1 = array();

			if($rowdata[9] != "" && $rowdata[10] != ""){
				$tagparent= $data["insertID"];
				$tagtype= 'SubTask';
			}elseif ($rowdata[9] == "") {

				$tagparent= $data['new_todoid'];
				$tagtype= 'Todo';
				
			}
			else {
				$tagparent= $data["taskInsertID"];
				$tagtype= 'Task';
			}

			$arr_assg=explode(",", $rowdata[5]);

			array_push($data['assData'], $arr_assg);
			foreach ($arr_assg as $ke => $val) {

				$usercheck = $this->db->query("SELECT * FROM crm_users WHERE display_name = '".$val."'");

				if($usercheck->num_rows() > 0){
					$inputHDdata1[] = array(
						'RelatedTo' => $tagparent,
						'UserStatus' => '2',
						'TagDate' => $date,
						'Type' => $tagtype,
						'userid' => $usercheck->row()->ID,
						'assignBy' => $data['id']
						);
				}
			}
			if($rowdata[5] !=""){
				$this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata1);
			}
		}

		$data['tagdata'] = $inputHDdata1;

		header('Content-type: application/json');
		echo json_encode($data);			
	}	

	public function getprojectUser() {

        $array = array();
        $projectArray = array();
       
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];
        $array['sessionUId'] = $data['id'];

        $array['projects'] = $this->Calendarmodel->getAllprojects($data['org_id'], $_POST['user_id'],$_POST['start_date'],$_POST['end_date']);

        foreach ($array['projects'] as $key => $value) {

            $value->tasklist = $this->Modulemodel->loadReportbyUserId($value->Id,'Task',$_POST['user_id'],$data['org_id'],$_POST['start_date'],$_POST['end_date']);

            foreach ($value->tasklist as $key2 => $value2) {
            	$value2->subtasklist=$this->Modulemodel->loadReportbyUserId($value2->Id,'SubTask',$_POST['user_id'],$data['org_id'],$_POST['start_date'],$_POST['end_date']);
            }
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

	function getReport(){
		$sessionData = $this->session->userdata('yeezyCRM');
		$requestData= $_REQUEST;

		$columns = array( 
			// datatable column index  => database column name
			0 =>'Id',
			1 =>'Title', 
			2 => 'Startdate',
			3=> 'Enddate',
			4=> 'CompletedAt',
			5=> 'Status',
			6=> 'tag_names'
			);


		$result['draw']=intval( $requestData['draw'] );

		if($_POST['assg'] == "All"){

			if( !empty($requestData['search']['value']) ) {
				$qryReport = $this->Modulemodel->loadReportbyDateSearch($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],$requestData,$columns);
				$qryReportT = $this->Modulemodel->loadReportbyDateSearchTotal($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],$requestData,$columns);
			}else{
				$qryReport = $this->Modulemodel->loadReportbyDate($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],$requestData,$columns);

				$qryReportT = $this->Modulemodel->loadReportbyDateTotal($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],$requestData,$columns);
			}

			$result['data'] = $qryReport;
			$result['recordsTotal']=intval( count($qryReportT) );
			$result['recordsFiltered']=intval( count($qryReportT) );


		}else{
			if( !empty($requestData['search']['value']) ) {
				$qryReport=$this->Modulemodel->loadReportbyAssgnSearch($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],implode(",",$_POST['assg']),$requestData,$columns);

				$qryReportT=$this->Modulemodel->loadReportbyAssgnSearchTotal($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],implode(",",$_POST['assg']),$requestData,$columns);

			}else{
				$qryReport=$this->Modulemodel->loadReportbyAssgn($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],implode(",",$_POST['assg']),$requestData,$columns);

				$qryReportT=$this->Modulemodel->loadReportbyAssgnTotal($_POST['start_date'],$_POST['end_date'],$_POST['type'],$sessionData['org_id'],implode(",",$_POST['assg']),$requestData,$columns);
			}

			$result['data'] = $qryReport;
			$result['recordsTotal']=intval( count($qryReportT) );
			$result['recordsFiltered']=intval( count($qryReportT) );

		}

		foreach ($result['data'] as $key => $value) {
			$value->parent1="";
			$value->parent2="";

			$value->children = $this->Modulemodel->loadReportbyChildren($value->Id,$_POST['type'],$sessionData['org_id']);

			foreach ($value->children as $key2 => $value2) {
				$value2->children=$this->Modulemodel->loadReportbyChildren($value2->Id,$_POST['type'],$sessionData['org_id']);
			}


			$getParent1=$this->db->select("*")
			->get_where("crm_activity", array("Id"=>$value->HasParentId));

			if($getParent1->num_rows()>0){
				$value->parent1 =$getParent1->row()->Title;

				$getParent2=$this->db->select("*")
				->get_where("crm_activity", array("Id"=>$getParent1->row()->HasParentId));

				if($getParent2->num_rows()>0){
					$value->parent2 = $getParent2->row()->Title ;


				}
			}

		}

		header('Content-type: application/json');
		echo json_encode($result);			
	}

	function getUserSettings(){

		$sessionData = $this->session->userdata('yeezyCRM');
		$post_userid=$_POST['val_usr'];
		$result["DBSetting"] = $this->Modulemodel->loadSettingsbyUserId($post_userid);

		if($result["DBSetting"]->HolidayCalendar == ""){
			$result["HolidayCalendar"]='bd';
		}else{
			$result["HolidayCalendar"]=$result["DBSetting"]->HolidayCalendar;
		}

		$result["DBHoliday"] = $this->db->get_where("crm_holiday", array("Type"=>"Person Holiday","HasUserId" =>$post_userid,"HolidayCalendar"=>$result["HolidayCalendar"]))->result();

		$result["DBManual"] = $this->db->get_where("crm_holiday", array("Type"=>"Person","HasUserId" =>$post_userid))->result();

		header('Content-type: application/json');
		echo json_encode($result);		
	}


	function getReportChat(){
		$sessionData = $this->session->userdata('yeezyCRM');
		$result['data']=array();

		if($_POST['report_type']=='Project'){

			$groupid=$this->db->select("*")
			->get_where("crm_message_group", array("pid"=>$_POST['type_id']));

			if($groupid->num_rows()>0){

				$result['data'] = $this->Modulemodel->loadReportbyGroup($groupid->row()->group_id,$sessionData['org_id']);

			}

		}
		elseif($_POST['report_type']=='Task' || $_POST['report_type']=='SubTask' || $_POST['report_type']=='Todo'){

			$getid=$this->db->select("*")
			->get_where("crm_modcomments", array("typeID"=>$_POST['type_id']));

			if($getid->num_rows()>0){

				$result['data'] = $this->Modulemodel->loadReportbyId($_POST['type_id'],$sessionData['org_id']);

			}
		}
		elseif($_POST['report_type']=='Group'){
			$result['data'] = $this->Modulemodel->loadReportbyGroup($_POST['type_id'],$sessionData['org_id']);
		}
		elseif($_POST['report_type']=='Direct'){
			$result['data'] = $this->Modulemodel->loadReportbyUser($_POST['chat_from'],$_POST['chat_to'],$_POST['type_id'],$sessionData['org_id']);
		}

		header('Content-type: application/json');
		echo json_encode($result);			
	}

	function getReportDashboard(){
		$sessionData = $this->session->userdata('yeezyCRM');
		$result['data']=array();


		$result['data'] = $this->Modulemodel->loadReportDashboard($_POST['type_id']);
		$result['duetasks'] = $this->Modulemodel->loadDashboardDueTasks($_POST['type_id']);
		$result['duetasks_nextweek'] = $this->Modulemodel->loadDashboardDueTasksWeek($_POST['type_id']);

		$result['overduetasks'] = $this->Modulemodel->loadDashboardOverDueTasks($_POST['type_id']);



		$result['tasks_total']= $this->db->select("*")
		->get_where("crm_activity", array("HasParentId"=>$_POST['type_id']))->num_rows();

		$result['tasks_comp']= $this->db->select("*")
		->get_where("crm_activity", array("HasParentId"=>$_POST['type_id'],"Status"=>'completed'))->num_rows();

			//$result['laststatus'] = $this->Modulemodel->loadDashboardLastStatus($_POST['type_id']);

		$mid = $sessionData['user_email'];
		$fid = $_POST["type_id"] + 99999999;
		$qry_status="SELECT * FROM crm_message join crm_message_group on `crm_message`.`receiver_id` = `crm_message_group`.`group_id` join `crm_users` on `crm_message`.`sender_id` = `crm_users`.`email` where `crm_message`.`receiver_id` = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`) order by `crm_message`.`time` DESC LIMIT 1";
		file_put_contents("temp/qry_status23.txt", $qry_status);

		$result['laststatus'] = $this->db->query($qry_status)->row();



		header('Content-type: application/json');
		echo json_encode($result);			
	}

	function getReportGantt(){
		$sessionData = $this->session->userdata('yeezyCRM');

			// $result['arr_sdate']=array();
			// $result['arr_edate']=array();

		$result['data_pro'] = $this->Modulemodel->loadReportGantt($_POST['type_id']);

		foreach ($result['data_pro'] as $key => $value) {

			$value->data_tasks = $this->Modulemodel->loadReportbyChildren($value->Id);

			foreach ($value->data_tasks as $key2 => $value2) {
					// array_push($result['arr_sdate'],$value2->Startdate);
					// array_push($result['arr_sdate'],$value2->Enddate);

				$value2->data_subtasks = $this->Modulemodel->loadReportbyChildren($value2->Id);

				foreach ($value2->data_subtasks as $key3 => $value3) {
						// array_push($result['arr_sdate'],$value3->Startdate);
						// array_push($result['arr_sdate'],$value3->Enddate);


				}
			}

		}

			// if(count($result['arr_sdate'])>0){
			// 	$min = min(array_map('strtotime', $result['arr_sdate']));
			// 	$max = max(array_map('strtotime', $result['arr_sdate']));
			// 	$result['min_date']= date('Y-m-d', $min);
			// 	$result['max_date']= date('Y-m-d', $max);
			// }

		header('Content-type: application/json');
		echo json_encode($result);			
	}


	function getReportTimeline(){
		$sessionData = $this->session->userdata('yeezyCRM');

		$result['data_pro'] = $this->Modulemodel->loadReportGantt($_POST['type_id']);
			//$result['data_line'] = $this->Modulemodel->loadTimelineAll($_POST['type_id']);

		foreach ($result['data_pro'] as $key => $value) {

			$value->data_tasks = $this->Modulemodel->loadReportbyChildren($value->Id);

			foreach ($value->data_tasks as $key2 => $value2) {
					// array_push($result['arr_sdate'],$value2->Startdate);
					// array_push($result['arr_sdate'],$value2->Enddate);

				$value2->data_subtasks = $this->Modulemodel->loadReportbyChildren($value2->Id);

				foreach ($value2->data_subtasks as $key3 => $value3) {
						// array_push($result['arr_sdate'],$value3->Startdate);
						// array_push($result['arr_sdate'],$value3->Enddate);


				}
			}

		}

			// if(count($result['arr_sdate'])>0){
			// 	$min = min(array_map('strtotime', $result['arr_sdate']));
			// 	$max = max(array_map('strtotime', $result['arr_sdate']));
			// 	$result['min_date']= date('Y-m-d', $min);
			// 	$result['max_date']= date('Y-m-d', $max);
			// }

		header('Content-type: application/json');
		echo json_encode($result);			
	}

	function getReportTimeline2(){
		$sessionData = $this->session->userdata('yeezyCRM');

		$result['data_pro'] = $this->Modulemodel->loadReportGantt($_POST['type_id']);
		$result['data_tasks']=array();
		$result['data_subtasks']=array();

		foreach ($result['data_pro'] as $key => $value) {
			$d1=$this->Modulemodel->loadReportbyChildren($value->Id);

			foreach ($d1 as $key2 => $value2) {
				array_push($result['data_tasks'],$value2);
				$d2=$this->Modulemodel->loadReportbyChildren($value2->Id);

				foreach ($d2 as $key3 => $value3) {
					array_push($result['data_subtasks'],$value3);


				}


			}

		}


		header('Content-type: application/json');
		echo json_encode($result);			
	}

	function getReportTimeline3(){
		$sessionData = $this->session->userdata('yeezyCRM');

		$result['data_pro'] = $this->Modulemodel->loadReportGantt($_POST['type_id']);
		$result['data_arr']=array();

		foreach ($result['data_pro'] as $key => $value) {
			$d1=$this->Modulemodel->loadReportbyChildren($value->Id);

			foreach ($d1 as $key2 => $value2) {
				array_push($result['data_arr'],$value2);
				$d2=$this->Modulemodel->loadReportbyChildren($value2->Id);

				foreach ($d2 as $key3 => $value3) {
					array_push($result['data_arr'], $value3);

				}
			}
		}

		$sortedData = array();

		
		 usort($result['data_arr'], function($a, $b) {
    return strtotime($a->Enddate) - strtotime($b->Enddate);
});

		 file_put_contents("temp/sss.txt", json_encode($result['data_arr']));


		foreach ($result['data_arr'] as $element) {
			if($element->Enddate !='0000-00-00 00:00:00'){
				$timestamp = strtotime($element->Enddate);
				$date = date("Y-m-d", $timestamp); 

				if ( ! isSet($sortedData[$date]) ) { //first entry of that day
					$sortedData[$date]['data'] = array($element);
				} else { //just push current element onto existing array
					$sortedData[$date]['data'][] = $element;
				}
			}
		}
		
		$len=0;
		$maxheight=0;

		foreach ($sortedData as $date => $elements) {

			$maxlen=0;
			$len+=1;
			if(count($elements['data'])>$maxheight) $maxheight=count($elements['data']);
			foreach ($elements['data'] as $element) {
				if(strlen($element->Title) > $maxlen) $maxlen=strlen($element->Title);

			}
			$sortedData[$date]['maxlen']=$maxlen;


		}

		$result['sortedData']=$sortedData;
		$result['datalen']=$len;
		$result['canvasheight']=$maxheight;


		header('Content-type: application/json');
		echo json_encode($result);			
	}

	public function gantt_chart($pid, $interval=1, $startdate=FALSE, $enddate=FALSE){
		$sessionData = $this->session->userdata('yeezyCRM');
		$sessionData = $this->session->userdata('yeezyCRM');
		$data['acessType'] = $sessionData['accessType'];
		$data['id'] = $sessionData['user_id'];
		$data['org_id'] = $sessionData['org_id'];
		$data['org_Name'] = $sessionData['org_Name'];
		$data['username'] = $sessionData['username'];
		$data['user_img'] = $sessionData['user_img'];

		/* Chat & Recent Activity Start */
        // $data['user_email'] = $sessionData['user_email'];
        // $data['memberList'] = $this->Modulemodel->getAllTag($pid,"project");
        // $data['groupList'] = $this->Chatmodel->searchGroupList($pid, $data['user_email']);


        // $data['allProjectList'] = $this->Modulemodel->getAll("crm_project", array('projectid'=>$pid));
        // $data['taskRelatedMember'] = $this->Modulemodel->getTaskMembers($pid);
        // $data['totalMember'] = count($data['memberList']);

        // $data['allTask'] = $this->Modulemodel->getAlltasksNew($data['org_id'],$data['id'],$pid);
        // $data['allSubTask'] = $this->Modulemodel->getAllSubtasksNew($data['org_id'],$data['id'],$pid);
        // $data['allTaskTag'] = $this->Modulemodel->getAll('crm_taskTag');


        // //$data['users'] = $this->Modulemodel->getAll("users");
        // $data['users'] = $this->Modulemodel->getAllUsersWithoutMe($data['id']);
        // $data['groups'] = $this->Modulemodel->getAll("crm_groups");

        // //added by sujon updated by dipok
        // // added by sujon
        //  $data['default_tasklistid'] = $this->Modulemodel->getAll("crm_tasklist",array('related_to'=>$pid,'name'=>'Default'));
        // $data['get_all_tasklists'] = $this->Modulemodel->getAll("crm_tasklist",array('related_to'=>$pid));
        // $data['get_all_tasks'] = $this->Modulemodel->getAllOrder("crm_projecttask",array('projectid'=>$pid,'this_type'=>'task'));
        // $data['NotificationList'] = $this->calendarmodel->getNotificationList($data['id']);
        // $data["muteuserlist"] = $this->db->get_where("mute_message_notification", array("mid"=>$sessionData['user_email']))->result();
        // $data['menuName'] = "Project List";
        // $data['subMenuName'] = '';
        // $data['subMenuName'] = '';

        // if ($pid)
        //     $data['pid'] = $pid;
        // else
        //     $data['pid'] = '-1';

        // $data['interval'] = $interval;
        // $data['fdate'] = $startdate;
        // $data['tdate'] = $enddate;
        // $data['getAllpermission'] = $this-> Modulemodel -> getAll("crm_notification_setup", array('user_id'=>$data['id']));
		$this->load->view('Projects/project_gantt_chart',$data);
	}


}
