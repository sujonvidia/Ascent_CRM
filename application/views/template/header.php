<?php 
	$this->load->helper('access_profile');
	$page_style =  $this->db->get_where("crm_users", array("ID"=>$id))
							->result();
	$page_style_result = $page_style[0]->crm_user_preferences;

	if($page_style[0]->logo_img == "") $logo = "logo.png";
	else $logo = $page_style[0]->logo_img;
?>
	<?php if(! isset($shared_activity_id)) { ?>
	<div id="logo-group" class="active-dashboard">
			<!-- PLACE YOUR LOGO HERE -->
			<span id="logo">
				<img onclick="javascript:window.location.href='<?php echo site_url("dashboard"); ?>'; return false;" src="<?php echo base_url("asset/img/logo")."/".$logo; ?>" alt="Navigate Connect">
				<!-- <a href="<?php echo site_url("profile/logoFile"); ?>" class="uploadlogo" data-title="Upload Logo" data-toggle="lightbox" title="Upload Logo">Upload Logo</a> -->
			</span>
			<!-- END LOGO PLACEHOLDER -->
			<div id="hide-menu" class="pull-right">
				<span> <a href="javascript:void(0);" class="customFont" data-action="toggleMenu" title="Collapse Menu"><i class="fa <?php echo ($page_style_result == 0)?"fa-reorder":"fa-caret-left"; ?>" <?php if($page_style_result == 0) echo 'style="    margin-left: -0.5%;color: rgb(196, 196, 196);font-size: 20px;margin-top: 0.9% !important;position: absolute;"' ?> id="logoToggle" onclick="toggleClass()" ></i></a> </span>
			</div>
	</div>
	<?php } ?>


			<!-- pulled right: nav area -->
			
			
			<div class="pull-right" <?php if(isset($shared_activity_id)) echo "style='width:auto; background:none;'"; ?>>
				<!-- Global settings -->
				<!-- <ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url("asset/img/icons/Settings.png"); ?>" /></a></a>
						<ul class="dropdown-menu pull-right">
							<li class="active">
								<a href="<?php echo base_url();?>login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i> Logout</a> 
							</li>
						</ul>
					</li>
				</ul> -->

				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?php echo  base_url(); ?>asset/img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- fullscreen button -->
				<!-- <div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div> -->
				<!-- end fullscreen button -->
				
				<!-- workspace button width-200 class removed -->
				<ul class="header-dropdown-list hidden-xs customheader">
					<li class="pull-right workspace">
						<div class="login-info">
							<span>
								<a href="#" id="activity" class="activity-dropdown">
									<img src="<?php echo base_url("asset/img/avatars/".$user_img); ?>" alt="me" class="online" /> 
									<span style="font-size:<?php if(strlen($username)>17) {echo  '12px';}else{echo '14px';}?>">
										<?php echo $username; ?>
									</span>
								</a>
								<?php if(! isset($shared_activity_id) AND $id>0) { ?>
								<div class="ajax-dropdown profileDropdown">
									<div class="ajax-notifications">
										<p id="profileName"><?php echo $username; ?></p>
										<img src="<?php echo base_url("asset/img/avatars/".$user_img); ?>" class="img-circle" alt="User Image" />
										<p><small>Member since <?php $this->db->select("date_entered"); $date_entered = $this->db->get_where("crm_users", array("ID"=>$id))->result(); echo $date_entered[0]->date_entered; ?></small></p>
			                            <span><a href="<?php echo site_url("profile"); ?>">Profile</a></span>
			                            <span><a href="<?php echo site_url("workspace"); ?>"><?php echo $org_id; ?></a></span>
			                            <span><a href="<?php echo base_url();?>login/logout" title="Sign Out"data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"> Logout</a> </span>
									</div>
								</div>
								<?php } ?>
							</span>
						</div>
					</li>
				</ul>

				<!-- <div class="pull-right" style="position: relative;left: 10px;top:10px;cursor: pointer;width: 50px;">
					<a class="notify-toast" title="Toast Notification" onclick="toggleToastDisplay()" style="font-size:20px;color:grey">
					   <span class="fa fa-bell"></span>
					   <span class="badge badge-notify-toast"></span>
					 </a>
				</div> -->

				<div class="header-search pull-right">
					<input id="search-fld" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'"  type="text" name="param" placeholder="search" class="<?php echo $page_name  ?>">
					<button type="button">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</div>
				<!-- end input: search field -->
			</div>
			<!-- end pulled right: nav area -->
			<div class="pull-left ">
				<ul class="header-dropdown-list hidden-xs mainmenu">
					<?php if(! isset($shared_activity_id)) { ?>
					<li class="<?php
				        if ($page_name == 'dashboard')
				            echo 'active';
				        ?>">
						<a href="<?php echo site_url("dashboard"); ?>"  class="dropdown-toggle">
							<span class="glyphicon glyphicon-home" style="color: #4d4d4d;font-size: 19px;top: 2px;left: -3px;"></span> HOME
						</a>
					</li>
					<?php } ?>
					<?php if(user_privilege($id, $org_id, "pro") == "RWD" || (isset($shared_activity_id) && isset($type) && $type == 'Task') || (isset($shared_activity_id) && isset($type) && $type == 'Sub Task')) { ?>
					<li class="<?php
				        if ($page_name == 'projects')
				            echo 'active';
				        ?>">
						<a href="<?php echo base_url(); ?>projects" class="dropdown-toggle">PROJECTS</a>
					</li>
					<?php } ?>
					<?php if(user_privilege($id, $org_id, "tod") == "RWD" || (isset($shared_activity_id) && isset($type) && $type == 'Todo')) { ?>
					<li class="<?php
				        if ($page_name == 'todo')
				            echo 'active';
				        ?>">
						<a href="<?php echo base_url(); ?>todo/todoview" class="dropdown-toggle">QUICK LIST </a>
					</li>
					<?php } ?>
					<?php if(user_privilege($id, $org_id, "cal") == "RWD") { ?>
					<li class="<?php
				        if ($page_name == 'calendar')
				            echo 'active';
				        ?>">
						<a href="<?php echo base_url(); ?>calendar/calendarview" class="dropdown-toggle" >CALENDAR</a>
					</li>
					<?php } ?>
					<?php if(user_privilege($id, $org_id, "fil") == "RWD") { ?>
					<li class="<?php
				        if ($page_name == 'my_files')
				            echo 'active';
				        ?>">
						<a href="<?php echo base_url(); ?>myfiles" class="dropdown-toggle">FILES</a>
					</li>
					<?php } ?>
					<?php if(user_privilege($id, $org_id, "rep") == "RWD") { ?>
					<li class="dropdown <?php
					if ($page_name == 'reports')
						echo 'active';
					?>">
					<a class="dropdown-toggle" type="button" data-toggle="dropdown"><span id="reportTypeText">REPORTS</span>
						<span class="caret"></span></a>
						<ul id="reportTypeMenu" class="dropdown-menu">
							<li><a href="<?php echo base_url(); ?>report">Status Reports</a></li>
							<li><a href="<?php echo base_url(); ?>report/report_dashboard">Dashboard Reports</a></li>
							<li><a href="<?php echo base_url(); ?>report/report_gantt">Gantt Chart Reports</a></li>
							<li><a href="<?php echo base_url(); ?>report/report_chat">Chatting Reports</a></li>
							<li><a href="<?php echo base_url(); ?>report/report_workforce">Workforce Analysis</a></li>
							
						</ul>
						
					</li>
					<?php } ?>
					<!-- Add new project, todo, event -->
					<?php if(! isset($shared_activity_id)) { ?>
					<li class="addmore ">
<!--						<a style="margin: 7px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url();?>asset/img/icons/Add Project.png" alt=""/></a>-->
                                                <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-plus hvr-glow  clasI" aria-hidden="true"></i></a>
<!--                                                <img src="../../../asset/img/feedIcon/add_icon.png" alt=""/>-->
                                                <ul class="dropdown-menu pull-right">
							<div class="arrow-top-right"></div>
							<li class="dropdown-menu-header">Create New</li>
							<li class="open_newpro1"><a href="#"><i class="fa fa-check"></i> Project</a></li>
							<li><a href="<?php echo base_url(); ?>todo/todoview/new"><i class="fa fa-check"></i> To-Do</a></li>
							<li><a href="<?php echo base_url(); ?>calendar/calendarview/new"><i class="fa fa-check"></i> Event</a></li>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>