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
				height: 600px;
				overflow-y: auto;
			}
			#report_table{
				width: 100%;
				white-space: nowrap;
				overflow-x: auto;
				/*display: block;*/
				margin-top: 10px;

			}
		#report_table{
			width: 100%;
    table-layout: fixed;
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

						<li id="rpt_filters" title="Filter">
							<a>
								<i class="fa fa-filter" aria-hidden="true"></i>
							</a>
						</li>

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
						<div class="col-lg-12 reportDiv">
							<div class="panel panel-default proDiv">
								<div id="report_panel" class="panel-body">

									
									

									<table class="table table-striped table-bordered table-hover profile_list_table bor-rad" id="report_table" style="width:100%">
									 <thead>
									  <tr>
									  		
									     <th id="report_headname">ID</th>
									     <th style="width: 15%">Created At</th>
									     <th >Completed At</th>
									     <th >Last Modified</th>
									     <th style="width: 15%">Name</th>
									     <th >Assignee</th>
									     <th >Due Date</th>
									     <th >Tags</th>
									     <th >Notes</th>
									     <th >Projects</th>
									     <th >Parent</th>
									     <th></th>
									  </tr>
									 </thead>
									 
									 <tbody id="report_body">
									 
									  
									 </tbody>
									</table>
									<button onclick="process_imports()" style="display: none;" id="btn_process" class="btn-success form-control bor-rad">Process</button>

									
								</div>
							</div>
						</div>
						
						<div class="col-lg-3 filterDiv" style="display: none;">
							<div class="panel panel-default proDiv">
								<div class="panel panel-head">
									
								<h3 class="no-float txt-color-blueDark">
								
								<!-- <div class="dropdown"> -->
								  <a  class="dropdown-toggle" type="button" data-toggle="dropdown">
								  	<span><?php echo $page_title; ?></span>
								  	<!-- <span class="caret"></span> -->
								  </a>
								  <!-- <ul id="reportTypeMenu" class="dropdown-menu">
								    <li class="active" onclick="changeReportType(this)"><a>Quick Reports</a></li>
								    <li onclick="changeReportType(this)"><a>Analytical Reports</a></li>
								    <li onclick="changeReportType(this)"><a>Chatting Reports</a></li>
								    <li onclick="changeReportType(this)"><a>Schedule Reports</a></li>
								    
								  </ul> -->
								<!-- </div> -->
								</h3>
									
									
								</div>
								
								<div id="" class="panel-body">
								<ul class="quick-menu" style="list-style-type: none;padding-left: 10px;">
								<div id="divReportType">
									<li>
										<h6>Type</h6>

											<select onchange="changeReportTypeList(this)" class="select2 proInputText" id="report_type" name="report_type">
												<option value="Project">Project</option>
												<option value="Task">Task</option>
												<option value="SubTask">SubTask</option>
												<option value="Todo">To-Do</option>
											</select>
									</li>
									</div>

									<?php if($page_title=="Status Reports"){ ?>
									<div class="div-rpt-type" id="divReportDateRange">
										<h6>Date Range</h6>

										<select onchange="changeDateRange(this)" class="select2 proInputText" id="report_daterange" name="report_daterange">
												<option value="" disabled selected>Select your option</option>
												<option value="ThisWeek">This Week</option>
												<option value="ThisMonth">This Month</option>
												<option value="LastWeek">Last Week</option>
												<option value="LastMonth">Last Month</option>
												<option value="Last30Days">Last 30 Days</option>
												<option value="Last60Days">Last 60 Days</option>
												<option value="Last90Days">Last 90 Days</option>
												<option value="Custom">Custom Date Range</option>
											</select>

									</div>

									<div class="div-rpt-assgn" id="divReportAssgn">
										<h6>Assignee</h6>

										<select class="proInputText select2" id="sel_assgn" name="sel_assgn" multiple="multiple">
												
											</select>
											
									</div>

									<?php } ?>

									<?php if($page_title=="Chatting Reports"){ ?>
									<div class="div-rpt-typelist" id="divReportTypeList">

										<li><h6>List:</h6>
											<select name="sel_typelist" id="sel_typelist" class="proInputText select2">
												
											</select>
										</li>
										
									</div>

									<div class="div-rpt-type" id="divReportChat">
										<li><h6>From:</h6>
											<select name="Chatfrom" id="ChatFrom" class="select2 proInputText"></select>
										</li>
										
										<li><h6>To:</h6>
											<select name="Chatto" id="ChatTo" class="select2 proInputText"></select>
										</li>

									</div>
									<?php } ?>


									<!-- <div class="div-rpt-type" id="divReportSchedule" style="display: none">
										<li><h6>User:</h6>
										<select name="ScheduleUser" id="ScheduleUser" style="width: 100%;margin-right: 0%;margin-left: 0px;" class=" proInputText"></select>
										</li>
										
										
									</div> -->

										<!-- <div class="div-rpt-type" id="divReportAnalytical" style="display: none">
										<h6>Analytical Type</h6>
										<div class="cls-analtype bor-rad">
											<li onclick="changeAnalyticalType(this)"><a>Gantt Chart</a></li>
											<li onclick="changeAnalyticalType(this)"><a>Pie Chart</a></li>
											
										</div>
									</div> -->

									<div id="divReportDatePick" style="display: none;">
										<li><h6>Start Date:</h6>
										<input placeholder="Select Date.." onclick="togglecalendar_startPro(this)" type="text" id="startDatein" name="mydate" class="proInputText" data-dateformat="M d yy"  value=""></li>
										

										<li><h6>Due Date:</h6>
										<input onclick="togglecalendar_endPro(this)" type="text" id="endDatein" placeholder="Select Date.." name="mydate" class="proInputText" data-dateformat="M d yy" value="">
										</li>

									</div>


									

									<li onclick="generatePreview()" style="margin-top: 10px;">
										<button class="btn-success form-control bor-rad">Preview</button>
									</li>

									</ul>
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

		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>asset/js/plugin/Guriddo_jqGrid_JS_5_2_X_demo/css/trirand/ui.jqgrid.css" />

		<script type="text/javascript" src="<?php echo base_url();?>asset/js/plugin/Guriddo_jqGrid_JS_5_2_X_demo/js/trirand/jquery.jqGrid.min.js"></script>

  

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>

		<!-- <script type="text/javascript" src="<?php echo base_url();?>asset/js/plugin/csv/jquery.csv.min.js"></script> -->

		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

		
 <script type="text/javascript" src="<?php echo base_url();?>asset/js/plugin/dataTables.treeGrid/dataTables.treeGrid.js"></script>

 
		
	</body>
