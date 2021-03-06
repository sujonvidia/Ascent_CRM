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
			#tbl_overdue_tasks td,#tbl_nextdue_tasks td{
				border:1px solid;
				padding:5px;
			}
			#rpt_title{
				font-size: 30px;
				color: #0476CB;
			}
			#rpt_status{
				text-transform:capitalize
			}
			.span-purple{
				color: #773AA4;
			}
			.span-content{
				font-size: 20px;
			}
		</style>
		<style type="text/css">
			.dt-buttons{
			display: none
			}
			.a4-size{
			height: 210mm !important;
			width: 297mm !important;
			}
			#report_table_paginate{
			display: none
			}
			.dataTables_length{
			display: none
			}
			.dataTables_filter{
			display: none
			}
			.proDiv {
			border-radius: 8px;
			margin-bottom: 16px;
			height: 615px;
			overflow-y: auto;
			}
			#report_table{
			width: 100%;
			/*table-layout: fixed;*/
			margin-top: 10px;
			}
			
			#report_table tbody td{
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			
			}
			.cls-daterange,.cls-analtype{
			border: 1px solid #cecbcb;padding: 5px;
			
			}
			
			.bor-rad{
			
			-webkit-border-radius: 4px !important;
			-moz-border-radius: 4px !important;
			border-radius: 4px !important;
			}
			.cls-daterange .active,.cls-analtype .active{
			background-color: #e6e6e6;
			}
			.customdate{
			border: none;
			cursor: pointer;
			width: 10% !important;
			/*padding-right: %;*/
			}
			.quicklink{
			width: 100% !important;
			}
			.proDiv .panel .page-title:hover{
			color: #3276b1 !important;
			}
			
			.taskname:hover{
			color: #3276b1 !important;
			}
			.ProName{
			width: 63%;
			}
			.ProBtn{
			width: 10%;
			position: relative;
			right: -101px;
			top: 37px;
			min-height: 86px;
			}
			/*.proDiv .panel .btn {
			margin-left: 0%;
			margin-top: 3%;
			background-color: #686868;
			border: none;
			font-size: 9px;
			width: 20px;
			height: 20px;
			padding: 2px 0;
			}*/
			.page-title{
			cursor: pointer;
			}
			
			.taskname{
			cursor: pointer;
			}
			#gifImg{
			width: 36px;
			margin-top: -13px;
			margin-right: 5px;
			}
			#valu{
			font-size: 17px;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
			-moz-box-sizing: border-box;    /* Firefox, other Gecko */
			box-sizing: border-box;
			color: #aba9a9;
			}
			
			/*#degree{
			position: absolute;
			font-size: 8px;
			font-weight: bolder;
			margin-top: 0%;
			color: #aba9a9;
			}*/
			#degree{
		    
			font-size: 18px;
			margin-left: 1px;
			color: #aba9a9;
			cursor: pointer;
			}
			#cunit{
		    
			font-size: 18px;
			margin-left: -3px;
			color: #aba9a9;
			cursor: pointer;
			}
			#funit{
			font-size: 19px;
			margin-left: 5%;
			cursor: pointer;
			}
			#city{
			margin-left: 0%;
			color: #aba9a9;
			}
			
			#country{
			font-size: 22px;
			}
			
			#widget-grid-row{
			background-color: #e6e6e6;
			}
			
			.todo_name_overflow{
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			width: 100%;
			display: inline-block;
			color: #c5c5c5;
			}
			.qtip{
			max-width: 1000px;
			}
			.chk-alarm{
			margin: 0px !important;
			}
			
			#myprojectList {
			height: 669px;
			overflow-y: auto;
			overflow-x: hidden;
			}
			.dropdown-menu>.active>a{
			background-color: #868686
			}
			.activeit{
			color:green !important;
			}
			.cls-cat-name{
			color:black !important;
			width: 95px;
			}
			.cls-cat-color{
			
			width: 25px;
			margin-left: -4px;
			}
			.todo-desc{
			font-size: 15px;
			padding: 10px;
			line-height:1.2;
			}
			.cat-text{
			margin-left: 5px;
			}
			.li-cat{
			cursor: pointer;
			}
			.keep-open{
			/*list-style-type: none;*/
			padding: 0px;
			font-size: 14px;
			
			}
			.border-rad{
			-webkit-border-radius: 8px !important;
			-moz-border-radius: 8px !important;
			border-radius: 8px !important;
			background-image: url('<?php echo base_url();?>asset/img/icons/plusIcon.png');
			background-position-y: 3px;
			background-repeat: no-repeat;
			height: 32px;
			padding-left: 30px;
			background-size: 18px 18px;
			font-size: 16px;
			background-position: 6px 6px;
			}
			
			.proClBtn{
			right: -23px;
			top: 1px;
			font-size: 23px;
			}
		</style>
		
		<style type="text/css">
			.fc-event-container{
			display: none;
			}
			.ui-widget-content{
			border: 1px solid #eaeaea;
			}
			#calendar {
			width: auto;
			margin: 0 auto;
			font-size: 10px;
			
			}
			.fc-header-title h2 {
			font-size: .9em;
			white-space: normal !important;
			}
			.fc-view-month .fc-event, .fc-view-agendaWeek .fc-event {
			font-size: 0;
			overflow: hidden;
			height: 2px;
			}
			.fc-view-agendaWeek .fc-event-vert {
			font-size: 0;
			overflow: hidden;
			width: 2px !important;
			}
			.fc-agenda-axis {
			width: 20px !important;
			font-size: .7em;
			}
			
			.fc-button-content {
			padding: 0;
			}
			.fc-basic-view .fc-body .fc-row{
			min-height: 2.7em !important; 
			}
			.fc-center h2{
			font-size: 15px;
			}
		</style>
		
		
		<style>
			.breadcrumb2 {
			list-style-type: none;
			margin: 0;
			padding: 0;
			height: 50px;
			
			}
			.breadcrumb2 .active{
			background-color: #e6e6e6;
			}
			
			.breadcrumb2 > li {
			float: left;
			}
			
			.breadcrumb2 > li a {
			display: block;
			padding: 12px;
			text-decoration: none;
			}
			
			.breadcrumb2 > li a:hover {
			background: #868686;
			color: black;
			cursor: pointer;
			}
			
			.quick-menu li a {
			display: block;
			
			padding: 5px;
			text-decoration: none;
			}
			
			
			
			.quick-menu li a:hover {
			background: #868686;
			color:white;
			cursor: pointer;
			}
			
			
		</style>
		
		
		<!-- ITL Todo CSS : sujon -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/itl-todo/itl-todo.css?v=<?php echo time();?>">
		
		<style type="text/css">
			
			.proComm{
			display: block !important;
			}
			
			.text-center{
			margin-top: 5px;
			}
			.span-divider{
			margin-left: 15px;
			margin-right: 15px;
			}
			.datewise-row{
			display: none !important;
			}
			.customdate{
			border: none;
			cursor: pointer;
			width: 10% !important;
			/*padding-right: %;*/
			}
			.popover{
			z-index: 10500000;
			}
			/*.modal{
			z-index: 10500000;
			}*/
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
			border: 1px solid #cecbcb;
			padding-left: 5px;
			
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
			#widget-grid-row{
			padding-top: 1%;
			}
			
		</style>

		
		
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
				
				<ul class="breadcrumb2">
					<!-- <li title="Navigate Backward">
						<a>
						<i class="fa fa-reply" aria-hidden="true"></i>
						</a>
						</li>
						
						<li  title="Navigate Forward">
						<a>
						<i class="fa fa-share" aria-hidden="true"></i>
						</a>
					</li> -->
					
					<li id="rpt_refresh" title="Refresh" onclick="generatePreview()">
						<a>
							<i class="fa fa-refresh" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_firstPage" title="First Page">
						<a>
							<i class="fa fa-fast-backward" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_prevPage">
						
						<a title="Previous Page">
							<i class="fa fa-backward" aria-hidden="true"></i>
						</a>
					</li>
					
					<li >
						<a>
							<input id="report_pageCurrent" max="0" min="0" type="number" name="" style="width: 3em;height: 24px">
							<span>&nbsp;/&nbsp;</span>
							<span id="report_pageCount">0</span>
						</a>
						
					</li>
					
					<li id="rpt_nextPage" title="Next Page">
						<a>
							<i class="fa fa-forward" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_lastPage" title="Last Page">
						<a>
							<i class="fa fa-fast-forward" aria-hidden="true"></i>
						</a>
					</li>
					
					
					<!-- <li title="Toggle Print Preview">
						<a>
						<i class="fa fa-clone" aria-hidden="true"></i>
						</a>
						</li>
					-->
					
					
					<li onclick="report_print_btn(this)" title="Print">
						<a>
							<i class="fa fa-print" aria-hidden="true"></i>
						</a>
					</li>
					
					<li title="Import">
						<input type="file" id="import_csv_in" accept=".csv" style="display: none">
						<input type="file" id="import_excel_in" style="display: none">
						
						<div class="dropdown">
							<a style="color:#3276b1" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-download" aria-hidden="true"></i>
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li onclick="$('#import_csv_in').trigger('click'); return false;"><a>CSV file</a></li>
								<!-- <li><a href="#">Excel file</a></li> -->
								
							</ul>
						</div>
						
					</li>
					
					<li title="Export">
						<div class="dropdown">
							<a style="color:#3276b1" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-upload" aria-hidden="true"></i>
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li onclick="export_pdf_btn(this)"><a>PDF file</a></li>
								<li onclick="export_excel_btn(this)"><a>Excel file</a></li>
								<li onclick="export_csv_btn(this)"><a>CSV file</a></li>
								
							</ul>
						</div>
						
					</li>
					
					<!-- 	<li id="rpt_filters" title="Filter" >
						<a>
						<i class="fa fa-filter" aria-hidden="true"></i>
						</a>
					</li> -->
					
					<li id="rpt_zoomIn" title="Zoom In">
						<a>
							<i class="fa fa-search-plus" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_zoomOut" title="Zoom Out">
						<a>
							<i class="fa fa-search-minus" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_searchBtn" title="Search Button">
						<a>
							<i class="fa fa-search" aria-hidden="true"></i>
						</a>
					</li>
					
					<li id="rpt_searchBox" title="Search" style="display: none">
						<div class="header-search pull-right">
							<input id="rpt_search" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" type="text" name="param" placeholder="search" class="projects">
							<button type="button">
								<i class="fa fa-search"></i>
							</button>
							<!-- <a href="javascript:void(0);" id="rpt_cancelSearch" title="Cancel Search"><i class="fa fa-times"></i></a> -->
						</div>
					</li>
					
				</ul>
			</div>
			<!-- END RIBBON -->
			
			<!-- MAIN CONTENT -->
			<div id="content">
				
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-12 reportDiv" style="display: none;">

							<i onclick="closeReport(this)" class="fa fa-times hvr-glow clasI pull-right" aria-hidden="true"></i>

							<div class="panel panel-default proDiv">
								<div id="report_panel" class="panel-body">
									<!-- 1st section -->
									<div style="padding-left: 10px;padding-bottom: 10px">
										<h1 id="rpt_title"></h1>
										
										<div style="width: 78%;float: left">
											<div style="    margin-bottom: 10px;">
												<span class="span-purple">Duration:</span>
												<span id="rpt_dur_from" class="span-content"></span> to
												<span id="rpt_dur_to" class="span-content"></span> |
												<span class="span-purple">Status:</span>
												<span id="rpt_status" class="span-content"></span>

											</div>

											<div >
												<span class="span-purple">Project Admin:</span>
												<span class="span-content" id="rpt_admin"></span> ,

												<span class="span-purple">Project Co-Admin(s):</span>
												<span class="span-content" id="rpt_coadmins"></span>

											</div>

											<div >
												<span class="span-purple">Project Members:</span>
												<span class="span-content" id="rpt_members"></span>

											</div>
										</div>

										<div style="width: 12%;float: right;">
											<div style="border: 2px solid #773AA4;border-radius: 8px;padding: 10px">
												<div>Due in: 
												<span id="rpt_due_days" class="span-content"></span> days</div>
												<div>Due Tasks: <span id="rpt_due_tasks" class="span-content"></span></div>
												<div>Overdue Tasks: <span id="" class="span-content rpt_overdue_tasks"></span> </div>
											</div>
											
										</div>
									</div>
									
									<!-- 2nd section -->
									<div style="border: 2px solid #0476CB;border-radius: 8px;padding: 10px;clear: both;position: relative;top: 10px;">
										<span style="color: #0476CB;" class="span-content">Status Update</span>
										<span id="rpt_lastedited" style="color: #0476CB;font-style: italic;">last edited by <span id="rpt_laststatus_by"></span> on <span id="rpt_laststatus_on"></span>:</span>

										<div id="rpt_laststatus_text" style="margin-top: 10px;margin-bottom: 10px">
											</div>
									</div>
									
									<!-- 3rd section -->
									<div style="margin-top: 20px">

										<span style="color: #0476CB;" class="span-content">Progress Report:</span>

										<div>
											<span class="span-purple">Total Tasks:</span>
											<span id="rpt_tasks_total">0</span> | 
											<span class="span-purple">Completed:</span>
											<span id="rpt_tasks_comp">0</span> | 
											<span class="span-purple">Pending:</span>
											<span id="rpt_tasks_pend">0</span>
										</div>
										<div id="container_chart" style="border:1px solid #ccc;"></div>
									</div>

									<!-- 4th section -->
									<div style="margin-top: 20px">
										<span class="span-content span-purple">Overdue Tasks: </span><span id="" style="color: red;" class="span-content rpt_overdue_tasks"></span>

										<table id="tbl_overdue_tasks" style="border: 1px solid;">
											
											<thead style="background: #AEAAAA;    border: 1px solid;font-weight: bold;    font-size: 14px;">
												<tr>
													<td>Task </td>
													<td>Due Date</td>
													<td>Overdue Days</td>
													<td>Assigned to</td>
												</tr>
											</thead>

											<tbody>
												
											</tbody>

											<tfoot style="display: none">
												<tr>
													<td colspan="100" style="text-align: center;">
														No overdue tasks found
													</td>
												</tr>
											</tfoot>
											
										</table>

									</div>

									<!-- 5th section -->
									<div style="margin-top: 20px">
										<span class="span-content span-purple">Tasks due by next week: </span><span id="" style="color: black;" class="span-content rpt_nextdue_tasks"></span>

										<table id="tbl_nextdue_tasks" style="border: 1px solid;">
											
											<thead style="background: #AEAAAA;    border: 1px solid;font-weight: bold;    font-size: 14px;">
												<tr>
													<td>Task</td>
													<td>Sub-task</td>
													<td>Due Date</td>
													<td>Assigned to</td>
												</tr>
											</thead>

											<tbody>
												
											</tbody>

											<tfoot style="display: none">
												<tr>
													<td colspan="100" style="text-align: center;">
														No due tasks found
													</td>
												</tr>
											</tfoot>
											
										</table>

									</div>
									
									
								</div> <!-- panel body ends -->
							</div> <!-- panel ends -->
						</div> <!-- report div ends -->
						
						<div class="col-lg-12 filterDiv">
							
							<div class="panel panel-default proDiv">
								<div style="width: 50%;margin-left: 25%;border:1px solid #ccc;border-radius: 8px;margin-top: 5%;">
									<div class="panel panel-head">
										
										<h3 class="no-float txt-color-blueDark">
											
											<!-- <div class="dropdown"> -->
											<!-- <a  class="dropdown-toggle" type="button" data-toggle="dropdown"> -->
											<span><?php echo "Dashboard Reports"; ?></span>
											<!-- <span class="caret"></span> -->
											<!-- </a> -->
											
										</h3>
										
										
									</div>
									
									<div id="" class="panel-body">
										<ul class="quick-menu" style="list-style-type: none;padding-left: 10px;">
											<div id="divReportType">
												<li>
													<h6>Type</h6>
													
													<select onchange="changeReportTypeList(this)" class="select2 proInputText" id="report_type" name="report_type">
														<option value="Project">Project</option>
														
													</select>
												</li>
											</div>
											
											<div class="div-rpt-typelist" id="divReportTypeList">
												
												<li><h6>List:</h6>
													<select name="sel_typelist" id="sel_typelist" class="proInputText select2">
														
													</select>
												</li>
												
											</div>
											
											<div class="div-rpt-type" id="divReportChat" style="display: none">
												<li><h6>From:</h6>
													<select name="Chatfrom" id="ChatFrom" class="select2 proInputText"></select>
												</li>
												
												<li><h6>To:</h6>
													<select name="Chatto" id="ChatTo" class="select2 proInputText"></select>
												</li>
												
											</div>
											
											<div id="divReportDatePick" style="display: none;">
												<li><h6>Start Date:</h6>
												<input placeholder="Select Date.." onclick="togglecalendar_startPro(this)" type="text" id="startDatein" name="mydate" class="proInputText" data-dateformat="M d yy"  value=""></li>
												
												
												<li><h6>Due Date:</h6>
													<input onclick="togglecalendar_endPro(this)" type="text" id="endDatein" placeholder="Select Date.." name="mydate" class="proInputText" data-dateformat="M d yy" value="">
												</li>
												
											</div>
											
											
											<li onclick="generatePreview()" style="margin-top: 10px;">
												<button style="background-color: #152940;" class="btn-success form-control bor-rad">Preview</button>
											</li>
											
										</ul>
									</div>
								</div>
							</div>
							
							
						</div>
						
						
					</div>
				</section>
				<!-- end widget grid -->			
			</div>
			
			<input type="hidden" id="taskid" value="">	
			<input type="hidden" id="newTaskInput" data-projectid="" value="">	
			
		</div>
		<!-- END MAIN CONTENT -->
		
		
		<!-- PAGE FOOTER -->
		<?php include 'template/footer.php';?>
		
		
		<!--================================================== -->
		<?php include 'template/includes_bottom.php';?>
		<?php include 'template/itl-todo-manager.php'; ?>
		<?php include 'template/weather_js.php';?>
		
		<script src="https://code.highcharts.com/highcharts.js"></script>  
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
   	
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
		
		<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/plugin/csv/jquery.csv.min.js"></script> -->
		
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
		
		
		<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugin/dataTables.treeGrid/dataTables.treeGrid.js"></script>
		
		
		
	</body>
