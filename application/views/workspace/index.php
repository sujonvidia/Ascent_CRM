<?php 
$page_style =  $this->db->select("crm_user_preferences")
->get_where("crm_users", array("ID"=>$id))
->result();
$page_style_result = $page_style[0]->crm_user_preferences;

	// Role page
$datavalue = "";
$userRoleProfileList = $this->db->query("SELECT `u`.`ID`, `u`.`full_name`, `u`.`img`, `r`.`role_name`, `r`.`profile_id` FROM `crm_users` as `u`, `crm_roles` as `r` WHERE `u`.`roleid` = `r`.`id` AND `u`.`org_id` = '$org_id'")->result();
$profiles = $this->db->select("cpp.id, cpu.sl, cpu.user_id, cpp.profile_name")
			->from("crm_privileges_user as cpu")
			->join("crm_profile_privileges cpp", "cpu.profile_id = cpp.id")
			->where("cpp.org_id", $org_id)
			->get()->result();

$roles = $this->db->get_where("crm_roles", array("org_id"=>$org_id))->result();
	// Profile page
$profileList = $this->db->get_where("crm_profile_privileges", array("org_id"=>$org_id))->result();
	// Group page
$group_list = $this->db->get_where("crm_groups", array("org_id"=>$org_id))->result();
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo ($page_style_result == 0)?"hidden-menu-mobile-lock":""; ?>">
<head>
	
	<title><?php echo $page_title; ?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="FPS School Manager Pro - FreePhpSoftwares" />
	<meta name="author" content="FreePhpSoftwares" />
	<?php $this->load->view('template/includes_top'); ?>

	<style type="text/css">
		#myTabContent1{
			height: auto;
			min-height: 575px;
		}
		div[class*="pt_title_"], div[class*="pt_body_"], .iebody{display: none;}
		.clickable{cursor: pointer;}
	</style>
</head>

