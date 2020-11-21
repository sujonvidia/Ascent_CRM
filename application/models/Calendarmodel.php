<?php

class Calendarmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertData($table = FALSE, $data = FALSE) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else
            return false;
    }

    function updateData($table = FALSE, $data = FALSE, $where_id = FALSE) {
        //echo "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
        $this->db->update($table, $data, $where_id);
        if ($this->db->affected_rows() > 0) {

            return true;
        } else
            return false;
    }

    function getPostDetail($user_id, $post_id) {

        $q = $this->db->query("SELECT p.*,pd.* from post as p JOIN `post_details` as pd on p.ID = pd.post_id  WHERE p.ID = '" . $post_id . "'");
        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function selectPostData($data) {


        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (p.user_id=" . $data['id'] . " or pt.user_id=" . $data['id'] . ") GROUP BY p.ID";

        $q = $this->db->query($qry);

        $rrr = $q->result();

        //echo "<pre>";echo print_r(array_merge_recursive($rrr, $new_array));echo "</pre>";

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getMyTodoHD($user_id,$orgid,$order,$sortname) {
        $sortcolumn=$sortname;
       $qry = "SELECT  (SELECT GROUP_CONCAT(ctag.userid) 
       FROM crm_tagHD ctag 
       WHERE ctag.`RelatedTo` = pt.Id and ctag.UserStatus = 2
       GROUP BY pt.Id 
       ) AS mem_ids,
       GROUP_CONCAT(ctag.`UserStatus`) as UserStatus,
       pt.*,cr.*,cat.*,ccd.*,ctag.`status_chat`,ctag.`status_attach`,
       ctag.userid as tag_userid,
       GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
       GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
       GROUP_CONCAT(ca.`repeat` SEPARATOR ';') as alarm_repeat,
       GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
       GROUP_CONCAT(ctag.userid) as tag_ids,

       pt.`Type` as type,
       cusr.full_name as creator_name,
       pt.`Startdate` as start,
       pt.`Enddate` as end,
       pt.`Title` as title,
       pt.`Priority` as priority,
       pt.`Id` as cal_id

       FROM crm_activity AS pt 
       left join crm_tagHD ctag on ctag.RelatedTo = pt.Id 
       left join calendar_exception ce on ce.post_id=pt.Id
       left join calendar_recur cr on cr.post_id=pt.Id
       left join calendar_alarm ca on ca.post_id=pt.Id
       left join crm_category cat on cat.id=pt.HasCategoryId
       left join crm_users cusr on cusr.ID=pt.CreatedBy
       left join crm_contactdetails ccd on ccd.contactid=pt.HasClient

       WHERE (pt.`Type` = 'Todo' AND pt.`Workspaces`= '$orgid') 
       AND (pt.`CreatedBy` = '$user_id' OR ctag.`userid` = '$user_id')";

       if($sortname=="Incomplete"){
        $qry .= " AND pt.`Status` <> 'completed' ";
        $sortcolumn='Title';
       }elseif($sortname=="Completed"){
        $qry .= " AND pt.`Status` = 'completed' ";
        $sortcolumn='Title';
       }elseif($sortname=="CreatedDate"){
        $sortcolumn='CreatedDate';
       }else{
         $sortcolumn='Title';
       }
       
       $qry .=" GROUP BY pt.Id 
       ORDER BY pt.`$sortcolumn` $order";

       file_put_contents("temp/getMyTodoHD.txt", $qry);

       $q = $this->db->query($qry);

       $arr=array();
       if ($q->num_rows()){


        return $q->result();


    }else{
        return false;
    }
}

function getTodoHDByID($todo_serial) {

     $qry = "SELECT pt.*,cr.*,cat.*,ccd.*,ctag.status_chat,ctag.status_attach,
     ctag.userid as tag_userid,
     GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
     GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
     GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
     GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
     GROUP_CONCAT(ctag.userid) as tag_ids,
     GROUP_CONCAT(IF(ctag.UserStatus = 2, ctag.userid, null)) as mem_ids,
     GROUP_CONCAT(ctag.UserStatus) as UserStatus,
     pt.`Type` as type,
     cusr.full_name as creator_name,
     pt.`Startdate` as start,
     pt.`Enddate` as end,
     pt.`Title` as title,
     pt.`Priority` as priority,
     pt.`Id` as cal_id

     FROM crm_activity AS pt 
     left join crm_tagHD ctag on ctag.RelatedTo = pt.Id and ctag.Type = 'Todo'
     left join calendar_exception ce on ce.post_id=pt.Id
     left join calendar_recur cr on cr.post_id=pt.Id
     left join calendar_alarm ca on ca.post_id=pt.Id
     left join crm_category cat on cat.id=pt.HasCategoryId
     left join crm_users cusr on cusr.ID=pt.CreatedBy
     left join crm_contactdetails ccd on ccd.contactid=pt.HasClient

     WHERE (pt.`Id` = '$todo_serial') GROUP BY pt.Id";

     $q = $this->db->query($qry);

     $arr=array();
     if ($q->num_rows()){
        return $q->result();
        
    }else{
        return false;
    }
}

function getDashboardCalendar($user_id,$orgid,$type) {


     $qry = "SELECT pt.*,cr.*,cat.*,ccd.*,ctag.status_chat,ctag.status_attach,
     ctag.userid as tag_userid,
     GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
     GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
     GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
     GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
     GROUP_CONCAT(ctag.userid) as tag_ids,
     GROUP_CONCAT(ctag.UserStatus) as UserStatus,
     pt.`Type` as type,
     cusr.full_name as creator_name,
     pt.`Startdate` as start,
     pt.`Enddate` as end,
     pt.`Title` as title,
     pt.`Priority` as priority,
     pt.`Id` as cal_id

     FROM crm_activity AS pt 
     left join crm_tagHD ctag on ctag.RelatedTo = pt.Id and ctag.Type = '$type'
     left join calendar_exception ce on ce.post_id=pt.Id
     left join calendar_recur cr on cr.post_id=pt.Id
     left join calendar_alarm ca on ca.post_id=pt.Id
     left join crm_category cat on cat.id=pt.HasCategoryId
     left join crm_users cusr on cusr.ID=pt.CreatedBy
     left join crm_contactdetails ccd on ccd.contactid=pt.HasClient

     WHERE (pt.`Type` = '$type' AND pt.`Workspaces`= '$orgid') 
     AND (pt.`CreatedBy` = '$user_id' OR ctag.`userid` = '$user_id')
     GROUP BY pt.Id 
     ORDER BY (pt.`Enddate`)";

     $q = $this->db->query($qry);

     if ($q->num_rows()){
        return $q->result();
    }else{
        return false;
    }
}
    
	// function getDashboardEvent($user_id,$orgid) {

 //        $qry = "SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,GROUP_CONCAT(ctag.userteamid) as tag_ids,pt.`this_type` as type,pt.*,cr.*,
 //            pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
 //        FROM crm_projecttask AS pt 
 //        left join crm_tag ctag on ctag.relateTask = pt.projecttaskid and ctag.type = 'event'
 //        left join calendar_exception ce on ce.post_id=pt.projecttaskid
 //        left join calendar_recur cr on cr.post_id=pt.projecttaskid
 //        left join calendar_alarm ca on ca.post_id=pt.projecttaskid
 //        WHERE pt.`checked`='NO' AND pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND MONTH(pt.`startdate`) = MONTH(CURDATE()) AND pt.`workspaces` = '$orgid' AND pt.`this_type` = 'event' AND pt.`opened_by` = '$user_id' GROUP BY pt.projecttaskid ORDER BY UNIX_TIMESTAMP(pt.`startdate`) DESC";
 //        //file_put_contents("temp/filenamegetdashboardevent.txt", $qry);
 //        $q = $this->db->query($qry);

 //        if ($q->num_rows())
 //            return $q->result();
 //        else
 //            return false;
 //    }

    function getDashboardEventHD($user_id,$orgid) {

        $qry = "SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,GROUP_CONCAT(ctag.userteamid) as tag_ids,pt.`this_type` as type,pt.*,cr.*,
            pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt 
        left join crm_tag ctag on ctag.relateTask = pt.projecttaskid and ctag.type = 'event'
        left join calendar_exception ce on ce.post_id=pt.projecttaskid
        left join calendar_recur cr on cr.post_id=pt.projecttaskid
        left join calendar_alarm ca on ca.post_id=pt.projecttaskid
        WHERE pt.`checked`='NO' AND pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND MONTH(pt.`startdate`) = MONTH(CURDATE()) AND pt.`workspaces` = '$orgid' AND pt.`this_type` = 'event' AND pt.`opened_by` = '$user_id' GROUP BY pt.projecttaskid ORDER BY UNIX_TIMESTAMP(pt.`startdate`) DESC";
        //file_put_contents("temp/filenamegetdashboardevent.txt", $qry);
        $q = $this->db->query($qry);

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getMyTodo($user_id,$orgid) {

     $qry = "SELECT pt.*,ctag.userid as tag_userid,GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,GROUP_CONCAT(ctag.userid) as tag_ids,pt.`this_type` as type,cr.*,cat.*,GROUP_CONCAT(ctag.UserStatus) as UserStatus,cusr.full_name as creator_name,
     pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
     FROM crm_projecttask AS pt 
     left join crm_tagHD ctag on ctag.RelatedTo = pt.projecttaskid and ctag.Type = 'Todo'
     left join calendar_exception ce on ce.post_id=pt.projecttaskid
     left join calendar_recur cr on cr.post_id=pt.projecttaskid
     left join calendar_alarm ca on ca.post_id=pt.projecttaskid
     left join crm_category cat on cat.id=pt.category_id
     left join crm_users cusr on cusr.ID=pt.opened_by
    
     WHERE (pt.`workspaces` = '$orgid' AND pt.`this_type` = 'todo') AND (pt.`opened_by` = '$user_id' OR ctag.`userid` = '$user_id') GROUP BY pt.projecttaskid ORDER BY UNIX_TIMESTAMP(pt.`enddate`) DESC";

     //file_put_contents("temp/filenamemytodo.txt", $qry);

     $q = $this->db->query($qry);
     
     $arr=array();
     if ($q->num_rows()){

        
        return $q->result();
        // foreach ($q->result() as $key => $value)
        // {

        //     $arr[$value->projecttaskid]=$value; // access attributes

        // }
        // return $arr;

    }else{
        return false;
    }
}





function getMyTodoUsersAsg($user_id,$orgid,$order) {

     $qry = "SELECT * FROM crm_tagHD ctag,crm_users cusr  where ctag.Type='Todo' and cusr.ID=ctag.userid and cusr.org_id='$orgid' GROUP BY ctag.userid ORDER BY cusr.full_name $order";

     //file_put_contents("temp/filenamemytodousers.txt", $qry);

     $q = $this->db->query($qry);


     if ($q->num_rows()){
        return $q->result();
    }else{
        return false;
    }
}

function getTodoByID($serial,$user_id,$orgid) {

     $qry = "SELECT pt.*,cr.*,cat.*,ccd.*,ctag.status_chat,ctag.status_attach,
     ctag.userid as tag_userid,
     GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
     GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
     GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
     GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
     GROUP_CONCAT(ctag.userid) as tag_ids,
     GROUP_CONCAT(ctag.UserStatus) as UserStatus,
     pt.`Type` as type,
     cusr.full_name as creator_name,
     pt.`Startdate` as start,
     pt.`Enddate` as end,
     pt.`Title` as title,
     pt.`Priority` as priority,
     pt.`Id` as cal_id

     FROM crm_activity AS pt 
     left join crm_tagHD ctag on ctag.RelatedTo = pt.Id and ctag.Type = 'Todo'
     left join calendar_exception ce on ce.post_id=pt.Id
     left join calendar_recur cr on cr.post_id=pt.Id
     left join calendar_alarm ca on ca.post_id=pt.Id
     left join crm_category cat on cat.id=pt.HasCategoryId
     left join crm_users cusr on cusr.ID=pt.CreatedBy
     left join crm_contactdetails ccd on ccd.contactid=pt.HasClient

     WHERE (pt.`Workspaces` = '$orgid' AND pt.`Type` = 'Todo') AND (pt.`CreatedBy` = '$user_id' OR ctag.`userid` = '$user_id') AND pt.`Id` = '$serial' GROUP BY pt.Id ORDER BY UNIX_TIMESTAMP(pt.`Enddate`)";

     //file_put_contents("temp/filenamemytodo.txt", $qry);

     $q = $this->db->query($qry);


     if ($q->num_rows()){
        return $q->result();
    }else{
        return false;
    }
}

    function getMyTodoByID($user_id,$todo_id) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID
            where (p.`type` LIKE 'todo') AND (p.`type` LIKE 'todo') AND (p.`ID`=" . $todo_id . " or pt.user_id=" . $user_id . ") GROUP BY p.ID";

            //file_put_contents("filenamemytodo.txt", $qry);

        $q = $this->db->query($qry);

        
        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
	
	
	function getMyCalendarNew($user_id,$viewname) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where DATE_FORMAT(pd.start_date, '%M %Y') = '$viewname' AND (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (p.user_id=" . $user_id . ") GROUP BY p.ID";

            //file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
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

            //file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    function getMyEventRange($user_id,$start_date,$end_date) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID 
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'event') AND (p.user_id=" . $user_id . ") GROUP BY p.ID";

            //file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    function getMyTodoRange($user_id,$start_date,$end_date) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID 
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND ( p.`type` LIKE 'todo') AND (p.user_id=" . $user_id . ") GROUP BY p.ID";

            //file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
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
    function getOtherEventRange($user_id,$start_date,$end_date) {
        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'event') AND (pt.user_id=" . $user_id . ") GROUP BY p.ID";

        $q = $this->db->query($qry);
        if ($q->num_rows()) return $q->result();
        else return false;
    }
    function getOtherTodoRange($user_id,$start_date,$end_date) {
        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'todo') AND (pt.user_id=" . $user_id . ") GROUP BY p.ID";

        $q = $this->db->query($qry);
        if ($q->num_rows()) return $q->result();
        else return false;
    }

     function getCalendarEventRange($user_id,$start_date,$end_date) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID 
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'event') GROUP BY p.ID";

            //file_put_contents("filenamegetEventRange.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getCalendarTodoRange($user_id,$start_date,$end_date) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
            from post p
            left join post_details pd on p.ID = pd.post_id 
            left join calendar_exception ce on ce.post_id=p.ID
            left join calendar_recur cr on cr.post_id=p.ID
            left join calendar_alarm ca on ca.post_id=p.ID
            left join post_tag pt on pt.post_id=p.ID 
            where pd.start_date > '0000-00-00' AND pd.end_date > '0000-00-00' AND DATE_FORMAT(pd.start_date, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pd.end_date, '%Y-%m-%d') >= '".$start_date."' AND (p.`type` LIKE 'todo') GROUP BY p.ID";

            //file_put_contents("filenamegetEventRange.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    
    
	function getOtherCalendarNew($user_id,$viewname) {
        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where DATE_FORMAT(pd.start_date, '%M %Y') = '$viewname' AND (p.`type` LIKE 'event' or p.`type` LIKE 'todo') AND (pt.user_id=" . $user_id . ") GROUP BY p.ID";

        $q = $this->db->query($qry);
        if ($q->num_rows()) return $q->result();
        else return false;
    }
    
    function selectMyTask($data = FALSE,$userid = FALSE){ 
        $str_qry="SELECT pt.`this_type` as type,pt.*,ctl.`name` as tlname,
        pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,p.`projectname` as projectname,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p , crm_tasklist as ctl
        
        WHERE pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND MONTH(pt.`startdate`) = MONTH(CURDATE()) AND ctl.`inputDiv` = pt.`tasklistID`   AND pt.`this_type` = 'task' AND p.`projectid` = pt.`projectid` AND pt.`workspaces` = '".$data['org_id']."' AND pt.`opened_by` = '".$data['id']."'";
      $query = $this->db->query($str_qry);

      //file_put_contents("filenameselectMyTask.txt", $str_qry);

      return $query->result();
    }
	// function selectMyTaskNew($orgid = FALSE,$userid = FALSE,$viewname){ 
 //        $str_qry="SELECT pt.`this_type` as type,pt.*,ctl.`name` as tlname,
 //        pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,p.`projectname` as projectname,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
 //        FROM crm_projecttask AS pt, crm_project AS p , crm_tasklist as ctl
        
 //        WHERE DATE_FORMAT(pt.`startdate`, '%M %Y') = '$viewname' AND pt.`startdate` > '0000-00-00' AND ctl.`inputDiv` = pt.`tasklistID`   AND pt.`this_type` = 'task' AND p.`projectid` = pt.`projectid` AND pt.`workspaces` = '$orgid' AND pt.`opened_by` = '$userid'";
 //      $query = $this->db->query($str_qry);

 //      file_put_contents("filenameselectMyTask.txt", $str_qry);

 //      return $query->result();
 //    }

    // function selectMyTaskRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$colorcode){ 
    //     $str_qry="SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
    //     GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
    //     GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
    //     GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
    //     GROUP_CONCAT(ctag.userteamid,'-',ctag.user_status) as task_tags,
    //     GROUP_CONCAT(ctf.userteamid) as task_followers,
    //     pt.`this_type` as type,
    //     pt.*,cr.*,
    //     ctl.`name` as tlname,
    //     pt.`startdate` as start,
    //     pt.`enddate` as end,
    //     pt.`projecttaskname` as title,
    //     p.`projectname` as projectname,
    //     pt.`projecttaskpriority` as priority,
    //     '$colorcode' as backgroundColor,
    //     pt.`projecttaskid` as cal_id
    //     FROM crm_projecttask AS pt
    //     left join crm_project p on p.projectid = pt.projectid 
    //     left join crm_tasklist ctl on ctl.inputDiv = pt.tasklistID
    //     left join crm_tag ctag on ctag.relateTask = pt.projecttaskid and ctag.type = 'task'
    //     left join crm_taskfollower ctf on ctf.relateTask = pt.projecttaskid 
    //     left join calendar_exception ce on ce.post_id=pt.projecttaskid
    //     left join calendar_recur cr on cr.post_id=pt.projecttaskid
    //     left join calendar_alarm ca on ca.post_id=pt.projecttaskid
    //     WHERE DATE_FORMAT(pt.`startdate`, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pt.`enddate`, '%Y-%m-%d') >= '".$start_date."' AND pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND pt.`this_type` = 'task' AND p.`projectid` = pt.`projectid` AND pt.`workspaces` = '$orgid' AND pt.`opened_by` = '$userid'  GROUP BY pt.projecttaskid";

    //      //file_put_contents("temp/selectMyTaskRange.txt", $str_qry);
    //   $query = $this->db->query($str_qry);

     

    //   return $query->result();
    // }
    function getMyCalendar($userid,$orgid) {

        $qry = "SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
        GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
        GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
        GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
        GROUP_CONCAT(ctag.userid) as tag_ids,
        pt.`Type` as type,
        pt.*,cr.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
       
        pt.`Id` as cal_id
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join calendar_exception ce on ce.post_id=pt.Id
        left join calendar_recur cr on cr.post_id=pt.Id
        left join calendar_alarm ca on ca.post_id=pt.Id

        WHERE 
        pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00'
       
        AND (pt.`CreatedBy` = '$userid') 
        
        GROUP BY pt.Id
        ORDER BY UNIX_TIMESTAMP(pt.`Startdate`) DESC";
        
        //AND MONTH(pt.Startdate) = MONTH(CURDATE())
        //file_put_contents("filenamegetMyCalendar.txt", $qry);

        $q = $this->db->query($qry);


        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    
    // working latest
    function selectMyCalendarRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$type,$colorcode){ 

        $str_qry="SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
        GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
        GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
        GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
        GROUP_CONCAT(ctag.userid) as tag_ids,
        pt.`Type` as type,
        
        pt.*,cr.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        '$colorcode' as backgroundColor,
        pt.`Id` as cal_id
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id and ctag.Type = '$type'
        left join calendar_exception ce on ce.post_id=pt.Id
        left join calendar_recur cr on cr.post_id=pt.Id
        left join calendar_alarm ca on ca.post_id=pt.Id

        WHERE 
        
        (pt.`Type` = '$type')
        AND (pt.`CreatedBy` = '$userid') 
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id";
        $query = $this->db->query($str_qry);
        // (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        // AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        // AND pt.`Startdate` > '0000-00-00' 
        // AND pt.`Enddate` > '0000-00-00')
        file_put_contents("temp/selectMyCalendarRange$type.txt", $str_qry);
        return $query->result();
    }

     function selectOtherCalendarRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$type,$colorcode){

        $str_qry="SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
        GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
        GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
        GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
        GROUP_CONCAT(ctag.userid) as tag_ids,
        pt.`Type` as type,
        
        pt.*,cr.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        '$colorcode' as backgroundColor,
        pt.`Id` as cal_id
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id and ctag.Type = '$type'
        left join calendar_exception ce on ce.post_id=pt.Id
        left join calendar_recur cr on cr.post_id=pt.Id
        left join calendar_alarm ca on ca.post_id=pt.Id

        WHERE 

         (pt.`Type` = '$type')
        AND (ctag.`userid` = '$userid') 
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id";
        //file_put_contents("filename_selectOther$type.txt", $str_qry);
      $query = $this->db->query($str_qry);
      //(DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        // AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        // AND pt.`Startdate` > '0000-00-00' 
        // AND pt.`Enddate` > '0000-00-00')

      return $query->result();
    }

    function selectHolidayCalWS($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$type,$colorcode){

        $str_qry="SELECT pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        '$colorcode' as backgroundColor
        
        FROM crm_holiday AS pt 
        
        WHERE (pt.`Type` = '$type')
        AND (pt.`Workspaces` = '$orgid')
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00'
        AND DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        GROUP BY pt.Id";
      
      $query = $this->db->query($str_qry);
     

      return $query->result();
    }
    function selectHolidayCalPS($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$type,$colorcode,$usersetid){

        $str_qry="SELECT pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        '$colorcode' as backgroundColor
        
        FROM crm_holiday AS pt 
        
        WHERE pt.`Type` = '$type'
        AND pt.`Workspaces` = '$orgid'
        AND pt.`HasUserId` = '$usersetid'
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00'
        AND DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        GROUP BY pt.Id";
      
      $query = $this->db->query($str_qry);
     

      return $query->result();
    }

    function selectCalendarAlarm($org_id){ 
        $str_qry="SELECT GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, 
        GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,
        GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,
        GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option,
        GROUP_CONCAT(ctag.userid) as tag_ids,
        pt.`Type` as type,
        pt.*,cr.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
       
        pt.`Id` as cal_id
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join calendar_exception ce on ce.post_id=pt.Id
        left join calendar_recur cr on cr.post_id=pt.Id
        left join calendar_alarm ca on ca.post_id=pt.Id

        GROUP BY pt.Id";
        $query = $this->db->query($str_qry);

        //file_put_contents("filename_selectMy$type.txt", $str_qry);

        return $query->result();
    }

    function getOtherCalendar($data) {
        $qry = " SELECT ctag.*,pt.`this_type` as type,pt.*,
        pt.startdate as start,pt.enddate as end,pt.projecttaskname title,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt, crm_tag AS ctag

        WHERE MONTH(pt.startdate) = MONTH(CURDATE()) AND (pt.`this_type` LIKE 'event' or pt.`this_type` LIKE 'todo') AND ctag.`relatedto` = pt.`projectid` AND ctag.`relateTask` = pt.`projecttaskid` AND (pt.workspaces='" . $data["org_id"] . "') AND ctag.`userteamid` = " . $data["id"] . " GROUP BY pt.projecttaskid";

        $q = $this->db->query($qry);
        if ($q->num_rows()) return $q->result();
        else return false;
    }
    
     function selectOtherTaskRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$colorcode){ 
        $str_qry="SELECT 'task' as type,
        pt.*,
        pt.startdate as start,
        pt.enddate as end,
        pt.projecttaskname title,
        p.`projectname` as projectname,
        p.`projectid` as id,
        pt.`projecttaskpriority` as priority,
        '$colorcode' as backgroundColor,
        pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p, crm_tag AS ctag
        WHERE DATE_FORMAT(pt.startdate, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pt.enddate, '%Y-%m-%d') >= '".$start_date."' AND ctag.`type` = 'task' AND pt.`this_type` = 'task' AND ctag.`relatedto` = pt.`projectid` AND ctag.`relateTask` = pt.`projecttaskid` AND pt.startdate > '0000-00-00' AND pt.enddate > '0000-00-00' AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND ctag.`userteamid` = '$userid' AND ctag.`type` = 'task'";
        //file_put_contents("filename_selectOtherTaskRange.txt", $str_qry);
      $query = $this->db->query($str_qry);

      return $query->result();
    }

    function selectMyProjectRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$colorcode){ 
        $str_qry="SELECT 'project' as type,p.*,
        p.`Startdate` as start,p.`Enddate` as end,p.`Title` as title,p.`Priority` as priority,
        '$colorcode' as backgroundColor,
        p.`HasParentId` as cal_id
        FROM crm_activity AS p
        
        WHERE DATE_FORMAT(p.`Startdate`, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(p.`Enddate`, '%Y-%m-%d') >= '".$start_date."' AND p.`Startdate` > '0000-00-00' AND p.`Enddate` > '0000-00-00' AND p.`Workspaces` = '$orgid' AND p.`CreatedBy` = '$userid'";
        file_put_contents("temp/selectMyProjectRange.txt", $str_qry);
        $query = $this->db->query($str_qry);

        return $query->result();
    }
    function selectOtherProjectRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date,$colorcode){ 
        $str_qry="SELECT 'project' as type,p.*,
        p.`startdate` as start,p.`targetenddate` as end,p.`projectname` as title,p.`projectpriority` as priority,
        '$colorcode' as backgroundColor,
        p.`projectid` as cal_id
        FROM crm_project AS p ,crm_tag AS ctag
        
        WHERE DATE_FORMAT(p.`startdate`, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(p.`targetenddate`, '%Y-%m-%d') >= '".$start_date."' AND p.`startdate` > '0000-00-00' AND p.`targetenddate` > '0000-00-00' AND p.`org_id` = '$orgid' AND p.`createdBy` <> '$userid' AND ctag.`relatedto` = p.`projectid` AND ctag.`type` = 'project' AND ctag.`userteamid` = '$userid'";
        //file_put_contents("filename_selectOtherProjectRange.txt", $str_qry);
        $query = $this->db->query($str_qry);

        return $query->result();
    }

    //  function selectTaskRange($orgid = FALSE,$userid = FALSE,$start_date,$end_date){ 
    //     $str_qry="SELECT pt.`this_type` as type,pt.*,ctl.`name` as tlname,
    //     pt.`startdate` as start,pt.`enddate` as end,pt.`projecttaskname` as title,p.`projectname` as projectname,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
    //     FROM crm_projecttask AS pt, crm_project AS p , crm_tasklist as ctl
        
    //     WHERE DATE_FORMAT(pt.`startdate`, '%Y-%m-%d') < '".$end_date."' AND DATE_FORMAT(pt.`enddate`, '%Y-%m-%d') >= '".$start_date."' AND pt.`startdate` > '0000-00-00' AND pt.`enddate` > '0000-00-00' AND ctl.`inputDiv` = pt.`tasklistID`   AND pt.`this_type` = 'task' AND p.`projectid` = pt.`projectid` AND pt.`workspaces` = '$orgid' ";
    //   $query = $this->db->query($str_qry);

    //   file_put_contents("filenameselectMyTask.txt", $str_qry);

    //   return $query->result();
    // }


    

    function selectOtherTask($data){ 
      $query = $this->db->query("SELECT 'task' as type,pt.*,
        pt.startdate as start,pt.enddate as end,pt.projecttaskname title,p.`projectname` as projectname,p.`projectid` as id,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p, crm_tag AS ctag
        WHERE ctag.`type` = 'task' AND MONTH(pt.`startdate`) = MONTH(CURDATE()) AND pt.`this_type` = 'task' AND ctag.`relatedto` = pt.`projectid` AND ctag.`relateTask` = pt.`projecttaskid` AND pt.startdate > '0000-00-00' AND p.`projectid` = pt.`projectid` AND `workspaces` = '".$data['org_id']."' AND ctag.`userteamid` = '".$data['id']."'");
      return $query->result();
    }
	function selectOtherTaskNew($orgid = FALSE,$userid = FALSE,$viewname){ 
      $query = $this->db->query("SELECT 'task' as type,pt.*,
        pt.startdate as start,pt.enddate as end,pt.projecttaskname title,p.`projectname` as projectname,p.`projectid` as id,pt.`projecttaskpriority` as priority,pt.`label` as backgroundColor,pt.`projecttaskid` as cal_id
        FROM crm_projecttask AS pt, crm_project AS p, crm_tag AS ctag
        WHERE DATE_FORMAT(pt.startdate, '%M %Y') = '$viewname' AND ctag.`type` = 'task' AND pt.`this_type` = 'task' AND ctag.`relatedto` = pt.`projectid` AND ctag.`relateTask` = pt.`projecttaskid` AND pt.startdate > '0000-00-00' AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND ctag.`userteamid` = '$userid'");
      return $query->result();
    }
   
    function selectPostByEvent($user_id) {

         $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where (p.user_id=" . $user_id . " or pt.user_id=" . $user_id . ") and p.type='event' GROUP BY p.ID";

        $q = $this->db->query($qry);

        $rrr = $q->result();

        //echo "<pre>";echo print_r(array_merge_recursive($rrr, $new_array));echo "</pre>";

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function selectPostByTodo($user_id) {

        $qry = "select distinct(p.ID) as cal_id, p.*,cr.*, GROUP_CONCAT(DISTINCT ce.date ORDER BY ce.date asc SEPARATOR ';') as recur_exceptions, GROUP_CONCAT(DISTINCT ca.type SEPARATOR ';') as alarm_type,GROUP_CONCAT(ca.repeat SEPARATOR ';') as alarm_repeat,GROUP_CONCAT(ca.options SEPARATOR 0x1D) as alarm_option, pd.start_date as start, pd.end_date as end, pd.*
			from post p
			left join post_details pd on p.ID = pd.post_id 
			left join calendar_exception ce on ce.post_id=p.ID
			left join calendar_recur cr on cr.post_id=p.ID
			left join calendar_alarm ca on ca.post_id=p.ID
			left join post_tag pt on pt.post_id=p.ID
			where (p.user_id=" . $user_id . " or pt.user_id=" . $user_id . ") and p.type='todo' GROUP BY p.ID";

        $q = $this->db->query($qry);

        $rrr = $q->result();

        //echo "<pre>";echo print_r(array_merge_recursive($rrr, $new_array));echo "</pre>";

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function selectPostByTask($user_id) {

        $q = $this->db->query("select distinct(p.ID) as id, p.*, pd.start_date as start, pd.end_date as end, pd.*
			from post p, post_details pd, post_tag pt
			where (p.ID = pd.post_id and p.ID = pt.post_id) and (p.user_id='" . $user_id . "' or pt.user_id='" . $user_id . "') and p.type='task'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    
    
    function selectPostByYear($user_id) {

        $q = $this->db->query("select distinct(p.ID) as id, p.*, pd.start_date as start, pd.end_date as end, pd.*
			from post p, post_details pd, post_tag pt
			where (p.ID = pd.post_id and p.ID = pt.post_id) and (p.user_id='" . $user_id . "' or pt.user_id='" . $user_id . "') and p.post_date LIKE '%2015%' order by p.post_date desc");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
    
     function selectHolidayList($data) {
        $this->db->select('*');
        $this->db->group_by('name');
        $query = $this->db->get_where('calendar_popup', array('user_id' => $data['id']        ));
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }
    
    public function debug_to_console($data) {

        if (is_array($data))
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }

    public function debug_to_file($file, $data) {

        $content = serialize($data);
        //file_put_contents($file, $content);
        $content = unserialize(file_get_contents($file));

        echo $content;
    }

    function selectPostBySearch($user_id, $title, $description, $start_date, $end_date, $assignedto) {

        $qry = "select distinct(p.ID) as id, p.*, pd.start_date as start, pd.end_date as end, pd.* 
			from post p, post_details pd, post_tag pt 
			where (p.ID = pd.post_id and p.ID = pt.post_id) and (p.user_id='" . $user_id . "' or pt.user_id='" . $user_id . "') and (p.post_date LIKE '%2015%')";

        if (!empty($title)) {
            $qry.=" and p.title LIKE '%" . $title . "%'";
        }
        if (!empty($description)) {
            $qry.=" and p.description LIKE '%" . $description . "%'";
        }
        if (!empty($start_date) && !empty($end_date)) {
            $qry.= " and (LEFT(pd.start_date, 10)  >= '" . $start_date . "' and LEFT(pd.end_date,10) <= '" . $end_date . "')";
        }
        if (!empty($assignedto)) {
            //$this->debug_to_file("sujon_log7.txt",$assignedto);
            $tag_ids = implode(",", $assignedto);
            $qry.=" and pt.user_id IN ( '" . $tag_ids . "')";
        }
        $qry.=" order by pd.start_date desc";

        $q = $this->db->query($qry);
        //$this->debug_to_file("sujon_query.txt",$qry);
        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function selectTagData($post_id) {

        $q = $this->db->query("select * FROM post_tag WHERE post_id = '" . $post_id . "'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getUserList() {

        $q = $this->db->query("SELECT ID,display_name FROM `crm_users`");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getGroupList() {

        $q = $this->db->query("SELECT groupid as ID , groupname as group_name FROM `crm_groups`");
        // $q = $this->db->query("SELECT groupid as ID , groupname as group_name FROM `crm_groups`");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getGroupListbyId($group_id) {

        $q = $this->db->query("SELECT user_id FROM `group_tag` where group_id = '" . $group_id . "'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getNotificationList($user_id) {

        $q = $this->db->query("SELECT n.ID as nID,n.type_id as post_id, u.*,n.* FROM `notification` as n JOIN `users` as u on n.user_id = u.ID where n.notification_for = '" . $user_id . "' ORDER BY not_fire_time desc");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function updateNotificationList($nID) {
        //echo "<script>console.log( 'Debug Objects: " . $user_id . "' );</script>";
        $q = $this->db->query("update notification set status=1 where ID = '" . $nID . "'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function getEmailUsers() {
        $DB2 = $this->load->database('secondDatabase', TRUE);
        $q = $DB2->db->query("SELECT * from `users`");
        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    function updateCalendarEntry($cal_id, $title, $location, $start_date, $end_date, $descr, $entry_type, $priority, $entry_color, $user_tags,$guests=null,$taskid,$proid,$tasklistid) {

          
                $str_uptask="UPDATE crm_activity SET Location = '$location',HasParentId = '$proid',Title = '$title',Description='$descr',Priority='$priority',Type='$entry_type',Startdate = '$start_date',Enddate='$end_date',Guests='$guests' WHERE Id = $cal_id";
                
                $this->db->query($str_uptask);
          

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function insertAlarmEntry($cal_id, $title, $location, $start_date, $end_date) {
        $this->db->query("insert into calendar_alarm values('$cal_id','$title','$location','$start_date', '$end_date'");


        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function getAllprojects($org_id,$user_id,$date_from,$date_to) {
        $qrystr="SELECT cp.*, 
            (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, 
            (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, 
            (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img 
            FROM crm_activity as cp 
            LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo 
            WHERE 
            Workspaces='".$org_id."' 
            AND cp.type = 'Project' 
            AND cp.isDelete = '1'
            AND cp.Enddate > '0000-00-00' AND cp.Startdate > '0000-00-00'
            AND DATE_FORMAT(cp.Startdate, '%Y-%m-%d') >= '".($date_from=='Invalid date' ? '1000-01-01' : $date_from)."' 
            AND DATE_FORMAT(cp.Enddate, '%Y-%m-%d') <= '".($date_to=='Invalid date' ? '9999-12-31' : $date_to)."'
            GROUP BY cp.Id 
            ORDER BY cp.Id DESC";

        $query = $this->db-> query($qrystr);
        file_put_contents("temp/getallprowf.txt", $qrystr);
        return $query->result();
    }

}

?>