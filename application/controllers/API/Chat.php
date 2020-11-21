<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : ITL
 * 	04 Dec, 2016
 */
    
class Chat extends CI_Controller {

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

    public function contactlists(){
        $data = array('status'=>false, 'msg'=>'Data load faild!!!');

        $my_id = $_POST["mid"];
        $my_email = $_POST["memail"];
        $org_id = $_POST["org_id"];
        $APITOKEN = $this->input->post('APITOKEN');

        if(check_api_token($my_id, $APITOKEN)){
            $where = "(FIND_IN_SET('$my_email', `group_member`) OR createdby = '$my_email') AND group_id>149000000";
            $this->db->where($where);
            $data["group_contacts"] = $this->db->get("crm_message_group")->result();

            // $data["contacts"] = $this->db->get_where("crm_users", array("org_id"=>$org_id, "ID !="=>$my_id))->result();

            $contacts = $this->db->get_where("crm_users", array("org_id"=>$org_id, "ID !="=>$my_id))->result();

            $this->db->order_by('timestamp', 'DESC');
            $result = $this->db->get("ci_sessions")->result();
            $curtime = time();
            $away = (time() - 600);
            $uidlist = array();

            $error_data = array($result, $away);
            if(count($result)>0){
                foreach ($result as $value) {
                    $full_session_data = explode("|", $value->data);
                    if(count($full_session_data)>2){
                        $yeezyCRM = unserialize($full_session_data[3]);
                        if($value->timestamp >= $away){
                            if(array_search($yeezyCRM['user_id'], $uidlist) === FALSE){
                                array_push($uidlist,$yeezyCRM['user_id']);
                            }
                        }
                    }
                }
            }

            $data["contacts"] = array();
            foreach($contacts as $rowv){
                $temp_con = array("ID" => $rowv->ID,
                    "user_name" => $rowv->user_name,
                    "full_name" => $rowv->full_name,
                    "display_name" => $rowv->display_name,
                    "org_id" => $rowv->org_id,
                    "designation" => $rowv->designation,
                    "phone_mobile" => $rowv->phone_mobile,
                    "email" => $rowv->email,
                    "img" => $rowv->img,
                    "has_online" => true
                    );
                if(array_search($rowv->ID, $uidlist) === FALSE){
                    // Offline
                    $temp_con["has_online"] = FALSE;
                }
                array_push($data["contacts"],$temp_con);
            }

            $data["project_chat_list"] = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON `cp`.`Id` = `ct`.`RelatedTo` WHERE (`cp`.`CreatedBy` ='$my_id' OR `ct`.`userid` = '$my_id' ) AND `Workspaces`='$org_id' AND `cp`.`type` = 'Project' GROUP BY `cp`.`Id` ORDER BY `cp`.`Id` DESC")->result(); 

            $data['status'] = true;
            $data['msg'] = 'Data load success...';
        }
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    /* Search old message */
    public function chatting_history(){
        $mid = $_POST["my_email"];
        $fid = $_POST["frnd_id"];
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        if(check_api_token($uid, $APITOKEN)){
            $s_email = $mid;
            $json = array('status'=>false, 'msg'=>'Data load faild!!!');
            if(filter_var($fid, FILTER_VALIDATE_EMAIL)){
                $where = "(`receiver_id` =  '$mid' AND  `sender_id` =  '$fid') OR (`sender_id` =  '$mid' AND `receiver_id` =  '$fid')";
                $this->db->where($where);
                $this->db->order_by('id');
                $result = $this->db->get("crm_message")->result();
            }
            elseif(is_numeric($fid)){
                $where = "crm_message.receiver_id = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`)";
                $this->db->from('crm_message');
                $this->db->join('crm_message_group', 'crm_message.receiver_id = crm_message_group.group_id');
                $this->db->where($where);
                $this->db->order_by('id');
                $result = $this->db->get()->result();
            }
            $i = 0;
            if(count($result)>0){
                $json["data"] = array();
                foreach($result as $row){
                    if($row->sender_id == $mid){
                        array_push($json["data"], array('msgid'=> $row->id, 'groupId'=> $fid, 'drawNew' => 'yes', 'type' => 'right', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msg_status'=> $row->status));
                    }
                    elseif($row->receiver_id == $mid){
                        array_push($json["data"], array('msgid'=> $row->id, 'groupId'=> $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'fimg'=>'', 'fname'=>'', 'msg_status'=> $row->status));
                    }
                    elseif($row->receiver_id == $fid AND !(filter_var($fid, FILTER_VALIDATE_EMAIL))){
                        $finfo = $this->db->get_where("crm_users", array("email"=>$row->sender_id))->result();
                        array_push($json["data"], array('msgid'=> $row->id, 'groupId'=> $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'fimg'=>$finfo[0]->img, 'fname'=>$finfo[0]->display_name, 'msg_status'=> $row->status));
                    }
                    
                    $i++;
                }
                if(filter_var($fid, FILTER_VALIDATE_EMAIL) AND $fid == $s_email){
                    $this->db->where($where);
                    $this->db->update("crm_message", array("status"=>0));
                }
                elseif(is_numeric($fid)){
                    $this->db->query("UPDATE crm_message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'");
                }
                $json['status'] = true;
                $json['msg'] = 'Data load success...';
            }

            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            $json = array('status'=>false, 'msg'=>'Data load faild!!!');
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }


    public function send_chat_msg(){
        $mid = $_POST['my_email'];
        $uid = $_POST["my_id"];
        $fid = $_POST['friend_email'];
        $fcrm_id = $_POST['friend_id'];
        $post_msg = $_POST['msg'];
        $org_id = $_POST["org_id"];
        $APITOKEN = $_POST["APITOKEN"];
        
        $json = array("status"=>false, "msg"=>"Message send error...");
        $json["data"] = array();
        if(check_api_token($uid, $APITOKEN)){
            $postMsg = "";
            $baseURL = base_url("asset/emotion");
            $emotionImgSymble = array(":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", ";)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\\", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)");
            $emotionImg = array("<img class='emo' src='$baseURL/smile.png' />", "<img class='emo' src='$baseURL/smile-big.png' />", "<img class='emo' src='$baseURL/sad.png' />", "<img class='emo' src='$baseURL/crying.png' />", "<img class='emo' src='$baseURL/tongue.png' />", "<img class='emo' src='$baseURL/shock.png' />", "<img class='emo' src='$baseURL/angry.png' />", "<img class='emo' src='$baseURL/confused.png' />", "<img class='emo' src='$baseURL/wink.png' />", "<img class='emo' src='$baseURL/embarrassed.png' />", "<img class='emo' src='$baseURL/disapointed.png' />", "<img class='emo' src='$baseURL/sick.png' />", "<img class='emo' src='$baseURL/shut-mouth.png' />", "<img class='emo' src='$baseURL/sleepy.png' />", "<img class='emo' src='$baseURL/eyeroll.png' />", "<img class='emo' src='$baseURL/thinking.png' />", "<img class='emo' src='$baseURL/lying.png' />", "<img class='emo' src='$baseURL/glasses-nerdy.png' />", "<img class='emo' src='$baseURL/teeth.png' />", "<img class='emo' src='$baseURL/angel.png' />", "<img class='emo' src='$baseURL/bye.png' />", "<img class='emo' src='$baseURL/clap.png' />", "<img class='emo' src='$baseURL/hug-left.png' />", "<img class='emo' src='$baseURL/hug-right.png' />", "<img class='emo' src='$baseURL/good.png' />", "<img class='emo' src='$baseURL/bad.png' />", "<img class='emo' src='$baseURL/highfive.png' />", "<img class='emo' src='$baseURL/love.png' />", "<img class='emo' src='$baseURL/love-over.png' />", "<img class='emo' src='$baseURL/tv.png' />", "<img class='emo' src='$baseURL/mail.png' />", "<img class='emo' src='$baseURL/rain.png' />", "<img class='emo' src='$baseURL/pizza.png' />", "<img class='emo' src='$baseURL/coffee.png' />", "<img class='emo' src='$baseURL/computer.png' />", "<img class='emo' src='$baseURL/beer.png' />", "<img class='emo' src='$baseURL/drink.png' />", "<img class='emo' src='$baseURL/cat.png' />", "<img class='emo' src='$baseURL/dog.png' />", "<img class='emo' src='$baseURL/sun.png' />", "<img class='emo' src='$baseURL/star.png' />", "<img class='emo' src='$baseURL/clock.png' />", "<img class='emo' src='$baseURL/present.png' />", "<img class='emo' src='$baseURL/mobile.png' />", "<img class='emo' src='$baseURL/musical-note.png' />", "<img class='emo' src='$baseURL/boy.png' />", "<img class='emo' src='$baseURL/girl.png' />", "<img class='emo' src='$baseURL/cake.png' />", "<img class='emo' src='$baseURL/car.png' />");
            $postMsg = str_replace($emotionImgSymble, $emotionImg, $post_msg);
            $postMsg = str_replace("\n", '<br>', $postMsg);

            $msg = base64_encode($postMsg);
            $data_array = array(
                'sender_id' => $mid,
                'receiver_id' => $fid,
                'msg' => $msg,
                'status' => '1',
                'time' => date('Y-m-d H:i:s'));
            
            if(! empty($msg)){ // if message empty, do nothing
                if(is_numeric($fid)){
                    $gm = $this->db->select("group_member")
                                ->where(array("group_id"=>$fid))
                                ->get("crm_message_group")
                                ->result();
                    $data_array["status"] = str_replace($mid, "", $gm[0]->group_member);
                }
                $this->db->insert("crm_message", $data_array);
                $msgid = $this->db->insert_id();
                $fcm_json = '';
                $fcm_response = '';

                $userdata = $this->db->get_where("crm_users", array("email"=>$mid))->result();
                if(! is_numeric($fid)){
                    $msgType = "Direct";
                    $needFirebase = $this->db->select("GCMID")->get_where("crm_users", array("email"=>$fid))->result();
                    if($needFirebase[0]->GCMID != ""){
                        $this->load->library('Firebase');
                        $this->load->library('Push');
                        $firebase = new Firebase();
                        $push = new Push();
                        $payload = array();
                        $payload['team'] = 'India';
                        $payload['score'] = '5.6';
                 
                        // notification title
                        $title = "Naviget Connect";
                         
                        // notification message
                        $message = array(
                                        "msg"=> "Message send successfully.",
                                        "data"=> array(
                                            "msgid"=> $msgid,
                                            "groupId"=> $mid,
                                            "drawNew"=> "no",
                                            "type"=> "left",
                                            "msg"=> base64_decode($msg),
                                            "time"=> $data_array['time'],
                                            "msgtype"=> "fa-star-o",
                                            "messageType"=>$msgType,
                                            "fimg"=>$userdata[0]->img,
                                            "fname"=>$userdata[0]->full_name
                                        )
                                    );
                         
                        // push type - single user / topic
                        $push_type = "individual";
                         
                        // whether to include to image or not
                        $include_image = FALSE;

                        $push->setTitle($title);
                        $push->setMessage($message);
                        if ($include_image) {
                            $push->setImage('http://api.androidhive.info/images/minion.jpg');
                        } else {
                            $push->setImage('');
                        }
                        $push->setIsBackground(FALSE);
                        $push->setPayload($payload);
                 
                        if ($push_type == 'topic') {
                            $fcm_json = $push->getPush();
                            $fcm_response = $firebase->sendToTopic('global', $fcm_json);
                        } else if ($push_type == 'individual') {
                            $fcm_json = $push->getPush();
                            $regId = $needFirebase[0]->GCMID;
                            $fcm_response = $firebase->send($regId, $fcm_json);
                        }
                    }
                }
                else{
                    if($fid < 1400000000)
                        $msgType = "Project";
                    else
                        $msgType = "Group";

                    $gm = $this->db->select("group_member")->get_where("crm_message_group", array("group_id"=>$fid))->result();
                    $gmarray = explode(",", $gm[0]->group_member);
                    foreach($gmarray as $gk=>$gv){
                        if($gv != "" AND $gv != $mid){
                            $needFirebase = $this->db->select("GCMID")->get_where("crm_users", array("email"=>$gv))->result();
                            if($needFirebase[0]->GCMID != ""){
                                $this->load->library('Firebase');
                                $this->load->library('Push');
                                $firebase = new Firebase();
                                $push = new Push();
                                $payload = array();
                                $payload['team'] = 'India';
                                $payload['score'] = '5.6';
                         
                                // notification title
                                $title = "Naviget Connect";
                                 

                                // notification message
                                $message = array(
                                                "msg"=> "Message send successfully.",
                                                "data"=> array(
                                                    "msgid"=> $msgid,
                                                    "groupId"=> $fid,
                                                    "drawNew"=> "no",
                                                    "type"=> "left",
                                                    "msg"=> base64_decode($msg),
                                                    "time"=> $data_array['time'],
                                                    "msgtype"=> "fa-star-o",
                                                    "messageType"=>$msgType,
                                                    "fimg"=>$userdata[0]->img,
                                                    "fname"=>$userdata[0]->full_name
                                                )
                                            );
                                 
                                // push type - single user / topic
                                $push_type = "individual";
                                 
                                // whether to include to image or not
                                $include_image = FALSE;

                                $push->setTitle($title);
                                $push->setMessage($message);
                                if ($include_image) {
                                    $push->setImage('http://api.androidhive.info/images/minion.jpg');
                                } else {
                                    $push->setImage('');
                                }
                                $push->setIsBackground(FALSE);
                                $push->setPayload($payload);
                         
                                if ($push_type == 'topic') {
                                    $fcm_json = $push->getPush();
                                    $fcm_response = $firebase->sendToTopic('global', $fcm_json);
                                } else if ($push_type == 'individual') {
                                    $fcm_json = $push->getPush();
                                    $regId = $needFirebase[0]->GCMID;
                                    $fcm_response = $firebase->send($regId, $fcm_json);
                                }
                            }
                        }
                    }
                }
                
                
                $json["data"] = array('msgid'=> $msgid, 
                                'groupId'=> $data_array['receiver_id'], 
                                'drawNew' => 'no', 
                                'type' => 'right', 
                                'msg' => $postMsg, 
                                'time' => $data_array['time'],
                                'msgtype' => 'fa-star-o');

                $inputInsertData = array(
                    'type' => 'chatMsg',
                    'type_id' => $msgid,
                    'relatedTo' => '',
                    'org_id' => $org_id,
                    'user_id' => $fcrm_id,
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'Chat',
                    'body' => $postMsg,
                    'createdby' => $uid
                );
                
                $this->db->insert("crm_notification", $inputInsertData);
                $json["status"] = true;
                $json["msg"] = "Message send successfully.";
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }


    public function send_attach_msg(){
        $mid = $_POST['my_email'];
        $uid = $_POST["my_id"];
        $fid = $_POST['friend_email'];
        $fcrm_id = $_POST['friend_id'];
        $org_id = $_POST["org_id"];
        $APITOKEN = $_POST["APITOKEN"];
        $postMsg = "";
        
        $json = array("status"=>false, "msg"=>"Message send error...");
        $json["data"] = array();
        if(check_api_token($uid, $APITOKEN)){
            $i = 0;

            foreach($_FILES["fileinput"]["tmp_name"] as $key=>$tmp_name){
                $path = "./uploads/chat_attachment/";
                $attachment = $_FILES["fileinput"]["tmp_name"][$key];
                $attachment_path = $_FILES["fileinput"]["name"][$key];
                $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
                $attachment_new =(time().$key.'.'.$attachment_ext);
                
                if(is_uploaded_file($attachment)){
                    if(move_uploaded_file($attachment,$path.$attachment_new)){
                        $postMsg = base_url("uploads/chat_attachment")."/".$attachment_new;
                        
                        $msg = base64_encode($postMsg);
                        
                        $data_array = array('sender_id' => $mid, 'msg' => $msg, 'status' => '', 'time' => date('Y-m-d H:i:s'));

                        if(! empty($msg)){ // if message empty, do nothing
                            $data_array['receiver_id'] = $fid;
                            $data_array['status'] = 1;
                            
                            $this->db->insert("crm_message", $data_array);
                            $msgid = $this->db->insert_id();
                            
                            $json[$i] = array('msgid'=> $msgid, 
                                'groupId'=> $data_array['receiver_id'], 
                                'drawNew' => 'no', 
                                'type' => 'right', 
                                'msg' => $postMsg, 
                                'time' => $data_array['time'],
                                'msgtype' => 'fa-star-o');                        
                            $i++;
                            $data['repmsg'] = "<a href='".$postMsg."' target='_blank' style='color:#1706ff'>".$attachment_path."</a>";

                            $inputInsertData = array(
                                'type' => 'chatMsg',
                                'type_id' => $msgid,
                                'relatedTo' => '',
                                'org_id' => $org_id,
                                'user_id' => $fcrm_id,
                                'notification_for' => '1',
                                'status' => '0',
                                'title' => 'Chat',
                                'body' => $data['repmsg'],
                                'createdby' => $uid
                            );
                            
                            $this->db->insert("crm_notification", $inputInsertData);
                            $json = array("status"=>true, "msg"=>"Message send successfully.");
                        }else{
                            $json = array("status"=>false, "msg"=>"Message insert error...");
                        }
                    }else{
                        $json = array("status"=>false, "msg"=>"Move upload error...");
                    }
                }
                else{
                    $json = array("status"=>false, "msg"=>"File upload error...");
                }
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }


    public function delete_chat(){
        $msgid = $_POST["msgid"];
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Data load faild!!!');
        if(check_api_token($uid, $APITOKEN)){
            $this->db->where_in("id", $msgid);
            $this->db->delete("crm_message");
            $json = array('status'=>true, 'msg'=>'Message delete successfully.', 'msgid'=>$msgid);
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }


    public function favourite(){
        $msgid = $_POST["msgid"];
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Data load faild!!!');
        if(check_api_token($uid, $APITOKEN)){
            $msgid = $_POST["msgid"];

            $result = false;
            $q = $this->db->select('id')
                     ->from('crm_message')
                     ->where_in("id", $msgid)
                     ->where("msg_type", "fa-star")
                     ->get()->result();
            if($q != "" AND count($q)>0){
                $this->db->query("UPDATE crm_message SET msg_type = 'fa-star-o' WHERE id = '".$msgid."'");
                $json = array('status'=>true, 'msg'=>'Unfavourite successfully.', 'msgid'=>$msgid);
                
            }else{
                $this->db->where_in('id', $msgid);
                $this->db->update('crm_message', array("msg_type"=>"fa-star"));
                $json = array('status'=>true, 'msg'=>'Favourite successfully.', 'msgid'=>$msgid);
            }
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }


    public function block_contact(){
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $mid = $_POST["my_email"];
        $fid = $_POST["friend_email"];
        $json = array('status'=>false, 'msg'=>'Contact '.$_POST["type"].' faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            if($_POST["type"] == "Block")
                $this->db->insert("crm_message_blocklist", array("mid"=>$mid, "fid"=>$fid));
            else
                $this->db->delete("crm_message_blocklist", array("mid"=>$mid, "fid"=>$fid));
            if($this->db->affected_rows() > 0)
                $json = array('status'=>true, 'msg'=>'Contact '.$_POST["type"].' successfully.');
            else
                $json = array('status'=>false, 'msg'=>'Contact '.$_POST["type"].' faild !!!');
            
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function mute_conversation(){
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $mid = $_POST["my_email"];
        $json = array('status'=>false, 'msg'=>'Mute conversation faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            if(isset($_POST["friend_email"])) {
                $fid = $_POST["friend_email"];
                $mutefor = $_POST["mutefor"];
                $q = $this->db->get_where("crm_mute_message_notification", array("mid"=>$mid, "fid"=>$fid))->result();
                if(count($q)>0){
                    $this->db->update("crm_mute_message_notification",array("mute_for"=>$mutefor),array("mid"=>$mid, "fid"=>$fid));
                }
                else{
                    $this->db->insert("crm_mute_message_notification", array("mid"=>$mid, "fid"=>$fid, "mute_for"=>$mutefor));
                }
            }
            $data = $this->db->get_where("crm_mute_message_notification", array("mid"=>$mid))->result();

            if(count($data)>0)
                $json = array('status'=>true, 'msg'=>'Current mute conversation list.', 'data'=>$data);
            else
                $json = array('status'=>false, 'msg'=>'No muted conversation.');
            
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function unmute_conversation(){
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $mid = $_POST["my_email"];
        $fid = $_POST["friend_email"];
        $json = array('status'=>false, 'msg'=>'Mute conversation faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            $this->db->delete("crm_mute_message_notification", array("mid"=>$mid, "fid"=>$fid));
            $data = $this->db->get_where("crm_mute_message_notification", array("mid"=>$mid))->result();

            if(count($data)>0)
                $json = array('status'=>true, 'msg'=>'Current mute conversation list.', 'data'=>$data);
            else
                $json = array('status'=>false, 'msg'=>'No muted conversation.');

            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function mute_conversation_delete(){
        $uid = $_POST["uid"];
        $APITOKEN = $_POST["APITOKEN"];
        $sl = $_POST["sl"];
        $json = array('status'=>false, 'msg'=>'Mute conversation faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            $this->db->delete("crm_mute_message_notification", array("sl"=>$sl));
            $data = $this->db->get_where("crm_mute_message_notification", array("mid"=>$mid))->result();

            if(count($data)>0)
                $json = array('status'=>true, 'msg'=>'Current mute conversation list.', 'data'=>$data);
            else
                $json = array('status'=>false, 'msg'=>'No muted conversation.');

            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function leaveConversation(){
        $mid = $_POST["my_email"];
        $uid = $_POST["uid"];
        $group_id = $_POST["gid"]; 
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Leave conversation faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            $this->db->query("UPDATE `crm_message_group` SET `group_member` = REPLACE(`group_member`, '$mid', '') WHERE `group_id` = '$group_id'");
            if($this->db->affected_rows() > 0)
                $json = array('status'=>true, 'msg'=>'Leave Successfully !!!');
            else
                $json = array('status'=>false, 'msg'=>'Leave conversation faild !!!');
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function deleteGroup(){
        $uid = $_POST["uid"];
        $group_id = $_POST["gid"]; 
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Delete conversation faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            $this->db->delete("crm_message_group", array("group_id"=>$group_id));
            if($this->db->affected_rows() > 0)
                $json = array('status'=>true, 'msg'=>'Deleted Successfully !!!');
            else
                $json = array('status'=>false, 'msg'=>'Delete conversation faild !!!');
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function editGroupName(){
        $uid = $_POST["uid"];
        $pid = $_POST['pid'];
        $GroupNameText = $_POST['GroupNameText'];
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Edit Group Name faild !!!');
        if(check_api_token($uid, $APITOKEN)){
            if($this->db->update("crm_message_group", array("group_name"=>$GroupNameText), array("group_id"=>$pid)))
                $json = array('status'=>true, 'msg'=>'Edit Group Name Successfully !!!');
            else
                $json = array('status'=>false, 'msg'=>'Edit Group Name faild !!!');
            header('Content-type: application/json');
            echo json_encode($json);
        }else{
            header('Content-type: application/json');
            echo json_encode($json);
        }
    }


    function createGroup(){
        $uid = $_POST["uid"];//ID
        $mid = $_POST['mid'];//Email
        $member = $_POST['member'];//member email
        $APITOKEN = $_POST["APITOKEN"];
        $json = array('status'=>false, 'msg'=>'Create Group faild !!!');
        if(check_api_token($uid, $APITOKEN)){

            if(isset($_POST['pid']))
                $pid = $_POST['pid'];
            else
                $pid = "";
            
            if(! is_numeric($group_id)){
                array_push($member, $group_id);
                $group_id = time();
            }

            array_push($member, $mid);
        
            $str = "";
            foreach ($member as $key => $value) {
                $str .= $value.",";
            }
            $str = substr($str, 0, -1);

            $searcholdgp = $this->db->get_where("crm_message_group", array("group_member"=>$str, "pid"=>$pid))->result();

            if(count($searcholdgp)>0){
                $json = array('result' => 'old', 'sl' => $searcholdgp[0]->sl, 'group_id' => $searcholdgp[0]->group_id, 'group_name' => $searcholdgp[0]->group_name, 'group_member' => $searcholdgp[0]->group_member, 'pid' => $searcholdgp[0]->pid, 'status'=>true, 'msg'=>'Group Update !!!');
            }
            else{
                if($this->db->insert("crm_message_group", array("group_id"=>$group_id, "group_name"=>$_POST["group_name"], "group_member"=>$str, 'pid'=>$pid, 'createdby'=>$mid)))
                    $json = array('result' => 'new', 'group_id'=>$group_id, 'group_name'=>$_POST["group_name"], 'status'=>true, 'msg'=>'Create Group Successfully');
                else
                    $json = array('status'=>false, 'msg'=>'Create Group faild !!!');
            }
        }

        header('Content-type: application/json');
        echo json_encode($json);
        
    }
    
    
    
}
