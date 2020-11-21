<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	/*  
		*  @author : ITL
		*  04 Dec, 2016
	*/

		class Calendar extends CI_Controller
		{
			function __construct() {
				parent::__construct();
				$this->load->model('crud_model');
				$this->load->database();
				$this->load->library('session');
				$this->load->model('Common_model');
				$this->load->model('email_model');
				$this->load->model('Calendarmodel');
				$this->load->model('Modulemodel');
				$this->load->helper('url');
				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				require_once(APPPATH . 'libraries/iCalcreator-master/iCalcreator.php' );
				require_once(APPPATH . 'libraries/When-master/src/Valid.php' );
				require_once(APPPATH . 'libraries/When-master/src/When.php' );
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

					$page_data['page_name']  = 'calendar';
					$page_data['page_title'] = 'Navcon :: Calendar';

					$page_data['users'] = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$page_data['id']."'")->result();

					$page_data['GroupList'] = $this->Common_model->getGroupList();

					$page_data['getGuestEmail'] = $this->Common_model->getAll("crm_guest_emails",array('user_id'=>$page_data['id']));

					$page_data['recentMyCal'] = $this->Calendarmodel->getMyCalendar($sessionData['user_id'],$sessionData['org_id']);

					$page_data['recentOtherCal'] = $this->Calendarmodel->getOtherCalendar($page_data);

					$page_data['recentMyTask'] = $this->Calendarmodel->selectMyTask($page_data);

					$page_data['recentOtherTask'] = $this->Calendarmodel->selectOtherTask($page_data);

					$page_data['PostListAll'] = $this->Calendarmodel->selectCalendarAlarm($page_data['org_id']);

					$page_data['HolidayListPop'] = $this->Calendarmodel->selectHolidayList($page_data);

					$this->load->view('calendarview', $page_data);
				}else{
					$this->load->view('login');
				}


			}

			public function calendarview($autoid='',$type='') {
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
					$page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
					$page_data['page_name']  = 'calendar';
					$page_data['page_title'] = 'Navcon :: Calendar';
					$page_data['autoid'] = $autoid;
					$page_data['display_type'] = $type;

					//$page_data['users'] = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$page_data['id']."'")->result();

					$page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'],$page_data['org_id']);

					$page_data['allusers'] =$this->db->select('ID, full_name,img')->get('crm_users')->result_array();
					

					$page_data['GroupList'] = $this->Common_model->getGroupList();

					$page_data['getGuestEmail'] = $this->Common_model->getAll("crm_guest_emails",array('user_id'=>$page_data['id']));

					$page_data['recentMyCal'] = $this->Calendarmodel->getMyCalendar($sessionData['user_id'],$sessionData['org_id']);

					$page_data['recentOtherCal'] = $this->Calendarmodel->getOtherCalendar($page_data);

					$page_data['recentMyTask'] = $this->Calendarmodel->selectMyTask($page_data);

					$page_data['recentOtherTask'] = $this->Calendarmodel->selectOtherTask($page_data);

					$page_data['PostListAll'] = $this->Calendarmodel->selectCalendarAlarm($page_data['org_id']);

					$page_data['HolidayListPop'] = $this->Calendarmodel->selectHolidayList($page_data);

					$this->load->view('calendarview', $page_data);
				}else{
					$this->load->view('login');
				}


			}

			public function newIcsFile()
			{
				if($this-> session -> userdata('yeezyCRM')){
					$sessionData = $this->session->userdata('yeezyCRM');
					$json = array();
					$path = "./uploads/import_ical/";
					$postMsg = "";

					$i = 0;

					foreach($_FILES["fileinput"]["tmp_name"] as $key=>$tmp_name){

						$path = "./uploads/import_ical/";
						$attachment = $_FILES["fileinput"]["tmp_name"][$key];
						$attachment_path = $_FILES["fileinput"]["name"][$key];
						$attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
						$attachment_new =(time().$key.'.'.$attachment_ext);

						if(is_uploaded_file($attachment)){
							if(move_uploaded_file($attachment,$path.$attachment_new)){
								$json['newfile'] = base_url("uploads/import_ical")."/".$attachment_new;

							}
						}
					}

					header('Content-type: application/json');
					echo json_encode($json);
				}
			}

    public function previewIcal($cal_type,$subject,$description,$startdate,$enddate,$location=null,$organizer=null,$attendee_req=null,$attendee_opt=null,$alarm_action=null,$alarm_repeat=null,$alarm_duration=null,$alarm_msg=null,$alarm_trigger=null,$alarm_when=null){
			
			//$tz = "Asia/Dhaka"; // define time zone
			$config = array( "unique_id" => "kigkonsult.se" // set Your unique id, 
			//"TZID"      => $tz // opt. set "calendar" timezone
			);                    
			$v = new vcalendar( $config );    // create a new calendar object instance
			
			$v->setProperty( "method", "PUBLISH" );  
			$v->setProperty( "x-wr-calname", "Calendar Sample" ); 
			$v->setProperty( "X-WR-CALDESC", "Calendar Description" ); 
			//$v->setProperty( "X-WR-TIMEZONE", $tz );                   
			
			if($cal_type=='todo'){
				$vevent = $v->newComponent( "vtodo" ); 
				
				$vevent->setProperty( "dtstart", $startdate);
				$vevent->setProperty( "dtend",   $enddate);
				
				// $vevent->setProperty( "LOCATION", $location); 
				// $vevent->setProperty( "summary", $subject );
				// $vevent->setProperty( "description", $description);
				// $vevent->setProperty( "organizer", $organizer );
				
			}
			else{
				$vevent = $v->newComponent( "vevent" );
				$vevent->setProperty( "dtstart", $startdate);
				$vevent->setProperty( "dtend",   $enddate);
				
				
			}

			$vevent->setProperty( "LOCATION", $location); 
				$vevent->setProperty( "summary", $subject );
				$vevent->setProperty( "description", $description);
				$vevent->setProperty( "organizer", $organizer );
			
				foreach ($attendee_req as $value) {
					$vevent->setProperty( "attendee", $value, array( "role"   => "REQ-PARTICIPANT", "CN" => $value ));
				}

				foreach ($attendee_opt as $value) {
					$vevent->setProperty( "attendee", $value, array( "role"   => "OPT-PARTICIPANT", "CN" => $value));
				}

			if($alarm_action !=null){
				
				$valarm = $vevent->newComponent( "valarm" ); // create an event alarm
				
				if($alarm_action=='sound') $valarm->setProperty("action", "AUDIO" );
				
				if($alarm_action=='popup'){
					$valarm->setProperty("action", "DISPLAY" );
					$valarm->setProperty( "description", $alarm_msg );
				}
				if($alarm_action=='mail'){
					$valarm->setProperty("action", "EMAIL" );
					$valarm->setProperty( "description", $alarm_msg );
				}
				if($alarm_action=='call'){
					$valarm->setProperty("action", "PROCEDURE" );
					$valarm->setProperty( "description", $alarm_msg );
				}
				
				if($alarm_repeat !=null){
					
					$valarm->setProperty( "repeat", intval($alarm_repeat));
					$valarm->setProperty( "duration", $alarm_duration );
					
				}
				
				//$dt = DateTime::createFromFormat("Y-m-d H:i:s", $alarm_time);
				
				//$d = sprintf( '%04d%02d%02d %02d%02d%02d', $dt->format('Y'), $dt->format('m'), $dt->format('d'), $dt->format('H'), $dt->format('i'), $dt->format('s') ); // local date
				
				//iCalUtilityFunctions::transformDateTime( $d, $tz, "UTC", "Ymd\THis\Z");
				//$valarm->setProperty( "trigger", $d ); // UTC
				$valarm->setProperty( "trigger"
				, $alarm_trigger
				, array( "related" => $alarm_when ));
			}
			
			$v->setConfig( "directory", "uploads/export_ical" ); 
			$filename=date( "YmdHis" ).".ics";
			$v->setConfig( "filename",  $filename); 
			$v->saveCalendar();  
			return $filename;
		}

			public function addCalendarEntryHD() {

				if ($this->session->userdata('yeezyCRM')) {

					$ptmail = array();$ptfullname = array();
					$attendee_req = array();$attendee_opt = array();
					$alarm_action=null;$alarm_repeat=null;$alarm_when=null;$alarm_msg=null;$alarm_duration=null;$alarm_trigger=null;

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
						"Type" => $_POST['entry_type'],
						"Title" => $_POST["entry_name"],
						"Description" => $_POST["descr"],
						"Startdate" => $_POST["start_date"],
						"Enddate" => $_POST["end_date"],
						"Duration" => '0',
						"Status" => 'prospecting',
						"Location" => $_POST["location"],
						"Priority" => $_POST["priority"],
						"CreatedBy" => $data['id'],
						"CreatedDate" => $date,
						"HasGroup" => 0,
						"HasClient" => 0,
						"HasParentId" => ($_POST['entry_type']=="Task" ? $_POST['taskloc-pid'] : 0 ),
						"Workspaces" => $data['org_id'],
						"Guests" => isset($_POST['select_guests']) ? implode(",", $_POST['select_guests']) : NULL
						);

					$data['new_taskid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);

					$id=$data['new_taskid'];

					//file_put_contents("temp/new_taskidcal.txt", $id);

				//$data['EmailUsers'] = $this ->Calendarmodel-> getEmailUsers();
					// $data['menuName'] = "Calendar";
					// $data['subMenuName'] = '';

					// $data['page'] = "admindash";

					// $assign_new = isset($_POST['assign_new']) ? $_POST['assign_new'] : false;
					
					if(isset($_POST['sel_alarm_action'])){
						foreach ($_POST['sel_alarm_action'] as $selectedOption) {

							$values = json_decode($selectedOption, true);

							//file_put_contents("errorvvv.txt", $values);

							$ex_vals=explode(",", $values["type"]);

							if(isset($values["repeat"])){
								$ex_repeat=explode(",", $values["repeat"]);
								$alarm_repeat=$ex_repeat[0];

								if($ex_repeat[2]=="minutes") $alarm_duration="PT".$ex_repeat[1]."M";
								if($ex_repeat[2]=="hours") $alarm_duration="PT".$ex_repeat[1]."H";
								if($ex_repeat[2]=="days") $alarm_duration="PT".$ex_repeat[1]."D";
							}

							$alarm_msg=isset($values["option"]) ? $values["option"] : '';
							$alarm_action=$ex_vals[0];

							if($ex_vals[3]=='before'){
								if($ex_vals[2]=='minutes') $alarm_trigger="-P".$ex_vals[1]."M";
								if($ex_vals[2]=='hours') $alarm_trigger="-P".$ex_vals[1]."H";
								if($ex_vals[2]=='days') $alarm_trigger="-P".$ex_vals[1]."D";

							}else{
								if($ex_vals[2]=='minutes') $alarm_trigger="+P".$ex_vals[1]."M";
								if($ex_vals[2]=='hours') $alarm_trigger="+P".$ex_vals[1]."H";
								if($ex_vals[2]=='days') $alarm_trigger="+P".$ex_vals[1]."D";

							}

							if($ex_vals[4]=='startof'){
								$alarm_when="START";
							}else{
								$alarm_when="END";
							}

							$dataarray_alarm = array(
								'post_id' => $data['new_taskid'],
								'type' => isset($values["type"]) ? $values["type"] : null,
								'repeat' => isset($values["repeat"]) ? $values["repeat"] : null,
								'options' => isset($values["option"]) ? $values["option"] : null,
								);

							$this->Calendarmodel->insertData("calendar_alarm", $dataarray_alarm);
						}
					}

					// $arrdow=array(); 
					// if(isset($_POST['chk_week_sun'])) array_push($arrdow,6);
					// if(isset($_POST['chk_week_mon'])) array_push($arrdow,0);
					// if(isset($_POST['chk_week_tue'])) array_push($arrdow,1);
					// if(isset($_POST['chk_week_wed'])) array_push($arrdow,2);
					// if(isset($_POST['chk_week_thu'])) array_push($arrdow,3);
					// if(isset($_POST['chk_week_fri'])) array_push($arrdow,4);
					// if(isset($_POST['chk_week_sat'])) array_push($arrdow,5);
					
					if($_POST['sel_recur_pattern']=="weeks"){
						$every_data=$_POST['input_recur_every_week'];
						//$pos_data=join(",",$arrdow);
					}
					if($_POST['sel_recur_pattern']=="days") $every_data=$_POST['input_recur_every_day'];
					if($_POST['sel_recur_pattern']=="years") $every_data=$_POST['input_recur_every_year'];

					if($_POST['sel_recur_pattern']=="months"){
						$every_data=$_POST['input_recur_every_month'];
						//$pos_data=$_POST['input_recur_every_month_day'];
					}

					if($_POST['recur_fuf']=="recur_noend"){
						$until_data='9999-12-31';
						$type_data='recur_until';
					}
					if($_POST['recur_fuf']=="recur_until"){
					
						$until_data=isset($_POST['recur_endbydate']) ? $_POST['recur_endbydate'] : '9999-12-31';
						$type_data='recur_until';
					}
					if($_POST['recur_fuf']=="recur_for"){
						$until_data=null;
						$type_data='recur_for';
					}

				// insert recur data
					$dataarray_recur = array(
						'post_id' => $data['new_taskid'],
						'recur_every' => isset($every_data) ? $every_data : 1,
						'recur_pattern' => isset($_POST['sel_recur_pattern']) ? $_POST['sel_recur_pattern'] : null,
						'recur_type' => isset($type_data) ? $type_data : null,
						'recur_occur' => isset($_POST['input_recur_occur']) ? $_POST['input_recur_occur'] : null,
						'recur_until' => $until_data,
						'recur_status' => isset($_POST['chk_recur_status']) ? 1 : 0,
						'recur_options' => isset($_POST['rrulename']) ? $_POST['rrulename'] : null
						);

					$this->Calendarmodel->insertData("calendar_recur", $dataarray_recur);

					// if(isset($_POST['sel_recur_exception'])){
					// 	foreach ($_POST['sel_recur_exception'] as $selectedOption) {
					// 		$dataarray_exception = array(
					// 			'post_id' => $data['new_taskid'],
					// 			'date' => $selectedOption,
					// 			);
					// 		$this->Calendarmodel->insertData("calendar_exception", $dataarray_exception);
					// 	}
					// }

				//date_default_timezone_set('Asia/Dhaka');
					$cal_subject= $_POST['entry_name'];
					$sdate =date( "Y-m-d H:i:s",strtotime($_POST['start_date']));
					$edate =date( "Y-m-d H:i:s",strtotime($_POST['end_date']));
					$creator_id = $sessionData['user_id'];

					// mail disable start
					$creator_mail = $sessionData['user_email'];
					$creator_fullname = $sessionData['username'];
					// mail disable end

					if($_POST['entry_type'] =='Task'){
						if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
						 foreach ($_POST['assignto'] as $key => $value) {
		                $inputdata1[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		                $inputdata1[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata1);
		          }
		          if (isset($_POST['member']) && $_POST['member'] != "" ) {
						  foreach ($_POST['member'] as $key => $value) {
		                $inputdata2[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		                $inputdata2[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata2);
		          }
		        
					}else{

						if(isset($_POST['select_user_new']) && $_POST['select_user_new'] != "" ){

							foreach ($_POST['select_user_new'] as $selectedOption) {

								$userinfo=$this->db->get_where("crm_users", array("ID"=>$selectedOption))->row();
								$usermail=$userinfo->email;
								$userfullname=$userinfo->full_name;

								//$usermail=mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$selectedOption'"), 0);
								//$userfullname=mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$selectedOption'"), 0);
								
								array_push($ptmail,$usermail);
								array_push($attendee_req,$selectedOption);
								array_push($ptfullname,$userfullname);

								$values = json_decode($selectedOption, true);

								$dataarray = array(
								
								'RelatedTo' => $data['new_taskid'],
								'userid' => $selectedOption,
								'Type' => $_POST['entry_type'],
								'UserStatus' => 2
								
								);
								$this->Calendarmodel->insertData("crm_tagHD", $dataarray);
							}
						}
					}


					if(isset($_POST['select_guests'])){
						foreach ($_POST['select_guests'] as $selectedmail) {
							array_push($attendee_opt,$selectedmail);
							array_push($ptmail,$selectedmail);
							array_push($ptfullname,"Guest");
							$dataarray = array(
								
								'RelatedTo' => $data['new_taskid'],
								'userid' => $selectedmail,
								'Type' => $_POST['entry_type'],
								'UserStatus' => 3
								
								);
								$this->Calendarmodel->insertData("crm_tagHD", $dataarray);
						}
					}

				// mail disabled start
				$icalfile=$this->previewIcal($_POST['entry_type'],$_POST['entry_name'],$_POST['descr'],$sdate,$edate,$_POST['location'],$creator_id,$attendee_req,$attendee_opt,$alarm_action,$alarm_repeat,$alarm_duration,$alarm_msg,$alarm_trigger,$alarm_when);
				
				$msgbody  = "<br>You have been invited to join a meeting.";
					$msgbody .= "<br><p><b>Meeting Name: </b>". $cal_subject."</p>";
					$msgbody .= "<p><b>Meeting Location: </b>". $_POST['location']."</p>";
					$msgbody .= "<p><b>Meeting Organizer: </b>". $creator_fullname." (".$creator_mail.")</p>";
					$msgbody .= "<p><b>Meeting Attendees: </b></p>";
					
					foreach ($ptfullname as $key2 => $value2) {
						$msgbody .="<p>".$ptfullname[$key2]." (".$ptmail[$key2].")</p>";
					}
					
					
					$msgbody .= "<br><b>Start Time: </b>". $sdate."";
					$msgbody .= "<p><b>End Time: </b>". $edate."</p>";
					
					$msgbody .= "<p><b>Description: </b>". $_POST['descr']."</p>";
					
					$msgbody .= "<br><b>See attachment for more details.</b>";

				foreach ($ptmail as $key => $selectedmail) {
					
					$mailstatus=$this->email_model->do_email($selectedmail,$ptfullname[$key],"New Calendar Entry: ".$cal_subject,$msgbody,"mahfuz_hossain@imaginebd.com",base_url("uploads/export_ical")."/".$icalfile);
					
				}
				// mail to creator

				$mailstatus2=$this->email_model->do_email($sessionData['user_email'], $sessionData['username'],"New Entry: ".$cal_subject,$msgbody,"mahfuz_hossain@imaginebd.com",base_url("uploads/export_ical")."/".$icalfile);
				

					//$this->calendarview();

				//}
				header('Content-Type: application/json');
				echo json_encode($data);
				} else {
					redirect('login', 'refresh');
				}
			}

			public function importCalendarEntry() {

				if ($this->session->userdata('yeezyCRM')) {

					$ptmail = array();$ptfullname = array();
					$alarm_action=null;$alarm_repeat=null;$alarm_when=null;$alarm_msg=null;$alarm_duration=null;$alarm_trigger=null;
					$creator_mail=null;

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
						"Type" => $_POST['entry_type'],
						"Title" => $_POST["entry_name"],
						"Description" => $_POST["descr"],
						"Startdate" => $_POST["start_date"],
						"Enddate" => $_POST["end_date"],
						"Duration" => '0',
						"Status" => 'prospecting',
						"Priority" => $_POST["priority"],
						"CreatedBy" => $data['id'],
						"CreatedDate" => $date,
						"HasGroup" => 0,
						"HasClient" => 0,
						"HasParentId" => 0,
						"Workspaces" => $data['org_id']
						);

					$data['new_taskid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);

					$id=$data['new_taskid'];

				//$data['EmailUsers'] = $this ->Calendarmodel-> getEmailUsers();
					// $data['menuName'] = "Calendar";
					// $data['subMenuName'] = '';

					// $data['page'] = "admindash";

					// $assign_new = isset($_POST['assign_new']) ? $_POST['assign_new'] : false;
					
					if(isset($_POST['sel_alarm_action'])){
						foreach ($_POST['sel_alarm_action'] as $selectedOption) {

							$values = json_decode($selectedOption, true);

							// $ex_vals=explode(",", $values["type"]);
							// $ex_repeat=explode(",", $values["repeat"]);
							// $alarm_repeat=$ex_repeat[0];

							// if($ex_repeat[2]=="minutes") $alarm_duration="PT".$ex_repeat[1]."M";
							// if($ex_repeat[2]=="hours") $alarm_duration="PT".$ex_repeat[1]."H";
							// if($ex_repeat[2]=="days") $alarm_duration="PT".$ex_repeat[1]."D";

							// $alarm_msg=$values["option"];
							// $alarm_action=$ex_vals[0];

							// if($ex_vals[3]=='before'){
							// 	if($ex_vals[2]=='minutes') $alarm_trigger="-P".$ex_vals[1]."M";
							// 	if($ex_vals[2]=='hours') $alarm_trigger="-P".$ex_vals[1]."H";
							// 	if($ex_vals[2]=='days') $alarm_trigger="-P".$ex_vals[1]."D";

							// }else{
							// 	if($ex_vals[2]=='minutes') $alarm_trigger="+P".$ex_vals[1]."M";
							// 	if($ex_vals[2]=='hours') $alarm_trigger="+P".$ex_vals[1]."H";
							// 	if($ex_vals[2]=='days') $alarm_trigger="+P".$ex_vals[1]."D";

							// }

							// if($ex_vals[4]=='startof'){
							// 	$alarm_when="START";
						
							// }else{
							// 	$alarm_when="END";
							
							// }

							$dataarray_alarm = array(
								'post_id' => $data['new_taskid'],
								'type' => isset($values["type"]) ? $values["type"] : null,
								'repeat' => isset($values["repeat"]) ? $values["repeat"] : null,
								'options' => isset($values["option"]) ? $values["option"] : null,
								);

							$this->Calendarmodel->insertData("calendar_alarm", $dataarray_alarm);
						}
					}

				// insert recur data
					$dataarray_recur = array(
						'post_id' => $data['new_taskid'],
						'recur_every' => isset($_POST['input_recur_every']) ? $_POST['input_recur_every'] : null,
						'recur_pattern' => isset($_POST['sel_recur_pattern']) ? $_POST['sel_recur_pattern'] : null,
						'recur_type' => isset($_POST['recur_fuf']) ? $_POST['recur_fuf'] : null,
						'recur_occur' => isset($_POST['input_recur_occur']) ? $_POST['input_recur_occur'] : null,
						'recur_until' => isset($_POST['datetimepicker_recur']) ? $_POST['datetimepicker_recur'] : null,
						//'recur_position' => 'ex'
						);

					$this->Calendarmodel->insertData("calendar_recur", $dataarray_recur);

					if(isset($_POST['sel_recur_exception'])){
						foreach ($_POST['sel_recur_exception'] as $selectedOption) {
							$dataarray_exception = array(
								'post_id' => $data['new_taskid'],
								'date' => $selectedOption,
								);
							$this->Calendarmodel->insertData("calendar_exception", $dataarray_exception);
						}
					}

				//date_default_timezone_set('Asia/Dhaka');
					$cal_subject= $_POST['entry_name'];
					$sdate =date( "Y-m-d H:i:s",strtotime($_POST['start_date']));
					$edate =date( "Y-m-d H:i:s",strtotime($_POST['end_date']));
					$creator_id = $sessionData['user_id'];

					// mail disable start
					//$creator_mail = mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$creator_id'"), 0);
					//$creator_fullname = mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$creator_id'"), 0);
					// mail disable end

					// if(isset($_POST['select_user_new'])){

					// 	foreach ($_POST['select_user_new'] as $selectedOption) {

					// 		//file_put_contents("filenameselect_user_new22.txt", $selectedOption);
					// 		//$usermail=mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$selectedOption'"), 0);
					// 		//$userfullname=mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$selectedOption'"), 0);

					// 		//array_push($ptmail,$usermail);
					// 		//array_push($ptfullname,$userfullname);

					// 		$values = json_decode($selectedOption, true);

					// 		$dataarray_alarm = array(
					// 			'post_id' => $data['new_taskid'],
					// 			'user_id' => $selectedOption,
					// 			);
					// 		$this->Calendarmodel->insertData("post_tag", $dataarray_alarm);
					// 	}
					// }

					if($_POST['entry_type'] =='Task'){
						if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
						 foreach ($_POST['assignto'] as $key => $value) {
		                $inputdata1[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		                $inputdata1[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata1);
		          }
		          if (isset($_POST['member']) && $_POST['member'] != "" ) {
						  foreach ($_POST['member'] as $key => $value) {
		                $inputdata2[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		                $inputdata2[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata2);
		          }
		        
					}else{

						if(isset($_POST['select_user_new']) && $_POST['select_user_new'] != "" ){

							foreach ($_POST['select_user_new'] as $selectedOption) {

								$usermail=mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$selectedOption'"), 0);
								$userfullname=mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$selectedOption'"), 0);

								array_push($attendee_req,$selectedOption);
								array_push($a,$userfullname);

								$values = json_decode($selectedOption, true);

								$dataarray = array(
								
								'RelatedTo' => $data['new_taskid'],
								'userid' => $selectedOption,
								'Type' => $_POST['entry_type'],
								'UserStatus' => 2
								
								);
								$this->Calendarmodel->insertData("crm_tagHD", $dataarray);
							}
						}
					}


					if(isset($_POST['select_guests'])){
						foreach ($_POST['select_guests'] as $selectedmail) {

							array_push($ptmail,$selectedmail);
							array_push($ptfullname,"Guest");
						}
					}
				// mail disabled start
				//$icalfile=$this->previewIcal($_POST['entry_type'],$_POST['entry_name'],$_POST['descr'],$sdate,$edate,$_POST['location'],$creator_mail,$ptmail,$alarm_action,$alarm_repeat,$alarm_duration,$alarm_msg,$alarm_trigger,$alarm_when);

				// foreach ($ptmail as $key => $selectedmail) {
					
				// 	$msgbody  = "<br>You have been invited to join a meeting.";
				// 	$msgbody .= "<br><p><b>Meeting Name: </b>". $cal_subject."</p>";
				// 	$msgbody .= "<p><b>Meeting Location: </b>". $_POST['location']."</p>";
				// 	$msgbody .= "<p><b>Meeting Organizer: </b>". $creator_fullname." (".$creator_mail.")</p>";
				// 	$msgbody .= "<p><b>Meeting Attendees: </b></p>";
					
				// 	foreach ($ptfullname as $key2 => $value2) {
				// 		$msgbody .="<p>".$ptfullname[$key2]." (".$ptmail[$key2].")</p>";
				// 	}
					
					
				// 	$msgbody .= "<br><b>Start Time: </b>". $sdate."";
				// 	$msgbody .= "<p><b>End Time: </b>". $edate."</p>";
					
				// 	$msgbody .= "<p><b>Description: </b>". $_POST['descr']."</p>";
					
				// 	$msgbody .= "<br><b>See attachment for more details.</b>";
					
				// 	$this->email_model->do_email($selectedmail,$ptfullname[$key],"New Calendar Entry: ".$cal_subject,$msgbody,"mahfuz_hossain@imaginebd.com","./export_ical/".$icalfile);
				// }
				// mail disabled end

					$this->calendarview();
				//}
				} else {
					redirect('login', 'refresh');
				}
			}

			public function updateCalendar() {
				if ($this->session->userdata('yeezyCRM')) {

					$ptmail = array();$ptfullname = array();
					$attendee_req = array();$attendee_opt = array();
					$alarm_action=null;$alarm_repeat=null;$alarm_when=null;$alarm_msg=null;$alarm_duration=null;$alarm_trigger=null;

					$sessionData = $this->session->userdata('yeezyCRM');

					$this->Calendarmodel->updateCalendarEntry($_POST['calendar_id'], $_POST['entry_name'], $_POST['location'], $_POST['start_date'], $_POST['end_date'], $_POST['descr'], $_POST['entry_type'], $_POST['priority'], $_POST['entry_color'], isset($_POST['select_user_new']) ? implode(",", $_POST['select_user_new']) : NULL, isset($_POST['select_guests']) ? implode(",", $_POST['select_guests']) : NULL,$_POST['taskloc-taskid'],$_POST['taskloc-pid'],$_POST['taskloc-tlid']);

					$this->db->where('post_id', $_POST['calendar_id']);
					$this->db->delete('calendar_alarm');

					$dels=$this->db->delete('crm_tagHD' , array('RelatedTo' => $_POST['calendar_id']));
					// $dels=$this->db->delete('crm_taskfollower' , array('relateTask' => $_POST['calendar_id']));
					//file_put_contents("filenamedddddddd.txt", $dels);

					$this->db->where('post_id', $_POST['calendar_id']);
					$this->db->delete('calendar_recur');

					$this->db->where('post_id', $_POST['calendar_id']);
					$this->db->delete('calendar_exception');

					$data['new_taskid']=$_POST['calendar_id'];
					if($_POST['entry_type'] =='Task'){
						if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
						 foreach ($_POST['assignto'] as $key => $value) {
		                $inputdata1[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		                $inputdata1[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 1);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata1);
		          }
		          if (isset($_POST['member']) && $_POST['member'] != "" ) {
						  foreach ($_POST['member'] as $key => $value) {
		                $inputdata2[] = array('Type' => $_POST['entry_type'],'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		                $inputdata2[] = array('Type' => "Project",'RelatedTo' => $data['new_taskid'],'userid' => $value,'UserStatus' => 2);
		            }
		            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputdata2);
		          }
		        
					}else{

						if(isset($_POST['select_user_new']) && $_POST['select_user_new'] != "" ){

							foreach ($_POST['select_user_new'] as $selectedOption) {

								//$usermail=mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$selectedOption'"), 0);
								//$userfullname=mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$selectedOption'"), 0);

								array_push($attendee_req,$selectedOption);
								//array_push($ptfullname,$userfullname);

								$values = json_decode($selectedOption, true);

								$dataarray = array(
								
								'RelatedTo' => $data['new_taskid'],
								'userid' => $selectedOption,
								'Type' => $_POST['entry_type'],
								'UserStatus' => 2
								
								);
								$this->Calendarmodel->insertData("crm_tagHD", $dataarray);
							}
						}
					}

					if (isset($_POST['sel_alarm_action'])) {

						foreach ($_POST['sel_alarm_action'] as $selectedOption) {

							$values = json_decode($selectedOption, true);

							// $ex_vals=explode(",", $values["type"]);
							// $ex_repeat=explode(",", $values["repeat"]);
							// $alarm_repeat=$ex_repeat[0];

							// if($ex_repeat[2]=="minutes") $alarm_duration="PT".$ex_repeat[1]."M";
							// if($ex_repeat[2]=="hours") $alarm_duration="PT".$ex_repeat[1]."H";
							// if($ex_repeat[2]=="days") $alarm_duration="PT".$ex_repeat[1]."D";

							// $alarm_msg=$values["option"];
							// $alarm_action=$ex_vals[0];

							// if($ex_vals[3]=='before'){
							// 	if($ex_vals[2]=='minutes') $alarm_trigger="-P".$ex_vals[1]."M";
							// 	if($ex_vals[2]=='hours') $alarm_trigger="-P".$ex_vals[1]."H";
							// 	if($ex_vals[2]=='days') $alarm_trigger="-P".$ex_vals[1]."D";

							// }else{
							// 	if($ex_vals[2]=='minutes') $alarm_trigger="+P".$ex_vals[1]."M";
							// 	if($ex_vals[2]=='hours') $alarm_trigger="+P".$ex_vals[1]."H";
							// 	if($ex_vals[2]=='days') $alarm_trigger="+P".$ex_vals[1]."D";

							// }

							// if($ex_vals[4]=='startof'){
							// 	$alarm_when="START";
					
							// }else{
							// 	$alarm_when="END";
							// }

							$dataarray_alarm = array(
								'post_id' => $_POST['calendar_id'],
								'type' => isset($values["type"]) ? $values["type"] : null,
								'repeat' => isset($values["repeat"]) ? $values["repeat"] : null,
								'options' => isset($values["option"]) ? $values["option"] : null,
								);

							$this->Calendarmodel->insertData("calendar_alarm", $dataarray_alarm);
						}
					}

				// insert recur data
					
					$dataarray_recur = array(
						'post_id' => $_POST['calendar_id'],
						'recur_every' => isset($_POST['input_recur_every']) ? $_POST['input_recur_every'] : null,
						'recur_pattern' => isset($_POST['sel_recur_pattern']) ? $_POST['sel_recur_pattern'] : null,
						'recur_type' => isset($_POST['recur_fuf']) ? $_POST['recur_fuf'] : null,
						'recur_occur' => isset($_POST['input_recur_occur']) ? $_POST['input_recur_occur'] : null,
						'recur_until' => isset($_POST['recur_endbydate']) ? $_POST['recur_endbydate'] : null,
						//'recur_position' => 'ex'
						);

					$this->Calendarmodel->insertData("calendar_recur", $dataarray_recur);

					if(isset($_POST['sel_recur_exception'])){
						foreach ($_POST['sel_recur_exception'] as $selectedOption) {
							$dataarray_exception = array(
								'post_id' => $_POST['calendar_id'],
								'date' => $selectedOption,
								);
							$this->Calendarmodel->insertData("calendar_exception", $dataarray_exception);
						}
					}

					$cal_subject= $_POST['entry_name'];
					$sdate =date( "Y-m-d H:i:s",strtotime($_POST['start_date']));

					$edate =date( "Y-m-d H:i:s",strtotime($_POST['end_date']));


					$creator_id = $sessionData['user_id'];

					//$creator_mail = mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$creator_id'"), 0);
					//$creator_fullname = mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$creator_id'"), 0);

					// if(isset($_POST['select_user_new'])){
					// 	foreach ($_POST['select_user_new'] as $selectedOption) {

					// 		$values = json_decode($selectedOption, true);

					// 		//$usermail=mysql_result(mysql_query("SELECT email FROM crm_users WHERE ID='$selectedOption'"), 0);
					// 		//$userfullname=mysql_result(mysql_query("SELECT full_name FROM crm_users WHERE ID='$selectedOption'"), 0);

					// 		//array_push($ptmail,$usermail);
					// 		//array_push($ptfullname,$userfullname);

					// 		$dataarray_alarm = array(
					// 			'post_id' => $_POST['calendar_id'],
					// 			'user_id' => $selectedOption,
					// 			);
					// 		$this->Calendarmodel->insertData("post_tag", $dataarray_alarm);
					// 	}
					// }

					// if(isset($_POST['select_guests'])){
					// 	foreach ($_POST['select_guests'] as $selectedmail) {

					// 		array_push($ptmail,$selectedmail);
					// 		array_push($ptfullname,"Guest");
					// 	}
					// }

					


					// if(isset($_POST['select_guests'])){
					// 	foreach ($_POST['select_guests'] as $selectedmail) {
					// 		array_push($attendee_opt,$selectedmail);
					// 		// array_push($ptmail,$selectedmail);
					// 		// array_push($ptfullname,"Guest");
					// 		$dataarray = array(
					// 		'relatedto' => $_POST["taskloc-pid"],
					// 		'relateTask' => $_POST['calendar_id'],
					// 		'userteamid' => $selectedmail,
					// 		'type' => 'guest',
					// 		'user_status' => 0,
					// 		'idtype' => 'userid'
					// 		);
					// 		$this->Calendarmodel->insertData("crm_tag", $dataarray);
					// 	}
					// }

					 //$icalfile=$this->previewIcal($_POST['entry_type'],$_POST['entry_name'],$_POST['descr'],$sdate,$edate,$_POST['location'],$creator_mail,$ptmail,$ptmail,$alarm_action,$alarm_repeat,$alarm_duration,$alarm_msg,$alarm_trigger,$alarm_when);

					// foreach ($ptmail as $key => $selectedmail) {

					// 	$msgbody  = "<br>Meeting information has been updated.";
					// 	$msgbody .= "<br><p><b>Meeting Name: </b>". $cal_subject."</p>";
					// 	$msgbody .= "<p><b>Meeting Location: </b>". $_POST['location']."</p>";
					// 	$msgbody .= "<p><b>Meeting Organizer: </b>". $creator_fullname." (".$creator_mail.")</p>";
					// 	$msgbody .= "<p><b>Meeting Attendees: </b></p>";

					// 	foreach ($ptfullname as $key2 => $value2) {
					// 		$msgbody .="<p>".$ptfullname[$key2]." (".$ptmail[$key2].")</p>";
					// 	}


					// 	$msgbody .= "<br><b>Start Time: </b>". $sdate."";
					// 	$msgbody .= "<p><b>End Time: </b>". $edate."</p>";

					// 	$msgbody .= "<p><b>Description: </b>". $_POST['descr']."</p>";

					// 	$msgbody .= "<br><b>See attachment for more details.</b>";

					// 	$this->email_model->do_email($selectedmail,$ptfullname[$key],"Updated Calendar Entry: ".$cal_subject,$msgbody,"mahfuz_hossain@imaginebd.com","./export_ical/".$icalfile);
					// }

					 $array['update']='ok';
					header('Content-Type: application/json');
				echo json_encode($array);
				} else {
					redirect('login', 'refresh');
				}
			}

			public function getproject(){
				$array = array();
				$projectArray = array();

				$sessionData = $this->session->userdata('yeezyCRM');

				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$array['sessionUId'] = $data['id'];

				$array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);


        //$array['tag'] = $this->Modulemodel->getAll("crm_tag", array('type'=>'task', 'relatedto'=>$id));

				header('Content-Type: application/json');
				echo json_encode($array);
			}

			 public function getTaskList(){
       
       $tagArray = array();
       $id = $_POST['projectid'];
       //$tagArray['docList'] = $this->Taskmodel->getAllDocList($id);
       $tagArray['taskList'] = $this->Modulemodel->getAll("crm_tasklist", array('related_to'=>$id));
       header('Content-Type: application/json');
       echo json_encode($tagArray);
        
    }

			public function getHolidayPopup() {
				if ($this->session->userdata('yeezyCRM')) {

					$sessionData = $this->session->userdata('yeezyCRM');

					$data['useremail'] = $sessionData['user_email'];
					$data['acessType'] = $sessionData['accessType'];
					$data['id'] = $sessionData['user_id'];
					$data['username'] = $sessionData['username'];
					$data['user_img'] = $sessionData['user_img'];

					$data['menuName'] = "Calendar";
					$data['subMenuName'] = '';

					$data['page'] = "admindash";



					$query = $this->db->get_where('calendar_popup', array('user_id' => $data['id'], 'name' => $_POST['name'],
						'startdate' => $_POST['startdate']));

					if ($query->num_rows() > 0) {
						echo "YES";
					} else {
						echo "NO";
					}
				//            $q = $this->db->query("SELECT * from calendar_popup  WHERE user_id = '" . $data['id'] . "' and name = '" . $_POST['name'] . "' startdate = '" . $_POST['startdate'] . "'");
				//            if ($q->num_rows()) {
				//                echo "YES";
				//            } else {
				//                echo "NO";
				//            }
				} else {
					redirect('login', 'refresh');
				}
			}

			public function getCalendarDataRange(){

				$sessionData = $this->session->userdata('yeezyCRM');

				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];

				$page_data['page_name']  = 'calendar';
				$page_data['page_title'] = 'Navcon :: Calendar';

				
				// event data
				$page_data['dataMyEvent'] = $this->Calendarmodel->selectMyCalendarRange( $page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Event','#DE8650');

				$page_data['dataOtherEvent'] = $this->Calendarmodel->selectOtherCalendarRange( $page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Event','#DE8650');

				// todo data
				$page_data['dataMyTodo'] = $this->Calendarmodel->selectMyCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Todo','#1B7E5A');

				$page_data['dataOtherTodo'] = $this->Calendarmodel->selectOtherCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Todo','#1B7E5A');

				// task data
				// $page_data['dataMyTask'] = $this->Calendarmodel->selectMyTaskRange( $page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'#2489C5');

				// $page_data['dataOtherTask'] = $this->Calendarmodel->selectOtherTaskRange( $page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'#2489C5');

				$page_data['dataMyTask'] = $this->Calendarmodel->selectMyCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Task','#2489C5');

				$page_data['dataOtherTask'] = $this->Calendarmodel->selectOtherCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Task','#2489C5');

				// project data 
				
				$page_data['dataMyProject'] = $this->Calendarmodel->selectMyCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Project','#6A5A8C');

				$page_data['dataOtherProject'] = $this->Calendarmodel->selectOtherCalendarRange($page_data['org_id'],$page_data['id'],$_POST['start_date'],$_POST['end_date'],'Project','#6A5A8C');

					// friday the 13th for the next 5 occurrences
				// $r = new When();
				// $r->startDate(new DateTime("19980213T090000"))
				//   ->freq("monthly")
				//   ->count(5)
				//   ->byday("fr")
				//   ->bymonthday(13)
				//   ->generateOccurrences();

				// $page_data['dataphprecur'] =($r->occurrences);

				header('Content-Type: application/json');
				echo json_encode($page_data);
				
			}

			public function saveGuestEmail(){

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

					$page_data['page_name']  = 'calendar';
					$page_data['page_title'] = 'Navcon :: Calendar';

					$data_json=array();

					$dataarray = array(
						'emailaddr' => $_POST['newemail'],
						'user_id' => $_POST['user_id'],
						);


					$data_json['new_guestid'] = $this->Common_model->insertData("crm_guest_emails", $dataarray);

					header('Content-Type: application/json');
					echo json_encode($data_json);
				}else{
					$this->load->view('login');
				}
			}

			public function addHolidayPopup() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['useremail'] = $sessionData['user_email'];
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['menuName'] = "Calendar";
				$data['subMenuName'] = '';
				
				$data['page'] = "admindash";
				
				
				$dataarray43 = array(
                'user_id' => $data['id'],
                'name' => $_POST['name'],
                'startdate' => $_POST['startdate'],
				);
				$this->Calendarmodel->insertData("calendar_popup", $dataarray43);
				} else {
				redirect('login', 'refresh');
			}
		}

		public function delHolidayPopup() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['useremail'] = $sessionData['user_email'];
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['menuName'] = "Calendar";
				$data['subMenuName'] = '';
				
				$data['page'] = "admindash";
				
				$this->db->where('user_id', $data['id']);
				$this->db->where('name', $_POST['name']);
				$this->db->where('startdate', $_POST['startdate']);
				$this->db->delete('calendar_popup');
				} else {
				redirect('login', 'refresh');
			}
		}

		public function delCalendarEntry() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				
				$this->db->where('post_id', $_POST['cal_id']);
				$this->db->delete('calendar_alarm');
				
				$this->db->where('post_id', $_POST['cal_id']);
				$this->db->delete('calendar_exception');
				
				$this->db->where('post_id', $_POST['cal_id']);
				$this->db->delete('calendar_recur');

				$this->db->where('relateTask', $_POST['cal_id']);
				$this->db->delete('crm_tag');

				// $this->db->where('post_id', $_POST['cal_id']);
				// $this->db->delete('post_details');

				// $this->db->where('ID', $_POST['cal_id']);
				// $this->db->delete('post');

				$this->db->where('projecttaskid', $_POST['cal_id']);
				$this->db->delete('crm_projecttask');
				
				} else {
				redirect('login', 'refresh');
			}
		}





		}	