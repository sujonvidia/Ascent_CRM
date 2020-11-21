<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

	function deleteItem($table, $id) {
        
		$this->db->delete($table, $id);
		
		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function insertAttendance($class_id){
     	$query = $this->db->query("INSERT INTO attendance ( 
									      status, 
									      student_id, 
									      class_id,section_id) 
									SELECT '1', 
									       student_id, 
									       class_id,
									       section_id

									FROM student
									WHERE class_id = '".$class_id."'");
     
     if($this->db->affected_rows() > 0){
        //$insertID = $this->db->insert_id();
        //return $insertID;
        return ture;
      }
      else{
        return false;
      } 
    }

    function insertAttendanceHistory($class_id){
     	$query = $this->db->query("INSERT INTO attendance_history ( 
									      attendance_id, 
									      notify_email, 
									      notify_sms, 
									      class_id,
									      section_id,
									      student_id,
									      status) 
									SELECT attendance_id, 
									       notify_email, 
									       notify_sms, 
									       class_id,
									       section_id,
									       student_id,
									       status

									FROM attendance
									WHERE class_id = '".$class_id."'");
     
     if($this->db->affected_rows() > 0){
        //$insertID = $this->db->insert_id();
        //return $insertID;
        return ture;
      }
      else{
        return false;
      } 
    }

    function getAllStudent($class_id,$section_id){
	    $query = $this ->db->query("SELECT attn.*,stu.* FROM attendance as attn INNER JOIN student as stu ON stu.student_id = attn.student_id AND stu.section_id = attn.section_id AND  stu.class_id = '".$class_id."' AND stu.section_id = '".$section_id."'");

	    if ($query->num_rows())
	          return $query->result();
	      else
	          return false;
	  }

	function getAllStudentForReport($class_id,$section){
	    $query = $this ->db->query("SELECT stu.* FROM student as stu WHERE stu.class_id = '".$class_id."' AND stu.section_id = '".$section."'");

	    if ($query->num_rows())
	          return $query->result();
	      else
	          return false;
	}

	function delAttnByClassId($class_id,$curyear,$curmon,$curday) {
    
	    $this -> db -> query("DELETE FROM attendance WHERE class_id = '".$class_id."' AND (DATEPART(yy, date) != ".$curyear." AND DATEPART(mm, date) != ".$curmon." AND DATEPART(dd, date) != ".$curday.")");
	    // DELETE FROM attendance WHERE class_id = '2' AND date < DATEADD(DAY, DATEDIFF(DAY, 0, GETDATE()), -1)
	    if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }        
   	}

   	function selectDate($class_id,$curyear,$curmon,$curday){
	    $query = $this -> db -> query("SELECT * FROM attendance WHERE class_id = '".$class_id."' AND (DATEPART(yy, date) = ".$curyear." AND DATEPART(mm, date) = ".$curmon." AND DATEPART(dd, date) = ".$curday.")");
	    
	    if ($query->num_rows())
	            return true;
	        else{
	            if($this->insertAttendanceHistory($class_id) == true){
	            	return false;
	            }else{
	            	return false;
	            }
	            
	        }
	}

	function getMyclass($teacher_id){
		$query = $this -> db -> query("SELECT * FROM class WHERE teacher_id = '".$teacher_id."'");
	    
	    if ($query->num_rows())
	            return $query->result();
	        else
	            return false;
	}

	function insertbatchinto($table, $data){
      $this->db->insert_batch($table, $data);
      if($this->db->affected_rows() > 0){
        return TRUE;
      }
      else{
        return false;
      }
    }

    function StudentAttendanceForReport($class_id,$year_id,$month_id){
    	$query = $this->db->query("SELECT * FROM attendance_history WHERE class_id = '".$class_id."' AND (DATEPART(yy, date) = ".$year_id." AND DATEPART(mm, date) = ".$month_id.")");
    	if ($query->num_rows())
	          return $query->result();
	      else
	          return false;
    }

     function getAllUsersWithoutMe($id) {
        $query = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$id."'");
        return $query->result();
    }

    function getGroupList() {

        $q = $this->db->query("SELECT groupid as ID , groupname as group_name FROM `crm_groups`");
        // $q = $this->db->query("SELECT groupid as ID , groupname as group_name FROM `crm_groups`");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
	
	 function insertData($table = FALSE, $data = FALSE) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else
            return false;
    }
	
	function getAll($table, $array = NULL, $ordercol = NULL) {
      if($ordercol != NULL){
          $this->db->order_by($ordercol, "asc");
        }
        $query = $this->db->get_where($table, $array);

        return $query->result();
    }

     function getMyCalendarRange($user_id,$start_date,$end_date) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID 
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (p.user_id=" . $user_id . ") GROUP BY p.ID";

            file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function selectMyTaskRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date){ 
        $str_qry="SELECT pt.`this_type` as type,pt.*,ctl.`name` as tlname,
        pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,p.`projectname` as projectname,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`calendar_id` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p , crm_tasklist as ctl
        
        WHERE DATE_FORMAT(pt.`startdate`, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pt.`enddate`, '%Y-%m-%d') >= '".$start_date."' AND pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND ctl.`inputDiv` = pt.`tasklistID`   AND pt.`this_type` = 'task' AND p.`projectid` = pt.`projectid` AND pt.`workspaces` = '$orgid' AND pt.`opened_by` = '$userid'";
      $query = $this->db->query($str_qry);

      file_put_contents("filenameselectMyTask.txt", $str_qry);

      return $query->result();
    }

    function getOtherCalendarRange($user_id,$start_date,$end_date) {
        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (pt.user_id=" . $user_id . ") GROUP BY p.ID";

        $q = $this->db->query($qry);
        if ($q->num_rows()) return $q->result();
        else return false;
    }

    function selectOtherTaskRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date){ 
      $query = $this->db->query("SELECT 'task' as type,pt.*,
        pt.startdate as start,pt.enddate as end,pt.projecttaskname title,p.`projectname` as projectname,p.`projectid` as id,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`calendar_id` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p, crm_tag AS ctag
        WHERE DATE_FORMAT(pt.startdate, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pt.enddate, '%Y-%m-%d') >= '".$start_date."' AND ctag.`type` = 'task' AND pt.`this_type` = 'task' AND ctag.`relatedto` = pt.`projectid` AND ctag.`relateTask` = pt.`projecttaskid` AND pt.startdate > '0000-00-00' AND pt.enddate > '0000-00-00' AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND ctag.`userteamid` = '$userid'");
      return $query->result();
    }

    function getMyCalendar($user_id) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where MONTH(pd.start_date) = MONTH(CURDATE()) AND (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (p.user_id=" . $user_id . ") GROUP BY p.ID";

            file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }


}

?>