<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : ITL
 * 	04 Dec, 2016
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('Email_model');
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {
        if ($this->session->userdata('admin_login') == 1) {
            redirect("dashboard", 'refresh');
        } else {
            $this->load->view('login');
        }
    }

    //signup
    public function signup($org_id, $email) {
        if ($this->session->userdata('admin_login') == 1) {
            redirect("dashboard", 'refresh');
        } else {
            $data["org_id"] = $org_id;
            $data["email"] = $email;
            $this->load->view('signup', $data);
        }
    }

    // submit signup newuser
    public function signupnewuser() {
        if ($this->session->userdata('admin_login') == 1) {
            redirect("dashboard", 'refresh');
        } else {
            $data = array();
            $data["status"] = true;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim');
            $this->form_validation->set_rules('ws', 'ws', 'required|trim');

            header('Content-type: application/json');
            if ($this->form_validation->run() == FALSE) {
                $data["status"] = validation_errors();
                echo json_encode($data);
            } else {
                $code = md5(time() . $_POST["email"]);
                $have_ws = $this->db->get_where("crm_workspace", array("workspace" => $_POST["ws"]))->result();
                if (count($have_ws) > 0) {
                    $already_user = $this->db->get_where("crm_users", array("user_name" => $_POST["email"]))->result();
                    if (count($already_user) == 0) {
                        $crm_users_data = array(
                            "user_name" => $_POST["email"],
                            "user_password" => md5($_POST["pass"]),
                            "full_name" => $_POST["name"],
                            "display_name" => $_POST["name"],
                            "org_id" => $_POST["ws"],
                            "email" => $_POST["email"],
                            "access_type" => "GUEST",
                            "status" => "INACTIVE",
                            "code" => $code,
                            "invited" => 1,
                        );
                        $this->db->insert("crm_users", $crm_users_data);

                        $str = "http://27.147.195.222:2241/nclive/login/active_login/" . $code;
                        $msg = "Please click on the link below to active your account.<br><br>" . $str;
                        $suc = $this->Email_model->do_email($_POST["email"], $_POST["name"], "Email verification", $msg, "mahfuzur_rahman@imaginebd.com");
                        if ($suc === true) {
                            $data["status"] = $suc;
                        }
                    } else {
                        $data["status"] = "You are already a Navigate user.";
                    }
                } else {
                    $data["status"] = "Illigal action!!!";
                }

                echo json_encode($data);
            }
        }
    }

    public function active_login($code) {
        $v = $this->db->get_where("crm_users", array("code" => $code))->result();
        if (count($v) == 1) {
            $this->db->update("crm_users", array("status" => "ACTIVE"));
            $this->db->insert("crm_workspace", array("user_id" => $v[0]->ID, "workspace" => $v[0]->org_id));
            $this->db->insert("crm_notification_setup", array("user_id" => $v[0]->ID));
            echo "Welcome to Navigate";
        } else {
            echo "Error activation link";
        }
    }

    //forgot password
    public function forgot() {
        if ($this->session->userdata('admin_login') == 1) {
            redirect("dashboard", 'refresh');
        } else {
            $this->load->view('forgot');
        }
    }

    // submit forgot password
    public function forgotpassword() {
        if ($this->session->userdata('admin_login') == 1) {
            redirect("dashboard", 'refresh');
        } else {
            $data = array();
            $data["status"] = true;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');

            header('Content-type: application/json');
            if ($this->form_validation->run() == FALSE) {
                $data["status"] = validation_errors();
                echo json_encode($data);
            } else {
                $result = $this->db->where("status", "ACTIVE")
                        ->where("user_name", $_POST["email"])
                        ->or_where("email", $_POST["email"])
                        ->get("crm_users")
                        ->result();
                if (count($result) == 1) {
                    $code = md5(time() . "/" . $result[0]->email);
                    $str = "http://27.147.195.222:2241/nclive/login/reset_pass/" . $result[0]->ID . "/" . $code;
                    $msg = "Please click on the link below to reset your password.<br><br>" . $str;
                    $suc = $this->Email_model->do_email($result[0]->email, $_POST["email"], "Password reset link", $msg);
                    if ($suc === true) {
                        $this->db->update("crm_users", array("code" => $code, "status" => "INACTIVE"), array("ID" => $result[0]->ID));
                    }
                    echo json_encode($data);
                } else {
                    $data["status"] = "Username or email address not found. Or user is inactive.";
                    echo json_encode($data);
                }
            }
        }
    }

    public function reset_pass($id, $code) {
        $res = $this->db->get_where("crm_users", array("ID" => $id, "code" => $code))->result();
        if (count($res) == 1) {
            $data["id"] = $id;
            $data["code"] = $code;
        } else {
            $data["id"] = "";
            $data["code"] = "";
            $data["error_log"] = "Error activation code";
        }
        $this->load->view('reset_pass', $data);
    }

    public function post_reset_pass() {
        $res = $this->db->get_where("crm_users", array("ID" => $_POST["id"], "code" => $_POST["code"]))->result();
        header('Content-type: application/json');
        if (count($res) == 1) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('new_password', 'New password', 'required|trim');
            $this->form_validation->set_rules('con_password', 'Confirm password', 'required|trim|matches[new_password]');

            if ($this->form_validation->run() == FALSE) {
                $data["id"] = $id;
                $data["code"] = $code;
                $data["status"] = validation_errors();
                echo json_encode($data);
            } else {
                $this->db->update("crm_users", array("user_password" => md5($_POST["new_password"]), "status" => "ACTIVE", "code" => ""), array("ID" => $_POST["id"], "code" => $_POST["code"]));
                $data["status"] = true;
                $data["email"] = $res[0]->user_name;
                $data["password"] = $_POST["new_password"];
                echo json_encode($data);
            }
        } else {
            $data["status"] = "Error activation code";
            echo json_encode($data);
        }
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $response['submitted_data'] = $_POST;
        $response['email'] = $email;
        $response['password'] = $password;

        //Validating login
        $login_status = $this->validate_login($email, $password);

        $response['login_status'] = $login_status;
        $response['name'] = $this->session->userdata('name');

        if ($login_status == 'success') {

            $response['redirect_url'] = base_url() . 'dashboard';
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($email = '', $password = '') {
        $credential = array('user_name' => $email, 'user_password' => md5($password), 'deleted' => 0, 'status' => 'ACTIVE');

        // Checking login credential for admin
        $query = $this->db->get_where('crm_users', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $newdata = array(
                'dob' => $row->dob,
                'accessType' => $row->access_type,
                'username' => $row->full_name,
                'logged_in' => TRUE,
                'org_id' => $row->org_id,
                'user_email' => $row->email,
                'user_img' => $row->img,
                'user_id' => $row->ID, // this is row id
                'redirectType' => 'NA',
                'sessionUrl' => 'NA',
                'tblType' => 'NA',
                'tdorod' => 'NA'
            );
            $this->load->library('user_agent');
            $logHistory["user_id"] = $newdata["user_id"];
            $logHistory["session_id"] = session_id();
            $logHistory["ip_address"] = $_SERVER['REMOTE_ADDR'];
            $logHistory["browser"] = $this->agent->browser();
            $newdata["session_id"] = $logHistory["session_id"];
            $this->db->insert("crm_login_history", $logHistory);

            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('yeezyCRM', $newdata);

            $curdate = date("Y-m-d");
            // $es = $this->db->get_where("crm_email_scheduler", array("user_id"=>$newdata["user_id"], "send_last_time"=>$curdate));
            // if($es->num_rows()){
            //     $this->db->update("crm_email_scheduler",array('flag_overdue'=>'0','flag_almostdue'=>'0','flag_odtodo'=>'0'), array('user_id'=>$newdata["user_id"]));
            // }

            $projectMem = $this->db->get_where("crm_notification_setup", array('user_id' => $newdata["user_id"]))->result();

            if ($projectMem[0]->overDue == 1) {
                $where = "user_id = '" . $newdata["user_id"] . "' AND ((flag_overdue ='0' AND send_last_time = '" . $curdate . "') OR (send_last_time <> '" . $curdate . "'))";
                $this->db->where($where);
                $result = $this->db->get("crm_email_scheduler");
                if ($result->num_rows() > 0) {
                    $body = "<br><br><b>We like to inform you that, Following task(s) were overdue: </b>";

                    $listOfTask1 = $this->getAllOverDueTask($newdata["org_id"], $newdata["user_id"]);

                    $body .= "<br><b>Task Name:</b><br>";
                    $nametask = "";
                    $i = 1;
                    $ebodyA = "";
                    if ($listOfTask1 == false) {
                        $ebodyA = "You have no task, which which already overdue without complete";
                    } else {
                        foreach ($listOfTask1 as $k => $v) {
                            $nametask .= $i . ". " . $v->projecttaskname . ". Project ID (<a href='" . site_url() . "'>" . $v->projectid . "</a>) <br>";
                            $i++;
                        }

                        $body .= $nametask;
                        $ebodyA = $body;
                    }

                    // if($this->Email_model->do_email($newdata["user_email"], $newdata["username"], "Overdue Tasklist", $ebodyA) == true){
                    //     $this->db->update("crm_email_scheduler",array('flag_overdue'=>'1') ,array('user_id'=>$newdata["user_id"]));
                    // } 
                    // else {
                    //     redirect($urlstr, 'refresh');
                    // }
                }
            }

            // if($projectMem[0]->almostDue == 1){
            //     if($this->Modulemodel->selectADSchduleDate($row[0]->ID,$curdate)){
            //         //echo "true";
            //         $bodyA = "<br><br><b>We like to inform you that, Following task(s) are almostdue: </b>";
            //         $listOfTaskA = $this->Modulemodel->getAllAlmostDueTask($row[0]->org_id,$row[0]->ID);
            //         $bodyA .= "<br><b>Task Name:</b><br>";
            //         $nametaskA = "";
            //         $i = 1;
            //         if($listOfTaskA == false){
            //             $nametask .= "Sorry, you have no task";
            //         }else{
            //             foreach($listOfTaskA as $k => $v){
            //                  //echo $v->projecttaskname."<br>";
            //                  //echo $v->projectid."<br>";
            //                  $nametaskA .= $i.". ".$v->projecttaskname.". Project ID (<a href='".site_url()."'>".$v->projectid."</a>) <br>";
            //                  $i++;
            //             }
            //         }
            //         $bodyA .= $nametaskA;
            //         $ebody = "";
            //         if($listOfTaskA == false){
            //             $ebody = "You have no task";
            //         }else{
            //             $ebody = $bodyA;
            //         }
            //         // if($this->sendEmailNotification($row[0]->email, "Almostdue Tasklist", $ebody) == 'done'){
            //         if($this->email_model->do_email($row[0]->email, $row[0]->full_name, "Almostdue Tasklist", $ebody) == true){
            //             $this->Modulemodel->updateOneData("crm_email_scheduler",array('flag_almostdue'=>'1') ,array('user_id'=>$row[0]->ID));
            //         }else{
            //             redirect($urlstr, 'refresh');
            //         }
            //     }
            // }
            return 'success';
        }


        return 'invalid';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password() {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password() {
        $resp = array();
        $resp['status'] = 'false';
        $email = $_POST["email"];
        $reset_account_type = '';
        //resetting user password here
        $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);

        // Checking credential for admin
        $query = $this->db->get_where('admin', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'admin';
            $this->db->where('email', $email);
            $this->db->update('admin', array('password' => $new_password));
            $resp['status'] = 'true';
        }
        // Checking credential for student
        $query = $this->db->get_where('student', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'student';
            $this->db->where('email', $email);
            $this->db->update('student', array('password' => $new_password));
            $resp['status'] = 'true';
        }
        // Checking credential for teacher
        $query = $this->db->get_where('teacher', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'teacher';
            $this->db->where('email', $email);
            $this->db->update('teacher', array('password' => $new_password));
            $resp['status'] = 'true';
        }

        // Checking credential for supervisor
        $query = $this->db->get_where('supervisor', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'supervisor';
            $this->db->where('email', $email);
            $this->db->update('supervisor', array('password' => $new_password));
            $resp['status'] = 'true';
        }


        // Checking credential for parent
        $query = $this->db->get_where('parent', array('email' => $email));
        if ($query->num_rows() > 0) {
            $reset_account_type = 'parent';
            $this->db->where('email', $email);
            $this->db->update('parent', array('password' => $new_password));
            $resp['status'] = 'true';
        }

        // send new password to user email  
        $this->email_model->password_reset_email($new_password, $reset_account_type, $email);

        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /* Get all over due task for last 7 days. */

    function getAllOverDueTask($org_id, $user_id) {
        $query = $this->db->query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '" . $user_id . "' WHERE cp.workspaces = '" . $org_id . "' AND (cp.opened_by = '" . $user_id . "' OR ct.userteamid = '" . $user_id . "') AND (cp.projecttaskprogress != '100') AND (cp.enddate >= DATE_SUB(CURDATE(), INTERVAL 365 DAY))");
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $sessionData = $this->session->userdata('yeezyCRM');
        $timedate = date("Y-m-d H:i:s");
        $this->db->update('crm_login_history', array('sign_out_time' => $timedate), array('session_id' => $sessionData["session_id"]));
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }

}
