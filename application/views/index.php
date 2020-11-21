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
		.overflow-initial{
			overflow-x: initial !important; 
			overflow-y: initial !important; 
		}
			/*.btn-addtask{
				position: absolute;
				top: 116px;
	    	left: -200px;
				
			}
			.btn-addtask:active{
				position: absolute !important;
				top: 116px;
	    	left: -200px;
			}*/
			.PCD{
				margin-top: -14%;margin-left:-3%;padding: 0px
			}
			.gpiechart,.glpiechart{
				height: 120px;
				width: 120px
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
			.proDiv .panel .btn{
			margin-left: 0% !important; 
     	margin-top: 0% !important; 
			}
			.ProBtn{
				/*width: 10%;*/
				position: absolute;
				bottom: 5px;
				/*right: -101px;
				top: 37px;
				min-height: 86px;*/
			}
			.TLD{
				margin-top: -20px;min-height:40px;
			}
			/*	.proDiv .panel .btn {
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
				width: 104% !important;
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
			google.charts.load('42', {packages: ['corechart']});     
		</script>
		 <style>
		 .google-visualization-tooltip { 
		 	width: 0px; 
		 	height:0px;
		 	/*z-index: 1000000000000 !important */
		 }
		 .qtip-chart { 
		 	width: 200px; 
		 	font-size: 14px;
		 	/*z-index: 1000000000000 !important */
		 }
		 .table-piechart{
		 		width: 100%;
		 		
		 }
		  .table-piechart caption{
		 		padding: 0px;
		 		margin:0px;
		 }

		 .table-piechart, .table-piechart th, .table-piechart td {
		     border-bottom: 1px solid #eaeaea;
		     margin:5px;
		     padding: 5px;
		     border-collapse: collapse;
		 }
		 #div_loading {
			position: fixed; /* or absolute */
			top: 55%;
			left: 55%;
			z-index: 100;
			
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
								<div style="display: none" id="div_loading">
									<img src="<?php echo base_url(); ?>asset/img/loading2.gif"/>
								</div>
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

			var TaskComplete = [];
			var TaskPending = [];
			var TaskOverdue = [];
			var proScrolled = false;
			var alluser = <?php echo json_encode($alluser); ?>;
			
			


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
							
							design =  '<div style="position:relative" class="panel panel-default proDiv">';
							design += '			<div class="panel panel-head">';
							design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
							design += '					<h3 id="prodestext1_'+data.prioTask+'" onclick="goPro('+data.prioTask+',\''+pName+'\')" class="page-title txt-color-blueDark prtitle">'+pName+'</h3>';
							design += '				</div>';

							design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ProBtn">';
							// design += '					<span class="pull-right" id="tagBtnDiv'+data.prioTask+'"></span>';

							design += '				</div>';

							design += '			</div>';

							design += '			<div class="panel-body status">';
							design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style=""  id="taskListDiv'+data.prioTask+'">';
							design += '					<div class="row prolist">	<span class="name"><i class="fa fa-times"></i></span>&nbsp;&nbsp;	<span class="from" style="color:red;">No task found</span></div>';
							design += '				</div>';
							design += '				<div  class="col-lg-4 col-sm-4 col-md-4 PCD" style="">';
							// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="0" data-pie-size="80">';
							// design += '						<span class="percent txt-color-darken">0</span>';
							// design += '					</div>';
							
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

			var mousechart = {x: null, y: null};
			document.onmousemove = function (e) {
			    mousechart.x = e.pageX;
			    mousechart.y = e.pageY;
			}

			function loadChart(el){

					var cnum=parseInt($(el).attr('data-complete'));
					var pnum=parseInt($(el).attr('data-pending'));
					var onum=parseInt($(el).attr('data-overdue'))
					//console.log('drawChart2',cnum,pnum,onum,$(el));
					var start=parseInt($(el).attr('data-index'));

					var html_pending='<table class="table-piechart">';
					html_pending+='			<caption>Pending Tasks: '+pnum+'</caption>';
					html_pending+='				<tbody>';
					$.each(TaskPending[start],function(i,val){
						html_pending+='				<tr>'
						html_pending+='					<td>'
						html_pending+=						val.Title;

						html_pending+='					</td>'
						html_pending+='				</tr>'

					});
					html_pending+='				</tbody>';
					html_pending+='			</table>';

					var html_overdue='<table class="table-piechart">';
					html_overdue+='<caption>Overdue Tasks: '+onum+'</caption>';
					html_overdue+='<tbody>';
					$.each(TaskOverdue[start],function(i,val){
						html_overdue+='<tr>'
						html_overdue+='<td>'
						html_overdue+=val.Title;

						html_overdue+='</td>'
						html_overdue+='</tr>'

					});
					html_overdue+='</tbody>';
					html_overdue+='</table>';

					var html_complete='<table class="table-piechart">';
					html_complete+='<caption>Completed Tasks: '+cnum+'</caption>';
					html_complete+='<tbody>';
					$.each(TaskComplete[start],function(i,val){
						html_complete+='<tr>'
						html_complete+='<td>'
						html_complete+=val.Title;

						html_complete+='</td>'
						html_complete+='</tr>'

					});
					html_complete+='</tbody>';
					html_complete+='</table>';

					var data = google.visualization.arrayToDataTable([
						['Task', 'Percentage',{'type': 'string', 'role': 'tooltip', 'p': {'html': true}}],
						['Completed', cnum, html_complete ],
						['Pending', pnum, html_pending ],
						['Overdue', onum, html_overdue ],

					]);

					var options = {
						title: false,
						'chartArea': { width: "90%", height: "90%" },
						legend: {position: 'none'},
						pieSliceTextStyle : {fontSize:10},
						tooltip: { isHtml: true,ignoreBounds:true },
						
					};
					
					var chart = new google.visualization.PieChart($(el)[0]);
					
					chart.draw(data, options);

					google.visualization.events.addListener(chart, 'onmouseover', function(e) {
						console.log('onmouseover',e);
					  setTooltipContent(data,e.row,el);

					 // $('#myprojectList').addClass('overflow-initial');
					 	//$('#myprojectList *').addClass('overflow-initial');
					 
					});

					google.visualization.events.addListener(chart, 'select', function(e) {
						console.log('onclick',e);
						var tooltip = document.getElementsByClassName("google-visualization-tooltip")[0];
			        tooltip.innerHTML = '';
					  
					});

			}

			 function calculateDistance(elem, mouseX, mouseY) {
			 	var mx= mouseX - elem.offset().left;
			 	var my=mouseY - elem.offset().top;

			 	console.log('calculateDistance',mx,my)
        return mx;
    }

			

			function setTooltipContent(dataTable,row,el) {
					if(calculateDistance($(el), mousechart.x, mousechart.y) >59){
						var pos='left center';
					}
					else{
						var pos='right center';
					}
					console.log('setpos',pos);
					//console.log('setTooltipContent',$(el).offset(),$(el).position(),mousechart);
					//console.log('setTooltipContent',distance);
			    if (row != null) {
			        //var content = '<div class="custom-tooltip" ><h1>' + dataTable.getValue(row, 2) + '</h1><div>' + dataTable.getValue(row, 1) + '</div></div>'; //generate tooltip content
			        var tooltip = document.getElementsByClassName("google-visualization-tooltip")[0];
			        tooltip.innerHTML = '';

			        //$(tooltip).remove();

			        //console.log('mousechart',mousechart);

			        $(tooltip).qtip({

			            show: {
			              ready:true,
			              solo:true

			            },
			            content: {
			                text: dataTable.getValue(row, 2),
			            },
			            position: {
			                my: pos,  // Position my top left...
			                at: 'top center', // at the bottom right of...
			                target: $(tooltip)
			            },
			            style: {
			                classes: 'qtip-chart',
			                width:200,
			                tip: {
			                    corner: true
			                }
			            },
			            //unfocus mouseleave
			            hide: {
			                event: 'unfocus click mouseleave',
			            },
			            events: {
			                
			                show: function(event, api) {
			                   
			                },
			                visible: function(event, api) {
			                   
			                }
			            },
			             render: function(event, api) {
			          
			        }
			        });
			    }
			}

			function drawChart() {

				$('.gpiechart').each(function(i,el){

					loadChart(el);
				});

			}

			function drawChart2() {

				$('.glpiechart').each(function(i,el){

					loadChart(el);
					

				});


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
						$('#div_loading').show();
					},
					success: function (data, textStatus) {
						console.log('textStatus',textStatus);
						$.each(data.projects, function (key, value) {
							projectArray.push(value);
						});
						
						$.each(data.tasklist, function (key, value) {
							TaskArray.push(value);
						});
						
						$.each(data.projectIDlist, function (key, value) {
							projectIDlist.push(value);
						});

						$.each(data.CompleteTask, function (key, value) {
						 TaskComplete.push(value);
						});

						$.each(data.PendingTask, function (key, value) {
						 TaskPending.push(value);
						});

						$.each(data.OverdueTask, function (key, value) {
						 TaskOverdue.push(value);
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
								OverdueTask = parseInt(data.OverdueTask[num].length);
								CompletedTask = parseInt(data.CompleteTask[num].length);
								
								if(totalTask == 0){
									completeTask = 0;
								}else{
									remainingTask = totalTask-pendinTask;
									perTask = parseInt(100/totalTask);
									completeTask = remainingTask*perTask;
								}
								var p_id=projectArray[num].Id;
								design =  '<div class="panel panel-default proDiv" style="position:relative">';

								design += '			<div class="panel panel-head">';
								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
								design += '					<h3 id="prodestext1_'+projectArray[num].Id+'" onclick="goPro('+projectArray[num].Id+',\''+projectArray[num].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[num].Title+'</h3>';
								design += '				</div>';

								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ProBtn">';
								// design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[num].Id+'"></span>';
								design += '								<a  onclick="addTask('+projectArray[num].Id+')" href="javascript:void(0);" class="btn btn-default btn-xs btn-addtask">Add Task</a>';
								design += '				</div>';

								design += '			</div>'; // panel head

								design += '			<div class="panel-body status">';
								design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style=""  id="taskListDiv'+projectArray[num].Id+'">';
								design += '				</div>';

								design += '				<div  class="col-lg-4 col-sm-4 col-md-4 PCD" style="">';
								// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+completeTask+'" data-pie-size="80">';
								// design += '						<span class="percent txt-color-darken">'+completeTask+'</span><span class="ttper">%</span>';
								// design += '					</div>';
									design +='							<div data-index="'+num+'" data-overdue="'+OverdueTask+'" data-complete="'+CompletedTask+'" data-pending="'+pendinTask+'" class="gpiechart" id="piechart_'+p_id+'"></div>';

								//design += '								<span class="ttcount">complete of '+totalTask+' task</span>';
								
								design += '				</div>';

								design += '			</div>'; // panel body
								// design += '<div class="panel-footer">Panel Footer</div>';
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
								OverdueTask = parseInt(data.OverdueTask[i].length);
								CompletedTask = parseInt(data.CompleteTask[i].length);
								
								if(totalTask == 0){
									completeTask = 0;
								}else{
									remainingTask = totalTask-pendinTask;
									perTask = parseInt(100/totalTask);
									completeTask = remainingTask*perTask;
								}
								
								design = '<div class="panel panel-default proDiv" style="position:relative;">';
								design += '			<div class="panel panel-head">';
								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
								design += '					<h3 id="prodestext2_'+projectArray[i].Id+'" onclick="goPro('+projectArray[i].Id+',\''+projectArray[i].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[i].Title+'</h3>';
								design += '				</div>';
								design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ProBtn">';
								// design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[i].Id+'"></span>';
								design += '					<a  onclick="addTask('+projectArray[i].Id+')" href="javascript:void(0);" class="btn btn-default btn-xs btn-addtask">Add Task</a>';
								design += '				</div>';
								design += '			</div>';
								design += '			<div class="panel-body status">';
								design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style=""  id="taskListDiv'+projectArray[i].Id+'">';
								design += '				</div>';
								design += '				<div class="col-lg-4 col-sm-4 col-md-4 PCD">';
								// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+completeTask+'" data-pie-size="80">';
								// design += '						<span class="percent txt-color-darken">'+completeTask+'</span>';
								// design += '					</div>';
								design +=								'<div data-index="'+i+'" data-overdue="'+OverdueTask+'" data-complete="'+CompletedTask+'" data-pending="'+pendinTask+'" class="gpiechart" id="piechart_'+projectArray[i].Id+'"></div>';
								
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
						$('#div_loading').hide();
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
					var pendinTask = parseInt(TaskPending[start].length);
					var OverdueTask = parseInt(TaskOverdue[start].length);
					var CompletedTask = parseInt(TaskComplete[start].length);

					//console.log('viewMoreProject',projectArray[start].Id,pendinTask,OverdueTask,CompletedTask);
					//console.log('viewMoredata',projectArray[start].Id,TaskPending[start],TaskOverdue[start],TaskComplete[start],CompletedTask);
					design = '<div style="position:relative" class="panel panel-default proDiv">';
					design += '			<div class="panel panel-head">';
					design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
					design += '					<h3 id="prodestext4_'+projectArray[start].Id+'" onclick="goPro('+projectArray[start].Id+',\''+projectArray[start].Title+'\')" class="page-title txt-color-blueDark prtitle">'+projectArray[start].Title+'</h3>';
					design += '				</div>';
					design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ProBtn">';
					// design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[start].Id+'"></span>';
						design += '					<a href="javascript:void(0);" class="btn btn-default btn-xs btn-addtask" onclick="addTask('+projectArray[start].Id+')">Add Task</a>';
					design += '				</div>';
					design += '			</div>';
					design += '			<div class="panel-body status">';
					design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style="" id="taskListDiv'+projectArray[start].Id+'">';
					design += '				</div>';
					design += '				<div  class="col-lg-4 col-sm-4 col-md-4 PCD" style="">';
					// design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="10" data-pie-size="80">';
					// design += '						<span class="percent txt-color-darken">10</span>';
					// design += '					</div>';
						design +=								'<div data-index="'+start+'" data-overdue="'+OverdueTask+'" data-complete="'+CompletedTask+'" data-pending="'+pendinTask+'" class="glpiechart" id="piechart_'+projectArray[start].Id+'" style=""></div>';
				
					design += '				</div>';
					design += '			</div>';
					design += '		</div>'
					
					$("#myprojectList").append(design);

					google.charts.setOnLoadCallback(drawChart2);
					
					// $('.easyPieChart').easyPieChart({
					// 	animate: 500,
					// 	barColor:"#404040",
					// 	lineWidth: 5,
					// 	trackColor: "#b5b5b5",
					// 	scaleColor: "#ffffff",
					// 	size: 70
					// });
					
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
						$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);"  onmouseenter=\"qtipTaskByUser(this,'+tagDivID+','+data.tag[i].ID+','+data.tag[i].ID+')\" class="btn btn-primary btn-circle taskMemCus">'+acronym+'</a>');
					}
					
					$("#tagBtnDiv"+tagDivID).append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle taskMemCus">+'+remainingNum+'</a>');
					}else{
					
					for(var i = 0;i < totalMember;i++){
						
						var matches = data.tag[i].display_name.match(/\b(\w)/g);
						var acronym = matches.join(''); 
						$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle taskMemCus">'+acronym+'</a>');
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
<script type="text/javascript">
    function open_feed(page) {
        if ($("#feed-wid").css("display") == "block" && page != "dashboard") {
            close_feed();
        } else {
            //alert("Hello");
            var min = 0;
            var max = (typeof res != 'undefined')? res.length - 1 : 0;
            var random = Math.floor(Math.random() * (max - min + 1)) + min;
            
            <?php if(! isset($shared_activity_id)) { ?>
                getNewsFeed(random);
                loadResults('10');
            <?php } ?>

            if ($("#chat-wid").css("display") == "block") {
                $("#chat-wid").hide();
                $(".chat-wid-back").hide();
            }
            if (page != "dashboard") {
                $("#feed-wid").css("left", "0");
                $("#feed-wid").addClass("feed-slide-in");
                $(".chat-wid-back").show();
            }
            $("#feed-wid").show();
            var width = getCookie("feed_div_width");

            //$("#feed-wid").width(width);
            
            if (page == "dashboard") {
                $("#feedeclose").hide();
                $("#feedexpand").css("margin-right", "1px");
                $("#feddcollaspe").css("margin-right", "1px");
            } else if (page == "projects") {
                $("#feedeclose").show();
                //$("#feed-wid").width($(".projectListDiv").innerWidth() - 35);
                $(".fixedContent").height($(".projectListDiv").innerHeight() - 55);
                $("#feedexpand").css("margin-right", "30px");
                $("#feddcollaspe").css("margin-right", "30px");
            } else {
                $("#feedeclose").show();
                $("#feedexpand").css("margin-right", "30px");
                $("#feddcollaspe").css("margin-right", "30px");
            }
            // swal("myprojectList",$("#feed-wid").width(),"success");
        }
    }
    function close_feed() {
        if ("<?php echo $page_name; ?>" == "dashboard") {
            $("#feed-wid").hide();
        } else {
            $("#feed-wid").removeClass("feed-slide-in").addClass("feed-slide-out");
        }
        $(".chat-wid-back").hide(function () {
            $('.backDivPro').remove();
            $('.backDivPro').fadeOut(300, function () {
                $(this).remove();
            });
            $("#feed-wid").hide();
            $("#feed-wid").removeClass("feed-slide-out").addClass("feed-slide-in");
        });
        if ($(".projectListDiv").length > 0) {
            $("#wid-id-4").show();
            //$(".projectListDiv").css("background", "#5d5c5c");
        }
    }

    function ExpandFeed() {
        $('#feedexpand').css('display', 'none');
        $('#feddcollaspe').css('display', 'block');
        // swal("expand feed", getCookie("feed_div_width"), "success");
        $("#feed-wid").width(($(".feedDiv").width() - 40 ));
    }

    function CollaspeFeed() {
        $('#feedexpand').css('display', 'block');
        $('#feddcollaspe').css('display', 'none');
        // swal("collaspe feed", $("#feed-wid").width() / 2, "success");
        $("#feed-wid").width((($("#feed-wid").width() / 2) - 40));
    }

    function hideFeed(value) {
        if (value == 'viewall') {
            $('.directchat').show('slow');
            $('.notifation').show('slow');
        }

        if (value == 'directchat') {
            $('.notifation').hide('slow');
            $('.news').hide('slow');
            $('.directchat').show('slow');
        }

        if (value == 'notifation') {
            $('.news').hide('slow');
            $('.directchat').hide('slow');
            $('.notifation').show('slow');
        }

        if (value == 'news') {
            $('.directchat').hide('slow');
            $('.notifation').hide('slow');
            $('.news').show('slow');
        }
    }

	function getNewsFeed(random) {
        $.ajax({
            url: "https://newsapi.org/v1/articles?source=" + sourceArray[random] + "&sortBy=top&apiKey=33caf66ca5514a4ebee6b87aa6222b22",
            dataType: "json",
            timeout: 3000,
            beforeSend: function () {
                //console.log("Emptying");
                $("#loading").show();
                $("#feedContentNews").html("");
                feedArray.length = 0;
            },
            success: function (data) {
                if (data.articles.length > 0) {
                    $.each(data.articles, function (k, v) {
                        str = ' <div class="panel panel-default news onscroll">';
                        str += '    <div class="panel-body status">';
                        str += '            <span class="top-title" style="color: #053368;">' + sourceArray[random].replace('-', ' ').toUpperCase() + ' on ' + moment(v.publishedAt).format('ddd, D MMM, gggg') + '</span>';
                        str += '        <div class="who clearfix" style="margin-top: -26px;margin-bottom: -26px;">';
                        str += '            <span class="name" onclick="goLink(\'' + v.url + '\')" style="float: left;">' + v.description + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> by ' + v.author + '</span></span>';
                        str += '        </div>';
                        str += '    </div>';
                        str += '</div>';

                        $("#feedContentNews").append(str);
                    });

                    $("#loading").hide();
                } 

                $(document).ready(function(){
                    $('#appear-nav').css('display', 'none');
                    $(window).on('scroll', function () {
                    // set distance user needs to scroll before we fadeIn navbar
                        if ($(this).scrollTop() > 500) {
                            $('#appear-nav').fadeIn(300);
                        } else {
                            $('#appear-nav').fadeOut(100);
                        }
                    });
                });

                $(document).ready(function(){
                    $(function () {
                       $('#appear-tech', '#appear-about').on('click', function() {
                           $('#appear-nav').fadeIn(50);
                       });
                    });
                });
                // loadResults('10');
            }
        });
    }


    $('#feedContent').scroll(function (e) {
        // console.log(e);
        var ttV = parseInt($("#appNotNumber").text());
        //var newttV = ttV - 1;
        if(parseInt($("#appNotNumber").text()) > 0 ){

            var request = $.ajax({
                url: base_url + "projects/deleteNotOnscroll",
                method: 'POST',
                data: {
                    limit: '1'
                },
                dataType: 'json'
            });
            request.done(function (response) {
                $('.unread').fadeOut(300);
                var notVal = parseInt($("#appNotNumber").text()) - 1;
                if(parseInt($("#appNotNumber").text()) > 0){
                    $("#appNotNumber").text(notVal);
                }

                if(notVal == 0){
                    $("#appNotNumber").fadeOut(300);
                }
            });
            request.fail(function (response) {
                console.log(response);
            });
        }

        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                
                var limitStart = $(".onscroll").length;
                highlimit = limitStart + 20;

                $.each(feedArray, function (key, value) {
                    //console.log(value);
                    if (key > limitStart && key < highlimit && highlimit < total) {
                        //console.log(key);
                        if (jQuery.inArray(value.type, appArray) !== -1) {
                            if (value.type == 'notification') {
                                var notType = value.typeCat.match(/[A-Z][a-z]+/g);
                                str = ' <div class="panel panel-default notifation onscroll">';
                                str += '    <div class="panel-body status">';
                                // <i class="fa fa-circle" aria-hidden="true" style="color: #a90329; position: absolute; right: 23px;"></i>
                                str += '        <div class="who clearfix"><span class="title">'+notType[0]+' Notification On '+ moment(value.date).format('ddd, ll')+':</span>';
                                if (value.sp == undefined) {
                                    if (value.relatedTo == undefined) {
                                        str += '            <span class="name" onclick="goPro(' + value.typeid + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '  <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span> ';
                                    } else {
                                        str += '            <span class="name" onclick="goPro(' + value.relatedTo + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span>';
                                    }
                                } else {
                                   str += '            <span class="name" onclick="goPro(' + value.typeid + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '  <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span> ';
                                }

                                str += '        </div>';
                                str += '    </div>';
                                str += '</div>';

                                $("#feedContent").append(str);
                            } else if (value.type == 'comment') {
                                strTodo = ' <div class="panel panel-default directchat onscroll">';
                                strTodo += '    <div class="panel-body status">';
                                strTodo += '        <div class="who clearfix">';
                                strTodo += '            <span class="name" style="float: left;"><b>Notification </b>' + name + ' ' + value.title + '  @ <my style="color: #686868;font-size: 10px;margin-left:5px;">' + moment(value.date).format('LLLL') + '</my></span>';
                                strTodo += '            <span  class="from">' + value.detail + '</span>';
                                strTodo += '            <span class="name quicklink" onclick="openC(' + value.typeid + ')">Quick Reply</span>';
                                strTodo += '        </div>';
                                strTodo += '    </div>';
                                strTodo += '</div>';

                                $("#feedContentChat").append(strTodo);
                                strTodo = "";

                                
                            } else if (value.type == 'chatMsg') {
                                // This is a group message
                                if (value.recever_id > 1400000000) {
                                    var groupName = "";
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            groupName = vg.group_name;
                                        }
                                    });
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <span class="top-title">Group Chat Notification on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                    strTodo += '            <div class="who clearfix">';
                                    strTodo += '                <span class="name" style="float: left;"><span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')">' + groupName + '</span> ' + name + ' send a group message</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "            <span class='from uReply" + value.ID + "'>" + name + ": " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += '            <span  class="from">' + name + ': ' + value.detail + '</span>';
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                    }
                                    strTodo += '                <div class="col-lg-12">';
                                    strTodo += '                    <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.recever_id + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                    strTodo += '                    <i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.recever_id + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                    strTodo += '                    <i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.recever_id + '\')"></i>';
                                    strTodo += '                </div><img class="quicksubmitsent" id="quicksubmit' + value.recever_id + '" src="' + base_url + "asset/img/icons/send.gif" + '">';

                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                } else {
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <div class="who clearfix">';
                                    strTodo += '                <span class="name" style="float: left;"><b>' + value.title + ' </b><span class="cqrName" onClick="triggerChat(\'' + value.who + '\')">' + name + '</span> send you a message <my style="color: #686868;font-size: 10px;margin-left:5px;">' + moment(value.date).format('LLLL') + '</my></span>';
                                    strTodo += '                <span  class="from">' + name + ': ' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "            <span class='from uReply" + value.ID + "'>You replied: " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '            <div class="col-lg-12">';
                                        strTodo += '                <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                        strTodo += '                <i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.who + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                        strTodo += '                <i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.who + '\')"></i>';
                                        strTodo += '            </div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                    }
                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                }
                                $("#feedContentChat").append(strTodo);
                                strTodo = "";
                            }
                        }
                    }
                });
            }
    });

	function loadResults(limitStart) {

        var allprojectANDTask = <?php echo json_encode($allprojectANDTask); ?>;
        

        $.ajax({
            url: "<?php echo site_url(); ?>projects/getNotificationStatusAll",
            type: "post",
            dataType: "json",
            data: {
                limitStart: limitStart
            },
            beforeSend: function () {
                //console.log("Emptying");
                $("#loading").show();
            },
            success: function (data) {
                //console.log(data);
                $.each(data.getUnreadNot, function (key, value) {
                    parentID.push(value.parent);
                    typeID.push(value.typeid);
                });

                

                 if(data.getTotalChat != 0){
                   $("#chatNotNumer").text(data.getTotalChat);
                   $("#chatNotNumer").show();
                }

                if(data.getTotalNot != 0){
                   $("#appNotNumber").text(data.getTotalNot); 
                   $("#appNotNumber").show();
                }

               
                if (data.getAllChatMsg.length != 0) {
                    $.each(data.getAllChatMsg, function (key, value) {
                        feedArray.push({
                            "feed_data": value,
                            "type": 'chatMsg',
                            "typeid": value.type_id,
                            "typeCat": value.type,
                            "recever_id": value.user_id,
                            "who": value.createdby,
                            "title": value.title,
                            "detail": value.body,
                            "date": value.not_fire_time,
                            "ID": value.ID,
                            "notification_for": value.notification_for,
                            "approval":value.approval,
                            "replay_msg": value.replay_msg,

                        });
                    });
                }

                $.each(data.commentList, function (key, value) {

                    if (data.commentList.length != 0) {
                        $.each(value, function (k, v) {
                            feedArray.push({
                                "feed_data": value,
                                "type": 'comment',
                                "typeCat": v.type,
                                "typeid": v.type_id,
                                "relatedTo": v.relatedTo,
                                "replay_msg": v.replay_msg,
                                "who": v.createdby,
                                "title": v.title,
                                "detail": v.body,
                                "date": v.not_fire_time,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                            });
                        });
                    }
                });

                $.each(data.getAllProjectUnTag, function (key, value) {
                    if (data.getAllProjectUnTag.length != 0) {
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "sp": 'UnTag',
                            "typeCat": data.getAllProjectUnTag[key].type,
                            "relatedTo": data.getAllProjectUnTag[key].relatedTo,
                            "typeid": data.getAllProjectUnTag[key].type_id,
                            "who": data.getAllProjectUnTag[key].createdby,
                            "detail": data.getAllProjectUnTag[key].title + ' <span style="font-weight:bold;">' + data.getAllProjectUnTag[key].body+'</span>',
                            "date": data.getAllProjectUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllProjectTag, function (key, value) {
                    if (data.getAllProjectTag.length != 0) {
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "typeCat": data.getAllProjectTag[key].type,
                            "relatedTo": data.getAllProjectTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllProjectTag[key].type_id,
                            "who": data.getAllProjectTag[key].createdby,
                            "detail": data.getAllProjectTag[key].title + ' <span style="font-weight:bold;">' + data.getAllProjectTag[key].body+'</span>',
                            "date": data.getAllProjectTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTodoTag, function (key, value) {
                    if (data.getAllTodoTag.length != 0) {
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "typeCat": data.getAllTodoTag[key].type,
                            "relatedTo": data.getAllTodoTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllTodoTag[key].type_id,
                            "who": data.getAllTodoTag[key].createdby,
                            "detail": data.getAllTodoTag[key].title + " : " + data.getAllTodoTag[key].body,
                            "date": data.getAllTodoTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTodoUnTag, function (key, value) {
                    if (data.getAllTodoUnTag.length != 0) {
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "typeCat": data.getAllTodoUnTag[key].type,
                            "relatedTo": data.getAllTodoUnTag[key].relatedTo,
                            "sp": 'UnTag',
                            "typeid": data.getAllTodoUnTag[key].type_id,
                            "who": data.getAllTodoUnTag[key].createdby,
                            "detail": data.getAllTodoUnTag[key].title + " : " + data.getAllTodoUnTag[key].body,
                            "date": data.getAllTodoUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTaskTag, function (key, value) {
                    if (data.getAllTaskTag.length != 0) {
                        var projectaName ="";
                        $.each(allprojectANDTask, function (e, v) {
                            if (v.Id == data.getAllTaskTag[key].relatedTo) {
                                projectaName = v.Title;
                            }
                        });
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "typeCat": data.getAllTaskTag[key].type,
                            "relatedTo": data.getAllTaskTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllTaskTag[key].type_id,
                            "who": data.getAllTaskTag[key].createdby,
                            "detail": data.getAllTaskTag[key].title + " : " + data.getAllTaskTag[key].body,
                            "detail": data.getAllTaskTag[key].title + ' <span style="font-weight:bold;">' + data.getAllTaskTag[key].body+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                            "date": data.getAllTaskTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTaskUnTag, function (key, value) {
                    if (data.getAllTaskUnTag.length != 0) {
                        var projectaName ="";
                        $.each(allprojectANDTask, function (e, v) {
                            if (v.Id == data.getAllTaskUnTag[key].relatedTo) {
                                projectaName = v.Title;
                            }
                        });
                        feedArray.push({
                            "feed_data": value,
                            "ID": value.ID,
                            "approval":value.approval,
                            "notification_for": value.notification_for,
                            "type": 'notification',
                            "typeCat": data.getAllTaskUnTag[key].type,
                            "relatedTo": data.getAllTaskUnTag[key].relatedTo,
                            "sp": 'UnTag',
                            "typeid": data.getAllTaskUnTag[key].type_id,
                            "who": data.getAllTaskUnTag[key].createdby,
                            "detail": data.getAllTaskUnTag[key].title + ' <span style="font-weight:bold;">' + data.getAllTaskUnTag[key].body+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                            "date": data.getAllTaskUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTypeList, function (key, value) {
                    if (value[key] != undefined) {
                        if (value[key].length != 0) {

                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value[key].type,
                                "relatedTo": value[key].relatedTo,
                                "typeid": value[key].type_id,
                                "who": value[key].createdby,
                                "detail": value[key].title + " : " + value[key].body,
                                "date": value[key].not_fire_time
                            });
                        }
                    }

                });

                $.each(data.changedDateListP, function (key, valu) {
                    
                    if (data.changedDateListP[key].length != 0) {
                        $.each(valu, function(kk,value){
                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "relatedTo": value.relatedTo,
                                "typeid": value.type_id,
                                "who": value.createdby,
                                "detail": 'Due date has been changed from  '+value.body + ' for project <span style="font-weight:bold;"> ' + value.title+'</span>',
                                "date": value.not_fire_time
                                
                            });
                        });
                    }

                });

                $.each(data.getAllStatusUpdate, function (key, valu) {
                    
                    if (data.getAllStatusUpdate[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            // console.log(allprojectANDTask);
                            // console.log(value.relatedTo);
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });

                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "status": value.body,
                                "detail": 'Following status update has been added for project  <span style="font-weight:bold;">'+projectaName+ '</span>',
                                "date": value.not_fire_time
                            });
                        });

                    }
                });

                $.each(data.getAllTypeTask, function (key, value) {
                    if (value[key] != undefined) {
                        if (value[key].length != 0) {
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value[key].relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value[key].type,
                                "typeid": value[key].type_id,
                                "relatedTo": value[key].relatedTo,
                                "who": value[key].createdby,
                                "detail": value[key].title + ' <span style="font-weight:bold;">' + value[key].body+'</span> added under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value[key].not_fire_time
                            });
                        }
                    }


                });

                $.each(data.changedDateListT, function (key, valu) {
                    
                    if (data.changedDateListT[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'Due date has been changed from <span style="font-weight:bold;">'+value.body + '</span> for task <span style="font-weight:bold;">' + value.title+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                                
                            });
                        });
                    }
                });

                
                $.each(data.changedDateListST, function (key, valu) {
                    
                    if (data.changedDateListST[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'Due date has been changed from <span style="font-weight:bold;">'+value.body + '</span> for subtask <span style="font-weight:bold;">' + value.title+'</span> under task <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                                
                            });
                        });
                    }
                });

                $.each(data.ProjectAttachment, function (key, valu) {
                    
                    if (data.ProjectAttachment[key].length != 0) {
                        $.each(valu, function(kk,value){
                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'New file has been attached under project <span style="font-weight:bold;">'+value.title + '</span> for task <span style="font-weight:bold;">' + value.title+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.TaskAttachment, function (key, valu) {
                    
                    if (data.TaskAttachment[key].length != 0) {
                        
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'New file has been attached under task <span style="font-weight:bold;">'+value.title + '</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.TaskHourchange, function (key, valu) {
                    
                    if (data.TaskHourchange[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "feed_data": value,
                                "ID": value.ID,
                                "approval":value.approval,
                                "notification_for": value.notification_for,
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'You have been allocated <span style="font-weight:bold;">'+value.body + ' Hours</span> for task <span style="font-weight:bold;">' + value.title+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                // $.each(data.getAllToasts, function (key, value) {
                //     if (data.getAllToasts[key] != undefined) {
                //         if (data.getAllToasts[key].length != 0) {
                //             feedArray.push({
                //                 "feed_data": value,
                //                 "ID": value.ID,
                //                 "approval":value.approval,
                //                 "notification_for": value.notification_for,
                //                 "type": 'notification',
                //                 "typeCat": value.type,
                //                 "typeid": value.type_id,
                //                 "relatedTo": value.relatedTo,
                //                 "who": value.createdby,
                //                 "detail": 'Due date has been changed from <span style="font-weight:bold;">'+value.body + '</span> for task <span style="font-weight:bold;">' + value.title+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                //                 "date": value.not_fire_time
                //             });
                //         }
                //     }
                // });

                // $.each(data.getAlltodo, function (key, value) {
                //     if (data.getAlltodo[key] != undefined) {
                //         if (data.getAlltodo[key].length != 0) {
                //             feedArray.push({
                //                 "feed_data": value,
                //                 "ID": value.ID,
                //                 "approval":value.approval,
                //                 "notification_for": value.notification_for,
                //                 "type": 'notification',
                //                 "typeCat": data.getAlltodo[key].type,
                //                 "id": data.getAlltodo[key].Id,
                //                 "who": data.getAlltodo[key].CreatedBy,
                //                 "detail": data.getAlltodo[key].Title,
                //                 "date": data.getAlltodo[key].CreatedDate
                //             });
                //         }
                //     }
                // });

                feedArray.sort(function (a, b) {
                    var c = new Date(a.date);
                    var d = new Date(b.date);
                    return c - d;
                });

                feedArray.reverse();

                total = feedArray.length;

                if (total == 0) {
                    design =  '<div class="panel panel-default proDiv" style="overflow-x: hidden;height: 537px;">';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 47%;font-size: 15px;color: #686868;">Hi ' + userName + ', </span>';
                    design += ' <span style="    width: 87%;float: left;margin-left: 6%;text-align: justify;margin-top: 2%;font-size: 15px;color: #686868;"> This is your live feed section where you will receive all your alerts, notifications and posts on all your own or associated projects, to-do, calendar and events.</span>';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 2%;font-size: 15px;color: #686868;">Cheers, </span>';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 2%;font-size: 15px;color: #686868;">Navigate Connect Team </span>';
                    design += '</div>'

                    $("#feedContent").append(design);
                }

                
                // for (var i = 0; i < feedArray.length;  i++) {
                // console.log(feedArray[0]);
                // }
                //console.log(total);
                // var feedJson = JSON.parse(feedArray);
                
                jQuery.each(feedArray, function (key, value) {
                  
                    
                    var name = '';
                    var img = '';

                    $.each(crm_emp, function (e, v) {
                        if (v.ID == value.who) {
                            name = v.full_name;
                            img = v.img;

                        }
                    });

                    if (key < 100) {
                        if (jQuery.inArray(value.type, appArray) !== -1) {
                        
                            if (value.type == 'notification') {
                                //console.log('feed_data',(value.feed_data));
                                if(jQuery.inArray(value.typeid,parentID) == -1){
                                    var unread = '';
                                }else{
                                    var unread = '<i class="fa fa-circle unread" aria-hidden="true" style="color: #a90329; position: absolute; right: 23px;"></i>';
                                }
                                
                                //console.log(value.typeCat);
                                //console.log(value);
                                var notType = value.typeCat.match(/[A-Z][a-z]+/g);
                                // console.log(notType);
                                if(notType[0] == 'Sub'){
                                    var notfTye = "Sub Task";
                                }else{
                                    var notfTye = notType[0];
                                }
                                str = ' <div data-nid="'+value.ID+'" class="panel panel-default notification onscroll">';
                                str += '	<div class="panel-body status">'+unread;
                                str += '		<div class="who clearfix"><span class="title">'+notfTye+' Notification On '+ moment(value.date).format('ddd, ll')+':</span>'
                                
                                if (value.sp == undefined) {
                                    if (value.relatedTo == undefined) {
                                        str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span> ';
                                    } else {
                                        str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span>';
                                    }
                                } else {
                                    str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span> ';
                                    //str += '			<span class="name" style="float: left;">' + value.detail + '   <span style="color: #686868;font-size: 13px;margin-left:5px;"> by ' + name + '</span></span>';
                                }
                                if (value.status !== 'null' && value.status !== undefined) {
                                    str += "            <span class='from uReply" + value.ID + "'>" + value.status + "</span>";
                                }
                                if (value.approval == '0' && value.approval != undefined) {
                                    str += '<div class="toastDiv">'+
                                                '<button onclick="toastApprove(this,'+value.ID+')" style="margin:2px" type="button" class="btn btn-success btn-xs">Approve</button>' +
                                                '<button onclick="toastReject(this,'+value.ID+')" style="margin:2px" type="button" class="btn btn-danger btn-xs">Reject</button>' +
                                            '</div>';

                                }
                                
                                str += '		</div>';
                                str += '	</div>';
                                str += '</div>';

                                $("#feedContent").append(str);
                            } else if (value.type == 'comment') {
                                
                                var cmnType;
                                var crner;
                                var color;
                                var splitTitle = value.title.split(':');
                                // console.log(splitTitle[0]);
                                //console.log(splitTitle[1]);
                                switch (value.typeCat) {
                                    case 'ProjectCmnt':
                                        cmnType = 'Project Comments';
                                        crner = 'noteP';
                                        color = '#1FEA9C';

                                        break;
                                    case 'TaskCmnt':
                                        cmnType = 'Task Comments';
                                        crner = 'noteT';
                                        color = '#73787F';
                                        break;
                                    default:
                                        cmnType = 'Todo Comments';
                                        crner = 'noteTo';
                                        color = '#6EA7F2';
                                }
                                // <i class="fa fa-times panelClose" aria-hidden="true"></i>
                                strTodo = ' <div class="panel panel-default directchat onscroll">';
                                strTodo += '	<div class="panel-body status">';
                                strTodo += '			<span class="top-title" style="color: #152940;    margin-left: 9px;">' + cmnType + ' Notification on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                strTodo += '		<div class="who clearfix" style="margin-top: -5%;">';
                                //strTodo += '			<img src="<?php echo base_url(); ?>asset/img/avatars/'+img+'" alt="img" class="online">';
                                if (value.typeCat == 'ProjectCmnt') {
                                    strTodo += '			<span onclick="goPro(' + value.typeid + ',\'' + splitTitle[1].trim() + '\',' + value.relatedTo + ')" class="name" style="float: left;"><strong>'+name+'</strong> wrote on <strong>' + splitTitle[1] + '</strong> on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                } else if (value.typeCat == 'TaskCmnt') {
                                    strTodo += '			<span class="name" style="float: left;"> <strong>'+name+'</strong> wrote on <strong>' + splitTitle[1].trim() + '</strong> under project <strong><span onclick="goPro(' + value.relatedTo + ',\'' + value.replay_msg + '\')">' + value.replay_msg + '</span></strong> on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                } else {
                                    strTodo += '			<span onclick="goPro(' + value.typeid + ',\'' + splitTitle[1].trim() + '\',' + value.relatedTo + ')" class="name" style="float: left;"><strong>'+name+'</strong> wrote on ' + splitTitle[1] + ' on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                }
                                strTodo += '			<span  class="from" style="padding: 13px;">' + value.detail + '</span>';
                                // strTodo += '			<span class="name quicklink" onclick="openC(' + value.typeid + ')">Quick Reply</span>';
                                strTodo += '				<div class="col-lg-12">';
                                strTodo += '					<div class="qrMsgCSS cqrMsg' + value.ID + '" onkeyup="quickreplysubmit(\'' + value.typeCat + '\', \'' + value.typeid + '\', event)" contenteditable onfocus="if($(this).html() == \'Quick Reply\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Quick Reply\');">Quick Reply</div>';
                                strTodo += '				</div>';
                                strTodo += '            <span class="from openThred" onclick="openC(' + value.typeid + ')">Open full conversation thread</span>';
                                strTodo += '			</div>';
                                strTodo += '		</div>';
                                strTodo += '	</div>';
                                strTodo += '</div>';

                                $("#feedContent").append(strTodo);
                                strTodo = "";
                            } 
                            else if (value.type == 'chatMsg') {

                                // This is a group message
                                if (value.recever_id > 1400000000 ) {
                                    var groupName = "";
                                    
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            groupName = vg.group_name;
                                        }
                                    });

                                    strTodo = '	<div class="panel panel-default directchat onscroll">';
                                    strTodo += '		<div class="panel-body status">';
                                    // strTodo += '			<div class="who clearfix"><span class="title">Group Chat Notification On '+ moment(value.date).format('ddd, ll')+':</span>';

                                    strTodo += '			<div class="who clearfix"><p class="title" style="font-size: 16px !important; font-weight: bolder; color: #000000; margin: 0px;"><span style="color: #01013e;">Group:</span> '+ groupName+'</p>';
                                    strTodo += '			<p style="color: #01013e;">'+ moment(value.date).format('ddd, ll')+'</p>';
                                    
                                    strTodo += '				<span class="name" style="float: left;"><span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')">' + name + '</span> @ '+moment(value.date).format('LT')+'</span>';
                                    
                                    


                                    // strTodo += '				<span class="name" style="float: left;"> <span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')" >' + name + '</span> wrote under group <span style="font-weight:bold;">' + groupName + '</span></span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                       strTodo += "			<span class='name" + value.ID + "'>You replied @ "+moment().format('LT')+"</span>";
                                        strTodo += "			<span class='from uReply" + value.ID + "'>" + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += '				<span  class="from" style="margin-bottom: 7px;font-size: 14px !important;color: #3276b1 !important;">' + value.detail + '</span>';
                                        strTodo += "			<span class='from uReply" + value.ID + "'></span>";

                                    }
                                    strTodo += '				<div class="col-lg-12">';
                                    strTodo += '					<div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.recever_id + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Quick Reply\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Quick Reply\');" style="padding: 5px !important;">Quick Reply</div>';
                                    strTodo += '				</div><img class="quicksubmitsent" id="quicksubmit' + value.recever_id + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                    strTodo += '            <span class="from openThred" onClick="triggerGroupChat(\'' + value.recever_id + '\')">Open full conversation thread</span>';
                                    strTodo += '			</div>';
                                    strTodo += '			<div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '			</div>';
                                    strTodo += '		</div>';
                                    strTodo += '	</div>';
                                } else if(value.recever_id > 99999999 && value.recever_id < 1400000000 ) {
                                    // console.log(1981);
                                    var ProjectName = "";
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            ProjectName = vg.group_name;
                                        }
                                    });
                                    // console.log(gnpcontacts);
                                    strTodo = '	<div class="panel panel-default directchat onscroll">';
                                    strTodo += '		<div class="panel-body status">';
                                    strTodo += '			<div class="who clearfix"><p class="title" style="font-size: 16px !important; font-weight: bolder; color: #000000; margin: 0px;"><span style="color: #01013e;">Project:</span> '+ ProjectName+'</p>';
                                    strTodo += '			<p style="color: #01013e;">'+ moment(value.date).format('ddd, ll')+'</p>';
                                    strTodo += '				<span class="name" style="float: left;"><span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')">' + name + '</span> @ '+moment(value.date).format('LT')+'</span>';
                                    
                                    strTodo += '				<span  class="from" style="margin-bottom: 7px;font-size: 14px !important;color: #3276b1 !important;">' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "			<span class='name" + value.ID + "'>You replied @ "+moment().format('LT')+"</span>";
                                        strTodo += "			<span class='from uReply" + value.ID + "'>" + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "			<span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '			<div class="col-lg-12">';
                                        strTodo += '				<div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Quick Reply\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Quick Reply\');" style="padding: 5px !important;">Quick Reply</div>';
                                        // strTodo += '				<i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.who + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                        // strTodo += '				<i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.who + '\')"></i>';
                                        strTodo += '			</div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                        strTodo += '            <span  class="from openThred"  onClick="triggerGroupChat(\'' + value.recever_id + '\')" style="font-weight: bold;">Open full conversation thread</span>';
                                    }
                                    strTodo += '			</div>';
                                    strTodo += '			<div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '			</div>';
                                    strTodo += '		</div>';
                                    strTodo += '	</div>';
                                } else {
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <div class="who clearfix"><p class="title" style="font-size: 16px !important; font-weight: bolder; color: #000000; margin: 0px;"><span style="color: #01013e;">Direct Chat Notification:</span></p>';
                                    strTodo += '                <span class="name" style="float: left;"><span class="cqrName" onClick="triggerChat(\'' + value.who + '\')">' + name + '</span> @ '+moment(value.date).format('LT')+'</span>';
                                    strTodo += '                <span  class="from">' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                         strTodo += "			<span class='name" + value.ID + "'>You replied @ "+moment().format('LT')+"</span>";
                                        strTodo += "			<span class='from uReply" + value.ID + "'>" + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '            <div class="col-lg-12">';
                                        strTodo += '                <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Quick Reply\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Quick Reply\');" style="padding: 5px !important;">Quick Reply</div>';
                                        
                                        strTodo += '            </div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                        strTodo += '            <span  class="from openThred"  onClick="triggerChat(\'' + value.who + '\')">Open full conversation thread</span>';
                                    }
                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                }
                                $("#feedContentChat").append(strTodo);
                                strTodo = "";
                            }

                        } else {
                            if (value.type == 'NEWS') {
                                // noteN
                                str = ' <div class="panel panel-default news onscroll">';
                                str += '	<div class="panel-body status">';
                                str += '			<span class="top-title" style="color: #053368;">' + value.source + ' on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                str += '		<div class="who clearfix" style="margin-top: -26px;margin-bottom: -26px;">';
                                str += '			<span class="name" onclick="goLink(\'' + value.url + '\')" style="float: left;">' + value.description + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> by ' + value.author + '</span></span>';
                                str += '		</div>';
                                str += '	</div>';
                                str += '</div>';

                                $("#feedContentNews").append(str);

                            }
                        }
                    }
                });
                $("#loading").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

	function feddUpdate() {
        //alert('refresh');
        var min = 0;
        var max = res.length - 1;
        var random = Math.floor(Math.random() * (max - min + 1)) + min;
        $("#feedContent").html("");
        $("#feedContentChat").html("");
        getNewsFeed(random);
        loadResults('10')
    }


	$(window).load(function () {

        var min = 0;
        var max = (typeof res != 'undefined')? res.length - 1 : 0;
        var random = Math.floor(Math.random() * (max - min + 1)) + min;
        
        var pathArray = window.location.pathname.split('/');
        open_feed("dashboard");
		//console.log("OK");
		<?php if(user_privilege($id, $org_id, "pro") == "RWD") { ?>
		getAllProject();
		<?php } else { ?>
		default_project_design();
		<?php } ?>
		
		if (pathArray[2] == 'dashboard') {
            $('#glyphicon-home').css('color', '#fff !important');

            <?php if(! isset($shared_activity_id)) { ?>
                getNewsFeed(random);
                loadResults('10');
            <?php } ?>
        }

        var pathArray = window.location.pathname.split('/');
        if (pathArray[2] == 'myfiles') {
            $("div#updateRefresh").css('margin-top','0px');
            $("div#feedexpand").css('padding-top','2%');
            $("div#feedeclose").css('padding-top','2%');
        }
        //viewAllNotification();
    });


</script>