</html>


<script type="text/javascript">
	var allusers = <?php echo json_encode($allusers); ?>;
	
	$.each(allusers, function (key, value) {
		
		$("#ChatFrom").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
		$("#ChatTo").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
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

	// function insertNewReport(data){
		
	// 	var now = moment(data.Startdate); //todays date
	// 	var end = moment(data.Enddate); // another date
	// 	var duration = moment.duration(end.diff(now));
	// 	var days = duration.asDays();

	// 	var newrow=' <tr class="taskRow taskRowCus">'
	// 	+ '<td onclick="export_project_csv('+data.Id+')"><i class="fa fa-download" aria-hidden="true"></i></td>'
	// 	+ '<td title="'+data.title+'">'+data.title+'</td>'
	// 	+ '<td>'+moment(data.Startdate).format('MMM-DD-YYYY')+'</td>'
	// 	+ '<td title="'+Math.floor(days)+' days">'+Math.floor(days)+' day(s)</td>'
	// 	+ '<td title="'+data.hour+' hour(s)">'+data.hour+' hour(s)</td>'
	// 	+ '<td>'+moment(data.Enddate).format('MMM-DD-YYYY')+'</td>'
	// 	+ '<td>'+data.Status+'</td>'
	// 	+ '<td title="'+data.tag_names+'">'+data.tag_names+'</td>'
	// 	+'</tr>';

	// 	return $(newrow);

	// 	//$('#report_body').append(newrow);
	// }

	function insertNewReport(data){
		console.log('insertNewReport',data);
		var now = moment(data.Startdate); //todays date
		var end = moment(data.Enddate); // another date
		var duration = moment.duration(end.diff(now));
		var days = duration.asDays();

		var created_date=moment(data.CreatedDate).format('MMM-DD-YYYY');
		var completed_date=moment(data.CompletedAt).format('MMM-DD-YYYY');
		var modify_date=moment(data.LastModified).format('MMM-DD-YYYY');
		var due_date=moment(data.Enddate).format('MMM-DD-YYYY');

		var newrow=' <tr class="taskRow taskRowCus">'
		
		+ '<td title="'+data.Id+'">'+data.Id+'</td>'
		+ '<td>'+(created_date != "Invalid date"  ? created_date : "")+'</td>'
		+ '<td>'+(completed_date != "Invalid date" ? completed_date : "")+'</td>'
		+ '<td>'+(modify_date != "Invalid date" ? modify_date : "")+'</td>'
		+ '<td>'+data.Title+'</td>'
		+ '<td>'+(data.tag_names != null ? data.tag_names : "")+'</td>'
		+ '<td>'+(due_date != "Invalid date" ? due_date : "")+'</td>'
		+ '<td></td>'
		+ '<td>'+(data.Description != null ? data.Description : "")+'</td>'
		+ '<td>'+data.parent2+'</td>'
		+ '<td>'+data.parent1+'</td>'
		+ '<td onclick="export_project_csv('+data.Id+')"><i class="fa fa-download" aria-hidden="true"></i></td>'
		+'</tr>';

		return $(newrow);

		//$('#report_body').append(newrow);
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

	function generatePreview(){
		// datatable.ajax.reload();
		// return;
		
		if(fpstart.selectedDates.length>0 && fpend.selectedDates.length>0){
			var arr_assg=$('#sel_assgn').val();
				console.log("arr_assg",arr_assg);
			//if(moment(fpend.selectedDates[0]).isBefore(moment(fpstart.selectedDates[0]))){
				var request = $.ajax({
					url: base_url+"report/getReport",
					method: 'POST',
					data: {
						range: $('.cls-daterange .active a').text(),
						type: $('#report_type').val(),
						start_date: moment(fpstart.selectedDates[0]).format('YYYY-MM-DD'),
						end_date: moment(fpend.selectedDates[0]).format('YYYY-MM-DD'),
						assg: arr_assg
					},
					dataType: 'JSON'
				});
				request.done(function(response){
					console.log("generatePreview",response);
					//$('#report_table').empty(); 

					$('#report_body').empty();
					
					datatable.clear();
					$.each(response.data, function(k,v){

						if(arr_assg != null){

							if(v.tag_ids != null){

								var arr_tag=v.tag_ids.split(",");
								$.each(arr_tag,function(k2,v2){
									
									if(arr_assg.indexOf(v2) != -1){
										datatable.row.add(insertNewReport(v));
										return false;
									}

								});
							}
						}else{
							datatable.row.add(insertNewReport(v));
						}

					});

					datatable.column( 9 ).visible( true );
					datatable.column( 10 ).visible( true );
					

					if($('#report_type').val()=="Project"){
						datatable.column( 9 ).visible( false );
						datatable.column( 10 ).visible( false );
						datatable.column( 11 ).visible( true );

					}else if($('#report_type').val()=="Task"){
						datatable.column( 9 ).visible( false );
						datatable.column( 11 ).visible( false );
					}else if($('#report_type').val()=="Todo"){
						datatable.column( 9 ).visible( false );
						datatable.column( 10 ).visible( false );
						datatable.column( 11 ).visible( false );
					}
					else{
						datatable.column( 11 ).visible( false );
					}
					datatable.draw();
					$('#btn_process').hide();
					

					
				});
				request.fail(function(response){
					console.log(response.responseText);
					
				});
				//}else{swal('Please select valid date range !');}
			}else{
				swal('Please select date range !');
			}
		

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
	    	$('.filterDiv').show();
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
	var allTaskList = <?php echo json_encode($allTaskList); ?>;	
	var allSubTaskList = <?php echo json_encode($allSubTaskList); ?>;	
	var allTodoList = <?php echo json_encode($allTodoList); ?>;	

	function changeReportTypeList(element){
		$("#sel_typelist").empty();
		if($(element).val()=="Project"){
			$.each(allProjectList, function (key, value) {

				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');


			});
		}

		if($(element).val()=="Task"){
			$.each(allTaskList, function (key, value) {

				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');


			});
		}
		if($(element).val()=="SubTask"){
			$.each(allSubTaskList, function (key, value) {

				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');


			});
		}
		if($(element).val()=="Todo"){
			$.each(allTodoList, function (key, value) {

				$("#sel_typelist").append('<option value="' + value.Id + '" >' + value.Title + '</option>');


			});
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
        
   //         jQuery('#jqGrid').jqGrid({
			// 	"url":"data.json",
			// 	"colModel":[
			// 		{
			// 			"name":"category_id",
			// 			"index":"accounts.account_id",
			// 			"sorttype":"int",
			// 			"key":true,
			// 			"hidden":true,
			// 			"width":50
			// 		},{
			// 			"name":"name",
			// 			"index":"name",
			// 			"sorttype":"string",
			// 			"label":"Name",
			// 			"width":170
			// 		},{
			// 			"name":"price",
			// 			"index":"price",
			// 			"sorttype":"numeric",
			// 			"label":"Price",
			// 			"width":90,
			// 			"align":"right"
			// 		},{
			// 			"name":"qty_onhand",
			// 			"index":"qty_onhand",
			// 			"sorttype":"int",
			// 			"label":"Qty",
			// 			"width":90,
			// 			"align":"right"
			// 		},{
			// 			"name":"color",
			// 			"index":"color",
			// 			"sorttype":"string",
			// 			"label":"Color",
			// 			"width":100
			// 		},{
			// 			"name":"lft",
			// 			"hidden":true
			// 		},{
			// 			"name":"rgt",
			// 			"hidden":true
			// 		},{
			// 			"name":"level",
			// 			"hidden":true
			// 		},{
			// 			"name":"uiicon",
			// 			"hidden":true
			// 		}
			// 	],
			// 	"width":"780",
			// 	"hoverrows":false,
			// 	"viewrecords":false,
			// 	"gridview":true,
			// 	"height":"auto",
			// 	"sortname":"lft",
			// 	"loadonce":true,
			// 	"rowNum":2,
			// 	"scrollrows":true,
			// 	// enable tree grid
			// 	"treeGrid":true,
			// 	// which column is expandable
			// 	"ExpandColumn":"name",
			// 	// datatype
			// 	"treedatatype":"json",
			// 	// the model used
			// 	"treeGridModel":"nested",
			// 	// configuration of the data comming from server
			// 	"treeReader":{
			// 		"left_field":"lft",
			// 		"right_field":"rgt",
			// 		"level_field":"level",
			// 		"leaf_field":"isLeaf",
			// 		"expanded_field":"expanded",
			// 		"loaded":"loaded",
			// 		"icon_field":"icon"
			// 	},
			// 	"sortorder":"asc",
			// 	"datatype":"json",
			// 	"pager":"#jqGridPager"
			// }); 


	function export_pdf_btn(element){
		$('.buttons-pdf').click();
	}

	function export_excel_btn(element){
		$('.buttons-excel').click();
	}

	function export_csv_btn(element){
		$('.buttons-csv').click();
// 		$("#jqGrid").jqGrid('exportToCsv', {
//   separator: ",",
//   separatorReplace : " ",
//   quote : '"',
//   escquote : '"',
//   newLine : "\r\n",
//   replaceNewLine : " ",
//   includeCaption : true,
//   includeLabels : true,
//   includeGroupHeader : true,
//   includeFooter: true,
//   fileName : "jqGridExport.csv",
//   mimetype : "text/csv;charset=utf-8",
//   returnAsString : false
// });
	}

	function report_print_btn(element){
		$('.buttons-print').click();
	}
      
 
   </script>