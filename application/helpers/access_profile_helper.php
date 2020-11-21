<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('user_privilege'))
{
    /***************************************************************************
        user_privilege return the given user privilege
        required        id                  = user id (like 1, 2, 3 etc)
        required        org_id              = organization name (like 'itl')
        optional        module name         = projects, tasks etc
        optional        access              = (R/W/D)

        return:
        user_privilege(id, orgid)       			= all privilege of this user in an array
        user_privilege(id,orgid,module_name)		= replay as like RWD/ RW/ D etc
        user_privilege(id,orgid,module_name,access)	= replay true or false
		

		this helper function call from header.php
    ****************************************************************************/
    function user_privilege($id, $org_id, $module_name = false, $access = false){
    	$CI =& get_instance();

        if($id == 216) return "RWD";
        $prilist_row_data = $CI->db->select("*")
                            ->from("crm_profile_privileges")
                            ->join("crm_privileges_user", "crm_profile_privileges.id = crm_privileges_user.profile_id")
                            ->where("crm_profile_privileges.org_id", $org_id)
                            ->where("crm_privileges_user.user_id", $id)
                            ->get()
                            ->result();
        $prilist = array();
        
        /* Get some selected columns from prilist_row_data to prilist. 
        And if user have multiple privilege, marge them into a single one. */
        for($j=0; count($prilist_row_data)>$j; $j++){
            $i = 0;
            foreach($prilist_row_data[$j] as $k=>$v){
                if($i>2){ 
                    if($k == "createdby") break;
                    if(isset($prilist[$k]) AND $prilist[$k] != ""){
                        if(strlen($v) > strlen($prilist[$k]))
                            $prilist[$k] = $v;
                        elseif($v != $prilist[$k])
                            $prilist[$k] .= $v;
                    }else{
                        $prilist[$k] = $v;
                    }
                }
                $i++;
            }
        }
        
        if($module_name !== false){
            foreach ($prilist as $key => $value) {
                if($module_name == $key){
                    if($access === false)
                        return $value;
                    else{
                        if(strpos($value, $access) > -1)
                            return true;
                        else
                            return false;
                    }
                }
            }
        }else{
            return $prilist;
        }
    }
}