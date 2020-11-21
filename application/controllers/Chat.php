<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  07 Dec, 2016
 */

class Chat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('directory');
        $this->load->database();
        $this->load->library('session');

        $this->load->model('Common_model');
        $this->load->model('Modulemodel');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*  Open file transfer window  */

    public function openfile($uid = FALSE, $notiid = FALSE) {
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['id'] = $sessionData['user_id'];
            $data['user_email'] = $sessionData['user_email'];
            $data['numOfFiles'] = 10;
            if ($uid !== FALSE) {
                $q = $this->db->select("email")->get_where("crm_users", array("ID" => $uid))->result();
                if (count($q) == 1)
                    $data["femail"] = $q[0]->email;
                else
                    $data["femail"] = $uid;
                $data['numOfFiles'] = 1;
                $data['fuid'] = $uid;
                $data['notiid'] = $notiid;
            }
            $this->load->view('uploadfile', $data);
        }
    }

    /*     * * Ajax function check Online Offline ** */
    /*     * * Input: Not required, Output: whos' is onlin in a json formet ** */

    function checkOnlineOffline() {
        // if ($this->session->userdata('admin_login') != 1)
        //    redirect(base_url(), 'refresh');

        $this->db->order_by('timestamp', 'DESC');
        $result = $this->db->get("ci_sessions")->result();
        $curtime = time();
        $away = (time() - 600);
        // $logout = (time() - 1800);
        // $loghistory["id"][]=-1;
        $json = array();
        $uidlist = array();

        $error_data = array($result, $away);
        if (count($result) > 0) {
            foreach ($result as $value) {
                $full_session_data = explode("|", $value->data);
                if (count($full_session_data) > 2) {
                    $yeezyCRM = unserialize($full_session_data[3]);
                    if ($value->timestamp >= $away) {
                        if (array_search($yeezyCRM['user_id'], $uidlist) === FALSE) {
                            array_push($uidlist, $yeezyCRM['user_id']);
                            $json[] = array(
                                "timestamp" => $value->timestamp,
                                "curtime" => date("Y-m-d H:i:s", $curtime),
                                "datetime" => date("Y-m-d H:i:s", $value->timestamp),
                                "user_id" => $yeezyCRM['user_id'],
                                "user_email" => $yeezyCRM['user_email']
                            );
                        }
                    }
                }
                // Full Data
                // $json[] = $value->data;
            }
            header('Content-type: application/json');
            echo json_encode($json);
        } else {
            header('Content-type: application/json');
            echo json_encode($error_data);
        }
    }

    public function newMsgFile() {
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $json = array();
            // $path = "./require/chat/";
            $postMsg = "";

            $myid = $_POST['mid'];
            $tempFID = $_POST['ffid'];
            $i = 0;

            foreach ($_FILES["fileinput"]["tmp_name"] as $key => $tmp_name) {
                $path = "./uploads/chat_attachment/";
                $attachment = $_FILES["fileinput"]["tmp_name"][$key];
                $attachment_path = $_FILES["fileinput"]["name"][$key];
                $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
                $attachment_new = (time() . $key . '.' . $attachment_ext);

                if (is_uploaded_file($attachment)) {
                    if (move_uploaded_file($attachment, $path . $attachment_new)) {
                        $postMsg = base_url("uploads/chat_attachment") . "/" . $attachment_new;

                        $msg = base64_encode($postMsg);

                        $data_array = array('sender_id' => $myid, 'msg' => $msg, 'status' => '', 'time' => date('Y-m-d H:i:s'));

                        if (!empty($msg)) { // if message empty, do nothing
                            $data_array['receiver_id'] = $tempFID;
                            $data_array['status'] = 1;

                            $this->db->insert("crm_message", $data_array);
                            $msgid = $this->db->insert_id();

                            $json[$i] = array('msgid' => $msgid,
                                'groupId' => $data_array['receiver_id'],
                                'drawNew' => 'no',
                                'type' => 'right',
                                'msg' => $postMsg,
                                'time' => $data_array['time'],
                                'msgtype' => 'fa-star-o',
                                'msglike' => 'fa-thumbs-o-up');
                            $i++;
                            $data['repmsg'] = "<a href='" . $postMsg . "' target='_blank' style='color:#1706ff'>" . $attachment_path . "</a>";

                            $inputInsertData = array(
                                'type' => 'chatMsg',
                                'type_id' => $msgid,
                                'relatedTo' => '',
                                'org_id' => $sessionData['org_id'],
                                'user_id' => $_POST['fuid'],
                                'notification_for' => '1',
                                'status' => '0',
                                'title' => 'Chat',
                                'body' => $data['repmsg'],
                                'createdby' => $sessionData['user_id']
                            );

                            $this->db->insert("crm_notification", $inputInsertData);
                        }
                    }
                }
            }

            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    /* Insert new message */

    public function newMsg() {
        // if ($this->session->userdata('admin_login') == 1){
        $sessionData = $this->session->userdata('yeezyCRM');

        $json = array();
        $postMsg = "";
        $baseURL = base_url("asset/emotion");
        $emotionImgSymble = array(":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", ";)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\\", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)");
        $emotionImg = array("<img class='emo' src='$baseURL/smile.png' />", "<img class='emo' src='$baseURL/smile-big.png' />", "<img class='emo' src='$baseURL/sad.png' />", "<img class='emo' src='$baseURL/crying.png' />", "<img class='emo' src='$baseURL/tongue.png' />", "<img class='emo' src='$baseURL/shock.png' />", "<img class='emo' src='$baseURL/angry.png' />", "<img class='emo' src='$baseURL/confused.png' />", "<img class='emo' src='$baseURL/wink.png' />", "<img class='emo' src='$baseURL/embarrassed.png' />", "<img class='emo' src='$baseURL/disapointed.png' />", "<img class='emo' src='$baseURL/sick.png' />", "<img class='emo' src='$baseURL/shut-mouth.png' />", "<img class='emo' src='$baseURL/sleepy.png' />", "<img class='emo' src='$baseURL/eyeroll.png' />", "<img class='emo' src='$baseURL/thinking.png' />", "<img class='emo' src='$baseURL/lying.png' />", "<img class='emo' src='$baseURL/glasses-nerdy.png' />", "<img class='emo' src='$baseURL/teeth.png' />", "<img class='emo' src='$baseURL/angel.png' />", "<img class='emo' src='$baseURL/bye.png' />", "<img class='emo' src='$baseURL/clap.png' />", "<img class='emo' src='$baseURL/hug-left.png' />", "<img class='emo' src='$baseURL/hug-right.png' />", "<img class='emo' src='$baseURL/good.png' />", "<img class='emo' src='$baseURL/bad.png' />", "<img class='emo' src='$baseURL/highfive.png' />", "<img class='emo' src='$baseURL/love.png' />", "<img class='emo' src='$baseURL/love-over.png' />", "<img class='emo' src='$baseURL/tv.png' />", "<img class='emo' src='$baseURL/mail.png' />", "<img class='emo' src='$baseURL/rain.png' />", "<img class='emo' src='$baseURL/pizza.png' />", "<img class='emo' src='$baseURL/coffee.png' />", "<img class='emo' src='$baseURL/computer.png' />", "<img class='emo' src='$baseURL/beer.png' />", "<img class='emo' src='$baseURL/drink.png' />", "<img class='emo' src='$baseURL/cat.png' />", "<img class='emo' src='$baseURL/dog.png' />", "<img class='emo' src='$baseURL/sun.png' />", "<img class='emo' src='$baseURL/star.png' />", "<img class='emo' src='$baseURL/clock.png' />", "<img class='emo' src='$baseURL/present.png' />", "<img class='emo' src='$baseURL/mobile.png' />", "<img class='emo' src='$baseURL/musical-note.png' />", "<img class='emo' src='$baseURL/boy.png' />", "<img class='emo' src='$baseURL/girl.png' />", "<img class='emo' src='$baseURL/cake.png' />", "<img class='emo' src='$baseURL/car.png' />");
        $postMsg = str_replace($emotionImgSymble, $emotionImg, $_POST['msg']);
        $postMsg = str_replace("\n", '<br>', $postMsg);

        $msg = base64_encode($postMsg);
        $data_array = array(
            'sender_id' => $_POST['mid'],
            'receiver_id' => $_POST['fid'],
            'msg' => $msg,
            'status' => '1',
            'time' => date('Y-m-d H:i:s'));


        if (!empty($msg)) { // if message empty, do nothing
            if (is_numeric($_POST["fid"])) {


                $gm = $this->db->select("group_member")
                        ->where(array("group_id" => $_POST["fid"]))
                        ->get("crm_message_group")
                        ->result();

                $data_array["status"] = str_replace($_POST['mid'], "", $gm[0]->group_member);
            }
            $this->db->insert("crm_message", $data_array);
            $msgid = $this->db->insert_id();
            $fcm_json = '';
            $fcm_response = '';

            $userdata = $this->db->get_where("crm_users", array("email" => $_POST["mid"]))->result();
            if (!is_numeric($_POST["fid"])) {
                $msgType = "Direct";
                $needFirebase = $this->db->select("GCMID")->get_where("crm_users", array("email" => $_POST['fid']))->result();
                if ($needFirebase[0]->GCMID != "") {
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
                        "msg" => "Message send successfully.",
                        "data" => array(
                            "msgid" => $msgid,
                            "groupId" => $_POST['mid'],
                            "drawNew" => "no",
                            "type" => "left",
                            "msg" => base64_decode($msg),
                            "time" => $data_array['time'],
                            "msgtype" => "fa-star-o",
                            'msglike' => 'fa-thumbs-o-up',
                            "messageType" => $msgType,
                            "fimg" => $userdata[0]->img,
                            "fname" => $userdata[0]->full_name
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
            } else {
                if ($_POST["fid"] < 1400000000)
                    $msgType = "Project";
                else
                    $msgType = "Group";

                $gm = $this->db->select("group_member")->get_where("crm_message_group", array("group_id" => $_POST["fid"]))->result();
                $gmarray = explode(",", $gm[0]->group_member);
                foreach ($gmarray as $gk => $gv) {
                    if ($gv != "") {
                        $needFirebase = $this->db->select("GCMID")->get_where("crm_users", array("email" => $gv))->result();
                        if ($needFirebase[0]->GCMID != "") {
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
                                "msg" => "Message send successfully.",
                                "data" => array(
                                    "msgid" => $msgid,
                                    "groupId" => $_POST["fid"],
                                    "drawNew" => "no",
                                    "type" => "left",
                                    "msg" => base64_decode($msg),
                                    "time" => $data_array['time'],
                                    "msgtype" => "fa-star-o",
                                    'msglike' => 'fa-thumbs-o-up',
                                    "messageType" => $msgType,
                                    "fimg" => $userdata[0]->img,
                                    "fname" => $userdata[0]->full_name
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



            $json[0] = array('msgid' => $msgid,
                'groupId' => $data_array['receiver_id'],
                'drawNew' => 'no',
                'type' => 'right',
                'msg' => $postMsg,
                'time' => $data_array['time'],
                'msgtype' => 'fa-star-o',
                'msglike' => 'fa-thumbs-o-up',
                'fcm_json' => $fcm_json,
                'fcm_response' => $fcm_response);

            $inputInsertData = array(
                'type' => 'chatMsg',
                'type_id' => $msgid,
                'relatedTo' => '',
                'org_id' => $sessionData['org_id'],
                'user_id' => $_POST["fcrm_id"],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'Chat',
                'body' => $postMsg,
                'createdby' => $sessionData['user_id']
            );

            $this->db->insert("crm_notification", $inputInsertData);
            $insertID = $this->db->insert_id();

            if (is_numeric($_POST["fid"])) {
                $userID = array();
                $userEmail = array();

                $user_row_data = $this->db->select("ID,email")->get("crm_users")->result();
                foreach ($user_row_data as $k => $v) {
                    array_push($userEmail, $v->email);
                    array_push($userID, $v->ID);
                }
                $expMember = explode(',', $data_array["status"]);

                foreach ($expMember as $key => $value) {
                    $key = array_search($value, $userEmail);
                    $temp_tbl[] = array(
                        'parent' => $insertID,
                        'parentType' => 'chatMsg',
                        'typeid' => $msgid,
                        'userid' => $userID[$key]
                    );
                }
                $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
            } else {

                $temp_tbl = array(
                    'parent' => $insertID,
                    'parentType' => 'chatMsg',
                    'typeid' => $msgid,
                    'userid' => $_POST["fcrm_id"]
                );

                $this->db->insert("crm_temp_tbl", $temp_tbl);
            }



            header('Content-type: application/json');
            echo json_encode($json);
        }
        // }
    }

    /* Search old message */

    public function searchMsg() {
        $mid = $_POST["mid"];
        $fid = $_POST["fid"];
        $s_email = $mid;
        $json = array('status' => false, 'msg' => 'Data load faild!!!');
        if (filter_var($fid, FILTER_VALIDATE_EMAIL)) {
            $where = "(`receiver_id` =  '$mid' AND  `sender_id` =  '$fid') OR (`sender_id` =  '$mid' AND `receiver_id` =  '$fid')";
            $this->db->where($where);
            $this->db->order_by('id');
            $result = $this->db->get("crm_message")->result();
        } elseif (is_numeric($fid)) {
            $where = "crm_message.receiver_id = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`)";
            $this->db->from('crm_message');
            $this->db->join('crm_message_group', 'crm_message.receiver_id = crm_message_group.group_id');
            $this->db->where($where);
            $this->db->order_by('id');
            $result = $this->db->get()->result();
        }
        $i = 0;
        if (count($result) > 0) {
            $json["data"] = array();
            foreach ($result as $row) {
                if ($row->sender_id == $mid) {
                    array_push($json["data"], array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'right', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'msg_status' => $row->status));
                } elseif ($row->receiver_id == $mid) {
                    array_push($json["data"], array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'fimg' => '', 'fname' => '', 'msg_status' => $row->status));
                } elseif ($row->receiver_id == $fid AND ! (filter_var($fid, FILTER_VALIDATE_EMAIL))) {
                    $finfo = $this->db->get_where("crm_users", array("email" => $row->sender_id))->result();
                    array_push($json["data"], array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'fimg' => $finfo[0]->img, 'fname' => $finfo[0]->display_name, 'msg_status' => $row->status));
                }

                $i++;
            }
            if (filter_var($fid, FILTER_VALIDATE_EMAIL) AND $fid == $s_email) {
                $this->db->where($where);
                $this->db->update("crm_message", array("status" => 0));
            } elseif (is_numeric($fid)) {
                $this->db->query("UPDATE crm_message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'");
            }
            $json['status'] = true;
            $json['msg'] = 'Data load success...';
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }

    /* Search new message */

    public function searchNewMsg($mid = FALSE, $fid = FALSE) {
        if ($mid === FALSE) {
            $mid = $_POST["mid"];
            $fid = $_POST["fid"];
        }

        $json = array();
        if (filter_var($fid, FILTER_VALIDATE_EMAIL)) {
            $result = $this->db->get_where("crm_message", array("receiver_id" => $mid, "sender_id" => $fid, "status" => 1))->result();
        } elseif (is_numeric($fid)) {
            $result = $this->db->query("SELECT * FROM crm_message WHERE receiver_id = '$fid' AND status LIKE '%$mid%'")->result();
        }
        $i = 0;
        if (count($result) > 0) {
            foreach ($result as $row) {
                if ($row->sender_id == $mid) {
                    $json[$i] = array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'right', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'msg_status' => $row->status);
                } elseif ($row->receiver_id == $mid) {
                    $json[$i] = array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'msg_status' => $row->status);
                } elseif ($row->receiver_id == $fid AND ! (filter_var($fid, FILTER_VALIDATE_EMAIL))) {
                    $finfo = $this->db->get_where("crm_users", array("email" => $row->sender_id))->result();
                    $json[$i] = array('msgid' => $row->id, 'groupId' => $fid, 'drawNew' => 'yes', 'type' => 'left', 'msg' => base64_decode($row->msg), 'time' => $row->time, 'msgtype' => $row->msg_type, 'msglike' => $row->msg_like, 'fimg' => $finfo[0]->img, 'fname' => $finfo[0]->display_name, 'msg_status' => 1);
                }

                $i++;
            }
            if (filter_var($fid, FILTER_VALIDATE_EMAIL)) {
                $this->db->update("crm_message", array("status" => 0), array("receiver_id" => $mid, "sender_id" => $fid, "status" => 1));
            } elseif (is_numeric($fid)) {
                $this->db->query("UPDATE crm_message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'");
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function seenSendMsg() {
        $idarray = $_POST["msgidarray"];
        $json = array();

        $result = $this->db->from("crm_message")
                ->where_in("id", $idarray)
                ->get()
                ->result();
        $i = 0;
        if (count($result) > 0) {
            foreach ($result as $row) {
                $json[$i] = array("id" => $row->id, "status" => $row->status);
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function checkMsgForNotify() {
        $mid = $_POST['mid'];
        $json = array();

        $result = $this->db->query("SELECT `crm_users`.`ID` as id, `crm_users`.`full_name` as uname, sender_id, count(sender_id) as noOfSms, msg FROM `crm_message`, `crm_users` WHERE `receiver_id` = '$mid' AND `crm_message`.`status` = '1' AND email = sender_id GROUP BY (sender_id)")->result();
        $i = 0;

        if (count($result) > 0) {
            foreach ($result as $row) {
                $json[$i++] = array('noOfSms' => $row->noOfSms, 'id' => $row->id, 'sender_id' => $row->sender_id, 'msg' => base64_decode($row->msg), 'uname' => $row->uname);
            }
        }

        $result2 = $this->db->query("SELECT receiver_id as id, receiver_id as uname, receiver_id, count(receiver_id) as noOfSms, msg FROM `crm_message` WHERE `status` LIKE '%$mid%' GROUP BY (receiver_id)")->result();
        if (count($result2) > 0) {
            foreach ($result2 as $row) {
                $json[$i++] = array('noOfSms' => $row->noOfSms, 'id' => $row->id, 'sender_id' => $row->receiver_id, 'msg' => base64_decode($row->msg), 'uname' => $row->uname);
            }
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }

    function clean($string) {
        $string = str_replace('', '', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    // function insertData($table = FALSE, $data = FALSE){
    //     $this->db->insert($table, $data);
    //     if($this->db->affected_rows() > 0)
    //         return $this->db->insert_id();
    //     else
    //         return false;
    // }

    public function addStarMsg() {
        $msgid = $_POST["msgid"];

        $result = false;
        $this->db->select('id')
                ->from('crm_message')
                ->where_in("id", $msgid)
                ->where("msg_type", "fa-star");
        $q = $this->db->get()->result();
        if ($q != "" AND count($q) > 0) {
            foreach ($q as $key => $value) {
                unset($msgid[array_search($value->id, $msgid)]);
                $this->db->query("UPDATE crm_message SET msg_type = 'fa-star-o' WHERE id = '" . $value->id . "'");
            }
            $result = true;
            $json = true;
        }
        // return $msgid;
        if (count($msgid) > 0) {
            $this->db->where_in('id', $msgid);
            $this->db->update('crm_message', array("msg_type" => "fa-star"));
            if ($this->db->affected_rows() > 0)
                $json = true;
            else {
                if ($result)
                    $json = true;
                else
                    $json = false;
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function addLikeMsg() {
        $msgid = $_POST["msgid"];

        $result = false;
        $this->db->select('id')
                ->from('crm_message')
                ->where_in("id", $msgid)
                ->where("msg_like", "fa-thumbs-up");
        $q = $this->db->get()->result();
        if ($q != "" AND count($q) > 0) {
            foreach ($q as $key => $value) {
                unset($msgid[array_search($value->id, $msgid)]);
                $this->db->query("UPDATE crm_message SET msg_like = 'fa-thumbs-o-up' WHERE id = '" . $value->id . "'");
            }
            $result = true;
            $json = true;
        }
        // return $msgid;
        if (count($msgid) > 0) {
            $this->db->where_in('id', $msgid);
            $this->db->update('crm_message', array("msg_like" => "fa-thumbs-up"));
            if ($this->db->affected_rows() > 0)
                $json = true;
            else {
                if ($result)
                    $json = true;
                else
                    $json = false;
            }
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function deleteMsg() {
        $msgid = $_POST["msgid"];
        $this->db->where_in("id", $msgid);
        $json = $this->db->delete("crm_message");
        header('Content-type: application/json');
        echo json_encode($msgid);
    }

    public function blockcontact() {
        $mid = $_POST["mid"];
        $fid = $_POST["fid"];
        if ($_POST["type"] == "Block")
            $this->db->insert("crm_message_blocklist", array("mid" => $mid, "fid" => $fid));
        else
            $this->db->delete("crm_message_blocklist", array("mid" => $mid, "fid" => $fid));
        if ($this->db->affected_rows() > 0)
            $json = true;
        else
            $json = false;
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function muteuser() {
        $mid = $_POST["mid"];
        if (isset($_POST["fid"])) {
            $fid = $_POST["fid"];
            $mutefor = $_POST["mutefor"];
            $q = $this->db->get_where("crm_mute_message_notification", array("mid" => $mid, "fid" => $fid))->result();
            if (count($q) > 0) {
                $this->db->update("crm_mute_message_notification", array("mute_for" => $mutefor), array("mid" => $mid, "fid" => $fid));
            } else {
                $this->db->insert("crm_mute_message_notification", array("mid" => $mid, "fid" => $fid, "mute_for" => $mutefor));
            }
        }
        $data = $this->db->get_where("crm_mute_message_notification", array("mid" => $mid))->result();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function unmuteuser() {
        $mid = $_POST["mid"];
        $fid = $_POST["fid"];
        $this->db->delete("crm_mute_message_notification", array("mid" => $mid, "fid" => $fid));
        header('Content-type: application/json');
        echo json_encode(true);
    }

    public function muteuserdelete() {
        $sl = $_POST["sl"];
        $this->db->delete("crm_mute_message_notification", array("sl" => $sl));
        header('Content-type: application/json');
        echo json_encode($sl);
    }

    public function messageinfo() {
        $id = $_POST["msgid"];
        $data = $this->db->get_where("crm_message", array("id" => $id))->result();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function forwardmsg() {
        $msgid = $_POST["msgid"];
        $fid = $_POST["fid"];
        $mid = $_POST["mid"];
        for ($i = 0; $i < count($msgid); $i++) {
            $this->db->query("INSERT INTO crm_message(receiver_id, sender_id, msg, status) SELECT '" . $fid . "', '" . $mid . "', msg, '1' FROM crm_message WHERE id = '" . $msgid["$i"] . "'");
        }
        $json = true;
        header('Content-type: application/json');
        echo json_encode($json);
    }

    function createGroup() {
        $group_id = $_POST['group_id'];
        $member = $_POST['member'];
        $mid = $_POST['mid'];

        if (isset($_POST['pid']))
            $pid = $_POST['pid'];
        else
            $pid = "";

        if (!is_numeric($group_id)) {
            array_push($member, $group_id);
            $group_id = time();
        }
        array_push($member, $mid);

        $str = "";
        foreach ($member as $key => $value) {
            $str .= $value . ",";
        }
        $str = substr($str, 0, -1);

        $searcholdgp = $this->db->get_where("crm_message_group", array("group_member" => $str, "pid" => $pid))->result();
        if (count($searcholdgp) > 0) {
            $json = array('result' => 'old', 'sl' => $searcholdgp[0]->sl, 'group_id' => $searcholdgp[0]->group_id, 'group_name' => $searcholdgp[0]->group_name, 'group_member' => $searcholdgp[0]->group_member, 'pid' => $searcholdgp[0]->pid);
            header('Content-type: application/json');
            echo json_encode($json);
        } else {
            if ($this->db->insert("crm_message_group", array("group_id" => $group_id, "group_name" => $_POST["group_name"], "group_member" => $str, 'pid' => $pid, 'createdby' => $mid)))
                $json = array('result' => 'new', 'group_id' => $group_id, 'group_name' => $_POST["group_name"]);
            else
                $json = array('result' => false);

            header('Content-type: application/json');
            echo json_encode($json);
        }
    }

    public function editGroupName() {
        $pid = $_POST['pid'];
        $GroupNameText = $_POST['GroupNameText'];

        if ($this->db->update("crm_message_group", array("group_name" => $GroupNameText), array("group_id" => $pid)))
            $json = array('result' => true);
        else
            $json = array('result' => false);

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function leaveConversation() {
        $group_id = $_POST["gid"];
        $mid = $_POST["email"];
        $this->db->query("UPDATE `crm_message_group` SET `group_member` = REPLACE(`group_member`, '$mid', '') WHERE `group_id` = '$group_id'");
        if ($this->db->affected_rows() > 0)
            $json = true;
        else
            $json = false;
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function searchGroupMember() {
        $id = $_POST['group_id'];
        $this->db->select("group_member");
        $result = $this->db->get_where("crm_message_group", array("group_id" => $id))->result();
        if ($result != FALSE) {
            $data = explode(",", $result[0]->group_member);
            $json = array('result' => true, 'data' => $data);
        } else
            $json = array('result' => false);

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function showGroupMembersName() {
        $id = $_POST['group_id'];
        $this->db->select("group_member");
        $result = $this->db->get_where("crm_message_group", array("group_id" => $id))->result();
        if ($result != FALSE) {
            $data = explode(",", $result[0]->group_member);
            $this->db->select("full_name");
            $this->db->where_in('email', $data);
            $rr = $this->db->get("crm_users")->result();

            $json = array('result' => true, 'data' => $rr);
        } else
            $json = array('result' => false);

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function updateGroupMember() {
        $group_id = $_POST['group_id'];
        $mid = $_POST['mid'];
        $member = $_POST['member'];
        if (!empty($_POST['member']) AND $_POST['member'] != "") {
            array_push($member, $mid);
            $str = "";
            foreach ($member as $key => $value) {
                $str .= $value . ",";
            }
            $str = substr($str, 0, -1);
        } else {
            $str = $mid;
        }
        $this->db->update("crm_message_group", array("group_member" => $str), array("group_id" => $group_id));
        if ($this->db->affected_rows() > 0)
            $json = array('result' => true);
        else
            $json = array('result' => false);

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function deleteGroup() {
        $group_id = $_POST["gid"];
        $this->db->delete("crm_message_group", array("group_id" => $group_id));
        if ($this->db->affected_rows() > 0)
            $json = true;
        else
            $json = false;
        header('Content-type: application/json');
        echo json_encode($json);
    }

    // public function checkOnlineOffline(){
    //     if($this->session->userdata('yeezyCRM')){
    //         $this->db->order_by('timestamp', 'DESC');
    //         $result = $this->db->get("ci_sessions")->result();
    //         $curtime = time();
    //         $curtime -= 6 * 3600;
    //         $away = (time() - 600);
    //         $away -= 6 * 3600;
    //         $logout = (time() - 1800);
    //         $logout -= 6 * 3600;
    //         $loghistory["id"][]=-1;
    //         $json = array();
    //         foreach ($result as $value) {
    //             $usud = unserialize($value->data);
    //             $lasttime = $value->timestamp;
    //             $lasttime -= 6 * 3600;
    //             // print_r($usud['yeezyCRM']);
    //             $do_refresh = false;
    //             // if(($lasttime - 1800) < $logout){
    //                 $t = $usud['yeezyCRM']['user_id'];
    //                 if(! array_search($t, $loghistory["id"]) && $t != "" && is_numeric($t)){
    //                     $loghistory["id"][]=$t;
    //                     if($lasttime < $away){
    //                         $is_online = false;
    //                         if($lasttime < ($away+120))
    //                             $do_refresh = true;
    //                     }
    //                     else
    //                         $is_online = true;
    //                     $cccc = file_get_contents("isonline.txt");
    //                     file_put_contents("isonline.txt", $cccc."\r\n". $t."=".$lasttime."=".$curtime);
    //                     $json[] = array("uid"=>$t, "session_id"=>$value->session_id, "ip"=>$value->ip_address, "last_activity"=> date('Y-m-d H:i:s', ($lasttime) + 21600), "status"=> $is_online, "refresh"=> $do_refresh);
    //                 }
    //             // }
    //         }
    //         header('Content-type: application/json');
    //         echo json_encode($json);
    //     } else {
    //       redirect('login', 'refresh');
    //     }
    // }


    public function quickMsgRep() {
        $sessionData = $this->session->userdata('yeezyCRM');

        if ($_POST['fid'] > 1400000000) {
            $fid = $_POST['fid'];
            $gq = $this->db->get_where("crm_message_group", array("group_id" => $fid))->result();
            $status = $gq[0]->group_member;
        } else {
            $fidq = $this->db->select("email")->get_where("crm_users", array("ID" => $_POST['fid']))->result();
            $fid = $fidq[0]->email;
            $status = 1;
        }

        $postMsg = "";
        $baseURL = base_url("asset/emotion");
        $emotionImgSymble = array(":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", ";)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\\", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)");
        $emotionImg = array("<img class='emo' src='$baseURL/smile.png' />", "<img class='emo' src='$baseURL/smile-big.png' />", "<img class='emo' src='$baseURL/sad.png' />", "<img class='emo' src='$baseURL/crying.png' />", "<img class='emo' src='$baseURL/tongue.png' />", "<img class='emo' src='$baseURL/shock.png' />", "<img class='emo' src='$baseURL/angry.png' />", "<img class='emo' src='$baseURL/confused.png' />", "<img class='emo' src='$baseURL/wink.png' />", "<img class='emo' src='$baseURL/embarrassed.png' />", "<img class='emo' src='$baseURL/disapointed.png' />", "<img class='emo' src='$baseURL/sick.png' />", "<img class='emo' src='$baseURL/shut-mouth.png' />", "<img class='emo' src='$baseURL/sleepy.png' />", "<img class='emo' src='$baseURL/eyeroll.png' />", "<img class='emo' src='$baseURL/thinking.png' />", "<img class='emo' src='$baseURL/lying.png' />", "<img class='emo' src='$baseURL/glasses-nerdy.png' />", "<img class='emo' src='$baseURL/teeth.png' />", "<img class='emo' src='$baseURL/angel.png' />", "<img class='emo' src='$baseURL/bye.png' />", "<img class='emo' src='$baseURL/clap.png' />", "<img class='emo' src='$baseURL/hug-left.png' />", "<img class='emo' src='$baseURL/hug-right.png' />", "<img class='emo' src='$baseURL/good.png' />", "<img class='emo' src='$baseURL/bad.png' />", "<img class='emo' src='$baseURL/highfive.png' />", "<img class='emo' src='$baseURL/love.png' />", "<img class='emo' src='$baseURL/love-over.png' />", "<img class='emo' src='$baseURL/tv.png' />", "<img class='emo' src='$baseURL/mail.png' />", "<img class='emo' src='$baseURL/rain.png' />", "<img class='emo' src='$baseURL/pizza.png' />", "<img class='emo' src='$baseURL/coffee.png' />", "<img class='emo' src='$baseURL/computer.png' />", "<img class='emo' src='$baseURL/beer.png' />", "<img class='emo' src='$baseURL/drink.png' />", "<img class='emo' src='$baseURL/cat.png' />", "<img class='emo' src='$baseURL/dog.png' />", "<img class='emo' src='$baseURL/sun.png' />", "<img class='emo' src='$baseURL/star.png' />", "<img class='emo' src='$baseURL/clock.png' />", "<img class='emo' src='$baseURL/present.png' />", "<img class='emo' src='$baseURL/mobile.png' />", "<img class='emo' src='$baseURL/musical-note.png' />", "<img class='emo' src='$baseURL/boy.png' />", "<img class='emo' src='$baseURL/girl.png' />", "<img class='emo' src='$baseURL/cake.png' />", "<img class='emo' src='$baseURL/car.png' />");
        $postMsg = str_replace($emotionImgSymble, $emotionImg, $_POST['msg']);
        $postMsg = str_replace("\n", '<br>', $postMsg);

        $msg = base64_encode($postMsg);
        $data_array = array(
            'sender_id' => $sessionData['user_email'],
            'receiver_id' => $fid,
            'msg' => $msg,
            'status' => $status,
            'time' => date('Y-m-d H:i:s'));

        if (!empty($msg)) { // if message empty, do nothing
            $this->db->insert("crm_message", $data_array);
            $msgid = $this->db->insert_id();
            if ($_POST['fid'] > 1400000000) {
                $qq = $this->db->get_where("crm_notification", array("user_id" => $_POST["fid"]))->result();
                if (count($qq) > 0) {
                    if ($qq[0]->replay_msg != "") {
                        $this->db->update("crm_notification", array("body" => $qq[0]->replay_msg, "replay_msg" => $postMsg, "createdby" => $sessionData["user_id"]), array("ID" => $_POST["nid"]));
                    } else
                        $this->db->update("crm_notification", array("replay_msg" => $postMsg, "createdby" => $sessionData["user_id"]), array("ID" => $_POST["nid"]));
                }
                else {
                    $inputInsertData = array(
                        'type' => 'chatMsg',
                        'type_id' => $msgid,
                        'relatedTo' => '',
                        'org_id' => $sessionData['org_id'],
                        'user_id' => $_POST['fid'],
                        'notification_for' => '1',
                        'status' => '0',
                        'title' => 'Chat',
                        'body' => $postMsg,
                        'createdby' => $sessionData['user_id']
                    );

                    $this->db->insert("crm_notification", $inputInsertData);

                    $this->db->update("crm_notification", array("replay_msg" => $postMsg), array("ID" => $_POST["nid"]));
                }
            } else {
                $inputInsertData = array(
                    'type' => 'chatMsg',
                    'type_id' => $msgid,
                    'relatedTo' => '',
                    'org_id' => $sessionData['org_id'],
                    'user_id' => $_POST['fid'],
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'Chat',
                    'body' => $postMsg,
                    'createdby' => $sessionData['user_id']
                );

                $this->db->insert("crm_notification", $inputInsertData);

                $this->db->update("crm_notification", array("replay_msg" => $postMsg), array("ID" => $_POST["nid"]));
            }
            header('Content-type: application/json');
            echo json_encode(true);
        }
    }

    public function qrcNewMsgFile() {
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $postMsg = "";

            $myid = $_POST['mid'];
            $tempFID = $_POST['ffid'];
            $i = 0;

            foreach ($_FILES["fileinput"]["tmp_name"] as $key => $tmp_name) {
                $path = "./uploads/chat_attachment/";
                $attachment = $_FILES["fileinput"]["tmp_name"][$key];
                $attachment_path = $_FILES["fileinput"]["name"][$key];
                $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
                $attachment_new = (time() . $key . '.' . $attachment_ext);

                if (is_uploaded_file($attachment)) {
                    if (move_uploaded_file($attachment, $path . $attachment_new)) {
                        $postMsg = base_url("uploads/chat_attachment") . "/" . $attachment_new;

                        $msg = base64_encode($postMsg);

                        $data_array = array('sender_id' => $myid, 'msg' => $msg, 'status' => '', 'time' => date('Y-m-d H:i:s'));

                        if (!empty($msg)) { // if message empty, do nothing
                            $data_array['receiver_id'] = $tempFID;
                            $data_array['status'] = 1;

                            $this->db->insert("crm_message", $data_array);
                            $msgid = $this->db->insert_id();

                            $data['repmsg'] = "<a href='" . $postMsg . "' target='_blank' style='color:#1706ff'>" . $attachment_path . "</a>";

                            $inputInsertData = array(
                                'type' => 'chatMsg',
                                'type_id' => $msgid,
                                'relatedTo' => '',
                                'org_id' => $sessionData['org_id'],
                                'user_id' => $_POST['fuid'],
                                'notification_for' => '1',
                                'status' => '0',
                                'title' => 'Chat',
                                'body' => $data['repmsg'],
                                'createdby' => $sessionData['user_id']
                            );

                            $this->db->insert("crm_notification", $inputInsertData);
                            $this->db->update("crm_notification", array("replay_msg" => $data['repmsg']), array("ID" => $_POST["nid"]));
                            $i++;
                            header('Content-type: application/json');
                            echo json_encode($data);
                        }
                    }
                }
            }
        }
    }

    public function hasGroup() {
        $data = array();

        $pid = $_POST["id"] - 99999999;
        $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='$pid'")->result();
        $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '$pid'")->result();
        $allmember = $member[0]->member . "," . $createdby[0]->email;


        $result = $this->db->get_where("crm_message_group", array("group_id" => $_POST["id"]))->result();
        if (count($result) > 0) {
            $this->db->update("crm_message_group", array("group_name" => $_POST["name"], "group_member" => $allmember), array("group_id" => $_POST["id"]));
        } else {
            $this->db->insert("crm_message_group", array("group_id" => $_POST["id"], "group_name" => $_POST["name"], "group_member" => $allmember, "pid" => $pid));
        }
        $data["result"] = $allmember;
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function addupdategroupmember() {
        $allmember = "";
        $rrr = $_POST["contacts"];
        foreach ($rrr as $value) {
            $allmember .= $value['email'] . ",";
        }
        $allmember .= $_POST["mid"];
        $result = $this->db->get_where("crm_message_group", array("group_id" => $_POST["id"]))->result();
        if (count($result) > 0) {
            $this->db->update("crm_message_group", array("group_member" => $allmember), array("group_id" => $_POST["id"]));
        } else {
            $this->db->insert("crm_message_group", array("group_id" => $_POST["id"], "group_name" => "Everyone", "group_member" => $allmember));
        }

        header('Content-type: application/json');
        echo json_encode($allmember);
    }

}
