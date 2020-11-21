<?php
class Chatmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function insertData($table = FALSE, $data = FALSE){
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0)
			return $this->db->insert_id();
		else
			return false;
	}
	
	
	function searchMember($uid = FALSE, $org_id = FALSE){
		$query = $this->db->query("SELECT * FROM `crm_users` WHERE `email` <> '$uid' AND `org_id` = '$org_id' AND `status` = 'ACTIVE' ORDER BY full_name");
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}
	
	function searchProjectChat($uid = FALSE){
		$query = $this->db->query("SELECT projectid, projectDivid, projectname, project_chat_name, (SELECT GROUP_CONCAT(DISTINCT userteamid) FROM yzy.crm_tag where relatedTo = crm_project.projectid) AS userlist FROM `crm_project` WHERE crm_project.project_chat_name <> '' AND FIND_IN_SET('$uid', (SELECT GROUP_CONCAT(DISTINCT userteamid) FROM yzy.crm_tag where relatedTo = crm_project.projectid)) ORDER BY project_chat_name");
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}
	
	function searchGroupList($pid=FALSE, $uid=FALSE){
		$query = $this->db->query("SELECT * FROM `message_group` WHERE `pid` = '$pid' AND FIND_IN_SET('$uid', `group_member`)");
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}
	function searchAllGroupList($uid = FALSE){
		$query = $this->db->query("SELECT * FROM `message_group` WHERE FIND_IN_SET('$uid', `group_member`)");
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}
	
	function searchGroupMember($id){
		$query = $this->db->query("SELECT * FROM `message_group` WHERE `group_id` = '$id' ");
		if($query->num_rows() > 0){
			$r = $query->result() ;
			$list = explode(",", $r[0]->group_member);
			return $list;
		}
		else{
			$query = $this->db->query("SELECT cu.email as group_member FROM `crm_tag` as ct, `crm_users` as cu WHERE cu.status = 'ACTIVE' AND cu.ID = ct.userteamid AND ct.type = 'project' AND ct.relatedto = '".$id."' GROUP BY cu.ID ORDER BY ct.tagid ASC");
			if($query->num_rows() > 0){
				$list = array();
				$r = $query->result();
				foreach ($r as $key => $value) {
					array_push($list, $value->group_member);
				}
				return $list;
			}
			else
				return false;
		}
	}
	
	function getMessage($mid){
		//SELECT * FROM  `message` WHERE  `receiver_id` IN (SELECT `group_id` FROM  `message_group` WHERE  `group_member` =  'mr@demo.com') OR  `receiver_id` =  'mr@demo.com' OR  `sender_id` =  'mr@demo.com' ORDER BY id DESC
		$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` IN (SELECT `group_id` FROM  `message_group` WHERE  `group_member` =  '$mid') OR  `receiver_id` =  '$mid' OR  `sender_id` =  '$mid' ORDER BY id DESC");
		if($query->num_rows())
			return $query->result();
		else
			return false;
	}
	
	function searchMsg($mid, $fid){
		//echo "SELECT * FROM  `message` WHERE  (`receiver_id` =  '$mid' AND  `sender_id` =  '$fid') OR (`receiver_id` =  '$fid' AND  `sender_id` =  '$mid') ORDER BY time LIMIT 0 , 30";
		$query = $this->db->query("SELECT * FROM  `message` WHERE  (`receiver_id` =  '$mid' AND  `sender_id` =  '$fid') OR (`sender_id` =  '$mid' AND `receiver_id` =  '$fid') ORDER BY time DESC LIMIT 0 , 30");
		if($query->num_rows()){
			$this->db->update('message', array('status' =>0), array('receiver_id' =>  $mid, 'sender_id' => $fid, 'status' => 1)); 
			return array_reverse($query->result()) ;
		}
		else
			return false;
	}
	
	function searchGroupMsg($mid, $group_id){
		$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` =  '$group_id' ORDER BY time DESC LIMIT 0 , 100");
		if($query->num_rows()){
			$this->db->query("UPDATE message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'"); 
			//$this->db->update('message', array('status' =>0), array('receiver_id' =>  $group_id, 'status' => 1)); 
			return array_reverse($query->result()) ;
		}
		else
			return false;
	}
	
	function searchNewMsg($mid, $fid){
		$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` =  '$mid' AND  `sender_id` =  '$fid' AND `status` = '1' ORDER BY time DESC LIMIT 1");
		if($query->num_rows()){
			$this->db->update('message', array('status' =>0), array('receiver_id' =>  $mid, 'sender_id' => $fid, 'status' => 1)); 
			return $query->result() ;
		}
		else
			return false;
	}
	
	// function searchNewGroupMsg($mid, $group_id){
	// 	$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` =  '$group_id' AND  status LIKE '%$mid%' ORDER BY time DESC LIMIT 1");
	// 	if($query->num_rows()){
	// 		$this->db->query("UPDATE message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'");
	// 		return $query->result() ;
	// 	}
	// 	else
	// 		return false;
	// }
	function searchNewGroupMsg($mid, $group_id){
		$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` =  '$group_id' ORDER BY time DESC");
		if($query->num_rows()){
			// $this->db->query("UPDATE message SET status = REPLACE(status, '$mid', '') WHERE status LIKE '%$mid%'");
			return $query->result() ;
		}
		else
			return false;
	}
	
	function checkAudioCall($mid){
		$query = $this->db->query("SELECT crm_users.ID as id, message.id as smsid, sender_id, msg, full_name, img FROM `message`, `crm_users` WHERE `receiver_id` = '$mid' AND `msg` LIKE 'YWZkMDY5NTlmYzZkMDExNzUzMThhZGVkNDBjYjAwZGY%' AND `message`.`status` = '1' AND email = sender_id AND `time` BETWEEN NOW() - INTERVAL 2 MINUTE AND NOW() ORDER BY `time` DESC LIMIT 1");
		if($query->num_rows()){
			return $query->result() ;
		}
		else
			return false;
	}
	
	function getSessionData(){
		$query = $this->db->query("SELECT * FROM `yeezy_sessions` ORDER BY `last_activity` DESC");
		if($query->num_rows()){
			return $query->result() ;
		}
		else
			return false;
	}
	
	function checkForNotify($mid){
		$query = $this->db->query("SELECT `crm_users`.`ID` as id, `crm_users`.`full_name` as uname, sender_id, count(sender_id) as noOfSms, msg FROM `message`, `crm_users` WHERE `receiver_id` = '$mid' AND `message`.`status` = '1' AND email = sender_id GROUP BY (sender_id)");
		if($query->num_rows()){
			return $query->result() ;
		}
		else
			return false;
	}
	
	function checkForGroupNotify($mid){
		$query = $this->db->query("SELECT `receiver_id`, count(`receiver_id`) as noOfSms FROM `message` WHERE `receiver_id` IN (SELECT `group_id` FROM `message_group` WHERE `group_member` = '$mid') AND `status` LIKE '%$mid%' GROUP BY `receiver_id`");
		if($query->num_rows()){
			return $query->result() ;
		}
		else
			return false;
	}
	
	function getUserImg($id){
		$query = $this->db->query("SELECT img FROM  `crm_users` WHERE  `email` =  '$id'");
		if($query->num_rows())
			{$r = $query->result(); return $r[0]->img;}
		else
			return false;
	}
	
	function getUserName($id){
		$query = $this->db->query("SELECT full_name as username FROM  `crm_users` WHERE  `email` =  '$id'");
		if($query->num_rows())
			{$r = $query->result(); return $r[0]->username;}
		else
			return false;
	}
	
	function getUserInfo($id){
		$query = $this->db->query("SELECT full_name as username, img FROM  `crm_users` WHERE  `email` =  '$id'");
		if($query->num_rows())
			return $query->result();
		else
			return false;
	}
	/* 
	function allGroupMember($group_id){
		$query = $this->db->query("SELECT `group_member` FROM `message_group` WHERE `group_id` = '$group_id'");
		if($query->num_rows())
			return $query->result();
		else
			return false;
	}
	 */
	function getGroupMember($mid, $group_id){
		$query = $this->db->query("SELECT `group_member` FROM `message_group` WHERE `group_id` = '$group_id' AND `group_member` <> '$mid'");
		if($query->num_rows())
			{return $query->result();}
		else
			return false;
	}
	
	function deleteGroup($group_id){
		$this->db->query("DELETE FROM `message_group` WHERE `group_id` = '$group_id'");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	
	
	function leaveConversation($group_id, $mid){
		$this->db->query("UPDATE `message_group` SET `group_member` = REPLACE(`group_member`, '$mid', '') WHERE `group_id` = '$group_id'");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	
	function updateGroupMemberList($member, $group_id){
		$this->db->query("UPDATE `message_group` SET `group_member` = '$member' WHERE `group_id` = '$group_id'");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	
	
	function updateGroupName($pid, $new_name){
		$this->db->query("UPDATE message_group SET group_name = '$new_name' WHERE group_id = '$pid'"); 
		if($this->db->affected_rows() > 0)
			return true;
		else{
			$this->db->query("UPDATE crm_project SET project_chat_name = '$new_name' WHERE projectid = '$pid'"); 
			if($this->db->affected_rows() > 0)
				return true;
			else
				return false;
		}
	}

	function updateMsg($msg_id, $msg){
		$m = base64_encode($msg);
		$this->db->query("UPDATE message SET msg = '$m' WHERE id = '$msg_id'"); 
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	
	function updateMsgType($msgid, $type){
		$result = false;
		$this->db->select('id'); 
        $this->db->from('message');   
        $this->db->where_in("id", $msgid);
		$this->db->where("msg_type", "star");
        $q = $this->db->get()->result();
		if($q != "" AND count($q)>0){
			foreach ($q as $key => $value) {
				unset($msgid[array_search($value->id, $msgid )]);
				mysql_query("UPDATE message SET msg_type = '' WHERE id = '".$value->id."'");
			}
			$result = true;
		}
		// return $msgid;
		$this->db->where_in('id', $msgid);
		$this->db->update('message', $type);
		if($this->db->affected_rows() > 0)
			return true;
		else{
			if($result)
				return true;
			else
				return false;
		}
	}
	

	function getHistory($myid, $fid){
		$query = $this->db->query("SELECT * FROM `message` WHERE (`receiver_id` = '$myid' AND `sender_id` = '$fid') OR (`sender_id` = '$myid' AND `receiver_id` = '$fid')"); 
		if($query->num_rows())
			return $query->result();
		else
			return false;
	}


	function searchGpMsg($gpid){
		$query = $this->db->query("SELECT * FROM  `message` WHERE  `receiver_id` =  '$gpid' ORDER BY time DESC LIMIT 0 , 30");
		if($query->num_rows())
			return array_reverse($query->result());
		else
			return false;
	}
	

	function searcholdgp($member, $pid){
		$query = $this->db->query("SELECT * FROM  `message_group` WHERE `group_member` =  '$member' AND `pid` =  '$pid'");
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	function chatcontacthistorylist($email){
		$query = $this->db->query("SELECT REPLACE(REPLACE(REPLACE(concat(receiver_id, sender_id), '$email', ''), '.', ''),'@','') as emaillist, msg FROM yzy.message WHERE receiver_id = '$email' OR sender_id = '$email' order by time DESC");
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	function deleteMsg($msgid){
		$this->db->where_in('id', $msgid);
		$this->db->delete('message');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	function archiveMsg($msgid){
		$this->db->where_in('id', $msgid);
		$this->db->delete('message');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	function deletechat($fid, $mid){
		$this->db->query("DELETE FROM message WHERE (receiver_id = '$fid' AND sender_id = '$mid') OR (receiver_id = '$mid' AND sender_id = '$fid')");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	function starmsglist($mid){
		$query = $this->db->query("SELECT * FROM message where msg_type = 'star' AND (receiver_id = '$mid' OR sender_id = '$mid') order by id");
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	function updatearchive($uid, $type){
		$this->db->query("UPDATE crm_users SET archive_sms = '$type' WHERE ID = '$uid'");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	function searcharchiveMember($uid = FALSE, $org_id = FALSE){
		$query = $this->db->query("SELECT * FROM `crm_users` WHERE `email` <> '$uid' AND `org_id` = '$org_id' AND `status` = 'ACTIVE' AND `archive_sms` = 'Y' ORDER BY full_name");
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}


	function blockcontactinsert($id1, $id2){
		$value = array(array("mid"=>$id1, "fid"=>$id2), array("mid"=>$id2, "fid"=>$id1));
		if($this->db->insert_batch("message_blocklist", $value))
			return true;
		else
			return false;
	}

	function searchblockcontacts($mid){
		$this->db->select("fid");
		$query = $this->db->get_where("message_blocklist", array("mid"=>$mid));
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}

	function getall($table, $coz){
		$query = $this->db->get_where($table, $coz);
		if($query->num_rows())
			return $query->result() ;
		else
			return false;
	}

	function removefavourite($mid, $fid){
		$this->db->query("DELETE FROM `message_favourite` WHERE `mid` = '$mid' AND `fid` = '$fid'");
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
}
?>