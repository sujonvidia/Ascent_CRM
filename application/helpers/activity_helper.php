<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
{
	function convertToBase64($path)
		{
		// $path = FCPATH.$path;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		return $base64;
		}
}

if (!function_exists('tableConfig'))
{
	function tableConfig($tableName = false,$activityType = false,$data = false,$orgID){
    	switch($tableName){
    		case 'crm_project':
    							
                                if($activityType == 'Insert'){
    								
                                    $msg = 'New Project added: <a href="'.site_url().$orgID.'.com/yzy-projects/index/projects'.'">'.$data['projectname'].'</a>';
    								return $msg;
    								break;
    							}elseif($activityType == 'Delete'){
    								$msg = "Project Deleted";
    								return $msg;
    								break;
    							}elseif($activityType == 'Update'){
    								$msg = "Project Updated";
    								return $msg;
    								break;
    							}

    		case 'crm_tasklist':
    							if($activityType == 'Insert'){
    								$msg = 'New Tasklist added: <a href="'.site_url().'yzy-projects/index/newPro/'.$data["inputDiv"].'/'.$data["related_to"].'">'.$data["name"].'</a>';
    								return $msg;
    								break;
    							}elseif($activityType == 'Delete'){
    								$msg = "Tasklist Deleted";
    								return $msg;
    								break;
    							}elseif($activityType == 'Update'){
    								$msg = "Tasklist Updated";
    								return $msg;
    								break;
    							}

    		case 'crm_projecttask':
    							if($activityType == 'Insert'){
                                    $msg = 'New Task added';
    								// $msg = 'New Task added: <a href="'.site_url().'yzy-projects/index/newPro/'.$data["inputDiv"].'/'.$data["related_to"].'">'.$data["name"].'</a>';
    								return $msg;
    								break;
    							}elseif($activityType == 'Delete'){
    								$msg = "Task Deleted";
    								return $msg;
    								break;
    							}elseif($activityType == 'Update'){
    								$msg = "Task Updated";
    								return $msg;
    								break;
    							}
    		
    	}
    }
}
?>