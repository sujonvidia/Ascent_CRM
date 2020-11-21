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
		
		.proDiv {
			border-radius: 8px;
			margin-bottom: 16px;
			height: 615px;
			overflow-y: auto;
		}
		/*#report_table{
			width: 100%;
			white-space: nowrap;
			overflow-x: auto;
			
			margin-top: 10px;
			
		}*/
		#report_table{
			width: 100%;
			/*table-layout: fixed;*/
			
		}
		/*#report_table tbody{
			border-bottom: 2px solid #ED7D31;
		}*/
		#report_table tbody>tr:last-child>td{
			border-bottom: 1px solid #ED7D31;
		}

		/*#report_table tbody:last-child>tr>td
		{
			border-bottom:none;
		}*/

		#report_table tbody td{
			overflow: hidden;
			text-overflow: ellipsis;
			/*white-space: nowrap;*/
			
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

	<script type="text/javascript" src="<?php echo base_url();?>asset/js/google/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {packages: ['corechart']});     
	</script>

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

						<!-- <li id="rpt_filters" title="Filter">
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

						<div class="col-lg-12 reportDiv" style="display: none">
							<i onclick="closeReport(this)" class="fa fa-times hvr-glow clasI pull-right" aria-hidden="true"></i>

							<div class="panel panel-default proDiv">

								<div id="report_panel" class="panel-body">

									<div id="section_list" style="margin-top: 10px;border: 1px solid #ccc;">
										<table class="table-striped table-bordered table-hover bor-rad" id="report_table">

											<thead>
												<tr>
													<td>Project</td>
													<td>Task</td>
													<td>Sub-task</td>
													<td>Start Date</td>
													<td>Due Date</td>
													<td>Assigned to</td>
													<td>Assigned Hours</td>
													<td>Assigned Hours per person</td>
												</tr>
											</thead>

											<tfoot style="display: none">
												<tr>
													<td colspan="8">Nothing found...</td>
												</tr>

											</tfoot>

										</table>
									</div>

									<div id="section_person" style="margin-top: 10px;border: 1px solid #ccc;"> 
										<table class="table table-striped table-bordered table-hover" id="person_table">

											<thead>
												<tr>
													<td>Personnel</td>
													<td>Date Range</td>
													<td>Working Hours</td>
													<td>Allocated</td>
													<td>Free Hours</td>

												</tr>
											</thead>

											<tfoot style="display: none">
												<tr>
													<td colspan="100">Nothing found...</td>
												</tr>

											</tfoot>

											<tbody>

											</tbody>

										</table>
									</div>

									<div id="section_chart" style="margin-top: 10px;border: 1px solid #ccc;">
										<div id="chartcontainer1" style="width: 50%; display: inline-block;"></div>
										<div id="chartcontainer2" style="width: 49%; display: inline-block;"></div>
									</div>

								</div>
							</div>
						</div>

						<div class="col-lg-12 filterDiv">

							<div class="panel panel-default proDiv" >

								<form class="" style="width: 60%;margin-left: 20%;border:1px solid #ccc;border-radius: 8px;margin-top: 5%;">
									
									<div class="panel panel-head">

										<h3 class="no-float txt-color-blueDark">
											<span><?php echo "Workforce Analysis Reports"; ?></span>

										</h3>

									</div>

									<div class="panel-body" style="padding:15px">

										<div class="div-rpt-assgn" id="divReportAssgn">
											<div class="row">
												<div class="form-group col-lg-6">
													<label><b>From Date:</b></label>
													<input placeholder="Select date" class="form-control" type="text" id="wf_DateFrom" name="startdate">
												</div>

												<div class="form-group col-lg-6">
													<label><b>To Date:</b></label>
													<input placeholder="Select date" class="form-control" type="text" id="wf_DateTo" name="enddate">
												</div>
												<div class="form-group col-lg-12">
													<span>Keep blank to search for the entire date range data or select dates to specify date range of the report</span>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-lg-12">
													<label><b>User:</b></label>
													<select class="col-lg-12 proInputText" id="sel_assgn" name="sel_assgn">
														<option></option>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-lg-12">
													<button type="button" onclick="generatePreview()" style="background-color: #152940;" class="btn-success form-control bor-rad">Preview</button>

												</div>
											</div>


										</div>

									</div>
								</form>

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


	</body>
	</html>


	<script type="text/javascript">
		// init
		var wf_DateFrom;
		var wf_DateTo;
		var minDate;
		var maxDate;
		var chart_column;
		var chart_column_data;

		var chart_area;
		var chart_area_data;

		var fp_datefrom = flatpickr("#wf_DateFrom", {
			enableTime: false,
			dateFormat: 'M-d-Y',
			//clickOpens:false,
			//minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
			//maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),

			onChange: function(selectedDates, dateStr, instance) {
				//thisValue(selectedDates[0],item.Id,'startDatein','duration','task');

			}
		});

		var fp_dateto = flatpickr("#wf_DateTo", {
			enableTime: false,
			dateFormat: 'M-d-Y',
			//clickOpens:false,
			//minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
			//maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),

			onChange: function(selectedDates, dateStr, instance) {
				//thisValue(selectedDates[0],item.Id,'startDatein','duration','task');

			}
		});

		var allusers = <?php echo json_encode($allusers); ?>;
		var arrDates=[];
		var arrPublic_wf=[];
		var arrManual_wf=[];
		var arrTotalHoliday_wf=[];
		var ajaxMax;
		var ajaxCounter;


		$.each(allusers, function (key, value) {

			$("#sel_assgn").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');

		});

		$('#sel_assgn').select2({placeholder: "Select user",allowClear: true});

		var enumerateDaysBetweenDates = function(startDate, endDate) {
			var now = startDate.clone(), dates = [];

			while (now.isBefore(endDate) || now.isSame(endDate)) {
				dates.push(now.format('D MMM YYYY'));
				now.add('days', 1);
			}
			return dates;
		};


		function drawReport(data){
			$('#report_table tfoot').hide();
			console.log('drawReport:',data);
			var start_date,due_date;

			if(moment(data.Startdate).isValid()){
				start_date=moment(data.Startdate).format('D-MMM');
				arrDates.push(moment(data.Startdate,'YYYY-MM-DD HH:mm:ss'));

			}else{start_date=''}

			if(moment(data.Enddate).isValid()){
				due_date = moment(data.Enddate).format('D-MMM');
				arrDates.push(moment(data.Enddate,'YYYY-MM-DD HH:mm:ss'));
			}else{due_date=''}

			var tagassNames=null;

			if(data.tag_names) tagassNames=data.tag_names.split(",");
			var personhour=(Number(data.AssignHourPerson)/tagassNames.length).toFixed(2);

			var newrow=' <tr data-tagids="'+data.tag_ids+'">'

			+ '<td title="'+data.Project+'">'+data.Project+'</td>'
			+ '<td title="'+data.Task+'">'+data.Task+'</td>'
			+ '<td title="'+data.Subtask+'">'+data.Subtask+'</td>'
			+ '<td title="'+start_date+'">'+start_date+'</td>'
			+ '<td title="'+due_date+'">'+due_date+'</td>'
			+ '<td title="'+data.tag_names+'">'+tagassNames.join("<br />")+'</td>'
			+ '<td title="'+data.AssignHour+'">'+data.AssignHour+'</td>'
			+ '<td class="AssignHourPerson" title="'+personhour+'">'+personhour+'</td>'

			+'</tr>';

			$('#pro_'+data.proId).append(newrow);
		}

		var reportPage="<?php echo $page_title; ?>";

		function generatePreview(){
			if($('#sel_assgn').val()==""){
				swal("Please select an user");
				return;
			}
			$('#section_list').hide();
			$('#section_person').hide();
			$('#section_chart').hide();

			wf_DateFrom=moment($('#wf_DateFrom').val(),'MMM-DD-YYYY');
			wf_DateTo=moment($('#wf_DateTo').val(),'MMM-DD-YYYY');

			arrDates=[];

			var getproject_url = "<?php echo (isset($shared_activity_id))?"guest_users/get_share_projects/".$id."/".$share_project_id:"Report/getprojectUser"; ?>";

			$.ajax({
				url: '<?php echo site_url(); ?>'+getproject_url,
				dataType: "JSON",
				method: 'POST',
				data: {
					"user_id": $('#sel_assgn').val(),
					start_date: wf_DateFrom.format('YYYY-MM-DD'),
					end_date: wf_DateTo.format('YYYY-MM-DD'),
				},
				beforeSend: function () {
					$('#report_table tbody').remove();

				},
				success: function (data, textStatus) {
					console.log('generatePreview',data);
					$('#report_table tfoot').show();
					$('#section_list').show();

					if(data.projects.length > 0){ // project found

						$.each(data.projects, function (key_pro, val_pro) {

							var $tbody = $('<tbody id="pro_'+val_pro.Id+'"></tbody>');
							$("#report_table").append($tbody);

							if(val_pro.tasklist.length > 0){ // tasks found
								

								$.each(val_pro.tasklist, function (key_task, val_task) {

									if(val_task.subtasklist.length>0){ // subtasks found

										$.each(val_task.subtasklist, function (key_subtask, val_subtask) {

											drawReport({
												proId:val_pro.Id,
												Project:val_pro.Title,
												Task:val_task.Title,
												Subtask:val_subtask.Title,
												Startdate:val_subtask.Startdate,
												Enddate:val_subtask.Enddate,
												tag_names:val_subtask.tag_names,
												tag_ids:val_subtask.tag_ids,
												AssignHour:val_subtask.hour,
												AssignHourPerson:val_subtask.hour
											});

										});

									}else{ // subtasks not found

										drawReport({
											proId:val_pro.Id,
											Project:val_pro.Title,
											Task:val_task.Title,
											Subtask:"",
											Startdate:val_task.Startdate,
											Enddate:val_task.Enddate,
											tag_names:val_task.tag_names,
											tag_ids:val_task.tag_ids,
											AssignHour:val_task.hour,
											AssignHourPerson:val_task.hour
										});

									}

								});
							}else{ 	//tasks not found


								// drawReport({
									// 	proId:val_pro.Id,
									// 	Project:val_pro.Title,
									// 	Task:"",
									// 	Subtask:"",
									// 	Startdate:val_pro.Startdate,
									// 	Enddate:val_pro.Enddate,
									// 	tag_names:''
									// });

								}


							});


					}else{ // projects not found

						$('#report_table tfoot').show();

					}

					drawPersonTable();

				},
				complete: function (data, textStatus) {

				},
				error: function (e) {
					console.log(e.responseText);
				}
			}); 

			$('.reportDiv').attr('class','col-lg-12 reportDiv').show();
			$('.filterDiv').attr('class','col-lg-9 filterDiv').hide();

			$('#div_upload').hide();
			$('#report_table').show();


		}


		function drawPersonnel(minDate,maxDate,userdata,val_usr,data_gcal){
			
			arrPublic_wf=[];

			for (item in data_gcal.items) {

				arrPublic_wf.push(moment(data_gcal.items[item].start.date).format('D MMM YYYY'));

			}

			$.each(userdata.DBHoliday,function(i,holi){

				var index = arrPublic_wf.indexOf(moment(holi.Startdate,'YYYY-MM-DD HH:mm:ss').format('D MMM YYYY')); 
				console.log('index',index);
				if (index != -1) arrPublic_wf.splice(index, 1);

			});

			arrManual_wf=[];

			$.each(userdata.DBManual,function(i,holim){

				var manualdates=enumerateDaysBetweenDates(moment(holim.Startdate,'YYYY-MM-DD HH:mm:ss'),moment(holim.Enddate,'YYYY-MM-DD HH:mm:ss'));

				arrManual_wf=arrManual_wf.concat(manualdates);

			});

			arrTotalHoliday_wf=arrPublic_wf.concat(arrManual_wf);

			var arr_wkday=['Sun','Mon','Tue','Wed','Thu'];
			var ps_workhour=8;

			if(userdata.DBSetting.Weekdays){
				arr_wkday=userdata.DBSetting.Weekdays.split(",");
			}

			if(userdata.DBSetting.HoursPerDay){
				ps_workhour=Number(userdata.DBSetting.HoursPerDay);
			}

			var cal_weekday=	moment().weekdayCalc({  
				rangeStart: moment(minDate).format('D MMM YYYY'),  
				rangeEnd: moment(maxDate).format('D MMM YYYY'),  
				weekdays: arr_wkday,  
				exclusions: arrTotalHoliday_wf

			});

			var totWorkHour=cal_weekday * ps_workhour;
			var allocatedHour=0;

			$('#report_table').find('[data-tagids]').each(function(i,v){
				var arIds=$(v).attr('data-tagids').split(',');

				$.each(arIds,function(i3,usrid){
					if(parseInt(val_usr)==parseInt(usrid)) {

						allocatedHour+=Number($(v).find('.AssignHourPerson').text());
					}
				});

			});

			var freeHour=(totWorkHour-allocatedHour).toFixed(2);

			var newuser=''+
			'<tr>'+
			'<td class="pr_name">'+ userdata.DBSetting.display_name+'</td>'+
			'<td>'+ moment(minDate).format('D-MMM') +' till ' + moment(maxDate).format('D-MMM')+'</td>'+
			'<td class="pr_totalworkhour">'+totWorkHour+'</td>'+
			'<td class="pr_allocated">'+allocatedHour+'</td>'+
			'<td class="pr_freehour">'+freeHour+'</td>'+
			'</tr>';
			$('#person_table tbody').append(newuser);


			if(++ajaxCounter >= ajaxMax){
				google.charts.setOnLoadCallback(drawCharts);

			}

			//	}

		}

		function drawCharts() {
			// Define the chart to be drawn.

			chart_column = new google.visualization.ColumnChart(document.getElementById('chartcontainer1'));

			google.visualization.events.addListener(chart_column,'ready',function(){

				var tooltipText = $('#chartcontainer1 > div > div > svg > g > g').find('text');
				var otherText = $('#chartcontainer1 g > text');
				var titleText = $('#chartcontainer1 g > text').first();

				var textStyle = {'font-family':'"NavigateFont","Open Sans",Arial,Helvetica,Sans-Serif'};

				var titlePos = {x:Number((($("#chartcontainer1 svg").width() - titleText.width()) / 4).toFixed(0)),y:30};

				titleText.attr(titlePos);
				tooltipText.css(textStyle);
				otherText.css(textStyle);

			});

			chart_column_data = new google.visualization.DataTable();
			chart_column_data.addColumn('string', 'Personnel');
			chart_column_data.addColumn('number', 'Working Hours');
			chart_column_data.addColumn('number', 'Allocated');
			chart_column_data.addColumn('number', 'Free Hours');

			chart_area_data = new google.visualization.DataTable();
			chart_area_data.addColumn('string', 'Personnel');
			chart_area_data.addColumn('number', 'Allocated');
			chart_area_data.addColumn('number', 'Free Hours');

			$('#person_table tbody tr').each(function(pi,pv){
				var arrRow=[];

				arrRow.push($(pv).find('.pr_name').text());
				arrRow.push(Number($(pv).find('.pr_totalworkhour').text()));
				arrRow.push(Number($(pv).find('.pr_allocated').text()));
				arrRow.push(Number($(pv).find('.pr_freehour').text()));
				chart_column_data.addRow(arrRow);

				var arrRow2=[];

				arrRow2.push($(pv).find('.pr_name').text());
				arrRow2.push(Number($(pv).find('.pr_allocated').text()));
				arrRow2.push(Number($(pv).find('.pr_freehour').text()));
				chart_area_data.addRow(arrRow2);

			});


			var options_column = {
				title: 'Workforce Analysis - Bar Chart',
				titleTextStyle: {
					color: 'black',    // any HTML string color ('red', '#cc00cc')
					//fontName: 'NavigateFont', // i.e. 'Times New Roman'
					fontSize: '18', // 12, 18 whatever you want (don't specify px)
					bold: true,    // true or false
					italic: false   // true of false
				},
				tooltip: { textStyle: { fontName: '"NavigateFont","Open Sans",Arial,Helvetica,Sans-Serif', fontSize: 12 } },
				colors: ['#5B9BD5','#ED7D31', '#A5A5A5'],
				'chartArea': { left: '10%', top: '10%', width: "80%", height: "80%" },
				'legend': {'position': 'bottom',alignment: 'center'},
				width: 570, 
				height: 570

			};  

			chart_column.draw(chart_column_data, options_column); // Instantiate and draw the chart.

			// area chart ::: 
			chart_area = new google.visualization.AreaChart(document.getElementById('chartcontainer2'));

			google.visualization.events.addListener(chart_area,'ready',function(){

				var tooltipText = $('#chartcontainer2 > div > div > svg > g > g').find('text');
				var otherText = $('#chartcontainer2 g > text');
				var titleText = $('#chartcontainer2 g > text').first();

				var textStyle = {'font-family':'"NavigateFont","Open Sans",Arial,Helvetica,Sans-Serif'};

				var titlePos = {x:Number((($("#chartcontainer2 svg").width() - titleText.width()) / 4).toFixed(0)),y:30};

				titleText.attr(titlePos);
				tooltipText.css(textStyle);
				otherText.css(textStyle);

			});

			var options_area = {
				title: 'Workforce Analysis - Stacked Chart',
				titleTextStyle: {
					color: 'black',    // any HTML string color ('red', '#cc00cc')
					//fontName: 'NavigateFont', // i.e. 'Times New Roman'
					fontSize: '18', // 12, 18 whatever you want (don't specify px)
					bold: true,    // true or false
					italic: false   // true of false
				},
				tooltip: { textStyle: { fontName: '"NavigateFont","Open Sans",Arial,Helvetica,Sans-Serif', fontSize: 12 } },
				colors: ['#4472C4', '#A7B4DB'],
				'chartArea': { left: '10%', top: '10%', width: "80%", height: "80%" },
				'legend': {'position': 'bottom',alignment: 'center'},
				width: 570, 
				height: 570,
				isStacked: true

			}; 

			console.log('chart_area_data',chart_area_data);

			chart_area.draw(chart_area_data, options_area);

			$('#section_chart').show();

			// chart_area_data.addRows([
			//        ['Anwar', 128.33,923.67],
			//        ['Maher', 27.3,1029.67],
			//        ['Sadeq', 313.3,748.67]

			//      ]);

		}

		function drawPersonTable(){
			$('#person_table tbody').html('');

			if(wf_DateFrom.isValid()){

				minDate= wf_DateFrom;
				
			}
			else{
				minDate= moment(Math.min.apply(null,arrDates));
				
			}

			if(wf_DateTo.isValid()) maxDate= wf_DateTo;
			else maxDate= moment(Math.max.apply(null,arrDates));

			var diffDays = moment.duration(maxDate.diff(minDate)).asDays();

			var arrUserIds=[];

			$('#report_table').find('[data-tagids]').each(function(i,v){

				var arrIds=$(v).attr('data-tagids').split(',');

				$.each(arrIds,function(i2,userid){
					if(arrUserIds.indexOf(userid) == -1) arrUserIds.push(userid); // add if not added
				});

			});

			ajaxMax = arrUserIds.length;
			ajaxCounter = 0;

			if(arrUserIds.length>0) $('#section_person').show();
			else $('#section_person').hide();

			$.each(arrUserIds,function(key_usr,val_usr){

				$.ajax({
					url: '<?php echo site_url('report/getUserSettings'); ?>',
					type: 'POST',
					//async:false,
					beforeSend: function() {

					},
					data: {
						val_usr: val_usr,

					},
					dataType: "JSON",
					success : function(data) {

						console.log('getUserSettings',data);

						var tstart= moment(minDate).format('YYYY-MM-DD');
						var tend= moment(maxDate).format('YYYY-MM-DD');

						selcountry=(data.HolidayCalendar);

						var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/en.' +  selcountry + '%23holiday%40group.v.calendar.google.com/events?key=AIzaSyCsKVDaSG0NHGILAok4LrTXm0o_nGId2H0&timeMin='+tstart+'T00:00:00Z&timeMax='+tend+'T23:59:59Z&singleEvents=true&orderBy=startTime';

						
							$.getJSON(calendarUrl).success(function(data_gcal) {
								
								drawPersonnel(minDate,maxDate,data,val_usr,data_gcal);


							}).error(function(error) {
								swal("An error occurred.");
							});

						},
						complete: function (jqXHR, status) {



						},

						error: function (jqXHR, status, err) {
							console.log(jqXHR.responseText);console.log(status);console.log(err);
						}


					});


			});

		}

		function closeReport(element){
			$('.reportDiv').attr('class','col-lg-9 reportDiv').hide();
			$('.filterDiv').attr('class','col-lg-12 filterDiv').show();

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

		$('#report_body').on( 'click','.treegrid-control-title', function (e) {	

			console.log('.click()',$($(this).siblings()[0]).click());

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


		var allProjectList = <?php echo json_encode($allProjectList); ?>;	
		var allTaskList = <?php echo json_encode($allTaskList); ?>;	
		var allSubTaskList = <?php echo json_encode($allSubTaskList); ?>;	
		var allTodoList = <?php echo json_encode($allTodoList); ?>;	


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
