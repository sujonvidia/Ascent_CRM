
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title><?php echo $page_title; ?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="FPS School Manager Pro - FreePhpSoftwares" />
	<meta name="author" content="FreePhpSoftwares" />
	<?php include 'template/includes_top.php';?>
	<style type="text/css">
		.proDiv .panel .page-title:hover{
		    color: #3276b1 !important;
		}
		
		.taskname:hover{
			color: #3276b1 !important;
		}
		.ProName{
			width: 65%;
		}
		.ProBtn{
			width: 35%;
			margin-top: 2%;
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
		  font-family: monospace;
		  font-size: 25px;
		  -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
		    -moz-box-sizing: border-box;    /* Firefox, other Gecko */
		    box-sizing: border-box;
		    color: #aba9a9;
		}

		#degree{
		  	position: absolute;
		    font-size: 8px;
		    font-weight: bolder;
		    margin-top: .5%;
		    color: #aba9a9;
		}
		#cunit{
		    
		    font-size: 21px;
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
			background-color: #e6e6e6;
		}
		.todo_name_overflow{
			overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
    display: inline-block;
		}
		.qtip{
			max-width: 1000px;
		}
		.chk-alarm{
			margin: 0px !important;
		}

		#myprojectList{
			height: 612px;
			overflow-y: auto;
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
	</style>

	<!-- ITL Todo CSS : sujon -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/itl-todo/itl-todo.css">
	
</head>
	
<body class="">

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
					<li>
						<input type="hidden" name="forecastValue" id="forecastValue" value="">
						<p  id="pStyle" style="font-size: 25px;width: inherit;height: 44px;position: relative;right: 1%;display: none;margin-left: 1%;">
			              <span id="givendateID" style="margin-top: 0px;color: #aba9a9"></span>
			              <span id="city"></span>
			              <span id="valu"></span><span id="degree"><i class="fa fa-fw fa-circle-o"></i></span>
			              <span id="cunit" onclick="convert('C')">C</span>
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
								<?php // include("old my feed.ph.php"); ?>
							</div>
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 txt4">
								<div id="myprojectList">
									
								</div>
								<a href="javascript:void(0);" onclick="viewMoreProject()" style="color: #bfbfbf;">View More ...</a>
							</div>
						</div>
						
						<div class="col-lg-4 todoDiv">
							
							<div class="">
								<div class="panel panel-default proDiv" style="height: 300px;">
									<div class="panel panel-head">
										<h3 class="no-float txt-color-blueDark">My To-Do</h3>

									</div>

									<div id="todoPanel" class="panel-body font-color">

										<div class="row form-group">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<input id="newTodoInput" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'To-Do'" placeholder="To-Do" class="form-control border-rad">


											</div>

										</div>


										<div id="todoInsertDiv">

										</div>


									</div>

									<div class="panel-footer">
										<p onclick="view_more_todo(this)" class="fa-category-gray">View more...</p>
									</div>
								</div>


								<div class="panel panel-default proDiv" style="height: 300px;">
									<div class="panel panel-head">
										<h3 class="no-float cur-time txt-color-blueDark"></h3>

									</div>

									<div id="recentPanel" class="panel-body">

									</div>

									<div class="panel-footer">
										<p onclick="view_more_recent(this)" class="fa-category-gray">View more...</p>
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


		<!-- PAGE FOOTER -->
		<?php include 'template/footer.php';?>
		

<!--================================================== -->
<?php include 'template/includes_bottom.php';?>
<?php include 'template/weather_js.php';?>

<script type="text/javascript">
	setCookie("feed_div_width", $("#myprojectList").outerWidth()-26, 1);
