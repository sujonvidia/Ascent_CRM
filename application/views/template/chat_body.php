<?php 
$blockuser_list = $this->db->get("crm_message_blocklist")->result(); 
echo '<script>var blockuser_list = '.json_encode($blockuser_list).';</script>';
$muteuserlist = $this->db->get_where("crm_mute_message_notification", array("mid"=>$user_email))->result();
echo '<script>var muteuserlist = '.json_encode($muteuserlist).';</script>';
if(isset($contacts) AND $contacts != "")
	echo '<script>var contacts = '.json_encode($contacts).';</script>';

$my_mobile = $this->db->select("phone_mobile")->get_where("crm_users", array("ID"=>$id))->result();
?>
<style type="text/css">
	.unametaglist{
		padding: 5px 10px;
    	border-bottom: 1px solid #b8e284;
   	}
   	.unametaglist:hover{
   		background: #b8e284;
   	}
   	/*[contenteditable=true]:empty:before{
	  content: attr(placeholder);
	  display: block;
	}*/
	#emojidiv img{
		width: 24px;
	    padding: 1px;
	    cursor: pointer;
	}
	#emojidiv img:hover{
		background: #EEE;
	}
</style>
<input type="hidden" id="mmobile" value="<?php echo $my_mobile[0]->phone_mobile; ?>">
<input type="hidden" id="fmobile">
<div class="alert alert-success fade in feed chat-slide-in" id="chat-wid" style="display: none;">
	<header>
		<i class="fa fa-circle-thin widget-icon"></i>
		<div class="widget-title" id="chat-title"><span></span></div>
		<span class="edit-title"><i class="fa fa-pencil"></i></span>
		<div class="widget-toolbar pull-right chatBtn">
			<div class="header-search" style="float: left;margin-top: -6px;margin-right: 10px;">
				<input id="search-fld-chat" onkeyup="searchthismsg(this)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" type="text" name="param" placeholder="search" class="dashboard">
				<button type="button">
					<i class="fa fa-search"></i>
				</button>
			</div>
			
			<img src="<?php echo base_url("asset/img/feedIcon/settings.png"); ?>" data-toggle="dropdown" onclick="" class="chat-settings dropdown-toggle" title="Chat Settings">
			<ul class="dropdown-menu pull-right"> 
				<div class="arrow-top-right"></div>
				<li class="menu-group-setting leaveme"><a href="#">Leave from Group</a></li>
				<li class="menu-group-setting editgroupname"><a href="#">Edit Group Name</a></li>
				<li class="menu-group-setting editgroupmember"><a href="#">Add/ Remove Member</a></li>
				<li class="menu-group-setting deletegroup"><a href="#">Delete Group</a></li>
				<!-- <li><a href="#">Archive</a></li> -->
				<li><a href="#" onclick="clearrecent()">Clear</a></li>
				<li><a href="#" onclick="blockuser(this)" class="blockuser">Block</a></li>
				<li><a href="#" onclick="toggle_inside_chat('star', this)">View Star Message</a></li>
				<li class="dropdown-submenu"><a class="mute">Mute</a>
                    <ul class="dropdown-menu" style="display: none;margin-left: -318px;">
						<li><a onclick="muteuser(30, this)">Mute for 30 minutes</a></li>
						<li><a onclick="muteuser(60, this)">Mute for 1 hour</a></li>
						<li><a onclick="muteuser(120, this)">Mute for 2 hours</a></li>
						<li><a onclick="muteuser(240, this)">Mute for 4 hours</a></li>
						<li><a onclick="muteuser(480, this)">Mute for 8 hours</a></li>
						<li><a onclick="muteuser(1440, this)">Mute for 24 hours</a></li>
						<li><a onclick="muteuser(524160, this)">Mute for indefinitely</a></li>
						<li><a onclick="unmuteuser(this)">Unmute</a></li>
                    </ul>
                </li>
                <li><a href="https://slack.com/oauth/authorize?&client_id=214175186881.219209457553&scope=incoming-webhook,chat:write:bot,chat:write:user,conversations:read,emoji:read,files:read,files:write:user,im:history,im:read,im:write,links:read,users:read,users:read.email,users.profile:read,usergroups:read,team:read"><img alt="Add to Slack" height="40" width="139" src="https://platform.slack-edge.com/img/add_to_slack.png" srcset="https://platform.slack-edge.com/img/add_to_slack.png 1x, https://platform.slack-edge.com/img/add_to_slack@2x.png 2x" /></a></li>
				<!-- <li><a href="#">Mark as unread</a></li> -->
				<!-- <li class="selectmsg"><a href="#">Select</a></li> -->
			</ul>
			<a href="#" onclick="collaspeChat();" class="exp_col_ChatBtn" title="Collaspe Chat"><i class="fa fa-rotate-135 fa-long-arrow-right"></i></a>
			<a href="#" onclick="hideChat();" title="Close"><i class="fa fa-times"></i></a>
		</div>
		<div class="project-member-name editgroupmember"></div>
		<div class="chat-widget-footer">
			<img class="editgroupmember" style="position: absolute;margin-right: 2px;left: 0px;" src="<?php echo base_url("asset/img/icons/Add Member.png"); ?>">
			<select id="select_project_chat_member" class="form-control" multiple="multiple" style="display:none;">
            <?php // $contacts variable initialize in left_panel.php file
            if(isset($contacts) AND $contacts != ""){
	            foreach($contacts as $row){ ?>
	            	<option value="<?php echo $row->email; ?>"><?php echo $row->full_name; ?></option>
	            <?php }
            } ?>
            </select>
		</div>
	</header>
	<!-- widget div-->
	<div>
		<div class="widget-body no-padding smart-form fixedContent">
			<div id="cstream">
			</div>
		</div>
		<form id="messenger" method="post" enctype="multipart/form-data" onsubmit="return sendMsg()" style="padding: 10px 0px">
			<fieldset id="messenger-fset">
				<div class="input-icon-right">
					<!-- <i rel="popover" data-placement="top" 
					data-original-title="Emotions<span class=chatemopopx>×</span>" data-html="true" 
					data-container="body" data-popover-content="#popover-content" 
					class="fa fa-smile-o chatEmo" style="margin-right: 22px; cursor: pointer;font-size: 24px;top:4px;"></i> -->
					
					<!-- <i data-title="Attachment" data-toggle="lightbox" title="Attachment" 
						href="<?php echo site_url("chat/openfile"); ?>" class="fa fa-paperclip chatLightboxAttachment" style="cursor: pointer;font-size: 24px;top:4px;"></i> -->
					<!-- <input class="form-control" placeholder="Type a message..." type="text" id="msg" name="msg"> -->
					<!-- <textarea class="form-control" placeholder="Type a message..." id="msg" name="msg"></textarea> -->
					<div id="emojidiv" style="display: none; position: absolute; top: -200px; width: 255px; height: 200px; padding: 5px; background: #CCC">
						<?php 
							$emo_url = base_url("asset/emotion");
							$emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
							foreach($emotionImg as $v): ?>
								<img onclick="sendEmo('<?php echo $v; ?>')" src="<?php echo $emo_url."/".$v; ?>" style="width:24px; padding:1px;">
							<?php endforeach;
						?>
					</div>
					<div id="msg" contenteditable="true" placeholder="Type a message..."></div>
				</div>
				<input type="hidden" id="myimg" value="<?php echo $user_img; ?>">
				<input type="hidden" id="myname" value="<?php $this->db->select("display_name"); $nickname = $this->db->get_where("crm_users", array("ID"=>$id))->result(); echo $nickname[0]->display_name; ?>">
				<input type="hidden" id="fimg" value="">
				<input type="hidden" id="mid" name="mid" value="<?php echo $user_email; ?>">
				<input type="hidden" id="fid" name="fid" value=""> <!-- friend email address -->
				<input type="hidden" id="fcrm_id" name="fcrm_id" value=""> <!-- friend main ID -->
				<input type="hidden" id="hidmsg" name="msg" value="">
			</fieldset>
		</form>
		<div class="selectmsgdiv" style="display: none;">
			<i class="fa fa-close fa-lg" onclick="selectmsg()"></i> &nbsp;&nbsp; <span id="noofselected">0</span> selected
			<div class="pull-right">
				<i class="fa fa-star fa-lg btn" onclick="starselected()"></i>
				<i class="fa fa-trash fa-lg btn" onclick="deleteselected()"></i>
				<i class="fa fa-mail-forward fa-lg btn" onclick="forwardselected()"></i>
			</div>
		</div>
	</div>
</div>