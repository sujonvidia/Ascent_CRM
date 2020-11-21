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
		
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/js/plugin/fullcalendar-2.3.1/fullcalendar.min.css"> -->
		
		
		<style type="text/css">
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
		</style>
		<style>
			/* added by sujon */
			.goto_today_link{
			border:none !important;
			color: black !important;
			background-color: transparent !important;
			cursor: pointer;
			text-decoration: underline; 
			}
			.fc-today-button:hover{
			background-color: transparent  !important;
			text-decoration: underline; 
			}
			.fc-right{
			position: absolute;
			left: 32%;
			top: 87%;
			font-size: 11px;
			}
			.type-color{
			padding: 0px 10px 0px 10px;
			margin: 0px 2px 0px 2px;
			}
			.dropdown-bkcolor-view label{
			cursor: pointer;
			}
			.fc-toolbar > div > h2{
			cursor: pointer;
			}
			.jarviswidget-color-blue > header {
			border-color: white !important;
			background: white;
			color: black;
			}
			.no-float{
			float: none;
			margin: 12px 0 28px;
			margin-left: 5%;
			}
			.font-color{
			color: #c5c5c5;
			font-size: 15px;
			}
			.todo{
			list-style: none;
			}
			.todoDiv .dropdown-menu-footer{
			background-color: rgb(196, 196, 196);
			
			}
			.todo .dropdown-menu{
			margin-right: -6px;
			margin-top: 10px;
			padding-bottom:0px;
			}
			.todo .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
			background: #868686;
			}
			.todo li{
			cursor:pointer}
			.fa-category-gray{
			color: #c5c5c5;
			}
			.fa-category-red{
			color: red;
			padding:10px;
			}
			.fa-category-orange{
			color: orange;
			padding:10px;
			}
			.fa-category-blue{
			color: blue;
			padding:10px;
			}
			.bottom-border{
			border-bottom: 1px solid #eaeaea;
			}
			.proDiv .panel-footer{
			background-color: transparent;
			border-top: none;
			}
			.calendar_date{
			font-size: large;
			}
			.calendar_day{
			font-size: smaller;
			}
			.calendar_event{
			color: white;
			background-color:#c5c5c5;
			padding:5px;
			
			}
			
			.calendar_birthday{
			color: white;
			background-color:#686868;
			padding:5px;
			margin-top: 5px;
			
			}
			
			.calendar_full{
			margin-bottom: 20px;
			cursor: pointer;
			}
			.calendar_event:hover{
			background-color: #F1D031 !important;
			}
			.event_name{
			font-weight: bold;
			overflow: hidden;
		    white-space: nowrap;
		    text-overflow: ellipsis;
		    width: 100%;
		    display: inline-block;
			}
			.border-rad{
			-webkit-border-radius: 8px !important;
			-moz-border-radius: 8px !important;
			border-radius: 8px !important;
			background-image: url('asset/img/icons/plusIcon.png');
			background-position-y: 3px;
			background-repeat: no-repeat;
			height: 32px;
			padding-left: 30px;
			background-size: 18px 18px;
			font-size: 16px;
			background-position: 6px 6px;
			}
			.icon-check{
			width:16px;
			height:16px;
			margin-right: 10px;
			}
			
			.icon-todo-menu{
			width:32px;
			height:32px;
			margin-left: 10px;
			cursor: pointer;
			}
			.todo-heading{
			text-align:center;
			color:black !important;}
			.todoDiv{
			margin-top: 10px;
			}
			.margin-topdown{
			margin-top: 10px;
			margin-bottom: 10px;
			}
			#DueDateSpan{
			color:black ;
			font-size:16px;
			margin-left: 5px;
			}
			
			.arrow-position-view{
			margin-left:3%;
			
			}
			.arrow-position-calendar{
			margin-left:5%;
			margin-top: -10px;
			
			}
			.arrow-position-category{
			margin-left: 82%;
			margin-top: -10px;
			}
			.dropdown-bkcolor-view{
			background-color:#B3B3B3;
			color:white;
			margin-top: 8px;
			}
			#todoViewDiv{
			margin-top: 8px;
			}
			.dd-tog-view{
			color:black;
			font-size: 15px;
			
			}
			
			.add-border{
			border: solid 2px #D1D1D1;
			width: 520px;
			margin-left: -50px;
			}
			.date-title{
			
			padding:5px;
			color:black;
			
			}
			.dropdown-toggle{
			
			cursor: pointer;
			}
			
			.close-da-picker{
			float:right;
			cursor:pointer;
			color:#D1D1D1;
			}
			.alarmset-text{
			font-size: 14px;
			color: black;
			}
			.date-alarm-picker{
			padding: 10px;
			height: 300px;
			}
			.clockpicker-inp{
			height: 60px;
			}
			.btn-picker-add{
			background-color:#27B6BA;
			color:white;
			width: 100%;
			
			}
			.btn-picker-remove{
			background-color:#E1E8EC;
			color:black;
			
			width: 100%;
			
			}
			.add-margin{
			margin-top: 10px;
			}
			.sel-repeat-alarm{
			height: 50px;
			}
			.alarmpickerDiv{
			position: relative;
			top: 27px;
			}
			span.flatpickr-weekday{
			background: white;
			}
			.flatpickr-month{
			background: white;
			color: #1bbc9b;
			fill: black;
			}
			.flatpickr-prev-month{
			background: #E6E8EC;
			}
			.flatpickr-next-month{
			background: #E6E8EC;
			}
			.flatpickr-calendar{
			width: auto
			}
			
			
			.flatpickr-time{
			border: solid 2px #D1D1D1 !important;
			position: relative;
			top: -180px;
			left: 262px;
			width: 195px;
			z-index: 1000;
			border-radius: 5px;
			max-height: 60px;
			}
			.flatpickr-calendar.dateIsPicked.hasTime .flatpickr-time{
			height: 60px;
			}
			.flatpickr-time input{
			font-size: 20px;
			}
			.flatpickr-time .numInputWrapper{
			height: 55px;
			}
			.flatpickr-time .flatpickr-am-pm {
			background: #E6E8EC;
			border-radius: 2px;
			margin: 2px;
			height: 50px;
			width: 50px;
			}
			.flatpickr-time .flatpickr-time-separator, .flatpickr-time .flatpickr-am-pm{
			padding-top: 9px;
			}
			.antosubmit{
			border-radius: 8px;
			width: 100px;
			background-color: #999999;
			border: none;
			font-size: 22px;
			padding: 0px;
			}
			.antoclose{
			border-radius: 8px;
			width: 100px;
			background-color: #E6E6E6;
			border: none;
			font-size: 22px;
			padding: 0px;
			color:white;
			}
			.ddm-duecalendar .dropdown-menu {
			margin-left: 12px;
			margin-top: 0px;
			}
			.ddm-duecalendar .arrow-top-right{
			margin-top: -16px;
			margin-left: 3%;
			border-bottom-color: #D1D1D1;
			}
			.close-entryform{
			font-size:3em;
			color:black;
			opacity: 1;
			}
			.fc-toolbar{
			position: relative;
			top: -95px;
			z-index: 101;
			left: 150px;
			width: 72%;
			margin: 0px;
			}
			.fc-view-container{
			margin-top: -42px;
			background-color: white;
			}
			#recentPanel{
			overflow-y: scroll;
			height: 486px;
			}
			#calendar{
			margin-top: 20px;
			}
			.ddm-calview .dropdown-menu-footer i{
			color:black !important;
			font-size: 12px;
			
			}
			.ddm-calview .dropdown-menu-footer{
			padding: 5px 0px;
			}
			.ddm-calview i{
			font-style: normal;
			}
			.main_abs{
			position: absolute !important;
			}
			
			
		</style>
		<style type="text/css">
			.loader {
			position: fixed; /* or absolute */
			top: 50%;
			left: 40%;
			z-index: 100;
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid blue;
			border-right: 16px solid green;
			border-bottom: 16px solid red;
			border-left: 16px solid pink;
			width: 120px;
			height: 120px;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
			}
			
			@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
			}
			
			@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
			}
			
			
		</style>
		<style type="text/css">
			#openProjectTaskDiv{
			color: #000000;
			background-color: #F1F1EF;
			border: 2px solid #C8C8CA;
			display: none;
			text-align: justify;
			position: fixed;
			top: 43%;
			left: 43%;
			z-index: 1111;
			width: 300px;
			height: auto;
			/*min-height: 250px;*/
			}
			#openProjectTaskDiv .optd{
			background: #C7CFD4;
			margin: 5px 0px;
			padding: 10px;
			/*font-size: 18px;*/
			}
			#opd, #otd {
			font-weight: bold;
			/*font-size: 18px;*/
			}
			#openProjectTaskListDiv{
			color: #000000;
			background-color: #F1F1EF;
			border: 2px solid #C8C8CA;
			display: none;
			text-align: justify;
			position: fixed;
			top: 43%;
			left: 43%;
			z-index: 11111;
			width: 300px;
			height: auto;
			}
			.optld-body p{
			padding: 10px;
			background: #CED0D4;
			}
			.optld-body p:hover{
			background: #27b6ba;
			}
			.dataTables_info{
			display: none !important;
			}
			.ui-tooltip, .qtip{
			max-width: 500px !important; /* Change this? */
			}
			.ui-tooltip{
			z-index: 99999999999999999 !important; /* added by sujon */
			}
			.high{
			background:#FFFFFF url(require/img/high.png) no-repeat 4px 4px;
			padding:4px 4px 4px 22px;
			height:18px;
			}​
			
			.low{
			background:#FFFFFF url(require/img/low.png) no-repeat 4px 4px;
			padding:4px 4px 4px 22px;
			height:18px;
			}​
			
			.urgent{
			background:#FFFFFF url(require/img/urgent.png) no-repeat 4px 4px;
			padding:4px 4px 4px 22px;
			height:18px;
			}​
			
			.normal{
			background:#FFFFFF url(require/img/normal.png) no-repeat 4px 4px;
			padding:4px 4px 4px 22px;
			height:18px;
			}​
			
			
		</style>
		
	</head>
	
	<body class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">
		
		<!-- HEADER -->
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
					<div class="col-lg-2">
						<li class="ddm-calview">
							<a href="#" class="dropdown-toggle dd-tog-view" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-caret-right"></i> View...</a>
							<ul class="dropdown-menu dropdown-bkcolor-view">
								<div class="arrow-top-right arrow-position-view"></div>
								
								<li onclick="fun_refresh_cal('chk_cal_event')">
									<!-- <label class="cb-checkbox">
										
										<input type="checkbox">
										
										Checkbox
										
									</label> -->
									
									<div>
										<label style="width: 100%;">
											<span class="type-color" style="">
												<input class="chk_cal_filter" id="chk_cal_event" type="checkbox" >
											</span>Event
										</label>
									</div>
									
									
								</li>
								
								<li onclick="fun_refresh_cal('chk_cal_todo')">
									<div>
										<label style="width: 100%;">
											<span class="type-color" style="">
												<input class="chk_cal_filter" id="chk_cal_todo" type="checkbox" >
											</span>
											To-Do
										</label>
									</div>
									<!-- <div class="[ form-group ]">
										<input type="checkbox" name="fancy-checkbox-info" id="fancy-checkbox-info" autocomplete="off">
										<div class="[ btn-group ]">
										<label for="fancy-checkbox-info" class="[ btn btn-info ]">
										<span class="[ glyphicon glyphicon-ok ]"></span>
										<span>&nbsp;</span>
										</label>
										<label for="fancy-checkbox-info" class="[ btn btn-default active ]">
										Info Checkbox
										</label>
										</div>
									</div> -->
								</li>
								
								<li onclick="fun_refresh_cal('chk_cal_task')">
									<div>
										<label style="width: 100%;">
											<span class="type-color" style="">
												<input class="chk_cal_filter" id="chk_cal_task" type="checkbox" >
											</span>Task
										</label>
									</div>
									<!-- <div class="[ form-group ]">
										<input type="checkbox" name="fancy-checkbox-primary" id="fancy-checkbox-primary" autocomplete="off">
										<div class="[ btn-group ]">
										<label for="fancy-checkbox-primary" class="[ btn btn-primary ]">
										<span class="[ glyphicon glyphicon-ok ]"></span>
										<span>&nbsp;</span>
										</label>
										<label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
										Task
										</label>
										</div>
									</div> -->
								</li>
								
								<li onclick="fun_refresh_cal('chk_cal_project')">
									<div>
										<label style="width: 100%;">
											<span class="type-color" style="">
												<input class="chk_cal_filter" id="chk_cal_project" type="checkbox" >
											</span>Project
										</label>
									</div>
									<!-- <div class="[ form-group ]">
										<input type="checkbox" name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off">
										<div class="[ btn-group ]">
										<label for="fancy-checkbox-success" class="[ btn btn-success ]">
										<span class="[ glyphicon glyphicon-ok ]"></span>
										<span>&nbsp;</span>
										</label>
										<label for="fancy-checkbox-success" class="[ btn btn-default active ]">
										Project
										</label>
										</div>
									</div> -->
								</li>
								
								<li onclick="fun_refresh_cal('chk_cal_holidays')">
									<div>
										<label style="width: 100%;">
											<span class="type-color" style="">
												<input class="chk_cal_filter" id="chk_cal_holidays" type="checkbox" >
											</span>Holidays
										</label>
									</div>
									<!-- <div class="[ form-group ]">
										<input type="checkbox" name="fancy-checkbox-info" id="fancy-checkbox-info" autocomplete="off">
										<div class="[ btn-group ]">
										<label for="fancy-checkbox-info" class="[ btn btn-info ]">
										<span class="[ glyphicon glyphicon-ok ]"></span>
										<span>&nbsp;</span>
										</label>
										<label for="fancy-checkbox-info" class="[ btn btn-default active ]">
										Holidays
										</label>
										</div>
									</div> -->
								</li>
								
								<li onclick="fun_refresh_cal('chk_cal_my')">
									<div>
										<label style="width: 100%;">
											<span class="type-color">
												<input class="chk_cal_filter" id="chk_cal_my" type="checkbox">
											</span>My Calendar
										</label>
									</div>
									<!-- <div data-toggle="buttons">
										<label class="btn btn-success active" style="width: 100%;">
										<input type="checkbox" class="chk_cal_filter" id="chk_cal_my" autocomplete="off" checked="">
										<span class="glyphicon glyphicon-ok"></span>
										</label>
									</div> -->
									
								</li>
								
								
								
								<li>
									<input type="file" id="icsupload" style="display: none">
									<a onclick="$('#icsupload').trigger('click'); return false;"><i > Import Calendar</i></a>
								</li>
								
								<li onclick="fun_refresh_clear(this)" class="dropdown-menu-footer"><a href="#"><i > Clear All filters...</i></a>
								</li>
							</ul>
						</li>
					</div>

					<div class="col-lg-6">
						<button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left fc-corner-right"><span class="fc-icon fc-icon-left-single-arrow"></span></button>

						<span onclick="clickMonth()" id="mpMonth">February</span><span onclick="clickYear()" id="mpYear">2017</span>

						<button type="button" class="fc-next-button fc-button fc-state-default fc-corner-left fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
					</div>

					<div class="col-lg-4">
						<li style="margin-left: 28px;">
							<button id="btn_switch_week" type="button" class="btn antoclose size-family-weight" onclick="fun_switchview('basicWeek',this)">Week</button>
							<button id="btn_switch_month" type="button" class="btn antosubmit size-family-weight" onclick="fun_switchview('month',this)">Month</button>
							
						</li>
					</div>
				</ol>
				
				
			</div>
			<!-- END RIBBON -->
			
			<!-- MAIN CONTENT -->
			<div id="content">
				
				
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" style="margin-top: 20px">
						
						<div class="col-lg-8 calendarDiv">
							<div class="panel panel-default proDiv" style="height: auto">
								<div id="" class="panel-body">
									<div style="display: none" id="div_loading" class="loader"></div>
									
									<div id='calendar'></div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 recentDiv">
							<div class="panel panel-default proDiv" style="height: auto">
								<div class="panel panel-head">
									
									<h3 class="no-float cur-time txt-color-blueDark"></h3>
									
								</div>
								
								<div id="recentPanel" class="panel-body">
									
									
								</div>
								
							</div>
							
							
						</div>
						
					</div>
				</section>
				<!-- end widget grid -->			
			</div>
			
			
		</div>
		
		<!-- END MAIN CONTENT -->
		
		<!-- PAGE FOOTER -->
		<?php include 'template/footer.php';?>
		
		
		<!--================================================== -->
		<?php include 'template/includes_bottom.php';?>
		
		<?php include 'template/weather_js.php';?>
		
		<!-- <script src="<?php echo base_url();?>asset/js/plugin/MultiDatesPicker-1.6.3/jquery-ui.multidatespicker.js"></script> -->
		
		<script src="<?php echo base_url();?>asset/js/plugin/bootstrap-switch/dist/js/bootstrap-switch.js"></script>
		
		<script src="<?php echo base_url();?>asset/js/plugin/icalendar2fullcalendar/demo/ical.js"></script>
		<script src="<?php echo base_url();?>asset/js/plugin/icalendar2fullcalendar/ical_events.js"></script>
		<script src="<?php echo base_url();?>asset/js/plugin/icalendar2fullcalendar/ical_fullcalendar.js"></script>
		
		<!-- Calendar Modal -->
		<?php include 'template/calendarmodal.php';?>
		
		<script type="text/javascript">
			var crm_users = <?php echo json_encode($users); ?>;
			var autoid = '<?php echo $autoid; ?>';
			
			var srcHoliday = <?php echo json_encode($HolidayListPop); ?>;
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			
			var tooltip = $('<div/>').qtip({
				id: 'calendar',
				prerender: true,
				content: {
					text: ' ',
					title: {
						button: true
					}
				},
				position: {
					my: 'bottom center',
					at: 'top center',
					target: 'mouse',
					viewport: $('#calendar'),
					adjust: {
						mouse: true,
						scroll: true
					}
				},
				events: {
					show: function (event, api) {
						
						var hol_name = $('.pubhol_name').html();
						var hol_start = $('.pubhol_start').html();
						hol_start = (moment(hol_start).format("YYYY-MM-DD"));
						
						//if (state == true) {
						$.ajax({
							type: "POST",
							url: "<?php echo site_url('calendar/getHolidayPopup'); ?>",
							data: {name: hol_name, startdate: hol_start},
							// dataType: "html",
							success: function (data) {
								if (data == "YES") {
									$('.clshol_notify').bootstrapSwitch('state', true); // true || false
									} else {
									$('.clshol_notify').bootstrapSwitch('state', false); // true || false                                
								}
							},
							error: function (jqXHR, status, err) {
								console.log("Local error callback.");
							},
							complete: function (jqXHR, status) {
								console.log("Local completion callback.");
							}
						});
						//}
						// if(display_type=="alarm"){
						// 	display_type='';
						// 	setTimeout(function(){ 
						
						// 		$(event.currentTarget).find('.edit_calendar').click(); 
						// 		$('.nav-tabs a[href="#tab_alarm"]').tab('show');
						// 	}, 1000);
						
						// }
						
					},
					render: function (event, api) {
						$(".clshol_notify").bootstrapSwitch();
					}
				},
				show: {solo: false},
				hide: false,
				style: ''
			}).qtip('api');
			var started;
			var categoryClass;
			
			$.ajax({
				url: '<?php echo base_url('require/http/holidays.json'); ?>',
				type: "GET",
				datatype: 'json',
				async:true,
				success: function (doc) {
					
					if (doc != undefined && doc.length > 0) {
						
						doc.forEach(function (entry) {
							
							events_old.push({
								title: entry.title,
								start: entry.start,
								end: entry.end,
								duration: entry.duration,
								y_repeat: "Yearly",
								type: "Public Holiday",
								backgroundColor: '#A77A94'
							});
							events_public = generate_repeats(events_old);
						});
						//$('#calendar').fullCalendar('addEventSource', events_public);
					}
					
				},
				error: function (err) {
					console.log(err);
				}
			}); 
			
			$("#icsupload").on('change', function() {
				
				var formData = new FormData();
				formData.append('fileinput[]', $('#icsupload')[0].files[0]);
				
				
				var request = $.ajax({
					url: '<?php echo site_url('calendar/newIcsFile'); ?>',
					
					method: "POST",
					data: formData,
					//async: false,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json"
				});
				
				request.done(function( status ) {
					console.log('status');
					console.log(status);
					ics_sources = [{url:status.newfile}];
					var view = calendar.fullCalendar('getView');
					fun_render_calendar(view);
					
				});
				
				request.fail(function( jqXHR, textStatus ) {
					console.log('jqXHR');
					console.log(jqXHR);
					console.log(textStatus);
				});
				
			});
			
			
			ics_sources = [];
			
			
			function data_req (url, callback) {
				req = new XMLHttpRequest()
				req.addEventListener('load', callback)
				req.open('GET', url)
				req.send()
			}
			
			function add_recur_events() {
				if (sources_to_load_cnt < 1) {
					$('#calendar').fullCalendar('addEventSource', expand_recur_events)
					} else {
					setTimeout(add_recur_events, 30)
				}
			}
			
			function load_ics(ics){
				data_req(ics.url, function(){
					
					var imp_events=fc_events(this.response, ics.event_properties);
					console.log('imp_events');
					console.log(imp_events);
					
					$.each(imp_events, function (key, value) {
						
						
						$.ajax({
							url: '<?php echo site_url('calendar/importCalendarEntry'); ?>',
							type: "POST",
							beforeSend: function() {
								$('*').qtip('hide');
								$('#div_loading').show();
							},
							data: {
								"entry_name": value.title,
								"taskloc-pid":0,
								"taskloc-tlid":"0000000000",
								"priority":"Medium",
								"start_date":moment(value.start).format("YYYY-MM-DD HH:mm:ss"),
								"end_date":moment(value.end).format("YYYY-MM-DD HH:mm:ss"),
								"descr":value.description,
								"entry_type":value.cal_type,
								"reminder":"startof",
								"entry_color":"#228b22",
								"location":value.location,
								"select_user_new":value.attendee_req,
								"select_guests":value.attendee_opt
								
								
							},
							success: function (doc) {
								$('#calendar').fullCalendar('addEventSource', imp_events);
								sources_to_load_cnt -= 1
								//location.reload();
								
							},
							complete: function (jqXHR, status) {
								$('#div_loading').hide();
							},
							error: function (err) {
								console.log(err);
							}
						});
					});
					
					
					
				})
			}
			
			
			
			function fun_render_calendar(view){
				
				var start_date=(moment(view.intervalStart).format('YYYY-MM-DD'));
				var end_date=(moment(view.intervalEnd).format('YYYY-MM-DD'));
				
				$.ajax({
					url: '<?php echo site_url('calendar/getCalendarDataRange'); ?>',
					type: 'POST',
					beforeSend: function() {
						$('*').qtip('hide');
						$('#div_loading').show();
					},
					data: {
						start_date: start_date,
						end_date: end_date,
						viewname:view.title
						
					},
					dataType: "JSON",
					success : function(data) {
						console.log('new calendar data');console.log(data);
						//dataMyCal=fun_genarate_source(data.dataMyCal);
						dataMyEvent=fun_genarate_source(data.dataMyEvent);
						dataOtherEvent=fun_genarate_source(data.dataOtherEvent);
						dataMyTodo=fun_genarate_source(data.dataMyTodo);
						dataOtherTodo=fun_genarate_source(data.dataOtherTodo);
						dataMyTask=fun_genarate_source(data.dataMyTask);
						dataOtherTask=fun_genarate_source(data.dataOtherTask);
						dataMyProject=fun_genarate_source(data.dataMyProject);
						dataOtherProject=fun_genarate_source(data.dataOtherProject);
						
						
						$('#calendar').fullCalendar( 'removeEvents' );
						
						if ($("#chk_cal_event").is(':checked')) {
							if ($("#chk_cal_my").is(':checked')) {
								
								$('#calendar').fullCalendar('addEventSource', dataMyEvent);
								}else{
								$('#calendar').fullCalendar('addEventSource', dataMyEvent);
								$('#calendar').fullCalendar('addEventSource', dataOtherEvent);
							}
							
						}
						if ($("#chk_cal_todo").is(':checked')) {
							if ($("#chk_cal_my").is(':checked')) {
								
								$('#calendar').fullCalendar('addEventSource', dataMyTodo);
								}else{
								$('#calendar').fullCalendar('addEventSource', dataMyTodo);
								$('#calendar').fullCalendar('addEventSource', dataOtherTodo);
							}
							
						}
						if ($("#chk_cal_task").is(':checked')) {
							if ($("#chk_cal_my").is(':checked')) {
								
								$('#calendar').fullCalendar('addEventSource', dataMyTask);
								}else{
								$('#calendar').fullCalendar('addEventSource', dataMyTask);
								$('#calendar').fullCalendar('addEventSource', dataOtherTask);
							}
							
						}
						if ($("#chk_cal_project").is(':checked')) {
							if ($("#chk_cal_my").is(':checked')) {
								
								$('#calendar').fullCalendar('addEventSource', dataMyProject);
								}else{
								$('#calendar').fullCalendar('addEventSource', dataMyProject);
								$('#calendar').fullCalendar('addEventSource', dataOtherProject);
							}
							
						}
						if ($("#chk_cal_holidays").is(':checked')) {
							
							$('#calendar').fullCalendar('addEventSource', events_public);
							
						}
						
						sources_to_load_cnt = ics_sources.length
						for (ics of ics_sources) {
							console.log('ics_sources');console.log(ics);
							load_ics(ics)
						}
						add_recur_events();
						
						$('#calendar').fullCalendar('refetchEvents');
						
						
					},
					
					error: function (jqXHR, status, err) {
						console.log(jqXHR.responseText);console.log(status);console.log(err);
					},
					complete: function (jqXHR, status) {
						$('#div_loading').hide();
						$('#eventpop-' + autoid).trigger('click');
						
					}
					
				});
			}
			
			
			
			
			var calendar = $('#calendar').fullCalendar({
				selectable: true,
				selectHelper: true,
				timezone: false,
				editable: true,
				// height: "auto",
				
				//header: false,
				dayClick: function () {
					tooltip.hide()
				},
				eventResizeStart: function () {
					tooltip.hide()
				},
				eventDragStart: function () {
					tooltip.hide()
				},
				viewDisplay: function () {
					tooltip.hide()
				},
				eventRender: function(event, element) {
					
					element.find('.fc-content').attr("id", "eventpop-" + event.cal_id);
				},
				
				select: function(start, end, jsEvent, view) {
					
					$('#antoform').trigger("reset");
					$('#myModalLabel').text("New");
					$('#submit_full_form').text("Create");
					$("#select_user_new").val('').trigger('change');
					$("#assign_to_group").hide("slow");
					$("#assign_to_user").show("slow");
					$("#antoform").attr("action", "<?php echo site_url('calendar/addCalendarEntry'); ?>");
					$('#sel_alarm_action').empty();
					$('#sel_recur_exception').empty();
					$("#chk_recurs").prop('checked', false);
					$('#div_recurs *').prop('disabled', true);
					$('#btn_recur_add').prop('disabled', true);
					$('#div_recur_for').show();
					$('#div_recur_until').hide();
					
					$('#btn_add_startalarm').removeAttr("disabled");
					
					$('#select_guests').val('').trigger('change');
					
					$("#datetimepicker_start").val(moment(start).format("YYYY-MM-DD HH:mm:ss"));
					
					$("#datetimepicker_end").val(moment(end).subtract('seconds', 1).format("YYYY-MM-DD HH:mm:ss"));
					flat_startdate.setDate($("#datetimepicker_start").val());
					flat_enddate.setDate($("#datetimepicker_end").val());
					$('#fc_create').click();
					$('.nav-tabs a[href="#tab_newtask"]').tab('show');
				},
				viewRender: function(view, element) { 
					
					fun_render_calendar(view);
					$( '#main' ).css( "position", "absolute" );
					
				},
				
				eventAfterRender: function (event, element, view) {
					// console.log("event:");
					// console.log(event.title);
					// console.log("event start:");
					var this_pos = this;
					var start_date = (moment(event.start).format('YYYY-MM-DD'));
					var now_date = moment().format('YYYY-MM-DD');
					
					$.each(srcHoliday, function (key, value) {
						if (event.title == value.name && now_date == value.startdate) {
							
							var start_time = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
							var end_time = (moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
							var content = '<div style="display:flex"> <h4>Notification:</h4> <input checked style="float: left" type="checkbox" class="clshol_notify" name="my-checkbox"> </div>' +
							'<h3 class="pubhol_name" style="color:green">' + event.title + '</h3><br />' +
							'<div style="display:flex"><h5><b>Start: </b></h5><h5 class="pubhol_start">' + start_time + '</h5></div>' +
							// '<h5><b>End:</b> ' + end_time + '</h5>' +
							'<h5><b>Calendar: </b>Public holidays</h5><hr />' +
							'<h5><a data-title="' + event.title + '" data-start="' + start_time + '" data-end="' + end_time + '" class="copy_calendar">copy to my calendar</a></h4>';
							tooltip.set({
								'content.text': content, 'position.target': element
							}).reposition(event).show(event);
						}
					});
					
				},
				eventClick: function (data, event, view) {
					
					event_data = data;
					console.log('eventClick');
					console.log(data);
					
					if (data.type == "Public Holiday") {
						
						var start_time = moment(data.start).format("YYYY-MM-DD HH:mm:ss");
						var end_time = moment(data.end).format('YYYY-MM-DD HH:mm:ss');
						var content = '<div style="display:flex"> <h4>Notification:</h4> <input style="float: left" type="checkbox" class="clshol_notify" name="my-checkbox"> </div>' +
						'<h3 class="pubhol_name" style="color:green">' + data.title + '</h3><br />' +
						'<div style="display:flex"><h5><b>Start: </b></h5><h5 class="pubhol_start">' + start_time + '</h5></div>' +
						
						'<h5><b>Calendar: </b>Public holidays</h5><hr />' +
						'<h5><a data-title="' + data.title + '" data-start="' + start_time + '" data-end="' + end_time + '" class="copy_calendar">copy to my calendar</a></h4>';
						tooltip.set({
							'content.text': content, 'position.target': this
						}).reposition(event).show(event);
						} else {
						var start_time = moment(data.start).format("YYYY-MM-DD HH:mm:ss");
						var end_time = moment(data.end).subtract(9, 'hours').format('YYYY-MM-DD HH:mm:ss');
						
						var type_userid;
						if(data.user_id ==undefined){
							// from task table
							type_userid=data.opened_by;
							$('#optld-taskid').val(data.projecttaskid);
							$('#optld-temp-pid').val(data.projectid);
							$('#optld-temp-tlid').val(data.tasklistID);
							$("#opd").html(data.projectname);
							//$("#otd").html(data.tlname);
							
							
							}else{
							// from calendar table
							type_userid=data.user_id;
							$('#optld-taskid').val(data.task_id);
							
						}
						
						var content = '<div style="display:flex"> <h4>Notification:</h4> <input style="float: left"  type="checkbox" class="clshol_notify" name="my-checkbox"> </div>' +
						'<h3 class="pubhol_name" style="color:green">' + data.title + '</h3><br />' +
						'<div style="display:flex"><h5><b>Start: </b></h5><h5 class="pubhol_start">' + start_time + '</h5></div>' +
						'<h5><b>End:</b> ' + end_time + '</h5>' +
						'<h5><b>Calendar: </b>'+data.type+'</h5><hr />';
						
						$('#optld-status').val(data.type);
						
						if (type_userid == login_userid) {
							
							content += '<div style="float:left"><h5><a data-id="' + data.projecttaskid + '" class="delete_calendar">Delete</a></h4></div>' +
							'<div style="float:right"><h5><a class="edit_calendar">Edit</a></h4></div>';
							
						}
						tooltip.set({
							'content.text': content, 'position.target': this
						}).reposition(event).show(event);
					}
					
				},
				
			});
			
			
			
			
			function fun_refresh_cal(){
				
				// if($('#'+element).is(':checked')){
				// 	$('#'+element).prop('checked',false);
				// }else{
				// 	$('#'+element).prop('checked',true);
				// }
				var view = calendar.fullCalendar('getView');
				fun_render_calendar(view);
				
			}
			
			function fun_refresh_mycal(element){
				if($('#'+element).is(':checked')){
					$('#'+element).prop('checked',false);
					
					//$('#chk_cal_my').prop('checked',true);
					}else{
					$('#chk_cal_event,#chk_cal_todo,#chk_cal_task,#chk_cal_project,#chk_cal_my').prop('checked',true);
				}
				var view = calendar.fullCalendar('getView');
				fun_render_calendar(view);
				
			}
			
			function fun_refresh_clear(element){
				$('.chk_cal_filter').iCheck('check');
				var view = calendar.fullCalendar('getView');
				fun_render_calendar(view);
				
			}
			
			function fun_switchview(viewName,element){
				calendar.fullCalendar( 'changeView', viewName );
				console.log('fun_switchview');
				if($(element).attr('id')=="btn_switch_week"){
					$('#btn_switch_week').attr('class','btn antosubmit size-family-weight');
					$('#btn_switch_month').attr('class','btn size-family-weight antoclose');
				}else{
					$('#btn_switch_month').attr('class','btn antosubmit size-family-weight');
					$('#btn_switch_week').attr('class','btn size-family-weight antoclose');
				}
				fun_refresh_cal();
			}
			function calendarPopup(element,popid){
				
				$('#calendar').fullCalendar( 'gotoDate', moment($(element).attr('data-date')));
				$('#eventpop-' + popid).trigger('click');
			}
			
			function drawRecents(data){
				console.log('drawRecents');
				console.log(data);
				$.each(data, function (j, val) {
					if(val != false){
						var start_from=moment(val.start).format('hh:mm');
						var start_to=moment(val.end).format('hh:mm a');
						var start_location='';
						if(val.location) start_location=val.location;
						
						var newrow='<div class="row">'
						+'<div class="col-lg-1 col-sm-1 col-md-1">'
						+'<div class="calendar_date">'+moment(val.start).format('D')+'</div>'
						+'<div class="calendar_day">'+moment(val.start).format('ddd')+'</div>'
						+'</div>'
						
						+'<div data-date="'+val.start+'" onclick="calendarPopup(this,'+val.cal_id+')" class="col-lg-11 col-sm-11 col-md-11 calendar_full">'
						+'<div class="calendar_event">'
						+'<div class="event_name">'+val.title+'</div>'
						+'<div class="from">'+start_from+' - '+start_to+' '+start_location+'</div>'
						+'</div>'
						+'</div>'
						+'</div>';
						$('#recentPanel').append(newrow);
					}
					
				});
			}
			
			
			var recentMyCal = <?php echo json_encode($recentMyCal); ?>;
			var recentOtherCal = <?php echo json_encode($recentOtherCal); ?>;
			var recentMyTask = <?php echo json_encode($recentMyTask); ?>;
			var recentOtherTask = <?php echo json_encode($recentOtherTask); ?>;
			
			drawRecents(recentMyCal);
			//drawRecents(recentOtherCal);
			//drawRecents(recentMyTask);
			//drawRecents(recentOtherTask);
		</script>
		
		
		
		<script type="text/javascript">
			
			function clickMonth(){
			$("#mpMonth").qtip({
				
				show: {
					//event: 'click',
					ready:true
				},
				hide: 'unfocus click',
				
				content: {text: '<div type="text" id="mypicker"></div>' },
				
				position: {
					at: 'bottom center',  
					my: 'top center', 
					
				},
				style: {
					classes: 'qtip-light qtip-rounded ',
					width: '200'
				},
				
				
				events: {
					show: function(event, api) {
						
						// $(event.currentTarget).find('.span2').click();
						
					},
					render: function(event, api) {
						
						
						$(event.currentTarget).find('#mypicker')
						.MonthPicker({ 
							Button: false,
							OnAfterChooseMonth: function(){
								
								$('#calendar').fullCalendar( 'gotoDate', $(this).MonthPicker('GetSelectedDate') );
							}
						});
						
						
					},
					hide: function () {
					$(this).qtip('destroy');
				
				},
				}
			});
		}
		function clickYear(){
			$("#mpYear").qtip({
				
				show: {
					//event: 'click'
					ready:true
				},
				hide: 'unfocus click',
				
				content: {text: '<div type="text" id="mypicker"></div>' },
				
				position: {
					at: 'bottom center',  
					my: 'top center', 
					
				},
				style: {
					classes: 'qtip-light qtip-rounded ',
					width: '200'
				},
				
				
				events: {
					show: function(event, api) {
						
						// $(event.currentTarget).find('.span2').click();
						
					},
					render: function(event, api) {
						
						
						$(event.currentTarget).find('#mypicker')
						.MonthPicker({ 
							Button: false,
							OnAfterChooseMonth: function(){
								
								$('#calendar').fullCalendar( 'gotoDate', $(this).MonthPicker('GetSelectedDate') );
							}
						});

						$('#MonthPicker_mypicker').find('.month-picker-title').click();
						
						
					},
					hide: function () {
					$(this).qtip('destroy');
				
				},
				}
			});
		}
			
			
			//});
		</script>
		<script type="text/javascript">
			//$(document).ready(function() {
			
			var srcFull = <?php echo json_encode($PostListAll); ?>;
			console.log("Source ALL:"); console.log(srcFull);
			
			var gen_alarms = generate_alarms(srcFull);
			
			console.log("Source Alarm:");
			console.log(gen_alarms);
			
			
			var cur_time = moment().format();
			$.each(gen_alarms, function (i, val) {
				
				var tag_ids=[];
				if(gen_alarms[i].tag_ids!=null){
					tag_ids = (gen_alarms[i].tag_ids.split(','));
				}
				tag_ids.push(gen_alarms[i].creator_id);
				console.log('tag_ids');
				console.log(gen_alarms[i]);
				
				setInterval(function () {
					$.each(tag_ids, function (index, value) {
						
						if (login_userid == value) {
							
							if (moment().format() == moment(gen_alarms[i].time).format()) {
								if (gen_alarms[i].action == "popup") {
									
									// swal({html: true, 
									// 	title: gen_alarms[i].title, 
									// 	text: "Start Time: " + moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss') + "<br />End Time: " + moment(gen_alarms[i].entry_end).format('YYYY-MM-DD HH:mm:ss') + "<br />Description: " + gen_alarms[i].entry_description + "<br />Message: " + gen_alarms[i].custom_msg + "<br />Type: " + gen_alarms[i].entry_type + "<br />Priority: " + gen_alarms[i].entry_priority
									// });
									
									swal({
										title: gen_alarms[i].title,
										type: 'info',
										html:
										"Start Time: " + moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss') + "<br />End Time: " + moment(gen_alarms[i].entry_end).format('YYYY-MM-DD HH:mm:ss') + "<br />Description: " + gen_alarms[i].entry_description + "<br />Message: " + gen_alarms[i].custom_msg + "<br />Type: " + gen_alarms[i].entry_type + "<br />Priority: " + gen_alarms[i].entry_priority,
										showCloseButton: true,
										showCancelButton: false,
										confirmButtonText:
										'OK',
										
									});
								}
								if (gen_alarms[i].action == "sound") {
									
									document.getElementById('play_sound').play();
									//meSpeak.speak(gen_alarms[i].custom_msg, {speed: 100});
									// swal({html: true, title: gen_alarms[i].title, text: "Start Time: " + moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss') + "<br />End Time: " + moment(gen_alarms[i].entry_end).format('YYYY-MM-DD HH:mm:ss') + "<br />Description: " + gen_alarms[i].entry_description + "<br />Message: " + gen_alarms[i].custom_msg + "<br />Type: " + gen_alarms[i].entry_type + "<br />Priority: " + gen_alarms[i].entry_priority});
									
									swal({
										title: gen_alarms[i].title,
										type: 'info',
										html:
									    "Start Time: " + moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss') + "<br />End Time: " + moment(gen_alarms[i].entry_end).format('YYYY-MM-DD HH:mm:ss') + "<br />Description: " + gen_alarms[i].entry_description + "<br />Message: " + gen_alarms[i].custom_msg + "<br />Type: " + gen_alarms[i].entry_type + "<br />Priority: " + gen_alarms[i].entry_priority,
										showCloseButton: true,
										showCancelButton: false,
										confirmButtonText:
									    'OK',
										
									});
									
								}
								if (gen_alarms[i].action == "call") {
									//alert("Call of event name: " + gen_alarms[i].title);
									$.ajax({
										type: "POST",
										url: "<?php echo site_url('calendar/previewTTS'); ?>",
										data: {call_ids: gen_alarms[i].tag_ids, call_msg: gen_alarms[i].custom_msg},
										dataType: "html",
										success: function (data) {
											
										},
										error: function (jqXHR, status, err) {
											console.log("Local error callback.");
										},
										complete: function (jqXHR, status) {
											console.log("Local completion callback.");
										}
									});
								}
								if (gen_alarms[i].action == "mail") {
									swal("Mail of event name: " + gen_alarms[i].title);
									$.ajax({
										type: "POST",
										url: "<?php echo site_url('calendar/send_mail_alarm'); ?>",
										data: {mail_subject: gen_alarms[i].title, tag_ids: gen_alarms[i].tag_ids, creator_id: gen_alarms[i].creator_id, mail_msg: gen_alarms[i].custom_msg, alarm_time: moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss')},
										dataType: "html",
										success: function (data) {
											
										},
									});
								}
								if (gen_alarms[i].guests != null) {
									var obj = jQuery.parseJSON(gen_alarms[i].guests);
									
									swal("Guest Mail of event name: " + gen_alarms[i].title);
									$.ajax({
										type: "POST",
										url: "<?php echo site_url('calendar/send_mail_alarm'); ?>",
										data: {mail_subject: gen_alarms[i].title, tag_ids: gen_alarms[i].tag_ids, creator_id: gen_alarms[i].creator_id, mail_msg: gen_alarms[i].custom_msg, alarm_time: moment(gen_alarms[i].entry_start).format('YYYY-MM-DD HH:mm:ss')},
										dataType: "html",
										success: function (data) {
											
										},
									});
								}
							} // end match time
						} // end match id
					}); // end each tag check
				}, 1000);
			}); // end each alarm
			
			//});
		</script>
		<script>
			//$(document).load(function () {
		
			

			$(window).load(function () {
				var btn_today='<a class="goto_today_link">'+'Today is: '+moment().format('dddd MMMM DD, YYYY')+'</a>';
				btn_today=$(btn_today);
				btn_today.on('click', function (e) {
					$('#calendar').fullCalendar( 'gotoDate', moment());
					fun_refresh_cal();
				});
				$('#calendar').find('.fc-right').append(btn_today);
	     	//$('.fc-today-button').attr("class","fc-today-button btn btn-default");
	     //	$('.fc-today-button').removeAttr('disabled');
				//$('.fc-today-button').text("Today is: "+moment().format('dddd MMMM DD, YYYY'));

	       
	    });


			//});
		</script>
		<script>
			//$(document).ready(function(){
			$('#chk_cal_event').iCheck({
				checkboxClass: 'icheckbox_flat-orange',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });
			
			$('#chk_cal_todo').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });
			
			$('#chk_cal_task').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });
			
			$('#chk_cal_project').iCheck({
				checkboxClass: 'icheckbox_flat-purple',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });
			
			$('#chk_cal_holidays').iCheck({
				checkboxClass: 'icheckbox_flat-pink',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });
			
			$('#chk_cal_my').iCheck({
				checkboxClass: 'icheckbox_flat-grey',
				
				increaseArea: '20%' // optional
			}).on('ifChanged', function(event){fun_refresh_cal() });

			
			
			
			//});
		</script>
		
	</body>
</html>