</script>
<script type="text/javascript">
	var projectArray = [];
	var TaskArray = [];
	var projectIDlist = [];

	$( window ).load(function() {
		open_feed("dashboard");
		getAllProject();
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
						
		 			//console.log(data);
		 			design =  '<div class="panel panel-default proDiv">';
					design += '			<div class="panel panel-head">';
					design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
					design += '					<h3 id="prodestext1_'+data.prioTask+'" onclick="goPro('+data.prioTask+',\''+pName+'\')" class="page-title txt-color-blueDark" style="width:100%; text-overflow: ellipsis;">'+pName+'</h3>';
					design += '				</div>';
					design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
					design += '					<span class="pull-right" id="tagBtnDiv'+data.prioTask+'"></span>';
					design += '				</div>';
					design += '			</div>';
					design += '			<div class="panel-body status">';
					design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style="margin-top: -17px;"  id="taskListDiv'+data.prioTask+'">';
					design += '<div class="row prolist">	<span class="name"><i class="fa fa-times"></i></span>&nbsp;&nbsp;	<span class="from" style="color:red;">No task found</span></div>';
					design += '				</div>';
					design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -10%;">';
					design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="0" data-pie-size="60">';
					design += '						<span class="percent txt-color-darken">0</span>';
					design += '					</div>';
					design += '					<a  onclick="addTask('+data.prioTask+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
					design += '				</div>';
					design += '			</div>';
					design += '		</div>';
					


					$("#myprojectList").append(design);
		 			
		 			//$("#newProjectForm").reset();
		 			$("#newProjectForm").trigger("reset");
		 			
		 			$('#openNewProject_s1').modal('hide');

		 			$('.easyPieChart').easyPieChart({
				        animate: 500,
				        barColor:"#404040",
				        lineWidth: 5,
				        trackColor: "#b5b5b5",
				        scaleColor: "#ffffff",
				        size: 60
				    });

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

	function getAllProject(){
		//$("#relatedto").hide();
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
					design =  '<div class="panel panel-default proDiv" style="height: 595px;">';
					design += '		<img style="width: 39%;margin-left: 32%;margin-top: 30%;" src="<?php echo base_url(); ?>asset/img/bell.png">';	
					design += '		<span style="width: 68%;float: left;margin-left: 23%;margin-top: 7%;font-size: 19px;color: #cccccc;"> Sorry!!! No project found</span>';
					design += '		<a id="open_newpro1" onclick="showModal()" style="margin-left: 32%;margin-top: 12%;" href="javascript:void(0);" class="btn btn-primary btn-lg">Create Project</a>';
					design += '</div>'
				    
				    $("#myprojectList").append(design);
				}
				if(projectArray.length > 4){
					while(num<4){

						design =  '<div class="panel panel-default proDiv">';
						design += '			<div class="panel panel-head">';
						design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
						design += '					<h3 id="prodestext1_'+projectArray[num].projectid+'" onclick="goPro('+projectArray[num].projectid+',\''+projectArray[num].projectname+'\')" class="page-title txt-color-blueDark" style="width:100%; text-overflow: ellipsis;">'+projectArray[num].projectname+'</h3>';
						design += '				</div>';
						design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
						design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[num].projectid+'"></span>';
						design += '				</div>';
						design += '			</div>';
						design += '			<div class="panel-body status">';
						design += '				<div class="col-lg-8 col-sm-8 col-md-8 TLD" style="margin-top: -17px;"  id="taskListDiv'+projectArray[num].projectid+'">';
						design += '				</div>';
						design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -10%;">';
						design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+projectArray[num].progress+'" data-pie-size="60">';
						design += '						<span class="percent txt-color-darken">'+projectArray[num].progress+'</span>';
						design += '					</div>';
						design += '					<a  onclick="addTask('+projectArray[num].projectid+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
						design += '				</div>';
						design += '			</div>';
						design += '		</div>'
					    
					    $("#myprojectList").append(design);

					    

					    if(projectArray[num].description){
								var qtc='<div class="todo-desc">Description: '+projectArray[num].description +'</div>';

								$('#prodestext1_'+projectArray[num].projectid).qtip({
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


					    $('.easyPieChart').easyPieChart({
					        animate: 500,
					        barColor:"#404040",
					        lineWidth: 5,
					        trackColor: "#b5b5b5",
					        scaleColor: "#ffffff",
					        size: 60
					    });
					    design = "";
					    
					    getTagAjax(projectArray[num].projectid);
					    num++;
					}
				}else{
					
					for(i = 0 ; i<projectArray.length; i++){
						
						design = '<div class="panel panel-default proDiv">';
						design += '			<div class="panel panel-head">';
						design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
						design += '					<h3 id="prodestext2_'+projectArray[i].projectid+'" onclick="goPro('+projectArray[i].projectid+',\''+projectArray[i].projectname+'\')" class="page-title txt-color-blueDark" style="width:100%; text-overflow: ellipsis;">'+projectArray[i].projectname+'</h3>';
						design += '				</div>';
						design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
						design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[i].projectid+'"></span>';
						design += '				</div>';
						design += '			</div>';
						design += '			<div class="panel-body status">';
						design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style="margin-top: -17px;"  id="taskListDiv'+projectArray[i].projectid+'">';
						design += '				</div>';
						design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -10%;">';
						design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+projectArray[i].progress+'" data-pie-size="60">';
						design += '						<span class="percent txt-color-darken">'+projectArray[i].progress+'</span>';
						design += '					</div>';
						design += '					<a  onclick="addTask('+projectArray[i].projectid+')" href="javascript:void(0);" class="btn btn-default btn-xs">Add Task</a>';
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
					        size: 60
					    });

					    if(projectArray[i].description){
								var qtc='<div class="todo-desc">Description: '+projectArray[i].description +'</div>';

								$('#prodestext2_'+projectArray[i].projectid).qtip({
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
					    
					    getTagAjax(projectArray[i].projectid);
					    //drawTasklist(data.tasklist,projectArray[num].projectid);
					}
				}
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

	function goPro(value,proname,taskID = false){
		setCookie('project',value,1);
		setCookie('taskid',taskID,1);
		setCookie('projectName',proname,1);
		window.location.href = base_url+"projects";
	}



	function drawTasklist(data){
		

		var design ="";
		$.each(projectIDlist, function(ky,vlu){
			if(data[ky].length != 0){
				$.each(data[ky], function (k, v) {
					
					design += '<div class="row prolist">';
					design += '	<span class="name"><i class="fa fa-check-circle-o"></i></span>&nbsp;&nbsp;';
					design += '	<span id="taskdestext3_'+v.projecttaskid+'"  class="from taskname" onclick="goPro('+v.projectid+',\''+v.projectname+'\','+v.projecttaskid+')">'+v.projecttaskname+'</span>';
					design += '</div>';
					$("#taskListDiv"+v.projectid).append(design);

					if(v.description){

					var qtc='<div class="todo-desc">Description: '+v.description +'</div>';

					$('#taskdestext3_'+v.projecttaskid).qtip({
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
		var totalCount = projectArray.length;
		var start = 5;
		$(".TLD").html("");
		while(start<totalCount){
			design = '<div class="panel panel-default proDiv">';
			design += '			<div class="panel panel-head">';
			design += '				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left ProName">';
			design += '					<h3 id="prodestext4_'+projectArray[start].projectid+'" onclick="goPro('+projectArray[start].projectid+',\''+projectArray[start].projectname+'\')" class="page-title txt-color-blueDark" style="width:100%; text-overflow: ellipsis;">'+projectArray[start].projectname+'</h3>';
			design += '				</div>';
			design += '				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ProBtn">';
			design += '					<span class="pull-right" id="tagBtnDiv'+projectArray[start].projectid+'"></span>';
			design += '				</div>';
			design += '			</div>';
			design += '			<div class="panel-body status">';
			design += '				<div class="col-lg-8 col-sm-8 col-md-8  TLD" style="margin-top: -17px;" id="taskListDiv'+projectArray[start].projectid+'">';
			design += '				</div>';
			design += '				<div  class="col-lg-4 col-sm-4 col-md-4" style="margin-top: -10%;">';
			design += '					<div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="'+projectArray[start].progress+'" data-pie-size="60">';
			design += '						<span class="percent txt-color-darken">'+projectArray[start].progress+'</span>';
			design += '					</div>';
			design += '					<a href="javascript:void(0);" class="btn btn-default btn-xs" onclick="addTask('+projectArray[start].projectid+')">Add Task</a>';
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
					        size: 60
					    });

		    if(projectArray[start].description){

					var qtc='<div class="todo-desc">Description: '+projectArray[start].description +'</div>';

					$('#prodestext4_'+projectArray[start].projecttaskid).qtip({
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
		    getTagAjax(projectArray[start].projectid);
		    start++;
		}

		drawTasklist(TaskArray);
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
				//console.log(response);
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

<script type="text/javascript">
        var DashboardEvents = <?php echo json_encode($DashboardEvents); ?>;
        //console.log('DashboardEvents');console.log(DashboardEvents);
       drawRecents(DashboardEvents);

       function calendarPopup(popid){
        	window.location.href = base_url+"calendar/calendarview/"+popid;
        }

       function drawRecents(full_recents){
        $.each(full_recents, function (j, val) {
        	if(val != false){
        		var start_from=moment(val.start).format('hh:mm');
        		var start_to=moment(val.end).format('hh:mm a');
        		var start_location=val.location;

        		var newrow='<div class="row">'
        		+'<div class="col-lg-1 col-sm-1 col-md-1">'
        		+'<div class="calendar_date">'+moment(val.start).format('D')+'</div>'
        		+'<div class="calendar_day">'+moment(val.start).format('ddd')+'</div>'
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

        </script>

        <script>
			
			
			var todo_serial=0;
			var allcategory = <?php echo json_encode($allcategory); ?>;
			
			var request = $.ajax({
				url: base_url+"todo/getDashboardTodos",
				method: 'POST',
				
				dataType: 'JSON'
			});
			
			request.done(function(response){
				//console.log('getUserTodo');
				//console.log(response);
				
				if(response.length>0){
					$.each(response, function(k,v){
						insertNewTodo(v);
					});
					}else{
					
				}
				
			});
			
			
			$("#newTodoInput").on('keydown', function (e) {
				var todo_name = $(this).val();
				
				if (e.keyCode == 13) {
					
					var request = $.ajax({
						url: base_url+"todo/addTodoEntry",
						method: 'POST',
						
						data: {
							"entry_name": todo_name,
							"taskloc-pid":0,
							"taskloc-tlid":"0000000000",
							"priority":"Medium",
							"start_date":moment().format("YYYY-MM-DD HH:mm:ss"),
							"end_date":moment().format("YYYY-MM-DD HH:mm:ss"),
							"descr":"",
							"entry_type":"todo",
							"reminder":"",
							"entry_color":"#228B22",
							"location":"",
							
						},
						dataType: 'JSON'
					});

					request.done(function(response){
						//console.log(response);
						
					 	insertNewTodo(response[0]);
					 	$('#newTodoInput').val('');
						
					 });

				}
			});
			
			function fun_close_dropdown(dd_serial){
				$('*').qtip('hide');
			}
			function fun_open_dropdown(dd_serial){
				$('.dropdown').removeClass('open');
				$('#dd_div_'+dd_serial).addClass("open");
				
			};
			
			$(document).click(function(event) { 

})

		
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
			
			function fun_delTodo(serial){
				
				swal({
					title: "Are you sure?",
					//text: "Your will not be able to recover this imaginary file!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function(){
					var request = $.ajax({
						url: base_url+"todo/delCalendarEntry",
						method: 'POST',
						data: {
							user_id: "<?php echo $id; ?>",
							cal_id:serial
						},
						//dataType: 'JSON'
					});
					request.done(function(response){
						$('#todoRow'+serial).remove();
						swal("Deleted!", "Your To-do has been deleted.", "success");
						
						
					});
					
				});
				
			}
			
			function insertNewTodo(data){
				
				var todo_serial=data.projecttaskid;
				var duedate=data.enddate;
				var curdatetime=moment(duedate).format('MMM D hh:mm a');
				var curtime=moment(duedate).format('H:mm');
				var todo_name=data.projecttaskname;
				var todo_status=data.projectstatus;
				
				var newtodo='<div id="todoRow'+todo_serial+'" data-serial="'+todo_serial+'" class="dd-parent row margin-topdown bottom-border">'

				+'<div class="col-lg-1 col-sm-1 col-md-1">'
				+	'<img class="icon-check" src="icons/Checkmark.png">'
				+'</div>'

				+'<div class="col-lg-5 col-sm-5 col-md-5">'
				+	'<a href="<?php echo base_url(); ?>todo/todoview/'+todo_serial+'" class="todo_name_overflow">'+todo_name+'</a>'
				+'</div>'

				+'<div id="dd_div_'+todo_serial+'" class="col-lg-5 col-sm-5 col-md-5 dropdown">'
				+	'<li class="ddm-duecalendar" style="display:inline">'

				+	'<a id="dd_duedate_text_'+todo_serial+'" data-time="'+curtime+'" data-toggle="dropdown"  class="dropdown-toggle dd-link">'+curdatetime+'</a>'
				
				+	'</li>'
				+'</div>'

				+'<div class="col-lg-1 col-sm-1 col-md-1">'
				
				+	'<div class="pull-right">'
				
	
				
				+'<li class="workspace4" style="display:inline">'
				+		'<a data-serial="'+todo_serial+'"  class="dropdown-toggle dt-category">'
				
				+			'<i class="fa fa-circle fa-category-gray" style="color:'+data.cat_color+'"></i>'
				+		'</a>' 
				
				+	'</li>'
				
				
				+	'</div>'
				
				+'</div>'
				
				
				+'</div>';
				
				var newtodo=$(newtodo);
				
				$('#todoInsertDiv').prepend(newtodo);
				//console.log(newtodo);

					qtipCategory(newtodo.find('.dt-category'),data);

				// var qtc='<li class="workspace4" style="display:inline">'

				// +		'<ul data-serial="'+todo_serial+'" class="keep-open">'
				// +			'<li class="dropdown-menu-footer add-category"><i class="fa fa-plus-circle"></i> Add Category</li>'
				// +		'</ul>'

				// +'</li>';

				// newtodo.find('.dt-category').qtip({

				// 	show: {
				// 		event: 'click'
				// 	},
				// 	hide: 'unfocus click',
					
				// 	content: {text: qtc },

				// 	position: {
				// 		at: 'bottom right',  
				// 		my: 'top right', 
				// 		viewport: $(window),
				// 		adjust: {
				// 			mouse: true,
				// 			scroll: true
				// 		}

				// 	},
				// 	style: {
				// 		classes: 'qtip-light qtip-rounded qtip-units',
				// 		width: '300'
				// 	},


				// 	events: {
				// 		show: function(event, api) {
							
				// 		},
				// 		render: function(event, api) {

				// 			$.each(allcategory, function(k,v){

				// 				var loadcat='<li id="catid_'+v.id+'" class="li-cat" onclick="setCat('+v.id+',this)" data-serial='+v.id+'>'
				// 				+'<div class="row" style="margin:0px">'

				// 				+'<div class="col-lg-2 div-cat-color">'
				// 				+'<span class="fa fa-circle active" style="color:'+v.cat_color+'"></span>'
				// 				+'</div>'

				// 				+'<div class="col-lg-6 div-cat-name">'
				// 				+'<span class="cat-text">'+v.cat_name+'</span>'
				// 				+'</div>'

				// 				+'<div class="col-lg-2 div-cat-update">'
				// 				+'<span onclick="updateCat('+v.id+','+v.user_id+',this,event)" class="fa fa-pencil-square-o"></span>'
				// 				+'</div>'

				// 				+'<div class="col-lg-2 div-cat-delete">'
				// 				+'<span onclick="delCat('+v.id+','+v.user_id+',this,event)" class="fa fa-trash"></span>'
				// 				+'</div>'

				// 				+'</div>'
				// 				+'</li>';
				// 				loadcat=$(loadcat);
				// 				console.log('$(this) category');
				// 				$(event.currentTarget).find('.add-category').before(loadcat);

				// 				//$(this).find('.add-category').before(loadcat);

				// 			});

				// 			$(event.currentTarget).find('[class="li-cat"][data-serial="'+data.category_id+'"]').addClass('active');


				// 		},
				// 		hide: function(event, api) {

				// 		}
				// 	}
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
						classes: 'qtip-light qtip-rounded qtip-units',
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
		<script src="<?php echo base_url();?>asset/js/itl-todo/itl-todo-manager.js"></script>

		<script type="text/javascript">

		function addTask(proID){
			// $('#opentask').modal('show');
			// $("#projectInputId").val(proID);
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
		        	//console.log("tag People");
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
					$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
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