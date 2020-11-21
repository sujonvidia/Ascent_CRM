<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : ITL
 * 	04 Dec, 2016
 */
    
class Feed extends CI_Controller {

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

    public function getNotificationStatusAll(){
        $array = array();
        $APIarray = array();
        $projectArray = array();
        $userName = "";
        
        
        $limit = $this->input->post('limitStart');
        $APITOKEN = $this->input->post('APITOKEN');
        $data['id'] = $this->input->post('user_id');
        $data['org_id'] = $this->input->post('org_id');

        $logHistory["id"] = $data['id'] ;
        $logHistory["org_id"] = $data['org_id'] ;
        
        if(check_api_token($data['id'], $APITOKEN)){
            
            $array['getAllTypeList'] = array();
            $array['getAllProjectUnTag'] = array();
            $array['getAllProjectTag'] = array();
            $array['getAllTaskTag'] = array();
            $array['getAllTaskUnTag'] = array();
            $array['getAllTodoTag'] = array();
            $array['getAllTodoUnTag'] = array();
            $array['getAllTypeTask'] = array();
            $array['notifCommnet'] = array();
            $array['notifFile'] = array();
            $array['commentList'] = array();
            $APIarray['Fullarray'] = array();
            
            $array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);
            $APIarray['alluser'] = $this->Modulemodel->getAllUsersAll();
            $APIarray['allActivity'] = $this->Modulemodel->getAllActivityListForAPI();

            foreach ($array['projects'] as $key => $value) {
                
                $getAllTypeList = $this->Modulemodel-> allNotifList(1,$value->Id,'Project',$data['id']);
                $commentList1 = $this->Modulemodel->allNotifList(1,$value->Id,'ProjectCmnt',$data['id']);
                
                array_push($array['getAllTypeList'],$getAllTypeList);
                array_push($array['commentList'],$commentList1);

                $array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'],$data['id'],$value->Id,'DESC');
                foreach ($array['allTask'] as $k => $v) {
                    $getAllTypeTask = $this->Modulemodel-> allNotifList(1,$v->Id,'Task',$data['id']);
                    $commentList2 = $this->Modulemodel->allNotifList(1,$v->Id,'TaskCmnt',$data['id']);
                    //$commentList3 = $this->Modulemodel->allNotifList(1,$v->Id,'Todo');
                    array_push($array['getAllTypeTask'],$getAllTypeTask);
                    array_push($array['commentList'],$commentList2);
                    //array_push($array['commentList'],$commentList3);
                }
            }
            
            $array['getAllProjectUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'ProjectTagRemove','org_id'=>$data['org_id'],'notification_for'=>'1'));
            $array['getAllProjectTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'ProjectTagAss','org_id'=>$data['org_id'],'notification_for'=>'1'));
            $array['getAllTaskTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TaskTagAss','org_id'=>$data['org_id'],'notification_for'=>'1'));
            $array['getAllTaskUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TaskTagRemove','org_id'=>$data['org_id'],'notification_for'=>'1'));
            $array['getAllTodoTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TodoTagAss','org_id'=>$data['org_id'],'notification_for'=>'1'));
            $array['getAllTodoUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TodoTagRemove','org_id'=>$data['org_id'],'notification_for'=>'1'));
            // $array['getAllChatMsg'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'chatMsg','org_id'=>$data['org_id'], 'notification_for'=>'1'));
            $array['getAllChatMsg'] = $this->db->where('type', 'chatMsg')
                                   ->where('org_id', $data['org_id'])
                                   ->where('notification_for', '1')
                                   ->where('user_id', $data['id'])
                                   ->or_where("user_id >", 1400000000)
                                   ->get("crm_notification")
                                   ->result();
            // file_put_contents("temp/filename2841.txt", $allChatMsg);
            $array['getAllNotListLastday'] = $this->Modulemodel-> getAllNotListAll(1,$data['id']);
            $array['getAlltodo'] = $this->Modulemodel-> getAlltodo($data['org_id'],$data['id']);
            foreach ($array['getAlltodo'] as $key => $value) {
                $commentList3 = $this->Modulemodel->allNotifList(1,$value->Id,'Todo',$data['id']);
                array_push($array['commentList'],$commentList3);
            }
            
            foreach ($array['getAllChatMsg'] as $key => $value) {
                
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                array_push($APIarray['Fullarray'],array(
                    "type"  => 'chatMsg',
                    "typeid"  => $value->type_id,
                    "TypeName"  => '',
                    "TypeTitle"  => '',
                    "recever_id" => $value->user_id,
                    "who"  => $userName,
                    "title"  => $value->title,
                    "detail"  => $value->body,
                    "date"  => $value->not_fire_time,
                    "ID"  => $value->ID,
                    "replay_msg" => $value->replay_msg
                ));
            }

            foreach ($array['commentList'] as $key => $value) {
                if(COUNT($value) > 0){
                    foreach ($value as $key => $comnValue) {
                        foreach ( $APIarray['alluser'] as $k => $name) {
                            if($name->ID === $comnValue->createdby){
                                $userName = $name->full_name;

                            }
                        }

                        foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                            if($Activityname->Id === $comnValue->type_id){
                                $activityTitle = $Activityname->Title;
                                $activityType = $Activityname->Type;
                            }
                        }
                        
                        array_push($APIarray['Fullarray'],array(
                            "type" => 'comment',
                            "typeCat" => $comnValue->type,
                            "typeid" => $comnValue->type_id,
                            "TypeName"  => $activityType,
                            "TypeTitle"  => $activityTitle,
                            "relatedTo" => $comnValue->relatedTo,
                            "replay_msg" => $comnValue->replay_msg,
                            "who" => $userName,
                            "title" => $comnValue->title,
                            "detail" => $comnValue->body,
                            "date" => $comnValue->not_fire_time
                        ));
                    }


                }
                
            }

            foreach ($array['getAllProjectUnTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'UnTag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }

            foreach ($array['getAllProjectTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'Tag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }

            foreach ($array['getAllTaskTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'Tag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }

            foreach ($array['getAllTaskUnTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'UnTag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }

            foreach ($array['getAllTodoTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'Tag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }
            foreach ($array['getAllTodoUnTag'] as $key => $value) {
                foreach ( $APIarray['alluser'] as $k => $name) {
                    if($name->ID === $value->createdby){
                        $userName = $name->full_name;

                    }
                }

                foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                    if($Activityname->Id === $value->type_id){
                        $activityTitle = $Activityname->Title;
                        $activityType = $Activityname->Type;
                    }
                }
                
                array_push($APIarray['Fullarray'],array(
                    "type" => 'notification',
                    "sp" => 'Tag',
                    "typeid" => $value->type_id,
                    "TypeName"  => $activityType,
                    "TypeTitle"  => $activityTitle,
                    "who" => $userName,
                    "detail" => $value->title ." : " .$value->body,
                    "date" => $value->not_fire_time
                ));
                
            }

            foreach ($array['getAllTypeList'] as $key => $value) {
                if(COUNT($value) > 0){
                    foreach ($value as $key => $comnValue) {
                        foreach ( $APIarray['alluser'] as $k => $name) {
                            if($name->ID === $comnValue->createdby){
                                $userName = $name->full_name;

                            }
                        }

                        foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                            if($Activityname->Id === $comnValue->type_id){
                                $activityTitle = $Activityname->Title;
                                $activityType = $Activityname->Type;
                            }
                        }

                        array_push($APIarray['Fullarray'],array(
                            "type" => 'notification',
                            "typeid" => $comnValue->type_id,
                            "TypeName"  => $activityType,
                            "TypeTitle"  => $activityTitle,
                            "relatedTo" => $comnValue->relatedTo,
                            "who" =>    $userName,
                            "detail" => $comnValue->title,
                            "date" => $comnValue->not_fire_time
                        ));
                    }
                }
                
            }
            foreach ($array['getAllTypeTask'] as $key => $value) {
                
                if(COUNT($value) > 0){
                    foreach ($value as $key => $comnValueT) {
                        
                        foreach ( $APIarray['alluser'] as $k => $name) {
                            if($name->ID === $comnValueT->user_id){
                                $userName = $name->full_name;

                            }
                        }

                        foreach ( $APIarray['allActivity'] as $k => $Activityname) {
                            if($Activityname->Id === $comnValueT->type_id){
                                $activityTitle = $Activityname->Title;
                                $activityType = $Activityname->Type;
                            }
                        }
                        array_push($APIarray['Fullarray'],array(
                            "type" => 'notification',
                            "typeid" => $comnValueT->type_id,
                            "TypeName"  => $activityType,
                            "TypeTitle"  => $activityTitle,
                            "relatedTo" => $comnValueT->relatedTo,
                            "who" =>    $userName,
                            "detail" => $comnValueT->title,
                            "date" => $comnValueT->not_fire_time
                        ));
                    }
                }
            }
        }else{
            $APIarray['status'] = 'false';
            $APIarray['message'] = 'Not authenticated';
            $APIarray['code'] = 401;
        }
        
        header('Content-Type: application/json');
        echo json_encode($APIarray);
    }

    public function insertCmnt(){
            
        $array = array();
        $arrayAPI = array();
        $TagArray = array();
        $ty ='';
        $sessionData = $this->session->userdata('yeezyCRM');
        
        $data['id'] = $this->input->post('user_id');
        $data['org_id'] = $this->input->post('org_id');
        $data['img'] = $this->input->post('user_img');
        $data['name'] = $this->input->post('fullname');
        $APITOKEN = $this->input->post('APITOKEN');
            
        if(check_api_token($data['id'], $APITOKEN)){
        
            $currrentDate = date('Y-m-d H:i:s');
            if($data['id'] != "" && $data['org_id'] != "" && $data['img'] != "" && $data['name'] != "" && $this->input->post('projectID') != "" && $this->input->post('type') != ""){
                $inputdata = array(
                    "comment" => $this->input->post('comment'),
                    "img" => $data['img'],
                    "name" => $data['name'],
                    "type" => $this->input->post('type'),
                    "typeID" => $this->input->post('projectID'),
                    "user" => $data['id'],
                    "date" => $currrentDate
                );

                $array["activityid"] = $this->Modulemodel->insertData("crm_modcomments", $inputdata);
            }else{
                $array["activityid"] = "-1";
            }
            
            
            if($array["activityid"] > 0){
                $arrayAPI["activityid"] = $array["activityid"];
                $arrayAPI["Status"] = "Success";
            }else{
                $arrayAPI["activityid"] = $array["activityid"];
                $arrayAPI["Status"] = "Failed";
            }

            
            $title = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$this->input->post('projectID')))->result();
            if($this->input->post('type') == 'ProjectCmnt'){
                $pid = $_POST['projectID'] + 99999999;
                $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='".$_POST['projectID']."'")->result();
                $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '".$_POST['projectID']."'")->result();
                $allmember = $member[0]->member.",".$createdby[0]->email;


                $result = $this->db->get_where("crm_message_group", array("group_id"=>$pid))->result();
                if(count($result)>0){
                    $this->db->update("crm_message_group", array("group_name"=>$title[0]->Title,"group_member"=>$allmember), array("group_id"=>$pid));
                }else{
                    $this->db->insert("crm_message_group", array("group_id"=>$pid, "group_name"=>$title[0]->Title,"group_member"=>$allmember, "pid"=>$_POST['projectID']));
                }
                $msg = base64_encode($_POST["comment"]);
                $data_array = array(
                    'sender_id' => $this->input->post('user_email'),
                    'receiver_id' => $pid,
                    'msg' => $msg,
                    'status' => $allmember,
                    'time' => date('Y-m-d H:i:s'));

                $this->db->insert("crm_message", $data_array);
                // end
            }else if($this->input->post('type') == 'TaskCmnt'){
                $ty  = 'Task';
                $parentID = $this->db->select("HasParentId,Title")->get_where("crm_activity", array("Id"=>$this->input->post('projectID')))->result();
                $Parenttitle = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$parentID[0]->HasParentId))->result();
                $inputnot = array(
                    'type' => $this->input->post('type'),
                    'type_id' => $this->input->post('projectID'),
                    'relatedTo' => $parentID[0]->HasParentId,
                    'org_id' => $data['org_id'],
                    'user_id' => $data['id'],
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'commented on '.$ty.' : '.$title[0]->Title,
                    'body' => $this->input->post('comment'),
                    'replay_msg' => $Parenttitle[0]->Title,
                    'createdby' => $data['id']
                );
                $this->Modulemodel->insertData("crm_notification", $inputnot);
            }else{
                $ty  = $this->input->post('type').'Cmnt';
                $inputnot = array(
                    'type' => $this->input->post('type'),
                    'type_id' => $this->input->post('projectID'),
                    'relatedTo' => $array["activityid"],
                    'org_id' => $data['org_id'],
                    'user_id' => $data['id'],
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'commented on '.$ty.' : '.$title[0]->Title,
                    'body' => $this->input->post('comment'),
                    'createdby' => $data['id']
                );
                $this->Modulemodel->insertData("crm_notification", $inputnot);
            }

            if($this->input->post('type') != 'Todo'){
                
                $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
                
                if(count($array['tag']) > 0){
                    
                    foreach ($array['tag'] as $key => $value) {
                        array_push($TagArray,$value->userid);           
                    }

                    array_push($TagArray,$this->Modulemodel->get_created_by_id('crm_activity',$this->input->post('projectID')));


                    foreach ($TagArray as $key => $value) {
                           
                       if($value == $data['id']){
                            //do nothing
                       }else{
                            $temp_tbl[] = array(
                                'parent' => $this->input->post('projectID'),
                                'parentType'=>$this->input->post('type'),
                                'typeid' => $array["activityid"],
                                'userid' => $value
                            );
                       }
                       
                    }
                    
                    $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
                }
            }

        }else{
            $arrayAPI['status'] = 'false';
            $arrayAPI['message'] = 'Not authenticated';
            $arrayAPI['code'] = 401;
        }

        header('Content-Type: application/json');
        echo json_encode($arrayAPI);
    }


    public function getCommentForProjects(){
            $array = array();
            $mid = $this->input->post('email');
            $data['id'] = $this->input->post('user_id');
            $data['org_id'] = $this->input->post('org_id');
            $APITOKEN = $this->input->post('APITOKEN');

            if(check_api_token($data['id'], $APITOKEN)){
                $fid = $_POST["projectID"] + 99999999;
                $array['allComm'] = $this->db->query("SELECT * FROM crm_message join crm_message_group on `crm_message`.`receiver_id` = `crm_message_group`.`group_id` join `crm_users` on `crm_message`.`sender_id` = `crm_users`.`email` where `crm_message`.`receiver_id` = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`) order by `crm_message`.`id`")->result();
            }else{
                $array['status'] = 'false';
                $array['message'] = 'Not authenticated';
                $array['code'] = 401;
            }
            header('Content-Type: application/json');
            echo json_encode($array);
        }

}
