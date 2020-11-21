<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  04 Dec, 2016
 */

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('directory');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Modulemodel');
        $this->load->model('Common_model');
        $this->load->model('Calendarmodel');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {


        if ($this->session->userdata('admin_login') == 1)
            $this->dashboard();

        if ($this->session->userdata('admin_login') != 1)
            $this->load->view('login');
    }

    /*     * *Blnak** */

    public function blank() {


        $page_data['page_name'] = 'blank';
        $page_data['page_title'] = 'blank';


        //$page_data['module_files'] = $this->dir_to_array(base_url() . 'uploads');
        $this->load->view('blank', $page_data);
    }

    function getPreferences() {
        $sessionData = $this->session->userdata('yeezyCRM');
        $result = $this->db->select("crm_user_preferences")
                ->get_where("crm_users", array("ID" => $sessionData['user_id']))
                ->result();
        header('Content-type: application/json');
        echo json_encode($result[0]->crm_user_preferences);
    }

    function setPreferences() {
        $sessionData = $this->session->userdata('yeezyCRM');
        $result = $this->db->set("crm_user_preferences", $_POST["leftMenu"])
                ->where("ID", $sessionData['user_id'])
                ->update("crm_users");
        header('Content-type: application/json');
        echo json_encode($result);
    }

    /*     * *DASHBOARD** */

    function dashboard() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        
        
        $page_data['acessType'] = $sessionData['accessType'];
        $page_data['id'] = $sessionData['user_id'];
        $page_data['org_id'] = $sessionData['org_id'];
        $page_data['username'] = $sessionData['username'];
        $page_data['user_img'] = $sessionData['user_img'];
        $page_data['user_email'] = $sessionData['user_email'];

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = 'Navcon :: Dashboard';

        $page_data['DashboardEvents'] = $this->Calendarmodel->getDashboardCalendar($page_data['id'], $page_data['org_id'], 'Event');

        $page_data['allcategory'] = $this->Modulemodel->getAll("crm_category", array('workspace' => $sessionData['org_id']));
        $page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();
        $page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();
        $page_data['alluser'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'], $page_data['org_id']);
        $page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'], $page_data['org_id']);


        $this->load->view('index', $page_data);
    }

    /*     * *ADMIN DASHBOARD** */

    function todo() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');

        $page_data['acessType'] = $sessionData['accessType'];
        $page_data['id'] = $sessionData['user_id'];
        $page_data['org_id'] = $sessionData['org_id'];
        $page_data['username'] = $sessionData['username'];
        $page_data['user_img'] = $sessionData['user_img'];
        $page_data['user_email'] = $sessionData['user_email'];

        $page_data['page_name'] = 'todo';
        $page_data['page_title'] = 'Navcon :: Todo';



        $this->load->view('index', $page_data);
    }

    public function getDashboardTodos() {
        if ($this->session->userdata('admin_login') == 1) {
            if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');

            $sessionData = $this->session->userdata('yeezyCRM');

            $page_data['acessType'] = $sessionData['accessType'];
            $page_data['id'] = $sessionData['user_id'];
            $page_data['org_id'] = $sessionData['org_id'];
            $page_data['username'] = $sessionData['username'];
            $page_data['user_img'] = $sessionData['user_img'];
            $page_data['user_email'] = $sessionData['user_email'];

            $page_data['page_name'] = 'todo';
            $page_data['page_title'] = 'Navcon :: Todo';


            $json = $this->Calendarmodel->getDashboardCalendar($page_data['id'], $page_data['org_id'], 'Todo');

            header('Content-type: application/json');
            echo json_encode($json);
        }else {
            $this->load->view('login');
        }
    }

}
