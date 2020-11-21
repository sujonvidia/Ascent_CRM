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
			.proDiv .panel .btn {
				margin-left: 0%;
				margin-top: 3%;
				background-color: #686868;
				border: none;
				font-size: 9px;
				width: 20px;
				height: 20px;
				padding: 2px 0;
			}
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
				height: 634px;
				overflow-y: auto;
				overflow-x: hidden;
			}
			
			.myproLDiv{
				height: 582px !important;
				width: 106% !important;
				overflow-y: scroll;
				overflow-x: hidden;
				padding-right: 14px;
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
		
		<!-- ITL Todo CSS : sujon -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/itl-todo/itl-todo.css?v=<?php echo time();?>">

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
				<ol class="breadcrumb">
					<li>
						<input type="hidden" name="forecastValue" id="forecastValue" value="">
						<span class="dFont">Dashboard</span>
						<p  id="pStyle" style="font-size: 17px;width: 100%;height: 25px;position: relative;right: 0%;margin-left: 1%;text-align: right;">
							<span id="givendateID" style="margin-top: 0px;color: #aba9a9"></span>
							<span id="city"></span>
							<span id="valu"></span><span id="degree"></span>
							<span id="cunit" onclick="convert('C')"></span>
						</p>
					</li>
				</ol>
			</div>
			<!-- END RIBBON -->
			
			<!-- MAIN CONTENT -->
			<div id="content">
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-8 feedDiv">
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6" id="col6Feed">
								 <?php include("template/feed_body.php"); ?> 
							</div>
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 txt4 dashboadpro">
								<div class="mProDiv" onclick="openpageproject()">Projects</div>
								<div id="myprojectList" class="myproLDiv"></div>
								<!-- <a href="javascript:void(0);" onclick="viewMoreProject()" style="color: #bfbfbf;">View More ...</a> -->
							</div>
						</div>
						<div class="col-lg-4 todoDiv">
							<div class="">
								<div class="panel panel-default proDiv" style="height: 330px;">
									<div class="panel panel-head">
										<h3 class="no-float txt-color-blueDark">
											<span class="hoverontext " style="cursor: pointer;" onclick="openpageQuickList()">Quick List</span>
										</h3>

											<div style="padding-bottom: 5px" class="col-lg-12 col-sm-12 col-md-12">
												<input id="newTodoInput" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Quick List'" placeholder="Quick List" class="form-control border-rad">
											</div>
										
									</div>
									<div id="todoPanel" class="panel-body font-color">
										
										<div id="todoInsertDiv"></div>
									</div>
									<!-- <div class="panel-footer">
										<p style="display: none" id="view_more_todo_link" onclick="view_more_todo(this)" class="fa-category-gray">View more...</p>
									</div> -->
								</div>
								<div class="panel panel-default proDiv" style="height: 290px;">
									<div class="panel-head">
										<div class="btn-group btn-group-xs btn-toggle pull-right" style="margin-right: 15px;">
											<button onclick="toggle_btn(this)" id="tog_events" class="btn btn-default" data-toggle="tab" data-target="#recentPanel">Events</button>
											<button onclick="toggle_btn(this)" id="tog_calendar" class="btn btn-default active" data-toggle="tab" data-target="#recentCalendar">Calendar</button>
										</div>
										<h3 class="no-float txt-color-blueDark">
											<span class="hoverontext label_event_cal" style="cursor: pointer;" class="label_event_cal" onclick="openpageCalendar()">Events</span>
										</h3>
									</div>
									<div class="panel-body tab-content newCss">
										<div id="recentPanel" class="tab-pane"></div>
										<div class="tab-pane active" id="recentCalendar">
											<div id='calendar'></div>
										</div>
									</div>
									<!-- <div class="panel-footer">
										<p style="display: none" id="view_more_recent_link" onclick="view_more_recent(this)" class="fa-category-gray">View more...</p>
									</div> -->
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

		
		<script type="text/javascript">
			setCookie("feed_div_width", $("#myprojectList").outerWidth()-51, 1);
			// $("#chat-wid").width(getCookie("feed_div_width"));
		</script>
		<script type="text/javascript">
			var projectArray = [];
			var TaskArray = [];
			var projectIDlist = [];
			var proScrolled = false;
			var alluser = <?php echo json_encode($alluser); ?>;
			
			$( window ).load(function() {
				open_feed("dashboard");
				//console.log("OK");
				<?php if(user_privilege($id, $org_id, "pro") == "RWD") { ?>
				getAllProject();
				<?php } else { ?>
				default_project_design();
				<?php } ?>
			});
			$("#open_newpro1").click(function() {
				alert("asd");		
				$("#new_project_name").val("");
				$("#brief_note_new").val("");
				$('#DescShow').hide();
				$('#openNewProject_s1').modal('show');
				//$('#openNewProject_s2').modal('hide');
			});
			
			function showModal(){
				$("#new_project_name").val("");
				$("#brief_note_new").val("");
				$('#DescShow').hide();
				$('#openNewProject_s1').modal('show');
			}
			
			$( "#open_newpro2" ).click(function() {
				createPro();
			});
			
			$( ".newpro_close" ).click(function() {
				$('#openNewProject_s2').modal('hide');
			});
			
			function createPro(){
				
				//var pName = $("#ptn").val();
				var pName = $("#new_project_name").val();
				//var pStat = $("#ptp").val();
				var pStat = "Private";
				var pTypeU = $("#assigntypeU");
				var pTypeT = $("#assigntypeT");
				//var startDate = $("#datetimepicker10").val();
				var startDate = "";
				//var endDate = $("#datetimepicker11").val();
				var endDate = "";
				var redirectURL = '<?php echo site_url();?>'+'Projects/SaveNewProject/';
				// var selectednumbers = [];
				// var assignto = $("#assigned_user_id").val();
				var description = '';
				if(startDate == ""){
					startDate = "0000-00-00 00:00:00";
				}
				
				if(endDate == ""){
					endDate = "0000-00-00 00:00:00";
				}
				
				var ico = "";
				var d = $.now();
				var pType = "";
				
				assigntype = 'U';
				pType = "MP";
				ara = "myProarray";
				var projecttype = "MP";
				
				if(pStat == "Private"){
					ico = "fa-lock1";
					}else if(pStat == "Public"){
					ico = "fa-globe";
				}
				
				$("#myprojectList").html("");
				
				var design = "";
				
				if(pName == ""){
					$("#new_project_name").css('background-color','rgb(255, 214, 214)');
					alert("Project name was not found to save, please try again.");
					}else{
					$.ajax({
						url: '<?php echo site_url(); ?>Projects/saveproject',
						type: 'POST',
						data: {
							pName: pName,
							description: description,
							pStat: pStat,
							projecttype:projecttype,
							assigntype :assigntype,
							projectID: d,
							pType : pType,
							startDate:startDate,
							endDate:endDate
						},
						dataType: "JSON",
						beforeSend: function () {
							//console.log("Emptying");
						},
						success: function (data, textStatus) {
							
							design =  '<div class="panel panel-default proDiv">';
							design += '			<div class="panel panel-head">';
							design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
							design += '					<h3 id="prodestext1_'+data.prioTask+'" onclick="goPro('+data.prioTask+',\''+pName+'\')" class="page-title txt-color-blueDark prtitle">'+pName+'</h3>';
							design += '				</div>';
							design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
							design += '					<span class="pull-right" id="tagBtnDiv'+data.prioTask+'"></span>';
							design += '				</div>';
							design += '			</div>';
							design += '			<div class="panel-body status">';
							design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style="margin-top: -38px;min-height:40px;"  id="taskListDiv'+data.prioTask+'">';
							design += '					<div class="row prolist">	<span class="name"><i class="fa fa-times"></i></span>&nbsp;&nbsp;	<span class="from" style="color:red;">No task found</span></div>';
							design += '				</div>';
							design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -14%;">';
							// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="0" data-pie-size="80">';
							// design += '						<span class="percent txt-color-darken">0</span>';
							// design += '					</div>';
							design += '					<a  onclick="addTask('+data.prioTask+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
							design += '				</div>';
							design += '			</div>';
							design += '		</div>';
							
							$("#myprojectList").append(design);
							
							//$("#newProjectForm").reset();
							$("#newProjectForm").trigger("reset");
							
							$('#openNewProject_s1').modal('hide');
							
							// $('.easyPieChart').easyPieChart({
							// 	animate: 500,
							// 	barColor:"#404040",
							// 	lineWidth: 5,
							// 	trackColor: "#b5b5b5",
							// 	scaleColor: "#ffffff",
							// 	size: 70
							// });
							
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

			function drawChart() {

				$('.gpiechart').each(function(i,el){

					var data = google.visualization.arrayToDataTable([
						['Task', 'Hours per Day'],
						['Work',     11],
						['Eat',      2],
						['Commute',  2],

						]);

					var options = {
						title: false,
						'chartArea': { width: "100%", height: "100%" },
						legend: {position: 'none'}
					};
					
					var chart = new google.visualization.PieChart($(el)[0]);

					chart.draw(data, options);

				})


			}
			
			function getAllProject(){
				
				//console.log("Fire");
				
				$("#assign_A").hide();
				$("#assign_C").hide();
				var design = "";
				
				$.ajax({
					url: '<?php echo site_url(); ?>Projects/getproject',
					dataType: "JSON",
					beforeSend: function () {
						//console.log("Emptying");
						var ico = "";
						var d = new Date();
						var pName = "Direct &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;asks";
						var pType = "myProarray";
					},
					success: function (data, textStatus) {
						$.each(data.projects, function (key, value) {
							projectArray.push(value);
						});
						
						$.each(data.tasklist, function (key, value) {
							TaskArray.push(value);
						});
						
						$.each(data.projectIDlist, function (key, value) {
							projectIDlist.push(value);
						});
						var num = 0;
						
						if(projectArray.length == 0){
							default_project_design();
						}
						if(projectArray.length > 4){
							while(num<4){
								var totalTask = 0;
								var pendinTask = 0;
								var completeTask = 0;
								var perTask = 0;
								var remainingTask = 0;

								totalTask = parseInt(data.TotalTask[num].length);
								pendinTask = parseInt(data.PendingTask[num].length);
								
								if(totalTask == 0){
									completeTask = 0;
								}else{
									remainingTask = totalTask-pendinTask;
									perTask = parseInt(100/totalTask);
									completeTask = remainingTask*perTask;
								}
								var p_id=projectArray[num].Id;
								design =  '<div class="panel panel-default proDiv">';
								design += '			<div class="panel panel-head">';
								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
								design += '					<h3 id="prodestext1_'+projectArray[num].Id+'" onclick="goPro('+projectArray[num].Id+',\''+projectArray[num].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[num].Title+'</h3>';
								design += '				</div>';
								design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
								design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[num].Id+'"></span>';
								design += '				</div>';
								design += '			</div>';
								design += '			<div class="panel-body status">';
								design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style="margin-top: -38px;min-height:40px;"  id="taskListDiv'+projectArray[num].Id+'">';
								design += '				</div>';
								design += '				<div  class="col-lg-3 col-sm-3 col-md-3" style="margin-top: -14%;margin-left:-3%;">';
								// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+completeTask+'" data-pie-size="80">';
								// design += '						<span class="percent txt-color-darken">'+completeTask+'</span><span class="ttper">%</span>';
								// design += '					</div>';
									design +=								'<div data-pending="'+pendinTask+'" class="gpiechart" id="piechart_'+p_id+'" style="width: 70px; height: 70px;"></div>';
								design += '					<span class="ttcount">complete of '+totalTask+' task</span>';
								design += '					<a  onclick="addTask('+projectArray[num].Id+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
								design += '				</div>';
								design += '			</div>';
								design += '		</div>';
								
								$("#myprojectList").append(design);
								
								if(projectArray[num].Description){
									var qtc='<div class="todo-desc">Description: '+projectArray[num].Description +'</div>';
									
									$('#prodestext1_'+projectArray[num].Id).qtip({
										content: {
											text: qtc
											
										},
										
										position: {
											at: 'bottom left',  
											my: 'top left', 
											viewport: $(window),
											adjust: {
												mouse: true,
												scroll: true
											}
											
										},
										style: {
											classes: 'qtip-light qtip-rounded',
											width: '300'
										},
										
									});
								}
								
								// $('.easyPieChart').easyPieChart({
								// 	animate: 500,
								// 	barColor:"#404040",
								// 	lineWidth: 5,
								// 	trackColor: "#b5b5b5",
								// 	scaleColor: "#ffffff",
								// 	size: 70
								// });

								design = "";
								
								getTagAjax(projectArray[num].Id);
								num++;
							}
							}else{
							
							for(i = 0 ; i<projectArray.length; i++){
								var totalTask = 0;
								var pendinTask = 0;
								var completeTask = 0;
								var perTask = 0;
								var remainingTask = 0;

								totalTask = parseInt(data.TotalTask[i].length);
								pendinTask = parseInt(data.PendingTask[i].length);
								
								if(totalTask == 0){
									completeTask = 0;
								}else{
									remainingTask = totalTask-pendinTask;
									perTask = parseInt(100/totalTask);
									completeTask = remainingTask*perTask;
								}
								
								design = '<div class="panel panel-default proDiv">';
								design += '			<div class="panel panel-head">';
								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
								design += '					<h3 id="prodestext2_'+projectArray[i].Id+'" onclick="goPro('+projectArray[i].Id+',\''+projectArray[i].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[i].Title+'</h3>';
								design += '				</div>';
								design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
								design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[i].Id+'"></span>';
								design += '				</div>';
								design += '			</div>';
								design += '			<div class="panel-body status">';
								design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style="margin-top: -38px;min-height:40px;"  id="taskListDiv'+projectArray[i].Id+'">';
								design += '				</div>';
								design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -14%;">';
								// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+completeTask+'" data-pie-size="80">';
								// design += '						<span class="percent txt-color-darken">'+completeTask+'</span>';
								// design += '					</div>';
								design +=								'<div class="gpiechart" id="piechart_'+projectArray[i].Id+'" style="width: 70px; height: 70px;"></div>';
								design += '					<a  onclick="addTask('+projectArray[i].Id+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
								design += '				</div>';
								design += '			</div>';
								design += '		</div>';
								
								$("#myprojectList").append(design);
								// $('.easyPieChart').easyPieChart({
								// 	animate: 500,
								// 	barColor:"#404040",
								// 	lineWidth: 5,
								// 	trackColor: "#b5b5b5",
								// 	scaleColor: "#ffffff",
								// 	size: 70
								// });
								
								if(projectArray[i].Description){
									var qtc='<div class="todo-desc">Description: '+projectArray[i].Description +'</div>';
									
									$('#prodestext2_'+projectArray[i].Id).qtip({
										content: {
											text: qtc
										},
										
										position: {
											at: 'bottom left',  
											my: 'top left', 
											viewport: $(window),
											adjust: {
												mouse: true,
												scroll: true
											}
										},
										style: {
											classes: 'qtip-light qtip-rounded',
											width: '300'
										},
										
									});
								}
								
								
								design = "";
								
								getTagAjax(projectArray[i].Id);
								//drawTasklist(data.tasklist,projectArray[num].projectid);
							}
						}

						google.charts.setOnLoadCallback(drawChart);
						drawTasklist(data.tasklist);
					},
					complete: function (data, textStatus) {
						
					},
					error: function (jqXHR, textStatus, errorThrown) {
						// Some code to debbug e.g.:               
						console.log(jqXHR);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});	
			}
			
			function default_project_design(){
				design =  '<div class="panel panel-default proDiv" style="height: 635px;">';
				design += '		<img style="width: 39%;margin-left: 32%;margin-top: 30%;" src="<?php echo base_url(); ?>asset/img/bell.png">';	
				//design += '		<span style="width: 68%;float: left;margin-left: 23%;margin-top: 7%;font-size: 19px;color: #cccccc;"> Sorry!!! No project found</span>';
				design += '		<a id="open_newpro1" onclick="showModal()" style="position:relative; margin-left: 27%;margin-top: 8%;background: #686868 !important;border: 1px solid;" href="javascript:void(0);" class="btn btn-primary btn-lg">CREATE A PROJECT</a>';
				design += '</div>';
				
				$("#myprojectList").append(design);
			}
			function goPro(value,taskID = false,typeCat = false){
				//alert(value+"<><>"+taskID+"<><>"+typeCat);
				var request = $.ajax({
		            url: base_url+"projects/deleteNotification",
		            method: 'POST',

		            data: {
		                typeid: value,
		                relatedto: taskID,
		                typeCat:typeCat
		            },
		            dataType: 'JSON'
		        });

		        request.done(function(rsp) {
		            //console.log(rsp);
		            setCookie('project',value,1);
					setCookie('taskid',taskID,1);
					//setCookie('projectName',proname,1);
					window.location.href = base_url+"projects";
		        });
			}

			function goProCom(value){
				setCookie('project',value,1);
				setCookie('ClickType','Comment',1);
				window.location.href = base_url+"projects";
			}
			
			function toggle_btn(element){
				if($(element).attr('id')=="tog_events"){
					$('#tog_events').addClass('active');
					$('#tog_calendar').removeClass('active');
					$('.label_event_cal').text('Events');
					if(DashboardEvents.length>3) {
							$('#view_more_recent_link').show();

						}
				}else{
					$('#tog_events').removeClass('active');
					$('#tog_calendar').addClass('active');
					$('.label_event_cal').text('Calendar');
					$('#view_more_recent_link').hide();
				}
			}

			function toggle_events(element){

				if($(element).text()=="Events"){
					$('#recentCalendar').addClass('active');
					$('#recentPanel').removeClass('active');
					$(element).text("Calendar");
					$('#view_more_recent_link').hide();
					$('#tog_events').removeClass('active');
					$('#tog_calendar').addClass('active');
				}else{
					$('#recentPanel').addClass('active');
					$('#recentCalendar').removeClass('active');
					$(element).text("Events");
					if(DashboardEvents.length>3) {
						$('#view_more_recent_link').show();
					}
					$('#tog_events').addClass('active');
					$('#tog_calendar').removeClass('active');
				}
				
			}
			
			function drawTasklist(data){
				
				
				var design ="";
				$.each(projectIDlist, function(ky,vlu){
					if(data[ky].length != 0){
						$.each(data[ky], function (k, v) {
							
							design += '<div class="row prolist">';
							design += '	<span class="name"><i class="fa fa-check-circle-o"></i></span>&nbsp;&nbsp;';
							design += '	<span id="taskdestext3_'+v.Id+'"  class="from taskname" onclick="goPro('+v.HasParentId+',\''+v.Title+'\','+v.Id+')">'+v.Title+'</span>';
							design += '</div>';
							$("#taskListDiv"+v.HasParentId).append(design);
							
							if(v.Description){
								
								var qtc='<div class="todo-desc">Description: '+v.Description +'</div>';
								
								$('#taskdestext3_'+v.Id).qtip({
									content: {
										text: qtc
									},
									
									position: {
										at: 'bottom left',  
										my: 'top left', 
										viewport: $(window),
										adjust: {
											mouse: true,
											scroll: true
										}
										
									},
									style: {
										classes: 'qtip-light qtip-rounded',
										width: '300'
									},
									
								});
							}
							
							design = "";
							
						});
					}else{
						
						design += '<div class="row prolist">';
						design += '	<span class="name"><i class="fa fa-times"></i></span>&nbsp;&nbsp;';
						design += '	<span  class="from" style="color:red;">No task found</span>';
						design += '</div>';
						$("#taskListDiv"+vlu).append(design);
						design = "";
					}
					
				});
			}
			
			function viewMoreProject(){
				proScrolled = true;
				var totalCount = projectArray.length;
				var start = 5;
				$(".TLD").html("");
				while(start<totalCount){
					design = '<div class="panel panel-default proDiv">';
					design += '			<div class="panel panel-head">';
					design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
					design += '					<h3 id="prodestext4_'+projectArray[start].Id+'" onclick="goPro('+projectArray[start].Id+',\''+projectArray[start].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[start].Title+'</h3>';
					design += '				</div>';
					design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
					design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[start].Id+'"></span>';
					design += '				</div>';
					design += '			</div>';
					design += '			<div class="panel-body status">';
					design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style="margin-top: -38px;min-height:40px;" id="taskListDiv'+projectArray[start].Id+'">';
					design += '				</div>';
					design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -14%;">';
					design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="10" data-pie-size="80">';
					design += '						<span class="percent txt-color-darken">10</span>';
					design += '					</div>';
					design += '					<a href="javascript:void(0);" class="btn btn-default btn-xs" onclick="addTask('+projectArray[start].Id+')">Add Task</a>';
					design += '				</div>';
					design += '			</div>';
					design += '		</div>'
					
					$("#myprojectList").append(design);
					
					$('.easyPieChart').easyPieChart({
						animate: 500,
						barColor:"#404040",
						lineWidth: 5,
						trackColor: "#b5b5b5",
						scaleColor: "#ffffff",
						size: 70
					});
					
					if(projectArray[start].Description){
						
						var qtc='<div class="todo-desc">Description: '+projectArray[start].Description +'</div>';
						
						$('#prodestext4_'+projectArray[start].Id).qtip({
							content: {
								text: qtc
							},
							
							position: {
								at: 'bottom left',  
								my: 'top left', 
								viewport: $(window),
								adjust: {
									mouse: true,
									scroll: true
								}
								
							},
							style: {
								classes: 'qtip-light qtip-rounded',
								width: '300'
							},
							
						});
					}
					design = "";
					getTagAjax(projectArray[start].Id);
					start++;
				}
				
				drawTasklist(TaskArray);
			}
			
			/*function workspace_dropdown_toggle(){
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
			}*/
			
			
		</script>
		
		<script type="text/javascript">
			var DashboardEvents = <?php echo json_encode($DashboardEvents); ?>;
			drawRecents(DashboardEvents);
			function fun_add_new_entry(source, new_start, new_end,srcAll) {

  	var newObj = {
  		ID: source.ID,
  		alarm_option: source.alarm_option,
  		alarm_repeat: source.alarm_repeat,
  		alarm_type: source.alarm_type,
  		backgroundColor: source.backgroundColor,
  		cal_id: source.cal_id,
  		description: source.description,
  		duration: source.duration,
  		emails_notify: source.emails_notify,
    		end: new_end, // change
    		end_date: source.end,
    		end_repeat: source.end_repeat,
    		exceptions: source.exceptions,
    		group_id: source.group_id,
    		id: source.id,
    		location: source.location,
    		notify_text: source.notify_text,
    		parent_id: source.parent_id,
    		task_id: source.task_id,
    		post_date: source.post_date,
    		post_id: source.post_id,
    		priority: source.priority,
    		recur_every: source.recur_every,
    		recur_exceptions: source.recur_exceptions,
    		recur_occur: source.recur_occur,
    		recur_pattern: source.recur_pattern,
    		recur_type: source.recur_type,
    		recur_until: source.recur_until,
    		reminder: source.reminder,
    		sharing: source.sharing,
    		start: new_start, // change
    		start_date: source.start,
    		status: source.status,
    		tag_ids: source.tag_ids,
    		title: source.title,
    		type: source.type,
    		user_id: source.opened_by,
    		y_repeat: source.y_repeat,
    		guests: source.guests
    	};
    	srcAll.push(newObj);

    }

    function fun_genarate_source(source) {

    	srcAll = source;

    	var len = srcAll.length;

    	for (var si = 0; si < len; si++) {
    		var startDate = moment(srcAll[si].start);
    		var endDate = moment(srcAll[si].end);
			//console.log('fun_genarate_source endDate1'); console.log(endDate);
			srcAll[si].end=(moment(srcAll[si].end).add({'hours': 9}));
			//console.log('fun_genarate_source endDate2'); console.log(srcAll[si].end);
			
			var recur_execptions;
			
			var every = parseInt(srcAll[si].recur_every);
			var occur = parseInt(srcAll[si].recur_occur);
			var pattern = (srcAll[si].recur_pattern);
			
			if (srcAll[si].recur_type == "recur_for") {
				for (i = 1; i <= occur; i++) {
					var newStart;var newEnd;

					if (pattern == "days") {
						newStart = (moment(startDate).add({'days': every * i}));
						newEnd = (moment(endDate).add({'days': every * i}).add({'hours': 9}));
					}
					if (pattern == "weeks") {
						
						newStart = (moment(startDate).add({'weeks': every * i}));
						newEnd = (moment(endDate).add({'weeks': every * i}).add({'hours': 9}));
						
					}
					if (pattern == "months") {
						newStart = (moment(startDate).add({'months': every * i}));
						newEnd = (moment(endDate).add({'months': every * i}).add({'hours': 9}));
					}
					if (pattern == "years") {
						newStart = (moment(startDate).add({'years': every * i}));
						newEnd = (moment(endDate).add({'years': every * i}).add({'hours': 9}));
					}
					
					var addornot_entry = false;
					if (srcAll[si].recur_exceptions != null) {
						
						recur_execptions = srcAll[si].recur_exceptions.split(';');
						var index = recur_execptions.indexOf(moment(newStart).format('YYYY-MM-DD'));
						// check for end date missing
						if (index == -1) {
							addornot_entry = true;
						}
					} else {
						addornot_entry = true;
					}
					
					if (addornot_entry) {
						
						fun_add_new_entry(srcAll[si], newStart, newEnd,srcAll);
					}
					
				}
			}
			
			if (srcAll[si].recur_type == "recur_until") {
				if (srcAll[si].recur_until != "") {
					if (isNaN(every) == false) {
						var date_limit = (moment(srcAll[si].recur_until).format('YYYY-MM-DD'));
						i = 0;
						while (true) {
							var newStart;
							var newEnd;
							i++;
							if (pattern == "days") {
								newStart = (moment(startDate).add({'days': every * i}));
								
								newEnd = (moment(endDate).add({'days': every * i}).add({'hours': 9}));
								
							}
							if (pattern == "weeks") {
								newStart = (moment(startDate).add({'weeks': every * i}));
								newEnd = (moment(endDate).add({'weeks': every * i}).add({'hours': 9}));
								
							}
							if (pattern == "months") {
								newStart = (moment(startDate).add({'months': every * i}));
								
								newEnd = (moment(endDate).add({'months': every * i}).add({'hours': 9}));
								
							}
							if (pattern == "years") {
								newStart = (moment(startDate).add({'years': every * i}));
								
								newEnd = (moment(endDate).add({'years': every * i}).add({'hours': 9}));
								
							}
							//console.log("compare");
							
							if (moment(newStart).isAfter(date_limit, 'day')) {
								
								break;
							} else {
								var recur_execptions;
								var addornot_entry = false;
								if (srcAll[si].recur_exceptions != null) {
									
									recur_execptions = srcAll[si].recur_exceptions.split(';');
									var index = recur_execptions.indexOf(moment(newStart).format('YYYY-MM-DD'));
									if (index == -1) {
										addornot_entry = true;
									}
								} else {
									addornot_entry = true;
								}
								
								if (addornot_entry) {
									
									
									fun_add_new_entry(srcAll[si], newStart, newEnd,srcAll);
								}
							}
						}
					}
				}
			}
		}
		
		return srcAll;
		// alert(srcOld);
	}
			
			var calendarmini=$('#calendar').fullCalendar({
					//theme: true,
					header: {
						left: '',
						center: 'prev title next',
						right: ''
					},
					selectable: true,
					//selectHelper: true,
					timezone: false,
					//editable: true,
					height: 220,

					
					eventMouseover: function(event, jsEvent, view) {
						// if (view.name !== 'agendaDay') {
						// 	$(jsEvent.target).attr('title', event.title);
						// }
					},
					viewRender: function(view, element) { 

						//fun_render_calendar(view);
						//$( '#main' ).css( "position", "absolute" );

					},
					eventRender: function(event, element) {

						// element.find('.fc-content').attr("id", "eventpop-" + event.cal_id);
						//  element.find('.fc-title').html("    "); 
						//  element.find('.fc-time').html("    "); 
						//console.log('eventRender');
						//console.log(element);
						$('.fc-day[data-date="' + moment(event.Startdate).format("YYYY-MM-DD") + '"]').css('background', event.backgroundColor);
						$(element).removeAttr('style');
						// $(element).find('.fc-title').text('');
						// $(element).find('.fc-time').text('');
						$(element).html('');
					},
					eventClick: function (data, event, view) {
						//console.log(data);
						calendarPopup(data.cal_id);
					},
					select: function(start, end, jsEvent, view) {
					
					calendarNewEntryModal(null,start,end);
				},

				});

			if(DashboardEvents.length>0){
				$('.label_event_cal').text("Events");
				$('#recentPanel,#tog_events').addClass('active');
				$('#recentCalendar,#tog_calendar').removeClass('active');
				
			}else{
				$('.label_event_cal').text("Calendar");
				$('#view_more_recent_link').hide();
			}

			if(DashboardEvents.length>3) {
				$('#view_more_recent_link').show();

			}


			function fun_render_calendar(view){
				
				var start_date=(moment(view.intervalStart).format('YYYY-MM-DD'));
				var end_date=(moment(view.intervalEnd).format('YYYY-MM-DD'));
				
				$.ajax({
					url: '<?php echo site_url('calendar/getCalendarDataRange'); ?>',
					type: 'POST',
					beforeSend: function() {
						// $('*').qtip('hide');
						// $('#div_loading').show();
					},
					data: {
						start_date: start_date,
						end_date: end_date,
						viewname:view.title,

						
					},
					dataType: "JSON",
					success : function(data) {
						//console.log('new calendar data');console.log(data);
						//dataMyCal=fun_genarate_source(data.dataMyCal);
						// dataMyEvent=fun_genarate_source(data.dataMyEvent);
						// //dataOtherEvent=fun_genarate_source(data.dataOtherEvent);
						
						// console.log('new calendar events');console.log(dataMyEvent);
						// $('#calendar').fullCalendar( 'removeEvents' );
						// $('#calendar').fullCalendar('addEventSource', dataMyEvent);
						// //$('#calendar').fullCalendar('addEventSource', dataOtherEvent);
						// $('#calendar').fullCalendar('refetchEvents');
					},
					complete: function (jqXHR, status) {
					
					
					},
					
					error: function (jqXHR, status, err) {
						console.log(jqXHR.responseText);console.log(status);console.log(err);
					}
				});
			}

			
			
			
			function drawRecents(full_recents){
				$('#recentPanel').empty();
				$.each(full_recents, function (j, val) {
					if(val != false){

						if(moment(val.start,'YYYY-MM-DD HH:mm:ss').isValid()){
							var start_from=moment(val.start).format('hh:mm');
							var cal_date=moment(val.start).format('D');
							var cal_day=moment(val.start).format('ddd');
						}else{
							var start_from='No Date';
							var cal_date='';
							var cal_day='';
						}

						if(moment(val.end,'YYYY-MM-DD HH:mm:ss').isValid()){
							var start_to=moment(val.end).format('hh:mm a');
						}else{var start_to='No Date'}

						
						var start_location=(val.location==undefined ? '':val.location);
						
						var newrow='<div class="row">'
						+'<div class="col-lg-1 col-sm-1 col-md-1">'
						+'<div class="calendar_date">'+cal_date+'</div>'
						+'<div class="calendar_day">'+cal_day+'</div>'
						+'</div>'
						
						+'<div onclick="calendarPopup('+val.cal_id+')" class="col-lg-11 col-sm-11 col-md-11 calendar_full">'
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

			function calendarPopup(popid){
				window.location.href = base_url+"calendar/calendarview/"+popid;
			}
			
		</script>
		
		<script type="text/javascript">
			var todo_serial=0;
			var allcategory = <?php echo json_encode($allcategory); ?>;
			
			var request = $.ajax({
				url: base_url+"dashboard/getDashboardTodos",
				method: 'POST',
				
				dataType: 'JSON'
			});
			
			request.done(function(response){
				//console.log('getUserTodo');
				//console.log(response);
				$.each(response, function(k,v){
						insertNewTodo(v);
					});

				if(response.length>4){
					$('#view_more_todo_link').show();
					
				}else{
					
				}
				
			});
			
			function searchTodo(todo_name,_this){
			if($(_this).val() == ""){
						
						$('.dd-parent').show();
					}else{
						// Due date search
						

							$('.dd-parent').each(function(k,v){

									if($(v).find('.todo-text').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){

										//$(v).prevAll('.datewise-row:first').show();
										$(v).show('slow');
									}else{
										$(v).hide('slow');
									}

								});

						} 

					
		}

		$("#search-fld").on('keydown', function (e) {
				var todo_name = $(this).val();
				var _this=this;
				if (e.keyCode == 13) {
					
				
					searchTodo(todo_name,_this);

					 $('#myprojectList .proDiv').each(function(k,v){
            
                if($(v).find('.prtitle').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
                    $(v).show();
                }else{
                    $(v).hide();
                }
            });

            $('#myprojectList .prolist').each(function(k,v){
                // console.log('taskDetailDive');
                // console.log($(v).find('.proNameSub').text().indexOf(task_name));
                if($(v).find('.taskname').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
                    $(v).show();
                    $(v).closest('.proDiv').show();
                }else{
                    $(v).hide();
                }
            });

            $('#recentPanel .row').each(function(k,v){
            
                if($(v).find('.event_name').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
                    $(v).show();
                }else{
                    $(v).hide();
                }
            });

            $('#feedContent .onscroll').each(function(k,v){
            	
                if($(v).find('.name').text().toLowerCase().indexOf(todo_name.toLowerCase())>-1){
                    $(v).show();
                }else{
                    $(v).hide();
                }
            });

				
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
						//console.log(response);
						
						insertNewTodo(response[0]);
						$('#newTodoInput').val('');
						
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
			
			
			$(document).on("click",function(e){
				
				$(".ddd-duedate").each(function() {
					if (!$(this).is(e.target) && $(this).has(e.target).length === 0) {
						$('#todoPanel').css('overflowY', 'scroll'); 
					}
				});
			});
			
			$( document ).on( "click", "ul.ddd-duedate", function(e) {
				//console.log('e.target>add-border');console.log(e.target);
				
				if($(e.target).hasClass("close-da-picker") || $(e.target).hasClass("btn-picker-remove") || $(e.target).hasClass("btn-picker-add")){
					
					$('#todoPanel').css('overflowY', 'scroll'); 
					
				}else{
					
					
					e.stopPropagation();
				}
				
			});
			
			// $( document ).on( "click", ".ddd-category-tog", function(e) {
				// 	console.log('e.target>popover');console.log(e.target);


				// });

				// function fun_delTodo(serial){

					// 	swal({
						// 		title: "Are you sure?",
						// 		//text: "Your will not be able to recover this imaginary file!",
						// 		type: "warning",
						// 		showCancelButton: true,
						// 		confirmButtonClass: "btn-danger",
						// 		confirmButtonText: "Yes, delete it!",
						// 		closeOnConfirm: false
						// 	},
						// 	function(){
							// 		var request = $.ajax({
								// 			url: base_url+"todo/delCalendarEntry",
								// 			method: 'POST',
								// 			data: {
									// 				user_id: "<?php echo $id; ?>",
									// 				cal_id:serial
									// 			},
									// 			//dataType: 'JSON'
									// 		});
									// 		request.done(function(response){
										// 			$('#todoRow'+serial).remove();
										// 			swal("Deleted!", "Your To-do has been deleted.", "success");


										// 		});

										// 	});

										// }

										function insertNewTodo(data){

											var todo_serial=data.Id;
											var duedate=data.Enddate;
											if(moment(duedate).isValid()){
												var curdatetime=moment(duedate).format('MMM D hh:mm a');
												var curtime=moment(duedate).format('H:mm');
											}else{
												var curdatetime="[No due date]";
												var curtime="[No due date]";
											}
											var todo_name=data.Title;
											var todo_status=data.Status;

											var newtodo='<div id="" data-serial="'+todo_serial+'" class="todoRow'+todo_serial+' dd-parent row margin-topdown bottom-border" onmouseover="changelineimgurl('+todo_serial+')" onmouseout="changelineimgdefault('+todo_serial+')">'

											+'<div class="col-lg-1 col-sm-1 col-md-1">'
											+	'<img class="icon-check-dash checkimg'+todo_serial+'" src="'+base_url+'asset/icons/Checkmark.png">'
											+'</div>'

											+'<div class="col-lg-7">'
											+	'<a href="<?php echo base_url(); ?>todo/todoview/'+todo_serial+'" class="todo_name_overflow todo-text">'+todo_name+'</a>'
											+'</div>'

											+'<div id="dd_div_'+todo_serial+'" class="col-lg-4 dropdown">'
											+	'<li class="ddm-duecalendar" style="display:inline">'

											+	'<a id="dd_duedate_text_'+todo_serial+'" data-time="'+curtime+'" data-toggle="dropdown"  class="dropdown-toggle dd-link">'+curdatetime+'</a>'

											+	'</li>'
											+'</div>'

											// +'<div class="col-lg-1 col-sm-1 col-md-1">'

											// +	'<div class="pull-right">'

											// +'<li class="workspace4" style="display:none">'
											// +		'<a data-serial="'+todo_serial+'"  class="dropdown-toggle dt-category">'

											// +			'<i class="fa fa-circle fa-category-gray" style="color:'+data.cat_color+'"></i>'
											// +		'</a>' 

											// +	'</li>'


											// +	'</div>'

											// +'</div>'


											+'</div>';

											var newtodo=$(newtodo);

											$('#todoInsertDiv').prepend(newtodo);
											//console.log(newtodo);

											// newtodo.find('.dt-category').click(function(){
											// 	qtipCategory(this,data.Id);
											// });


											var qtc='<p><b>'+todo_name +'</b></p>';
											if(data.description){
												qtc+='<p class="todo-desc-text"><i>'+data.description +'</i></p>';
											}

											newtodo.find('.todo_name_overflow').qtip({
												content: {text: qtc},

												position: {
													at: 'bottom left',  
													my: 'top left', 
													viewport: $(window),
													adjust: {
														mouse: true,
														scroll: true
													}

												},
												style: {
													classes: 'qtip-light qtip-rounded todo-desc',
													width: '300'
												},

											});


											var qt='<div data-serial="'+todo_serial+'" class="dd-parent">'

											+	'<div class="date-title">Add Due Date<span class="close-da-picker" onclick="fun_close_dropdown('+todo_serial+')">X</span></div>'

											+	'<div class="date-alarm-picker">'

											+'<div class="monthpickerDiv col-lg-6 col-sm-6 col-md-6">'
											+'<input style="display:none" class="flatpickr" type="text" placeholder="Select Date..">'
											+'</div>'

											+'<div class="alarmpickerDiv col-lg-6 col-sm-6 col-md-6">'

											+'<div class="col-lg-12 col-sm-12 col-md-12">'
											+'<div class="row">'

											+'<div class="col-lg-10 col-sm-10 col-md-10">'
											+'<label class="pull-left alarmset-text">Set Alarm (15min prior)</label>'
											+'</div>'

											+'<div class="col-lg-2 col-sm-2 col-md-2">'
											+'<input  type="checkbox" class="pull-right chk-alarm">'
											+'</div>'

											+'</div>'

											+'<div class="row" style="margin-top: 100px;">'
											+'<div class="col-lg-12 col-sm-12 col-md-12">'
											+' <select class="form-control sel-repeat-alarm">'
											+'<option value="dontrepeat">Don\'t Repeat</option>'
											+'<option value="repeat">Repeat</option>'
											+'</select>'
											+'</div>'
											+'</div>'


											+'<div class="row" style="margin-top: 20px;">'
											+'<div class="col-lg-6 col-sm-6 col-md-6">'
											+'<button type="button" class="btn btn-picker-remove">Remove</button>'
											+'</div>'
											+'<div class="col-lg-6 col-sm-6 col-md-6">'
											+'<button type="button" class="btn btn-picker-add">Add</button>'

											+'</div>'
											+'</div>'
											+'</div>'

											+'</div>' // end .alarmpickerDiv
											+'</div>' // end .date-alarm-picker

											+'</div>';

											newtodo.find('.dd-link').qtip({

												show: {
													event: 'click',
													effect: function(offset) {
														$(this).slideDown(100); // "this" refers to the tooltip
													}
												},
												hide: 'unfocus click',

												content: {
													text: qt,
												},

												position: {
													at: 'bottom right',  
													my: 'top right', 
													viewport: $(window),
													adjust: {
														mouse: true,
														scroll: true
													}

												},
												style: {
													classes: 'qtip-light qtip-rounded qtip-time',
													width: '510'
												},

												events: {
													render: function(event, api) {
														//console.log($(this));

														$(this).find('.flatpickr').flatpickr({
															inline: true, 
															enableTime : true,
															dateFormat: 'M j h:i K',
															defaultDate: duedate,

															onChange: function(selectedDates, dateStr, instance) {
																var sel_date=(moment(selectedDates[0]).format('MMM D hh:mm a'));
																var cal_serial=$(instance.element).closest('.dd-parent').attr('data-serial');

																var request = $.ajax({
																	url: base_url+"todo/updateTodoEntry",
																	method: 'POST',
																	data: {
																		"due_date":moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
																		"cal_id":cal_serial

																	},
																	//dataType: 'JSON'
																});

																request.done(function(response){
																	$('#dd_duedate_text_'+cal_serial).html(sel_date);
																	//$(instance.element).closest('.dd-parent').find('.dd-link').html(sel_date);
																});

															}
														});

														$(this).find('.flatpickr').next().addClass('dateIsPicked').removeClass('arrowTop');


													},
													hide: function(event, api) {

													}
												}
											});


										}
			
			
			function view_more_recent(element){
				
				
				if($(element).text()=='View more...'){
					$('#recentPanel').css('overflowY', 'scroll'); 
					$(element).text('View less...');
					}else{
					$('#recentPanel').css('overflowY', 'hidden'); 
					$(element).text('View more...');
				}
			}
			function view_more_todo(element){
				if($(element).text()=='View more...'){
					$('#todoPanel').css('overflowY', 'scroll');
					$(element).text('View less...');
					}else{
					$('#todoPanel').css('overflowY', 'hidden'); 
					$(element).text('View more...');
				}
			}
			
			
			
		</script>
		
		<!-- ITL Todo JS : sujon -->
		<!-- <script src="<?php echo base_url();?>asset/js/itl-todo/itl-todo-manager.js"></script> -->
		<?php include("template/itl-todo-manager.php"); ?>
		
		<script type="text/javascript">
			
			function addTask(proID){
				setCookie('project',proID,1);
				window.location.href = base_url+"projects";
				
			}
			
			
			
			
			
			function getTagAjax(project_ID){
				$.ajax({
					url: '<?php echo site_url(); ?>Projects/getTag',
					dataType: "JSON",
					type: "POST",
					data:{
						project_ID: project_ID
					},
					beforeSend: function () {
						//console.log("Emptying");
						//console.log(tagDivID);
						$("#tagBtnDiv").html("");
					},
					success: function (data, textStatus) {
						// ("tag People");
						//console.log(data);
						setProjecttag(data,project_ID);
						
						//console.log(data.projects);
					},
					error: function (jqXHR, textStatus, errorThrown) {
						// Some code to debbug e.g.:               
						console.log(jqXHR);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});
			}
			
			function setProjecttag(data,tagDivID){
				
				var totalMember = data.tag.length;
				var remainingNum = 0;
				
				if(totalMember > 3){
					
					remainingNum = totalMember-3;
					
					for(var i = 0;i < 3;i++){
						
						var matches = data.tag[i].display_name.match(/\b(\w)/g);
						var acronym = matches.join(''); 
						$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);"  onmouseenter=\"qtipTaskByUser(this,'+tagDivID+','+data.tag[i].ID+','+data.tag[i].ID+')\" class="btn btn-primary btn-circle">'+acronym+'</a>');
					}
					
					$("#tagBtnDiv"+tagDivID).append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
					}else{
					
					for(var i = 0;i < totalMember;i++){
						
						var matches = data.tag[i].display_name.match(/\b(\w)/g);
						var acronym = matches.join(''); 
						$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
					}
				}
				
			}
			
			



			function qtipTaskByUser(element,pro_id,user_id,type_id){
				// alert("Hi");
				if($(element).qtip('api') == undefined){

					$(element).qtip({

						show: {
							ready:true,
							solo: true,
						},
						hide: {
							event: 'click mouseleave',
						},

						content: {text: 'Loading...' },

						position: {
							at: 'bottom center',  
							my: 'top center', 
							viewport: $(window),
						},
						style: {
							classes: 'qtip-light qtip-rounded qtip-font'
						},

						events: {
							hide: function (event, api) {

								$(this).qtip('destroy');
								$( 'body').unbind( "keydown.qtipTaskByUser" );

							},
							show: function(event, api) {

								var requestass = $.ajax({
									url: base_url+"projects/getTaskByUser",
									method: 'POST',
									data: {
										"pro_id":pro_id,
										"user_id":user_id,
										"type_id":type_id

									},
									dataType: 'JSON'
								});

								requestass.done(function(response){
									var qtc='';
									if(type_id == 3){

										$.each(response.task_detail, function(k,v){
											qtc+='<div style="padding:5px">'
											qtc+='<div class="usr-card">';
											qtc+='<img src="'+base_url+"asset/img/avatars/"+response.user_detail[k][0].img+'" alt="'+response.user_detail[k][0].display_name+'" width=50 height=50>';
											qtc+='<div class="usr-card-content">';
											qtc+=   '<h3 style="padding:3px;font-size:14px">'+response.user_detail[k][0].full_name+'</h3>';
											qtc+= '<p style="padding:3px;font-size:12px">'+response.user_detail[k][0].email+'</p><p style="padding:3px;font-size:12px">'+response.user_detail[k][0].phone_mobile;

											qtc+='</p>';
											qtc+='</div>';
											qtc+='</div>';
											qtc+='</div>';
										});
									}else{

										var name = "";
										$.each(crm_emp,function(e,v){
											if(v.ID == response.user_detail[0].assignBy){
												name = v.full_name;
											}
										});

										qtc+='<div style="padding:5px">'
										qtc+='<div class="usr-card">';
										qtc+='<img src="'+base_url+"asset/img/avatars/"+response.user_detail[0].img+'" alt="'+response.user_detail[0].display_name+'" width=50 height=50>';
										qtc+='<div class="usr-card-content">';
										qtc+=   '<h3 style="padding:3px;font-size:14px">'+response.user_detail[0].full_name+'</h3>';
										qtc+= '<p style="padding:3px;font-size:12px" >'+response.user_detail[0].email+'</p><p style="padding:3px;font-size:12px">'+response.user_detail[0].phone_mobile;

										qtc+='</p>';
										qtc +='<p style="padding:3px;font-size:12px">Assigned By: '+name;
										qtc+='</p>';
										qtc+='</div>';
										qtc+='</div>';
										qtc+='</div>';
									}
									api.set('content.text', qtc);


								});

							},
							render:function(event,api){
								$('body').on('keydown.qtipTaskByUser', function(event) {
									if(event.keyCode === 27) {
										api.hide(event);
									}
								});
							}


						}
					});
				}
			}


			function changelineimgurl(id){
				$(".checkimg"+id).attr("src", base_url+"asset/icons/Checkmark_color.png");
			}
			function changelineimgdefault(id){
				$(".checkimg"+id).attr("src", base_url+"asset/icons/Checkmark.png");
			}

		</script>
	</body>
</html>
<!-- Modal -->
<div  id="openNewProject_s1" class="modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content" style="width: 750px; margin-top:0px; border-radius: 0.5em;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span style="color: #5d5c5c; font-size: 43px; top: -14px; position: relative;font-weight:100">&times;</span>
					<!-- <img src="<?php echo base_url(); ?>require/images/delete-icon.png" /> -->
				</button>
				<img style="width: 30px; margin-left: -12px; margin-top: -1px;" src="<?php echo base_url(); ?>asset/img/project-icon2.png" />
				
				<span class="modal-title" style="word-spacing: 3px;font-weight: 500;font-size: 21px;">
					CREATE A NEW PROJECT
				</span>
			</div>
			<div class="modal-body">
				
				
				
				<form role="form" id="newProjectForm">
					<div style="margin-right: 15px; margin-left: 15px;">
						<div class="form-group">
							<!--<label for="new_project_name" style="word-spacing: 3px;">GIVE THIS PROJECT A NAME</label>-->						
							<label for="new_project_name" style="word-spacing: 3px;"></label>					
							<input id="new_project_name" placeholder="Title"  type="text" class="form-control input-lg" style="font-size:30px">
						</div>
						<div class="form-group">													
							<label for="new_project_name" style="word-spacing: 3px;font-size:30px"></label>											
							<p style="font-size: 18px;">Description:
								<a class="btn default btn-md" id="DesClick">
									<span class="glyphicon glyphicon-triangle-bottom"></span> 
								</a>
							</p>
						</div>
						<div class="form-group" id="DescShow">
							<!--<label for="brief_note_new" style="word-spacing: 3px;">WRITE A BRIEF NOTE ON THIS PROJECT (OPTIONAL)</label>-->
							<label for="brief_note_new" style="word-spacing: 3px;"></label>
							<textarea placeholder="Description" class="form-control placeholderHide" rows="5" id="brief_note_new"></textarea>
						</div>
						<div class="form-group">
							<button id="open_newpro2" type="button" class="btn btn-modal-newpro" style="font-weight: 300;font-size: 30px;">CREATE</button>
						</div>
					</div>
				</form>
				
			</div>
			<!-- <div class="modal-footer">
				<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
		
	</div>
</div>
<!-- Modal -->
<div  id="opentask" class="modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content" style="width: 750px; margin-top:0px; border-radius: 0.5em;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span style="color: #5d5c5c; font-size: 43px; top: -14px; position: relative;font-weight:100">&times;</span>
					<!-- <img src="<?php echo base_url(); ?>require/images/delete-icon.png" /> -->
				</button>
				<img style="width: 30px; margin-left: -12px; margin-top: -1px;" src="<?php echo base_url(); ?>asset/img/project-icon2.png" />
				
				<span class="modal-title" style="word-spacing: 3px;font-weight: 500;font-size: 21px;">
					Create new task
				</span>
			</div>
			<div class="modal-body">
				<form role="form" id="newProjectForm">
					<div style="margin-right: 15px; margin-left: 15px;">
						<div class="form-group">
							<!--<label for="new_project_name" style="word-spacing: 3px;">GIVE THIS PROJECT A NAME</label>-->						
							<label for="new_project_name" style="word-spacing: 3px;"></label>					
							<input type="hidden" name="projectInputId" id="projectInputId" value="">
							<input id="newTaskInput" placeholder="Task Title"  type="text" class="form-control input-lg" style="font-size:30px">
						</div>
						<div class="form-group">
							<button id="TaskInsertBtn" onclick="createPro()" type="button" class="btn btn-modal-newpro" style="font-weight: 300;font-size: 30px;">CREATE</button>
						</div>
					</div>
				</form>
				
			</div>
			<!-- <div class="modal-footer">
				<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
		
	</div>
</div>
<script>
$('#myprojectList').scroll(function (e) {
	if(proScrolled == false){
		viewMoreProject();
	}
});
</script>

<script type="text/javascript">
	function openpageQuickList(){
		window.location.href = base_url+"todo/todoview";
	}

	function openpageCalendar(){
		window.location.href = base_url+"calendar/calendarview";
	}

	function openpageproject(){
		window.location.href = base_url+"projects";
	}
</script>
