<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_api_token'))
{
    /***************************************************************************
        check_api_token return true if user id and token match; else false
        required        id                  = user id (like 1, 2, 3 etc)
        required        APITOKEN            = APITOKEN
        
        return:
        true/ false

		this helper function call from header.php
    ****************************************************************************/
    function check_api_token($id, $APITOKEN){
    	$CI =& get_instance();

        $token = $CI->db->select("APITOKEN")
                        ->from("crm_users")
                        ->where("ID", $id)
                        ->where("APITOKEN", $APITOKEN)
                        ->get()->result();

        if(count($token)==1) return true;
        else return false;
    }
}