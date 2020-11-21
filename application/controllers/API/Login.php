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

    public function signin() {
        
        $response = array();
        
        $email =  $this->input->post('email'); 
        $password =  $this->input->post('password');
        $GCM =  $this->input->post('GCM');
        
        
        //Validating login
        $login_status = $this->validate_login($email, $password);
        
        if ($login_status == 'success') {
			
            $logHistory["APITOKEN"] = 'YZY'.time();
            $logHistory["GCMID"] = $GCM;
			
            $result = $this->db->get_where("crm_users", array("APITOKEN"=>$logHistory["APITOKEN"]))->result();
            
            if(count($result) > 0){
                $this->db->update("crm_users", $logHistory, array("user_name"=>$email));
                
                //do nothing
            }else{
                $this->db->update("crm_users", $logHistory, array("user_name"=>$email));
            }

            $gcmid["GCMID"] = '';
            $where = "user_name != '".$email."' AND user_password !='".$password."' AND GCMID = '".$GCM."'";
            $this->db->where($where);
            $this->db->update("crm_users", $gcmid);

            $response['login_status'] = $login_status;
            $response['status'] = 'true';
            $response['message'] = 'Login successfully';
            $response['APITOKEN'] = $logHistory["APITOKEN"];
            $response['user'] = $this->session->userdata('yeezyCRM');
            
        
        }else{
            $response['status'] = 'false';
            $response['message'] = 'Not authenticated';
            $response['code'] = 401;
        }

        header('Content-type: application/json');
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
                'username'  => $row->full_name,
                'logged_in' => TRUE,
                'org_id' => $row->org_id,
                'user_email' => $row->email,
                'full_name' => $row->full_name,
                'display_name' => $row->display_name,
                'user_img' => $row->img,
                'user_id' => $row->ID, // this is row id
                'redirectType'=>'NA',
                'sessionUrl' => 'NA',
                'tblType' => 'NA',
                'tdorod' => 'NA',
                'activated' => $row->status

            );

            $this->load->library('user_agent');
            
            $logHistory["user_id"] = $newdata["user_id"];
            $logHistory["ip_address"] = $_SERVER['REMOTE_ADDR'];
            $logHistory["browser"] = $this->agent->browser();
            
            $newdata["device"] = $this->agent->mobile();
            
            $this->db->insert("crm_login_history", $logHistory);
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('yeezyCRM',$newdata);

            $curdate = date("Y-m-d");
            
            return 'success';
        }
        return 'invalid';
    }

    /* * *****LOGOUT FUNCTION ***** * */

    function logout() {
        $response = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $timedate = date("Y-m-d H:i:s");
        if($this->db->update('crm_login_history', array('sign_out_time' => $timedate), array('session_id' => $this->input->post('APITOKEN'))))
            {
                $status = $this->session->sess_destroy();

            }else{
                $status = 1;
            }
        
        if($status == ""){
            $response['status'] = "True";
        }else{
            $response['status'] = "False";
        }
        header('Content-type: application/json');
        echo json_encode($response);
    }

}
