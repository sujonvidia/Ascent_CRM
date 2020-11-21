  <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  04 Dec, 2016 
 */

class Guest_users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Common_model');
        $this->load->model('calendarmodel');
        $this->load->model("Crud_model");
        $this->load->model('Modulemodel'); // load Module model
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    public function shareWithOther(){
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            
            //Is this activity type shared or not
            $this->isShared($this->input->post('activity_id'));

            $sub = $_POST["inviteTitle"];
            $name = $_POST["inviteFullName"];
            $salutation = explode(" ", $_POST["emailsendtoname"]);
            foreach($_POST["inviteEmail"] as $k=>$to){
                $already_user = $this->db->get_where("crm_users", array("email"=>$to))->result();
                if(count($already_user)==0){
                    // New guest user
                    $crm_users_data = array(
                        "user_name"=>$to,
                        "user_password"=>'notset',
                        "full_name"=>$name[$k],
                        "display_name"=>$name[$k],
                        "org_id"=>$sessionData["org_id"],
                        "email"=>$to,
                        "access_type"=>"GUEST",
                        "status"=>"ACTIVE");
                    $this->db->insert("crm_users", $crm_users_data);
                    $uid = $this->db->insert_id();

                    $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$sessionData["org_id"]));
                    $this->db->insert("crm_notification_setup", array("user_id"=>$uid));
                    
                }
                else{
                    $uid = $already_user[0]->ID;
                    $name[$k] = $already_user[0]->full_name;
                }

                $this->isActivityShare($this->input->post('activity_id'), $uid);

                $link_str = strrev(base64_encode($uid."/".$sessionData['org_id']."/".$name[$k]."/".$to."/".$_POST["activity_id"]."/".$_POST["activity_type"]));
            
                $tagType = "";
                /* Create share link */
                switch($_POST["activity_type"]){
                    case 'Sub Task': case 'Task':
                        $link = base_url()."guest_users/share_projects/".$link_str;
                        $tagType = "Porject";
                        break;
                    case 'Todo':
                        $link = base_url()."guest_users/share_todo/".$link_str;
                        $tagType = "Todo";
                        break;
                }
                
                $replace = '<a href="'.$link.'" target="_blank" class="Inviteetitle">'.htmlspecialchars($_POST["linkTitle"]).'</a>';

                $msg_body = str_replace(htmlspecialchars($_POST["linkTitle"]), $replace, $_POST["emailbody"]);
                
                
                /* Find parent id */
                switch ($_POST["activity_type"]) {
                    case 'Sub Task':
                        $task_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$_POST["activity_id"]))->result();
                        $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$task_id[0]->HasParentId))->result();
                        $page_data["share_subtask_id"] = $_POST["activity_id"];
                        $page_data["share_task_id"] = $task_id[0]->HasParentId;
                        $page_data["share_project_id"] = $project_id[0]->HasParentId;
                        $pid = $page_data["share_project_id"];
                        break;
                    case 'Task':
                        $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$_POST["activity_id"]))->result();
                        $page_data["share_subtask_id"] = 0;
                        $page_data["share_task_id"] = $_POST["activity_id"];
                        $page_data["share_project_id"] = $project_id[0]->HasParentId;
                        $pid = $page_data["share_project_id"];
                        break;
                    case 'Todo':
                        $pid = $_POST["activity_id"];
                        break;
                }

                
                $hasTag = $this->db->get_where("crm_tagHD", array("RelatedTo"=>$pid, "userid"=>$uid))->result();
                if(count($hasTag) == 0){
                    $this->db->insert("crm_tagHD", array("RelatedTo"=>$pid, "UserStatus"=>5, "Type"=>$tagType, "userid"=>$uid, "assignBy"=>$sessionData["user_id"]));
                }

                if($this->Email_model->do_email($to, $name[$k], $sub, $msg_body,'', false, "Hello"))
                    $data["result"][] = true;
            }
            if(count($data["result"]) == count($_POST["inviteEmail"]))
                echo json_encode($data);
            else
                echo json_encode(false);
        }
    }

    function isShared($activityID){
        
        $projectname = 'isShared';
        $sharedValue = $this->db
                            ->get_where('crm_activity', array('Id' => $activityID))
                            ->row()->$projectname;
        if($sharedValue == 0){
            $this->Modulemodel->updateOneData('crm_activity', array("isShared" => '1') , array('Id'=>$activityID ));
        }

    }

    function isActivityShare($aid, $uid){
        $yes = $this->db->get_where("crm_activityShare", array("activityID"=>$aid, "user_id"=>$uid))->result();
        if(count($yes) < 1){
            $this->db->insert("crm_activityShare", array("activityID"=>$aid, "user_id"=>$uid));
        }
    }

    public function share_projects($base_encode) {
            // 226/itl/Mahfuzur Rahman2/mahfuzak08@gmail.com/5614/Task
            $raw_url = explode("/", base64_decode(strrev($base_encode)));
            $page_data['id'] = $raw_url[0];
            $page_data['org_id'] = $raw_url[1];
            $page_data['username'] = $raw_url[2];
            $page_data['user_email'] = $raw_url[3];
            $page_data['shared_activity_id'] = $raw_url[4];
            $page_data['type'] = $raw_url[5];
            switch ($raw_url[5]) {
                case 'Sub Task':
                    $task_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$raw_url[4]))->result();
                    $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$task_id[0]->HasParentId))->result();
                    $page_data["share_subtask_id"] = $raw_url[4];
                    $page_data["share_task_id"] = $task_id[0]->HasParentId;
                    $page_data["share_project_id"] = $project_id[0]->HasParentId;
                    break;
                case 'Task':
                    $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$raw_url[4]))->result();
                    $page_data["share_subtask_id"] = 0;
                    $page_data["share_task_id"] = $raw_url[4];
                    $page_data["share_project_id"] = $project_id[0]->HasParentId;
                    break;
            }
            $findImg = $this->db->select("img")->get_where("crm_users", array("ID"=>$page_data['id']))->result();
            $newdata = array(
                'username'  => $page_data['username'],
                'org_id' => $page_data['org_id'],
                'user_email' => $page_data['user_email'],
                'user_img' => $findImg[0]->img,
                'user_id' => $page_data['id']
            );
            $this->session->sess_destroy();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('yeezyCRM',$newdata);

            $page_data['user_img'] = $findImg[0]->img;

            $page_data['page_name'] = 'projects';
            $page_data['page_title'] = 'Navcon :: Projects';

            $page_data['DashboardEvents'] = $this->calendarmodel->getDashboardCalendar($page_data['id'], $page_data['org_id'], 'Event');
            $page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group", array('org_id' => $page_data['org_id']));
            $page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");


            $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus", array('picklist_valueid' => '0'));
            $page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
            $page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
            $page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
            //$page_data['users'] = $this->Modulemodel->getAllUsersWithoutMe($page_data['id']);
            $page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'], $page_data['org_id']);
            $page_data['alluser'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'], $page_data['org_id']);
            $page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();



            $page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'], $page_data['id']);
            
            $this->load->view('share_projects', $page_data);
    }

    public function get_share_projects($uid, $pid) {
        $array = array();
        $projectArray = array();
        $array['tasklist'] = array();
        $array['projectIDlist'] = array();
        $array['TotalTask'] = array();
        $array['PendingTask'] = array();
        $array['unsennsommnet'] = array();
        $array['unsennFile'] = array();
        $array["id"] = $uid;
        $array['projects'] = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp WHERE cp.Id ='".$pid."'")->result();

        foreach ($array['projects'] as $key => $value) {
            $TaskResult = $this->Modulemodel->getAllMyTaskLatestThree($array["id"], $value->Id);
            $TotalTask = $this->Modulemodel->getAllMyTaskLatest($array["id"], $value->Id);
            $PendingTask = $this->Modulemodel->getAllMyTaskLatestPending($array["id"], $value->Id);
            $unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id, $array["id"], 'Project');
            $unsennFile = $this->Modulemodel->getUnseenComment($value->Id, $array["id"], 'File');

            array_push($array['tasklist'], $TaskResult);
            array_push($array['projectIDlist'], $value->Id);
            array_push($array['TotalTask'], $TotalTask);
            array_push($array['PendingTask'], $PendingTask);
            array_push($array['unsennsommnet'], $unsennsommnet);
            array_push($array['unsennFile'], $unsennFile);
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function getSharedUserList(){
        $aid = $_POST["aid"];
        $data["status"] = false;
        $data["all_activity_share_list"] = $this->db->select("cas.*, cu.full_name, cu.email, cu.img")
                                            ->from("crm_activityShare as cas")
                                            ->join("crm_users as cu","cu.ID = cas.user_id")
                                            ->where("cas.activityID", $aid)
                                            ->get()
                                            ->result();
        if(count($data["all_activity_share_list"])){
            $data["status"] = true;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function findNsetShareList(){
        $data["old_share_list"] = $this->db->get_where("activity_share_user", array("activityID"=>$_POST["aid"]))->result();
        header('Content-Type: application/json');
        echo json_encode($data);   
    }





    /******************************************* Share Todo *******************************************/


    public function share_todo($base_encode, $autoid='') {
            $raw_url = explode("/", base64_decode(strrev($base_encode)));
            $page_data['id'] = $raw_url[0];
            $page_data['org_id'] = $raw_url[1];
            $page_data['username'] = $raw_url[2];
            $page_data['user_email'] = $raw_url[3];
            $page_data['shared_activity_id'] = $raw_url[4];
            $page_data['type'] = $raw_url[5];
            $findImg = $this->db->select("img")->get_where("crm_users", array("ID"=>$page_data['id']))->result();
            $page_data['user_img'] = $findImg[0]->img;

            $newdata = array(
                'username'  => $page_data['username'],
                'org_id' => $page_data['org_id'],
                'user_email' => $page_data['user_email'],
                'user_img' => $page_data['user_img'],
                'user_id' => $page_data['id']
            );
            $this->session->sess_destroy();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('yeezyCRM',$newdata);            

            $page_data['page_name']  = 'todo';
            $page_data['page_title'] = 'Navcon :: Todo';
            $page_data['autoid'] = $autoid;

            $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus",array('picklist_valueid'=>'0'));
            $page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
            $page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
            $page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
            $page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'],$page_data['id']);
            $page_data['allcategory'] = $this->Modulemodel->getAll("crm_category", array('workspace' => $page_data['org_id']));
            $page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group",array('org_id'=>$page_data['org_id']));
            $page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");

            $page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'],$page_data['org_id']);
            $page_data['allusers'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);

            $this->load->view('todoview', $page_data);

    }

}
