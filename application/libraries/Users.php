<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users {
 
    // push message title
    private $user_id;
    private $user_name;
    private $full_name;
    private $display_name;
    private $img;
    private $email;
    private $org_id;
    private $userArr = array();
 
    function __construct() {
         $CI =& get_instance();
    }

    public function getUser($org_id){
        $user_row_data = $CI->db->select("*")
                            ->from("crm_users")
                            ->where("org_id", $org_id)
                            ->get()
                            ->result();
        $prilist = array();
    }
 
    // public function setTitle($title) {
    //     $this->title = $title;
    // }
 
    // public function getPush() {
    //     $CI->db->get("crm_users")->;
    // }
 
}