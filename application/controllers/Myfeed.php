<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	/*  
		*  @author : ITL
		*  29 Dec, 2016
	*/
	
	class Myfeed extends CI_Controller
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
			
			if ($this->session->userdata('admin_login') == 1)
            	$this->dashboard();
			
			if ($this->session->userdata('admin_login') != 1)
            	$this->load->view('login');
			
		}
	}
