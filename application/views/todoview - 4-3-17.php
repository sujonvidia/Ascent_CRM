<?php 
	$page_style =  $this->db->select("crm_user_preferences")
	->get_where("crm_users", array("ID"=>$id))
	->result();
	$page_style_result = $page_style[0]->crm_user_preferences;
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
		<?php include 'template/includes_top.php';?>
		
		<style type="text/css">

			.popover{
			z-index: 10500000;
			}
			.modal{
			z-index: 10500000;
			}
			.qtip{
			font-size: 14px;
			}
			.select2-selection__choice__remove{
			float:right;
			}
			
			.select2-results__option[aria-selected=true]:before{
			content:'\2713';
			display:inline-block;
			color:green;
			padding:0 6px 0 0;
			}
			.select2-results__option--highlighted[aria-selected=true]:before{
			content:'\2713';
			display:inline-block;
			color:white;
			padding:0 6px 0 0;
			}
			
			.tagAddAdmin{
            width: 91% !important;
            height: 50px;
            float: left !important;
            overflow-y: auto;
            margin-right: 0%;
			}
			
			#addAdmin{
            width: 91%;
            height: 50px;
            float: left;
            overflow-y: auto;
            margin-right: 0%;
			}
			
			.tagAddMember{
            width: 91% !important;
            height: 50px;
            float: left !important;
            overflow-y: auto;
            margin-right: 0%;
			}
			
			#addMember{
            width: 91%;
            height: 50px;
            float: left;
            overflow-y: auto;
            margin-right: 0%;
			}
			
			#tagAddAdmin .select2-container-multi .select2-choices, .select2-selection--multiple {
            border: 1px solid #ffffff;
			}
			
			#tagAddMember .select2-container-multi .select2-choices, .select2-selection--multiple {
            border: 1px solid #ffffff;
			}
			.proTaskarea{
            border-radius: 6px;
            border: 2px solid #cecbcb;
            margin-bottom: 2%;
			}
			
			.proInputText{
            border-radius: 5px;
            width: 100%;
            height: 31px;
            margin-right: 2%;
            border: 2px solid #cecbcb;
			
			}
			.proDivname{
            font-family: "futura";
            font-size: 25px;
            margin-top: 10px;
			}
			.proClBtn{
            float: right;
            position: absolute;
            right: 0px;
            padding-left: 24px;
            margin-top: 0px;
            font-size: 23px;
			}
			
			.setActive{
			background: #a7a4a4;
    		border-radius: 50%;
			}
			.proName{
			cursor: pointer;
			}
			.select2-dropdown{
			z-index: 100000;
			}
			#gifImg{
		  	width: 36px;
		    margin-top: -13px;
		    margin-right: 5px;
			}
			#valu{
			font-family: monospace;
			font-size: 29px;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
		    -moz-box-sizing: border-box;    /* Firefox, other Gecko */
		    box-sizing: border-box;
		    color: #aba9a9;
			}
			
			#degree{
		  	position: absolute;
		    font-size: 8px;
		    font-weight: bolder;
		    margin-top: 1%;
		    color: #aba9a9;
			}
			#cunit{
		    margin-left: 0.5%;
		    color: #aba9a9;
		    cursor: pointer;
			}
			#funit{
		  	font-size: 19px;
		    margin-left: 5%;
		    cursor: pointer;
			}
			#city{
			margin-left: 1%;
			color: #aba9a9;
			}
			
			#country{
			font-size: 22px;
			}
			/*.border-rad{
			-webkit-border-radius: 8px !important;
			-moz-border-radius: 8px !important;
			border-radius: 8px !important;
			background-image: url('../asset/img/icons/plusIcon.png');
			background-position-y: 3px;
			background-repeat: no-repeat;
			height: 32px;
			padding-left: 30px;
			background-size: 18px 18px;
			font-size: 16px;
			background-position: 6px 6px;
			}*/
			/*.qtip-dropdown ul{
			list-style-type: none;
			}*/
		</style>
		<!-- ITL Todo CSS : sujon -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/itl-todo/itl-todo.css?v=<?php echo time();?>">
		
		
	</head>
	
	<body id="projectBody" class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">
		
		<!-- HEADER -->
		<div class="chat-wid-back customChat"></div>
		<header id="header">
			<?php include 'template/header.php';?>
		</header>
		<!-- END HEADER -->
		
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">
			<?php include 'template/left_panel.php';?>
		</aside>
		<!-- END NAVIGATION -->
		
		<!-- MAIN PANEL -->
		<div id="main" role="main">
			
			<!-- RIBBON -->
			<div id="ribbon">
				
				<ol class="breadcrumb">
					<li class="todo-heading">
						My To-Do
					</li>
				</ol>
				
				
			</div>
			<!-- END RIBBON -->
			
			<!-- MAIN CONTENT -->
			<div id="content">
				
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row">
						<div class="col-lg-12 todoDiv">
							<div class="panel panel-default proDiv" style="height: auto">
								
								<div class="panel-body font-color todo-font-size">
									
									<div class="row margin-topdown">
										<div class="col-lg-9 col-sm-9 col-md-9">
											
											<input id="newTodoInput" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'To-Do'" placeholder="To-Do" class="form-control border-rad">
											
										</div>
										
										<div id="todoViewDiv" class="col-lg-3 col-sm-3 col-md-3">
											<li  class="ddm-todoview" style="display:inline">
												<a class="dropdown-toggle dd-tog-view" data-toggle="dropdown"><i class="fa fa-caret-right"></i> View...</a>
												<ul class="dropdown-menu dropdown-change-view">
													<div class="arrow-top-right arrow-position-view"></div>
													
													<li class="active"><a>By Due Date</a></li>
													<li><a>Incomplete</a></li>
													<li><a>Completed</a></li>
													<li><a>Assignee</a></li>
												</ul>
											</li>
											
										</div>
										
									</div>
									
									<div class="row margin-topdown">
										<div class="col-lg-4 col-sm-4 col-md-4">
											<p id="DueDateSpan" onclick="changeViewOrder()">
												<i class="fa fa-caret-down"></i>
												<span id="DueDateText" >By Due Date</span>
												<span id="DueDateOrder"></span>
											</p>
											<li onclick="changeViewOrderAss()" style="display: none;list-style-type: none" class="ddm-calview">
												<a class="dropdown-toggle"><i class="fa fa-caret-right"></i> Assignee...</a>
												<span id="AssigneeOrder">ASC</span>
												
											</li>
											
										</div>
										
									</div>
									
									<div id="todoInsertDiv">
										
									</div>
									
									
								</div>
								
								
							</div>
							
						</div>
					</div>
				</section>
				<!-- end widget grid -->			
			</div>
			
			
		</div>
		<!-- END MAIN CONTENT -->
		
		<div id="taskMyDiv">
		<div class="togPop" style="cursor:pointer;padding-left: 13px;font-size: 27px;margin-top: -2px;" onclick="offMDiv()"><span>X</span></i></div>
	    <div class="navbar-custom-menu">
	        <ul class="nav navbar-nav">
	            <li class="dropdown messages-menu">
	                <div aria-expanded="false" class="feedbackbtn dropdown-toggle" onclick="toggleDiv()">Feedback </div>
	                <ul class="dropdown-menu" id="feedDiv" style="top:40px; width: 600px;height: auto;min-height:300px;display: none;">
	                    <div class="box box-success" id="feedDiv1" style="border-top-color: #fff;">
	                        <div class="box-header with-border">
	                            <h3 style="margin: -5px 0px;">Award Badge</h3>
							</div>
	                        <div class="box-body">
	                            <table width="100%" rules="all">
	                                <tr>
	                                    <td class="child" onclick="selectbadge('Creative Genius', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Creative Genius.png" />
	                                        <p>Creative Genius</p>
										</td>
	                                    <td class="child" onclick="selectbadge('Helpful & Supportive', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Helpful & Supportive.png" />
	                                        <p>Helpful & Supportive</p>
										</td>
	                                    <td class="child" onclick="selectbadge('Inspired Leader', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Inspired Leader.png" />
	                                        <p>Inspired Leader</p>
										</td>
	                                    <td class="child" onclick="selectbadge('Lighting Fast', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Lighting Fast.png" />
	                                        <p>Lighting Fast</p>
										</td>
									</tr>
	                                <tr>
	                                    <td class="child" onclick="selectbadge('Master Multitasker', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Master Multitasker.png" />
	                                        <p>Master Multitasker</p>
										</td>
	                                    <td class="child" onclick="selectbadge('Super Manager', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Super Manager.png" />
	                                        <p>Super Manager</p>
										</td>
	                                    <td class="child" onclick="selectbadge('Team Player', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/Team Player.png" />
	                                        <p>Team Player</p>
										</td>
	                                    <td class="child" onclick="selectbadge('The Perfectionist', this)">
	                                        <img src="<?php echo base_url(); ?>require/img/badge/The Perfectionist.png" />
	                                        <p>The Perfectionist</p>
										</td>
									</tr>
								</table>
	                            <hr>
	                            <div class="form-group col-lg-12">
	                                <label class="control-label col-lg-12">Compliments <small>(optional)</small> </label>
	                                <label class="control-label col-lg-12"><small>Hint: Include these words nice, beautiful, pretty, great, like, love.</small></label>
	                                <div class="col-lg-12">
	                                    <div class="input-group feedtext">
	                                        <textarea class="form-control" id="taskCompliments" placeholder="Your presentation was really good. keep it up ..." rows="1" ></textarea>
										</div>
									</div>
								</div>
	                            <hr>
	                            <div class="form-group col-lg-12">
	                                <label class="control-label col-lg-12">Scope for improvement <small>(optional)</small> </label>
	                                <label class="control-label col-lg-12"><small>Hint: Be polite and aim for healthy critique.</small></label>
	                                <div class="col-lg-12">
	                                    <div class="input-group feedtext">
	                                        <textarea class="form-control" id="taskImprovement" placeholder="Your presentation was nice but what if you changed the tone of the message to be a little more formal." rows="1" ></textarea>
										</div>
									</div>
								</div>
							</div>
	                        <!-- /.box-body -->
	                        <hr>
	                        <div class="box-footer form-group">
	                            <div class="col-md-12">
	                                <div class="col-md-6 col-sm-6 pull-left">
	                                    <p><i class="fa fa-lock"></i> The feedback can only be viewed by you and team member(s) privately.</p>
									</div>
	                                <div class="col-md-6 col-sm-6 pull-right">
	                                    <button type="button" class="btn btn-primary pull-right" onclick="feedback_submit()" style="margin-right: 6px;width: 70px;height: 27px;padding-top: 4px;">Add</button>
	                                    <button type="button" class="btn btn-primary pull-right" id="feedback_update" onclick="feedback_update()" style="margin-right: 6px;width: 70px;height: 27px;padding-top: 4px; display: none;">Update</button>
	                                    <button type="button" onclick="toggleDiv()" class="btn btn-primary pull-right" style="margin-right: 6px;width: 70px;height: 27px;padding-top: 4px;">Cancel</button>
									</div>
								</div>
							</div>
						</div>
	                    <div class="box box-success" id="feedDiv2" style="border-top-color: #fff;">
	                        <div class="box-header with-border">
	                            <h3 style="margin: -5px 0px;">Award Badge</h3>
							</div>
	                        <div class="box-body">
	                            <div id="feedDiv2Content"> </div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	    <div class="row" style="background-color: #fff;margin-left: 0%;">
	        <div class="col-lg-12 col12" style="background-color: #fff;margin-left: 2%;padding-right: 5%;">
	            <div class="col-lg-11 size-family-weight" style="margin-top: 3px;margin-left: 0px;">
	                <input type="checkbox" id="chkchangetaskstatus" data-taskdivid="" data-taskid="" onclick="callChangeEvel()" style="margin-top: 6px;margin-right: 0px; float: left;width:20px;height:20px;">
	                <input type="text" id="togPopH" style="font-size: 1.30em;font-weight: 600;background-color: #fff;" class="form-control" onkeyup="$('#tasknametitle').val($(this).val())">
	                <p class="tanati" style="margin-left: 37px;font-size: 12px;">Created by <span id="createdbyname" class="size-family-sidebar"></span></p>
				</div>
	            <i id="expand_mydiv" class="fa fa-2x fa-arrows-alt" style="margin-top: 6px;"></i>
	            <div style="position: relative; float: right; margin-right: 40px; margin-top: -45px;">
	                <p id="update_okT" style="font-size: 14px;margin-top: 16%;"><i style="color:green" class="fa fa-check" aria-hidden="true"><b> Updated</b></i></p>
	                <p id="update_notT" style="font-size: 14px;margin-top: 16%;"><i style="color:red" class="fa fa-times" aria-hidden="true"><b> Not Updated</b></i></p>
				</div>
			</div>
		</div>
	    <div class="row" style="background-color: #FFF;margin-left: 0%;">
	        <div class="col-lg-9" style="width: 65%; padding: 0px; margin-left: 2%;">
	            <p class="" style="color:#616161"></p>
			</div>
	        <div class="col-lg-3" style="width: 30%;padding-left: 0px;">
			</div>
		</div>
	    <div class="row">
	        <div class="col-md-12">
	            <!-- Custom Tabs -->
	            <div class="nav-tabs-custom">
	                <ul class="nav nav-tabs">
	                    <li class="active size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_1T" data-toggle="tab" aria-expanded="true">Properties</a></li>
	                    <li class="size-family-sidebar" style="width: 25%; text-align: center;"><a href="#tab_2T" data-toggle="tab" aria-expanded="false">Comments & Activities</a></li>
	                    <li class="size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_3T" data-toggle="tab" aria-expanded="false">Files</a></li>
						<!--   <li class="size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_4T" data-toggle="tab" aria-expanded="false">Quotations</a></li>
						<li class="size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_5T" data-toggle="tab" aria-expanded="false">Invoices</a></li> -->
					</ul>
	                <div class="tab-content">
	                    <div class="tab-pane active" id="tab_1T">
	                        <form id="form_datasetTaskpro" name="form_datasetTaskpro" method="POST" action="<?php echo base_url(); ?>todo/updateTask">
	                            <input type="hidden" id="tasknametitle" name="tasknametitle">
	                            <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;/*margin-top: -2%;*/">
	                                <div class="box-body" style="    height: 545px;min-height: 300px; overflow-y: auto;">
	                                    <div class="form-group col-md-12 cus-from-group">
	                                        <div class="col-lg-12">
	                                            <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>
	                                            <button type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Update</button>
											</div>
										</div>
	                                    <div class="form-group col-md-12">
	                                        <label class="control-label col-md-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Description </label>
	                                        <div class="col-md-10" style="width: 88.3333%;">
	                                            <textarea name="taskdescription" class="form-control" id="taskdescription" rows="1"></textarea>
											</div>
										</div>
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Location</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <a onclick="openLocation()" data-project="" data-task="" class="btn btn-default btn-block" id="loc"></a>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar" style="margin-top: 10px;">Startdate</label>
	                                        <div class="col-lg-9">
	                                            <input name="startdate" type="text" class="form-control" id="datetimepicker7Task"  name="startdate" value=""  />
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar duedate">Duedate</label>
	                                        <div class="col-lg-9">
	                                            <div class="input-group feedtext">
	                                                <input name="duedate" type="text" class="form-control" id="datetimepicker8Task"  name="duedate" value=""  />
												</div>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar" style="margin-top: 10px;">Status</label>
	                                        <div class="col-lg-9">
	                                            <select name="projectstatus" id="projectstatus" class="form-control">
	                                                <?php foreach ($projectstatus as $r) { ?>
														<option value="<?php echo $r->projectstatus; ?>"><?php echo ucfirst($r->projectstatus); ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar">Duration </label>
	                                        <div class="col-lg-9">
	                                            <input type="text" class="form-control" name="workhour" id="workhour" placeholder="Type Work Hour" />
											</div>
										</div>
	                                    <!-- <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Supervisor</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
											<select name="assignto[]" id="assignToMemberTask" multiple="multiple" class="select2_multiple20" onchange="selectSplice($(this).val())" style="width: 100%;">
											</select>
	                                        </div>
										</div> -->
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Admin</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <select readonly name="adminTask" id="adminTask"  style="width: 100%;">
												</select>
											</div>
										</div>
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Assignee</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <select name="member[]" id="memberTask" multiple="multiple" class="select2_multiple30" style="width: 100%;">
												</select>
											</div>
										</div>
										<!--  <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Follower</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
											<select name="followers[]" id="followersTask" multiple="multiple" class="select2_multiple3" style="width: 100%;">
											<?php foreach ($users as $r) { ?>
												<option value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->full_name); ?></option>
											<?php } ?>
											</select>
	                                        </div>
										</div> -->
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar">Priority </label>
	                                        <div class="tw-tutorial-tooltip-dot" id="Blink">
	                                            <div class="tw-tutorial-tooltip-dot --outer"></div>
	                                            <div class="tw-tutorial-tooltip-dot --mid"></div>
	                                            <div class="tw-tutorial-tooltip-dot --inner"></div>
											</div>
	                                        <div class="col-lg-9">
	                                            <select name="ticketpriorities" id="ticketpriorities" class="form-control">
	                                                <?php foreach($ticketpriorities as $r){ ?>
														<option value="<?php echo $r->ticketpriorities; ?>"><?php echo ucfirst($r->ticketpriorities); ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar" style="margin-top: 10px;">Label</label>
	                                        <div class="col-lg-9">
	                                            <div class="input-group feedtext">
	                                                <input type="text" name="label" id="label" class="form-control my-colorpicker1"/>
												</div>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar">Type </label>
	                                        <div class="col-lg-9">
	                                            <select name="projecttasktype" id="projecttasktype" class="form-control">
	                                                <?php foreach ($projecttasktype as $r) { ?>
														<option value="<?php echo $r->projecttasktype; ?>"><?php echo ucfirst($r->projecttasktype); ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
	                                    <div class="form-group col-lg-6">
	                                        <label class="control-label col-lg-3 size-family-sidebar">Progress </label>
	                                        <div class="col-lg-9">
	                                            <select name="projecttaskprogress" id="projecttaskprogress"  class="form-control">
	                                                <?php foreach ($projecttaskprogress as $r) { ?>
														<option value="<?php echo $r->projecttaskprogress; ?>"><?php echo ucfirst($r->projecttaskprogress); ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-3 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Tags </label>
	                                        <div class="col-lg-9" style="width: 88.3333%;">
	                                            <select name="tag[]" id="tag" multiple="multiple" class="select2_multiple2" style="width: 100%;">
	                                                <option value="Follow-Up">Follow-Up</option>
	                                                <option value="Important">Important</option>
	                                                <option value="Priority">Priority</option>
	                                                <option value="Review">Review</option>
												</select>
											</div>
										</div>
									</div>
	                                <div class="box-footer" style="background-color: #FFF;">
	                                    <div class="form-group col-md-12 cus-from-group footForm">
	                                        <div class="col-lg-12">
	                                            <input type="hidden" name="projecteid" value="" id="projecteidTask" />
	                                            <input type="hidden" name="taskID" value="" id="taskID" />
	                                            <input type="hidden" name="this_type" value="" id="this_type" />
	                                            <input type="hidden" name="taskListID" value="" id="taskListID" />
	                                            <input type="hidden" name="lasUpdate" value="" id="lasUpdate" />
	                                            <input type="hidden" name="type" value="" id="type" />
	                                            <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>
	                                            <button  type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Update</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
	                    <!-- /.tab-pane -->
	                    <div class="tab-pane" id="tab_2T">
	                        <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;/*margin-top: -2%;*/">
	                            <div class="box-body chat" id="comment-box" style="height: 475px;min-height: 300px; overflow-y: auto;width: 100%;overflow-x: hidden;"> </div>
	                            <div class="box-footer" id="tagHint" style="height: 150px;overflow-y: auto;background-color: #ECECEC;padding: 24px 0 0 35px;">
	                                <form method="POST" id="fileinfo" name="fileinfo">
	                                    <div class="col-md-2 form-group " id="commentcol1" style="background-color: #3c8dbc;height: auto; min-height: 40px;  margin-right: -14px;color: #FFF;"> <i onclick="performClick('fileinput');" id="commentcol2" class="fa fa-paperclip" style="cursor:pointer; height:20px; width: 20px;font-size: 22px;margin-right: 2px;margin-top:11px"></i> <i onclick="performClick('theFile');" id="commentcol3" class="fa fa-camera" style="cursor:pointer; height:20px; width: 20px;font-size: 22px;margin-right: 6px; "></i>
	                                        <input type="file" id="theFile" data-username="<?php echo $username; ?>" data-userimg="<?php echo $user_img; ?>" data-typeid="" style="display:none" onchange="appendFile($(this).data('typeid'), $(this).data('userimg'), $(this).data('username'));"   accept="image/jpg, image/jpeg, image/png"/>
	                                        <a href="#popupTop" onclick="drawEmoDiv()" role="button" data-toggle="modal-popover" data-placement="top"><i class="fa fa-smile-o" id="commentcol4" style="color: #FFF; cursor:pointer; height:0px; width: 0px;font-size: 22px;margin-right: 0px;"></i></a> 
										</div>
	                                    <div class="col-md-8 form-group " id="commentcol5">
	                                        <div id="comment" class="textxarea" name="comment textarea2" data-text="Share your views" style="width: 100%; min-height:20px; height: auto; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" contenteditable></div>
	                                        <textarea id="comment2" style="display: none;"></textarea>
	                                        <input id="fileinput" name="fileinput[]" class="file" type="file" multiple data-min-file-count="1">
	                                        <input type="hidden" name="typeID" id="typeID" value="">
	                                        <input type="hidden" name="commentNO" id="commentNO" value="">
	                                        <input type="hidden" name="userID" id="userID" value="<?php echo $id; ?>">
	                                        <input type="hidden" name="userImg" id="userImg" value="<?php echo $user_img; ?>">
	                                        <input type="hidden" name="userName" id="userName" value="<?php echo $username; ?>">
										</div>
	                                    <div class="col-md-2 form-group pull-left" id="commentcol6" style="height: 50px;  margin-right: 0px; padding : 0px 0px 0px 3px;margin-top: -1%;"> <span id="commentcol7" style="font-size: 10px;">
	                                        <input type="checkbox" onchange="sendBtnAction()" id="pressEnter" class="col-lg-1 size-family-sidebar" style="width:15%;margin-right: 1px;">
										Press Enter to Send</span>
										<button style="width: 70px;height: 27px;padding-top: 4px;" type="button" id="sendComment" class="col-lg-12 btn btn-info commentSubmit">Share</button>
	                                    </div>
									</form>
								</div>
							</div>
						</div>
	                    <!-- /.tab-pane -->
	                    <div class="tab-pane fade" id="tab_3T">
	                        <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;/*margin-top: -2%;*/">
	                            <div class="box-header">
	                                <div class="col-lg-12 from-group cus-from-group">
	                                    <div class="col-lg-9">
	                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-search"></i></span>
	                                            <input type="email" id="fileboxSearch" class="form-control" placeholder="Search">
											</div>
										</div>
	                                    <div class="col-lg-3">
	                                        <button class="btn btn-block btn-default" id="attachFile" style="color: #FFFFFF;height: 34px;border-bottom: 2px solid #3c8dbc; background-color: #3c8dbc;" onclick="performClick('fileinput2');" ><i class="fa fa-link"></i> Attach Files</button>
	                                        <button class="btn btn-block btn-default" id="uploadFile" style="color: #FFFFFF;height: 34px;border-bottom: 2px solid #3c8dbc; background-color: #3c8dbc; display: none;margin-bottom: 10px;margin-top: -1px;"  ><i class="fa fa-paper-plane-o"></i> Upload Files</button>
										</div>
	                                    <div class="col-lg-12">
	                                        <form method="POST" id="fileinfo2" name="fileinfo2" onsubmit="return false;">
	                                            <input id="fileinput2" name="fileinput[]" class="file" type="file" multiple data-min-file-count="1">
											</form>
										</div>
									</div>
								</div>
	                            <div class="box-body chat file-box table-responsive" id="file-box" style="width: 100%; height:600px;overflow-y:auto;overflow-x: hidden;">
	                                <table class="sortableN" id="TaskSortTable" style="width: 100%;margin: 10px;">
	                                    <thead>
	                                        <tr class="first">
	                                            <th style="width:5%;">&nbsp;</th>
	                                            <th id="sl" style="width:35%;">
	                                                <span id="thfSp">File Name</span> 
	                                                <div class="pull-right box-tools">
	                                                    <!-- button with a dropdown -->
	                                                    <div class="btn-group open">
	                                                        <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="filnm"><i class="fa fa-filter"></i></button>
	                                                        <ul class="dropdown-menu pull-right" role="menu" id="fileExtBy">
															</ul>
	                                                        <!-- <button class="btn btn-success btn-sm fileRefreash" id="fileRefreash"><i class="fa fa-refresh"></i></button> -->
														</div>
													</div>
												</th>
	                                            <th id="nm" style="width:25%;">
	                                                Uploaded By
	                                                <div class="pull-right box-tools">
	                                                    <!-- button with a dropdown -->
	                                                    <div class="btn-group open">
	                                                        <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-filter"></i></button>
	                                                        <ul class="dropdown-menu pull-right" role="menu" id="uploadBy">
															</ul>
	                                                        <!-- <button class="btn btn-success btn-sm fileRefreash"  id="fileRefreash"><i class="fa fa-refresh"></i></button> -->
														</div>
													</div>
												</th>
	                                            <th style="width:10%;">File Size</th>
	                                            <th style="width:20%;">Uploaded Date</th>
	                                            <th style="width:5%;">
	                                                <!-- <i style="color:#dd4b39;" class="fa fa-trash"></i> -->&nbsp;
												</th>
											</tr>
										</thead>
	                                    <tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
	                    
					</div>
	                <!-- /.tab-content -->
				</div>
	            <!-- nav-tabs-custom -->
			</div>
	        <!-- /.col -->
		</div>
	</div>
	
	
	
	<!-- PAGE FOOTER -->
	<?php include 'template/footer.php';?>
	
	
	<!--================================================== -->
	<?php include 'template/includes_bottom.php';?>
	
	<!-- ITL Todo : sujon -->
	<!-- <script src="<?php echo base_url();?>asset/js/itl-todo/itl-todo-manager.js?v=<?php echo time();?>"></script> -->
	
	<?php include("template/itl-todo-manager.php"); ?>
	
	<?php include 'template/weather_js.php';?>
	
	<script type="text/javascript">
		
		function hideFeed(value){
			if(value == 'viewall'){
				$('.directchat').show('slow');
				$('.notifation').show('slow');
			}
			
			if(value == 'directchat'){
				$('.notifation').hide('slow');
				$('.directchat').show('slow');
			}
			
			if(value == 'notifation'){
				$('.directchat').hide('slow');
				$('.notifation').show('slow');
			}
		}
		
		
		function workspace_dropdown_toggle(){
			
			if(! $(".workspace").hasClass("open")) {
				
				var request = $.ajax({
					url: base_url+"workspace/getWorkspace",
					method: 'POST',
					data: {user_id: "<?php echo $id; ?>"},
					dataType: 'JSON'
				});
				request.done(function(response){
					console.log(response);
					if(response.length>0){
						$.each(response, function(k,v){
							var thisws = (v.workspace == "<?php echo $org_id; ?>")?"active":"";
							var design = '<li><a href="#"><i class="fa fa-check '+thisws+'"></i> '+v.workspace+'</a></li>';
						});
					}
				});
			}
		}
		
		
	</script>
	
	<!-- Calendar Modal -->
	<?php include 'template/calendarmodal.php';?>
	
	<script type="text/javascript">
		var user_id = '<?php echo $id; ?>';
		var val = true;
		var valM = true;
		$( window ).load(function() {
			
			$("#update_ok").hide();
			$("#update_okT").hide();
			$("#update_not").hide();
			$("#update_notT").hide();
			$("#assign_A").hide();
			$("#assign_C").hide();
			
			$(document).on('keyup keypress change', '#form_dataset :input', function(e,isScriptInvoked) {
				if (isScriptInvoked === true) {
					
					} else {
					$("#update_not").show();
					$("#update_ok").hide();
				}
			});
			var newRow = $("<tr id='aa'><td colspan='6'>no results found</td></tr>");
	        
	        $("#fileboxSearch").keyup(function(){
	            _this = this;
	            // Show only matching TR, hide rest of them
	            $.each($("#file-box table tbody").find("tr"), function() {
	                //console.log($(this).text());
	                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1){
						co = $(this).text().toLowerCase().indexOf($(_this).val().toLowerCase());
						$(this).hide();
					}
	                else{
						co = $(this).text().toLowerCase().indexOf($(_this).val().toLowerCase());
						$(this).show();                
					}
				});
				
	            // if(co == -1){
	            //     console.log("If con"+co);
	            //     $("#file-box table tbody").append(newRow);
	            // }else{
	            //     console.log("If con"+co);
	            //     $('#aa').remove();
	            // }
				
	            $('#aa').remove();
				
	            if($("#TaskSortTable").is(":visible")){
	                if(co == -1){
	                    //console.log("If con"+co);
						
	                    $("#file-box table tbody").append(newRow);
						}else{
	                    //console.log("If con"+co);
	                    $('#aa').remove();
					}
					}else{
	                //console.log($("#fileboxSearch").val());
	                var newRow1 = $("<table id='aa'><tr><td colspan='6'>no results found</td></tr></table>");
					
	                if($("#fileboxSearch").val() == ''){
	                    $('#aa').remove();
						}else{
	                    $("#file-box").append(newRow1);
					}
	                
	                
				}
			});
		});
	</script>
	
	<script  type="text/javascript">   //no need to specify the language
	    function ajaxTaskDetail(Vid, typeid) {
	        //console.log(Vid+","+typeid);
	        var URL1 = '<?php echo site_url(); ?>/uploads/';
	        var URL = '<?php echo site_url(); ?>yzy-tasks/index/document/' + Vid;
	        var IMGURL = '<?php echo site_url(); ?>/require/dist/img';
	        var IMG2URL = '<?php echo site_url(); ?>/require/img/text.png';
	        var UserImg = "dipok.jpg";
	        var userName = "Dipok Chakraborty";
	        var imgRep = ['data-commentid'];
	        var user_id = "<?php echo $id; ?>";
	        var user_img = "<?php echo $user_img; ?>";
	        var user_name = "<?php echo $username; ?>";
	        var uploaded_file_by = [];
	        var fileExtBy = [];
	        var get_status=0;
			
	        
	        $.ajax({
	            url: '<?php echo site_url(); ?>todo/taskDetail',
	            type: 'POST',
	            data: {taskID: Vid, get_status:get_status,user_id:user_id,taskType:'Cat'},
	            dataType: "json",
	            beforeSend: function () {
	                //console.log("ajaxTaskDetail");
	                $("#commentList").html("");
	                $(".textarea").html('');
	                $("#txtHint").html('');
	                $("#comment-box").html('');
	                $("#file-box table tbody").html('');
	                $("#docListTbody").html('');
	                $("#uploadBy").html('');
	                $("#fileExtBy").html('');
					
	                uploaded_file_by.length = 0;
	                fileExtBy.length = 0;
					
	                $("#fileExtBy").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="other"><input style="margin-right: 5%;" onclick="showThis(this)" id="other" rel="file" type="checkbox" checked="checked" value="ALL">ALL</label></a></li>');
					
	                $("#uploadBy").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="other"><input style="margin-right: 5%;" onclick="showThis(this)" id="other" rel="uploadedBy" type="checkbox" checked="checked" value="ALL">ALL</label></a></li>');
	                
					
				},
	            success: function (data, textStatus) {
					
					console.log('ajaxTaskDetail');	console.log(data);
	                
	                $("#taskOpenBy").val(data.dataList[0].opened_by);
	                
	                var comStr = "";
	                var file = "";
	                var i = 1;
					
					
	                //console.log(data.docList[0]);
	                if (data.docList != false) {
	                    $("#TaskSortTable").show();  
	                    $.each(data.docList, function (key, value) {
	                        var dateKey = $.datepicker.formatDate('dd M yy', new Date(data.docList[key].date));
	                        
	                        comStr = '<tr onmouseover="$(this).css("cursor", "pointer");" style="text-align:left;">';
	                        comStr += '    <td class=" "><input type="checkbox" name="selectall"></td>';
	                        comStr += '    <td class=" " data-value="' + data.docList[key].id + '" >' + data.docList[key].name + '</td>';
	                        comStr += '    <td class=" "><a href="' + URL1 + data.docList[key].folderName + '/' + data.docList[key].file_name + '" target="_blank">' + data.docList[key].ori_name + '</a></td>';
	                        comStr += '    <td class=" ">' + data.docList[key].folderName + '</td>';
	                        comStr += '    <td class=" "><a href="' + data.docList[key].id + '"><i class="fa fa-edit "></i></a> | <a href="' + data.docList[key].id + '"><i class="fa fa-trash"></i></a></td>';
	                        comStr += '</tr> ';
							
	                        // file += '<div class="item itemTASK' + data.docList[key].id + '" id="itemTASK' + data.docList[key].id + '">';
	                        // file += '<img src="' + IMGURL + '/' + data.docList[key].img + '"  alt="user image" class="online">';
	                        // file += '<div class="message">';
	                        // file += '<a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateKey + '</small>' + data.docList[key].full_name + '</a>';
							
	                        // file += '<table style="width:100%;">';
	                        // file += '<tr>';
	                        // file += '<td style="width:40%;text-align:center;"><a style="float: left;margin-left: 0px;" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/' + data.docList[key].file_name + '" target="_BLANK"><img style="width: 44%;" src="' + IMG2URL + '" /></a></td>';
	                        // file += '<td style="width:235px;"><p>Title: ' + data.docList[key].name + '</p></td>';
							
	                        // if (data.docList[key].user == user_id) {
	                        //     file += '<td rowspan="2"><p><small style="margin-left:30%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.docList[key].id + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + data.docList[key].id + ',\'file\')">Delete</small></p></td>';
	                        // }
							
	                        // file += '</tr>';
	                        // file += '<tr>';
	                        // file += '<td><a style="float: left;margin-left: 0px;" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/' + data.docList[key].file_name + '" target="_BLANK">' + data.docList[key].ori_name + '</a></td>';
	                        // file += '<td><p>File Size: ' + data.docList[key].file_size + 'KB</p></td>';
	                        // file += '</tr>';
	                        // file += '</table>';
	                        // file += '</div></div>';
							
	                        fileName = data.docList[key].file_name.split('.').pop().toUpperCase();
							
	                        if(jQuery.inArray(fileName, fileExtBy) !== -1){
	                            //noting will do
								}else{
	                            fileExtBy.push(fileName);
								
	                            $("#fileExtBy").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="'+fileName+'"><input id="'+fileName+'" style="margin-right: 5%;" class="prod_file " level="subchild" onclick="extRowHide(this)"  rel="file" type="checkbox" checked="checked" value="'+fileName+'"> .'+fileName+'</label></a></li>');
								
	                            fileName = '';
							}
							
							
	                        if(jQuery.inArray(data.docList[key].user_id, uploaded_file_by) !== -1){
	                            //noting will do
								}else{
	                            uploaded_file_by.push(data.docList[key].user_id);
								
	                            $("#uploadBy").append('<li><a href="#"><input class="prod_upload" rel="uploadedBy" onclick="tableRowHide(this)" type="checkbox" value="'+data.docList[key].user_id.split(' ').pop().toUpperCase()+'">'+data.docList[key].user_id+'</a></li>')
							}
	                        
	                        var design = '';
							//console.log(rsp.allFileList[k]);
							
							
	                        design += '<tr class="grouprow" id="itemTASK' + data.docList[key].id + '" rel="'+data.docList[key].user_id.split(' ').pop().toUpperCase()+'" style="border-top: 1px solid #000 !important;">';
	                        
	                        design +=   '<td > <img style="width: 100%;margin: 17%;padding-right: 35%;" src="<?php echo base_url();?>require/img/'+data.docList[key].file_name.split('.').pop()+'.png" /></td>';
	                        design +=   '<td class="file" name="'+data.docList[key].user_id.split(' ').pop().toUpperCase()+'" rel="'+data.docList[key].file_name.split('.').pop().toUpperCase()+'"><a target="_BLANK" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/'+data.docList[key].ori_name+'">'+data.docList[key].ori_name+'</a></td>';
	                        design +=   '<td class="uploadedBy" rel="'+data.docList[key].user_id.split(' ').pop().toUpperCase()+'">'+data.docList[key].user_id+'</td>';
	                        design +=   '<td>'+data.docList[key].file_size+'KB</td>';
	                        design +=   '<td>'+data.docList[key].date+'</td>';
	                        
	                        if (data.docList[key].user == user_id ) {
	                            
	                            design +=   '<td><i style="color:#dd4b39;cursor:pointer;" class="fa fa-trash" data-id = "' + data.docList[key].id + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + data.docList[key].id + ',\'file\')"></i></td>';
								}else{
	                            design +=   '<td>&nbsp;</td>';
							}
							
	                        design += '</tr>';
	                        
	                        $("#file-box table tbody").append(design);
							
	                        //$("#file-box").prepend(file);
	                        $("#docListTbody").prepend(comStr);
	                        file = "";
	                        comStr = "";
	                        design = '';
	                        //console.log(file);
	                        //console.log(i);
	                        i++;
						});
	                    
	                    //console.log(data.docList)
						}else{
						$("#TaskSortTable").hide();   
					}
					
	                var Commentstring = "";
	                var id = "";
					
	                if (data.commentList != false) {
						
	                    var i = 1;
	                    
	                    
	                    $.each(data.commentList, function (key, value) {
	                        
	                        // console.log(user_id);
	                        if (data.commentList[key].comment == "File Uploaded") {
	                            $.each(data.docList, function (k, v) {
	                                if (data.docList[k].comment_id == data.commentList[key].id) {
	                                    com = '<a style="margin-left: 80px;" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/' + data.docList[k].file_name + '" target="_BLANK"><img style="width: 15%;" src="' + IMG2URL + '" /><br/><p style="margin-left:0px;">Title: ' + data.docList[k].name + '</p>' + data.docList[k].ori_name + '</a>';
	                                    id = data.docList[k].id;
									}
								});
								} else {
	                            com = data.commentList[key].comment;
							}
	                        var dateasd = $.datepicker.formatDate('dd M yy', new Date(data.commentList[key].date));
	                        $.each(imgRep, function (k, v) {
	                            data.commentList[key].comment = repImgData(data.commentList[key].comment, k, v, data.commentList[key].id);
							});
	                        var Commentstring = '<div class="item" id="item' + data.commentList[key].type + data.commentList[key].id + '">';
	                        Commentstring += '<div class="col-lg-1"><img src="' + IMGURL + '/' + data.commentList[key].img + '" alt="user image" class="online" style="width:40px;height: 40px;"></div>';
	                        Commentstring += '<div class="message col-lg-11" id="reply' + i + '"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + data.commentList[key].name + '</a><p style="margin-bottom:0px;" id=edit' + data.commentList[key].type + data.commentList[key].id + '>' + com + '</p>';
	                        Commentstring += '<p class="responsiveReplyBtn" style="margin-bottom: 0px;margin-left: 4px;font-size:10px;"><small id="reply' + i + '" data-taskid = "' + data.commentList[key].id + '" data-typeid = "' + data.commentList[key].typeID + '"  data-value="reply' + i + '" onclick="openBox($(this).data(\'value\'),$(this).data(\'taskid\'),$(this).data(\'typeid\'))" class="pull-left" style="float:left; margin-top: 0px;margin-left:0%; color: #3C8DBC; cursor: pointer;">Reply</small>';
	                        if (data.commentList[key].user == user_id) {
	                            // if (data.commentList[key].comment == "File Uploaded") {
	                            //     Commentstring += '<small data-value="' + data.commentList[key].type + '" onclick="deleteComment($(this).data(\'value\'),' + data.commentList[key].id + ',\'' + id + '\',\'file\')" style="margin-top:2px;position: relative;margin-left:2%; color: #3C8DBC; cursor: pointer;">Delete</small>';
	                            // } else {
								
	                            // }
	                            Commentstring += '<small id="TaskEdit' + data.commentList[key].type + data.commentList[key].id + '" data-id = "' + data.commentList[key].id + '" data-value="' + data.commentList[key].type + '" onclick="editComment($(this).data(\'value\'),$(this).data(\'id\'),\'modcomments\')" style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:block;">Edit</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:none;" id="update'  + data.commentList[key].type + data.commentList[key].id + '" >Update</small><small style="margin-left:1%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.commentList[key].id + '"  data-value="' + data.commentList[key].type + '" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),\'0\',\'modcomments\')">Delete</small>';
							}
	                        Commentstring += '</p></div>';
	                        Commentstring += '<div class="col-lg-12" id="reply' + i + 'Area" style="display:none">';
	                        Commentstring += '<div class="col-lg-12" id="reply' + i + 'commentList">';
	                        Commentstring += '</div>';
	                        Commentstring += '<div class="form-group">';
	                        Commentstring += '<div class="col-md-12">';
	                        Commentstring += '<div class="widget-area no-padding blank">';
	                        Commentstring += '<div class="status-upload">';
	                        Commentstring += '<form>';
	                        Commentstring += '<img src="' + IMGURL + '/' + user_img + '"  alt="' + user_name + '" style="width: 34px; height:9%; float: left;border: 1px solid rgb(153, 200, 228);margin-left: 2%;margin-top: 0%;"><textarea class="responsiveTextarea" id="reply' + i + 'comment" name="replyComment" placeholder="Write a comment..." style="width: 88%; height:34px" ></textarea>';
	                        Commentstring += '<input type="hidden" name="userID" id="reply' + i + 'userID" value="<?php echo $id; ?>">';
	                        Commentstring += '<input type="hidden" name="userImg" id="reply' + i + 'userImg" value="<?php echo $user_img; ?>">';
	                        Commentstring += '<input type="hidden" name="userName" id="reply' + i + 'userName" value="<?php echo $username; ?>">';
	                        Commentstring += '<input type="hidden" id="reply' + i + 'isReply" class="isReply" name="isReply"  value="0">';
	                        Commentstring += '<button style="display:none;" type="button" id="reply' + i + 'commentBtn" data-taskid = "' + data.commentList[key].id + '" data-typeid = "' + data.commentList[key].typeID + '"  data-value="reply' + i + '" onclick="sendReply($(this).data(\'value\'),$(this).data(\'taskid\'),$(this).data(\'typeid\'))" class="btn btn-success green replyComBtn"><i class="fa fa-share"></i> Comment</button>';
	                        Commentstring += '</form>';
	                        Commentstring += '</div>';
	                        Commentstring += '</div>';
	                        Commentstring += '</div>';
	                        Commentstring += '</div>';
	                        Commentstring += '</div>';
	                        Commentstring += '</div>';
							
	                        $("#comment-box").append(Commentstring);
	                        var replyID = "reply" + i;
	                        openBox(replyID, data.commentList[key].id, data.commentList[key].typeID);
	                        Commentstring = "";
	                        i++;
						});
						
						
					}
					
	                //console.log(URL);
	                $("#hrefUrl").attr('href', URL);
	                $("#theFile").attr('data-taskid', Vid);
	                $("#theFile").attr('data-typeid', Vid);
	                $("#taskId").val(Vid);
	                $("#typeID").val(typeid);
	                $("#comment-box").animate({scrollTop: $('#comment-box').prop("scrollHeight")}, 1000);
					
	                // $("#feedback_badge").val(data.feedbackList[0].feedback_badge);
	                // $("#feedback_compliments").val(data.feedbackList[0].feedback_compliments);
	                // $("#feedback_improvement").val(data.feedbackList[0].feedback_improvement);
	                global_feedback = [];
	                // global_feedback.length = 0;
	                if ((data.feedbackList).length) {
	                    $.each(data.feedbackList, function (fk, fv) {
	                        global_feedback.push(fv);
						});
					}
	                // console.log(global_feedback);
	                $("#commentNO").val(i);
	                $("#shareDivOnLoad").hide();
					
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                // Some code to debbug e.g.:               
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
	        //e.preventDefault(); // could also use: return false;
	        //});
		}
	</script>
	
	<script type="text/javascript">
	    var footerTemplate = '<div class="file-thumbnail-footer">\n' +
		'   <div style="margin:5px 0">\n' +
		'       <input class="kv-input kv-new form-control input-sm {TAG_CSS_NEW}" name="commentFile" value="" placeholder="Enter description...">\n' +
		'   </div>\n' +
		'   {actions}\n' +
		'</div>';
		
	    $("#fileinput").fileinput({
	        //allowedFileExtensions: ['doc', 'docx', 'pdf', 'xls', 'xlxs', 'csv', 'ppt', 'pptx', 'txt','sql','ods','odf','odt','csv','htm','html','log','reg','text','xml','xmp','swf',,'flv','webm','zip','rar','jar','rss'],
	        maxFileSize: 5120,
	        maxFilesNum: 10,
	        showRemove: false,
	        showUpload: false,
	        showCaption: false,
	        browseClass: "",
	        browseLabel: "",
	        browseIcon: "",
	        layoutTemplates: {footer: footerTemplate}
		});
	    
	    $("#fileinput2").fileinput({
	        //allowedFileExtensions: ['doc', 'docx', 'pdf', 'xls', 'xlxs', 'csv', 'ppt', 'pptx', 'txt','sql','ods','odf','odt','csv','htm','html','log','reg','text','xml','xmp','swf',,'flv','webm','zip','rar','jar','rss'],
	        maxFileSize: 5120,
	        maxFilesNum: 10,
	        showRemove: false,
	        showUpload: false,
	        showCaption: false,
	        browseClass: "",
	        browseLabel: "",
	        browseIcon: "",
	        layoutTemplates: {footer: footerTemplate}
		});
	</script>
	
	<script type="text/javascript">
	 //    function performClick(elemId) {
	 //        var elem = document.getElementById(elemId);
	 //        if (elem && document.createEvent) {
	 //            var evt = document.createEvent("MouseEvents");
	 //            evt.initEvent("click", true, false);
	 //            elem.dispatchEvent(evt);
		// 	}
		// }
		
	    function drawEmoDiv() {
	        var emotionImg = ["smile", "smile-big", "sad", "crying", "tongue", "shock", "angry", "confused", "wink", "embarrassed", "disapointed", "sick", "shut-mouth", "sleepy", "eyeroll", "thinking", "lying", "glasses-nerdy", "teeth", "angel", "bye", "clap", "hug-left", "hug-right", "party", "good", "bad", "highfive", "love", "love-over", "tv", "mail", "brb", "rain", "pizza", "coffee", "computer", "beer", "drink", "cat", "dog", "sun", "star", "clock", "present", "mobile", "musical-note", "boy", "girl", "cake", "car"];
	        var imgURL = "<?php echo site_url() . 'require/emotion/'; ?>";
	        var design = '<div id="popupTop" class="popover" style="width:275px;">' +
			'<div class="arrow"></div>' +
			'<h3 class="popover-title">Emotions</h3>' +
			'<div class="popover-content">';
	        $.each(emotionImg, function (i, v) {
	            design += '<div class=clickable onClick="createurfunc(\'' + v + '\')" title=' + v + ' style="width:30px; height:25px; float:left"><img style="width:20px; height:22px" alt=' + v + ' src="' + imgURL + v + '.png"' + "/></div>";
			});
	        design += '</div></div>';
	        $("#popTopBox").append(design);
	        //console.log("id is: "+id);
		}
	    function createurfunc(emoImg) {
	        //console.log(emoImg);
	        var emotionImgSymble = [":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", "*)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\ ", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "<:o)", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(brb)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)"];
	        var emotionImg = ["smile", "smile-big", "sad", "crying", "tongue", "shock", "angry", "confused", "wink", "embarrassed", "disapointed", "sick", "shut-mouth", "sleepy", "eyeroll", "thinking", "lying", "glasses-nerdy", "teeth", "angel", "bye", "clap", "hug-left", "hug-right", "party", "good", "bad", "highfive", "love", "love-over", "tv", "mail", "brb", "rain", "pizza", "coffee", "computer", "beer", "drink", "cat", "dog", "sun", "star", "clock", "present", "mobile", "musical-note", "boy", "girl", "cake", "car"];
	        var key = emotionImg.indexOf(emoImg);
	        $("#comment").html($("#comment").html() + emotionImgSymble[key]);
	        //$("#comment2").val($("#comment2").val() + emotionImgSymble[key]);
			
		}
	</script>
	
	<script type="text/javascript">
		// console.log("1444");
		var selectArray = <?php echo json_encode($users); ?>;
		var wsusers = <?php echo json_encode($users); ?>;
		var alluser = <?php echo json_encode($allusers); ?>;
		
		var allprojects = <?php echo json_encode($allprojects); ?>;
		
		var allcategory = <?php echo json_encode($allcategory); ?>;
		var allprojectstatus = <?php echo json_encode($projectstatus); ?>;
		
		var projectArray = <?php echo json_encode($projectGroup); ?>;
		var client = <?php echo json_encode($client); ?>;
		var projectstatus = <?php echo json_encode($projectstatus); ?>;
		
		
		var newSelArr = selectArray;
		
		$(".select2_multiple01 option:selected").removeAttr("selected");
		$("#assignToMember").html("");
		$("#assignToMember").append('<option value="#addnew">Invite new people +</option>');
		$.each(selectArray, function (key, value) {
			//console.log(value);
			var name = value.full_name;
			//newSelArr.push([value.ID,name]);
			$("#assignToMember").append('<option value="'+value.ID+'" >'+name+'</option>');
			$("#project_admins").append('<option value="'+value.ID+'" >'+name+'</option>');
			
		});
		$(".select2_multiple01").trigger("change", [true]);
		
		$("#assignToMember").change(function(e){
			e.preventDefault();
			var valu = $(this[this.selectedIndex]).val();
			if (valu =='#addnew') {
				$(this[this.selectedIndex]).attr('selected',false);
				openLocation('#assignToMember');
				// $("#openProjectTaskDiv").find('[autofocus]').focus();
			}
		});
		
		$("#member").change(function(e){
			e.preventDefault();
			var valu = $(this[this.selectedIndex]).val();
			if (valu =='#addnew') {
				$(this[this.selectedIndex]).attr('selected',false);
				openLocation('.select2_multiple');
				// $("#testid").focus();
			}
		});
		
	</script>
	<script type="text/javascript">
		
		
		function selectSplice(val){
			//console.log(val);
			$(".select2_multiple option:selected").removeAttr("selected");
			$("#member").html("");
			$("#project_members").html("");
			
			var unique = [];
			
			var newSelArr = [];
			var finalArr = [];
			
			$.each(selectArray, function (key, value) {
				newSelArr.push(value.ID);
			});
			
			//console.log(selectArray);
			
			
			jQuery.grep(newSelArr, function(el) {
				
				if (jQuery.inArray(el, val) == -1) 
				unique.push(el);
				i++;
				
			});	
			//console.log(unique);
			
			for(var i=0; i< unique.length;i++){
				$.each(selectArray, function (key, value) {
					if(unique[i] === value.ID){
						finalArr.push(value);
					}
					
				});	
				
			}
			
			//console.log(finalArr);
			
			$("#member").append('<option value="#addnew">Invite new people +</option>');	
			
			$.each(finalArr, function (key, value) {
				var name = value.full_name;
				$("#member").append('<option value="'+value.ID+'">'+name+'</option>');
				$("#project_members").append('<option value="'+value.ID+'">'+name+'</option>');
			});
			
			$(".select2_multiple").trigger("change", [true]);
			
		}
		
		
	</script>
	<script type="text/javascript">
	    $(window).load(function () {
	        $("#update_oksett").hide();
	        $("#update_notsett").hide();
			
	        $(document).on('keyup keypress change', '#form_dataset2 :input', function (e, isScriptInvoked) {
	            if (isScriptInvoked === true) {
					
					} else {
	                $("#update_notsett").show();
	                $("#update_oksett").hide();
				}
			});
		});
	    $('form[name=form_dataset2]').submit(function (e) {
			
	        e.preventDefault();
	        var formData = new FormData($(this)[0]);
	        formData.append('togPopTitle', $('#settingHead').val());
	        //alert($('#settingHead').val());
	        $.ajax({
	            url: this.action,
	            type: this.method,
	            data: formData,
	            contentType: false,
	            processData: false,
	            success: function (updated_id) {
	                var tid = $("#chkchangetaskstatus").attr("data-taskid");
	                var oldtaskname = $("#tasklistdiv" + tid + " .taskHover p").html();
	                
	                if ($("#togPopH").val() != oldtaskname)
					$("#tasklistdiv" + tid + " .taskHover p").html($("#togPopH").val());
	                $("#update_notsett").hide();
	                $("#update_oksett").show();
	                
				},
	            error: function (jqXHR, textStatus, errorThrown) {
					
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
		});
		$("#attachFile").click(function () {
			$("#attachFile").css("display", "none");
			$("#uploadFile").css("display", "block");
		});
		
	    $(document).ready(function () {
			
	        var fileSelectEle = document.getElementById('fileinput2');
			
	        fileSelectEle.onclick = charge;
			
	        function charge()
	        {
	            document.body.onfocus = function () {
	                setTimeout(checkOnCancel, 100);
				};
			}
			
	        function checkOnCancel()
	        {
	            if (fileSelectEle.value.length == 0) {
	                $("#attachFile").css("display", "block");
	                $("#uploadFile").css("display", "none");
				}
	            else if (fileSelectEle.value == "") {
	                $("#attachFile").css("display", "block");
	                $("#uploadFile").css("display", "none");
					} else {
	                $("#attachFile").css("display", "none");
	                $("#uploadFile").css("display", "block");
				}
	            document.body.onfocus = null;
			}
	        $(".fileinput-remove").click(function () {
	            $("#attachFile").css("display", "block");
	            $("#uploadFile").css("display", "none");
			});
			
	        $("div").delegate('click', '.rmvphoto', function () {
	            $("#attachFile").css("display", "block");
	            $("#uploadFile").css("display", "none");
			});
		});
		
	    function deleteComment(commentID, modcomID, ReplyID, table) {
	        
	        $.ajax({
	            url: '<?php echo site_url(); ?>Projects/deleteReply',
	            type: 'POST',
	            data: {
	                commentid: modcomID,
	                id: ReplyID,
	                table: table
				},
	            dataType: "JSON",
	            beforeSend: function () {
	                //console.log(modcomID + ":" + commentID);
				},
	            success: function (data, textStatus) {
	                console.log(data);
	                $("#item" + commentID + modcomID).remove();
	                $(".item" + commentID + modcomID).remove();
	                // if(data.msg ='DONE'){
					
	                // }else{
	                //  alert("You Can't delete this comment!!!");
	                //  return false;
	                // }
					
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                // Some code to debbug e.g.:               
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
			
		}
		
		
	    function divClicked(commentID, ReplyID, table) {
			
	        
	        var divHtml = $("#edit" + commentID + ReplyID).html();
	        var editableText = $("<textarea />");
	        editableText.val(divHtml);
	        $("#edit" + commentID + ReplyID).replaceWith(editableText);
	        editableText.focus();
	        editableText.attr('id', 'val' + commentID + ReplyID);
	        editableText.attr('cols', '75');
	        // setup the blur event for this new textarea
	        var viewableText = $("<p>");
	        var keyStatus = false;
			
	        $("#val" + commentID + ReplyID).on('keydown', function (e) {
	            //e.preventDefault();
	            if (e.keyCode == 13) {
	                updateC();
				}
			});
			
	        $("#update" + commentID + ReplyID).click(function (e) {
	            updateC();
			});
			
	        function updateC() {
	            var text = $("#val" + commentID + ReplyID).val();
	            var vale = text.replace(/< br>$/, '');
	            
	            $.ajax({
	                url: '<?php echo site_url(); ?>Projects/updateReply',
	                type: 'POST',
	                data: {
	                    id: ReplyID,
	                    val: $.trim(vale),
	                    table: table
					},
	                dataType: "JSON",
	                beforeSend: function () {
	                    //console.log("Emptying");
					},
	                success: function (data, textStatus) {
	                    // console.log(data);
	                    if (data.msg == 'DONE') {
	                        viewableText.html($("#val" + commentID + ReplyID).val());
	                        viewableText.attr('id', 'edit' + commentID + ReplyID);
	                        editableText.replaceWith(viewableText);
	                        $("#TaskEdit" + commentID + ReplyID).css('display', 'block');
	                        $("#update" + commentID + ReplyID).css('display', 'none');
							} else {
	                        alert("You Can't delete this comment!!!");
	                        return false;
						}
						
					},
	                error: function (jqXHR, textStatus, errorThrown) {
	                    // Some code to debbug e.g.:               
	                    console.log(jqXHR);
	                    console.log(textStatus);
	                    console.log(errorThrown);
					}
				});
			}
			
			
		}
		
	    function editableTextBlurred() {
	        var html = $(this).val();
	        var viewableText = $("<p>");
	        viewableText.html(html);
			
	        $(this).replaceWith(viewableText);
	        // setup the click event for this new div
	        //viewableText.click(divClicked);
			
		}
		
		
	    function editComment(commentID, ReplyID, table) {
	        $("#TaskEdit" + commentID + ReplyID).css('display', 'none');
	        $("#update" + commentID + ReplyID).css('display', 'block');
	        divClicked(commentID, ReplyID, table);
		}
	</script>
	<script type="text/javascript">
	    function openBox(getId, taskID, typeID) {
	        //console.log(taskID+","+typeID);
	        var IMGURL = '<?php echo site_url(); ?>/require/dist/img';
	        var imgRep = ['data-commentid'];
	        var user_id = '<?php echo $id; ?>';
	        $.ajax({
	            url: "<?php echo site_url(); ?>Projects/replyRetrive",
	            type: "POST",
	            data: {
	                taskID: taskID,
	                typeID: typeID
					
				},
	            dataType: "json"
				}).done(function (data) {
	            //console.log("PHP Output:");
	            //console.log( data );
	            $("#" + getId + "commentList").html('');
	            if (data.allReply != false) {
	                var i = 1;
	                $.each(data.allReply, function (key, value) {
	                    var dateasd = $.datepicker.formatDate('dd M yy', new Date(data.allReply[key].date_time));
	                    //console.log(data.allReply[key].comment);
	                    //console.log(data.allReply[key].id);
	                    $.each(imgRep, function (k, v) {
	                        data.allReply[key].comment = repImgData(data.allReply[key].comment, k, v, data.allReply[key].id);
						});
	                    // if(data.allReply[key].isReply == 1){
	                    //     var margin = "margin-left: 28px;";
	                    // }else{
	                    //     margin = "margin-left: 0px;";
	                    // }
	                   	var margin = "margin-left: 0px;";
	                    var Commentstring = '<div class="item" id="item' + getId + data.allReply[key].id + '" style="'+margin+'">';
	                    Commentstring += '<div class="col-lg-1"><img src="' + IMGURL + '/' + data.allReply[key].user_img + '" alt="user image" class="online" style="width: 30px; height:30px;margin-right:13px;"></div>';
	                    
	                    Commentstring += '<div class="message-reply col-lg-11"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + data.allReply[key].user_name + '</a><p style="margin-left:2px;margin-bottom:0px;" id=edit' + getId + data.allReply[key].id + '>' + data.allReply[key].comment + '</p>';
	                    
	                    Commentstring += '<p style="margin-bottom:0px;font-size:8px;"><small id="reply' + data.allReply[key].id + '" data-name = "' + data.allReply[key].user_name + '"  data-value="' + getId + '" onclick="openReplyBox($(this).data(\'value\'),$(this).data(\'name\'))" class="pull-left" style="margin-left:0%; color: #3C8DBC; cursor: pointer;">Reply</small>';
	                    if (data.allReply[key].user_id == user_id) {
	                        Commentstring += '<small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:block;" id="TaskEdit' + getId + data.allReply[key].id + '" data-id = "' + data.allReply[key].id + '"  data-value="' + getId + '" onclick="editComment($(this).data(\'value\'),$(this).data(\'id\'),\'reply\')">Edit</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:none;" id="update' + getId + data.allReply[key].id + '" >Update</small><small style="margin-left:1%; color: #3C8DBC; cursor: pointer;" id="delete' + i + '" data-id = "' + data.allReply[key].id + '"  data-value="' + getId + '" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),\'0\',\'reply\')">Delete</small>';
						}
	                    Commentstring += '</p></div>';
	                    Commentstring += '</div>';
						
	                    $("#" + getId + "commentList").append(Commentstring);
	                    //$("#chat-box").prepend(Commentstring);
	                    i++;
					});
					
					
				}
	            $("#" + getId + "Area").toggle("slideDown");
				
			});
	        return false;
			
		}
		
	    function openReplyBox(getId, name) {
	        //console.log(getId+","+name);
	        var customName = name + ', ';
	        $("#" + getId + "comment").val(customName);
	        $("#" + getId + "isReply").val('1');
		}
		
	    function openLocation() {
	        $("#opd").html($("#loc").attr("data-project"));
	        $("#otd").html($("#loc").attr("data-task"));
	        var effect = 'slide';
	        var options = {direction: 'right'};
	        var duration = 500;
			
	        $('#openProjectTaskDiv').toggle(effect, options, duration, function(){});
		}
		
	    function drawprojectlist(projectid, projectname) {
	        tempprojectlist.push({id: projectid, name: projectname});
	        if (projectid == $("#optld-pid").val())
			$(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "<span class='pull-right'><i class='fa fa-check'></i></span></p>");
	        else
			$(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "</p>");
		}
		
	    // function drawtasklist(inputDiv, taskname) {
	    //     tempprojectlist.push({id: inputDiv, name: taskname});
	    //     $(".optld-body").append("<p onclick='taskmoveto(" + inputDiv + ", \"" + taskname + "\")'>" + taskname + "</p>");
	    // }
		
	    function openLocationList(title) {
	        if ($('#openProjectTaskListDiv').is(":visible")) {
	            $('#openProjectTaskListDiv').hide();
	            $('#openProjectTaskDiv').show();
				} else {
	            $('#openProjectTaskDiv').hide();
	            $("#optld-head").html("Select " + title);
	            if (title == "Project") {
	                $(".optld-body").html("");
	                tempprojectlist = [];
	                $.ajax({
	                    url: '<?php echo site_url(); ?>Projects/getproject',
	                    type: 'POST',
	                    dataType: "json",
	                    // beforeSend: function () {
	                    // },
	                    success: function (data) {
	                        $.each(data.projects, function (key, value) {
	                            drawprojectlist(data.projects[key].projectid, data.projects[key].projectname);
							});
						}
					});
					} else if (title == "Tasklist") {
	                $(".optld-body").html("");
	                tempprojectlist = [];
	                var tempid = $("#optld-temp-pid").val();
	                $.ajax({
	                    url: '<?php echo site_url(); ?>Projects/getTaskList',
	                    type: 'POST',
	                    data: {projectid: tempid},
	                    dataType: "json",
	                    // beforeSend: function () {
	                    // },
	                    success: function (data) {
	                        // console.log(data);
	                        $.each(data.taskList, function (key, value) {
	                            drawtasklist(data.taskList[key].inputDiv, data.taskList[key].name);
	                            // $(".optld-body").append("<p onclick='taskmoveto("+data.taskList[key].inputDiv+", \""+data.taskList[key].name+"\")'>" + data.taskList[key].name + "</p>");
							});
						}
					});
				}
	            $('#openProjectTaskListDiv').show();
	            // console.log(tempprojectlist);
			}
		}
	</script>
	<script type="text/javascript">
	    
	    function appendFile(typeid, userimg, username) {
			
	        var filename = $('#theFile').val();
	        var time = Date.now();
	        if (filename.substring(3, 11) == 'fakepath') {
	            filename = filename.substring(12);
			}
	        var imgSrc = '<?php echo site_url() . 'uploads/tempUpload/'; ?>' + time + filename;
	        var imgLink = '<img src="<?php echo site_url() . 'uploads/tempUpload/'; ?>' + time + filename + '" data-username="' + username + '" data-userimg="' + userimg + '" data-commentid="" data-typeid="' + typeid + '" data-imgage="' + imgSrc + '" onClick=\'callmodal($(this).parent().attr("id"),$(this).data("username"),$(this).data("userimg"),$(this).data("commentid"),$(this).data("typeid"),$(this).data("imgage"))\' alt="IMAGE"/>';
	        //console.log(Date.now()+filename);
	        var fd = new FormData(document.getElementById("fileinfo"));
	        fd.append('theFile', $('#theFile')[0].files[0]);
	        fd.append("time", time);
	        //console.log(fd);
	        $.ajax({
	            url: "<?php echo site_url(); ?>Projects/commentImage",
	            type: "POST",
	            data: fd,
	            enctype: 'multipart/form-data',
	            processData: false, // tell jQuery not to process the data
	            contentType: false   // tell jQuery not to set contentType
				}).done(function (data) {
	            //console.log("PHP Output:");
	            console.log( data );
	            $("#comment").html($("#comment").html() + imgLink);
	            //$("#comment2").val($("#comment2").val() + imgLink);
			});
	        return false;
			
		}
		
	    function sendReply(getId, taskID, typeID) {
	        //console.log(getId+taskID+","+typeID);
			
	        var comment = $.trim($("#" + getId + "comment").val());
	        var userID = $("#" + getId + "userID").val();
	        var userImg = $("#" + getId + "userImg").val();
	        var userName = $("#" + getId + "userName").val();
	        var isReply = $("#" + getId + "isReply").val();
			
	        //console.log(isReply);
	        var IMGURLREPLY = '<?php echo site_url(); ?>/require/dist/img';
	        var dateasd = new Date();
	        var year = dateasd.getFullYear();
	        var month = dateasd.getMonth();
	        var day = dateasd.getDate();
	        var timeSe = dateasd.getHours() + ":" + dateasd.getMinutes() + ":" + dateasd.getSeconds();
	        var date = year + "-" + month + "-" + day + " " + timeSe;
	        if (comment != "" && comment != " ") {
	            $.ajax({
	                url: '<?php echo site_url(); ?>Projects/sendReply',
	                type: 'POST',
	                data: {
	                    taskID: taskID,
	                    typeID: typeID,
	                    comment: comment,
	                    userID: userID,
	                    userImg: userImg,
	                    userName: userName,
	                    isReply:isReply
						
					},
	                dataType: "json",
	                beforeSend: function () {
	                    //console.log("Emptying");
	                    $("#" + getId + "comment").val('');
						
						
					},
	                success: function (data, textStatus) {
	                    //var dateasd = $.datepicker.formatDate('yy-mm-dd h:m:s', new Date());
	                    $("#" + getId + "isReply").val('0');
	                    // if(isReply == 1){
	                    //     var margin = "margin-left: 28px;";
	                    // }else{
	                    //     margin = "";
	                    // }
	                    var margin = "margin-left: 0px;";
	                    var Commentstring = '<div class="item" id="item' + getId + data.insertID + '" style="'+margin+'">';
	                    Commentstring += '<div class="col-lg-1"><img src="' + IMGURLREPLY + '/' + userImg + '" alt="user image" class="online" style="width:30px; height:30px;margin-right: 13px;"></div>';
	                    Commentstring += '<div class="message-reply col-lg-11"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + date + '</small>' + userName + '</a><p id=edit' + getId + data.insertID + ' style="margin-left:2px;margin-bottom:0px;">' + comment + '</p>';
	                    Commentstring += '<p style="font-size:8px;"><small id="reply' + data.insertID + '"  data-name = "' + userName + '"  data-value="' + getId + '" onclick="openReplyBox($(this).data(\'value\'),$(this).data(\'name\'))" class="pull-left" style="margin-left:0%; color: #3C8DBC; cursor: pointer;font-size: 10px;">Reply</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:block;font-size: 10px;" id="edit' + data.insertID + '" data-id = "' + data.insertID + '" data-value="' + getId + '" onclick="editComment($(this).data(\'value\'),$(this).data(\'id\'),\'reply\')">Edit</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:none;font-size: 10px;" id="update' + data.insertID + '" >Update</small><small style="margin-left:1%;margin-top: 0px; color: #3C8DBC; cursor: pointer;font-size: 10px; position: absolute;" id="delete" data-id = "' + data.insertID + '"  data-value="' + getId + '" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),\'0\',\'reply\')">Delete</small></p></div>';
	                    Commentstring += '</div>';
						
	                    $("#" + getId + "commentList").append(Commentstring);
	                    $(".commentListDiv").append(Commentstring);
						
						
						
					},
	                complete: function () {
	                    //console.log("Done");
						
					},
	                error: function (jqXHR, textStatus, errorThrown) {
	                    // Some code to debbug e.g.:               
	                    console.log(jqXHR);
	                    console.log(textStatus);
	                    console.log(errorThrown);
					}
				});
				} else {
	            bootbox.dialog({
	                message: "Empty Comment Feild!!!",
	                title: "Error Notice",
	                buttons: {
	                    success: {
	                        label: "Ok!",
	                        className: "btn-danger",
	                        callback: function () {
								
							}
						}
						
					}
				});
	            return false;
			}
			
			
			
			
		}
	</script>
	<script type="text/javascript">
		
	    
	</script>
	
	<script>
		
		var crm_users = <?php echo json_encode($users); ?>;
		var autoid = '<?php echo $autoid; ?>';
		var flag_update_filters=true;
		var todo_serial=0;
		var flag_auto_show=true;
		
		function load_todos(autostatus,order){
			
			var request = $.ajax({
				url: base_url+"todo/getMyTodos",
				method: 'POST',
				data: {
					"order": order,
				},
				dataType: 'JSON'
			});

			request.done(function(response){
				console.log('load_todos');
				console.log(response);
				
				$('#todoInsertDiv').html('');

				if($('.dropdown-change-view').find('.active a').text()=="Assignee")
					$('#AssigneeOrder').text(order);
				else $('#DueDateOrder').text(order);
				
				all_todos=response.all_todos;
				
				$.each(response.all_todos, function(k,v){
					insertNewTodo(v,'load');
					
				});
				
				$.each(response.assg_users, function(k,v){
					var newuser=''
					+'<div data-id="'+v.ID+'" class="row userwise-row margin-topdown bottom-border" style="display:none">'
					+'<div class="col-lg-12 userwise-col">'
					+v.full_name
					+'</div>'
					+'</div>';
					$('#todoInsertDiv').append(newuser);
					
				});
				
				$('.dropdown-change-view').find('.active').click();
				
				if(autostatus){
					if(autoid=="new"){
						$('#newTodoInput').focus();
					}else if(autoid !=""){

						$('.todoRow'+autoid).find('.icon-check').addClass('activeit');
						$('.todoRow'+autoid).find('.todo-text').addClass('highlight-todo');
						$('.todoRow'+autoid).find('.div-todo-name').click();
						$('.todoRow'+autoid).css('backgroundColor','lavender');
						
						$(window).scrollTop($('.todoRow'+autoid).offset().top);
						
					}
				}
				
				if(getCookie('todoID') != ""){
					//$("#todoRow"+getCookie('todoID')).addClass('blink_me');
					console.log(getCookie('todoID'));
					setCookie('todoID','',0);
					console.log(getCookie('todoID'));
				}
				
			});
		}

		load_todos(true,'DESC');
		
		var keyStatus = false;  //no need to specify the language
	    function repEmoImg(com, k, sym) {
	        // console.log(com);
	        //console.log(k);
	        //console.log(sym);
	        var path = "<?php echo base_url("require/emotion"); ?>";
	        var emotionImg = ["<img src='" + path + "/smile.png' />", "<img src='" + path + "/smile-big.png' />", "<img src='" + path + "/sad.png' />", "<img src='" + path + "/crying.png' />", "<img src='" + path + "/tongue.png' />", "<img src='" + path + "/shock.png' />", "<img src='" + path + "/angry.png' />", "<img src='" + path + "/confused.png' />", "<img src='" + path + "/wink.png' />", "<img src='" + path + "/embarrassed.png' />", "<img src='" + path + "/disapointed.png' />", "<img src='" + path + "/sick.png' />", "<img src='" + path + "/shut-mouth.png' />", "<img src='" + path + "/sleepy.png' />", "<img src='" + path + "/eyeroll.png' />", "<img src='" + path + "/thinking.png' />", "<img src='" + path + "/lying.png' />", "<img src='" + path + "/glasses-nerdy.png' />", "<img src='" + path + "/teeth.png' />", "<img src='" + path + "/angel.png' />", "<img src='" + path + "/bye.png' />", "<img src='" + path + "/clap.png' />", "<img src='" + path + "/hug-left.png' />", "<img src='" + path + "/hug-right.png' />", "<img src='" + path + "/party.png' />", "<img src='" + path + "/good.png' />", "<img src='" + path + "/bad.png' />", "<img src='" + path + "/highfive.png' />", "<img src='" + path + "/love.png' />", "<img src='" + path + "/love-over.png' />", "<img src='" + path + "/tv.png' />", "<img src='" + path + "/mail.png' />", "<img src='" + path + "/brb.png' />", "<img src='" + path + "/rain.png' />", "<img src='" + path + "/pizza.png' />", "<img src='" + path + "/coffee.png' />", "<img src='" + path + "/computer.png' />", "<img src='" + path + "/beer.png' />", "<img src='" + path + "/drink.png' />", "<img src='" + path + "/cat.png' />", "<img src='" + path + "/dog.png' />", "<img src='" + path + "/sun.png' />", "<img src='" + path + "/star.png' />", "<img src='" + path + "/clock.png' />", "<img src='" + path + "/present.png' />", "<img src='" + path + "/mobile.png' />", "<img src='" + path + "/musical-note.png' />", "<img src='" + path + "/boy.png' />", "<img src='" + path + "/girl.png' />", "<img src='" + path + "/cake.png' />", "<img src='" + path + "/car"];
	        var key = com.indexOf(sym);
	        if (key != -1)
			return com.replace(sym, emotionImg[k]);
	        else
			return com;
		}
	    function repImgData(com, k, sym, comValue) {
	        // console.log(com);
	        //console.log(k);
	        //console.log(sym);
			
	        var emotionImg = ["data-commentid='" + comValue + "'", "data-taskid='" + comValue + "'"];
	        var key = com.indexOf(sym);
	        if (key != -1)
			return com.replace(sym, emotionImg[k]);
	        else
			return com;
		}
		
		
		
	    $("#uploadFile").click(function (e) {
	        uploadFile();
		});
		function uploadFile() {
	        // patha = "<?php echo site_url(); ?>uploads/tempUpload/fileupload/";
	        
	        var patha = "https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/";
	        var IMG2URL = '<?php echo site_url(); ?>require/img/text.png';
	        var URL1 = '<?php echo site_url(); ?>require/dist/img/';
	        var dateasd = $.datepicker.formatDate('dd M yy', new Date());
	        var taskId = $("#taskID").val();
	        var typeID = $("#typeID").val();
	        var userID = $("#userID").val();
	        var UserImg = $("#userImg").val();
	        var userName = $("#userName").val();
	        var project_ID = $("#newTaskInput").attr('data-projectid');
	        var user_id = "<?php echo $id; ?>";
	        if ($('#fileinput2').val() != '') {
	            var time = Date.now();
	            var fdn = new FormData($('#fileinfo2')[0]);
	            fdn.append("time", time);
	            fdn.append("commentid", "007");
	            fdn.append("taskid2", taskId);
	            fdn.append("userName2", userName);
	            fdn.append("proID", project_ID);
	            //console.log(fdn);
				
	            $.ajax({
	                url: "<?php echo site_url(); ?>todo/fileUp",
	                type: "POST",
	                data: fdn,
	                enctype: 'multipart/form-data',
	                processData: false, // tell jQuery not to process the data
	                contentType: false   // tell jQuery not to set contentType
					}).fail(function (data,data2) {
					console.log("PHP fail:");
	                console.log( data );
	                console.log( data2 );
				})
	            .done(function (data) {
	                console.log("PHP Output:");
	                console.log( data );
	                $(".fileinput-remove").trigger('click', [true]);
					
	                
	                var design = '';
					//console.log(rsp.allFileList[k]);
					
					
	                design += '<tr class="grouprow" id="itemTASK' + data.fileID + '" rel="'+userName.split(' ').pop().toUpperCase()+'" style="border-top: 1px solid #000 !important;">';
	                
	                design +=   '<td > <img style="width: 100%;margin:17%;padding-right:35%;" src="<?php echo base_url();?>require/img/'+data.file_name.split('.').pop()+'.png" /></td>';
	                design +=   '<td class="file" name="'+userName.split(' ').pop().toUpperCase()+'" rel="'+data.file_name.split('.').pop().toUpperCase()+'"><a target="_BLANK" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/'+data.ori_name+'">'+data.ori_name+'</a></td>';
	                design +=   '<td class="uploadedBy" rel="'+userName.split(' ').pop().toUpperCase()+'">'+userName+'</td>';
	                design +=   '<td>'+data.file_size+'KB</td>';
	                design +=   '<td>'+dateasd+'</td>';
	                design +=   '<td><i style="color:#dd4b39;cursor:pointer;" class="fa fa-trash" data-id = "' + data.id + '"  data-id = "'+ data.fileID +'"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),'+data.fileID+','+data.fileID+',\'file\')"></i></td>';
	                design += '</tr>';
	                
	                $("#file-box table tbody").prepend(design);
					
					
	                //$("#file-box").prepend(fileStringNew);
	                $("#attachFile").css("display", "block");
	                $("#TaskSortTable").css("display", "block");
	                $("#uploadFile").css("display", "none");
					
	                // update counter
	                updateNotyFile(taskId,'update');
					
					//  $('#todoRow'+taskId).find('.ddm-attachment .icon-todo-menu').addClass('active-icon');
					//  if(isNaN(parseInt($('.file-badge'+taskId).text()))) $('.file-badge'+taskId).text("1")
					// else $('.file-badge'+taskId).text(parseInt($('.file-badge'+taskId).text())+1);
					
					}).error(function (data) {
	                //console.log("PHP Output:");
					
					
				});
				
			}
		}
		
	    function updateNotyFile(taskid,status){
	    	var request = $.ajax({
				
				url: base_url+"todo/updateNotyFile",
				method: 'POST',
				
				data: {
					"taskid": taskid,
					"status":status
					
				},
				//dataType: 'JSON'
			});
			
			
		}
		
	 //    function updateNotyComment(taskid,status){
	    	
	 //    	var request = $.ajax({
				
		// 		url: base_url+"todo/updateNotyComment",
		// 		method: 'POST',
				
		// 		data: {
		// 			"taskid": taskid,
		// 			"status":status
					
		// 		},
		// 		//dataType: 'JSON'
		// 	});
			
		// 	request.fail(function(response){
		// 		console.log(response);
				
				
				
		// 	});
		// }
		
	    function sendBtnAction() {
	        if ($("#pressEnter").is(":checked") == true) {
	            $(".commentSubmit").hide();
	            keyStatus = true;
				
				} else {
	            $(".commentSubmit").show();
	            keyStatus = false;
			}
		}
		
		//$(".commentSubmit").click(function (e) {
	    $("#comment").on('keydown', function (e) {
	        if (e.keyCode == 13) {
	            if (keyStatus == true) {
	                insertComment();
				}
			}
		});
		
	    $(".commentSubmit").click(function (e) {
	        if (keyStatus == false) {
	            insertComment();
			}
		});
	    function insertComment() {
	        //var patha = "<?php echo site_url(); ?>uploads/tempUpload/fileupload/";
	        var patha = "https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/";
			
	        var content = $('#comment').html();
	        var IMG2URL = '<?php echo site_url(); ?>require/img/text.png';
	        $("#comment2").val(content);
	        var taskId = $("#taskID").val();
	        var commentNO = $("#commentNO").val();
	        var typeID = $("#typeID").val();
	        var userID = $("#userID").val();
	        var UserImg = $("#userImg").val();
	        var userName = $("#userName").val();
	        var comment1 = $("#comment").text();
	        var comment2 = $("#comment2").val();
	        var comment = $('#comment').html(); //comment1 +"<br/>"+ comment2; 
	        var user_id = "<?php echo $id; ?>";
	        var user_img = "<?php echo $user_img; ?>";
	        var user_name = "<?php echo $username; ?>";
			
			
	        if (comment == "" && $('#fileinput').val() == '') {
	            bootbox.dialog({
	                message: "Comment value null",
	                title: "Dialog Box",
	                buttons: {
	                    success: {
	                        label: "Ok!",
	                        className: "btn-danger",
	                        callback: function () {
								
							}
						}
						
					}
				});
	            return false;
				
				} else if (comment == "" && $('#fileinput').val() != '') {
	            comment = "File Uploaded";
			}
	        var URL1 = '<?php echo site_url(); ?>/require/dist/img/';
	        var emotionImgSymble = [":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", "*)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\ ", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "<:o)", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(brb)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)"];
	        var imgRep = ['data-commentid=""', 'data-taskid=""'];
	        $.each(emotionImgSymble, function (k, v) {
	            comment = repEmoImg(comment, k, v);
			});
			
	        var Filestring = '<div class="item">';
	        Filestring += '<img src="' + URL1 + '/' + UserImg + '" alt="user image" class="online">';
	        Filestring += '<p class="message"><a href="#" class="name"><small class="text-muted pull-right">' + userName + '</a></p>';
	        Filestring += '<p class="message" id="fileimage"></p>';
	        Filestring += '</div>';
	        var comID = "";
	        var dateasd = $.datepicker.formatDate('dd M yy', new Date());
	        
	        $.ajax({
	            url: '<?php echo site_url(); ?>todo/sendComment',
	            type: 'POST',
	            data: {
	                taskId: taskId,
	                comment: comment,
	                UserImg: UserImg,
	                userName: userName,
	                projectID:0
				},
	            dataType: "json",
	            beforeSend: function () {
	                //console.log("Emptying");
	                //console.log(comment);
				},
	            success: function (data, textStatus) {
	            	console.log('sendComment');
	                console.log(data);
	                $.each(imgRep, function (k, v) {
	                    comment = repImgData(comment, k, v, data.msg);
					});
	                //com ='';
	                if (data.msg != "FAIL") {
	                    var string = '<div class="item itemTASK' + data.msg + '" id="itemTASK' + data.msg + '">';
	                    string += '<div class="col-lg-1"><img style="width:40px;height:40px;" src="' + URL1 + '/' + UserImg + '" alt="user image" class="online"></div>';
	                    string += '<div class="message col-lg-11" id="reply' + data.msg + '"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + userName + '</a><span id="comSet' + data.msg + '"><p style="margin-bottom: 0px;" id=editTASK' + data.msg + '>' + comment + '</p></span>';
	                    string += '<p style="font-size:10px;"><small class="responsiveReplyBtn" id="reply' + data.msg + '" data-taskid = "' + data.msg + '" data-typeid = "' + taskId + '"  data-value="reply' + data.msg + '" onclick="openBox($(this).data(\'value\'),$(this).data(\'taskid\'),$(this).data(\'typeid\'))" class="pull-left" style="    float: left;margin-left:0%; color: #3C8DBC; cursor: pointer;margin-top: 0px;">Reply</small>';
	                    string += '<span id="setDelBtn"><small id="TaskEditTASK' + data.msg + '" style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:block;" onclick="editComment(\'TASK\',' + data.msg + ',\'reply\')">Edit</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:none;" id="updateTASK' + data.msg + '" >Update</small><small style="margin-top:0px;position: relative;margin-left:1%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.msg + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),\'0\',\'modcomments\')">Delete</small></span></p></div>';
	                    string += '<div class="col-lg-12">&nbsp;</div>';
	                    string += '<div class="col-lg-12" id="reply' + data.msg + 'Area" style="display:none">';
	                    string += '<div class="col-lg-12" id="reply' + data.msg + 'commentList">';
	                    string += '</div>';
	                    string += '<div class="form-group">';
	                    string += '<div class="col-md-12">';
	                    string += '<div class="widget-area no-padding blank">';
	                    string += '<div class="status-upload">';
	                    string += '<form>';
	                    string += '<img src="' + URL1 + '/' + user_img + '"  alt="' + user_name + '" style="width: 34px;height:9%;float: left;border: 1px solid rgb(153, 200, 228);margin-top: 0%;"><textarea class="responsiveTextarea" id="reply' + data.msg + 'comment" name="replyComment" style="width: 88%;height: 34px;" placeholder="Write a comment..." ></textarea>';
	                    string += '<input type="hidden" name="userID" id="reply' + data.msg + 'userID" value="<?php echo $id; ?>">';
	                    string += '<input type="hidden" name="userImg" id="reply' + data.msg + 'userImg" value="<?php echo $user_img; ?>">';
	                    string += '<input type="hidden" name="userName" id="reply' + data.msg + 'userName" value="<?php echo $username; ?>">';
	                    string += '<input type="hidden" id="reply' + data.msg + 'isReply" class="isReply" name="isReply"  value="0">';
	                    string += '<button style="display:none;" type="button" id="reply' + data.msg + 'commentBtn" data-taskid = "' + data.msg + '" data-typeid = "' + taskId + '"  data-value="reply' + data.msg + '" onclick="sendReply($(this).data(\'value\'),$(this).data(\'taskid\'),$(this).data(\'typeid\'))" class="btn btn-success green replyComBtn"><i class="fa fa-share"></i> Comment</button>';
	                    string += '</form>';
	                    string += '</div>';
	                    string += '</div>';
	                    string += '</div>';
	                    string += '</div>';
	                    string += '</div>';
	                    string += '</div>';
						
	                    comID = data.msg;
					}
					
	                if ($('#fileinput').val() != '') {
	                    var time = Date.now();
	                    var fdn = new FormData($('#fileinfo')[0]);
	                    fdn.append("time", time);
	                    fdn.append("commentid", data.msg);
	                    fdn.append("taskid2", taskId);
	                    fdn.append("userName2", userName);
	                    fdn.append("proID", '0');
						
	                    $.ajax({
	                        url: "<?php echo site_url(); ?>todo/fileUp",
	                        type: "POST",
	                        data: fdn,
	                        enctype: 'multipart/form-data',
	                        processData: false, // tell jQuery not to process the data
	                        contentType: false   // tell jQuery not to set contentType
							}).fail(function (data,data2) {
	                    	console.log(data);
						})
	                    .done(function (data) {
	                        console.log('fileUp');
	                        console.log(data);
	                        $(".fileinput-remove").trigger('click', [true]);
							
	                        $.each(data.filelist, function (k, v) {
								
								
	                            var design = '';
								//console.log(rsp.allFileList[k]);
								
								
	                            design += '<tr class="grouprow" id="itemTASK' + comID + '" rel="'+userName.split(' ').pop().toUpperCase()+'" style="border-top: 1px solid #000 !important;">';
	                            
	                            design +=   '<td > <img style="width: 100%;margin-left: 0%;" src="<?php echo base_url();?>require/img/'+data.filelist[k].file_name.split('.').pop()+'.png" /></td>';
	                            design +=   '<td class="file" name="'+userName.split(' ').pop().toUpperCase()+'" rel="'+data.filelist[k].file_name.split('.').pop().toUpperCase()+'"><a target="_BLANK" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/'+data.filelist[k].ori_name+'">'+data.filelist[k].ori_name+'</a></td>';
	                            design +=   '<td class="uploadedBy" rel="'+userName.split(' ').pop().toUpperCase()+'">'+userName+'</td>';
	                            design +=   '<td>'+data.filelist[k].file_size+'KB</td>';
	                            design +=   '<td>'+dateasd+'</td>';
	                            
	                            design +=   '<td><i style="color:#dd4b39;cursor:pointer;" class="fa fa-trash" data-id = "' + comID + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + comID + ',\'file\')"></i></td>';
	                            
	                            design += '</tr>';
	                            
	                            $("#file-box table tbody").prepend(design);
	                            //$("#file-box").prepend(fileStringNew);
								
	                            $("#comSet" + comID).html('<p id=editTASK' + comID + '><a style="margin-left: 80px;" href="<?php echo site_url(); ?>uploads/tempUpload/fileupload/' + data.filelist[k].file_name + '" target="_BLANK"><img style="width: 15%;" src="' + IMG2URL + '" /><br/>Title: ' + data.filelist[k].name + '<br/>File Name: ' + data.filelist[k].ori_name + '<br/>File Size: ' + data.filelist[k].file_size + 'KB</a></p>');
								
	                            $("#setDelBtn").html('<small style="margin-left:1%; color: #3C8DBC; cursor: pointer;" data-id = "' + comID + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + data.filelist[k].id + ',\'file\')">Delete</small>');
								
	                            //onsole.log(data.filelist[k]);
							});
							}).error(function (data) {
	                        //console.log("PHP Output:");
							
						});
						
					}
					
	                $("#comment").html("");
	                $("#comSet").html("");
	                $("#comment2").val("");
	                $("#comment").focus();
	                $("#comment-box").append(string);
	                $("#comment-box").animate({scrollTop: $('#comment-box').prop("scrollHeight")}, 1000);
					
	                // update counter
					updateNotyCommenthd(taskId,'update');
					
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                // Some code to debbug e.g.:               
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
	        return false;
		}
		
		/////////////////////////////////////////////// Enter key press \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	    $(document).keyup(function (e) {
	        // if (e.target.name == "taskListName") {
	        //     if (e.keyCode == 13) {
	        //         var id = e.target.id;
	        //         savetaskname(id);
	        //     }
	        // }
			
	        if (e.target.name == "replyComment") {
	            if (e.keyCode == 13) {
	                var id = e.target.id;
	                $("#" + id + "Btn").trigger('click');
				}
			}
			
	        if (e.target.name == "commentFile") {
	            if (e.keyCode == 13) {
	                e.preventDefault();
	                uploadFile();
				}
			}
			
	        // if (e.target.name == "titleAdd") {
	        //     if (e.keyCode == 13) {
	        //         e.preventDefault();
	        //         var id = $("#titleAdd").data('inputid');
	        //         var name = $("#titleAdd").val();
	        //         var taskid = $("#titleAdd").data('taskid');
	        //         var inType = $("#titleAdd").data('intype');
	        //         saveTag(id,name,taskid,'label-warning','tag',inType);
	        //     }
	        // }
			
		});
		
		
		// $("#newTodoInput").on('keydown', function (e) {
		// 	var todo_name = $(this).val();
		// 	if(todo_name=="") return;
		// 	if (e.keyCode == 13) {
		
		// 		var request = $.ajax({
		// 			url: base_url+"todo/addTodoEntry",
		// 			method: 'POST',
		
		// 			data: {
		// 				"entry_name": todo_name,
		// 				"taskloc-pid":0,
		// 				"taskloc-tlid":"0000000000",
		// 				"priority":"Medium",
		// 				"start_date":moment().format("YYYY-MM-DD HH:mm:ss"),
		// 				"end_date":moment().format("YYYY-MM-DD HH:mm:ss"),
		// 				"descr":"",
		// 				"entry_type":"todo",
		// 				"reminder":"",
		// 				"entry_color":"#228B22",
		// 				"location":"",
		
		// 			},
		// 			dataType: 'JSON'
		// 		});
		
		// 		request.done(function(response){
		// 			console.log(response);
		
		// 		 	insertNewTodo(response[0],'new');
		// 		 	$('#newTodoInput').val('');
		
		// 		 });
		
		// 	}
		// });

		function searchTodo(todo_name,_this){
			if($(_this).val() == ""){
						
						$('.dropdown-change-view').find('.active').click();
					}else{
						// Due date search
						if($('.dropdown-change-view').find('.active a').text()=="By Due Date"){
							$('.datewise-row').hide();

							$('.dd-parent').each(function(k,v){

									if($(v).find('.todo-text').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){

										$(v).prevAll('.datewise-row:first').show();
										$(v).show('slow');
									}else{
										$(v).hide('slow');
									}

								});

						}else if($('.dropdown-change-view').find('.active a').text()=='Incomplete'){

							// $('#DueDateSpan').show();
							// $('.ddm-calview').hide();
							$('.datewise-row').hide();
							// $('.userwise-row').hide();
							// $('.dd-parent-user').remove();

							$(".dt-todostatus").each(function(i,el){
								
								if($(el).text()=='completed'){
									$(el).closest('.dd-parent').hide();
								}
								else{

									if($(el).closest('.dd-parent').find('.todo-text').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
										$(el).closest('.dd-parent').show();
										$('.datewise-row[data-datetext="'+$(el).closest('.dd-parent').attr('data-datetext')+'"]').show();
									}else{
										$(el).closest('.dd-parent').hide();
									}
								}
							});

						}else if($('.dropdown-change-view').find('.active a').text() == 'Completed'){
							$('.datewise-row').hide();
						
							
							$(".dt-todostatus").each(function(i,el){
								
								if($(el).text() =='completed'){
									if($(el).closest('.dd-parent').find('.todo-text').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
										$(el).closest('.dd-parent').show();
										$('.datewise-row[data-datetext="'+$(el).closest('.dd-parent').attr('data-datetext')+'"]').show();
									}else{
										$(el).closest('.dd-parent').hide();
									}
								}
								else{
									$(el).closest('.dd-parent').hide();
									
								}
							});
							
							
							} else if($('.dropdown-change-view').find('.active a').text() == 'Assignee'){

								
								$('.userwise-row').hide();
								
								
								$('.dd-parent-user').each(function(k,v){
									
									if($(v).find('.todo-text').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){

										$(v).prevAll('.userwise-row:first').show();
										$(v).show('slow');
									}else{
										$(v).hide('slow');
									}

								});
								
							}

					}
		}

			$("#search-fld").on('keydown', function (e) {
				var todo_name = $(this).val();
				var _this=this;
				if (e.keyCode == 13) {
					if($("#search-fld").hasClass('todo')){
				
					searchTodo(todo_name,_this);

				}
				}
			});


		$("#newTodoInput").on('keydown', function (e) {
			var todo_name = $(this).val();
			var _this=this;
			
			if (e.keyCode == 13) {

				if($("#newTodoInput").hasClass('todo-searchmode')){
				
					searchTodo(todo_name,_this);

				}else{

					if(todo_name=="") return;

					var request = $.ajax({
						url: base_url+"todo/addTodoEntryHD",
						method: 'POST',
						
						data: {
							entry_name: todo_name,
							pid: 0
						},
						dataType: 'JSON'
					});
					
					request.done(function(response){
						console.log(response);
						
						insertNewTodo(response[0],'new');
						$('#newTodoInput').val('');
						
					});
					
					request.fail(function(response){
						console.log(response);
						
						
						
					});
				}
				
			}
		});
		
		function fun_close_dropdown(dd_serial){
			
			$('*').qtip('hide');
		}
		function fun_open_dropdown(dd_serial){
			$('.dropdown').removeClass('open');
			$('#dd_div_'+dd_serial).addClass("open");
			
		};
		
		
		// $( document ).on( "click", "ul.add-border", function(e) {
		// 	console.log('e.target>add-border');console.log(e.target);
		// 	if($(e.target).hasClass("close-da-picker") || $(e.target).hasClass("btn-picker-remove") || $(e.target).hasClass("btn-picker-add")){
		
		// 		}else{
		
		// 		e.stopPropagation();
		// 	}
		// });
		
		// $( document ).on( "click", ".popover", function(e) {
		// 	console.log('e.target>popover');console.log(e.target);
		// 	if($(e.target).hasClass("close-da-picker")){
		
		// 		}else{
		
		// 		e.stopPropagation();
		// 	}
		// });
		
		
		
		function propertiesLoadTask(data) {
			
			console.log(data.dataList);
			//console.log(data.dataList[0].proCurSta);
			
			$("#adminTask").html("");
			$("#memberTask").html("");
			$("#assignToMemberTask").html("");
			
			$("#adminTask").append('<option value="'+user_id+'">'+user_name+'</option>');
			$("#memberTask").append('<option value="#addnew">Invite new people +</option>');
			$("#assignToMemberTask").append('<option value="#addnew">Invite new people +</option>');
			
			// $.each(selectArray, function (key, value) {
			//     var name = value.full_name;
			//     $("#memberTask").append('<option value="' + value.ID + '">' + name + '</option>');
			// });
			
			$.each(selectArray, function (key, value) {
				var name = value.full_name;
				$("#adminTask").append('<option value="' + value.ID + '">' + name + '</option>');
				
				$("#memberTask").append('<option value="' + value.ID + '">' + name + '</option>');
				$("#assignToMemberTask").append('<option value="' + value.ID + '" >' + name + '</option>');
			});
			
			$("#adminTask option:selected").removeAttr("selected");
			$(".select2_multiple30 option:selected").removeAttr("selected");
			$(".select2_multiple20 option:selected").removeAttr("selected");
			$(".select2_multiple1 option:selected").removeAttr("selected");
			$(".select2_multiple2 option:selected").removeAttr("selected");
			$(".select2_multiple3 option:selected").removeAttr("selected");
			
			if (data.dataList[0].checked == "YES") {
				$("#chkchangetaskstatus").prop("checked", true);
			}
			
			$("#chkchangetaskstatus").attr("data-taskid", data.dataList[0].projecttaskid);
			$("#chkchangetaskstatus").attr("data-taskdivid", data.dataList[0].tasklistID);
			
			$("#togPopTitle").html(data.dataList[0].projecttaskname);
			$("#datetimepicker7Task").val(data.dataList[0].startdate);
			$("#datetimepicker8Task").val(data.dataList[0].enddate);
			//$("#togPopTime").html(data.proDetail.projectname);
			// console.log(data.tag);
			
			// $.each(data.tag, function (key, value) {
			//     if(data.tag[key].user_status == 0)
			//         $('#assignToMemberTask option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
			// });
			
			// $("#assignToMemberTask").trigger("change", [true]);
			
			$('#adminTask option[value="' + data.dataList[0].display_userid + '"]').prop("selected", "selected").trigger("change", [true]);
			
			$.each(data.tag, function (key, value) {
				
				if(data.tag[key].user_status == 1)
                $('.select2_multiple30 option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
			});
			$(".select2_multiple30").trigger("change", [true]);
			
			// $.each(data.tag, function (key, value) {
			//     $("#assMembers").append('<button class="btn btn-block btn-default">' + data.tag[key].display_name + ' <i class="fa fa-close pull-right"></i></button>');
			//     $('.select2_multiple1 option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
			// });
			
			$.each(data.tasktag, function (key, value) {
				$('.select2_multiple2 option[value="' + data.tasktag[key].tag + '"]').prop("selected", "selected");
			});
			
			$.each(data.tagFollow, function (key, value) {
				
				$('.select2_multiple3 option[value="' + data.tagFollow[key].ID + '"]').prop("selected", "selected");
			});
			
			$(".select2_multiple1").trigger("change", [true]);
			$(".select2_multiple2").trigger("change", [true]);
			$(".select2_multiple3").trigger("change", [true]);
			
			$('#projectstatus option[value="' + data.dataList[0].projectstatus + '"]').attr("selected", "selected");
			$('#projecttasktype option[value="' + data.dataList[0].projecttasktype + '"]').attr("selected", "selected");
			
			// doesnot select correctly :
			//$('#projecttaskprogress option[value="' + data.dataList[0].projecttaskprogress + '"]').attr("selected", "selected");
			$('#projecttaskprogress').val(Number(data.dataList[0].projecttaskprogress)); // fixed by sujon
			$('#ticketpriorities option[value="' + data.dataList[0].projecttaskpriority + '"]').attr("selected", "selected");
			
			$("#taskdescription").text(data.dataList[0].description);
			$("#workhour").val(data.dataList[0].projecttaskhours);
			$("#label").val(data.dataList[0].label);
			$("#label").css('background-color', data.dataList[0].label);
			$("#projecteidTask").val(data.dataList[0].projectid);
			$("#this_type").val(data.dataList[0].this_type);
			
			
		}
		
		$(".select2_multiple30").select2({
			maximumSelectionLength: 10,
			placeholder: "Add assignees",
			allowClear: true
		});
		
		$("#adminTask").select2({
			readonly: true
			//maximumSelectionLength: 1,
			//placeholder: "Admin",
			//allowClear: true
		});
		
		$(".select2_multiple2").select2({
			maximumSelectionLength: 10,
			allowClear: true
		});
		
		$(".select2_multiple3").select2({
			maximumSelectionLength: 10,
			placeholder: "Add project Administrator/Supervisor/Co-ordinator",
			allowClear: true
		});
		
		$(".select2_multiple20").select2({
			maximumSelectionLength: 10,
			placeholder: "Add project Administrator/Supervisor/Co-ordinator",
			allowClear: true
		});
		
		$(".select2_multiple20").on("select2:select", function (evt) {
			var element = evt.params.data.element;
			var $element = $(element);
			
			$element.detach();
			$(this).append($element);
			$(this).trigger("change");
		});
		
		$(".select2_multiple").select2({
			maximumSelectionLength: 10,
			placeholder: "Add People who are involved in this project",
			allowClear: true,
			tags: true
		});
		
		function openSettingsTab(taskID, param = false) {
			
			var winsize = window.innerHeight;
			var projectID=0;
        	
        	taskdataid = taskID;
        	tasklistdataid= "0000000000";
        	
        	
        	if(winsize < 500){
            	alert("Your browser height is too low to display this settings");
				}else{
	            var effect = 'slide';
	            // console.log(taskID+","+taskListID);
	            var options = {direction: 'right'};
	            var duration = 500;
	            var projectID = $("#newTaskInput").attr('data-projectid');
	            //user_id = "<?php //echo $id; ?>";
	            
	            // if(user_id==pro_creatorid) get_status=1;
	            // else 
	            var get_status=0;
				
	            $.ajax({
	                url: '<?php echo site_url(); ?>todo/taskDetail',
	                type: 'POST',
	                data: {
	                    taskID: taskID,
	                    taskLsitID: "0000000000",
	                    projectID: 0,
	                    get_status:get_status,
	                    user_id:user_id,
	                    taskType:'Cat'
					},
	                dataType: "json",
	                beforeSend: function () {
	                    //console.log("Emptying");
	                    $("#togPopH").val("");
	                    $("#tasknametitle").val("");
	                    $("#assMembers").html("");
	                    $("#item_details").hide();
					},
	                success: function (data, textStatus) {
	                    
	                    console.log("::::::::::FULL TASK DETAILS::::::::");
	                    console.log(data);
						
						
	                    propertiesLoadTask(data);
	                    // taskQuoteListLoad(data);
	                    // taskInvoiceListLoad(data);
	                    ajaxTaskDetail(taskID, projectID);
						
	                    
	                    var projectName = $("#pronameSpan").text();
						var loc = projectName + " >> Default";
	                    
	                    $("#togPopH").val(data.dataList[0].projecttaskname);
	                    $("#tasknametitle").val(data.dataList[0].projecttaskname);
	                    $("#createdbyname").html(data.dataList[0].display_name);
	                    
	                    if (data.dataList[0].checked == "YES") {
	                        $("#chkchangetaskstatus").prop("checked", true);
						}
	                    
						
	                    $("#projecteid").val(projectID);
	                    $("#taskListID").val(taskListID);
	                    $("#optld-tlid").val(taskListID);
	                    $("#taskID").val(taskID);
						
						
	                    $("#loc").html(loc);
	                    $("#loc").attr("data-project", projectName);
	                    $("#loc").attr("data-task", "Default");
	                    $("#chkchangetaskstatus").attr("data-taskid", taskID);
	                    $("#chkchangetaskstatus").attr("data-taskdivid", taskListID);
	                    $('#taskMyDiv').toggle(effect, options, duration, function(){
	                        $(this).find('#description').focus();
						});
						
	                    if(param == 'chat'){
							$('.nav-tabs a[href="#tab_2T"]').tab('show');
							// reset counter 
							
							updateNotyCommenthd(taskID,'reset');
							$('.comment-badge'+taskID).text('');
							$('.comment-badge'+taskID).next().removeClass('active-icon');
							
							
							}else if(param == 'file'){
							$('.nav-tabs a[href="#tab_3T"]').tab('show');
							// reset counter 
							updateNotyFile(taskID,'reset');
							$('.file-badge'+taskID).text('');
							$('.file-badge'+taskID).next().removeClass('active-icon');
							}else if(param == 'property'){
							$('.nav-tabs a[href="#tab_1T"]').tab('show');
						}
						
	                    if(winsize>930) var mydivbodysize = "676";
	                    else var mydivbodysize = (winsize - 254);
	                    
	                    $("#taskMyDiv .row .box-body").css("height",mydivbodysize);
						
						
					},
	                error: function (jqXHR, textStatus, errorThrown) {
	                    // Some code to debbug e.g.:               
	                    console.log(jqXHR);
	                    console.log(textStatus);
	                    console.log(errorThrown);
					}
				});
				return false;
			}
			
			
		}
		
		function openAttachmentTab() {
			
			var effect = 'slide';
	        var options = {direction: 'right'};
	        var duration = 500;
			$('#taskMyDiv').toggle(effect, options, duration, function(){
				$(this).find('#description').focus();
			});
			$('.nav-tabs a[href="#tab_3T"]').tab('show');
		}
		function offMDiv() {
	        
	        if ($("#feedDiv").is(':visible')) {
	            toggleDiv();
			}
			
	        var effect = 'slide';
	        var options = {direction: 'right'};
	        var duration = 500;
	        $('#taskMyDiv').toggle(effect, options, duration);
	        $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
	        $("#Blink").hide();
			
		}
		
	    function delCalendaralarm(serial){
			
	    	var requestass = $.ajax({
	    		url: base_url+"todo/delUserTodoAlarm",
	    		method: 'POST',
	    		data: {
					
	    			"serial":serial
					
				},
	    		dataType: 'JSON'
			});
	    	requestass.done(function(response){
	    		$('.todoRow'+serial).find('.chk-prioalarm').prop('checked',false);
	    		console.log(response)
			});
	    	requestass.fail(function(response){
	    		console.log(response)
			});
			
		}
		
	    function gotoCalendaralarm(serial,element){
			
	    	if($(element).closest('.alarmpickerDiv').find('.sel-repeat-alarm').val()=='repeat'){
				
				var requestass = $.ajax({
					url: base_url+"todo/getUserTodoByID",
					method: 'POST',
					data: {
						
						"serial":serial
						
					},
					dataType: 'JSON'
				});
				
				requestass.done(function(response){
					console.log('getUserTodoByID');
					console.log(response);
					var data = response[0];
					console.log('edit_calendar');console.log(data);
					//if (data.group_id == null) {
						if (data.tag_ids != null)
						$("#select_user_new").val(data.tag_ids.split(',')).trigger('change');
						
						$("#assign_to_group").hide("slow");
						$("#assign_to_user").show("slow");
					// 	} else {
					// 	$("#assign_to_group").show("slow");
					// 	$("#assign_to_user").hide("slow");
					// }
					$('#myModalLabel').text("Update");
					$('#submit_full_form').text("Update");
					$("#antoform").attr("action", "<?php echo site_url('calendar/updateCalendar'); ?>");
					$('#calendar_id').val(data.cal_id);
					$('#parent_id_event').val(data.cal_id);
					$('#parent_id_todo').val(data.cal_id);
					$('#entryname').val(data.title);
					$('#location').val(data.location);
					$('#descr').val(data.description);
					$('#entry_color_new').val(data.backgroundColor);
					$('#datetimepicker_start').val(moment(data.start).format("YYYY-MM-DD HH:mm:ss"));
					//if (data.end != null){
					//alert(data.end_date);
					$('#datetimepicker_end').val(moment(data.end).subtract(9, 'hours').format('YYYY-MM-DD HH:mm:ss'));
					flat_startdate.setDate($("#datetimepicker_start").val());
					flat_enddate.setDate($("#datetimepicker_end").val());
					
					$('input[name="entry_type"][value="' + data.type + '"]').prop('checked', true);
					$('input[name="priority"][value="' + data.priority + '"]').prop('checked', true);
					if (data.group_id == null) {
						$('input[name="assign_new"][value="Individual"]').prop('checked', true);
						} else {
						$('input[name="assign_new"][value="Group"]').prop('checked', true);
					}
					
					// var alarm_type = jQuery.parseJSON( data.alarm_type );
					// console.log( alarm_type );
					var alarm_types, alarm_repeats, alarm_options;
					$('#sel_alarm_action').empty();
					if (data.alarm_type != null) {
						alarm_types = data.alarm_type.split(';');
						if (data.alarm_repeat != null) {
							alarm_repeats = data.alarm_repeat.split(';');
						}
						if (data.alarm_option != null) {
							alarm_options = data.alarm_option.split(String.fromCharCode(0x1D));
						}
						$.each(alarm_types, function (i, val) {
							//alert(alarm_types [i]); 
							if (alarm_types[i] != null) {
								var alarm_parts = alarm_types[i].split(',');
								// display type details
								var str;
								if (alarm_parts[0] == "popup")
								str = "Popup an alert ";
								if (alarm_parts[0] == "mail")
								str = "Send a mail ";
								if (alarm_parts[0] == "call")
								str = "Call a number ";
								if (alarm_parts[0] == "sound")
								str = "Play a sound ";
								str += alarm_parts[1] + " ";
								str += alarm_parts[2] + " ";
								str += alarm_parts[3] + " ";
								if (alarm_parts[4] == "startof")
								str += "start of appointment";
								if (alarm_parts[4] == "endof")
								str += "end of appointment";
							}
							//if(alarm_repeats != null){var repeat_parts = alarm_repeats[i].split(',');}
							var hash = {};
							if (data.alarm_type != null)
							hash['type'] = alarm_types[i];
							if (data.alarm_repeat != null)
							hash['repeat'] = alarm_repeats[i];
							if (data.alarm_option != null)
							hash['option'] = alarm_options[i];
							var json_val = JSON.stringify(hash);
							$('#sel_alarm_action')
							.append($("<option></option>")
							.attr("value", json_val)
							.text(str));
						});
						if (alarm_types.length > 1) {
							$('#sel_alarm').val('custom');
							$('#btn_alarm_add').prop('disabled', false);
							} else {
							$('#btn_alarm_add').prop('disabled', true);
							if (alarm_types[0] == "popup,15,minutes,before,startof") {
								$("#sel_alarm").val("15 minutes");
							}
							else if (alarm_types[0] == "popup,1,hours,before,startof") {
								$("#sel_alarm").val("1 hour");
							}
							else if (alarm_types[0] == "popup,1,days,before,startof") {
								$("#sel_alarm").val("1 day");
							}
							else {
								$("#sel_alarm").val("custom");
								$('#btn_alarm_add').prop('disabled', false);
							}
						}
					}
					if (data.recur_type != null) {
						$('#chk_recurs').prop("checked", true);
						$('#div_recurs *').prop('disabled', false);
						$('#btn_recur_add').prop('disabled', false);
						$('#input_recur_every').val(data.recur_every);
						$('#sel_recur_pattern').val(data.recur_pattern);
						$('#recur_fuf').val(data.recur_type);
						if (data.recur_type == "recur_for") {
							$('#input_recur_occur').val(data.recur_occur);
							$('#div_recur_for').show();
							$('#div_recur_until').hide();
						}
						if (data.recur_type == "recur_until") {
							
							$('#datetimepicker_recur').val(data.recur_until);
							$('#div_recur_for').hide();
							$('#div_recur_until').show();
						}
						$('#sel_recur_exception').empty();
						if (data.recur_exceptions != null) {
							var recur_execptions = data.recur_exceptions.split(';');
							$.each(recur_execptions, function (i, val) {
								
								$('#sel_recur_exception')
								.append($("<option></option>")
								.attr("value", val)
								.text(val));
							});
						}
						} else {
						$('#chk_recurs').prop("checked", false);
						$('#div_recurs *').prop('disabled', true);
						$('#btn_recur_add').prop('disabled', true);
					}
					
					if (data.guests != null){
						if (!!data.guests){
							
							var guests_data=data.guests.split(',');
							$("#select_guests").val(guests_data).trigger('change');
							
							//  $.each(guests_data,function(number,guest){
							//     var newState = new Option(guest, guest, true, true);
							
							//     $("#select_guests").append(newState).trigger('change');
							// });
						}
					}
					//console.log('edit data');
					//console.log(data);
					if(data.this_type=='task'){
						$('#divTaskAss').show();
						$('#divEventTodoAss').hide();
						
						var arrSuper=[];var arrMember=[];var arrFollowers=[];
						
						if(data.task_tags !=null){
							var task_tags=data.task_tags.split(',');
							
							$.each(task_tags,function(i,v){
								var tags=v.split('-');
								if(tags[1]=="0"){
									arrSuper.push(tags[0]);
									}else{
									arrMember.push(tags[0]);
								}
							});
						}
						if(data.task_followers !=null){
							arrFollowers=data.task_followers.split(',');
						}
						$('#assignToMemberTask').val(arrSuper).trigger('change');
						$('#memberTask').val(arrMember).trigger('change');
						$('#followersTask').val(arrFollowers).trigger('change');
						
						}else{
						$('#divTaskAss').hide();
						$('#divEventTodoAss').show();
					}
					$('#fc_create').click();
					$('.nav-tabs a[href="#tab_alarm"]').tab('show');
				});
				}else{

					 $.ajax({
	            url: '<?php echo site_url(); ?>todo/insertAlarm',
	            type: 'POST',
	            data: {
	                "serial": serial,
	                
				},
	            dataType: "JSON",
	            beforeSend: function () {
	                //console.log(modcomID + ":" + commentID);
				},
	            success: function (data, textStatus) {
	               $('*').qtip('hide');
					
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                // Some code to debbug e.g.:               
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
				
			}
			
	    	//window.location.href = base_url+"calendar/calendarview/"+serial+"/alarm";
		}
		
	    function chk_prioalarm(element){
	    	
	    	if(element.checked){
	    		$(element).closest('.alarmpickerDiv').find('.btn-picker-add').removeAttr('disabled');
		    	
				}else{
		    	$(element).closest('.alarmpickerDiv').find('.btn-picker-add').attr('disabled','disabled');
			}
		}
		
		
		
		
		function insertNewTodo(data,status){
			
			console.log('load NewTodo');
			console.log(data);
			
			var todo_serial=data.Id;
			var duedate=data.Enddate;
			var curdatetime=moment(duedate).format('MMM D hh:mm a');
			var curtime=moment(duedate).format('H:mm');
			var datetext= moment(duedate).format('MMM D, YYYY');
			var todo_name=data.Title;
			var todo_status=data.Status;
			var tag_ids='',mem_ids='';
			var nty_chat=0;
			var nty_file=0;
			var nowid=$.now();
			
			if((data.CreatedBy != user_id) && (Number(data.status_chat)>0)  )
			nty_chat=Number(data.status_chat);
			
			if((data.CreatedBy != user_id) && (Number(data.status_attach)>0)  )
			nty_file=Number(data.status_attach);
			
			
			if(data.tag_ids != undefined) tag_ids=data.tag_ids;
			if(data.mem_ids != undefined) mem_ids=data.mem_ids;
			
			var newtodo='<div data-first="'+todo_name.toLowerCase().charCodeAt(0)+'" data-datetext="'+datetext+'" data-status="'+todo_status.toLowerCase()+'" data-serial="'+todo_serial+'" class="todoRow'+todo_serial+' dd-parent row margin-topdown bottom-border">'
			
			+'<div class="col-lg-1 col-sm-1 col-md-1 div-todo-check">'
			+	'<input class="chk-complete" type="checkbox">'
			+'</div>'
			
			+'<div class="col-lg-4 col-sm-4 col-md-4 div-todo-name">'
			+	'<span title="'+data.Description+'" class="todo-text">'+todo_name+'</span>'
			+'</div>'
			
			+'<div id="dd_div_'+todo_serial+'" class="col-lg-2 col-sm-2 col-md-2 dropdown">'
			+	'<li class="ddm-duecalendar" style="display:inline">'
			+	'<a id="" data-time="'+curtime+'"  class="dropdown-toggle dd-link dd_duedate_text_'+todo_serial+'">Due: '+curdatetime+'</a>'
			
			
			+'</li>'
			+'</div>'
			
			+'<div class="col-lg-2 col-sm-2 col-md-2">'
			+'<li class="ddm-duecalendar" style="display:inline">'
			+'<span id="" data-type="'+data.Type+'" data-serial="'+todo_serial+'" data-status="'+todo_status+'" class="link_status_text'+todo_serial+'  dt-todostatus">'+todo_status+'</span>'
			
			+'</li>'
			
			
			+'</div>'
			
			+'<div class="col-lg-3 col-sm-3 col-md-3">'
			+	'<div class="pull-left">'
			
			
			+'<li class="ddm-assignto" style="display:inline">'
			+		'<a data-serial="'+todo_serial+'" data-memid="'+mem_ids+'" data-assid="'+tag_ids+'"  class="dropdown-toggle dt-assignto">'
			
			+			'<img class="icon-todo-menu icon-assignto" src="">'
			+		'</a>'
			
			+	'</li>'
			
			+'<li class="ddm-settings" style="display:inline">'
			+		'<a>'
			+'	<span class="notify-badge comment-badge'+todo_serial+'">'+(nty_chat>0 ? nty_chat : '')+'</span>'
			+		'<img class="dt-comments icon-todo-menu '+(nty_chat>0 ? 'active-icon' : '')+'" src="<?php echo base_url(); ?>icons/Chat.png">'
			//+		'<span class="badge">7</span>'
			+		'</a>'
			+	'</li>'
			
			+'<li class="ddm-priority" style="display:inline">'
			+		'<a data-serial="'+todo_serial+'" class="dropdown-toggle dt-priority">'
			
			+			'<img class="icon-todo-menu" src="<?php echo base_url(); ?>icons/Flag.png">'
			+		'</a>'
			+	'</li>'
			
			+'<li class="ddm-attachment" style="display:inline">'
			+		'<a >'
			+'	<span class="notify-badge file-badge'+todo_serial+'">'+(nty_file>0 ? nty_file : '')+'</span>'
			+			'<img id="att'+nowid+'" data-now='+nowid+' class="icon-todo-menu qtip-attach'+todo_serial+' '+(nty_file>0 ? 'active-icon' : '')+'" src="<?php echo base_url(); ?>icons/Add File.png">'
			+		'</a>'
			
			+	'</li>'
			
			+'<li class="ddm-delete" style="display:inline">'
			+		'<a class="cls-deltodo" onclick="fun_delTodo('+todo_serial+',2)" >'
			+		'<img  class="icon-todo-menu" src="<?php echo base_url(); ?>icons/Trash.png">'
			+		'</a>'
			+	'</li>'
			
			+	'</div>'
			
			
			+	'<div class="pull-right">'
			
			+'<li class="workspace4" style="display:none">'
			+		'<a data-serial="'+todo_serial+'"  class="dropdown-toggle dt-category">'
			
			+			'<i data-catid="'+data.id+'" class="fa fa-circle fa-category-gray catid'+data.id+'" style="color:'+data.cat_color+'"></i>'
			+		'</a>' 
			
			+	'</li>'
			
			
			+	'</div>'
			
			+'</div>'
			
			
			+'</div>';
			
			newtodo=$(newtodo);
			
			if(Number(data.mem_ids)>0) newtodo.find('.ddm-assignto .icon-todo-menu').addClass('active-icon');
			
			if(data.Checked=="YES"){
				//newtodo.find('.chk-complete').attr('checked','checked');
				newtodo.find('.chk-complete').iCheck('check');
				newtodo.find('.dt-todostatus').text('completed');
			}
			var newdatetext=moment(duedate).format('MMM D, YYYY');
			var newdate=''
			+'<div class="row datewise-row margin-topdown bottom-border">'
			+'<div data-order="ASC" onclick="sortByName(\''+newdatetext+'\',this)" class="col-lg-2">'
			+ '<i class="fa"></i>Title'
			+'</div>'

			+'<div class="col-lg-7 datewise-col">'
			+ newdatetext
			+'</div>'
			+'</div>';
			
			if(status=='load'){
				console.log($('.datewise-col:last'));
				if($('.datewise-col:last').html() != moment(duedate).format('MMM D, YYYY'))
				$('#todoInsertDiv').append(newdate);
				
				$('#todoInsertDiv').append(newtodo);
  				}else{
				var sts=false;
				$('.datewise-col').each(function(i,v){
					if($(v).html()==moment(duedate).format('MMM D, YYYY')){
						$(v).closest('.row').after(newtodo);
						sts=true;
						return false;
					}
				});
				if(sts==false){
					$('#todoInsertDiv').prepend(newtodo);
					$('#todoInsertDiv').prepend(newdate);
				}
			}
			
			newtodo.find('.chk-complete').iCheck({
				checkboxClass: 'iradio_square-blue',
				
				//increaseArea: '20%' // optional
				}).on('ifChanged', function(event){ 
				var serial=$(this).closest('.dd-parent').attr('data-serial');
				var status="NO"; if($(this).is(':checked')) status="YES";
				
				change_completeStatus(serial,status);
			});
			
			//if(user_id==data.opened_by){
			newtodo.find('.chk-complete').iCheck('enable');
			
			newtodo.find('.dt-category').click(function(){
				qtipCategory(this,data.Id);
			});
			
			newtodo.find('.dt-assignto').click(function(){
				qtipAssignee(this,data,crm_users,'Todo');
			});
			
			
				newtodo.find('.dt-priority').click(function(){
				
				qtipPriority(this,data.Id);
			});
			// console.log('todo_status');
			// console.log(todo_status);
			if(data.Priority=="Low")	newtodo.find('.dt-priority img').addClass('active-icon-low');
			if(data.Priority=="Medium")	newtodo.find('.dt-priority img').addClass('active-icon-medium');
			if(data.Priority=="High")	newtodo.find('.dt-priority img').addClass('active-icon-high');
			
			if(Number(data.mem_ids)>1) $('.dt-assignto[data-serial="'+todo_serial+'"] img').attr('src',base_url+"icons/gi32.png");
			else $('.dt-assignto[data-serial="'+todo_serial+'"] img').attr('src',base_url+"icons/Profile.png");
			
			$('.todoRow'+todo_serial).attr('data-access','write');
			
			//}else{
			//newtodo.find('.dd-link').removeAttr('data-toggle');
			//newtodo.find('.chk-complete').iCheck('disable');
			//$('.todoRow'+todo_serial).attr('data-access','read');
			//newtodo.find('.cls-deltodo').prop( "onclick", null );
			//}
			
			newtodo.find('.dt-todostatus').click(function(){
				qtipStatus(this,data);
			});

			newtodo.find('.ddm-assignto').mouseenter(function(){
				
				qtipAssignHover(this,data.Id);
			});


//			qtipAssignHover(newtodo.find('.ddm-assignto'),data.Id);

			newtodo.find('.ddm-priority .icon-todo-menu').mouseenter(function(){
				
				qtipPriorityHover(this,data.Id);
			});

			//qtipPriorityHover(newtodo.find('.ddm-priority .icon-todo-menu'),data.Id);

			newtodo.find('.div-todo-name').mouseenter(function(){
			
				qtipDescriptionHover(this,data.Id);
			});

			newtodo.find('.todo-text').click(function(){
				qtipProperties(this,data,'Todo');
				
			});

			//qtipAttach(newtodo.find('.ddm-attachment .icon-todo-menu'),data);
			
			newtodo.find('#att'+nowid).click(function(){
				qtipAttachTodo(this,data);
			});
			
			newtodo.find('.dt-comments').click(function(event){
				qtipCommentTodo(this,data,event);
			});
			
			

			//qtipProperties(newtodo.find('.div-todo-name'),data.Id,data.HasParentId,'Todo');

			newtodo.find('.dd-link').click(function(){
				qtipDueCalendar(this,data);
				
			});
			
			// qtipDueCalendar(newtodo.find('.dd-link'),data);
			
		}
		
		
		$('ul.dropdown-change-view li').click(function(e) 
		{ 
			$('#DueDateText').text($(this).text());
			
			$('.dropdown-change-view li').removeClass('active');
			$(this).addClass('active');
			
			if($(this).text() == 'Completed'){
				$('.datewise-row').hide();
				$('.userwise-row').hide();
				$('#DueDateSpan').show();
				$('.ddm-calview').hide();
				$('.dd-parent-user').remove();
				
				$(".dt-todostatus").each(function(i,el){
					
					if($(el).text() =='completed'){
						$(el).closest('.dd-parent').show();
						$('.datewise-row[data-datetext="'+$(el).closest('.dd-parent').attr('data-datetext')+'"]').show();
					}
					else{
						$(el).closest('.dd-parent').hide();
						//$(el).closest('.dd-parent').prev().hide('slow');
					}
				});
				
				//$('.chk-complete').iCheck('update');
				
				}else if($(this).text()=='Incomplete'){
				
				$('#DueDateSpan').show();
				$('.ddm-calview').hide();
				$('.datewise-row').hide();
				$('.userwise-row').hide();
				$('.dd-parent-user').remove();
				
				$(".dt-todostatus").each(function(i,el){
					
					if($(el).text()=='completed'){
						$(el).closest('.dd-parent').hide();
					}
					else{
						$(el).closest('.dd-parent').show();
						$('.datewise-row[data-datetext="'+$(el).closest('.dd-parent').attr('data-datetext')+'"]').show();
					}
				});
				
				
				
				}else if($(this).text()=='Assignee'){
				// $('.qtip').qtip('destroy', true);
				$('.datewise-row').hide();
				$('.userwise-row').hide();
				$('#DueDateSpan').hide();
				$('.ddm-calview').show();
				$('.chk_ass_filter').prop('checked' , false);
				
				$('.dd-parent').hide();
				$('.dd-parent-user').remove();
				
				$('.dt-assignto').each(function(i,ass_usr){
					
					if($(ass_usr).attr('data-assid')==""){
						
						}else{
						var arrAss=$(ass_usr).attr('data-assid').split(',');
						//console.log('arrAss');console.log(arrAss);
						// loop each assign users
						$.each(arrAss, function(k,v){
							console.log('check ass');
							console.log(v);
							$('.userwise-row[data-id="'+v+'"]').show();

							var newtodo=$(ass_usr).closest('.dd-parent').clone(true,true);
							var serial=$(ass_usr).closest('.dd-parent').attr('data-serial');
							newtodo=$(newtodo).removeAttr("style").show().addClass('dd-parent-user');
							
							newtodo.find('.chk-complete').iCheck('destroy');
							
							newtodo.find('.chk-complete').iCheck({
								checkboxClass: 'iradio_square-blue',
				
								//increaseArea: '20%' // optional
								}).on('ifChanged', function(event){ 
								var serial=$(this).closest('.dd-parent').attr('data-serial');
								var status="NO"; if($(this).is(':checked')) status="YES";
								
								change_completeStatus(serial,status);
							});
							
							
							//if(user_id==v){
								
								newtodo.find('.chk-complete').iCheck('enable');
								newtodo.find('.dd-link').attr('data-toggle',"dropdown");
								
								//}else{
								//newtodo.find('.dd-link').removeAttr('data-toggle');
								//newtodo.find('.chk-complete').iCheck('disable');
								//newtodo.find('.cls-deltodo').prop( "onclick", null );
							//}
							console.log(newtodo);
							$('.userwise-row[data-id="'+v+'"]').after(newtodo);
							
							
						});
					}
				});
				//});
				
				
			}
			else{
				$('.datewise-row').show();
				$('.userwise-row').hide();
				$('#DueDateSpan').show();
				$('.ddm-calview').hide();
				$(".dd-parent").show('slow');
				$('.dd-parent-user').remove();
			}
			
		});
		
		
		
		function deleteComment(commentID, modcomID, ReplyID, table) {
	        
	        $.ajax({
	            url: '<?php echo site_url(); ?>Projects/deleteReply',
	            type: 'POST',
	            data: {
	                commentid: modcomID,
	                id: ReplyID,
	                table: table
				},
	            dataType: "JSON",
	            beforeSend: function () {
	                //console.log(modcomID + ":" + commentID);
				},
	            success: function (data, textStatus) {
	                console.log(data);
	                $("#item" + commentID + modcomID).remove();
	                $(".item" + commentID + modcomID).remove();
	                // if(data.msg ='DONE'){
					
	                // }else{
	                //  alert("You Can't delete this comment!!!");
	                //  return false;
	                // }
					
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                // Some code to debbug e.g.:               
	                console.log(jqXHR);
	                console.log(textStatus);
	                console.log(errorThrown);
				}
			});
			
		}
		
		
		
	</script>
	
	<script type="text/javascript">
		$('#datetimepicker7').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker7Task').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker7set').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker8set').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker9set').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker8').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		
		$('#datetimepicker8Task').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker9').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker10').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		$('#datetimepicker11').datetimepicker({
			startDate: '+01-05-1971', //or 1986/12/08
			format: 'Y-m-d H:i:s',
			closeOnDateSelect: true
		});
		
		$(".my-colorpicker1").colorpicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				alert("s");
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
			}
		});
		
	    $('form[name=form_datasetTaskpro]').submit(function (e) {

	    	e.preventDefault();
	    	var formData = new FormData($(this)[0]);

	    	$.ajax({
	    		url: this.action,
	    		type: this.method,
	    		data: formData,
	    		contentType: false,
	    		processData: false,
	    		success: function (updated_id) {
	    			console.log(updated_id);
	    			var serial=$("#taskID").val();
	    			$('.link_status_text'+serial)
	    			.attr('data-type',formData.get('projecttasktype'))
	    			.attr('data-status',formData.get('projectstatus'))
	    			.html(formData.get('projectstatus'));

	    			if(formData.get('projectstatus')=='completed'){
	    				$('.todoRow'+serial).find('.chk-complete').iCheck('check');
	    			}else{
	    				$('.todoRow'+serial).find('.chk-complete').iCheck('uncheck');
	    			}
	    			var tid = $("#chkchangetaskstatus").attr("data-taskid");
	    			var oldtaskname = $("#tasklistdiv" + tid + " .taskHover p").html();
	    			if ($("#togPopH").val() != oldtaskname)
	    				$("#tasklistdiv" + tid + " .taskHover p").html($("#togPopH").val());
	    			$("#update_notT").hide();
	    			$("#update_okT").show();

	    		},
	    		error: function (jqXHR, textStatus, errorThrown) {

	    			console.log(jqXHR);
	    			console.log(textStatus);
	    			console.log(errorThrown);
	    		}
	    	});
	    });
		
	    $(document).on('keyup keypress change', '#form_datasetTaskpro :input', function (e, isScriptInvoked) {
            if (isScriptInvoked === true) {
				
				} else {
                $("#update_notT").show();
                $("#update_okT").hide();
			}
		});
		
	    function loadassignees(el){
			
		}
		
		
	</script>
	<script type="text/javascript">
		// Qtip - assignee
		function clear_assignees(el){
			// $('.chk_ass_filter').prop('checked' , false);
			// $('.dd-parent').show();
			$('.dropdown-change-view').find('.active').click();
		}
		function filter_assignees(el){
			$('.dd-parent').hide();
			var arrChk=[];
			//arrChk.push($(el).attr('data-id'));
			
			$('.chk_ass_filter').each(function(i,el){
				if($(el).is(':checked')) arrChk.push($(el).attr('data-id'))
			});
			
			if(arrChk.length>0){
				
				$('.dt-assignto').each(function(i,el){
					var arrAss=$(el).attr('data-assid').split(',');
					//console.log('arr Each check');console.log(arrAss);
					
					$.each(arrAss, function(k,v){
						
						if(arrChk.indexOf(v) != -1){
							console.log('found');console.log(v);
							$(el).closest('.dd-parent').show();
							
							return false;
						}
						else{
							//console.log('not found');console.log(v);
							$(el).closest('.dd-parent').hide();
						}
					});
				});
				}else{
				$('.dropdown-change-view').find('.active').click();
			}
			
		}
		
		var qtc='<li class="workspace4" style="display:inline">'
		
		+'<ul id="assfilter_body" class="keep-open">'
		
		+'</ul>'
		
		+'</li>';
		
		$('.dd-tog-ass').qtip({
			
			show: {
				event: 'click'
			},
			hide: 'unfocus click',
			
			content: {
				text: qtc
				
			},
			
			position: {
				at: 'bottom left',  
				my: 'top left', 
				viewport: $(window)
				
			},
			style: {
				classes: 'qtip-light qtip-rounded',
				width: '300'
			},
			
			
			events: {
				show: function(event, api) {
					
					var _this=this;
					if(flag_update_filters){
						
						var request = $.ajax({
							url: base_url+"todo/getMyTodoUsers",
							method: 'POST',
							data: {},
							dataType: 'JSON'
						});
						request.done(function(response){
							console.log(response);
							//if(response.length>0){
							$(event.currentTarget).find('#assfilter_body').empty();
							// <input class="chk_ass_filter"  data-id="'+v.ID+'" type="checkbox"> 
							$.each(response, function(k,v){
								var newrow=$('<li onclick="filter_assignees(this)"><div><label style="width: 100%;"><input checked class="chk_ass_filter"  data-id="'+v.ID+'" type="checkbox"> '+v.full_name+'</label></div></li>');
								$(event.currentTarget).find('#assfilter_body').append(newrow);
								
							});
							
							$(event.currentTarget).find('#assfilter_body').append('<li onclick="clear_assignees(this)" class="dropdown-menu-footer">'
							+'<a href="#"><i > Clear All filters...</i></a>'
							+'</li>');
							//}
						});
						flag_update_filters=false;
					}
				},
				render: function(event, api) {
					
					
					
				},
				hide: function(event, api) {
					
				}
			}
		});
	</script>
	
	<script type="text/javascript">
		
		
		function selectSplice(val){
			//console.log(val);
			$(".select2_multiple option:selected").removeAttr("selected");
			$("#member").html("");
			$("#project_members").html("");
			
			var unique = [];
			
			var newSelArr = [];
			var finalArr = [];
			
			$.each(selectArray, function (key, value) {
				newSelArr.push(value.ID);
			});
			
			//console.log(selectArray);
			
			
			jQuery.grep(newSelArr, function(el) {
				
				if (jQuery.inArray(el, val) == -1) 
				unique.push(el);
				i++;
				
			});	
			//console.log(unique);
			
			for(var i=0; i< unique.length;i++){
				$.each(selectArray, function (key, value) {
					if(unique[i] === value.ID){
						finalArr.push(value);
					}
					
				});	
				
			}
			
			//console.log(finalArr);
			
			$("#member").append('<option value="#addnew">Invite new people +</option>');	
			
			$.each(finalArr, function (key, value) {
				var name = value.full_name;
				$("#member").append('<option value="'+value.ID+'">'+name+'</option>');
				$("#project_members").append('<option value="'+value.ID+'">'+name+'</option>');
			});
			
			$(".select2_multiple").trigger("change", [true]);
			
		}
		
		
		
	</script>
	
	<script type="text/javascript">
		function attachdataloadtodo(parentType,projectID,parentID){
			downloadFolder="TodoFiles";
			
			$.ajax({
				url : '<?php echo base_url(); ?>projects/getAllAttachData',
				type : 'POST',
				data : {
					parentType:parentType,
					parentID:projectID,
					parentFolder:"TodoFolder",
					rootID:parentID
					
				},
				success : function(data) {
					console.log(parentType);
					console.log(projectID);
					console.log(data);
					$("#attachListDiv").html('');
					if (data.allFiles.length > 0) {
						$.each(data.allFiles, function (key, value) {
							console.log(data);
							if(data.allFiles[key].LastUpdate != ''){
								var now  = moment().format('YYYY-MM-DD HH:mm:ss');
								var then = data.allFiles[key].LastUpdate;
								var ms = moment(now).diff(moment(then));
								var min = msToTime(ms);
							}
							
							var res = data.allFiles[key].name.split("_");
							var filter = data.allFiles[key].name.split(".");
							
							
							if(data.allFiles[key].HasStar == 'YES'){
								var icon = base_url+'icons/YStar.png';
	                            }else{
								icon = base_url+'icons/Star.png';
							}
							
							if(min<120){
								var RM = "RMY"
	                            }else{
								RM = "RMN"
							}
							
							tabDetail ='       <div class="col-lg-12 SA '+RM+' '+filter[1].toUpperCase()+' '+data.allFiles[key].HasStar+'" id="fileWholeDiv007'+data.allFiles[key].id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
							tabDetail +='           <div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <a class="downloadHover" href="<?php echo base_url() ?>'+downloadFolder+'/'+data.parentfolder[0].name+'/'+data.allFiles[key].name+'" download><span style="font-size: 15px;" id="fileoriname007'+data.allFiles[key].id+'">'+data.allFiles[key].original_name+'</span></a></div>';
							tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
							tabDetail +='               <img class="icon-todo-menu" id="MakeStatus007'+data.allFiles[key].id+'" onclick="makeStar($(this).data(\'docid\'),$(this).data(\'status\'))" data-docid="'+data.allFiles[key].id+'" data-status="'+data.allFiles[key].HasStar+'" src="'+icon+'">';
							tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'icons/Profile.png" onClick="userListShowOnlick(this,' + projectID + ')" >';
							tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
							tabDetail += '              <ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
							tabDetail += '                  <div class="arrow-top-right"></div>';
							tabDetail += '                  <li onclick="showDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+data.allFiles[key].original_name+'" data-filesize="'+data.allFiles[key].size+'" data-createby="'+res[0]+'" data-createdate="'+data.allFiles[key].create_date+'"> <i class="fa fa-info"></i> Details</li>';
							tabDetail += '                  <li id="onclkid007'+data.allFiles[key].id+'" onclick="renameDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+data.allFiles[key].original_name+'" data-filesize="'+data.allFiles[key].size+'" data-createby="'+res[0]+'" data-createdate="'+data.allFiles[key].id+'"> <i class="fa fa-pencil"></i> Rename</li>';
							tabDetail += '                  <a class="downloadHover" href="<?php echo base_url() ?>'+downloadFolder+'/'+data.parentfolder[0].name+'/'+data.allFiles[key].name+'" download><li> <i class="fa fa-download"></i> Download</li></a>';
							tabDetail += '                  <li onclick="deleteFile($(this).data(\'createdate\'));" data-createdate="'+data.allFiles[key].id+'"> <i class="fa fa-trash-o"></i> Delete</li>';
							tabDetail += '              </ul>';
							tabDetail +='           </div>';
							tabDetail +='           <div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">'+data.allFiles[key].size+' KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">'+moment(data.allFiles[key].create_date).toNow(true)+' ago</span></div>';
							tabDetail +='       </div>';
							
							$("#attachListDiv").append(tabDetail);
						});
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					
					console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
				}
			});
		}
		
		function changeViewOrder(){
			if($('#DueDateOrder').text()=="DESC"){
				load_todos(false,'ASC');
	        	}else{
				load_todos(false,'DESC');
			}
		}
		
		function changeViewOrderAss(){
			if($('#AssigneeOrder').text()=="DESC"){
				load_todos(false,'ASC');
	        	}else{
				load_todos(false,'DESC');
			}
		}

		function sortByName(datetext,element){


			if($(element).attr('data-order')=="ASC"){
				mylist = $('div[data-datetext="'+datetext+'"]').detach().sort(function (a, b) { 
					return $(a).attr('data-first') - $(b).attr('data-first');
				});
				$(element).attr('data-order','DESC');
				$(element).find('i').attr('class','fa fa-caret-up');
			}else{
				mylist = $('div[data-datetext="'+datetext+'"]').detach().sort(function (a, b) { 
					return $(b).attr('data-first') - $(a).attr('data-first');
				});
				$(element).attr('data-order','ASC');
				$(element).find('i').attr('class','fa fa-caret-down');
		
			}

			$(element).closest('.datewise-row').after(mylist);

		}



		// $.ctrl('S', function() {

		// 	if($('#newTodoInput').hasClass('todo-searchmode')){
		// 		$('#newTodoInput').removeClass('todo-searchmode');
		// 		$('.dropdown-change-view').find('.active').click();
		// 	}else{
		// 		$('#newTodoInput').addClass('todo-searchmode');
		// 		$('#newTodoInput').focus();
		// 	}
		// });





	$(document).mouseup(function (e) {
        var container9 = $('.floting_box_right');
        var container10 = $('.floting_box_qtip');
        if(container9.is(":visible") && !container9.is(e.target) && container9.has(e.target).length === 0)
        {
            $('.backDiv').remove();
            $('.noBorder').removeClass('border');
            $('.flatpickr-calendar').removeClass('open');
        }

        if(container10.is(":visible") && !container10.is(e.target) && container10.has(e.target).length === 0)
        {
            $('.backDiv').remove();
            $('.noBorder').removeClass('border');
            $('.flatpickr-calendar').removeClass('open');
        }
    });

	</script>
	
</body>
</html>