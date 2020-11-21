<?php

class Modulemodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper("activity_helper");
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */
    function insertData($table = FALSE, $data = FALSE){
        $sessionData = $this->session->userdata('yeezyCRM');
        $this->db->insert($table, $data);

        if($this->db->affected_rows() > 0){
          $insertID = $this->db->insert_id();
          return $insertID; 
        }
            
        else
            return false;
    }

    function updateData($table = FALSE, $data = FALSE,$id = FALSE){
        $this->db->where('id',$id);
        $this->db->update($table,$data);
        
        if($this->db->affected_rows() > 0)
            return $id;
        else
            return false;
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'full_name') {
        return $this->db->get_where($type, array('ID' => $type_id))->row()->$field;
    }

    function getAll($table, $array = NULL, $ordercol = NULL) {
      if($ordercol != NULL){
        $this->db->order_by($ordercol, "DESC");
      }
      $query = $this->db->get_where($table, $array);

      return $query->result();
    }


    function getUserDetailForAssign($userid,$typeID){
      $query_inv = $this->db->query("SELECT cu.*,cuh.* FROM crm_users AS cu, crm_tagHD As cuh WHERE cuh.userid = cu.ID AND cuh.RelatedTo = '".$typeID."' AND cuh.userid = '".$userid."'");

      if($query_inv->num_rows() >0){
        return $query_inv->result();
      }else{
        return false;
      } 
        
    }
    // update starts @ 10-06-2016
    // added by sujon
    function duplicate_iqrows($qids,$invid,$isrev,$numrev) {

      $arrqids = explode(",", $qids);
      

      foreach($arrqids as $arrqid) {
        $qidex = explode("-", $arrqid);

        $qid=$qidex[0];
        $qtype="";
        if($qidex[1]=="N") $qtype="invoice_quote";
        if($qidex[1]=="R") $qtype="invoice_revised";

        $qry1="INSERT INTO crm_quotes (SELECT NULL,subject,potentialid,quotestage,validtill,contactid,quote_no,subtotal,carrier,shipping,inventorymanager,'$qtype',adjustment,adjustment_type,total,taxtype,quotes_discount_type,quotes_discount_amount,s_h_amount,accountid,terms_conditions,currency_id,conversion_rate,Divid,org_id,star_type,creator,lastUpdate,description,sh_vat,sh_sales,sh_service,readstatus,archivestatus,taskid,createdate,quotes_discount_percent,pro_id,$qid,$invid,net_total,net_totalafterdisgrand,taxtotal_shiphandle,grand_total,status_selected,currency_name,currency_value,revision_num,link_id FROM crm_quotes WHERE quoteid=$qid)";
        
        $res=$this->db->query($qry1);
        
        $insert_id = $this->db->insert_id();

        $this->db->query("INSERT INTO crm_service_items (SELECT NULL,$insert_id,'invoice_quote',serviceid,sequence_no,quantity,listprice,discount_percent,discount_amount,discount_type,comment,description,incrementondel,item_tax_vat,item_tax_sales,item_tax_service,item_name,item_unit,total_discount,total_tax,total_afterdiscount,netprice,type_selected,$qid FROM crm_service_items WHERE type_id=$qid)");
        
      }

      // if($isrev){
      //   $this->db->query("UPDATE crm_invoice
      //   SET revisions=revisions+1 WHERE invoiceid=$invid");
      // }

      return true;
    }

    // added by sujon
    function update_qtlink($qid) {

      $qry_link="UPDATE crm_quotes SET link_id=$qid WHERE quoteid=$qid";

       // file_put_contents("filename__qry_qry_linkqry_link.txt", $qry_link);

        $this->db->query($qry_link);
        return true;
      }

      // added by sujon
      function getDefCur(){
       $query_inv = $this->db->query("SELECT name AS curname FROM `crm_currency_units` WHERE type_name='Currency' AND type='Quote' AND type_id=0");
       if($query_inv->num_rows() >0){
        return $query_inv->row()->curname;
      }else return 'BDT';
    }

    // added by sujon
    function getDefCurType(){
      $query_inv = $this->db->query("SELECT * FROM `crm_currency_units` WHERE type_name='Currency' AND type='Quote' AND type_id=0");

     if($query_inv->num_rows() >0){
      return $query_inv->row()->type_value;
    }else return false;
  }

    // added by sujon
    function revision_iqrows($qid,$tid,$lid,$invid) {

        // $insert_id=null;
        // $inv_qts=null;

        // file_put_contents("filenameqiiiiiiiiiiid.txt", $qid);

        // $query_revnum = $this->db->query("SELECT revision_num FROM `crm_quotes` WHERE quoteid=$qid");

        // $newrev=$query_revnum->row()->revision_num;


        // if(intval($newrev)==0){

        // $qry1="INSERT INTO crm_quotes (SELECT NULL,subject,potentialid,quotestage,validtill,contactid,quote_no,subtotal,carrier,shipping,inventorymanager,'revised',adjustment,adjustment_type,total,taxtype,quotes_discount_type,quotes_discount_amount,s_h_amount,accountid,terms_conditions,currency_id,conversion_rate,Divid,org_id,star_type,creator,lastUpdate,description,sh_vat,sh_sales,sh_service,readstatus,archivestatus,taskid,createdate,quotes_discount_percent,pro_id,type_id,invoiceid,net_total,net_totalafterdisgrand,taxtotal_shiphandle,grand_total,status_selected,currency_name,currency_value,revision_num,link_id FROM crm_quotes WHERE quoteid=$qid)";
        
        // $res=$this->db->query($qry1);
        
        // $insert_id = $this->db->insert_id();

        // $this->db->query("INSERT INTO crm_service_items (SELECT NULL,$insert_id,'invoice_revised',serviceid,sequence_no,quantity,listprice,discount_percent,discount_amount,discount_type,comment,description,incrementondel,item_tax_vat,item_tax_sales,item_tax_service,item_name,item_unit,total_discount,total_tax,total_afterdiscount,netprice,type_selected,$qid,item_currency,item_currency_value,item_unit_value FROM crm_service_items WHERE type_id=$qid AND typeof_item ='invoice_quote')");

        //  $query_inv = $this->db->query("SELECT quoteid FROM `crm_invoice` WHERE invoiceid=$invid");

        // $invqts=$query_inv->row()->quoteid;

        
        // $myArray = array();
        //  $arrinvqts = explode(",", $invqts);

        // foreach($arrinvqts as $arrinvqt) {
        //     $invqt=explode("-", $arrinvqt);
        //     if(($invqt[0])==($qid)) {
        //       $myArray[] = $insert_id."-".$invqt[1];
        //     } else{$myArray[] = $arrinvqt;}
        // }

        // $myArray=implode(",", $myArray);
        
        // $qry_invup="UPDATE crm_invoice SET quoteid='$myArray' WHERE invoiceid=$invid";

        //   $this->db->query($qry_invup);
        //   $inv_qts=$myArray;

        // }
        //else{
          

        $qry_inc="UPDATE crm_quotes SET revision_num=revision_num+1 WHERE quoteid=$qid";

          $this->db->query($qry_inc);
        //}
        // $retArray = array();
        // $retArray[]=$insert_id;
        // $retArray[]=$inv_qts;

      return true;
    }

