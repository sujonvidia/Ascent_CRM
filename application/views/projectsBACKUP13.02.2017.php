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
		/*#tagAddAdmin .select2-selection__choice__remove {
            display: none !important;
            width: 0px;
        }

        #tagAddAdmin .select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
            border-radius: 50%;
            height: 32px;
            padding-top: 1.5%;
            font-size: 13px;
            width: 35px;

        }*/
        .swal2-container{
            z-index: 15000000;
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

        .qtip-tip{}
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
            padding-left: 27px;
            margin-top: -12px;
            font-size: 23px;
        }
        
        .setActive{
			background: #a7a4a4;
    		border-radius: 50%;
		}
		.proName{
			cursor: pointer;
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
		/* added by sujon */
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
		.todo .dropdown-menu-footer{
		  background-color: #c5c5c5;
		
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
		  cursor:pointer;
        }
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
		}
		.event_name{
		font-weight: bold;
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
			}
			
			.icon-todo-menu{
			width:32px;
			height:32px;
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
			font-size:16px;}
			.arrow-top-right{
			    margin-left: 82%;
			}
			.customdate{
				border: none;
				cursor: pointer;
				width: 15%;
			}
			.ui-datepicker td .ui-state-default {
				/*background-color: #1bbc9b;*/
    			border-radius: 50%;
			}
			.ui-datepicker td .ui-state-active {
				background-color: #1bbc9b;
			}
			.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
				background-color: #1bbc9b;
			}

			.ui-datepicker td .ui-state-highlight {
				background-color: #fafafa;
			    border: 1px solid #686868;
			    color: #000000;
			}

			.ui-datepicker td a:hover {
			    color: #fff;
			    background-color: #999;
			}

			.ui-datepicker .ui-datepicker-title {
				color: #1bbc9b;
				font-size: 14px;
			}
	</style>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/itl-todo/itl-todo.css?v=<?php echo time();?>"> -->
	<style type="text/css">
    /* CSS by sujon */

    .todo-desc{
            font-size: 15px;
            padding: 10px;
            line-height:1.2;
        }
    #quote_details_pro > tbody .chk-qt-inv{
        display: none
    }
	.modal{
        z-index: 1500020000000000000000000 !important;
    }
    .itemlistheightin{}
    .itemlistheightout{margin-top: 5px;}
    .itemlistheightmid{padding-top:10px}
    #tabindex5, #tabindex6, [id^=total_discount] {
		    border: none;
		}
    #quote_details .select2-selection__arrow,#quote_details_pro .select2-selection__arrow{
    	width: auto;
    }
    #quote_details,#invoice_details,#quote_details_pro,#invoice_details_pro{
    	border-collapse: collapse;
    	width: 100%;
    }
    #quote_details tr,#quote_details td,#invoice_details tr,#invoice_details td,#quote_details_pro tr,#quote_details_pro td,#invoice_details_pro tr,#invoice_details_pro td{
    	border: 1px solid #ccc !important;
    }
    
    .chk-qt-inv-items {
    	display: none
    }
    .bigdrop {
        width: 100% !important;
    }
    /*.select2-dropdown{
        width: auto !important;
    }*/
    .input-sm{
        height: 32px !important;
        padding: 3px !important;
    }
    .input-group{
        width: 100% !important;
    }
    .chk-qt-item{
        display: none;
    }
    .invoice-item-details tfoot td,[id^=inv_item_tfoot] td{
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }
    #item_details_foot,.invoice-item-details tfoot{
        background-color: rgba(211, 211, 211, 0.36) !important;
    }
 
    #item_details input:not([id^=total_discount]):focus,.invoice-item-details input:not([id^=total_discount]):focus{
        border-color:orange !important;
    }
 
    input[type='number'] {
    -moz-appearance:textfield;
    }
 
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
 
    #item_details .input-group{width:100%}
    #item_details thead th:nth-child(1),#item_details tbody td:nth-child(1){ display:none !important;}
 
    .qtip-transparent {
        background-color: transparent;
        border-color: transparent;
        color: #454545;
        box-shadow: none !important;
    }
    .btn-updateandexit {
        width: 70px !important;
        margin-left: 5px;
        height: 23px;
    }
 
   /* #invoice_details *{
            font-family: 'ProximaNovaW01-Regular' !important;
    }*/
    .invoice-item-details{
    margin-left: 15px;font-size: 10px;  width: 95%;table-layout: fixed;
    }
    .invoice-item-details input{
        width: 100%;
    }
    /*[aria-labelledby^="select2-qty_unit"],[aria-labelledby^="select2-sel_currency"]{
 
        height: 30px;
 
    }*/
    .unitSelect2-drop{
        font-size: 10px !important;
    }

    .select2-selection__rendered{
        font-size: 10px !important;
        
    }
    .select2-results__option{
        font-size: 10px !important;
        
    }
    .select2-container--default .select2-results > .select2-results__options{
        max-height: 260px !important;
    }
    .icon-plus{
        margin-top: 5px !important
    }
    .select2-selection__choice__remove{
        float:right;
    }
    .select2-container--default .select2-results__option[aria-selected=true]:before{
      content:'\2713';
      display:inline-block;
      color:green;
      padding:0 6px 0 0;
    }
    
    .qtip-content{
        padding: 0px;
    }
    .inp-qty-unit{
        width: 50% !important
    }
    .sel-qty-unit{
        width: 35px !important;
        min-height: 30px;
        font-size: 10px;
        position: absolute;
    }
    
    .sym-currency{
        width: 50% !important
    }
    .inp-currency{
        width: 50% !important
    }
    /* fixed */
    .select2-dropdown { 
      z-index: 90010000000000000000000000000000 !important; 
    }
    #delete_item1{
        display: none;
    }
    .invoice-item-details tbody tr:first-child .fa-trash{
        display: none;
    }
    .modal-content{
        width: 550px;
    }
    
    .btn-qa{
        height: 35px;
        width: 35px;
        margin-right: 5px;
        border-radius: 100%;
    }
    .fa-size{
        margin: 2px;
        font-size: 15px !important;
    }
    [name="quotestage_pop"],[name="quotename_pop"],[name="invoicestage_pop"],[name="invoicename_pop"]{
        width: 100%;
        height: 25px;
    }
   
    #item_details{
        margin-top: 10px;
    }
    .ui-widget-size{
        width: 100% !important;
    }
    .popupmenu{
        margin-left: 30px;color:black;font-size: 25px;color:blue;
    }

    .qtip-content
    {
        overflow: visible !important;
       /*padding-bottom: 10px;*/

    }
    .qtip-close{
        top:2px;    right: 2px;
    }

    .display-tag-image{
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: 2px;
    }
    .display-qtip-image{

    width: 20px;
    height: 20px;
    /*border-radius: 50%;*/
    margin-left: 3px;
    }
    .display-qtip-bigimage{
    width: 30px;
    height: 30px;
    /*border-radius: 50%;*/
    margin-left: 3px;
    }
    .popup-font{
        font-size: 13px;
        
    }
    .add-table-margin{
        /* -webkit-transform: translate(20px,0);
       -moz-transform: translate(20px,0);*/
    }

    .tbl_qtip{
        table-layout:fixed;
        width: 580px !important;
        /*border-collapse: separate !important;*/
        background-color: lightgray !important;
    }
    .tbl_qtip td{
        border: none !important;
    }

    .tbl_qtip td:first-child{
        width: 25%; 
    }

    .qtip{
        max-width: 1000px !important;
        min-width: 100px !important;
        box-shadow: 5px 5px 5px #888888;
        z-index: 10000000 !important;
        font-size: 14px;
    }
    .qtip-content{
         
    }

    /*.chk-subtask-complete{
        margin:3px !important;
    }*/
    .chk-task-complete,.chk-subtask-complete{
    /*float: left; */
    /*margin-top: -28px !important;
    margin-left: 2px !important;*/
    margin:3px !important;
    position: relative;
    top: 3px;
    }
    .tbl_tag_info{
       /* border:solid 1px black !important;*/
        
    }
    /*.tbl_tag_info th,.tbl_tag_info td{
        border:solid 1px black !important;
        width: 33.3% !important;
    }*/
    #tbdy_alltags .tag_column
    {
        /*border: 1px solid black !important;*/
        width: 33.3% !important; 
        vertical-align:top;
    }
    .tag_row *
    {
        background-color: #e7e7e7 !important;
    }
    .tag_row
    {
        margin: 5px;
    }
    .add-input-padding{
        padding-left: 0px !important;
    }
    .div-subtaskcount{
        clear: left;margin-left: 4.5%;
        

    }
    .a-subtaskcount{
        font-size: 11px !important;
        font-style: italic;
        text-decoration: underline;
        cursor: pointer;
    }
    .div-subtaskcount > span{
        font-size: 11px !important;

    }
         .add-circle-border{
        background-color: #3c8dbc !important;
       /* min-height: 40px;
        height: 100%;
        width: 100%;
        margin: 0px;
        padding: 0px;*/
    }
    .add-circle-border-sub{
        background-color: #3c8dbc !important;
      /*  min-height: 40px;
        height: 100%;
        width: 100%;
        margin: 0px;
        padding: 0px;*/
    }
    #tbl_TaskEntry tr td:nth-last-child(-n+5),#tbl_TaskCompleted tr td:nth-last-child(-n+5) { 
        background-color: #E7E7E7 !important;
    }
   
  /* #tbl_TaskEntry td:nth-of-type(2),#tbl_TaskCompleted td:nth-of-type(2) {

    display: none;

    }*/
    /*.select2-selection{
        border:none !important;
    }*/
    #projectmembers tr td, .td-align-top {
		vertical-align: top;
		padding:2px;
	}
	.select2-container{
		vertical-align: top;
	}
    .imageContainer {
           width:22px; 
           /*height:200px; */
           background-image: url('<?php echo base_url('require/img/prio/subtask.png'); ?>');
     }
     .center-align-td{
        text-align: center !important;
        vertical-align: middle !important;
     }
     .tbl-dependency-main .fa{
        font: normal normal normal 14px/1 FontAwesome !important;
     }
     .qtip-icon .ui-icon{
        font-family: 'ProximaNovaW01-Regular' !important;
     }
</style>
	
</head>
<body id="projectBody" class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">

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
					<li style="text-align: center;color: #474544;">
						<span class="name" id="pronameSpan"></span>	
					</li>
				</ol>
				

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row">
						<div class="col-lg-4 projectListDiv">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 projectDiv" id="wid-id-4">
								<div class="contact-header ">My Projects <span class="margintop0"><img id="open_newpro1" class="open_newpro1" src="<?php echo base_url("asset/img/icons/Add Project.png"); ?>" /></span></div>
								<div id="myProjectDivList">
									<!-- Prepend Data insert here -->
								</div>
								
							</div>
						<?php // include("template/chat_body.php"); ?>
						</div>
						
						<div class="col-lg-8 TaskListDiv">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="row margin-topdown">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toolsDive">
										<div class="toolDateSpan col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-left">
											<span id="DueDateSpan" class="dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-caret-right"></i></span>
											<ul class="dropdown-menu">
												<div class="arrow-top-right"></div>
												<li class="dropdown-menu-header">Tools</li>
												<li><a href="javascript:void(0);" onclick="toolHS('calender')"><i style="display: none;" class="fa fa-check active" id="calenderi"></i> Calender</a></li>
												<li><a href="javascript:void(0);" onclick="toolHS('stopwatch')"><i style="display: none;" class="fa fa-check active" id="stopwatchi"></i> Stopwatch</a></li>
												<li><a href="javascript:void(0);" onclick="toolHS('calculator')"><i style="display: none;" class="fa fa-check active" id="calculatori"></i> Calculator</a></li>
												<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;</li>
											</ul>
											<img id="calender" style=" display: none; margin: 0px 4px;width: 25px;margin-top: -2px;" src="<?php echo base_url("asset/img/icons/calender.png"); ?>" />
											<img id="stopwatch" style="display: none;margin: 0px 4px;width: 22px;margin-top: -2px;" src="<?php echo base_url("asset/img/icons/stopwatch.png"); ?>" />
											<img id="calculator" style="display: none;margin: 0px 4px;width: 19px;margin-top: -2px;" src="<?php echo base_url("asset/img/icons/calculator.png"); ?>" />
										</div>
										<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
											<span class="pull-right" id="tagBtnDiv"></span>
										</div>
										
									</div>
								</div>
								<div class="panel panel-default taskDiv">
									
									<div class="panel-body font-color">
										<div class="row margin-topdown">
											<div class="col-lg-8 col-sm-8 col-md-8">
												<input type="text" id="newTaskInput" data-projectid="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Task'" placeholder="New Task" class="form-control border-rad">
                                                
											</div>
										</div>
										<div id="taskInsertDiv">
											
										</div>
										<div id="sorryDiv">Sorry, No Task Found</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<!-- Side window start here -->
		<!-- Side window start here -->
		<!-- Side window start here -->

		<div id="myDiv" class="mainContainerDiv">
			<div class="togPop" style="cursor:pointer;padding-left: 13px;padding-top: 0px;font-size: 26px;margin-top: -2px;" onclick="offDiv()"><span>X</span></div>
			
				<div class="row" style="background-color: #FFF;margin-left: 0%;">
					<div class="col-lg-12" style="background-color: #FFF;margin-left: 2%;padding-right: 5%;margin-bottom: 0%;">
						<div class="col-lg-11" style="margin-bottom: 10px;margin-top: 3px;margin-left: 0px;font-size: 17px;">
							<input type="hidden" id="createdBy" value="">
							<!-- <input type="checkbox" id="archive" onclick="goStar()" style="width:20px;height:20px;margin-top: 1px;margin-right: 11px; float: left;"> -->
							<input type="checkbox" id="archive" data-id='' onchange="setproject()" style="width:20px;height:20px;margin-top: 7px;margin-right: 0px; float: left;">
							
							<div id="Fader" class="fadeout">
		                
		                	</div>
							<input type="text" style="margin-left: 6%;width: 90%;font-size: 1.30em;font-weight: 600;background-color: #FFF;" class="form-control" id="togPopTitle" name="togPopTitle">
							
							<p class="small" style="color:#616161" id="togPopTime"></p>
							<p class="size-family-sidebar" id="creteTitle" style="color:#616161;margin-left: 6%;">Created By: <span id="createdBYpro"></span> at <span id="createdBYDate"></span></p>
						</div>
							
						<i id="expand_mydiv" class="fa fa-2x fa-arrows-alt" style="position: relative;float: right;color: #9E9E9E;margin-top: 6px;margin-left: -5px;margin-right:10px"></i>
						<div style="position: relative; float: right; margin-right: 40px; margin-top: -30px;">
							<p id="update_ok" style="font-size: 14px;margin-top: 0%;"><i style="color:green" class="fa fa-check" aria-hidden="true"><b> Updated</b></i></p>
							<p id="update_not" style="font-size: 14px;margin-top: 0%;"><i style="color:red" class="fa fa-times" aria-hidden="true"><b> Not Updated</b></i></p>
							<p id="update_arY" style="width: 109%;font-size: 14px;margin-top: 0%;display: none;"><i style="color:red" class="fa fa-archive" aria-hidden="true"><b> Project Archived</b></i></p>
							<p id="update_arN" style="width: 101%;font-size: 14px;margin-top: 0%;display: none;"><i style="color:green" class="fa fa-check" aria-hidden="true"><b> Project Retrive</b></i></p>
						</div>
					</div>
				</div>
					
				<div class="row" id="mobilePopMenu" style="display: none;  background-color: #FFF;margin-left: 0%;margin-bottom: 5px;">

					<span style="float: left; margin-left: 5px; width: 100px;font-size: 12px !important;" class="btn btn-xs btn-info size-family-sidebar" onclick="copyProject()" href=""><i class="ion-ios-calendar-outline"></i> Copy Project</span>
					<span style="float: left; margin-left: 5px; width: 100px;font-size: 12px !important;" onclick="makeArchive('FALSE')"  class="btn btn-xs btn-warning size-family-sidebar"><i class="fa fa-sticky-note"></i> Delete Project</span>
					<button type="button" style="float: left !important;width: 100px !important;font-size: 12px !important;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" onclick="offDiv()">Exit</button>
				</div>
					
				<div class="row" id="desktopPopMenu" style="background-color: #FFF;margin-left: 0%;margin-bottom: 5px;">

					<div class="col-lg-3" style="width: 20%; padding: 0px;margin-left: 2%;"></div>
					<div class="col-lg-3" style=" width: 30%; padding: 0px;">
						
						
					</div>
					<div class="col-lg-6" style="width: 46%;padding-left: 0px; margin-left: 0%;">

						<div class="col-lg-4" style="">
							<span style="width: 100px;font-size: 12px !important;" class="btn btn-xs btn-info size-family-sidebar" onclick="copyProject()" href=""><i class="ion-ios-calendar-outline"></i> Copy Project</span>
						</div>
						<div class="col-lg-4" style="">
							
							<span style="width: 100px;font-size: 12px !important;" onclick="makeArchive('FALSE')"  class="btn btn-xs btn-warning size-family-sidebar"><i class="fa fa-sticky-note"></i> Delete Project</span>
						</div>
						<div class="col-lg-4" style="padding-left: 0px;">
							<div class="headerDivider"></div>
							<button type="button" style="font-size: 12px !important;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" onclick="offDiv()">Exit</button>
							<!-- <button type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Update</button> -->
							
						</div>
					</div>
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
				                    <li class="active size-family-sidebar" style="width: 22%; text-align: center;"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Properties</a></li>
				                    <!-- <li class="size-family-sidebar" style="width: 25%; text-align: center;"><a id="opneChat" data-projectid="" data-projectchatname=""  onclick="openprojectchat($(this).data('projectid'), $(this).data('projectchatname'), 'project')"  href="#tab_2" data-toggle="tab" aria-expanded="false">Project Chat</a></li> -->
				                    <li class="size-family-sidebar" style="width: 22%; text-align: center;"><a href="#tab_3" id="projectFile" data-projectid="" onclick="openFilesDiv($(this).data('projectid'))" data-toggle="tab" aria-expanded="false">Files</a></li>
				                    <li class="size-family-sidebar" style="width: 22%; text-align: center;"><a href="#tab_4" onclick="openQouteDivPro()" data-toggle="tab" aria-expanded="false">Quotations</a></li>
				                    <li class="size-family-sidebar" style="width: 22%; text-align: center;"><a href="#tab_5" onclick="openInvoiceDivPro()" data-toggle="tab" aria-expanded="false">Invoices</a></li>
			                	</ul>
								<div class="tab-content" style="margin-top: 2%;">
								  	<div id="tab_1" class="tab-pane fade in active">
								    <form id="form_dataset" name="form_dataset" action="<?php echo base_url();?>Projects/updateProject " method="POST">
										<div class="box-body" style="height: 512px;min-height: 300px; overflow-y: auto;">
											<div class="form-group col-md-12">
												<label class="control-label col-md-2 size-family-sidebar">Description </label>
												<div class="col-md-10">
													<textarea name="description" class="form-control size-family-sidebar" id="description" rows="1" style="margin-left: -1%;width: 101%;"></textarea>
												</div>
											</div>
											<div class="form-group col-lg-6">
												<label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Startdate</label>

												<div class="col-lg-8">
													<div class="input-group feedtext">
														<input name="startdate" type="text" class="form-control size-family-sidebar" id="datetimepicker7" value=""  />
													</div>
												</div>
											</div>

											<div class="form-group col-lg-6">
												<label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Duedate</label>

												<div class="col-lg-8">
													<div class="input-group feedtext">
														<input name="targetdate" type="text" class="form-control size-family-sidebar" id="datetimepicker8" value=""  />
													</div>
												</div>
											</div>

											<div class="form-group col-lg-6">
												<label class="control-label col-lg-4 size-family-sidebar">Completion Date</label>

												<div class="col-lg-8">
													<div class="input-group feedtext">
														<input name="actualdate" type="text" class="form-control size-family-sidebar" id="datetimepicker9" value=""  />
													</div>
												</div>
											</div>
											<div class="col-md-6">
								              <label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Related to</label>
								              <div class="col-md-8">
								                <label class="control-label size-family-sidebar">
								                <input type="radio" name="relatedTo" id="relatedToA" class="customDisable size-family-sidebar" value="A" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo "checked";  ?> onclick="toggleRelatedTo(this.value)">
								                Accounts &nbsp;
								                <input type="radio" name="relatedTo" id="relatedToC" class="customDisable size-family-sidebar" value="C" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo "checked";  ?> onclick="toggleRelatedTo(this.value)">
								                Contacts </label>
								              </div>
								              <div class="col-md-8"> <span>
								                <div class="input-group" style="margin-bottom: 10px;">
								                  <input type="text" name="relatedtoVal" id="relatedto" class="form-control customDisable size-family-sidebar">
								                  <a  id="assign_A" href="<?php echo site_url() . "modulecontrol/searchproject/account"; ?>" class="input-group-addon size-family-sidebar" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a> <a id="assign_C" href="<?php echo site_url() . "modulecontrol/searchproject/contactdetails"; ?>" class="input-group-addon size-family-sidebar" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a> </div>
								                </span> </div>
								            </div>
											<div class=" form-group col-lg-12">
												<label class="control-label col-lg-2 size-family-sidebar" style="margin-right: -0.5%;margin-top: 1%;">Supervisor</label>
												<div class="col-md-10">
													<select name="assignto[]" multiple="multiple" id="assignToMember" class="select2_multiple20 size-family-sidebar" onchange="selectSplice($(this).val())" style="padding-left: -5%;width: 100.5%;">
													
													</select>
												</div>
												
											</div>
											<div class="form-group col-lg-12">
												<label class="control-label col-lg-2 size-family-sidebar" style="margin-right: -0.5%;margin-top: 1%;">Members</label>


												<div class="col-lg-10">
													<select name="member[]" id="member" multiple="multiple" class="select2_multiple size-family-sidebar" style="padding-left: -5%;width: 100.5%;">
													
													</select>
												</div>
											</div>
											<div class="form-group col-md-12">
												<label class="control-label col-md-2 size-family-sidebar" style="margin-right: -0.5%;">URL </label>
												<div class="col-md-10" style="width: 83.5%">
													<input type="text" name="url" id="URL" class="form-control size-family-sidebar">
												</div>
											</div>
											
											<div class="form-group col-lg-6">
												<label class="control-label col-lg-4 size-family-sidebar">Group</label>

												<div class="col-lg-8">
													<div class="input-group feedtext">
														<select class="form-control size-family-sidebar" name="ProjectType" id="ProjectType">
															<option value="Private">Private</option>
															<option value="Public">Public</option>
														</select>
													</div>
												</div>
											</div> 
											<div class="form-group col-md-6">
												<label class="control-label col-md-4 size-family-sidebar">Status </label>
												<div class="col-md-8">
													<select name="projectstatus" id="projectstatus" class="form-control size-family-sidebar">
														<?php foreach($projectstatus as $r){ ?>
														<option value="<?php echo $r->projectstatus; ?>"><?php echo ucfirst($r->projectstatus); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group col-lg-6">
												<label class="control-label col-md-4 size-family-sidebar">Type </label>
												<div class="col-md-8">
													<select name="projecttasktype" id="projecttasktype" class="form-control size-family-sidebar">
														<?php foreach ($projecttasktype as $r) { ?>
														<option value="<?php echo $r->projecttasktype; ?>"><?php echo ucfirst($r->projecttasktype); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group col-lg-6">
												<label class="control-label col-md-4 size-family-sidebar">Progress </label>
												<div class="col-md-8">
													<select name="projecttaskprogress" id="projecttaskprogress"  class="form-control size-family-sidebar">
														<?php foreach ($projecttaskprogress as $r) { ?>
														<option value="<?php echo $r->projecttaskprogress; ?>"><?php echo ucfirst($r->projecttaskprogress); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group col-md-6">
												<label class="control-label col-md-4 size-family-sidebar">Budget </label>
												<div class="col-md-8">
													<input type="text" name="targetbudget" id="targetbudget" class="form-control size-family-sidebar">
												</div>
											</div>
											
											<div class="form-group col-md-6">
												<label class="control-label col-md-4 size-family-sidebar">Priority </label>
												<div class="col-md-8">
													<select name="ticketpriorities" id="ticketpriorities" class="form-control size-family-sidebar">
														<?php foreach($ticketpriorities as $r){ ?>
														<option value="<?php echo $r->ticketpriorities; ?>"><?php echo ucfirst($r->ticketpriorities); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
								 		</div><!-- /.box-body -->
							            <div class="box-footer" style="background-color: #FFF;">
							            	<div class="form-group col-md-12">
							                	<div class="col-lg-12 size-family-sidebar">
							                		<input type="hidden" name="projecteid" value="" id="projecteid" />
							                		<input type="hidden" name="lasUpdate" value="<php echo date('Y-m-d H:i:s'); ?>" id="lasUpdate" />
							                		<input type="hidden" name="type" value="" id="type" />
							                		<button type="button" onclick="offDiv()" class="btn btn-xs btn-primary pull-right btn-updateandexit size-family-sidebar">Exit</button>
							                		<button type="submit" class="btn btn-xs btn-primary pull-right btn-updateandexit size-family-sidebar">Update</button>

							                	</div>
							                </div>
							            </div>
							        </div>
							        </form>
									<div id="tab_2" class="tab-pane fade">
										<div class="box box-yzy direct-chat box-solid direct-chat-success">
									        <div class="box-header with-border" style=" height: 125px;background:#fff">
									            <div id="groupmemberlist" style="position: fixed;margin-top: 40px;background: #FFF;z-index: 1;width: 600px;">
									                <select class="select_gc_chat_member form-control tabindex1" id="tabindex1" tabindex="1" multiple="multiple" style="height:50px;" onchange="updategrouplist()">
									                    <?php if($memberList != "") foreach($memberList as $key => $value) { ?>
									                        <option value="<?php echo $value->email; ?>"><?php echo $value->email; ?></option>
									                    <?php } ?>
									                </select>
									            </div>
									            <h3 class="box-title">
									                <form id="editGroupName" class="input-group input-group-sm" style="width:85%">
									                    <input type=hidden id=divid value="99">
									                    <input type=hidden name=pid id="pid99">
									                    <div class="input-group">
									                        <span class="input-group-addon" onclick="$('#editGroupNameText').focus();" style="border-color: #fff; background-color: #fff; color:#000;"><i class="fa fa-pencil-square-o"></i></span>
									                        <input  type=text class="form-control color tabindex2" tabindex="2" id="editGroupNameText" name="GroupNameText" size="75" onfocus="$('#editGroupNameTextSpan').show()" onblur="$('#editGroupName').submit()">
										                    <span class="input-group-btn" id="editGroupNameTextSpan" style="display:none;">
										                        <button class="btn btn-default btn-flat" type="button" style="margin-top:1px;color:#000;">Go!</button>
										                    </span>
									                    </div>
									                    
									                </form>
									            </h3>
									        </div>
									        <div class="box-body" id="chat99" style="height: 380px;min-height: 300px; overflow-y: auto;">

									            <div id="cstream99" style="margin-top: 0%;height:auto;font-weight: 400;" class="direct-chat-messages"></div>
									        </div>
									        <div class="box-footer" style="display: block;">
									            <div class="col-md-2" style="padding:4px;background:#3c8dbc;border: 1px solid #3c8dbc;">
									                <a class="btn btn-box-tool tabindex5" id="tabindex5" tabindex="5" href="#popupTop99" onClick="drawPopOverDiv(99)" role="button" data-toggle="modal-popover" data-placement="top"><i class="fa fa-smile-o" style="font-size:22px;color:#FFF;"></i></a>
									                <a class="btn btn-box-tool sendfile99 tabindex6" id="tabindex6" tabindex="6" href="<?php echo site_url().'chat/openfile/99'; ?>" data-title="Attachments" data-toggle="lightbox"><i class="fa fa-paperclip" style="font-size:22px;color:#FFF;"></i></a>
									            </div>
									            <div class="col-md-10" style="padding-left: 0px;">
									                <form id="msenger99" action="" method="post" enctype="multipart/form-data">
									                    <input type="hidden" name="mid" id="mid99" value="<?php echo $user_email; ?>">
									                    <input type="hidden" name="fid" id="fid99">
									                    <input type="hidden" name="dName" id="dName99" value="">
									                    <div class="input-group">
									                        <textarea ng-model="message" focus-on-change="message" name="msg" id="msg-min99" class="form-control ng-pristine ng-untouched ng-valid tabindex3" tabindex="3" style="height: 44px"></textarea>
									                        <span class="input-group-btn">
									                            <button type="button" id="sb-mt99" onClick="sendMsg(99)" class="btn btn-success btn-flat tabindex4" tabindex="4" style="height: 44px;">Send</button>
									                        </span>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
									</div>
									<div id="tab_3" class="tab-pane fade">
										<div class="box-body" id="chat992" style="height: 571px;min-height: 300px; overflow-y: auto;margin:10px;">
										<div class="form-group">
					                      <!-- <label>Text</label> -->
					                      <input placeholder="Quick Search" type="text" class="form-control" id="key"/>
					                    </div>
										<table class="sortable">
											<thead>
												<tr class="first">
													<th style="width:5%;">&nbsp;</th>
													<th id="sl" style="width:35%;"><span id="thfSp">File Name</span> 
														<div class="pull-right box-tools">
										                    <!-- button with a dropdown -->
										                    <div class="btn-group open" style="margin-top: -9px;margin-right: 8px;">
										                      <button class="btn btn-success btn-sm dropdown-toggle" style="width: 24px;height: 24px;padding-top: 2px;padding-left: 7px;" data-toggle="dropdown" aria-expanded="true" id="filnm"><i class="fa fa-filter"></i></button>
										                     
										                      <ul class="dropdown-menu pull-right" role="menu" id="fileExt">
										                        	
										                      </ul>
										                      <!-- <button class="btn btn-success btn-sm fileRefreash" id="fileRefreash"><i class="fa fa-refresh"></i></button> -->
										                    </div>
										                </div>
													</th>
													<th id="nm" style="width:25%;">Uploaded By
														<div class="pull-right box-tools">
										                    <!-- button with a dropdown -->
										                    <div class="btn-group open" style="margin-top: -9px;margin-right: 8px;">
										                      <button class="btn btn-success btn-sm dropdown-toggle" style="width: 24px;height: 24px;padding-top: 2px;padding-left: 7px;" data-toggle="dropdown" id="checkAll" aria-expanded="true"><i class="fa fa-filter"></i></button>
										                     
										                      <ul class="dropdown-menu pull-right" role="menu" id="uploadBy">
										                        	
										                      </ul>
										                      <!-- <button class="btn btn-success btn-sm fileRefreash"  id="fileRefreash"><i class="fa fa-refresh"></i></button> -->
										                    </div>
										                </div>
													</th>
													<th style="width:10%;">File Size</th>
													<th style="width:25%;">Uploaded Date</th>
													<th style="width:5%;"><!-- <i style="color:#dd4b39;" class="fa fa-trash"></i> -->&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>	
										</table>
								        </div>
									</div>

									 <!-- added by sujon -->
									 <div class="tab-pane" id="tab_4">
									     <form method="post" action="<?php echo site_url(); ?>Projects/taskitemupdate" role="form" id="form_itemlist" name="form_dataset_items">
										 <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;/*margin-top: -2%;*/">

										     <div id="box-tab-qt-pro" class="box-body" style="height: 479px; min-height: 300px; overflow-y: auto;padding: 10px">

											 <input type="hidden" id="taskitemid_pro" name="taskitemid">
											 <input type="hidden" id="quoteitemid_pro" name="quoteitemid">
											 <!-- <div class="form-group col-md-12 cus-from-group">
											     <div class="col-lg-12">

												 <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>

												 <button disabled="" type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit btn-submit-qt size-family-sidebar">Update</button>


												 <a id="open_task_settings_pro" href="<?php echo base_url(); ?>yzy-tasks/index/popupQuoteSettings/0" data-title="Settings" title="Settings" data-toggle="lightbox" data-gallery="remoteload" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-cog"></i> Settings </a>

												 <button onclick="fun_autoupdate()" disabled="" id="gen_invoice_qts_pro" data-toggle="lightbox" data-title="Add New Invoice" type="button" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-usd"></i> Invoice</button>

												
												 <a id="addnew-quotes-up-pro" class="btn btn-primary btn-xs pull-right btn-updateandexit  size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-plus icon-plus"></i> New</a>
											     </div>
											 </div> -->

											 <div class="form-group col-md-12">
											     <table id="quote_details_pro" class="mainContainerTable">

												 <thead>
												     <tr>
													 <th style="width: 10px;"></th>
													 <th style="width: 90px;">ID</th>
													 <th>Name</th>
													 <th style="width: 90px;">Stage</th>
													 <th style="width: 80px;">Date</th>
													 <th style="width: 100px;">Actions</th>

												     </tr>
												 </thead>
												 <tfoot id="" style="">

												     <tr>
													 <td colspan="6" style="text-align: center !important;font-weight: bolder;color: #555;">No quotes were found</td>

												     </tr>
												 </tfoot>
												 <tbody id="">

												 </tbody>

											     </table>
											 </div>


										     </div>
										     <div class="box-footer" style="background-color: #FFF;">
											 <div class="form-group col-md-12">
											     <div class="col-lg-12">

												 <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>
												 <button disabled="" type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit btn-submit-qt size-family-sidebar">Update</button>

											     </div>
											 </div>
										     </div>
										 </div>
									     </form>
									 </div>
                    <!-- /.tab-pane -->
                    <!-- added by sujon -->
		    	<div class="tab-pane" id="tab_5">
					<div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;padding: 10px">

			    <div id="box-tab-inv" class="box-body" style="height: 545px;min-height: 300px; overflow-y: auto;">

				<table id="invoice_details_pro">

				    <thead>
					<tr>

					    <th style="width: 100px;">ID</th>
					    <th>Name</th>
					    <th style="width: 100px;">Stage</th>
					    <th style="width: 100px;">Date</th>
					    <th style="width: 100px;">Actions</th>

					</tr>
				    </thead>

				    <tfoot id="" style="">

					<tr>
					    <td colspan="6" style="text-align: center !important;font-weight: bolder;color: #555">No invoices were found</td>

					</tr>
				    </tfoot>

				    <tbody id="">

				    </tbody>
				</table>
			    </div> 
					</div>
				</div>
								

								</div>	
							</div>
							
					    </div><!-- /.col -->
					</div>
				<!-- </form> -->
			</div>

			

		<!-- Side window end here -->
		<!-- Side window end here -->
		<!-- Side window end here -->
	<!-- END MAIN CONTENT -->
	<!-- PAGE FOOTER -->
	<!--  -->
	<div id="openProjectTaskDiv" >
	    <div class="col-lg-12 size-family-sidebar" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;"> Select Task Location
	        <button onclick="openLocation()" class="btn btn-info btn-sm pull-right" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i>
	        </button>
	    </div>
	    <div class="col-lg-12">
	        <div class="col-lg-12 optd size-family-sidebar">
	            <div onclick="openLocationList('Project')" style="cursor: pointer; color: #28546B;">Project
	                <br>
	                <span id="opd"></span><span class="pull-right" style="margin-top: -5px"><i class="fa fa-chevron-right"></i></span>
	            </div>
	        </div>
	        <div class="col-lg-12 optd size-family-sidebar">
	            <div onclick="openLocationList('Tasklist')" style="cursor: pointer; color: #28546B;">Tasklist
	                <br>
	                <span id="otd"></span><span class="pull-right size-family-sidebar" style="margin-top: -5px"><i class="fa fa-chevron-right"></i></span>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-12 optld-footer" style="display: none;">
	        <button class="btn btn-block btn-info btn-flat" onclick="moveto()" style="font-weight: bold; font-size: 12px;">Move Task</button>
	    </div>
	    <div class="col-lg-12">&nbsp;</div>
	</div>
	<div id="openProjectTaskListDiv">
	    <input type="hidden" id="optld-pid" value="">
	    <input type="hidden" id="optld-temp-pid" value="">
	    <input type="hidden" id="optld-tlid">
	    <input type="hidden" id="optld-temp-tlid">
	    <div class="col-lg-12" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;">
	        <button onclick="openLocationList(0)" class="btn btn-info" style="margin-top: -8px;" data-toggle="tooltip" title="" data-original-title="Back"><i class="fa fa-chevron-left"></i>
	        </button>
	        <span id="optld-head"></span> </div>
	    <div class="col-lg-12">
	        <input type="text" onkeyup="searchlist($(this).val())" class="form-control" style="margin: 5px 0px; width: 260px;" placeholder="Search...">
	    </div>
	    <div class="col-lg-12 optld-body" style="max-height: 190px;overflow: auto;"> </div>
	</div>
	<div id="taskMyDiv" class="mainContainerDiv">
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
	                    <li class="size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_4T" data-toggle="tab" aria-expanded="false">Quotations</a></li>
	                    <li class="size-family-sidebar" style="width: 17%; text-align: center;"><a href="#tab_5T" data-toggle="tab" aria-expanded="false">Invoices</a></li>
	                </ul>
	                <div class="tab-content">
	                    <div class="tab-pane active" id="tab_1T">
	                        <form id="form_datasetTaskpro" name="form_datasetTaskpro" method="POST" action="<?php echo base_url(); ?>Projects/updateTask">
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
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Supervisor</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <select name="assignto[]" id="assignToMemberTask" multiple="multiple" class="select2_multiple20 onchange="selectSplice($(this).val())" style="width: 100%;">
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Members</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <select name="member[]" id="memberTask" multiple="multiple" class="select2_multiple30" style="width: 100%;">
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="form-group col-lg-12">
	                                        <label class="control-label col-lg-2 size-family-sidebar" style="width: 11.666667%;margin-top: 10px;">Follower</label>
	                                        <div class="col-lg-10" style="width: 88.3333%;">
	                                            <select name="followers[]" id="followersTask" multiple="multiple" class="select2_multiple3" style="width: 100%;">
	                                                <?php foreach ($users as $r) { ?>
	                                                <option value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->full_name); ?></option>
	                                                <?php } ?>
	                                            </select>
	                                        </div>
	                                    </div>
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
	                                            <select name="projecttaskprogress" id="projecttaskprogressTask"  class="form-control">
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
	                                            <input type="hidden" name="parentTaskid" value="" id="parentTaskid" />
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
	                                        <input type="hidden" name="CommentType" id="CommentType" value="">
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
	                                                    <div class="btn-group open" style="margin-top: -9px;margin-right: 8px;">
	                                                        <button style="width: 24px;height: 24px;padding-top: 2px;padding-left: 7px;" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="filnm"><i class="fa fa-filter"></i></button>
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
	                                                    <div class="btn-group open" style="margin-top: -9px;margin-right: 8px;">
	                                                        <button style="width: 24px;height: 24px;padding-top: 2px;padding-left: 7px;" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-filter"></i></button>
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
	                    <!-- added by sujon -->
	                    <div class="tab-pane" id="tab_4T">
	                        <form method="post" action="<?php echo site_url(); ?>Projects/taskitemupdate" role="form" id="form_itemlist" name="form_dataset_items">
	                            <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;/*margin-top: -2%;*/">
	                                <div id="box-tab-qt" class="box-body" style="height: 369px; min-height: 300px; overflow-y: auto;">
	                                    <input type="hidden" id="taskitemid" name="taskitemid">
	                                    <input type="hidden" id="quoteitemid" name="quoteitemid">
	                                    <div class="form-group col-md-12 cus-from-group">
	                                        <div class="col-lg-12">
	                                            <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>
	                                            <button disabled="" type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit btn-submit-qt size-family-sidebar">Update</button>
	                                            <a id="open_task_settings" href="<?php echo base_url(); ?>Projects/popupQuoteSettings/0" data-title="Settings" title="Settings" data-toggle="lightbox" data-gallery="remoteload" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-cog"></i> Settings </a>
	                                            <button onclick="fun_autoupdate()" disabled="" id="gen_invoice_qts" data-toggle="lightbox" data-title="Add New Invoice" type="button" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-usd"></i> Invoice</button>
	                                            <!-- sujon @ 8/8/16 -->
	                                            <a id="addnew-quotes-up" class="btn btn-primary btn-xs pull-right btn-updateandexit  size-family-sidebar"><i style="font-size:11px !important;" class="fa fa-plus icon-plus"></i> New</a>
	                                        </div>
	                                    </div>
	                                    <div class="form-group col-md-12">
	                                    <table id="quote_details" class="mainContainerTable">
	                                        <thead>
	                                            <tr>
	                                                <th style="width: 10px;"></th>
	                                                <th style="width: 90px;">ID</th>
	                                                <th>Name</th>
	                                                <th style="width: 90px;">Stage</th>
	                                                <th style="width: 80px;">Date</th>
	                                                <th style="width: 100px;">Actions</th>
	                                            </tr>
	                                        </thead>
	                                        <tfoot id="" style="">
	                                            <tr>
	                                                <td colspan="6" style="text-align: center !important;font-weight: bolder;color: #555;">No quotes were found</td>
	                                            </tr>
	                                        </tfoot>
	                                        <tbody id="">
	                                        </tbody>
	                                    </table>
	                                    </div>
	                                </div>
	                                <div class="box-footer" style="background-color: #FFF;">
	                                    <div class="form-group col-md-12 cus-from-group footForm">
	                                        <div class="col-lg-12">
	                                            <button type="button" onclick="offMDiv()" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Exit</button>
	                                            <button disabled="" type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit btn-submit-qt size-family-sidebar">Update</button>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                    <!-- /.tab-pane -->
	                    <!-- added by sujon -->
	                    <div class="tab-pane" id="tab_5T">
	                        <div class="box" style="border-top: 1px solid #d2d6de;box-shadow: 0 1px 1px rgba(0,0,0,0.1);width: 100%;margin-left: 0%;padding: 10px;">
	                            <div id="box-tab-inv" class="box-body" style="height: 418px; min-height: 300px; overflow-y: auto;">
	                                <table id="invoice_details">
	                                    <thead>
	                                        <tr>
	                                            <th style="width: 100px;">ID</th>
	                                            <th>Name</th>
	                                            <th style="width: 100px;">Stage</th>
	                                            <th style="width: 100px;">Date</th>
	                                            <th style="width: 100px;">Actions</th>
	                                        </tr>
	                                    </thead>
	                                    <tfoot id="invoice_details_foot" style="">
	                                        <tr>
	                                            <td colspan="6" style="text-align: center !important;font-weight: bolder;color: #555">No invoices were found</td>
	                                        </tr>
	                                    </tfoot>
	                                    <tbody id="invoice_details_body">
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
	<!--  -->
	<input type="hidden" name="feedbackBadge" id="feedbackBadge" />
	<input type="hidden" name="taskId" id="taskId" value="">
	<input type="hidden" name="taskOpenBy" id="taskOpenBy" value="">
	<input type="hidden" name="feedback_id" id="feedback_id" value="">
	<input type="hidden" name="feedback_badge" id="feedback_badge" value="">
	<input type="hidden" name="feedback_compliments" id="feedback_compliments" value="">
	<input type="hidden" name="feedback_improvement" id="feedback_improvement" value="">
	<?php include 'template/footer.php';?>
		

	<!--================================================== -->
	<?php include 'template/includes_bottom.php';?>
    <!-- ITL Todo : sujon -->
    <!-- <script src="<?php echo base_url();?>asset/js/itl-todo/itl-todo-manager.js?v=<?php echo time();?>"></script> -->
    <?php include("template/itl-todo-manager.php"); ?>
	<?php include 'template/weather_js.php';?> 
	<script src="<?php echo base_url('asset/js/plugin/moneyjs/money.min.js'); ?>"></script>
    <script type="text/javascript">
        var divstatus = false;
        var crm_users = <?php echo json_encode($users); ?>;
        var selectArray = <?php echo json_encode($users); ?>;
        var alluser = <?php echo json_encode($alluser); ?>;
        var client = <?php echo json_encode($client); ?>;
        var projectstatus = <?php echo json_encode($projectstatus); ?>;
        var projectArray = <?php echo json_encode($projectGroup); ?>;
        var wsusers = <?php echo json_encode($users); ?>;
        var newSelArr = selectArray;
        var userArray = [];
        var MemberArray = [];
        var val = true;
        var valM = true;
        var unique = [];
        var newSelArr = [];
        var finalArr = [];
    </script>
	<script>
        $('#projectGroup').select2();
            // script by sujon for item list
            var row_in;
            var ci_baseurl="<?php echo base_url(); ?>";
            

            function queryDB(request, response) {

               $.ajax({
                url: '<?php echo site_url(); ?>yzy-settings/index/getacitems',
                dataType: "json",
                type: 'POST',
                data: {
                    q: request.term
                },
                success: function (data) {

                    //console.log('getacitems');
                    //console.log(data);
                    var items = new Array();
                    $(data.itemdata).each(function(i, obj) {
                        if(obj.item_name=="") items.push('(No Name)');
                        items.push({
                           //id: obj.item_name,
                           label: obj.item_name,
                           item_unit: obj.item_unit,
                           item_currency: obj.item_currency,
                           discount_type:obj.discount_type,
                           discount_amount:obj.discount_amount,
                           discount_percent:obj.discount_percent
                       });


                    });
                    response( items );
                }
            });
            }

/* function ACselection(e, ui) {
    
    $('#qty_unit'+ui.item.id).val(ui.item.item_unit).trigger("change");
    $('#sel_currency'+ui.item.id).val(ui.item.item_currency).trigger("change");
    $('#sel_currency'+ui.item.id).val(ui.item.item_currency).trigger("select2:select");

    $('#open_discount'+ui.item.id).attr("href",''+ci_baseurl+'Projects/popupdiscount/'+ui.item.id+'/'+$('#total_list'+ui.item.id).html()+'/'+ui.item.discount_type+'/'+ui.item.discount_percent+'/'+ui.item.discount_amount);

    $('#load_tax_vat'+ui.item.id).attr('value',ui.item.item_tax_vat);
    $('#load_tax_sales'+ui.item.id).attr('value',ui.item.item_tax_sales);
    $('#load_tax_service'+ui.item.id).attr('value',ui.item.item_tax_service);

    $('#open_tax'+ui.item.id).attr("href",''+ci_baseurl+'Projects/popuptax/'+ui.item.id+'/'+ui.item.item_tax_vat+'/'+ui.item.item_tax_sales+'/'+ui.item.item_tax_service+'/'+$('#total_list'+ui.item.id).html()+'/'+ui.item.item_currency);  

} */

    function fun_addNewService(element,qid){
        
        row_in++;
		
        var rht= '<tr data-quoteid="'+qid+'" id="row'+row_in+'">'
        // +'<td>'
        // +'<input class="chk-qt-inv-items" type="checkbox">'
        // +'</td>'

        +'<td>'
        +'<span id="delete_item'+row_in+'" class="fa fa-trash"></span>'
        +'</td>'

        +'<td class="td-align-top">'
        +   '<div class="input-group">'
        +       '<input required type="text" name="sel_servicename_item[]" id="sel_servicename_item'+row_in+'" class="input-sm">'

        +       '<input required type="hidden" readonly="" name="sel_serviceid_item[]" id="sel_serviceid_item'+row_in+'" class="form-control input-sm">'
        +       '<a style="display:none" href="'+ci_baseurl+'yzy-accounts/index/popupservice/'+row_in+'" data-title="Service'+row_in+'" data-toggle="lightbox" data-gallery="remoteload"><i class="fa fa-3x fa-plus-square"></i></a>'
        +   '</div>'
        +'</td>'

        +'<td class="td-align-top">'
        +   '<input onclick="fun_selectall(this)" required value="" type="number" min="0" id="qty'+row_in+'" name="qty[]" class="input-sm cal_total inp-qty-unit">'
        // +'<input value="1" type="hidden" id="item_unit_value'+row_in+'"  name="item_unit_value[]">'
        +'<select data-status="new" data-view="yes" name="sel_qty_unit[]" id="qty_unit'+row_in+'" class="sel-qty-unit">';
                $(js_unitList).each(function(i,unitname){
                    
                    rht+='<option value="'+unitname+'">'+unitname+'</option>';
                });
                rht+='</select>'
        +'</td>'

        +'<td class="td-align-top">'
        +'<div class="itemlistheightin">'
       

        +'<select data-view="yes" data-currency="'+currency_symbol+'" data-curtype="'+currency_type+'" id="sel_currency'+row_in+'" class="sym-currency" name="sel_currency[]" value="'+currency_symbol+'">'
        +loadCurrencyOptions()
        +'</select>'


        +'<input required value="" type="text"  id="listPrice'+row_in+'" onblur="fun_formatCurrency(event)"  name="listPrice[]"  class="input-sm cal_total inp-currency">'
        +'<input data-loaded="'+currency_type+'" value="1" type="hidden" id="item_cur_value'+row_in+'"  name="item_cur_value[]"></div>'

        +'<div class="itemlistheightout"><a id="open_discount'+row_in+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(-) Discount</i></a></div>'
        +'<input type="hidden" id="discount_type'+row_in+'" name="discount_type[]" value="zero" >'
        +'<input type="hidden" id="discount_val_percent'+row_in+'" name="discount_val_percent[]" value="0" >'
            +'<input type="hidden" id="discount_val_direct'+row_in+'" name="discount_val_direct[]" value="0" >'
            +   '<div class="itemlistheightout"><span>Total After Discount :</span></div>'
        +'<div class="itemlistheightout"><a id="open_tax'+row_in+'" data-title="Tax" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Tax</i></a></div>'
        +'<input type="hidden" id="load_tax_vat'+row_in+'" name="load_tax_vat[]" value="4.5" >'
        +'<input type="hidden" id="load_tax_sales'+row_in+'" name="load_tax_sales[]" value="10" >'
        +'<input type="hidden" id="load_tax_service'+row_in+'" name="load_tax_service[]" value="12.5" >'

        +'</td>'

        +'<td class="srvtotal" id="serviceTotal'+row_in+'">'
        +'<div class="itemlistheightmid"><label id="total_list'+row_in+'">0.000</label></div>'
        +'<div class="itemlistheightout"><input readonly type="number" name="total_discount[]" id="total_discount'+row_in+'" ></div>'

        +'<div class="itemlistheightout"><span id="total_afterdiscount'+row_in+'">0.000</span></div>'
        +'<div class="itemlistheightout"><span id="total_aftertax'+row_in+'"></span></div>'
        +'</td>'
        +'<td>'
        +'<label class="cls_nettotal'+qid+'" id="netprice'+row_in+'"></label>'
        +'</td>'

        +'</tr>';

        $(element).closest('table').append(rht);
        // show predef to
       /*  $('#sel_servicename_item'+row_in).autocomplete({
          source : function(request, response) {

           $.ajax({
            url: '<?php echo site_url(); ?>yzy-settings/index/getacitems',
            dataType: "json",
            type: 'POST',
            data: {
                q: request.term
            },
            success: function (data) {

                var items = new Array();
                $(data.itemdata).each(function(i, obj) {
                    if(obj.item_name=="") items.push('(No Name)');
                    items.push({
                        id: row_in,
                        label: obj.item_name,
                        item_unit: obj.item_unit,
                        item_currency: obj.item_currency,
                        discount_type:obj.discount_type,
                        discount_amount:obj.discount_amount,
                        discount_percent:obj.discount_percent,
                        item_tax_vat:obj.item_tax_vat,
                        item_tax_sales:obj.item_tax_sales,
                        item_tax_service:obj.item_tax_service
                    });


                });
                response( items );
            }
        });
       },
       select: ACselection
   }); */

       select2itemUnit($(element).closest('table').find('tbody tr:last-child .sel-qty-unit'));

        select2itemCurrency($(element).closest('table').find('tbody tr:last-child .sym-currency'));
        

    }
function fun_cal_nettotal(serial){
    var js_net_total=0;

    $('.cls_nettotal'+serial).each(function(i, obj) {
        js_net_total+=Number( $( this ).text());
        
    });


    $("#net_total"+serial).html(js_net_total.toFixed(2));

    $('#open_discountgrand'+serial).attr("href",''+ci_baseurl+'Projects/popupdiscountgrand/'+$("#discount_type_grand"+serial).val()+'/'+$("#net_total"+serial).html()+'/'+$("#discount_val_grand_percent"+serial).val()+'/'+$("#discount_val_grand_direct"+serial).val()+'/'+serial);

    $('#open_tax_shiphand'+serial).attr("href",''+ci_baseurl+'Projects/popuptaxshiphand/'+Number($("#load_tax_vat_sh"+serial).val())+'/'+Number($("#load_tax_sales_sh"+serial).val())+'/'+Number($("#load_tax_service_sh"+serial).val())+'/'+Number($("#in_shiphandlecharge"+serial).val())+'/'+serial);
}

function fun_cal_sh_tax(serial){
    $('#open_tax_shiphand'+serial).attr("href",''+ci_baseurl+'Projects/popuptaxshiphand/'+Number($("#load_tax_vat_sh"+serial).val())+'/'+Number($("#load_tax_sales_sh"+serial).val())+'/'+Number($("#load_tax_service_sh"+serial).val())+'/'+Number($("#in_shiphandlecharge"+serial).val())+'/'+serial);

    var sh_charge=Number($("#in_shiphandlecharge"+serial).val());
    var sh_tax1=(sh_charge*Number($("#load_tax_vat_sh"+serial).val()))/100;
    var sh_tax2=(sh_charge*Number($("#load_tax_sales_sh"+serial).val()))/100;
    var sh_tax3=(sh_charge*Number($("#load_tax_service_sh"+serial).val()))/100;
    var total_sh_tax=sh_tax1+sh_tax2+sh_tax3;
    if(total_sh_tax==0) $("#taxtotal_shiphandle"+serial).html(''); 
    else $("#taxtotal_shiphandle"+serial).html((total_sh_tax).toFixed(2));
}
function fun_cal_grandtotal(serial){

   //console.log('fun_cal_grandtotal');console.log(serial);
    var js_grand_total=0;

    js_grand_total+=Number($("#net_total"+serial).html());

    var calculated_discount_grand;
    
    if($("#discount_type_grand"+serial).val()=="zero"){
        
        calculated_discount_grand=0;
    }
    if($("#discount_type_grand"+serial).val()=="percent"){
        
        calculated_discount_grand=(Number($("#net_total"+serial).html())*Number($("#discount_val_grand_percent"+serial).val()))/100;
    }
   if($("#discount_type_grand"+serial).val()=="direct"){

        calculated_discount_grand=Number($("#discount_val_grand_direct").val());
    }

    if($("#discount_type_grand"+serial).val()=="both"){

        calculated_discount_grand=(Number($("#net_total"+serial).html())*Number($("#discount_val_grand_percent"+serial).val()))/100;
        calculated_discount_grand+=Number($("#discount_val_grand_direct"+serial).val());
    }
    $('#open_discountgrand'+serial).attr("href",''+ci_baseurl+'Projects/popupdiscountgrand/'+$("#discount_type_grand"+serial).val()+'/'+Number($("#net_total"+serial).html())+'/'+Number($("#discount_val_grand_percent"+serial).val())+'/'+Number($("#discount_val_grand_direct"+serial).val())+'/'+serial);

    if(calculated_discount_grand==0) $("#net_totalafterdisgrand"+serial).html('');
    else
    $("#net_totalafterdisgrand"+serial).html(calculated_discount_grand.toFixed(2));
    
    js_grand_total-=Number($("#net_totalafterdisgrand"+serial).html());
    js_grand_total+=Number($("#in_shiphandlecharge"+serial).val());
    js_grand_total+=Number($("#taxtotal_shiphandle"+serial).html());
    
    if($("#sel_adjustmentType"+serial).val()=="add") js_grand_total+=Number($("#in_adjustment"+serial).val());
    if($("#sel_adjustmentType"+serial).val()=="deduct") js_grand_total-=Number($("#in_adjustment"+serial).val());

    $("#grand_total"+serial).html(js_grand_total.toFixed(2));
    var cursym_val;
    
    if(serial==''){
        cursym_val=$($('#item_details_body .sym-currency')[0]).attr('data-currency');
   
    }else{
        cursym_val=$($('#inv_item_tbody_'+serial+' .sym-currency')[0]).attr('data-currency');
    }
    
    $("#grand_total_currency"+serial).html(cursym_val);
   
    $("#grand_total_hval"+serial).val(js_grand_total.toFixed(2));

    if(Number($('#grand_total_hval'+serial).val()) <0){
        alert('invalid');
        $('#in_adjustment'+serial).val(0);
        return;
         //fun_cal_grandtotal();
    }


}

$( "#tab_4,#tab_5" ).on( "change", ":input", function(event) {
 //console.log('input event all');
 //console.log($(event.currentTarget));
 if($(event.currentTarget).is( "select" )){
    // var newval=($(event.currentTarget).val());
    // $(event.currentTarget).find('option').removeAttr('label');
    // $(event.currentTarget).find('option:selected').attr('label',newval);

    //$(event.currentTarget).attr('value',$(event.currentTarget).val());

    //$(event.currentTarget).val(newval).trigger("change");
    //$(event.currentTarget).prop("selectedIndex",-1);
    //$(event.currentTarget).find('option[value='+newval+']').prop('selected',true);
   
    // $(event.currentTarget)
    // .find('option')
    // .removeAttr('selected')
    // .filter('[value='+newval+']')
    // .attr('selected', true);
    
    //$(event.currentTarget).text(newval);


    }else{
        $(event.currentTarget).attr('value',$(event.currentTarget).val());
}
 //$(event.currentTarget).val($(event.currentTarget).val());
//  var indent=$(event.currentTarget).val();
 

//  $(event.currentTarget).find('option').filter(function(){
    
//     if($(this).val() == indent) $(this).prop("selected", true);
// });

});

$( document ).on( "change", ".cls_adjustmentType", function() {
    var serial=$(this).closest('tfoot').attr('data-quoteid');
    if(serial==undefined) serial='';
    fun_cal_grandtotal(serial);
});

function curlCurrencyItem(){

    

      $.ajax({
        url: '<?php echo site_url(); ?>Projects/curlQuoteCurrency',
        type: 'POST',
      async: false,
      //timeout: 1000,
      
      dataType: "JSON",

      success: function (data, textStatus) {
       //console.log("data converted curl");
       //console.log(data);
       var obj = jQuery.parseJSON( data.NewCurrencyValue );
        //console.log(obj);
       //alert(data.NewCurrencyName);
       //result =(parseFloat(data.NewCurrencyValue));
       //return Number(data.NewCurrencyValue);
       // $('#currencyValue').val(data.NewCurrencyValue);
       // $('#btn_submit_currency').removeAttr('disabled');
       

     },
     error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);

     }
   });
     
}

function convertCurrencyItem(row_in){

    return (fx.convert(1, {from: $('#sel_currency'+row_in).attr('value'), to: $('#sel_currency'+row_in).attr('data-currency')})).toFixed(2); 
   
}

function convertCurrencyManual(cur_from,cur_to){
   
    return (fx.convert(1, {from: cur_from, to: cur_to})).toFixed(2); 
   
}
 
 
function fun_cal_discount(row_in){
    
    var discount_type = $("#discount_type"+row_in).val();
    var discount_value_percent = Number($("#discount_val_percent"+row_in).val());
    var discount_value_direct = Number($("#discount_val_direct"+row_in).val());
    var calculated_discount=0;

    var jserviceTotal=Number($("#qty"+row_in).val())*Number($("#listPrice"+row_in).val().replace(/\,/g,''));
    var newcurval=null;
    
      if($('#sel_currency'+row_in).attr('value') != $('#sel_currency'+row_in).attr('data-currency')){
    if($('#item_cur_value'+row_in).attr('data-loaded') =='auto'){

      
            if($('#item_cur_value'+row_in).is("[data-loaded-curval]")){
                newcurval=$('#item_cur_value'+row_in).attr('data-loaded-curval');

            }else{

                newcurval=convertCurrencyItem(row_in);
                
                $('#item_cur_value'+row_in).attr('data-loaded-curval',newcurval);
                
            }
            
            $('#item_cur_value'+row_in).val(newcurval);
            jserviceTotal=jserviceTotal*newcurval;
            
        }else{
        
        newcurval=$('#item_cur_value'+row_in).val();
        jserviceTotal=jserviceTotal*newcurval;
    }
    }

    

    if(discount_type=="zero")
        calculated_discount=0;
    if(discount_type=="percent")
        calculated_discount=(jserviceTotal*discount_value_percent/100);
    if(discount_type=="direct")
        calculated_discount=Number(discount_value_direct*newcurval);
    if(discount_type=="both"){
        calculated_discount+=Number(jserviceTotal*discount_value_percent/100);
        calculated_discount+=Number(discount_value_direct*newcurval);
    }
    if(calculated_discount==0) $("#total_discount"+row_in).val('');
    else $("#total_discount"+row_in).val(Number(calculated_discount).toFixed(2));

    var jserviceafterdis=jserviceTotal-calculated_discount;

    $("#total_list"+row_in).html(jserviceTotal.toFixed(2));

    $("#total_afterdiscount"+row_in).html(jserviceafterdis.toFixed(2));
    var calculated_tax=0;
    var tax1=(Number($("#load_tax_vat"+row_in).val()));
    var tax2=(Number($("#load_tax_sales"+row_in).val()));
    var tax3=(Number($("#load_tax_service"+row_in).val()));

    if(!isNaN(tax1)) {calculated_tax+=(jserviceafterdis*tax1)/100;}
    if(!isNaN(tax2)) {calculated_tax+=(jserviceafterdis*tax2)/100;}
    if(!isNaN(tax3)) {calculated_tax+=(jserviceafterdis*tax3)/100;}
    
  
    if(calculated_tax==0) $("#total_aftertax"+row_in).html('');
    else $("#total_aftertax"+row_in).html(calculated_tax.toFixed(2));
    
    $("#netprice"+row_in).html((jserviceafterdis+Number($("#total_aftertax"+row_in).html())).toFixed(2) );


    var pass_tax_vat=Number($("#load_tax_vat"+row_in).val());
    var pass_tax_sales=Number($("#load_tax_sales"+row_in).val());
    var pass_tax_service=Number($("#load_tax_service"+row_in).val());
    
    $('#open_discount'+row_in).attr("href",''+ci_baseurl+'Projects/popupdiscount/'+row_in+'/'+jserviceTotal+'/'+discount_type+'/'+discount_value_percent+'/'+discount_value_direct);

    $('#open_tax'+row_in).attr("href",''+ci_baseurl+'Projects/popuptax/'+row_in+'/'+pass_tax_vat+'/'+pass_tax_sales+'/'+pass_tax_service+'/'+jserviceafterdis+'');
 
}
$( document ).on( "click", "[id^=delete_item]", function() {
    var row_num=( this.id.match(/\d+/));
    var serial=($('#row'+row_num).attr('data-quoteid'));

    $('#row'+row_num).remove();

    if(serial==undefined) serial='';
    fun_cal_nettotal(serial);
    fun_cal_grandtotal(serial);
   

});



$( document ).on( "click", "#cal_discount_grand", function() {
    var serial=($(this).attr('data-serial'));
    var calculated_discount_grand;

    if ($("#percent_discount_grand").is(':checked')){
        $("#discount_type_grand"+serial).val("percent");

        $("#discount_val_grand_percent"+serial).val($("#discount_percentage_val_grand").val());

        calculated_discount_grand=(Number($("#net_total"+serial).html())*Number($("#discount_val_grand_percent"+serial).val())) / 100;
    }
    if ($("#direct_discount_grand").is(':checked')){

        $("#discount_type_grand"+serial).val("direct");
        $("#discount_val_grand_direct"+serial).val($("#direct_discount_val_grand").val());
        calculated_discount_grand=Number($("#discount_val_grand_direct"+serial).val());
        
    }
    if ($("#percent_discount_grand").is(':checked') && $("#direct_discount_grand").is(':checked')){
        $("#discount_type_grand"+serial).val("both");
         calculated_discount_grand=(Number($("#net_total"+serial).html())*Number($("#discount_val_grand_percent"+serial).val())) / 100;
         calculated_discount_grand+=Number($("#discount_val_grand_direct"+serial).val());
    }
    if (!$("#percent_discount_grand").is(':checked') && !$("#direct_discount_grand").is(':checked')){
        $("#discount_type_grand"+serial).val("zero");
//        $("#discount_val_grand").val('0');
        calculated_discount_grand=0;
    }
    
    $('#open_discountgrand'+serial).attr("href",''+ci_baseurl+'Projects/popupdiscountgrand/'+$("#discount_type_grand"+serial).val()+'/'+Number($("#net_total"+serial).html())+'/'+Number($("#discount_val_grand_percent"+serial).val())+'/'+Number($("#discount_val_grand_direct"+serial).val())+'/'+serial);

    $("#net_totalafterdisgrand"+serial).html(calculated_discount_grand.toFixed(2));
    if(serial==undefined) serial='';
    fun_cal_grandtotal(serial);
    $("#close_discountgrand").trigger("click", [true]);
});

$( document ).on( "click", "#cal_tax_shiphand", function() {
    var serial=$(this).attr('data-serial');
    if(serial==undefined) serial='';
    fun_cal_sh_tax(serial);
    fun_cal_grandtotal(serial);
    $("#close_taxpopsh").trigger("click", [true]);
    
});
$( document ).on( "click", "#cal_discount,#cancel_discount,#cal_tax,#cancel_tax", function() {
    var rowid= $(this).attr("data-rowid");
    fun_cal_discount(rowid);
    var serial=($('#row'+rowid).attr('data-quoteid'));
    if(serial==undefined) serial='';
    fun_cal_nettotal(serial);
    fun_cal_grandtotal(serial);
});

     
$( document ).on( "keyup change", ".cal_total", function() {
    
    var row_num=( this.id.match(/\d+/));
    // if($(this).hasClass('sym-currency')){
    //     $('#item_cur_value'+row_num).removeAttr('data-loaded');
    // }
    var serial=$(this).closest('tr').attr('data-quoteid');
    if(serial==undefined) serial='';
    fun_cal_discount(row_num);

    fun_cal_nettotal(serial);
    fun_cal_grandtotal(serial);
    
});
$( document ).on( "keyup change", ".cls_shiphandlecharge", function() {
    var serial=$(this).closest('tfoot').attr('data-quoteid');
    var sh_charge=Number($("#in_shiphandlecharge"+serial).val());
    var sh_tax1=(sh_charge*Number($("#load_tax_vat_sh"+serial).val()))/100;
    var sh_tax2=(sh_charge*Number($("#load_tax_sales_sh"+serial).val()))/100;
    var sh_tax3=(sh_charge*Number($("#load_tax_service_sh"+serial).val()))/100;
    
    var total_sh_tax=sh_tax1+sh_tax2+sh_tax3;
    if(total_sh_tax==0) $("#taxtotal_shiphandle"+serial).html(''); 
    else $("#taxtotal_shiphandle"+serial).html((total_sh_tax).toFixed(2));

    $('#open_tax_shiphand'+serial).attr("href",''+ci_baseurl+'Projects/popuptaxshiphand/'+Number($("#load_tax_vat_sh"+serial).val())+'/'+Number($("#load_tax_sales_sh"+serial).val())+'/'+Number($("#load_tax_service_sh"+serial).val())+'/'+sh_charge+'/'+serial);
    if(serial==undefined) serial='';
    fun_cal_grandtotal(serial);
});
$( document ).on( "keyup change", ".cls_adjustment", function() {
    var serial=$(this).closest('tfoot').attr('data-quoteid');
    if(serial==undefined) serial='';
    fun_cal_grandtotal(serial);

});

function drawQuoteItems(val,proID){
    //console.log('drawQuoteItems');
    //console.log(val);
   
    if (val.revision_num>0){
        revnum=val.quoteid+'-R'+(val.revision_num);
        revnumgen=val.quoteid+'-R';
    }else{
        revnum=val.quoteid;
        revnumgen=val.quoteid+'-N';
    }
    newrow='<tr data-level="1" data-quoteid='+val.quoteid+' data-typeid='+val.type_id+'>'
            +'<td><input class="chk-qt-inv" type="checkbox"></td>'
            +'<td class="cls-open-items" data-quoteid='+val.quoteid+' data-taskid="'+val.taskid+'" onclick="loadquoteitems(this)"><i style="margin-right: 5px;" class="fa fa-caret-right"></i><span>QT-'+revnum+'</span></td>'
            +'<td><input name="quotename_pop" onblur="updatequoteitems(this)" type="text" value="'+val.subject+'"</td>'
            +'<td><select onchange="updatequoteitems(this)" name="quotestage_pop">'
            +'<option value="Opened">Opened</option>'
            +'<option value="Delivered">Delivered</option>'
            +'<option value="Reviewed">Reviewed</option>'
            +'<option value="Accepted">Accepted</option>'
            +'<option value="Rejected">Rejected</option>'
            +'<option value="Revised">Revised</option>'
            +'</select></td>'
            +'<td>'+val.createdate.split(" ")[0]+'</td>'
            +'<td>'
            +'<a title="Delete" onclick="fun_delete_quote(this)" class="btn btn-danger btn-xs pull-right size-family-sidebar btn-qa quote-action-del"><i style="font-size:20px !important;margin:5px" class="fa fa-trash-o"></i> </a>'

            +'<a title="Show More" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-more"><i style="font-size:20px !important;margin:5px" class="fa fa-ellipsis-h"></i> </a>'

            
            +'</td>'
            +'</tr>';
            if(proID){
                 $('#quote_details_pro > tbody:last-child').append(newrow);
            $('#quote_details_pro > tbody tr:last-child').find('[name="quotestage_pop"]').val(val.quotestage);
             qTipQuoteMenu( $('#quote_details_pro > tbody tr:last-child').find('.quote-action-more'),val.quoteid,'quotation',revnumgen,val.pro_id,val.taskid,0);
        }else{
            $('#quote_details > tbody:last-child').append(newrow);
            $('#quote_details > tbody tr:last-child').find('[name="quotestage_pop"]').val(val.quotestage);
             qTipQuoteMenu( $('#quote_details > tbody tr:last-child').find('.quote-action-more'),val.quoteid,'quotation',revnumgen,val.pro_id,val.taskid,1);
        }

           
}

function reloadQuotesList(){
   $.ajax({
    url: '<?php echo site_url(); ?>Projects/taskDetail',
    type: 'POST',
    data: {
        taskID: taskdataid,
        taskLsitID: "0000000000",
        projectID: pro_id,
        get_status:get_status,
        user_id:user_id
    },
    async:false,
    dataType: "json",

    success: function (data, textStatus) {
        
        taskQuoteListLoad(data);
        
        //taskInvoiceListLoad(data);

            // $('.nav-tabs a[href="#tab_4"]').tab('show');
            // $('#quote_details > tbody tr:last-child').find('.cls-open-items').click();
            // $("#box-tab-qt").animate({scrollTop: $('#box-tab-qt').prop("scrollHeight")}, 1000);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Some code to debbug e.g.:               
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
function fun_revision_invoicequote(qid,invid,typeid,linkid){


    if($('#form_inv_item_'+qid).length==0){

        $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').click();
        $('#form_inv_item_'+qid).attr('action',''+ci_baseurl+'Projects/taskitemupdate/'+qid+'/'+typeid+'/'+linkid+'/'+invid);
        $('#form_inv_item_'+qid).submit();
        $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').click();
    }else{
        $('#form_inv_item_'+qid).attr('action',''+ci_baseurl+'Projects/taskitemupdate/'+qid+'/'+typeid+'/'+linkid+'/'+invid);
        $('#form_inv_item_'+qid).submit();

    }

    $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').closest('tr').find('[name="quotestage_pop"]').val('Revised');

    var revnumber=parseInt($('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').closest('tr').attr('data-revision'));
    revnumber=revnumber+1;
    $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').closest('tr').attr('data-revision',revnumber);

    var revserial=$('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').closest('tr').find('.cls-open-items-inv span').html();

    if(revnumber==1){
        revserial = revserial.concat('-R'+revnumber);
    }else{
     var revserialsp= revserial.split('R');

     revserial = revserialsp[0].concat('R'+revnumber);
 }
 $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').closest('tr').find('.cls-open-items-inv span').html(revserial);

 $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"] span').each(function(i,item) {

    $(this).html(revserial);
});

 reloadQuotesList();
}
function fun_update_invoicequote(qid){

    $('#form_inv_item_'+qid).attr('action',''+ci_baseurl+'Projects/taskitemupdate/'+qid);
                    $('#form_inv_item_'+qid).submit();
                    reloadQuotesList();

    
   
    js_gen_rev=true;

     
}

function fun_delete_invoicequote(element){

bootbox.dialog({
        size: "small",
        message: "Do you want to delete this quote?",
        title: "Confirmation",

        buttons: {
            yes: {
                label: "Yes",
                className: "btn-danger",
                callback: function () {
 					var qid=($(element).closest('tr').attr('data-quoteid'));

				    $.ajax({
			            url: '<?php echo site_url(); ?>Projects/quotesItemDelete',
			            dataType: "JSON",
			            data: {qid: qid},
			            type: "POST",
			            success : function(data) {
			                $('#invoice_details [data-level="2"][data-quoteid="'+qid+'"]').remove();
			                $('#invoice_details [data-level="3"][data-loaded-quoteid="'+qid+'"]').remove();

			            },
			                error: function (jqXHR, textStatus, errorThrown) {
			                // Some code to debbug e.g.:   
			                 //console.log("fun_updateSerial");            
			                console.log(jqXHR);
			                console.log(textStatus);
			                console.log(errorThrown);
			            }
				    });   
				}
            },
            no: {
                label: "No",
                className: "btn-success",
                callback: function () {

                }
            }

        }
    });
       $(".modal-dialog").draggable();
}

function drawInvoiceQuote(val,element){
    //console.log('drawInvoiceQuote');
    //console.log(val);

    var revnum=val.quoteid;
    if(parseInt(val.revision_num)>0) revnum=val.link_id+'-R'+(val.revision_num);
   
    var uid=$.now();
    $(element).attr('data-loaded-revision',val.revision_num);

    newrow='<tr data-level="2" data-revision="'+val.revision_num+'" data-typeid='+val.type_id+' data-linkid='+val.link_id+'  data-quoteid='+val.quoteid+' data-loaded-invoiceid='+$(element).closest('tr').attr('data-invoiceid')+'>'
            +'<td class="cls-open-items-inv" data-quoteid='+val.quoteid+'  onclick="loadinvoicequoteitems(event,this)"><i style="margin-left: 5px;margin-right: 5px;" class="fa fa-caret-right"></i><span>QT-'+revnum+'</span></td>'
            +'<td><input name="quotename_pop" onblur="updateinvoicequoteitems(this)" type="text" value="'+val.subject+'"</td>'
            +'<td><select id="'+uid+'" onchange="updateinvoicequoteitems(this)" name="quotestage_pop">'
            +'<option value="Opened">Opened</option>'
            +'<option value="Delivered">Delivered</option>'
            +'<option value="Reviewed">Reviewed</option>'
            +'<option value="Accepted">Accepted</option>'
            +'<option value="Rejected">Rejected</option>'
            +'<option value="Revised">Revised</option>'
            +'</select></td>'
            +'<td>'+val.createdate.split(" ")[0]+'</td>'
            +'<td>'
            

            +'<a title="Delete" onclick="fun_delete_invoicequote(this)" class="btn btn-danger btn-xs pull-right size-family-sidebar btn-qa quote-action-del"><i style="font-size:20px !important;margin:5px" class="fa fa-trash-o"></i> </a>'
            //+'<a title="Update" onclick="fun_update_invoicequote(this)" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-update"><i style="font-size:20px !important;margin:5px" class="fa fa-pencil-square-o"></i></a>'

            +'<a title="Show More" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-update"><i style="font-size:20px !important;margin:5px" class="fa fa-ellipsis-h"></i> </a>'
            
            +'</td>'
            +'</tr>';
            
            $(element).closest('tr').after(newrow);
            
            $('#'+uid).val(val.quotestage);
           

            var qid=($(element).closest('tr').next().attr('data-quoteid'));

            var invid=$(element).closest('tr').next().attr('data-loaded-invoiceid');
            var typeid=$(element).closest('tr').next().attr('data-typeid');
            var linkid=$(element).closest('tr').next().attr('data-linkid');

            qTipQuoteUpdateMenu( $(element).closest('tr').next().find('.quote-action-update'),qid,invid,typeid,linkid);

}
var treeserial=0;var treeparent=0;

function drawInvoiceItems(val,proID){

    
    newrow='<tr data-level="1" data-invoiceid='+val.invoiceid+' data-revisions='+val.revisions+' data-quoteid='+val.quoteid+'>'
    
    +'<td onclick="loadinvoicequotes(event,this)"><i style="margin-right: 5px;" class="fa fa-caret-right"></i><span>INV-'+val.invoiceid+'</span></td>'
    +'<td><input style="width:100%" name="invoicename_pop" onblur="updateinvoiceitems(this)" type="text" value="'+val.subject+'"</td>'
    +'<td><select style="width:100%" onchange="updateinvoiceitems(this)" name="invoicestage_pop">'
    +'<option value="Opened">Opened</option>'
    +'<option value="Delivered">Delivered</option>'
    +'<option value="Reviewed">Reviewed</option>'
    +'<option value="Accepted">Accepted</option>'
    +'<option value="Rejected">Rejected</option>'

    +'</select></td>'
    +'<td>'+val.createdate.split(" ")[0]+'</td>'
    +'<td>'
   

    +'<a title="Delete" onclick="fun_delete_invoice(this)" class="btn btn-danger btn-xs pull-right size-family-sidebar btn-qa invoice-action-del"><i style="font-size:20px !important;margin:5px" class="fa fa-trash-o"></i></a>'
     +'<a title="Show More" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa invoice-action-more"><i style="font-size:20px !important;margin:5px" class="fa fa-ellipsis-h"></i> </a>'


    +'</td>'
    +'</tr>';
    if(proID){
        $('#invoice_details_pro > tfoot').hide();
    $('#invoice_details_pro > tbody:last-child').append(newrow);
    $('#invoice_details_pro > tbody tr:last-child').find('[name="invoicestage_pop"]').val(val.invoicestatus);

    qTipQuoteMenu( $('#invoice_details_pro > tbody tr:last-child').find('.invoice-action-more'),val.invoiceid,'invoice',val.pro_id,val.taskid,0);
    }else{
        $('#invoice_details > tfoot').hide();
        $('#invoice_details > tbody:last-child').append(newrow);
        $('#invoice_details > tbody tr:last-child').find('[name="invoicestage_pop"]').val(val.invoicestatus);

        qTipQuoteMenu( $('#invoice_details > tbody tr:last-child').find('.invoice-action-more'),val.invoiceid,'invoice',val.pro_id,val.taskid,1);
    }

   
}

function taskQuoteListLoad(data){

    
    $("#quote_details > tbody").html("");
    if(data.updated_quotes.length>0){

       $('#quote_details > tfoot').hide();       
       $.each(data.updated_quotes, function(key,val) {  
           drawQuoteItems(val);


       }); 
   }else{$('#quote_details > tfoot').show();   }
}

function proQuoteListLoad(data,proID){

    //console.log('taskQuoteListLoad');console.log(data);
    $("#quote_details_pro > tbody").html("");
    if(data.allQouteList.length>0){

       $('#quote_details_pro > tfoot').hide();       
       $.each(data.allQouteList, function(key,val) {  
           drawQuoteItems(val,proID);

       }); 
   }else{$('#quote_details_pro > tfoot').show();   }
}

function taskInvoiceListLoad(data){
    $("#invoice_details > tbody").html("");
        if(data.task_invoices.length>0){
             $('#invoice_details_foot').hide();

            $.each(data.task_invoices, function(key,val) {  
                 drawInvoiceItems(val);
                

            }); 
        }else{$('#invoice_details_foot').show();}
}
    function proInvoiceListLoad(data,proID){
        $("#invoice_details_pro > tbody").html("");
            if(data.allInvoiceList.length>0){
                 $('#invoice_details_pro > tfoot').hide();

                $.each(data.allInvoiceList, function(key,val) {  
                     drawInvoiceItems(val,proID);
                    

                }); 
            }else{$('#invoice_details_pro > tfoot').show();}
    }

function loadinvoicequoteitems(event,element){

    if($(event.target).hasClass("quote-action-del")) return;

    var qid=$(element).closest('tr').attr('data-quoteid');
    var invid=$(element).closest('tr').attr('data-loaded-invoiceid');
    var typeid=$(element).closest('tr').attr('data-typeid');

    $(element).closest('table').find('tbody tr').each(function(i,item) {
        $(this).css('cssText','background-color:white !important');
    });

    $(element).closest('tr').css('cssText','background-color:lightgreen !important');

    var togicon=$(element).closest('tr').find('[class*="fa-caret"]');
    
    if($(togicon).hasClass('fa-caret-right')){

        //console.log("qid to load:"+qid);
        //alert($('#loaded_items_'+qid).length);
        //if($('#loaded_items_'+qid).length==0){

            $(element).closest('.mainContainerDiv').find('[class*="loaded_items_"]').each(function(i,val){
                   
            //$(val).prev().find('.cls-open-items i');
            $(val).prev().find('[class*="cls-open-items"] i').toggleClass('fa-caret-down fa-caret-right');
             $(val).remove();
            });

            $.ajax({
                url: '<?php echo site_url(); ?>Projects/invoiceQuotesItemDetail/'+qid,
                dataType: "JSON",
                type: "POST",
                async:false,
                success : function(data) {
                    //console.log("invoice items");
                    //console.log(data);
                    if(data.currencyList.length>0){
                        currency_symbol=data.currencyList[0].name;
                        currency_type=data.currencyList[0].type_value;
                    }else{
                         currency_symbol='BDT';
                        currency_type='auto';
                    }

                    // invoice
                    if(data.updated_items.length>0){
                        var invqtitems='<tr class="loaded_items_'+qid+'" data-level="3" data-loaded-quoteid="'+qid+'" data-loaded-invoiceid="'+invid+'"><td colspan="5">'
                        +'<form id="form_inv_item_'+qid+'" method="post" action="<?php echo site_url(); ?>Projects/taskitemupdate/'+qid+'" role="form" name="form_dataset_items">'
                        +'<table data-quoteid="'+qid+'" class="invoice-item-details"  id="inv_item_details_'+qid+'" style="">'
                        +'<caption><i onclick="fun_expand_quotes(this)" class="fa fa-2x fa-arrows-alt pull-right"></></caption>'
                        + '<thead>'
                        +    '<tr>'
                        
                        +       '<th style="width:5%">Tools</th>'
                        +       '<th style="width:30%">Item/Service</th>'
                        +       '<th style="width:20%">Qty</th>'
                        +       '<th style="width:20%">List Price</th>'
                        +       '<th colspan="1">Total</th>'
                        +       '<th colspan="1">Net Price</th>'
                        +   '</tr>'
                        +'</thead>'

                        +'<tbody data-quoteid="'+qid+'" id="inv_item_tbody_'+qid+'">'
                        +'</tbody>'
                        +'<tfoot data-quoteid="'+qid+'">'

                        +'<tr>'
                        +' <td colspan="3"></td>'
                        +' <td colspan="2" align="right">Net Total :</td>'
                        +' <td colspan="1" id="net_total'+qid+'">0.000</td>'
                        +'</tr>'

                        +'<tr>'
                        +'<td colspan="3"></td>'
                        +'<td colspan="2" align="right">'
                        +'<a id="open_discountgrand'+qid+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload" >(-) Discount</a>'
                        +                    '<input type="hidden" id="discount_type_grand'+qid+'" name="discount_type_grand" value="zero">'
                        +                   '<input type="hidden" id="discount_val_grand_percent'+qid+'" name="discount_val_grand_percent" value="0">'
                        +                  '<input type="hidden" id="discount_val_grand_direct'+qid+'" name="discount_val_grand_direct" value="0">'
                        +            ' </td>'
                        +            '<td colspan="1" id="net_totalafterdisgrand'+qid+'"></td>'
                        +       '</tr>'
                        +      '<tr>'
                        +         '<td colspan="3"></td>'
                        +        '<td colspan="2" align="right">(+) Shipping & Handling Charges :</td>'
                        +       '<td colspan="1">'
                        +          '<input step="0.01" min="0" value="" type="number" id="in_shiphandlecharge'+qid+'" name="in_shiphandlecharge" class="cls_shiphandlecharge input-sm">'
                        +     '</td>'
                        +'</tr>'
                        +'<tr>'
                        +   '<td colspan="3"></td>'
                        +  '<td colspan="2" align="right">'
                        +     '<a id="open_tax_shiphand'+qid+'" class="" data-title="Taxes For Shipping and Handling" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Taxes For Shipping and Handling : </a>'
                        +    '<input type="hidden" id="load_tax_vat_sh'+qid+'" name="load_tax_vat_sh" value="4.500" >'
                        +   '<input type="hidden" id="load_tax_sales_sh'+qid+'" name="load_tax_sales_sh" value="10.000" >'
                        +  '<input type="hidden" id="load_tax_service_sh'+qid+'" name="load_tax_service_sh" value="12.500" >'
                        +'</td>'
                        +'<td colspan="1"><label id="taxtotal_shiphandle'+qid+'"></label></td>'
                        +'</tr>'
                        +'<tr>'
                        +   '<td colspan="3"></td>'
                        +  '<td colspan="2" align="right">Adjustment :'
                        +     '<select id="sel_adjustmentType'+qid+'" name="sel_adjustmentType" class="input-sm cls_adjustmentType">'
                        +        '<option value="add">Add</option>'
                        +       '<option value="deduct">Deduct</option>'
                        +  '</select>'
                        +'</td>'
                        +'<td colspan="1">'
                        +   '<input step="0.01" min="0" value="" type="number" id="in_adjustment'+qid+'" name="in_adjustment" class="input-sm cls_adjustment">'
                        +'</td>'
                        +'</tr>'
                        +'<tr>'
                        +   '<td colspan="3"></td>'
                        +  '<td colspan="2" align="right" >Grand Total : </td>'
                        + '<td id="grand_total_full'+qid+'" colspan="1"><span id="grand_total_currency'+qid+'"></span> <span id="grand_total'+qid+'"></span></td>'
                        +'<input type="hidden" id="grand_total_hval'+qid+'" name="grand_total_hval">'
                        +'</tr>'
                        +'</tfoot>'
                        +'</table></form></td></tr>' ;


                        $(element).closest('tr').after(invqtitems);

                        var discount_value=0;
                        var calculated_discount=0;
                        
                        currency_symbol=data.updated_quotes[0].currency_name;
                        js_unitList=[];
                        $(data.UnitList).each(function(i,val){
                            js_unitList.push(val.name);
                        });
            
        $.each(data.updated_items, function(key,val) {  

            if(val.discount_type=="percent") discount_value=val.discount_percent;
            if(val.discount_type=="direct") discount_value=val.discount_amount;
            row_in=val.lineitem_id;
            
                // load from database
                var itemhtml= '<tr data-quoteid="'+qid+'" id="row'+row_in+'">'
                // delete icon
                +'<td>'
                +'<span id="delete_item'+row_in+'" class="fa fa-trash"></span>'
                +'</td>'
                // item/service name
                +'<td class="td-align-top">'
                +   '<div class="input-group">'
                +       '<input required value="'+val.item_name+'" type="text" name="sel_servicename_item[]" id="sel_servicename_item'+row_in+'" class="input-sm">'
                +       '<input required value="'+val.serviceid+'" type="hidden" readonly="" name="sel_serviceid_item[]" id="sel_serviceid_item'+row_in+'" class="form-control input-sm">'
                +       '<a style="display:none" href="'+ci_baseurl+'yzy-accounts/index/popupservice/'+row_in+'" data-title="Service'+row_in+'" data-toggle="lightbox" data-gallery="remoteload"><i class="fa fa-3x fa-plus-square"></i></a>'
                +   '</div>'
                +'</td>'
                // quantity
                +'<td class="td-align-top">'
                +   '<input required min="0" value="'+val.quantity+'" type="number" id="qty'+row_in+'" name="qty[]" class="input-sm cal_total inp-qty-unit">'
                //+'<input value="'+val.item_unit_value+'" type="hidden" id="item_unit_value'+row_in+'"  name="item_unit_value[]">'
                +'<select data-status="load" data-view="yes"  style="font-size:10px" name="sel_qty_unit[]"   id="qty_unit'+row_in+'" value="'+val.item_unit+'"  class="sel-qty-unit">';
                $(js_unitList).each(function(i,unitname){
                    
                    itemhtml+='<option '+(val.item_unit==unitname ? "selected" : "")+' value="'+unitname+'">'+unitname+'</option>';
                });
                itemhtml+='</select>'
                
                +'</td>'
                // list price
                +'<td class="td-align-top">'
                +'<div class="itemlistheightin">'

                +'<select data-view="yes" data-currency="'+currency_symbol+'" data-curtype="'+currency_type+'" id="sel_currency'+row_in+'" class="sym-currency" name="sel_currency[]" value="'+val.item_currency+'">'
                +loadCurrencyOptions()
                +'</select>'


                +'<input required value="'+Number(val.listprice)+'" type="text" id="listPrice'+row_in+'" onblur="fun_formatCurrency(event)" name="listPrice[]"  class="input-sm cal_total inp-currency">'
                +'<input data-loaded="'+currency_type+'" value="'+val.item_currency_value+'" type="hidden" id="item_cur_value'+row_in+'"  name="item_cur_value[]"></div>'
                +'<div class="itemlistheightout"><a id="open_discount'+row_in+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(-) Discount</i></a></div>'
                +'<input type="hidden" id="discount_type'+row_in+'" name="discount_type[]" value="'+val.discount_type+'" >'
                +'<input type="hidden" id="discount_val_percent'+row_in+'" name="discount_val_percent[]" value="'+val.discount_percent+'" >'
                +'<input type="hidden" id="discount_val_direct'+row_in+'" name="discount_val_direct[]" value="'+val.discount_amount+'" >'
                +   '<div class="itemlistheightout"><span>Total After Discount :</span></div>'
                +'<div class="itemlistheightout"><a id="open_tax'+row_in+'" data-title="Tax" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Tax</i></a></div>'
                +'<input type="hidden" id="load_tax_vat'+row_in+'" name="load_tax_vat[]" value="'+val.item_tax_vat+'" >'
                +'<input type="hidden" id="load_tax_sales'+row_in+'" name="load_tax_sales[]" value="'+val.item_tax_sales+'" >'
                +'<input type="hidden" id="load_tax_service'+row_in+'" name="load_tax_service[]" value="'+val.item_tax_service+'" >'
                +'</td>'
                // total price
                +'<td class="td-align-top srvtotal" id="serviceTotal'+row_in+'">'
                +'<div class="itemlistheightmid"><label id="total_list'+row_in+'">0.000</label></div>'
                +'<div class="itemlistheightout"><input readonly type="number" name="total_discount[]" id="total_discount'+row_in+'" value="'+val.discount_amount+'"></div>'
                
                +'<div class="itemlistheightout"><span id="total_afterdiscount'+row_in+'">0.000</span></div>'
                +'<div class="itemlistheightout"><span id="total_aftertax'+row_in+'"></span></div>'
                +'</td>'
                // net price
                +'<td>'
                +'<label class="cls_nettotal'+qid+'" id="netprice'+row_in+'"></label>'
                +'</td>'

                +'</tr>';
                
                $('#inv_item_tbody_'+qid).append(itemhtml);

               

        fun_cal_discount(row_in);

        });
select2itemUnit($('#inv_item_details_'+qid+' tbody tr').find('.sel-qty-unit'));
select2itemCurrency($('#inv_item_details_'+qid+' tbody tr').find('.sym-currency'));

$("#discount_type_grand"+qid).val(data.updated_quotes[0].quotes_discount_type);
$("#discount_val_grand_direct"+qid).val(data.updated_quotes[0].quotes_discount_amount);
$("#discount_val_grand_percent"+qid).val(data.updated_quotes[0].quotes_discount_percent);

$("#net_totalafterdisgrand"+qid).html("");

$('#open_discountgrand'+qid).attr("href",''+ci_baseurl+'Projects/popupdiscountgrand/'+$("#discount_type_grand"+qid).val()+'/'+Number($("#net_total"+qid).html())+'/'+Number($("#discount_val_grand_percent"+qid).val())+'/'+Number($("#discount_val_grand_direct"+qid).val()));

$("#load_tax_vat_sh"+qid).val(data.updated_quotes[0].sh_vat);
$("#load_tax_sales_sh"+qid).val(data.updated_quotes[0].sh_sales);
$("#load_tax_service_sh"+qid).val(data.updated_quotes[0].sh_service);
$("#in_shiphandlecharge"+qid).attr('value',data.updated_quotes[0].s_h_amount);

$('#open_tax_shiphand'+qid).attr("href",''+ci_baseurl+'Projects/popuptaxshiphand/'+Number($("#load_tax_vat_sh"+qid).val())+'/'+Number($("#load_tax_sales_sh"+qid).val())+'/'+Number($("#load_tax_service_sh"+qid).val())+'/'+Number($("#in_shiphandlecharge"+qid).val())+'');

var sh_charge=Number($("#in_shiphandlecharge"+qid).val());
var sh_tax1=(sh_charge*Number($("#load_tax_vat_sh"+qid).val()))/100;
var sh_tax2=(sh_charge*Number($("#load_tax_sales_sh"+qid).val()))/100;
var sh_tax3=(sh_charge*Number($("#load_tax_service_sh"+qid).val()))/100;

var total_sh_tax=sh_tax1+sh_tax2+sh_tax3;
if(total_sh_tax==0) $("#taxtotal_shiphandle"+qid).html('');
else $("#taxtotal_shiphandle"+qid).html((total_sh_tax).toFixed(2));

$("#sel_adjustmentType"+qid).val(data.updated_quotes[0].adjustment_type);
$("#in_adjustment"+qid).attr('value',data.updated_quotes[0].adjustment);

fun_cal_nettotal(qid);
fun_cal_sh_tax(qid);
fun_cal_grandtotal(qid);
}
}

});
   // }else{
    //$('#loaded_items_'+qid).show();
   // }

}else{
    $('.loaded_items_'+qid).remove();
}

$(togicon).toggleClass('fa-caret-right fa-caret-down');

}

function taskitemlistload(data,element){

    var qid=$(element).attr('data-quoteid');
   
    $("#taskitemid").val(taskdataid);
    $("#taskitemid_pro").val(taskdataid);

    $('#open_task_settings').attr("href",''+ci_baseurl+'Projects/popupQuoteSettings/'+data.updated_quotes[0].quoteid);
        // sujon @ 8/8/16 
    
    if(data.currencyList.length>0){
    currency_symbol=data.currencyList[0].name;
    currency_type=data.currencyList[0].type_value;
    }else{
         currency_symbol='BDT';
        currency_type='auto';
    }
    js_unitList=[];
    $(data.UnitList).each(function(i,val){
        js_unitList.push(val.name);
    });

    var togicon=$(element).closest('tr').find('[class*="fa-caret"]');
    
        if($(togicon).hasClass('fa-caret-right')){

          
       $(element).closest('.mainContainerDiv').find('[class*="loaded_items_"]').each(function(i,val){
                   
             
            $(val).prev().find('[class*="cls-open-items"] i').toggleClass('fa-caret-down fa-caret-right');
             $(val).remove();
        });

        var invqtitems='<tr class="loaded_items_'+qid+'" data-level="2" data-loaded-quoteid="'+qid+'""><td colspan="6">'
        
        +'<table data-quoteid="'+qid+'" class="invoice-item-details qt-item-details"  id="qt_item_details_'+qid+'" style="">'
        +'<caption><i onclick="fun_expand_items(this)" class="fa fa-2x fa-arrows-alt pull-right"></></caption>'
        + '<thead>'
        +    '<tr>'
        //+       '<th style="width:5%"></th>'
        +     '<th style="width:5%">Tools</th>'
        +    '<th style="width:28%">Item/Service</th>'
        +   '<th style="width:18%">Qty</th>'
        +  '<th style="width:18%">List Price</th>'
        +  '<th colspan="1">Total</th>'
        + '<th colspan="1">Net Price</th>'
        +'</tr>'
        +'</thead>'

        +'<tbody id="qt_item_tbody_'+qid+'">'
        +'</tbody>'

        +'<tfoot data-quoteid="'+qid+'">'
        +'<tr>'
        +'<td colspan="6"><input type="button" name="Button" data-quoteid="'+qid+'" onclick="fun_addNewService(this,'+qid+')" value="Add Item" style="" class="btn btn-primary btn-xs pull-left btn-updateandexit size-family-sidebar"></td>'
        +'</tr>'

        +'<tr>'
        +   '<td colspan="3"></td>'
        +   '<td colspan="2" align="right">Net Total :</td>'
        +   '<td colspan="1" id="net_total'+qid+'">0.000</td>'
        +'</tr>'

        +'<tr>'
        +'<td colspan="3"></td>'
        +'<td colspan="2" align="right">'
        +'<a id="open_discountgrand'+qid+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload" >(-) Discount</a>'
        +'<input type="hidden" id="discount_type_grand'+qid+'" name="discount_type_grand" value="zero">'
        +'<input type="hidden" id="discount_val_grand_percent'+qid+'" name="discount_val_grand_percent" value="0">'
        +'<input type="hidden" id="discount_val_grand_direct'+qid+'" name="discount_val_grand_direct" value="0">'
        +' </td>'
        +'<td colspan="1" id="net_totalafterdisgrand'+qid+'"></td>'
        +'</tr>'
        +'<tr>'
        +'<td colspan="3"></td>'
        +'<td colspan="2" align="right">(+) Shipping & Handling Charges :</td>'
        +'<td colspan="1">'
        +'<input step="0.01" min="0" value="" type="number" id="in_shiphandlecharge'+qid+'" name="in_shiphandlecharge" class="cls_shiphandlecharge input-sm">'
        +'</td>'
        +'</tr>'
        +'<tr>'
        +   '<td colspan="3"></td>'
        +  '<td colspan="2" align="right">'
        +     '<a id="open_tax_shiphand'+qid+'" class="" data-title="Taxes For Shipping and Handling" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Taxes For Shipping and Handling : </a>'
        +    '<input type="hidden" id="load_tax_vat_sh'+qid+'" name="load_tax_vat_sh" value="4.500" >'
        +   '<input type="hidden" id="load_tax_sales_sh'+qid+'" name="load_tax_sales_sh" value="10.000" >'
        +  '<input type="hidden" id="load_tax_service_sh'+qid+'" name="load_tax_service_sh" value="12.500" >'
        +'</td>'
        +'<td colspan="1"><label id="taxtotal_shiphandle'+qid+'"></label></td>'
        +'</tr>'
        +'<tr>'
        +   '<td colspan="3"></td>'
        +  '<td colspan="2" align="right">Adjustment :'
        +     '<select id="sel_adjustmentType'+qid+'" name="sel_adjustmentType" class="input-sm cls_adjustmentType">'
        +        '<option value="add">Add</option>'
        +       '<option value="deduct">Deduct</option>'
        +  '</select>'
        +'</td>'
        +'<td colspan="1">'
        +   '<input step="0.01" min="0" value="" type="number" id="in_adjustment'+qid+'" name="in_adjustment" class="input-sm cls_adjustment">'
        +'</td>'
        +'</tr>'
        +'<tr>'
        +   '<td colspan="3"></td>'
        +  '<td colspan="2" align="right" >Grand Total : </td>'
        + '<td id="grand_total_full'+qid+'" colspan="1"><span id="grand_total_currency'+qid+'">'+currency_symbol+'</span> <span id="grand_total'+qid+'"></span></td>'
        +'<input type="hidden" id="grand_total_hval'+qid+'" name="grand_total_hval">'
        +'</tr>'
        +'</tfoot>'
        +'</table></td></tr>' ;


        $(element).closest('tr').after(invqtitems);

         // quotes
        if(data.updated_items.length>0){
        var discount_value=0;
        var calculated_discount=0;
              
        $.each(data.updated_items, function(key,val) {  

            if(val.discount_type=="percent") discount_value=val.discount_percent;
            if(val.discount_type=="direct") discount_value=val.discount_amount;
            row_in=val.lineitem_id;
            
            // load from database
            var itemhtml= '<tr data-quoteid="'+qid+'" id="row'+row_in+'">'
            //+'<td><input class="chk-qt-item" type="checkbox"></td>'
            // delete icon
            +'<td>'
            +'<span id="delete_item'+row_in+'" class="fa fa-trash"></span>'
            +'</td>'
            // item/service name
            +'<td class="td-align-top">'
            +   '<div class="input-group">'
            +       '<input required value="'+val.item_name+'" type="text" name="sel_servicename_item[]" id="sel_servicename_item'+row_in+'" class="input-sm">'
            +       '<input required value="'+val.serviceid+'" type="hidden" readonly="" name="sel_serviceid_item[]" id="sel_serviceid_item'+row_in+'" class="form-control input-sm">'
            +       '<a style="display:none" href="'+ci_baseurl+'yzy-accounts/index/popupservice/'+row_in+'" data-title="Service'+row_in+'" data-toggle="lightbox" data-gallery="remoteload"><i class="fa fa-3x fa-plus-square"></i></a>'
            +   '</div>'
            +'</td>'
            // quantity
            +'<td class="td-align-top">'
            +   '<input required min="0" value="'+val.quantity+'" type="number" id="qty'+row_in+'" name="qty[]" class="input-sm cal_total inp-qty-unit">'
            //+'<input value="'+val.item_unit_value+'" type="hidden" id="item_unit_value'+row_in+'"  name="item_unit_value[]">'
            +'<select style="font-size:10px" name="sel_qty_unit[]" data-status="load" data-view="yes" id="qty_unit'+row_in+'" class="sel-qty-unit" value="'+val.item_unit+'">';
                $(js_unitList).each(function(i,unitname){
                    
                    itemhtml+='<option '+(val.item_unit==unitname ? "selected" : "")+' value="'+unitname+'">'+unitname+'</option>';
                });
            itemhtml+='</select>'
            
            +'</td>'
            // list price
            +'<td class="td-align-top">'
            +'<div class="itemlistheightin">'

            +'<select data-view="yes" data-currency="'+currency_symbol+'" data-curtype="'+currency_type+'" id="sel_currency'+row_in+'" class="sym-currency" name="sel_currency[]" value="'+val.item_currency+'">'
            +loadCurrencyOptions()
            +'</select>'


            +'<input required value="'+Number(val.listprice)+'" type="text" id="listPrice'+row_in+'" onblur="fun_formatCurrency(event)" name="listPrice[]"  class="input-sm cal_total inp-currency">'
            +'<input value="'+val.item_currency_value+'" data-loaded="'+currency_type+'" type="hidden" id="item_cur_value'+row_in+'"  name="item_cur_value[]"></div>'
            +'<div class="itemlistheightout"><a id="open_discount'+row_in+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(-) Discount</i></a></div>'
            +'<input type="hidden" id="discount_type'+row_in+'" name="discount_type[]" value="'+val.discount_type+'" >'
            +'<input type="hidden" id="discount_val_percent'+row_in+'" name="discount_val_percent[]" value="'+val.discount_percent+'" >'
            +'<input type="hidden" id="discount_val_direct'+row_in+'" name="discount_val_direct[]" value="'+val.discount_amount+'" >'
            +   '<div class="itemlistheightout"><span>Total After Discount :</span></div>'
            +'<div class="itemlistheightout"><a id="open_tax'+row_in+'" data-title="Tax" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Tax</i></a></div>'
            +'<input type="hidden" id="load_tax_vat'+row_in+'" name="load_tax_vat[]" value="'+val.item_tax_vat+'" >'
            +'<input type="hidden" id="load_tax_sales'+row_in+'" name="load_tax_sales[]" value="'+val.item_tax_sales+'" >'
            +'<input type="hidden" id="load_tax_service'+row_in+'" name="load_tax_service[]" value="'+val.item_tax_service+'" >'
            +'</td>'
            // total price
            +'<td class="td-align-top srvtotal" id="serviceTotal'+row_in+'">'
            +'<div class="itemlistheightmid"><label id="total_list'+row_in+'">0.000</label></div>'
            +'<div class="itemlistheightout"><input readonly type="number" name="total_discount[]" id="total_discount'+row_in+'" value="'+val.discount_amount+'"></div>'
            
            +'<div class="itemlistheightout"><span id="total_afterdiscount'+row_in+'">0.000</span></div>'
            +'<div class="itemlistheightout"><span id="total_aftertax'+row_in+'"></span></div>'
            +'</td>'
            // net price
            +'<td>'
            +'<label class="cls_nettotal'+qid+'" id="netprice'+row_in+'"></label>'
            +'</td>'

            +'</tr>';
             
            $('#qt_item_tbody_'+qid).append(itemhtml);
        fun_cal_discount(row_in);
                
        });

select2itemUnit($('#qt_item_details_'+qid+' tbody tr').find('.sel-qty-unit'));
select2itemCurrency($('#qt_item_details_'+qid+' tbody tr').find('.sym-currency'));


$("#discount_type_grand"+qid).val(data.updated_quotes[0].quotes_discount_type);
$("#discount_val_grand_direct"+qid).val(data.updated_quotes[0].quotes_discount_amount);
$("#discount_val_grand_percent"+qid).val(data.updated_quotes[0].quotes_discount_percent);

$("#net_totalafterdisgrand"+qid).html("");

$('#open_discountgrand'+qid).attr("href",''+ci_baseurl+'Projects/popupdiscountgrand/'+$("#discount_type_grand"+qid).val()+'/'+Number($("#net_total"+qid).html())+'/'+Number($("#discount_val_grand_percent"+qid).val())+'/'+Number($("#discount_val_grand_direct"+qid).val()));

$("#load_tax_vat_sh"+qid).val(data.updated_quotes[0].sh_vat);
$("#load_tax_sales_sh"+qid).val(data.updated_quotes[0].sh_sales);
$("#load_tax_service_sh"+qid).val(data.updated_quotes[0].sh_service);
$("#in_shiphandlecharge"+qid).attr('value',data.updated_quotes[0].s_h_amount);

$('#open_tax_shiphand'+qid).attr("href",''+ci_baseurl+'Projects/popuptaxshiphand/'+Number($("#load_tax_vat_sh"+qid).val())+'/'+Number($("#load_tax_sales_sh"+qid).val())+'/'+Number($("#load_tax_service_sh"+qid).val())+'/'+Number($("#in_shiphandlecharge"+qid).val())+'');

var sh_charge=Number($("#in_shiphandlecharge"+qid).val());
var sh_tax1=(sh_charge*Number($("#load_tax_vat_sh"+qid).val()))/100;
var sh_tax2=(sh_charge*Number($("#load_tax_sales_sh"+qid).val()))/100;
var sh_tax3=(sh_charge*Number($("#load_tax_service_sh"+qid).val()))/100;

var total_sh_tax=sh_tax1+sh_tax2+sh_tax3;
if(total_sh_tax==0) $("#taxtotal_shiphandle"+qid).html('');
else $("#taxtotal_shiphandle"+qid).html((total_sh_tax).toFixed(2));

$("#sel_adjustmentType"+qid).val(data.updated_quotes[0].adjustment_type);
$("#in_adjustment"+qid).attr('value',data.updated_quotes[0].adjustment);

fun_cal_nettotal(qid);
fun_cal_sh_tax(qid);
fun_cal_grandtotal(qid);
}
else{

    row_in++;
    var rht= '<tr data-quoteid="'+qid+'" id="row'+row_in+'">'
    //+'<td><input class="chk-qt-item" type="checkbox"></td>'

    +'<td>'
    +'<span id="delete_item'+row_in+'" class="fa fa-trash"></span>'
    +'</td>'

    +'<td class="td-align-top">'
    +   '<div class="input-group">'
    +       '<input required type="text" name="sel_servicename_item[]" id="sel_servicename_item'+row_in+'" class="input-sm">'
    +       '<input required type="hidden" readonly="" name="sel_serviceid_item[]" id="sel_serviceid_item'+row_in+'" class="form-control input-sm">'
    +       '<a style="display:none" href="'+ci_baseurl+'yzy-accounts/index/popupservice/'+row_in+'" data-title="Service'+row_in+'" data-toggle="lightbox" data-gallery="remoteload"><i class="fa fa-3x fa-plus-square"></i></a>'
    +   '</div>'
    +'</td>'

    +'<td class="td-align-top">'
    +   '<input required type="number" min="0" id="qty'+row_in+'" name="qty[]" class="input-sm cal_total inp-qty-unit">'
   // +'<input value="1" type="hidden" id="item_unit_value'+row_in+'"  name="item_unit_value[]">'
    +'<select data-status="new" data-view="yes" onfocus="focusQuoteUnit(this)" onblur="this.size=1;" onchange="this.size=1; this.blur();" name="sel_qty_unit[]" id="qty_unit'+row_in+'" class="sel-qty-unit">';
    $(js_unitList).each(function(i,unitname){

        rht+='<option value="'+unitname+'">'+unitname+'</option>';
    });
    rht+='</select>'
    +'</td>'

    +'<td class="td-align-top">'
    +'<div class="itemlistheightin">'
   +'<select data-view="yes" data-currency="'+currency_symbol+'" data-curtype="'+currency_type+'" id="sel_currency'+row_in+'" class="sym-currency" name="sel_currency[]" value="'+currency_symbol+'">'
        +loadCurrencyOptions()
        +'</select>'

    +'<input required type="text" onblur="fun_formatCurrency(event)"  id="listPrice'+row_in+'" name="listPrice[]"  class="input-sm cal_total inp-currency">'
    +'<input value="1" data-loaded="'+currency_type+'" type="hidden" id="item_cur_value'+row_in+'"  name="item_cur_value[]"></div>'
    +'<div class="itemlistheightout"><a id="open_discount'+row_in+'" class="" data-title="Discount" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(-) Discount</i></a></div>'
    +'<input type="hidden" id="discount_type'+row_in+'" name="discount_type[]" value="zero" >'
    +'<input type="hidden" id="discount_val_percent'+row_in+'" name="discount_val_percent[]" value="0" >'
    +'<input type="hidden" id="discount_val_direct'+row_in+'" name="discount_val_direct[]" value="0" >'
    +   '<div class="itemlistheightout"><span>Total After Discount :</span></div>'
    
    +'<div class="itemlistheightout"><a id="open_tax'+row_in+'" data-title="Tax" data-toggle="lightbox" data-parent="" data-gallery="remoteload">(+) Tax</i></a></div>'
    +'<input type="hidden" id="load_tax_vat'+row_in+'" name="load_tax_vat[]" value="4.5" >'
    +'<input type="hidden" id="load_tax_sales'+row_in+'" name="load_tax_sales[]" value="10" >'
    +'<input type="hidden" id="load_tax_service'+row_in+'" name="load_tax_service[]" value="12.5" >'

    +'</td>'

    +'<td class="td-align-top srvtotal" id="serviceTotal'+row_in+'">'
    +'<div class="itemlistheightmid"><label id="total_list'+row_in+'">0.000</label></div>'
    +'<div class="itemlistheightout"><input readonly type="number" name="total_discount[]" id="total_discount'+row_in+'" ></div>'

    +'<div class="itemlistheightout"><span id="total_afterdiscount'+row_in+'">0.000</span></div>'
    +'<div class="itemlistheightout"><span id="total_aftertax'+row_in+'"></span></div>'
    +'</td>'
    +'<td>'
    +'<label class="cls_nettotal'+qid+'" id="netprice'+row_in+'"></label>'
    +'</td>'

    +'</tr>';

    $('#qt_item_tbody_'+qid).append(rht);


    select2itemUnit($('#qt_item_tbody_'+qid).find('.sel-qty-unit'));
    select2itemCurrency($('#qt_item_tbody_'+qid).find('.sym-currency'));
    $('#qt_item_tbody_'+qid).find('#net_total').html('0.000');
}

}else{
    //console.log('loaded item remove');
    //console.log($('.loaded_items_'+qid));
    $('.loaded_items_'+qid).remove();
}

$(togicon).toggleClass('fa-caret-right fa-caret-down');


}

</script>

<script type="text/javascript">
    // script by sujon for pdf
    function show_pdf_itemlist(status,eid,type,settings){
        
        //if($('#form_itemlist')[0].checkValidity()){
        var cssdata='<style>'
        +'table{border-collapse: collapse;}'
        +'.addBorder {border: 1px solid black;}'
        +'.dobuleBorder {border: 2px solid black;}'
        +'th {color:white;background-color:#3c8dbc;white-space: nowrap;}'
        +'.marginBottom{margin-bottom:10px;}'
        +'.alignRight{text-align: right}'
        +'.noBorder{border:none !important}'
        +'</style>';

        var headerdata='';

        if(status !='generate'){
        headerdata='<div class="marginBottom"><table style="width:100%">'
        +'<tr class="addBorder">'
        + '<td style="width:50%">'
        +  '<img height="50" width="200" src="<?php echo base_url(); ?>require/img/logo.jpg" />'
        +'</td>'
        +'<td style="width:50%">'
        + '<p>'
        +  'House 3D, Road 2A, Block J, Baridhara'
        +'</p>'
        +'<p>'
        + 'Dhaka 1212, Bangladesh'
        +'</p>'
        +'<p>'
        + 'Phone: +88(02) 8815222-3'
        +'</p>'
        +'</td>'
        +'</tr>'
        +'</table></div>';
        }

        var taskdata='';
        if(settings==1){
            taskdata='<div class="marginBottom"><table style="width:100%">'
            +'<tr >'
            + '<th class="addBorder" style="width:20px">'
            +  '<b>Task Name:</b>'
            + '</th>'
            +'<td class="addBorder">'
            + $('#togPopH').val()
            +'</td>'
            +'</tr>'
            +'</table></div>';
        }else{
            taskdata='<div class="marginBottom"><table style="width:100%">'
            +'<tr >'
            + '<th class="addBorder" style="width:20px">'
            +  '<b>Project Name:</b>'
            + '</th>'
            +'<td class="addBorder">'
            + $('#togPopTitle').val()
            +'</td>'
            +'</tr>'
            +'</table></div>';

        }

        var tabledata='';
        if(type=='quotation'){

            if($('#quote_details > tbody .loaded_items_'+eid).length==0){
          $('[class="cls-open-items"][data-quoteid="'+eid+'"]').click();
            }

        tabledata='<div class="marginBottom"><table style="width:100%">'
        +'<thead>'
        +'<tr>'
        +' <th class="addBorder">Item Name</th>'
        +' <th class="addBorder">Quantity</th>' 
        +' <th class="addBorder">List Price</th>'
        //+' <th>Total</th>'
        +' <th class="addBorder">Discount</th>'
        +' <th class="addBorder">Total</th>'
        +' <th class="addBorder">Tax</th>'
        +' <th class="addBorder">Net Price</th>'
        +'</tr>'
        +'</thead>'
        +'<tbody>';
        $('#qt_item_details_'+eid+' tbody tr').each(function(i,data){
            tabledata+='<tr class="">';
            tabledata+='<td class="addBorder">'+$(this).find('[id^="sel_servicename_item"]').val()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="qty"]').val()+' '+$(this).find('[id^="qty_unit"]').val()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="listPrice"]').val()+'</td>';
            //tabledata+='<td class="alignRight">'+$(this).find('[id^="total_list"]').html()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="total_discount"]').val()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="total_afterdiscount"]').html()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="total_aftertax"]').html()+'</td>';
            tabledata+='<td class="addBorder alignRight">'+$(this).find('[id^="netprice"]').html()+'</td>';
            tabledata+='</tr>';
        });
        tabledata+='</tbody>';
        tabledata+='<tfoot>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">Net Total :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight">'+$('#net_total'+eid).html()+'</td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(-) Discount :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight">'+$('#net_totalafterdisgrand'+eid).html()+'</td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(+) Shipping & Handling Charges :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight">'+$('#in_shiphandlecharge'+eid).val()+'</td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(+) Taxes For Shipping and Handling :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight">'+$('#taxtotal_shiphandle'+eid).html()+'</td>';
        tabledata+='</tr>';
        var adjust_symbol='';
        if($('#sel_adjustmentType'+eid).val()=="add") adjust_symbol='(+)';
        else adjust_symbol='(-)';
        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">'+adjust_symbol+' Adjustment :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight">'+$('#in_adjustment'+eid).val()+'</td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="dobuleBorder alignRight">Grand Total : </th>';
        tabledata+='<td colspan="1" class="dobuleBorder alignRight">'+$('#grand_total_full'+eid).html()+'</td>';
        tabledata+='</tr>';

        tabledata+='</tfoot>';

        tabledata+='</table></div>';
        
        }
        if(type=='invoice'){
            var invoice_grand_total=0;
            var arrQts;
            if(settings==1){
                arrQts=$('#invoice_details [data-level="1"][data-invoiceid="'+eid+'"]').attr('data-quoteid').split(',');
            }else{
                 arrQts=$('#invoice_details_pro [data-level="1"][data-invoiceid="'+eid+'"]').attr('data-quoteid').split(',');
            }

        $(arrQts).each(function(i,qid){
           
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/invoiceQuotesDetail/'+eid+'/'+qid,
                dataType: "JSON",
                type: "POST",
                async:false,
                success : function(data) {
                    //console.log("data loadquotes from invoice");
                    //console.log(data);
                    if(data.invoice_quotes.length>0){
                        var qid=data.invoice_quotes[0].quoteid;
                        var typeid=data.invoice_quotes[0].type_id;
                        
                        var invoice_quotes_data=data.invoice_quotes[0];


                        tabledata+='<div class="marginBottom"><table class="addBorder tbl_inv_qt_items" style="width:100%">'
                        +'<caption data-qt-currency="'+data.invoice_quotes[0].currency_name+'" class="addBorder" style="background-color:green;color:white"><b>Quote Name:'+data.invoice_quotes[0].subject+'</b></caption>'
                        +'<thead>'
                        +'<tr>'
                        +' <th class="addBorder">Item Name</th>'
                        +' <th class="addBorder">Quantity</th>' 
                        //+' <th>Unit</th>'
                        +' <th class="addBorder">List Price</th>'
                        
                        +' <th class="addBorder">Discount</th>'
                        +' <th class="addBorder">Total</th>'
                        +' <th class="addBorder">Tax</th>'
                        +' <th class="addBorder">Net Price</th>'
                        +'</tr>'
                        +'</thead>'
                        +'<tbody>';

                        $.ajax({
                           url: '<?php echo site_url(); ?>Projects/invoiceQuotesItemDetail/'+qid+'/'+typeid,
                            dataType: "JSON",
                            type: "POST",
                            async:false,
                            success : function(data) {

                            currency_symbol=data.updated_quotes[0].currency_name;
                             currency_type=data.currencyList[0].type_value;
                            headerdata='<div class="marginBottom"><table style="width:100%">'
                    +'<tr class="addBorder">'

                    + '<td style="width:50%">'
                    +  '<img id="show_logo_img" height="50" width="200" src="<?php echo base_url(); ?>require/img/logo.jpg" />'
                    +'<input onChange="readURL(this);" id="input_image" type="file" accept="image/*" name="input_image" >'
                    + '</td>'

                    +'<td style="width:50%">'
                    +'<textarea style="width:100%;height: 100px; overflow: auto;" id="txt_address">'
                    +  'House 3D, Road 2A, Block J, Baridhara'
                    + 'Dhaka 1212, Bangladesh'
                    + 'Phone: +88(02) 8815222-3'
                    +'</textarea>'
                    +'</td>'
                    +'</tr>'
                    +'<tr id="inv_qt_tr_sel_cur">'

                    +'<td>'
                    +'<label for="sel_currency_inv">Currency:</label>'

                    +'<select data-view="yes" data-currency="'+currency_symbol+'" data-curtype="'+currency_type+'" id="sel_currency_inv" name="sel_currency[]" value="BDT">'
                   +loadCurrencyOptions()
                    +'</select>'
                    +'</td>'
                    +'<td><input value="Change" type="button" id="btn_cvtInvCur"></td>'
                    +'</tr>'
                    +'</table></div>';


                               $.each(data.updated_items, function(key,val) {  

                if(val.discount_type=="percent") discount_value=val.discount_percent;
                if(val.discount_type=="direct") discount_value=val.discount_amount;
                var row_in=val.lineitem_id;
                if(val.item_name==null) val.item_name='';
                if(val.item_unit==null) val.item_unit='';
                
                tabledata+= '<tr class="addBorder">'
               
                
                +'<td class="td-align-top addBorder">'+val.item_name+'</td>'
                
                +'<td class="td-align-top addBorder"><span>'+val.quantity+'</span><span> '+val.item_unit+'</span></td>'
               
               
                // list price
                +'<td class="td-align-top addBorder"><span class="cls_cursym"  id="cursym_'+row_in+'">'+currency_symbol+'</span><span class="cls_listprice" id="listprice_'+row_in+'">'+val.listprice+'</span></td>'
                +'<td class="td-align-top addBorder alignRight"><span class="cls_total_discount">'+val.total_discount+'</span></td>'
               +'<td class="td-align-top addBorder alignRight"><span class="cls_total_afterdiscount">'+val.total_afterdiscount+'</span></td>'
               +'<td class="td-align-top addBorder alignRight"><span class="cls_total_tax">'+val.total_tax+'</span></td>'
               +'<td class="td-align-top addBorder alignRight"><span class="cls_netprice">'+val.netprice+'</span></td>'
                
                

                +'</tr>';

                
            });
                             
            tabledata+='</tbody>';
        tabledata+='<tfoot>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">Net Total :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight"><span class="cls_net_total">'+invoice_quotes_data.net_total+'</span></td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(-) Discount :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight"><span class="cls_net_totalafterdisgrand">'+invoice_quotes_data.net_totalafterdisgrand+'</span></td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(+) Shipping & Handling Charges :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight"><span class="cls_s_h_amount">'+invoice_quotes_data.s_h_amount+'</span></td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">(+) Taxes For Shipping and Handling :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight"><span class="cls_taxtotal_shiphandle">'+invoice_quotes_data.taxtotal_shiphandle+'</span></td>';
        tabledata+='</tr>';
        var adjust_symbol='';
        if(invoice_quotes_data.adjustment_type=="add") adjust_symbol='(+)';
        else adjust_symbol='(-)';
        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="addBorder alignRight">'+adjust_symbol+' Adjustment :</th>';
        tabledata+='<td colspan="1" class="addBorder alignRight"><span class="cls_adjustment">'+invoice_quotes_data.adjustment+'</span></td>';
        tabledata+='</tr>';

        tabledata+='<tr class="">';
        tabledata+='<td colspan="4" class="noBorder"></td>';
        tabledata+='<th colspan="2" class="dobuleBorder alignRight">Sub Grand Total : </th>';
        tabledata+='<td colspan="1" class="dobuleBorder alignRight"><span class="cls_grand_total">'+invoice_quotes_data.grand_total+'</span></td>';
        tabledata+='</tr>';

        tabledata+='</tfoot>';

        tabledata+='</table></div>';
        invoice_grand_total+=Number(invoice_quotes_data.grand_total);


                            },
                                error: function (jqXHR, textStatus, errorThrown) {
                                // Some code to debbug e.g.:   
                                //console.log("fun_updateSerial");            
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                            }
                        }); 
 

                    } 
                   

                }

            });

        });
//tabledata+='<table><tr><td colspan="4" class="noBorder alignRight">Grand Total</td><td colspan="1" class="dobuleBorder alignRight">'+Number(invoice_grand_total).toFixed(2)+'</td></tr></table>';
tabledata+='<h3 style="background-color:orange;" class="dobuleBorder alignRight">Grand Total: <span id="full_grand_currency">'+currency_symbol+'</span> <span id="full_grand_total">'+Number(invoice_grand_total).toFixed(2)+'</span></h3>';
        }

        //var tabledata = $('<table>').append($('#item_details').clone()).html();

        var htmldata=cssdata+headerdata+taskdata+tabledata;

        // console.log("tabledata");console.log(htmldata);
        //alert('before save');
       $.ajax({
            url: '<?php echo site_url("Projects/savetempdata_item"); ?>',
            type: "POST",
            dataType: 'json',
            async:false,
            data: { 
                htmldata:btoa(htmldata),
                taskid:taskdataid,
                eid:eid,
                estatus:status,
                etype:type
                 },
            success:function (data){
                
                if(type=='quotation' && status=='pdf'){
                window.open('<?php echo base_url("export/pdf_request_itemlist.php?inserid="); ?>'+taskdataid);
                }
                else if(type=='quotation' && status=='print'){
                    window.open('<?php echo base_url("export/pdf_print_itemlist.php?inserid="); ?>'+taskdataid);
                }
                else if(type=='quotation' && status=='mail'){
                    window.open('mailto:?subject=quotation&body=See Attachment: <?php echo base_url("export/pdf_request_itemlist.php?inserid="); ?>'+taskdataid+'-'+eid);
                }
                else if(type=='invoice' && status=='pdf'){
                    
                    window.open('<?php echo base_url("export/pdf_invoice_itemlist.php?inserid="); ?>'+'inv-'+eid+'&status=pdf');
                }
                else if(type=='invoice' && status=='print'){

                    window.open('<?php echo base_url("export/pdf_invoice_itemlist.php?inserid="); ?>'+'inv-'+eid+'&status=print');
                }
                else if(type=='invoice' && status=='mail'){
                    window.open('mailto:?subject=invoice&body=See Attachment: <?php echo base_url("export/pdf_invoice_itemlist.php?inserid="); ?>'+'inv-'+eid+'&status=pdf');
                }
                else if(type=='invoice' && status=='generate'){

                    
                    var wnd = window.open("about:blank", "", "mywindow","menubar=1,resizable=1,width=300,height=300");
                    wnd.document.write('<scr'+'ipt type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js" ></scr'+'ipt>');

                    wnd.document.write(
           "<script type='text/javascript'>" +
           
          
            "function readURL(input){"+
                "var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1);"+
                "var formData = new FormData();"+
                "formData.append('input_image', input.files[0]);"+
                "formData.append('in_eid', $('#in_eid').val());"+
                 "$.ajax({"+
                    "url: $('#form_gen_inv_pdf').attr('action'),"+
                    "type: $('#form_gen_inv_pdf').attr('method'),"+
                    "data: formData,"+
                    "async: false,"+
                    "contentType: false,"+
                    "processData: false,"+
                    "success: function (updated_id) {"+
                        "var jq_baseurl=($('#in_baseurl').val());"+
                        "var jq_path='uploads/contactImages/inv-logo-';"+
                        "var jq_eid=($('#in_eid').val());"+
                        "var jq_status='&status=pdf';"+
                        "var full_url=jq_baseurl.concat(jq_path);"+
                       
                       "var full_url= full_url.concat(jq_eid);"+
                       "var d = new Date();"+
                       "var full_url= full_url.concat('.'+ext+'?'+d.getTime());"+
                       
                        "$('#show_logo_img').attr('src', full_url);"+
                    "}"+
                    
                "});"+

        "}"+

        "function PopUpWindowMovie() {" +
        "$('#form_gen_inv_pdf').submit();"+
            "var jq_baseurl=($('#in_baseurl').val());"+
            "var jq_path='export/pdf_invoice_itemlist.php?inserid=inv-';"+
            "var jq_eid=($('#in_eid').val());"+
            "var jq_status='&status=pdf';"+
            "var full_url=jq_baseurl.concat(jq_path);"+
           
           "var full_url= full_url.concat(jq_eid);"+
           "var full_url= full_url.concat('&status=pdf');"+
           //"var cssdata='<style>#input_image{display:none;}</style>';"+
      
        "$('#form_gen_inv_pdf').find('#input_image').remove();"+
        "$('#form_gen_inv_pdf').find('#btn_show_gen_pdf').remove();"+
        
          "$('#form_gen_inv_pdf').find('#inv_qt_tr_sel_cur').remove();"+
        "document.getElementById('txt_address').defaultValue=$('#txt_address').val();"+


             "$.ajax({"+
            "url: $('#in_baseurl').val()+'Projects/savetempdata_item',"+
            "type: 'POST',"+
            "dataType: 'json',"+
            "async:false,"+
             "beforeSend: function () {"+
                
            "},"+
                   " data: {"+ 
                "htmldata:btoa($('#form_gen_inv_pdf').html()),"+
                "taskid:$('#in_taskid').val(),"+
                "eid:$('#in_eid').val(),"+
                "estatus:$('#in_estatus').val(),"+
                "etype:$('#in_etype').val()"+
                 "},"+
            "success: function (data) {"+
                 
                 "window.open(full_url);"+
               
                
            "}"+
            
        "});}" + 
        
    "<\/script>");

    
                    action="<?php echo base_url(); ?>Projects/updateTask"
                    wnd.document.write('<form method="post" enctype="multipart/form-data" action="'+ci_base_url+'Projects/uploadInvoiceLogo" id="form_gen_inv_pdf"><input id="in_eid" name="in_eid" type="hidden" value="'+eid+'"><input id="in_baseurl"  type="hidden" value="'+ci_base_url+'"><input id="in_taskid"  type="hidden" value="'+taskdataid+'"><input id="in_estatus"  type="hidden" value="'+status+'"><input id="in_etype"  type="hidden" value="'+type+'">'+htmldata+'<input id="btn_show_gen_pdf"  onclick="PopUpWindowMovie()" type="button" value="Show PDF"></form>');
                    wnd.document.write(
   "<script type='text/javascript'>" +
   
        
    "$( '#btn_cvtInvCur' ).click(function() {"+

  "var currentCurrency=$('#sel_currency_inv').val();"+
   

  "$('.tbl_inv_qt_items').each(function(i,each_table) {"+

  "var formCurrency=$(each_table).find('caption').attr('data-qt-currency');"+

  "$.ajax({"+
    "url: '<?php echo site_url(); ?>Projects/convertQuoteCurrency',"+
    "type: 'POST',"+
      "async: false,"+
      "data: {"+
        "currency_from: formCurrency ,"+
        "currency_to: currentCurrency"+
      "},"+
      "dataType: 'JSON',"+

      "success: function (data, textStatus) {"+
        
       "console.log(data);"+
       "$(each_table).find('tbody tr').each(function(i,val) {"+

       "$(val).find('.cls_cursym').html(currentCurrency);"+

        "$(val).find('.cls_listprice').html( Number(Number($(val).find('.cls_listprice').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_total_discount').html( Number(Number($(val).find('.cls_total_discount').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_total_afterdiscount').html( Number(Number($(val).find('.cls_total_afterdiscount').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_total_tax').html( Number(Number($(val).find('.cls_total_tax').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_netprice').html( Number(Number($(val).find('.cls_netprice').html())*Number(data.NewCurrencyValue)).toFixed(2));"+
      "});"+

     

      "$(each_table).find('tfoot').each(function(i,val) {"+

       
        "$(val).find('.cls_net_total').html( Number(Number($(val).find('.cls_net_total').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_net_totalafterdisgrand').html( Number(Number($(val).find('.cls_net_totalafterdisgrand').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_s_h_amount').html( Number(Number($(val).find('.cls_s_h_amount').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_taxtotal_shiphandle').html( Number(Number($(val).find('.cls_taxtotal_shiphandle').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      "$(val).find('.cls_adjustment').html( Number(Number($(val).find('.cls_adjustment').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      // Number($(val).find('.cls_net_total').html())-Number($(val).find('.cls_net_totalafterdisgrand').html())+Number($(val).find('.cls_s_h_amount').html())+Number($(val).find('.cls_taxtotal_shiphandle').html())+Number($(val).find('.cls_adjustment').html())

      "$(val).find('.cls_grand_total').html( Number(Number($(val).find('.cls_grand_total').html())*Number(data.NewCurrencyValue)).toFixed(2));"+

      
      "});"+


      "$(each_table).find('caption').attr('data-qt-currency',currentCurrency);"+

      
     "},"+
     
   "});"+

  

"});"+
"$('#full_grand_currency').html(currentCurrency);"+
"var js_grandtotal=0;"+
"$('.cls_grand_total').each(function(i,val){"+

    "js_grandtotal+=Number($(val).html());"+
"});"+
"$('#full_grand_total').html(js_grandtotal.toFixed(2));"+
"});"+
  "$( '#btn_cvtInvCur' ).click();"+
    "<\/script>");
                    
                    

                 }
                else{

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log("514");
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
        // }else{
        //     alert('Please fill all the values first');
        // }
      }
</script>

	<script type="text/javascript">
    // script by sujon
    var ci_base_url='<?php echo base_url(); ?>';
    var newrownum = 0;
    var flag_task_complete=false;
    var arrprogress=[];
    //var pro_id = '<?php //echo $allProjectList[0]->projectid; ?>';
    var js_unitList=[];
    var js_gen_rev=false;
    var flag_expand_subtask=false;

    function fun_task_filter(e){
        //console.log('fun_task_filter');
        if($(e.target).val()=='COMPLETED'){
            $('#tbl_TaskCompleted').show();
            $('#btn_tog_comptable').hide();
            
            $('#tbl_TaskEntry').hide();
        }
        if($(e.target).val()=='INCOMPLETED'){
            $('#tbl_TaskCompleted').hide();
            $('#btn_tog_comptable').hide();
            $('#tbl_TaskEntry').show();
        }
        if($(e.target).val()=='ALL'){
            $('#tbl_TaskCompleted').show();
            $('#btn_tog_comptable').show();
            $('#tbl_TaskEntry').show();
        }
    }
    
    function select2itemUnit(element){

        $(element).each(function(i,el){
            if($(el).is('[value]')){
               $(el).val($(el).attr('value'));
           }
        });

     $(element).select2({ 
        width: '50%',
        tags: true,
        multiple: false,
        //selectOnBlur: true
        }).on("change", function(e) {
              var sid=$(this).attr('id').match(/\d+/)[0];
           var qid=$(this).closest('tr').attr('data-quoteid');
           var oldval=$(this).attr('value');

            if($(this).attr('data-view')=='yes'){
            
            var isNew = $(this).find('[data-select2-tag="true"]');

            if(isNew.length){
                //console.log('isNew ***issue****');
                alert(isNew);
                isNew.replaceWith('<option selected value="'+isNew.val()+'">'+isNew.val()+'</option>');
                
                $.ajax({
                  url: '<?php echo site_url(); ?>Projects/addQuoteUnitDyn',
                  type: 'POST',
                  data: {
                    unitname: isNew.val(),
                    qid: 0,
                    status:1
                },
                dataType: "JSON",
                success : function(data) {


                },

            });
        }else{

           //console.log('show qtip to loaded items only');
           if($(this).attr('data-status')=="load"){
            var ref=this;

            bootbox.dialog({
                size: "small",
                message: "Do you want to do conversion or change?",
                title: "Confirmation",

                buttons: {
                    yes: {
                        label: "Convert",
                        className: "btn-primary",
                        callback: function () {
                            
                           
                            var newval=$(ref).val();

                            //$('.qtip-units').qtip('hide');
                            $(ref).qtip({
                           
                             show: {
                                 ready : true,
                                 modal: {
                                    on: true,
                                    blur: false,
                                    escape: false
                                }

                             },
                              hide: {
                                event: false,
                                //target: $(el).find('#btn_newcurval'+sid),
                                //fixed: true,
                                
                            },
                             content: {
                               text: '<div style="padding: 5px;"><span style="">1 '+oldval+' = </span><input id="in_newunitval'+sid+'" type="number" style=""><span style="">'+newval+'</span> <input id="btn_newunitval'+sid+'" onclick="cancelUnitManual(this,'+sid+',\''+oldval+'\')" type="button" value="Cancel" style="margin-bottom: 1%;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><input id="btn_newunitval'+sid+'" onclick="changeUnitManual(this,'+sid+','+qid+')" type="button" value="OK" style="margin-bottom: 1%;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"></div>',
                              
                                
                            },
                       
                            position: {
                                my: 'bottom center',  
                                at: 'top center', 
                                target: $(ref).next()
                            },
                            style: {
                                classes: 'qtip-light qtip-rounded qtip-units',
                            },
                            
                           
                             events: {
                                 render: function(event, api) {

                                    
                                    setTimeout(function () {
                                       $('#in_newunitval'+sid).focus();
                                    }, 0);
                                 },
                                 hide: function(event, api) {
                                     $(this).qtip('destroy');
                                 }
                             }
                             });

                        }
                    },
                    no: {
                        label: "Change",
                        className: "btn-success",
                        callback: function () {
                             $(ref).attr('value',$(ref).val());
                        }
                    },
                     cancel: {
                        label: "Cancel",
                        className: "btn-danger",
                        callback: function () {
                           $('#qty_unit'+sid).attr('data-view','no'); 
                           $('#qty_unit'+sid).select2("val", oldval);

                        }
                    }

                }
            });
       $(".modal-dialog").draggable();


            
        }
        }
    }else{ $('#qty_unit'+sid).attr('data-view','yes'); }

    });
    }
    function changeCurrencyManual(element,sid,qid,newval){
        if(parseFloat($('#in_newcurval'+sid).val())>0){
            $('#sel_currency'+sid).attr('value',newval);
            $('#item_cur_value'+sid).val($('#in_newcurval'+sid).val());

            if(sid==undefined) sid='';
            fun_cal_discount(sid);

            fun_cal_nettotal(qid);
            fun_cal_grandtotal(qid);
            $(element).closest('.qtip').qtip('hide');
            $('#sel_currency'+sid).next().find('.select2-selection__rendered').html($('#sel_currency'+sid).attr('value'));
        }else{alert('Please enter a vaild value');}
    }
    function cancelCurrencyManual(element,sid,oldval){

         $('#sel_currency'+sid).attr('data-view','no'); 
         $('#sel_currency'+sid).select2("val", oldval);
         $(element).closest('.qtip').qtip('hide');
        
         $('#sel_currency'+sid).next().find('.select2-selection__rendered').html($('#sel_currency'+sid).attr('value'));

    }

    function changeUnitManual(element,sid,qid){
        var newqty=parseFloat($('#in_newunitval'+sid).val());
        if(newqty>0){
            $('#qty_unit'+sid).attr('value',$('#qty_unit'+sid).val());
            $('#qty'+sid).val($('#qty'+sid).val()*newqty);
            $('#qty'+sid).attr('value',$('#qty'+sid).val());
            
            if(sid==undefined) sid='';
            fun_cal_discount(sid);

            fun_cal_nettotal(qid);
            fun_cal_grandtotal(qid);
            $(element).closest('.qtip').qtip('hide');
            $('#qty_unit'+sid).next().find('.select2-selection__rendered').html($('#qty_unit'+sid).attr('value'));
        }else{alert('Please enter a vaild value');}
    }

    function cancelUnitManual(element,sid,oldval){

         $('#qty_unit'+sid).attr('data-view','no'); 
         $('#qty_unit'+sid).select2("val", oldval);
         $(element).closest('.qtip').qtip('hide');
         $('#qty_unit'+sid).next().find('.select2-selection__rendered').html($('#qty_unit'+sid).attr('value'));
    }

    function select2itemCurrency(element){
        //alert('loaded currentTarget');

        $(element).each(function(i,el){
            if($(el).is('[value]')){
               $(el).val($(el).attr('value'));
           }

           $(el).find('option').each(function(i,e){
            $(e).attr('data-name',$(e).html());
           
            });

           $(el).select2({ 
            dropdownAutoWidth : 'true',
            width: '50%',
            multiple: false,
           //dropdownCssClass : 'bigdrop'

        }).on("change", function(event) {

            var oldval=$(this).attr('value');
            var newval=$(this).val();
            var baseval=$(this).attr('data-currency');

           var sid=$(this).attr('id').match(/\d+/)[0];
           var qid=$(this).closest('tr').attr('data-quoteid');

           if($(this).attr('data-view')=='yes'){

            if($(this).attr('data-curtype')=='manual'){
                if($(this).attr('data-currency') != $(this).val()){

                //$('.qtip-currency').qtip('hide');
                $(this).qtip({
           
             show: {
                 ready : true,
                 modal: {
                    on: true,
                    blur: false,
                    escape: false
                }

             },
              hide: {
               event: false,
                //target: $(el).find('#btn_newcurval'+sid),
                //fixed: true,
                
            },
             content: {
               text: '<div style="padding: 5px;"><span style="">1 '+newval+' = </span><input id="in_newcurval'+sid+'" type="number" style=""><span style="">'+baseval+'</span> <input id="btn_newunitval'+sid+'" onclick="cancelCurrencyManual(this,'+sid+',\''+oldval+'\')" type="button" value="Cancel" style="margin-bottom: 1%;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"><input id="btn_newcurval'+sid+'" onclick="changeCurrencyManual(this,'+sid+','+qid+',\''+newval+'\')" type="button" value="OK" style="margin-bottom: 1%;" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar"></div>',
                
            },
       
            position: {
                 my: 'bottom center',  
                 at: 'top center',  
                target: $(this).next()
            },
            style: {
                classes: 'qtip-light qtip-rounded qtip-currency',
            },
            
           
             events: {
                 render: function(event, api) {

                     setTimeout(function () {
                       $('#in_newcurval'+sid).val(convertCurrencyManual(newval,baseval)).focus();
                      
                    }, 0);
                    
                 },
                 hide: function(event, api) {
                     $(this).qtip('destroy');
                 }
             }
             });
            }

               
            }else{
                
                $('#item_cur_value'+sid).removeAttr('data-loaded-curval');

                $('#sel_currency'+sid).attr('value',newval);
                fun_cal_discount(sid);
               
                fun_cal_nettotal(qid);
                fun_cal_grandtotal(qid);
            }
        }else{ $('#sel_currency'+sid).attr('data-view','yes'); }


            
        }).on("select2:open", function(event) {

            //console.log('render');
            $(this).next().find('.select2-selection__rendered').html($(this).attr('value'));

        }).on("select2:select", function(event) {

            $(this).next().find('.select2-selection__rendered').html($(this).val());

        });

         $(el).next().find('.select2-selection__rendered').html($(el).attr('value'));
    });
       

    
    }

    // function loadCurrencyRates(){
    //     return gbl_opts;
    // }
    function loadCurrencyOptions(){
        
        var opts='<option value="AED">United Arab Emirates Dirham (AED)</option>'
        +'<option value="AFN">Afghan Afghani (AFN)</option>'
        +'<option value="ALL">Albanian Lek (ALL)</option>'
        +'<option value="AMD">Armenian Dram (AMD)</option>'
        +'<option value="ANG">Netherlands Antillean Guilder (ANG)</option>'
        +'<option value="AOA">Angolan Kwanza (AOA)</option>'
        +'<option value="ARS">Argentine Peso (ARS)</option>'
        +'<option value="AUD">Australian Dollar (A$)</option>'
        //+'<option value="AWG">Aruban Florin (AWG)</option>'
        +'<option value="AZN">Azerbaijani Manat (AZN)</option>'
        +'<option value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>'
        +'<option value="BBD">Barbadian Dollar (BBD)</option>'
        +'<option  selected="" value="BDT">Bangladeshi Taka (BDT)</option>'
        +'<option value="BGN">Bulgarian Lev (BGN)</option>'
        +'<option value="BHD">Bahraini Dinar (BHD)</option>'
        +'<option value="BIF">Burundian Franc (BIF)</option>'
        +'<option value="BMD">Bermudan Dollar (BMD)</option>'
        +'<option value="BND">Brunei Dollar (BND)</option>'
        +'<option value="BOB">Bolivian Boliviano (BOB)</option>'
        +'<option value="BRL">Brazilian Real (BRL)</option>'
        +'<option value="BSD">Bahamian Dollar (BSD)</option>'
        //+'<option value="BTC">Bitcoin (BTC)</option>'
        //+'<option value="BTN">Bhutanese Ngultrum (BTN)</option>'
        +'<option value="BWP">Botswanan Pula (BWP)</option>'
        //+'<option value="BYN">BYN (BYN)</option>'
        +'<option value="BYR">Belarusian Ruble (BYR)</option>'
        +'<option value="BZD">Belize Dollar (BZD)</option>'
        +'<option value="CAD">Canadian Dollar (CAD)</option>'
        +'<option value="CDF">Congolese Franc (CDF)</option>'
        +'<option value="CHF">Swiss Franc (CHF)</option>'
        //+'<option value="CLF">Chilean Unit of Account (UF) (CLF)</option>'
        +'<option value="CLP">Chilean Peso (CLP)</option>'
        //+'<option value="CNH">CNH (CNH)</option>'
        +'<option value="CNY">Chinese Yuan (CNY)</option>'
        +'<option value="COP">Colombian Peso (COP)</option>'
        +'<option value="CRC">Costa Rican Colon (CRC)</option>'
        +'<option value="CUP">Cuban Peso (CUP)</option>'
        +'<option value="CVE">Cape Verdean Escudo (CVE)</option>'
        +'<option value="CZK">Czech Republic Koruna (CZK)</option>'
        //+'<option value="DEM">German Mark (DEM)</option>'
        +'<option value="DJF">Djiboutian Franc (DJF)</option>'
        +'<option value="DKK">Danish Krone (DKK)</option>'
        +'<option value="DOP">Dominican Peso (DOP)</option>'
        +'<option value="DZD">Algerian Dinar (DZD)</option>'
        +'<option value="EGP">Egyptian Pound (EGP)</option>'
       // +'<option value="ERN">Eritrean Nakfa (ERN)</option>'
        +'<option value="ETB">Ethiopian Birr (ETB)</option>'
        +'<option value="EUR">Euro (EUR)</option>'
        //+'<option value="FIM">Finnish Markka (FIM)</option>'
        +'<option value="FJD">Fijian Dollar (FJD)</option>'
        +'<option value="FKP">Falkland Islands Pound (FKP)</option>'
       // +'<option value="FRF">French Franc (FRF)</option>'
        //+'<option value="GBP">British Pound (GBP)</option>'
        +'<option value="GEL">Georgian Lari (GEL)</option>'
        +'<option value="GHS">Ghanaian Cedi (GHS)</option>'
        +'<option value="GIP">Gibraltar Pound (GIP)</option>'
        +'<option value="GMD">Gambian Dalasi (GMD)</option>'
        +'<option value="GNF">Guinean Franc (GNF)</option>'
        +'<option value="GTQ">Guatemalan Quetzal (GTQ)</option>'
        +'<option value="GYD">Guyanaese Dollar (GYD)</option>'
        +'<option value="HKD">Hong Kong Dollar (HKD)</option>'
        +'<option value="HNL">Honduran Lempira (HNL)</option>'
        +'<option value="HRK">Croatian Kuna (HRK)</option>'
        +'<option value="HTG">Haitian Gourde (HTG)</option>'
        +'<option value="HUF">Hungarian Forint (HUF)</option>'
        +'<option value="IDR">Indonesian Rupiah (IDR)</option>'
       // +'<option value="IEP">Irish Pound (IEP)</option>'
        +'<option value="ILS">Israeli New Sheqel (ILS)</option>'
        +'<option value="INR">Indian Rupee (Rs.)</option>'
        +'<option value="IQD">Iraqi Dinar (IQD)</option>'
        +'<option value="IRR">Iranian Rial (IRR)</option>'
        +'<option value="ISK">Icelandic Krona (ISK)</option>'
        //+'<option value="ITL">Italian Lira (ITL)</option>'
        +'<option value="JMD">Jamaican Dollar (JMD)</option>'
        +'<option value="JOD">Jordanian Dinar (JOD)</option>'
        +'<option value="JPY">Japanese Yen (JPY)</option>'
        +'<option value="KES">Kenyan Shilling (KES)</option>'
        +'<option value="KGS">Kyrgystani Som (KGS)</option>'
        +'<option value="KHR">Cambodian Riel (KHR)</option>'
        +'<option value="KMF">Comorian Franc (KMF)</option>'
        +'<option value="KPW">North Korean Won (KPW)</option>'
        +'<option value="KRW">South Korean Won (KRW)</option>'
        +'<option value="KWD">Kuwaiti Dinar (KWD)</option>'
        +'<option value="KYD">Cayman Islands Dollar (KYD)</option>'
        +'<option value="KZT">Kazakhstani Tenge (KZT)</option>'
        +'<option value="LAK">Laotian Kip (LAK)</option>'
        +'<option value="LBP">Lebanese Pound (LBP)</option>'
        +'<option value="LKR">Sri Lankan Rupee (LKR)</option>'
        +'<option value="LRD">Liberian Dollar (LRD)</option>'
        +'<option value="LSL">Lesotho Loti (LSL)</option>'
        +'<option value="LTL">Lithuanian Litas (LTL)</option>'
        +'<option value="LVL">Latvian Lats (LVL)</option>'
        +'<option value="LYD">Libyan Dinar (LYD)</option>'
        +'<option value="MAD">Moroccan Dirham (MAD)</option>'
        +'<option value="MDL">Moldovan Leu (MDL)</option>'
        +'<option value="MGA">Malagasy Ariary (MGA)</option>'
        +'<option value="MKD">Macedonian Denar (MKD)</option>'
        +'<option value="MMK">Myanmar Kyat (MMK)</option>'
        +'<option value="MNT">Mongolian Tugrik (MNT)</option>'
        +'<option value="MOP">Macanese Pataca (MOP)</option>'
        +'<option value="MRO">Mauritanian Ouguiya (MRO)</option>'
        +'<option value="MUR">Mauritian Rupee (MUR)</option>'
        +'<option value="MVR">Maldivian Rufiyaa (MVR)</option>'
        +'<option value="MWK">Malawian Kwacha (MWK)</option>'
        +'<option value="MXN">Mexican Peso (MXN)</option>'
        +'<option value="MYR">Malaysian Ringgit (MYR)</option>'
        +'<option value="MZN">Mozambican Metical (MZN)</option>'
        +'<option value="NAD">Namibian Dollar (NAD)</option>'
        +'<option value="NGN">Nigerian Naira (NGN)</option>'
        +'<option value="NIO">Nicaraguan Cordoba (NIO)</option>'
        //+'<option value="NOK">Norwegian Krone (NOK)</option>'
        +'<option value="NPR">Nepalese Rupee (NPR)</option>'
        +'<option value="NZD">New Zealand Dollar (NZD)</option>'
        +'<option value="OMR">Omani Rial (OMR)</option>'
        +'<option value="PAB">Panamanian Balboa (PAB)</option>'
        +'<option value="PEN">Peruvian Nuevo Sol (PEN)</option>'
        +'<option value="PGK">Papua New Guinean Kina (PGK)</option>'
        +'<option value="PHP">Philippine Peso (Php)</option>'
        //+'<option value="PKG">PKG (PKG)</option>'
        +'<option value="PKR">Pakistani Rupee (PKR)</option>'
        +'<option value="PLN">Polish Zloty (PLN)</option>'
        +'<option value="PYG">Paraguayan Guarani (PYG)</option>'
        +'<option value="QAR">Qatari Rial (QAR)</option>'
        +'<option value="RON">Romanian Leu (RON)</option>'
        +'<option value="RSD">Serbian Dinar (RSD)</option>'
        +'<option value="RUB">Russian Ruble (RUB)</option>'
        +'<option value="RWF">Rwandan Franc (RWF)</option>'
        +'<option value="SAR">Saudi Riyal (SAR)</option>'
        +'<option value="SBD">Solomon Islands Dollar (SBD)</option>'
        +'<option value="SCR">Seychellois Rupee (SCR)</option>'
        +'<option value="SDG">Sudanese Pound (SDG)</option>'
        +'<option value="SEK">Swedish Krona (SEK)</option>'
        +'<option value="SGD">Singapore Dollar (SGD)</option>'
        //+'<option value="SHP">St. Helena Pound (SHP)</option>'
        //+'<option value="SKK">Slovak Koruna (SKK)</option>'
        +'<option value="SLL">Sierra Leonean Leone (SLL)</option>'
        +'<option value="SOS">Somali Shilling (SOS)</option>'
        +'<option value="SRD">Surinamese Dollar (SRD)</option>'
        +'<option value="STD">Sao Tome & Principe Dobra (STD)</option>'
        +'<option value="SVC">Salvadoran Colon (SVC)</option>'
        +'<option value="SYP">Syrian Pound (SYP)</option>'
        +'<option value="SZL">Swazi Lilangeni (SZL)</option>'
        +'<option value="THB">Thai Baht (THB)</option>'
        +'<option value="TJS">Tajikistani Somoni (TJS)</option>'
        +'<option value="TMT">Turkmenistani Manat (TMT)</option>'
        +'<option value="TND">Tunisian Dinar (TND)</option>'
        +'<option value="TOP">Tongan Paanga (TOP)</option>'
        +'<option value="TRY">Turkish Lira (TRY)</option>'
        +'<option value="TTD">Trinidad & Tobago Dollar (TTD)</option>'
        +'<option value="TWD">New Taiwan Dollar (TWD)</option>'
        +'<option value="TZS">Tanzanian Shilling (TZS)</option>'
        +'<option value="UAH">Ukrainian Hryvnia (UAH)</option>'
        +'<option value="UGX">Ugandan Shilling (UGX)</option>'
        +'<option value="USD">US Dollar (USD)</option>'
        +'<option value="UYU">Uruguayan Peso (UYU)</option>'
        +'<option value="UZS">Uzbekistani Som (UZS)</option>'
        +'<option value="VEF">Venezuelan Bolivar (VEF)</option>'
        +'<option value="VND">Vietnamese Dong (VND)</option>'
        +'<option value="VUV">Vanuatu Vatu (VUV)</option>'
       // +'<option value="WST">Samoan Tala (WST)</option>'
        //+'<option value="XAF">Central African CFA Franc (FCFA)</option>'
        //+'<option value="XCD">East Caribbean Dollar (XCD)</option>'
        //+'<option value="XDR">Special Drawing Rights (XDR)</option>'
        //+'<option value="XOF">West African CFA Franc (CFA)</option>'
        //+'<option value="XPF">CFP Franc (CFPF)</option>'
        +'<option value="YER">Yemeni Rial (YER)</option>'
        +'<option value="ZAR">South African Rand (ZAR)</option>'
        +'<option value="ZMK">Zambian Kwacha (ZMK)</option>'
        +'<option value="ZMW">Zambian Kwacha (ZMW)</option>'
        +'<option value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>';
       return opts;
    }

    function update_all_quotes(){
        //console.log($('#tab_4').find('.invoice-item-details').submit());
    }
    function fun_hide_all_qtips(element){
       //console.log($(element).closest('.qtip'));
       $(element).closest('.qtip').qtip('hide');
       var qid=$('#quoteitemid').val();
       
    }
    function fun_expand_items(element){

        var cssdata='<style>'
        +'table{border-collapse: collapse !important;}'
        +'.addBorder {border: 1px solid black !important;}'
        +'.dobuleBorder {border: 2px solid black !important;}'
        //+'th {color:white;background-color:#3c8dbc !important;white-space: nowrap !important;}'
        +'caption{display:none !important;}'
        +'.marginBottom{margin-bottom:10px !important;}'
        +'.alignRight{text-align: right !important}'
        +'.noBorder{border:none !important}'
        +'.qtip{box-shadow:none !important;}'
        +'.qtip-titlebar{padding: 10px !important;height: 55px !important;font-size: 20px !important;font-weight:normal !important}'
        +'.input-sm{font-size: initial !important;}'
        +'table tr,table td{border: 1px solid #ccc !important;}'
        +'</style>';

        var qid=$(element).closest('table').attr('data-quoteid');
        var mainTable=$(element).closest('.mainContainerTable');
        var activerow=$(mainTable).find('tbody [data-quoteid='+qid+']');

        var quotedata='<div style="font-size: 20px;">'
        
        +'<span style="padding-right: 10px;" class=""><b>Quote ID: </b>'
        + '<span>'+$(activerow).find('td:eq(1) span').html()+'</span>'
        +'</span>'
        +'<span style="padding-right: 10px;" class=""><b>Quote Name: </b>'
        + '<span>'+$(activerow).find('td:eq(2) input').val()+'</span>'
        +'</span>'
       
        +'</div>'

        +'<div style="font-size: 15px;padding-top: 10px;padding-right: 40px;">'
        +'<span class="pull-left"><b>Quote On: </b>'
        + '<span>'+$('#togPopH').val()+'</span>'
        +'</span>'
         +'<span class="pull-right"><b>Created Date: </b>'
        + '<span>'+$(activerow).find('td:eq(4)').html()+'</span>'
        +'</span>'
       
        +'</div>';


         var itemdata=$(element).closest('table')[0].outerHTML;
        
         $(element).qtip({ 
            content: {
                text: cssdata+'<form class="form_expanded_qt" method="post" action="<?php echo site_url(); ?>Projects/taskitemupdate" role="form" id="form_itemlist" name="form_dataset_items"><input type="hidden" id="quoteitemid" name="quoteitemid" value="'+qid+'"><div style="padding-top: 15px;padding-left: 50px;padding-right: 50px;padding-bottom: 10px;">'+itemdata+'<div style="padding-top: 10px;padding-bottom: 30px;    padding-right: 30px;"><button onclick="fun_hide_all_qtips(this)" type="button" class="btn btn-danger btn-xs pull-right btn-updateandexit size-family-sidebar close-expanded-qt">Close</button><button type="submit" class="btn btn-success btn-xs pull-right btn-updateandexit size-family-sidebar update-expanded-qt">Update</button></div></div></form>',
                 title: quotedata,
                 button: 'Close'
                
            },

            show: {
                 //ready : true,
                 event: false,
                 solo: true,
                 //modal: true,
                 effect: function(length){ 

                    $(this).show("scale","slow");

                }

            },
             hide: {
                effect: true,
                event: 'click',
                effect: function() {  $(this).hide("scale","slow");  }
            }, 
            position: {
                my: 'top center',  
                at: 'top center', 
                target: $(document.body),
                adjust: {
                    y: 100
                }
            },
            events: {
                render: function(event, api) {
                    $(this).draggable(); 

                    $(this).find('tbody tr').each(function(i,val){

                        $(val).find('.sel-qty-unit').next().remove();
                        select2itemUnit($(val).find('.sel-qty-unit'));

                        $(val).find('.sym-currency').next().remove();
                        select2itemCurrency($(val).find('.sym-currency'));
                    });

                    $(this).on('focus', "input", function(e){
                        $( e.currentTarget ).select();
                    });

                    $( this ).on( "change", ":input", function(event) {

                       $(event.currentTarget).attr('value',$(event.currentTarget).val());

                   });
                    

                    $(element).closest('table').remove();

                },
                 hide: function () {
                    
                    $(this).qtip('destroy');
                   
                },
                 hidden: function(event, api) {
                    
                    var tempitemdata=$(this).find('table')[0].outerHTML;
                    //console.log('mainContainerTable');
                    //console.log($(mainTable));
                   
                    //$('[class="cls-open-items"][data-quoteid="'+qid+'"]').click();
                    $(mainTable).find('tbody [data-level="2"][data-loaded-quoteid="'+qid+'"] td').append(tempitemdata);
                     //$('#quote_details > tbody [data-level="2"][data-loaded-quoteid="'+qid+'"] td').append(tempitemdata);

                     $(mainTable).find('tbody [data-level="2"][data-loaded-quoteid="'+qid+'"] table tbody tr').each(function(i,val){
                     
                        $(val).find('.sel-qty-unit').next().remove();
                        select2itemUnit($(val).find('.sel-qty-unit'));

                        $(val).find('.sym-currency').next().remove();
                        select2itemCurrency($(val).find('.sym-currency'));
                     });

                     $(this).find('table').remove();
                    
                },
            },
            style: {
                classes: 'qtip-light qtip-rounded size-family-weight',
                    tip: {
                        corner: false
                    }
                },
                
            });
         
         
         $(element).qtip('show');

         window.scroll(0, 0);


    }
    function fun_expand_quotes(element){
        

        var cssdata='<style>'
        +'table{border-collapse: collapse !important;}'
        +'.addBorder {border: 1px solid black !important;}'
        +'.dobuleBorder {border: 2px solid black !important;}'
        //+'th {color:white;background-color:#3c8dbc !important;white-space: nowrap !important;}'
        +'caption{display:none !important;}'
        +'.marginBottom{margin-bottom:10px !important;}'
        +'.alignRight{text-align: right !important}'
        +'.noBorder{border:none !important}'
        +'.invoice-item-details{margin-left: 0px !important;width: 100% !important; }'
        +'.qtip-titlebar{padding: 10px !important;height: 55px !important;font-size: 20px !important;font-weight:normal !important}'
         +'.input-sm{font-size: initial !important;}'
         +'.qtip{box-shadow:none !important;}'
         +'table tr,table td{border: 1px solid #ccc !important;}'
        +'</style>';

       var qid=$(element).closest('table').attr('data-quoteid');
       
       var activerow=$('[data-level="2"][data-quoteid="'+qid+'"]');
      
        var quotedata='<div style="font-size: 20px;">'
        
        +'<span style="padding-right: 10px;" class=""><b>Quote ID: </b>'
        + '<span>'+$(activerow).find('td:eq(0) span').html()+'</span>'
        +'</span>'
        +'<span style="padding-right: 10px;" class=""><b>Quote Name: </b>'
        + '<span>'+$(activerow).find('td:eq(1) input').val()+'</span>'
        +'</span>'
       
        +'</div>'

        +'<div style="font-size: 15px;padding-top: 10px;padding-right: 40px;">'
        +'<span class="pull-left"><b>Quote On: </b>'
        + '<span>'+$('#togPopH').val()+'</span>'
        +'</span>'
         +'<span class="pull-right"><b>Created Date: </b>'
        + '<span>'+$(activerow).find('td:eq(3)').html()+'</span>'
        +'</span>'
       
        +'</div>';

       var itemdata=$(element).closest('table')[0].outerHTML;
       
       $(element).qtip({ 
            content: {
                text: cssdata+'<form method="post" action="<?php echo site_url(); ?>Projects/taskitemupdate/'+qid+'" role="form" id="form_itemlist" name="form_dataset_items"><div style="padding-top: 15px;padding-left: 50px;padding-right: 50px;padding-bottom: 10px;">'+itemdata+'<div style="padding-top: 10px;padding-bottom: 30px;"><button onclick="fun_hide_all_qtips(this)" type="button" class="btn btn-danger btn-xs pull-right btn-updateandexit size-family-sidebar close-expanded-qt">Close</button><button type="submit" class="btn btn-success btn-xs pull-right btn-updateandexit size-family-sidebar update-expanded-qt">Update</button></div></div></form>',
                 title: quotedata,
                 button: 'Close'
                
            },

            show: {
                 event: 'click',
                 solo: true,
                 //modal: true,
                effect: function(length){ 
                    // $(this).show("scale",
                    // {percent: 100, direction: 'both', origin: ["middle", "right"]},1000); 

                    $(this).show("scale","slow");
                }

             },
             hide: {
                effect: true,
                event: 'click',
               
                effect: function() {  $(this).hide("scale","slow");  }
            }, 
            position: {
                my: 'top center',  
                at: 'top center', 
                target: $(document.body),
                //viewport: $(window),
                adjust: {
                    y: 100
                }
            },
            events: {
                render: function(event, api) {
                    //console.log('api render');
                   
                    $(this).draggable();
                    $(this).find('tbody tr').each(function(i,val){
                      
                        $(val).find('.sel-qty-unit').next().remove();
                        select2itemUnit($(val).find('.sel-qty-unit'));

                        $(val).find('.sym-currency').next().remove();
                        select2itemCurrency($(val).find('.sym-currency'));
                     });

                    $(this).on('focus', "input", function(e){
                        $( e.currentTarget ).select();
                    });

                    $( this ).on( "change", ":input", function(event) {

                       $(event.currentTarget).attr('value',$(event.currentTarget).val());

                   });
                    
                    //$('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').click();

                     $(element).closest('table').remove();

            
                },
                 hide: function () {
                    
                    $(this).qtip('destroy');
                    
                },
                 hidden: function(event, api) {

                    // $(this).find('table').remove();
                    // $('[class="cls-open-items-inv"][data-quoteid="'+qid+'"]').click();

                     var tempitemdata=$(this).find('table')[0].outerHTML;
                    //$('[class="cls-open-items"][data-quoteid="'+qid+'"]').click();

                     $('#invoice_details_body [data-loaded-quoteid="'+qid+'"] td').append(tempitemdata);

                     $('#invoice_details_body [data-loaded-quoteid="'+qid+'"] table').find('tbody tr').each(function(i,val){
                     
                        $(val).find('.sel-qty-unit').next().remove();
                        select2itemUnit($(val).find('.sel-qty-unit'));

                        $(val).find('.sym-currency').next().remove();
                        select2itemCurrency($(val).find('.sym-currency'));
                     });

                     $(this).find('table').remove();
                },
            },
            style: {
                classes: 'qtip-light qtip-rounded size-family-weight',
                    tip: {
                        corner: false
                    }
                },
                
            });
     
         $(element).qtip('show');

         window.scroll(0, 0);

    }
    function fun_autoupdate(){
        //  if($('#update_not').css('display')=='block'){
        //     $('#form_itemlist').submit();
        // }
    }
    
    
        $(document).on("keyup",'.inp-currency',function(e){
   
           if (isNaN(this.value)) {
             this.value='';
          }else{

          }

        });

        $(document).on("focus",'.inp-currency',function(e){
           
             this.value=this.value.replace(/\,/g,'');
             $( e.currentTarget ).select();
    
        });


       function fun_formatCurrency(evt){
        // alert($(evt.target).val());
        var newval=(Number($(evt.target).val()).toLocaleString(undefined, {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
        }));
       
        $(evt.target).val(newval);
       }

       $('#quote_details').on('change','.chk-qt-inv',function(i,val){
        var arrQtIds=[];
        $('#quote_details .chk-qt-inv').each(function(i,val){
            if($(this).is(':checked')){
                var qid=$(this).closest('tr').attr('data-quoteid');
                var qtext=$(this).closest('tr').find('.cls-open-items span').html();
                if (qtext.indexOf("R")>=0) { arrQtIds.push(qid.concat('-R')); }
                else{arrQtIds.push(qid.concat('-N'));}
            }else{

            }
        });

        if(arrQtIds.length>0){
            $('#gen_invoice_qts').prop('disabled',false);
            $('#gen_invoice_qts').attr("href",''+ci_baseurl+'Projects/viewAddInvoices/'+arrQtIds.join()+'/'+pro_id+'/'+taskdataid);
        }else{
            $('#gen_invoice_qts').prop('disabled',true);
        }
    });

    
    
    function focusQuoteUnit(element){
        
        $(element).attr('size',10);
        $(".sel-qty-unit").css('z-index',100000);
        $(element).css('z-index',300000000000);
    }
    // added by sujon to select/deselect input value
      function fun_selectall(element){
   
        $( element ).dblclick();
    }

    $('#item_details').on('focus','input',function(e){
        
        $( e.currentTarget ).select();
    });
    
    $('#taskMyDiv').on('focus','.invoice-item-details input',function(e){
        
        $( e.currentTarget ).select();
    });

    // added by sujon to check for item value
      function item_max_validation(element){
   
        if(Number($(element).attr('max'))<Number($(element).val())){
            
            $(element).val('');
            return 'invalid';
        }
    }

    // sujon @ 8/9/16

    function fun_delete_quote(element){

       bootbox.dialog({
        size: "small",
        message: "Do you want to delete this quote?",
        title: "Confirmation",

        buttons: {
            yes: {
                label: "Yes",
                className: "btn-danger",
                callback: function () {


                    var qid=$(element).closest('tr').attr('data-quoteid'); 
                    
                    $.ajax({
                        url: '<?php echo site_url(); ?>Projects/quotesItemDelete',
                        dataType: "JSON",
                        data: {qid: qid},
                        type: "POST",
                        success : function(data) {
                            $('#quote_details tbody tr[data-quoteid="'+qid+'"]').remove();
                            $('.loaded_items_'+qid).remove();
                            if($('#quote_details tbody tr').length==0){
                                //$('#quote_details > tbody').hide();
                                $('#quote_details > tfoot').show();
                                

                                $('#gen_invoice_qts').prop('disabled',true);
                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                                    // Some code to debbug e.g.:   
                                    //console.log("fun_updateSerial");            
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });      

                }
            },
            no: {
                label: "No",
                className: "btn-success",
                callback: function () {

                }
            }

        }
    });
       $(".modal-dialog").draggable();



   }
    function fun_delete_invoice(element){

         bootbox.dialog({
            size: "small",
            message: "Do you want to delete this invoice?",
            title: "Confirmation",

            buttons: {
                yes: {
                    label: "Yes",
                    className: "btn-danger",
                    callback: function () {

                       var invid=$(element).closest('tr').attr('data-invoiceid');

                        $.ajax({
                                url: '<?php echo site_url(); ?>Projects/invoiceItemDelete',
                                dataType: "JSON",
                                data: {invid: invid},
                                type: "POST",
                                success : function(data) {

                                    $('#invoice_details tbody tr[data-invoiceid="'+invid+'"]').remove();
                                    $('#invoice_details [data-level="2"][data-loaded-invoiceid="'+invid+'"]').remove();
                                    $('#invoice_details [data-level="3"][data-loaded-invoiceid="'+invid+'"]').remove();

                                    if($('#invoice_details tbody tr').length==0) $('#invoice_details_foot').show();

                                },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                    // Some code to debbug e.g.:   
                                    //console.log("fun_updateSerial");            
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });      

                    }
                },
                no: {
                    label: "No",
                    className: "btn-success",
                    callback: function () {

                    }
                }

            }
        });
       $(".modal-dialog").draggable();

    }

    function loadquoteitems(element){

        // if($('#update_not').css('display')=='block'){$('#form_itemlist').submit();   }

        var qid=$(element).attr('data-quoteid');
        taskdataid=$(element).attr('data-taskid');

        $('#quoteitemid').val(qid);
        $('#quoteitemid_pro').val(qid);
         
        $(element).closest('tbody').find('tr').each(function(i,item) {
            $(this).css('cssText','background-color:white !important');
        });

        $(element).closest('tr').css('cssText','background-color:lightgreen !important');
        
        $.ajax({
            url: '<?php echo site_url(); ?>Projects/quotesItemDetail/'+qid+'/'+taskdataid,
            dataType: "JSON",
            type: "POST",
            async:false,
            success : function(data) {
                //console.log("loadquoteitems :==>");
                //console.log(data);
                taskitemlistload(data,element);

                if($(element).closest('table').find('tbody').find('.fa-caret-down').length>0){
                    $('.btn-submit-qt').attr('disabled',false);
                }else{
                    $('.btn-submit-qt').attr('disabled',true);
                }



                //$("#box-tab-qt").animate({scrollTop: $('#box-tab-qt').prop("scrollHeight")}, 1000);

               // if($(element).find('.chk-qt-inv').is(":checked")){
               //  $('#item_details').find('.chk-qt-inv-items').prop('disabled',false);
               // }else{
               //  $('#item_details').find('.chk-qt-inv-items').prop('disabled',true);
               // }

            }
        });

    }

    function loadinvoicequotes(event,element){
        //console.log('loadinvoicequotes');
        //if($(event.target).hasClass("invoice-action-del")) return;

        // if($('#update_not').css('display')=='block'){
        //     $('#form_itemlist').submit();
        // }

        var qid=$(element).closest('tr').attr('data-quoteid');

        var invid=$(element).closest('tr').attr('data-invoiceid');
        
        $(element).closest('tbody').find('tr').each(function(i,item) {
            $(this).css('cssText','background-color:white !important');
        });

        $(element).closest('tr').css('cssText','background-color:lightgreen !important');
        var togicon=$($(element).closest('tr')).find('td:eq(0) i');
       
       if($(togicon).hasClass('fa-caret-right')){
        var arrQts=qid.split(',');

        $(arrQts).each(function(i,qid){
          
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/invoiceQuotesDetail/'+invid+'/'+qid,
                dataType: "JSON",
                type: "POST",
                async:false,

                success : function(data) {
                    //console.log("data loadquotes from invoice");
                    if(data.invoice_quotes.length>0) 
                    drawInvoiceQuote(data.invoice_quotes[0],element);

                }
            });
        });
    }else{
       
         $(element).closest('table').find('[data-level="3"][data-loaded-invoiceid="'+invid+'"]').remove();
        $(element).closest('table').find('[data-level="2"][data-loaded-invoiceid="'+invid+'"]').remove();
    }
       $(togicon).toggleClass('fa-caret-right fa-caret-down');
    
        
    }

    function updatequoteitems(element){

    var qid=$(element).closest('tr').attr('data-quoteid');
    var qname=$(element).closest('tr').find('[name="quotename_pop"]').val();
    var qstage=$(element).closest('tr').find('[name="quotestage_pop"]').val();
        $.ajax({
                url: '<?php echo site_url(); ?>Projects/quoteitemupdate',
                dataType: "JSON",
                data: {qid: qid,qname: qname, qstage: qstage},
                type: "POST",
                success : function(data) {
                    

                }
            });
    }

     function updateinvoiceitems(element){

    var invid=$(element).closest('tr').attr('data-invoiceid');
    var qname=$(element).closest('tr').find('[name="invoicename_pop"]').val();
    var qstage=$(element).closest('tr').find('[name="invoicestage_pop"]').val();
        $.ajax({
                url: '<?php echo site_url(); ?>Projects/Invquoteitemupdate',
                dataType: "JSON",
                data: {invid: invid,qname: qname, qstage: qstage},
                type: "POST",
                success : function(data) {
                    

                }
            });
    }
    function updateinvoicequoteitems(element){

        var qid=$(element).closest('tr').attr('data-quoteid');
        var qname=$(element).closest('tr').find('[name="quotename_pop"]').val();
        var qstage=$(element).closest('tr').find('[name="quotestage_pop"]').val();

        $.ajax({
                url: '<?php echo site_url(); ?>Projects/Invoicequoteitemupdate',
                //dataType: "JSON",
                data: {qid: qid,qname: qname, qstage: qstage},
                type: "POST",
                success : function(data) {
                    

                }
            });
    }
    
    function openSettings(taskdataid,tasklistdataid){
        oDiv(taskdataid, tasklistdataid);
            $('.nav-tabs a[href="#tab_1"]').tab('show');
    }
    // function changeColor_depname(element){
    //     $(element).css('cssText','background-color:yellow !important');
    //     $(element).find('div').css('background-color','yellow');
    // }

    // function resetColor_depname(element){
    //     $(element).css('cssText','background-color:white !important');
    //     $(element).find('div').css('background-color','white');
    // }
   
    function fun_updateSerial(taskdataid,taskserial){

             $.ajax({
                url: '<?php echo site_url() . "Projects/updateSerial"; ?>',
                type: 'POST',
                //async: false,
                data: {ptid: taskdataid, ptcode: taskserial},
                dataType: "json",
               
                success: function (res) {
                    // console.log(res);
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:   
                //console.log("fun_updateSerial");            
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
            });
        }
    function fun_toggle_comptable(){
       
        var newstatus;
        if($('#tbl_TaskCompleted').css('display') == 'table'){
            $("#tbl_TaskCompleted").hide();
            newstatus=0;
           
        }else{
            $("#tbl_TaskCompleted").show();
            newstatus=1;
         }


        $.ajax({
        url: '<?php echo site_url(); ?>Projects/updateShowComplete',
        type: 'POST',
        data: {
            uid: pro_id,
            ustatus: newstatus
            
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data, textStatus) {


        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Some code to debbug e.g.:               
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    }
   
    // function saveStickyNote(element,taskdataid){
    //     var popup;
    //     var note=$(element).closest('div.qtip-content').find('textarea').val();
       
    //     if($(element).closest('div').find('input').is(':checked')==true) popup=1;
    //     else popup=0;
       
    //     $.ajax({
    //     url: '<?php echo site_url(); ?>Projects/updateStickyNote',
    //     type: 'POST',
    //     data: {
    //         tid: taskdataid,
    //         note: note,
    //         popup: popup
            
    //     },
    //     dataType: "json",
    //     beforeSend: function () {

    //     },
    //     success: function (data, textStatus) {

    //     },
    //     error: function (jqXHR, textStatus, errorThrown) {
    //         // Some code to debbug e.g.:               
    //         console.log(jqXHR);
    //         console.log(textStatus);
    //         console.log(errorThrown);
    //     }
    // });
    // }

    // function saveStickyNoteSub(element,taskdataid){
    //     var popup;
    //     var note=$(element).closest('div.qtip-content').find('textarea').val();
       
    //     if($(element).closest('div').find('input').is(':checked')==true) popup=1;
    //     else popup=0;

    //     $.ajax({
    //     url: '<?php echo site_url(); ?>Projects/updateStickyNoteSub',
    //     type: 'POST',
    //     data: {
    //         tid: taskdataid,
    //         note: note,
    //         popup: popup
            
    //     },
    //     dataType: "json",
    //     beforeSend: function () {

    //     },
    //     success: function (data, textStatus) {

    //     },
    //     error: function (jqXHR, textStatus, errorThrown) {
    //         // Some code to debbug e.g.:               
    //         console.log(jqXHR);
    //         console.log(textStatus);
    //         console.log(errorThrown);
    //     }
    // });
    // }
//     $("#loading_span").simplePopup({

//   type: "html",

//   htmlSelector: "#myPopup"

// });

function subtaskExpCol(element){

    var box = bootbox.dialog({

      message: '<i style="font-size: 70px !important;" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',

      className: "loading_width"
  });
   
    box.css({
      'top': '50%',
      'margin-top': function () {
        return -(box.height() / 2);
    }
});
    box.on("shown.bs.modal", function() {
        flag_expand_subtask=true;
        if($(element).hasClass("fa-arrow-circle-down")){


            $('.sortable [id^="img_st_open"]').each(function(i,item) {
                $(this).click();
            });
            $(".subtasktable").show();

            
        }else{

            $('.sortable [id^="img_st_close"]').each(function(i,item) {
                $(this).click();
            });
            $(".subtasktable").hide();


        }
        $(element).toggleClass("fa-arrow-circle-down fa-arrow-circle-up");

        box.modal('hide');
        flag_expand_subtask=false;


    });



}
    function gotoAddNewTask(element){

        

        $('html, body').animate({ scrollTop: $("#added_task_name0").offset().top }, 500);
        setTimeout(function () {
            $("#added_task_name0").focus();
        }, 0);
    }
    
    function fun_updatechecked(uid,uchecked,utable,ustatus){
                               
            $.ajax({
            url: '<?php echo site_url(); ?>Projects/updatechecked',
            type: 'POST',
            data: {
                uid: uid,
                uchecked: uchecked,
                utable:utable,
                ustatus:ustatus

            },
            //dataType: "json",
            beforeSend: function () {

            },
            success: function (data, textStatus) {
                

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    function subtaskComChk(element)
    {
        // console.log(element);
        if(element.checked){
            $(element).closest('tr').find(".addedsubtask").prop("disabled",true);
            $(element).closest('tr').css("font-style","italic");

            $(element).closest('tr').find("input[name=subtask_start_date]").prop('disabled', true);
            $(element).closest('tr').find("input[name=subtask_end_date]").prop('disabled', true);
            fun_updatechecked($(element).closest('tr').attr('data-subtaskid'),'YES','SUBTASK');

        }else{
            $(element).closest('tr').find(".addedsubtask").prop("disabled",false);
             $(element).closest('tr').css("font-style","normal");
            $(element).closest('tr').find("input[name=subtask_start_date]").prop('disabled', false);
            $(element).closest('tr').find("input[name=subtask_end_date]").prop('disabled', false);
            //alert($(element).closest('table').attr("id"));
            fun_updatechecked($(element).closest('tr').attr('data-subtaskid'),'NO','SUBTASK');
        }
    }

        function getClosestNum(num, ar)
        {
         var i = 0, closest, closestDiff, currentDiff;
         if(ar.length)
         {
         closest = ar[0];
         for(i;i<ar.length;i++)
         { 
         closestDiff = Math.abs(num - closest);
         currentDiff = Math.abs(num - ar[i]);
         if(currentDiff < closestDiff)
         {
         closest = ar[i];
         }
         closestDiff = null;
         currentDiff = null;
         }
         //returns first element that is closest to number
         return closest;
         }
         //no length
         return false;
        }
        function comparer(index,type) {
                return function(a, b) {

                var valA = getCellValue($(a), index), valB = getCellValue($(b), index);

                if(index==4 || index==5){

                 var dateA=new Date(valA.replace(/-/g, ' '));
                 var dateB=new Date(valB.replace(/-/g, ' '));

                 return (compareDate(dateA,dateB));
             }
             if(index==6){
                if(valA==undefined) return -1; if(valB==undefined) return 1;
             }
             if(index==0 && type=='subtask'){
                valA=valA.split(".")[1];valB=valB.split(".")[1];
                 // console.log("SubAB");console.log(valA);console.log(valB);
             }
           
              if(valA=="") return -1; if(valB=="") return 1;
                     return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
                }
             }
           
        function compareDate(dateTimeA, dateTimeB) {
            //alert(dateTimeB);
            var momentA = moment(dateTimeA);
            var momentB = moment(dateTimeB);
            // console.log("compareDate");
             if(!moment(dateTimeA).isValid()) return -1;
             if(!moment(dateTimeB).isValid()) return 1;
            if (momentA > momentB) return 1;
            else if (momentA < momentB) return -1;
            else return 0;

        }
        function getCellValue(row, index){
            // console.log("8503:");
            // console.log(index);
        if(index==0) return ($(row).children('td').eq(index).find("label").html());
        if(index==6) return $(row).children('td').eq(index).find("input:hidden").val();
        else return $(row).children('td').eq(index).find("input:text").val();
        }

        function taskComChk(element)
        {

            //console.log(element);

            if(element.checked){
               
                $("#chkchangetaskstatus").attr('checked',true);
                $(element).closest('tr').find(".addedentry").prop("disabled",true);
                //$(element).closest('tr').css("font-style","italic");

                $(element).closest('tr').find("input[name=start_date]").prop('disabled', true);
                $(element).closest('tr').find("input[name=end_date]").prop('disabled', true);

                $(element).closest('tr').next().find(".tby_subtask tr").each(function(i,item) {
                    $(item).css("font-style","italic");
                    $(item).find(".addedsubtask").prop("disabled",true);
                    $(item).find(".chk-subtask-complete").prop("checked",true).prop("disabled",true);
                });

                
                //fun_task_complete();

            }else{

               // fun_toggle_compbtn();
                $("#chkchangetaskstatus").attr('checked',false);

                $(element).closest('tr').find(".addedentry").prop("disabled",false);
                $(element).closest('tr').css("font-style","normal");

                $(element).closest('tr').next().find(".tby_subtask tr").each(function(i,item) {
                    $(item).css("font-style","normal");
                    $(item).find(".addedsubtask").prop("disabled",false);
                    $(item).find(".chk-subtask-complete").prop("checked",false).prop("disabled",false);;
                });
                // console.log("$(element)");
                // console.log($(element));

                if($(element).closest('table').attr("id")=="tbl_TaskCompleted"){

                 fun_updatechecked($(element).closest('tr').attr('data-taskid'),'NO','TASK','ACTIVE');
                 $(element).closest('tr').find('[id^="added_start_date"]').datetimepicker('destroy');
                 $(element).closest('tr').find('[id^="added_end_date"]').datetimepicker('destroy');

                 var position=Number($(element).closest('tr').attr("id").match(/\d+/)[0]);

                 var tr_child = $(element).closest('tr').next().remove().clone();
                 var tr = $(element).closest('tr').remove().clone();
                 $(".sortable").append(tr).append(tr_child);

                 qTipAdd2($(tr).find('input[id^="added_task_name"]'));
                 //qTipSticky($(tr).find('.open-sticky-note'),$(tr).attr("data-taskid"));

                 var table = $("#tbl_TaskEntry");

                 var hindex;
                 $("#tbl_TaskEntry th").each(function( index ) {

                    if($(this).find("i[class*='fa-sort']").not(".fa-sort").length>0) hindex=(index);
                });
                     var rows = table.find("tbody tr[id^='taskid']").toArray().sort(comparer(hindex,'task'));

                 if($("#tbl_TaskEntry th").eq(hindex).find("i[class*='fa-sort']").hasClass("fa-sort-desc")){
                    rows = rows.reverse();
                }
                   
                    for (var i = 0; i < rows.length; i++){
                    table.append(rows[i]);

                    table.append($(".tby_subtask[data-taskid='"+ $(rows[i]).attr("data-taskid")+"']").closest("[id^='taskchild']"));

                }
                $( "#tbl_TaskEntry .subtasktable" ).each(function( index ) {
                  var rows_child = $(this).find("tbody tr").toArray().sort(comparer(hindex,'subtask'));

                  for (var i = 0; i < rows_child.length; i++){

                   $(this).append(rows_child[i]);

               }
           });

                var taskserial;
                $( ".sortable tr[id^='taskid_']" ).each(function( index ) {
                  var taskid= ($(this).attr('id').match(/\d+/)[0]);
                  var taskdataid= $(this).attr('data-taskid');

                  taskserial=$(this).find('td').eq(0).find('label').html(index+1).html();

                  fun_updateSerial(taskdataid,taskserial);

                  $( '#taskchild_'+taskid+' .tby_subtask tr' ).each(function( index ) {
                    $(this).find('td').eq(0).find('label').html(taskserial+'.'+Number(index+1));
                });
              });

                $( ".tbody_completed tr[id^='taskid_']" ).each(function( index ) {

                  var taskid= ($(this).attr('id').match(/\d+/)[0]);
                  var taskdataid= $(this).attr('data-taskid');

                  taskserial=Number(taskserial);
                  taskserial=$(this).find('td').eq(0).find('label').html(taskserial+1).html();
                  fun_updateSerial(taskdataid,taskserial);

                  $( '#taskchild_'+taskid+' .tby_subtask tr' ).each(function( index ) {
                    $(this).find('td').eq(0).find('label').html(taskserial+'.'+Number(index+1));
                });
              });

            }else{

               fun_updatechecked($(element).closest('tr').attr('data-taskid'),'NO','TASK');
           }


       }
   }

    function fun_toggle_compbtn(){
        var counter=0;
        $(".chk-task-complete").each(function (index) {
            if($(this).closest('table').attr("id") !="tbl_TaskCompleted"){
            if ($(this).is(":checked")){
              counter+=1;
          }
      }
      });
        if(counter==0)  $(".cls-task-complete").hide();
        else  $(".cls-task-complete").show();
    }

    function qTipAdd2(element) {

        $(element).qtip({

           show: {
               event: 'mouseenter',
               solo: true,
               // delay: 500

           },
           content: {
            text: '<div class="qtip-fontsize">'+$(element).val()+'</div>',
            // title: {
            //      text: 'Task name',
            //      button: 'Close', // Close button
            //      background: '#3c8dbc'
            //     },

        },

        position: {
            my: 'bottom left',  // Position my top left...
            at: 'top left', // at the bottom right of...
            target: $(element)
        },
        style: {
            classes: 'qtip-light qtip-rounded size-family-weight',
            tip: {
                corner: false
            }
        },
            //unfocus mouseleave
            hide: {
                event: 'unfocus click mouseleave',

            },
            events: {
                
                show: function(event, api) {
                    if ($(element)[0].scrollWidth >  $(element).innerWidth()) {
                        //alert($(element)[0].class);
                        
                        
                    }else{event.preventDefault();}

                    
                },
                visible: function(event, api) {
                    //alert(event.type + " is fired");
                    var id = $(element)[0].id;
                    var name = $(element)[0].name;
                    var className = $(element)[0].class;
                    var valu = $(element)[0].value;
                    var tr = $("#"+id).closest('tr').attr('id');
                    $("#"+id).click(function(event) {
                        if(name=='task_name'){
                            $('#'+id).hide();
                            $('#'+id+"_area").show();
                            $('#'+id+"_area").focus();
                        }

                        if(name=='subtask_name'){
                            $('#'+id).hide();
                            $('#'+id+"_area").show();
                            $('#'+id+"_area").focus();
                        }   
                    });
                }
            },
             render: function(event, api) {
            $(window).bind('keydown', function(e) {
                if(e.keyCode === 27) { api.hide(e); }
            });
        }
        });

    }
    function delStickyNote(el,noteid){
        $.ajax({
                url: '<?php echo site_url(); ?>Projects/delStickyNote',
                type: 'POST',
                data: {
                    noteid: noteid,
                   
                },
                dataType: "json",
                beforeSend: function () {

                },
                success: function (data, textStatus) {
                    if(data.status){
                        $(el).closest('.row').remove();
                    }
                    //$("#taskid_" + cur_id).find('[name="task_name"]').val(newtaskname);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

    }
    function editStickyNote(el,noteid){
        $(el).closest('.row').find('p').attr('contenteditable', 'true').focus();
        $(el).closest('.row').find('p').on('blur',function(e){
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/updateStickyNote',
                type: 'POST',
                data: {
                    noteid: noteid,
                    stickynote: $(el).closest('.row').find('p').text()
                   
                },
                dataType: "json",
                beforeSend: function () {

                },
                success: function (data, textStatus) {
                    if(data.status){
                       
                    }
                    //$("#taskid_" + cur_id).find('[name="task_name"]').val(newtaskname);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        })
    }

    function drawStickyNote(note){
        var user_id = '<?php echo $id; ?>';var editstatus='block';
        if(user_id==note.id) editstatus='none';
        var newrow=''
         +'<div class="row">'

         +       '<div class="col-md-2">'
         +           '<label>'+note.display_name+': </label>'
         +       '</div>'

         +       '<div class="col-md-4">'
       
         +          '<p>'+note.stickynote+'</p>'
         +       '</div>'

         +       '<div class="col-md-4">'
         +           '<label>'+note.updatedate+'</label>'
         +       '</div>'

         +       '<div class="col-md-1">'
         +           '<span style="display:'+editstatus+'" onclick="editStickyNote(this,'+note.id+')" type="button" class="fa fa-pencil-square-o"></span>'
         +       '</div>'
        +       '<div class="col-md-1">'
         +           '<span style="display:'+editstatus+'" onclick="delStickyNote(this,'+note.id+')" type="button" class="fa fa-trash"></span>'

         +       '</div>'
         +    '</div>'; // end row
         // newrow=$(newrow);
         // if(user_id !=note.id){
         //    newrow.find('textarea').attr('readonly','readonly');
         // }
         //alert($(newrow).html());
         return newrow;
    }
    function qTipSticky(taskdataid) {
      
      $("#stickynote"+taskdataid).qtip({

        show: {
            event: 'click', 

        },  
        hide: {
            event: 'click unfocus', 

        }, 


        content: {
                //text: 'Loading...',
                title: {
                   text: 'Sticky Note',
                 button: 'Close', // Close button
                 background: '#3c8dbc'
             },
             ajax: {
                url: '<?php echo site_url(); ?>Projects/readStickyNote',
                type: 'POST',
                data: {
                 tid:taskdataid
             },
             success: function(data, status) {
                    //console.log('readStickyNote');
                    //console.log(data);
                   

                 // var getstickynote="";var getchecked="";
                 // if(data.note[0].stickynote !=null) getstickynote=data.note[0].stickynote;
                 // if(data.note[0].notepopup ==1) getchecked="checked";
                    
                 var qhtml='<div class="panel panel-default">'
                 // +'<div class="panel-heading">'
                 // +'  <input id="checkbox_id'+taskdataid+'" onclick="saveStickyNote(this,'+taskdataid+')" '+getchecked+' type="checkbox">'
                 // +'  <label for="checkbox_id'+taskdataid+'" class="">Auto Popup</label>'
                 // +  '</div>'

                 +  '<div class="panel-body" style="overflow-y: scroll;height: 300px;font-size:14px;">'
                
                 +  '</div>'

                 +  '<div class="panel-footer">'

                 +     '<div class="row">'

                 +       '<div class="col-md-10">'
                 +           '<textarea id="txtStickyNote'+taskdataid+'" style="width: 95%;" rows="3"></textarea>'
                 +       '</div>'

                 +       '<div class="col-md-2">'
                 +           '<button onclick="addStickyNote(this,'+taskdataid+')" type="button" class="btn btn-primary">Add</button>'
                 +       '</div>'

                 +    '</div>' // end row

                 +  '</div>' // end footer

                 +'</div>'; // end panel

                 qhtml=$(qhtml);

                 $.each(data.notes, function (i, note) {
                     qhtml.find('.panel-body').append(drawStickyNote(note));
                    });

                    this.set('content.text', qhtml);

                }
            }
        },

        position: {
            at: 'left center ',  // Position my top left...
            my: 'right center', // at the bottom right of...
            //target: $("#stickynote"+taskdataid)
        },
        style: {
            classes: 'qtip-light qtip-rounded qtip-shadow',
            width:'600px',

        },
        
        events: {
            render: function(event, api) {
                $(window).bind('keydown', function(e) {
                    if(e.keyCode === 27) { api.hide(e); }
                });
            }
        }
    });

}

    // function qTipStickySub(element,subtaskdataid) {
    //   // console.log("qqqqqq");  console.log(element);

    //     $(element).qtip({
    //         events: {
    //     render: function(event, api) {
    //         $(window).bind('keydown', function(e) {
    //             if(e.keyCode === 27) { api.hide(e); }
    //         });
    //         }
    //     },
    //         show: {
    //             event: 'click', 

    //         },  
    //         hide: {
    //             event: 'click unfocus', 
    //             target: $('.cls-close-qtip')

    //         }, 


    //         content: {
    //             //text: 'Loading...',
    //             title: {
    //              text: 'Sticky Note',
    //              button: 'Close', // Close button
    //              background: '#3c8dbc'
    //             },
    //         ajax: {
    //             url: '<?php echo site_url(); ?>Projects/readStickyNoteSub',
    //             type: 'POST',
    //             data: {
    //                tid:subtaskdataid
    //             },
    //             success: function(data, status) {
                    
    //                var getstickynote="";var getchecked="";
    //                 if(data.note[0].stickynote !=null) getstickynote=data.note[0].stickynote;
    //                 if(data.note[0].notepopup ==1) getchecked="checked";
    //                 // Set the content manually (required!)
    //                qht= '<textarea id="txtStickyNoteSub'+subtaskdataid+'" onblur="saveStickyNoteSub(this,'+subtaskdataid+')" style="font-size: 14px;width: 95%;" rows="10">'+getstickynote+'</textarea><div style="float: right;position: relative;right: 20px;"><input id="checkbox_id'+subtaskdataid+'" onclick="saveStickyNoteSub(this,'+subtaskdataid+')" '+getchecked+' type="checkbox"><label for="checkbox_id'+subtaskdataid+'" class="size-family-weight">Auto Popup</label></div>';
                   

    //                this.set('content.text', qht);

    //             }
    //         }
    //     },

    //     position: {
    //         my: 'left center ',  // Position my top left...
    //         at: 'right center', // at the bottom right of...
    //         target: $(element)
    //     },
    //     style: {
    //         classes: 'qtip-light qtip-rounded size-family-weight',
    //         width:'400'
    //     },
            
           
    //     });

    // }

    
   
   	function qTipNewQuote(element,pos,projectID,taskID) {
        //console.log('show');
        var pos_my,pos_at;
        //console.log(element);

        if(pos=='up'){
            pos_my='right top';
            pos_at='left top';
        }else{
            pos_my='right down';
            pos_at='left down';
        }
         // if(winsize < 361){

         //    pos_my='right down';
         //    pos_at='left top';

         // }

        $(element).qtip({
            events: {
                render: function(event, api) {
                    $(window).bind('keydown', function(e) {
                        if(e.keyCode === 27) { api.hide(e); }
                        });
                }
            },
            position: {
                my: pos_my,  
                at: pos_at, 
                target: $(element)
            },
        
            style: {
                classes: 'qtip-light qtip-rounded size-family-weight',
                width:'180',
                
            },
            show: {
                event: 'click',

                //event: 'touchstart' 
            },  
            hide: {
                event: 'click unfocus', 
                target: $('.cls-close-qtip')

            }, 

            content: {
                // title: {
                //  text: 'Add New Quotes',
                //  button: 'Close', 
                //  background: '#3c8dbc'
                // },
                text: function(event, api) {
                    api.elements.content.html('loading...');

                    return $.ajax({
                        url: '<?php echo site_url(); ?>Projects/viewAddQuotes/'+taskID+'/'+projectID,
                        type: 'POST',
                        loading: true,
                        cache: false,
                        data: {
                           taskdataid:taskID,
                           proid:projectID
                       }
                   }).then(function(data) {
                    //console.log(data);
                    
                    api.elements.content.html(data);

                       
                    }, function(xhr, status, error) {
                        // Errors aren't handled by the library automatically, so
                        // you'll need to call .set() upon failure, just as before.
                       console.log(xhr.responseText);
                       console.log(status);console.log(error);
                        api.set('content.text', status + ': ' + error);
                    });
                }
            },

        });

    }
    function qTipDepTask(element){

        $(element).qtip({ 
            content: {
                text: $(element).attr('data-title'),
                // title: {
                //  text: 'Task name',
                //  button: 'Close', // Close button
                //  background: '#3c8dbc'
                // }, 
            },

            show: {
               // delay:5000 
            },
            position: {
                my: 'bottom left ',  
                at: 'top left', 
                target: $(element)
            },
            style: {
                classes: 'qtip-light qtip-rounded size-family-weight',
                    tip: {
                        corner: false
                    }
                },
                
            });
    }
    function qTipQuoteMenuTips(element){

        $(element).qtip({ 
            content: {
                text: $(element).attr('data-title'),
              
            },

            show: {
                 event: 'mouseenter',
                 

             },
             hide: {
                event: 'mouseleave',
               
            },
            position: {
                my: 'bottom right ',  
                at: 'top right', 
                target: $(element)
            },
             
            style: {
                classes: 'qtip-light qtip-rounded size-family-weight',
                // height:40,
                    tip: {
                        corner: false
                    }
                },
                
            });
    }
     function qTipQuoteMenu(element,eid,type,gid,pro_id,taskdataid,settings){
        var qhtml='';
         if(type=='invoice'){
             
              qhtml='<div id="invoice_menu_more_'+eid+'">'

                // +'<a title="Generate" onclick="fun_gen_revisions(event,'+eid+')" class="btn btn-primary btn-xs pull-left size-family-sidebar btn-qa invoice-action-genrev"><i style="font-size:11px !important" class="fa fa-usd"></i> </a>'

                +'<a title="Generate" onclick="show_pdf_itemlist(\'generate\','+eid+',\'invoice\','+settings+')" class="btn btn-success btn-xs pull-left size-family-sidebar btn-qa invoice-action-pdf"><i style="font-size:20px !important;margin:5px" class="fa fa-usd"></i> </a>'
               
                +'<a title="Print" onclick="show_pdf_itemlist(\'print\','+eid+',\'invoice\','+settings+')" class="btn btn-info btn-xs pull-left  size-family-sidebar btn-qa invoice-action-print"><i style="font-size:20px !important;margin:5px" class="fa fa-print"></i> </a>'

                +'<a title="Mail" onclick="show_pdf_itemlist(\'mail\','+eid+',\'invoice\','+settings+')" href="" class="btn btn-warning btn-xs pull-left  size-family-sidebar btn-qa invoice-action-mail"><i style="font-size:20px !important;margin:5px" class="fa fa-size fa-envelope-o"></i> </a>'

                
                +'</div>';

          }else{
         

            qhtml='<div id="quote_menu_more_'+eid+'">'
                +'<a title="Generate Invoice" data-toggle="lightbox" data-title="Add New Invoice" href="<?php echo base_url()."Projects/viewAddInvoices"; ?>/'+gid+'/'+pro_id+'/'+taskdataid+'" class="btn btn-primary btn-xs pull-left size-family-sidebar btn-qa quote-action-invoice"><i style="font-size:20px !important;margin:5px" class="fa fa-usd"></i> </a>'
                +'<a title="PDF" onclick="show_pdf_itemlist(\'pdf\','+eid+',\'quotation\','+settings+')" class="btn btn-success btn-xs pull-left size-family-sidebar btn-qa quote-action-pdf"><i style="font-size:20px !important;margin:5px" class="fa fa-file-pdf-o"></i> </a>'
               
                +'<a title="Print" onclick="show_pdf_itemlist(\'print\','+eid+',\'quotation\','+settings+')" class="btn btn-info btn-xs pull-left  size-family-sidebar btn-qa quote-action-print"><i style="font-size:20px !important;margin:5px" class="fa fa-print"></i> </a>'

                +'<a title="Mail" onclick="show_pdf_itemlist(\'mail\','+eid+',\'quotation\','+settings+')" href="" class="btn btn-warning btn-xs pull-left  size-family-sidebar btn-qa quote-action-mail"><i style="font-size:20px !important;margin:5px" class="fa fa-size fa-envelope-o"></i> </a>'

                
                +'</div>';
            }

        $(element).qtip({ 
            content: {
                text: qhtml,
              
            },

            show: {
                 event: 'click',
                 solo: true,
                 
                  effect: function(length){ $(this).show("slide", { direction: "right" }, length); }

             },
             hide: {
                event: 'unfocus click',
               
            },
            position: {
                my: 'right center',  
                at: 'left center', 
                target: $(element)
            },
             events: {
                
                show: function(event, api) {
                   

                    
               },
                visible: function(event, api) {
                    //alert(event.type + " is fired");
                    
                    //console.log("event visible");
                    //console.log(event);console.log(api);
                   // $(event.currentTarget).find('a[data-title]').each(function(i,val){
                   //  qTipQuoteMenuTips($(val));
                   // });
                   }
                
            },
            style: {
                classes: 'qtip-transparent qtip-rounded size-family-weight',
                // height:40,
                    tip: {
                        corner: true
                    }
                },
                
            });

    }

    function qTipQuoteUpdateMenu(element,qid,invid,typeid,linkid){
        var qhtml='';
        
             
              qhtml='<div id="invoice_menu_update_'+qid+'">'

                 +'<a title="Revision" onclick="fun_revision_invoicequote('+qid+','+invid+','+typeid+','+linkid+')" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-update"><i style="font-size:20px !important;margin:5px" class="fa fa-retweet"></i></a>'

                +'<a title="Update" onclick="fun_update_invoicequote('+qid+')" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-update"><i style="font-size:20px !important;margin:5px" class="fa fa-pencil-square-o"></i></a>'
                
                +'</div>';

          

        $(element).qtip({ 
            content: {
                text: qhtml,
              
            },

            show: {
                 event: 'click',
                 solo: true,
                 
                  effect: function(length){ $(this).show("slide", { direction: "right" }, length); }

             },
             hide: {
                event: 'unfocus click',
               
            },
            position: {
                my: 'right center',  
                at: 'left center', 
                target: $(element)
            },
             events: {
                
                show: function(event, api) {
                   

                    
               },
                visible: function(event, api) {
                    
                   }
                
            },
            style: {
                classes: 'qtip-transparent qtip-rounded size-family-weight',
                // height:40,
                    tip: {
                        corner: true
                    }
                },
                
            });

    }
	
    
    function fun_drawSubtasks(subtasknum, data, rowid,attach) {

        //console.log(data);
        if (data.st_start == "0000-00-00 00:00:00") startdatesub = "";
        else startdatesub = moment(data.st_start).format('YYYY-MMM-DD HH:mm');

        if (data.st_end == "0000-00-00 00:00:00") enddatesub = "";
        else if(data.st_end == "") enddatesub = "";
        else enddatesub = moment(data.st_end).format('YYYY-MMM-DD HH:mm');

        // console.log("enddatesub");
        // console.log(data.st_end);
            
        var apphtml = '<tr id="subtaskrow_' + subtasknum + '" data-subtaskid="'+subtasknum+'" data-subtasklistid="'+data.st_tasklistid+'">'

                + '<td class="center-align-td">'

                + '<label id="added_subtask_serial' + subtasknum + '">*</label>'
                + '</td>'

                //+ '<td>'
                // +'<i id="qt_submenuopen' + subtasknum + '" class="fa fa-gear details-submenuopen" style="font: normal normal normal 20px/1 FontAwesome !important;cursor:pointer;"></i>'
                // + '</td>'

                + '<td style="background-color: #f2f2f2 !important">'
                +'<input style="float: left;top: 10px;" onchange="subtaskComChk(this)" class="chk-subtask-complete" type="checkbox" '+ (data.st_checked=="YES" ? "checked" : "")+' >'
                + '<input value="' + data.st_name + '" id="added_subtask_name' + subtasknum + '" type="text" name="subtask_name" class="add-input-padding addedsubtask btn-gray2" style="float: left;width:70%;outline:none;"><textarea style="float:left;width:80%;height: 55px;display:none;" id="added_subtask_name'+subtasknum+'_area" name="subtask_name" class="add-input-padding addedsubtask btn-gray2 textSubEntry">' + data.st_name + '</textarea><span id="added_subtask_name' + subtasknum + '_exD" class="cls-exD-span" style=""></span>'
                
                + '</td>'

                + '<td>'
                + '<input data-duration="' + data.st_duration + '" id="added_subtask_duration' + subtasknum + '" type="text" min="1" name="subtask_duration" class="btn-gray2 addedsubtask createduration_st">'
                + '</td>'

                + '<td>'
                + '<input value="' + (startdatesub) + '" id="added_subtask_start' + subtasknum + '" type="text" name="subtask_start_date" class="btn-gray2 addedsubtask datepicker_startend_st">'
                + '</td>'

                + ' <td>'
                + '<input value="' + (enddatesub) + '" id="added_subtask_end' + subtasknum + '" type="text" name="subtask_end_date" class="btn-gray2 addedsubtask datepicker_startend_st">'
                + ' </td>'


                + '</tr>';

            $("#tbody_subtask_" + rowid).append(apphtml);

            var inputid = "added_subtask_name"+subtasknum;
                       $("#"+inputid+'_exD').append('<img style="display:none" id="substickynote_img'+subtasknum+'" src="<?php echo base_url(); ?>require/img/prio/stickynote.png"  class="open-sticky-sub-note task-set-icon"/>');

            //qTipAdd($("#qt_submenuopen" + subtasknum));

            qTipAdd2($("#added_subtask_name" + subtasknum));
            qTipAdd2($("#trd_sub_td" + subtasknum));

            qTipStickySub($("#substickynote_img"+subtasknum),subtasknum);
           
             if(data.st_stickynote)
                {  
                    
                 $("#substickynote_img"+subtasknum).show();
                  if(data.st_notepopup!=undefined){
                    if(data.st_notepopup==1)
                    {  

                     $("#substickynote_img"+subtasknum).trigger('click');
                    }
                }
                }
               
                if(data.st_projecttaskpriority != null && data.st_projecttaskpriority != ''){
                       
                    switch(data.st_projecttaskpriority){
                        case 'High':
                                    $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/high.png"  class="cls-open-settings task-set-icon" />');
                                    break;
                        case 'Low':
                                    $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/low.png" class="cls-open-settings task-set-icon"/>');
                                    break;
                        case 'Normal':
                                    $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/normal.png" class="cls-open-settings task-set-icon"/>');
                                    break;

                    }
                    
                }
                    if(attach !=undefined){
                        var countAttact = 0;
                        $.each(attach, function (i, valu) {
                            if(attach[i].typeID == subtasknum){
                                countAttact++;
                                // console.log(countAttact);
                            }    
                        });
                    if(countAttact != null && countAttact != 0){
                        //changeTagImgonLoad(inputid,item.projecttaskpriority,item.projecttaskid,'bg-red','priority');
                        //alert(item.projecttaskpriority);
                       $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/attach.png" class="cls-open-attachment task-set-icon"/>');
                        
                    }
                    countAttact = 0;
                }
                var user_id = '<?php echo $id; ?>';
                // if(data.st_opened_by != user_id){
                //         //changeTagImgonLoad(inputid,item.projecttaskpriority,item.projecttaskid,'bg-red','priority');
                //         //alert(item.projecttaskpriority);
                //        $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/shared.png" class="cls-open-settings task-set-icon"/>');
                        
                // }



            $("#tbody_subtask_" + rowid + " tr").each(function (index) {
                $(this).find('td:first-child label').html(rowid + "." + Number(index + 1));
            });

            $('#added_subtask_start' + subtasknum + '').datetimepicker({
                format: 'Y-M-d H:i',
                minDate: 0,
                onChangeDateTime:  function (ct,$input) {
                    updateTimetableSub(ct,$input)
                },
                // onShow:function( ct,input ){
                //     var serial=($(input).attr("id").match(/\d+/)[0]);

                //     this.setOptions({
                //         maxDate: $('#added_subtask_end'+serial).val().split(" ")[0],formatDate:'Y-M-d',

                //     })
                // }
            });

            $('#added_subtask_end' + subtasknum + '').datetimepicker({
                format: 'Y-M-d H:i',
                 //minDate: $('#added_subtask_start'+newrownum).val(),
                 onChangeDateTime:  function (ct,input) {
                    updateTimetableSub(ct,input);

                    var serial=($(input).attr("id").match(/\d+/)[0]);

                    if($('#added_subtask_start'+serial).val().split(" ")[0]==$('#added_subtask_end'+serial).val().split(" ")[0]){

                        this.setOptions({
                            minDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                           // defaultDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: $('#added_subtask_start'+serial).val().split(" ")[1],
                            //defaultTime: $('#added_subtask_start'+serial).val().split(" ")[1],
                            formatTime:'H:i'
                        })

                    }else{

                        this.setOptions({
                            minDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            //defaultDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: "00:00",
                           // defaultTime: "00:00",
                            formatTime:'H:i'

                        })

                    }
                },
                onShow:function( ct,input ){
                   var serial=($(input).attr("id").match(/\d+/)[0]);

                    if(($('#added_subtask_end'+serial).val()=="") || ($('#added_subtask_start'+serial).val().split(" ")[0] == $('#added_subtask_end'+serial).val().split(" ")[0])){
                        
                        this.setOptions({
                            minDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            defaultDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: $('#added_subtask_start'+serial).val().split(" ")[1],
                            defaultTime: $('#added_subtask_start'+serial).val().split(" ")[1],
                            formatTime:'H:i',

                        })

                    }else{
                        
                        this.setOptions({
                            minDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            //defaultDate: $('#added_subtask_start'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: "00:00",
                            //defaultTime: "00:00",
                            formatTime:'H:i'

                        })

                    }
                }
            });

            

            $('#new_subtask_name' + rowid + '').val("");
            $('#new_subtask_duration' + rowid + '').val("");

            $('#new_subtask_start' + rowid + '').datetimepicker({ 
                minDate: 0,
                value:moment(new Date()).format('YYYY-MMM-DD HH:mm'),
                onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                          }
            });
            $('#new_subtask_end' + rowid + '').datetimepicker({value:"",onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                }
            });
            
            if(data.st_checked=="YES"){
                $(".tby_subtask tr:last-child :input").each(function(index){
                    if(!$(this).hasClass("chk-subtask-complete")) $(this).prop('disabled', true);
                })
                
           }
          $("#added_subtask_duration" + subtasknum).attr('data-duration',data.st_duration);

           $('#added_subtask_duration' + subtasknum + '').timeDurationPicker({
                      lang: 'en',
                      defaultValue: data.st_duration,
                      onselect: function(element, seconds, humanDuration) {

                        $(element).val(humanDuration);
                        $(element).attr('data-duration',seconds);
                        // console.log("duration picked--->");
                        // console.log(element,seconds, humanDuration);

                        var cur_id = $(element).attr("id").match(/\d+/);
                        if (($("#added_subtask_duration" + cur_id).val()) != "") {
                            var days=($("#added_subtask_duration" + cur_id).val().split('d')[0]);
                            var hours=($("#added_subtask_duration" + cur_id).val().split('h')[0]);
                            hours=hours.split('d')[1];
                            var minutes=($("#added_subtask_duration" + cur_id).val().split('m')[0]);
                            minutes=minutes.split('h')[1];
                            var new_end_time=new Date($("#added_subtask_start" + cur_id).val().replace(/-/g, ' '));
                            var end=new Date($("#added_subtask_end" + cur_id).val().replace(/-/g, ' '));

                            new_end_time=moment(new_end_time).add(days, 'days');
                            new_end_time=moment(new_end_time).add(hours, 'hours');
                            new_end_time=moment(new_end_time).add(minutes, 'minutes');

                            $("#added_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));

                            $("#added_subtask_start" + cur_id).focus();


                        }



                    }
                    });
           // console.log( $('#added_subtask_duration' + subtasknum + '').timeDurationPicker("getHumanDuration"));
          $('#added_subtask_duration' + subtasknum + '').val( $('#added_subtask_duration' + subtasknum + '').timeDurationPicker("getHumanDuration"));


            
    }

    function fun_tbl_updatetask(cur_id) {
            var startdaten = new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
            var enddaten = new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

            var newtaskname=$("#taskid_" + cur_id).find('[name="task_name"]:visible').val();
            //alert(newtaskname);

          
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/updatetaskNew',
                type: 'POST',
                data: {
                    utaskid: $("#taskid_" + cur_id).attr("data-taskid"),
                    utasklistid: $("#taskid_" + cur_id).attr("data-tasklistid"),
                    utask_name: newtaskname,
                    uduration: $("#taskid_" + cur_id).find('input[name="duration"]').attr("data-duration"),
                    ustart_date: moment(startdaten).format('YYYY-MM-DD HH:mm:ss'),
                    uend_date: moment(enddaten).format('YYYY-MM-DD HH:mm:ss'),
                },
                dataType: "json",
                beforeSend: function () {

                },
                success: function (data, textStatus) {
                    $("#taskid_" + cur_id).find('[name="task_name"]').val(newtaskname);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
    }
	
    /* function fun_updatesubtask(cur_id){
        var startdatec = new Date($("#added_subtask_start" + cur_id).val().replace(/-/g, ' '));
        var enddatec = new Date($("#added_subtask_end" + cur_id).val().replace(/-/g, ' '));
        var newsubtaskname=$("#subtaskrow_" + cur_id).find('[name="subtask_name"]:visible').val();

        $.ajax({
            url: '<?php echo site_url(); ?>yzy-tasks/index/updatesubtaskNew',
            type: 'POST',
            data: {
                uID: cur_id[0],
                uName: newsubtaskname,
                uStartdate: moment(startdatec).format('YYYY-MM-DD HH:mm:ss'),
                uEnddate: moment(enddatec).format('YYYY-MM-DD HH:mm:ss'),
                uDuration: $("#added_subtask_duration" + cur_id).attr('data-duration')

            },
            dataType: "json",

            success: function (data, textStatus) {

                $("#subtaskrow_" + cur_id).find('[name="subtask_name"]').val(newsubtaskname);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                         
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    } */
	
    /* function fun_updateDependency(element, id){

         var arrIds=new Array();
            $(".dd-menu-dependency li").each(function(index){
              if($(this).find('input').is(':checked')) arrIds.push($(this).attr('class').match(/\d+/));
            });
            
             $.ajax({
                    url: '<?php echo site_url(); ?>yzy-tasks/index/createDependency',
                    type: 'POST',
                    data: {
                        taskdataid: taskdataid,
                        arrIds: arrIds.join(),
                        pro_id:pro_id
                    },
                    dataType: "JSON",
                    success: function (data, textStatus) {
                       if(arrIds.length>0)
                       $('#dependency_img'+taskdataid).show();
                    else $('#dependency_img'+taskdataid).hide();
                       
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Some code to debbug e.g.:               
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });

        // if (element.checked) {

        //     // var trr = $(".sortable tr[data-taskid='" + id + "']")[0];
        //     // $(trr).clone().appendTo("#tbody_dep_" + taskid);
        //     // //$("#tbody_dep_" + taskid).append(trr);
        //     // $("#tbl_dep_" + taskid).addClass("shown");
        //     // $("#tbl_dep_" + taskid).show();
        //     // $("#tbody_dep_" + taskid + " tr").each(function (index) {
        //     //     $(this).find('td:first-child').html(index + 1);
        //     //     $(this).find('td:eq( 0 )').width('3.5%');
        //     //     $(this).find('td:eq( 1 )').hide();

        //     //     $(this).find('td:eq( 2 )').width('38.35%');
        //     //     $(this).find('td:eq( 3 )').width('10.3%');
        //     // });
        //     // $("#tbl_subtask_" + taskid).hide();
           

        // } else {

        //    $("#tbody_dep_"+taskid+' tr[data-taskid=' + id +']').remove();
        // }
    } */
    function dhm(ms){
        ms=ms*1000;
        days = Math.floor(ms / (24*60*60*1000));
        daysms=ms % (24*60*60*1000);
        hours = Math.floor((daysms)/(60*60*1000));
        hoursms=ms % (60*60*1000);
        minutes = Math.floor((hoursms)/(60*1000));
        minutesms=ms % (60*1000);
        sec = Math.floor((minutesms)/(1000));
        return days+"d "+hours+"h "+minutes+"m";
    }

    function updateTimetable(date,element){

       var date2=new Date(date);
       
       var cur_id = ($(element).attr('id').match(/\d+/));

        if ($(element).attr('id').indexOf("added_start_date") > -1) {
            
            if (($("#added_duration" + cur_id).val()) != "") {
              
                
                var days=($("#added_duration" + cur_id).val().split('d')[0]);
                var hours=($("#added_duration" + cur_id).val().split('h')[0]);
                hours=hours.split('d')[1];
                var minutes=($("#added_duration" + cur_id).val().split('m')[0]);
                minutes=minutes.split('h')[1];
                
                var new_end_time=new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
                var end=new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

                new_end_time=moment(new_end_time).add(days, 'days');
                new_end_time=moment(new_end_time).add(hours, 'hours');
                new_end_time=moment(new_end_time).add(minutes, 'minutes');

                $("#added_end_date" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
            }
           // $("#added_end_date" + cur_id).datetimepicker("change", {minDate: $("#added_start_date" + cur_id).datetimepicker('getDate')});

        }
        if ($(element).attr('id').indexOf("added_end_date") > -1) {
            if($("#added_end_date" + cur_id).val() !=""){


                var sdate = new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
                var edate = new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

                var diff = edate - sdate;

                if(diff>0){
                    $("#added_duration" + cur_id).val(dhm(diff/1000));
                    $("#added_duration" + cur_id).attr('data-duration',diff/1000);
                    $("#added_duration" + cur_id).timeDurationPicker("setDuration",diff/1000);
                }
                else{ 
                    $("#added_end_date" + cur_id).val("");
                    $("#added_duration" + cur_id).val("");
                    $("#added_duration" + cur_id).timeDurationPicker("setDuration",0);
                }

               

            } 


        }
        if ($(element).hasClass("addedentry")) {
           
            fun_tbl_updatetask(cur_id);
        }
       
    }

    function updateTimetableSub(date,element){

       var date2=new Date(date);
       
       var cur_id = ($(element).attr('id').match(/\d+/));

        if ($(element).attr('id').indexOf("added_subtask_start") > -1) {
            
            if (($("#added_subtask_duration" + cur_id).val()) != "") {
              
                var days=($("#added_subtask_duration" + cur_id).val().split('d')[0]);
                var hours=($("#added_subtask_duration" + cur_id).val().split('h')[0]);
                hours=hours.split('d')[1];
                var minutes=($("#added_subtask_duration" + cur_id).val().split('m')[0]);
                minutes=minutes.split('h')[1];
                
                var new_end_time=new Date($("#added_subtask_start" + cur_id).val().replace(/-/g, ' '));
                var end=new Date($("#added_subtask_end" + cur_id).val().replace(/-/g, ' '));

                new_end_time=moment(new_end_time).add(days, 'days');
                new_end_time=moment(new_end_time).add(hours, 'hours');
                new_end_time=moment(new_end_time).add(minutes, 'minutes');

                $("#added_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
            }
           

        }
        if ($(element).attr('id').indexOf("added_subtask_end") > -1) {
            if($("#added_subtask_end" + cur_id).val() !=""){

                var date = new Date($("#added_subtask_start" + cur_id).val().replace(/-/g, ' '));
                var date2 = new Date($("#added_subtask_end" + cur_id).val().replace(/-/g, ' '));


                var diff = date2 - date;
                if(diff>0) {
                    $("#added_subtask_duration" + cur_id).val(dhm(diff/1000));
                    $("#added_subtask_duration" + cur_id).attr('data-duration',diff/1000);
                    $("#added_subtask_duration" + cur_id).timeDurationPicker("setDuration",diff/1000);
                }
                else{
                    $("#added_subtask_end" + cur_id).val("");$("#added_subtask_duration" + cur_id).val("");
                    $("#added_subtask_duration" + cur_id).timeDurationPicker("setDuration",0);
                }

            }
        }
        if ($(element).hasClass("addedsubtask")) {
           
            fun_updatesubtask(cur_id);
        }
       
    }

    function updateTimetableSubNew(date,element){
       

       var date2=new Date(date);
       
       var cur_id = ($(element).attr('id').match(/\d+/));

        if ($(element).attr('id').indexOf("new_subtask_start") > -1) {
            
            if (($("#new_subtask_duration" + cur_id).val()) != "") {
              
                // date2.setDate(date.getDate() + Number( $("#new_subtask_duration" + cur_id).val().split('d')[0] ) );
                
                // $("#new_subtask_end" + cur_id).val(moment(date2).format('YYYY-MMM-DD HH:mm'));

                var days=($("#new_subtask_duration" + cur_id).val().split('d')[0]);
                var hours=($("#new_subtask_duration" + cur_id).val().split('h')[0]);
                hours=hours.split('d')[1];
                var minutes=($("#new_subtask_duration" + cur_id).val().split('m')[0]);
                minutes=minutes.split('h')[1];
                
                var new_end_time=new Date($("#new_subtask_start" + cur_id).val().replace(/-/g, ' '));
                var end=new Date($("#new_subtask_end" + cur_id).val().replace(/-/g, ' '));

                new_end_time=moment(new_end_time).add(days, 'days');
                new_end_time=moment(new_end_time).add(hours, 'hours');
                new_end_time=moment(new_end_time).add(minutes, 'minutes');

                $("#new_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
            }
            // $("#added_subtask_end" + cur_id).datetimepicker("change", {minDate: $("#added_start_date" + cur_id).datetimepicker('getDate')});

        }
        if ($(element).attr('id').indexOf("new_subtask_end") > -1) {
            if($("#new_subtask_end" + cur_id).val() !=""){

            var date = new Date($("#new_subtask_start" + cur_id).val().replace(/-/g, ' '));
            var date2 = new Date($("#new_subtask_end" + cur_id).val().replace(/-/g, ' '));
            
            
            var diff = date2 - date;
            if(diff>0){
                $("#new_subtask_duration" + cur_id).val(dhm(diff/1000)).attr("data-duration",diff/1000);
                $("#new_subtask_duration" + cur_id).timeDurationPicker("setDuration",diff/1000);
            }
            else{
                $("#new_subtask_end" + cur_id).val("");$("#new_subtask_duration" + cur_id).val("");
            $("#new_subtask_duration" + cur_id).timeDurationPicker("setDuration",0);
        }
        }
        }
        
       
    }

    // function fun_loadfulltable(pro_id){
    // var d = new Date();
    // var n = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " +  d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds() + " :::" + d.getMilliseconds();
    // //console.log(n);
    //  $.ajax({
    //         url: '<?php echo site_url(); ?>Projects/taskListNew',
    //         type: 'POST',
    //         data: {
    //             pro_id: pro_id
    //         },
    //         dataType: "JSON",
    //         beforeSend: function () {
    //             //console.log("Emptying");
    //         },
            
    //         success: function (data, textStatus) {
    //             //console.log('full data');
    //             //console.log(data);

    //             $(".sortable").empty();
    //             $(".tbody_completed").empty();
    //             newrownum=0;
    //             $('#added_duration' + newrownum + '').timeDurationPicker({
    //                 lang: 'en',
    //                 defaultValue: $('#added_duration' + newrownum + '').attr("data-duration"),
    //                 onselect: function(element, seconds, humanDuration) {
    //                     $(element).val(humanDuration);
    //                     $(element).attr('data-duration',seconds);
    //                     // console.log("duration picked--->");
    //                     // console.log(element,seconds, humanDuration);
    //                     //alert($(element).timeDurationPicker("getDays"));

    //                     var cur_id = $(element).attr("id").match(/\d+/);
    //                     if (($("#added_duration" + cur_id).val()) != "") {
    //                         var days=($("#added_duration" + cur_id).val().split('d')[0]);
    //                         var hours=($("#added_duration" + cur_id).val().split('h')[0]);
    //                         hours=hours.split('d')[1];
    //                         var minutes=($("#added_duration" + cur_id).val().split('m')[0]);
    //                         minutes=minutes.split('h')[1];

    //                         var new_end_time=new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
    //                         var end=new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

    //                         new_end_time=moment(new_end_time).add(days, 'days');
    //                         new_end_time=moment(new_end_time).add(hours, 'hours');
    //                         new_end_time=moment(new_end_time).add(minutes, 'minutes');

    //                         $("#added_end_date" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
    //                         $("#added_start_date" + cur_id).focus();
    //                     } 
    //                 }
    //             });
                
    //             $.each(data.allTask, function (i, item) {

    //                 $(".dd-menu-dependency").append('<li data-taskid=' + item.projecttaskid + '  class="deptaskid_' + item.projecttaskid + '"><a  class="cls-update-dep" ><input class="cls-chkbox-dep" id="chkbox_depid_' + item.projecttaskid + '" onchange="fun_updateDependency(this,' + item.projecttaskid + ')" type="checkbox">' + item.projecttaskname + ' </li>');

    //                 if (item.projecttaskhours == "") duration = ""
    //                     else duration = item.projecttaskhours;

    //                 // console.log("dhm(item.projecttaskhours)");
    //                 // console.log(dhm(item.projecttaskhours));

    //                 if (item.startdate == "0000-00-00 00:00:00") startdate = "";
    //                 else startdate = moment(item.startdate).format('YYYY-MMM-DD HH:mm');
                   
    //                 if (item.enddate == "0000-00-00 00:00:00") enddate = "";
    //                 else enddate = moment(item.enddate).format('YYYY-MMM-DD HH:mm');
                   
                    
    //                 newrownum += 1;

    //                 //if(item.parent_id==null){
    //                 if(item.task_status=="COMPLETE") 
    //                     var clas = 'chk-task-complete complete';
    //                 else
    //                     clas = 'chk-task-complete'
                        
    //                     var newrow = '<tr data-parent="' + item.parent_id + '" id="taskid_' + newrownum + '" class="item" data-taskid="' + item.projecttaskid + '" data-tasklistid="' + item.tasklistID + '">';
    //                     // Serial
    //                     newrow += '<td class="center-align-td size-family-weight" id="notifyID' + item.projecttaskid + '"><label id="added_task_serial' + newrownum + '">' + newrownum + '</label></td>'; 
    //                     newrow += '<td class="size-family-weight">';
    //                     newrow +='<div class="container-subcount">  <img id="img_st_open'+newrownum+'" class="cls-open-subtasks" width="30" height="30" src="<?php echo base_url(); ?>require/img/prio/subtask-open.png"> <img id="img_st_close'+newrownum+'"  class="cls-open-subtasks cls-close-qtip" style="display:none" width="30" height="30" src="<?php echo base_url(); ?>require/img/prio/subtask-close.png">   <div style="font-weight: bold !important;" id="subtaskcount_'+newrownum+'" class="subcount-center cls-open-subtasks">0</div></div> <input style="float: left;top: 10px;" id="tdInput' + item.projecttaskid + '"  onchange="taskComChk(this)" class="'+clas+'" type="checkbox" '+ (item.checked=="YES" ? "checked" : "") +'><input style="float: left;width:60%;outline:none;" id="added_task_name' + newrownum + '" value="' + item.projecttaskname + '" type="text" name="task_name" class="add-input-padding addedentry btn-gray context-menu-one"><textarea style="float:left;width:65%;height: 70px;display:none;" id="added_task_name'+newrownum+'_area" name="task_name" class="add-input-padding addedentry btn-gray context-menu-one textAreaEntry">' + item.projecttaskname + '</textarea> <span class="cls-exD-span" id="added_task_name' + newrownum + '_exD" style=""></span> ';

                        
    //                     newrow +='</td>';
    //                     // Duration
    //                     newrow += '<td class="size-family-weight"><input id="added_duration' + newrownum + '" value="' + duration + '" type="text" min="1" readonly name="duration" class="addedentry createduration btn-gray"><br></td>';
    //                     // Start Date
    //                     newrow += '<td class="size-family-weight"><input type="text" id="added_start_date' + newrownum + '" value="' + startdate + '" name="start_date" class="addedentry btn-gray datepicker_startend"><br></td>';
    //                     // End Date
    //                     newrow += '<td class="size-family-weight"><input type="text" id="added_end_date' + newrownum + '" value="' + enddate + '" name="end_date" class="addedentry btn-gray datepicker_startend"><br></td>';
    //                     // Tasklist
    //                     newrow+='<td class="size-family-weight"><input type="hidden" id="hi_sel_tasklist'+newrownum+'"><select id="added_sel_tasklist'+newrownum+'" name="tasklist" class="addedentry sel_tasklist" ></select></td>';
    //                 newrow += '</tr>';
                    

    //                 var taskid = newrownum;
    //                 var taskdataid = item.projecttaskid;

    //                 var newsubrow = '<tr id="taskchild_' + taskid + '" >'
    //                 + '<td colspan="6">'

    //                 + '<table id="tbl_subtask_' + taskid + '" class="table subtasktable" style="display:none;">'

    //                 + '<tbody data-taskid="'+taskdataid+'" class="tby_subtask" id="tbody_subtask_' + taskid + '">'
    //                 + '</tbody>'

    //                 + '<tfoot id="tfoot_subtask' + taskid + '" style="display:none;" class="trSubtaskNewEntry">'
    //                 + '<tr id="subtaskrow_' + taskid + '" data-taskid="' + taskdataid + '" data-tasklistid="' + item.tasklistID + '">'
    //                 + '<td>'
    //                 + '<label id="">*</label>'
    //                 + '</td>'

    //                 // + '<td>'
    //                 // + '</td>'

    //                 + '<td>'
    //                 + '<input id="new_subtask_name' + taskid + '" type="text" name="subtask_name" class="createsubtask">'
    //                 + '</td>'

    //                 + '<td>'
    //                 + '<input id="new_subtask_duration' + taskid + '" type="text" min="1" name="subtask_duration" class="createsubtask createduration_st">'
    //                 + '</td>'

    //                 + '<td>'
    //                 + '<input id="new_subtask_start' + taskid + '" type="text" name="subtask_start_date" class="createsubtask datepicker_startend_st">'
    //                 + '</td>'

    //                 + ' <td>'
    //                 + '<input id="new_subtask_end' + taskid + '" type="text" name="subtask_end_date" class="createsubtask datepicker_startend_st">'
    //                 + ' </td>'

    //                 + '</tr>'
    //                 + ' </tfoot>'
    //                 + '</table>'
    //                 + '</td>'
    //                 + '</tr>';

    //                 if(item.task_status=="COMPLETE") $(".tbody_completed").append(newrow);
    //                 else $(".sortable").append(newrow);
                    
    //                 //Added By dipok
                    
    //                 var inputid = "added_task_name"+newrownum;

    //                    $("#"+inputid+'_exD').append('<img style="display:none" id="stickynote_img'+taskdataid+'" src="<?php echo base_url(); ?>require/img/prio/stickynote.png"  class="open-sticky-note task-set-icon"/>');

    //                    $("#"+inputid+'_exD').append('<img style="display:none" id="dependency_img'+taskdataid+'" src="<?php echo base_url(); ?>require/images/menuimg/businessman-linked-to-money-and-time.png"  class="open-dependency task-set-icon"/>');

    //                 if(item.projecttaskpriority != null && item.projecttaskpriority != ''){
                       
    //                     switch(item.projecttaskpriority){
    //                         case 'High':
    //                                     $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/high.png"  class="cls-open-settings task-set-icon propertyImg'+inputid+'" />');
    //                                     break;
    //                         case 'Low':
    //                                     $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/low.png" class="cls-open-settings task-set-icon propertyImg'+inputid+'"/>');
    //                                     break;
    //                         case 'Normal':
    //                                     $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/normal.png" class="cls-open-settings task-set-icon propertyImg'+inputid+'"/>');
    //                                     break;

    //                     }
                        
    //                 }

    //                 //if(item.attach != null && item.attach != ''){
                      
    //                    var countAttact = 0;
    //                     $.each(data.allAttach, function (i, valu) {
    //                         if(data.allAttach[i].typeID == item.projecttaskid){
    //                             countAttact++;
    //                             // console.log(countAttact);
    //                         }    
    //                     });
                    
    //                 if(countAttact != null && countAttact != 0){
    //                     //changeTagImgonLoad(inputid,item.projecttaskpriority,item.projecttaskid,'bg-red','priority');
    //                     //alert(item.projecttaskpriority);
    //                    $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/attach.png" class="cls-open-attachment task-set-icon"/>');
    //                    //<span style="float: right;right: -4%;margin-top: 21%;font-size: 8px !important;">'+countAttact+'</span>
                        
    //                 }
                     
                   
    //                 var user_id = '<?php echo $id; ?>';
    //                 if(item.opened_by != user_id){
                    
    //                    $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/shared.png" class="cls-open-settings task-set-icon"/>');
    //                 }
                  
                    
    //                 if(item.task_status=="COMPLETE"){
                       
    //                     qTipAdd2($(".tbody_completed tr:last-child").find('input[id^="added_task_name"]'));
    //                    // qTipAdd2($(".tbody_completed tr:last-child").find('[id^="trd_td"]'));
    //                     //qTipSticky($(".tbody_completed tr:last-child").find('.open-sticky-note'),item.projecttaskid);

                       
    //                     if(item.stickynote){                  
    //                      $($(".tbody_completed tr:last-child").find('.open-sticky-note')).show();
                       
    //                     if(item.notepopup==1)                     
    //                      $($(".tbody_completed tr:last-child").find('.open-sticky-note')).trigger('click');
    //                     }
                       
    //                 }
    //                 else{
    //                    qTipAdd2($(".sortable tr:last-child").find('input[id^="added_task_name"]'));
    //                    //qTipAdd2($(".sortable tr:last-child").find('[id^="trd_td"]'));
    //                    //qTipSticky($(".sortable tr:last-child").find('.open-sticky-note'),item.projecttaskid);
    //                     qTipDependency($(".sortable tr:last-child").find('.open-dependency'),item.projecttaskid);
                        
    //                     if(item.stickynote){
    //                     $($(".sortable tr:last-child").find('.open-sticky-note')).show();
    //                     if(item.notepopup==1) 
    //                      $($(".sortable tr:last-child").find('.open-sticky-note')).trigger('click');
    //                     }
                        
                        
                        
    //                     if(item.dependency !=null) 
    //                      $($(".sortable tr:last-child").find('.open-dependency')).show();


                        
    //                 }

    //                 if(item.task_status=="COMPLETE"){
    //                     $(".tbody_completed").append(newsubrow);
    //                 }
    //                 else{
    //                     $(".sortable").append(newsubrow);
    //                 }
                   
    //                 $('#added_duration' + newrownum + '').attr("data-duration",duration);

    //                 $('#added_duration' + newrownum + '').timeDurationPicker({
    //                   lang: 'en',
    //                   defaultValue: $('#added_duration' + newrownum + '').attr("data-duration"),
    //                     onselect: function(element, seconds, humanDuration) {

    //                         $(element).val(humanDuration);
    //                         $(element).attr('data-duration',seconds);
    //                         // console.log("duration picked--->");
    //                         // console.log(element,seconds, humanDuration);

    //                         var cur_id = $(element).attr("id").match(/\d+/);
    //                         if (($("#added_duration" + cur_id).val()) != "") {
    //                             var days=($("#added_duration" + cur_id).val().split('d')[0]);
    //                             var hours=($("#added_duration" + cur_id).val().split('h')[0]);
    //                             hours=hours.split('d')[1];
    //                             var minutes=($("#added_duration" + cur_id).val().split('m')[0]);
    //                             minutes=minutes.split('h')[1];

    //                             var new_end_time=new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
    //                             var end=new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

    //                             new_end_time=moment(new_end_time).add(days, 'days');
    //                             new_end_time=moment(new_end_time).add(hours, 'hours');
    //                             new_end_time=moment(new_end_time).add(minutes, 'minutes');

    //                             $("#added_end_date" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
    //                             $("#added_start_date" + cur_id).focus();
                                
    //                         } 
    //                         fun_tbl_updatetask(cur_id);

    //                     }
    //                 });
                   
    //                 $('#added_duration' + newrownum + '').val($('#added_duration' + newrownum + '').timeDurationPicker("getHumanDuration"));

    //                 $('#added_start_date' + newrownum).datetimepicker({
                        
    //                     format: 'Y-M-d H:i',
    //                     minDate:0,
    //                     onChangeDateTime:  function (ct,$input) {
    //                             updateTimetable(ct,$input);

    //                       },
                        
    //                 });

                   

    //                 $('#added_end_date' + newrownum + '').datetimepicker({

    //                     format: 'Y-M-d H:i',
    //                     //minDate: $('#added_start_date'+newrownum).val(),
    //                     onChangeDateTime:  function (ct,input) {
    //                         updateTimetable(ct,input);

    //                         var serial=($(input).attr("id").match(/\d+/)[0]);

    //                        if($('#added_start_date'+serial).val().split(" ")[0]==$('#added_end_date'+serial).val().split(" ")[0]){
                            
    //                         this.setOptions({
                                
    //                         minDate: $('#added_start_date'+serial).val().split(" ")[0],
    //                         //defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
    //                         formatDate:'Y-M-d',
    //                         minTime: $('#added_start_date'+serial).val().split(" ")[1],
    //                         //defaultTime: $('#added_start_date'+serial).val().split(" ")[1],
    //                         formatTime:'H:i',
    //                         })

    //                        }else{
                            
    //                         this.setOptions({
                                

    //                             minDate: $('#added_start_date'+serial).val().split(" ")[0],
    //                         //defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
    //                         formatDate:'Y-M-d',
    //                         minTime: "00:00",
    //                         //defaultTime: "00:00",
    //                         formatTime:'H:i',
                                
    //                         })

    //                        }
    //                     },
                        
    //                 });

    //                 $('#new_subtask_name' + newrownum + '').val("");
                    
    //                 $('#new_subtask_duration' + newrownum + '').val("").attr("data-duration","0");
    //                 $('#new_subtask_duration' + newrownum + '').timeDurationPicker({
    //                   lang: 'en',
    //                   defaultValue: 0,
    //                   onselect: function(element, seconds, humanDuration) {
    //                     $(element).val(humanDuration);
    //                     $(element).attr('data-duration',seconds);


    //                     var cur_id = $(element).attr("id").match(/\d+/);
    //                     if (($("#new_subtask_duration" + cur_id).val()) != "") {
    //                         var days=($("#new_subtask_duration" + cur_id).val().split('d')[0]);
    //                         var hours=($("#new_subtask_duration" + cur_id).val().split('h')[0]);
    //                         hours=hours.split('d')[1];
    //                         var minutes=($("#new_subtask_duration" + cur_id).val().split('m')[0]);
    //                         minutes=minutes.split('h')[1];
    //                         var new_end_time=new Date($("#new_subtask_start" + cur_id).val().replace(/-/g, ' '));
    //                         var end=new Date($("#new_subtask_end" + cur_id).val().replace(/-/g, ' '));

    //                         new_end_time=moment(new_end_time).add(days, 'days');
    //                         new_end_time=moment(new_end_time).add(hours, 'hours');
    //                         new_end_time=moment(new_end_time).add(minutes, 'minutes');
                            
    //                         $("#new_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
    //                         $("#new_subtask_start" + cur_id).focus();

    //                     }


    //                 }
    //             });




    //             $('#new_subtask_start' + newrownum + '').datetimepicker({
    //                 minDate: 0,
    //                 value:moment(new Date()).format('YYYY-MMM-DD HH:mm'),
    //                 format: 'Y-M-d H:i',
    //                 onChangeDateTime:  function (ct,$input) {
    //                         updateTimetableSubNew(ct,$input)
    //                   }
    //             });

    //                 $('#new_subtask_end' + newrownum + '').datetimepicker({
    //                     format: 'Y-M-d H:i',
    //                     onChangeDateTime:  function (ct,$input) {
    //                             updateTimetableSubNew(ct,$input)
    //                       },
    //                     //value:moment(new Date()).format('YYYY-MMM-DD HH:mm')
    //                 });

    //             });
                
    //             $.each(data.countsubtask, function (i, value) {
    //                 $('.sortable tr[data-taskid="'+value.taskid+'"').find('.subcount-center').html(value.nosubtask);
    //             });


    //           $('.sel_tasklist').empty();
    //           //console.log("data.allSubTask");console.log(data.allSubTask);
              
    //           $.each(data.allTasklist, function( index, data ) {
    //             jsTaskList.push(data.name);
    //             jsTaskListID.push(data.inputDiv);
    //             $('.sel_tasklist').append($("<option/>", {
    //                 value: data.inputDiv,
    //                 text: data.name
    //             }));
    //           });

    //           $('.item').each(function (i, row) {
    //             $(this).find('select ').val($(this).attr("data-tasklistid"));
    //             var sel_text=($(this).find('select option:selected').text());

    //             $(this).find('td:last').find('input').val(sel_text);


    //           });

    //           $('.sel_tasklist').select2({tags: true,width: '100%'});
    //           $('.sortable .select2-selection__rendered').addClass('btn-gray');

    //           if(data.get_comptable[0].show_complete==1){

    //                 $("#tbl_TaskCompleted").show();
    //             }else{
                    
    //                 $("#tbl_TaskCompleted").hide();
    //             }

    //            $("#tbl_TaskCompleted :input").each(function(index){
    //                 if(!$(this).hasClass("chk-task-complete")) $(this).prop('disabled', true);
    //             });

    //             $("#tbl_TaskCompleted tr").each(function(index){
    //                 $(this).css("font-style","italic");
    //             });



    //             d = new Date();
    //             n = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " +  d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds() + " :::" + d.getMilliseconds();
    //             //console.log(n);
                
    //         //var notID = "<?php //echo $taskID; ?>";
     
    //         //alert(notID);

    //          if(notID != -1){
    //             $('#notifyID'+notID).prepend('<div class="tw-tutorial-tooltip-doT" id="blinkerNotice" style = "display:block; left: 10px;" ><div class="tw-tutorial-tooltip-dot --outer"></div><div class="tw-tutorial-tooltip-dot --mid"></div><div class="tw-tutorial-tooltip-dot --inner"></div></div>');
    //          }

    //          var divPositionPro = $('#notifyID'+notID).offset();
    //          //alert(divPositionPro);
    //          if(divPositionPro != undefined ){
    //             $('html, body').animate({scrollTop: divPositionPro.top}, "slow");
    //          }
      
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             // Some code to debbug e.g.:               
    //             console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
    //         }
    //     });


		
    
    

    // }
    

  $(document).ready(function () {

        
        jsTaskList = new Array();
        jsTaskListID = new Array();

        new_tasklist_name = null;
        new_tasklist_id = null;

        $("#added_sel_tasklist0").select2({
            tags: true,width: '100%'
        });
        
        $("#added_start_date0").datetimepicker({
            minDate:0,
            value:moment(new Date()).format('YYYY-MMM-DD HH:mm'),
            format: 'Y-M-d H:i',
            onChangeDateTime:  function (ct,$input) {
                    updateTimetable(ct,$input);

              },
            });
        
       

        $("#added_end_date0").datetimepicker({
                        format: 'Y-M-d H:i',
                        onChangeDateTime:  function (ct,$input) {
                                updateTimetable(ct,$input);

                          },
                    });
        // $("#added_end_date0").datetimepicker("change", {minDate: $("#added_start_date0").datetimepicker('getDate')});

        setTimeout(function () {$("#added_task_name0").focus();}, 0);

        
        //fun_loadfulltable(pro_id);
        //getpriolist('ALL');

        var winsize = window.innerWidth;

        //console.log(winsize);
        
        if(winsize < 361){
            //
        }else{
            fun_loadfulltable(pro_id);
        }


        $("#table_container").on('focus mousedown', '.datepicker_startend', function (event) {
             var di=$(this).attr("id");
           
                   
        });

        $("#table_container").on('focus mousedown', '.datepicker_startend_st', function (event) {

           var di=$(this).attr("id");
           
                   // $("#"+di).datetimepicker('show');
        });


       
        function timeConvert(time) { 
           return Math.floor(time/8/60) + "d " + Math.floor(time/60%8) + 'h ' + Math.floor(time%60) + 'm';
         }
         function setCharAt(str,index,chr) {
            if(index > str.length-1) return str;
            return str.substr(0,index) + chr + str.substr(index+1);
        }
         $("#table_container").on('click', '.createduration,.createduration_st', function (event) {

            if($('#dp_'+$(this).attr('id')).attr('data-status')=="show"){
                $('#dp_'+$(this).attr('id')).show();
                $('#dp_'+$(this).attr('id')).attr('data-status','hide');
                $('.cls_duration_days_'+$(this).attr('id')).focus().select();

            }
            else{
                $('#dp_'+$(this).attr('id')).hide();
                $('#dp_'+$(this).attr('id')).attr('data-status','show');
            }
           
         });
       
        $("#table_container").on('blur', '.addedsubtask', function (event) {
            var cur_id = (this.id.match(/\d+/));
            fun_updatesubtask(cur_id);

        });

         $("#table_container").on('keyup', 'tr :input', function (event) {
           // console.log(this);
             // left arrow
            if (event.keyCode == 37) {

                $(this).closest('td').prev('td').find('input').focus();

                    $("#"+$(this).attr("id")).datetimepicker('hide');

                // if (this.id.indexOf("added_start_date") > -1 || this.id.indexOf("added_subtask_start") > -1) {
                   

                // }
            }

            // right arrow
            if (event.keyCode == 39) {
               
                $("#"+$(this).attr("id")).datetimepicker('hide');
                $(this).closest('td').next('td').find('input').focus();
            }

            // up arrow
            if (event.keyCode == 38) {

               $("#"+$(this).attr("id")).datetimepicker('hide');
                if($(this).hasClass("createnewentry")){
                    // console.log($(this).closest('tfoot'));
                    $(this).closest('tfoot').prev().find('tr:last-child').prev('tr').find('input[name*=' + $(this).attr('name') + ']').focus();
                }
               if($(this).hasClass("addedentry")){
               

                    var getchilds=($(this).closest('tr').prev('tr').find('table'));
                    
                    
                    if($(getchilds[1]).is(":visible")){
                       
                       
                        $(getchilds[1]).find('tr:last-child').find('input[name*=' + $(this).attr('name') + ']').focus();
                        $("#"+$(getchilds[1]).find('tr:last').find('input[name*=' + $(this).attr('name') + ']').attr('id')).datetimepicker('hide') ;
                    }else{
                        $(this).closest('tr').prev('tr').prev('tr').find('input[name*=' + $(this).attr('name') + ']').focus();
                    }
                }
                if($(this).hasClass("addedsubtask")){
                     var attname=$(this).attr('name');
                    
                    if($(this).closest('tr').is(':first-child'))
                    {
                        // console.log($(this).closest('[id^="taskchild_"]').prev('tr'));
                        $(this).closest('[id^="taskchild_"]').prev('tr').find('input[name*=' + attname.substring(8) + ']').focus();
                    }else{
                        $(this).closest('tr').prev('tr').find('input[name*=' + $(this).attr('name') + ']').focus();
                    }
                }
                if($(this).hasClass("createsubtask")){

                   var attname=$(this).attr('name');
                  if(event.keyCode == 38){
                    
                    if($(this).closest('tfoot').prev().find('tr').length>0){
                   $(this).closest('tfoot').prev().find('tr:last-child').find('input[name*=' + attname + ']').focus();
                }else{
                    // console.log( $(this).closest('[id^="taskchild_"'));
                    $(this).closest('[id^="taskchild_"').prev('tr').find('input[name*=' + attname.substring(8) + ']').focus();
                   }
                    }else{
                        
                    }
                }
            }

            // down arrow
                if (event.keyCode == 40) {
                     $("#"+$(this).attr("id")).datetimepicker('hide');
                    if($(this).hasClass("addedentry")){
                        var getchilds=($(this).closest('tr').next('tr').find('table'));
                        
                        
                        if($(getchilds[1]).is(":visible")){

                            $(getchilds[1]).find('tr:eq(0)').find('input[name*=' + $(this).attr('name') + ']').focus();
                        }else{
                            if($(this).closest('tr').next('tr').is(':last-child'))
                            {
                                $(this).closest('tbody').next().find('input[name*=' + $(this).attr('name') + ']').focus();
                            }else{
                             $(this).closest('tr').next('tr').next('tr').find('input[name*=' + $(this).attr('name') + ']').focus();
                         }
                     }
                 }
                if($(this).hasClass("addedsubtask")){

                    
                    if($(this).closest('tr').is(':last-child'))
                    {
                        $(this).closest('table').find('tfoot').find('input[name*=' + $(this).attr('name') + ']').focus();
                    }else{
                        $(this).closest('tr').next('tr').find('input[name*=' + $(this).attr('name') + ']').focus();
                    }
                }
                if($(this).hasClass("createsubtask")){

                   var attname=$(this).attr('name');
                  if(event.keyCode == 40){
                   $(this).closest('tr[id^="taskchild_"]').next('tr').find('input[name*=' + attname.substring(8) + ']').focus();
                    }else{

                    }
                }
            }
         });

        $("#table_container").on('blur', '.addedentry', function (event) {
            var cur_id = (this.id.match(/\d+/));
            
            fun_tbl_updatetask(cur_id);

        });

        $(document).on('keyup', '.sortable [id^="added_task_name"]', function (e) {
           
            var qtipAPI = $(this).closest('td').find('input[type="text"]').qtip("api");
            qtipAPI.set('content.text', '<div class="qtip-fontsize">'+$(this).val()+'</div>');
             qtipAPI.reposition();
             
          });
          
          $(document).on('mouseover', 'a[title]', function (e) {
            //console.log('title hover');console.log(e);
          
            var qtipAPI = $(e.currentTarget).qtip("api");
            //console.log(qtipAPI);
            // qtipAPI.set('content.text', 'yes');
            //  qtipAPI.reposition();
             
          });

        $(document).on('keyup', '.sortable [id^="added_subtask_name"]', function (e) {
           
            var qtipAPI = $(this).closest('td').find('input[type="text"]').qtip("api");
            qtipAPI.set('content.text', '<div class="qtip-fontsize">'+$(this).val()+'</div>');
             qtipAPI.reposition();
             
          });


        /* $("#table_container").on('keyup', '.createnewentry', function (event) {
            var cur_id = (this.id.match(/\d+/));

            
            if (event.keyCode == 13) {
                if($("#added_task_name0").val() !=""){
                newrownum += 1;
                var newrow = '<tr id="taskid_' + newrownum + '" class="item" data-tasklistid="' + $("#taskid_0").attr("data-tasklistid") + '">';

                newrow += '<td class="center-align-td size-family-weight"><label id="added_task_serial' + newrownum + '">' + newrownum + '</label></td>';
                
                // newrow += '<td style="text-align: center ! important;"> <i class="fa fa-arrow-down details-dep" style="display:none;font: normal normal normal 30px/1 FontAwesome !important;"></i> <i style="display:none" class="fa fa-outdent details-subtask" style="margin-left: 10%; margin-right: 10%;font: normal normal normal 30px/1 FontAwesome !important;"></i> <i id="popqt_' + newrownum + '" class="fa fa-gear details-menuopen" aria-hidden="true" style="font: normal normal normal 30px/1 FontAwesome !important;"></i></td>';

                // Inputs
                newrow += '<td>'
                newrow +='<div class="container-subcount">  <img id="img_st_open'+newrownum+'" class="cls-open-subtasks" width="30" height="30" src="<?php echo base_url(); ?>require/img/prio/subtask-open.png"> <img id="img_st_close'+newrownum+'"  class="cls-open-subtasks cls-close-qtip" style="display:none" width="30" height="30" src="<?php echo base_url(); ?>require/img/prio/subtask-close.png">   <div id="subtaskcount_'+newrownum+'" class="subcount-center cls-open-subtasks">0</div></div> <input style="float: left;top: 10px;" id="tdInput' + newrownum + '" onchange="taskComChk(this)" class="chk-task-complete" type="checkbox"><input style="float: left;width:70%";outline:none; id="added_task_name' + newrownum + '" type="text" name="task_name" class="add-input-padding addedentry btn-gray context-menu-one"> <textarea style="float:left;width:80%;height: 70px;display:none;" id="added_task_name'+newrownum+'_area" name="task_name" class="add-input-padding addedentry btn-gray context-menu-one textAreaEntry"></textarea><span id="added_task_name' + newrownum + '_exD" class="cls-exD-span" style=""></span> ';

               
                newrow +='</td>';

                newrow += '<td><input id="added_duration' + newrownum + '" type="text" min="1" name="duration" readonly class="addedentry createduration btn-gray"><br></td>';
                newrow += '<td><input type="text" id="added_start_date' + newrownum + '" name="start_date" class="addedentry btn-gray datepicker_startend"><br></td>';
                newrow += '<td><input type="text" id="added_end_date' + newrownum + '" name="end_date" class="addedentry btn-gray datepicker_startend"><br></td>';
                newrow+='<td><input type="hidden" id="hi_sel_tasklist'+newrownum+'"><select id="added_sel_tasklist'+newrownum+'" name="tasklist" class="addedentry sel_tasklist" ></select></td>';
                newrow += '</tr>';

                $(".sortable").append(newrow);
                //qTipAdd($(".sortable tr:last-child").find('.details-menuopen'));
                qTipAdd2($(".sortable tr:last-child").find('input[id^="added_task_name"]'));


                // database save
                $.ajax({
                    url: '<?php echo site_url(); ?>yzy-tasks/index/savePopTaskNew',
                    type: 'POST',
                    data: {
                        taskName: $("#added_task_name0").val(),
                        pid: pro_id,
                        tasklistId: $("#taskid_0").attr("data-tasklistid"),
                        projecttaskcode: newrownum,
                        startdate: moment(new Date($("#added_start_date0").val().replace(/-/g, ' ') )).format('YYYY-MM-DD HH:mm:ss'),
                        enddate: moment(new Date($("#added_end_date0").val().replace(/-/g, ' ') )).format('YYYY-MM-DD HH:mm:ss'),
                        duration: $("#added_duration0").attr("data-duration")
                    },
                    dataType: "JSON",
                    success: function (data, textStatus) {

                        $("#taskid_" + newrownum).attr("data-taskid", data.taskInsertID);
                        $("#added_task_name" + newrownum).val($("#added_task_name0").val());

                         var inputid = "added_task_name"+newrownum;

                       $("#"+inputid+'_exD').append('<img style="display:none" id="stickynote_img'+data.taskInsertID+'" src="<?php echo base_url(); ?>require/img/prio/stickynote.png"  class="open-sticky-note task-set-icon"/>');

                       $("#"+inputid+'_exD').append('<img style="display:none" id="dependency_img'+data.taskInsertID+'" src="<?php echo base_url(); ?>require/images/menuimg/businessman-linked-to-money-and-time.png"  class="open-dependency task-set-icon"/>');


                       qTipSticky($(".sortable tr:last-child").find('.open-sticky-note'),data.taskInsertID);
                        qTipDependency($(".sortable tr:last-child").find('.open-dependency'),data.taskInsertID);
                        
                        $("#added_duration" + newrownum).attr('data-duration',$("#added_duration0").attr('data-duration'));

                        $('#added_duration' + newrownum + '').timeDurationPicker({
                          lang: 'en',
                          defaultValue: $('#added_duration' + newrownum + '').attr("data-duration"),

                          onselect: function(element, seconds, humanDuration) {
                            $(element).val(humanDuration);
                            $(element).attr('data-duration',seconds);


                            var cur_id = $(element).attr("id").match(/\d+/);
                            if (($("#added_duration" + cur_id).val()) != "") {
                                var days=($("#added_duration" + cur_id).val().split('d')[0]);
                                var hours=($("#added_duration" + cur_id).val().split('h')[0]);
                                hours=hours.split('d')[1];
                                var minutes=($("#added_duration" + cur_id).val().split('m')[0]);
                                minutes=minutes.split('h')[1];

                                var new_end_time=new Date($("#added_start_date" + cur_id).val().replace(/-/g, ' '));
                                var end=new Date($("#added_end_date" + cur_id).val().replace(/-/g, ' '));

                                new_end_time=moment(new_end_time).add(days, 'days');
                                new_end_time=moment(new_end_time).add(hours, 'hours');
                                new_end_time=moment(new_end_time).add(minutes, 'minutes');

                                $("#added_end_date" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));

                                $("#added_start_date" + cur_id).focus();
                                
                            } 
                            

                        }
                    });
                        $("#added_duration" + newrownum).val($('#added_duration' + newrownum + '').timeDurationPicker("getHumanDuration"))

                        $("#added_start_date" + newrownum).val($("#added_start_date0").val());
                        $("#added_end_date" + newrownum).val($("#added_end_date0").val());
                        $("#added_task_name0").val("");
                        $("#added_duration0").attr("data-duration",0).val("");

                        $("#added_duration0").timeDurationPicker("setDuration",0);

                        $('#added_start_date' + newrownum + '').datetimepicker({
                            format: 'Y-M-d H:i',
                            minDate: 0,
                            onChangeDateTime:  function (ct,$input) {
                                updateTimetable(ct,$input);

                          },
                            onShow:function( ct ){

                             this.setOptions({
                                minDate:0
                            })
                         }
                     });
                        $('#added_end_date' + newrownum + '').datetimepicker({
                            format: 'Y-M-d H:i',
                            onChangeDateTime:  function (ct,input) {
                            updateTimetable(ct,input);

                            var serial=($(input).attr("id").match(/\d+/)[0]);

                           if($('#added_start_date'+serial).val().split(" ")[0]==$('#added_end_date'+serial).val().split(" ")[0]){
                            
                            this.setOptions({
                                
                            minDate: $('#added_start_date'+serial).val().split(" ")[0],
                            //defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: $('#added_start_date'+serial).val().split(" ")[1],
                            //defaultTime: $('#added_start_date'+serial).val().split(" ")[1],
                            formatTime:'H:i',
                            })

                           }else{
                            
                            this.setOptions({
                                

                                minDate: $('#added_start_date'+serial).val().split(" ")[0],
                            //defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                            formatDate:'Y-M-d',
                            minTime: "00:00",
                            //defaultTime: "00:00",
                            formatTime:'H:i',
                                
                            })

                           }
                        }
                        });

                        $(".dd-menu-dependency").append('<li data-taskid=' + data.taskInsertID + '  class="deptaskid_' + data.taskInsertID + '"><a  class="cls-update-dep" ><input class="cls-chkbox-dep" id="chkbox_depid_' + data.taskInsertID + '" onchange="fun_updateDependency(this,' + data.taskInsertID + ')" type="checkbox">' + $("#added_task_name" + newrownum).val() + ' </li>');

                        $('#added_start_date0').datetimepicker({

                            format: 'Y-M-d H:i',
                            minDate:0,
                            onChangeDateTime:  function (ct,$input) {
                                updateTimetable(ct,$input);

                            },
                            onShow:function( ct,input ){
                                var serial=($(input).attr("id").match(/\d+/)[0]);

                                this.setOptions({
                                    maxDate: $('#added_end_date'+serial).val().split(" ")[0],formatDate:'Y-M-d',

                                })
                            }
                        });



                        $('#added_end_date0').datetimepicker({

                            format: 'Y-M-d H:i',
                            minDate: $('#added_start_date'+newrownum).val(),
                            onChangeDateTime:  function (ct,input) {
                                updateTimetable(ct,input);

                                var serial=($(input).attr("id").match(/\d+/)[0]);

                                if($('#added_start_date'+serial).val().split(" ")[0]==$('#added_end_date'+serial).val().split(" ")[0]){

                                    this.setOptions({

                                        minDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        //defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        formatDate:'Y-M-d',
                                        minTime: $('#added_start_date'+serial).val().split(" ")[1],
                                       // defaultTime: $('#added_start_date'+serial).val().split(" ")[1],
                                       formatTime:'H:i'
                                   })

                                }else{

                                    this.setOptions({
                                        minDate: $('#added_start_date'+serial).val().split(" ")[0],
                                       // defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                                       formatDate:'Y-M-d',
                                       minTime: "00:00",
                                       // defaultTime: "00:00",
                                       formatTime:'H:i'

                                   })

                                }
                            },
                            onShow:function( ct,input ){
                                var serial=($(input).attr("id").match(/\d+/)[0]);

                                if($('#added_end_date'+serial).val()=="" || ($('#added_start_date'+serial).val().split(" ")[0]==$('#added_end_date'+serial).val().split(" ")[0])){

                                    this.setOptions({


                                        minDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        formatDate:'Y-M-d',
                                        minTime: $('#added_start_date'+serial).val().split(" ")[1],
                                        defaultTime: $('#added_start_date'+serial).val().split(" ")[1],
                                        formatTime:'H:i'
                                    })

                                }else{

                                    this.setOptions({
                                        minDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        defaultDate: $('#added_start_date'+serial).val().split(" ")[0],
                                        formatDate:'Y-M-d',
                                        minTime: "00:00",
                                        defaultTime: "00:00",
                                        formatTime:'H:i'

                                    })

                                }
                            }
                        });

                        $.each(jsTaskList, function (index, value) {

                            $("#added_sel_tasklist" + newrownum).append($("<option/>", {
                                value: jsTaskListID[index],
                                text: value
                            }));
                        });

                        $('#added_sel_tasklist' + newrownum + ' option[value=' + $("#taskid_0").attr("data-tasklistid") + ']').prop("selected", "selected");
                        $('#added_sel_tasklist0 option[value=' + $("#taskid_0").attr("data-tasklistid") + ']').prop("selected", "selected");
                        $("#hi_sel_tasklist" + newrownum).val($('#added_sel_tasklist' + newrownum + ' :selected').text());


                        $('#added_sel_tasklist' + newrownum + '').select2({
                            tags: true, width: '100%'
                        });

                        $('#select2-added_sel_tasklist' + newrownum + '-container').addClass('btn-gray');

                        $('#added_sel_tasklist0').select2({
                            tags: true, width: '100%'
                        });

                        var taskid = newrownum;
                        var taskdataid = data.taskInsertID;

                        var newsubrow = '<tr>'
                        + '<td colspan="7">'
                        + '<table id="tbl_dep_' + taskid + '" class="table table-bordered table-hover" style="display:none;margin-left: 2.1%; width: 97.9%;">'


                        + '<tbody class="tbody_dep" id="tbody_dep_' + taskid + '">'
                        + '</tbody>'


                        + '</table>'

                        + '<table id="tbl_subtask_' + taskid + '" class="table subtasktable" style="display:none">'


                        + '<tbody data-taskid="'+taskdataid+'" class="tby_subtask" id="tbody_subtask_' + taskid + '">'


                        + '</tbody>'

                        + '<tfoot id="tfoot_subtask' + taskid + '" style="display:none;" class="trSubtaskNewEntry">'
                        + '<tr id="subtaskrow_' + taskid + '" data-taskid="' + taskdataid + '">'

                        + '<td>'

                        + '<label id="">*</label>'
                        + '</td>'

                        // + '<td>'

                        // + '</td>'

                        + '<td>'
                        + '<input id="new_subtask_name' + taskid + '" type="text" name="subtask_name" class="createsubtask">'
                        + '</td>'

                        + '<td>'
                        + '<input id="new_subtask_duration' + taskid + '" type="text" min="1" name="subtask_duration" class="createsubtask createduration_st">'
                        + '</td>'

                        + '<td>'
                        + '<input id="new_subtask_start' + taskid + '" type="text" name="subtask_start_date" class="createsubtask datepicker_startend_st">'
                        + '</td>'

                        + ' <td>'
                        + '<input id="new_subtask_end' + taskid + '" type="text" name="subtask_end_date" class="createsubtask datepicker_startend_st">'
                        + ' </td>'


                        + '</tr>'
                        + ' </tfoot>'
                        + '</table>'
                        + '</td>'
                        + '</tr>';
                        $(".sortable").append(newsubrow);

                        $('#new_subtask_start' + taskid + '').datetimepicker({
                            minDate:0,
                            value:moment(new Date()).format('YYYY-MMM-DD HH:mm'),
                            format: 'Y-M-d H:i',
                            onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                            }
                        });

                        $('#new_subtask_end' + taskid + '').datetimepicker({
                            format: 'Y-M-d H:i',
                            onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                            }
                        });

                        $('#new_subtask_duration' + taskid + '').val("").attr("data-duration","0");
                    $('#new_subtask_duration' + taskid + '').timeDurationPicker({
                      lang: 'en',
                      defaultValue: 0,
                      onselect: function(element, seconds, humanDuration) {
                        $(element).val(humanDuration);
                        $(element).attr('data-duration',seconds);


                        var cur_id = $(element).attr("id").match(/\d+/);
                        if (($("#new_subtask_duration" + cur_id).val()) != "") {
                            var days=($("#new_subtask_duration" + cur_id).val().split('d')[0]);
                            var hours=($("#new_subtask_duration" + cur_id).val().split('h')[0]);
                            hours=hours.split('d')[1];
                            var minutes=($("#new_subtask_duration" + cur_id).val().split('m')[0]);
                            minutes=minutes.split('h')[1];
                            var new_end_time=new Date($("#new_subtask_start" + cur_id).val().replace(/-/g, ' '));
                            var end=new Date($("#new_subtask_end" + cur_id).val().replace(/-/g, ' '));

                            new_end_time=moment(new_end_time).add(days, 'days');
                            new_end_time=moment(new_end_time).add(hours, 'hours');
                            new_end_time=moment(new_end_time).add(minutes, 'minutes');
                            
                            $("#new_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
                            $("#new_subtask_start" + cur_id).focus();

                        }


                    }
                });
                
                }
                });

                // end database save

            }
            }
        }); */

        /* $("#table_container").on('keyup', '.createsubtask', function (event) {

            var cur_id = (this.id.match(/\d+/));


            // enter key
            if (event.keyCode == 13) {

                if($("#new_subtask_name"+cur_id).val() !=""){
                var now_id = ($(this).closest("table").attr("id").match(/\d+/));
                var divid = $("#taskid_" + now_id).attr("data-tasklistid");
                var taskid = $("#taskid_" + now_id).attr("data-taskid");
                var tasklistid = $("#taskid_" + now_id).attr("data-tasklistid");

                var st_startdate = $(this).closest('tr').find('input[name="subtask_start_date"]').val().replace(/-/g, ' ');
                var st_enddate = $(this).closest('tr').find('input[name="subtask_end_date"]').val().replace(/-/g, ' ');

                $.ajax({
                    url: '<?php echo site_url(); ?>yzy-tasks/index/saveSubTaskNew',
                    type: 'POST',
                    data: {
                        pid: pro_id,
                        inputDivID: divid,
                        tasklistId: divid + taskid,
                        taskId: taskid,
                        taskName: $("#new_subtask_name" + cur_id).val(),
                        startdate: moment(st_startdate).format('YYYY-MM-DD HH:mm:ss'),
                        enddate: moment(st_enddate).format('YYYY-MM-DD HH:mm:ss'),
                        duration: $("#new_subtask_duration" + cur_id).attr('data-duration'),

                    },
                    dataType: "JSON",
                    success: function (data, textStatus) {

                        var myData = {
                            st_name: $("#new_subtask_name" + cur_id).val(),
                            st_duration: $("#new_subtask_duration" + cur_id).attr('data-duration'),
                            st_start: $("#new_subtask_start" + cur_id).val().replace(/-/g, ' '),

                            st_end: $("#new_subtask_end" + cur_id).val().replace(/-/g, ' '),
                            st_tasklistid:tasklistid+taskid,

                        };

                        fun_drawSubtasks(data.insertID, myData, cur_id);
                        
                        $("#subtaskcount_"+cur_id).html(Number($("#subtaskcount_"+cur_id).html())+1);
                        $("#new_subtask_duration" + cur_id).timeDurationPicker("setDuration",0);


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
        }); */


        $("#table_container").on('change blur', '.sel_tasklist', function (event) {
            var taskadded = ($(this).hasClass("addedentry"));
            var cur_val = $(this).find('option:selected').text();
            var cur_value = $(this).val();

            var cur_id = (this.id.match(/\d+/));
            $("#taskid_" + cur_id).attr("data-tasklistid", $(this).val());
            if (this.id == "added_sel_tasklist0") {
                new_tasklist_name = cur_val;
                new_tasklist_id = cur_value;
            }
            $("#hi_sel_tasklist" + cur_id).val(cur_val);

            if (jsTaskList.indexOf(cur_val) == -1)
            {
                jsTaskList.push(cur_val);
                var did = $.now();

                $.ajax({
                    url: '<?php echo site_url(); ?>yzy-projects/index/saveTaskListNew',
                    type: 'POST',
                    data: {
                        pid: pro_id,
                        tasklistName: cur_val,
                        inputDiv: did

                    },
                    dataType: "json",
                    success: function (data, textStatus) {

                        if (data.insertID > 0) {
                            $("#taskid_" + cur_id).attr("data-tasklistid", did);
                            jsTaskListID.push(did);

                            $('.sel_tasklist').empty();
                            $.each(jsTaskList, function (index, value) {

                                $('.sel_tasklist').append($("<option/>", {
                                    value: jsTaskListID[index],
                                    text: value
                                }));
                            });
                            if (taskadded)
                                fun_tbl_updatetask(cur_id);

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
            fun_tbl_updatetask(cur_id);
        });

        $("#tbl_TaskEntry").on('focusout', '.textAreaEntry', function (event) {

            var thisid = event.target.id;
            var thisinId = thisid.split('_');
            var newID = thisinId[0]+"_"+thisinId[1]+"_"+thisinId[2];
            var thisval = $("#"+thisid).val();
            var tr = $("#"+thisid).closest('tr').attr('id');
            $('#'+thisid).hide();
            $('#'+newID).show();
            $('#'+newID).addClass('btn-gray');

        });

        $("#tbl_TaskEntry").on('focusout', '.textSubEntry', function (event) {

            var thisid = event.target.id;
            var thisinId = thisid.split('_');
            var newID = thisinId[0]+"_"+thisinId[1]+"_"+thisinId[2];
            var thisval = $("#"+thisid).val();
            var tr = $("#"+thisid).closest('tr').attr('id');
            $('#'+thisid).hide();
            $('#'+newID).show();
            $('#'+newID).addClass('btn-gray');

        });
        
        $("#table_container").on('focus', '.addedentry', function (event) {

            $(this).removeClass('btn-gray');
            $(this).closest('td').attr('style', 'background-color: white !important');
        });

        $("#table_container").on('blur', '.addedentry', function (event) {

            $(this).addClass('btn-gray');
            $(this).closest('td').attr('style', 'background-color: #E7E7E7 !important');
        });

        $("#table_container").on('focus', '.addedsubtask', function (event) {

            $(this).removeClass('btn-gray2');
            $(this).closest('td').attr('style', 'background-color: white !important');
        });
        
        $("#table_container").on('blur', '.addedsubtask', function (event) {

            $(this).addClass('btn-gray2');
            $(this).closest('td').attr('style', 'background-color: #f2f2f2 !important');
        });

        // $("#tbl_TaskEntry").on('focus', '.sortable :input:not(".createsubtask")', function (event) {

        //     //if( $(this).closest('tr').next().length ) {
        //     $(this).removeClass('btn-gray');
        //     //}
        // });
        // $("#tbl_TaskEntry").on('blur', '.sortable :input:not(".createsubtask")', function (event) {

        //     //if( $(this).closest('tr').next().length ) {
        //     $(this).addClass('btn-gray');
        //     //}

        // });

        var subtasknum = 0;

        $("#table_container").mouseup(function (e)
        {
            var container = $("#openProjectTaskDiv2");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.hide();
            }
        });



         $(document).on('click', '.cls-open-dep', function () {
            $("#tbl_subtask_" + taskid).hide();

            if ($("#tbl_dep_" + taskid).is(":visible"))
            {
                $("#tbl_dep_" + taskid).hide();
            }
            else {
                $("#tbl_dep_" + taskid).show();
            }

            });
         
         $(document).on('click', '.cls-open-delete', function () {

            fun_delete_task(taskdataid);

            });

        /* $(document).on('click', '.cls-open-sticky', function () {
            if($("#stickynote_img"+taskdataid).is(':visible')){

                $.ajax({
                url: '<?php echo site_url(); ?>yzy-tasks/index/deleteStickyNote',
                type: 'POST',
                data: {
                    uid: taskdataid,
                    
                },
                //dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data, textStatus) {
                   
                   $("#stickynote_img"+taskdataid).hide();
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

            }else{
                $("#stickynote_img"+taskdataid).show();
                $("#stickynote_img"+taskdataid).trigger('click');
               
                setTimeout(function() {
                  $("#txtStickyNote"+taskdataid).focus();
                }, 500);
            }

        }); */

         /* $(document).on('click', '.cls-open-sub-sticky', function () {
            if($("#substickynote_img"+subtaskdataid).is(':visible')){

                $.ajax({
                url: '<?php echo site_url(); ?>yzy-tasks/index/deleteStickyNoteSub',
                type: 'POST',
                data: {
                    uid: subtaskdataid,
                    
                },
                //dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data, textStatus) {
                   
                   $("#substickynote_img"+subtaskdataid).hide();
                    
                }
            });

            }else{
                $("#substickynote_img"+subtaskdataid).show();
                $("#substickynote_img"+subtaskdataid).trigger('click');
               
                setTimeout(function() {
                  $("#txtStickyNoteSub"+subtaskdataid).focus();
                }, 500);
            }

        }); */
         

         $(document).on('click', '.cls-task-complete', function () {

            fun_task_complete();
        });
         
         $(document).on('click', '.cls-opensub-delete', function () {

            fun_delete_subtask(subtaskdataid);

            });

          $(document).on('click', '.details-menuopen', function (e) {
            var qtipAPI = $(this).qtip("api");
             qtipAPI.set('content.text', $("#popupMainMenu").html());
             qtipAPI.set('style.width', "450px");
             //qtipAPI.set('position.my', "bottom left");
             
             
          });
          // comment
           $(document).on('click', '.details-submenuopen', function (e) {
            var qtipAPI = $(this).qtip("api");
             qtipAPI.set('content.text', $("#popupSubMenu").html());
             qtipAPI.set('style.width', "380px");
            // qtipAPI.set('position.my', "bottom left");
             

          });

          

         //  $(document).on('mouseenter', '.details-submenuopen,.details-menuopen', function (e) {
         //    var qtipAPI = $(this).qtip("api");
         //    var ajax_url,ajax_taskid,ajax_tasklistid;

         //    if($(e.currentTarget).hasClass("details-submenuopen")){
         //        ajax_url='<?php echo site_url(); ?>yzy-tasks/index/subtaskDetail';
         //        ajax_taskid=$(this).closest('tr').attr('data-subtaskid');
         //        ajax_tasklistid=$(this).closest('tr').attr('data-subtasklistid');
         //    }
         //    else if($(e.currentTarget).hasClass("details-menuopen")){
         //        ajax_url='<?php echo site_url(); ?>yzy-tasks/index/taskDetail';
         //        ajax_taskid=$(this).closest('tr').attr('data-taskid');
         //        ajax_tasklistid=$(this).closest('tr').attr('data-tasklistid');
         //    }

         //   $.ajax({
         //    url: ajax_url,
         //    type: 'POST',
         //    data: {
         //        taskID: ajax_taskid,
         //        taskLsitID: ajax_tasklistid,
         //        projectID: pro_id
         //    },
         //    dataType: "json",
         //    beforeSend: function () {
               
         //    },
         //    success: function (data, textStatus) {

         //       var arrSupervisor=new Array();
         //       var arrMember=new Array();
         //       var arrFollower=new Array();
                
         //       $.each(data.tag, function (key, value) {
         //            if(value.user_status == 0) arrSupervisor.push([value.full_name,value.img]);
         //            if(value.user_status == 1) arrMember.push([value.full_name,value.img]);
         //        });

         //        $.each(data.tagFollow, function (key, value) {
         //            arrFollower.push([value.full_name,value.img]);
         //        });
              

         //        var tiphtml='<div>';
         //        tiphtml+='<table class="tbl_qtip" >'
         //        // 1
               
         //        tiphtml+='<tr class="popup-font tag_row">'
         //        tiphtml+='<td colspan="2">'
         //         tiphtml+='<div>';
         //        tiphtml+='<table class="tbl_tag_info popup-font">';

         //        tiphtml+='<tbody id="tbdy_alltags">'
         //        tiphtml+='<tr>'
         //        tiphtml+='<td><b>Supervisor</b></td>'
         //        tiphtml+='<td><b>Members</b></td> '
         //        tiphtml+='<td><b>Follower</b></td>'
         //        tiphtml+='</tr>'
         //        tiphtml+='<tr>'
         //        // Supervisor
         //        tiphtml+='<td class="tag_column" >'
         //        tiphtml+='<table class="tbl_supervisor_info popup-font">'
         //        $.each(arrSupervisor, function (key, value) {
         //            tiphtml+='<tr><td style="width:35px"><img class="display-qtip-bigimage" src="'+ci_base_url+'require/dist/img/'+value[1]+'" /></td><td>'+value[0]+'</td></tr>';
         //        });
         //        tiphtml+='</table></td>';
         //        // Member
         //        tiphtml+='<td class="tag_column" style="">'
         //        tiphtml+='<table class="tbl_member_info popup-font">'
         //        $.each(arrMember, function (key, value) {
         //            tiphtml+='<tr><td style="width:25px"><img class="display-qtip-image" src="'+ci_base_url+'require/dist/img/'+value[1]+'" /></td><td>'+value[0]+'</td></tr>';
         //        });
         //        tiphtml+='</table></td>';
         //        // Follower
         //        tiphtml+='<td class="tag_column" style="">'
         //        tiphtml+='<table class="tbl_follower_info popup-font">'
         //        $.each(arrFollower, function (key, value) {
         //            tiphtml+='<tr><td style="width:25px"><img class="display-qtip-image" src="'+ci_base_url+'require/dist/img/'+value[1]+'" /></td><td>'+value[0]+'</td></tr>';
         //        });
         //        tiphtml+='</table></td>';

         //        tiphtml+='</tr>'
         //        tiphtml+='</tbody>'
         //        tiphtml+='</table></div> </td>'
                
         //        tiphtml+='</tr>'
               
         //        // 4
         //        // tiphtml+='<tr class="popup-font add-table-margin">'
         //        // tiphtml+='<td><b>Startdate</b><span style="float:right">:</span></td>'
         //        // tiphtml+='<td>'+data.dataList[0].startdate+'</td>'
         //        // tiphtml+='</tr>'
         //        // 5
         //        // tiphtml+='<tr class="popup-font add-table-margin">'
         //        // tiphtml+='<td><b>Duedate</b><span style="float:right">:</span></td>'
         //        // tiphtml+='<td>'+data.dataList[0].enddate+'</td>'
         //        // tiphtml+='</tr>'
         //        // 6
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Description</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td>'+data.dataList[0].description+'</td>'
         //        tiphtml+='</tr>'
         //        // 7
         //        // tiphtml+='<tr class="popup-font add-table-margin">'
         //        // tiphtml+='<td><b>Location</b><span style="float:right">:</span></td>'
         //        // tiphtml+='<td>'+data.dataList[0].projectname + " >> " + data.tasklistName[0].name+'</td>'
         //        // tiphtml+='</tr>'
         //        // 8
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Status</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td>'+data.dataList[0].projectstatus+'</td>'
         //        tiphtml+='</tr>'
         //        // 9
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Duration</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td>'+data.dataList[0].projecttaskhours+'</td>'
         //        tiphtml+='</tr>'
         //         // 10
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Priority</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td>'+data.dataList[0].projecttaskpriority+'</td>'
         //        tiphtml+='</tr>'
         //         // 11
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Label</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td><span style="background-color:'+data.dataList[0].label +'"> '+ data.dataList[0].label+ '</span></td>'
         //        tiphtml+='</tr>'
         //        // 12
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Type</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td>'+data.dataList[0].projecttasktype+'</td>'
         //        tiphtml+='</tr>'
         //        // 13
         //        tiphtml+='<tr class="popup-font add-table-margin">'
         //        tiphtml+='<td><b>Progress</b><span style="float:right">:</span></td>'
         //        tiphtml+='<td><div class="progress" style="height: 15px;float: left;width: 100%;margin: 2px -2px 0px 0px;box-shadow: 2px 3px 4px rgb(0, 0, 0);">'
         //        tiphtml+='<div class="progress-bar progress-bar-success cus-progress" role="progressbar" aria-valuenow="'+data.dataList[0].projecttaskprogress+'"'
         //        tiphtml+='aria-valuemin="0" aria-valuemax="100" style="padding-left: 3px;color: #000000;width:'+data.dataList[0].projecttaskprogress+'%">'+data.dataList[0].projecttaskprogress+'%</div></div></td>'
         //        tiphtml+='</tr>'
                  
         //        tiphtml+='</table> '
         //        tiphtml+='</div>';

         //        qtipAPI.set('content.text', tiphtml);
         //       qtipAPI.set('style.width', "600px");
         //       //qtipAPI.set('position.my', "center left");

               
                
         //    },
         //    error: function (jqXHR, textStatus, errorThrown) {
         //        // Some code to debbug e.g.:               
         //        console.log(jqXHR);
         //        console.log(textStatus);
         //        console.log(errorThrown);
         //    }
         //    });
         // });

        
        
        $(document).on('click', '.cls-open-settings', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-open-settings .custom-panel-text" ).css( "color", "#f8a32c" );
            
            if($("#myDiv").is(':visible')){
                $('.nav-tabs a[href="#tab_1"]').tab('show');
                //$("#chkchangetaskstatus").attr("checked", false);
                //alert("Got it");
                onOpenDiv(taskdataid, tasklistdataid);
            }else{
                oDiv(taskdataid, tasklistdataid);
                $('.nav-tabs a[href="#tab_1"]').tab('show');
            }

        });
         $(document).on('click', '.cls-opensub-settings', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-opensub-settings .custom-panel-text" ).css( "color", "#f8a32c" );
            
            if($("#myDiv").is(':visible')){
                
                //onOpenDiv(subtaskdataid, subtasklistdataid);
                //$("#chkchangetaskstatus").attr("checked", false);
                oNoSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_1"]').tab('show');
            }else{
                oSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_1"]').tab('show');
            }
            
        });

        $(document).on('click', '.cls-open-attachment', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-open-attachment .custom-panel-text" ).css( "color", "#f8a32c" );
            
            if($("#myDiv").is(':visible')){
                $('.nav-tabs a[href="#tab_3"]').tab('show');
                onOpenDiv(taskdataid, tasklistdataid);
            }else{
                oDiv(taskdataid, tasklistdataid);
                $('.nav-tabs a[href="#tab_3"]').tab('show');
            }
            
            
        });
        
        $(document).on('click', '.task-set-icon', function () {
            $("#Blink").show();
        });
        

        $(document).on('click', '.cls-opensub-attachment', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-opensub-attachment .custom-panel-text" ).css( "color", "#f8a32c" );
            if($("#myDiv").is(':visible')){
                
                //onOpenDiv(subtaskdataid, subtasklistdataid);
                oNoSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_3"]').tab('show');
            }else{
                oSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_3"]').tab('show');
            }
           
            
        });
       
        $(document).on('click', '.cls-open-invitation', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-open-invitation .custom-panel-text" ).css( "color", "#f8a32c" );
            openInvitePeople();

        });

        $(document).on('click', '.cls-opensub-invitation', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-opensub-invitation .custom-panel-text" ).css( "color", "#f8a32c" );
            openInvitePeople();

        });

         $(document).on('click', '.cls-open-message', function () {
             
            //oDiv(taskdataid, tasklistdataid);
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
            $( ".cls-open-message .custom-panel-text" ).css( "color", "#f8a32c" );
            if($("#myDiv").is(':visible')){
                $('.nav-tabs a[href="#tab_2"]').tab('show');
                onOpenDiv(taskdataid, tasklistdataid);
            }else{
                oDiv(taskdataid, tasklistdataid);
                $('.nav-tabs a[href="#tab_2"]').tab('show');
            }
        });

        $(document).on('click', '.cls-opensub-message', function () {
            $("#Blink").hide();
            $( ".custom-panel-text" ).css( "color", "#FFFFFF" ); 
            $( ".cls-opensub-message .custom-panel-text" ).css( "color", "#f8a32c" );
             //$('.nav-tabs a[href="#tab_2"]').tab('show');
            if($("#myDiv").is(':visible')){
                
                //onOpenDiv(subtaskdataid, subtasklistdataid);
                oNoSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_2"]').tab('show');
            }else{
                oSubDiv(subtaskdataid, subtasklistdataid);
                $('.nav-tabs a[href="#tab_2"]').tab('show');
            }
        });
        
        // ID Setter event for SubTask
         $("#table_container").on('click focus', 'tr[id^="subtaskrow_"]', function (event) {
            $("#Blink").hide();
            $("#popupSubMenu").show();
            $("#popupMainMenu").hide();
            
            var closeTableID = $(this).closest('table').attr('id');
            var tableID = (closeTableID.match(/\d+/));
            $(".trSubtaskNewEntry").hide();
            $("#tfoot_subtask"+tableID).show();
            //alert(tableID);
            
            if($(this).closest('tfoot').length==0){
                subtaskdataid = $(this).closest('tr').attr("data-subtaskid");
                subtasklistdataid = $(this).closest('tr').attr("data-subtasklistid");
                //alert(subtaskdataid+","+subtasklistdataid);
                $('[id^="added_task_serial"]').closest('td').removeClass("add-circle-border");
                $('[id^="added_subtask_serial"]').closest('td').removeClass("add-circle-border-sub");
                $("#added_subtask_serial"+subtaskdataid).closest('td').addClass("add-circle-border-sub");

                $('#popupSubMenu button').each(function (index, value) { 
                  $(value).removeClass("disabled"); 
                });
            }else{
                $('#popupSubMenu button').each(function (index, value) { 
                  $(value).addClass("disabled"); 
                });
            }

            
        });
         // ID Setter event for Task
         $("#table_container").on('click focus', 'tr[id^="taskid_"]', function (event) {
            // console.log("task event");
            
            $("#popupSubMenu").hide();
            $("#popupMainMenu").show();
            
            if($(this).closest('tfoot').length==0){
            
            var tr=($(this).closest('tr'));

            if(tr){

                taskid = (tr.attr("id").match(/\d+/));
                taskdataid = tr.attr("data-taskid");
                tasklistdataid=tr.attr("data-tasklistid");
                
                if($("#myDiv").is(':visible')){
                    onOpenDiv(taskdataid, tasklistdataid);
                }
                
               
                
                $('[id^="added_task_serial"]').closest('td').removeClass("add-circle-border");
                $('[id^="added_subtask_serial"]').closest('td').removeClass("add-circle-border-sub");
                $("#added_task_serial"+taskid).closest('td').addClass("add-circle-border");
               
                // $('[id^="added_task_name"]').addClass("btn-gray");
                // $('#added_task_name'+taskid).removeClass('btn-gray');
                
                $("#emBtn").val(taskdataid);

                // $.ajax({
                //     url: '<?php echo site_url(); ?>yzy-tasks/index/taskTagNew',
                //     type: 'POST',
                //     data: {
                //         taskID: taskdataid,
                //         taskLsitID: tasklistdataid,
                //         pro_id: pro_id
                //     },
                //     dataType: "json",
                //     beforeSend: function () {
                //         //console.log("Emptying");
                //         $("#togPopH").val("");
                //         $("#tasknametitle").val("");
                //         $("#assMembers").html("");
                //         $('#display_tagimg').empty();
                        
                //     },
                //     success: function (data, textStatus) {
                //         // console.log("get tag");
                //         // console.log(data);
                //         if(data.tag.length != 0){
                //             $('#display_tagimg').html('<img style="float: right;margin-top: 0.5%;margin-right: 1%;cursor:pointer;" id="emargencyBtn" onClick="openEmargencyDiv()" src="<?php echo base_url(); ?>require/img/emargency.png">');
                //             $(data.tag).each(function (index, value) { 
                //                 // console.log(value.img);
                //                 $('#display_tagimg').prepend('<img tooltip="'+value.full_name+'" class="display-tag-image" src="<?php echo base_url(); ?>require/dist/img/'+value.img+'" />')
                //             });
                //             $(data.tagFollow).each(function (index, value) { 
                //                 // console.log(value.img);
                //                 $('#display_tagimg').prepend('<img tooltip="'+value.full_name+'" class="display-tag-image" src="<?php echo base_url(); ?>require/dist/img/'+value.img+'" />')
                //             });
                             
                //         }

                //     },
                //     error: function (jqXHR, textStatus, errorThrown) {
                //         // Some code to debbug e.g.:               
                //         console.log(jqXHR);
                //         console.log(textStatus);
                //         console.log(errorThrown);
                //     }
                // });

                var ti = $(this).closest('tbody').attr("id");
                
                if (ti != undefined)
                    $(".dd-dep-toggle").addClass("disabled");
                else
                    $(".dd-dep-toggle").removeClass("disabled");
                
                // show all then hide matched
                // $(".dd-menu-dependency li").show();
                // $(".deptaskid_" + taskdataid).hide();
                //$(".dd-menu-dependency").hide();
                // remove checked all then check matched
                $(".cls-chkbox-dep").prop( "checked", false ) ;
                $('#tbody_dep_'+taskid+ ' tr').each(function (index, value) { 
                $("#chkbox_depid_" + $(value).attr("data-taskid")).prop( "checked", true ) ;
                });

                
                $('#popupMainMenu button').each(function (index, value) { 
                  $(value).removeClass("disabled"); 
                });
                
                $(".panel-arra").css("border-color","#3c8dbc");
                $(".panel-heading").css("background-color","#3c8dbc");

                
                if($('#taskid_'+taskid).find('.chk-task-complete').is(':checked'))
                     $(".cls-task-complete").removeClass('disabled');
                 else  $(".cls-task-complete").addClass('disabled');
            }
            }else{
                $('#popupMainMenu button').each(function (index, value) { 
                      $(value).addClass("disabled"); 
                    });
                 }

        });

        
       /*   $(document).on('click', '.cls-open-subtasks', function () {
            
            $("#tbl_dep_" + taskid).hide();

            if ($("#tbl_subtask_" + taskid).is(":visible")) {
                
                
                $("#tbl_subtask_" + taskid).hide();

                $("#img_st_open" + taskid).show();
                $("#subtaskcount_" + taskid).show();
                $("#img_st_close" + taskid).hide();
                
                $("#tfoot_subtask" + taskid).hide();
               
            }
            else {
             
                $("#tbl_subtask_" + taskid).show();
               
                $("#subtaskcount_" + taskid).hide();
                $("#img_st_open" + taskid).hide();
                $("#img_st_close" + taskid).show();

                 if(flag_expand_subtask){
                    $("#tfoot_subtask" + taskid).hide();
                }else{
                    $("#tfoot_subtask" + taskid).show();
                }

                $.ajax({
                
                url: '<?php echo site_url(); ?>yzy-tasks/index/subtaskListNew',
                type: 'POST',
                async:false,
                data: {
                    proid: pro_id,
                    taskID: taskdataid
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    //console.log("Get subtask");
                    //console.log(data_st);
                    $("#tbody_subtask_" + taskid).empty();
            
                    $.each(data_st.allSubTask, function (index, value) {
                        subtasknum += 1;

                        var myData = {
                            st_name: value.projecttaskname,
                            st_duration: value.projecttaskhours,
                            st_start: value.startdate,
                            st_end: value.enddate,
                            st_status:value.status,
                            st_checked:value.checked,
                            st_stickynote:value.stickynote,
                            st_notepopup:value.notepopup,
                            st_projecttaskpriority:value.projecttaskpriority,
                            st_opened_by:value.opened_by,
                            st_tasklistid:value.tasklistID+value.projecttaskid,
                        };


                        fun_drawSubtasks(value.projecttaskid, myData, taskid,data_st.allAttach);

                    });


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
                
            }

           
            $('#new_subtask_start' + taskid + '').datetimepicker({
                 minDate:0,
                  value:moment(new Date()).format('YYYY-MMM-DD HH:mm'),
                        format: 'Y-M-d H:i',
                        onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                          }
                    });
           
            $('#new_subtask_end' + taskid + '').datetimepicker({
                 minDate: $("#new_subtask_start" + taskid).val().replace(/-/g, ' '),
                        format: 'Y-M-d H:i',
                        onChangeDateTime:  function (ct,$input) {
                                updateTimetableSubNew(ct,$input)
                          }
                    });
            
            // $("#new_subtask_end" + taskid).datetimepicker("change", {minDate: $("#new_subtask_start" + taskid).datetimepicker('getDate')});
        });
          */
         $( "#search_inputbox" ).click(function() {
          $( this ).css( "background-color", "" );
          $(this).attr('placeholder', '');
        });
         $( "#search_inputbox" ).blur(function() {
          $( this ).css( "background-color", "#e7e7e7", 'important');
          $(this).attr('placeholder', 'Search Task');
        });

          $("#tbl_TaskCompleted th").on('click', function (event) {
                var hindex=$(this).index();
                $("#tbl_TaskCompleted th").each(function( index ) {
                  // console.log($(this).find(".fa-sort").css("color", "black"));
                });
                ($(this).find(".fa-sort").css("color", "orange"));

                var table = $(this).parents('table').eq(0);

                var rows = table.find("tbody tr[id^='taskid']").toArray().sort(comparer(hindex,'task'));
            
                this.asc = !this.asc
                if (!this.asc){
                rows = rows.reverse();
                $(this).find('[class*="sort"]').attr( "class", "fa fa-sort-desc" );
                }else{
                    $(this).find('[class*="sort"]').attr( "class", "fa fa-sort-asc" );
                }
                    for (var i = 0; i < rows.length; i++){
                    table.append(rows[i]);
                    
                    table.append($(".tby_subtask[data-taskid='"+ $(rows[i]).attr("data-taskid")+"']").closest("[id^='taskchild']"));

                }
                $( "#tbl_TaskCompleted .subtasktable" ).each(function( index ) {
                  var rows_child = $(this).find("tbody tr").toArray().sort(comparer(hindex,'subtask'));
                  this.asc = !this.asc
                  if (!this.asc){rows_child = rows_child.reverse();}
                  for (var i = 0; i < rows_child.length; i++){
                    
                   $(this).append(rows_child[i]);

                }
            });
                var taskserial=($(".sortable tr[id^='taskid']:last").find('td').eq(0).find('label').html());

                $( ".tbody_completed tr[id^='taskid_']" ).each(function( index ) {
              var taskid= ($(this).attr('id').match(/\d+/)[0]);
              var taskdataid= $(this).attr('data-taskid');

                
              $('#taskid_'+taskid).after($('#taskchild_'+taskid));
             
              taskserial=Number(taskserial);
              taskserial=$(this).find('td').eq(0).find('label').html(taskserial+1).html();

              fun_updateSerial(taskdataid,taskserial);

              $( '#taskchild_'+taskid+' .tby_subtask tr' ).each(function( index ) {
                $(this).find('td').eq(0).find('label').html(taskserial+'.'+Number(index+1));
            });
          });
            });



         $("#tbl_TaskEntry th").on('click', function (event) {
                // console.log("$(this) header");
                // console.log($(this));
                var hindex=$(this).index();

                if($(event.originalEvent.srcElement).hasClass("fa-arrow-circle-down")) return;
                if($(event.originalEvent.srcElement).hasClass("fa-arrow-circle-up")) return;
                if($(event.originalEvent.srcElement).hasClass("fa-plus-circle")) return;

                $("#tbl_TaskEntry th").each(function( index ) {
                  $(this).find('[class*="sort"]').css("color", "black").attr( "class", "fa fa-sort" );
                });
                $(this).find('[class*="sort"]').css("color", "orange");
                
                var table = $(this).parents('table').eq(0);
                
                var rows = table.find("tbody tr[id^='taskid']").toArray().sort(comparer(hindex,'task'));
                
                this.asc = !this.asc

                if (!this.asc){
                rows = rows.reverse();
                $(this).find('[class*="sort"]').attr( "class", "fa fa-sort-desc" );
                }else{
                    $(this).find('[class*="sort"]').attr( "class", "fa fa-sort-asc" );
                }
                for (var i = 0; i < rows.length; i++){
                table.append(rows[i]);

                table.append($(".tby_subtask[data-taskid='"+ $(rows[i]).attr("data-taskid")+"']").closest("[id^='taskchild']"));

                }
                $( "#tbl_TaskEntry .subtasktable" ).each(function( index ) {
                  var rows_child = $(this).find("tbody tr").toArray().sort(comparer(hindex,'subtask'));
                  this.asc = !this.asc
                  if (!this.asc){rows_child = rows_child.reverse();}
                  for (var i = 0; i < rows_child.length; i++){
                    
                   $(this).append(rows_child[i]);

                }
            });

                $( ".sortable tr[id^='taskid_']" ).each(function( index ) {
                  var taskid= ($(this).attr('id').match(/\d+/)[0]);
                  var taskdataid= $(this).attr('data-taskid');
                    
                  $('#taskid_'+taskid).after($('#taskchild_'+taskid));

                  var taskserial=$(this).find('td').eq(0).find('label').html(index+1).html();

                  fun_updateSerial(taskdataid,taskserial);

                  $( '#taskchild_'+taskid+' .tby_subtask tr' ).each(function( index ) {
                    $(this).find('td').eq(0).find('label').html(taskserial+'.'+Number(index+1));
                });
              });
                
            
            });
            
    });
// dipok vai
function goForEmargency(projectID,status){
      var taskID = $("#emBtn").val();

      // console.log(projectID);
      // console.log(taskID);
      // console.log(status);
      
      if(taskID == 'undefined'){
        alert('Select task 1st');
      }else{
          var request = $.ajax({
            url: '<?php echo site_url(); ?>yzy-projects/index/emargencyToast',
            method: "POST",
            data:{
              projectID : projectID,
              taskID : taskID,
              status:status
            },
            dataType: "json"
          });
          request.done(function(rsp) {
            // console.log(rsp.status);
            if(rsp.status == 'done'){
              swal("Good job!", "Successfully notified this task members!", "success");
             //  bootbox.dialog({
	            //     message: "Successfully notified this task members",
	            //     title: "Success Message",
	            //     buttons: {
	            //         success: {
	            //             label: "Ok!",
	            //             className: "btn-danger",
	            //             callback: function () {

	            //             }
	            //         }

	            //     }
	            // });


            }else if(rsp.status == 'fail'){
              swal("Oops...", "No member(s) found to notify. Please add member first", "error");
	            //   bootbox.dialog({
	            //     message: "No member(s) found to notify. Please add member first",
	            //     title: "Error Message",
	            //     buttons: {
	            //         success: {
	            //             label: "Ok!",
	            //             className: "btn-danger",
	            //             callback: function () {

	            //             }
	            //         }

	            //     }
	            // });
            }
            
          });
          request.fail(function(rsp) {
            console.log(rsp.status);
          });
      }
      
    }


    function poketoyou(uid, e){
        var request = $.ajax({
            url: '<?php echo site_url(); ?>yzy-projects/index/poketoyou',
            method: "POST",
            data:{ uid : uid },
            dataType: "json"
        });
        request.done(function(rsp) {
            if(rsp.status == 'done'){
                $(e).html("Send");
            }else if(rsp.status == 'notpossible'){
                bootbox.dialog({
                    message: "This user has not responded to your last poke.",
                    title: "Error Message",
                    buttons: {
                        success: {
                            label: "Ok!",
                            className: "btn-danger",
                            callback: function (){}
                        }
                    }
                });
            }
        });
        request.fail(function(rsp) {
            console.log(rsp.status);
        });      
    }



/* function openSubtaskList(taskid,taskdataid){
    $.ajax({
        url: '<?php echo site_url(); ?>yzy-tasks/index/subtaskListNew',
        type: 'POST',
        data: {
            proid: pro_id,
            taskID: taskdataid
        },
        dataType: "JSON",
        beforeSend: function () {
            //console.log("Emptying");
        },
        success: function (data_st, textStatus) {
            // console.log("Get subtask");
            // console.log(data_st);
            $("#tbody_subtask_" + taskid).empty();
            $.each(data_st.allSubTask, function (index, value) {
                
                var myData = {
                    st_name: value.projecttaskname,
                    st_duration: value.projecttaskhours,
                    st_start: value.startdate,
                    st_end: value.enddate
                };

                fun_drawSubtasks(value.projecttaskid, myData, taskid);

            });

            $("#tbl_dep_" + taskid).hide();

            if ($("#tbl_subtask_" + taskid).is(":visible")) {
                $("#tbl_subtask_" + taskid).hide();
            }
            else {
                $("#tbl_subtask_" + taskid).show();
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Some code to debbug e.g.:               
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    //row.child( format(tr) ).show();


    $('#new_subtask_start' + taskid + '').datepicker({dateFormat: 'yy-M-dd'});
    $('#new_subtask_end' + taskid + '').datepicker({dateFormat: 'yy-M-dd'});
    $('#new_subtask_start' + taskid + '').datepicker("setDate", new Date());

    $("#new_subtask_start" + taskid).datepicker("change", {minDate: 0});
    $("#new_subtask_end" + taskid).datepicker("change", {minDate: $("#new_subtask_start" + taskid).datepicker('getDate')});

}
 */
function attachmentOpen(taskdataid,tasklistdataid){
    if ($("#myDiv").is(":visible"))
    {
         var tabHref = $('.nav-tabs-custom .active')[1];
        if($(tabHref).attr("id")=="tab_3") oDiv(taskdataid, tasklistdataid);
        else $('.nav-tabs a[href="#tab_3"]').tab('show');
    }
    else {
        
         oDiv(taskdataid, tasklistdataid);
         $('.nav-tabs a[href="#tab_3"]').tab('show');
    }
}

function openChat(){
    if ($("#chatlistwindow").is(":visible")) 
        disableChatList();
     else 
        enablechatlistwindow();
        $("#myDiv").hide('slow');
}

function openDel(taskdataid, tasklistdataid){
    fun_delete_task(taskdataid);
}

function openSet(taskdataid, tasklistdataid){
    if ($("#myDiv").is(":visible"))
    {
        var tabHref = $('.nav-tabs-custom .active')[1];
        if($(tabHref).attr("id")=="tab_1") oDiv(taskdataid, tasklistdataid);
         else $('.nav-tabs a[href="#tab_1"]').tab('show');
       
    }
    else {
         oDiv(taskdataid, tasklistdataid);
         $('.nav-tabs a[href="#tab_1"]').tab('show');
    }
}
var arrSkipDep=[];
var checkDependency = function (data,taskdataid) {

    $.each(data.SkipDependency, function( index, value ) {
      if(value.depid==taskdataid){
        arrSkipDep.push(value.taskid);
        checkDependency(data,value.taskid);
    }else return;
});
    
}
var arrElements=[];
var checkDependencyClose = function (elementrow,elementlevel) {
    
   if(parseInt($(elementrow).next().attr('data-level'))>elementlevel){
   arrElements.push($(elementrow).next());
   // console.log("arrElements push");console.log(arrElements);
   checkDependencyClose($(elementrow).next(),elementlevel);
   }else return;
    
}

/* function showDependancy(taskdataid){
    
    //$(".dd-menu-dependency").css('display','block');
    $(".dd-menu-dependency li").show();
    $(".deptaskid_"+taskdataid).hide();
    
        $.ajax({
            url: '<?php echo site_url(); ?>yzy-tasks/index/getDependencyTable',
            type: 'POST',
            data: {
                taskdataid: taskdataid,
                proid:pro_id
            },
            dataType: "json",
            beforeSend: function () {

            },
            success: function (data, textStatus) {
                // console.log("menu Dependancy");
                // console.log(data);
                arrSkipDep=[];
                checkDependency(data,taskdataid);
                
                $(data.allDependency).each(function(i,value){
                  
                    $('#chkbox_depid_'+value.depid).prop('checked', true);
                });

                 $(arrSkipDep).each(function(i,value){
                  
                    $('.deptaskid_'+value).hide();
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

} 
 */
 
/* function fun_loadDependency(element,protaskid){
    
    // console.log("element to load");console.log($(element).closest('table'));
    if($(element).hasClass('depmenu-expand')){
    $.ajax({
        url: '<?php echo site_url(); ?>yzy-tasks/index/getDependencyTable',
        type: 'POST',
        async: false,
        data: {
            taskdataid: protaskid,
            proid:pro_id
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data, textStatus) {
            // console.log('load 1st dependency');console.log(data);
            if(data.allDependency.length>0){
            
            // var qhtml=' <tr id="row_depend_'+protaskid+'"><td colspan="7"><table class="tbl-dependency-next"><tbody>';
            var depidval;
             
            $(data.allDependency).each(function(i,value){

                
                    // console.log('load dependency');console.log(data);
                    var status='white';
                    var qhtml='';
                    var nextdepid=data.allDependency[i].projecttaskid;
                   // check next dependency
                    var nextdep='block';
                    $.ajax({
                        url: '<?php echo site_url(); ?>yzy-tasks/index/getDependencyTable',
                        type: 'POST',
                        async: false,
                        data: {
                            taskdataid: data.allDependency[i].projecttaskid,
                            proid:pro_id
                        },
                        dataType: "json",
                        
                        success: function (data, textStatus) {
                            // console.log('load next dependency');console.log(data);
                            if(data.allDependency.length==0){nextdep='none';}}
                        });

                    var progress=Number(data.allDependency[i].projecttaskprogress);
                    var dep_taskid=data.allDependency[i].projecttaskid;
                    var dep_tasklistid=data.allDependency[i].tasklistID;

                    // console.log("progress");console.log(progress)

                    if(progress==0){status='red';}
                    else if(progress<100 && progress>0){status='yellow';}
                    else if(progress==100 ){status='green';}
                    else status='white';

                    var bkcolor='white';
                    if(flag_task_complete==true){
                    if(progress<100) bkcolor='#f3beb7 ';
                    else bkcolor='white';
                    }
                   // var rootid=$(element).closest('[class^="deplink-root"]').attr('class').match(/\d+/);
                     var new_margin=(parseInt($(element).closest('tr').find('.tbl-dependency-taskname').css("marginLeft"))+10); 
                   
                    qhtml+='<tr style="background-color:'+bkcolor+' !important" data-level="'+Number(new_margin/10+1)+'" data-taskid="'+dep_taskid+'" data-tasklistid="'+dep_tasklistid+'">';
                    //qhtml+='<td style="width:5%">'+data.allDependency[i].projecttaskcode+'</td>';
                    qhtml+='<td><i style="margin-left:'+new_margin+'px;display:'+nextdep+'" onclick="fun_loadDependency(this,'+data.allDependency[i].projecttaskid+')" class="depmenu-expand" aria-hidden="true"></i></td>'; 
                    
                                         
                    qhtml+='<td class="td_depname" data-title="'+data.allDependency[i].projecttaskname+'" ><div onclick="openSettings('+dep_taskid+','+dep_tasklistid+')"  style="margin-left:'+new_margin+'px;cursor:pointer" class="tbl-dependency-taskname"><i class="fa fa-circle" style="font-size: 10px !important;    vertical-align: middle;margin-right: 5px;"></i>'+data.allDependency[i].projecttaskname+'</div></td>';

                    qhtml+='<td style="width:20%">'+data.allDependency[i].startdate.split(" ")[0]+'</td>';
                    qhtml+='<td style="width:20%">'+data.allDependency[i].enddate.split(" ")[0]+'</td>';
                    qhtml+='<td style="width:10%">'+progress+'%</td>';
                    
                    qhtml+='<td style="width:10%"><span class="depend-status-circle" style="background-color:'+status+' !important"></span></td>';
                    qhtml+='<td><i style="color: gray;font-size: 24px !important;margin-left: 30%;" class="fa fa-times disabled" ></i></td>';
                    qhtml+='</tr>';
                    $(element).closest('tr').after(function(i) {
                      return qhtml;
                    });
                    
                    qTipDepTask($(element).closest('tr').next().find('.td_depname'));


           // $(element).closest('tr').next().css('cssText','background-color:red !important');
                    if(flag_task_complete==true){
                        $(element).closest('tr').next().find('td:eq(0) i').hide().click();
                    }

                    

            });
            //qhtml+='</tbody></table></td></tr>';

             
           // $(element).removeClass('fa-plus-square');
            $(element).toggleClass('depmenu-expand depmenu-collapse');
            
            


        }else{$(element).hide();}
        },
        error: function (jqXHR, textStatus, errorThrown) {

            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

}else{
   

var elementrow=$(element).closest('tr');
var elementlevel=parseInt($(element).closest('tr').attr('data-level'));
arrElements=[];

checkDependencyClose(elementrow,elementlevel);

$( arrElements).each(function( index ) {
  $( this ).remove();
});

$(element).toggleClass('depmenu-expand depmenu-collapse');
}
var qtipAPI = $('#dependency_img'+taskdataid).qtip("api");
            qtipAPI.reposition();
//alert($(element).closest('table').attr('id'));
  
}
 */

/* function fun_DelDependency(element,deltaskid){
    

    $.ajax({
        url: '<?php echo site_url(); ?>yzy-tasks/index/delDependencyTable',
        type: 'POST',
        data: {
            taskdataid: taskdataid,
            proid:pro_id,
            deltaskid:deltaskid
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data, textStatus) {
            //$(element).closest('tr').remove();
           var tblid=$(element).closest('table').attr('id').match(/\d+/);
           var elementrow=$(element).closest('tr');
           var elementlevel=parseInt($(element).closest('tr').attr('data-level'));
           
           arrElements=[];
           arrElements.push(elementrow);

           checkDependencyClose(elementrow,elementlevel);

           $( arrElements).each(function( index ) {
              $( this ).remove();
          });
          
           var rowCount = $('#tbl_depmain_'+tblid+' >tbody >tr').length;
           var qtipAPI = $('#dependency_img'+taskdataid).qtip("api");
           qtipAPI.reposition();

           //   console.log("$(element).closest('tbody').children()");
           //   console.log($(element).closest('tbody').find('tr'));
             if(rowCount==0){
                
                qtipAPI.hide();
               $('#dependency_img'+taskdataid).hide();
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
 */

function changeTagImgonLoad(inputID,imgName,taskid,label,type){
    //console.log(inputID+":"+imgName);
    var style ="margin-top: -6%";

    if(type == 'priority'){

        $("#"+inputID+'_exD').append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right bg-red priority'+taskid+'">'+imgName+' <button type="button" class="close" style="'+style+';" data-inputid="'+inputID+'" data-name="'+imgName+'" data-type="'+type+'" data-taskid="'+taskid+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');
    }else if(type == 'tasktype'){

        $("#"+inputID+'_exD').append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right label-info tasktype'+taskid+'">'+imgName+' <button type="button" class="close" style="'+style+';" data-inputid="'+inputID+'" data-name="'+imgName+'" data-type="'+type+'" data-taskid="'+taskid+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');  
    }else if(type == 'taskstatus'){
        $("#"+inputID+'_exD').append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right label-warning taskstatus'+taskid+'">'+imgName+' <button type="button" class="close" style="'+style+';" data-inputid="'+inputID+'" data-name="'+imgName+'" data-type="'+type+'" data-taskid="'+taskid+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');  
    }

}

function changeTagImg(inputID,imgName,taskid,label,type){
    
    //alert(imgName+"<><>"+label);
    if(type == 'priority'){
        $(".propertyImg"+inputID).remove();
        $(".propertyImghide"+inputID).hide();
        var request = $.ajax({
            url: '<?php echo site_url(); ?>yzy-projects/index/updatetaskprio',
            method: "POST",
            data:{
              taskid : taskid,
              imgName:imgName
            },
            dataType: "json"
          });
          request.done(function(rsp) {
            //$("#"+inputID+'_exD').append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right bg-red priority'+taskid+'">'+imgName+' <button type="button" class="close" style="margin-top: -6%;" data-inputid="'+inputID+'" data-name="'+imgName+'" data-type="'+type+'" data-taskid="'+taskid+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');

            $("#"+inputID+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/'+imgName.toLowerCase()+'.png" style="display:block;" class="cls-open-settings task-set-icon propertyImghide'+inputID+'"/>');
            
          });
    }else{
        
        //$("#"+inputID+'_exD').append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right label-info">'+imgName+' <button type="button" class="close" style="margin-top: -3%;" data-inputid="'+inputID+'" data-name="'+imgName+'" data-taskid="'+taskid+'" data-type="'+type+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');
        
        $("#"+inputID+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/low.png" class="cls-open-settings task-set-icon propertyImg'+inputID+'"/>');
        
    }
}

function changeSubTagImg(imgName,taskid,label,type){
    
   if(type == 'priority'){
        $(".prioritys"+taskid).remove();
        var request = $.ajax({
           url: '<?php echo site_url(); ?>yzy-projects/index/updateSubtaskprio',
            method: "POST",
            data:{
              taskid : taskid,
              imgName:imgName
            },
            dataType: "json"
          });
          request.done(function(rsp) {
            $("#added_subtask_name"+taskid+"_sub_exD").append('<small style="width: 105px;white-space: normal;font-size: 10px !important;margin-left: 1%;padding-right: 1%;padding-top: 3px;" id="'+imgName+taskid+'" class="label pull-right bg-red prioritys'+taskid+'">'+imgName+' <button type="button" class="close" style="margin-top: -6%;" data-inputid="added_subtask_name'+taskid+'_sub_exD" data-name="'+imgName+'" data-type="'+type+'" data-taskid="'+taskid+'" onclick="removethis($(this).data(\'inputid\'),$(this).data(\'name\'),$(this).data(\'taskid\'),$(this).data(\'type\'))" >×</button></small>');
            
          });
    }
}  

function  removethis(inputID,imgName,taskid,type){
    // console.log(inputID+""+imgName+""+taskid+""+type);
    var request = $.ajax({
               url: '<?php echo site_url(); ?>yzy-projects/index/removeTags',
                method: "POST",
                data:{
                  taskid : taskid,
                  tagname:imgName,
                  tagType:type
                },
                dataType: "json"
              });
              request.done(function(rsp) {
                //console.log("line number 12477: "+rsp);
                if(rsp.status == 'done'){
                    // console.log(rsp);
                    $("#"+imgName+taskid).remove();
                }
                // }else{
                //     bootbox.dialog({
                //         message: "Already taged!!!",
                //         title: "Error Notice",
                //         buttons: {
                //             success: {
                //                 label: "Ok!",
                //                 className: "btn-danger",
                //                 callback: function () {

                //                 }
                //             }

                //         }
                //     });
                // }
                
                
              });
    
}
</script>
	<script type="text/javascript">
	// console.log("1444");
	//var selectArray = <?php echo json_encode($users); ?>;
	
	//var newSelArr = selectArray;

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
	
	
	// function selectSplice(val){
	// 	//console.log(val);
	// 	$(".select2_multiple option:selected").removeAttr("selected");
	// 	$("#member").html("");
	// 	$("#project_members").html("");
		
		
		
	// 	$.each(selectArray, function (key, value) {
	// 		newSelArr.push(value.ID);
	// 	});
		
	// 	//console.log(selectArray);
		
		
	// 	jQuery.grep(newSelArr, function(el) {

	// 		if (jQuery.inArray(el, val) == -1) 
	// 		unique.push(el);
	// 		i++;
		
	// 	});	
	// 	//console.log(unique);
		
	// 	for(var i=0; i< unique.length;i++){
	// 		$.each(selectArray, function (key, value) {
	// 			if(unique[i] === value.ID){
	// 				finalArr.push(value);
	// 			}
				
	// 		});	
		
	// 	}
		
	// 	//console.log(finalArr);
		
	// 	$("#member").append('<option value="#addnew">Invite new people +</option>');	
		
	// 	$.each(finalArr, function (key, value) {
	// 		var name = value.full_name;
	// 		$("#member").append('<option value="'+value.ID+'">'+name+'</option>');
	// 		$("#project_members").append('<option value="'+value.ID+'">'+name+'</option>');
	// 	});
		
	// 	$(".select2_multiple").trigger("change", [true]);

	// }


	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			//alert("Calling me huh!!!!");
			//getAllProject();

			// gbl_rates = new Object();
			// $.ajax({
			// 	url: '<?php echo site_url(); ?>yzy-tasks/index/curlQuoteCurrency',
			// 	type: 'POST',

			// 	dataType: "json",

			// 	success: function (data, textStatus) {
			// 		//console.log('curlQuoteCurrency');
			// 		//console.log(data);


			// 		$.each( JSON.parse(data.NewCurrencyValue), function( key, val ) { 

			// 			gbl_rates[val.currency_code] = val.rate;

			// 		});
			// 		fx.base = "USD";
			// 		fx.rates = gbl_rates;

			// 	}
			// });
			

		});


		function getAllProject(){
			//$("#relatedto").hide();
			$("#assign_A").hide();
			$("#assign_C").hide();
			
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
					//console.log(data);
					setProjectAttribute(data);

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

        $('#myProjectDivList').delegate('.noBorder', 'click', function(e){
            
            //e.preventDefault();
            e.stopImmediatePropagation();

            var targetID = e.target.id;
            
            var projectID = $("#"+targetID).attr('data-projectid');
            var param2 = $("#"+targetID).attr('data-type');
            //console.log(param2);

            var targetProName = $("#clickDiv"+projectID).find('b')[0].innerText;
            
            $(".notifation").siblings().addClass('inactive');
            
            if($("#clickDiv"+projectID).hasClass('inactive')){
                $("#clickDiv"+projectID).removeClass('inactive');
            }

            $("#pronameSpan").html("");
            $("#taskInsertDiv").html("");
            $("#pronameSpan").html(targetProName);
            $("#newTaskInput").attr('data-projectid',projectID);
            
            getTagAjax(projectID);
            fun_loadfulltable(projectID);

            
            
            if($('#backDiv'+param2+projectID).is(":visible")){
                
                divstatus = false;
                //console.log("From If");
                CloseFlotDiv(param2,projectID);

            }else{
                
                console.log(val);
                console.log(valM);
                finalArr.length = 0;
                divstatus = true;
                // val = true;
                // valM = true;
                //console.log("From Else");
                $('.backDiv').remove();
                $('.noBorder').removeClass('border');
                $("#"+param2+"IMG"+projectID).addClass('border');

                $('.backDiv').css('display','none');
                $('.floting_box').css('display','none');
                $('#myProjectDivList').css('z-index','2200');

                var projectID = $("#newTaskInput").attr('data-projectid');
                
                switch(param2){

                    case 'prperties':
                                    openProperties(projectID,param2);
                                    break;
                    case 'attach':
                                    
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>projects/deleteFileUnseen', // URL to the local file
                                        type: 'POST', // POST or GET
                                        data: {projectID:projectID}, // Data to pass along with your request
                                        success: function(data, status) {
                                            console.log(data);
                                            $("#tipA"+projectID).text("");
                                            openAttach(projectID,param2);
                                            
                                        }
                                    });

                                    break;
                    case 'comments':
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>projects/getCommentForProjects', // URL to the local file
                                        type: 'POST', // POST or GET
                                        data: {projectID:projectID}, // Data to pass along with your request
                                        success: function(data, status) {
                                            $("#tipT"+projectID).text("");
                                            openComments(projectID,param2,data);
                                            
                                        }
                                    });

                                    break;
                    default:
                            openProperties(projectID,param2);
                } 
            }

        });

		function template(data, container) {
            var matches = data.text.match(/\b(\w)/g);
            var acronym = matches.join(''); 
            return acronym;
        }

        function openProperties(projectID,attr){
            //console.log(attr);
            var floatingDiv =  ' <div class="backDiv" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="floting_box">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="propertiesProname'+projectID+'"></span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="proCrename"></span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">'+tabsDesign(projectID)+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';

            $("#projectBody").append(floatingDiv);

            $("#propertiesProname"+projectID).text($("#pronameSpan").text());
            
            $.each(alluser, function (key, value) {
                var userID = parseInt($("#userID"+projectID).text());
                console.log(value.ID);
                console.log(userID);
                if(value.ID == userID){
                    $("#proCrename").text("Created By "+value.display_name);
                }
            });

            $("#projectstartDate"+projectID).datepicker({
               dateFormat: 'yy-mm-dd',
               prevText: '<i class="fa fa-chevron-left"></i>',
               nextText: '<i class="fa fa-chevron-right"></i>'
            });

            $("#projectendtDate"+projectID).datepicker({
               dateFormat: 'yy-mm-dd',
               prevText: '<i class="fa fa-chevron-left"></i>',
               nextText: '<i class="fa fa-chevron-right"></i>'
            });
            
            $("#addMember").select2({

                templateSelection: template,
                //maximumSelectionLength: 10,
                placeholder: "Add project Member",
                allowClear: true
            }).on("select2:opening",function(e){

                $.each($("#addAdmin").select2('data'), function (key, value) {

                    $('#addMember option[value="' + value.id + '"]').remove();
                });
               
                $.each($("#addMember").select2('data'), function (key, value) {

                    $('#addAdmin option[value="' + value.id + '"]').remove();
                });


            }).on('select2:unselect', function(e) {

                var projectID = $("#newTaskInput").attr('data-projectid');
                console.log('unselect');
                console.log(e.params.data.id); //This will give you the id of the selected attribute
                console.log(e.params.data.text); //This will give you the text of the selected
                
                $.ajax({
                    url: '<?php echo base_url(); ?>projects/deltagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:projectID,
                        type:'Project',
                        tagList:e.params.data.id,
                        UserStatus:'2'
                    }, // Data to pass along with your request
                    success: function(data, status) {
                        if($('#addAdmin option').length>0){
                            $("#addAdmin").append('<option value="' + e.params.data.id + '" >' + e.params.data.text + '</option>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            }).on('select2:select', function(e) {

                var projectID = $("#newTaskInput").attr('data-projectid');
                console.log('select');
                console.log(e.params.data.id); //This will give you the id of the selected attribute
                console.log(e.params.data.text); //This will give you the text of the selected
                
                $.ajax({
                    url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:projectID,
                        type:'Project',
                        tagList:e.params.data.id,
                        UserStatus:'2'
                    }, // Data to pass along with your request
                    success: function(data, status) {
                        if($('#addAdmin option').length>0){
                            $('#addAdmin option[value="' + e.params.data.id + '"]').remove();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            });

            

            var $eventSelect = $("#addAdmin"); 
            
            $eventSelect.select2({

                templateSelection: template,
                placeholder: "Add project Administrator/Supervisor/Co-ordinator",
                allowClear: true
            })
            
            $eventSelect.on('select2:unselect', function(e) {

                var projectID = $("#newTaskInput").attr('data-projectid');
                console.log('unselect');
                console.log(e.params.data.id); //This will give you the id of the selected attribute
                console.log(e.params.data.text); //This will give you the text of the selected
                
                $.ajax({
                    url: '<?php echo base_url(); ?>projects/deltagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:projectID,
                        type:'Project',
                        tagList:e.params.data.id,
                        UserStatus:'1'
                    }, // Data to pass along with your request
                    success: function(data, status) {
                        if($('#addMember option').length>0){
                            $("#addMember").append('<option value="' + e.params.data.id + '" >' + e.params.data.text + '</option>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            })

            $eventSelect.on('select2:select', function(e) {

                var projectID = $("#newTaskInput").attr('data-projectid');
                console.log('select');
                console.log(e.params.data.id); //This will give you the id of the selected attribute
                console.log(e.params.data.text); //This will give you the text of the selected
                
                $.ajax({
                    url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:projectID,
                        type:'Project',
                        tagList:e.params.data.id,
                        UserStatus:'1'
                    }, // Data to pass along with your request
                    success: function(data, status) {
                        if($('#addMember option').length>0){

                            $('#addMember option[value="' + e.params.data.id + '"]').remove();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            })

            $eventSelect.on("select2:opening",function(e){

                $.each($("#addAdmin").select2('data'), function (key, value) {

                    $('#addMember option[value="' + value.id + '"]').remove();
                });
                $.each($("#addMember").select2('data'), function (key, value) {

                    $('#addAdmin option[value="' + value.id + '"]').remove();
                });
            })
           
            tab1dataload(projectID);
        }

    $(document).on('click','.project-text-prop',function(e){
        var serial = $(e.currentTarget.context);
        
        $(e.currentTarget).attr('contenteditable','true').addClass('single-line');
        $(e.currentTarget).focus();
        $(e.currentTarget).css('text-overflow','initial');

    });  

    $(document).on('blur','.project-text-prop',function(e){
        
        var serial = $(e.currentTarget.context);
        var projectID = $("#newTaskInput").attr('data-projectid');
        if($(e.currentTarget).text() !=""){
            var request = $.ajax({
                url: base_url+"projects/updateprojectName",
                method: 'POST',
                data: {
                    "todoname": $(e.currentTarget).text(),
                    "todoserial": projectID,
                },
                dataType: 'JSON'
            });
            
            request.done(function(response){
                
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('single-line');
                $('#protitle'+projectID).text($(e.currentTarget).text()).show('slow');
                
                
            });
        }
    });  
    </script>



    <script type="text/javascript">
        

        function dMembers(){
    
            if($('#addMember option').length==0){
                

                $.ajax({
                    url: ''+base_url+'todo/getUsersForTodo', // URL to the local file
                    type: 'GET', // POST or GET
                    data: {}, // Data to pass along with your request
                    success: function(data, status) {
                        $("#addMember").html("");
                        
                        $.each(data.users, function (key, value) {
                            
                            $("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
                        });

                        $("#addMember").select2('open');
                        
                    }
                });
            }else{
                $("#addMember").select2('open');
            }
            
        }

        function dSupervisor(){
    
            if($('#addAdmin option').length==0){
                
                $.ajax({
                    url: ''+base_url+'todo/getUsersForTodo', // URL to the local file
                    type: 'GET', // POST or GET
                    data: {}, // Data to pass along with your request
                    success: function(data, status) {
                        $("#addAdmin").html("");
                        
                        $.each(data.users, function (key, value) {
                            
                            $("#addAdmin").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
                        });

                        $("#addAdmin").select2('open');
                        
                        
                    }
                });
            }else{
                //$("#tagAddAdmin .select2-search__field").trigger('click');
                $("#addAdmin").select2('open');
            }
            
        }

        function Tagadmin(){
            $.each(selectArray, function (key, value) {
                finalArr.push(value);
            });

            for( var i =finalArr.length - 1; i>=0; i--){
              for( var j=0; j<userArray.length; j++){
                if(finalArr[i].ID === userArray[j]){
                  finalArr.splice(i, 1);
                }
              }
            }

            var projectID = $("#newTaskInput").attr('data-projectid');
            $.ajax({
                url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
                type: 'POST', // POST or GET
                data: {
                    projectID:projectID,
                    type:'Project',
                    tagList:userArray,
                    UserStatus:'1'
                }, // Data to pass along with your request
                success: function(data, status) {
                    //console.log(data);
                    $("#dSupervisor").show();
                    $("#Tagadmin").hide();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                }
            });
        }

        function TagMemberBtn(){
            var projectID = $("#newTaskInput").attr('data-projectid');
            $.ajax({
                url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
                type: 'POST', // POST or GET
                data: {
                    projectID:projectID,
                    type:'Project',
                    tagList:MemberArray,
                    UserStatus:'2'
                }, // Data to pass along with your request
                success: function(data, status) {
                    //console.log(data);
                    $("#dMembers").show();
                    $("#TagMemberBtn").hide();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                }
            });
        }


        //var api = $('#qtip-apiTest').qtip('api');
        
        function addAdmin(userid,username){
            var matches = username.match(/\b(\w)/g);
            var acronym = matches.join(''); 
            //console.log($('#userChk'+userid).is(':checked'));
            if($('#userChk'+userid).is(':checked')){
                $("#tagAddAdmin").append('<a id="philBtn'+userid+'" title="'+username+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                $("#dSupervisor").qtip('reposition');
            }else{
                $("#philBtn"+userid).remove();
                $("#dSupervisor").qtip('reposition');
            }
            
        }

        function tab1dataload(projectID){
            $.ajax({
                url : '<?php echo base_url(); ?>projects/getNewProjectdetails',
                type : 'POST',
                data : {projectID:projectID},
                success : function(data) {
                    console.log(projectID);
                    
                    $("#projectDescription").val(data.detail[0].Description);
                    $("#projectStartdate"+projectID).val(data.detail[0].Startdate);
                    $("#projectDuration").val(data.detail[0].Duration);
                    $("#projectendtDate"+projectID).val(data.detail[0].Enddate);
                    
                    if (data.tagAdmin.length > 0) {
                        val = true;
                        $("#addAdmin option:selected").removeAttr("selected");
                        $.each(selectArray, function (key, value) {
                            
                            $("#addAdmin").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
                        });
                        $.each(data.tagAdmin, function (key, value) {
                            $('#addAdmin option[value="' + data.tagAdmin[key].userid + '"]').prop("selected", "selected");
                        });
                        $("#addAdmin").trigger("change", [true]); 
                    }

                    
                    $.each(selectArray, function (key, value) {
                        finalArr.push(value);
                    });

                    for( var i =finalArr.length - 1; i>=0; i--){
                      for( var j=0; j<userArray.length; j++){
                        if(finalArr[i].ID === userArray[j]){
                          finalArr.splice(i, 1);
                        }
                      }
                    }

                    if (data.tagMember.length > 0) {
                        valM = false;
                        $("#addMember option:selected").removeAttr("selected");
                        $.each(finalArr, function (key, value) {
                            
                            $("#addMember").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
                        });
                        $.each(data.tagMember, function (key, value) {
                            $('#addMember option[value="' + data.tagMember[key].userid + '"]').prop("selected", "selected");
                        });
                        $("#addMember").trigger("change", [true]); 
                    }
                    
                    
                    $('#projectGroup option[value="' + data.detail[0].HasGroup + '"]').prop("selected", "selected");
                    $('#projectCLient option[value="' + data.detail[0].HasClient + '"]').prop("selected", "selected");
                    $('#projectStatus option[value="' + data.detail[0].Status + '"]').prop("selected", "selected");
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                }
            });
        }

        function openAttach(projectID,attr) {
            
            var floatingDiv =  ' <div class="backDiv"  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="floting_box">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop"  id="comAttachame'+projectID+'"></span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="attachCrename"></span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">'+projectAttachDesign()+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';



            $("#projectBody").append(floatingDiv);

            $("#comAttachame"+projectID).text($("#pronameSpan").text());

            $("#SA").css('color','rgb(9, 247, 247)');
            
            $.each(alluser, function (key, value) {
                var userID = parseInt($("#userID"+projectID).text());
                if(value.ID == userID){
                    $("#attachCrename").text("Created By "+value.display_name);
                }
            });

            $("#icsupload").on('change', function() {
                
                var formData = new FormData();
                formData.append('fileToUpload[]', $('#icsupload')[0].files[0]);
                formData.append('projectName', $("#pronameSpan").text());
                formData.append('parentType', 'Project');
                formData.append('parentID', projectID);
                formData.append('dirname', 'ProjectsFiles');
                
                var request = $.ajax({
                    url: '<?php echo site_url('Projects/newProjectFile'); ?>',
                    method: "POST",
                    data: formData,
                    //async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json"
                });
                
                request.done(function( status ) {
                    
                    console.log(status);

                    var res = status.file_new_name.split("_");
                    var filter = status.file_new_name.split(".");

                    tabDetail ='       <div class="col-lg-12 SA '+filter[1].toUpperCase()+'" id="fileWholeDiv007'+status.insert_id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
                    tabDetail +='           <div class="col-lg-5"><img class="" src="icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;" id="fileoriname007'+status.insert_id+'">'+status.msg+'</span></div>';
                    tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
                    tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
                    tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
                    tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
                    tabDetail += '              <ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
                    tabDetail += '                  <div class="arrow-top-right"></div>';
                    tabDetail += '                  <li onclick="showDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+status.msg+'" data-filesize="'+status.size+'" data-createby="'+res[0]+'" data-createdate="'+status.currrentDate+'"> <i class="fa fa-info"></i> Details</li>';
                    tabDetail += '                  <li id="onclkid007'+status.insert_id+'" onclick="renameDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+status.msg+'" data-filesize="'+status.size+'" data-createby="'+res[0]+'" data-createdate="'+status.insert_id+'"> <i class="fa fa-pencil"></i> Rename</li>';
                    tabDetail += '                  <a class="downloadHover" href="<?php echo base_url() ?>ProjectsFiles/'+status.parentfolder[0].name+'/'+status.file_new_name+'" download><li> <i class="fa fa-download"></i> Downalod</li></a>';
                    tabDetail += '                  <li onclick="deleteFile($(this).data(\'createdate\'));" data-createdate="'+status.insert_id+'"> <i class="fa fa-trash-o"></i> Delete</li>';
                    tabDetail += '              </ul>';
                    tabDetail +='           </div>';
                    tabDetail +='           <div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">'+status.size+' KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">'+moment(status.currrentDate).toNow(true)+' ago</span></div>';
                    tabDetail +='       </div>';

                    

                    $("#attachListDiv").append(tabDetail);
                    
                });
                
                request.fail(function( jqXHR, textStatus ) {
                    console.log('jqXHR');
                    console.log(jqXHR);
                    console.log(textStatus);
                });
                
            });

            attachdataload('Project',projectID,0);
        }

        // $("body").delegate('.onIconClick','click',function(e){
        //     var id = e.target.id;
        //     alert(id).
        //     qtipAssignee(this,data,crm_users);
        // });

        function openComments(projectID,attr,data){
            
            var floatingDiv =  ' <div class="backDiv"  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="floting_box">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname'+projectID+'"></span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename"></span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">'+projectCommentsDesign(data,projectID)+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';
            
            $("#projectBody").append(floatingDiv);
            setProjecttag(data,projectID);

            $("#comProname"+projectID).text($("#pronameSpan").text());
            
            $.each(alluser, function (key, value) {
                var userID = parseInt($("#userID"+projectID).text());
                if(value.ID == userID){
                    $("#comCrename").text("Created By "+value.display_name);
                }
            });
            
        }


		function offDiv(){
			// Set the effect type
			var effect = 'slide';
			$(".properID").css("color","#000000");
		    // Set the options for the effect type chosen
		    var options = { direction: 'right' };
            // Set the duration (default: 400 milliseconds)
		    var duration = 500;
		    $('#myDiv').toggle(effect, options, duration);
		    $('#openProjectTaskDiv').css('display','none');
		}
        
	</script>
	<script type="text/javascript">
		$( window ).load(function() {
			
            getAllProject();
			
            $("#update_ok").hide();
			$("#update_okT").hide();
			$("#update_not").hide();
			$("#update_notT").hide();
			$("#assign_A").hide();
			$("#assign_C").hide();
			$("#update_oksett").hide();
	        $("#update_notsett").hide();

			$(document).on('keyup keypress change', '#form_dataset :input', function(e,isScriptInvoked) {
				if (isScriptInvoked === true) {

				} else {
					$("#update_not").show();
					$("#update_ok").hide();
				}
			});

			$(document).on('keyup keypress change', '#form_dataset2 :input', function (e, isScriptInvoked) {
	            if (isScriptInvoked === true) {

	            } else {
	                $("#update_notsett").show();
	                $("#update_oksett").hide();
	            }
	        });
		});
		
	</script>

	<script type="text/javascript">
    $( document ).on( "click", "#expand_mydiv", function() { 
      	if($( this ).hasClass( "fa-compress" )) $('#myDiv').animate({width: '46%'});
     	else $('#myDiv').animate({width: '90%'});
        
        $(this).toggleClass("fa-compress fa-arrows-alt");
    });

    function toggleRelatedTo(currType)
    {
        $("#relatedto").val("");
		if (currType == "A")
        {
            $("#assign_A").show("slow");
            $("#relatedto").show("slow");
            $("#assign_C").hide("slow");

        }
        else
        {
            $("#assign_A").hide("slow");
            $("#assign_C").show("slow");
            $("#relatedto").show("slow");
        }
    }
    </script>

    <script type="text/javascript">
		

		function propertiesLoad(data){
		
		
			var valueOption = 0;
			$("#member").html("");
			
			$.each(selectArray, function (key, value) {
				var name = value.full_name;
				$("#member").append('<option value="'+value.ID+'">'+name+'</option>');
			});
			
			if(data.proDetail[0].project_on_hold === 'COMPLETE'){
	            $("#archive").attr('checked',true);
	        }


			$("#createdBYpro").text(data.createdBy);
			$("#createdBYDate").text(convertMysqldate(data.proDetail[0].createdDate));
			
			$("#archive").attr('data-id',data.proDetail[0].projectid);
			$("#optld-pid").attr('value',data.proDetail[0].projectid);
			$("#optld-temp-pid").attr('value',data.proDetail[0].projectid);

			
			$("#createdBy").val(data.proDetail[0].createdBy);
			
			$("#togPopTitle").val(data.proDetail[0].projectname);
			$("#datetimepicker7").val(data.proDetail[0].startdate);
			$("#datetimepicker8").val(data.proDetail[0].targetenddate);
			$("#datetimepicker9").val(data.proDetail[0].actualenddate);
			
			$('#ProjectType option[value="'+data.proDetail[0].projectstatus+'"]').attr("selected", "selected");
			$('#projectstatus option[value="'+data.proDetail[0].proCurSta+'"]').attr("selected", "selected");
			
			//$('#projectstatus').val(data.proDetail[0].proCurSta);
			$('#projecttasktype option[value="'+data.proDetail[0].projecttype+'"]').attr("selected", "selected");
			$('#projecttaskprogress option[value="'+data.proDetail[0].progress+'"]').attr("selected", "selected");
			$("#targetbudget").val(data.proDetail[0].targetbudget);
			$("#URL").val(data.proDetail[0].projecturl);
			$('#ticketpriorities option[value="'+data.proDetail[0].projectpriority+'"]').attr("selected", "selected");
			
			//$("#assignToMember option:selected").removeAttr("selected");

			$('#assignToMember option[value="'+data.proDetail[0].assignTo+'"]').attr("selected", "selected");
			$("#assignToMember").trigger("change", [true]);

			$.each(data.tag,function (key, value){
				//console.log(data.tag[key].user_status);
				if(data.tag[key].user_status == 0){
					$('#assignToMember option[value="'+data.tag[key].ID+'"]').prop("selected","selected");
				}
				$("#assignToMember").trigger("change", [true]);
			});

			
			//$(".select2_multiple option:selected").removeAttr("selected");
			$.each(data.tag,function (key, value){
				//console.log(data.tag[key].user_status);
				if(data.tag[key].user_status == 1){
					$('.select2_multiple option[value="'+data.tag[key].ID+'"]').prop("selected","selected");
				}
				$(".select2_multiple").trigger("change", [true]);
			});
			
			$("#description").text(data.proDetail[0].description);
			$("#projecteid").val(data.proDetail[0].projectid);

			$("#type").val(data.proDetail[0].project_type);
			$("#archive").attr('data-status',data.proDetail[0].project_type);
			$("#archive").attr('data-projectid',data.proDetail[0].projectDivid);

			if(data.proDetail[0].relatedto =='Account'){
				$("#relatedToA").attr('checked',true);
				$("#relatedto").show('slide');
			}else{
				$("#relatedToC").attr('checked',true);
				$("#relatedto").show('slide');
			}
			// if(data.proDetail[0].project_type == "Archived"){
			// 	$("#archive").prop('checked',true); 
			// }else{
			// 	$("#archive").prop('checked',false); 
			// }
			$("#relatedto").val(data.proDetail[0].relatedToVal);

			$("#opneChat").attr("data-projectchatname",data.proDetail[0].project_chat_name);
		}

		$(".select2_multiple30").select2({
            maximumSelectionLength: 10,
            placeholder: "Add project Administrator/Supervisor/Co-ordinator",
            allowClear: true
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

		function setProjectAttribute(data){
			//console.log("From insedi function"+data);
            //console.log(data);
			
			var ico = "";
			var ara = "myProarray";
			var param1 = 'properties';
			var param2 = 'attach';
			var user_id = '<?php echo $id; ?>';
			$.each(data.projects, function (key, value) {
				var penTask = parseInt(data.TotalTask[key].length) - parseInt(data.PendingTask[key].length);
                if(data.unsennsommnet[key][0].unseenComment == 0){
                    var uc = '';
                }else{
                    uc = data.unsennsommnet[key][0].unseenComment;
                }

                if(data.unsennFile[key][0].unseenComment == 0){
                    var uA = '';
                }else{
                    uA = data.unsennFile[key][0].unseenComment;
                }

				var projectitem = '<div class="panel panel-default notifation inactive" id="clickDiv'+data.projects[key].projectid+'" data-proid = "'+data.projects[key].projectid+'">';
                    projectitem += '                    <span style="display:none;" id="userID'+data.projects[key].projectid+'">'+data.projects[key].createdBy+'</span>';
					projectitem += '					<div class="panel-head">';
					projectitem += '						<span class="name"><b class="textdecor" id="protitle'+data.projects[key].projectid+'">'+data.projects[key].projectname+'</b> <span style="margin-right: 6%;" class="margintop0 pull-right"><img class="noBorder" id="propertiesIMG'+data.projects[key].projectid+'" data-projectid="'+data.projects[key].projectid+'" data-type="properties"  src="<?php echo base_url("asset/img/icons/Details_Properties.png"); ?>" /></span><span class="margintop0 pull-right"><img class="noBorder" id="attachIMG'+data.projects[key].projectid+'" data-projectid="'+data.projects[key].projectid+'" data-type="attach" src="<?php echo base_url("asset/img/icons/Add File.png"); ?>" /><span class="tipT" id="tipA'+data.projects[key].projectid+'">'+uA+'</span><img class="noBorder" id="commentsIMG'+data.projects[key].projectid+'" data-projectid="'+data.projects[key].projectid+'" data-type="comments"  src="<?php echo base_url("asset/img/icons/Chat.png"); ?>" /><span class="tipT" id="tipT'+data.projects[key].projectid+'">'+uc+'</span></span></span>';
					projectitem += '					</div>';
					projectitem += '					<div class="panel-body status">';
					projectitem += '						<div class="who clearfix">';
					projectitem += '							<span class="name">'+penTask+' of '+data.TotalTask[key].length+' task pending</span>';
					projectitem += '						</div>';
					projectitem += '					</div>';
					projectitem += '				</div>';
	 			
	 			$("#myProjectDivList").append(projectitem);
                //"#clickDiv'+data.projects[key].projectid+'"

                if(data.projects[key].description){
                   
                    var qtc='<div class="todo-desc"><b>Description:</b> '+data.projects[key].description +'</div>';
                    
                    $('#protitle'+data.projects[key].projectid).qtip({
                        content: {
                            text: qtc
                        },

                        position: {
                            at: 'bottom left',  
                            my: 'top left', 

                        },
                        style: {
                            classes: 'qtip-light qtip-rounded',
                            width: '300'
                        },

                    });
                }

	 			projectitem = "";
			});
            
            $('#clickDiv'+data.projects[0].projectid).trigger('click');


			checkCokie();
		}

		$('form[name=form_dataset]').submit(function(e) {

			e.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append('togPopTitle', $('#togPopTitle').val());

			$.ajax({
				url : this.action,
				type : this.method,
				data : formData,
				contentType: false,
				processData: false,
				
				success : function(updated_id) {
					var pid = $('#projecteid').val();
					if($("#projectlabel"+pid).html() != $("#togPopTitle").val())
						$("#projectlabel"+pid).html($("#togPopTitle").val());
					$("#update_not").hide();
					$("#update_ok").show();
					$("#myProjectDivList").html("");
					getAllProject();
					
				},
				error: function (jqXHR, textStatus, errorThrown) {

					console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
				}
			});
		});
	</script>
	<script type="text/javascript">
		function copyProject(){
			var projectId = $('#projecteid').val();
			$.ajax({
				url: '<?php echo site_url(); ?>Projects/copyProject',
				type: "POST",
				data:{
					projectId:projectId
				},
				dataType: "json",
				beforeSend: function () {
					//console.log("Emptying");
					
				},
				success: function (data, textStatus) {
					$("#myProjectDivList").html("");
					getAllProject();
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
		function deleteProject(projectVale){
			if (projectVale == 'FALSE') {
				var projectId = $('#projecteid').val();
			}else{
				projectId = projectVale;
			}
			
			$.ajax({
				url: '<?php echo site_url(); ?>Projects/deleteProject',
				type: "POST",
				data:{
					projectId:projectId
				},
				dataType: "json",
				beforeSend: function () {
					//console.log("Emptying");

				},
				success: function (data, textStatus) {
					//console.log(data.msg);
					if(data.msg == "DONE"){
						$("#myProjectDivList").html("");
						$("#pronameSpan").html("");
						getAllProject();
					}else if(data.msg == "FAIL"){
						swal("Oops...", "You haven't any permission to delete this project. Please contact with your supervisor!", "error");
						// bootbox.dialog({
						// 	size: "small",
						// 	className: "customBootBox",
						// 	message: "You haven't any permission to delete this project. Please contact with your supervisor",
						// 	title: "Delete Error",
						// 	buttons: {
						// 		success: {
						// 			label: "Ok",
						// 			className: "btn-success",
						// 			callback: function() {

						// 			}
						// 		}

								
						// 	}
						// });
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

		function makeArchive(projectID){
			swal({
			  title: "Are you sure?",
			  text: "Would you want to delete this project?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, delete it!",
			  closeOnConfirm: false
			},
			function(){
			  deleteProject(projectID);
			});
			// bootbox.dialog({
			// 	size: "small",
			// 	className: "customBootBox",
			// 	message: "Would you want to delete this project?",
			// 	title: "Delete Confirmation",
			// 	buttons: {
			// 		success: {
			// 			label: "Cancel",
			// 			className: "btn-success",
			// 			callback: function() {

			// 			}
			// 		},

			// 		main: {
			// 			label: "Ok",
			// 			className: "btn-primary",
			// 			callback: function() {
			// 				deleteProject(projectID);
			// 			}
			// 		}
			// 	}
			// });
		}
        function propertiesTabsOne(projectid){
            
            var projectArray = <?php echo json_encode($projectGroup); ?>;
            var client = <?php echo json_encode($client); ?>;
            var projectstatus = <?php echo json_encode($projectstatus); ?>;
            


            var tabDetail ='  <div class="row">';
                tabDetail +='    <div class="col-lg-12">';
                tabDetail +='         <a href="" style="right: 43px;position: absolute;"><img src="<?php echo base_url(); ?>icons/proCopy.png"></a>';
                tabDetail +='         <a href="" style="right: 6px;position: absolute;"><img src="<?php echo base_url(); ?>icons/proDlt.png"></a>';
                tabDetail +='     </div>';
                tabDetail +='     <form action="#" method="POST" name="projectdrawing" id="projectdrawing" class="projectdrawing" style="margin-top: -131px;padding-top: 1px;" >';
                tabDetail +='           <div class="col-lg-12" style="margin-top: 8%;padding: 0% 5%;">';
                tabDetail +='               <div class="form-group">';
                tabDetail +='                   <textarea name="projectDescription" id="projectDescription" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Description\'" class="col-lg-12 proTaskarea" rows="3" placeholder="Enter ..."></textarea>';
                tabDetail +='                           <div class="col-lg-4" style=" padding: 0px">';    
                tabDetail +='                   <label>Start Date</label>';
                tabDetail +='                   <input type="text" name="projectStartdate" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Startdate\'" class="col-lg-4 proInputText" placeholder="Startdate" id="projectstartDate'+projectid+'" value="">';
                tabDetail +='</div>';
                tabDetail +='                           <div class="col-lg-4">';    
                tabDetail +='                   <label>Duration</label>';
                tabDetail +='                   <input type="number" name="projectDuration" id="projectDuration" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Duration\'" class="col-lg-4 proInputText" style="" placeholder="Duration">';
                tabDetail +='</div>';
                tabDetail +='                           <div class="col-lg-4" style=" padding: 0px">';    
                tabDetail +='                   <label>End Date</label>';
                tabDetail +='                   <input type="text" name="projectEnddate" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enddate\'" class="col-lg-4 proInputText"  style="" placeholder="Enddate"  id="projectendtDate' + projectid + '"  value="">';
                tabDetail +='</div>';
                tabDetail +='                   <input type="hidden" name="parentid" value="'+projectid+'">';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 27%;width: 90%; margin-left: 5%;">&nbsp;</div>';
                tabDetail +='           <div class="col-lg-12" style="    padding: 0px 22px;margin-bottom: 8px;">';
                tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span>Add Project Admin...</span>';
                tabDetail +='               </div>';
                tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
                tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddAdmin" id="tagAddAdmin"><select name="addAdmin" multiple="multiple" id="addAdmin" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dSupervisor" onclick="dSupervisor()" style="margin-right: 2px;margin-left: 3px;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="Tagadmin" onclick="Tagadmin()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div class="col-lg-12" style="padding: 0px 22px;margin-bottom: 8px;">';
                tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span>Add Project Members...</span>';
                tabDetail +='               </div>';
                tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
                tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddMember" id="tagAddMember"><select name="addMember" multiple="multiple" id="addMember" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dMembers" onclick="dMembers()" style="margin-right: 2px;margin-left: 3px;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="TagMemberBtn" onclick="TagMemberBtn()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div style="border-top: 1px solid #e0dddd;margin-top: 17%;width: 90%; margin-left: 5%;">&nbsp;</div>';
                tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
                tabDetail +='               <div class="col-lg-4">';
                tabDetail +='                   <label>Project Group</label>';
                tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectGroup" name="projectGroup">';
                                                $.each(projectArray, function (key, value) {
                                                    tabDetail +='<option value="'+value.ID+'">'+value.type+'</option>';
                                                });
                tabDetail +='                   </select>';
                tabDetail +='               </div><div class="col-lg-4">';
                tabDetail +='                   <label>Client</label>';
                tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectCLient" name="projectCLient">';
                                                $.each(client, function (key, value) {
                                                    tabDetail +='<option value="'+value.contactid+'">'+value.firstname+' '+value.lastname+'</option>';
                                                });
                tabDetail +='                   </select>';
                tabDetail +='               </div><div class="col-lg-4">';
                tabDetail +='                   <label>Status</label>';
                tabDetail +='                   <select name="projectStatus" id="projectStatus" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText">';
                                                $.each(projectstatus, function (key, value) {
                                                    tabDetail +='<option value="'+value.projectstatus+'">'+value.projectstatus+'</option>';
                                                });
                tabDetail +='                   </select>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 10%;width: 90%; margin-left: 5%;">&nbsp;</div>';
                tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
                tabDetail +='               <a class="btn btn-default pull-right" href="javascript:void(0);" id="saveDrawing">Update</a>';
                tabDetail +='               <a onclick="CloseFlotDiv()" class="btn btn-default pull-right" href="javascript:void(0);" style="margin-right: 2%;">Cancel</a>';
                tabDetail +='           </div>';
                tabDetail +='     </form>';
                tabDetail +=' </div>';
                
            return tabDetail;
        }



        function propertiesTabsTwo(){

            var tabDetail ='  <div class="row">';
                tabDetail +='    <div class="col-lg-12">';
                tabDetail +='         <a href=""><img src="<?php echo base_url(); ?>icons/proDlt.png"></a>';
                tabDetail +='         <a href=""><img src="<?php echo base_url(); ?>icons/proCopy.png"></a>';
                tabDetail +='     </div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +=' </div>';
            return tabDetail;
        }

        function tabsDesign(projectid){
            
            var tabsDesign =  ' <ul class="nav nav-tabs">';
                tabsDesign += '     <li class="active"><a data-toggle="tab" href="#home">Properties</a></li>';
                tabsDesign += '     <li><a data-toggle="tab" href="#menu1">Quotations</a></li>';
                tabsDesign += '     <li><a data-toggle="tab" href="#menu2">Invoices</a></li>';
                tabsDesign += ' </ul>';
                tabsDesign += ' <div class="tab-content" style="padding: 10px;">';
                tabsDesign += '     <div id="home" class="tab-pane fade in active">';
                tabsDesign +=           propertiesTabsOne(projectid);
                tabsDesign += '     </div>';
                tabsDesign += '     <div id="menu1" class="tab-pane fade">';
                tabsDesign +=           propertiesTabsTwo();
                tabsDesign += '     </div>';
                tabsDesign += '     <div id="menu2" class="tab-pane fade">';
                tabsDesign +=           propertiesTabsTwo();;
                tabsDesign += '     </div>';
                tabsDesign += ' </div>';
            
            return tabsDesign;
        }

        

		$("#myProjectDivList").on('click','.notifation', function(e){
			

            //console.log(e.currentTarget.id);

            var targetId = e.currentTarget.id;
            var targetProjectId = $("#"+targetId).data('proid');
            var targetProName = $("#"+targetId).find('b')[0].innerText;

            CloseFlotDiv();
            
            
            $(".notifation").siblings().addClass('inactive');
			
			if($("#"+targetId).hasClass('inactive')){
				$("#"+targetId).removeClass('inactive');
			}

            $("#pronameSpan").html("");
			$("#taskInsertDiv").html("");
			$("#pronameSpan").html(targetProName);
			$("#newTaskInput").attr('data-projectid',targetProjectId);
			
            getTagAjax(targetProjectId);
			fun_loadfulltable(targetProjectId);
		});


        function CloseFlotDiv(param2,projectID){
            //console.log(param2);
            $('.backDiv').remove();
            $('#myProjectDivList').css('z-index','0');
            $('.noBorder').removeClass('border');
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
		        	//console.log(data);
		        	setProjecttag(data);

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
            //console.log(data.tag);
			//console.log(tagDivID);
			var totalMember = data.tag.length;
			var remainingNum = 0;
			
			if(totalMember > 3){
				
				remainingNum = totalMember-3;

				for(var i = 0;i < 3;i++){

					var matches = data.tag[i].display_name.match(/\b(\w)/g);
					var acronym = matches.join(''); 
                    $("#tagBtnDiv").append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
					$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
				}

                $("#tagBtnDiv").append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
				$("#tagBtnDiv"+tagDivID).append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
			}else{

				for(var i = 0;i < totalMember;i++){

					var matches = data.tag[i].display_name.match(/\b(\w)/g);
					var acronym = matches.join(''); 
                    $("#tagBtnDiv").append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
					$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
				}
			}
			
		}

		function fun_loadfulltable(pro_id){
			$.ajax({
	            url: '<?php echo site_url(); ?>Projects/taskListNew',
	            type: 'POST',
	            data: {
	                pro_id: pro_id
	            },
	            dataType: "JSON",
	            beforeSend: function () {
	                //console.log("Emptying");
	                $("#sorryDiv").hide();
	            },
	            
	            success: function (data, textStatus) {
	            	console.log(data);
					drawTaskList(data);
	            },
	            error: function (jqXHR, textStatus, errorThrown) {
		            // Some code to debbug e.g.:               
		            console.log(jqXHR);
		            console.log(textStatus);
		            console.log(errorThrown);
		        }
		    });

		}

		function drawTaskList(data){
			console.log(data);
            var taskDetailStr="";
			var blcol = "";
			var button = "";
			var sty = "";
            var count = 0;
            var dateArr = [];
			if(data.allTask.length > 0){
				$.each(data.alldate, function(ind,daV){
                    dateArr.push(parseInt(moment(daV.date).valueOf()));
                });

                $.each(data.allTask, function (i, item) {
                        
                        var date = item.enddate.split(' ')[0];
                        
                        if(jQuery.inArray(parseInt(moment(date).valueOf()),dateArr) != -1 && count != parseInt(moment(date).valueOf())){
                            console.log(dateArr);
                            console.log(date);
                            count = parseInt(moment(date).valueOf());
                            
                            taskDetailStr += '<div class="row datewise-row margin-topdown bottom-border">'
                            taskDetailStr += '  <div class="col-lg-12 datewise-col">'
                            taskDetailStr +=        moment(item.enddate).format('MMM D')
                            taskDetailStr += '  </div>'
                            taskDetailStr += '</div>';
                        }
                        
                        
                        if(item.label != null){
                            blcol = item.label;
                        }else{
                            blcol = "#ffffff";
                        }

                        if(item.projectstatus == 'completed'){
                            sty1 = 'block';
                            sty2 = 'none';
                        }else{
                            sty1 = 'none';
                            sty2 = 'block';
                        }

                        var now = moment(item.startdate); //todays date
                        var end = moment(item.enddate); // another date
                        
                        var duration = moment.duration(end.diff(now));
                        var days = duration.asDays();

                        countsabtask($("#newTaskInput").attr('data-projectid'),item.projecttaskid);
                        
                        
                        taskDetailStr += '              <div class="row bottom-border taskDetailDive taskserial'+item.projecttaskid+'" style="border-left: 5px solid '+blcol+';">';
                        taskDetailStr += '                  <div class="col-lg-10 col-sm-10 col-md-10 taskRow"> ';                  
                        taskDetailStr += '                      <div class="col-lg-1">';
                        taskDetailStr += '                          <div class="row text-center">';
                        taskDetailStr += '                              <img class="icon-check iconGray"  onClick="makeComplete(' + item.projecttaskid + ',\''+item.projectstatus+'\');" id="iconGray' + item.projecttaskid + '" style="display:'+sty2+';" src="icons/CheckmarkGray.png">';
                        taskDetailStr += '                              <img class="icon-check iconGreen" onClick="makeComplete(' + item.projecttaskid + ',\''+item.projectstatus+'\');" id="iconGreen' + item.projecttaskid + '" style="display:'+sty1+';" src="icons/CheckmarkGreean.png">';                      
                        taskDetailStr += '                          </div>';
                        taskDetailStr += '                          <div class="row" id="subTaskcountbtnValue' + item.projecttaskid + '">';
                        taskDetailStr += '                          </div>';
                        taskDetailStr += '                      </div>';
                        taskDetailStr += '                      <div class="col-lg-11">';
                        taskDetailStr += '                          <span onClick="makeActive(' + item.projecttaskid + ')" id="taskdestext' + item.projecttaskid + '" class="from proName">' + item.projecttaskname + '</span>';                    
                        taskDetailStr += '                          <p class="name">';                          
                        taskDetailStr += '                              <span class="span1" onClick="chekTog(\'startDatein' + item.projecttaskid + '\');">Start Date: <input type="text" id="startDatein' + item.projecttaskid + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy"  value="'+moment(item.startdate).format('MMM DD YYYY')+'"></span>';
                        taskDetailStr += '                              <span class="span2">Duration: <input type="text" class="duarationClass" onchange="getDuration($(this).data(\'id\'),' + item.projecttaskid + ')" data-id="duration' + item.projecttaskid + '" id="duration' + item.projecttaskid + '" value="'+days+'"> days</span>';                            
                        taskDetailStr += '                              <span style="margin-left: 12%;" onClick="chekTog(\'endDatein' + item.projecttaskid + '\');">End Date: <input type="text" id="endDatein' + item.projecttaskid + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy" value="'+moment(item.enddate).format('MMM DD YYYY')+'"></span>';                 
                        taskDetailStr += '                          </p>';
                        taskDetailStr += '                      </div>';    
                        taskDetailStr += '                  </div>';
                        taskDetailStr += '                  <div class="col-lg-2 col-sm-2 col-md-2 imgRow">';
                        taskDetailStr += '                      <div class="pull-right">';
                        taskDetailStr += '                          <img title="Supervisor And Member(s) List" class="icon-todo-menu onIconClick '+(data.nty_chat[i][0].total > 0 ? 'active-icon' : '')+'" id="clickIconlist' + item.projecttaskid + '" src="icons/Profile.png" " >';
                        taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Chat" onClick="qtipComment(this, ' + item.tasklistID + ')" class="icon-todo-menu" src="icons/Chat.png">';
                        taskDetailStr += '                          <img id="openQtipProperty' + item.projecttaskid + '" title="Task Properties" class="icon-todo-menu" src="icons/Details_Properties.png">';
                        taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Sticky Note" id="stickynote' + item.projecttaskid + '" class="icon-todo-menu open-stickynote">';
                        taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Subtask" class="icon-todo-menu subTaskcountbtn" id="subTaskcountbtn' + item.projecttaskid + '" src="icons/Subtask.png" style="margin: 0px;border-radius: 0px;margin-top: 0px;padding-right: 0px;">';
                        taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Manage File" onClick="qtipAttach(this,' + item.projecttaskid + ',' + item.opened_by + ')" class="icon-todo-menu" src="icons/Add File.png">';
                        taskDetailStr += '                      </div>';
                        taskDetailStr += '                  </div>';
                        taskDetailStr += '                  <div class="col-lg-12 subTaskListDiv" id="subTaskcountbtn' + item.projecttaskid + 'DIV">';
                        taskDetailStr += '                      <div class="row margin-topdown">';
                        taskDetailStr += '                          <div class="col-lg-8 col-sm-8 col-md-8">';
                        taskDetailStr += '                              <input type="text" id="newsubTaskInput'+item.projecttaskid+'" data-taskid="'+item.projecttaskid+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
                        taskDetailStr += '                          </div>';
                        taskDetailStr += '                      </div>';
                        taskDetailStr += '                      <div id="subtaskInsertDiv' + item.projecttaskid + '">';
                        taskDetailStr += '                      </div>';
                        taskDetailStr += '                  </div>';
                        taskDetailStr += '              </div>';

                        $("#taskInsertDiv").append(taskDetailStr);

                        $("#clickIconlist"+item.projecttaskid).click(function(){
                            qtipAssignee(this,item,crm_users);
                        });

                        $("#clickIconlist"+item.projecttaskid).mouseover(function(){
                            qtipAssignHover($(this).find('.onIconClick'),item);
                        });
                        
                        $('#openQtipProperty'+item.projecttaskid).click(function(){
                             qtipProperties(this,item,'Task');
                        });
                        

                        if(item.description){
                            var qtc='<div class="todo-desc">Description: '+item.description +'</div>';

                            $('#taskdestext'+item.projecttaskid).qtip({
                                content: {
                                    text: qtc

                                },

                                position: {
                                    at: 'bottom left',  
                                    my: 'top left', 

                                },
                                style: {
                                    classes: 'qtip-light qtip-rounded',
                                    width: '300'
                                },

                            });
                        }

                        qTipSticky(item.projecttaskid);

                        if(item.stickynote){                  
                            
                            $("#stickynote"+item.projecttaskid).attr('src','icons/Notes_active.png');
                            if(item.notepopup==1)                     
                                $("#stickynote"+item.projecttaskid).trigger('click');
                        
                        }else{
                            $("#stickynote"+item.projecttaskid).attr('src','icons/Notes.png');
                        }
                        
                        

                        flatpickr("#startDatein"+item.projecttaskid, {
                            enableTime: true,
                            dateFormat: 'Y-m-d H:i:S',
                            onChange: function(selectedDates, dateStr, instance) {
                                thisValue(selectedDates[0],item.projecttaskid,'startDatein','duration','task');
                            }
                        });

                        flatpickr("#endDatein"+item.projecttaskid, {
                            enableTime: true,
                            dateFormat: 'Y-m-d H:i:S',
                            onChange: function(selectedDates, dateStr, instance) {
                                thisValue(selectedDates[0],item.projecttaskid,'endDatein','duration','task');
                            }
                        });
                    
                        taskDetailStr ="";
                    });
                

                

        if(getCookie('taskid') != ""){
            $("#iconGray"+getCookie('taskid')).addClass('setActive');
            $("#iconGreen"+getCookie('taskid')).addClass('setActive');
             setCookie('taskid',getCookie('taskid'),0);
        }

        }else{
            $("#sorryDiv").show();
        }

        }

		$("#open_newpro1").click(function() {
				
			$("#new_project_name").val("");
			$("#brief_note_new").val("");
			$('#DescShow').hide();
			$('#openNewProject_s1').modal('show');
			//$('#openNewProject_s2').modal('hide');
		});

		$("#calculator").click(function() {
				
			$('#calculatorModal').modal('show');
			//$('#openNewProject_s2').modal('hide');
		});

		$("#DesClick").on('click', function(){
	        $("#DescShow").slideToggle();
	        $(this).find('span').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top')
	    });

		$( "#open_newpro2" ).click(function() {
			createPro();
		});
		
		$( ".newpro_close" ).click(function() {
			$('#openNewProject_s2').modal('hide');
		});
		
		var asd = 1;
		function getDuration(id,value){
            

            var valu = parseInt( $("#"+id).val());
            var date = $("#startDatein"+value).val();
            
            //console.log(valu);
            
            if(valu != NaN){
               
                var newdate = moment(date).format('MM/DD/YYYY');
                var dateOne = new Date(newdate);
                var newdateOne = new Date(dateOne);
                 
                newdateOne.setDate(newdateOne.getDate() + valu);
                
                var dd = newdateOne.getDate();
                var mm = newdateOne.getMonth()+1;
                var y = newdateOne.getFullYear();

                var someFormattedDate = mm + '/' + dd + '/' + y;
                
                document.getElementById('endDatein'+value).value = moment(someFormattedDate).format('MMM DD YYYY');

                thisValue(date,value,'startDatein','duration','task');
            }else{
                 swal(
                  'Oops...',
                  'Your are tying without duration',
                  'error'
                )
            }
            
            
        }
		function chekTog(value){
			//alert(value);
			if (asd == 2) {
		        $('#ui-datepicker-div').hide();
		        asd = 1;
			}else{
				asd = 2;
				$('#ui-datepicker-div').show();
			}

		}

        

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
			 			var projectitem = '<div class="panel panel-default notifation inactive">';
							projectitem += '					<div class="panel-head">';
							projectitem += '						<span class="name"><b>'+pName+'</b> <span style="margin-right: 6%;" class="margintop0 pull-right"><img onclick="oDiv('+data.prioTask+')"  src="<?php echo base_url("asset/img/icons/Details_Properties.png"); ?>" /></span><span class="margintop0 pull-right"><img src="<?php echo base_url("asset/img/icons/Add File.png"); ?>" /></span></span>';
							projectitem += '					</div>';
							projectitem += '					<div class="panel-body status">';
							projectitem += '						<div class="who clearfix">';
							projectitem += '							<span class="name">0 of 0 task pending</span>';
							projectitem += '						</div>';
							projectitem += '					</div>';
							projectitem += '				</div>';
			 			
			 			$("#myProjectDivList").prepend(projectitem);
			 			//$("#newProjectForm").reset();
			 			$("#newProjectForm").trigger("reset");
			 			
			 			$('#openNewProject_s1').modal('hide');

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

		$(document).on('keypress', '#newTaskInput', function (e, isScriptInvoked) {
            var projectId;
            var taskDetailStr = "";
            var item = "0000000000";
            var days = 0;
            //console.log($("#newTaskInput").val());
            if (isScriptInvoked === true) {
            	//alert("Ok if");
            } else {
                if (e.keyCode == 13) {
	                   console.log($("#newTaskInput").val());
		                projectId = e.currentTarget.attributes[2].nodeValue;
		                
		                if(projectId != "" && $("#newTaskInput").val() != ""){
		                	$.ajax({
			                    url: '<?php echo site_url(); ?>Projects/savePopTaskNew',
			                    type: 'POST',
			                    data: {
			                        taskName: $("#newTaskInput").val(),
			                        pid: projectId
			                    },
			                    dataType: "JSON",
			                    success: function (data, textStatus) {
			                    	
			                    	//console.log(data.taskInsertID);  
			                    	

			      //               	taskDetailStr =  ' <div class="row bottom-border taskDetailDive" style="border-left: 5px solid #ffffff;">';
									// taskDetailStr += '					<div class="col-lg-10 col-sm-10 col-md-10 taskRow">	';					
									// taskDetailStr += '						<div class="col-lg-1">';
									// taskDetailStr += '							<div class="row text-center">';
									// taskDetailStr += '								<img class="icon-check" src="icons/Checkmark.png">';						
									// taskDetailStr += '							</div>';
									// taskDetailStr += '							<div class="row" id="subTaskcountbtnValue' + data.taskInsertID + '">';
									// taskDetailStr += '							</div>';
									// taskDetailStr += '						</div>';
									// taskDetailStr += '						<div class="col-lg-11">';
									// taskDetailStr += '							<span class="from">' + $("#newTaskInput").val() + '</span>';					
									// taskDetailStr += '							<p class="name">';							
									// taskDetailStr += '								<span class="span1">Start Date: <input type="text" id="startDatein' + data.taskInsertID + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy"  value="'+moment(new Date()).format('MMM DD YYYY')+'"></span>';
									// taskDetailStr += '								<span class="span2">Duration: <span id="duration' + data.taskInsertID + '">'+days+'</span> days</span>';							
									// taskDetailStr += '								<span style="margin-left: 12%;">End Date: <input type="text" id="endDatein' + data.taskInsertID + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy" value="'+moment(new Date()).format('MMM DD YYYY')+'"></span>';					
									// taskDetailStr += '							</p>';
									// taskDetailStr += '						</div>';	
									// taskDetailStr += '					</div>';
									// taskDetailStr += '					<div class="col-lg-2 col-sm-2 col-md-2 imgRow">';
									
         //                            taskDetailStr += '                      <div class="pull-right">';
         //                            taskDetailStr += '                          <img title="Supervisor And Member(s) List" class="icon-todo-menu onIconClick" id="clickIconlist' + data.taskInsertID + '" src="icons/Profile.png" " >';
         //                            taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Chat" onClick="qtipComment(this, \'0000000000\')" class="icon-todo-menu" src="icons/Chat.png">';
         //                            taskDetailStr += '                          <img id="openQtipProperty' + data.taskInsertID + '" title="Task Properties" class="icon-todo-menu" src="icons/Details_Properties.png">';
         //                            taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Sticky Note" id="stickynote' + data.taskInsertID + '" class="icon-todo-menu open-stickynote" src="icons/Notes.png">';
         //                            taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Subtask" class="icon-todo-menu subTaskcountbtn" id="subTaskcountbtn' + data.taskInsertID + '" src="icons/Subtask.png" style="margin: 0px;border-radius: 0px;margin-top: 0px;padding-right: 0px;">';
         //                            taskDetailStr += '                          <img data-toggle="tooltip" data-placement="bottom" title="Manage File" onClick="qtipAttach(this,' + data.taskInsertID + ',' + user_id + ')" class="icon-todo-menu" src="icons/Add File.png">';
         //                            taskDetailStr += '                      </div>';
									
         //                            taskDetailStr += '					</div>';
									// taskDetailStr += '					<div class="col-lg-12 subTaskListDiv" id="subTaskcountbtn' + data.taskInsertID + 'DIV">';
									// taskDetailStr += '						<div class="row margin-topdown">';
									// taskDetailStr += '							<div class="col-lg-8 col-sm-8 col-md-8">';
									// taskDetailStr += '								<input type="text" id="newsubTaskInput'+data.taskInsertID+'" data-taskid="'+data.taskInsertID+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
									// taskDetailStr += '							</div>';
									// taskDetailStr += '						</div>';
									// taskDetailStr += '						<div id="subtaskInsertDiv' + data.taskInsertID + '">';
									// taskDetailStr += '						</div>';
									// taskDetailStr += '					</div>';
									// taskDetailStr += '				</div>';

									// $("#taskInsertDiv").prepend(taskDetailStr);


         //                            $("#clickIconlist"+data.taskInsertID).click(function(){
         //                                qtipAssignee(this,data,crm_users);
         //                            });

         //                            $("#clickIconlist"+data.taskInsertID).mouseover(function(){
         //                                qtipAssignHover($(this).find('.onIconClick'),data);
         //                            });

         //                            flatpickr("#startDatein"+item.projecttaskid, {
         //                                defaultDate: 1477697199863, // Date objects and date strings are also accepted
         //                                enableTime: true
         //                            });

         //                            flatpickr("#endDatein"+item.projecttaskid, {
         //                                defaultDate: 1477697199863, // Date objects and date strings are also accepted
         //                                enableTime: true
         //                            });
									// // $("#startDatein"+data.taskInsertID).datepicker({
									// //     dateFormat: 'M d yy',
									// //     prevText: '<i class="fa fa-chevron-left"></i>',
									// //     nextText: '<i class="fa fa-chevron-right"></i>',
									// //     onSelect: function (selectedDate) {
									// //         thisValue(selectedDate,data.taskInsertID,'startDatein','duration','task');
									// //     }
									// // });

									// // $("#endDatein"+data.taskInsertID).datepicker({
									// //     dateFormat: 'M d yy',
									// //     prevText: '<i class="fa fa-chevron-left"></i>',
									// //     nextText: '<i class="fa fa-chevron-right"></i>',
									// //     onSelect: function (selectedDate) {
									// //         thisValue(selectedDate,data.taskInsertID,'endDatein','duration','task');
									// //     }
									// // });

									// taskDetailStr ="";

                                    $("#taskInsertDiv").text("");
                                    $("#sorryDiv").hide();
                                    $("#newTaskInput").val("");
                                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'));


			                    }
			                });
		                }else{
		                	swal("Oops...", "Something went wrong", "error");
                        }
	            }
            }
        });
        
        function makeComplete(taskID,status){
        	if(status == 'completed'){
        		//create clone from existing element
			  	
			  	swal({
				  	title: 'This is Completed',
				  	text: "Would you want to change its status?",
					type: 'warning',
				  	input: 'select',
				  	inputOptions: {
				    	'prospecting': 'Prospecting',
				    	'initiated': 'Initiated',
				    	'in progress': 'In Progress',
				    	'waiting for feedback': 'Waiting For Feedback',
				    	'on hold': 'On Hold',
				    	'delivered': 'Delivered',
				    	'archived': 'Archived'
				  	},
				  	inputPlaceholder: 'Please Select',
				  	showCancelButton: true,
				  	inputValidator: function (value) {
					    return new Promise(function (resolve, reject) {
					      resolve(value);
					    })
					}
				}).then(function (result) {
				  gotIt(taskID,result);
				})

			}else{
        		swal({
				  title: "Are you sure?",
				  text: "Would you complete this task?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn-danger",
				  confirmButtonText: "Yes, Complete it!"
				}).then(function (result) {
				  	completePro(taskID);
				})
				
        	}
        	
        }

        function gotIt(projectID,result){
        	$.ajax({
                url: '<?php echo site_url() . "Projects/TaskMakeComplete"; ?>',
                type: 'POST',
                data: {tid: projectID,type:result},
                dataType: "json",
                success: function (res) {
					//console.log(res);
					$("#taskInsertDiv").html("");
					swal({type: 'success',html: 'You selected: ' + result });
					fun_loadfulltable($("#newTaskInput").attr('data-projectid'));
					//
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        function completePro(projectID){
        	$.ajax({
                url: '<?php echo site_url() . "Projects/TaskMakeComplete"; ?>',
                type: 'POST',
                data: {tid: projectID,type:'completed'},
                dataType: "json",
                success: function (res) {
					//console.log(res);
					$("#taskInsertDiv").html("");
					swal("Good Job!!!", "Task Successfully Completed", "success");
					fun_loadfulltable($("#newTaskInput").attr('data-projectid'));
					//
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });   
        }

        function openQouteDivTask(){

            var proID = $("#newTaskInput").attr('data-projectid');
            var user_id = '<?php echo $id; ?>';
            var createdby_id=$('#quote_details').attr('data-createdby');
            var get_status;
            if(user_id==createdby_id) get_status=1;
            else get_status=0;
            

            //$("#chat992 table tbody").html("");
            var request = $.ajax({
                    url: "<?php echo site_url("Projects/getTaskQouteList"); ?>",
                    data: {pid: proID,user_id:user_id,get_status:get_status},
                    method: "POST",
                    dataType: "json"
                });            
                request.done(function(data) {
                    alert('qqq');
                    if(data.currencyList.length>0){
                        currency_symbol=data.currencyList[0].name;
                        currency_type=data.currencyList[0].type_value;
                    }else{
                        currency_symbol='BDT';
                        currency_type='auto';
                    }
                    js_unitList=[];
                    $(data.UnitList).each(function(i,val){
                        js_unitList.push(val.name);
                    });
                    taskQuoteListLoad(data);
                   

                });
                 request.fail(function(data) {

                //console.log(data);
            });
        }

        function openInvoiceDivTask(){
        
        var proID = $("#newTaskInput").attr('data-projectid');
        alert(proID);

        $("#chat992 table tbody").html("");
        var request = $.ajax({
                url: "<?php echo site_url("Projects/getInvoiceList"); ?>",
                data: {pid: proID},
                method: "POST",
                dataType: "json"
            });            
            request.done(function(rsp) {
                //console.log(rsp);
                $.each(rsp.allInvoiceList, function(k,v){
                    var design = '';
                    //console.log(rsp.allInvoiceList[k]);
                    
                    
                    if(k==0)
                        design += '<tr class="grouprow" id="grouprow'+rsp.allInvoiceList[k].proID+'" style="border-top: 1px solid #000 !important;">';
                    else
                        design += '<tr class="grouprow" id="grouprow'+rsp.allInvoiceList[k].proID+'">';
                    
                    design +=   '<td> <img style="width: 70%;margin:10%;" src="<?php echo base_url();?>require/img/pdf-icon.png" /></td>';
                    design +=   '<td>'+rsp.allInvoiceList[k].subject+'</td>';
                    design +=   '<td>'+rsp.allInvoiceList[k].total+'</td>';
                    design +=   '<td>'+rsp.allInvoiceList[k].invoicedate+'</td>';
                    design += '</tr>';
                    $("#chat994 table tbody").append(design);
                });

            });
    }



  //   function openTaskSideDiv(taskID, taskListID,param = false) {
  //   	$("#form_datasetTaskpro").attr('action','<?php echo base_url(); ?>Projects/updateTask');
  //   	$("#CommentType").val('TASK');
  //   	var winsize = window.innerHeight;
    	
  //   	taskdataid = taskID;
  //   	tasklistdataid= taskListID;

  //   	if(winsize < 500){
  //          	alert("Your browser height is too low to display this settings");
  //   	}

  //       else{
  //           var effect = 'slide';
  //           // console.log(taskID+","+taskListID);
  //           var options = {direction: 'right'};
  //           var duration = 500;
  //           var projectID = $("#newTaskInput").attr('data-projectid');
  //           pro_id=projectID;
  //           user_id = "<?php echo $id; ?>";
            
  //           // if(user_id==pro_creatorid) get_status=1;
  //           // else 
  //           get_status=0;

  //           qTipNewQuote($("#addnew-quotes-up"),'up',projectID,taskID);
  //   		qTipNewQuote($("#addnew-quotes-down"),'down',projectID,taskID);

  //           $.ajax({
  //               url: '<?php echo site_url(); ?>Projects/taskDetail',
  //               type: 'POST',
  //               data: {
  //                   taskID: taskID,
  //                   taskLsitID: taskListID,
  //                   projectID: projectID,
  //                   get_status:get_status,
  //                   user_id:user_id
  //               },
  //               dataType: "json",
  //               beforeSend: function () {
  //                   //console.log("Emptying");
  //                   $("#togPopH").val("");
  //                   $("#tasknametitle").val("");
  //                   $("#assMembers").html("");
  //                   $("#item_details").hide();
  //                   $('#quote_details_pro > tbody').html("");
  //                   $('#invoice_details_pro > tbody').html("");
  //               },
  //               success: function (data, textStatus) {
                    
  //                   //console.log("::::::::::FULL TASK DETAILS::::::::");
  //                   //console.log(data);

		// 			row_in=0;
  //                   propertiesLoadTask(data);
  //                   taskQuoteListLoad(data);
  //                   taskInvoiceListLoad(data);
  //                   ajaxTaskDetail(taskID, projectID);

  //                   gbl_rates = new Object();
  //                $.ajax({
  //                   url: '<?php echo site_url(); ?>Projects/curlQuoteCurrency',
  //                   type: 'POST',
                   
  //                   dataType: "json",
                   
  //                   success: function (data, textStatus) {
  //                       //console.log('curlQuoteCurrency');
  //                       //console.log(data);
                     
                                
  //                     $.each( JSON.parse(data.NewCurrencyValue), function( key, val ) { 

  //                      gbl_rates[val.currency_code] = val.rate;

  //                     });
  //                      fx.base = "USD";
  //                      fx.rates = gbl_rates;
  //                           //});
  //                   },
  //                   error: function (jqXHR, textStatus, errorThrown) {
  //                       // Some code to debbug e.g.:               
  //                       console.log(jqXHR);
  //                       console.log(textStatus);
  //                       console.log(errorThrown);
  //                   }
  //               });

                    
  //                   var projectName = $("#pronameSpan").text();
		// 			var loc = projectName + " >> Default";
                    
  //                   $("#togPopH").val(data.dataList[0].projecttaskname);
  //                   $("#tasknametitle").val(data.dataList[0].projecttaskname);
  //                   $("#createdbyname").html(data.dataList[0].display_name);
                    
  //                   if (data.dataList[0].task_status == "COMPLETE") {
  //                       $("#chkchangetaskstatus").prop("checked", true);
  //                   }
                    

  //                   $("#projecteid").val(projectID);
  //                   $("#taskListID").val(taskListID);
  //                   $("#optld-tlid").val(taskListID);
  //                   $("#taskID").val(taskID);
                   
                   
  //                   $("#loc").html(loc);
  //                   $("#loc").attr("data-project", projectName);
  //                   $("#loc").attr("data-task", "Default");
  //                   $("#chkchangetaskstatus").attr("data-taskid", taskID);
  //                   $("#chkchangetaskstatus").attr("data-taskdivid", taskListID);
  //                   $('#taskMyDiv').toggle(effect, options, duration, function(){
  //                       $(this).find('#description').focus();
  //                   });

  //                   if(param == 'chat'){
		// 				$('.nav-tabs a[href="#tab_2T"]').tab('show');
	 //                }else if(param == 'file'){
		// 				$('.nav-tabs a[href="#tab_3T"]').tab('show');
	 //                }else
	 //                	$('.nav-tabs a[href="#tab_1T"]').tab('show');
                    
  //                   if(winsize>930) var mydivbodysize = "676";
  //                   else var mydivbodysize = (winsize - 254);
                    
  //                   $("#taskMyDiv .row .box-body").css("height",mydivbodysize);

					
  //               },
  //               error: function (jqXHR, textStatus, errorThrown) {
  //                   // Some code to debbug e.g.:               
  //                   console.log(jqXHR);
  //                   console.log(textStatus);
  //                   console.log(errorThrown);
  //               }
  //           });
		// return false;
  //       }

  //   }

    function qtipComment(element,data){
        
        var projectID = $("#newTaskInput").attr('data-projectid');
        var attr='comments';

        $(element).qtip({
            show: {
                ready: true
            },
            hide: 'unfocus',
            content: {
                text: 'Loading...'

            },
            events: {
                hide: function () {
                    $(this).qtip('destroy');
                },
                
                show: function(event, api) {
                    
                    $(window).bind('keydown', function(e) {
                        if(e.keyCode === 27) { api.hide(e); }
                    });

                    $.ajax({
                        url: base_url+'projects/getCommentForProjects', // URL to the local file
                        type: 'POST', // POST or GET
                        data: { 
                            projectID:projectID
                        }, // Data to pass along with your request
                        success: function(resp, status) {
                            console.log(resp);
                            var creBy = '';
                            
                            $.each(alluser, function (key, value) {
                                if(value.ID == resp.creator[0].createdBy){
                                    creBy = value.full_name;
                                }
                            });

                            var floatingDiv =  ' <div class="" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="">';
                            floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                            floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                            floatingDiv += '            <span class="col-lg-11 proDivname">';
                            floatingDiv += '                <span class="todo-text-prop">'+$("#pronameSpan").text()+'</span>';
                            floatingDiv += '                <span class="todo-createdby">Created By: '+creBy+'</span>';
                            floatingDiv += '            </span>';
                            //floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                            floatingDiv += '        </div>';
                            floatingDiv += '        <div class="panel-body">'+todoCommentsDesign(resp,projectID)+'</div>';
                            floatingDiv += '     </div>';
                            floatingDiv += ' </div></div>';
                            floatingDiv += ' <input type="hidden" id="newTaskInput" data-projectid="'+projectID+'" class="form-control border-rad">';
                            api.set('content.text', floatingDiv);
                            
                            //setProjecttag(resp,projectID);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // Some code to debbug e.g.:               
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        }
                    });

                },

            },
            position: {
                
                my: 'right center', 
                at: 'left center',  
                viewport: $(window),
                adjust: {
                    method: 'none shift'
                },
                effect: false
                  

            },
            style: {
                classes: 'qtip-light',
                width: '800',
                tip: {
                    corner: true,
                    width: 40,
                    height: 40,
                    //offset: -220
                }
            },


        });
    }

    function qtipAttach(element,taskid,opendBy){
        
        var projectID = $("#newTaskInput").attr('data-projectid');
        
        var attr='attach';


        $(element).qtip({
            show: {
                ready: true
            },
            hide: 'click unfocus',
            content: {
                text: 'Loading...'

            },
            events: {
                hide: function () {
                    $(this).qtip('destroy');
                },
                show: function(event, api) {
                    
                    $(window).bind('keydown', function(e) {
                        if(e.keyCode === 27) { api.hide(e); }
                    });
                    var creBy = '';
                    $.each(alluser, function (key, value) {
                        var userID = parseInt(opendBy);
                        if(value.ID == userID){
                            creBy = value.full_name;
                        }
                    });

                    var floatingDiv =  ' <div class="" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="">';
                    floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                    floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                    floatingDiv += '            <span class="col-lg-11 proDivname">';
                    floatingDiv += '                <span class="todo-text-prop">'+$("#taskdestext"+taskid).text()+'</span>';
                    floatingDiv += '                <span class="todo-createdby">Created By: '+creBy+'</span>';
                    floatingDiv += '            </span>';
                    //floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                    floatingDiv += '        </div>';
                    floatingDiv += '        <div class="panel-body">'+projectAttachDesign()+'</div>';
                    floatingDiv += '     </div>';
                    floatingDiv += ' </div></div>';
                    floatingDiv += ' <input type="hidden" id="newTaskInput" data-projectid="'+projectID+'" class="form-control border-rad">';
                    
                    

                    attachdataload('Task',taskid,projectID);
                    
                    api.set('content.text', floatingDiv);


                    $("#icsupload").on('change', function() {
                
                        var formData = new FormData();
                        
                        console.log(formData);

                        formData.append('fileToUpload[]', $('#icsupload')[0].files[0]);
                        formData.append('projectName', $("#pronameSpan").text());
                        formData.append('parentType', 'Task');
                        formData.append('parentID', taskid);
                        formData.append('dirname', "ProjectsFiles");
                        
                        var request = $.ajax({
                            url: '<?php echo site_url('Projects/newProjectFile'); ?>',
                            method: "POST",
                            data: formData,
                            //async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json"
                        });
                        
                        request.done(function( status ) {
                            
                            console.log(status);

                            var res = status.file_new_name.split("_");
                            var filter = status.file_new_name.split(".");

                            tabDetail ='       <div class="col-lg-12 SA '+filter[1].toUpperCase()+'" id="fileWholeDiv007'+status.insert_id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
                            tabDetail +='           <div class="col-lg-5"><img class="" src="icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;" id="fileoriname007'+status.insert_id+'">'+status.msg+'</span></div>';
                            tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
                           
                            tabDetail +='               <img class="icon-todo-menu" id="MakeStatus007'+status.insert_id+'" onclick="makeStar($(this).data(\'docid\'),$(this).data(\'status\'))" data-docid="'+status.insert_id+'" data-status="NO" src="'+base_url+'icons/Star.png">';
                            tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'icons/Profile.png" onClick="userListShowOnlick(this,' + projectID + ')" >';
                            tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
                                
                            tabDetail += '              <ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
                            tabDetail += '                  <div class="arrow-top-right"></div>';
                            tabDetail += '                  <li onclick="showDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+status.msg+'" data-filesize="'+status.size+'" data-createby="'+res[0]+'" data-createdate="'+status.currrentDate+'"> <i class="fa fa-info"></i> Details</li>';
                            tabDetail += '                  <li id="onclkid007'+status.insert_id+'" onclick="renameDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+status.msg+'" data-filesize="'+status.size+'" data-createby="'+res[0]+'" data-createdate="'+status.insert_id+'"> <i class="fa fa-pencil"></i> Rename</li>';
                            tabDetail += '                  <a class="downloadHover" href="<?php echo base_url() ?>ProjectsFiles/'+status.file_new_name+'" download><li> <i class="fa fa-download"></i> Downalod</li></a>';
                            tabDetail += '                  <li onclick="deleteFile($(this).data(\'createdate\'));" data-createdate="'+status.insert_id+'"> <i class="fa fa-trash-o"></i> Delete</li>';
                            tabDetail += '              </ul>';
                            tabDetail +='           </div>';
                            tabDetail +='           <div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">'+status.size+' KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">'+moment(status.currrentDate).toNow(true)+' ago</span></div>';
                            tabDetail +='       </div>';

                            

                            $("#attachListDiv").append(tabDetail);
                            
                        });
                        
                        request.fail(function( jqXHR, textStatus ) {
                            console.log('jqXHR');
                            console.log(jqXHR);
                            console.log(textStatus);
                        });
                        
                    });

                },

            },
            position: {
                
                my: 'right center', 
                at: 'left center',  
                viewport: $(window),
                adjust: {
                    method: 'none shift'
                },
                effect: false
                  

            },
            style: {
                classes: 'qtip-light',
                width: '800',
                tip: {
                    corner: true,
                    width: 40,
                    height: 40,
                    //offset: -220
                }
            },


        });
    }

    function todoCommentsDesign(data,projectsid){
        var tabDetail ='  <div class="row">';

        tabDetail +='           <div class="col-lg-12 projectfilefDiv" style="padding: 0%;">';
        tabDetail +='               <span class="pull-left col-lg-11 comtag" id="tagBtnDiv'+projectsid+'" style="margin-top: 0px;"></span>';
        tabDetail += '              <div class="col-lg-1 col-sm-1 col-md-1">'
        +'<li class="ddm-com-set" style="display:inline">'

        +   '<a class="dropdown-toggle dt-com-set" data-toggle="dropdown"><img class="" src="'+base_url+'icons/Settings.png"></a>'

        +   '<ul class="dropdown-menu dropdown-com-set">'

        +       '<div class="arrow-position-view"></div>'

        +       '<li><a>Archive</a></li>'
        +       '<li><a>Clear</a></li>'
        +       '<li><a>Block</a></li>'
        +       '<li><a>Starred</a></li>'
        +       '<li><a>Mute</a></li>'
        +       '<li><a>Mark as unread</a></li>'
        +       '<li><a>Select</a></li>'
        +   '</ul>'
        +'</li>'

        +'</div>';
        

        tabDetail +='               </div>';


        tabDetail +='    <div style="    border-top: 1px solid #e0dddd;margin-top: 6.5%;width: 100%; margin-left: 0%;">&nbsp;</div>';
        tabDetail +='    <div class="row attachListDiv feed" id="attachListDivCommnet">';

        
        $.each(data.allComm,function(k,v){
            tabDetail +='       <div class="panel panel-default proComm">';
            tabDetail +='           <div class="panel-body status status-left">';
            tabDetail +='               <div class="who clearfix">';
            tabDetail +='                   <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="chatimgleft">';
            tabDetail +='                   <div class="name dropdown"><b>'+data.allComm[k].full_name+'</b>';

            tabDetail +='                   <a data-toggle="dropdown" class="dropdown-toggle" title="Settings">';
            tabDetail +='                   <i class="fa fa-chevron-down pull-right"></i>';
            tabDetail +='                   </a>';

            tabDetail +=                    '<ul class="dropdown-menu pull-right">';
            tabDetail +=                    '<div class="arrow-top-right"></div>';
            tabDetail +=                    '<li><a onclick="openmessageinfo()">Msg Info</a></li>';
            tabDetail +=                    '<li><a onclick="singlemsgaction('+projectsid+', \'delete\')">Clear</a></li>';
            tabDetail +=                    '<li><a onclick="singlemsgaction('+projectsid+', \'forward\')">Forward</a></li>';
            tabDetail +=                    '</ul>';
            tabDetail +=                    '<i class="fa fa-star-o pull-right" id="starico'+projectsid+'" onclick="changestarlinktext('+projectsid+')"></i>';
            tabDetail +=                                            '<input type="checkbox" class="pull-right checkboxForActivity" id="msgid'+projectsid+'" name="msgid" value="'+projectsid+'"></div>';

            tabDetail +='                   <span class="name" style="font-size: 9px;">'+moment(data.allComm[k].CreatedDate).format('LLLL')+'</span>';
            tabDetail +='                   <span  class="from">'+data.allComm[k].Description+'</span>';
            tabDetail +='               </div>';
            tabDetail +='           </div>';
            tabDetail +='       </div>';
        });

        tabDetail +='    <div class="projectInput">';
        tabDetail +='       <div class="col-lg-12" id="input_container">';
        tabDetail +='           <input type="text" id="commentinput" class="form-control commentinput"/>';
        tabDetail +='           <img src="'+base_url+'icons/emo.png" id="input_img1">';
        tabDetail +='           <img src="'+base_url+'icons/attach.png" id="input_img2">';
        tabDetail +='       </div>';
        tabDetail +='    </div>';
        tabDetail +=' </div>';

        $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);


        return tabDetail;
    }

    function propertiesLoadTask(data) {
        
        //console.log(data.dataList);
        //console.log(data.dataList[0].proCurSta);

        
        $("#memberTask").html("");
        $("#assignToMemberTask").html("");

        $("#memberTask").append('<option value="#addnew">Invite new people +</option>');
        $("#assignToMemberTask").append('<option value="#addnew">Invite new people +</option>');
        
        $.each(selectArray, function (key, value) {
            var name = value.full_name;
            $("#memberTask").append('<option value="' + value.ID + '">' + name + '</option>');
            $("#assignToMemberTask").append('<option value="' + value.ID + '" >' + name + '</option>');
        });

        $("#assignToMemberTask option:selected").removeAttr("selected"); // added by sujon

        $(".select2_multiple30 option:selected").removeAttr("selected");
        $(".select2_multiple1 option:selected").removeAttr("selected");
        $(".select2_multiple2 option:selected").removeAttr("selected");
        $(".select2_multiple3 option:selected").removeAttr("selected");
        
        if (data.dataList[0].task_status == "COMPLETE") {
            $("#chkchangetaskstatus").prop("checked", true);
        }
        
        $("#chkchangetaskstatus").attr("data-taskid", data.dataList[0].projecttaskid);
        $("#chkchangetaskstatus").attr("data-taskdivid", data.dataList[0].tasklistID);
        
        $("#togPopTitle").html(data.dataList[0].projecttaskname);
        $("#datetimepicker7Task").val(data.dataList[0].startdate);
        $("#datetimepicker8Task").val(data.dataList[0].enddate);
        //$("#togPopTime").html(data.proDetail.projectname);
        // console.log(data.tag);
        
        $.each(data.tag, function (key, value) {
            if(data.tag[key].user_status == 0)
                $('#assignToMemberTask option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
        });

        $("#assignToMemberTask").trigger("change", [true]);
        
        $.each(data.tag, function (key, value) {
            
            if(data.tag[key].user_status == 1)
                $('.select2_multiple30 option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
        });
        $(".select2_multiple30").trigger("change", [true]);
        
        $.each(data.tag, function (key, value) {
            $("#assMembers").append('<button class="btn btn-block btn-default">' + data.tag[key].display_name + ' <i class="fa fa-close pull-right"></i></button>');
            $('.select2_multiple1 option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
        });

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
        $('#projecttaskprogressTask').val(Number(data.dataList[0].projecttaskprogress)); // fixed by sujon
        $('#ticketpriorities option[value="' + data.dataList[0].projecttaskpriority + '"]').attr("selected", "selected");
        
        $("#taskdescription").text(data.dataList[0].description);
        $("#workhour").val(data.dataList[0].projecttaskhours);
        $("#label").val(data.dataList[0].label);
        $("#label").css('background-color', data.dataList[0].label);
        $("#projecteidTask").val(data.dataList[0].projectid);
        $("#this_type").val(data.dataList[0].this_type);
        
        if(data.dataList[0].parenttaskID != ""){
        	$("#parentTaskid").val(data.dataList[0].parenttaskID);
        }
        


    }


	</script>
	<script type="text/javascript">
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
	                //console.log(updated_id);
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


	</script>
	<script type="text/javascript">
	    
	    var global_feedback = [];

	    function toggleDiv() {
	        var winsize = window.innerHeight;
	        var opntid = $("#taskOpenBy").val();
	        var myseid = "<?php echo $id; ?>";
	        
	        var effect = 'slide';
            var options = {direction: 'right'};
            var duration = 500;


	        if($("#feedDiv").css("display") == "none"){
	            $(".feedbackbtn").css("margin-left","664px");
	        }else{
	            $(".feedbackbtn").css("margin-left","-64px");
	        }
	        
	        if (global_feedback.length > 0) {
	            
	            var imgurl = "<?php echo base_url(); ?>require/img/badge/";
	            var design = "";
	            $.each(global_feedback, function (gfk, gfv) {
	                design += '<div class="col-md-10">' +
	                        '<img src="' + imgurl + gfv.feedback_badge + '.png" />' +
	                        '<p><b>' + gfv.feedback_badge + '</b></p>' +
	                        '<p><b>Compliments</b>' + gfv.feedback_compliments + '</p>' +
	                        '<p><b>Scope for improvement</b>' + gfv.feedback_improvement + '</p>' +
	                        '</div>';
	                if (parseInt(opntid) == parseInt(myseid)) {
	                    design += '<div class="col-md-2">' +
	                            '<button type="button" class="btn btn-primary" onclick="editfeedback(' + gfv.id + ')"><i class="fa fa-fw fa-pencil-square-o"></i></button>&nbsp;&nbsp;' +
	                            '<button type="button" class="btn btn-primary" onclick="feedback_delete(' + gfv.id + ')"><i class="fa fa-fw fa-trash-o"></i></button>' +
	                            '</div>';
	                }

	            });
	            $("#feedDiv2Content").text("");
	            $("#feedDiv2Content").append(design);
	            $("#feedDiv1").hide();
	            $("#feedDiv2").show();
	            $("#feedDiv").toggle();
	        } else {
	        	if (parseInt(opntid) == parseInt(myseid)) {
	                $("#feedDiv1").show();
	                $("#feedDiv2").hide();
	                
	                $('#feedDiv').toggle(effect, options, duration, function(){
                        $(this).find('#description').focus();
                    });

	            }
	        }

	        if(winsize>720) var mydivbodysize = "662";
	        else var mydivbodysize = (winsize - 150);
	        $("#feedDiv").css("height",mydivbodysize);
	    }

	    function selectbadge(v, e) {
	        // console.log($("#taskId").val());
	        // console.log(global_feedback);
	        $(".child").attr("class", "child");
	        $("#feedbackBadge").val(v);
	        $(e).attr("class", "child badgeselected");
	    }


	    function feedback_submit() {
	        var bn = $("#feedbackBadge").val();
	        var tc = $("#taskCompliments").val();
	        var ti = $("#taskImprovement").val();
	        var ptid = $("#taskId").val();
	        var imgurl = "<?php echo base_url(); ?>require/img/badge/";
	        $.ajax({
	            url: '<?php echo site_url() . "yzy-tasks/index/feedback_save"; ?>',
	            type: 'POST',
	            data: {ptid: ptid, feedback_badge: bn, feedback_compliments: tc, feedback_improvement: ti},
	            dataType: "html",
	            beforeSend: function () {
	                // console.log(bn);
	                // console.log(tc);
	                // console.log(ptid);
	                // console.log(imgurl);
	            },
	            success: function (res) {
	                if (res) {
	                    //console.log(res);
	                    global_feedback.push({feedback_badge: bn, feedback_compliments: tc, feedback_improvement: ti});
	                    var design = '<div class="col-md-10">' +
	                            '<img src="' + imgurl + bn + '.png" />' +
	                            '<p><b>' + bn + '</b></p>' +
	                            '<p><b>Compliments</b>' + tc + '</p>' +
	                            '<p><b>Scope for improvement</b>' + ti + '</p>' +
	                            '</div>' +
	                            '<div class="col-md-2">' +
	                            '<button type="button" class="btn btn-primary" onclick="editfeedback(' + res + ')"><i class="fa fa-fw fa-pencil-square-o"></i></button>&nbsp;&nbsp;' +
	                            '<button type="button" class="btn btn-primary" onclick="feedback_delete(' + res + ')"><i class="fa fa-fw fa-trash-o"></i></button>' +
	                            '</div>';
	                    $("#feedDiv2Content").append(design);
	                    $("#feedDiv1").hide();
	                    $("#feedDiv2").show();
	                } else {
	                    // console.log("Feedback not saved");
	                }
	            },
	            error: function () {
	            }
	        });
	    }

	    function feedback_update() {
	        var bn = $("#feedbackBadge").val();
	        var tc = $("#taskCompliments").val();
	        var ti = $("#taskImprovement").val();
	        var ptid = $("#taskId").val();
	        var fid = $("#feedback_id").val();
	        var design = "";
	        var imgurl = "<?php echo base_url(); ?>require/img/badge/";
	        $.ajax({
	            url: '<?php echo site_url() . "yzy-tasks/index/feedback_save/1"; ?>',
	            type: 'POST',
	            data: {fid: fid, ptid: ptid, feedback_badge: bn, feedback_compliments: tc, feedback_improvement: ti},
	            dataType: "html",
	            success: function (res) {
	                if (res) {
	                    $.each(global_feedback, function (gfk, gfv) {
	                        if (gfv.id == fid) {
	                            global_feedback[gfk].feedback_badge = bn;
	                            global_feedback[gfk].feedback_compliments = tc;
	                            global_feedback[gfk].feedback_improvement = ti;
	                        }
	                        design += '<div class="col-md-10">' +
	                                '<img src="' + imgurl + gfv.feedback_badge + '.png" />' +
	                                '<p><b>' + gfv.feedback_badge + '</b></p>' +
	                                '<p><b>Compliments</b>' + gfv.feedback_compliments + '</p>' +
	                                '<p><b>Scope for improvement</b>' + gfv.feedback_improvement + '</p>' +
	                                '</div>' +
	                                '<div class="col-md-2">' +
	                                '<button type="button" class="btn btn-primary" onclick="editfeedback(' + gfv.id + ')"><i class="fa fa-fw fa-pencil-square-o"></i></button>&nbsp;&nbsp;' +
	                                '<button type="button" class="btn btn-primary" onclick="feedback_delete(' + gfv.id + ')"><i class="fa fa-fw fa-trash-o"></i></button>' +
	                                '</div>';
	                    });
	                    $("#feedDiv2Content").html("");
	                    $("#feedDiv2Content").append(design);
	                    $("#feedDiv1").hide();
	                    $("#feedDiv2").show();
	                } else {
	                    // console.log("Feedback not saved");
	                }
	            },
	            error: function () {
	            }
	        });
	    }

	    function editfeedback(id) {
	        $("#feedback_id").val(id);
	        $.each(global_feedback, function (k, v) {
	            if (v.id == id) {
	                $("#taskCompliments").val(v.feedback_compliments);
	                $("#taskImprovement").val(v.feedback_improvement);
	            }
	        });
	        $("#feedback_update").show();
	        $("#feedDiv2").hide();
	        $("#feedDiv1").show();
	    }


	    function feedback_delete(id) {
	        var indexofremoveid;
	        var imgurl = "<?php echo base_url(); ?>require/img/badge/";
	        
	        $.ajax({
	            url: '<?php echo site_url() . "yzy-tasks/index/feedback_delete"; ?>',
	            type: 'POST',
	            data: {fid: id},
	            dataType: "html",
	            success: function (res) {
	                var design = "";
	                if (res == "done") {
	                    // document.location.reload(true);
	                    $.each(global_feedback, function (gfk, gfv) {
	                        if (gfv.id == id) {
	                            indexofremoveid = gfk;
	                        } else {
	                            design = '<div class="col-md-10">' +
	                                    '<img src="' + imgurl + gfv.feedback_badge + '.png" />' +
	                                    '<p><b>' + gfv.feedback_badge + '</b></p>' +
	                                    '<p><b>Compliments</b>' + gfv.feedback_compliments + '</p>' +
	                                    '<p><b>Scope for improvement</b>' + gfv.feedback_improvement + '</p>' +
	                                    '</div>' +
	                                    '<div class="col-md-2">' +
	                                    '<button type="button" class="btn btn-primary" onclick="editfeedback(' + gfv.id + ')"><i class="fa fa-fw fa-pencil-square-o"></i></button>&nbsp;&nbsp;' +
	                                    '<button type="button" class="btn btn-primary" onclick="feedback_delete(' + gfv.id + ')"><i class="fa fa-fw fa-trash-o"></i></button>' +
	                                    '</div>';
	                        }

	                    });

	                    $("#feedDiv2Content").html("");
	                    $("#feedDiv2Content").append(design);
	                    $("#feedDiv2").show();
	                    global_feedback.splice(indexofremoveid, 1);
	                } else {
	                    // console.log("Feedback not saved");
	                }
	            },
	            error: function () {
	            }
	        });
	    }

	</script>
	<script  type="text/javascript">   //no need to specify the language
	    function ajaxTaskDetail(Vid, typeid) {
	        //console.log(Vid+","+typeid);
	        var URL1 = '<?php echo site_url(); ?>/uploads/';
	        var URL = '<?php echo site_url(); ?>Projects/document/' + Vid;
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
	            url: '<?php echo site_url(); ?>Projects/taskDetail',
	            type: 'POST',
	            data: {
	            	taskID: Vid, 
	            	get_status:get_status,
	            	user_id:user_id,
	            	type: $("#CommentType").val()
	            },
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
	                
	                //console.log(data);
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
	                        
	                        design +=   '<td > <img style="width: 70%;margin: 17%;padding-right: 35%;" src="<?php echo base_url();?>require/img/'+data.docList[key].file_name.split('.').pop()+'.png" /></td>';
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
	        allowedFileExtensions: ['doc', 'docx', 'pdf', 'xls', 'xlxs', 'csv', 'ppt', 'pptx', 'txt','sql','ods','odf','odt','csv','htm','html','log','reg','text','xml','xmp','swf',,'flv','webm','zip','rar','jar','rss'],
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
	        allowedFileExtensions: ['doc', 'docx', 'pdf', 'xls', 'xlxs', 'csv', 'ppt', 'pptx', 'txt','sql','ods','odf','odt','csv','htm','html','log','reg','text','xml','xmp','swf',,'flv','webm','zip','rar','jar','rss'],
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
	    function performClick(elemId) {
	        var elem = document.getElementById(elemId);
	        if (elem && document.createEvent) {
	            var evt = document.createEvent("MouseEvents");
	            evt.initEvent("click", true, false);
	            elem.dispatchEvent(evt);
	        }
	    }

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

	    // $(function(){
	    //  $("#uploadFile").click(function (e) {


	    //  });
	    // });

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
	                url: "<?php echo site_url(); ?>Projects/fileUp",
	                type: "POST",
	                data: fdn,
	                enctype: 'multipart/form-data',
	                processData: false, // tell jQuery not to process the data
	                contentType: false   // tell jQuery not to set contentType
	            }).done(function (data) {
	                //console.log("PHP Output:");
	                //console.log( data );
	                $(".fileinput-remove").trigger('click', [true]);

	//                 var fileStringNew = '<div class="item itemTASK' + data.fileID + '" id="itemTASK' + data.fileID + '"><img src="' + URL1 + '/' + UserImg + '" alt="user image" class="online"><div class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + userName + '</a>';
	//                 fileStringNew += '<table style="width:100%;">';
	//                 fileStringNew += '<tr>';
	//                 fileStringNew += '<td style="width:40%;text-align:center;"><a style="float: left;margin-left: 0px;" href="' + patha + data.file_name + '" target="_BLANK"><img style="width: 44%;" src="' + IMG2URL + '" /></a></td>';
	//                 fileStringNew += '<td><p>Title: ' + data.file_title + '</p></td>';

	//                 fileStringNew += '<td rowspan="2"><p><small style="margin-left:30%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.fileID + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + data.fileID + ',\'file\')">Edit</small> | <small style="margin-left:0%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.fileID + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + data.fileID + ',\'file\')">Delete</small></p></td>';
	// //<small style="margin-left:30%; color: #3C8DBC; cursor: pointer;" data-id = "'+data.fileID+'"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),'+data.fileID+',\'file\')">Edit</small> | 
	//                 fileStringNew += '</tr>';
	//                 fileStringNew += '<tr>';
	//                 fileStringNew += '<td><a style="float: left;margin-left: 0px;" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/' + data.file_name + '" target="_BLANK">' + data.ori_name + '</a></td>';
	//                 fileStringNew += '<td><p>File Size: ' + data.file_size + 'KB</p></td>';
	//                 fileStringNew += '</tr>';
	//                 fileStringNew += '</table>';
	//                 fileStringNew += '</div></div>';
	                
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
	                $("#uploadFile").css("display", "none");

	            }).error(function (data) {
	                //console.log("PHP Output:");


	            });

	        }
	    }

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
	            swal("Oops...", "Comment value null", "error");
	            // bootbox.dialog({
	            //     message: "Comment value null",
	            //     title: "Dialog Box",
	            //     buttons: {
	            //         success: {
	            //             label: "Ok!",
	            //             className: "btn-danger",
	            //             callback: function () {

	            //             }
	            //         }

	            //     }
	            // });
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
	            url: '<?php echo site_url(); ?>Projects/sendComment',
	            type: 'POST',
	            data: {
	                taskId: taskId,
	                comment: comment,
	                UserImg: UserImg,
	                userName: userName,
	                type: $("#CommentType").val(),
	                projectID:$("#newTaskInput").attr('data-projectid')
	            },
	            dataType: "json",
	            beforeSend: function () {
	                //console.log("Emptying");
	                //console.log(comment);
	            },
	            success: function (data, textStatus) {
	                //console.log(data);
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
	                        url: "<?php echo site_url(); ?>Projects/fileUp",
	                        type: "POST",
	                        data: fdn,
	                        enctype: 'multipart/form-data',
	                        processData: false, // tell jQuery not to process the data
	                        contentType: false   // tell jQuery not to set contentType
	                    }).done(function (data) {
	                        // console.log(data.fileID);
	                        // console.log(comID);
	                        $(".fileinput-remove").trigger('click', [true]);

	                        $.each(data.filelist, function (k, v) {
	//                             var fileStringNew = '<div class="item itemTASK' + comID + '" id="itemTASK' + comID + '"><img src="' + URL1 + '/' + UserImg + '" alt="user image" class="online"><div class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + userName + '</a>';
	//                             fileStringNew += '<table style="width:100%;">';
	//                             fileStringNew += '<tr>';
	//                             fileStringNew += '<td style="width:40%;text-align:center;"><a style="float: left;margin-left: 0px;" href="' + patha + data.filelist[k].file_name + '" target="_BLANK"><img style="width: 44%;" src="' + IMG2URL + '" /></a></td>';
	//                             fileStringNew += '<td><p>Title: ' + data.filelist[k].name + '</p></td>';

	//                             fileStringNew += '<td rowspan="2"><p><small style="margin-left:0%; color: #3C8DBC; cursor: pointer;" data-id = "' + comID + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + comID + ',\'file\')">Delete</small></p></td>';
	// //<small style="margin-left:30%; color: #3C8DBC; cursor: pointer;" data-id = "'+comID+'"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),'+comID+',\'file\')">Edit</small> | 
	//                             fileStringNew += '</tr>';
	//                             fileStringNew += '<tr>';
	//                             fileStringNew += '<td><a style="float: left;margin-left: 0px;" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/' + data.filelist[k].file_name + '" target="_BLANK">' + data.filelist[k].ori_name + '</a></td>';
	//                             fileStringNew += '<td><p>File Size: ' + data.filelist[k].file_size + 'KB</p></td>';
	//                             fileStringNew += '</tr>';
	//                             fileStringNew += '</table>';
	//                             fileStringNew += '</div></div>';

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
	</script>
	<script type="text/javascript">
	    

	    function checkCokie(){
	    	
	        if(getCookie('project') != ""){
	        	//console.log(e.currentTarget.id);
				
				var targetProjectId = getCookie('project');
				//var targetProName = getCookie('projectName');

				var targetProName = $("#clickDiv"+targetProjectId).find('b')[0].innerText;
				
				$(".notifation").siblings().attr('class');
				if($("#clickDiv"+targetProjectId).hasClass('inactive')){
					$("#clickDiv"+targetProjectId).removeClass('inactive');
				}

				

				$("#pronameSpan").html("");
				$("#taskInsertDiv").html("");
				$("#pronameSpan").html(targetProName);
				$("#newTaskInput").attr('data-projectid',targetProjectId);
				$("#newTaskInput").focus();

				$("#wid-id-4").animate({scrollTop: $('#wid-id-4').prop("scrollHeight")}, 1000);
				getTagAjax(targetProjectId);
				fun_loadfulltable(targetProjectId,getCookie('taskid'));
			
			}
	        setCookie('project',getCookie('project'),0);
			setCookie('projectName',getCookie('projectName'),0);
	    }
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
	    

	    $(document).ready(function () {
	        $("#attachFile").click(function () {
	            $("#attachFile").css("display", "none");
	            $("#uploadFile").css("display", "block");
	        });
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
	                //console.log(data);
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
	            //console.log( data );
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
	            swal("Oops...", "Empty Comment Feild!!!", "error");
	            // bootbox.dialog({
	            //     message: "Empty Comment Feild!!!",
	            //     title: "Error Notice",
	            //     buttons: {
	            //         success: {
	            //             label: "Ok!",
	            //             className: "btn-danger",
	            //             callback: function () {

	            //             }
	            //         }

	            //     }
	            // });
	            return false;
	        }




	    }
	</script>
	<script type="text/javascript">
	/////////////////////////////////////////////// Enter key press \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	    $(document).keyup(function (e) {
	        if (e.target.name == "taskListName") {
	            if (e.keyCode == 13) {
	                var id = e.target.id;
	                savetaskname(id);
	            }
	        }

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

	        if (e.target.name == "titleAdd") {
	            if (e.keyCode == 13) {
	                e.preventDefault();
	                var id = $("#titleAdd").data('inputid');
	                var name = $("#titleAdd").val();
	                var taskid = $("#titleAdd").data('taskid');
	                var inType = $("#titleAdd").data('intype');
	                saveTag(id,name,taskid,'label-warning','tag',inType);
	            }
	        }

	    });

	    function savetaskname(id) {
	        var taskListName = $("#" + id).val();
	        var res = id.slice(4);
	        // console.log(res);
	        // console.log(taskListName);
	        $.ajax({
	            url: '<?php echo site_url(); ?>Projects/updateTasklist',
	            type: 'POST',
	            data: {pid: $("#newTaskInput").attr('data-projectid',targetProjectId), tasklistName: taskListName, inputDiv: res},
	            dataType: "json",
	            beforeSend: function () {
	                //console.log("Emptying");
	            },
	            success: function (data, textStatus) {
	                //console.log(data.update);
	                if (data.update > 0) {
	                    $("#" + id).css('background', '#E6E8EC');
	                    $("#" + id).hide();
	                    $("#tasktext" + res).html(taskListName);
	                    $("#tasktext" + res).show();
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

	    function callmodal(valueid2, username, userIMG, commID, typeid, imageSRC) {
	        //console.log(imageSRC);
	        var valueid = valueid2 + "p_r";
	        //console.log(valueid+","+typeid);
	        var IMGURL = '<?php echo site_url(); ?>/require/dist/img';
	        var userimg = '<?php echo site_url(); ?>/require/dist/img/' + userIMG;
	        $.ajax({
	            url: "<?php echo site_url(); ?>Projects/replyRetrive",
	            type: "POST",
	            data: {
	                taskID: commID,
	                typeID: typeid
	            },
	            dataType: "json"
	        }).done(function (data) {
	            //console.log("PHP Output:");
	            //console.log( data );
	            $(".commentListDiv").html('');
	            $(".sliderUL").html('');
	            //console.log( data.getComment[0].comment );
	            if (data.allReply != false) {
	                var i = 1;

	                $.each(data.allReply, function (key, value) {
	                    var dateasd = $.datepicker.formatDate('dd M yy', new Date(data.allReply[key].date_time));
	                    var Commentstring = '<div class="item">';
	                    Commentstring += '<img src="' + IMGURL + '/' + data.allReply[key].user_img + '" alt="user image" class="online">';
	                    Commentstring += '<div class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + data.allReply[key].user_name + '</a><span style="margin-left:4%;">' + data.allReply[key].comment + '</span></div>';
	                    Commentstring += '<small id="reply' + i + '"  data-name = "' + data.allReply[key].user_name + '"  data-value="' + commID + '" onclick="openReplyBox($(this).data(\'value\'),$(this).data(\'name\'))" class="pull-left" style="margin-left:14%; color: #3C8DBC; cursor: pointer;">Reply</small>';
	                    Commentstring += '</div>';

	                    $(".commentListDiv").append(Commentstring);
	                    //$("#chat-box").prepend(Commentstring);
	                    i++;
	                });


	            }

	            var t = "<p>" + data.getComment[0].comment + "</p>";
	            $(t).find('img').each(function (i) {
	                //console.log($(this).attr('src'));
	                $(".sliderUL").append('<li><img src="' + $(this).attr('src') + '"  alt="IMAGE"/></li>');
	            });
	            var theResult = $.strRemove("img", t);
	            //console.log(theResult);
	            //$(".commentArea").html(theResult);
	            var commentArea = '<div class="commentArea">' + theResult + '</div>';

	            //var cen = '<span class="Centerer"></span>';
	            //var imgSrcOr =  '<li><img class="Centered" src="'+$(this).attr('src')+'"  alt="IMAGE"/></li>';
	            $(".Rcomment").attr('id', valueid + 'comment');
	            $(".RuserID").attr('id', valueid + 'userID');
	            $(".RuserImg").attr('id', valueid + 'userImg');
	            $(".RuserName").attr('id', valueid + 'userName');
	            $(".popReply").attr('data-taskid', commID);
	            $(".popReply").attr('data-typeid', typeid);
	            $(".popReply").attr('data-value', valueid);
	            $(".popReply").attr('id', valueid + 'ComBtn');


	            $(".userimg").attr('src', userimg);
	            $(".username").text(username);
	            $("#ImgBoxBack").css('display', 'block');
	            $("#ImgBox").css('display', 'block');
	            $(".commentArea").html(theResult);
	        });
	        return false;
			//document.getElementById(div).style.display = 'block';
	    }
	    (function ($) {
	        $.strRemove = function (theTarget, theString) {
	            return $("<div/>").append(
	                    $(theTarget, theString).remove().end()
	                    ).html();
	        };
	    })(jQuery);

	    function closeDiv(id) {
	        $(".ImgBoxBack").css('display', 'none');
	        $("#" + id).css('display', 'none');
	    }

	   

	    $("#attachFile").click(function () {
	        $("#attachFile").css("display", "none");
	        $("#uploadFile").css("display", "block");
	    });

	    $( window ).load(function() {
	        
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

	    $(document).mouseup(function (e) {
	        var container = $('#openProjectTaskDiv');

	        if (!container.is(e.target) // if the target of the click isn't the container...
	                && container.has(e.target).length === 0) // ... nor a descendant of the container
	        {
	            container.hide();
	        }

	        container = $('#openProjectTaskListDiv');

	        if (!container.is(e.target) // if the target of the click isn't the container...
	                && container.has(e.target).length === 0) // ... nor a descendant of the container
	        {
	            container.hide();
	        }

	        var wrapper = $("#contextMenu");

	        if (!wrapper.is(e.target) // if the target of the click isn't the container...
	                && wrapper.has(e.target).length === 0) // ... nor a descendant of the container
	        {
	            wrapper.hide();
	        }
	        // added by sujon
	        var wrapper = $("#table_container");

	        if (e.target.id == "clickable" && e.target.id == "")
	        {
	            //alert(e.target.id);
	            //console.log(e.target.id);
	            $('#popupSubMenu button').each(function (index, value) { 
	              //console.log(value);
	              $(value).removeClass("disabled"); 
	            });
	            $('#popupMainMenu button').each(function (index, value) { 
	              $(value).removeClass("disabled"); 
	            });
	            
	            $(".panel-arra").css("border-color","#3c8dbc");
	            $(".panel-heading").css("background-color","#3c8dbc");
	        }
	        else if (!wrapper.is(e.target) // if the target of the click isn't the container...
	            && wrapper.has(e.target).length === 0 && e.target.id != ""){
	            
	            //console.log(e.target.id);
	            
	            $("#Blink").hide();
	            $( ".custom-panel-text" ).css( "color", "#FFFFFF" );
	            $('#popupSubMenu button').each(function (index, value) { 
	              
	              $(value).addClass("disabled"); 
	            });
	            $('#popupMainMenu button').each(function (index, value) { 
	              $(value).addClass("disabled"); 
	            });
	            
	            $(".panel-arra").css("border-color","#585858");
	            $(".panel-heading").css("background-color","#585858");
	        }

	        var wrapper = $(".dd-menu-dependency");

	        if (!wrapper.is(e.target) // if the target of the click isn't the container...
	                && wrapper.has(e.target).length === 0) // ... nor a descendant of the container
	        {
	           
	            //$(".dd-menu-dependency").hide();
	        }
	        
	    });

	    
	    function projectmoveto(projectid, projectname) {
	        $("#optld-temp-pid").val(projectid);
	        $("#opd").html(projectname);
	        if ($("#optld-temp-pid").val() != $("#optld-pid").val()) {
	            $.ajax({
	                url: '<?php echo site_url(); ?>Projects/getTaskList',
	                type: 'POST',
	                data: {projectid: projectid},
	                dataType: "json",
	                // beforeSend: function () {
	                // },
	                success: function (data) {
	                    var count = data.taskList.length;
	                    $("#otd").html(count + " tasklist found.");
	                }
	            });
	            $(".optld-footer").show();
	        }
	        openLocationList(0);
	    }

	    function taskmoveto(taskid, taskname) {
	        $("#optld-temp-tlid").val(taskid);
	        $("#otd").html(taskname);
	        if ($("#optld-temp-tlid").val() != $("#optld-tlid").val())
	            $(".optld-footer").show();
	        openLocationList(0);
	    }

	    function moveto() {
	        $.ajax({
	            url: '<?php echo site_url(); ?>Projects/movetask',
	            type: 'POST',
	            data: {
	                taskid: $("#taskID").val(),
	                old_pid: $("#optld-pid").val(),
	                old_tlid: $("#optld-tlid").val(),

	                new_pid: $("#optld-temp-pid").val(),
	                new_tlid: $("#optld-temp-tlid").val()
	            },
	            dataType: "json",
	            // beforeSend: function () {
	            // },
	            success: function (data) {
	                // console.log(data);
	                if (data.msg == "Success") {
	                    window.location.reload();
	                }
	            }
	        });
	    }

	    function searchlist(str) {
	        str = str.toLowerCase().trim();
	        $(".optld-body").html("");
	        for (var i = 0; i < tempprojectlist.length; i++) {
	            var name = (tempprojectlist[i].name).toLowerCase().trim();
	            if (name.indexOf(str) > -1) {
	                if ($("#optld-head").html() == "Select Project") {
	                    if (tempprojectlist[i].id == $("#optld-pid").val())
	                        $(".optld-body").append("<p onclick='projectmoveto(" + tempprojectlist[i].id + ", \"" + tempprojectlist[i].name + "\")'>" + tempprojectlist[i].name + "<span class='pull-right'><i class='fa fa-check'></i></span></p>");
	                    else
	                        $(".optld-body").append("<p onclick='projectmoveto(" + tempprojectlist[i].id + ", \"" + tempprojectlist[i].name + "\")'>" + tempprojectlist[i].name + "</p>");
	                } else if ($("#optld-head").html() == "Select Tasklist") {
	                    $(".optld-body").append("<p onclick='taskmoveto(" + tempprojectlist[i].id + ", \"" + tempprojectlist[i].name + "\")'>" + tempprojectlist[i].name + "</p>");
	                }
	            }
	        }
	    }

	    $( "body" ).delegate('.subTaskcountbtn','click', function(e){

	    	var targetID = e.target.id;
	    	
	    	var taskid= (targetID.match(/\d+/)[0]);
	    	var projectID = $("#newTaskInput").attr('data-projectid');

	    	if($("#"+targetID+"i").hasClass('fa-caret-right') == true){
	    		$("#"+targetID+"i").removeClass('fa-caret-right').addClass('fa-caret-down');
	    		$("#"+targetID+"DIV").slideToggle();
	    		DrawSubTaskList(projectID,taskid);
	    	}else{
	    		$("#"+targetID+"i").removeClass('fa-caret-down').addClass('fa-caret-right');
	    		$("#"+targetID+"DIV").slideToggle();
	    	}

	    });

	    // $(document).on('change paste keyup', '.customdate', function (event, isScriptInvoked) {
	    // 	console.log(event);
	    // });
	    $(document).on('keypress', '.sendForSaveSubTask', function (event, isScriptInvoked) {
	    	
	    	var targetID = event.target.id
	    	var projectID = $("#newTaskInput").attr('data-projectid');
	    	var taskid = $("#"+targetID).attr('data-taskid');
	    	var subtaskList = "";
	    	//console.log(projectID+","+taskid);
	    	if (event.keyCode == 13) {
		    	if(projectID != "" && $("#" + targetID).val() != ""){
                    $.ajax({
    	                url: '<?php echo site_url(); ?>Projects/saveSubTaskNew',
    	                type: 'POST',
    	                data: {
    	                    pid: projectID,
    	                    taskId: taskid,
    	                    taskName: $("#" + targetID).val()
    					},
    	                dataType: "JSON",
    	                success: function (data, textStatus) {
    	                	
    			            subtaskList = '	    <div class="row bottom-border subtaskDetailDive">';				
    						subtaskList +=' 		<div class="col-lg-10 col-sm-10 col-md-10 taskRow">	';					
    						subtaskList +='				<div class="col-lg-1">';
    						subtaskList +='					<div class="row text-center">';
    						subtaskList +='						<img class="icon-check" src="icons/Checkmark.png">';						
    						subtaskList +='					</div>';
    						subtaskList +='				</div>';
    						subtaskList +='				<div class="col-lg-11">';
    						subtaskList +='					<span class="from">'+ $("#" + targetID).val() +'</span>';						
    						subtaskList +='					<p class="name">';							
    						subtaskList +='						<span class="span1">Start Date: Jun 28 2016</span>';							
    						subtaskList +='						<span class="span2">Duration: 10 days</span>';							
    						subtaskList +='						<span>End Date: Jul 06 2016</span>';					
    						subtaskList +='					</p>';
    						subtaskList +='				</div>';	
    						subtaskList +='			</div>';					
    						subtaskList +='			<div class="col-lg-2 col-sm-2 col-md-2 imgRow">';						
    						subtaskList +='				<div class="pull-right">';							
    						subtaskList += '                <img class="icon-todo-menu SubonIconClick" id="SubclickIconlist' + data.insertID + '"src="icons/Profile.png" >';
                            subtaskList +='                 <img id="SubopenQtipProperty' + data.insertID + '" class="icon-todo-menu" src="icons/Details_Properties.png">';                           
                            subtaskList +='				</div>';					
    						subtaskList +='			</div>';
    						subtaskList +='		</div>';
    	                	
    	                	$("#" + targetID).val("");
    	                	
                            $("#subtaskInsertDiv"+taskid).prepend(subtaskList);

                            $("#SubclickIconlist"+data.insertID).click(function(){
                                qtipAssignee(this,data,crm_users);
                            });

                            $("#SubclickIconlist"+data.insertID).mouseover(function(){
                                qtipAssignHover($(this).find('.onIconClick'),data);
                            });
                            
                            $('#SubopenQtipProperty'+data.insertID).click(function(){
                                 qtipProperties(this,data,'Task');
                            });

    	                	subtaskList = "";
    	                },
    	                error: function (jqXHR, textStatus, errorThrown) {
    	                    // Some code to debbug e.g.:               
    	                    console.log(jqXHR);
    	                    console.log(textStatus);
    	                    console.log(errorThrown);
    	                }
    	            });
                }else{
                    swal("Oops...", "Something went wrong", "error");
                }
		    }
	    });

	    function DrawSubTaskList(pro_id,taskdataid){
	    	var subtaskList = "";
	    	$("#subtaskInsertDiv"+taskdataid).html("");
	    	
	    	$.ajax({
                
                url: '<?php echo site_url(); ?>Projects/subtaskListNew',
                type: 'POST',
                data: {
                    proid: pro_id,
                    taskID: taskdataid
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    console.log(data_st);
                    $.each(data_st.allSubTask, function (index, value) {
                        
                        var now = moment(value.startdate); //todays date
						var end = moment(value.enddate); // another date
						
						var duration = moment.duration(end.diff(now));
						var days = duration.asDays();

                        subtaskList = '	    <div class="row bottom-border subtaskDetailDive">';				
						subtaskList +=' 		<div class="col-lg-10 col-sm-10 col-md-10 taskRow">	';					
						subtaskList +='				<div class="col-lg-1">';
						subtaskList +='					<div class="row text-center">';
						subtaskList +='						<img class="icon-check" src="icons/Checkmark.png">';						
						subtaskList +='					</div>';
						subtaskList +='				</div>';
						subtaskList +='				<div class="col-lg-11">';
						subtaskList +='					<span class="from">'+ value.projecttaskname +'</span>';						
						subtaskList += '				<p class="name">';							
						subtaskList += '					<span class="span1">Start Date: <input type="text" id="SubstartDatein' + value.projecttaskid + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy"  value="'+moment(value.startdate).format('MMM DD YYYY')+'"></span>';
						subtaskList += '					<span class="span2">Duration: <span id="Subduration' + value.projecttaskid + '">'+days+'</span> days</span>';							
						subtaskList += '					<span style="margin-left: 12%;">End Date: <input type="text" id="SubendDatein' + value.projecttaskid + '" name="mydate" class="datepicker customdate" data-dateformat="M d yy" value="'+moment(value.enddate).format('MMM DD YYYY')+'"></span>';					
						subtaskList += '				</p>';
						subtaskList +='				</div>';	
						subtaskList +='			</div>';					
						subtaskList +='			<div class="col-lg-2 col-sm-2 col-md-2 imgRow">';						
						subtaskList +='				<div class="pull-right">';							
						subtaskList += '				<img class="icon-todo-menu SubonIconClick '+(data_st.nty_chat[index][0].total > 0 ? 'active-icon' : '')+'" id="SubclickIconlist' + value.projecttaskid + '"src="icons/Profile.png" >';
						subtaskList +='					<img id="SubopenQtipProperty' + value.projecttaskid + '" class="icon-todo-menu" src="icons/Details_Properties.png">';							
						subtaskList +='				</div>';					
						subtaskList +='			</div>';
						subtaskList +='		</div>';
	                	
	                	$("#subtaskInsertDiv"+taskdataid).prepend(subtaskList);
	                	
                        $("#SubclickIconlist"+value.projecttaskid).click(function(){
                            qtipAssignee(this,value,crm_users);
                        });

                        $("#SubclickIconlist"+value.projecttaskid).mouseover(function(){
                            qtipAssignHover($(this).find('.onIconClick'),value);
                        });
                        
                        $('#SubopenQtipProperty'+value.projecttaskid).click(function(){
                             qtipProperties(this,value,'Task');
                        });
	                	
                        
                        flatpickr("#SubstartDatein"+value.projecttaskid, {
                            enableTime: true,
                            dateFormat: 'Y-m-d H:i:S',
                            onChange: function(selectedDates, dateStr, instance) {
                                thisValue(selectedDates[0],value.projecttaskid,'SubstartDatein','Subduration','subtask');
                            }
                        });

                        flatpickr("#SubendDatein"+value.projecttaskid, {
                            enableTime: true,
                            dateFormat: 'Y-m-d H:i:S',
                            onChange: function(selectedDates, dateStr, instance) {
                                thisValue(selectedDates[0],value.projecttaskid,'SubendDatein','Subduration','subtask');
                            }
                        });

      //                   $("#SubstartDatein"+value.projecttaskid).datepicker({
						//     dateFormat: 'M d yy',
						//     prevText: '<i class="fa fa-chevron-left"></i>',
						//     nextText: '<i class="fa fa-chevron-right"></i>',
						//     onSelect: function (selectedDate) {
						//         thisValue(selectedDate,value.projecttaskid,'SubstartDatein','Subduration','subtask');
						//     }
						// });

						// $("#SubendDatein"+value.projecttaskid).datepicker({
						//     dateFormat: 'M d yy',
						//     prevText: '<i class="fa fa-chevron-left"></i>',
						//     nextText: '<i class="fa fa-chevron-right"></i>',
						//     onSelect: function (selectedDate) {
						//         thisValue(selectedDate,value.projecttaskid,'SubendDatein','Subduration','subtask');
						//     }
						// });

	                	subtaskList = "";

                    });


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
	    }

	    function oSubDiv(taskID, taskListID) {
	        //$("#togPopH").html(projectID);
	        // Set the effect type
	        $("#form_datasetTaskpro").attr('action','<?php echo base_url(); ?>Projects/updateSubTask');
	        $("#CommentType").val('SUBTASK');
	        var effect = 'slide';

	        // Set the options for the effect type chosen
	        var options = {direction: 'right'};

	        // Set the duration (default: 400 milliseconds)
	        var duration = 500;
	        
	        var projectID = $("#newTaskInput").attr('data-projectid');
	        $.ajax({
	            url: '<?php echo site_url(); ?>Projects/subtaskDetail',
	            type: 'POST',
	            data: {
	                taskID: taskID,
	                taskLsitID: taskListID,
	                projectID: projectID
	            },
	            dataType: "json",
	            beforeSend: function () {
	                //console.log("Emptying");
	                $("#togPopH").val("");
	                $("#tasknametitle").val("");
	                $("#assMembers").html("");
	            },
	            success: function (data, textStatus) {

	                //console.log(data);
	                //console.log(taskListID);
	                propertiesLoadTask(data);
	                ajaxTaskDetail(taskID, projectID);
	                var projectName = $("#pronameSpan").text();;
	                //if(data.tasklistName[0].name == ""){
	                    //var name = "Default";
	                //}
	                var name = "Default";
	                var loc = projectName + " >> " + name;
	                $("#togPopH").val(data.dataList[0].projecttaskname);
	                $("#tasknametitle").val(data.dataList[0].projecttaskname);
	                $("#projecteid").val(projectID);
	                $("#taskListID").val(taskListID);
	                $("#optld-tlid").val(taskListID);
	                $("#taskID").val(taskID);
	                $("#loc").html(loc);
	                $("#loc").attr("data-project", projectName);
	                $("#loc").attr("data-task", name);
	                $('#taskMyDiv').toggle(effect, options, duration);



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

	    function countsabtask(pro_id,taskdataid){
	    	var totalSabtask = 0;
	    	
	    	$.ajax({
                url: '<?php echo site_url(); ?>Projects/subtaskListNew',
                type: 'POST',
                data: {
                    proid: pro_id,
                    taskID: taskdataid
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    totalSabtask = data_st.allSubTask.length;
                	if(totalSabtask > 0){
						$("#subTaskcountbtnValue"+taskdataid).html('<button id="subTaskcountbtn' + taskdataid + '" class="btn bg-color-blueDark txt-color-white subTaskcountbtn">'+totalSabtask+' <i class="fa fa-caret-right" id="subTaskcountbtn' + taskdataid + 'i"></i></button>');
					}else{
						$("#subTaskcountbtnValue"+taskdataid).html('');
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
        

        function attachdataload(parentType,projectID,parentID){
              downloadFolder="ProjectsFiles";
               
                $.ajax({
                    url : '<?php echo base_url(); ?>projects/getAllAttachData',
                    type : 'POST',
                    data : {
                        parentType:parentType,
                        parentID:projectID,
                        parentFolder:"ProjectFolder",
                        rootID:parentID

                    },
                    success : function(data) {
                        console.log(parentType);
                        console.log(projectID);
                        console.log(data);
                        
                        if (data.allFiles.length > 0) {
                            $.each(data.allFiles, function (key, value) {
                                
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

	    // function userListShowOnlick(taskID,type = ""){
	    	
	    // 	var projectID = $("#newTaskInput").attr('data-projectid');
	    // 	var taskDetailStr = "";
	    // 	$.ajax({
     //            url: '<?php echo site_url(); ?>Projects/userListTag',
     //            type: 'POST',
     //            data: {
     //                projectID: projectID,
     //                taskID: taskID,
     //                type: type
     //            },
     //            dataType: "JSON",
     //            beforeSend: function () {
     //                //console.log("Emptying");
     //            },
     //            success: function (data, textStatus) {
     //                //console.log(data);
     //                taskDetailStr += '<div class="arrow-top-right"></div>';
     //                if(data.tag.length>0){
                    	
					// 	var SC = 0;
					// 	var MC = 0;

					// 	$.each(data.tag, function (key, value) {
			  //           	if(data.tag[key].user_status == 0){
			  //           		SC++;
			            		
			  //           		if(SC < 2 && SC > 0 ){
			  //           			taskDetailStr += '<li class="dropdown-menu-header">Supervisor(s)</li>';
			  //           		}

			  //           		taskDetailStr += '<li><a href="#"><i class="fa fa-check"></i> ' + data.tag[key].full_name + '</a></li>';
			  //           	}

			            	
			  //           	if(data.tag[key].user_status == 1){
			  //           		MC++;
			            		
			  //           		if(MC < 2 && MC > 0 ){
			  //           			taskDetailStr += '<li class="dropdown-menu-header">Member(s)</li>';
			  //           		}

			  //           		taskDetailStr += '<li><a href="#"><i class="fa fa-check"></i> ' + data.tag[key].full_name + '</a></li>';
			  //           	}
			                
				 //        });
						
					// 	taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
						
					// 	if(type == "Subtask"){
							
					// 		$("#SUBtaggedUserlist"+taskID).html(taskDetailStr);
					// 		$("#SUBtaggedUserlist"+taskID).closest('ul').css('top', '122%');
					// 		$("#SUBtaggedUserlist"+taskID+" .arrow-top-right").css('margin-left', '68%');
					// 	}else{
					// 		$("#taggedUserlist"+taskID).html(taskDetailStr);
					// 	}
						
	    //                 // $.each(data.tagFollow, function (key, value) {
				 //        //     $('.select2_multiple3 option[value="' + data.tagFollow[key].ID + '"]').prop("selected", "selected");
				 //        // });

				        
     //                }else{
     //                	taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
     //                	taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
     //                	taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
						
					// 	$("#taggedUserlist"+taskID).html(taskDetailStr);
					// 	taskDetailStr = "";
     //                }


                    
     //            },
     //            error: function (jqXHR, textStatus, errorThrown) {
     //                // Some code to debbug e.g.:               
     //                console.log(jqXHR);
     //                console.log(textStatus);
     //                console.log(errorThrown);
     //            }
     //        });
	    	
	    // }
	    function toolHS(value){
		  	
		  	if($("#"+value).is(":visible")){
		  		$("#"+value).hide();
		  		$("#"+value+"i").hide();
		  	}else{
		  		$("#"+value).show();
		  		$("#"+value+"i").show();
		  	}
		}

		function thisValue(thisDate,taskId,targetID,durationID,type){
			
			
			if(targetID == 'startDatein'){
				
				var startdate =  moment(thisDate).format("YYYY-MM-DD HH:mm:ss");
				var enddate = moment($("#endDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");

			}else if(targetID == 'endDatein'){
				
				var startdate =  moment($("#startDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
				var enddate =  moment(thisDate).format("YYYY-MM-DD HH:mm:ss");
			}else if(targetID == 'SubstartDatein'){
				
				var startdate =  moment($("#SubendDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
				var enddate =  moment(thisDate).format("YYYY-MM-DD HH:mm:ss");
			}else if(targetID == 'SubendDatein'){
				
				var startdate =  moment($("#SubstartDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
				var enddate =  moment(thisDate).format("YYYY-MM-DD HH:mm:ss");
			}

			
			var now = moment(startdate); //todays date
			var end = moment(enddate); // another date
			var duration = moment.duration(end.diff(now));
			var days = duration.asDays();
            console.log(days);
            console.log(durationID);
			console.log(taskId);
			
            $("#"+durationID+taskId).val(days);

			$.ajax({
                url: '<?php echo site_url(); ?>Projects/updateTaskDate',
                type: 'POST',
                data: {
                   startdate:startdate,
                   enddate:enddate,
                   taskID:taskId,
                   this_type:type 
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    $(".flatpickr-calendar").css("visibility","hidden");
                    $("#taskInsertDiv").text("");
                    $("#sorryDiv").hide();
                    $("#newTaskInput").val("");
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'));
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
		}
	function openFilesDiv(aproID){
		
		var proID = $("#newTaskInput").attr('data-projectid');
		$("#chat992 table tbody").html("");
		$("#uploadBy").html("");
        $("#fileExt").html("");
        
        var extn = [];
        var fileName = "";
		var user_name = [];
		var user_id = "<?php echo $id; ?>";
		var createdBy = $("#createdBy").val();
		$("#fileExt").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="other"><input style="margin-right: 5%;" onclick="showThis(this)" id="other" rel="file" type="checkbox" checked="checked" value="ALL">ALL</label></a></li>');
		$("#uploadBy").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="other"><input style="margin-right: 5%;" onclick="showThis(this)" id="other" rel="uploadedBy" type="checkbox" checked="checked" value="ALL">ALL</label></a></li>');
		var request = $.ajax({
                url: '<?php echo site_url(); ?>Projects/getFileList',
                data: {pid: proID},
                method: "POST",
                dataType: "json"
            });            
            
        request.done(function(rsp) {
            //console.log(rsp);
            $.each(rsp.allFileList, function(k,v){
                
                fileName = rsp.allFileList[k].file_name.split('.').pop().toUpperCase();

                if(jQuery.inArray(fileName, extn) !== -1){
                    //noting will do
                }else{
                    extn.push(fileName);

                    $("#fileExt").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="'+fileName+'"><input id="'+fileName+'" style="margin-right: 5%;" class="prod_file " level="subchild" onclick="extRowHide(this)"  rel="file" type="checkbox" checked="checked" value="'+fileName+'"> .'+fileName+'</label></a></li>');

                    fileName = '';
                }

                if(jQuery.inArray(rsp.allFileList[k].user_id, user_name) !== -1){
                	//noting will do
                }else{
                	user_name.push(rsp.allFileList[k].user_id);

                	$("#uploadBy").append('<li><a href="#"><label style="width: 100%;font-weight:300;" for="'+rsp.allFileList[k].user_id+'"><input id="'+rsp.allFileList[k].user_id+'" class="prod_upload" rel="uploadedBy" onclick="tableRowHide(this)" checked="checked" type="checkbox" value="'+rsp.allFileList[k].user_id.split(' ').pop().toUpperCase()+'">'+rsp.allFileList[k].user_id+'</label></a></li>')
                }
                
                var design = '';
                //console.log(rsp.allFileList[k]);
                
                
                if(k==0)
                    design += '<tr class="grouprow" rel="'+rsp.allFileList[k].user_id.split(' ').pop().toUpperCase()+'" id="itemTASK' + rsp.allFileList[k].id + '" style="border-top: 1px solid #000 !important;">';
                else
                    design += '<tr class="grouprow" rel="'+rsp.allFileList[k].user_id.split(' ').pop().toUpperCase()+'" id="itemTASK' + rsp.allFileList[k].id + '" >';
                design +=   '<td > <img style="width: 70%;margin: 10%;" src="<?php echo base_url();?>require/img/'+rsp.allFileList[k].file_name.split('.').pop()+'.png" /></td>';
                design +=   '<td class="file" name="'+rsp.allFileList[k].user_id.split(' ').pop().toUpperCase()+'" rel="'+rsp.allFileList[k].file_name.split('.').pop().toUpperCase()+'"><a target="_BLANK" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/navcon/uploads/tempUpload/fileupload/'+rsp.allFileList[k].ori_name+'">'+rsp.allFileList[k].ori_name+'</a></td>';
                design +=   '<td class="uploadedBy" rel="'+rsp.allFileList[k].user_id.split(' ').pop().toUpperCase()+'">'+rsp.allFileList[k].user_id+'</td>';
                design +=   '<td>'+rsp.allFileList[k].file_size+'KB</td>';
                design +=   '<td>'+rsp.allFileList[k].date+'</td>';
                
                if (rsp.allFileList[k].user == user_id || createdBy == user_id) {
                        
                    design +=   '<td><i style="color:#dd4b39;cursor:pointer;" class="fa fa-trash" data-id = "' + rsp.allFileList[k].id + '"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),' + rsp.allFileList[k].id + ',\'file\')"></i></td>';
                }else{
                    design +=   '<td>&nbsp;</td>';
                }

                design += '</tr>';
                $("#chat992 table tbody").append(design);
            });

        });
    }

    </script>
	<script type="text/javascript">
    function openQouteDivPro(){

        var proID = $("#projectFile").attr('data-projectid');
        var user_id = '<?php echo $id; ?>';
        var createdby_id=$('#quote_details').attr('data-createdby');
        var get_status;
        if(user_id==createdby_id) get_status=1;
        else get_status=0;

        
        var request = $.ajax({
            url: "<?php echo site_url("Projects/getQouteList"); ?>",
            data: {pid: proID,user_id:user_id,get_status:get_status},
            method: "POST",
            dataType: "json"
        });            
        request.done(function(data) {
            if(data.currencyList.length>0){
                currency_symbol=data.currencyList[0].name;
                currency_type=data.currencyList[0].type_value;
            }else{
                currency_symbol='BDT';
                currency_type='auto';
            }
            js_unitList=[];
            $(data.UnitList).each(function(i,val){
                js_unitList.push(val.name);
            });
            proQuoteListLoad(data,proID);
            

        });
    }

    function openInvoiceDivPro(){
        
        var proID = $("#projectFile").attr('data-projectid');
        var user_id = '<?php echo $id; ?>';
        var createdby_id=$('#invoice_details').attr('data-createdby');
        var get_status;
        if(user_id==createdby_id) get_status=1;
        else get_status=0;

        //$("#chat992 table tbody").html("");
        var request = $.ajax({
            url: "<?php echo site_url("Projects/getInvoiceList"); ?>",
            data: {pid: proID,user_id:user_id,get_status:get_status},
            method: "POST",
            dataType: "json"
        });            
        request.done(function(data) {

            if(data.currencyList.length>0){
                currency_symbol=data.currencyList[0].name;
                currency_type=data.currencyList[0].type_value;
            }else{
                currency_symbol='BDT';
                currency_type='auto';
            }
            js_unitList=[];
            $(data.UnitList).each(function(i,val){
                js_unitList.push(val.name);
            });
            proInvoiceListLoad(data,proID);


        });
    }
    function makeActive(taskID){
    	//alert(taskID);
    	$(".iconGray").css('display','block');
    	$(".iconGreen").css('display','none');
    	$("#iconGray"+taskID).css('display','none');
    	$("#iconGreen"+taskID).css('display','block');
    }
	function addStickyNote(element,taskdataid){
        var qdiv=$(element).closest('div.qtip-content');
        // var popup;
        var note=qdiv.find('textarea').val();
       
        // if($(element).closest('div').find('input').is(':checked')) popup=1;
        // else popup=0;
       
        $.ajax({
        url: '<?php echo site_url(); ?>Projects/addStickyNote',
        type: 'POST',
        data: {
            tid: taskdataid,
            note: note,
            //popup: popup
            
        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (data, textStatus) {
            //console.log(data);

            qdiv.find('.panel-body').append(drawStickyNote(data.newnote[0]));
           qdiv.find('.panel-body').animate({scrollTop: qdiv.find('.panel-body').prop("scrollHeight")}, 1000);
           qdiv.find('textarea').val('');

        
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Some code to debbug e.g.:               
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    }
	$(document).on('submit','form[name=form_dataset_items]',function(e){
          //console.log('sub');console.log($(this));
        e.preventDefault();

        var formData = new FormData($(this)[0]);
        
        $(this).find('[id^="total_aftertax"]').each(function(i,val){

            formData.append('total_tax[]', $(val).html());
        });

        $(this).find('[id^="total_afterdiscount"]').each(function(i,val){

            formData.append('total_afterdiscount[]', $(val).html());
        });

        $(this).find('[id^="netprice"]').each(function(i,val){

            formData.append('netprice[]', $(val).html());
        });

        formData.append("net_total", $(this).find('[id^="net_total"]').html());
        formData.append("net_totalafterdisgrand", $(this).find('[id^="net_totalafterdisgrand"]').html());
        formData.append("taxtotal_shiphandle", $(this).find('[id^="taxtotal_shiphandle"]').html());
        formData.append("grand_total_currency", $(this).find('[id^="grand_total_currency"]').html());
        for (var pair of formData.entries())
        {
         //console.log(pair[0]+ ', '+ pair[1]); 
        }          

        $.ajax({
            url: this.action,
            type: this.method,
            data: formData,
            async: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                //console.log('form_dataset_items');
                //console.log(data);
                var tid = $("#chkchangetaskstatus").attr("data-taskid");
                var oldtaskname = $("#tasklistdiv" + tid + " .taskHover p").html();
                if ($("#togPopH").val() != oldtaskname)
                    $("#tasklistdiv" + tid + " .taskHover p").html($("#togPopH").val());
                $("#update_not").hide();
                $("#update_ok").show();

                if(data.hasOwnProperty('new_quoteid')){
                    
                    if(data.new_quoteid[0] !=null){
                    $('#invoice_details_body [data-level="2"][data-quoteid="'+data.old_quoteid+'"]').attr('data-quoteid',data.new_quoteid[0]);
                    }
                    if(data.new_quoteid[1] !=null){
                    //reloadQuotesList();
                    //console.log('reloaded');
                    //console.log($('#invoice_details_body [data-level="1"][data-invoiceid="'+data.old_invid+'"] td:eq(0)'));

                    $('#invoice_details_body [data-level="1"][data-invoiceid="'+data.old_invid+'"]').attr('data-quoteid',data.new_quoteid[1]);

                  $('#invoice_details_body [data-level="1"][data-invoiceid="'+data.old_invid+'"] td:eq(0)').click();

                    }
                }
//                if($(e.currentTarget).attr('class')==undefined){
//                $('[class="cls-open-items"][data-quoteid="'+$('#quoteitemid').val()+'"]').click();
//                }   

                
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });
	</script>
	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});

        $(document).mouseup(function (e) {
            
            var container = $('.floting_box');
            var container2 = $('#myProjectDivList');
            var container3 = $('#ui-datepicker-div');
            var container4 = $('.select2-results__option');
            var container5 = $('.swal2-modal');
            var container6 = $('.qtip-content');
            var container7 = $('.flatpickr-calendar');
            
            if  (!container2.is(e.target) && container2.has(e.target).length === 0)
            {
                if  (!container.is(e.target) && container.has(e.target).length === 0)
                {
                    if  (!container3.is(e.target) && container3.has(e.target).length === 0)
                    {
                        if  (!$(e.target).hasClass('select2-results__option') && !$(e.target).hasClass('icon-todo-menu'))
                        {
                            if  (!container5.is(e.target) && container5.has(e.target).length === 0)
                            {
                                if  (!container6.is(e.target) && container6.has(e.target).length === 0)
                                {
                                    if  (!container7.is(e.target) && container7.has(e.target).length === 0)
                                    {
                                        console.log(e.target);
                                        $('.backDiv').remove();
                                        $('.noBorder').removeClass('border');
                                        
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        $(document).keyup(function(e) {
            if (e.keyCode === 27){
                $('.backDiv').remove();
                $('.noBorder').removeClass('border');
            } 
        });
	</script>
    <script type="text/javascript">
        $('body').delegate('#saveDrawing', 'click',function() {
            var formData = new FormData(document.getElementsByName('projectdrawing')[0]);
            //console.log(formData);
            $.ajax({
                url: '<?php echo site_url();?>projects/saveProjectSet',
                type: 'POST',
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: function (jqXHR, textStatus, errorThrown) {
                   //abortAjax(jqXHR);
                },
                success: function (data_st, textStatus) {
                    if(data_st.newid > 0){
                        swal("Good Job!!!", "Successfully saved", "success");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
            
        });
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
<div  id="calculatorModal" class="modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content" style="width: 750px; margin-top:0px; border-radius: 0.5em;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> <span style="color: #5d5c5c; font-size: 43px; top: -14px; position: relative;font-weight:100">&times;</span>
					<!-- <img src="<?php echo base_url(); ?>require/images/delete-icon.png" /> -->
				</button>
				<img style="width: 30px; margin-left: -12px; margin-top: -1px;" src="<?php echo base_url(); ?>asset/img/project-icon2.png" />
			
				<span class="modal-title" style="word-spacing: 3px;font-weight: 500;font-size: 21px;">

					Calculator
				</span>
			</div>
			<div class="modal-body">
				<div class="calc-main">
					<div class="calc-display">
						<span>0</span>
						<div class="calc-rad">Rad</div>
						<div class="calc-hold"></div>
						<div class="calc-buttons">
							<div class="calc-info">?</div>
							<div class="calc-smaller">&gt;</div>
							<div class="calc-ln">.</div>
						</div>
					</div>
					<div class="calc-left">
						<div><div>2nd</div></div>
						<div><div>(</div></div>
						<div><div>)</div></div>
						<div><div>%</div></div>
						<div><div>1/x</div></div>
						<div><div>x<sup>2</sup></div></div>
						<div><div>x<sup>3</sup></div></div>
						<div><div>y<sup>x</sup></div></div>
						<div><div>x!</div></div>
						<div><div>&radic;</div></div>
						<div><div class="calc-radxy">
							<sup>x</sup><em>&radic;</em><span>y</span>
						</div></div>
						<div><div>log</div></div>
						<div><div>sin</div></div>
						<div><div>cos</div></div>
						<div><div>tan</div></div>
						<div><div>ln</div></div>
						<div><div>sinh</div></div>
						<div><div>cosh</div></div>
						<div><div>tanh</div></div>
						<div><div>e<sup>x</sup></div></div>
						<div><div>Deg</div></div>
						<div><div>&pi;</div></div>
						<div><div>EE</div></div>
						<div><div>Rand</div></div>
					</div>
					<div class="calc-right">
						<div><div>mc</div></div>
						<div><div>m+</div></div>
						<div><div>m-</div></div>
						<div><div>mr</div></div>
						<div class="calc-brown"><div >AC</div></div>
						<div class="calc-brown"><div>+/&#8211;</div></div>
						<div class="calc-brown calc-f19"><div>&divide;</div></div>
						<div class="calc-brown calc-f21"><div>&times;</div></div>
						<div class="calc-black"><div>7</div></div>
						<div class="calc-black"><div>8</div></div>
						<div class="calc-black"><div>9</div></div>
						<div class="calc-brown calc-f18"><div>&#8211;</div></div>
						<div class="calc-black"><div>4</div></div>
						<div class="calc-black"><div >5</div></div>
						<div class="calc-black"><div>6</div></div>
						<div class="calc-brown calc-f18"><div>+</div></div>
						<div class="calc-black"><div>1</div></div>
						<div class="calc-black"><div>2</div></div>
						<div class="calc-black"><div>3</div></div>
						<div class="calc-blank"><textarea></textarea></div>
						<div class="calc-orange calc-eq calc-f17"><div>
							<div class="calc-down">=</div>
						</div></div>
						<div class="calc-black calc-zero"><div>
							<span>0</span>
						</div></div>
						<div class="calc-black calc-f21"><div>.</div></div>
					</div>
				</div>
			</div>
				<div class="modal-footer">
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<div id="modal-content" style="display: none;">
	  	<select class="chosen" name="chosen" id="chosen" class="form-control">
        	<?php foreach ($projectstatus as $r) { ?>
        		<option value="<?php echo $r->projectstatus; ?>"><?php echo ucfirst($r->projectstatus); ?></option>
        	<?php } ?>
    	</select>
	</div>

    
<script type="text/javascript">
    function togglecalendar_start(serial){
    
    flatpick_start.toggle();

}

function togglecalendar_end(serial){
    flatpick_end.toggle();
    
}
</script>
    

