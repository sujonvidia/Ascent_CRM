<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : ITL
 * 	04 Dec, 2016
 */
    
class Workspace extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('Email_model');
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Common_model');
        $this->load->model('calendarmodel');
        $this->load->model('Modulemodel'); // load Module model
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    public function indexpage(){
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $org_id = $_POST["org_id"];
        $json = array('status'=>false, 'msg'=>'No data found!!!');
        if(check_api_token($uid, $APITOKEN)){
            $profiles = $this->db->select("cpp.id, cpu.sl, cpu.user_id, cpp.profile_name")
                                ->from("crm_privileges_user as cpu")
                                ->join("crm_profile_privileges cpp", "cpu.profile_id = cpp.id")
                                ->where("cpp.org_id", $org_id)
                                ->get()->result();

            $thisOrgMembers = array();
            $otherOrgMembers = array();
            $thismember = array();
            $members = $this->db->select('cu.ID, cu.full_name, cu.img, cu.org_id, cu.email, cw.workspace, cw.ws_status')
                                ->from('crm_users as cu')
                                ->join('crm_workspace cw', 'cu.ID = cw.user_id')
                                ->where('cw.workspace',$org_id)
                                ->where('cu.ID <>', 216)
                                ->order_by('cu.full_name')
                                ->get()->result();
            foreach($members as $i=>$v) { 
                array_push($thismember, $v->ID); 
                $profiles_name = "Guest";
                $profiles_sl = "";
                foreach($profiles as $key => $value) {
                    if($v->ID == $value->user_id){
                        $profiles_name = $value->profile_name;
                        $profiles_sl = $value->sl;
                    }
                } 
                array_push($thisOrgMembers, array("ID"=> $v->ID, "profile_sl"=>$profiles_sl, "profile_name"=>$profiles_name, "full_name"=>$v->full_name, "email"=>$v->email, "org_id"=>$org_id, "ws_status"=>$v->ws_status));
            }

            $members2 = $this->db->select('*')
                    ->from('crm_users')
                    ->join('crm_workspace', 'crm_users.ID = crm_workspace.user_id')
                    ->where_not_in('crm_users.ID',$thismember)
                    ->group_by("crm_workspace.user_id")
                    ->get()
                    ->result();
            foreach($members2 as $i=>$v) { 
                array_push($otherOrgMembers, array("ID"=>$v->ID, "full_name"=>$v->full_name));
            }
            $json = array('status'=>true, 'msg'=>'Data send successfully. Need to process', 'thisOrgMembers'=>$thisOrgMembers, 'otherOrgMembers'=>$otherOrgMembers);

            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    function create_invite()
    {
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $org_id = $_POST["org_id"];
        $username = $_POST["username"];
        $json = array('status'=>false, 'msg'=>'Unauthorize access!!!');
        if(check_api_token($uid, $APITOKEN)){
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
                            "org_id"=>$org_id,
                            "access_type"=>"GUEST",
                            "status"=>"ACTIVE");
                        $this->db->update("crm_users", $crm_users_data, array("ID"=>$uid));
                        $this->db->delete("crm_workspace", array("user_id"=>$uid));
                        $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$org_id));
                        $profile_id = $this->db->get_where("crm_profile_privileges", array("org_id"=>$org_id, "profile_name"=>"Member"))->result();
                        $this->db->insert("crm_privileges_user", array("user_id"=>$uid, "profile_id"=>$profile_id[0]->id));
                        $json = array('status'=>true, 'msg'=>'New user created successfully...<br>Please set privileges.');
                    } else {
                        $json = array('status'=>false, 'msg'=>validation_errors());
                    }
                }
                else{
                    $crm_users_data = array(
                        "user_name"=>$_POST["to"],
                        "user_password"=>md5($_POST["pass"]),
                        "full_name"=>$_POST["name"],
                        "display_name"=>$_POST["name"],
                        "org_id"=>$org_id,
                        "email"=>$_POST["to"],
                        "access_type"=>"GUEST",
                        "status"=>"ACTIVE");
                    $this->db->insert("crm_users", $crm_users_data);
                    $uid = $this->db->insert_id();
                    $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$org_id));
                    $this->db->insert("crm_notification_setup", array("user_id"=>$uid));
                    $json = array('status'=>true, 'msg'=>"New user created successfully...<br>Please set privileges.");
                }
                $json = array('status'=>true, 'msg'=>"New user created successfully...<br>Please set privileges.");
            }else{
                $msg = $_POST['body']."<br><br><br>Message come from ".$username;
                $this->Email_model->do_email($_POST['to'], $_POST['name'], "Invitation from Navigate Design", $msg,"mahfuzur_rahman@imaginebd.com");
                $json = array('status'=>true, 'msg'=>"Your invitation send successfully...");
            }
            echo json_encode($json);
        }
        else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }
    
}
