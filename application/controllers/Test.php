  <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  04 Dec, 2016 
 */

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Common_model');
        $this->load->model('calendarmodel');
        $this->load->model("Crud_model");
        $this->load->model('Modulemodel'); // load Module model
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    public function index(){
        echo "Ok";
        $subquery = "select app_id FROM app_type WHERE type_id in (3,2,6) group by app_id HAVING COUNT(*) = 3";
        $search_app_query = $this->db
        ->select('*')
        ->from('app')
        ->join('app_type', 'app_type.app_id = app.id', 'left outer')
        ->join('app_formate', 'app_formate.app_id = app.id', 'left outer')      
        ->where_in('app.id',$subquery, FALSE)  
        ->where_in('app_formate.formate_id',array(1,3))
        ->where('app.ope_min <=',3)
        ->where('app.ope_max >=',3)    
        ->group_by("app.id", "desc")
        ->get()->result();

        print_r($search_app_query);
    }

}
