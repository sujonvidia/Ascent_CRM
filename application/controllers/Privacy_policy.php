<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  04 Dec, 2016
 */

class Privacy_policy extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('directory');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {
        // $this->load->view('google_privacy_policy');
        $this->load->view('slack_privacy_policy');
    }
}