</html>


<script type="text/javascript">
	var allusers = <?php echo json_encode($allusers); ?>;
	
	$.each(allusers, function (key, value) {
		
		$("#ChatFrom").append('<option value="' + value.email + '" >' + value.display_name + '</option>');
		$("#ChatTo").append('<option value="' + value.email + '" >' + value.display_name + '</option>');
		$("#ScheduleUser").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
		$("#sel_assgn").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
		
	});
	
	
	
	
	var fpstart= flatpickr("#startDatein", {
		enableTime: false,
		dateFormat: 'M-d-Y',
		clickOpens:false,
		//minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
		//maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),
		
		onChange: function(selectedDates, dateStr, instance) {
			
		}
	});
	
	var fpend= flatpickr("#endDatein", {
		enableTime: false,
		dateFormat: 'M-d-Y',
		clickOpens:false,
		//minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
		onChange: function(selectedDates, dateStr, instance) {
			
		}
	});
	
	function togglecalendar_startPro(status){
		fpstart.toggle();
	}
	function togglecalendar_endPro(status){
		fpend.toggle();
	}
	
	function changeDateRange(element){
		
		//$('.cls-daterange > li').removeClass('active');
		//$(element).addClass('active');
		
		if($(element).val()=='ThisWeek'){
			fpstart.setDate(moment().startOf('Week').format('MMM-DD-YYYY'));
			fpend.setDate(moment().endOf('Week').format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='ThisMonth'){
			fpstart.setDate(moment().startOf('Month').format('MMM-DD-YYYY'));
			fpend.setDate(moment().endOf('Month').format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='LastWeek'){
			fpstart.setDate(moment().subtract(1, 'weeks').startOf('Week').format('MMM-DD-YYYY'));
			fpend.setDate(moment().subtract(1, 'weeks').endOf('Week').format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='LastMonth'){
			fpstart.setDate(moment().subtract(1, 'months').startOf('Month').format('MMM-DD-YYYY'));
			fpend.setDate(moment().subtract(1, 'months').endOf('Month').format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='Last30Days'){
			fpstart.setDate(moment().subtract(30, 'days').format('MMM-DD-YYYY'));
			fpend.setDate(moment().format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='Last60Days'){
			fpstart.setDate(moment().subtract(60, 'days').format('MMM-DD-YYYY'));
			fpend.setDate(moment().format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='Last90Days'){
			fpstart.setDate(moment().subtract(90, 'days').format('MMM-DD-YYYY'));
			fpend.setDate(moment().format('MMM-DD-YYYY'));
			$('#divReportDatePick').hide('slow');
		}
		if($(element).val()=='Custom'){
			$('#divReportDatePick').show('slow');
		}
		
	}
	
	
	
	var datatable = $('#report_table').dataTable({
		"pageLength": 15,
		dom: 'Bfrtip',
		// "processing": true,
		//  	"serverSide": true,
    	
		// "ajax": {
		// 	"url": base_url+"report/getReport",
		// 	'type': 'POST',
		// 	"data": function ( d ) {
		//       return $.extend( {}, d, {
		//         range: $('.cls-daterange .active a').text(),
		// 		type: $('#report_type').val(),
		// 		start_date: moment(fpstart.selectedDates[0]).format('YYYY-MM-DD'),
		// 		end_date: moment(fpend.selectedDates[0]).format('YYYY-MM-DD'),
		// 		assg: $('#sel_assgn').val()
		//       } );
		//    }
		//  },
		// "columns": [
		//      { "data": "tID" },
		//      { "data": "CreatedAt" },
		//      { "data": "CompletedAt" },
		//      { "data": "LastModified" },
		//      { "data": "Name" },
		//      { "data": "Assignee" },
		//      { "data": "DueDate" },
		//      { "data": "Tags" },
		//      { "data": "Notes" },
		//      { "data": "Projects" },
		//      { "data": "Parent" },
		//      { "data": "Parent2" }
		//  ],
		
		
		// 	"dataSrc": function (json) {
		// 	 	console.log("dataSrc",json);
		// 		var arr_assg=$('#sel_assgn').val();
		//    $.each(json.data, function(k,v){
		
		// 			if(arr_assg != null){
		
		// 				if(v.tag_ids != null){
		
		// 					var arr_tag=v.tag_ids.split(",");
		// 					$.each(arr_tag,function(k2,v2){
		
		// 						if(arr_assg.indexOf(v2) != -1){
		// 							datatable.row.add(insertNewReport(v));
		// 							return false;
		// 						}
		
		// 					});
		// 				}
		// 			}else{
		// 				datatable.row.add(insertNewReport(v));
		// 			}
		
		// 		});
		
		// },
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		],
		// 'treeGrid': {
		// 	'left': 10,
		// 	'expandIcon': '<span>+<\/span>',
		// 	'collapseIcon': '<span>-<\/span>'
		// },
		"fnDrawCallback": function(){
			
			if(datatable!=undefined){
				var info = datatable.page.info();
				$('#report_pageCurrent').val(info.page+1);
				$('#report_pageCurrent').attr('max',info.pages);
				$('#report_pageCurrent').attr('min',1);
				$('#report_pageCount').text(info.pages);
				
			}
			
		}
	}).api();
	
	
	function insertNewReport(data,rtype){
		//		console.log('insertNewReport',data);
		
		var created_date=moment(data.CreatedDate).format('MMM-DD-YYYY');
		
		var newrow=' <tr class="taskRow taskRowCus">'
		
		+ '<td>'+(rtype == "Project" ||  rtype == "Group" ||  rtype == "Direct" ? window.atob(data.Title) : data.Title)+'</td>'
		
		+ '<td>'+(created_date != "Invalid date"  ? created_date : "")+'</td>'
		
		+ '<td>'+data.senderName+'</td>'
		
		+ '<td>'+data.receiverName+'</td>'
		// + '<td>'+data.group_member +'</td>'
		// + '<td>'+data.createdby +'</td>'
		
		
		+'</tr>';
		
		return $(newrow);
		
		
	}
	
	function importNewReport(data){
		
		
		//if(data.length>10){
		console.log("importNewReport",data);
		
		var created_date=moment(data[1]).format('MMM-DD-YYYY');
		var completed_date=moment(data[2]).format('MMM-DD-YYYY');
		var modify_date=moment(data[3]).format('MMM-DD-YYYY');
		var due_date=moment(data[6]).format('MMM-DD-YYYY');
		
		var newrow=' <tr class="taskRow taskRowCus">'
		
		+ '<td>'+data[0]+'</td>'
		+ '<td>'+(created_date != "Invalid date"  ? created_date : "")+'</td>'
		+ '<td>'+(completed_date != "Invalid date" ? completed_date : "")+'</td>'
		+ '<td>'+(modify_date != "Invalid date" ? modify_date : "")+'</td>'
		+ '<td>'+(data[4] != "" ? data[4] : "")+'</td>'
		+ '<td>'+(data[5] != "" ? data[5] : "")+'</td>'
		+ '<td>'+(due_date != "Invalid date" ? due_date : "")+'</td>'
		+ '<td>'+data[7]+'</td>'
		+ '<td>'+(data[8] != null ? data[8] : "")+'</td>'
		+ '<td>'+data[9]+'</td>'
		+ '<td>'+data[10]+'</td>'
		+ '<td style="display:none" onclick="export_project_csv('+data[0]+')"><i class="fa fa-download" aria-hidden="true"></i></td>'
		+'</tr>';
		
		return $(newrow);
		//	}
		
		
		//$('#report_body').append(newrow);
	}
	
	var reportPage="<?php echo $page_title; ?>";
	
	function closeReport(element){
		$('.reportDiv').attr('class','col-lg-9 reportDiv').hide();
		$('.filterDiv').attr('class','col-lg-12 filterDiv').show();
		
	}

	function genChart(p1,p2){
		var seriesarr=[];
		if(p1>0){
			seriesarr.push({
			name: 'Pending',
			data: [p1],
			color: '#ED7E30'

		});
		}
		if(p2>0){
			seriesarr.push({
			name: 'Completed',
			data: [p2],
			color: '#5C9BD5',
		});
		}

		var chart = {
			type: 'bar',
			//width: 800,
			height:200,
			options3d: {
				enabled: true,
				alpha: 10,
				//beta: 0,
				//viewDistance: 50,
				//depth: 30,

			}
		};
		var title = {
			text: 'Tasks Status'   
		};
		var xAxis = {
			categories: ['1'],
			title: {
				text: null
			}
		};
		var yAxis = {
			min: 0,
			//tickInterval: 5,
			allowDecimals: false,
			title: {
				text: '',
				align: 'high'
			},
			// labels: {
			// 	overflow: 'justify'
			// }
		};
		var tooltip = {
			valueSuffix: ' tasks'
		};
		var plotOptions = {
			bar: {
				pointWidth:50,
				dataLabels: {
					enabled: true,
					color: 'black',
					x:20,
					y:-10,
					verticalAlign: 'bottom',
					//align: 'center',
					shadow:false,
				}
			},
			series: {
				stacking: 'normal'
			}
		};
		var legend = {
			layout: 'horizontal',
			align: 'center',
			verticalAlign: 'bottom',
			squareSymbol:true,
			//x: -40,
			//y: 200,
			//floating: true,
			borderWidth: 0,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			//shadow: true,
			reversed:true
		};
		var credits = {
			enabled: false
		};

		var json = {};   
		json.chart = chart; 
		json.title = title;   
		//json.subtitle = subtitle; 
		json.tooltip = tooltip;
		json.xAxis = xAxis;
		json.yAxis = yAxis;  
		json.series = seriesarr;
		json.plotOptions = plotOptions;
		json.legend = legend;
		json.credits = credits;
		$('#container_chart').highcharts(json);
	}

	function drawOverdueTask(data){
		$("#tbl_overdue_tasks tbody").empty();

		if(data.length>0){
			$("#tbl_overdue_tasks tfoot").hide();
			$.each(data, function (key, value) {
				var enddatedue=moment(value.Enddate.split(" ")[0]);
				var overduedays = moment.duration(moment().startOf('day').diff(enddatedue)).asDays();

				var newrow='<tr>'
				+'<td>'+value.Title+'</td>'
				+'<td>'+(enddatedue.isValid() ? enddatedue.format('DD-MMM') : '') + '</td>'
				+'<td>'+(enddatedue.isValid() ? overduedays+' days' : '')+'</td>'
				+'<td>'+(value.tag_names != null ? value.tag_names : '') +'</td>'
				+'</tr>';

				$("#tbl_overdue_tasks tbody").append(newrow);
				
				
			});
		}else{
			$("#tbl_overdue_tasks tfoot").show();
		}

		

	}

	function drawNextdueTask(data){
		$("#tbl_nextdue_tasks tbody").empty();

		if(data.length>0){
			$("#tbl_nextdue_tasks tfoot").hide();

			$.each(data, function (key, value) {
				var enddatedue=moment(value.Enddate.split(" ")[0]);
				
				var newrow='<tr>'
				+'<td>'+(value.taskTitle != null ? value.taskTitle : '')+'</td>'
				+'<td>'+(value.subtaskTitle != null ? value.subtaskTitle : '')+'</td>'
				+'<td>'+(enddatedue.isValid() ? enddatedue.format('DD-MMM') : '') + '</td>'
				+'<td>'+(value.tag_names != null ? value.tag_names : '') +'</td>'
				+'</tr>';

				$("#tbl_nextdue_tasks tbody").append(newrow);
				
				
			});
		}else{
			$("#tbl_nextdue_tasks tfoot").show();
		}

		

	}
	
	function generatePreview(){
		// datatable.ajax.reload();
		// return;
		
		//if(fpstart.selectedDates.length>0 && fpend.selectedDates.length>0){
		
		//if(moment(fpend.selectedDates[0]).isBefore(moment(fpstart.selectedDates[0]))){
		//$(".TaskproNeDiv").css('display','none');
		var request = $.ajax({
			url: base_url+"report/getReportDashboard",
			method: 'POST',
			data: {
				type_id: $('#sel_typelist').val(),
				
			},
			dataType: 'JSON'
		});
		request.done(function(response){
			var startdate=moment(response.data[0].Startdate);
			var enddate=moment(response.data[0].Enddate);
			var enddatedue=moment(response.data[0].Enddate.split(" ")[0]);
			
			$('#rpt_title').text(response.data[0].Title);
			$('#rpt_status').text(response.data[0].Status);
			$('#rpt_admin').text(response.data[0].admin_name);
			$('#rpt_coadmins').text(response.data[0].coadmin_name);
			$('#rpt_members').text(response.data[0].member_name);
			$('#rpt_dur_from').text(startdate.format('DD-MMM-YYYY'));
			$('#rpt_dur_to').text(enddate.format('DD-MMM-YYYY'));

			var duration = moment.duration(enddatedue.diff(moment().startOf('day')));
			
			$('#rpt_due_days').text(duration.asDays());
			$('#rpt_due_tasks').text(response.duetasks);
			$('.rpt_overdue_tasks').text(response.overduetasks.length);
			$('.rpt_nextdue_tasks').text(response.duetasks_nextweek.length);
			if(response.laststatus){
				$('#rpt_laststatus_by').text(response.laststatus.name);
				$('#rpt_laststatus_on').text(moment(response.laststatus.date).format('DD-MMM-YYYY'));
				$('#rpt_laststatus_text').html(response.laststatus.comment);
				$('#rpt_lastedited').show();
				
			}else{
				$('#rpt_lastedited').hide();
			}
			$('#rpt_tasks_total').text(response.tasks_total);
			$('#rpt_tasks_comp').text(response.tasks_comp);
			$('#rpt_tasks_pend').text(response.tasks_total-response.tasks_comp);
			$('.reportDiv').attr('class','col-lg-12 reportDiv').show();
			$('.filterDiv').attr('class','col-lg-9 filterDiv').hide();

			genChart(response.tasks_total-response.tasks_comp,response.tasks_comp);
			drawOverdueTask(response.overduetasks);
			drawNextdueTask(response.duetasks_nextweek);

			
		});
		request.fail(function(response){
			console.log(response.responseText);
			
		});
		//}else{swal('Please select valid date range !');}
		// }else{
		// 	swal('Please select date range !');
		// }
		
	}
	
	$('#rpt_nextPage').on( 'click', function () {
	    datatable.page( 'next' ).draw( 'page' );
		
	} );
	
	$('#rpt_prevPage').on( 'click', function () {
	    datatable.page( 'previous' ).draw( 'page' );
	    
	} );
	
	$('#rpt_firstPage').on( 'click', function () {
	    datatable.page( 'first' ).draw( 'page' );
	    
	} );
	
	$('#rpt_lastPage').on( 'click', function () {
	    datatable.page( 'last' ).draw( 'page' );
	    
	} );
	
	$('#rpt_lastPage').on( 'click', function () {
	    datatable.page( 'last' ).draw( 'page' );
	    
	} );
	
	$('#rpt_filters').on( 'click', function (e) {
	    
	    if($(this).hasClass('active')){
	    	$('.reportDiv').attr('class','col-lg-12 reportDiv');
	    	$('.filterDiv').hide();
	    	$(this).removeClass('active');
			}else{
	    	$('.reportDiv').attr('class','col-lg-9 reportDiv');
	    	$('.filterDiv').attr('class','col-lg-3 filterDiv').show();
	    	$(this).addClass('active');
		}
	    
	} );
	
	$('#rpt_searchBtn').on( 'click', function (e) {	    
	    if($(this).hasClass('active')){
	    	$('#rpt_searchBox').hide('slow');
	    	
	    	$(this).removeClass('active');
			}else{
	    	$('#rpt_searchBox').show('slow');
	    	$(this).addClass('active');
	    	$('#rpt_search').focus();
		}
	    
	} );
	
	var currZoom = 1; // For IE
	
	$('#rpt_zoomIn').on( 'click', function (e) {
	    
	    currZoom *= 1.2;
	    if(currZoom>3) currZoom=3;
		$("#report_panel").css("zoom", currZoom);
		$("#report_panel").css("-moz-transform", "Scale(" + currZoom + ")");
		$("#report_panel").css("-moz-transform-origin", "0 0");
		
	    
	} );
	
	$('#rpt_zoomOut').on( 'click', function (e) {
	    
	    currZoom *= .8;
	    if(currZoom<.3) currZoom=.3;
		$("#report_panel").css("zoom", currZoom);
		$("#report_panel").css("-moz-transform", "Scale(" + currZoom + ")");
		$("#report_panel").css("-moz-transform-origin", "0 0");
	    
	} );
	
	$('#report_pageCurrent').on( 'change keyup mouseup', function (e) {
		console.log(Number($(e.currentTarget).val())-1);
	    datatable.page( Number($(e.currentTarget).val())-1 ).draw( false );
	    
	} );
	
	$('#rpt_search').on( 'keyup', function () {
		datatable.search( this.value ).draw();
	} );
	
	function changePageNumber(element){
		
		datatable.page( Number($(element).val())-1 ).draw( false );
	}
	
	function changeReportType(element){
		$('#reportTypeText').text($(element).find('a').text());
		$('#reportTypeMenu li').removeClass('active');
		$(element).addClass('active');
		if($(element).find('a').text()=='Analytical Reports'){
			$('.div-rpt-type').hide('slow');
			$('#divReportAnalytical').show('slow');
		}
		if($(element).find('a').text()=='Quick Reports'){
			$('.div-rpt-type').hide('slow');
			$('#divReportDateRange').show('slow');
			
		}
		if($(element).find('a').text()=='Chatting Reports'){
			$('.div-rpt-type').hide('slow');
			$('#divReportChat').show('slow');
			
		}
		if($(element).find('a').text()=='Schedule Reports'){
			$('.div-rpt-type').hide('slow');
			$('#divReportSchedule').show('slow');
			
		}
	}
	var allProjectList = <?php echo json_encode($allProjectList); ?>;	
	// var allTaskList = <?php //echo json_encode($allTaskList); ?>;	
	// var allSubTaskList = <?php //echo json_encode($allSubTaskList); ?>;	
	// var allTodoList = <?php //echo json_encode($allTodoList); ?>;	
	// var allGroupList = <?php //echo json_encode($allGroupList); ?>;	
	
	function changeReportTypeList(element){
		return;
		
		$("#sel_typelist").empty();
		
		if($(element).val()=="Project"){
			$.each(allProjectList, function (key, value) {
				
				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');
				
				
			});
			$('#divReportChat').hide('slow');
		}
		
		if($(element).val()=="Task"){
			$.each(allTaskList, function (key, value) {
				
				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');
				
				
			});
			$('#divReportChat').hide('slow');
		}
		if($(element).val()=="SubTask"){
			$.each(allSubTaskList, function (key, value) {
				
				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');
				
				
			});
			$('#divReportChat').hide('slow');
		}
		if($(element).val()=="Todo"){
			$.each(allTodoList, function (key, value) {
				
				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');
				
				
			});
			$('#divReportChat').hide('slow');
		}
		if($(element).val()=="Group"){
			$.each(allGroupList, function (key, value) {
				
				$("#sel_typelist").append('<option value="' + value.group_id + '" >' + value.group_name + '</option>');
				
				
			});
			$('#divReportChat').hide('slow');
		}
		
		if($(element).val()=="Direct"){
			
			$("#sel_typelist").append('<option value="" >Direct Chat</option>');
			$('#divReportChat').show('slow');
			
			
		}
	}
	
	
	
	
	$("#import_csv_in").on('change', function() {
		var form_data = new FormData();                  
		form_data.append('csvfile', $('#import_csv_in')[0].files[0]);
		
		var request = $.ajax({
			url: base_url+"report/parseCSVfile",
			method: 'POST',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,           
			dataType: 'JSON'
		});
		request.done(function(response){
			console.log("Finished:", response);
			datatable.clear();
			// var i=0;
			// var len = results.data.length;
			$.each(response, function(k,v){
				
				if(k != 0){
					// if (k == len - 1) {
					
					// 	return true;
					// }else{
					datatable.row.add(importNewReport(v));
					//}
				}
				
			});
			datatable.column( 9 ).visible( true );
			datatable.column( 10 ).visible( true );
			datatable.column( 11 ).visible( false );
			datatable.draw();
			$('#btn_process').show();
			
			
		});
		request.fail(function(response){
			console.log(response.responseText);
			
		});
		
		
		this.value=null; return false;
		
		
	});
	
	
	function process_imports(){
		console.log(datatable.column( 9 ).data().unique().toArray());
		
		var request = $.ajax({
			url: base_url+"report/processImports",
			method: 'POST',
			data: {
				idata: datatable.rows().data().toArray(),
				prodata: datatable.column( 9 ).data().unique().toArray()
				
			},
			dataType: 'JSON'
		});
		request.done(function(response){
			swal('Import Completed');
			
		});
		request.fail(function(response){
			console.log(response.responseText);
			
		});
		
	}
	
	
</script>

<script type="text/javascript">
	
	$.each(allProjectList, function (key, value) {
		
		$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');
		
		
	});
</script>

<script type="text/javascript"> 
	
	
	
	function export_pdf_btn(element){
		$('.buttons-pdf').click();
	}
	
	function export_excel_btn(element){
		$('.buttons-excel').click();
	}
	
	function export_csv_btn(element){
		$('.buttons-csv').click();
		
	}
	
	function report_print_btn(element){
		$('.buttons-print').click();
	}
	
	
</script>

