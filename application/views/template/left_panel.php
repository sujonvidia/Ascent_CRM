<?php 
	$gnpcontacts = $this->db->get("crm_message_group")->result(); 
?>
			<!-- User info -->
			<div class="chat-wid-back"></div>
			<!-- <div class="login-info">
				<ul class="header-dropdown-list hidden-xs cusUL">
					<li class="pull-left workspace">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img style="border-left: 0px solid #fff;width: 16px;margin-top: -2px;" src="<?php echo base_url("asset/img/icons/Workspaces.png"); ?>" />
							<span class="font-size-18"><?php echo $org_id; ?></span>
						</a>
						<span class="font-size-18 wssettings" onclick="window.location.assign('<?php echo site_url("workspace"); ?>');"><i class="fa fa-cog"></i></span>
						<ul class="dropdown-menu pull-left wsl">
							<div class="arrow-top-right"></div>
							<li class="dropdown-menu-header">Workspace</li>
							<?php $wsq = $this->db->get_where("crm_workspace", array("user_id"=>$id, "ws_status"=>1))->result(); 
							foreach ($wsq as $key => $value) { ?>
								<li><a href="<?php echo site_url("workspace/changeWorkSpace/".$value->workspace); ?>"><i class="fa fa-check <?php if($value->workspace == $org_id) echo "active"; ?>"></i> <?php echo $value->workspace; ?></a></li>
							<?php } ?>
							<?php if(user_privilege($id, $org_id, "wor") == "RWD") { ?>
							<li class="dropdown-menu-footer" data-toggle="modal" data-target="#workspaceModal"><i class="fa fa-plus-circle"></i> Create Workspace</li>
							<?php } ?>
						</ul>
					</li>
				</ul>
			</div> -->
			<!-- end workspace button -->
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->
				<ul class="navul36">
					<?php if(user_privilege($id, $org_id, "bar") == "RWD") { ?>
					<li class=""><a href="<?php echo site_url("sa/backup_restore") ?>">BACKUP & RESTORE</a></li>
					<li class=""><a href="<?php echo site_url("sa/user_management") ?>">USER MANAGEMENT</a></li>
					<?php } ?>
					<!-- <?php //if(! isset($shared_activity_id)) { ?>
					<li class="<?php //if ($page_name == 'dashboard') echo 'active open'; ?> ">
						<a href="javascript:void(0);" onclick="open_feed('<?php echo $page_name; ?>')" title="My Feed"><span class="menu-item-parent">MY FEED</span> <!--<i class="fa fa-caret-right"></i>--></a>
					<!-- </li> -->
					<?php //} ?> -->
					<?php 
					if(isset($shared_activity_id) AND isset($type) AND $type == 'Todo'){
						
					}else{ 
						if(user_privilege($id, $org_id, "pct") == "RWD" OR isset($shared_activity_id)) { ?>
						<li class="chat-users top-menu-invisible">
							<!-- <a href="#" class="projectchatULDiv"><span class="menu-item-parent projectchatULDiv">PROJECT CHAT</span> 
							<i id="projectchatULcaret" class="fa fa-caret-down projectchatULDiv"></i></a> -->
							<ul style="display: block;" id="projectchatULDiv">
								<li>
									<div class="display-users">
										<input class="chat-user-filter" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" placeholder="search" type="text">
										<div class="contact-header">Project Chat
										</div>
										<div id="project-chat">
									  	<?php 
									  	$totallinecount = 0;
									  	$pchat = $this->db->query("SELECT cp.* FROM crm_activity as cp LEFT JOIN crm_tagHD as ct ON `cp`.`Id` = `ct`.`RelatedTo` WHERE (`cp`.`CreatedBy` ='$id' OR `ct`.`userid` = '$id' ) AND `Workspaces`='$org_id' AND `cp`.`type` = 'Project' AND cp.isDelete = 1 GROUP BY `cp`.`Id` ORDER BY `cp`.`Id` DESC")->result(); 
										if($pchat != "" AND count($pchat)>0): ?>
											<?php 
												echo '<script>var jspchat = '.json_encode($pchat).';</script>';
												foreach($pchat as $ck=>$cv): 
													if(isset($shared_activity_id))
														if($share_project_id != $cv->Id)
															continue;
													
													$pcid = $cv->Id + 99999999; ?>
												  	<a id="leftProjectList<?php echo $cv->Id; ?>" onclick="startChat(this)" href="#" class="procon usr guser<?php echo $pcid; ?> contacts <?php if($totallinecount > 4) echo "hidden"; $totallinecount++; ?>" 
													  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
													  	data-chat-id="cha<?php echo $pcid; ?>" 
													  	data-chat-dname="<?php echo $cv->Title; ?>" 
													  	data-chat-email="<?php echo $pcid; ?>" 
													  	data-chat-mobile="000"
													  	data-chat-img="group_message.png" 
													  	data-chat-status="online" 
													  	data-chat-alertshow="false"> 
													  	<!-- <img src="<?php echo base_url("asset/img/online.png"); ?>"> <?php echo $cv->Title; ?> <span id="newMsg_<?php echo $pcid; ?>"></span> -->
													  	<i class="fa fa-circle-thin"></i> <?php echo $cv->Title; ?> <span id="newMsg_<?php echo $pcid; ?>"></span>
												  	</a> <?php 
										  		endforeach; 
										  		if($totallinecount > 4)
									  				echo '<a class="viewmorecon" onclick="viewmorecon(this, \'procon\')">View More</a>';
									  	endif; ?>
									  	</div>
								  	</div>
								</li>
							</ul>
						</li>
						<?php } ?>
					<?php } ?>
					<?php if(! isset($shared_activity_id)) { ?>
					<?php if(user_privilege($id, $org_id, "dct") == "RWD") { ?>
					<li class="chat-users top-menu-invisible" style="margin-top: -10px;">
						<!-- <a href="#" class="contactULDiv">
							<span class="menu-item-parent contactULDiv">CONTACTS</span> 
							<i id="contactCaret" class="fa fa-caret-down contactULDiv"></i>
						</a> 
						// if open this code, need to open also includes_bottom.php-> line $(e.target).hasClass("contactULDiv")
						-->
						<ul style="display: block;" id="contactULDiv">
							<li>
								<div class="display-users">
									<!-- <hr class="menu-separator"> -->
									<div class="contact-header">Group Chat
										<span class="pull-right">
											<a onclick="startChat(this)" href="#" class="newgusr usr" 
											  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
											  	data-chat-id="newGroup" 
											  	data-chat-dname="New Group" 
											  	data-chat-email="<?php echo time(); ?>" 
											  	data-chat-mobile="000"
											  	data-chat-img="" 
											  	data-chat-status="online" style="margin-top: -15px;margin-right:-12px;padding-top: 15px;">
												<img src="<?php echo base_url("asset/img/icons/Add People.png"); ?>"/>
											</a>
										</span>
									</div>
									<div id="group-contacts">
										<?php $everyone = $this->db->select("id")->get_where("crm_workspace", array("workspace"=>$org_id, "createdby <>"=>NULL))->result();
											$everyoneid = $everyone[0]->id + 99900000;
											// $workspacememberemail = "";// update list 
										?>
										<a onclick="startChat(this)" href="#" class="grocon usr guser<?php echo $everyoneid; ?> contacts" 
										  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
										  	data-chat-id="cha<?php echo $everyoneid; ?>" 
										  	data-chat-dname="Everyone" 
										  	data-chat-email="<?php echo $everyoneid; ?>" 
										  	data-chat-mobile="000"
										  	data-chat-img="group_message.png" 
										  	data-chat-status="online" 
										  	data-chat-alertshow="false"> 
										  	<i class="fa fa-circle-thin"></i> Everyone <span id="newMsg_<?php echo $everyoneid; ?>"></span>
									  	</a>
								  	<?php 
								  	$totallinecount = 0;
								  	$where = "(FIND_IN_SET('$user_email', `group_member`) OR createdby = '$user_email') AND group_id>149000000";
									$this->db->where($where);
									$gcontacts = $this->db->get("crm_message_group")->result(); 
									if($gcontacts != "" AND count($gcontacts)>0): ?>
										<?php 
											foreach($gcontacts as $ck=>$cv): ?>
											  	<a onclick="startChat(this)" href="#" class="grocon usr guser<?php echo $cv->group_id; ?> contacts <?php if($totallinecount > 4) echo "hidden"; $totallinecount++; ?>" 
												  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
												  	data-chat-id="cha<?php echo $cv->group_id; ?>" 
												  	data-chat-dname="<?php echo $cv->group_name; ?>" 
												  	data-chat-email="<?php echo $cv->group_id; ?>" 
												  	data-chat-mobile="000"
												  	data-chat-img="group_message.png" 
												  	data-chat-status="online" 
												  	data-chat-alertshow="false"> 
												  	<i class="fa fa-circle-thin"></i> <?php echo $cv->group_name; ?> <span id="newMsg_<?php echo $cv->group_id; ?>"></span>
											  	</a> <?php 
									  		endforeach; 
									  		if($totallinecount > 4)
								  				echo '<a class="viewmorecon" onclick="viewmorecon(this, \'grocon\')">View More</a>'; 
								  	endif; ?>
								  	</div>
								  	<div class="contact-header">Direct Chat</div>
									<?php 
									$totallinecount = 0;
									$contacts = $this->db->get_where("crm_users", array("org_id"=>$org_id, "ID !="=>$id))->result(); 
									if($contacts != "" AND count($contacts)>0):
										foreach($contacts as $ck=>$cv): 
											if($cv->access_type == "ADMIN") { ?>
											<a onclick="startChat(this)" href="#" class="usrcon usr cha<?php echo $cv->ID; ?> contacts <?php if($totallinecount > 4) echo "hidden"; $totallinecount++; ?>" 
											  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
											  	data-chat-id="cha<?php echo $cv->ID; ?>" 
											  	data-chat-dname="<?php echo $cv->display_name; ?>" 
											  	data-chat-email="<?php echo $cv->email; ?>" 
											  	data-chat-mobile="<?php echo $cv->phone_mobile; ?>" 
											  	data-chat-img="<?php echo $cv->img; ?>" 
											  	data-chat-status="offline" 
											  	data-chat-alertshow="false"> 
											  	<i id="is_online<?php echo $cv->ID; ?>" class="fa fa-circle-thin"></i><?php echo $cv->display_name; ?> <span id="newMsg_<?php echo $cv->ID; ?>"></span>
										  	</a> <?php 
										  	// $workspacememberemail .= $cv->email.",";
										  	}
								  		endforeach; 
								  		if($totallinecount > 4)
								  			echo '<a class="viewmorecon" onclick="viewmorecon(this, \'usrcon\')">View More</a>';
								  	endif; ?>
								  	<div class="contact-header">Guest User</div>
									<?php 
									$totallinecountg = 0;
									if($contacts != "" AND count($contacts)>0):
										foreach($contacts as $ck=>$cv): 
											if($cv->access_type == "GUEST") { ?>
											<a onclick="startChat(this)" href="#" class="guecon usr cha<?php echo $cv->ID; ?> contacts <?php if($totallinecountg > 4) echo "hidden"; $totallinecountg++; ?>" 
											  	data-chat-page="<?php echo $this->uri->segment(1); ?>"
											  	data-chat-id="cha<?php echo $cv->ID; ?>" 
											  	data-chat-dname="<?php echo $cv->display_name; ?>" 
											  	data-chat-email="<?php echo $cv->email; ?>" 
											  	data-chat-mobile="<?php echo $cv->phone_mobile; ?>" 
											  	data-chat-img="<?php echo $cv->img; ?>" 
											  	data-chat-status="offline" 
											  	data-chat-alertshow="false"> 
											  	<i id="is_online<?php echo $cv->ID; ?>" class="fa fa-circle-thin"></i><?php echo $cv->display_name; ?> <span id="newMsg_<?php echo $cv->ID; ?>"></span>
										  	</a> <?php 
										  	// $workspacememberemail .= $cv->email.",";
										  	}
								  		endforeach; 
								  		if($totallinecountg > 5)
								  			echo '<a class="viewmorecon" onclick="viewmorecon(this, \'guecon\')">View More</a>';
								  	endif; ?>
								</div>
								<!-- END DISPLAY USERS -->
							</li>
						</ul>	
					</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</nav>
			<?php
				// $workspacememberemail = substr($workspacememberemail, 0, -1);
				// $this->db->delete("crm_message_group", array("group_id"=>$everyoneid));
				// $this->db->update("crm_message_group", array("group_member"=>$workspacememberemail), array("group_id"=>$everyoneid));
			?>
			
			<!-- <span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span> -->

			<!-- SELECT * FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='692' -->

			 <?php //include("feed_body.php"); ?> 
			<?php include("chat_body.php"); ?>