<body class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">

	<!-- HEADER -->
	<div class="chat-wid-back customChat"></div>
	<header id="header">
		<?php $this->load->view('template/header.php');?>
	</header>
	<!-- END HEADER -->

	<!-- Left panel : Navigation area -->
	<!-- Note: This width of the aside area can be adjusted through LESS variables -->
	<aside id="left-panel">
		<?php $this->load->view('template/left_panel.php');?>
	</aside>
	<!-- END NAVIGATION -->

	<!-- MAIN PANEL -->
	<div id="main" role="main">

		<!-- RIBBON -->
		<div id="ribbon">
			<ol class="breadcrumb">
				<li>
					<span class="dFont"><?php echo $page_title; ?></span>
					<p style="font-size: 17px;width: 100%;height: 25px;position: relative;right: 0%;margin-left: 1%;text-align: right;">
						<!-- <button class="btn btn-xs btn-default">Rename</button>
						<button class="btn btn-xs btn-default">Delete</button> -->
					</p>
				</li>
			</ol>
		</div>
		<!-- END RIBBON -->

		<!-- MAIN CONTENT -->
		<div id="content">
			<style type="text/css">
				.form-control{
					border-radius: 6px !important;
					border: 2px solid #cecbcb;
				}
			</style>
			<section id="widget-grid" class="">
				<div class="row" id="widget-grid-row">
					<div class="col-lg-12">
						<ul id="myTab1" class="nav nav-tabs bordered">
							<li class="active"><a href="#s1" data-toggle="tab" aria-expanded="true"><?php echo $org_id; ?></a></li>
							<li class=""><a href="#s2" data-toggle="tab" aria-expanded="false">Others</a></li>
							<?php if(user_privilege($id, $org_id, "rol") == "RWD") { ?>
							<li class=""><a href="#s3" data-toggle="tab" aria-expanded="false">Role</a></li>
							<?php } ?>
							<?php if(user_privilege($id, $org_id, "ptl") == "RWD") { ?>
							<li class=""><a href="#s4" data-toggle="tab" aria-expanded="false">Privilege</a></li>
							<li class=""><a href="#s5" data-toggle="tab" aria-expanded="false">Team</a></li>
							<li class=""><a href="#s6" data-toggle="tab" aria-expanded="false">Login History</a></li>
							<li onclick="openWorkSettings(this)" class=""><a href="#s7" data-toggle="tab" aria-expanded="false">Workspace Settings</a></li>
							<?php } ?>								
						</ul>
						<div id="myTabContent1" class="tab-content padding-10">
							<div class="tab-pane fade active in" id="s1">
								<div id="wpset1" class="col-lg-8">
									<div class="row">
										<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
											<div class="panel panel-default">
												<div class="panel-heading smart-form">
													<div class="inline-group">
														<label class="radio" style="padding-left: 0px;">New User :</label>
														<label class="radio">
															<input onclick="ciuser('c')" type="radio" name="radio-inline" checked="true">
															<i></i>Create
														</label>
														<label class="radio">
															<input onclick="ciuser('i')" type="radio" name="radio-inline">
															<i></i>Invite
														</label>
													</div>
												</div>
												<div class="panel-body">
													<form action="" method="POST" onsubmit="return sendInviteto()">
														<fieldset>
															<input name="authenticity_token" type="hidden">
															<div class="form-group">
																<label>Full Name</label>
																<input id="invited_user_name" class="form-control" placeholder="Full Name" type="text">
															</div>
															<div class="form-group">
																<label>Email Address</label>
																<input id="invited_user_email" class="form-control" placeholder="Email Address" type="email">
															</div>
															<div class="form-group cupass">
																<label>Password</label>
																<input type="password" id="cuser_pass" class="form-control" placeholder="Password">
															</div>
															<div class="form-group cupass">
																<label>Confirm Password</label>
																<input type="password" id="con_cuser_pass" class="form-control" placeholder="Confirm Password">
															</div>
															<div class="form-group iebody">
																<label>Email Body</label>
																<textarea id="invited_user_msg" class="form-control" placeholder="Brief work description" rows="3"></textarea>
															</div>
														</fieldset>
														<div class="form-actions">
															<button type="submit" class="btn btn-primary cibtn">Create</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 txt4">
											<div class="panel panel-default">
												<div class="panel-heading">
													Workspace member
												</div>
												<div class="panel-body">
													<table class="table table-striped table-hover table-condensed">
														<thead>
															<tr>
																<th>Members</th>
																<th colspan="3">Privileges</th>
															</tr>
														</thead>
														<tbody>

															<?php 
															$thismember = array();
															$members = $this->db->select('cu.ID, cu.full_name, cu.img, cu.org_id, cu.email, cw.workspace, cw.ws_status')
															->from('crm_users as cu')
															->join('crm_workspace cw', 'cu.ID = cw.user_id')
															->where('cw.workspace',$org_id)
															->where('cu.ID <>', 216)
															->order_by('cu.full_name')
															->get()->result();
															foreach($members as $i=>$v) { 
																array_push($thismember, $v->ID); 
																$profiles_name = "Guest";
																$profiles_sl = "";
																foreach($profiles as $key => $value) {
																	if($v->ID == $value->user_id){
																		$profiles_name = $value->profile_name;
																		$profiles_sl = $value->sl;
																	}
																} ?>
																<tr class="member_<?php echo $v->ID; ?>">
																	<td class="clickable" onclick="privilege_team(<?php echo $v->ID; ?>, '<?php echo $profiles_sl; ?>', '<?php echo $profiles_name; ?>')"><label><?php echo $i+1 . ". " .$v->full_name; ?></label></td>
																	<td><label><?php echo $profiles_name; ?></label></td>
																	<?php if($profiles_name == "Guest"): ?>
																	<td><button onclick="createMeMember(this)" class="btn btn-xs btn-custom" data-uid="<?php echo $v->ID; ?>" data-full_name="<?php echo $v->full_name; ?>" data-email="<?php echo $v->email; ?>">Create</button></td>
																	<td><a href="<?php echo base_url("workspace/deleteme/".$v->ID); ?>"><i class="fa fa-trash-o"></i></a></td>
																	<?php else: ?>
																	<td class="smart-form">
																		<label class="toggle">
																			<?php if(user_privilege($id, $org_id, "ptl") == "RWD") {
																				if($v->full_name != $username) { 
																					if($v->ws_status){ ?>
																						<input type="checkbox" id="chk<?php echo $v->ID; ?>" value="1" checked>
																						<i onclick="removeid('<?php echo $v->ID; ?>')" data-swchon-text="Active" data-swchoff-text="Inactive"></i><?php 
																					} else { ?>
																						<input type="checkbox" id="chk<?php echo $v->ID; ?>" value="0">
																						<i onclick="removeid('<?php echo $v->ID; ?>')" data-swchon-text="Active" data-swchoff-text="Inactive"></i><?php 
																					} 
																				} 
																			} ?>
																		</label>
																	</td>
																	<td onclick="openUserSettings(this,<?php echo $v->ID; ?>,'<?php echo $v->full_name; ?>')"><i class="fa fa-cog"></i></td>
																	<?php endif; ?>
																</tr><?php 
															} ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div id="wpset2" class="col-lg-4 privilege_team">
									<div class="panel panel-default">
										<div class="panel-heading">
											Available users
										</div>
										<div class="panel-body">
											<table class="table table-striped table-hover table-condensed invite_other">
												<thead>
													<tr>
														<th>SL</th>
														<th colspan="2">Members</th>
													</tr>
												</thead>
												<tbody>
													<?php $members2 = $this->db->select('*')
													->from('crm_users')
													->join('crm_workspace', 'crm_users.ID = crm_workspace.user_id')
													->where_not_in('crm_users.ID',$thismember)
													->group_by("crm_workspace.user_id")
													->get()
													->result();
													foreach($members2 as $i=>$v) { 
														if($v->full_name != $username) {?>
														<tr class="invited_<?php echo $v->ID; ?>">
															<td><?php echo $i+1; ?></td>
															<td><?php echo $v->full_name ; ?></td>
															<td class="text-align-center">
																<div class="pull-right text-align-left hidden-tablet">
																	<button class="btn btn-xs btn-default" onclick="inviteto(<?php echo $v->ID; ?>)">Invite</button>
																</div>
															</td>
														</tr>
														<?php } } ?>
													</tbody>
												</table>
												<div class="col-lg-12 smart-form pt_title_1">
													<div class="col-sm-4"><h3>Privileges :-</h3></div>
													<div class="col-sm-4"><h4 class="pt_p"><i class="fa fa-circle-thin"></i> User</h4></div>
													<div class="col-sm-4"><h4 class="pt_t"><i class="fa fa-circle-thin"></i> Team</h4></div>
												</div>
												<div class="col-lg-12 smart-form pt_body_1">
													<div class="col-lg-12 profile_access">
														<form action="<?php echo site_url("workspace/save_profile_access"); ?>" method="POST">
															<input type="hidden" id="tem_uid" name="uid">
															<div class="box-body" id="new_privileges">
																<br>
																<h4>Privileges</h4>
																<hr>
																<div class="dataTable_wrapper">
																	<table class="table table-striped table-bordered table-hover">
																		<thead>
																			<tr>
																				<th colspan="2" rowspan="2">Modules to be shown</th>
																				<th colspan="3" style="padding: 0px; text-align: center;">Edit Permissions</th>
																			</tr>
																			<tr>
																				<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="editall" id="editall" class="WW"> Create/Edit</th>
																				<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="viewall" id="viewall" class="RR"> View</th>
																				<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="deleteall" id="deleteall" class="DD"> Delete</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="pro" id="pro" checked></td>
																				<td>Projects</td>
																				<td class="text-center"><input type="checkbox" name="proW" id="proW" value="W" class="W" checked></td>
																				<td class="text-center"><input type="checkbox" name="proR" id="proR" value="R" class="R" checked></td>
																				<td class="text-center"><input type="checkbox" name="proD" id="proD" value="D" class="D" checked></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="tod" id="tod" checked></td>
																				<td>ToDo</td>
																				<td class="text-center"><input type="checkbox" name="todW" id="todW" value="W" class="W" checked></td>
																				<td class="text-center"><input type="checkbox" name="todR" id="todR" value="R" class="R" checked></td>
																				<td class="text-center"><input type="checkbox" name="todD" id="todD" value="D" class="D" checked></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="cal" id="cal" checked></td>
																				<td>Calendar</td>
																				<td class="text-center"><input type="checkbox" name="calW" id="calW" value="W" class="W" checked></td>
																				<td class="text-center"><input type="checkbox" name="calR" id="calR" value="R" class="R" checked></td>
																				<td class="text-center"><input type="checkbox" name="calD" id="calD" value="D" class="D" checked></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="dct" id="dct" checked></td>
																				<td>Direct Chat and Group Chat</td>
																				<td class="text-center"><input type="checkbox" name="dctW" id="dctW" value="W" class="W" checked></td>
																				<td class="text-center"><input type="checkbox" name="dctR" id="dctR" value="R" class="R" checked></td>
																				<td class="text-center"><input type="checkbox" name="dctD" id="dctD" value="D" class="D" checked></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="pct" id="pct"></td>
																				<td>Project Chat</td>
																				<td class="text-center"><input type="checkbox" name="pctW" id="pctW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="pctR" id="pctR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="pctD" id="pctD" value="D" class="D"></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="fil" id="fil"></td>
																				<td>My Files</td>
																				<td class="text-center"><input type="checkbox" name="filW" id="filW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="filR" id="filR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="filD" id="filD" value="D" class="D"></td>
																			</tr>
																			<tr>
																				<td style="width: 50px"><input type="checkbox" name="rep" id="rep"></td>
																				<td>My Reports</td>
																				<td class="text-center"><input type="checkbox" name="repW" id="repW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="repR" id="repR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="repD" id="repD" value="D" class="D"></td>
																			</tr>
																			<tr class="noteam">
																				<td style="width: 50px"><input type="checkbox" name="wor" id="wor"></td>
																				<td>Create Workspace</td>
																				<td class="text-center"><input type="checkbox" name="worW" id="worW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="worR" id="worR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="worD" id="worD" value="D" class="D"></td>
																			</tr>
																			<tr class="noteam">
																				<td style="width: 50px"><input type="checkbox" name="ptl" id="ptl"></td>
																				<td>Privilege, Team, Login info</td>
																				<td class="text-center"><input type="checkbox" name="ptlW" id="ptlW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="ptlR" id="ptlR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="ptlD" id="ptlD" value="D" class="D"></td>
																			</tr>
																			<tr class="noteam">
																				<td style="width: 50px"><input type="checkbox" name="rol" id="rol"></td>
																				<td>Create Role</td>
																				<td class="text-center"><input type="checkbox" name="rolW" id="rolW" value="W" class="W"></td>
																				<td class="text-center"><input type="checkbox" name="rolR" id="rolR" value="R" class="R"></td>
																				<td class="text-center"><input type="checkbox" name="rolD" id="rolD" value="D" class="D"></td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="box-footer">
																<p>&nbsp;</p>
																<input type="hidden" name="gpprofileid" id="pri_id">
																<input type="hidden" name="old_profileid" id="old_psl">
																<button type="submit" class="btn btn-primary">Save</button>
																<a href="<?php echo site_url("workspace"); ?>" class="btn btn-default">Back</a>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>

									
								<?php include("settings/user_settings.php"); ?>
									

								</div>
								<div class="tab-pane fade" id="s2">
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Create New Workspace
											</div>
											<div class="panel-body">
												<fieldset>
													<input name="authenticity_token" type="hidden">
													<div class="form-group">
														<label>Workspace Name</label>
														<input type="text" id="createWStext" class="form-control" placeholder="Title" required />
													</div>
												</fieldset>
												<div class="form-actions">
													<button type="button" onclick="createWS($('#createWStext').val())" class="btn btn-primary cibtn">Create</button>
												</div>
											</div>
										</div>
									</div>
									<?php $my_ws = $this->db->get_where("crm_workspace", array("user_id"=>$id, "createdby"=>$id))->result(); 
									if(count($my_ws)>0){ ?>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Existing Workspace
											</div>
											<div class="panel-body">
												<ul class="wslist">
													<?php foreach ($my_ws as $key => $value) {?>
													<li id="wsli<?php echo $value->id; ?>">
														<p id="wsli<?php echo $value->id; ?>" onclick="expanChild(this, <?php echo $value->id; ?>, '<?php echo $value->user_id; ?>', '<?php echo $value->workspace; ?>')">
															<?php echo $value->workspace; ?>
															<button class="btn btn-xs btn-default" onclick="switchws()">Switch</button>
														</p>
													</li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Workspace member
											</div>
											<div class="panel-body">
												<ul class="wsulist"></ul>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<div class="tab-pane fade" id="s3">
									<?php include("role.php"); ?>
								</div>
								<div class="tab-pane fade" id="s4">
									<?php include("profiles.php"); ?>
								</div>
								<div class="tab-pane fade" id="s5">
									<?php include("groups.php"); ?>
								</div>
								<div class="tab-pane fade" id="s6">
									<?php include("login_history.php"); ?>
								</div>
								<div class="tab-pane fade" id="s7">
									<?php include("settings/workspace_settings.php"); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<!-- PAGE FOOTER -->
		<?php $this->load->view('template/footer.php');?>
		

		<!--================================================== -->
		<?php $this->load->view('template/includes_bottom.php');?>


		<script type="text/javascript">
			<?php echo "var jsmembers = ". json_encode($members) . ";\n"; ?>
			<?php echo "var jsprofileList = ". json_encode($profileList) . ";\n"; ?>
			<?php echo "var jsprofiles = ". json_encode($profiles) . ";\n"; ?>
			<?php echo "var jsgroup_list = ". json_encode($group_list) . ";\n"; ?>
			var val = getCookie("workspacetab");
			if(val){
				$('.nav-tabs a[href="#'+val+'"]').tab('show');
			}
		</script>

		<script type="text/javascript">

			function ciuser(str){
				if(str == "i"){
					$(".cupass").hide();
					$(".iebody").show("slow");
					$(".cibtn").text("Invite");
				}else if(str == "c"){
					$(".cupass").show("slow");
					$(".iebody").hide();
					$(".cibtn").text("Create");
				}
			}

			function inviteto(id){
				var request = $.ajax({
					url: "workspace/inviteto",
					type: "POST",
					data: {invite_id: id},
					dataType: "JSON"
				});
				request.done(function(res){
					if(res)
						$(".invited_"+id).hide("slow");
				});
			}

			function removeid(id){
				if($("#chk"+id).val() == 1){
					var request = $.ajax({
						url: "workspace/removeid",
						type: "POST",
						data: {remove_id: id},
						dataType: "JSON"
					});
					request.done(function(res){
						$("#chk"+id).val("0");
					});
					request.fail(function(e){
						console.log(e);
					});
				}
				else{
					var request = $.ajax({
						url: "workspace/activeid",
						type: "POST",
						data: {remove_id: id},
						dataType: "JSON"
					});
					request.done(function(res){
						console.log(id);
						console.log(res);
						$("#chk"+id).val("1");
					});
					request.fail(function(e){
						console.log(e);
					});
				}
				console.log($("#chk"+id).val());
			}

			function sendInviteto(){
				var msg = "";
				if($("#invited_user_msg").val() != ""){
					msg = $("#invited_user_msg").val();
					msg += "<br><br><br>";
					msg += "Please click on the link, to join with Navigate.<br><br>";
					msg += "<?php echo "http://27.147.195.222:2241/nclive/login/signup/$org_id"; ?>/"+$("#invited_user_email").val();
				}
				if($("#cuser_pass").val() != $("#con_cuser_pass").val()){
					swal("Error message", "Password does not match...", "error").then(function(){
						return false;
					});

					return false;
				}
				var request = $.ajax({
					url: "<?php echo site_url("workspace/send_custom_msg"); ?>",
					type: "POST",
					data: {to: $("#invited_user_email").val(), name: $("#invited_user_name").val(), body: msg, pass: $("#cuser_pass").val()},
					dataType: "JSON"
				});
				request.done(function(d){
					if(d.result == "iu"){
						swal("Send confirmation", "Your invitation send successfully...", "success").then(function(){
							location.reload();
						});
					}else if(d.result == "cu"){
						swal("User Create", d.status, "success").then(function(){
							location.reload();
						});
					}
				});
			}

			function createWS(s) {
				if(s != ""){
					var req = $.ajax({
						url: "<?php echo site_url("workspace/createWorkspace"); ?>",
						type: "POST",
						data: {workspace: s},
						dataType: "JSON"
					});
					req.done(function (res) {
						if (res)
							location.reload();
					});
				}
			}

			var temp_work_space_userlist = [];
			function expanChild(e, id, uid, ws){
				var req = $.ajax({
					url: "<?php echo site_url("workspace/find_child_ws"); ?>",
					type: "POST",
					data: {rid: id, id: uid, ws:ws},
					dataType: "JSON"
				});
				req.done(function(res){
					console.log(res);
					if((res.cws).length>0){
						var html = "<ul>";
						$.each(res.cws, function(k,v){
							html += "<li id='wsli"+v.id+"'><p onclick='expanChild(this, "+v.id+", "+v.user_id+", \""+v.workspace+"\")'>"+v.workspace+"</p></li>";
						});
						html += "</ul>";
						$("#wsli"+id).append(html);
						$(e).attr("onclick","child_toggle('"+id+"')");
					}
					// user list
					var html = "";
					$.each(res.cwsu, function(ku,vu){
						html += "<li>"+vu.full_name+"</li>";
					});
					$(".wsulist").html(html);
					temp_work_space_userlist.push({id:id, body:html});
					console.log(temp_work_space_userlist);
				});
			}

			function child_toggle(id){
				$("#wsli"+id+" ul").toggle();
				if($("#wsli"+id+" ul").is(":visible")){
					$.each(temp_work_space_userlist, function(k,v){
						if(v.id == id)
							$(".wsulist").html(v.body);		
					});

				}
			}


			function privilege_team(uid, pri_sl, pri_name){
				if($("#tem_uid").val() == uid){
					if($(".invite_other").is(":visible")){
						privilege_tem_tab(uid, pri_sl, pri_name);
					}else{
						$(".privilege_team .panel-heading").html("Available users");
						$(".invite_other").show("slow");
						$(".pt_title_1").hide();
						$(".pt_body_1").hide();
						$(".member_"+uid).css("background", "#FFF");
					}
				}else {
					privilege_tem_tab(uid, pri_sl, pri_name);
				}
			}

			function privilege_tem_tab(uid, pri_sl, pri_name){
				$("tr[class^=member_]").css("background", "#FFF");
				$(".member_"+uid).css("background", "#FF0");
				if(pri_sl == "") pri_sl = 0;
				$(".privilege_team .panel-heading").html("User Access");
				$(".invite_other").hide();
				$("#tem_uid").val(uid);
				$(".pt_p").attr("data-uid", uid);
				$(".pt_p").attr("data-psl", pri_sl);
				$(".pt_p").attr("data-pname", pri_name);
				$(".pt_p").attr("onclick",  "qtipUserAccess(this)");

				$(".pt_t").attr("data-uid", uid);
				$(".pt_t").attr("onclick",  "qtipUserTeam(this)");
				$(".pt_title_1").show("slow");
			}


			$("div").on("click", "#new_privileges input[type='checkbox']", function(e) {
				console.log(e);
				var id = e.target.id;
				if(id == "viewall"){
					$(".R").prop("checked", $(this).prop("checked"));
				} 
				else if(id == "editall"){
					$(".W").prop("checked", $(this).prop("checked"));
				} 
				else if(id == "deleteall"){
					$(".D").prop("checked", $(this).prop("checked"));
				}

				else if(id.length == 3){
					$("#"+id+"R").prop("checked", $(this).prop("checked"));
					$("#"+id+"W").prop("checked", $(this).prop("checked"));
					$("#"+id+"D").prop("checked", $(this).prop("checked"));
				}

				else if(id.length == 4){
					var eclass = $("#"+id).attr("class");
					var idprifix = id.slice(0, 3);
					var lenOfClass = $("."+eclass).length;
					var lenOfChkClass = $("."+eclass+":checked").length;
					if(lenOfClass == lenOfChkClass)
						$("."+eclass+eclass).prop("checked", true);
					else
						$("."+eclass+eclass).prop("checked", false);

					if($("#"+idprifix+"R").is(':checked') &&$("#"+idprifix+"W").is(':checked') &&$("#"+idprifix+"D").is(':checked'))
						$("#"+idprifix).prop("checked", true);
					else
						$("#"+idprifix).prop("checked", false);
				}

				if($("#viewall").is(':checked') && $("#editall").is(':checked') && $("#deleteall").is(':checked')){
					$("input[type='checkbox']").prop("checked", $(this).prop("checked"));
				} 


			});

			function qtipUserAccess(element){

				if($(element).qtip('api') == undefined){

					var uid = $(element).attr("data-uid");
					var privilege_sl = $(element).attr("data-psl");
					var privilege_name = $(element).attr("data-pname");
					var color;


					var qhtml=	'<ul class="qtipuaLine">';
					$.each(jsprofileList, function(k,v){
						var active = "", createdby="";
						if(v.profile_name == privilege_name) active = "pactive";
						if(v.createdby == "<?php echo $id; ?>") createdby = '<i class="pri_action_btn fa fa-trash-o" onclick="trashme(\'p\', '+v.id+', this)"></i>';
						if(v.profile_name=="Admin" || v.profile_name=="Member") createdby = "";

						qhtml+=		'<li class="li-status '+active+'"><i class="fa fa-check"></i><a href="'+base_url+'workspace/change_profile_access/'+v.id+'/'+uid+'/'+privilege_sl+'">'+v.profile_name+'</a>'+createdby+'</li>';
					});
					qhtml+=		'</ul>';
					qhtml+=		'<ul class="qtipuaAddNew"><li><div class="addnewPrivilege" onclick="open_privilege_input('+uid+')"> Add New <img class="addnewPrivilegeImg" src="'+base_url+'asset/img/icons/Add Project.png"></div><input type="text" placeholder="Type Here" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type Here\'" onkeyup="createPri(event, '+privilege_sl+')" id="addnewPrivilegeInput"/></li></ul>';

					$(element).qtip({

						show: {
							ready:true,
							solo: true
						},
						hide: 'unfocus click',
						content: { text: qhtml },
						position: {
							at: 'bottom center',  
							my: 'top center', 
							viewport: $(window),
							adjust: { method: 'none shift'}
						},
						style: {
							classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
							width: '250',
							tip: {
								width: 3,
								height: 3
							}
						},

						events: {
							hide: function (event, api) {
								$(this).qtip('destroy');
								$( 'body').unbind( "keydown.qtipStatus" );
								$(".pt_p .fa").removeClass("fa-circle").addClass("fa-circle-thin");
							},
							show: function(event, api) {
								$(".pt_p .fa").removeClass("fa-circle-thin").addClass("fa-circle");
							},
							render:function(event,api){
								$('body').on('keydown.qtipStatus', function(event) {
									if(event.keyCode === 27) {
										api.hide(event);
									}
								});
							}


						}
					});
				}
			}

			function open_privilege_input(uid){
				$(".addnewPrivilege").hide();
				$("#addnewPrivilegeInput").show("slow");
			}

			function createPri(event, psl){
				if(event.which == 13){
					$.ajax({
						url: base_url+"workspace/new_profile_post",
						type: "POST",
						data: {profilename: $("#addnewPrivilegeInput").val(), pdescription: "Custom"},
						dataType: "JSON",
						success: function(res){
							if(res.status){
								$(".qtip").qtip("hide");
								$("#pri_id").val(res.new_pri_id);
								$("#old_psl").val(psl);
								jsprofileList = res.privileges;
								$(".noteam").show();
								$(".pt_body_1").show();
								$(".profile_access h4").html("Select access for <b>"+$("#addnewPrivilegeInput").val()+"</b> privilege");
								$(".profile_access").show();
							}
						},
						error: function(e){
							console.log(e);
						}
					});
				}
			}


			function trashme(type, id, e){
				$.ajax({
					url: base_url+"workspace/rpg_delete/"+type+"/"+id,
					type: "GET",
					success: function(){
						$.each(jsprofileList, function(k,v){
							if(v.id == id){
								jsprofileList.splice(k,1);
							}
						});
						$(e).closest("li").hide();
					}
				});
			}





			function qtipUserTeam(element){

				if($(element).qtip('api') == undefined){
					var uid = $(element).attr("data-uid");
					// var privilege_sl = $(element).attr("data-psl");
					// var privilege_name = $(element).attr("data-pname");
					// var color;


					var qhtml=	'<ul class="qtipuaLine">';
					$.each(jsgroup_list, function(k,v){
						var all_gmembers = (v.member_users).split(",");
						var createdby="";
						if(v.createdby == "<?php echo $id; ?>") createdby = '<i class="pri_action_btn fa fa-trash-o" onclick="trashme(\'g\', '+v.groupid+', this)"></i>';

						if(all_gmembers.indexOf(uid)>-1)
							qhtml+=		'<li class="li-status pactive"><i class="fa fa-check"></i><a href="'+base_url+'workspace/add_remove_group_member/r/'+v.groupid+'/'+uid+'">'+v.groupname+'</a>'+createdby+'</li>';
						else
							qhtml+=		'<li class="li-status"><i class="fa fa-check"></i><a href="'+base_url+'workspace/add_remove_group_member/a/'+v.groupid+'/'+uid+'">'+v.groupname+'</a>'+createdby+'</li>';
					});
					qhtml+=		'</ul>';
					qhtml+=		'<ul class="qtipuaAddNew"><li><div class="addnewTeam" onclick="open_team_input('+uid+')"> Add New <img class="addnewTeamImg" src="'+base_url+'asset/img/icons/Add Project.png"></div><input type="text" placeholder="Type Here" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type Here\'" onkeyup="createTeam(event, '+uid+')" id="addnewTeamInput"/></li></ul>';

					$(element).qtip({

						show: {
							ready:true,
							solo: true
						},
						hide: 'unfocus click',
						content: { text: qhtml },
						position: {
							at: 'bottom center',  
							my: 'top right', 
							viewport: $(window),
							adjust: { method: 'none shift'}
						},
						style: {
							classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
							width: '250',
							tip: {
								width: 3,
								height: 3
							}
						},

						events: {
							hide: function (event, api) {
								$(this).qtip('destroy');
								$( 'body').unbind( "keydown.qtipStatus" );
								$(".pt_t .fa").removeClass("fa-circle").addClass("fa-circle-thin");
							},
							show: function(event, api) {
								$(".pt_t .fa").removeClass("fa-circle-thin").addClass("fa-circle");
							},
							render:function(event,api){
								$('body').on('keydown.qtipStatus', function(event) {
									if(event.keyCode === 27) {
										api.hide(event);
									}
								});
							}


						}
					});
				}
			}

			function open_team_input(uid){
				$(".addnewTeam").hide();
				$("#addnewTeamInput").show("slow");
			}

			function createTeam(event, uid){
				if(event.which == 13){
					$.ajax({
						url: base_url+"workspace/add_group",
						type: "POST",
						data: {groupname: $("#addnewTeamInput").val(), description: "Custom", uid: uid},
						dataType: "JSON",
						success: function(res){
							if(res.id>0){
								$(".qtip").qtip("hide");
								$("#pri_id").val(res.id);
								$("#old_psl").val(0);
								jsgroup_list = res.crmgroups;
								$(".noteam").hide();
								$(".profile_access form").attr("action", base_url+"workspace/update_group")
								$(".pt_body_1").show();
								$(".profile_access h4").html("Select access for <b>"+$("#addnewTeamInput").val()+"</b> team");
								$(".profile_access").show();
							}
						},
						error: function(e){
							console.log(e);
						}
					});
				}
			}













			function new_pri(uid){
				/*if(uid != 0){
					var html = '';
					html += '<div class="profile_access">'+
					'<form action="'+base_url+'workspace/new_privileges_post" method="POST">'+
					'<div class="box-body" id="new_privileges">'+
					'<hr>'+
					'<input type="text" name="profilename" class="form-control new_privileges_name" placeholder="New Privilege Name">'+
					'<br>'+
					'<h4>Privileges Access</h4>'+
					'<hr>'+
					'<div class="dataTable_wrapper">'+
					'<table class="table table-striped table-bordered table-hover">'+
					'<thead>'+
					'<tr>'+
					'<th colspan="2" rowspan="2">Modules to be shown</th>'+
					'<th colspan="3" style="padding: 0px; text-align: center;">Edit Permissions</th>'+
					'</tr>'+
					'<tr>'+
					'<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="editall" id="editall" class="WW"> Create/Edit</th>'+
					'<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="viewall" id="viewall" class="RR"> View</th>'+
					'<th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="deleteall" id="deleteall" class="DD"> Delete</th>'+
					'</tr>'+
					'</thead>'+
					'<tbody>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="pro" id="pro" checked></td>'+
					'<td>Projects</td>'+
					'<td class="text-center"><input type="checkbox" name="proW" id="proW" value="W" class="W" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="proR" id="proR" value="R" class="R" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="proD" id="proD" value="D" class="D" checked></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="tod" id="tod" checked></td>'+
					'<td>ToDo</td>'+
					'<td class="text-center"><input type="checkbox" name="todW" id="todW" value="W" class="W" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="todR" id="todR" value="R" class="R" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="todD" id="todD" value="D" class="D" checked></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="cal" id="cal" checked></td>'+
					'<td>Calendar</td>'+
					'<td class="text-center"><input type="checkbox" name="calW" id="calW" value="W" class="W" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="calR" id="calR" value="R" class="R" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="calD" id="calD" value="D" class="D" checked></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="dct" id="dct" checked></td>'+
					'<td>Direct Chat and Group Chat</td>'+
					'<td class="text-center"><input type="checkbox" name="dctW" id="dctW" value="W" class="W" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="dctR" id="dctR" value="R" class="R" checked></td>'+
					'<td class="text-center"><input type="checkbox" name="dctD" id="dctD" value="D" class="D" checked></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="pct" id="pct"></td>'+
					'<td>Project Chat</td>'+
					'<td class="text-center"><input type="checkbox" name="pctW" id="pctW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="pctR" id="pctR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="pctD" id="pctD" value="D" class="D"></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="fil" id="fil"></td>'+
					'<td>My Files</td>'+
					'<td class="text-center"><input type="checkbox" name="filW" id="filW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="filR" id="filR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="filD" id="filD" value="D" class="D"></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="rep" id="rep"></td>'+
					'<td>My Reports</td>'+
					'<td class="text-center"><input type="checkbox" name="repW" id="repW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="repR" id="repR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="repD" id="repD" value="D" class="D"></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="wor" id="wor"></td>'+
					'<td>Create Workspace</td>'+
					'<td class="text-center"><input type="checkbox" name="worW" id="worW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="worR" id="worR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="worD" id="worD" value="D" class="D"></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="ptl" id="ptl"></td>'+
					'<td>Privilege, Team, Login info</td>'+
					'<td class="text-center"><input type="checkbox" name="ptlW" id="ptlW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="ptlR" id="ptlR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="ptlD" id="ptlD" value="D" class="D"></td>'+
					'</tr>'+
					'<tr>'+
					'<td style="width: 50px"><input type="checkbox" name="rol" id="rol"></td>'+
					'<td>Create Role</td>'+
					'<td class="text-center"><input type="checkbox" name="rolW" id="rolW" value="W" class="W"></td>'+
					'<td class="text-center"><input type="checkbox" name="rolR" id="rolR" value="R" class="R"></td>'+
					'<td class="text-center"><input type="checkbox" name="rolD" id="rolD" value="D" class="D"></td>'+
					'</tr>'+
					'</tbody>'+
					'</table>'+
					'</div>'+
					'</div>'+
					'<div class="box-footer">'+
					'<input type="hidden" name="gpprofileid" id="gpprofileid">'+
					'<button type="button" class="btn btn-default" onclick="new_pri(0)">Cancel</button>'+
					'<button type="submit" class="btn btn-primary">Save</button>'+
					'</div>'+
					'</form>'+
					'</div>';

					$(".pt_body_12").html(html);
					$(".pt_body_12").show("slow");
					$(".profile_access").show();
					$(".new_privileges_name").focus();
				}
				else{
					$(".pt_body_12").html("");
					$(".profile_access").hide();
					$(".pt_body_12").hide("slow");
				}*/
			}
		</script>
		


		<?php include("role_js.php"); ?>
		<?php include("profile_js.php"); ?>
		<?php include("groups_js.php"); ?>
		<?php include("login_history_js.php"); ?>
		<script src="<?php echo base_url(); ?>asset/js/plugin/datatables/dataTables.rowGroup.min.js"></script>
		<?php include("settings/workuser_settings_script.php"); ?>


		<script type="text/javascript">
			function createMeMember(e){
				console.log($(e).attr("data-uid"));
				$("#invited_user_name").val($(e).attr("data-full_name"));
				$("#invited_user_email").val($(e).attr("data-email"));
			}
		</script>

	</body>
	</html>