// update ends @ 10-06-2016
    // added by sujon
    function getAllOrder($table, $array = NULL) {
        $this->db->order_by("projecttaskid", "asc");
        $query = $this->db->get_where($table, $array);
        return $query->result();
    }
    // added by sujon
    function getStickyNote($pid) {
        $this->db->select('*'); 
        $this->db->from('crm_stickynotes');
        $this->db->join('crm_users', 'crm_users.ID = crm_stickynotes.user_id');   
        $this->db->where('link_id', $pid);
        return $this->db->get()->result();
    }

    function getContactProDB($pid) {
        $this->db->select('*'); 
        $this->db->from('crm_activity_contacts');
        $this->db->join('crm_contacttype', 'crm_contacttype.contacttypeid = crm_activity_contacts.ContactTypeId', 'left');   
        $this->db->where('ParentId', $pid);
        return $this->db->get()->result();
    }

    // added by sujon
    function getStickyNoteSub($pid) {
        $this->db->select('stickynote,notepopup'); 
        $this->db->from('crm_projectSubTask');   
        $this->db->where('projecttaskid', $pid);
        return $this->db->get()->result();
    }

    // added by sujon
    function getDependencyModel($pid) {
        $this->db->select('dependency'); 
        $this->db->from('crm_projecttask');   
        $this->db->where('projecttaskid', $pid);
        return $this->db->get()->result();
    }

     // added by sujon
    function getDependencyTableModel($pid) {
        $this->db->select('dependency'); 
        $this->db->from('crm_projecttask');   
        $this->db->where('projecttaskid', $pid);
        return $this->db->get()->result();
    }

    // added by sujon
    function getProCompData($id) {
        $query = $this->db->query("SELECT show_complete FROM crm_project WHERE projectid= '".$id."'");
        return $query->result();
    }

     // added by sujon
    function getMaxPredefItemSerial() {
        $query = $this->db->query("SELECT MAX(incrementondel) as maxserialnum FROM crm_predef_items");
        return $query->row()->maxserialnum;
    }

     // added by sujon
    function getACitemlist($term) {
      
        $query = $this->db->query("SELECT * FROM crm_predef_items where item_name LIKE '%$term%'"); 
        return $query->result();
    } 

      // added by sujon
    function getTotalPredefItemSerial() {
        $query = $this->db->query("SELECT * FROM crm_predef_items");
        return $query->num_rows();
    }

      // added by sujon
    function getTotalPredefUniterial() {
        $query = $this->db->query("SELECT * FROM crm_predef_units");
        return $query->num_rows();
    }

    // added by sujon
    function convertCurrencyLinks($curval,$qid) {
      $curval=(double)$curval;
      
      $qry="UPDATE crm_service_items
      SET listprice=listprice*$curval, discount_amount=discount_amount*$curval
      WHERE link_id=$qid";
      $query = $this->db->query($qry);
      //file_put_contents("filenamecvtllllllll.txt", $qid);
      $qry2="UPDATE crm_quotes
      SET quotes_discount_amount=quotes_discount_amount*$curval, s_h_amount=s_h_amount*$curval, adjustment=adjustment*$curval
      WHERE type_id=$qid";
      $query = $this->db->query($qry2);
      return true;
    }

   // added by sujon - updated @ 10-06-16
    function getAllTaskItem($qid) {
    
      $query = $this->db->query("SELECT * FROM `crm_service_items` as csi WHERE csi.type_id='".$qid."' ");
      return $query->result();
    }

    // added by sujon
    function getInvoiceQuoteItem($qid) {
    
      $query = $this->db->query("SELECT * FROM `crm_service_items` as csi WHERE csi.type_id='".$qid."' ");
      return $query->result();
    }

     // added by sujon
    function getAllQuotes($taskid) {
    
      $query = $this->db->query("SELECT * FROM `crm_quotes` as cq WHERE cq.taskid='".$taskid."' AND (cq.type IS NULL OR cq.type= 'revised')");
      return $query->result();
    }

    // added by sujon
    function getUserQuotes($taskid,$userid) {
    
      $query = $this->db->query("SELECT * FROM `crm_quotes` as cq WHERE cq.taskid='".$taskid."' AND (cq.type IS NULL OR cq.type= 'revised') AND cq.creator='".$userid."'");
      return $query->result();
    }

     // added by sujon
    function getTaskInvoices($taskid) {
    
      $query = $this->db->query("SELECT * FROM `crm_invoice` as ci WHERE ci.taskid='".$taskid."' ");
      return $query->result();
    }

    // added by sujon
    function getUserInvoices($taskid,$userid) {
    
      $query = $this->db->query("SELECT * FROM `crm_invoice` as ci WHERE ci.creator='".$userid."' AND ci.taskid='".$taskid."' ");
      return $query->result();
    }

     // added by sujon
    function getInvoiceByID($invid) {
    
      $query = $this->db->query("SELECT * FROM `crm_invoice` as ci WHERE ci.invoiceid='".$invid."' ");
      return $query->result();
    }

    // added by sujon
    function getAllQuotesById($qid) {
    
      $query = $this->db->query("SELECT * FROM `crm_quotes` as cq WHERE cq.quoteid='".$qid."' ");
      return $query->result();
    }

    // added by sujon - updated @ 10-06-16
    function getAllQuotesByInvoice($invid,$qid) {
    $arrqid = explode("-", $qid);
      $query = $this->db->query("SELECT * FROM `crm_quotes` as cq WHERE cq.quoteid='".$arrqid[0]."'");

      return $query->result();
    }

    // sujon @ 8/11/16
    function delQuotesById($qid) {
    
     $this -> db -> where('quoteid', $qid);
     $this -> db -> delete('crm_quotes');

     $this -> db -> where('type_id', $qid);
     $this -> db -> where('typeof_item', 'quotes');
     $this -> db -> delete('crm_service_items');        
   }

   // sujon @ 8/11/16 - updated @ 10-06-16
    function delInvoiceById($invid) {
    
     $this -> db -> where('invoiceid', $invid);
     $this -> db -> delete('crm_invoice');

     $this -> db -> where('type_id', $invid);
     $this -> db -> where('typeof_item', 'invoice_quote');
     $this -> db -> delete('crm_service_items');        
   }
    

   // added by sujon
    function loadQuoteItemUnits($qid) {
        $this->db->select('item_unit'); 
        $this->db->from('crm_service_items');   
        $where = array('typeof_item ' => 'quotes');
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    // added by sujon - updated @ 10-06-16
    function insertUnitData($table = FALSE, $data = FALSE){

      $q =  $this->db->select('name')
      ->from('crm_currency_units')
      ->where(array('type_name'=>"Unit",'type'=>"Quote",'name'=>$data['name']))->get();
      if($q->num_rows() == 0){

        $this->db->insert($table, $data);
        if($this->db->affected_rows() > 0)
          return $this->db->insert_id();
        else
          return false;
      }else return false;

    }

    function getAllUsersWithoutMe($id) {
        $query = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$id."'");
        return $query->result();
    }

    function getAllUsersAll() {
        $query = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users");
        return $query->result();
    }

    function getAllActivityListForAPI() {
        $query = $this->db->query("SELECT Id,Type,Title FROM crm_activity");
        return $query->result();
    }

    function getWorkspaceUsersWithoutMe($id,$oid) {
        $query = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE ID <> '".$id."' and org_id = '".$oid."'");
        return $query->result();
    }

    function getProjectUsers($pid,$UserStatus) {

        $query = $this->db->query("SELECT * FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='".$pid."' AND (cthd.UserStatus='2') ");
        return $query->result();
    }

    function gettagprojectusers($pid,$UserStatus) {

        $query = $this->db->query("SELECT * FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='".$pid."' AND (cthd.UserStatus='2' OR cthd.UserStatus='1') ");
        return $query->result();
    }

    function getTaskCO($pid,$UserStatus) {

        $query = $this->db->query("SELECT * FROM crm_tagHD cthd left join crm_users cusr on cusr.ID = cthd.userid where cthd.RelatedTo='".$pid."' AND cthd.UserStatus='1'");
        return $query->result();
    }

    function getProjectUsersHD($pid,$UserStatus) {

        $query = $this->db->query("SELECT * FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='".$pid."' AND cthd.UserStatus='".$UserStatus."'");
        return $query->result();
    }

    function getWorkspaceUsers($id,$oid) {
        $query = $this->db->query("SELECT ID,display_name,full_name,img,email FROM crm_users WHERE org_id = '".$oid."'"); 
        return $query->result();
    }

    function getAllUsers($oid) {
        $query = $this->db->query("SELECT ID,display_name,full_name,img FROM crm_users WHERE org_id = '".$oid."'");
        return $query->result();
    }

    function getAllS($table, $array = NULL) {
        $this->db->group_by('tasklistID'); 
        $query = $this->db->get_where($table, $array);
        return $query->result();
    }

    function count($table, $array = NULL,$coloum){
        $this->db->select($coloum);
        $this->db->distinct();
        $query = $this->db->get_where($table, $array);
        return $query->num_rows();
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

    /* =====================================================================================================s
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    // function getAllprojects($org_id,$user_id) {
    //     $query = $this->db-> query("SELECT cp.*,ct.*, 
    //                                   (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, 
    //                                   (SELECT img FROM crm_users WHERE ID = assignTo) as img, 
    //                                   (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img 
    //                                 FROM 
    //                                   crm_project as cp LEFT JOIN 
    //                                   crm_tag as ct ON cp.projectid = ct.relatedto AND 
    //                                   ct.type = 'project' 
    //                                 WHERE 
    //                                   cp.org_id = '".$org_id."' AND 
    //                                   ((cp.createdBy='".$user_id."' OR cp.assignTo = '".$user_id."') OR ct.userteamid = '".$user_id."' ) GROUP BY cp.projectid ORDER BY cp.projectid DESC");
    //     return $query->result();
    // }

    function getAlltodo($org_id,$user_id) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Todo' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

    function getAllprojects($org_id,$user_id) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo WHERE (cp.CreatedBy ='".$user_id."' OR ct.userid = '".$user_id."' ) AND Workspaces='".$org_id."' AND cp.type = 'Project' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

    // function getAllprojectsForFeed($org_id,$user_id) {
    //     $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo WHERE  (cp.CreatedBy <> '".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Project' GROUP BY cp.Id ORDER BY cp.Id DESC");
    //     return $query->result();
    // }

    // function getAlltodoForFeed($org_id,$user_id) {
    //     $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo WHERE (cp.CreatedBy <> '".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Todo' GROUP BY cp.Id ORDER BY cp.Id DESC");
    //     return $query->result();
    // }

    function getAllMyTaskLatestThree($user_id,$HasParentId) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC LIMIT 3");
        return $query->result();
    }



    function getAllMyTaskLatest($user_id,$HasParentId) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  AND ct.userid = '".$user_id."' WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."'  AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

    function getAllMyTaskLatestPending($user_id,$HasParentId) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  AND ct.userid = '".$user_id."' WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.Status <> 'completed'  AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

    function getAllMyTaskComplete($user_id,$HasParentId) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  AND ct.userid = '".$user_id."' WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.Status = 'completed'  AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

     function getAllMyTaskOverdue($user_id,$HasParentId) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  AND ct.userid = '".$user_id."' WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.Enddate < NOW()  AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }


    function getAllprojectTasks($org_id,$user_id,$HasParentId,$order) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.CreatedDate ".$order);
        return $query->result();
    }

    function getAllprojectTasksEnd($org_id,$user_id,$HasParentId,$order) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Enddate ".$order);
        return $query->result();
    }

    
    function getAllprojectSubTasks($org_id,$user_id,$HasParentId,$order) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'SubTask' AND cp.HasParentId = '".$HasParentId."' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.CreatedDate ".$order);
        return $query->result();
    }

    function getAllprojectTaskscomplete($org_id,$user_id,$HasParentId,$order) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.Status = 'completed' AND cp.isDelete = '1' GROUP BY cp.Id ORDER BY cp.Id ".$order);
        return $query->result();
    }

    function getAllprojectTasksincomplete($org_id,$user_id,$HasParentId,$order) {
        $query = $this->db-> query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'Task' AND cp.HasParentId = '".$HasParentId."' AND cp.Status <> 'completed'  AND cp.isDelete = '1'GROUP BY cp.Id ORDER BY cp.Id ".$order);
        return $query->result();
    }

    

    /////Get all over due task for last 7 days.

    function getAllOverDueTask($org_id,$user_id) {
      $query = $this->db-> query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND (cp.projecttaskprogress != '100') AND (cp.enddate >= DATE_SUB(CURDATE(), INTERVAL 365 DAY))");
      
      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    // added by sujon
    function getAlldependency($taskid) {
        $query = $this->db-> query("SELECT dd.*,pt.*
                                      
                                    FROM 
                                      crm_dependency as dd JOIN 
                                      crm_projecttask as pt ON dd.depid = pt.projecttaskid
                                      WHERE 
                                      dd.taskid = '".$taskid."' ");
        return $query->result();
    }

    function no_task_in_p1($pid,$user_id) {
        $this->db->select('relatedto, count(tagid) AS notask');
        $this->db->from('crm_tag');
        $this->db->join('crm_projecttask', 'crm_tag.relateTask = crm_projecttask.projecttaskid');
        $this->db->where_in('relatedto',$pid);
        $this->db->where('type','task');
        $this->db->where('userteamid',$user_id);
        $this->db->group_by('relatedto');
        $query1 = $this->db->get();
        return $query1->result();
    }

    function no_task_in_p2($pid,$user_id) {
        $this->db->select('projectid, count(*) AS notask');
        $this->db->from('crm_projecttask');
        $this->db->where_in('projectid',$pid);
        $this->db->where('opened_by',$user_id);
        $this->db->group_by('projectid');
        $query2 = $this->db->get();
        return $query2->result();
    }

    function getAlltasks($org_id,$user_id,$taskLisdid) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projecttask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.tasklistID = '".$taskLisdid."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."')");
        return $query->result();
    }

    // function getAlltodo($org_id,$user_id,$taskLisdid) {
    //     $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projecttask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'todo' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.tasklistID = '".$taskLisdid."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND cp.this_type = 'todo'");
    //     return $query->result();
    // }

    function getAlltasksSearch($org_id,$user_id,$taskLisdid,$taskname) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projecttask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.tasklistID = '".$taskLisdid."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND cp.projecttaskname LIKE '%".$taskname."%'");
        return $query->result();
    }
     // sujon @ 6/1/16
    function getAlltasksNew($org_id,$user_id,$proID) {
        $str_qry="SELECT cp.*,ct.*,cusr.full_name as creator_name,(SELECT GROUP_CONCAT(cdd.depid)
             FROM crm_dependency cdd WHERE cdd.taskid = cp.projecttaskid) AS dependency FROM crm_projecttask as cp 
          LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' 
          
          left join crm_users cusr on cusr.ID=cp.opened_by

          WHERE cp.workspaces = '".$org_id."' AND cp.this_type = 'task' AND cp.projectid = '".$proID."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') order by cp.enddate DESC";
          
        $query = $this->db->query($str_qry);
        return $query->result();
    }

    function getAllSubtasks($org_id,$user_id,$taskLisdid) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projectSubTask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'SubTask' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.tasklistID = '".$taskLisdid."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND isDelete='1'");
        return $query->result();
    }
   // load subtask by sujon
    function getSubtasksNew($user_id,$HasParentId) {
        $query = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON cp.Id = ct.RelatedTo  WHERE (cp.CreatedBy='".$user_id."' OR ct.userid = '".$user_id."' ) AND cp.type = 'SubTask' AND cp.HasParentId = '".$HasParentId."' AND isDelete='1' GROUP BY cp.Id ORDER BY cp.Id DESC");
        return $query->result();
    }

    // load all subtask by sujon @ 6/2/16
    function getAllSubtasksNew($org_id,$user_id,$pro_id) {
        $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projectSubTask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'SubTask' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.projectid = '".$pro_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND isDelete='1' order by cp.projecttaskid");
        return $query->result();
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function getAllprojectsorderBY($org_id,$orderBY,$user_id) {
        //$query = $this->db->query("SELECT * FROM `crm_project` WHERE org_id = '".$org_id."' ORDER BY ".$orderBY." ASC");
        //$query = $this->db->query("SELECT cu.*,cp.*,ct.* FROM crm_project as cp, crm_tag as ct,crm_users as cu WHERE cp.org_id = '".$org_id."' AND ct.relatedto = cp.projectid AND cu.ID = cp.assignTo AND (ct.userteamid = '".$user_id."' OR cp.createdBy = '".$user_id."') ORDER BY cp.".$orderBY." ASC");
      $query = $this->db-> query("SELECT cp.*,ct.*, 
          (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, 
          (SELECT img FROM crm_users WHERE ID = assignTo) as img, (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img 
          FROM crm_project as cp LEFT JOIN crm_tag as ct ON cp.projectid = ct.relatedto AND ct.type = 'project' WHERE cp.org_id = '".$org_id."' AND ((cp.createdBy='".$user_id."' OR cp.assignTo = '".$user_id."') OR ct.userteamid = '".$user_id."' )  GROUP BY cp.projectid ORDER BY cp.".$orderBY."");
        return $query->result();
    }
    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function getAllprojectSearch($org_id,$orderBY,$user_id) {
        //$query = $this->db->query("SELECT * FROM `crm_project` WHERE org_id = '".$org_id."' AND projectname LIKE '%".$orderBY."%'");
        //$query = $this->db->query("SELECT cu.*,cp.*,ct.* FROM crm_project as cp, crm_tag as ct,crm_users as cu WHERE cp.org_id = '".$org_id."' AND ct.relatedto = cp.projectid AND (ct.userteamid = '".$user_id."' OR cp.createdBy = '".$user_id."') AND projectname LIKE '%".$orderBY."%' AND cu.ID = cp.assignTo ");
        //$query = $this->db-> query("SELECT cp.*,ct.*, (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, (SELECT img FROM crm_users WHERE ID = assignTo) as img, (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img FROM crm_project as cp INNER JOIN crm_tag as ct ON cp.projectid = ct.relatedto AND ct.type = 'project' WHERE cp.org_id = '".$org_id."' AND ((cp.createdBy='".$user_id."' OR ct.userteamid = '".$user_id."') AND cp.createdBy <> ct.userteamid) AND projectname LIKE '%".$orderBY."%' GROUP BY cp.projectid ORDER BY `cp`.`projectid` ASC");
        $query = $this->db-> query("SELECT cp.*,ct.*, 
          (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, 
          (SELECT img FROM crm_users WHERE ID = assignTo) as img, (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img 
          FROM crm_project as cp LEFT JOIN crm_tag as ct ON cp.projectid = ct.relatedto AND ct.type = 'project' WHERE cp.org_id = '".$org_id."' AND ((cp.createdBy='".$user_id."' OR cp.assignTo = '".$user_id."') OR ct.userteamid = '".$user_id."' ) AND projectname LIKE '%".$orderBY."%' GROUP BY cp.projectid ORDER BY `cp`.`projectid` ASC");
        return $query->result();
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function getAllTag($pid,$type,$relate = FALSE) {
        if ($type == 'task') {
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.email,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_tag` as ct, `crm_users` as cu WHERE cu.status = 'ACTIVE' AND cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."' GROUP BY cu.ID ORDER BY ct.tagid ASC");
        }elseif ($type == 'project'){
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.email,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_tag` as ct, `crm_users` as cu WHERE cu.status = 'ACTIVE' AND cu.ID = ct.userteamid AND ct.type = '".$type."' AND ct.relatedto = '".$pid."' GROUP BY cu.ID ORDER BY ct.tagid ASC");
        }elseif ($type == 'Subtask') {
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.email,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_tag` as ct, `crm_users` as cu WHERE cu.status = 'ACTIVE' AND cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."' GROUP BY cu.ID ORDER BY ct.tagid ASC");
        }elseif ($type == 'todo') {
           $query = $this->db->query("SELECT ct.*,cu.ID,cu.email,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_tag` as ct, `crm_users` as cu WHERE cu.status = 'ACTIVE' AND cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."' GROUP BY cu.ID ORDER BY ct.tagid ASC");
        }

        return $query->result();
    }

    function getAllFollow($pid,$type,$relate = FALSE) {
        if ($type == 'task') {
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_taskfollower` as ct, `crm_users` as cu WHERE cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."'");
        }if ($type == 'Subtask') {
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_taskfollower` as ct, `crm_users` as cu WHERE cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."'");
        }elseif ($type == 'project'){
          $query = $this->db->query("SELECT ct.*,cu.ID,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_taskfollower` as ct, `crm_users` as cu WHERE cu.ID = ct.userteamid AND ct.type = '".$type."' AND ct.relatedto = '".$pid."'");
        }elseif ($type == 'todo'){
         $query = $this->db->query("SELECT ct.*,cu.ID,cu.img,cu.display_name,cu.full_name,cu.org_id,cu.designation FROM `crm_taskfollower` as ct, `crm_users` as cu WHERE cu.ID = ct.userteamid AND ct.relateTask = '".$relate."' AND ct.type = '".$type."' AND ct.relatedto = '".$pid."'");
        }
        
        return $query->result();
    }
    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

      function countTagMember($array){
         $this->db->select('tagid, COUNT(tagid) as total');
         $query = $this->db->get_where('crm_tag', $array);
         return $query->result();
      }

      function countTask($array){
         $this->db->select('projecttaskid, COUNT(projecttaskid) as totalTask');
         $query = $this->db->get_where('crm_projecttask', $array);
         return $query->result();
      }
         

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to get all project accorodding to tag
      =======================================================================================================
      ===================================================================================================== */

    function getAllProject() {
        $query = $this->db->query("SELECT p.`projectid` ,p.`relatedto`, p.`projectname` , p.`startdate`, p.`targetenddate`, p.`actualenddate`, p.`targetbudget`, p.`progress`, p.`projectstatus`, if(t.`idtype` = 'teamid', (SELECT g.`groupname` FROM `crm_groups` g WHERE g.`groupid` = t.`userteamid`), (SELECT u.`first_name` FROM `users` u WHERE u.`ID` = t.`userteamid`)) as AssignedTo FROM  `crm_project` p,  `crm_tag` t WHERE p.`projectid` = t.`relatedto` AND t.`type` =  'project' LIMIT 0 , 30");
        return $query->result();
    }

      function getMaxNum($table, $array = NULL) {
        $this->db->select_max($array);
        $query = $this->db->get($table);
        return $query->result();
    }

    function getTaskMembers($pid){
      $this->db->select('*');
      $this->db->from('crm_tag');
      $this->db->join('crm_users', 'crm_users.ID = crm_tag.userteamid');
      $this->db->where('type', "task"); 
      $this->db->where('relatedto', $pid); 
      $query = $this->db->get();
      return $query->result();
    }
    
    function getTaskFollower($tid){
      $this->db->select('*');
      $this->db->from('crm_taskfollower');
      $this->db->join('crm_users', 'crm_users.ID = crm_taskfollower.userteamid');
      $this->db->where('type', "task"); 
      $this->db->where('relateTask', $tid); 
      $query = $this->db->get();
      return $query->result();
    }

    function getTaskTags($tid){
      $this->db->select('*');
      $this->db->from('crm_taskTag');
      $this->db->where('task_id', $tid); 
      $this->db->where('type', "task"); 
      $query = $this->db->get();
      return $query->result();
    }
    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to get all project task accorodding to tag
      =======================================================================================================
      ===================================================================================================== */

    function getAllTask($orgid = FALSE) {
        //$query = $this->db->query("SELECT pt.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projecttask AS pt, crm_project AS p WHERE pt.`projectstatus` = 'live' AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid'");
        $query = $this->db->query("SELECT pt.* FROM crm_projecttask AS pt WHERE pt.`projectstatus` = 'live' AND pt.`projectid` = '0' AND pt.`workspaces` = '$orgid'");
        return $query->result();
    }

    /* =====================================================================================================
     * Use this method to get archived task @Sujon
     * ===================================================================================================== */

    function MyArchiveTask($orgid = FALSE, $userid = FALSE) {
        $query = $this->db->query("SELECT pt.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projecttask AS pt, crm_project AS p WHERE (pt.`projectstatus` = 'archived' OR pt.`projectstatus` = 'delete') AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND `opened_by` = '$userid' ");
        return $query->result();
    }
    
    /* =====================================================================================================
     * Use this method to get archived task @Sujon
     * ===================================================================================================== */

    function OtherArchiveTask($orgid = FALSE, $userid = FALSE) {
        $query = $this->db->query("SELECT pt.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projecttask AS pt, crm_project AS p , crm_tag AS ct WHERE (pt.`projectstatus` = 'archived' OR pt.`projectstatus` = 'delete') AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND ct.`relatedto` = pt.`projecttaskid` AND ct.`type`='task' AND ct.`userteamid` = '$userid' ");
        return $query->result();
    }

    /* =====================================================================================================
     * Use this method to get archived image @Sujon
     * ===================================================================================================== */

    function MyArchiveImg($orgid = FALSE, $userid = FALSE) {

        $query = $this->db->query("SELECT pt.*,mc.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projecttask AS pt, crm_project AS p, crm_modcomments AS mc WHERE (pt.`projectstatus` = 'archived' OR pt.`projectstatus` = 'delete') AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND `opened_by` = '$userid' AND pt.`projecttaskid`=mc.`typeID` AND mc.`comment` LIKE '%/yeezy/uploads/tempUpload/%' ORDER BY pt.`projecttaskid`, mc.`date`");

        //$query = $this->db->query("SELECT pt.*,mc.*,GROUP_CONCAT(mc.`comment`) as filelist from crm_modcomments mc right JOIN crm_projecttask pt ON pt.projecttaskid = mc.typeID  GROUP BY mc.`typeID`");
        //echo json_encode($query->result_array() );
        return ($query->result() );
    }
    
    /* =====================================================================================================
     * Use this method to get archived image @Sujon
     * ===================================================================================================== */

    function OtherArchiveImg($orgid = FALSE, $userid = FALSE) {

        $query = $this->db->query("SELECT pt.*,mc.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projecttask AS pt, crm_project AS p, crm_modcomments AS mc , crm_tag AS ct WHERE (pt.`projectstatus` = 'archived' OR pt.`projectstatus` = 'delete') AND p.`projectid` = pt.`projectid` AND `workspaces` = '$orgid' AND ct.`relatedto` = pt.`projecttaskid` AND ct.`type`='task' AND ct.`userteamid` = '$userid' AND pt.`projecttaskid`=mc.`typeID` AND mc.`comment` LIKE '%/yeezy/uploads/tempUpload/%' ORDER BY pt.`projecttaskid`, mc.`date`");

        //$query = $this->db->query("SELECT pt.*,mc.*,GROUP_CONCAT(mc.`comment`) as filelist from crm_modcomments mc right JOIN crm_projecttask pt ON pt.projecttaskid = mc.typeID  GROUP BY mc.`typeID`");
        //echo json_encode($query->result_array() );
        return ($query->result() );
    }
    
   
    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function tegMember($data) {
        $this->db->insert('group_tag', $data);
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function getAllModule() {
        $this->db->select("ID,name,type,url,create_user,create_date");
        $this->db->from('module');
        $query = $this->db->get();
        return $query->result();
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectAllCat($table, $coz = null) {
        $query = $this->db->get_where($table, $coz);
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectAllData($table) {
        $query = $this->db->get($table);
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectOneData($table, $coz) {
        $query = $this->db->get_where($table, $coz);
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectCatData($user_id) {

        $q = $this->db->query("SELECT g.ID as id,g.title as name,gt.user_id as uID FROM `group` as g JOIN group_tag as gt on g.ID = gt.group_id WHERE gt.user_id = '" . $user_id . "' OR g.admin = '" . $user_id . "' GROUP BY g.ID");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectPostData($user_id) {

        $q = $this->db->query("SELECT p.ID as id,p.title as title,pd.start_date as start,pd.end_date as end,p.description as description,p.priority FROM `post` as p JOIN `post_details` as pd on p.ID = pd.post_id  WHERE p.user_id = '" . $user_id . "'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectAllCatData() {

        $q = $this->db->query("SELECT ID as id,title as name FROM `group`");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function selectAllUser($user_id) {

        $q = $this->db->query("SELECT * FROM users WHERE ID != '" . $user_id . "'");

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function updateOneData($table, $data, $q) {
        $this->db->trans_start();
        $this->db->where($q);
        $this->db->update($table, $data);
        $this->db->trans_complete();
        // was there any update or error?
        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata('ctmsg', "update successfully.");
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_userdata('ctmsg', "Error while update.");
                return false;
            }
            $this->session->set_userdata('ctmsg', "update successfully.");
            return true;
        }
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

    function deleteItem($table, $id) {
        
		$this->db->delete($table, $id);
		
		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* =====================================================================================================
      =======================================================================================================
      Use this methhod to tag member in different category item.
      =======================================================================================================
      ===================================================================================================== */

      function getTaskDetails($id) {
        $qry="SELECT pt.*,p.`projectname` as projectname,p.`projectid` as projectID, (SELECT full_name FROM crm_users WHERE ID = opened_by) as display_name FROM crm_projecttask AS pt, crm_project AS p WHERE p.`projectid` = pt.`projectid` AND pt.`projecttaskid` = '" . $id . "'";

        $query = $this->db->query($qry);
        return $query->result();
      }

      function getTodoDetails($id) {
        $qry="SELECT pt.*,(SELECT full_name FROM crm_users WHERE ID = opened_by) as display_name,(SELECT ID FROM crm_users WHERE ID = opened_by) as display_userid FROM crm_projecttask AS pt WHERE pt.`projecttaskid` = '" . $id . "'";
        $query = $this->db->query($qry);
        return $query->result();
      }

     function getTaskByProId($org,$id) {
        $query = $this->db->query("SELECT * FROM crm_projecttask pt WHERE pt.`projectid` = '" . $id . "' AND pt.`workspaces` ='" . $org . "'");
        //if ($query->num_rows())
            return $query->result();
        //else
           // return false;
    }
    

    function updateQuoteCurrency($cur_name,$cur_val,$qid) {
      $query = $this->db->query("UPDATE crm_quotes 
        SET currency_name='".$cur_name."', currency_value='".$cur_val."'
        WHERE quoteid=".$qid."");
        return $query->result();
      }

    function getUnCatTaskDetails($id) {
        $query = $this->db->query("SELECT pt.*,cusr.full_name as creator_name FROM crm_projecttask AS pt left join crm_users cusr on cusr.ID=pt.opened_by WHERE pt.`projectid` = '0' AND pt.`projecttaskid` = '" . $id . "'");
        return $query->result();
    }

      function getUnCatTaskDetailsHD($id) {
        $query = $this->db->query("SELECT pt.*,cusr.full_name as creator_name FROM crm_activity AS pt left join crm_users cusr on cusr.ID=pt.CreatedBy WHERE pt.`Id` = '" . $id . "'");
        return $query->result();
    }

    function getUnCatTaskDetails_new($id) {
        $query = $this->db->query("SELECT pt.*,cusr.full_name as creator_name FROM crm_activity AS pt left join crm_users cusr on cusr.ID=pt.CreatedBy WHERE pt.`HasParentId` = '0' AND pt.`Id` = '" . $id . "'");
        return $query->result();
    }

    function getSubTaskDetails($id) {
        $query = $this->db->query("SELECT pt.*,p.`projectname` as projectname,p.`projectid` as projectID FROM crm_projectSubTask AS pt, crm_project AS p WHERE p.`projectid` = pt.`projectid` AND pt.`projecttaskid` = '" . $id . "'");
        return $query->result();
    }

    function getUnCatSubTaskDetails($id) {
        $query = $this->db->query("SELECT pt.* FROM crm_projectSubTask AS pt WHERE pt.`projectid` = '0' AND pt.`projecttaskid` = '".$id."'");
        return $query->result();
    }

    function getFeedback($id) {
        $query = $this->db->query("SELECT * FROM `crm_task_feedback` WHERE `taskid` = '$id' ORDER BY `id`");
        return $query->result();
    }

    function copyProject($id){
     $sessionData = $this->session->userdata('yeezyCRM');

	 $data['id'] = $sessionData['user_id'];
	 
	 $query = $this->db->query("insert into crm_project(`projectname`,`startdate`,`targetenddate`,`actualenddate`,`targetbudget`,`projecturl`,`projectstatus`,`projectDivid`,`projectpriority`,`projecttype`,`progress`,`assignTo`,`relatedto`,`description`,`org_id`,`project_type`,`proCurSta`,`createdBy`,`lastUpdate`) select `projectname`,`startdate`,`targetenddate`,`actualenddate`,`targetbudget`,`projecturl`,`projectstatus`,`projectDivid`,`projectpriority`,`projecttype`,`progress`,`assignTo`,`relatedto`,`description`,`org_id`,`project_type`,`proCurSta`,'".$data['id']."',`lastUpdate` from crm_project where `projectid`='".$id."'");
     
     
     if($this->db->affected_rows() > 0){
        $insertID = $this->db->insert_id();
        return $insertID;
      }
      else{
        return false;
      } 
    }

    function copyProjectTag($relatedTo,$newRelatedto){
      $query = $this->db->query("INSERT INTO crm_tag(type,relatedto,idtype,userteamid,user_status) SELECT type,".$newRelatedto.",idtype,userteamid,'0' FROM crm_tag WHERE type= 'project' AND relatedto='".$relatedTo."' AND user_status='0'");
      if($this->db->affected_rows() > 0){
        $insertID = $this->db->insert_id();
        return $insertID;
      }
      else{
        return false;
      }
    }

    // function copyProjectTag($relatedTo,){

    // }

    function listSort($user_id,$sort=false,$projectid){
      if($sort == "ATM"){
        $query= $this-> db -> query("SELECT * FROM `crm_projecttask` as cp,`crm_tasklist` as ct,`crm_tag` as ctt WHERE cp.`projectid`='".$projectid."' AND ctt.`userteamid`='".$user_id."' AND cp.`tasklistID` = ct.`inputDiv` AND cp.`opened_by` <> '".$user_id."' AND cp.`projecttaskid` = ctt.`relateTask`");
      }elseif($sort = "CBM"){
        $query= $this-> db -> query("SELECT * FROM `crm_projecttask` as cp,`crm_tasklist` as ct WHERE cp.`projectid`='".$projectid."' AND cp.`opened_by`='".$user_id."' AND cp.`tasklistID` = ct.`inputDiv`");
      }
      return $query->result();
    }

    function taskSort($user_id,$sort=false,$projectid){
      if($sort == "ATM"){
        $query= $this-> db -> query("SELECT * FROM `crm_projecttask` as cp,`crm_tasklist` as ct,`crm_tag` as ctt WHERE cp.`projectid`='".$projectid."' AND ctt.`userteamid`='".$user_id."' AND cp.`tasklistID` = ct.`inputDiv` AND cp.`opened_by` <> '".$user_id."' AND cp.`projecttaskid` = ctt.`relateTask` GROUP BY cp.`tasklistID`");
      }elseif($sort = "CBM"){
         $query= $this-> db -> query("SELECT * FROM `crm_projecttask` as cp,`crm_tasklist` as ct WHERE cp.`projectid`='".$projectid."' AND cp.`opened_by`='".$user_id."' AND cp.`tasklistID` = ct.`inputDiv` GROUP BY cp.`tasklistID`");
      }
      return $query->result();
    }

    function getmilestone($inputDiv){
      $query= $this->db->query("SELECT startDate,endDate FROM crm_tasklist WHERE inputDiv='".$inputDiv."'");
      return $query->result();
    }

    function tasklistMake($newID,$oldID,$rTO){
      $query= $this->db->query("INSERT INTO crm_tasklist (related_to,name,inputDiv,description,startDate,endDate) SELECT '".$rTO."',name,'".$newID."',description,startDate,endDate FROM crm_tasklist WHERE inputDiv='".$oldID."'");
      if($this->db->affected_rows() > 0){
        $insertID = $this->db->insert_id();
        return $insertID;
      }
      else{
        return false;
      } 
      
    }
    

    function getAllActivity($user_id,$org_id){
      $query = $this->db->query("SELECT cu.full_name,ca.* FROM crm_users as cu,crm_activity_log as ca where cu.ID = ca.user_id  AND ca.org_id = '".$org_id."' ORDER BY activity_time ASC");
      return $query->result();
    }

    function findInviteUser($pid, $tid, $type){
      $query = $this->db->query("SELECT DISTINCT  `userteamid` , `email`, `invited` FROM  `crm_tag` ,  `crm_users` WHERE  `userteamid` =  `ID` AND  `relatedto` = '".$pid."' AND  `relateTask` = '".$tid."' AND  `user_status` = '".$type."' AND  `invited` = 1");

      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }
    
    function findInviteUser4project($pid, $type){
      $query = $this->db->query("SELECT DISTINCT `userteamid` , `email` , `invited` FROM `crm_tag` , `crm_users` WHERE `type` = 'project' AND `userteamid` = `ID` AND `relatedto` = '".$pid."' AND `user_status` = '".$type."'  AND  `invited` = 1");

      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }
	
	function allNotifList($notification_for,$type_id,$type,$createdby){
        $query = $this->db->query("SELECT noti.* FROM crm_notification as noti where noti.notification_for = '".$notification_for."' AND noti.type_id = '".$type_id."' AND noti.type = '".$type."' AND createdby <> '".$createdby."' ");
        return $query->result();
    }

    function getAllNotList($notification_for,$user_id){
        $query = $this->db->query("SELECT * FROM crm_notification as noti where noti.notification_for = '".$notification_for."' AND noti.status = '0' and noti.user_id = '".$user_id."'");
        return $query->result();
    }

    function getAllNotListLastday($notification_for,$user_id){
        $query = $this->db->query("SELECT * FROM crm_notification WHERE ( DATE(not_fire_time) = CURDATE() OR status = '0' ) AND user_id = '".$user_id."'");
        return $query->result();
    }

    function getAllUserFromNoti($task,$project){
        $query = $this->db->query("SELECT `user_id` FROM `crm_notification` WHERE `type`='task' and `type_id` ='".$project."' and `relatedTo` = '".$task."'");
        return $query->result();
    }
    
    function getAllActivitytime($user_id,$org_id){
        $query = $this->db->query("SELECT cu.full_name,ca.* FROM crm_users as cu,crm_activity_log as ca where cu.ID = ca.user_id  AND ca.org_id = '".$org_id."' AND activity_time >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY DATE(activity_time) ORDER BY activity_time ASC");
        return $query->result();
    }
	
	function getAllActivitytimeForAll($user_id,$org_id){
        $query = $this->db->query("SELECT cu.full_name,ca.* FROM crm_users as cu,crm_activity_log as ca where cu.ID = ca.user_id  AND ca.org_id = '".$org_id."' AND MONTH(activity_time) > MONTH(CURDATE()-INTERVAL 2 MONTH)  GROUP BY DATE(activity_time) ORDER BY activity_time ASC");
        return $query->result();
    }

    function getAllActivitiesList($user_id,$org_id){
        $query = $this->db->query("SELECT cu.full_name,ca.* FROM crm_users as cu,crm_activity_log as ca where cu.ID = ca.user_id  AND ca.org_id = '".$org_id."' ORDER BY activity_time ASC");
        return $query->result();
    }
	
	function getAllNotListAll($notification_for,$user_id){
        $query = $this->db->query("SELECT * FROM crm_notification WHERE ( YEAR(not_fire_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(not_fire_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) ) AND user_id = '".$user_id."'");
        return $query->result();
    }
    // sujon @ 8/10/2016
    function updateQuoteList($data,$qid){

        $this->db->where('quoteid',$qid);
        
        $this->db->update('crm_quotes',$data);
    }

    // sujon @ 8/10/2016
    function updateInvQuoteList($data,$invid){

      $this->db->where('invoiceid',$invid);
      $this->db->update('crm_invoice',$data);
    }

    // sujon @ 8/24/2016
    function updateInvoiceQuoteList($data,$qid){
      
      $this->db->where('quoteid',$qid);
      $this->db->update('crm_quotes',$data);
    }
    
    // Added by Mahfuzur Rahman
    function getnoofsubtaskintask($pid){
        $query = $this->db->query("SELECT t.projecttaskid as taskid, count(st.projecttaskid) as nosubtask FROM yzy.crm_projecttask as t, yzy.crm_projectSubTask as st where t.projectid = '$pid' and t.projecttaskid = st.parenttaskID group by st.parenttaskID");
        return $query->result();
    }
    // Added by Dipok
    function getComleteTask($projectID){
        $query = $this -> db -> query("SELECT COUNT(projecttaskid) as total_100,(SELECT count(projecttaskid) FROM yzy.crm_projecttask WHERE projectid = '$projectID') as total_task FROM yzy.crm_projecttask where projectid = '$projectID' and ( projecttaskprogress = '100%' OR projecttaskprogress = '100' )");
        return $query->result();
    }

    function selectODSchduleDate($user_id,$curdate){
        $query = $this -> db -> query("SELECT * FROM crm_email_scheduler WHERE user_id = '".$user_id."' AND ( ( flag_overdue ='0' AND send_last_time LIKE '".$curdate."%' ) OR ( send_last_time NOT LIKE '".$curdate."%' ) )");
        
        if ($query->num_rows())
                return true;
            else
                return false;
    }

    function selectADSchduleDate($user_id,$curdate){
        $query = $this -> db -> query("SELECT * FROM crm_email_scheduler WHERE user_id = '".$user_id."' AND ( ( flag_almostdue ='0' AND send_last_time LIKE '".$curdate."%' ) OR ( send_last_time NOT LIKE '".$curdate."%' ) )");
        
        if ($query->num_rows())
                return true;
            else
                return false;
    }

    function selectODTDSchduleDate($user_id,$curdate){
        $query = $this -> db -> query("SELECT * FROM crm_email_scheduler WHERE user_id = '".$user_id."' AND ( ( flag_odtodo ='0' AND send_last_time LIKE '".$curdate."%' ) OR ( send_last_time NOT LIKE '".$curdate."%' ) )");
        
        if ($query->num_rows())
                return true;
            else
                return false;
    }

    function checkToday($user_id,$curdate){
        $query = $this -> db -> query("SELECT * FROM crm_email_scheduler WHERE user_id = '".$user_id."' AND send_last_time LIKE '".$curdate."%' ");
        
        if ($query->num_rows())
                return true;
            else
                return false;
    }

    function getAllAlmostDueTask($org_id,$user_id) {
        $query = $this->db-> query("SELECT cp.*,ct.* FROM crm_projecttask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND (cp.enddate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day))");

        //return $query->result();
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    function getTodayToDoList($user_id){
        $query = $this ->db->query("SELECT po.*,pd.* FROM post po INNER JOIN post_details pd ON  po.ID = pd.post_id WHERE user_id = '".$user_id."' AND (pd.end_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day))");

        //return $query->result();
        if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

  function getAllprojectsoverDue($org_id,$user_id) {
        $query = $this->db-> query("SELECT cp.*,ct.*, 
                                      (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, 
                                      (SELECT img FROM crm_users WHERE ID = assignTo) as img, 
                                      (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img 
                                    FROM 
                                      crm_project as cp LEFT JOIN 
                                      crm_tag as ct ON cp.projectid = ct.relatedto AND 
                                      ct.type = 'project' 
                                    WHERE 
                                      cp.org_id = '".$org_id."' AND 
                                      ((cp.createdBy='".$user_id."' OR cp.assignTo = '".$user_id."') OR ct.userteamid = '".$user_id."' ) AND (cp.progress != '100') AND (cp.targetenddate >= DATE_SUB(CURDATE(), INTERVAL 365 DAY))
                                    GROUP BY 
                                      cp.projectid 
                                    ORDER BY 
                                      cp.projectid DESC");
        return $query->result();
    }

    function getAllprojectsAlmostDue($org_id,$user_id) {
        $query = $this->db-> query("SELECT cp.*,ct.*, 
                                      (SELECT full_name FROM crm_users WHERE ID = assignTo) as display_name, 
                                      (SELECT img FROM crm_users WHERE ID = assignTo) as img, 
                                      (SELECT img FROM crm_users WHERE ID = createdBy) as createdBy_img 
                                    FROM 
                                      crm_project as cp LEFT JOIN 
                                      crm_tag as ct ON cp.projectid = ct.relatedto AND 
                                      ct.type = 'project' 
                                    WHERE 
                                      cp.org_id = '".$org_id."' AND 
                                      ((cp.createdBy='".$user_id."' OR cp.assignTo = '".$user_id."') OR ct.userteamid = '".$user_id."' ) AND (cp.targetenddate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day))
                                    GROUP BY 
                                      cp.projectid 
                                    ORDER BY 
                                      cp.projectid DESC");
        return $query->result();
    }


    function getTodayTask($org_id,$user_id) {
      $query = $this->db-> query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid  LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND (cp.startdate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day))");

      //return $query->result();
      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    function getAllMyTask($org_id,$user_id) {
      $query = $this->db-> query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid  LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.projectid = '0' AND cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."')");

      //return $query->result();
      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    function getAllDirectTodayTask($org_id,$user_id) {
      $query = $this->db-> query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid  LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.projectid = '0' AND cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND (cp.startdate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day))");

      //return $query->result();
      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }

    function getAllDirectOverDueTask($org_id,$user_id) {
      $query = $this->db-> query("SELECT cp.*,ct.*,crp.* FROM crm_projecttask as cp LEFT JOIN crm_project as crp ON crp.projectid = cp.projectid LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.projectid = '0' AND cp.workspaces = '".$org_id."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND (cp.projecttaskprogress != '100') AND (cp.enddate >= DATE_SUB(CURDATE(), INTERVAL 365 DAY))");
      
      if ($query->num_rows())
            return $query->result();
        else
            return false;
    }


    function get_name_by_id($type, $type_id) {
        $query = $this->db->get_where($type, array('workspace' => $type_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }


    function getDocList($Vid){
      // $qry="SELECT * FROM crm_file as cf, crm_users as user WHERE (cf.type = 'TASK' AND cf.typeID = '".$Vid."') AND (cf.user = user.ID )";
      // file_put_contents("filenamegetdoc.txt", $qry);
        $query =$this->db->query("SELECT * FROM crm_file as cf, crm_users as user WHERE (cf.type = 'TASK' AND cf.typeID = '".$Vid."') AND (cf.user = user.ID )");
        if($query -> num_rows())
                    return $query->result();
            else
                    return false;
    }

    function getComment($Vid,$type){
        $query =$this->db->query("SELECT * FROM crm_modcomments WHERE type = '".$type."' AND typeID='".$Vid."'");
        //$query = $this->db->get_where('crm_file',array('type'=>'TASK','typeID'=>$Vid));
        if($query -> num_rows())
                    return $query->result();
            else
                    return false;
    }


    function getCommentMyFeed($type){
        $query =$this->db->query("SELECT * FROM crm_modcomments WHERE type = '".$type."'");
        //$query = $this->db->get_where('crm_file',array('type'=>'TASK','typeID'=>$Vid));
        
        if($query -> num_rows())
          return $query->result();
        else
          return false;
    }

    
    function getAllDocList($Vid){
        $query =$this->db->query("SELECT * FROM crm_file as cf, crm_users as user , crm_projecttask as ptask WHERE (cf.type = 'TASK' AND cf.proID = '".$Vid."') AND (cf.user = user.ID ) AND (cf.typeID = ptask.projecttaskid ) order by cf.typeID ");
        if($query -> num_rows())
                    return $query->result();
            else
                    return false;
    }

    

    // function getAllMyTaskLatestThree($org_id,$user_id,$taskLisdid,$projectid) {
    //     $query = $this->db->query("SELECT cp.*,ct.* FROM crm_projecttask as cp LEFT JOIN crm_tag as ct ON cp.projecttaskid = ct.relateTask AND ct.type = 'task' AND ct.userteamid = '".$user_id."' WHERE cp.workspaces = '".$org_id."' AND cp.tasklistID = '".$taskLisdid."' AND (cp.opened_by = '".$user_id."' OR ct.userteamid = '".$user_id."') AND cp.projectid = '".$projectid."' ORDER BY cp.projectid DESC LIMIT 3");
    //     return $query->result();
    // }

    

    function getAllcommentforproject($projectID){
        $query = $this->db->query("SELECT * FROM allcommentforprojects WHERE HasParentId = '".$projectID."' ORDER BY Id DESC");
        
        return $query->result();
    }

    function getAllStatusforproject($projectID){
        $query = $this->db->query("SELECT * FROM allstatusforprojects WHERE HasParentId = '".$projectID."' ORDER BY Id DESC");
        
        return $query->result();
    }

    function getAllcommentfortodo($projectID){
        $query = $this->db->query("SELECT * FROM allcommentforprojects WHERE HasParentId = '".$projectID."'");
        
        return $query->result();
    }

    function getAlltagforproject($projectID){
        $query = $this->db->query("SELECT * FROM getalltagfromtagtbl WHERE RelatedTo = '".$projectID."' AND UserStatus = '2'");
        
        return $query->result();
    }

    function getAlltagforprojectCO($projectID){
        $query = $this->db->query("SELECT * FROM getalltagfromtagtbl WHERE RelatedTo = '".$projectID."' AND UserStatus = '1'");
        
        return $query->result();
    }

    function getSpecificUser($projectID,$status){
        $query = $this->db->query("SELECT * FROM getalltagfromtagtbl WHERE RelatedTo = '".$projectID."' AND UserStatus = '".$status."'");
        
        return $query->result();
    }

    function getAlltagfortodo($projectID){
      $query = $this->db->query("SELECT * FROM getalltagfromtagtbl_old WHERE RelatedTo = '".$projectID."'");
        
      return $query->result();
    }

    function getcreatorproject($projectID){
      $query = $this->db->query("SELECT createdBy, CreatedDate FROM crm_activity WHERE Id = '".$projectID."'");
      return $query->result();
    }

    function haseuser($id){
      $query = $this->db->query("SELECT COUNT(Id) as total FROM crm_tagHD WHERE ( type = 'Task' OR type = 'Todo' ) AND RelatedTo = '".$id."'");
      return $query->result();
    }

    function getAllprojectAdmin($pid,$creator){
        $query = $this->db->query("SELECT userid FROM crm_tagHD WHERE UserStatus = '1' AND RelatedTo = '".$pid."' AND userid <> '".$creator."'");
        return $query->result();
    }

    function alldate($proID){
      $query = $this->db->query("SELECT DATE(Enddate) as date FROM crm_activity WHERE HasParentId= '".$proID."' GROUP BY DATE(`Enddate`) ORDER BY enddate DESC");
      return $query->result();

    }


    function get_created_by_id($type,$type_id='',$field='CreatedBy')
    {
        return  $this->db->get_where($type,array('Id'=>$type_id))->row()->$field;    
    }

    function getUnseenComment($parentID,$userid,$type){
      
      $query = $this->db->query("SELECT COUNT(id) as unseenComment FROM crm_temp_tbl WHERE parent = '".$parentID."' AND userid = '".$userid."' AND parentType = '".$type."'");
      return $query->result();

    }

    function chekUserPrefarence($projectID,$createID,$Type,$actionID){

        $query = $this->db->query("SELECT * FROM crm_activity ca, crm_tagHD as ctg WHERE (ca.CreatedBy = '".$createID."' OR ctg.assignBy = '".$createID."') AND ( ctg.type = '".$Type."' AND ca.Type = '".$Type."' )  AND ctg.RelatedTo = '".$projectID."' AND ctg.userid = '".$actionID."' AND (ctg.RelatedTo = ca.Id)");
        return $query->result();
    }

    function hassubtask($parentID){
        $query = $this->db->get_where('getsubtask', array("HasParentId" => $parentID));
        if ($query->num_rows())
            return TRUE;
        else
            return FALSE;
    }

    function getTaskDtl($parentID){
        $query = $this->db->get_where('crm_activity', array("Id" => $parentID));
        if ($query->num_rows())
            return $query->result();
        else
            return FALSE;
    }

    // sujon @ 3-12-2017
     function selectTaskByUser($pro_id,$user_id) {


        $qry = "select * from crm_activity ca
        join crm_tagHD ct on ct.RelatedTo=ca.Id
        where ca.Type='Task' and ca.HasParentId='$pro_id' and ct.userid='$user_id'";

        $q = $this->db->query($qry);

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    // sujon @ 3-12-2017
     function selectTaskByAdmin($pro_id,$user_id) {


        $qry = "select * from crm_activity ca
        where ca.Type='Task' and ca.HasParentId='$pro_id'";

        $q = $this->db->query($qry);

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }

    // sujon @ 3-12-2017
     function getProjectStatus($pro_id) {
      

        $qry = "select GROUP_CONCAT(ca.Status) taskstatus,
(select GROUP_CONCAT(cac.Status) from crm_activity cac where cac.Type='SubTask' and cac.HasParentId=ca.Id) substatus from crm_activity ca
        where (ca.Type='Task') and ca.HasParentId='$pro_id'";

        //sujon vai file use koren valo kotha etar karone je amader problem hoy eta bujen na????? use koren remove koren na keno?
        //file_put_contents("temp/getProjectStatus.txt",$qry );
        
        $q = $this->db->query($qry);

        if ($q->num_rows())
            return $q->result();
        else
            return false;
    }
     
     // sujon @ 4-13-2017
    function loadReportbyDate($start_date,$end_date,$type,$orgid,$requestData,$columns){ 

        $str_qry="SELECT  
       
        GROUP_CONCAT(ctag.userid) as tag_ids,
        GROUP_CONCAT(cuser.display_name) as tag_names,
        pt.`Type` as type,
        pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        pt.`Id` as ID

        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id
        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
        LIMIT ".$requestData['start']." ,".$requestData['length']."
        ";

        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

     // sujon @ 4-13-2017
    function loadReportbyDateSearch($start_date,$end_date,$type,$orgid,$requestData,$columns){ 

        $str_qry="SELECT  
       
        GROUP_CONCAT(ctag.userid) as tag_ids,
        GROUP_CONCAT(cuser.display_name) as tag_names,
        pt.`Type` as type,
        pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        pt.`Id` as ID

        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        GROUP BY pt.Id
        HAVING (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        AND (pt.`Workspaces` = '$orgid') 
        AND (pt.`Title` LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Startdate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Enddate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR pt.`CompletedAt` LIKE '%".$requestData['search']['value']."%'
        OR pt.`Status` LIKE '%".$requestData['search']['value']."%'
        OR tag_names LIKE '%".$requestData['search']['value']."%')
        
        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
        LIMIT ".$requestData['start']." ,".$requestData['length']."
        ";

        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

     // sujon @ 4-13-2017
    function loadReportbyDateSearchTotal($start_date,$end_date,$type,$orgid,$requestData,$columns){ 

        $str_qry="SELECT  
       
        GROUP_CONCAT(ctag.userid) as tag_ids,
        GROUP_CONCAT(cuser.display_name) as tag_names,
        pt.`Type` as type,
        pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        pt.`Id` as ID

        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        GROUP BY pt.Id 
        HAVING (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        AND (pt.`Workspaces` = '$orgid') 
        AND (pt.`Title` LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Startdate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Enddate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR pt.`CompletedAt` LIKE '%".$requestData['search']['value']."%'
        OR pt.`Status` LIKE '%".$requestData['search']['value']."%'
        OR tag_names LIKE '%".$requestData['search']['value']."%')
       
         
        ";

        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    // sujon @ 4-13-2017
    function loadReportbyDateTotal($start_date,$end_date,$type,$orgid,$requestData,$columns){ 

        $str_qry="SELECT  
       
        GROUP_CONCAT(ctag.userid) as tag_ids,
        GROUP_CONCAT(cuser.display_name) as tag_names,
        pt.`Type` as type,
        pt.*,
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        pt.`Id` as ID

        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id
        ";

        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

     // sujon @ 4-13-2017
    function loadReportbyAssgn($start_date,$end_date,$type,$orgid,$assids,$requestData,$columns){ 

        $str_qry="SELECT pt.*,
        (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        AND ctag.`userid` in ($assids)
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id
        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
        LIMIT ".$requestData['start']." ,".$requestData['length']."";

      
        file_put_contents("temp/reportdataass.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    // sujon @ 4-13-2017
    function loadReportbyAssgnSearch($start_date,$end_date,$type,$orgid,$assids,$requestData,$columns){ 

        $str_qry="SELECT pt.*,
        (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 
         WHERE ctag.`userid` in ($assids)
         GROUP BY pt.Id
         
        HAVING (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
       
        AND (pt.`Workspaces` = '$orgid') 
        AND (pt.`Title` LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Startdate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Enddate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR pt.`CompletedAt` LIKE '%".$requestData['search']['value']."%'
        OR pt.`Status` LIKE '%".$requestData['search']['value']."%'
        OR tag_names LIKE '%".$requestData['search']['value']."%')

       
        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
        LIMIT ".$requestData['start']." ,".$requestData['length']."";

      
        file_put_contents("temp/reportdataass.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    // sujon @ 4-13-2017
    function loadReportbyAssgnSearchTotal($start_date,$end_date,$type,$orgid,$assids,$requestData,$columns){ 

        $str_qry="SELECT pt.*,
        (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 
        WHERE ctag.`userid` in ($assids)
        GROUP BY pt.Id
        
        HAVING (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        
        AND (pt.`Workspaces` = '$orgid')
        AND (pt.`Title` LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Startdate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR DATE_FORMAT(pt.`Enddate`, '%M-%d-%Y') LIKE '%".$requestData['search']['value']."%'
        OR pt.`CompletedAt` LIKE '%".$requestData['search']['value']."%'
        OR pt.`Status` LIKE '%".$requestData['search']['value']."%'
        OR tag_names LIKE '%".$requestData['search']['value']."%')

        
        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
        LIMIT ".$requestData['start']." ,".$requestData['length']."";

      
        file_put_contents("temp/reportdataass.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    // sujon @ 4-13-2017
    function loadReportbyAssgnTotal($start_date,$end_date,$type,$orgid,$assids,$requestData,$columns){ 

        $str_qry="SELECT pt.*,
        (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (DATE_FORMAT(pt.`Startdate`, '%Y-%m-%d') < '".$end_date."' 
        AND DATE_FORMAT(pt.`Enddate`, '%Y-%m-%d') >= '".$start_date."' 
        AND pt.`Startdate` > '0000-00-00' 
        AND pt.`Enddate` > '0000-00-00')
        AND (pt.`Type` = '$type')
        AND ctag.`userid` in ($assids)
        AND (pt.`Workspaces` = '$orgid') 
        GROUP BY pt.Id
        ";

      
        file_put_contents("temp/reportdataass.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadReportbyChildren($typeid,$type=0,$orgid=0){ 

        $str_qry="SELECT  pt.*,
       
        GROUP_CONCAT(ctag.userid) as tag_ids,
        GROUP_CONCAT(cuser.display_name) as tag_names,
        pt.`Type` as type,
        
        pt.`Startdate` as start,
        pt.`Enddate` as end,
        pt.`Title` as title,
        pt.`Priority` as priority,
        pt.`Id` as ID
        

        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (pt.`HasParentId` = '$typeid')
        
        GROUP BY pt.Id
        order by pt.`Enddate`";
        //AND pt.Startdate <= pt.Enddate AND pt.Enddate > '0000-00-00' AND pt.Startdate > '0000-00-00' 
        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadReportbyUserId($typeid,$typename,$user_id=0,$org_id=0,$date_from,$date_to){ 

        $str_qry="SELECT  pt.*,
        (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id AND ctag2.UserStatus='2') tag_names,
        
        (SELECT GROUP_CONCAT(DISTINCT cuser2.ID) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.ID 
        where ctag2.RelatedTo = pt.Id AND ctag2.UserStatus='2') tag_ids
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag on ctag.RelatedTo = pt.Id
        left join crm_users cuser on ctag.userid = cuser.Id 

        WHERE (pt.`HasParentId` = '$typeid')
        AND (ctag.userid = '".$user_id."')
        AND pt.Enddate > '0000-00-00' AND pt.Startdate > '0000-00-00' 
        AND DATE_FORMAT(pt.Startdate, '%Y-%m-%d') >= '".($date_from=='Invalid date' ? '1000-01-01' : $date_from)."' 
        AND DATE_FORMAT(pt.Enddate, '%Y-%m-%d') <= '".($date_to=='Invalid date' ? '9999-12-31' : $date_to)."' 
        
        AND ctag.UserStatus='2'
        GROUP BY pt.Id
        order by pt.`Enddate`";
        //AND pt.Startdate <= pt.Enddate AND pt.Enddate > '0000-00-00' AND pt.Startdate > '0000-00-00' 
        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadSettingsbyUserId($userid){ 

        $str_qry="SELECT  *
        
        FROM crm_users cuser 
        
        left join crm_settings cs on cs.HasUserId = cuser.Id 

        WHERE (cuser.`Id` = '$userid')
       
        ";
       
        $query = $this->db->query($str_qry);

        
        return $query->row();
    }

    function loadReportbyChildren2($typeid,$type=0,$orgid=0){ 

        $str_qry="SELECT  pt.*
       
        FROM crm_activity AS pt 
        left join crm_activity pt2 on pt2.HasParentId = pt.Id
        
        WHERE (pt.`HasParentId` = '$typeid')
        
        GROUP BY pt.Startdate
        order by pt.`Startdate`";
        file_put_contents("temp/loadReportbyChildren2.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadReportDashboard($typeid){ 

        $str_qry="SELECT  pt.*,
        cuser_ad.display_name admin_name,
        GROUP_CONCAT(DISTINCT cuser_coad.display_name) coadmin_name,
        GROUP_CONCAT(DISTINCT cuser_mem.display_name) member_name
        
        FROM crm_activity AS pt 
        left join crm_tagHD ctag_coad on ctag_coad.RelatedTo = pt.Id and ctag_coad.UserStatus = 1
        left join crm_tagHD ctag_mem on ctag_mem.RelatedTo = pt.Id and ctag_mem.UserStatus = 2
        left join crm_users cuser_coad on ctag_coad.userid = cuser_coad.Id 
        left join crm_users cuser_mem on ctag_mem.userid = cuser_mem.Id 
        left join crm_users cuser_ad on pt.CreatedBy = cuser_ad.Id 

        WHERE (pt.`Id` = '$typeid')
        
        GROUP BY pt.Id";
        
        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadReportGantt($proid){ 

        $str_qry="SELECT  pt.*
        
        FROM crm_activity AS pt 
        
        WHERE (pt.`Id` = '$proid' AND pt.Enddate > '0000-00-00')
        
        GROUP BY pt.Id";
        
        file_put_contents("temp/reportdata.txt", $str_qry);
        $query = $this->db->query($str_qry);

        
        return $query->result();
    }

    function loadReportbyGroup($groupid,$orgid){ 

        $str_qry="SELECT cmsg.msg as Title,
        cmsg.time as CreatedDate,
        cusr.display_name as senderName,
        cgrp.group_name as receiverName

        FROM crm_message AS cmsg 
        left join crm_users cusr on cusr.email = cmsg.sender_id
        left join crm_message_group cgrp on cgrp.group_id = cmsg.receiver_id 

        WHERE cmsg.`receiver_id` = '$groupid'
        ";
        
         $query = $this->db->query($str_qry);

         return $query->result();
    }

    function loadReportbyId($typeid,$orgid){ 

        $str_qry="SELECT cmd.comment as Title,
        cmd.date as CreatedDate,
        cusr.display_name as senderName,
        cact.Title as receiverName

        FROM crm_modcomments AS cmd 
        left join crm_users cusr on cusr.ID = cmd.`user`
        left join crm_activity cact on cact.ID = cmd.`typeID`
        
        WHERE cmd.`typeID` = '$typeid'
        ";
        
         $query = $this->db->query($str_qry);

         return $query->result();
    }

     function loadReportbyUser($chat_from,$chat_to,$typeid,$orgid){ 

        $str_qry="SELECT cmsg.msg as Title,
        cmsg.time as CreatedDate,
        cusr.display_name as senderName,
        cusr2.display_name as receiverName

        FROM crm_message AS cmsg 
        left join crm_users cusr on cusr.email = cmsg.sender_id
        left join crm_users cusr2 on cusr2.email = cmsg.receiver_id
        
        WHERE cmsg.`receiver_id` = '$chat_to'
        AND cmsg.`sender_id`= '$chat_from'
        ";
        
         $query = $this->db->query($str_qry);

         return $query->result();
    }

    function loadDashboardDueTasks($pid){

      $qry="SELECT * FROM crm_activity where HasParentId='$pid' and Status <> 'completed'";
       $query = $this->db->query($qry);

         return $query->num_rows();


    }

    function loadDashboardDueTasksWeek($pid){

      $qry="SELECT pt.Title taskTitle,ptsub.Title subtaskTitle,pt.Enddate,
      (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names

      FROM crm_activity pt
      left join crm_activity ptsub on pt.Id = ptsub.HasParentId
      where pt.HasParentId='$pid' and pt.Status <> 'completed'
      and pt.Enddate < DATE_ADD(CURDATE(),INTERVAL 7 DAY)
      AND pt.Enddate > '0000-00-00'";
       $query = $this->db->query($qry);

        
         return $query->result();


    }

    function loadTimelineAll($pid){
      $qry="SELECT * FROM crm_activity pt
      where pt.HasParentId='$pid' 
UNION
SELECT * FROM crm_activity ptsub
where pt.Id = ptsub.HasParentId ";

      // $qry="SELECT pt.Startdate ts,ptsub.Startdate st
      
      // FROM crm_activity pt
      // left join crm_activity ptsub on pt.Id = ptsub.HasParentId
      // where pt.HasParentId='$pid' 
      // ";
       $query = $this->db->query($qry);

        file_put_contents("temp/loadTimelineAll.txt", $qry);

         return $query->result();


    }

    function loadDashboardOverDueTasks($pid){

      $qry="SELECT pt.*, 
      (SELECT GROUP_CONCAT(DISTINCT cuser2.display_name) FROM crm_tagHD ctag2
        left join crm_users cuser2 on ctag2.userid = cuser2.Id 
        where ctag2.RelatedTo = pt.Id) tag_names

      FROM crm_activity AS pt where pt.HasParentId='$pid' and pt.Enddate < curdate() and pt.Status <> 'completed' AND pt.Enddate > '0000-00-00'";
       $query = $this->db->query($qry);

         return $query->result();


    }

    function loadDashboardLastStatus($typeid){ 

        $str_qry="SELECT *
        
        FROM crm_modcomments AS cmd 
        
        WHERE cmd.`typeID` = '$typeid' 
        order by cmd.`date` DESC LIMIT 1";


       
         $query = $this->db->query($str_qry);

         return $query->row();
    }

    function countTotalSubtask($parentID){
        $query = $this->db->query("SELECT COUNT(Id) as TotalSub,HasParentId FROM crm_activity WHERE HasParentId = '".$parentID."'");
        return $query->result();
    }



}

?>
