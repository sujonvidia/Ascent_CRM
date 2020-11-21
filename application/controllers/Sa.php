<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author : ITL
 *  06 Dec, 2016
 */

class Sa extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
        $this->load->helper('directory');
		$this->load->database();
        $this->load->library('session');
         
		$this->load->model('Common_model');
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');
            
        // $sessionData = $this->session->userdata('yeezyCRM');
        
        // $page_data['acessType'] = $sessionData['accessType'];
        // $page_data['id'] = $sessionData['user_id'];
        // $page_data['org_id'] = $sessionData['org_id'];
        // $page_data['username'] = $sessionData['username'];
        // $page_data['user_img'] = $sessionData['user_img'];
        // $page_data['user_email'] = $sessionData['user_email'];
        
        // $page_data['page_name']  = 'workspace';
        // $page_data['page_title'] = 'Workspace';
        
        // /* delete all temporary invitation from workspace table */
        // $this->db->query("DELETE FROM crm_workspace WHERE (abs(user_id) = 0 AND abs(user_id) = '0') AND `last_update` <= NOW() - INTERVAL 3 DAY");

        // $this->load->view('workspace/index', $page_data);
    }

    public function backup_restore(){
        if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');
            
        $sessionData = $this->session->userdata('yeezyCRM');
        
        $page_data['acessType'] = $sessionData['accessType'];
        $page_data['id'] = $sessionData['user_id'];
        $page_data['org_id'] = $sessionData['org_id'];
        $page_data['username'] = $sessionData['username'];
        $page_data['user_img'] = $sessionData['user_img'];
        $page_data['user_email'] = $sessionData['user_email'];
        
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = 'Navcon :: Backup & Restore';
        
        $this->load->view('sa/backup_restore', $page_data);
    }


    public function user_management(){
        if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');
            
        $sessionData = $this->session->userdata('yeezyCRM');
        
        $page_data['acessType'] = $sessionData['accessType'];
        $page_data['id'] = $sessionData['user_id'];
        $page_data['org_id'] = $sessionData['org_id'];
        $page_data['username'] = $sessionData['username'];
        $page_data['user_img'] = $sessionData['user_img'];
        $page_data['user_email'] = $sessionData['user_email'];
        
        $page_data['page_name']  = 'user_management';
        $page_data['page_title'] = 'Navcon :: User Management';
        
        $this->load->view('sa/user_management', $page_data);
    }
}
