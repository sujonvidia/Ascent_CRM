<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author : ITL
 *  06 Dec, 2016
 */

class Workspace extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
        $this->load->helper('directory');
		$this->load->database();
        $this->load->library('session');
         
		$this->load->model('Common_model');
        $this->load->model('Calendarmodel');
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
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
        
        $page_data['page_name']  = 'workspace';
        $page_data['page_title'] = 'Navcon :: Workspace';
        
        /* delete all temporary invitation from workspace table */
        $this->db->query("DELETE FROM crm_workspace WHERE (abs(user_id) = 0 AND abs(user_id) = '0') AND `last_update` <= NOW() - INTERVAL 3 DAY");

        $this->load->view('workspace/index', $page_data);
    }

    /*** Ajax function ***/
    /*** Input: user id, Output: all the workspace, he/she have access ***/
    function getWorkspace()
    {
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $response = array();
        $response = $this->db->get_where("crm_workspace", array("user_id"=>$_POST['user_id']))->result();
        echo json_encode($response);
    }

    
    function changeWorkSpace($wsname){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
            
        $id = $sessionData['user_id'];
        $sessionData['org_id'] = $wsname;
        $this->session->set_userdata('yeezyCRM',$sessionData); // set new session
        $this->db->update("crm_users", array("org_id"=>$wsname), array("ID"=>$id));
        redirect(base_url(), 'refresh');
    }

    function createWorkspace()
    {
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $ws = str_replace(" ", "_", $_POST["workspace"]);
        $rwsid = $this->db->query("SELECT id FROM `crm_workspace` WHERE `workspace`='".$sessionData["org_id"]."' AND `user_id`=`createdby`")->result();
        $this->db->insert("crm_workspace", array("user_id"=>$sessionData["user_id"], "workspace"=>$ws, "createdby"=>$sessionData["user_id"], "root_ws_id"=>$rwsid[0]->id));
        $insertid = $this->db->insert_id();
        $this->db->insert("crm_profile_privileges", array('profile_name'=>'Admin', 'description'=>'No access in Role, Backup and Restore', 'pro'=>'RWD', 'tod'=>'RWD', 'cal'=>'RWD', 'dct'=>'RWD', 'fil'=>'RWD', 'pct'=>'RWD', 'rep'=>'RWD', 'wor'=>'RWD', 'ptl'=>'RWD', 'org_id'=>$ws, 'createdby'=>$sessionData["user_id"]));
        $profile_privileges_insertid = $this->db->insert_id();
        $this->db->insert("crm_privileges_user", array("user_id"=>$sessionData["user_id"], "profile_id"=>$profile_privileges_insertid));
        $this->db->insert("crm_profile_privileges", array('profile_name'=>'Member', 'description'=>'Basic privileges', 'pro'=>'RWD', 'tod'=>'RWD', 'cal'=>'RWD', 'dct'=>'RWD', 'org_id'=>$ws, 'createdby'=>$sessionData["user_id"]));
        $this->db->insert("crm_roles", array("role_name"=>"Organization", "org_id"=>$ws, "createdby"=>$sessionData["user_id"]));
        echo json_encode($insertid);
    }

    function inviteto()
    {
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        $code = md5(time());
        $suc = false;
        $this->db->insert("crm_workspace", array("user_id"=>$code, "workspace"=>$sessionData["org_id"]));
        $insertid = $this->db->insert_id();
        if($insertid>0){
            $finfo = $this->db->get_where("crm_users", array("ID"=>$_POST["invite_id"]))->result();
            $msg = $sessionData["username"]." invited to you for joining the \"".$sessionData["org_id"]."\" workspace. Please click on the link bellow, to join this workspace.<br><br>";
            $msg .= "http://27.147.195.222:2241/nclive/workspace/confirm_joining/".$_POST["invite_id"]."/".$code;
            $suc = $this->Email_model->do_email($finfo[0]->email, $finfo[0]->full_name, "Workspace Invitation", $msg,"mahfuzur_rahman@imaginebd.com");
        }
        echo json_encode($suc);
    }

    function confirm_joining($id, $code)
    {
        $this->db->update("crm_workspace", array("user_id"=>$id), array("user_id"=>$code));
        echo "Thank you for joining.";
    }

    function removeid(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        $suc = $this->db->update("crm_workspace",array("ws_status"=>0), array("user_id"=>$_POST["remove_id"], "workspace"=>$sessionData["org_id"]));
        $ut = $this->db->get_where("crm_users", array("ID"=>$_POST["remove_id"]))->result();
        if($ut[0]->org_id == $sessionData["org_id"]){
            $sws = $this->db->get_where("crm_workspace", array("user_id"=>$_POST["remove_id"], "ws_status"=>1))->result();
            if(count($sws)>0){
                $this->db->update("crm_users", array("org_id"=>$sws[0]->workspace), array("ID"=>$_POST["remove_id"]));
            }else{
                $this->db->update("crm_users", array("status"=>"INACTIVE"), array("ID"=>$_POST["remove_id"]));
            }
        }
        echo json_encode($suc);
    }

    function activeid(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        $suc = $this->db->update("crm_workspace",array("ws_status"=>1), array("user_id"=>$_POST["remove_id"], "workspace"=>$sessionData["org_id"]));
        $ut = $this->db->get_where("crm_users", array("ID"=>$_POST["remove_id"]))->result();
        if($ut[0]->org_id == $sessionData["org_id"]){
            $this->db->update("crm_users", array("status"=>"ACTIVE"), array("ID"=>$_POST["remove_id"]));
        }
        echo json_encode($_POST["remove_id"]);
    }

    function send_custom_msg()
    {
        $sessionData = $this->session->userdata('yeezyCRM');
        if($_POST['body'] == ""){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('to', 'Email', 'required|trim|is_unique[crm_users.user_name]');
            $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim');
            
            header('Content-type: application/json');
            if ($this->form_validation->run() == FALSE){
                $isGuest = $this->db->get_where("crm_users", array("user_name"=>$_POST["to"], "user_password"=>"notset"))->result();
                if(count($isGuest) == 1){
                    $uid = $isGuest[0]->ID;
                    $crm_users_data = array(
                        "user_password"=>md5($_POST["pass"]),
                        "full_name"=>$_POST["name"],
                        "display_name"=>$_POST["name"],
                        "org_id"=>$sessionData["org_id"],
                        "access_type"=>"GUEST",
                        "status"=>"ACTIVE");
                    $this->db->update("crm_users", $crm_users_data, array("ID"=>$uid));
                    $this->db->delete("crm_workspace", array("user_id"=>$uid));
                    $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$sessionData["org_id"]));
                    $profile_id = $this->db->get_where("crm_profile_privileges", array("org_id"=>$sessionData["org_id"], "profile_name"=>"Member"))->result();
                    $this->db->insert("crm_privileges_user", array("user_id"=>$uid, "profile_id"=>$profile_id[0]->id));
                    $suc["status"] = "New user created successfully...<br>Please set privileges.";
                } else {
                    $suc["status"] = validation_errors();
                }
            }
            else{
                $crm_users_data = array(
                    "user_name"=>$_POST["to"],
                    "user_password"=>md5($_POST["pass"]),
                    "full_name"=>$_POST["name"],
                    "display_name"=>$_POST["name"],
                    "org_id"=>$sessionData["org_id"],
                    "email"=>$_POST["to"],
                    "access_type"=>"GUEST",
                    "status"=>"ACTIVE");
                $this->db->insert("crm_users", $crm_users_data);
                $uid = $this->db->insert_id();
                $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$sessionData["org_id"]));
                $this->db->insert("crm_notification_setup", array("user_id"=>$uid));
                $suc["status"] = "New user created successfully...<br>Please set privileges.";
            }
            $suc["result"] = "cu";
        }else{
            $msg = $_POST['body']."<br><br><br>Message come from ".$sessionData["username"];
            $this->Email_model->do_email($_POST['to'], $_POST['name'], "Invitation from Navigate Design", $msg,"mahfuzur_rahman@imaginebd.com");
            $suc["result"] = "iu";
        }
        echo json_encode($suc);
    }

    function find_child_ws(){
        $data["cws"] = $this->db->query("SELECT `id`, `user_id`, `workspace` FROM `crm_workspace` WHERE root_ws_id = '".$_POST["rid"]."' AND `createdby` IN (SELECT `user_id` FROM `crm_workspace` WHERE `user_id` <> '".$_POST["id"]."' AND workspace = '".$_POST["ws"]."')")->result();
        $data["cwsu"] = $this->db->query("SELECT `u`.`ID`, `u`.`full_name` FROM `crm_workspace` as `w`, `crm_users` as `u` WHERE `w`.`workspace` = '".$_POST["ws"]."' AND `w`.`user_id` = `u`.`ID`")->result();
        echo json_encode($data);
    }

    /* Start User maintainence */

    /* 
    View File Name          : view->maintenence->roles
    Menu Link               : Maintenence->Users & Access Control->Roles
    */
    public function save_role()
    {
        if($this->session->userdata('yeezyCRM')){
            $this->load->helper('cookie');
            set_cookie("workspacetab", "s3", 3);

            $sessionData = $this->session->userdata('yeezyCRM');
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules('role_name', "Role Name", 'trim|required');
            if($this->form_validation->run() == FALSE){
                redirect("workspace");
            } else {
                $userlist = implode(",", $_POST["role_assign_to_users"]);
                $prolist = implode(",", $_POST["profile"]);
                $inputdata = array(
                    "role_name" => $_POST["role_name"],
                    "user_id" => $userlist,
                    "profile_id" => $prolist,
                    "org_id" => $data['org_id'],
                    "createdby" => $data['id']
                );

                if($_POST["posttype"] == "n"){
                    $inputdata["reports_to"] = $_POST["reports_to"];
                    $this->db->insert("crm_roles", $inputdata);
                }
                elseif($_POST["posttype"] == "e")
                    $this->db->update("crm_roles", $inputdata, array("id" => $_POST['reports_to']));
            }
            redirect("workspace");
        }else{
          redirect('login', 'refresh');
        }
    
    }


    /* 
    View File Name          : view->maintenence->roles
    Menu Link               : Maintenence->Users & Access Control->Roles
    */
    public function delete_role($roleid)
    {
        if($this->session->userdata('yeezyCRM')){
            $this->db->delete("crm_roles", array("id" => $roleid));
        }else{
          redirect('login', 'refresh');
        }
    }


    public function new_group_post(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $inputdata["groupname"] = $_POST["groupname"];
        $inputdata["description"] = $_POST["description"];
        if(isset($_POST["selectRole"]))
            $inputdata["member_roles"] = implode(",", $_POST["selectRole"]);
        if(isset($_POST["selectUser"]))
            $inputdata["member_users"] = implode(",", $_POST["selectUser"]);
        $inputdata["org_id"] = $sessionData['org_id'];
        $inputdata["createdby"] = $sessionData['user_id'];

        if(isset($_POST["groupid"]) AND $_POST["groupid"] != ""){
            $this->db->update("crm_groups", $inputdata, array("groupid"=>$_POST["groupid"]));
        }else{
            $this->db->insert("crm_groups", $inputdata);
        }
        $this->load->helper('cookie');
        set_cookie("workspacetab", "s5", 5);
        redirect("workspace");
    }

    public function new_profile_post(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $inputdata["profile_name"] = $_POST["profilename"];
        $inputdata["description"] = $_POST["pdescription"];
        $inputdata["org_id"] = $sessionData['org_id'];
        $inputdata["createdby"] = $sessionData['user_id'];

        if(isset($_POST["profileid"]) AND $_POST["profileid"] != ""){
            $id = $_POST["profileid"];
            $this->db->update("crm_profile_privileges", $inputdata, array("id"=>$_POST["profileid"]));
        }else{
            $this->db->insert("crm_profile_privileges", $inputdata);
            $id = $this->db->insert_id();
        }
        $privileges = $this->db->get_where("crm_profile_privileges", array("org_id"=>$inputdata["org_id"]))->result();
        if($id != 0)
            $json = array("status"=>true, "new_pri_id"=>$id, "privileges"=>$privileges);
        else
            $json = array("status"=>false);

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function save_profile_access(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        
        $inputdata["view_all"] = (isset($_POST["viewall"]) AND $_POST["viewall"] == "on")?"all":"";
        $inputdata["edit_all"] = (isset($_POST["editall"]) AND $_POST["editall"] == "on")?"all":"";
        $inputdata["delete_all"] = (isset($_POST["deleteall"]) AND $_POST["deleteall"] == "on")?"all":"";

        $inputdata["pro"] = ((isset($_POST["proR"]) AND $_POST["proR"] == "R")?"R":"").((isset($_POST["proW"]) AND $_POST["proW"] == "W")?"W":"").((isset($_POST["proD"]) AND $_POST["proD"] == "D")?"D":"");
        $inputdata["tod"] = ((isset($_POST["todR"]) AND $_POST["todR"] == "R")?"R":"").((isset($_POST["todW"]) AND $_POST["todW"] == "W")?"W":"").((isset($_POST["todD"]) AND $_POST["todD"] == "D")?"D":"");
        $inputdata["cal"] = ((isset($_POST["calR"]) AND $_POST["calR"] == "R")?"R":"").((isset($_POST["calW"]) AND $_POST["calW"] == "W")?"W":"").((isset($_POST["calD"]) AND $_POST["calD"] == "D")?"D":"");
        $inputdata["fil"] = ((isset($_POST["filR"]) AND $_POST["filR"] == "R")?"R":"").((isset($_POST["filW"]) AND $_POST["filW"] == "W")?"W":"").((isset($_POST["filD"]) AND $_POST["filD"] == "D")?"D":"");
        $inputdata["rep"] = ((isset($_POST["repR"]) AND $_POST["repR"] == "R")?"R":"").((isset($_POST["repW"]) AND $_POST["repW"] == "W")?"W":"").((isset($_POST["repD"]) AND $_POST["repD"] == "D")?"D":"");
        $inputdata["wor"] = ((isset($_POST["worR"]) AND $_POST["worR"] == "R")?"R":"").((isset($_POST["worW"]) AND $_POST["worW"] == "W")?"W":"").((isset($_POST["worD"]) AND $_POST["worD"] == "D")?"D":"");
        $inputdata["rol"] = ((isset($_POST["rolR"]) AND $_POST["rolR"] == "R")?"R":"").((isset($_POST["rolW"]) AND $_POST["rolW"] == "W")?"W":"").((isset($_POST["rolD"]) AND $_POST["rolD"] == "D")?"D":"");
        $inputdata["ptl"] = ((isset($_POST["ptlR"]) AND $_POST["ptlR"] == "R")?"R":"").((isset($_POST["ptlW"]) AND $_POST["ptlW"] == "W")?"W":"").((isset($_POST["ptlD"]) AND $_POST["ptlD"] == "D")?"D":"");
        $inputdata["bar"] = ((isset($_POST["barR"]) AND $_POST["barR"] == "R")?"R":"").((isset($_POST["barW"]) AND $_POST["barW"] == "W")?"W":"").((isset($_POST["barD"]) AND $_POST["barD"] == "D")?"D":"");
        $inputdata["dct"] = ((isset($_POST["dctR"]) AND $_POST["dctR"] == "R")?"R":"").((isset($_POST["dctW"]) AND $_POST["dctW"] == "W")?"W":"").((isset($_POST["dctD"]) AND $_POST["dctD"] == "D")?"D":"");
        $inputdata["pct"] = ((isset($_POST["pctR"]) AND $_POST["pctR"] == "R")?"R":"").((isset($_POST["pctW"]) AND $_POST["pctW"] == "W")?"W":"").((isset($_POST["pctD"]) AND $_POST["pctD"] == "D")?"D":"");
        
        $this->db->update("crm_profile_privileges", $inputdata, array("id"=>$_POST["gpprofileid"]));

        if(isset($_POST["uid"]) AND $_POST["uid"] != "" AND isset($_POST["old_profileid"]) AND $_POST["old_profileid"] != ""){
            $this->db->update("crm_privileges_user", array("user_id"=>$_POST["uid"], "profile_id"=>$_POST["gpprofileid"]), array("sl"=>$_POST["old_profileid"]));
        }
        // $this->load->helper('cookie');
        // set_cookie("workspacetab", "s4", 5);
        redirect("workspace");
    }

    public function new_privileges_post(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $inputdata["profile_name"] = $_POST["profilename"];
        $inputdata["description"] = "";
        $inputdata["org_id"] = $sessionData['org_id'];
        $inputdata["createdby"] = $sessionData['user_id'];

        $inputdata["view_all"] = (isset($_POST["viewall"]) AND $_POST["viewall"] == "on")?"all":"";
        $inputdata["edit_all"] = (isset($_POST["editall"]) AND $_POST["editall"] == "on")?"all":"";
        $inputdata["delete_all"] = (isset($_POST["deleteall"]) AND $_POST["deleteall"] == "on")?"all":"";

        $inputdata["pro"] = ((isset($_POST["proR"]) AND $_POST["proR"] == "R")?"R":"").((isset($_POST["proW"]) AND $_POST["proW"] == "W")?"W":"").((isset($_POST["proD"]) AND $_POST["proD"] == "D")?"D":"");
        $inputdata["tod"] = ((isset($_POST["todR"]) AND $_POST["todR"] == "R")?"R":"").((isset($_POST["todW"]) AND $_POST["todW"] == "W")?"W":"").((isset($_POST["todD"]) AND $_POST["todD"] == "D")?"D":"");
        $inputdata["cal"] = ((isset($_POST["calR"]) AND $_POST["calR"] == "R")?"R":"").((isset($_POST["calW"]) AND $_POST["calW"] == "W")?"W":"").((isset($_POST["calD"]) AND $_POST["calD"] == "D")?"D":"");
        $inputdata["fil"] = ((isset($_POST["filR"]) AND $_POST["filR"] == "R")?"R":"").((isset($_POST["filW"]) AND $_POST["filW"] == "W")?"W":"").((isset($_POST["filD"]) AND $_POST["filD"] == "D")?"D":"");
        $inputdata["rep"] = ((isset($_POST["repR"]) AND $_POST["repR"] == "R")?"R":"").((isset($_POST["repW"]) AND $_POST["repW"] == "W")?"W":"").((isset($_POST["repD"]) AND $_POST["repD"] == "D")?"D":"");
        $inputdata["wor"] = ((isset($_POST["worR"]) AND $_POST["worR"] == "R")?"R":"").((isset($_POST["worW"]) AND $_POST["worW"] == "W")?"W":"").((isset($_POST["worD"]) AND $_POST["worD"] == "D")?"D":"");
        $inputdata["rol"] = ((isset($_POST["rolR"]) AND $_POST["rolR"] == "R")?"R":"").((isset($_POST["rolW"]) AND $_POST["rolW"] == "W")?"W":"").((isset($_POST["rolD"]) AND $_POST["rolD"] == "D")?"D":"");
        $inputdata["ptl"] = ((isset($_POST["ptlR"]) AND $_POST["ptlR"] == "R")?"R":"").((isset($_POST["ptlW"]) AND $_POST["ptlW"] == "W")?"W":"").((isset($_POST["ptlD"]) AND $_POST["ptlD"] == "D")?"D":"");
        $inputdata["bar"] = ((isset($_POST["barR"]) AND $_POST["barR"] == "R")?"R":"").((isset($_POST["barW"]) AND $_POST["barW"] == "W")?"W":"").((isset($_POST["barD"]) AND $_POST["barD"] == "D")?"D":"");
        $inputdata["dct"] = ((isset($_POST["dctR"]) AND $_POST["dctR"] == "R")?"R":"").((isset($_POST["dctW"]) AND $_POST["dctW"] == "W")?"W":"").((isset($_POST["dctD"]) AND $_POST["dctD"] == "D")?"D":"");
        $inputdata["pct"] = ((isset($_POST["pctR"]) AND $_POST["pctR"] == "R")?"R":"").((isset($_POST["pctW"]) AND $_POST["pctW"] == "W")?"W":"").((isset($_POST["pctD"]) AND $_POST["pctD"] == "D")?"D":"");
        
        
        $this->db->insert("crm_profile_privileges", $inputdata);
        redirect("workspace");
    }

    public function search_assign_access(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        $data = $this->db->select("user_id")->get_where("crm_privileges_user", array("profile_id"=> $_POST["privileges"]))->result();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function assign_profile_access(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $data = array();
        foreach($_POST["access_assign_to_users"] as $value){
            array_push($data, array("user_id"=> $value, "profile_id"=> $_POST["privilegeId"]));
        }
        $this->db->delete("crm_privileges_user", array("profile_id"=> $_POST["privilegeId"]));
        $this->db->insert_batch("crm_privileges_user", $data);
        $this->load->helper('cookie');
        set_cookie("workspacetab", "s4", 5);
        redirect("workspace");
    }

    public function change_profile_access($pri_id, $uid, $pri_sl=0){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        if($pri_sl > 0)
            $this->db->update("crm_privileges_user", array("profile_id"=>$pri_id), array("sl"=>$pri_sl));
        else
            $this->db->insert("crm_privileges_user", array("user_id"=>$uid, "profile_id"=>$pri_id));
        
        redirect("workspace");
    }

    public function cancelapa(){
        $this->load->helper('cookie');
        set_cookie("workspacetab", "s4", 5);
        redirect("workspace");
    }


    public function add_remove_group_member($type, $gid, $uid){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        if($type == 'a'){
            $this->db->where('groupid',$gid)
                     ->set('member_users', 'CONCAT(member_users,\',\',\''.$uid.'\')', FALSE)
                     ->update('crm_groups');
        }elseif($type == 'r'){
            $this->db->where('groupid',$gid)
                     ->set('member_users', 'REPLACE(member_users,'.$uid.', \'\')', FALSE)
                     ->update('crm_groups');

            $this->db->where('groupid',$gid)
                     ->set('member_users', 'REPLACE(member_users, \',,\', \',\')', FALSE)
                     ->update('crm_groups');
        }
        redirect("workspace");
    }


    public function add_group(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $inputdata["groupname"] = $_POST["groupname"];
        $inputdata["description"] = $_POST["description"];
        $inputdata["member_users"] = $_POST["uid"];
        $inputdata["org_id"] = $sessionData['org_id'];
        $inputdata["createdby"] = $sessionData['user_id'];

        $this->db->insert("crm_groups", $inputdata);
        $data["id"] = $this->db->insert_id();
        $data["crmgroups"] = $this->db->get_where("crm_groups", array("org_id"=>$inputdata["org_id"]))->result();
        echo json_encode($data);
    }

    public function update_group(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        
        $inputdata["pro"] = ((isset($_POST["proR"]) AND $_POST["proR"] == "R")?"R":"").((isset($_POST["proW"]) AND $_POST["proW"] == "W")?"W":"").((isset($_POST["proD"]) AND $_POST["proD"] == "D")?"D":"");
        $inputdata["tod"] = ((isset($_POST["todR"]) AND $_POST["todR"] == "R")?"R":"").((isset($_POST["todW"]) AND $_POST["todW"] == "W")?"W":"").((isset($_POST["todD"]) AND $_POST["todD"] == "D")?"D":"");
        $inputdata["cal"] = ((isset($_POST["calR"]) AND $_POST["calR"] == "R")?"R":"").((isset($_POST["calW"]) AND $_POST["calW"] == "W")?"W":"").((isset($_POST["calD"]) AND $_POST["calD"] == "D")?"D":"");
        $inputdata["fil"] = ((isset($_POST["filR"]) AND $_POST["filR"] == "R")?"R":"").((isset($_POST["filW"]) AND $_POST["filW"] == "W")?"W":"").((isset($_POST["filD"]) AND $_POST["filD"] == "D")?"D":"");
        $inputdata["rep"] = ((isset($_POST["repR"]) AND $_POST["repR"] == "R")?"R":"").((isset($_POST["repW"]) AND $_POST["repW"] == "W")?"W":"").((isset($_POST["repD"]) AND $_POST["repD"] == "D")?"D":"");
        $inputdata["dct"] = ((isset($_POST["dctR"]) AND $_POST["dctR"] == "R")?"R":"").((isset($_POST["dctW"]) AND $_POST["dctW"] == "W")?"W":"").((isset($_POST["dctD"]) AND $_POST["dctD"] == "D")?"D":"");
        $inputdata["pct"] = ((isset($_POST["pctR"]) AND $_POST["pctR"] == "R")?"R":"").((isset($_POST["pctW"]) AND $_POST["pctW"] == "W")?"W":"").((isset($_POST["pctD"]) AND $_POST["pctD"] == "D")?"D":"");
        
        $this->db->update("crm_groups", $inputdata, array("groupid"=>$_POST["gpprofileid"]));

        redirect("workspace");
    }

    public function rpg_delete($type, $id){
        // $this->load->helper('cookie');
        switch ($type) {
            case 'p':
                $this->db->delete("crm_profile_privileges", array("id"=>$id));
                $this->db->delete("crm_privileges_user", array("profile_id"=>$id));
                // set_cookie("workspacetab", "s4", 5);
                break;
            case 'g':
                $this->db->delete("crm_groups", array("groupid"=>$id));
                // set_cookie("workspacetab", "s5", 5);
                break;

        }
        redirect("workspace");
    }

    public function deleteme($id){
        $this->db->update("crm_workspace", array("workspace"=>"Guest"), array("user_id"=>$id));
        redirect("workspace");
    }

    // @sujon
    public function add_holiday_ws(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        $inputdata["Title"] = $_POST["entryname_ws"];
        $inputdata["Location"] = $_POST["location_ws"];
        $inputdata["Startdate"] = $_POST["startdatehol_ws"];
        $inputdata["Enddate"] = $_POST['enddatehol_ws'];
        $inputdata["Description"] = $_POST['descr_ws'];
        $inputdata["CreatedBy"] = $sessionData['user_id'];
        $inputdata["CreatedDate"] = date('Y-m-d H:i:s');
        $inputdata["Type"] = "Workspace";
        $inputdata["HasUserId"] = 0;
        $inputdata["Workspaces"] = $sessionData['org_id'];

        $this->db->insert("crm_holiday", $inputdata);

        $data["Id"] = $this->db->insert_id();
        $data["DBdata"] = $this->db->get_where("crm_holiday", array("Id"=>$data["Id"]))->row();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function add_holiday_ps(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        $inputdata["Title"] = $_POST["entryname_ps"];
        $inputdata["Location"] = $_POST["location_ps"];
        $inputdata["Startdate"] = $_POST["startdatehol_ps"];
        $inputdata["Enddate"] = $_POST['enddatehol_ps'];
        $inputdata["Description"] = $_POST['descr_ps'];
        $inputdata["CreatedBy"] = $sessionData['user_id'];
        $inputdata["CreatedDate"] = date('Y-m-d H:i:s');
        $inputdata["Type"] = "Person";
        $inputdata["HasUserId"] = $_POST['usersetid'];
        $inputdata["Workspaces"] = $sessionData['org_id'];

        $this->db->insert("crm_holiday", $inputdata);

        $data["Id"] = $this->db->insert_id();
        $data["DBdata"] = $this->db->get_where("crm_holiday", array("Id"=>$data["Id"]))->row();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function add_person_set(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

       $sessionData = $this->session->userdata('yeezyCRM');
       $data["Id"]=null;

       $inputdata["Weekends"] = $_POST["arrwkends"];
       $inputdata["Weekdays"] = $_POST["arrwkdays"];
       $inputdata["HoursPerDay"] = $_POST["hour_perday_ps"];
       $inputdata["HourlyRate"] = $_POST["hourlyrate_ps"];
       $inputdata["HolidayCalendar"] = $_POST['selectCountry_ps'];
       $inputdata["DeleteOptions"] = "";
       $inputdata["HasUserId"] = $_POST['usersetid'];
       $inputdata["Workspaces"] = $sessionData['org_id'];
       $inputdata["CreatedBy"] = $sessionData['user_id'];
       $inputdata["CreatedDate"] = date('Y-m-d H:i:s');
       $inputdata["Type"] = "Person";

       if($this->db->get_where("crm_settings", array("HasUserId"=>$_POST['usersetid'],"Type"=>"Person"))->num_rows() == 0){

            $this->db->insert("crm_settings", $inputdata);

            $data["Id"] = $this->db->insert_id();
        }else{
            $data["Id"] = $this->db->update("crm_settings", $inputdata, array("HasUserId"=>$_POST['usersetid'],"Type"=>"Person"));
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function add_workspace_set(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

       $sessionData = $this->session->userdata('yeezyCRM');
       $data["Id"]=null;

       $inputdata["Weekends"] = $_POST["arrwkends"];
       $inputdata["Weekdays"] = $_POST["arrwkdays"];
       $inputdata["HoursPerDay"] = $_POST["hour_perday"];

       $inputdata["HolidayCalendar"] = $_POST['selectCountry_ws'];
       $inputdata["DeleteOptions"] = "";
       $inputdata["HasUserId"] = 0;
       $inputdata["Workspaces"] = $sessionData['org_id'];
       $inputdata["CreatedBy"] = $sessionData['user_id'];
       $inputdata["CreatedDate"] = date('Y-m-d H:i:s');
       $inputdata["Type"] = "Workspace";

       if($this->db->get_where("crm_settings", array("Workspaces"=>$sessionData['org_id'],"Type"=>"Workspace"))->num_rows() == 0){

        $this->db->insert("crm_settings", $inputdata);

        $data["Id"] = $this->db->insert_id();
    }else{
        $data["Id"] = $this->db->update("crm_settings", $inputdata, array("Workspaces"=>$sessionData['org_id'],"Type"=>"Workspace"));
    }
    header('Content-type: application/json');
    echo json_encode($data);
}

    public function get_settings_holiday(){

        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

       $sessionData = $this->session->userdata('yeezyCRM');
       $data["DBdata"]=null;

       if($_POST['viewtype']=='Person'){

           if($this->db->get_where("crm_settings", array("HasUserId"=>$_POST['usersetid'],"Type"=>"Person"))->num_rows() > 0){

                $data["DBdata"] = $this->db->get_where("crm_settings", array("HasUserId"=>$_POST['usersetid'],"Type"=>"Person"))->row();
            }
            //$data["DBHoliday"] = $this->db->get_where("crm_holiday", array("Type"=>"Person Holiday"))->result();

            


        }else{

            if($this->db->get_where("crm_settings", array("Workspaces"=>$sessionData['org_id'],"Type"=>"Workspace"))->num_rows() > 0){

                $data["DBdata"] = $this->db->get_where("crm_settings", array("Workspaces"=>$sessionData['org_id'],"Type"=>"Workspace"))->row();
            }

            //$data["DBHoliday"] = $this->db->get_where("crm_holiday", array("Type"=>"Workspace Holiday"))->result();
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function getHolidayCal(){

        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');

       $sessionData = $this->session->userdata('yeezyCRM');
       $data["DBdata"]=null;

       if($_POST['viewtype']=='Workspace'){

            $data["DBHoliday"] = $this->db->get_where("crm_holiday", array("Type"=>"Workspace Holiday"))->result();
            $data["DBManual"] = $this->db->get_where("crm_holiday", array("Type"=>"Workspace"))->result();
        
        }else{

            $data["DBHoliday"] = $this->db->get_where("crm_holiday", array("Type"=>"Person Holiday","HasUserId" =>$_POST['usersetid']))->result();

            $data["DBManual"] = $this->db->get_where("crm_holiday", array("Type"=>"Person","HasUserId" =>$_POST['usersetid']))->result();
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function getHolidaysManuCal(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');

        if($_POST['viewtype']=='Workspace'){
            $data = $this->Calendarmodel->selectHolidayCalWS( $sessionData['org_id'],$sessionData['user_id'],$_POST['start_date'],$_POST['end_date'],$_POST['viewtype'],'#DE8650');
        }else{
             $data = $this->Calendarmodel->selectHolidayCalPS( $sessionData['org_id'],$sessionData['user_id'],$_POST['start_date'],$_POST['end_date'],$_POST['viewtype'],'#DE8650',$_POST['usersetid']);
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function updateHolidayCal(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url(), 'refresh');
        
        $sessionData = $this->session->userdata('yeezyCRM');
        $data=null;

        $inputdata["Title"] = $_POST["uid"];
        $inputdata["HolidayCalendar"] = $_POST["selcountry"];
        $inputdata["Startdate"] = $_POST["startdate"];
        
        $inputdata["CreatedBy"] = $sessionData['user_id'];
        $inputdata["CreatedDate"] = date('Y-m-d H:i:s');
        $inputdata["Type"] = $_POST["viewtype"];
        $inputdata["HasUserId"] = 0;
        
        if($_POST['viewtype']=='Person Holiday'){
            $inputdata["HasUserId"]=$_POST['usersetid'];
        }
        
        $inputdata["Workspaces"] = $sessionData['org_id'];

        if($_POST['action']=='ifUnchecked'){

           if($this->db->get_where("crm_holiday", array("Title"=>$_POST["uid"],"Type"=>$_POST["viewtype"]))->num_rows() == 0){

               $data=$this->db->insert("crm_holiday", $inputdata);
           }
        
        }elseif($_POST['action']=='ifChecked'){

            if($this->db->get_where("crm_holiday", array("Title"=>$_POST["uid"],"Type"=>$_POST["viewtype"]))->num_rows() > 0){

               $this->db->delete("crm_holiday", array("Title"=>$_POST["uid"],"Type"=>$_POST["viewtype"]) );
           }

        }   
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
