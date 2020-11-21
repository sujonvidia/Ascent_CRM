<?php 
    $page_style =  $this->db->select("crm_user_preferences")
                            ->get_where("crm_users", array("ID"=>$id))
                            ->result();
    $page_style_result = $page_style[0]->crm_user_preferences;

    if(isset($shared_activity_id)) $page_style_result = 0;
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
    /* sujon @ 3-14-2017 */
    
        .qtip-pad{
            padding: 3px;
        }
        .tooltipNee{
            display: inline;
            position: relative;
        }

        
        .tooltipNee:hover:after{
            background: #333;
            background: rgba(0,0,0,.8);
            border-radius: 5px;
            bottom: 26px;
            color: #fff;
            content: attr(title);
            left: 20%;
            padding: 5px 15px;
            position: absolute;
            z-index: 98;
            width: 220px;
        }
        
        .tooltipNee:hover:before{
            border: solid;
            border-color: #333 transparent;
            border-width: 6px 6px 0 6px;
            bottom: 20px;
            content: "";
            left: 50%;
            position: absolute;
            z-index: 99;
        }
        .icon-border .fa-stack-2x{
            font-size: 32px;
        }
        .tbl-user-task{
            width: 100%;
            margin-top: 5px;
            display: none;
        }
        .tbl-user-task td{
           /* border: 1px solid #c1c1c1;*/
            padding: 5px;
        }
        .tbl-user-task thead tr{
            background: #EEEEEE;
        }
        
        .projectListDiv{
            background-color: #ffffff !important;
        }
        .keep-open{
            padding-left: 0px;
        }
        .swal2-container{
            z-index: 15000000000;
        }

        #DueDateSpan{
            margin-bottom: 0px;
            font-size: 12px;
        }
        
        .tagAddAdmin{
            width: 90% !important;
            height: 50px;
            float: left !important;
            overflow-y: auto;
            margin-right: 0%;
        }

        #addAdmin{
            width: 90%;
            height: 50px;
            float: left;
            overflow-y: auto;
            margin-right: 0%;
        }

        .tagAddMember{
            width: 55% !important;
            height: 50px;
            float: left !important;
            overflow-y: auto;
            margin-right: 0%;
            margin-top: 1%;
        }

        #addMember{
            width: 90%;
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
            padding: 10px;
            min-height: 85px;
            height: auto;
        }

        .proInputText{
            border-radius: 5px;
            width: 100%;
            height: 31px;
            margin-right: 2%;
            border: 2px solid #cecbcb;
           
        }
        .proDivname{
            font-family: "NavigateFont";
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

        .qtip-content .proClBtn{
            margin-top: 6px;
        }

        .qtip-content .proDivname{
            margin-top: 0px;
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
            /*color: #cacaca;*/
            color: #bfbfbf;
            font-size: 14px;
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
            padding-left: 30px !important;
            background-size: 18px 18px;
            font-size: 16px;
            background-position: 6px 6px;
        }

        .icon-check{
        /*width:16px;
        height:16px;*/
        }
        
        .icon-todo-menu{
            width:30px;
            height:30px;
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
        
        .arrow-top-right{
            margin-left: 82%;
        }
        .customdate{
            border: none;
            cursor: pointer;
            width: 18%;
            padding-left: 8%;
            z-index: 15000;
            margin-left: -8%;
            background: transparent !important;
        }

        .customdate2{
            border: none;
            cursor: pointer;
            width: 8% !important;
            /*padding-right: %;*/
        }
        .customdate3{
            border: none;
            cursor: pointer;
            width: 6% !important;
            /*padding-right: %;*/
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
            background-color: #1bbc9b;
            border: 1px solid #1bbc9b;
            color: #ffffff;
        }

        .ui-datepicker td a:hover {
             color: #404040;
            background-color: #e2e2e2;
        }

        .ui-datepicker .ui-datepicker-title {
            color: #ffffff;
            font-size: 19px;
        }
        .todo-text-prop{
            float: left;
            line-height: 1.2;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 89%;
            display: inline-block;
            font-family: "NavigateFont";
            font-size: 17px;
            height: 30px;
            margin-top: 2px;
            padding-top: 3px;
        }

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
        
        .invoice-item-details{
            margin-left: 15px;font-size: 10px;  width: 95%;table-layout: fixed;
        }
        .invoice-item-details input{
            width: 100%;
        }
        
        .unitSelect2-drop{
            font-size: 10px !important;
        }

        .select2-selection__rendered{
            font-size: 13px !important;
            
        }
        .select2-results__option{
            font-size: 13px !important;
            
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
            margin-left: 3px;
        }
        .display-qtip-bigimage{
            width: 30px;
            height: 30px;
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

        
        .chk-task-complete,.chk-subtask-complete{
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
        }
        .add-circle-border-sub{
            background-color: #3c8dbc !important;
            
        }
        #tbl_TaskEntry tr td:nth-last-child(-n+5),#tbl_TaskCompleted tr td:nth-last-child(-n+5) { 
            background-color: #E7E7E7 !important;
        }
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
        /* Stop some action like - create new project, export project, project chat, project file*/
        .margintop0, .ribLi2, .ribLi3{display: none;}


        .projectListDiv{width: 19%;}
        .TaskListDiv{width: 80%;}
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
    <aside id="left-panel" style="display: <?php echo (! isset($shared_activity_id))?"block":"none"; ?>">
        <?php include 'template/left_panel.php';?>
    </aside>
    <!-- END NAVIGATION -->

    <!-- MAIN PANEL -->
    <div id="main" role="main" style="margin-left: <?php echo (! isset($shared_activity_id))?"220px":"0px"; ?>">

        <!-- RIBBON -->
        <div id="ribbon">

            <ol class="breadcrumb">
                <li style="text-align: center;color: #474544;">
                    <i class="fa fa-angle-double-down DueDateSpan" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Expand Header" onclick="expandRibbon()" id="expandRibbon" style="display: block;"></i>
                    <i class="fa fa-angle-double-up DueDateSpan" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Expand Header" onclick="collaspeRibbon()" id="collaspeRibbon" style="display: none;"></i>
                    
                    <span data-serial="" class="name clickontitle tnstitle" id="pronameSpan"></span>
                    <div class="ViewDiv" id="customExportDiv">               
                    </div>
                    <ul class="list-inline ribUl" id="ribUl" style="display: none;">
                        <ol class="ribLi noBorder ribLi1" data-type="list" id="" data-projectid=""><i class="fa fa-list-ul" aria-hidden="true"  style="color: #54ce3c;"></i> Task List</ol>
                        <ol class="ribLi noBorder ribLi2" data-type="comments" id="" data-projectid=""><i class="fa fa-comments-o" aria-hidden="true"  style="color: #ff5e00;font-size: 15px;"></i> Project Chat</ol>
                        <ol class="ribLi noBorder ribLi3" data-type="attach" id="" data-projectid=""><i class="fa fa-files-o" aria-hidden="true"  style="color: #31a0ff;"></i> Files</ol>
                        <ol class="ribLi noBorder ribLi4" data-type="properties" id="" data-projectid=""><i class="fa fa-archive" aria-hidden="true" style="color: #6c4de3;"></i> Properties</ol>
                        <?php if(! isset($shared_activity_id)) { ?>
                        <ol onclick="generatePreview(this)" class="ribLi noBorder ribLi5" data-type="properties" id="" data-projectid=""><i class="fa fa-line-chart" style="color: #3276b1;" aria-hidden="true"></i></i> Dashboard</ol>
                        <?php } ?>
                        <!-- <ol class="ribLi noBorder ribLi6" data-type="contacts" id="" data-projectid=""><i class="fa fa-phone-square" style="color: #3276b1;" aria-hidden="true"></i></i> Contacts</ol> -->
                    </ul>
                    <span style="display: none;" id="pronamecreated"></span>
                    <span class="pull-right tagbtnDivclass comtag" id=""></span>
                </li>
            </ol>
        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">
            <!-- <button type="button" class="slide-toggle">Slide Toggle</button> -->
            <i class="fa fa-caret-right slide-toggle" id="rarrow" style="/*z-index: 150000;*/position: absolute;left:10px;top: 15px;display: none;cursor: pointer;font-size: 35px;color: #4d4d4d;"></i>
            <div id="leftFloat" class="slide-toggle" style="display: none;">
                
            </div>
            <!-- widget grid -->
            <section id="widget-grid" class="">
                <div class="row" id="noprojectDiv"></div>
                <div class="row" id="mainProjectArea" style="background:#e6e6e6;">
                    <div class="col-lg-4 projectListDiv">
                        <i id="larrrow" class="fa fa-caret-left slide-toggle" style="position: absolute;right: 0;top: 4px;font-size: 35px;color: #4d4d4d;"> </i>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 projectDiv" id="wid-id-4">
                         <input type="file" id="import_csv_in"  required="required" style="display: none;" class="form-control forceMargin" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
<!-- <div class="contact-header ">My Projects <span class="margintop0"><img id="open_newpro1" class="open_newpro1" src="<?php echo base_url("asset/img/icons/Add Project.png"); ?>" /></span><span class="margintop0"><img id="importProject" style="margin-top: -1.2%;width: 7%;margin-left: 2%;" title="Import Project" onclick="$('#import_csv_in').trigger('click');" class="importProject" src="<?php echo base_url("asset/icons/import.png"); ?>" /></span></div>-->
                         <div class="contact-header ">My Projects <span class="margintop0 open_newpro1" id="open_newpro1" ><i class="fa fa-plus hvr-glow clasI" aria-hidden="true"></i></span><span class="margintop0 importProject " id="importProject" onclick="$('#import_csv_in').trigger('click');" ><i class="fa fa-download hvr-glow clasI" aria-hidden="true"></i></span></div>
<!-- <div class="contact-header ">My Projects <span class="margintop0"><img id="open_newpro1" class="open_newpro1" src="<?php echo base_url("asset/img/feedIcon/add_rounded_btn.png"); ?>" /></span></div>-->
                            <div id="myProjectDivList">
                                <!-- Prepend Data insert here -->
                                <div id="myProjectOriginal">
                                    <!-- Prepend Data insert here -->
                                    <div id="myProjectDiv">
                                        
                                    
                                    </div>
                                    <div id="sharedProject">
                                        
                                    
                                    </div>
                                
                                </div>
                                <div id="myProjectImported">
                                    <!-- Prepend Data insert here -->
                                    
                                </div>
                            </div>
                            
                        </div>
                    <?php // include("template/chat_body.php"); ?>
                    </div>

                    <div class="col-lg-8 TaskListDiv">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-top: 10px;">
                            <div class="row margin-topdown" style="display: none;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toolsDive">
                                    <div class="toolDateSpan col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">
                                        <div class="row cusmar">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="text-container">
                                                    <input type="text" id="newTaskInput" data-projectid="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Task'" placeholder="New Task" class="form-control border-rad">
                                                    <span id="clearBtn1" class="clearBtn"></span>
                                                </div>
                                                <!--  <img src="<?php echo base_url();?>asset/img/animate_pencil/pencil.gif"  width="15px" height="25px" id="task_pen" alt=""/> -->
                                                
                                                <a class="dropdown-toggle dd-tog-view taskview" data-toggle="dropdown" > View : <span id="DueDateText">Task By Due Date (ASC)</span>   <i class="fa fa-caret-down"></i></a>
                                                <ul class="dropdown-menu dropdown-change-view pull-right">
                                                    <div class="taskarrow"></div>
                                                    <li class="dropdown-menu-header">View </li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Task By Due Date (ASC)</a></li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Task By Due Date (DESC)</a></li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Incomplete Tasks</a></li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Completed Tasks</a></li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Incomplete Sub Tasks</a></li>
                                                    <li><a><i class="fa fa-check whiteClr"></i>Completed Sub Tasks</a></li>
                                                    <span id="DueDateOrder" style="display: none;"></span>
                                                    <!-- <li><a>Assignee</a></li> -->
                                                    <li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;</li>
                                                </ul>
                                            </div>
                                        </div>

                                            
                                    </div>
                                </div>
                                
                            </div>
                            <div class="panel panel-default taskDiv">
                                
                                <div class="panel-body font-color">
                                    
                                    <div id="taskInsertDiv">
                                        
                                    </div>

                                    <div id="taskInsertDivHolder" style="display: none;">
                                        <div id="taskInsertDivDue">
                                            
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="margin-top: 10px;">
                            <div class="panel panel-default" style="border-radius: 8px;">
                                <div class="panel-body font-color">
                                    <div id="taskInsertDivpro" style="overflow-y: scroll; overflow-x: hidden;"></div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                 <?php include("template/dashboard_report_design.php"); ?>
            </section>
        </div>
    </div>

    <!-- Side window start here -->
    
    <!-- Side window end here -->
    <!-- END MAIN CONTENT -->
    <!-- PAGE FOOTER -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 104% !important;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Import Project</h4>
                </div>
                <div class="modal-body">
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
                            </tr>
                        </thead>
                        <tbody id="report_body"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button onclick="process_imports()" id="btn_process" class="btn btn-success">Process</button>
                </div>
            </div>
        </div>
      </div>
    
       
    <!--  -->
    <input type="hidden" name="feedbackBadge" id="feedbackBadge" />
    <input type="hidden" name="taskId" id="taskId" value="">
    <input type="hidden" name="subtaskinid" id="subtaskinid" value="">
    <input type="hidden" name="taskOpenBy" id="taskOpenBy" value="">
    <input type="hidden" name="feedback_id" id="feedback_id" value="">
    <input type="hidden" name="feedback_badge" id="feedback_badge" value="">
    <input type="hidden" name="feedback_compliments" id="feedback_compliments" value="">
    <input type="hidden" name="feedback_improvement" id="feedback_improvement" value="">
    <input type="hidden" name="chkforStory" id="chkforStory" value="">
    <i class="fa fa-close exportProject inviteClose clasI" aria-hidden="true" onClick="closeInvite(this)"></i>
    <img src="<?php echo base_url(); ?>/asset/img/icons/60525.png" class="exportProject inviteClose clasI sendShareTaskEmailBtn" aria-hidden="true" onClick="shareWithOther()">
    <?php include 'template/footer.php';?>
    <!--================================================== -->
    <?php include 'template/includes_bottom.php';?>
    <!-- ITL Todo : sujon -->
    <!-- <script src="<?php echo base_url();?>asset/js/itl-todo/itl-todo-manager.js?v=<?php echo time();?>"></script> -->
    <?php include("template/itl-todo-manager.php"); ?>
    <?php include 'template/weather_js.php';?> 
    <?php include("shared_emai_div.php"); ?>
    <script src="<?php echo base_url('asset/js/plugin/moneyjs/money.min.js'); ?>"></script>

    <script type="text/javascript">
        
        var arr_fpstart=[];
        var arr_fpend=[];
        var arr_sub_fpstart=[];
        var arr_sub_fpend=[];
        var divstatus = false;
    
        var crm_users = <?php echo json_encode($users); ?>;
        var selectArray = <?php echo json_encode($users); ?>;
        var allusers = <?php echo json_encode($allusers); ?>;
        var alluser = <?php echo json_encode($users); ?>;
        var client = <?php echo json_encode($client); ?>;
        var projectstatus = <?php echo json_encode($projectstatus); ?>;
        var projectArray = <?php echo json_encode($projectGroup); ?>;
        var wsusers = <?php echo json_encode($users); ?>;
        var allprojects = <?php echo json_encode($allprojects); ?>;
        var newSelArr = selectArray;
        var userArray = [];
        var MemberArray = [];
        var val = true;
        var valM = true;
        var unique = [];
        var newSelArr = [];
        var finalArr = [];
        var subtaskList = [];
        var TaskScrollArray = [];
        var scrollcount = 0;
        var SStaskCount = 0;
        var backdivDestory = 0;
        var allprojectstatus = <?php echo json_encode($projectstatus); ?>;
        var tSTsk = 0;
        var tTsk = 0;
        var totalTnTS = 0;
        var totalTnTSDate = 0;
        var limitChecking = 0;

    </script>

    <script>

        $(".slide-toggle").click(function(){
            
            if($("#larrrow").is(":visible")){
                $("#rarrow").show();
                
                $(".TaskListDiv").animate({
                    width: "99%"
                });
                
                $("#leftFloat").text("MY PROJECTS");
                $("#leftFloat").css('display','block');
                
                $(".TaskListDiv").css('margin-left','1%');
                $(".taskDiv").addClass('change');
                $(".taskDate").addClass('customdate3');
                $(".taskDate").removeClass('customdate');

                $(".subtaskDatePicker").addClass('customdate2');
                $(".subtaskDatePicker").removeClass('customdate');
                $(".taskRow").css('margin-bottom','0%');
                $(".hover2").css('width','91.8% !important');
                $(".excolCustom").css('width','3%');
                $(".excolCustom").css('margin-right','0%');
                $(".imgRow").css('padding-right','3.1%');
                
            }else if($("#rarrow").is(":visible")){


                $("#rarrow").hide();
                // $('.ribLi1').trigger('click');
                var lastselector = $("#closeReport").attr("data-expand");
                //alert(lastselector);
                $(".ribLi").removeClass('activeOL');
                
                if(lastselector != "NONE"){
                    $("#"+lastselector).addClass('activeOL');
                }else if(lastselector == "NONE"){
                    $(".ribLi1").addClass('activeOL');
                }

                $("#reportDivArea").hide();
                $("#leftFloat").css('display','none');
                $("#leftFloat").text("");
                $(".TaskListDiv").removeAttr('style');
                $(".taskDate").removeClass('customdate3');
                $(".taskDate").addClass('customdate');
                $(".subtaskDatePicker").addClass('customdate');
                $(".subtaskDatePicker").removeClass('customdate2');
            }

            $(".projectListDiv").animate({
                width: "toggle"
            });
        });

        $('ul.dropdown-change-view li').click(function(e){ 
            //console.log($(this).text());
            $('#DueDateText').text($(this).text());
            $('#DueDateOrder').text("DESC");
            
            $('.dropdown-change-view li').removeClass('active');
            $(this).addClass('active');
            
            if($(this).text() == 'Completed Tasks'){
                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC',$("#DueDateText").text());
            }else if($(this).text()=='Incomplete Sub Tasks'){
                
                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC',$("#DueDateText").text());
            }else if($(this).text()=='Completed Sub Tasks'){
                
                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC',$("#DueDateText").text());
            }else if($(this).text()=='Incomplete Tasks'){
                
                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC',$("#DueDateText").text());
            }else if($(this).text()=='Task By Due Date (ASC)'){

                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC');  
            
            }else if($(this).text()=='Task By Due Date (DESC)'){

                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC');

            }else if($(this).text()=='Assignee'){
                
                
            }else{
                //console.log($(this).text());

                $('.datewise-row').show();
                $('.userwise-row').hide();
                $('#DueDateSpan').show();
                $('.ddm-calview').hide();
                $(".dd-parent").show('slow');
                $('.dd-parent-user').remove();

                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');        
            }
            
        });

        function changeViewOrder(){
            
            if($('#DueDateOrder').text() == "DESC"){
                //load_todos(false,'ASC');
                if($("#DueDateText").text() == 'Completed Tasks' || $("#DueDateText").text() == 'Incomplete Tasks'){
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC',$("#DueDateText").text());
                }else{
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
                }

                $('#DueDateOrder').text('ASC');
            
            }else{
                //load_todos(false,'DESC');
                if($("#DueDateText").text() == 'Completed Tasks' || $("#DueDateText").text() == 'Incomplete Tasks'){
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC',$("#DueDateText").text());
                }else{
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'DESC','All');
                }
                
                $('#DueDateOrder').text('DESC');
            }
        }
        
        function changeViewOrderAss(){
            if($('#AssigneeOrder').text()=="DESC"){
                load_todos(false,'ASC');
                }else{
                load_todos(false,'DESC');
            }
        }

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


    function fun_addNewService(element,qid){
        
        row_in++;
        
        var rht= '<tr data-quoteid="'+qid+'" id="row'+row_in+'">'
        

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
        if($(event.currentTarget).is( "select" )){
        }else{
            $(event.currentTarget).attr('value',$(event.currentTarget).val());
        }
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
            dataType: "JSON",
            success: function (data, textStatus) {
                var obj = jQuery.parseJSON( data.NewCurrencyValue );
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
        if (val.revision_num>0){
            revnum=val.quoteid+'-R'+(val.revision_num);
            revnumgen=val.quoteid+'-R';
        }else{
            revnum=val.quoteid;
            revnumgen=val.quoteid+'-N';
        }
        newrow  ='<tr data-level="1" data-quoteid='+val.quoteid+' data-typeid='+val.type_id+'>'
                +'  <td><input class="chk-qt-inv" type="checkbox"></td>'
                +'  <td class="cls-open-items" data-quoteid='+val.quoteid+' data-taskid="'+val.taskid+'" onclick="loadquoteitems(this)"><i style="margin-right: 5px;" class="fa fa-caret-right"></i><span>QT-'+revnum+'</span></td>'
                +'  <td><input name="quotename_pop" onblur="updatequoteitems(this)" type="text" value="'+val.subject+'"</td>'
                +'  <td><select onchange="updatequoteitems(this)" name="quotestage_pop">'
                +'          <option value="Opened">Opened</option>'
                +'          <option value="Delivered">Delivered</option>'
                +'          <option value="Reviewed">Reviewed</option>'
                +'          <option value="Accepted">Accepted</option>'
                +'          <option value="Rejected">Rejected</option>'
                +'          <option value="Revised">Revised</option>'
                +'  </select></td>'
                +'  <td>'+val.createdate.split(" ")[0]+'</td>'
                +'  <td>'
                +'      <a title="Delete" onclick="fun_delete_quote(this)" class="btn btn-danger btn-xs pull-right size-family-sidebar btn-qa quote-action-del"><i style="font-size:20px !important;margin:5px" class="fa fa-trash-o"></i> </a>'
                +'      <a title="Show More" class="btn btn-success btn-xs pull-right size-family-sidebar btn-qa quote-action-more"><i style="font-size:20px !important;margin:5px" class="fa fa-ellipsis-h"></i> </a>'
                +'  </td>'
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
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
    
    var treeserial=0;var treeparent=0;
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
    
    

    function qTipAdd2(element) {

        $(element).qtip({

            show: {
               event: 'mouseenter',
               solo: true,
               // delay: 500

            },
            content: {
                text: '<div class="qtip-fontsize">'+$(element).val()+'</div>',
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
         return newrow;
    }

    function qTipSticky(taskdataid) {
      
        $("#stickynote"+taskdataid).qtip({

            show: {
                event: 'click', 
                modal:true

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
                        var qhtml='<div class="panel panel-default">'
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
                my: 'right top', // at the bottom right of...
                //target: $("#stickynote"+taskdataid)
                adjust: {
                            method: 'none shift',
                            //y:70
                        },
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
                        $("#"+inputid+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/attach.png" class="cls-open-attachment task-set-icon"/>');
                        
                    }
                    countAttact = 0;
                }
                var user_id = '<?php echo $id; ?>';
                



            $("#tbody_subtask_" + rowid + " tr").each(function (index) {
                $(this).find('td:first-child label').html(rowid + "." + Number(index + 1));
            });

            $('#added_subtask_start' + subtasknum + '').datetimepicker({
                format: 'Y-M-d H:i',
                minDate: 0,
                onChangeDateTime:  function (ct,$input) {
                    updateTimetableSub(ct,$input)
                },
                
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
              
                var days=($("#new_subtask_duration" + cur_id).val().split('d')[0]);
                var hours=($("#new_subtask_duration" + cur_id).val().split('h')[0]);
                hours = hours.split('d')[1];
                var minutes=($("#new_subtask_duration" + cur_id).val().split('m')[0]);
                minutes=minutes.split('h')[1];
                
                var new_end_time=new Date($("#new_subtask_start" + cur_id).val().replace(/-/g, ' '));
                var end=new Date($("#new_subtask_end" + cur_id).val().replace(/-/g, ' '));

                new_end_time=moment(new_end_time).add(days, 'days');
                new_end_time=moment(new_end_time).add(hours, 'hours');
                new_end_time=moment(new_end_time).add(minutes, 'minutes');

                $("#new_subtask_end" + cur_id).val(moment(new_end_time).format('YYYY-MMM-DD HH:mm'));
            }
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

    
function goForEmargency(projectID,status){
    var taskID = $("#emBtn").val();

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
            }else if(rsp.status == 'fail'){
                swal("Oops...", "No member(s) found to notify. Please add member first", "error");
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
            $("#"+inputID+'_exD').append('<img src="<?php echo base_url(); ?>require/img/prio/'+imgName.toLowerCase()+'.png" style="display:block;" class="cls-open-settings task-set-icon propertyImghide'+inputID+'"/>');
            
          });
    }else{
        
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
                
                
                
              });
    
}
</script>
<script type="text/javascript">
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
        

        function showModal(){
            $("#new_project_name").val("");
            $("#brief_note_new").val("");
            $('#DescShow').hide();
            $('#openNewProject_s1').modal('show');
            //$('#new_project_name').focus();
        }

        function getAllProject(){
            //$("#relatedto").hide();
            $("#assign_A").hide();
            $("#assign_C").hide();
            var getproject_url = "<?php echo (isset($shared_activity_id))?"guest_users/get_share_projects/".$id."/".$share_project_id:"Projects/getproject"; ?>";
            $.ajax({
                url: '<?php echo site_url(); ?>'+getproject_url,
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
                    //alert(data.projects.length);
                    if(data.projects.length > 0){
                        $("#newTaskInput").css('display','block');
                        $("#mainProjectArea").css('display','block');
                        $("#noprojectDiv").css('display','none'); 
                        setProjectAttribute(data);

                    }else{
                        
                        design =  '<div class="col-md-12 col-lg-12 txt4>';
                        design += '<div id="myprojectList">';
                        design += '<div class="panel panel-default proDiv" style="height: 653px;;margin-top: 1%;">';
                        design += '     <img style="    width: 13%;margin-left: 45%;margin-top: 13%;" src="<?php echo base_url(); ?>asset/img/bell.png">';  
                        design += '     <a id="open_newpro1" onclick="showModal()" style="margin-left: 44%;margin-top: 3%;background: #686868 !important;border: 1px solid;" href="javascript:void(0);" class="btn btn-primary btn-lg">CREATE A PROJECT</a>';
                        design += '</div>'
                        design += '</div>'
                        design += '</div>';
                        
                        //console.log(design);

                        $("#noprojectDiv").css('display','block'); 

                        $("#noprojectDiv").html(design);
                    }

                    

                },
                complete: function (data, textStatus) {

                },
                error: function (e) {
                    console.log(e.responseText);
                }
            }); 
        }

        // $('#myProjectDivList').delegate('.noBorder', 'click', function(e){
        $('#ribUl').delegate('.noBorder', 'click', function(e){
            
            //e.preventDefault();
            e.stopImmediatePropagation();
            if($(".inviteClose").is(":visible")){
                $(".inviteClose").trigger("click");
            }
            var targetID = e.target.id;
            
            if(targetID != ""){
                $("#closeReport").attr("data-lastclick",targetID);
            }else{
                //alert(targetID);
            }

            if(targetID != ""){
                $("#closeReport").attr("data-expand",targetID);
            }else{
                //alert(targetID);
                $("#closeReport").attr("data-expand","NONE");
            }
            
            var offset = $("#"+targetID).offset();
            
            
            var projectID = $("#"+targetID).attr('data-projectid');
            var param2 = $("#"+targetID).attr('data-type');
            
            var targetProName = $("#clickDiv"+projectID).find('b')[0].innerText;
            
            
            $(".notifation").siblings().addClass('inactive');
            // $(".importCount").siblings().addClass('inactive');
            
            if($("#clickDiv"+projectID).hasClass('inactive')){
                $("#clickDiv"+projectID).removeClass('inactive');
            }

            $('.inactive').removeAttr( "style" );
            
            if($("#larrrow").is(":visible")){
                $("#pronameSpan").html("");
                $("#taskInsertDiv").html("");
            }
            
            $("#pronameSpan").html(targetProName);
            $("#pronameSpan").attr('data-serial',projectID);
            $("#newTaskInput").attr('data-projectid',projectID);
            
            getTagAjax(projectID);
            
            if($('#backDiv'+param2+projectID).is(":visible")){
                
                divstatus = false;
                //console.log("From If");
                CloseFlotDiv(param2,projectID);

            }else{
                
                finalArr.length = 0;
                divstatus = true;
                //$('.backDiv').remove();
                // $('.noBorder').removeClass('border');
                $('.noBorder').removeClass('activeOL');
                // $("#"+param2+"IMG"+projectID).addClass('border');
                $("#"+param2+"IMG"+projectID).addClass('activeOL');

                $('.backDiv').css('display','none');
                $('.floting_box').css('display','none');

                $('#clickDiv'+projectID).css('z-index','1100');
                $('#clickDiv'+projectID).css('position','relative');

                var projectID = $("#newTaskInput").attr('data-projectid');
                var viewtype = 'Project';

                $('#reportDivArea').hide();
                $('.TaskListDiv').show();
                $('.TaskListDiv .taskDiv').css('margin-top','0px');
                $('.TaskListDiv .taskDiv').css('height','610px');

                switch(param2){

                    case 'properties':
                    
                                    $(".cusmar").hide();
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>todo/getPropertyInfoHD', // URL to the local file
                                        type: 'POST', // POST or GET
                                        data: {
                                            todo_serial:projectID,
                                            parentID:projectID,
                                            viewtype : viewtype,
                                            org_id: "<?php echo $org_id; ?>",
                                            user_id: "<?php echo $id; ?>"
                                        }, // Data to pass along with your request
                                        success: function(data, status) {
                                            //console.log(data);
                                            openProperties(projectID,param2,viewtype,data);
                                        },
                                        error: function(e){
                                            console.log(e);
                                        }
                                    });
                                    break;
                    case 'attach':
                                    $(".cusmar").hide();
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>projects/deleteFileUnseen', // URL to the local file
                                        type: 'POST', // POST or GET
                                        data: {projectID:projectID}, // Data to pass along with your request
                                        success: function(data, status) {
                                            //console.log(data);
                                            $("#tipA"+projectID).text("");
                                            openAttach(projectID,param2);
                                            
                                        }
                                    });
                                    break;
                    case 'comments':
                                    $(".cusmar").hide();
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>projects/getCommentForProjects', // URL to the local file
                                        type: 'POST', // POST or GET
                                        data: {
                                            projectID:projectID,
                                            user_email: "<?php echo $user_email; ?>",
                                            org_id: "<?php echo $org_id; ?>",
                                            user_id: "<?php echo $id; ?>"
                                        }, // Data to pass along with your request
                                        success: function(data, status) {
                                            //console.log(data);
                                            $("#tipT"+projectID).text("");
                                            openComments(projectID,param2,data);
                                            
                                        },
                                        error: function(e){
                                            console.log(e);
                                        }
                                    });
                                    break;
                    case 'list':
                                $(".cusmar").show();
                                $("#inviteeDiv").hide();

                                if($("#larrrow").is(":visible")){
                                    
                                    fun_loadfulltable(projectID,'ASC','All');
                                }else if($("#rarrow").is(":visible")){
                                    //fun_loadfulltable(projectID,'ASC','All');
                                    $("#larrrow").click();
                                    alert(param2);

                                }
                                break;
                    case 'contacts':
                                    $(".cusmar").hide();
                                    openContacts(projectID,param2);

                                    // $.ajax({
                                    //     url: '<?php echo base_url(); ?>projects/getCommentForProjects', // URL to the local file
                                    //     type: 'POST', // POST or GET
                                    //     data: {projectID:projectID}, // Data to pass along with your request
                                    //     success: function(data, status) {
                                    //         //console.log(data);
                                    //         $("#tipA"+projectID).text("");
                                    //         openAttach(projectID,param2);
                                            
                                    //     }
                                    // });
                                     break;

                } 
            }

        });


        function template(data, container) {
            var matches = data.text.match(/\b(\w)/g);
            var acronym = matches.join('');
            if($.isNumeric(acronym)){
                return "+"+acronym;
            }else{
                return acronym;
            } 
            
        }

         // sujon @ 3-12-2017
        function updateShareIcon(projectID){
            if($("#addAdmin").select2('data').length >0 || $("#addMember").select2('data').length>0){
                $('#both_icon'+projectID).show();
                $('#pie_icon'+projectID).hide();
            }else{
                $('#both_icon'+projectID).hide();
                $('#pie_icon'+projectID).show();
            }
        }

        function gotTasklist(serial){
            $("#listIMG"+serial).trigger('click');
        }

        function logView(){
            if($(".viewlogContainer").is(':visible')){
                $(".statuscontaciner").show('slow');
                $(".viewlogContainer").hide('slow');
            }else{
                $(".viewlogContainer").show('slow');
                $(".statuscontaciner").hide('slow');
            }
        }

        function openProperties(projectID,attr,viewtype,data){
            
            $("#chkforStory").val(viewtype);
            
            var taskdata = data.all_todos[0];

            if(taskdata.Status == 'completed'){
                sty1 = 'block';
                sty2 = 'none';
            }else{
                sty1 = 'none';
                sty2 = 'block';
            }

            var floatingDiv =  '<div data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'">';
                floatingDiv += '    <div id="Pro'+projectID+'">';
                floatingDiv += '        <div class="panel panel-default" style="border: none;margin-bottom: 0px;margin-left: -15px;margin-right: -15px;">';
                floatingDiv += '            <div class="panel-heading customSelect" style="height:103px;">';
                floatingDiv += '                <i class="fa fa-check forceCheck iconGray iconGrayWS'+taskdata.Id+'"  onClick="makeCompleteWS(' + taskdata.Id + ',\'none\',\'Task\');" id="iconGray' + taskdata.Id + '" style="display:'+sty2+';position: absolute;float: left;" ></i>';
                floatingDiv += '                <i class="fa fa-check forceCheck iconGreen iconGreenWS'+taskdata.Id+'" onClick="makeCompleteWS(' + taskdata.Id + ',\''+taskdata.Status+'\',\'Task\');" id="iconGreen' + taskdata.Id + '" style="display:'+sty1+';position: absolute;float: left;" ></i>';
                floatingDiv += '                <span class="proDivname" style="margin-top:0px;float: left;margin-left: 4%;">';
                floatingDiv += '                    <span id="todo_name_text'+projectID+'" class="task-properties">'+taskdata.Title + '</span>';
                //floatingDiv += '                    <a style="position: absolute; right: 162px; top: 30px;" onclick="addContactForm('+projectID+',\''+attr+'\')" data-projectid=""  class="exportProject" id="exportProject" title="Add Contact"><i class="fa fa-plus" aria-hidden="true" style="margin-top: 4px; margin-left: 1px;"></i></a>';
                floatingDiv +='                     <a data-toggle="dropdown" style="position: absolute; right: 163px; top: 30px;" class="dropdown-toggle exportProject" title="Contact">'+
                                                            '<i class="fa fa-phone"></i>'+
                                                        '</a>'+
                                                        '<ul class="dropdown-menu dd-menu-contact pull-right">'+
                                                            '<div class="arrow-top-right"></div>'+
                                                            '<li><a onclick="addContactForm('+projectID+',\''+attr+'\')">Add Contact</a></li>'+
                                                            '<li><a onclick="openContacts('+projectID+',\''+attr+'\')">View Contacts</a></li>'+
                                                        '</ul>';
                floatingDiv += '                    <a style="position: absolute; right: 129px; top: 30px;" onclick="logView()" data-projectid=""  class="exportProject" id="exportProject" title="View Log"><i class="fa fa-shield" aria-hidden="true" style="margin-top: 4px; margin-left: 1px;"></i></a>';
                floatingDiv += '                    <a style="position: absolute; right: 95px; top: 30px;" onclick="export_project_csv($(this).data(\'projectid\'))" data-projectid="'+projectID+'"  class="exportProject" id="exportProject" title="Export Project"><i class="fa fa-upload" aria-hidden="true"></i></a>';
                floatingDiv += '                    <a  onclick="fun_project('+projectID+',\''+viewtype+'\')" style="position: absolute; right: 62px; top: 30px;" class="exportProject"><i class="fa fa-trash" aria-hidden="true"></i> </a>';
                floatingDiv += '                    <i class="fa fa-close exportProject" aria-hidden="true" onClick="gotTasklist('+projectID+')" style="position:absolute;top: 30px;color: red;right: 29px;margin-left: 0px;cursor: pointer; margin-top: 0px;padding-top: 5px;"></i>';
                floatingDiv += '                    <span class="todo-createdby">';
                floatingDiv += '                        <span style="padding: 6px 0px 6px 0px;margin-top: 8px;">Created By: '+taskdata.creator_name+' On <span id="projectStDt'+projectID+'">'+moment(taskdata.CreatedDate).format('MMM DD YYYY')+'</span>';
                floatingDiv += '                    </span>';
                floatingDiv += '                    <span class="cusDue"> Start Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_start()" class="proInputText2" placeholder="Start Date" id="projectStartDate'+projectID+'" value="'+moment(taskdata.Startdate).format('MMM DD YYYY')+'"></span>';
                floatingDiv += '                    <span class="cusDue"> Due Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_end()" class="proInputText2" placeholder="Due Date" id="projectendtDate'+projectID+'" value="'+moment(taskdata.Enddate).format('MMM DD YYYY')+'"></span>';
                floatingDiv += '                 </span>';
                floatingDiv += '                 <span style="margin-top: 5px;width:100%;font-size: 11px;font-family: NavigateFont";" class="pull-left properDu">';
                floatingDiv += '                     <span style="margin-left: 0%;" class="pull-left duSpan" id="tagBtnDiv">';
                floatingDiv += '                         <span style="float:left;margin-top: 2px;" onClick="userListTaskCO(this,' + taskdata.Id + ')">Co-owners:</span>';
                floatingDiv += '                         <span style="float:left;margin-top: 0px;" id="tagBtnDivCOADMIN'+taskdata.Id+'"></span>';
                //floatingDiv +='                         <i class="fa fa-plus btn btn-primary btn-circle btnTag" onClick="userListTaskCO(this,' + taskdata.Id + ')" id="addBtnTag'+taskdata.Id+'"></i>';
                floatingDiv += '                     </span>';
                floatingDiv += '                     <span style="margin-left: 19%;" class="pull-left  duSpan" id="tagBtnDiv">';
                floatingDiv += '                         <span style="float:left;margin-top: 2px;">Members:</span>';
                floatingDiv += '                         <span class="pull-left" id="projectcoowerspan'+taskdata.Id+'"></span>';
                floatingDiv += '                     </span>';
                // floatingDiv += '                     <span onClick="openContacts('+projectID+',\''+attr+'\');" style="float: right;margin-top: 2px;margin-left: 2%;" class="duSpan statusCustomClass" >';
                // floatingDiv += '                         <span style="float: left;" >View:Contacts </span>';
                // floatingDiv += '                     </span>';
                floatingDiv += '                     <span style="float: right;margin-top: 2px;margin-left: 1%;" class="duSpan statusCustomClass" >';
                floatingDiv += '                         <span style="float: left;" >Status: </span>';
                floatingDiv += '                         <span class="pull-left taskStatusLi'+taskdata.Id+'  dt-todostatus" id="taskStatusLi'+taskdata.Id+'" data-type="'+taskdata.Type+'" data-serial="'+taskdata.Id+'" data-status="'+taskdata.Status+'" onClick="qtipCustomStatus(this,'+taskdata.Id+',\''+taskdata.Status+'\')" >'+taskdata.Status+'</span>';
                floatingDiv += '                     </span>';
               
                floatingDiv += '                 </span>';
                floatingDiv += '            </div>';
                floatingDiv += '            <div class="panel-body" style="padding-top: 0px;"><div class="contentdiv_prop">'+propertiesTabsOneStatus(projectID,viewtype,projectID,data,data)+'</div><div class="contentdiv_contact"></div></div>';
                floatingDiv += '        </div>';
                floatingDiv += '    </div>';
                floatingDiv += '</div>';

            // $("#sorryDiv").hide();
            $("#taskInsertDivpro").html("");
            $("#taskInsertDivDue").html("");
            $(".datewise-row").hide();
            //$("#taskInsertDivHolder").html("");
            $("#taskInsertDivpro").append(floatingDiv);
            // $(".commentinputClas"+projectID).trigger('click');
            var hh = $(".task-properties").innerHeight();
            $('.customSelect').css('height',75+parseInt(hh));

            // $(".taskDiv").css('overflow-y','hidden');
            // $(".attachListDiv").css('min-height','440px');
            // $('.TaskListDiv .taskDiv').css('margin-top','-10px');
            // $('.TaskListDiv .taskDiv').css('height','649px');

            if($("#rarrow").is(":visible")){
                $('#rarrow').trigger('click');   
                
            }
            
            //expanTaskDiv('465');
            setCoOwner(data,projectID);
            setCoMember(data,projectID);
            
            $("#propertiesProname"+projectID).text($("#pronameSpan").text());
            $("#exportProject").attr('data-projectid',projectID);
            if(taskdata.Status == 'canceled'){
                $("#taskStatusLi"+taskdata.Id).html("<del>"+$("#taskStatusLi"+taskdata.Id).text()+"</del>");
                $("#taskStatusLi"+taskdata.Id).css('color','RED');
            }

            if(taskdata.Status == 'none'){
                $("#taskStatusLi"+taskdata.Id).css('color','RED');
                $("#taskStatusLi"+taskdata.Id).text('[none]');
            }

            if(taskdata.Status == 'in progress'){
                $("#taskStatusLi"+taskdata.Id).css('color','BLUE');
            }

            if(taskdata.Status == 'completed'){
                $("#taskStatusLi"+taskdata.Id).css('color','GREEN');
            }
            
            if(taskdata.Status == 'on hold'){
                $("#taskStatusLi"+taskdata.Id).css('color','RED');
            }

            if(taskdata.Status == 'waiting for feedback'){
                $("#taskStatusLi"+taskdata.Id).css('color','orange');
                $("#taskStatusLi"+taskdata.Id).css('font-size','11px');
            }
            
            flatpick_start = $("#projectStartDate"+projectID).flatpickr({
                //inline: true, 
                enableTime : true,
                minDate: moment().format('YYYY-MM-DD HH:mm:ss'),
                dateFormat: 'M d Y',
                defaultDate: moment($("#projectStartDate"+projectID).val()).format('YYYY-MM-DD HH:mm:ss'),
                clickOpens: false,

                onChange: function(selectedDates, dateStr, instance) {
                    
                    var startdate = moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'); 
                    var end = moment($("#projectendtDate"+projectID).val()).format('YYYY-MM-DD HH:mm:ss'); 
                    projectDateUpdate(startdate,end,projectID,'projectStartDate');
                    flatpick_start.close();
                }
            });

            flatpick_end = $("#projectendtDate"+projectID).flatpickr({
                //inline: true, 
                enableTime : true,
                minDate: moment().format('YYYY-MM-DD HH:mm:ss'),
                dateFormat: 'M d Y',
                defaultDate: moment($("#projectendtDate"+projectID).val()).format('YYYY-MM-DD HH:mm:ss'),
                clickOpens: false,

                onChange: function(selectedDates, dateStr, instance) {
                    
                    var startdate = moment($("#projectStartDate"+projectID).val()).format('YYYY-MM-DD HH:mm:ss'); 
                    var end = moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'); 
                    projectDateUpdate(startdate,end,projectID,'projectendtDate');
                    flatpick_end.close();
                }
            });
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

    $(document).on('keydown','.project-text-prop',function(e){
        if (e.keyCode == 13) {
                e.preventDefault();
                $(e.currentTarget).blur();
                //saveTodoText(serial,e);
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
            //console.log(projectID);
            $.ajax({
                url : '<?php echo base_url(); ?>projects/getNewProjectdetails',
                type : 'POST',
                data : {projectID:projectID},
                success : function(data) {
                    
                    // console.log("Check it here");
                    // console.log(data);
                    
                    $("#itemDeleteStatus"+projectID).attr('data-itemstatus',data.detail[0].Status);
                    $("#projectDescription").val(data.detail[0].Description);
                    $("#projectstartDate"+projectID).val(moment(data.detail[0].Startdate).format('YYYY-MM-DD HH:mm:ss'));
                    $("#projectDuration").val(data.detail[0].Duration);
                    $("#projectendtDate"+projectID).val(moment(data.detail[0].Enddate).format('YYYY-MM-DD HH:mm:ss'));
                    
                    
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
                    
                    if(data.detail[0].CreatedBy != id){
                        //$("#addAdmin").prop("disabled", true);
                        $("#addMember").prop("disabled", true);
                        $("#dMembers").hide();
                        //$("#dSupervisor").hide();
                    }else{
                        //$("#addAdmin").prop("disabled", false);
                        $("#addMember").prop("disabled", false);
                        $("#dMembers").show();
                        //$("#dSupervisor").show();
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
            
            var floatingDiv =  ' <div data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'">';
                floatingDiv += '    <div class="panel panel-default"  style="border: none;margin-bottom: 0px;margin-left: -15px;margin-right: -15px;">';
                floatingDiv += '        <div class="panel-heading attachHead" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:95%;margin-left:5%;float: left;line-height: 1.5;text-overflow: ellipsis;    margin-top: -8px;font-size: 17px;font-family: NavigateFont;" class="project-text-propN"  id="comAttachame'+projectID+'"></span>';
                floatingDiv += '                    <i class="fa fa-close exportProject" aria-hidden="true" onClick="gotTasklist('+projectID+')" style="position: absolute; color: red;cursor: pointer; padding-top: 5px;right: -68px; top: -7px;"></i>';
                //floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="attachCrename"></span>';
                floatingDiv += '                </span>';
                //floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">'+projectAttachDesign(projectID,"ProjectsFiles")+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';


            $("#sorryDiv").hide();
            $("#taskInsertDiv").html("");
            $("#taskInsertDivDue").html("");
            $(".datewise-row").hide();
            //$("#taskInsertDivHolder").html("");
            $("#taskInsertDiv").append(floatingDiv);
            $(".taskDiv").css('overflow-y','hidden');
            //$("#projectBody").append(floatingDiv);
            if($("#rarrow").is(":visible")){
                $('#rarrow').trigger('click');   
                
            }


            $("#comAttachame"+projectID).html('<i class="fa fa-file " aria-hidden="true" id="" style="position: absolute; left: 12px; top: -12px; padding: 7px; border: 1px solid #f1f1f1; border-radius: 8px;" data-hasqtip="676" oldtitle="Share This Task" title="" aria-describedby="qtip-676"></i> '+ "Files on "+$("#pronameSpan").text());
            var hh = $("#comAttachame"+projectID).innerHeight();
            $('.attachHead').css('height',30+parseInt(hh));
            $('.TaskListDiv .taskDiv').css('margin-top','-10px');
            $('.TaskListDiv .taskDiv').css('height','649px');

            $("#SA").css('color','rgb(9, 247, 247)');
            
            $.each(alluser, function (key, value) {
                var userID = parseInt($("#userID"+projectID).text());
                var CreatedDate = $("#clickDiv"+projectID).data('cdate');
                if(value.ID == userID){
                    $("#attachCrename").html('<span class="todo-createdby">Created By: '+value.full_name+' On: '+moment(CreatedDate).format('MMM DD YYYY HH:mm:ss')+'</span>');
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
                    
                    //console.log(status);
                    if(status.msg == 'Already'){
                        swal("Oops...", "File already exist", "error");
                    }else{
                        $("#nofileImg").remove();
                        var res = status.file_new_name.split("_");
                        var filter = status.file_new_name.split(".");

                        tabDetail ='       <div class="col-lg-12 SA '+filter[1].toUpperCase()+'" id="fileWholeDiv007'+status.insert_id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
                        tabDetail +='           <div class="col-lg-5"><img class="" src="asset/icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;" id="fileoriname007'+status.insert_id+'">'+status.msg+'</span></div>';
                        tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
                        tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'asset/icons/Star.png">';
                        tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'asset/img/icons/share.png">';
                        tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'asset/icons/Details_Properties.png">';
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
                    }
                });
                
                request.fail(function( jqXHR, textStatus ) {
                    console.log('jqXHR');
                    console.log(jqXHR);
                    console.log(textStatus);
                });
                
            });

            attachdataload('Project',projectID,0,'ProjectFolder','ProjectsFiles');
        }
        

        function openComments(projectID,attr,data){
            //console.log(data);
            var floatingDiv =  ' <div  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;margin-bottom: 0px;margin-left: -15px;margin-right: -15px;">';
                floatingDiv += '        <div class="panel-heading commentHead" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname" style="width:87%;">';
                floatingDiv += '                <span style="width:95%;margin-left:6%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -8px;font-size: 17px;font-weight: normal;font-family: NavigateFont;" class="project-text-propN" id="comProname'+projectID+'"></span>';
                //floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename"></span>';
                floatingDiv += '                  <li class="ddm-com-set" style="display:inline">'
                            + '                     <a class="dropdown-toggle dt-com-set exportProject" data-toggle="dropdown" style="position: absolute; top: 5px; right: 3px;"><img class="" src="' + base_url + '/asset/img/feedIcon/settings.png" style="margin-left: -4px;margin-top: -3px;"></a>'
                            + '                     <ul class="dropdown-menu dropdown-com-set">'
                            + '                         <div class="arrow-position-view"></div>'
                            + '                         <li><a>Clear</a></li>'
                            + '                         <li><a>Starred</a></li>'
                            + '                         <li><a>Select</a></li>'
                            + '                      </ul>'
                            + '                     </li>';
                floatingDiv += '                    <i class="fa fa-close exportProject" aria-hidden="true" onClick="gotTasklist('+projectID+')" style="position: absolute; color: red; cursor: pointer; padding-top: 5px;right: -105px; top: -7px;"></i>';
                floatingDiv += '            </span>';
                //floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body" style="margin-top:-15px;">'+projectCommentsDesign(data,projectID)+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';
            
                // $("#projectBody").append(floatingDiv);
                $("#sorryDiv").hide();
                $("#taskInsertDiv").html("");
                $("#taskInsertDivDue").html("");
                $(".datewise-row").hide();
                //$("#taskInsertDivHolder").html("");

                $("#taskInsertDiv").append(floatingDiv);
                
                

                $("#commentinput").trigger('click');
                $(".taskDiv").css('overflow-y','hidden');

                if($("#rarrow").is(":visible")){
                    $('#rarrow').trigger('click');   
                    
                }

                
                $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
                setProjecttag(data,projectID);
                
                $("#comProname"+projectID).html('<i class="fa fa-comments" aria-hidden="true" id="" style="position: absolute; left: 12px; top: -12px; padding: 7px; border: 1px solid #f1f1f1; border-radius: 8px;" data-hasqtip="676" oldtitle="Share This Task" title="" aria-describedby="qtip-676"></i> '+" Conversations on "+$("#pronameSpan").text());
                var hh = $("#comProname"+projectID).innerHeight();
                $('.commentHead').css('height',30+parseInt(hh));
                $('.TaskListDiv .taskDiv').css('margin-top','-10px');
                $('.TaskListDiv .taskDiv').css('height','639px');

                $.each(alluser, function (key, value) {
                    var userID = parseInt($("#userID"+projectID).text());
                    var CreatedDate = $("#clickDiv"+projectID).data('cdate');
                    if(value.ID == userID){
                        $("#comCrename").html('<span class="todo-createdby">Created By: '+value.full_name+' On: '+moment(CreatedDate).format('MMM DD YYYY HH:mm:ss')+'</span>');
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
            $("#relatedto").val(data.proDetail[0].relatedToVal);
            $("#opneChat").attr("data-projectchatname",data.proDetail[0].project_chat_name);
        }

        $(".select2_multiple30").select2({
            maximumSelectionLength: 10,
            closeOnSelect: false,
            placeholder: "",
            //allowClear: true
        });

        

        $(".select2_multiple2").select2({
            maximumSelectionLength: 10,
            closeOnSelect: false,
            //allowClear: true
        });
        
        $(".select2_multiple3").select2({
            maximumSelectionLength: 10,
            closeOnSelect: false,
            placeholder: "",
            //allowClear: true
        });

        $(".select2_multiple20").select2({
            maximumSelectionLength: 10,
            closeOnSelect: false,
            placeholder: "",
            //allowClear: true
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
            closeOnSelect: false,
            placeholder: "Add People who are involved in this project",
            //allowClear: true,
            tags: true
        });

        function setProjectAttribute(data){
            var ico = "";
            var ara = "myProarray";
            var param1 = 'properties';
            var param2 = 'attach';
            var user_id = '<?php echo $id; ?>';
            var notifationArray =[];
            var proIdArray =[];
            //console.log(data);
            $.each(data.projects, function (key, value) {
                
                var penTask = parseInt(data.PendingTask[key].length);
                
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

                var projectitem = '<div class="panel panel-default notifation notifationDel" data-cdate="'+data.projects[key].CreatedDate+'" id="clickDiv'+data.projects[key].Id+'" data-proid = "'+data.projects[key].Id+'">';
                    projectitem += '                    <span style="display:none;" id="userID'+data.projects[key].Id+'">'+data.projects[key].CreatedBy+'</span>';
                    projectitem += '                    <div class="panel-head newNotifation" style="height: inherit;">';
                    projectitem += '                        <span class="name"><b class="textdecor" id="protitle'+data.projects[key].Id+'">'+data.projects[key].Title+'</b> <span class="procountspan" >'+penTask+' of '+data.TotalTask[key].length+' task pending</span><span style="margin-right: 0%;" class="margintop0 pull-right"></span><span class="margintop0 pull-right"><span class="tipT" id="tipA'+data.projects[key].Id+'">'+uA+'</span><span class="tipT" id="tipT'+data.projects[key].Id+'">'+uc+'</span></span></span>';
                    //projectitem += '<span class="badge badge-pill badge-default importPills" id="importPills'+data.projects[key].Id+'"></span>';
                    projectitem += '                    </div>';
                    projectitem += '                </div>';
                


                if(data.projects[key].importLevel == 0){
                    
                    if(data.projects[key].CreatedBy == user_id){
                        if($("#myProjectSection").is(":visible")){
                            $("#myProjectDiv").append(projectitem);
                        }else{
                            var myPro = '<div class="importedSection" style="height: inherit;" id="myProjectSection">My Projects</div>';
                            $("#myProjectDiv").append(myPro);
                            $("#myProjectDiv").append(projectitem);
                        }

                        $("#clickDiv"+data.projects[key].Id).addClass('myProjectLsit');
                        
                    }else{
                        if($("#sharedSection").is(":visible")){
                            $("#sharedProject").append(projectitem);
                        }else{
                            var myPro = '<div class="importedSection" style="height: inherit;" id="sharedSection">Shared With Me</div>';
                            $("#sharedProject").append(myPro);
                            $("#sharedProject").append(projectitem);
                        }

                        $("#clickDiv"+data.projects[key].Id).addClass('SharedProjectList');
                    }
                }else{
                    if($("#importedSection").is(":visible")){
                        $("#myProjectImported").append(projectitem);
                        //$("#importPills"+data.projects[key].Id).text(data.projects[key].importLevel);
                    }else{
                        var newSection = '<div class="importedSection" style="height: inherit;" id="importedSection">Imported Projects</div>';
                        $("#myProjectImported").append(newSection);
                        $("#myProjectImported").append(projectitem);
                        //$("#importPills"+data.projects[key].Id).text(data.projects[key].importLevel);
                    }

                    $("#clickDiv"+data.projects[key].Id).addClass('importCount');
                }
                
                //"#clickDiv'+data.projects[key].projectid+'"
                
               if(data.projects[key].Description){
                   
                    var qtc = '<div class="todo-desc"><b>Description:</b> '+data.projects[key].Description +'</div>';
                    
                    $('#protitle'+data.projects[key].Id).qtip({
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

                proIdArray.push(data.projects[key].Id);
                
                projectitem = "";
            });
            
            if(getCookie('project') != 0){
                $('.notifation').each(function(k,v){
                    notifationArray.push($(v).context.id);
                });
                
                if ($.inArray(getCookie('project'), proIdArray) == -1) {
                    $("#"+notifationArray[0]).trigger('click');
                }else{
                    checkCokie();   
                }
                         
            }else{
                $('.notifation').each(function(k,v){
                    notifationArray.push($(v).context.id);
                });

                if(notifationArray.length > 0){
                    $("#"+notifationArray[0]).trigger('click');
                }
            }

            

            
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
                    $("#myProjectOriginal").html("");
                    $("#myProjectImported").html("");
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
                    $("#myProjectOriginal").html("");
                    $("#myProjectImported").html("");
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
                        $("#myProjectOriginal").html("");
                        $("#myProjectImported").html("");
                        $("#pronameSpan").html("");
                        getAllProject();
                    }else if(data.msg == "FAIL"){
                        swal("Oops...", "You haven't any permission to delete this project. Please contact with your supervisor!", "error");
                        
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
            
        }

        function propertiesTabsOneStatus(projectid,viewtype,parentID,taskdata,data){
            //console.log(allStatus);
            var superviewtype = viewtype;
            var tabDetail ='    <div class="row propertiesDIVNew">';

            tabDetail +='   <div class="taskComments" style="font-family: NavigateFont;float: left;left:18px;width: 96.5%;position:relative !important;margin-top: 8px;">';
            tabDetail +='       <div id="commentinputNEW" style="" onfocus="edit();" onblur="if($(this).html() == \'\') $(this).html(\'Write a status update for this project\');" contenteditable data-status="ProjectCmnt" data-action="0" class="summernote commentinputClas'+projectid+'">Write a status update for this project</div>';
            tabDetail +='           <input type="hidden" id="taskid" data-status="Project" class="form-control taskid" value="'+projectid+'"/>';
            tabDetail +='       </div>';
            tabDetail +='   </div>';

            tabDetail +='    <div class="row attachListDiv" id="attachListDivCommnet" style="margin-top:0%;min-height:392px;">';

            var daterow = "";
            $.each(data.allStatus,function(k,v){
                var time = data.allStatus[k].CreatedDate;
                var className;
                var comClas;
                
                if(daterow == ""){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }else if(daterow != moment(time).format('L')){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }
                
                if (data.allStatus[k].Description.match(/href='([^']+)'/) != null) {
                    var filter = data.allStatus[k].Description.match(/href='([^']+)'/)[1].split("/");
                    var typeFilter = filter[filter.length-1].split(".");
                    
                    if ($.inArray(typeFilter[1], thisProject) == -1) {
                        thisProject.push(typeFilter[1]);
                    }

                    //className = typeFilter[1];
                    className = 'attachclass';
                    comClas = '';
                }else{
                    className = '';
                    comClas = 'hasCom';
                }


                if(className != ''){
                    var str = '<span style="font-size: 14px;font-weight: bold;"><i class="fa fa-paperclip flipFont" aria-hidden="true"></i> attached</span>';
                }else{
                    str = '';
                }

                var matches = data.allStatus[k].full_name.match(/\b(\w)/g);
                var acronym = matches.join(''); 

                
                
                tabDetail +='       <div class="panel panel-default proComm SA '+className+' '+comClas+' ptt'+data.allStatus[k].Id+'">';
                tabDetail +='           <div class="panel-body status statuscontaciner" style="display:block">';
                tabDetail +='               <div class="who clearfix">';
                tabDetail +='                   <span class="comment_imghover">';
                
                // tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
                tabDetail +='                   <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr ">'+acronym+'</span>';
                tabDetail +='                   <span class="from " style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+data.allStatus[k].full_name+'</span>'+str+'<span class="CusUsrTm"> '+moment(data.allStatus[k].CreatedDate).format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                tabDetail +='                   <span class="from " id="statusCmntID'+data.allStatus[k].Id+'" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+data.allStatus[k].Description+'</span>';
                
                tabDetail +='                   <div class="name dropdown "><b></b>'+
                                                    '<a data-toggle="dropdown" style="color:#ddd;" class="dropdown-toggle" title="Settings">'+
                                                        '<i class="fa fa-chevron-down pull-right"></i>'+
                                                    '</a>'+
                                                    '<ul class="dropdown-menu pull-right">'+
                                                        '<div class="arrow-top-right"></div>'+
                                                        '<li><a onclick="EditStatus(\''+data.allStatus[k].Id+'\')">Edit</a></li>'+
                                                        '<li><a onclick="delComment(\''+data.allStatus[k].Id+'\')">Delete</a></li>'+
                                                        // '<li><a onclick="">Forward</a></li>'+
                                                    '</ul>'+
                                                    //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                '</div>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div class="panel-body status viewlogContainer"  style="display:none">';
                tabDetail +='               <div style="margin-top: 0px;" class="SA">';
                                                $.each(data.allStory,function(ky,valu){
                                                    if(valu.parentid == data.allStatus[k].Id){
                                                        tabDetail +='<span class="from" style="width: 87%;float: left;margin-left: 0%;font-size: 11px;margin-top: 10px;    line-height: 1.2em;color: #000000;"><span style="font-weight:600;"> '+valu.name+'</span> <span> '+valu.action+'</span> <span>'+valu.detail+'</span>.<span> '+moment(valu.time).format('h:mm A z')+'</span></span>';
                                                    }
                                                });
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='       </div>';

            });
            // it should be required
            tabDetail +='    </div>';
            
            
            return tabDetail;
        }

        function propertiesTabsOne(projectid,viewtype,parentID,taskdata,data){
            //console.log(allStatus);
            var superviewtype = viewtype;
            var tabDetail ='    <div class="row propertiesDIVNew">';

            tabDetail +='   <div class="taskComments" style="float: left;left:18px;width: 96.5%;position:relative !important;margin-top: 8px;">';
            tabDetail +='       <div id="commentinputNEW" style="" onfocus="edit();" onblur="if($(this).html() == \'\') $(this).html(\'Write a status update for this project\');" contenteditable data-status="ProjectCmnt" data-action="0" class="summernote commentinputClas'+projectid+'">Write a status update for this project</div>';
            tabDetail +='           <input type="hidden" id="taskid" data-status="Project" class="form-control taskid" value="'+projectid+'"/>';
            tabDetail +='       </div>';
            tabDetail +='   </div>';

            tabDetail +='    <div class="row attachListDiv" id="attachListDivCommnet" style="margin-top:0%;min-height:392px;">';

            var daterow = "";
            $.each(data.allComm,function(k,v){
                var time = data.allComm[k].CreatedDate;
                var className;
                var comClas;
                
                if(daterow == ""){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }else if(daterow != moment(time).format('L')){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }
                
                if (data.allComm[k].Description.match(/href='([^']+)'/) != null) {
                    var filter = data.allComm[k].Description.match(/href='([^']+)'/)[1].split("/");
                    var typeFilter = filter[filter.length-1].split(".");
                    
                    if ($.inArray(typeFilter[1], thisProject) == -1) {
                        thisProject.push(typeFilter[1]);
                    }

                    //className = typeFilter[1];
                    className = 'attachclass';
                    comClas = '';
                }else{
                    className = '';
                    comClas = 'hasCom';
                }


                if(className != ''){
                    var str = '<span style="font-size: 14px;font-weight: bold;"><i class="fa fa-paperclip flipFont" aria-hidden="true"></i> attached</span>';
                }else{
                    str = '';
                }

                var matches = data.allComm[k].full_name.match(/\b(\w)/g);
                var acronym = matches.join(''); 

                
                
                tabDetail +='       <div class="panel panel-default proComm SA '+className+' '+comClas+' ptt'+data.allComm[k].Id+'">';
                tabDetail +='           <div class="panel-body status statuscontaciner" style="display:block">';
                tabDetail +='               <div class="who clearfix">';
                tabDetail +='                   <span class="comment_imghover">';
                
                // tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
                tabDetail +='                   <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr ">'+acronym+'</span>';
                tabDetail +='                   <span class="from " style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+data.allComm[k].full_name+'</span>'+str+'<span class="CusUsrTm"> '+moment(data.allComm[k].CreatedDate).format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                tabDetail +='                   <span class="from " id="statusCmntID'+data.allComm[k].Id+'" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+data.allComm[k].Description+'</span>';
                
                tabDetail +='                   <div class="name dropdown "><b></b>'+
                                                    '<a data-toggle="dropdown" style="color:#ddd;" class="dropdown-toggle" title="Settings">'+
                                                        '<i class="fa fa-chevron-down pull-right"></i>'+
                                                    '</a>'+
                                                    '<ul class="dropdown-menu pull-right">'+
                                                        '<div class="arrow-top-right"></div>'+
                                                        '<li><a onclick="EditStatus(\''+data.allComm[k].Id+'\')">Edit</a></li>'+
                                                        '<li><a onclick="delComment(\''+data.allComm[k].Id+'\')">Delete</a></li>'+
                                                        // '<li><a onclick="">Forward</a></li>'+
                                                    '</ul>'+
                                                    //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                '</div>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div class="panel-body status viewlogContainer"  style="display:none">';
                tabDetail +='               <div style="margin-top: 0px;" class="SA">';
                                                $.each(data.allStory,function(ky,valu){
                                                    if(valu.parentid == data.allComm[k].Id){
                                                        tabDetail +='<span class="from" style="width: 87%;float: left;margin-left: 0%;font-size: 11px;margin-top: 10px;    line-height: 1.2em;color: #000000;"><span style="font-weight:600;"> '+valu.name+'</span> <span> '+valu.action+'</span> <span>'+valu.detail+'</span>.<span> '+moment(valu.time).format('h:mm A z')+'</span></span>';
                                                    }
                                                });
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='       </div>';

            });
            // it should be required
            tabDetail +='    </div>';
            
            
            return tabDetail;
        }

        function propertiesTabsTwo(){

            var tabDetail ='  <div class="row">';
                tabDetail +='    <div class="col-lg-12">';
                tabDetail +='         <a href=""><img src="<?php echo base_url(); ?>asset/icons/proDlt.png"></a>';
                tabDetail +='         <a href=""><img src="<?php echo base_url(); ?>asset/icons/proCopy.png"></a>';
                tabDetail +='     </div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +='     <div class="col-lg-12"></div>';
                tabDetail +=' </div>';
            return tabDetail;
        }

        function tabsDesign(projectid,attr,viewtype,projectID,data,data){
            
            var tabsDesign =  ' <ul class="nav nav-tabs">';
                tabsDesign += ' </ul>';
                tabsDesign += ' <div class="tab-content" style="padding: 10px;">';
                tabsDesign += '     <div id="home" class="tab-pane fade in active">';
                tabsDesign +=           propertiesTabsOne(projectid,viewtype,projectID,data,data);
                tabsDesign += '     </div>';
                tabsDesign += ' </div>';
            
            return tabsDesign;
        }

         $("#myProjectDivList").on('click','.notifation', function(e){
            
            var offset = $("#"+e.currentTarget.id).offset();
            //console.log(offset);
            
            if(offset != undefined){
                var taskDivy = parseInt(offset.top)-30;
                var floaty = parseInt(offset.top)-100;

                $('head').append('<style>.taskDiv:after, .taskDiv:before{top:'+taskDivy+'px !important;}</style>');
            }

            
            if($("#inviteeDiv").is(':visible')){
                $("#taskInsertDiv").show();
                $("#taskInsertDivHolder").show();
                $(".cusmar").show();
                $(".inviteClose").hide();
                $("#inviteeDiv").remove();
            }

            //console.log(e.currentTarget.id);
            $(".tagbtnDivclass").html("");
            
            var targetId = e.currentTarget.id;
            var targetProjectId = $("#"+targetId).data('proid');
            var targetProName = $("#"+targetId).find('b')[0].innerText;
            
            // $(".ribLi6").attr('id','contactsIMG'+targetProjectId);
            // $(".ribLi6").attr('data-projectid',targetProjectId);

            $(".ribLi4").attr('id','propertiesIMG'+targetProjectId);
            $(".ribLi4").attr('data-projectid',targetProjectId);
            
            $(".ribLi3").attr('id','attachIMG'+targetProjectId);
            $(".ribLi3").attr('data-projectid',targetProjectId);
            
            $(".ribLi2").attr('id','commentsIMG'+targetProjectId);
            $(".ribLi2").attr('data-projectid',targetProjectId);

            $(".ribLi1").attr('id','listIMG'+targetProjectId);
            $(".ribLi1").attr('data-projectid',targetProjectId);

            if($(".ribLi1").hasClass('activeOL')){
                $("#listIMG"+targetProjectId).trigger('click');
            }

            if($(".ribLi2").hasClass('activeOL')){
                 $("#commentsIMG"+targetProjectId).trigger('click');
            }

            if($(".ribLi3").hasClass('activeOL')){
                 $("#attachIMG"+targetProjectId).trigger('click');
            }

            if($(".ribLi4").hasClass('activeOL')){
                 $("#propertiesIMG"+targetProjectId).trigger('click');
            }
            
            // if($(".ribLi6").hasClass('activeOL')){
            //      $("#contactsIMG"+targetProjectId).trigger('click');
            // }

            if($(".ribLi").hasClass('activeOL') == false){
                 $("#listIMG"+targetProjectId).trigger('click');
            }
            
            $("#exportProject").attr('data-projectid',targetProjectId);
            $("#deleteProject").attr('data-projectid',targetProjectId);

            CloseFlotDiv();
            
            
            $(".notifation").siblings().addClass('inactive');
            // $(".importCount").siblings().addClass('inactive');
            $('.importCount').each(function(k,v){
                //console.log("line number : 1.58");
                $(this).addClass('inactive');
            });

            $('.SharedProjectList').each(function(k,v){
                //console.log("line number : 1.58");
                $(this).addClass('inactive');
            });

            $('.myProjectLsit').each(function(k,v){
                //console.log("line number : 1.58");
                $(this).addClass('inactive');
            });

            if($("#"+targetId).hasClass('inactive')){
                $("#"+targetId).removeClass('inactive');
            }

            $("#pronameSpan").html("");
            $("#taskInsertDiv").html("");
            $("#pronameSpan").html(targetProName);
            $("#pronameSpan").attr('data-serial',targetProjectId);
            $("#newTaskInput").attr('data-projectid',targetProjectId);
            $("#pronameSpan").css('width','auto');

            
            
            var pronameSpanWidth = $("#pronameSpan").width();
            var pronameSpanWidthNew;
            
            if($("#expandRibbon").is(":visible")){
                if(pronameSpanWidth > 345){
                   pronameSpanWidthNew = '345'; 
                }else{
                    if(pronameSpanWidth>150){
                        pronameSpanWidthNew = parseInt(pronameSpanWidth)+20;
                    }else{
                        pronameSpanWidthNew = pronameSpanWidth+20;
                    }
                    
                }
                var cusexppo = parseInt(pronameSpanWidthNew)+ 35;

                $("#pronameSpan").css('width',pronameSpanWidthNew);
                $("#customExportDiv").css('left',cusexppo+'px');
            }

            if($("#collaspeRibbon").is(":visible")){
                $("#pronameSpan").css('float','left');
                $("#pronameSpan").css('margin-left','22%');
                $("#pronameSpan").css('font-size','30px !important');
                $("#pronameSpan").css('text-align','center');
                $("#pronameSpan").css('width','635px')
            }

            
            
            var tagBtnDiv = 'tagBtnDivTag'+targetProjectId;
            $(".tagbtnDivclass").attr('id',tagBtnDiv)
            
            //fun_loadfulltable(targetProjectId,'ASC');
            getTagAjax(targetProjectId,'Project');
            
            setCookie('project',targetProjectId,1);

            //fun_loadfulltable(targetProjectId);

            // $.ajax({
            //     url: '<?php echo base_url(); ?>todo/getPropertyInfoHD', // URL to the local file
            //     type: 'POST', // POST or GET
            //     data: {
            //         todo_serial:targetProjectId,
            //         parentID:targetProjectId,
            //         viewtype : "project",
            //         org_id: "<?php echo $org_id; ?>",
            //         user_id: "<?php echo $id; ?>"
            //     }, // Data to pass along with your request
            //     success: function(data, status) {
            //         //console.log(data);
            //         openProperties(targetProjectId,"properties","project",data);
            //     },
            //     error: function(e){
            //         console.log(e);
            //     }
            // });
        });


        function CloseFlotDiv(param2,projectID){
            //console.log(param2);
            $('.backDiv').remove();
            $('#myProjectDivList').css('z-index','0');
            $('.noBorder').removeClass('border');
        }

        function getTagAjax(project_ID,type = 'Task'){
            
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
                    
                    if( type == 'Task' ){
                        setProjecttag(data,project_ID);
                    }else{
                    // console.log("Line number 7840");
                        tags(data,project_ID);
                    }

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

        function getTagAjaxTask(project_ID,type = 'Task'){
            
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
                   setTasktag(data,project_ID);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        function getTagAjaxTaskCO(project_ID,type = 'Task'){
            
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/getTASKTagCO',
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
                   setTasktagCO(data,project_ID);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        function getTagAjaxPro(project_ID,type = 'Task'){
            
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
                    //$("#tagBtnDiv").html("");
                },
                success: function (data, textStatus) {
                     if(data.tag.length>0){
                       
                        $('#both_icon'+project_ID).show();
                        $('#pie_icon'+project_ID).hide();
                    }else{
                        $('#pie_icon'+project_ID).show();
                        $('#both_icon'+project_ID).hide();
                    }
                    if( type == 'Task' ){
                        setProjecttag(data,project_ID);
                    }else{
                       tagsPro(data,project_ID);
                    }

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

        function tags(data,tagDivID){
            
            
            $("#tagBtnDivTag"+tagDivID).empty();
            
            var remainingNum = 0;
            var remainingUserArray = [];
            var tagUserArray = [];
            var tagUserIdArray = [];
            var tagUserTypeArray = [];


            tagUserArray.push($("#pronamecreated").text());
            tagUserIdArray.push($("#pronamecreated").attr('data-id'));
            tagUserTypeArray.push(0);

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '1' ){
                    tagUserArray.push(data.tag[key].full_name);
                    tagUserIdArray.push(data.tag[key].userid);
                    tagUserTypeArray.push(1);
                }
            });

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '2' ){

                    tagUserArray.push(data.tag[key].full_name);
                    tagUserIdArray.push(data.tag[key].userid);
                    tagUserTypeArray.push(2);
                }
            });

            var totalMember = tagUserArray.length;
            
            if(totalMember > 3){
                
                remainingNum = totalMember-3;

                for(var i = 0;i < 3;i++){

                    var matches = tagUserArray[i].match(/\b(\w)/g);
                    
                    var acronym = matches.join(''); 
                    // if(acronym != undefined){

                    // }
                    
                    var bordercolor = "";
                    
                    switch(tagUserTypeArray[i]) {
                        case 0:
                            bordercolor = "#fc636b";
                            break;
                        case 1:
                            bordercolor = "#18c925";
                            break;
                        case 2:
                            bordercolor = "#2291f1";
                            break;
                        default:
                            bordercolor = "#2291f1";
                    }

                    $("#tagBtnDivTag"+tagDivID).append('<a onmouseenter="qtipTaskByUser(this,'+tagDivID+','+tagUserIdArray[i]+','+tagUserTypeArray[i]+')" title="'+tagUserArray[i]+'" style="margin-right: 2px;border: 2px solid '+bordercolor+' !important;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                }
                for(var i = 3;i < totalMember;i++){
                    remainingUserArray.push(tagUserIdArray[i]);
                }

               $("#tagBtnDivTag"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+',\''+remainingUserArray+'\',3)" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');

            }else{

                

                for(var i = 0;i < totalMember;i++){
                    
                    var matches = tagUserArray[i].match(/\b(\w)/g);
                    var acronym = matches.join(''); 
                    var bordercolor = "";
                    //console.log(tagUserTypeArray[i]);
                    switch(tagUserTypeArray[i]) {
                        case 0:
                            bordercolor = "#fc636b";
                            break;
                        case 1:
                            bordercolor = "#18c925";
                            break;
                        case 2:
                            bordercolor = "#2291f1";
                            break;
                        default:
                            bordercolor = "#2291f1";
                    }
                    $("#tagBtnDivTag"+tagDivID).append('<a onmouseenter="qtipTaskByUser(this,'+tagDivID+','+tagUserIdArray[i]+','+tagUserTypeArray[i]+')" title="'+tagUserArray[i]+'" style="margin-right: 2px;border: 2px solid '+bordercolor+' !important;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                }

                
            }

            // ccononsole.log(tagUserArray);
        }

        function tagsPro(data,tagDivID){
            
            $("#tagBtnDivTagpro"+tagDivID).empty();
            var remainingNum = 0;
            var remainingUserArray = [];
            var tagUserArray = [];
            var tagUserIdArray = [];
            var tagUserTypeArray = [];


            tagUserArray.push($("#pronamecreated"+tagDivID).text());
            tagUserIdArray.push($("#pronamecreated"+tagDivID).attr('data-id'));
            tagUserTypeArray.push(0);

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '1' ){
                    tagUserArray.push(data.tag[key].full_name);
                    tagUserIdArray.push(data.tag[key].userid);
                    tagUserTypeArray.push(1);
                }
            });

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '2' ){
                    tagUserArray.push(data.tag[key].full_name);
                    tagUserIdArray.push(data.tag[key].userid);
                    tagUserTypeArray.push(2);
                }
            });

            var statuslabel='none';
            var statusTaskArray=[];
            var statusSubArray=[];

            $.each(data.status,function(key,value){
                if(value.taskstatus !=null){
                    statusTaskArray=value.taskstatus.split(',');
                }
                if(value.substatus !=null){
                    statusSubArray=value.substatus.split(',');
                }
                
                
            });

            var statusFullArray = statusTaskArray.concat(statusSubArray);
            if(statusFullArray.length>0){
                
                if(statusFullArray.indexOf("in progress")>-1) statuslabel="in progress";
                var statuscounter=(jQuery.grep(statusFullArray, function(a){
                 return a == 'completed'
             }).length)


                if(statusFullArray.length==statuscounter){
                    statuslabel="completed";
                }
            }

            $('#prostatus'+tagDivID).find('b').html(statuslabel);
            
            var totalMember = tagUserArray.length;
            if(totalMember > 8){
                
                remainingNum = totalMember-8;

                for(var i = 0;i < 8;i++){

                    var matches = tagUserArray[i].match(/\b(\w)/g);
                    var acronym = matches.join(''); 
                   
                    $("#tagBtnDivTagpro"+tagDivID).append('<a onmouseenter="qtipTaskByUser(this,'+tagDivID+','+tagUserIdArray[i]+','+tagUserTypeArray[i]+')" title="'+tagUserArray[i]+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                }

                for(var i = 8;i < totalMember;i++){

                    remainingUserArray.push(tagUserIdArray[i]);
                    
                }

               
                $("#tagBtnDivTagpro"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+',\''+remainingUserArray+'\',3)" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');

                
            }else{

                for(var i = 0;i < totalMember;i++){
                    
                    var matches = tagUserArray[i].match(/\b(\w)/g);
                    var acronym = matches.join(''); 
                   
                    $("#tagBtnDivTagpro"+tagDivID).append('<a onmouseenter="qtipTaskByUser(this,'+tagDivID+','+tagUserIdArray[i]+','+tagUserTypeArray[i]+')" title="'+tagUserArray[i]+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                }
            }
        }

        function setCoMember(data,tagDivID){
            var remainingUserArray = [];
            var tagUserIdArray = [];
            var totalMember = data.tags_member.length;
            var remainingNum = 0;
            var splitAcc;
            //console.log(totalMember);
            
            $.each(data.tags_member,function(key,value){
                if(data.tags_member[key].UserStatus == '1' ){
                    tagUserIdArray.push(data.tags_member[key].userid);
                }
            });

            $.each(data.tags_member,function(key,value){
                if(data.tags_member[key].UserStatus == '2' ){
                    tagUserIdArray.push(data.tags_member[key].userid);
                }
            });

            for(var i = 0;i < totalMember;i++){

                var matches = data.tags_member[i].full_name.match(/\b(\w)/g);
                var acronymleb = matches.join(''); 
                var acronym = acronymleb.length;
                var splitArray = acronymleb.split("");
                
                if(acronym >= 2){
                    splitAcc = splitArray[0]+""+splitArray[1];
                }else{
                    splitAcc = acronymleb;
                }
                $("#projectcoowerspan"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+','+data.tags_member[i].ID+','+tagDivID+')"  id="tagLiNum'+data.tags_member[i].ID+tagDivID+'"title="'+data.tags_member[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle tagAdBtn">'+splitAcc+'</a>');
            }
        }

        function setCoOwner(data,tagDivID){
            var remainingUserArray = [];
            var tagUserIdArray = [];
            var totalMember = data.tags_admin.length;
            var remainingNum = 0;
            var splitAcc;
            //console.log(totalMember);
            
            $.each(data.tags_admin,function(key,value){
                if(data.tags_admin[key].UserStatus == '1' ){
                    tagUserIdArray.push(data.tags_admin[key].userid);
                }
            });

            $.each(data.tags_admin,function(key,value){
                if(data.tags_admin[key].UserStatus == '2' ){
                    tagUserIdArray.push(data.tags_admin[key].userid);
                }
            });

            for(var i = 0;i < totalMember;i++){

                var matches = data.tags_admin[i].full_name.match(/\b(\w)/g);
                var acronymleb = matches.join(''); 
                var acronym = acronymleb.length;
                var splitArray = acronymleb.split("");
                
                if(acronym >= 2){
                    splitAcc = splitArray[0]+""+splitArray[1];
                }else{
                    splitAcc = acronymleb;
                }
                $("#tagBtnDivCOADMIN"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+','+data.tags_admin[i].ID+','+tagDivID+')"  id="tagLiNum'+data.tags_admin[i].ID+tagDivID+'"title="'+data.tags_admin[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle tagAdBtn">'+splitAcc+'</a>');
            }
        }

        function setTasktag(data,tagDivID){
            var remainingUserArray = [];
            var tagUserIdArray = [];
            var totalMember = data.tag.length;
            var remainingNum = 0;
            var splitAcc;
            
            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '1' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '2' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });
            if(totalMember < 1){
                $("#TaskMemArea"+tagDivID).append('<a style="color:RED;font-size: 12px;position: absolute;margin-top: 5px !important;" id="TaskMemAreanonbtn'+tagDivID+'">[None]</a>');
            }else {
                for(var i = 0;i < totalMember;i++){

                    var matches = data.tag[i].full_name.match(/\b(\w)/g);
                    var acronymleb = matches.join(''); 
                    var acronym = acronymleb.length;
                    var splitArray = acronymleb.split("");
                    
                    if(acronym >= 2){
                        splitAcc = splitArray[0]+""+splitArray[1];
                    }else{
                        splitAcc = acronymleb;
                    }
                    $("#TaskMemArea"+tagDivID).append('<a id="tagLiNumTaskMemArea'+data.tag[i].ID+tagDivID+'"title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle taskMemCus">'+splitAcc+'</a>');
                }
                
            }
        }

        function setTasktagCO(data,tagDivID){
            var remainingUserArray = [];
            var tagUserIdArray = [];
            var totalMember = data.tag.length;
            var remainingNum = 0;
            var splitAcc;
            
            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '1' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '2' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });
            if(totalMember < 1){
                $("#TaskCoArea"+tagDivID).append('<a style="color:RED;font-size: 12px;position: absolute;margin-top: 5px !important;" id="TaskCoAreanonbtn'+tagDivID+'">[None]</a>');
            }else {
                for(var i = 0;i < totalMember;i++){

                    var matches = data.tag[i].full_name.match(/\b(\w)/g);
                    var acronymleb = matches.join(''); 
                    var acronym = acronymleb.length;
                    var splitArray = acronymleb.split("");
                    
                    if(acronym >= 2){
                        splitAcc = splitArray[0]+""+splitArray[1];
                    }else{
                        splitAcc = acronymleb;
                    }
                    $("#TaskCoArea"+tagDivID).append('<a id="tagLiNumTaskCoArea'+data.tag[i].ID+tagDivID+'"title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle taskMemCus">'+splitAcc+'</a>');
                }
                
            }
        }
        function setProjecttag(data,tagDivID){
            var remainingUserArray = [];
            var tagUserIdArray = [];
            var totalMember = data.tag.length;
            var remainingNum = 0;
            var splitAcc;
            
            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '1' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });

            $.each(data.tag,function(key,value){
                if(data.tag[key].UserStatus == '2' ){
                    tagUserIdArray.push(data.tag[key].userid);
                }
            });
            if(totalMember < 1){
                $("#tagBtnDiv"+tagDivID).append('<a style="color:RED;font-size: 12px;" id="nonbtn'+tagDivID+'">[None]</a>');
            }else if(totalMember > 2){
                
                remainingNum = totalMember-2;

                for(var i = 0;i < 2;i++){

                    var matches = data.tag[i].full_name.match(/\b(\w)/g);
                    var acronymleb = matches.join(''); 
                    var acronym = acronymleb.length;
                    var splitArray = acronymleb.split("");
                    
                    if(acronym >= 2){
                        splitAcc = splitArray[0]+""+splitArray[1];
                    }else{
                        splitAcc = acronymleb;
                    }
                    $("#tagBtnDiv"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+','+data.tag[i].ID+','+tagDivID+')"  id="tagLiNum'+data.tag[i].ID+tagDivID+'" title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+splitAcc+'</a>');
                }

                for(var i = 2;i < totalMember;i++){

                    remainingUserArray.push(tagUserIdArray[i]);
                    
                }

                $("#tagBtnDiv"+tagDivID).append('<a style="margin-right: 2px;" href="javascript:void(0);" onmouseenter="qtipTaskByUser(this,'+tagDivID+',\''+remainingUserArray+'\',3)" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
            }else{

                for(var i = 0;i < totalMember;i++){

                    var matches = data.tag[i].full_name.match(/\b(\w)/g);
                    var acronymleb = matches.join(''); 
                    var acronym = acronymleb.length;
                    var splitArray = acronymleb.split("");
                    
                    if(acronym >= 2){
                        splitAcc = splitArray[0]+""+splitArray[1];
                    }else{
                        splitAcc = acronymleb;
                    }
                    $("#tagBtnDiv"+tagDivID).append('<a  onmouseenter="qtipTaskByUser(this,'+tagDivID+','+data.tag[i].ID+','+tagDivID+')"  id="tagLiNum'+data.tag[i].ID+tagDivID+'"title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+splitAcc+'</a>');
                }
            }
        }

        function fun_loadfulltable(pro_id,order,status = 'All'){
            //console.log("Line 4988");
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/taskListNew',
                type: 'POST',
                data: {
                    pro_id: pro_id,
                    order: order,
                    status:status,
                    <?php echo (isset($shared_activity_id))?"id: ".$id.",":""; ?>
                    <?php echo (isset($shared_activity_id))?"org_id: '".$org_id."',":""; ?>
                    <?php echo (isset($shared_activity_id))?"tid: ".$share_task_id.",":""; ?>
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                    $("#sorryDiv").hide();
                    $("#taskInsertDiv").html("");
                    $("#taskInsertDivDue").html("");
                    $(".datewise-row").show();
                    thisprojectstatus.length = 0;
                },
                success: function (data, textStatus) {
                    //console.log(data);
                    totalTnTSDate = data;
                    tTsk = parseInt(data.allTask.length);
                    
                    
                    $.each(data.totalSubTask, function (key, value) {
                        tSTsk = tSTsk+parseInt(value.TotalSub);
                    });

                    totalTnTS = parseInt(tSTsk)+parseInt(tTsk);
                    
                    $.each(allusers, function (key, value) {
                        
                        if(value.ID == data.creator[0].createdBy){
                            
                            $("#pronamecreated").text(value.full_name);
                            $("#pronamecreated").attr('data-id',data.creator[0].createdBy);
                        }
                    });

                    if(data.proStatus.length>0){
                       $.each(data.proStatus, function (key, value) {
                            // console.log(value.projectstatus);
                            thisprojectstatus.push({'projectstatus':value.projectstatus});
                        }); 
                    }
                    
                    TaskScrollArray = [];
                    scrollcount = 0;
                    SStaskCount = 0;

                    drawTaskList(data,status);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        
        function taskPropetritesOpen(element,maindata,viewtype){
            var projectID = maindata.Id;
            var parentID = maindata.HasParentId;
            
            $('.dd-parent').css('backgroundColor','');
            $('.todoRow'+projectID).css('backgroundColor','lavender');
            
            var _this=this;
            
            // --- get property info
            var requestass = $.ajax({
                url: base_url+"todo/getPropertyInfoHD",
                method: 'POST',
                data: {
                    "todo_serial":projectID,
                    "viewtype":viewtype,
                    "parentID":parentID,
                    "org_id": "<?php echo $org_id; ?>",
                    "user_id": "<?php echo $id; ?>"
                },
                dataType: 'JSON'
            });
            
            requestass.done(function(data){
                var taskdata = data.all_todos[0];
                var thishprojectid = $("#newTaskInput").attr('data-projectid');
                if(taskdata.Status == 'completed'){
                    sty1 = 'block';
                    sty2 = 'none';
                }else{
                    sty1 = 'none';
                    sty2 = 'block';
                }
                
                var sd = moment(taskdata.Startdate);
                var ed = moment(taskdata.Enddate);
                var dur = moment(ed - sd).format("DDD");
                var floatingDiv =  '<div data-attr="'+viewtype+projectID+'" id="backDiv'+viewtype+projectID+'">';
                    floatingDiv += '    <div id="Pro'+projectID+'">';
                    floatingDiv += '        <div class="panel panel-default" style="border: none;margin-bottom: 0px;margin-left: -15px;margin-right: -15px;">';
                    floatingDiv += '            <div class="panel-heading customSelect" style="height:103px;">';
                    floatingDiv += '                <i class="fa fa-check forceCheck  iconGray iconGrayWS'+taskdata.Id+'"  onClick="makeCompleteWS(' + taskdata.Id + ',\'none\',\'Task\');" id="iconGray' + taskdata.Id + '" style="display:'+sty2+';position: absolute;float: left;" ></i>';
                    floatingDiv += '                <i class="fa fa-check  forceCheck iconGreen iconGreenWS'+taskdata.Id+'" onClick="makeCompleteWS(' + taskdata.Id + ',\''+taskdata.Status+'\',\'Task\');" id="iconGreen' + taskdata.Id + '" style="display:'+sty1+';position: absolute;float: left;" ></i>';
                    floatingDiv += '                <span class="proDivname" style="margin-top:0px;float: left;margin-left: 4%;">';
                    floatingDiv += '                    <span id="todo_name_text'+projectID+'" class="task-properties" style="/*width:610px !important;*/">'+taskdata.Title+'</span>';
                    floatingDiv +='                     <div class="filterDiv">';
                    floatingDiv +='                         <span class="pull-right filter" style="position: absolute; right: 50px; top: 20px;"><i class="fa fa-paperclip hvr-glow clasI customTaskImg" aria-hidden="true" data-type="attach" id="comAttahID" onclick="attacher()"></i></span>';
                    floatingDiv +='                     </div>';
                    floatingDiv +='                     <div><a class="dropdown-toggle procopyIMG hvr-glow clasI" data-toggle="dropdown" style="position: absolute; right: 85px; top: 32px;"><img style="width: 107% !important;margin-top: -200%;" src="'+base_url+'asset/icons/proCopy.png"></a>';
                    floatingDiv +='                         <ul class="dropdown-menu pull-right" style="padding-top:0px;position: absolute;top: 95px;">';
                    floatingDiv +='                             <li style="background-color: #6d6a69;" class="dropdown-menu-header">Projects:</li>';
                    floatingDiv +='                             <div class="arrow-top-right"></div>';
                    $.each(allprojects, function (key, value) {
                        floatingDiv+='                          <li onclick="convert2Task('+projectID+','+value.Id+')"><a href="#">'+value.Title+'</a></li>';
                    });
                    floatingDiv +='                         </ul></div>';
                    floatingDiv += '                    <i class="fa fa-shield  hvr-glow clasI" aria-hidden="true" onclick="logView()" title="View Log" style="margin-top: -6px;font-size: 14px;right: 120px; top: 32px;position: absolute;"></i>';
                    // floatingDiv +='                     <i class="fa fa-trash hvr-glow clasI" aria-hidden="true" onclick="fun_project('+projectID+',\''+viewtype+'\')" style="margin-top: -6px;font-size: 14px;right: 72px; top: 40px;position: absolute;"></i>';
                    // floatingDiv += '                    <i class="fa fa-close  hvr-glow clasI" aria-hidden="true" onClick="$(\'.ribLi1\').trigger(\'click\');$(\'.cusmar\').show();" style="color: red;right: 38px; top: 40px;position: absolute;cursor: pointer; margin-top: -6px;font-size: 14px;"></i>';
                    floatingDiv += '                    <span class="todo-createdby">';
                    floatingDiv += '                        <span style="padding: 6px 0px 6px 0px;margin-top: 8px;">Created By: '+taskdata.creator_name+' On <span id="projectStDt'+projectID+'">'+moment(taskdata.CreatedDate).format('MMM DD YYYY')+'</span>';
                    floatingDiv += '                    </span>';
                    floatingDiv += '                    <span class="cusDue"> Start Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_start()" class="proInputText2" placeholder="Start Date" id="projectstartDateT'+projectID+'" value="'+moment(taskdata.Startdate).format('MMM DD YYYY')+'"></span>';
                    floatingDiv += '                    <span class="cusDue"> Due Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_end()" class="proInputText2" placeholder="Due Date" id="projectendtDateT'+projectID+'" value="'+moment(taskdata.Enddate).format('MMM DD YYYY')+'"></span>';
                    floatingDiv += '                </span>';
                    floatingDiv +='                 <span style="margin-top: 5px;width:100%;font-size: 11px;font-family: NavigateFont";" class="pull-left properDu">';
                    floatingDiv +='                     <span style="margin-left: 0%;" class="pull-left duSpan">';
                    floatingDiv +='                         <span style="float:left;margin-top: 5px;margin-right: 5px;" onClick="">Duration:</span>';
                    floatingDiv +='                         <span style="float:left;margin-top: 7px;">'+dur+' days</span>';
                    floatingDiv +='                     </span>';
                    floatingDiv +='                     <span style="margin-left: 19%;" class="pull-left  duSpan">';
                    floatingDiv +='                         <span style="float:left;margin-top: 5px;margin-right: 5px;" onClick="TaskUserList(\'TaskMemArea\',this,' + taskdata.Id + ',\'2\')">Members:</span>';
                    floatingDiv +='                         <span class="pull-left" id="TaskMemArea'+taskdata.Id+'"></span>';
                    floatingDiv +='                     </span>';
                    floatingDiv +='                     <span style="position: absolute; margin-top: 2px; right: 5%;" class="duSpan statusCustomClass" >';
                    floatingDiv +='                         <span style="float: left;" >Status: </span>';
                    floatingDiv +='                         <span class="pull-left taskStatusLi'+taskdata.Id+'  dt-todostatus" id="taskStatusLi'+taskdata.Id+'" data-type="'+taskdata.Type+'" data-serial="'+taskdata.Id+'" data-status="'+taskdata.Status+'" onClick="qtipCustomStatus(this,'+taskdata.Id+',\''+taskdata.Status+'\')" >'+taskdata.Status+'</span>';
                    floatingDiv +='                     </span>';
                    floatingDiv +='                 </span>';
                    floatingDiv += '            </div>';
                    floatingDiv += '            <div class="panel-body" style="padding-top: 0px;">'+tabsDesignProject(projectID,viewtype,parentID,taskdata,data)+'</div>';
                    floatingDiv += '        </div>';
                    floatingDiv += '    </div>';
                    floatingDiv += '</div>';


                // $("#sorryDiv").hide();
                // $("#taskInsertDiv").html("");
                // $("#taskInsertDivDue").html("");
                // $(".datewise-row").hide();
                //$("#taskInsertDivHolder").html("");
                
                // $("#taskInsertDiv").append(floatingDiv);
                $("#taskInsertDivpro").append(floatingDiv);
                var hh = $(".task-properties").innerHeight();
                $('.customSelect').css('height',75+parseInt(hh));
                
                // $(".taskDiv").css('overflow-y','hidden');
                // $(".attachListDiv").css('min-height','385px');
                // $(".cusmar").hide();
                // $(".taskComments ").css('left','12px');
                // $(".taskComments ").css('right','13px');
                
                $.each(thisProject, function(i,val){
                    //console.log(val);
                    $('.filterUpdate').append('<li class="FILETYPEDYN" onclick="filter(\''+val+'\')"><a href="javascript:void(0);"><i class="fa fa-circle-o MAIN '+val+'" id="'+val+'"></i> '+val+'</a></li>');
                });

                if(taskdata.Status == 'none'){
                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                }else if(taskdata.Status == 'in progress'){
                    $("#taskStatusLi"+taskdata.Id).css('color','BLUE');
                }else if(taskdata.Status == 'completed'){
                    $("#taskStatusLi"+taskdata.Id).css('color','GREEN');
                }else if(taskdata.Status == 'on hold'){
                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                }else if(taskdata.Status == 'waiting for feedback'){
                    $("#taskStatusLi"+taskdata.Id).css('color','ORANGE');
                }else if(taskdata.Status == 'canceled'){
                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                }else{
                    $("#taskStatusLi"+serial).css('color','#6EA7F2');
                }

                getTagAjaxTaskCO(taskdata.Id,'Task');
                getTagAjaxTask(taskdata.Id,'Task');

                
                $('#projectDescriptionT').text(data.detail[0].Description);
                $('#projectstartDateT'+projectID).val(moment(data.detail[0].Startdate).format('MMM DD YYYY'));
                $('#projectendtDateT'+projectID).val(moment(data.detail[0].Enddate).format('MMM DD YYYY'));
                $('#projectDurationT').val(data.detail[0].Duration);
                $('#todo_name_text'+projectID).html(data.detail[0].Title);
                
                

                
                

                flatpick_start = $("#projectstartDateT"+projectID).flatpickr({
                    enableTime : true,
                    minDate: moment(taskdata.Startdate).format('MMM-DD-YYYY'),
                    maxDate: moment(taskdata.Enddate).format('MMM-DD-YYYY'),
                    dateFormat: 'M-d-Y',
                    defaultDate: moment(taskdata.Startdate).format('MMM-DD-YYYY'),
                    clickOpens: false,
                    onChange: function(selectedDates, dateStr, instance) {
                        
                        thisValue(selectedDates[0],taskdata.Id,'projectstartDateT','duration','task');
                        flatpick_start.close();
                    }
                    
                });
            
                flatpick_end = $("#projectendtDateT"+projectID).flatpickr({
                    enableTime : true,
                    minDate: moment(taskdata.Startdate).format('MMM DD YYYY'),
                    dateFormat: 'M-d-Y',
                    clickOpens: false,
                    onChange: function(selectedDates, dateStr, instance) {
                        
                        thisValue(selectedDates[0],taskdata.Id,'projectendtDateT','duration','task');
                        flatpick_end.close();
                    }
                });
                
                $('.flatpickr-calendar').addClass('dateIsPicked').removeClass('arrowTop');
            });
        }

        $('.taskDiv').scroll(function (e) {
            // console.log(e);
            var taskDetailStr = "";
            var blcol = "";
            var button = "";
            var sty = "";
            var count = 0;
            var dueCount = 0;
            var dateArr = [];
            var vColor = 'inherit';
            var SColor = 'inherit';
            
            if(scrollcount == 0){
               
                

                if ($(this).scrollTop() + $(this).innerHeight() <= parseInt($(this)[0].scrollHeight)) {
                    
                    console.log($(this).scrollTop());
                    console.log($(this).innerHeight());
                    console.log(parseInt($(this)[0].scrollHeight));

                    var taskDivlimitStart = $(".taskDiv").length;
                    highlimit = limitChecking + 2;

                    $.each(totalTnTSDate.allTask, function (i, item) {
                        console.log(item);
                        if (i > limitChecking) {
                            var date = item.Enddate.split(' ')[0];
                            if(totalTnTSDate.unsennsommnet[i][0].unseenComment == 0){
                                var uCc = '';
                            }else{
                                uCc = totalTnTSDate.unsennsommnet[i][0].unseenComment;
                            }

                            if(totalTnTSDate.unsennFile[i][0].unseenComment == 0){
                                var uAa = '';
                            }else{
                                uAa = totalTnTSDate.unsennFile[i][0].unseenComment;
                            }

                            if(item.label != null){
                                blcol = item.label;
                            }else{
                                blcol = "#ffffff";
                            }

                            var inStartClr = 'bfbfbf';

                            if(item.Status == 'completed'){
                                sty1 = 'block';
                                sty2 = 'none';
                                inStartClr = '54ce3c';
                            }else{
                                sty1 = 'none';
                                sty2 = 'block';
                            }


                            var now = moment(item.Startdate); //todays date
                            var end = moment(item.Enddate); // another date
                            
                            var duration = moment.duration(end.diff(now));
                            var days = Math.round(duration.asDays());
                            
                            var EnddateC = '';
                            var StartdateC = '';
                            var endcColorS = '';

                            if(moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                EnddateC = '[No due date]';
                            }else{
                                
                                EnddateC = moment(item.Enddate).format('MMM DD YYYY');
                            }

                            if(moment(item.Startdate).format('MMM DD YYYY') == 'Invalid date'){
                                StartdateC = '[No due date]';
                                SColor = 'RED';
                            }else{
                                
                                StartdateC = moment(item.Startdate).format('MMM DD YYYY');
                                sColor = 'inherit';
                            }

                            var SpecialTo = moment(item.Enddate).format('MMM DD YYYY');
                            // console.log(moment().diff(SpecialTo, 'days'));
                            if (moment().diff(SpecialTo, 'days') > 0) {
                                //alert('date is in the past');
                                vColor = 'RED';
                                inStartClr = 'ff003a';
                            }else if(moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                vColor = 'RED';
                            }else {
                                vColor = 'inherit';
                                //alert('date is today or in future');
                            }

                            var wid = "";
                            var widHr = "";
                            var shareBtnNew = "";

                            if(days.toString().length == '1'){
                                wid = '2%';
                            }else if(days.toString().length == '2'){
                                wid = '3%';
                            }else if(days.toString().length == '3'){
                                wid = '3%';
                            }

                            if(item.hour.toString().length == '1' && item.hour != '0'){
                                widHr = '2%';
                            }else if(item.hour.toString().length == '2'){
                                widHr = '3%';
                            }else if(item.hour.toString().length == '3'){
                                widHr = '3%';
                            }else if(item.hour == '0'){
                                widHr = '5%';
                            }

                            if(item.hour == '0'){
                                endcColorS = '[None]';
                                HourColor = 'RED';
                            }else{
                                
                                endcColorS = item.hour;
                                HourColor = 'inherit';
                            }

                            var dueColorS = '';
                            var duColor = 'inherit';

                            if(isNaN(days)){
                                dueColorS = '[None]';
                                duColor = 'RED';
                                widHr = '5%';
                            }else{
                                
                                dueColorS = days;
                                duColor = 'inherit';
                            }

                            if(item.isShared == '1'){
                                shareBtnNew = '| <span data-toggle="tooltip" onclick="qtipSharedOnclick(\'Task\','+item.Id+',\'tasktext\')" onmouseenter="qtipSharedBox(this,'+item.Id+')" data-placement="top"><i class="fa fa-share-alt" aria-hidden="true" style="margin: 0px;"></i></span>';
                            }else{
                                shareBtnNew = '';
                            }

                            countsabtask(item.Id);

                            //Parent Div Start
                            taskDetailStr += '<div ondrop="drop(event)" ondragover="allowDrop(event)"  data-serial="'+item.Id+'" class="taskRow taskRowCus taskRow0604 bottom-border taskDetailDive taskserial'+item.Id+'  dt-todostatus" dt-sta="'+item.Status+'" style="float: left;width:100%;border-left: 5px solid '+blcol+';margin-bottom: -2px;">';
                            //icon Div Start
                            
                            taskDetailStr += '    <div style="width:100%;float:left;"  class="TtaskRow" id="readOnlyID'+item.Id+'">';
                            taskDetailStr += '      <div style="width:5%;float:left;">';
                            taskDetailStr += '          <i class="fa fa-circle" style="display:block;color: #'+inStartClr+';float: left; margin: 21%; padding: 0%; height: 15px; width: 15px;font-size: 18px;"></i>';
                            taskDetailStr += '      </div>';
                            //Main Div Start
                            taskDetailStr += '      <div style="width:86%;float:left;">';
                            //Main Div Upper Start
                            taskDetailStr += '          <div class="slineSS" style="width: 92%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">';
                            taskDetailStr += '              <span data-serial="' + item.Id + '" id="tasktext' + item.Id + '" class="form proName clickontitle tnstitle">' + item.Title + '</span>';
                            
                            taskDetailStr += '          </div>';
                            //Main Div Lower Start
                            taskDetailStr += '          <div style="width:109%;height: 25px;margin-top: 7px;margin-bottom: 7px;">';
                            //Main Div Due By POPUP Start
                            taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Start: <span><input onclick="togglecalendar_startPro(' + item.Id + ')" data-c = "1" type="text" id="startDatein' + item.Id + '" name="mydate" style="color:'+SColor+';width: 17%;" class="datepicker customdate" data-dateformat="M d yy"  value="'+StartdateC+'"></span></span></span>|';
                            taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Due by: <span style="color:'+vColor+';"><input onclick="togglecalendar_endPro(' + item.Id + ')" type="text" id="endDateinNew' + item.Id + '" style="color:'+vColor+';width: 17%;" name="mydate" class="datepicker taskDate customdate " data-dateformat="M d yy" value="'+EnddateC+'"></span></span></span>|';
                            taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" aria-hidden="true" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan pointer" id="duraCogBtn'+item.Id+'"> Duration: <input type="text" style="color:'+duColor+';width:'+wid+';" class="duarationClass duSInput duraCogBtn'+item.Id+'" onchange="getDuration($(this).data(\'id\'),' + item.Id + ',\'startDatein\')" data-id="duration' + item.Id + '" id="duration' + item.Id + '" value="'+dueColorS+'"/></span></span>|';
                            taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle pointer" aria-hidden="true" id="hrCogBtn'+item.Id+'" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan"> Hours: <input type="text" style="color:'+HourColor+';width: '+widHr+';font-size: 11px !important;" class="duarationClass duSInput hrCogBtn'+item.Id+'" onchange="getDurationhr($(this).data(\'id\'),' + item.Id + ',\'task\')" data-id="hrduration' + item.Id + '" id="hrduration' + item.Id + '" value="'+endcColorS+'"/></span></span>|';
                            taskDetailStr += '              <span style="z-index: 100;position: relative;" class="duSpan" ><span clas="link_status_text'+item.Id+'  dt-todostatus" id="Levopenstatus'+item.Id+'" data-type="'+item.Type+'" data-serial="'+item.Id+'" data-status="'+item.Status+'" > Status:  </span> <span  class="link_status_text'+item.Id+'  dt-todostatus deleteStatus" id="openstatus'+item.Id+'" data-type="'+item.Type+'" data-serial="'+item.Id+'" data-status="'+item.Status+'" >'+item.Status+'</span> </span>|<span onClick="userListTask(this,' + item.Id + ')"  class="duSpan"><i class="fa fa-user" aria-hidden="true" style="font-size: 15px;margin-right: 5px;margin-top: 3px;"></i> <span style="margin-top: -3px;position: relative;margin-left: 0%;" class="taskTagBtnDiv" id="tagBtnDiv'+item.Id+'"></span> </span>';
                            taskDetailStr += '              <span style="z-index: 100;position: relative;"  id="subTaskcountbtn' + item.Id + '" class="duSpan subTaskcountbtn">| <span><i style="margin-top:5px;" class="fa fa-indent" aria-hidden="true"></i> </span><span id="subTaskcountbtnValue' + item.Id + '" style="padding-right: 0px;"></span></span>'+shareBtnNew;
                            taskDetailStr += '          </div>';
                            taskDetailStr += '      </div>';
                            taskDetailStr += '      <div style="width:9%;float:left;margin-top: 1%;">';
                            taskDetailStr += '          <span class=""><i style="margin-right: 0px; margin-left: -80px; border-color: #ffffff; color: #ffffff;" class="fa fa-plus hvr-glow clasI cHover open_newpro1" aria-hidden="true" id="projectbtn" title="Create Subtask" onclick="openInput('+item.Id+')"></i><i class="fa fa-check cusIconCom"  onClick="makeComplete(' + item.Id + ',\''+item.Status+'\',\'Task\');" id="iconGray' + item.Id + '" style="display:'+sty2+';margin-left: -5px !important;" ></i><i class="fa fa-check cusIconInCom" onClick="makeComplete(' + item.Id + ',\''+item.Status+'\',\'Task\');" id="iconGreen' + item.Id + '" style="display:'+sty1+'; margin-left: -5px !important;" ></i></span><i class="fa fa-ellipsis-h hvr-glow clasI cHover" id="openQtipProperty' + item.Id + '" style="position: relative;margin-top: 1%;right: -68%;border-color: #ffffff;color: #ffffff;"></i>';
                            taskDetailStr += '      </div>';
                            taskDetailStr += '    </div>';
                            taskDetailStr += '    <div style="width:100%;float:left;">';
                            taskDetailStr += '      <div class="subTaskListDiv" id="subTaskcountbtn' + item.Id + 'DIV">';
                            taskDetailStr += '          <div class="row margin-topdown" id="subTaskInputDiv'+item.Id+'" style="display:none;">';
                            taskDetailStr += '              <div class="col-lg-8 col-sm-8 col-md-8 SIDIV">';
                            taskDetailStr += '                  <input type="text" id="newsubTaskInput'+item.Id+'" data-taskid="'+item.Id+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
                            taskDetailStr += '              </div>';
                            taskDetailStr += '          </div>';
                            taskDetailStr += '          <div id="subtaskInsertDiv' + item.Id + '">';
                            taskDetailStr += '          </div>';
                            taskDetailStr += '      </div>';
                            taskDetailStr += '    </div>';
                            taskDetailStr += '</div>';

                            
                            if( moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                dueCount++;
                                $("#taskInsertDivDue").append(taskDetailStr);
                            }else{
                                $("#taskInsertDiv").append(taskDetailStr);
                            }

                            // dueColorS
                            // var dueColorSOptOLD = '<option value="[None]">[None]</option>';
                            // for (var jj = 1; jj <= 20; jj++) {
                            //     dueColorSOptOLD += '<option value="'+jj+'">'+jj+'</option>';
                            // }
                            
                            // $("#duration"+ item.Id ).append(dueColorSOptOLD);
                            // $("#duration"+ item.Id ).val(dueColorS);
                            // $("#hrduration"+ item.Id ).append(dueColorSOptOLD);
                            // $("#hrduration"+ item.Id ).val(endcColorS);
                            
                            $(".taskDiv").css('overflow-y','auto');

                            $('[data-toggle="tooltip"]').tooltip(); 

                            if(item.importLevel == 1){
                                $("#readOnlyID"+item.Id).addClass('readOnlyDiv');
                            }

                            if(dueCount > 0){
                                $("#taskInsertDivHolder").show();
                            }else{
                                $("#taskInsertDivHolder").hide();
                            }

                            if(getCookie('completechecking') === item.Id || getCookie('selectedTask') === item.Id ){
                                $('.taskserial'+item.Id).find(".taskRowCus").css('border-left','3px solid #1FEA9C');
                            }

                            if(item.Status == 'canceled'){
                                $("#tasktext"+item.Id).html("<del>"+$("#tasktext"+item.Id).text()+"</del>");
                                $("#tasktext"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'none'){
                                $("#openstatus"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).text('[none]');
                            }

                            if(item.Status == 'in progress'){
                                $("#openstatus"+item.Id).css('color','BLUE');
                            }

                            if(item.Status == 'completed'){
                                $("#openstatus"+item.Id).css('color','GREEN');
                            }
                            
                            if(item.Status == 'on hold'){
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'waiting for feedback'){
                                $("#openstatus"+item.Id).css('color','orange');
                                $("#openstatus"+item.Id).css('font-size','11px');
                            }
                            
                            getTagAjaxPro(item.Id,'Task');

                            $("#clickIconlist"+item.Id).click(function(){
                                qtipAssignee(this,item,crm_users,'Task');
                            });

                            $("#clickIconlist"+item.Id).mouseover(function(){
                                qtipAssignHover($(this).find('.onIconClick'),item);
                            });
                            
                            $('#openQtipProperty'+item.Id).click(function(){
                                 taskPropetritesOpen(this,item,'Task');
                            });

                            $('#openstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            });


                            $('#Levopenstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            }); 

                            $('#hrCogBtn'+item.Id).click(function(){
                                 $("#hrduration"+item.Id).select();
                            });

                            if(item.Description){
                                var qtc='<div class="todo-desc">Description: '+item.Description +'</div>';

                                $('#taskdestext'+item.Id).qtip({
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

                            qTipSticky(item.Id);

                            if(item.stickynote){                  
                                
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes_active.png');
                                if(item.notepopup==1)                     
                                    $("#stickynote"+item.Id).trigger('click');
                            
                            }else{
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes.png');
                            }
                            
                            

                            var fpstart = flatpickr("#startDatein"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),

                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'startDatein','duration','task');

                                }
                            });

                            

                            var fpendNew = flatpickr("#endDateinNew"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'endDateinNew','duration','task');
                                    
                                    $.ajax({
                                        url: '<?php echo site_url() . "Projects/updateDueDate"; ?>',
                                        type: 'POST',
                                        data: {
                                            parentID: item.HasParentId,
                                            type_id: item.Id,
                                            CreatedBy:item.CreatedBy,
                                            ChangeType:'Task',
                                            DueDate: moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                             //console.log('flatpickr Subtask');
                                             //console.log(res);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            // Some code to debbug e.g.:               
                                            console.log(jqXHR);
                                            console.log(textStatus);
                                            console.log(errorThrown);
                                        }
                                    });

                                }
                            });

                            arr_fpstart.push({"Id":item.Id,"date":fpstart});
                            //arr_fpend.push({"Id":item.Id,"date":fpend});
                            arr_fpend.push({"Id":item.Id,"date":fpendNew});
                        
                            taskDetailStr = "";
                            $("#subTaskcountbtn"+item.Id+"DIV").slideToggle();
                            DrawSubTaskList(item.HasParentId,item.Id,status);
                            SStaskCount++;
                        }
                    });
                }
            }
            scrollcount++;
        });

        $(document).on('mousewheel DOMMouseScroll', function (e) {
            console.log(e.currentTarget.activeElement.id);
            var regex = '/^([-\w])+?-(\d+)$/';
            var match = e.currentTarget.activeElement.id.match(regex);
            console.log(match);
            if (e.currentTarget.activeElement.id == 'options') {
                
                if (e.originalEvent.wheelDeltaY < 0) {
                    var offset = $('#options option').length;
                    var newOffset = parseInt(offset)+1;
                    $("#options").append('<option value="'+newOffset+'">'+newOffset+'</option>')
                } else {
                    console.log("Direction Up");
                }
            } else {
                console.log("Outside the select");
            }
        });

        function drawTaskList(data,status){
            
            var taskDetailStr = "";
            var blcol = "";
            var button = "";
            var sty = "";
            var count = 0;
            var dueCount = 0;
            var dateArr = [];
            var vColor = 'inherit';
            var SColor = 'inherit';
            var shareBtnIcon = '';
            var remainTnTS = 0;
            
            //alert(data.allTask.length);
            
            if(data.allTask.length > 0){
            
                $.each(data.allTask, function (i, item) {
                    
                    var date = item.Enddate.split(' ')[0];
                    //console.log(data.unsennsommnet[i][0].unseenComment);
                    if(data.unsennsommnet[i][0].unseenComment == 0){
                        var uCc = '';
                    }else{
                        uCc = data.unsennsommnet[i][0].unseenComment;
                    }

                    if(data.unsennFile[i][0].unseenComment == 0){
                        var uAa = '';
                    }else{
                        uAa = data.unsennFile[i][0].unseenComment;
                    }

                    var inStartClr = 'bfbfbf';
                    
                    if(item.label != null){
                        blcol = item.label;
                    }else{
                        blcol = "#ffffff";
                    }

                    if(item.Status == 'completed'){
                        sty1 = 'block';
                        sty2 = 'none';
                        inStartClr = '54ce3c';
                    }else{
                        sty1 = 'none';
                        sty2 = 'block';
                    }


                    var now = moment(item.Startdate); //todays date
                    var end = moment(item.Enddate); // another date
                    
                    var duration = moment.duration(end.diff(now));
                    var days = Math.round(duration.asDays());
                    
                    var EnddateC = '';
                    var StartdateC = '';
                    var endcColorS = '';
                    

                    if(moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                        EnddateC = '[No due date]';
                    }else{
                        
                        EnddateC = moment(item.Enddate).format('MMM DD YYYY');
                    }

                    if(moment(item.Startdate).format('MMM DD YYYY') == 'Invalid date'){
                        StartdateC = '[No due date]';
                        SColor = 'RED';
                    }else{
                        
                        StartdateC = moment(item.Startdate).format('MMM DD YYYY');
                        sColor = 'inherit';
                    }

                    var SpecialTo = moment(item.Enddate).format('MMM DD YYYY');
                    // console.log(moment().diff(SpecialTo, 'days'));
                    if (moment().diff(SpecialTo, 'days') > 0) {
                        //alert('date is in the past');
                        vColor = 'RED';
                        inStartClr = 'ff003a';
                    }else if(moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                        vColor = 'RED';
                    }else {
                        vColor = 'inherit';
                        //alert('date is today or in future');
                    }

                    var wid = "";

                    var widHr = "";
                    var shareBtnNew = "";

                    if(days.toString().length == '1'){
                        wid = '2%';
                    }else if(days.toString().length == '2'){
                        wid = '3%';
                    }else if(days.toString().length == '3'){
                        wid = '3%';
                    }


                    if(item.hour.toString().length == '1' && item.hour != '0'){
                        widHr = '3%';
                    }else if(item.hour.toString().length == '2'){
                        widHr = '3%';
                    }else if(item.hour.toString().length == '3'){
                        widHr = '3%';
                    }else if(item.hour == '0'){
                        widHr = '5%';
                    }

                    if(item.hour == '0'){
                        endcColorS = '[None]';
                        HourColor = 'RED';
                    }else{
                        
                        endcColorS = item.hour;
                        HourColor = 'inherit';
                    }

                    var dueColorS = '';
                    var duColor = 'inherit';

                    if(isNaN(days)){
                        dueColorS = '[None]';
                        duColor = 'RED';
                        wid = '5%';
                    }else{
                        
                        dueColorS = days;
                        duColor = 'inherit';
                    }

                    if(item.isShared == '1'){
                        shareBtnIcon = 'qtipSharedOnclick';
                        shareBtnNew = '| <span data-toggle="tooltip" onclick="qtipSharedOnclick(\'Task\','+item.Id+',\'tasktext\')" onmouseenter="qtipSharedBox(this,'+item.Id+')" data-placement="top"><i class="fa fa-share-alt" aria-hidden="true" style="margin: 0px;"></i></span>';
                    }else{
                        shareBtnIcon = 'SendInvite';
                        shareBtnNew = '';
                    }

                    countsabtask(item.Id);

                    //Parent Div Start
                    taskDetailStr += '<div ondrop="drop(event)" ondragover="allowDrop(event)"  data-serial="'+item.Id+'" class="taskRow taskRowCus taskRow0604 bottom-border taskDetailDive taskserial'+item.Id+'  dt-todostatus" dt-sta="'+item.Status+'" style="float: left;width:100%;border-left: 5px solid '+blcol+';margin-bottom: -2px;">';
                    //icon Div Start
                    
                    taskDetailStr += '    <div style="width:100%;float:left;"  class="TtaskRow" id="readOnlyID'+item.Id+'">';
                    taskDetailStr += '      <div style="width:5%;float:left;">';
                    taskDetailStr += '          <i class="fa fa-circle" style="display:block;color: #'+inStartClr+';float: left; margin: 21%; padding: 0%; height: 15px; width: 15px;font-size: 18px;"></i>';
                    taskDetailStr += '      </div>';
                    //Main Div Start
                    taskDetailStr += '      <div style="width:86%;float:left;">';
                    //Main Div Upper Start
                    taskDetailStr += '          <div class="slineSS" style="width: 92%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">';
                    taskDetailStr += '              <span data-serial="' + item.Id + '" id="tasktext' + item.Id + '" class="form proName clickontitle tnstitle">' + item.Title + '</span>';
                    
                    taskDetailStr += '          </div>';
                    //Main Div Lower Start
                    taskDetailStr += '          <div style="width:109%;height: 25px;margin-top: 7px;margin-bottom: 7px;">';
                    //Main Div Due By POPUP Start
                    // taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Start: <span><input onclick="togglecalendar_startPro(' + item.Id + ')" data-c = "1" type="text" id="startDatein' + item.Id + '" name="mydate" style="color:'+SColor+';width: 17%;" class="datepicker customdate" data-dateformat="M d yy"  value="'+StartdateC+'"></span></span></span>|';
                    // taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Due by: <span style="color:'+vColor+';"><input onclick="togglecalendar_endPro(' + item.Id + ')" type="text" id="endDateinNew' + item.Id + '" style="color:'+vColor+';width: 17%;" name="mydate" class="datepicker taskDate customdate " data-dateformat="M d yy" value="'+EnddateC+'"></span></span></span>|';
                    // taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" aria-hidden="true" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan pointer" id="duraCogBtn'+item.Id+'"> Duration: <input type="text" style="color:'+duColor+';width:'+wid+';" class="duarationClass duSInput duraCogBtn'+item.Id+'" onchange="getDuration($(this).data(\'id\'),' + item.Id + ',\'startDatein\')" data-id="duration' + item.Id + '" id="duration' + item.Id + '" value="'+dueColorS+'" /></span></span>|';
                    // taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle pointer" aria-hidden="true" id="hrCogBtn'+item.Id+'" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan"> Hours: <input type="text" style="color:'+HourColor+';width: '+widHr+';font-size: 11px !important;" class="duarationClass duSInput hrCogBtn'+item.Id+'" onchange="getDurationhr($(this).data(\'id\'),' + item.Id + ',\'task\')" data-id="hrduration' + item.Id + '" id="hrduration' + item.Id + '" value="'+endcColorS+'" /></span></span>|';
                    // taskDetailStr += '              <span style="z-index: 100;position: relative;" class="duSpan" ><span clas="link_status_text'+item.Id+'  dt-todostatus" id="Levopenstatus'+item.Id+'" data-type="'+item.Type+'" data-serial="'+item.Id+'" data-status="'+item.Status+'" ></span> <span  class="link_status_text'+item.Id+'  dt-todostatus deleteStatus" id="openstatus'+item.Id+'" data-type="'+item.Type+'" data-serial="'+item.Id+'" data-status="'+item.Status+'" >'+item.Status+'</span> </span>|<span onClick="userListTask(this,' + item.Id + ','+item.isShared+')"  class="duSpan"><i class="fa fa-user" aria-hidden="true" style="font-size: 15px;margin-right: 5px;margin-top: 3px;"></i> <span style="margin-top: -3px;position: relative;margin-left: 0%;" class="taskTagBtnDiv" id="tagBtnDiv'+item.Id+'"></span> </span>';
                    // taskDetailStr += '              <span style="z-index: 100;position: relative;"  id="subTaskcountbtn' + item.Id + '" class="duSpan subTaskcountbtn">| <span><i style="margin-top:5px;" class="fa fa-indent" aria-hidden="true"></i> </span><span id="subTaskcountbtnValue' + item.Id + '" style="padding-right: 0px;"></span></span>'+shareBtnNew;
                    taskDetailStr += '          </div>';
                    taskDetailStr += '      </div>';
                    taskDetailStr += '      <div style="width:5%;float:left;margin-top: 1%;">';
                    taskDetailStr += '          <span class=""><i style="margin-right: 0px; margin-left: -73px; border-color: #ffffff; color: #ffffff;" class="fa fa-plus hvr-glow clasI cHover open_newpro1" aria-hidden="true" id="projectbtn" title="Create Subtask" onclick="openInput('+item.Id+')"></i><i class="fa fa-check cusIconCom"  onClick="makeComplete(' + item.Id + ',\''+item.Status+'\',\'Task\');" id="iconGray' + item.Id + '" style="display:'+sty2+';margin-left: -5px !important;" ></i><i class="fa fa-check cusIconInCom" onClick="makeComplete(' + item.Id + ',\''+item.Status+'\',\'Task\');" id="iconGreen' + item.Id + '" style="display:'+sty1+'; margin-left: -5px !important;" ></i></span><i class="fa fa-ellipsis-h hvr-glow clasI cHover" id="openQtipProperty' + item.Id + '" style="position: relative;margin-top: 1%;right: -174%;border-color: #ffffff;color: #ffffff;"></i>';
                    taskDetailStr += '      </div>';
                    taskDetailStr += '    </div>';
                    taskDetailStr += '    <div style="width:100%;float:left;">';
                    taskDetailStr += '      <div class="subTaskListDiv" id="subTaskcountbtn' + item.Id + 'DIV">';
                    taskDetailStr += '          <div class="row margin-topdown" id="subTaskInputDiv'+item.Id+'" style="display:none;">';
                    taskDetailStr += '              <div class="col-lg-8 col-sm-8 col-md-8 SIDIV">';
                    taskDetailStr += '                  <input type="text" id="newsubTaskInput'+item.Id+'" data-taskid="'+item.Id+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
                    taskDetailStr += '              </div>';
                    taskDetailStr += '          </div>';
                    taskDetailStr += '          <div id="subtaskInsertDiv' + item.Id + '">';
                    taskDetailStr += '          </div>';
                    taskDetailStr += '      </div>';
                    taskDetailStr += '    </div>';
                    taskDetailStr += '</div>';

                    // remainTnTS = parseInt(totalTnTS - 1);
                    
                    
                    if(i <= 4){
                        if(totalTnTSDate.totalSubTask[i].HasParentId != null){
                            remainTnTS = parseInt(remainTnTS)+parseInt(totalTnTSDate.totalSubTask[i].TotalSub);
                            
                            limitChecking = i;
                            
                            if( moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                dueCount++;
                                $("#taskInsertDivDue").append(taskDetailStr);
                            }else{
                                $("#taskInsertDiv").append(taskDetailStr);
                            }


                            // var dueColorSOpt = '<option value="[None]">[None]</option>';
                            // for (var ii = 1; ii <= 20; ii++) {
                            //     dueColorSOpt += '<option value="'+ii+'">'+ii+'</option>';
                            // }

                            // $("#duration"+ item.Id ).append(dueColorSOpt);
                            // $("#duration"+ item.Id ).val(dueColorS);
                            // $("#hrduration"+ item.Id ).append(dueColorSOpt);
                            // $("#hrduration"+ item.Id ).val(endcColorS);
                            
                            $(".taskDiv").css('overflow-y','auto');

                            $('[data-toggle="tooltip"]').tooltip(); 

                            if(item.importLevel == 1){
                                $("#readOnlyID"+item.Id).addClass('readOnlyDiv');
                            }

                            if(dueCount > 0){
                                $("#taskInsertDivHolder").show();
                            }else{
                                $("#taskInsertDivHolder").hide();
                            }

                            if(getCookie('completechecking') === item.Id || getCookie('selectedTask') === item.Id ){
                                $('.taskserial'+item.Id).find(".taskRowCus").css('border-left','3px solid #1FEA9C');
                            }

                            if(item.Status == 'canceled'){
                                $("#tasktext"+item.Id).html("<del>"+$("#tasktext"+item.Id).text()+"</del>");
                                $("#tasktext"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'none'){
                                $("#openstatus"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).text('[none]');
                            }

                            if(item.Status == 'in progress'){
                                $("#openstatus"+item.Id).css('color','BLUE');
                            }

                            if(item.Status == 'completed'){
                                $("#openstatus"+item.Id).css('color','GREEN');
                            }
                            
                            if(item.Status == 'on hold'){
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'waiting for feedback'){
                                $("#openstatus"+item.Id).css('color','orange');
                                $("#openstatus"+item.Id).css('font-size','11px');
                            }
                            
                            getTagAjaxPro(item.Id,'Task');

                            $("#clickIconlist"+item.Id).click(function(){
                                qtipAssignee(this,item,crm_users,'Task');
                            });

                            

                            $("#clickIconlist"+item.Id).mouseover(function(){
                                qtipAssignHover($(this).find('.onIconClick'),item);
                            });
                            
                            $('#openQtipProperty'+item.Id).click(function(){
                                 taskPropetritesOpen(this,item,'Task');
                            });

                            $('#openstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            });


                            $('#Levopenstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            }); 

                            $('#hrCogBtn'+item.Id).click(function(){
                                 $("#hrduration"+item.Id).select();
                            });

                            if(item.Description){
                                var qtc='<div class="todo-desc">Description: '+item.Description +'</div>';

                                $('#taskdestext'+item.Id).qtip({
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

                            qTipSticky(item.Id);

                            if(item.stickynote){                  
                                
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes_active.png');
                                if(item.notepopup==1)                     
                                    $("#stickynote"+item.Id).trigger('click');
                            
                            }else{
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes.png');
                            }
                            
                            

                            var fpstart = flatpickr("#startDatein"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),

                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'startDatein','duration','task');

                                }
                            });

                            

                            var fpendNew = flatpickr("#endDateinNew"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'endDateinNew','duration','task');
                                    $.ajax({
                                        url: '<?php echo site_url() . "Projects/updateDueDate"; ?>',
                                        type: 'POST',
                                        data: {
                                            parentID: item.HasParentId,
                                            type_id: item.Id,
                                            CreatedBy:item.CreatedBy,
                                            ChangeType:'Task',
                                            DueDate: moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                             //console.log('flatpickr Subtask');
                                             //console.log(res);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            // Some code to debbug e.g.:               
                                            console.log(jqXHR);
                                            console.log(textStatus);
                                            console.log(errorThrown);
                                        }
                                    });
                                }
                            });

                            arr_fpstart.push({"Id":item.Id,"date":fpstart});
                            //arr_fpend.push({"Id":item.Id,"date":fpend});
                            arr_fpend.push({"Id":item.Id,"date":fpendNew});
                        
                            taskDetailStr = "";

                            $("#subTaskcountbtn"+item.Id+"DIV").slideToggle();
                            
                            DrawSubTaskList(item.HasParentId,item.Id,status);
                            

                            SStaskCount++;
                        }
                    }

                    if(i <= 4){
                        if(totalTnTSDate.totalSubTask[i].HasParentId == null){
                        
                            remainTnTS = parseInt(remainTnTS)+1;
                        
                            
                            limitChecking = i;
                            if( moment(item.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                dueCount++;
                                $("#taskInsertDivDue").append(taskDetailStr);
                            }else{
                                $("#taskInsertDiv").append(taskDetailStr);
                            }

                            // var dueColorSOpt = '<option value="[None]">[None]</option>';
                            // for (var ii = 1; ii <= 10; ii++) {
                            //     dueColorSOpt += '<option value="'+ii+'">'+ii+'</option>';
                            // }

                            // $("#duration"+ item.Id ).append(dueColorSOpt);
                            // $("#duration"+ item.Id ).val(dueColorS);
                            // $("#hrduration"+ item.Id ).append(dueColorSOpt);
                            // $("#hrduration"+ item.Id ).val(endcColorS);

                            $(".taskDiv").css('overflow-y','auto');

                            $('[data-toggle="tooltip"]').tooltip(); 

                            if(item.importLevel == 1){
                                $("#readOnlyID"+item.Id).addClass('readOnlyDiv');
                            }

                            if(dueCount > 0){
                                $("#taskInsertDivHolder").show();
                            }else{
                                $("#taskInsertDivHolder").hide();
                            }

                            if(getCookie('completechecking') === item.Id || getCookie('selectedTask') === item.Id ){
                                $('.taskserial'+item.Id).find(".taskRowCus").css('border-left','3px solid #1FEA9C');
                            }

                            if(item.Status == 'canceled'){
                                $("#tasktext"+item.Id).html("<del>"+$("#tasktext"+item.Id).text()+"</del>");
                                $("#tasktext"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'none'){
                                $("#openstatus"+item.Id).css('color','RED');
                                $("#openstatus"+item.Id).text('[none]');
                            }

                            if(item.Status == 'in progress'){
                                $("#openstatus"+item.Id).css('color','BLUE');
                            }

                            if(item.Status == 'completed'){
                                $("#openstatus"+item.Id).css('color','GREEN');
                            }
                            
                            if(item.Status == 'on hold'){
                                $("#openstatus"+item.Id).css('color','RED');
                            }

                            if(item.Status == 'waiting for feedback'){
                                $("#openstatus"+item.Id).css('color','orange');
                                $("#openstatus"+item.Id).css('font-size','11px');
                            }
                            
                            getTagAjaxPro(item.Id,'Task');

                            $("#clickIconlist"+item.Id).click(function(){
                                qtipAssignee(this,item,crm_users,'Task');
                            });

                            $("#clickIconlist"+item.Id).mouseover(function(){
                                qtipAssignHover($(this).find('.onIconClick'),item);
                            });
                            
                            $('#openQtipProperty'+item.Id).click(function(){
                                 taskPropetritesOpen(this,item,'Task');
                            });

                            $('#openstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            });


                            $('#Levopenstatus'+item.Id).click(function(){
                                 qtipStatus(this,item);
                            }); 

                            $('#hrCogBtn'+item.Id).click(function(){
                                 $("#hrduration"+item.Id).select();
                            });

                            $('#choose'+item.Id).click(function(){
                                $(this).siblings('select').css('width', $(this).outerWidth(true)).toggle();
                            });

                            $('#openQtipProperty'+item.Id).trigger("click");
                            $('#openQtipProperty'+item.Id).hide();

                            if(item.Description){
                                var qtc='<div class="todo-desc">Description: '+item.Description +'</div>';

                                $('#taskdestext'+item.Id).qtip({
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

                            qTipSticky(item.Id);

                            if(item.stickynote){                  
                                
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes_active.png');
                                if(item.notepopup==1)                     
                                    $("#stickynote"+item.Id).trigger('click');
                            
                            }else{
                                $("#stickynote"+item.Id).attr('src','asset/icons/Notes.png');
                            }
                            
                            

                            var fpstart = flatpickr("#startDatein"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                maxDate:moment(item.Enddate).format('MMM-DD-YYYY'),

                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'startDatein','duration','task');

                                }
                            });

                            

                            var fpendNew = flatpickr("#endDateinNew"+item.Id, {
                                enableTime: false,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],item.Id,'endDateinNew','duration','task');
                                    $.ajax({
                                        url: '<?php echo site_url() . "Projects/updateDueDate"; ?>',
                                        type: 'POST',
                                        data: {
                                            parentID: item.HasParentId,
                                            type_id: item.Id,
                                            CreatedBy:item.CreatedBy,
                                            ChangeType:'Task',
                                            DueDate: moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                             //console.log('flatpickr Subtask');
                                             //console.log(res);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            // Some code to debbug e.g.:               
                                            console.log(jqXHR);
                                            console.log(textStatus);
                                            console.log(errorThrown);
                                        }
                                    });


                                }
                            });

                            arr_fpstart.push({"Id":item.Id,"date":fpstart});
                            //arr_fpend.push({"Id":item.Id,"date":fpend});
                            arr_fpend.push({"Id":item.Id,"date":fpendNew});
                        
                            taskDetailStr = "";

                            $("#subTaskcountbtn"+item.Id+"DIV").slideToggle();
                            
                            DrawSubTaskList(item.HasParentId,item.Id,status);
                            

                            SStaskCount++;
                        }
                    }
                });

                // console.log("line number limitChecking");
                // console.log(limitChecking);

                if(getCookie('taskid') != ""){
                    $("#iconGray"+getCookie('taskid')).addClass('setActive');
                    $("#iconGreen"+getCookie('taskid')).addClass('setActive');
                     setCookie('taskid',getCookie('taskid'),0);
                }
            }else {
                if(data.allTasklist.length > 0 && data.allTask.length == 0){
                    
                    $("#taskInsertDivHolder").hide();
                    design = '       <span style="width: 68%;float: left;margin-left: 23%;margin-top: 36%;font-size: 19px;color: #cccccc;"> No '+status+' were found.</span>';
                    $("#taskInsertDiv").append(design);

                }else if(data.allTasklist.length == 0 && data.allTask.length == 0){
                    
                    // $("#sorryDiv").show();
                    $("#taskInsertDivHolder").hide();
                    design = '     <img class="taskBellImg" style="width: 19%;margin-left: 32%;margin-top: 17%;" src="<?php echo base_url(); ?>asset/img/bell.png">';  
                    design += '     <a id="open_newpro1" onclick="$(\'#newTaskInput\').focus()" style="position:relative;margin-left: 31%;margin-top: 4%;background: #686868 !important;border: 1px solid;" href="javascript:void(0);" class="btn btn-primary btn-lg taskBellImg">CREATE A TASK</a>';
                    $("#taskInsertDiv").append(design);
                }
            }

            $('[title!=""]').qtip({
                style: {
                    classes: 'qtip qtip-dark qtip-rounded qtip-font qtip-pad  qtip-shadow qtipCustomcolor',
                    width: '150'
                },
                position: {
                    at: 'bottom center',  
                    my: 'top center', 
                    viewport: $(window),
                },
                show: {                 
                    delay: 500,
                    effect: function(offset) {
                        $(this).slideDown(100); // "this" refers to the tooltip
                    }
                }
            });  
        }

        function assignMember(typeID,userID,viewtype){
            $.each(allusers, function (key, value) {

                if(value.ID == userID){
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/tagUserWithStory', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:'2'
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            
                            $("#nonbtn"+typeID).remove();
                            var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                            var matches =value.full_name.match(/\b(\w)/g);
                            var acronym = matches.join(''); 
                            $("#listfortag"+userID+typeID).css('display','block');
                            $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('assignMember', 'unassignMember'));
                            $("#tagBtnDiv"+typeID).append('<a id="tagLiNum'+userID+typeID+'" onmouseenter="qtipTaskByUser(this,'+typeID+','+userID+','+userID+')" title="'+userID+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function unassignMember(typeID,userID,viewtype){
            var parentid = $("#newTaskInput").attr('data-projectid');
            $.each(allusers, function (key, value) {
                        
                if(value.ID == userID){
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/deltagUserWithstory', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            parentid:parentid,
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:'2'
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            //console.log(data);
                            if(data.msg == 'YRNC'){
                                swal("Oops...", "Contact with project creator", "error");
                            }else{
                                var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                                $("#listfortag"+userID+typeID).css('display','none');
                                $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('unassignMember', 'assignMember'));
                                $("#tagLiNum"+userID+typeID).remove();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function assignMemberCO(typeID,userID,viewtype){
            $.each(allusers, function (key, value) {
                        
                if(value.ID == userID){
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/tagUserWithStory', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:'1'
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            
                            var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                            var matches =value.full_name.match(/\b(\w)/g);
                            var acronym = matches.join(''); 
                            
                            $("#listfortag"+userID+typeID).css('display','block');
                            $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('assignMemberCO', 'unassignMemberCO'));

                            $("#tagBtnDivCOADMIN"+typeID).append('<a id="tagLiNum'+userID+typeID+'" onmouseenter="qtipTaskByUser(this,'+typeID+','+userID+','+userID+')" title="'+userID+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle tagAdBtn" style="margin-top: 5%;">'+acronym+'</a>');
                            var qtipAPI = $("#addBtnTag"+typeID).qtip("api");
                            qtipAPI.reposition();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function unassignMemberCO(typeID,userID,viewtype){
            $.each(allusers, function (key, value) {
                        
                if(value.ID == userID){
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/deltagUserWithstory', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:'1'
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            //console.log(data);
                            if(data.msg == 'YRNC'){
                                swal("Oops...", "Contact with project creator", "error");
                            }else{
                                var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                                $("#listfortag"+userID+typeID).css('display','none');
                                $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('unassignMemberCO', 'assignMemberCO'));
                                $("#tagLiNum"+userID+typeID).remove();
                            }

                            var qtipAPI = $("#addBtnTag"+typeID).qtip("api");
                            qtipAPI.reposition();
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function assignTaskMember(targetArea,typeID,userID,viewtype,UserStatus){
            $.each(allusers, function (key, value) {
                        
                if(value.ID == userID){
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/tagUserWithStoryForTask', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:UserStatus
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            if(data.inputdata != 'Fail' ){
                                $("#"+targetArea+"nonbtn"+typeID).remove();
                                var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                                var matches =value.full_name.match(/\b(\w)/g);
                                var acronym = matches.join(''); 
                                
                                $("#listfortag"+userID+typeID).css('display','block');
                                $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('assignTaskMember', 'unassignTaskMember'));

                                $("#"+targetArea+typeID).append('<a id="tagLiNum'+targetArea+userID+typeID+'" onmouseenter="qtipTaskByUser(this,'+typeID+','+userID+','+userID+')" title="'+userID+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle tagAdBtn" style="margin-top: 5%;">'+acronym+'</a>');
                                
                            }else{
                                if(UserStatus == 1){
                                    swal("Oops...", "This user assigned as member, uncheck from member list", "error");
                                }

                                if(UserStatus == 2){
                                    swal("Oops...", "This user assigned as co-owner, uncheck from co-owner list", "error");
                                }
                                
                            }
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function unassignTaskMember(targetArea,typeID,userID,viewtype,UserStatus){
            var parentid = $("#newTaskInput").attr('data-projectid');
            $.each(allusers, function (key, value) {
                        
                if(value.ID == userID){
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/deltagUserWithstory', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {
                            parentid:parentid,
                            projectID:typeID,
                            type:viewtype,
                            tagList:userID,
                            UserStatus:UserStatus
                        }, // Data to pass along with your request
                        success: function(data, status) {
                            // console.log(data);
                            if(data.msg == 'YRNC'){
                                swal("Oops...", "Contact with project creator", "error");
                            }else{
                                var clickval = $("#listfortag"+userID+typeID+"li").attr("onclick");
                                $("#listfortag"+userID+typeID).css('display','none');
                                $("#listfortag"+userID+typeID+"li").attr("onclick", clickval.replace('unassignTaskMember', 'assignTaskMember'));
                                $("#tagLiNum"+targetArea+userID+typeID).remove();
                            }

                            // var qtipAPI = $("#addBtnTag"+targetArea+typeID).qtip("api");
                            // qtipAPI.reposition();
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                        }
                    });
                }
            });
        }

        function userListTask(element,projectID,shareon){
            
            var shareBtnIcon = '';
            if(shareon == '1'){
                shareBtnIcon = 'qtipSharedOnclick';
            }else{
                shareBtnIcon = 'SendInvite';
            }

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

                        $.ajax({
                            url: '<?php echo site_url(); ?>Projects/userListTagHD2',
                            type: 'POST',
                            data: {
                                projectID: projectID
                            },
                            dataType: "JSON",
                            beforeSend: function () {
                                //console.log("Emptying");
                            },
                            success: function (data, textStatus) {
                                //console.log(data);
                                var taskDetailStr = "";
                                var currentTagArr = [];
                                taskDetailStr += '<ul class="qtipUL">'; 
                                taskDetailStr += '<div class="arrow-top-right"></div>';
                                if(data.tag.length>0){
                                    var SC = 0;
                                    var MC = 0;

                                    $.each(data.tag, function (key, value) {
                                        //console.log(data.tag[key].UserStatus);
                                        SC++;
                                        if(SC < 2 && SC > 0 ){
                                            //taskDetailStr += '<li style="background-color: #333;font-size: 12px;" class="dropdown-menu-header">Assign To</li>';
                                            taskDetailStr += '  <div class="clipHead cusClip">SET ASSIGNEE: <i class="fa fa-share-alt hvr-glow clasI open_newpro1 cHover" aria-hidden="true" id="" title="Assign this task to Guest(s)" style="position: absolute; padding-top: 5px; right: 25px; top: 9px; border-color: #ffffff; color: #000000;" onclick="'+shareBtnIcon+'(\'Task\','+projectID+',\'tasktext\');"></i> <i class="fa fa-times-circle cCcloeSS qtipCloseDes"></i></div>';
                                        }

                                        if(jQuery.inArray(data.tag[key].ID, data.taggedList) !== -1){
                                            //if(data.tag[key].ID != data.createBy){
                                                taskDetailStr += '<li onmouseenter="qtipByUser(this,'+projectID+','+data.tag[key].ID+','+projectID+')" id="listfortag'+data.tag[key].ID+projectID+'li" onClick="unassignMember('+projectID+','+data.tag[key].ID+',\'Task\')"><a href="#"><i class="fa fa-check" id="listfortag'+data.tag[key].ID+projectID+'" style="display:block;float: left;"></i> ' + data.tag[key].full_name + '</a></li>';
                                            //}
                                            
                                        }else{
                                            // if(data.tag[key].ID != data.createBy){
                                                taskDetailStr += '<li onmouseenter="qtipByUser(this,'+projectID+','+data.tag[key].ID+','+projectID+')" id="listfortag'+data.tag[key].ID+projectID+'li" onClick="assignMember('+projectID+','+data.tag[key].ID+',\'Task\')"><a href="#"><i class="fa fa-check"  style="display:none;float: left;" id="listfortag'+data.tag[key].ID+projectID+'"></i> ' + data.tag[key].full_name + '</a></li>';
                                            //}
                                        }
                                    });

                                    taskDetailStr += '</ul>';
                                    
                                    api.set('content.text', taskDetailStr);

                                    
                                }else{
                                    
                                    taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
                                    taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
                                    taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
                                    
                                    api.set('content.text', taskDetailStr);
                                    
                                }
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
                    
                    my: 'top left', 
                    at: 'bottom center',  
                    viewport: $(window),
                    adjust: {
                        method: 'none shift'
                    },
                    effect: false
                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
                    width: '200',
                    tip: {
                        width: 3,
                        height: 3,
                        //offset: -220
                    }
                },


            });
        }
        
        function userListTaskCO(element,projectID){
            
            $(element).qtip({
                prerender: true,
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

                        $.ajax({
                            url: '<?php echo site_url(); ?>Projects/userListTagHD2CO',
                            type: 'POST',
                            data: {
                                projectID: projectID
                            },
                            dataType: "JSON",
                            beforeSend: function () {
                                //console.log("Emptying");
                            },
                            success: function (data, textStatus) {
                                //console.log("Line number 11349");
                                //console.log(data);
                                var taskDetailStr = "";
                                var currentTagArr = [];
                                taskDetailStr += '<ul class="qtipUL">'; 
                                taskDetailStr += '<div class="arrow-top-right"></div>';



                                if(data.tag.length>0){
                                    var SC = 0;
                                    var MC = 0;

                                    $.each(data.tag, function (key, value) {
                                        //console.log(data.tag[key].UserStatus);
                                        SC++;
                                        if(SC < 2 && SC > 0 ){
                                            //taskDetailStr += '<li style="background-color: #333;font-size: 12px;" class="dropdown-menu-header">Assign To</li>';
                                            taskDetailStr += '  <div class="clipHead cusClip">SET CO-OWNER:</div>';
                                        }

                                        if(jQuery.inArray(data.tag[key].ID, data.taggedList) !== -1){
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="unassignMemberCO('+projectID+','+data.tag[key].ID+',\'Project\')"><a href="#"><i class="fa fa-check" id="listfortag'+data.tag[key].ID+projectID+'" style="display:block;float: left;"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }else{
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="assignMemberCO('+projectID+','+data.tag[key].ID+',\'Project\')"><a href="#"><i class="fa fa-check"  style="display:none;float: left;" id="listfortag'+data.tag[key].ID+projectID+'"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }
                                    });

                                    taskDetailStr += '</ul>';
                                    
                                    api.set('content.text', taskDetailStr);

                                    
                                }else{
                                    
                                    taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
                                    taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
                                    taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
                                    
                                    api.set('content.text', taskDetailStr);
                                    
                                }
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
                    
                    my: 'top left', 
                    at: 'bottom center',  
                    viewport: $(window),
                    adjust: {
                        method: 'none shift'
                    },
                    effect: false
                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
                    width: '250',
                    tip: {
                        width: 3,
                        height: 3,
                        //offset: -220
                    }
                },
            });
        }

        function TaskUserList(targetID,element,projectID,UserStatus){
            
            $(element).qtip({
                prerender: true,
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

                        $.ajax({
                            url: '<?php echo site_url(); ?>Projects/SpecificUserist',
                            type: 'POST',
                            data: {
                                projectID: projectID,
                                UserStatus: UserStatus,
                            },
                            dataType: "JSON",
                            beforeSend: function () {
                                //console.log("Emptying");
                            },
                            success: function (data, textStatus) {
                                var taskDetailStr = "";
                                var currentTagArr = [];
                                taskDetailStr += '<ul class="qtipUL">'; 
                                taskDetailStr += '<div class="arrow-top-right"></div>';



                                if(data.tag.length>0){
                                    var SC = 0;
                                    var MC = 0;

                                    $.each(data.tag, function (key, value) {
                                        SC++;
                                        if(SC < 2 && SC > 0 ){
                                            //taskDetailStr += '<li style="background-color: #333;font-size: 12px;" class="dropdown-menu-header">Assign To</li>';
                                            taskDetailStr += '  <div class="clipHead cusClip">SET CO-OWNER:</div>';
                                        }

                                        if(jQuery.inArray(data.tag[key].ID, data.taggedList) !== -1){
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="unassignTaskMember(\''+targetID+'\','+projectID+','+data.tag[key].ID+',\'Task\','+UserStatus+')"><a href="#"><i class="fa fa-check" id="listfortag'+data.tag[key].ID+projectID+'" style="display:block;float: left;"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }else{
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="assignTaskMember(\''+targetID+'\','+projectID+','+data.tag[key].ID+',\'Task\','+UserStatus+')"><a href="#"><i class="fa fa-check"  style="display:none;float: left;" id="listfortag'+data.tag[key].ID+projectID+'"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }

                                        

                                    });

                                    taskDetailStr += '</ul>';
                                    
                                    api.set('content.text', taskDetailStr);
                                }else{
                                    
                                    taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
                                    taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
                                    taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
                                    
                                    api.set('content.text', taskDetailStr);
                                    
                                }




                                
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
                    
                    my: 'top left', 
                    at: 'bottom center',  
                    viewport: $(window),
                    adjust: {
                        method: 'none shift'
                    },
                    effect: false
                      

                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
                    width: '250',
                    tip: {
                        width: 3,
                        height: 3,
                        //offset: -220
                    }
                },


            });
        }

        function userListTaskMM(element,projectID){
            
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

                        $.ajax({
                            url: '<?php echo site_url(); ?>Projects/userListTagHD2',
                            type: 'POST',
                            data: {
                                projectID: projectID
                            },
                            dataType: "JSON",
                            beforeSend: function () {
                                //console.log("Emptying");
                            },
                            success: function (data, textStatus) {
                                //console.log(data);
                                var taskDetailStr = "";
                                var currentTagArr = [];
                                taskDetailStr += '<ul class="qtipUL">'; 
                                taskDetailStr += '<div class="arrow-top-right"></div>';



                                if(data.tag.length>0){
                                    var SC = 0;
                                    var MC = 0;

                                    $.each(data.tag, function (key, value) {
                                        //console.log(data.tag[key].UserStatus);
                                        SC++;
                                        if(SC < 2 && SC > 0 ){
                                            taskDetailStr += '  <div class="clipHead cusClip">SET MEMBERS:</div>';
                                        }

                                        if(jQuery.inArray(data.tag[key].ID, data.taggedList) !== -1){
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="unassignMember('+projectID+','+data.tag[key].ID+',\'Task\')"><a href="#"><i class="fa fa-check" id="listfortag'+data.tag[key].ID+projectID+'" style="display:block;float: left;"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }else{
                                            taskDetailStr += '<li id="listfortag'+data.tag[key].ID+projectID+'li" onClick="assignMember('+projectID+','+data.tag[key].ID+',\'Task\')"><a href="#"><i class="fa fa-check"  style="display:none;float: left;" id="listfortag'+data.tag[key].ID+projectID+'"></i> ' + data.tag[key].full_name + '</a></li>';
                                        }

                                        

                                    });

                                    taskDetailStr += '</ul>';
                                    
                                    api.set('content.text', taskDetailStr);

                                    
                                }else{
                                    
                                    taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
                                    taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
                                    taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
                                    
                                    api.set('content.text', taskDetailStr);
                                    
                                }


                                
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
                    
                    my: 'top left', 
                    at: 'bottom center',  
                    viewport: $(window),
                    adjust: {
                        method: 'none shift'
                    },
                    effect: false
                      

                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
                    width: '250',
                    tip: {
                        width: 3,
                        height: 3,
                        //offset: -220
                    }
                },


            });
        }

        $("#open_newpro1").click(function() {
                
            $("#new_project_name").val("");
            $("#brief_note_new").val("");
            $('#DescShow').hide();
            $('#openNewProject_s1').modal('show');
        });

        $("#calculator").click(function() {
            $('#calculatorModal').modal('show');
            //$('#openNewProject_s2').modal('hide');
        });

        $("#DesClick2").on('click', function(){
            // console.log($("#DescShow").is(":visible"))
            $("#DescShow").slideToggle();
            $(this).find('span').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top')
        });

        $( "#open_newpro2" ).click(function() {
            createPro();
        });
        
        $( ".newpro_close" ).click(function() {
            $('#openNewProject_s2').modal('hide');
        });

        function qtipStatusProject(element,data){
            if($(element).qtip('api') == undefined){
            var todo_serial=data.Id;
            var qhtml=  '<li class="workspace4" style="display:inline">'
            +'<ul class="keep-open">'
            +       '   <li class="dropdown-menu-header" id="liList'+todo_serial+'">Status:</li>';
            
            $.each(allprojectstatus,function(i,v){
                qhtml+='<li data-status="'+v.projectstatus+'" onclick="change_projectstatus(\'' + v.projectstatus + '\','+todo_serial+',this)" class="li-status '+(data.Status==v.projectstatus ? 'active' : '')+'"><div> '+v.projectstatus+'</div></li>';
            });
            
            qhtml+=     '</ul>';
            qhtml+='<ul><li onclick="create_projectstatus('+todo_serial+')"><div> Add New <img style="cursor: pointer;margin-left: 1%;margin-top: -1%;width: 20px;height: 20px;background: #928f8f !important;" src="http://172.16.0.64/nclive/asset/img/icons/Add Project.png"> </div></li></ul>';
            qhtml+='</li>';
            
            $(element).qtip({
                
                show: {
                    //event: 'click',
                    ready:true,
                    solo: true,
                },
                hide: 'unfocus click',
                
                content: {text: qhtml },
                
                position: {
                    at: 'bottom center',  
                    my: 'top center', 
                    viewport: $(window),
                    // adjust: {
                    //  mouse: true,
                    //  scroll: true
                    // }
                    
                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font',
                    width: '300'
                },
                
                events: {
                    hide: function (event, api) {
                        $(this).qtip('destroy');
                        $( 'body').unbind( "keydown.qtipStatus" );
                    },
                    show: function(event, api) {
                        var serial=($(api.elements.target).attr('data-serial'));
                    },
                    render:function(event,api){
                        $('body').on('keydown.qtipStatus', function(event) {
                            if(event.keyCode === 27) {
                                api.hide(event);
                            }
                        });
                    }
                    
                }
            });
            }
        }

        function change_TaskStatus(status,serial,el){
            var requestass = $.ajax({
                url: base_url+"todo/updateTodoStatusHD",
                method: 'POST',
                data: {
                    "serial":serial,
                    "status":status
                    
                },
                //dataType: 'JSON'
            });
            
            requestass.done(function(response){
                
                setCookie('selectedTask',serial,1);

                if(status=='completed'){
                    $('.todoRow'+serial).find('.chk-complete').iCheck('check');
                    $('#iconGray'+serial).hide();
                    $('#iconGreen'+serial).show();
                
                }else if(status=='canceled'){
                    $("#subtasktitle"+serial).html("<del>"+$("#subtasktitle"+serial).text()+"</del>");
                    $("#tasktext"+serial).html("<del>"+$("#tasktext"+serial).text()+"</del>");
                    $("#tasktext"+serial).css('color','RED');
                    $("#subtasktitle"+serial).css('color','RED');
                    $('#iconGray'+serial).show();
                    $('#iconGreen'+serial).hide();
                
                }else{

                    $("#subtasktitle"+serial).html($("#subtasktitle"+serial).text());
                    $("#tasktext"+serial).html($("#tasktext"+serial).text());
                    $("#tasktext"+serial).css('color','#0c0404');
                    $("#subtasktitle"+serial).css('color','#0c0404');
                    $('.todoRow'+serial).find('.chk-complete').iCheck('uncheck');
                    $('#iconGray'+serial).show();
                    $('#iconGreen'+serial).hide();
                }

                if(status == 'none'){
                    $("#taskStatusLi"+serial).css('color','RED');
                    $("#openstatus"+serial).css('color','RED');
                    $("#openstatus"+serial).text('[none]');
                }else if(status == 'in progress'){
                    $("#taskStatusLi"+serial).css('color','BLUE');
                    $("#openstatus"+serial).css('color','BLUE');
                }else if(status == 'completed'){
                    $("#taskStatusLi"+serial).css('color','GREEN');
                    $("#openstatus"+serial).css('color','GREEN');
                }else if(status == 'on hold'){
                    $("#taskStatusLi"+serial).css('color','RED');
                    $("#openstatus"+serial).css('color','RED');
                }else if(status == 'waiting for feedback'){
                    $("#taskStatusLi"+serial).css('color','ORANGE');
                    $("#openstatus"+serial).css('color','ORANGE');
                    $("#openstatus"+serial).css('font-size','11px');
                }else if(status == 'canceled'){
                    $("#taskStatusLi"+serial).css('color','RED');
                    $("#openstatus"+serial).css('color','RED');
                }else{
                    $("#taskStatusLi"+serial).css('color','#6EA7F2');
                    $("#openstatus"+serial).css('color','#6EA7F2');
                }

                $('.taskStatusLi'+serial).html(status).attr('data-status',status);
                $("#taskStatusLi"+serial).text(status).attr('data-status',status);
                $('.link_status_text'+serial).html(status).attr('data-status',status);
                $("#openstatus"+serial).text(status).attr('data-status',status);
                $(el).closest('.qtip-content').find('.li-status').removeClass('active');
                $(el).addClass('active');
                
                
            });
        }

        function qtipCustomStatus(element,todo_serial,status){

            if($(element).qtip('api') == undefined){
                var color;
                var qhtml=  '<li class="workspace4" style="display:inline">'
                +'<ul class="keep-open" id="ListstatusInput'+todo_serial+'">';
                
                $.each(allprojectstatus,function(i,v){
                    
                    if(v.projectstatus == 'canceled'){
                         color ='RED';
                    }

                    if(v.projectstatus == 'none'){
                        color ='RED';
                    }

                    if(v.projectstatus == 'in progress'){
                        color ='BLUE';
                    }

                    if(v.projectstatus == 'completed'){
                        color ='GREEN';
                    }
                    
                    if(v.projectstatus == 'on hold'){
                        color ='RED';
                    }

                    if(v.projectstatus == 'waiting for feedback'){
                        color ='orange';
                    }
                    qhtml+='<li data-status="'+v.projectstatus+'" onclick="change_TaskStatus(\'' + v.projectstatus + '\','+todo_serial+',this)" class="li-status '+(status==v.projectstatus ? 'active' : '')+'"><div class="deleteStatus" style="color:'+color+'"> '+v.projectstatus+'</div></li>';
                    
                });
                // 
                if(thisprojectstatus.length > 0){
                    $.each(thisprojectstatus,function(i,v){
                        var res = v.projectstatus.split(" ");
                        
                        qhtml+='<li id="StatusList'+res[0]+todo_serial+'" class="li-status '+(status==v.projectstatus ? 'active' : '')+'"><div class="deleteStatus" style="color:#6EA7F2;" data-status="'+v.projectstatus+'" onclick="change_TaskStatus(\'' + v.projectstatus + '\','+todo_serial+',this)"> '+v.projectstatus+'</div><i class="fa fa-trash" style="float:right;color:#6d6a69;margin-top: -19px;margin-right: 5px;" onclick="deleteStatus(this,'+todo_serial+',\''+v.projectstatus+'\')"></i></li>';
                    });
                }
                
                
                qhtml+=     '</ul>';
                qhtml+='<ul class="statusAdd"><li><div class="addnewstatus" onclick="create_projectstatus('+todo_serial+')"> Add New <img style="cursor: pointer;margin-left: 1%;margin-top: -4%;width: 20px;height: 20px;background: #e7e7e7 !important;" src="http://172.16.0.64/nclive/asset/img/icons/Add Project.png"> </div><input type="text" placeholder="Type Here" class="statusInput" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type Here\'" id="statusInput'+todo_serial+'"/></li></ul>';
                qhtml+='</li>';
                
                $(element).qtip({
                    
                    show: {
                        //event: 'click',
                        ready:true,
                        solo: false,
                    },
                    hide: 'unfocus click',
                    
                    content: {
                        text: qhtml
                    },
                    
                    position: {
                        at: 'bottom center',  
                        my: 'top center', 
                        viewport: $(window),
                        adjust: {
                                method: 'none shift'
                            },
                        
                    },
                    style: {
                        classes: 'qtip-light qtip-rounded qtip-font customStyle',
                        width: '190',
                        tip: {
                            offset: 10
                        }
                    },
                    
                    events: {
                        hide: function (event, api) {
                            
                            $(this).qtip('destroy');
                            $( 'body').unbind( "keydown.qtipStatus" );
                            
                        },
                        show: function(event, api) {
                            //console.log($(this));console.log(event);console.log(api);
                            
                            var serial=($(api.elements.target).attr('data-serial'));
                            
                            if($('.todoRow'+serial).find('.chk-complete').is(':checked')){
                                $(api.elements.content).find('.li-status').removeClass('active');
                                $(api.elements.content).find('.li-status[data-status="completed"]').addClass('active');
                            }else{
                                var oldstatus=$('.link_status_text'+serial).attr('data-status');
                                $(api.elements.content).find('.li-status').removeClass('active');
                                $(api.elements.content).find('.li-status[data-status="'+oldstatus+'"]').addClass('active');
                            }
                            
                        },
                        render:function(event,api){
                            $('body').on('keydown.qtipStatus', function(event) {
                                if(event.keyCode === 27) {
                                    api.hide(event);
                                }
                            });
                        }
                        
                        
                    }
                });
            }
        }
        
        var asd = 1;
        function getDurationhr(id,value,type){
            
            var valu = parseInt( $("#"+id).val());
            var date = $("#"+type+value).val();
            
            //console.log(valu);
            if(valu != NaN){
               
                $.ajax({
                    url: '<?php echo site_url(); ?>Projects/updateTaskhr',
                    type: 'POST',
                    data: {
                     taskID:value,
                     valu:valu,
                     type:type
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    $("#hideMSpanduration"+value).hide();
                    $('.backDivPro').remove();
                    if(data_st.msg != 'TIMELESS'){
                        var proid = $("#newTaskInput").attr('data-projectid');
                        setCookie('selectedTask',taskId,1);
                        $("#hrduration"+taskId).css('color','#808080');
                        //fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All'); 
                    }else{

                        if(type == 'task'){
                            var ttype = "Task hour cannot be smaller then total Subtask hour";
                        }

                        if(type == 'subtask'){
                            ttype = "Total subtask hour cannot be greater then task hour.please contact with your admin";
                        }

                        swal("Oops...", ttype, "error");
                        fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
                    }


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

            }else{
                 swal(
                  'Oops...',
                  'Your are tying without hour value',
                  'error'
                )
            }
            
            
        }

        function getDuration(id,value,type){
            

            var valu = parseInt( $("#"+id).val());
            var date = $("#"+type+value).val();
            
            // console.log(valu);
            
            if(valu != NaN){
               
                var newdate = moment(date).format('MM/DD/YYYY');
                var dateOne = new Date(newdate);
                var newdateOne = new Date(dateOne);
                 
                newdateOne.setDate(newdateOne.getDate() + valu);
                
                var dd = newdateOne.getDate();
                var mm = newdateOne.getMonth()+1;
                var y = newdateOne.getFullYear();

                var someFormattedDate = mm + '/' + dd + '/' + y;
                
                if(type == 'SubstartDatein'){
                    document.getElementById('SubendDateinNew'+value).value = moment(someFormattedDate).format('MMM DD YYYY');
                }else{
                    document.getElementById('endDateinNew'+value).value = moment(someFormattedDate).format('MMM DD YYYY');
                }
                
                thisValue(date,value,type,'duration','task');
                $('.backDivPro').remove();
            }else{
                 swal(
                  'Oops...',
                  'Your are tying without duration',
                  'error'
                )
            }
        }

        function openInput(value){
            
            $(".sendForSaveSubTask").hide('slow');
            
            $("#subtaskinid").val(value);
            
            var totaltask = 0;
            
            $.each(subtaskList, function (key, va) {
                if(parseInt(va.TI) === parseInt(value)){
                    totaltask = va.TT;
                }
            });
            //console.log(totaltask);

            if($("#newsubTaskInput"+value).is(':visible') && totaltask == 0){
                $("#subTaskInputDiv"+value).hide('slow');
                $("#newsubTaskInput"+value).hide('slow');
                $("#subTaskcountbtn"+value+"DIV").hide('slow');
            }else if($("#newsubTaskInput"+value).is(':visible') && totaltask > 0){
                $("#subTaskInputDiv"+value).hide('slow');
                $("#newsubTaskInput"+value).hide('slow');
            }else{
                $("#subTaskInputDiv"+value).show();
                $("#newsubTaskInput"+value).show();
                $("#subTaskcountbtn"+value+"DIV").show();

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
            var description = '';
            
            if(startDate == ""){
                startDate = moment(new Date()).format('Y-mm-dd HH:mm:ss');
            }

            if(endDate == ""){
                endDate = moment(new Date()).format('Y-mm-dd HH:mm:ss');
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

            if($("#brief_note_new").val() != ''){
               description =  $("#brief_note_new").val();
            }else{
                description = '';
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
                        setCookie('project',data.prioTask,1);
                        var uA = '';    
                        var uc = '';
                        
                        $("#myProjectDiv").html("");
                        $("#sharedProject").html("");
                        $("#myProjectImported").html("");
                        getAllProject();
                        $("#newTaskInput").focus();
                        $("#newProjectForm").trigger("reset");
                        $('#openNewProject_s1').modal('hide');
                        $("#project-chat").prepend('<a onclick="startChat(this)" id="leftProjectList'+data.prioTask+'" href="#" class="procon usr guser'+data.prioTask+' contacts"' 
                            +'data-chat-page="projects"'
                            +'data-chat-id="cha'+data.prioTask+'" '
                            +'data-chat-dname="'+pName+'" '
                            +'data-chat-email="'+data.prioTask+'" '
                            +'data-chat-mobile="000"'
                            +'data-chat-img="group_message.png" '
                            +'data-chat-status="online" '
                            +'data-chat-alertshow="false"> '
                            +'<i class="fa fa-circle-thin"></i> '+pName+' <span id="newMsg_'+data.prioTask+'"></span>'
                        +'</a>');


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

        $("#search-fld").on('keydown', function (e) {
                //var todo_name = $(this).val();
                //var _this=this;
                 var task_name = $(this).val();
                if (e.keyCode == 13) {
                    //if($("#search-fld").hasClass('todo')){
                
                    searchTask(task_name);

                //}
                }
            });

        $(document).on('keypress', '#newTaskInput', function (e, isScriptInvoked) {

            var projectId;
            var taskDetailStr = "";
            var item = "0000000000";
            var days = 0;
            var task_name = $(this).val();
            
            if (isScriptInvoked === true) {
                //alert("Ok if");
            } else {
                if (e.keyCode == 13) {
                    if($("#newTaskInput").hasClass('todo-searchmode')){
                        
                        searchTask(task_name);
                        

                    }else{
                       //console.log($("#newTaskInput").val());
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
                                    
                                    taskDetailStr = '<div ondrop="drop(event)" ondragover="allowDrop(event)"  data-serial="'+data.taskInsertID+'" class="taskRow taskRowCus taskRow0604 bottom-border taskDetailDive taskserial'+data.taskInsertID+'  dt-todostatus" dt-sta="none" style="float: left;width:100%;border-left: 5px solid #ffffff;margin-bottom: -2px;">';
                                    //icon Div Start
                                    taskDetailStr += '    <div style="width:100%;float:left;"  class="TtaskRow" id="readOnlyID'+data.taskInsertID+'">';
                                    taskDetailStr += '      <div style="width:5%;float:left;">';
                                    taskDetailStr += '          <i class="fa fa-check iconGray"  onClick="makeComplete(' + data.taskInsertID + ',\'none\',\'Task\');" id="iconGray' + data.taskInsertID + '" style="display:block;" ></i>';
                                    taskDetailStr += '          <i class="fa fa-check iconGreen" onClick="makeComplete(' + data.taskInsertID + ',\'none\',\'Task\');" id="iconGreen' + data.taskInsertID + '" style="display:none;" ></i>'; 
                                    taskDetailStr += '      </div>';
                                    //Main Div Start
                                    taskDetailStr += '      <div style="width:86%;float:left;">';
                                    //Main Div Upper Start
                                    taskDetailStr += '          <div class="slineSS" style="width: 92%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">';
                                    taskDetailStr += '              <span data-serial="' + data.taskInsertID + '" id="tasktext' + data.taskInsertID + '" class="form proName clickontitle tnstitle">' + $("#newTaskInput").val() + '</span>';
                                    taskDetailStr += '          </div>';
                                    //Main Div Lower Start
                                    taskDetailStr += '          <div style="width:100%;height: 25px;margin-top: 7px;margin-bottom: 7px;">';
                                    //Main Div Due By POPUP Start
                                    taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Start: <span><input onclick="togglecalendar_startPro(' + data.taskInsertID + ')" data-c = "1" type="text" id="startDatein' + data.taskInsertID + '" name="mydate" style="color:RED;" class="datepicker customdate" data-dateformat="M d yy"  value="[No due date]"></span></span></span>|';
                                    taskDetailStr += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span >Due by: <span style="color:RED"><input onclick="togglecalendar_endPro(' + data.taskInsertID + ')" type="text" id="endDateinNew' + data.taskInsertID + '" style="color:RED;" name="mydate" class="datepicker taskDate customdate " data-dateformat="M d yy" value="[No due date]"></span></span></span>|';
                                    taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle pointer" aria-hidden="true" id="hrCogBtn'+data.taskInsertID+'" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan"> Duration: <input type="text" style="color:RED;width:5%;" class="duarationClass duSInput" onchange="getDuration($(this).data(\'id\'),' + data.taskInsertID + ',\'startDatein\')" data-id="duration' + data.taskInsertID + '" id="duration' + data.taskInsertID + '" value="[None]"></span></span>|';
                                    taskDetailStr += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle pointer" aria-hidden="true" id="hrCogBtn'+data.taskInsertID+'" style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan"> Req Hour: <input type="text" style="color:RED;width: 5%;font-size: 12px !important;" class="duarationClass duSInput hrCogBtn'+data.taskInsertID+'" onchange="getDurationhr($(this).data(\'id\'),' + data.taskInsertID + ',\'task\')" data-id="hrduration' + data.taskInsertID + '" id="hrduration' + data.taskInsertID + '" value="[None]"></span></span>|';
                                    taskDetailStr += '              <span style="z-index: 100;position: relative;" class="duSpan" ><span clas="link_status_text'+data.taskInsertID+'  dt-todostatus" id="Levopenstatus'+data.taskInsertID+'" data-type="Task" data-serial="'+data.taskInsertID+'" data-status="none" > Status:  </span> <span  class="link_status_text'+data.taskInsertID+'  dt-todostatus deleteStatus" id="openstatus'+data.taskInsertID+'" data-type="Task" data-serial="'+data.taskInsertID+'" data-status="none" style="color:RED;" >[None]</span> </span>|<span onClick="userListTask(this,' + data.taskInsertID + ')"  class="duSpan"><i class="fa fa-user" aria-hidden="true" style="font-size: 15px;margin-right: 5px;margin-top: 3px;"></i> <span style="margin-top: -3px;position: relative;margin-left: 0%;" class="taskTagBtnDiv" id="tagBtnDiv'+data.taskInsertID+'"></span> </span>';
                                    //taskDetailStr += '              | <span style="z-index: 100;position: relative;"  id="subTaskcountbtn' + data.taskInsertID + '" class="duSpan subTaskcountbtn"><span><i class="fa fa-indent" aria-hidden="true"></i> </span><span id="subTaskcountbtnValue' + data.taskInsertID + '" style="padding-right: 7px;"></span></span>';
                                    taskDetailStr += '          </div>';
                                    taskDetailStr += '      </div>';
                                    taskDetailStr += '      <div style="width:9%;float:left;margin-top: 1%;">';
                                    taskDetailStr += '          <span class=""><i style="margin-right: 18px; margin-left: -27px;border-color: #ffffff;color: #ffffff;" class="fa fa-plus hvr-glow clasI cHover open_newpro1" aria-hidden="true" id="projectbtn" title="Create Subtask" onclick="openInput('+data.taskInsertID+')"></i><i class="fa fa-share-alt hvr-glow clasI open_newpro1 cHover" aria-hidden="true" id="" title="Share This Task" style="position: relative;left: 0px;border-color: #ffffff;color: #ffffff;" onclick="SendInvite(\'Task\','+data.taskInsertID+',\'tasktext\');"></i></span><i class="fa fa-ellipsis-h hvr-glow clasI cHover" id="openQtipProperty' + data.taskInsertID + '" style="position: relative;margin-top: 1%; right: -25%;border-color: #ffffff;color: #ffffff;"></i>';
                                    taskDetailStr += '      </div>';
                                    taskDetailStr += '    </div>';
                                    taskDetailStr += '    <div style="width:100%;float:left;">';
                                    taskDetailStr += '      <div class="subTaskListDiv" id="subTaskcountbtn' + data.taskInsertID + 'DIV">';
                                    taskDetailStr += '          <div class="row margin-topdown" id="subTaskInputDiv'+data.taskInsertID+'" style="display:none;">';
                                    taskDetailStr += '              <div class="col-lg-8 col-sm-8 col-md-8">';
                                    taskDetailStr += '                  <input type="text" id="newsubTaskInput'+data.taskInsertID+'" data-taskid="'+data.taskInsertID+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
                                    taskDetailStr += '              </div>';
                                    taskDetailStr += '          </div>';
                                    taskDetailStr += '          <div id="subtaskInsertDiv' + data.taskInsertID + '">';
                                    taskDetailStr += '          </div>';
                                    taskDetailStr += '      </div>';
                                    taskDetailStr += '    </div>';
                                    taskDetailStr += '</div>';
                                    
                                    $(".taskBellImg").remove();
                                    
                                    $("#taskInsertDiv").prepend(taskDetailStr);
                                   
                                    getTagAjaxPro(data.taskInsertID,'Task');

                                    $("#newTaskInput").val('');

                                    $('#openstatus'+data.taskInsertID).click(function(){
                                         qtipStatus(this,data);
                                    });


                                    $('#Levopenstatus'+data.taskInsertID).click(function(){
                                         qtipStatus(this,data);
                                    });

                                    $('#openQtipProperty'+data.taskInsertID).click(function(){
                                         taskPropetritesOpen(this,data,'Task');

                                    });

                                    var fpstart = flatpickr("#startDatein"+data.taskInsertID, {
                                        enableTime: false,
                                        dateFormat: 'M-d-Y',
                                        clickOpens:false,
                                        onChange: function(selectedDates, dateStr, instance) {
                                            thisValue(selectedDates[0],data.taskInsertID,'startDatein','duration','task');

                                        }
                                    });

                                    

                                    var fpendNew = flatpickr("#endDateinNew"+data.taskInsertID, {
                                        enableTime: false,
                                        dateFormat: 'M-d-Y',
                                        clickOpens:false,
                                        onChange: function(selectedDates, dateStr, instance) {
                                            thisValue(selectedDates[0],data.taskInsertID,'endDateinNew','duration','task');

                                            // $.ajax({
                                            //     url: '<?php echo site_url() . "Projects/updateDueDate"; ?>',
                                            //     type: 'POST',
                                            //     data: {
                                            //         parentID: item.HasParentId,
                                            //         type_id: item.Id,
                                            //         CreatedBy:item.CreatedBy,
                                            //         ChangeType:'Task',
                                            //         DueDate: moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
                                            //     },
                                            //     dataType: "json",
                                            //     success: function (res) {
                                            //          //console.log('flatpickr Subtask');
                                            //          //console.log(res);
                                            //     },
                                            //     error: function (jqXHR, textStatus, errorThrown) {
                                            //         // Some code to debbug e.g.:               
                                            //         console.log(jqXHR);
                                            //         console.log(textStatus);
                                            //         console.log(errorThrown);
                                            //     }
                                            // });
                                        }
                                    });

                                    arr_fpstart.push({"Id":data.taskInsertID,"date":fpstart});
                                    //arr_fpend.push({"Id":item.Id,"date":fpend});
                                    arr_fpend.push({"Id":data.taskInsertID,"date":fpendNew});

                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    // Some code to debbug e.g.:               
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        } else {
                            swal("Oops...", "Something went wrong", "error");
                        }
                
                    }
                }
            }
        });

        function qtipSharedList(element,data){

            if($(element).qtip('api') == undefined){
                var todo_serial = data.Id;
                var color;
                

                var qhtml=  '<li class="workspace4" style="display:inline">'
                +'<ul class="keep-open" id="ListstatusInput'+todo_serial+'">';
                qhtml+='<li class="li-status"><div class="clipHead cusClip">SET STATUS:<i class="fa fa-times-circle cCcloeSS qtipCloseDes" ></i></div></li>';
                $.each(allprojectstatus,function(i,v){
                    
                    qhtml+='<li data-status="'+v.projectstatus+'" onclick="change_projectstatus(\'' + v.projectstatus + '\','+todo_serial+',this)" class="li-status '+(data.Status==v.projectstatus ? 'active' : '')+'"><div class="deleteStatus" style="color:'+color+'"> '+v.projectstatus+'</div></li>';
                    
                });
                
                qhtml+=     '</ul>';
                qhtml+='<ul class="statusAdd"><li><div class="addnewstatus" onclick="create_projectstatus('+todo_serial+')"> Add New <img style="cursor: pointer;margin-left: 1%;margin-top: -4%;width: 20px;height: 20px;background: #e7e7e7 !important;" src="http://172.16.0.64/nclive/asset/img/icons/Add Project.png"> </div><input type="text" placeholder="Type Here" class="statusInput" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type Here\'" id="statusInput'+todo_serial+'"/></li></ul>';
                qhtml+='</li>';
                
                $(element).qtip({
                    
                    show: {
                        ready:true,
                        solo: true,
                    },
                    hide: 'unfocus click',
                    
                    content: {
                        text: qhtml
                    },
                    
                    position: {
                        at: 'bottom center',  
                        my: 'top left', 
                        viewport: $(window),
                        adjust: {
                                method: 'none shift'
                            },
                        
                    },
                    style: {
                        classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
                        width: '250',
                        tip: {
                            width: 3,
                            height: 3,
                            //offset: -220
                        }
                    },
                    
                    events: {
                        hide: function (event, api) {
                            
                            $(this).qtip('destroy');
                            $( 'body').unbind( "keydown.qtipStatus" );
                            
                        },
                        show: function(event, api) {
                            var serial=($(api.elements.target).attr('data-serial'));
                            
                            if($('.todoRow'+serial).find('.chk-complete').is(':checked')){
                                $(api.elements.content).find('.li-status').removeClass('active');
                                $(api.elements.content).find('.li-status[data-status="completed"]').addClass('active');
                            }else{
                                var oldstatus=$('.link_status_text'+serial).attr('data-status');
                                $(api.elements.content).find('.li-status').removeClass('active');
                                $(api.elements.content).find('.li-status[data-status="'+oldstatus+'"]').addClass('active');
                            }
                            
                        },
                        render:function(event,api){
                            $('body').on('keydown.qtipStatus', function(event) {
                                if(event.keyCode === 27) {
                                    api.hide(event);
                                }
                            });
                        }
                        
                        
                    }
                });
            }
        }
        
        function makeComplete(taskID,status,type){
            if(status == 'completed'){
                //create clone from existing element
                
                swal({
                    title: 'This is Completed',
                    text: "Would you want to change its status?",
                    type: 'warning',
                    input: 'select',
                    inputOptions: {
                        'none': 'None',
                        'in progress': 'In Progress',
                        'waiting for feedback': 'Waiting For Feedback',
                        'on hold': 'On Hold'
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
                if(type == 'Task'){
                    var check_no = $("#subtaskInsertDiv"+taskID).find('.incomplete').length;
                                
                    if(check_no > 0){
                        swal({
                          title: "Are you sure?",
                          text: "Sub tasks are not completed. Would you want to complete all Sub task ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, Complete it!"
                        }).then(function (result) {
                            completeAllSub(taskID);
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
                }else{
                    swal({
                      title: "Are you sure?",
                      text: "Would you complete this task?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes, Complete it!"
                    }).then(function (result) {
                        //console.log(taskID);
                        completePro(taskID);
                    })
                }

                
            }
            
        }

        function makeCompleteWS(taskID,status,type){
            if(status == 'completed'){
                //create clone from existing element
                
                swal({
                    title: 'This is Completed',
                    text: "Would you want to change its status?",
                    type: 'warning',
                    input: 'select',
                    inputOptions: {
                        'none': 'None',
                        'in progress': 'In Progress',
                        'waiting for feedback': 'Waiting For Feedback',
                        'on hold': 'On Hold'
                    },
                    inputPlaceholder: 'Please Select',
                    showCancelButton: true,
                    inputValidator: function (value) {
                        return new Promise(function (resolve, reject) {
                          resolve(value);
                        })
                    }
                }).then(function (result) {
                  gotItWS(taskID,result);
                })

            }else{
                if(type == 'Task'){
                    var check_no = $("#subtaskInsertDiv"+taskID).find('.incomplete').length;
                                
                    if(check_no > 0){
                        swal({
                          title: "Are you sure?",
                          text: "Sub tasks are not completed. Would you want to complete all Sub task ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, Complete it!"
                        }).then(function (result) {
                            completeAllSub(taskID);
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
                            completeProWS(taskID);
                        })
                    }
                }else{
                    swal({
                      title: "Are you sure?",
                      text: "Would you complete this task?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes, Complete it!"
                    }).then(function (result) {
                        //console.log(taskID);
                        completeProWS(taskID);
                    })
                }

                
            }
            
        }

        function completeProWS(projectID){
            $.ajax({
                url: '<?php echo site_url() . "Projects/TaskMakeCompleteWS"; ?>',
                type: 'POST',
                data: {tid: projectID,type:'completed'},
                dataType: "json",
                beforeSend: function () {
                    setCookie('completechecking',0,0);
                },
                success: function (res) {
                    //console.log(res);
                    setCookie('completechecking',projectID,0.00005);
                    $(".iconGreenWS"+projectID).css('display','block');
                    $(".iconGrayWS"+projectID).css('display','none');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });   
        }

        function gotItWS(projectID,result){
            $.ajax({
                url: '<?php echo site_url() . "Projects/TaskMakeCompleteWS"; ?>',
                type: 'POST',
                data: {tid: projectID,type:result},
                dataType: "json",
                success: function (res) {
                    //console.log(res);
                    swal({type: 'success',html: 'You selected: ' + result });
                    //fun_loadfulltable($("#newTaskInput").attr('data-projectid'));
                    $(".iconGreenWS"+projectID).css('display','none');
                    $(".iconGrayWS"+projectID).css('display','block');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
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
                    //fun_loadfulltable($("#newTaskInput").attr('data-projectid'));
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All'); 
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
                beforeSend: function () {
                    setCookie('completechecking',0,0);
                },
                success: function (res) {
                    //console.log(res);
                    $("#taskInsertDiv").html("");
                    setCookie('completechecking',projectID,0.00005);
                    fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All'); 
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

        function completeAllSub(projectID){
            $.ajax({
                url: '<?php echo site_url() . "Projects/SubTaskMakeComplete"; ?>',
                type: 'POST',
                data: {tid: projectID,type:'completed'},
                dataType: "json",
                success: function (res) {
                    //console.log(res);
                    $("#taskInsertDiv").html("");
                    completePro(projectID);
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



  

    function qtipComment(event,element,data){
        // console.log(event);
        var projectID = data;
        var attr = 'comments';
        $.ajax({
            url: base_url+'projects/getCommentForProjectsTask', // URL to the local file
            type: 'POST', // POST or GET
            data: { projectID:data }, // Data to pass along with your request
            success: function(resp, status) {
                // console.log(resp);
                var creBy = '';
                $("#tipTT"+data).text("");
                $.each(alluser, function (key, value) {
                    if(value.ID == resp.creator[0].createdBy){
                        creBy = value.full_name;
                        creBy += " On: ";
                        creBy += moment(resp.creator[0].CreatedDate).format('MMM-DD-YYYY HH:mm:ss');
                    }
                });


                var floatingDiv =  ' <div class="backDiv"  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="floting_box_right">';
                    floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                    floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                    floatingDiv += '            <span class="col-lg-11 proDivname">';
                    floatingDiv += '                <span style="width:95%;margin-left:5%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname'+projectID+'">'+$("#taskdestext"+projectID).text()+'</span>';
                    floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename">Created By: '+creBy+'</span>';
                    floatingDiv += '            </span>';
                    floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                    floatingDiv += '        </div>';
                    floatingDiv += '        <div class="panel-body">'+todoCommentsDesign(resp,projectID)+'</div>';
                    floatingDiv += '     </div>';
                    floatingDiv += ' </div></div>';
            

                $("#projectBody").append(floatingDiv);
                
                $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
                setProjecttag(resp,projectID);
                $(".floting_box_right").css("top", event.pageY - 95);
                $(".floting_box_right").css("left", event.pageX - 666);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function qtipAttach(element,taskid,opendBy,CreatedDate){
        
        var projectID = $("#newTaskInput").attr('data-projectid');
        
        var attr='attach';


        $(element).qtip({
            show: {
                ready: true,
                modal:true
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
                    
                    $.ajax({
                        url: '<?php echo base_url(); ?>projects/deleteFileUnseen', // URL to the local file
                        type: 'POST', // POST or GET
                        data: {projectID:taskid}, // Data to pass along with your request
                        success: function(data, status) {
                            //console.log(data);
                            $("#tipAT"+taskid).text("");
                            
                        }
                    });

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
                    floatingDiv += '                <span class="todo-createdby">Created By: '+creBy+' On: '+moment(CreatedDate).format('MMM DD YYYY HH:mm:ss')+'</span>';
                    floatingDiv += '            </span>';
                    floatingDiv += '            <a href="javascript:void(0);" onclick="qtipHideAll()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                    floatingDiv += '        </div>';
                    floatingDiv += '        <div class="panel-body">'+projectAttachDesign(taskid,"ProjectsFiles")+'</div>';
                    floatingDiv += '     </div>';
                    floatingDiv += ' </div></div>';
                    floatingDiv += ' <input type="hidden" id="newTaskInput" data-projectid="'+projectID+'" class="form-control border-rad">';
                    
                    attachdataload('Task',taskid,taskid,'ProjectFolder','ProjectsFiles');
                    
                    api.set('content.text', floatingDiv);
                    $("#icsupload").on('change', function() {
                
                        var formData = new FormData();
                            formData.append('fileToUpload[]', $('#icsupload')[0].files[0]);
                            formData.append('projectName', $("#pronameSpan").text());
                            formData.append('parentType', 'Task');
                            formData.append('parentID', taskid);
                            formData.append('projectID', projectID);
                            formData.append('dirname', "ProjectsFiles");
                        
                        var request = $.ajax({
                            url: '<?php echo site_url('Projects/newProjectFile'); ?>',
                            method: "POST",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json"
                        });
                        
                        request.done(function( status ) {
                            
                            if(status.msg == 'Already'){
                                swal("Oops...", "File already exist", "error");
                            }else{
                                var res = status.file_new_name.split("_");
                                var filter = status.file_new_name.split(".");

                                tabDetail ='       <div class="col-lg-12 SA '+filter[1].toUpperCase()+'" id="fileWholeDiv007'+status.insert_id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
                                tabDetail +='           <div class="col-lg-5"><img class="" src="asset/icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;" id="fileoriname007'+status.insert_id+'">'+status.msg+'</span></div>';
                                tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
                                tabDetail +='               <img class="icon-todo-menu" id="MakeStatus007'+status.insert_id+'" onclick="makeStar($(this).data(\'docid\'),$(this).data(\'status\'))" data-docid="'+status.insert_id+'" data-status="NO" src="'+base_url+'asset/icons/Star.png">';
                                tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'asset/icons/Profile.png" onClick="userListShowOnlick(this,' + projectID + ')" >';
                                tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'asset/icons/Details_Properties.png">';
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
                            }
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
        tabDetail +='           <div class="col-lg-12 projectfilefDiv" style="padding: 3% 4% 1% 4%;">';
        tabDetail +='               <span class="pull-left col-lg-11 comtag" id="tagBtnDiv'+projectsid+'" style="margin-top: 0px;"></span>';
        tabDetail +='               <div class="col-lg-1 col-sm-1 col-md-1">'
                                        +'<li class="ddm-com-set" style="display:inline">'
                                        +   '<a class="dropdown-toggle dt-com-set" data-toggle="dropdown"><img class="" src="'+base_url+'asset/icons/Settings.png"></a>'
                                        +   '<ul class="dropdown-menu dropdown-com-set">'
                                        +       '<div class="arrow-position-view"></div>'
                                        +       '<li><a>Clear</a></li>'
                                        +       '<li><a>Starred</a></li>'
                                        +       '<li><a>Select</a></li>'
                                        +   '</ul>'
                                        +'</li>'
                                  +'</div>';
        tabDetail +='           </div>';


        tabDetail +='    <div style="border-top: 1px solid #e0dddd;margin-top: 10.5%;width: 96%;margin-left: 2%;">&nbsp;</div>';
        tabDetail +='    <div class="row attachListDiv" id="attachListDivCommnet">';

        var daterow = "";
        $.each(data.allComm,function(k,v){
            var time = data.allComm[k].CreatedDate;
            if(daterow == ""){
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            }else if(daterow != moment(time).format('L')){
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            }
            
            tabDetail +='       <div class="panel panel-default proComm ptt'+data.allComm[k].Id+'">';
            tabDetail +='           <div class="panel-body status">';
            tabDetail +='               <div class="who clearfix">';
            tabDetail +='                   <span class="comment_imghover">';
            tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
            tabDetail +='                       <div class="show_user_details">'+data.allComm[k].full_name+'<br>'+moment(data.allComm[k].CreatedDate).format('lll')+'</div>';
            tabDetail +='                   </span>';
            tabDetail +='                   <span class="from">'+data.allComm[k].Description+'</span>';
            tabDetail +='                   <div class="name dropdown"><b></b>'+
                                                '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
                                                    '<i class="fa fa-chevron-down pull-right"></i>'+
                                                '</a>'+
                                                '<ul class="dropdown-menu pull-right">'+
                                                    '<div class="arrow-top-right"></div>'+
                                                    '<li><a onclick="">Msg Info</a></li>'+
                                                    '<li><a onclick="deletePTTComment(\''+data.allComm[k].Id+'\')">Clear</a></li>'+
                                                '</ul>'+
                                                '<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                            '</div>';
            tabDetail +='               </div>';
            tabDetail +='           </div>';
            tabDetail +='       </div>';
        });

        tabDetail +='    <div class="taskComments">';
        tabDetail +='           <div id="commentinput" onfocus="if($(this).html() == \'Write a comment...\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Write a comment...\');" contenteditable data-status="TaskCmnt" class="form-control commentinput">Write a comment...</div>';
        tabDetail +='           <input type="hidden" id="taskid" data-status="Task" class="form-control taskid" value="'+projectsid+'"/>';
        tabDetail +='           <img src="'+base_url+'asset/icons/emo.png" onclick="on_off_com_emo_popup()" id="input_img1">';
        tabDetail +='           <a data-title="Attachment" data-toggle="lightbox" title="Attachment" href="'+base_url+'/projects/comattach/Task/'+projectsid+'/ProjectsFiles">';
        tabDetail +='               <img src="'+base_url+'asset/icons/attach.png" id="input_img2">';
        tabDetail +='           </a>';
        tabDetail +='           <div class="comment_emo_popup">'
                              +'<?php 
                                    $emo_url = base_url("asset/emotion");
                                    $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
                                    foreach($emotionImg as $v): 
                                        echo '<img onclick="sendComEmo(this)" src="'.$emo_url."/".$v.'">';
                                    endforeach;
                                ?>'
                              +'</div>';
        tabDetail +='    </div>';
        tabDetail +=' </div>';

        return tabDetail;
    }

    function propertiesLoadTask(data) {
        
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

        $("body").on("keydown","#new_project_name",function(e){
            //console.log(e.keyCode);
            if (e.keyCode == 13) {
                e.preventDefault();
                createPro();
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
                    
                    $("#taskOpenBy").val(data.dataList[0].opened_by);
                    var comStr = "";
                    var file = "";
                    var i = 1;
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
                            $("#docListTbody").prepend(comStr);
                            file = "";
                            comStr = "";
                            design = '';
                            i++;
                        });
                    }else{
                      $("#TaskSortTable").hide();   
                    }

                    var Commentstring = "";
                    var id = "";

                    if (data.commentList != false) {
                        var i = 1;
                        $.each(data.commentList, function (key, value) {
                            
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
                                    Commentstring += '<small id="TaskEdit' + data.commentList[key].type + data.commentList[key].id + '" data-id = "' + data.commentList[key].id + '" data-value="' + data.commentList[key].type + '" onclick="editComment($(this).data(\'value\'),$(this).data(\'id\'),\'modcomments\')" style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:block;">Edit</small><small style="margin-top: 0px; margin-left: 1%; float: left; position: relative; color: rgb(60, 141, 188); cursor: pointer;display:none;" id="update'  + data.commentList[key].type + data.commentList[key].id + '" >Update</small><small style="margin-left:1%; color: #3C8DBC; cursor: pointer;" data-id = "' + data.commentList[key].id + '"  data-value="' + data.commentList[key].type + '" onclick="deleteComment($(this).data(\'value\'),$(this).data(\'id\'),\'0\',\'modcomments\')">Delete</small>';
                                }
                                Commentstring += '</p></div>';
                                Commentstring += '<div class="col-lg-12" id="reply' + i + 'Area" style="display:none">';
                                Commentstring += '<div class="col-lg-12" id="reply' + i + 'commentList">';
                                Commentstring += '</div>';
                                Commentstring += '<div class="form-group">';
                                Commentstring += '  <div class="col-md-12">';
                                Commentstring += '      <div class="widget-area no-padding blank">';
                                Commentstring += '          <div class="status-upload">';
                                Commentstring += '              <form>';
                                Commentstring += '                  <img src="' + IMGURL + '/' + user_img + '"  alt="' + user_name + '" style="width: 34px; height:9%; float: left;border: 1px solid rgb(153, 200, 228);margin-left: 2%;margin-top: 0%;"><textarea class="responsiveTextarea" id="reply' + i + 'comment" name="replyComment" placeholder="Type a message..." style="width: 88%; height:34px" ></textarea>';
                                Commentstring += '                  <input type="hidden" name="userID" id="reply' + i + 'userID" value="<?php echo $id; ?>">';
                                Commentstring += '                  <input type="hidden" name="userImg" id="reply' + i + 'userImg" value="<?php echo $user_img; ?>">';
                                Commentstring += '                  <input type="hidden" name="userName" id="reply' + i + 'userName" value="<?php echo $username; ?>">';
                                Commentstring += '                  <input type="hidden" id="reply' + i + 'isReply" class="isReply" name="isReply"  value="0">';
                                Commentstring += '                  <button style="display:none;" type="button" id="reply' + i + 'commentBtn" data-taskid = "' + data.commentList[key].id + '" data-typeid = "' + data.commentList[key].typeID + '"  data-value="reply' + i + '" onclick="sendReply($(this).data(\'value\'),$(this).data(\'taskid\'),$(this).data(\'typeid\'))" class="btn btn-success green replyComBtn"><i class="fa fa-share"></i> Comment</button>';
                                Commentstring += '              </form>';
                                Commentstring += '          </div>';
                                Commentstring += '      </div>';
                                Commentstring += '  </div>';
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

                    global_feedback = [];
                    if ((data.feedbackList).length) {
                        $.each(data.feedbackList, function (fk, fv) {
                            global_feedback.push(fv);
                        });
                    }
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
                    $(".fileinput-remove").trigger('click', [true]);
                    var design = '';
                        design += '<tr class="grouprow" id="itemTASK' + data.fileID + '" rel="'+userName.split(' ').pop().toUpperCase()+'" style="border-top: 1px solid #000 !important;">';
                        design +=   '<td > <img style="width: 100%;margin:17%;padding-right:35%;" src="<?php echo base_url();?>require/img/'+data.file_name.split('.').pop()+'.png" /></td>';
                        design +=   '<td class="file" name="'+userName.split(' ').pop().toUpperCase()+'" rel="'+data.file_name.split('.').pop().toUpperCase()+'"><a target="_BLANK" href="https://docs.google.com/viewerng/viewer?url=http://27.147.195.222:2241/yeezy/uploads/tempUpload/fileupload/'+data.ori_name+'">'+data.ori_name+'</a></td>';
                        design +=   '<td class="uploadedBy" rel="'+userName.split(' ').pop().toUpperCase()+'">'+userName+'</td>';
                        design +=   '<td>'+data.file_size+'KB</td>';
                        design +=   '<td>'+dateasd+'</td>';
                        design +=   '<td><i style="color:#dd4b39;cursor:pointer;" class="fa fa-trash" data-id = "' + data.id + '"  data-id = "'+ data.fileID +'"  data-value="TASK" onclick="deleteComment($(this).data(\'value\'),'+data.fileID+','+data.fileID+',\'file\')"></i></td>';
                        design += '</tr>';
                    
                    $("#file-box table tbody").prepend(design);
                    $("#attachFile").css("display", "block");
                    $("#uploadFile").css("display", "none");

                }).error(function (data) {
                
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
                swal("Oops...", "Comment can't empty", "error");
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
                        string += '<img src="' + URL1 + '/' + user_img + '"  alt="' + user_name + '" style="width: 34px;height:9%;float: left;border: 1px solid rgb(153, 200, 228);margin-top: 0%;"><textarea class="responsiveTextarea" id="reply' + data.msg + 'comment" name="replyComment" style="width: 88%;height: 34px;" placeholder="Type a message..." ></textarea>';
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
            
            if(getCookie('project') != 0){
                
                var targetProjectId = getCookie('project');
                //var targetProName = getCookie('projectName');

                var targetProName = $("#clickDiv"+targetProjectId).find('b')[0].innerText;
                
                //console.log("asd");
                //console.log(targetProjectId);
                
                $(".notifation").siblings().attr('class');
                if($("#clickDiv"+targetProjectId).hasClass('inactive')){
                    $("#clickDiv"+targetProjectId).removeClass('inactive');
                }
                
                $("#pronameSpan").html("");
                $("#taskInsertDiv").html("");
                $("#pronameSpan").html(targetProName);
                $("#pronameSpan").attr('data-serial',targetProjectId);
                $("#newTaskInput").attr('data-projectid',targetProjectId);
                $("#newTaskInput").focus();

                $("#wid-id-4").animate({scrollTop: $('#wid-id-4').prop("scrollHeight")}, 1000);
                
    //             getTagAjax(targetProjectId);
    //             fun_loadfulltable(targetProjectId);
                // fun_loadfulltable(targetProjectId);
                $("#clickDiv"+targetProjectId).trigger('click');
                //fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All'); 

                // if(getCookie('ClickType') == 'Comment'){
                //     $("#commentsIMG"+targetProjectId).trigger('click');
                // }
            
            }

            //setCookie('project',getCookie('project'),0);
            setCookie('projectName',getCookie('projectName'),0);
            setCookie('ClickType',getCookie('ClickType'),0);
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
            //console.log(e);
            var container = $('#openProjectTaskDiv');

            if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.hide();
            }

            var container = $('.note-editor');

            if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $('.summernote').summernote('destroy');
                $("#commentinputNEW").show();
                $("#commentinputNEW").text('Write a status update for this project');
                $("#commentinputNEW").css('height','40px');
                $("#attachListDivCommnet").css('margin-top','0%');
                $("#attachListDivCommnet").css('min-height','440px');
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
                //$(".panel-heading").css("background-color","#585858");
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

            var targetID = e.currentTarget.id;
            
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
        //  console.log(event);
        // });
        $(document).on('keypress', '.sendForSaveSubTask', function (event, isScriptInvoked) {
            
            var targetID = event.target.id
            var projectID = $("#newTaskInput").attr('data-projectid');
            var taskid = $("#"+targetID).attr('data-taskid');
            var subtaskList = "";

            //console.log(projectID);
            //console.log(taskid);
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
                            //console.log(data);
                   

                            if($("#openstatus"+taskid).attr('data-status') != 'completed' ){
                                $("#newsubTaskInput"+taskid).val("");
                                countsabtask(taskid);
                                DrawSubTaskList(projectID,taskid);
                            }else{
                                $("#openstatus"+taskid).data('status','in progress');
                                $("#openstatus"+taskid).text('in progress');
                                $("#iconGray"+taskid).css('display','block');
                                $("#iconGreen"+taskid).css('display','none');
                                $("#newsubTaskInput"+taskid).val("");
                                countsabtask(taskid);
                                DrawSubTaskList(projectID,taskid);
                            }
                            
                            
                        },
                        complete:function(data){
                            $("#subTaskcountbtn"+data.insertID).trigger('click');
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

        function DrawSubTaskList(pro_id,taskdataid,sttus = false){
            
            // console.log(sttus);
            
            var subtaskList = "";
            var vColor = 'inherit';
            var status = 'inherit';
            var clas = "";
            var shareBtnIcon = '';
            

            $("#subtaskInsertDiv"+taskdataid).html("");
            
            $.ajax({
                
                url: '<?php echo site_url(); ?>Projects/subtaskListNew',
                type: 'POST',
                data: {
                    proid: pro_id,
                    taskID: taskdataid,
                    <?php echo (isset($shared_activity_id))?"id: ".$id.",":""; ?>
                    <?php echo (isset($shared_activity_id))?"org_id: '".$org_id."',":""; ?>
                    <?php echo (isset($shared_activity_id))?"stid: ".$share_subtask_id.",":""; ?>
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                    // $("#subtaskInsertDiv"+taskdataid).html('<span id="loading'+taskdataid+'"><img src="'+base_url+'asset/img/loading2.gif"/></span>');
                },
                success: function (data_st, textStatus) {
                    $("#loading"+taskdataid).hide();
                    // $('.backDivPro').remove();
                    var countC = 0;
                    var countIC = 0;
                    
                    if(data_st.allSubTask.length > 0){
                        $.each(data_st.allSubTask, function (index, value) {
                        
                            var now = moment(value.Startdate); //todays date
                            var end = moment(value.Enddate); // another date
                            var duration = moment.duration(end.diff(now));
                            var days = Math.round(duration.asDays());

                            var inStartClr = 'bfbfbf';
                            

                            if(value.Status == 'completed'){
                                sty1 = 'block';
                                sty2 = 'none';
                                status = 'complete';
                                inStartClr = '54ce3c';
                                countC++;


                            }else{
                                sty1 = 'none';
                                sty2 = 'block';
                                status = 'incomplete';
                                countIC++;
                            }

                            var StartdateC = '';
                            var endcColorS = '';
                            var HourColor = '';
                            var startColor = '';
                           
                            
                            if(moment(value.Startdate).format('MMM DD YYYY') == 'Invalid date'){
                                StartdateC = '[No due date]';
                                startColor = 'RED';
                            }else{
                                StartdateC = moment(value.Startdate).format('MMM DD YYYY');
                                startColor = 'inherit';
                            }

                            if(moment(value.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                EnddateC = '[No due date]';
                            }else{
                                EnddateC = moment(value.Enddate).format('MMM DD YYYY');
                            }

                            var SpecialTo = moment(value.Enddate).format('MMM DD YYYY');
                            // console.log(moment().diff(SpecialTo, 'days'));
                            if (moment().diff(SpecialTo, 'days') > 0) {
                                //alert('date is in the past');
                                vColor = 'RED';
                                inStartClr = 'ff003a';
                            }else if(moment(value.Enddate).format('MMM DD YYYY') == 'Invalid date'){
                                vColor = 'RED';
                                
                            }else {
                                vColor = 'inherit';
                                //alert('date is today or in future');
                            }

                            var wid = "";
                            var widHr = "";
                            var shareBtnNew = "";
                            
                            if(days.toString().length == '1'){
                                wid = '3%';
                            }else if(days.toString().length == '2'){
                                wid = '3%';
                            }else if(days.toString().length == '3'){
                                wid = '5%';
                            }else{
                                wid = '5%';
                            }

                            if(value.hour.toString().length == '1' && value.hour != '0'){
                                widHr = '3%';
                            }else if(value.hour.toString().length == '2'){
                                widHr = '3%';
                            }else if(value.hour.toString().length == '3'){
                                widHr = '5%';
                            }else if(value.hour == '0'){
                                widHr = '5%';
                            }

                            if(value.hour == '0'){
                                endcColorS = '[None]';
                                HourColor = 'RED';
                            }else{
                                
                                endcColorS = value.hour;
                                HourColor = 'inherit';
                            }
                            var ssdura = '';
                            var sHourColor = 'inherit';

                            // console.log(days);
                            if(isNaN(days)){
                                ssdura = '[None]';
                                sHourColor = 'RED';
                            }else{
                                
                                ssdura = days;
                                sHourColor = 'inherit';
                            }

                            if(value.isShared == '1'){
                                shareBtnIcon = 'qtipSharedOnclick';
                                shareBtnNew = '| <span onclick="qtipSharedOnclick(\'Sub Task\','+value.Id+',\'subtasktitle\')" onmouseenter="qtipSharedBox(this,'+value.Id+')" id="openShared'+value.Id+'" data-toggle="tooltip" data-placement="top"><i class="fa fa-share-alt" aria-hidden="true" style="margin: 0px;"></i></span>';
                            }else{
                                shareBtnIcon = 'SendInvite';
                                shareBtnNew = '';
                            }

                            subtaskList ='       <div class="col-lg-8 SIDIV" style="margin-bottom: 3px;">';
                            subtaskList += '          <input type="text" id="newsubTaskInput'+value.Id+'" data-taskid="'+taskdataid+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask" style="margin-top: 1%;">';
                            subtaskList +='      </div>';

                            subtaskList += '<div draggable="true" ondragstart="drag(event,'+value.Id+')"  class="'+clas+' subtaskDetailDive '+status+'" id="subtaskDetailDive'+value.Id+'">';
                            //icon Div Start
                            
                            subtaskList += '    <div class="subtaskRow" id="readOnlyID'+value.Id+'" style="width:100%;float:left;margin-bottom: -2px;margin-top: -2px;padding-top: 4px;;">';
                            subtaskList += '      <div style="width:5%;float:left;">';
                            subtaskList += '             <i class="fa fa-circle" style="display:block;color: #'+inStartClr+';float: left; margin: 14%; padding: 0%; height: 15px; width: 15px;font-size: 18px;"></i>';
                            subtaskList += '      </div>';
                            //Main Div Start
                            subtaskList += '      <div style="width:83%;float:left;">';
                            //Main Div Upper Start
                            subtaskList += '          <div style="width: 92%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">';
                            subtaskList += '              <span data-serial="' + value.Id + '" class="from proNameSub clickontitle tnstitle" id="subtasktitle'+value.Id+'">' + value.Title + '</span>';
                            subtaskList += '          </div>';
                            //Main Div Lower Start
                            subtaskList += '          <div style="width: 100%;height: 29px;margin-top: 5px;">';
                            //Main Div Due By POPUP Start
                            subtaskList += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span>Start: <span><input type="text" id="SubstartDatein' + value.Id + '" style="color:'+startColor+';" onclick="togsubcalstart(' + value.Id + ')" name="" class="datepicker customdate" data-dateformat="M d yy"  value="'+StartdateC+'"></span></span></span>|';
                            subtaskList += '              <span class="span3" style="margin-left: 0%;"><span class="duSpan dropdown-toggle pointer" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true"><span>Due by: <span style="color:'+vColor+';"><input type="text" onclick="togsubcalend(' + value.Id + ')" id="SubendDateinNew' + value.Id + '" style="color:'+vColor+';" name="mydate" class="datepicker subtaskDatePicker customdate" data-dateformat="M d yy" value="'+EnddateC+'"></span></span></span>|';
                            subtaskList += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" aria-hidden="true"  style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan pointer" id="duraCogBtn'+value.Id+'">Duration: <span style="color:'+sHourColor+'"><input type="text" style="color:'+sHourColor+';width:'+wid+';" class="duarationClass duraCogBtn'+value.Id+'" onchange="getDuration($(this).data(\'id\'),' + value.Id + ',\'SubstartDatein\')" data-id="Subduration' + value.Id + '" id="Subduration' + value.Id + '" value="'+ssdura+'" /></span> </span></span>|';
                            subtaskList += '              <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" aria-hidden="true"  style="margin-right: 6px;-webkit-box-shadow: none;box-shadow: none;"><span class="duSpan pointer" id="hrCogBtn'+value.Id+'">Hours: <span style="color:'+HourColor+'"><input type="text" style="color:'+HourColor+';width:'+widHr+'; font-size: 12px !important" class="duarationClass duSInput hrCogBtn'+value.Id+'" onchange="getDurationhr($(this).data(\'id\'),' + value.Id + ',\'subtask\')" data-id="hrduration' + value.Id + '" id="hrduration' + value.Id + '" value="'+endcColorS+'"/></span> </span></span>|';
                            subtaskList += '              <span style="z-index: 100;position: relative;" class="duSpan" ><span clas="link_status_text'+value.Id+'  dt-todostatus" id="Levopenstatus'+value.Id+'" data-type="'+value.Type+'" data-serial="'+value.Id+'" data-status="'+value.Status+'" > Status </span> <span class="link_status_text'+value.Id+'  dt-todostatus deleteStatus" id="openstatus'+value.Id+'" data-type="'+value.Type+'" data-serial="'+value.Id+'" data-status="'+value.Status+'" >'+value.Status+'</span> </span>|<span onClick="userListTask(this,' + value.Id + ','+value.isShared+')"  class="duSpan"><i class="fa fa-user" style="font-size: 15px;margin-right: 5px;margin-top: 3px;" aria-hidden="true"></i> <span style="margin-top: -3px;position: relative;margin-left: 0%;" class="taskTagBtnDiv" id="tagBtnDiv'+value.Id+'"></span></span> '+shareBtnNew;
                            subtaskList += '          </div>';
                            subtaskList += '      </div>';
                            //Right Div Start
                            subtaskList += '      <div style="width:11%;float:left;margin-top: 0%;">';
                            subtaskList += '                <div class="dropdownCus" style="width:100%;" >'; 
                            subtaskList +='                     <i style="float: left; margin-right: 4px; margin-top: 1%; border-color: #ffffff; color: #ffffff;" class="fa fa-plus hvr-glow clasI cHover open_newpro1" aria-hidden="true" id="projectbtn" title="Add Sub Task" onclick="openSubIn('+value.Id+')"></i><i class="fa fa-check cusIconCom"  onClick="makeComplete(' + value.Id + ',\''+value.Status+'\',\'SubTask\');" id="iconGray' + value.Id + '" style="display:'+sty2+';padding: 5% !important; margin-top: 1% !important; margin-right: 8% !important; margin-left: 1% !important;" ></i><i class="fa fa-check cusIconInCom" onClick="makeComplete(' + value.Id + ',\''+value.Status+'\',\'SubTask\');" id="iconGreen' + value.Id + '" style="display:'+sty1+';padding: 5% !important; margin-top: 1% !important; margin-right: 8% !important; margin-left: 1% !important;"></i><i class="fa fa-ellipsis-h hvr-glow clasI cHover" id="SubopenQtipProperty' + value.Id + '" style="float: left; margin-top: 1%; position: relative; left: 14%; border-color: #ffffff; color: #ffffff;;"></i>';
                            subtaskList += '                </div>'; 
                            subtaskList += '      </div>';
                            subtaskList += '    </div>';
                            subtaskList += '    <div style="width:100%;float:left;">';
                            subtaskList += '      <div class="col-lg-12 subTaskListDiv" id="subTaskcountbtn' + value.Id + 'DIV">';
                            subtaskList += '          <div class="row margin-topdown" id="subTaskInputDiv'+value.Id+'" style="display:none;">';
                            subtaskList += '              <div class="col-lg-8 col-sm-8 col-md-8">';
                            subtaskList += '                  <input type="text" id="newsubTaskInput'+value.Id+'" data-taskid="'+value.Id+'"  onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'New Subtask\'" placeholder="New Subtask" class="form-control border-rad sendForSaveSubTask">';
                            subtaskList += '              </div>';
                            subtaskList += '          </div>';
                            subtaskList += '          <div id="subtaskInsertDiv' + value.Id + '">';
                            subtaskList += '          </div>';
                            subtaskList += '      </div>';
                            subtaskList += '    </div>';
                            subtaskList += '</div>';


                            $("#subtaskInsertDiv"+taskdataid).append(subtaskList);
                            
                            // var dueColorSOptSub = '<option value="[None]">[None]</option>';
                            // for (var kk = 1; kk <= 20; kk++) {
                            //     dueColorSOptSub += '<option value="'+kk+'">'+kk+'</option>';
                            // }
                            
                            // $("#Subduration"+ value.Id ).append(dueColorSOptSub);
                            // $("#Subduration"+ value.Id ).val(ssdura);
                            // $("#hrduration"+ value.Id ).append(dueColorSOptSub);
                            // $("#hrduration"+ value.Id ).val(endcColorS);


                            
                            if(value.importLevel == 1){
                                $("#readOnlyID"+value.Id).addClass('readOnlyDiv');
                            }
                            
                            if(getCookie('completechecking') === value.Id || getCookie('selectedTask') === value.Id){
                                $("#subtaskDetailDive"+value.Id).css('border-left','3px solid #1FEA9C');
                            }

                            if(value.Status == 'canceled'){
                                $("#subtasktitle"+value.Id).html("<del>"+$("#subtasktitle"+value.Id).text()+"</del>");
                                $("#subtasktitle"+value.Id).css('color','RED');
                                $("#openstatus"+value.Id).css('color','RED');
                            }

                            if(value.Status == 'none'){
                                $("#openstatus"+value.Id).css('color','RED');
                                $("#openstatus"+value.Id).text('[none]');
                            }

                            if(value.Status == 'in progress'){
                                $("#openstatus"+value.Id).css('color','BLUE');
                            }

                            if(value.Status == 'completed'){
                                $("#openstatus"+value.Id).css('color','GREEN');
                            }
                            
                            if(value.Status == 'on hold'){
                                $("#openstatus"+value.Id).css('color','RED');
                            }

                            if(value.Status == 'waiting for feedback'){
                                $("#openstatus"+value.Id).css('color','orange');
                                $("#openstatus"+value.Id).css('font-size','9px');
                            }

                            if(sttus === 'Incomplete Sub Tasks'){
                                
                                $('.complete').hide();
                                $('.incomplete').show();
                                
                                var check_no = $("#subtaskInsertDiv"+taskdataid).find('.incomplete').length;
                                
                                if(check_no > 0){
                                    $(".taskserial"+taskdataid).show();
                                }else{
                                    $(".taskserial"+taskdataid).hide();
                                }

                            }else if(sttus === 'Completed Sub Tasks'){
                                
                                $('.complete').show();
                                $('.incomplete').hide();
                                
                                var check_no = $("#subtaskInsertDiv"+taskdataid).find('.complete').length;
                                
                                var divHTM = $("#subtaskInsertDiv"+taskdataid).html();
                                
                                if(check_no > 0){
                                    $(".taskserial"+taskdataid).show();
                                }else{
                                    $(".taskserial"+taskdataid).hide();

                                }
                            }

                            getTagAjaxPro(value.Id,'Task');

                            $("#properties"+value.Id).click(function(){
                                $(".dropdownCus-content").hide();
                                $("#properties"+value.Id+"DIV").show();
                            });

                            $("#SubclickIconlist"+value.Id).click(function(){
                                qtipAssignee(this,value,crm_users,'SubTask');
                            });

                            $("#SubclickIconlist"+value.Id).mouseover(function(){
                                qtipAssignHover($(this).find('.onIconClick'),value);
                            });
                            
                            $('#SubopenQtipProperty'+value.Id).click(function(){
                                 //qtipPropertiesProject(this,value,'SubTask');

                                 taskPropetritesOpen(this,value,'SubTask');
                            });

                            $('#openstatus'+value.Id).click(function(){
                                 qtipStatus(this,value);
                            });

                            $('#LevSopenstatus'+value.Id).click(function(){
                                 qtipStatus(this,value);
                            });

                            $('#openShared'+value.Id).click(function(){
                                 // qtipSharedList(this,value);
                            });
                            
                            var fpstart= flatpickr("#SubstartDatein"+value.Id, {
                                // enableTime: true,
                               dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate:moment(value.Startdate).format('MMM-DD-YYYY'),
                                maxDate:moment(value.Enddate).format('MMM-DD-YYYY'),
                                onChange: function(selectedDates, dateStr, instance) {
                                    thisValue(selectedDates[0],value.Id,'SubstartDatein','Subduration','subtask');
                                }
                            });

                            var fpendSUbNew= flatpickr("#SubendDateinNew"+value.Id, {
                                // enableTime: true,
                                dateFormat: 'M-d-Y',
                                clickOpens:false,
                                minDate: moment(value.Startdate).format('MMM-DD-YYYY'),
                                //maxDate: moment(data_st.proTime[0].Enddate).format('MMM-DD-YYYY'),

                                onChange: function(selectedDates, dateStr, instance) {

                                    thisValue(selectedDates[0],value.Id,'SubendDateinNew','Subduration','subtask');

                                    $.ajax({
                                        url: '<?php echo site_url() . "Projects/updateDueDate"; ?>',
                                        type: 'POST',
                                        data: {
                                            parentID: value.HasParentId,
                                            type_id: value.Id,
                                            CreatedBy:value.CreatedBy,
                                            ChangeType:'SubTask',
                                            DueDate: moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                             //console.log('flatpickr Subtask');
                                             //console.log(res);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            // Some code to debbug e.g.:               
                                            console.log(jqXHR);
                                            console.log(textStatus);
                                            console.log(errorThrown);
                                        }
                                    });
                                }
                            });

                           

                            arr_sub_fpstart.push({"Id":value.Id,"date":fpstart});
                            //arr_sub_fpend.push({"Id":value.Id,"date":fpend});
                            arr_sub_fpend.push({"Id":value.Id,"date":fpendSUbNew});
                            subtaskList = "";

                        });
                        
                        $('[data-toggle="tooltip"]').tooltip(); 
                        
                        $('[title!=""]').qtip({
                            style: {
                                classes: 'qtip qtip-dark qtip-rounded qtip-font qtip-pad  qtip-shadow qtipCustomcolor',
                                width: '150'
                            },
                            position: {
                                at: 'bottom center',  
                                my: 'top center', 
                                viewport: $(window),
                            },
                            show: {                 
                                delay: 500,
                                effect: function(offset) {
                                    $(this).slideDown(100); // "this" refers to the tooltip
                                }
                            }
                        });
                        
                        if(sttus === 'Incomplete Sub Tasks'){
                           $("#subTaskcountbtn"+taskdataid).text(countIC);

                        }else if(sttus === 'Completed Sub Tasks'){
                            $("#subTaskcountbtn"+taskdataid).text(countC);
                        }
                        
                        // alert(countC);
                        // alert(countIC);

                    }else{
                        if(sttus === 'Incomplete Sub Tasks'){
                                
                            $(".taskserial"+taskdataid).hide();

                        }else if(sttus === 'Completed Sub Tasks'){
                            
                            $(".taskserial"+taskdataid).hide();
                        }
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

        function openSubIn(val){
            
            if($("#newsubTaskInput"+val).is(':visible')){
                $("#newsubTaskInput"+val).hide();
            }else{
                $(".sendForSaveSubTask").hide();
                $("#newsubTaskInput"+val).show('slow');
            }
        }

        
        function attacher(){
            
            if($("#comAttahID").hasClass('fa-paperclip')){
                $("#comAttahID").removeClass('fa-paperclip').addClass('fa-ellipsis-h');
                $('.SA').hide('slow');
                $('.commentgt').hide('slow');
                $('.attachclass').show('slow');
                $('#comAttachFile').show('slow');

            }else if($("#comAttahID").hasClass('fa-ellipsis-h')){
                $("#comAttahID").removeClass('fa-ellipsis-h').addClass('fa-paperclip');
                $('.SA').show('slow');
                $('.commentgt').show('slow');
                $('#comAttachFile').hide('slow');
            }
            
        }



        var thisProject = [];

        function propertiesProjecttab(projectid,viewtype,parentID,taskdata,data){
        
            var superviewtype = viewtype;
            

            var tabDetail ='  <div class="row">';
            
            tabDetail +='    <div class="col-lg-12 propertiesDIVNew" style="z-index:25000;">';
            tabDetail +='       <div class="dropdown">';
            tabDetail +='           <span style="position: absolute;display:none;" id="comAttachFile"><a data-title="Attachment" title="Attachment" style="margin-right: 2px;background-color: #686868;" onclick="$(\'.taskAttach\').click();" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><span onclick="$(\'.taskAttach\').click();" class="attachSpan"> Add Files</span></span>';
            tabDetail +='       </div>';
            tabDetail +='    </div>';
            // tabDetail +='    <div style="border-top: 1px solid #e0dddd;margin-top: 6.5%;width: 96%;margin-left: 2%;">&nbsp;</div>';
            
            tabDetail +='    <div class="row attachListDiv" id="attachListDivCommnet" style="min-height:350px !important;">';

            var daterow = "";
            $.each(data.allComm,function(k,v){
                var time = data.allComm[k].CreatedDate;
                var className;
                var comClas;
                
                if(daterow == ""){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }else if(daterow != moment(time).format('L')){
                    daterow = moment(time).format('L');
                    //tabDetail += drawCommentGroupTime(time);
                }
                
                if (data.allComm[k].Description.match(/href='([^']+)'/) != null) {
                    var filter = data.allComm[k].Description.match(/href='([^']+)'/)[1].split("/");
                    var typeFilter = filter[filter.length-1].split(".");
                    
                    if ($.inArray(typeFilter[1], thisProject) == -1) {
                        thisProject.push(typeFilter[1]);
                    }

                    //className = typeFilter[1];
                    className = 'attachclass';
                    comClas = '';
                }else{
                    className = '';
                    comClas = 'hasCom';
                }


                if(className != ''){
                    var str = '<span style="font-size: 14px;font-weight: bold;"><i class="fa fa-paperclip flipFont" aria-hidden="true"></i> attached</span>';
                }else{
                    str = '';
                }

                var matches = data.allComm[k].full_name.match(/\b(\w)/g);
                var acronym = matches.join(''); 

                
                
                tabDetail +='       <div class="panel panel-default proComm SA '+className+' '+comClas+' ptt'+data.allComm[k].Id+'">';
                tabDetail +='           <div class="panel-body status statuscontaciner" style="display:block;">';
                tabDetail +='               <div class="who clearfix">';
                tabDetail +='                   <span class="comment_imghover">';
                tabDetail +='                   <span style="margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr">'+acronym+'</span>';
                tabDetail +='                   <span class="from" style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+data.allComm[k].full_name+'</span>'+str+'<span class="CusUsrTm"> '+moment(data.allComm[k].CreatedDate).format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                tabDetail +='                   <span class="from" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+data.allComm[k].Description+'</span>';
                tabDetail +='                   <div class="name dropdown "><b></b>'+
                                                    '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
                                                        '<i class="fa fa-chevron-down pull-right"></i>'+
                                                    '</a>'+
                                                    '<ul class="dropdown-menu pull-right">'+
                                                        '<div class="arrow-top-right"></div>'+
                                                        '<li><a onclick="">Msg Info</a></li>'+
                                                        '<li><a onclick="delComment(\''+data.allComm[k].Id+'\')">Delete</a></li>'+
                                                        // '<li><a onclick="">Forward</a></li>'+
                                                    '</ul>'+
                                                    //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                '</div>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='           <div class="panel-body status viewlogContainer" style="display:none;">';
                tabDetail +='                   <div style="margin-top: 50px; display:none; " class="SA">';
                
                $.each(data.allStory,function(ky,valu){
                    
                    if(valu.parentid == data.allComm[k].Id){
                        //console.log(valu);
                        tabDetail +='               <span class="from" style="width: 87%;float: left;margin-left: 8%;font-size: 11px;margin-top: 10px;    line-height: 1.2em;color: #000000;"><span style="font-weight:600;"> '+valu.name+'</span> <span> '+valu.action+'</span> <span>'+valu.detail+'</span>.<span> '+moment(valu.time).format('h:mm A z')+'</span></span>';
                    }
                    
                });

                tabDetail +='                   </div>';
                tabDetail +='                   </div>';
                tabDetail +='       </div>';
            });
            // it should be required
            tabDetail +='    </div>';

            tabDetail +='   <div class="taskComments" style="width: 97%; left: 13px; right: 3px; height: 50px;">';
            // tabDetail +='    <div style="border-top: 1px solid #e0dddd;margin-top: 6.5%;width: 96%;margin-left: 2%;">&nbsp;</div>';
            tabDetail +='       <div id="commentinput" style="font-family: \'NavigateFont\';" onfocus="if($(this).html() == \'Write a comment....\') { $(this).html(\'\');expanTaskDivNEW();}" onblur="if($(this).html() == \'\'){ $(this).html(\'Write a comment....\');closeTaskDivNEW();}" contenteditable data-status="TaskCmnt" class="form-control commentinput">Write a comment....</div>';
            tabDetail +='           <input type="hidden" id="taskid" data-status="Task" class="form-control taskid" value="'+projectid+'"/>';
            tabDetail +='           <img src="'+base_url+'asset/icons/emo.png" onclick="on_off_com_emo_popup()" id="input_img1">';
            tabDetail +='           <a class="taskAttach" data-title="Attachment" data-toggle="lightbox" title="Attachment" href="'+base_url+'/projects/comattach/Task/'+projectid+'/ProjectsFiles">';
            tabDetail +='               <img src="'+base_url+'asset/icons/attach.png" id="input_img2">';
            tabDetail +='           </a>';
            tabDetail +='           <div class="comment_emo_popup">'
                                  +'<h3 class="popover-title" style="margin:-5px -5px 5px -5px;">Emotion<span class=chatemopopx onclick="on_off_com_emo_popup()">×</span></h3>'
                                  +'<?php 
                                        $emo_url = base_url("asset/emotion");
                                        $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
                                        foreach($emotionImg as $v): 
                                            echo '<img onclick="sendComEmo(this)" src="'.$emo_url."/".$v.'">';
                                        endforeach;
                                    ?>'
                                  +'</div>';
            tabDetail +='       </div>';
            tabDetail +='   </div>';
            
            tabDetail +='</div>';
            
            return tabDetail;
        }

        function tabsDesignProject(projectid,viewtype,parentID,taskdata,data){
            var tabsDesign='';
            tabsDesign += ' <div class="tab-content" style="padding: 10px;">';
            tabsDesign += '     <div id="home" class="tab-pane fade in active">';
            tabsDesign +=           propertiesProjecttab(projectid,viewtype,parentID,taskdata,data);
            tabsDesign += '     </div>';
            tabsDesign += ' </div>';
            
            return tabsDesign;
        }

        function qtipPropertiesProject(element,maindata,viewtype){
            
            
            thisProject.length = 0;
            $("#chkforStory").val(viewtype);
            //console.log($(element).qtip('api'));
            if($(element).qtip('api') == undefined){
                $('.qtip').qtip('hide');
                var projectID = maindata.Id;
                var parentID = maindata.HasParentId;
                
                var attr='properties';
                if(viewtype == 'Task'){
                    posmy= 'right center';
                    posat= 'left center';
                }else if(viewtype == 'SubTask'){
                    posmy= 'right center';
                    posat= 'left center';
                }else{
                    posat= 'right center';
                    posmy= 'left center';
                }
                
                $(element).qtip({
                    show: {
                        ready: true,
                        event: 'click',
                        modal: true,
                        solo:false,
                        delay: 100,
                    },
                    hide: 'click',
                    content: {
                        text: 'Loading...'
                    },
                    position: {
                        my: posmy, 
                        at: posat,  
                        viewport: $(window),
                        adjust: {
                            method: 'none shift',
                            //y:70
                        },
                        effect: false
                    },

                    style: {
                        classes: 'qtip-light qtip-rounded qtip-font',
                        width: '700',
                        //height: '500',
                        tip: {
                            corner: true,
                            width: 40,
                            height: 40,
                            //offset: 70
                        }
                    },

                    events: {
                        hide: function (event, api) {

                            var oEvent = event.originalEvent;
                            
                            if(oEvent && $(oEvent.target).closest('.flatpickr-calendar').length) {
                                event.preventDefault();
                            }else if(oEvent && $(oEvent.target).closest('.swal2-container').length) {
                                event.preventDefault();
                            }else if(oEvent && $(oEvent.target).closest('.qtip-client').length) {
                                event.preventDefault();
                            }else{
                                $(this).qtip('destroy');
                                $( 'body').unbind( "keydown.qtipProperties" );
                            }
                            
                        },
                        render: function(event, api) {

                            var _this=this;
                            $('body').on('keydown.qtipProperties', function(event) {
                                if(event.keyCode === 27) {
                                    api.hide(event);
                                }
                            });
                            
                        },
                        show: function(event, api) {
                            $('.dd-parent').css('backgroundColor','');
                            $('.todoRow'+projectID).css('backgroundColor','lavender');
                            var _this=this;
                            
                            // --- get property info
                            var requestass = $.ajax({
                                url: base_url+"todo/getPropertyInfoHD",
                                method: 'POST',
                                data: {
                                    "todo_serial":projectID,
                                    "viewtype":viewtype,
                                    "parentID":parentID,
                                    "org_id": "<?php echo $org_id; ?>",
                                    "user_id": "<?php echo $id; ?>"
                                },
                                dataType: 'JSON'
                            });
                            
                            requestass.done(function(data){
                                var taskdata = data.all_todos[0];
                                var thishprojectid = $("#newTaskInput").attr('data-projectid');
                                if(taskdata.Status == 'completed'){
                                    sty1 = 'block';
                                    sty2 = 'none';
                                }else{
                                    sty1 = 'none';
                                    sty2 = 'block';
                                }

                                var floatingDiv =  '<div data-attr="'+viewtype+projectID+'" id="backDiv'+viewtype+projectID+'">';
                                    floatingDiv += '    <div id="Pro'+projectID+'">';
                                    floatingDiv += '        <div class="panel panel-default" style="border: none;margin-bottom: 0px;margin-left: -15px;margin-right: -15px;">';
                                    floatingDiv += '            <div class="panel-heading customSelect" style="height:103px;">';
                                    floatingDiv += '                <div class="icon-check iconGray garay iconGrayWS'+taskdata.Id+'"  onClick="makeCompleteWS(' + taskdata.Id + ',\'none\',\'Task\');" id="iconGray' + taskdata.Id + '" style="display:'+sty2+';position: absolute;float: left;" ></div>';
                                    floatingDiv += '                <div class="icon-check iconGreen blue iconGreenWS'+taskdata.Id+'" onClick="makeCompleteWS(' + taskdata.Id + ',\''+taskdata.Status+'\',\'Task\');" id="iconGreen' + taskdata.Id + '" style="display:'+sty1+';position: absolute;float: left;" ></div>';
                                    floatingDiv += '                <span class="proDivname" style="margin-top:0px;float: left;margin-left: 4%;">';
                                    floatingDiv += '                    <span id="todo_name_text'+projectID+'" class="task-properties">'+taskdata.Title+'</span>';
                                    floatingDiv +='                     <div class="filterDiv">';
                                    floatingDiv +='                         <span class="pull-right filter"><i class="fa fa-paperclip hvr-glow clasI customTaskImg" aria-hidden="true" data-type="attach" id="comAttahID" onclick="attacher()"></i></span>';
                                    floatingDiv +='                     </div>';
                                    floatingDiv +='                     <div><a class="dropdown-toggle procopyIMG hvr-glow clasI" data-toggle="dropdown"><img style="width: 107% !important;" src="'+base_url+'asset/icons/proCopy.png"></a>';
                                    floatingDiv +='                         <ul class="dropdown-menu pull-right" style="margin-top: 40px;padding-top:0px;position: absolute;top: 0px;">';
                                    floatingDiv +='                             <li style="background-color: #6d6a69;" class="dropdown-menu-header">Projects:</li>';
                                    floatingDiv +='                             <div class="arrow-top-right"></div>';
                                    $.each(allprojects, function (key, value) {
                                        floatingDiv+='                          <li onclick="convert2Task('+projectID+','+value.Id+')"><a href="#">'+value.Title+'</a></li>';
                                    });
                                    floatingDiv +='                         </ul></div>';
                                    floatingDiv +='                     <i class="fa fa-trash hvr-glow clasI" aria-hidden="true" onclick="fun_delTodo('+projectID+',\''+viewtype+'\')" style="margin-top: -6px;font-size: 14px;right: 32px;position: absolute;"></i>';
                                    floatingDiv += '                    <i class="fa fa-close  hvr-glow clasI" aria-hidden="true" onClick="$(\'.qtip\').hide();$(\'#qtip-overlay\').hide();" style="color: red;right: -1px;position: absolute;cursor: pointer; margin-top: -6px;font-size: 14px;"></i>';
                                    floatingDiv += '                    <span class="todo-createdby">';
                                    floatingDiv += '                        <span style="padding: 6px 0px 6px 0px;margin-top: 8px;">Created By: '+taskdata.creator_name+' On <span id="projectStDt'+projectID+'">'+moment(taskdata.CreatedDate).format('MMM DD YYYY')+'</span>';
                                    floatingDiv += '                    </span>';
                                    floatingDiv += '                    <span class="cusDue"> Start Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_start()" class="proInputText2" placeholder="Start Date" id="projectstartDateT'+projectID+'" value="'+moment(taskdata.Startdate).format('MMM DD YYYY')+'"></span>';
                                    floatingDiv += '                    <span class="cusDue"> Due Date: <i class="fa fa-calendar"></i> <input type="text" data-c="1"  name="projectEnddate" onclick="togglecalendar_end()" class="proInputText2" placeholder="Due Date" id="projectendtDateT'+projectID+'" value="'+moment(taskdata.Enddate).format('MMM DD YYYY')+'"></span>';
                                    floatingDiv += '                </span>';
                                    floatingDiv +='                 <span style="margin-top: 5px;width:100%;font-size: 11px;font-family: NavigateFont";" class="pull-left properDu">';
                                    floatingDiv +='                     <span style="margin-left: 0%;" class="pull-left duSpan">';
                                    floatingDiv +='                         <span style="float:left;margin-top: 5px;margin-right: 5px;" onClick="TaskUserList(\'TaskCoArea\',this,' + taskdata.Id + ',\'1\')">Co-owners:</span>';
                                    floatingDiv +='                         <span style="float:left;margin-top: 0px;" id="TaskCoArea'+taskdata.Id+'"></span>';
                                    // <i class="fa fa-plus btn btn-primary btn-circle btnTag" onClick="TaskUserList(\'TaskCoArea\',this,' + taskdata.Id + ',\'1\')" id="addBtnTagTaskCoArea'+taskdata.Id+'"></i>
                                    floatingDiv +='                     </span>';
                                    floatingDiv +='                     <span style="margin-left: 19%;" class="pull-left  duSpan">';
                                    floatingDiv +='                         <span style="float:left;margin-top: 5px;margin-right: 5px;" onClick="TaskUserList(\'TaskMemArea\',this,' + taskdata.Id + ',\'2\')">Members:</span>';
                                    floatingDiv +='                         <span class="pull-left" id="TaskMemArea'+taskdata.Id+'"></span>';
                                    // <i class="fa fa-plus btn btn-primary btn-circle btnTag"  id="addBtnTagTaskMemArea'+taskdata.Id+'"></i>
                                    floatingDiv +='                     </span>';
                                    floatingDiv +='                     <span style="float: right;margin-top: 2px;margin-left: 1%;" class="duSpan statusCustomClass" >';
                                    floatingDiv +='                         <span style="float: left;" >Status: </span>';
                                    floatingDiv +='                         <span class="pull-left taskStatusLi'+taskdata.Id+'  dt-todostatus" id="taskStatusLi'+taskdata.Id+'" data-type="'+taskdata.Type+'" data-serial="'+taskdata.Id+'" data-status="'+taskdata.Status+'" onClick="qtipCustomStatus(this,'+taskdata.Id+',\''+taskdata.Status+'\')" >'+taskdata.Status+'</span>';
                                    floatingDiv +='                     </span>';
                                    floatingDiv +='                 </span>';
                                    floatingDiv += '            </div>';
                                    floatingDiv += '            <div class="panel-body" style="padding-top: 0px;">'+tabsDesignProject(projectID,viewtype,parentID,taskdata,data)+'</div>';
                                    floatingDiv += '        </div>';
                                    floatingDiv += '    </div>';
                                    floatingDiv += '</div>';


                                api.set('content.text', floatingDiv);
                                $.each(thisProject, function(i,val){
                                    //console.log(val);
                                    $('.filterUpdate').append('<li class="FILETYPEDYN" onclick="filter(\''+val+'\')"><a href="javascript:void(0);"><i class="fa fa-circle-o MAIN '+val+'" id="'+val+'"></i> '+val+'</a></li>');
                                });

                                if(taskdata.Status == 'none'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                                }else if(taskdata.Status == 'in progress'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','BLUE');
                                }else if(taskdata.Status == 'completed'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','GREEN');
                                }else if(taskdata.Status == 'on hold'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                                }else if(taskdata.Status == 'waiting for feedback'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','ORANGE');
                                }else if(taskdata.Status == 'canceled'){
                                    $("#taskStatusLi"+taskdata.Id).css('color','RED');
                                }else{
                                    $("#taskStatusLi"+serial).css('color','#6EA7F2');
                                }

                                getTagAjaxTaskCO(taskdata.Id,'Task');
                                getTagAjaxTask(taskdata.Id,'Task');

                                
                                $('#projectDescriptionT').text(data.detail[0].Description);
                                $('#projectstartDateT'+projectID).val(moment(data.detail[0].Startdate).format('MMM-DD-YYYY HH:mm:ss'));
                                $('#projectendtDateT'+projectID).val(moment(data.detail[0].Enddate).format('MMM-DD-YYYY HH:mm:ss'));
                                $('#projectDurationT').val(data.detail[0].Duration);
                                $('#todo_name_text'+projectID).html(data.detail[0].Title);
                                
                                

                                
                                

                                flatpick_start = $("#projectstartDateT"+projectID).flatpickr({
                                    //inline: true, 
                                    enableTime : true,
                                    minDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
                                    maxDate: moment(taskdata.Enddate).format('MMM-DD-YYYY HH:mm:ss'),
                                    dateFormat: 'M-d-Y H:i:S',
                                    defaultDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
                                    clickOpens: false,
                                    onChange: function(selectedDates, dateStr, instance) {
                                        thisValue(selectedDates[0],taskdata.Id,'projectstartDateT','duration','task');
                                        flatpick_start.close();
                                    }
                                    
                                });
                            
                                flatpick_end = $("#projectendtDateT"+projectID).flatpickr({
                                    //inline: true, 
                                    enableTime : true,
                                    minDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
                                    dateFormat: 'M-d-Y H:i:S',
                                    clickOpens: false,
                                    onChange: function(selectedDates, dateStr, instance) {
                                        thisValue(selectedDates[0],taskdata.Id,'projectendtDateT','duration','task');
                                        flatpick_end.close();
                                    }
                                });
                                
                                $('.flatpickr-calendar').addClass('dateIsPicked').removeClass('arrowTop');
                                
                                
                            });
                        
                        },
                        
                        
                    },
                    
                });
            }
        }
    
        function fun_delUni(ID){
            
            if($('#itemDeleteStatus'+ID).data('itemstatus')=='completed'){
                
                swal({
                    title: 'Unable to delete',
                    text: "Completed To-Do cannot be deleted !",
                    type: 'info'
                });

            }else{

                swal({
                    title: 'Are you sure?',
                    //text: "This to-do will be deleted permanently!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    
                    var request = $.ajax({
                        url: base_url+"projects/deleteItem",
                        method: 'POST',
                        data: {
                            ID:ID
                        },
                        //dataType: 'JSON'
                    });
                    request.done(function(response){
                       
                        // console.log($(".notifationDel").length);

                        if(response.msg == 'Fail'){
                            swal({
                                title: 'Unable to delete',
                                text: "Please contact with project creator",
                                type: 'info'
                            });
                        }else{
                            if($(".notifationDel").length > 1){
                                $('#clickDiv'+ID).slideUp(300, function(){ $(this).remove();}); 
                                $('.backDiv').remove();
                                $('.noBorder').removeClass('border'); 
                                $("#myProjectOriginal").html("");
                                $("#myProjectImported").html("");
                                getAllProject();
                                $("#newTaskInput").focus();
                            }else{
                                
                                $('.backDiv').remove();
                                $('.noBorder').removeClass('border');
                                $('.flatpickr-calendar').removeClass('open');
                                $("#myProjectOriginal").html("");
                    $("#myProjectImported").html("");
                                $("#mainProjectArea").css('display','none');
                                $("#pronameSpan").text("");
                                
                                getAllProject();
                            }
                        }
                    });
                    request.fail(function(response){
                        console.log(response);
                    });
                });
            }
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

        function countsabtask(pro_id){
            var totalSabtask = 0;
            
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/subtaskListNew',
                type: 'POST',
                data: {
                    taskID: pro_id,
                    <?php echo (isset($shared_activity_id))?"id: ".$id.",":""; ?>
                    <?php echo (isset($shared_activity_id))?"org_id: '".$org_id."',":""; ?>
                    <?php echo (isset($shared_activity_id))?"stid: ".$share_subtask_id.",":""; ?>
                },
                dataType: "JSON",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    //console.log(data_st);
                    
                    totalSabtask = data_st.allSubTask.length;
                    
                    subtaskList.push({'TI':pro_id,'TT':totalSabtask});

                    if(totalSabtask > 0){
                        $("#subTaskcountbtnValue"+pro_id).html('<button  style="width: 4%;padding-left: 0%;" class="bg-color-blueDark txt-color-greenDark">'+totalSabtask+' <i class="fa fa-caret-down lolDo" id="subTaskcountbtn' + pro_id + 'i"></i></button>');
                    }else{
                        $("#subTaskcountbtnValue"+pro_id).html('');
                        $("#subTaskcountbtn"+pro_id+"DIV").hide();
                        $("#subTaskcountbtn"+pro_id).hide();
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
        

        

        
        function toolHS(value){
            
            if($("#"+value).is(":visible")){
                $("#"+value).hide();
                $("#"+value+"i").hide();
            }else{
                $("#"+value).show();
                $("#"+value+"i").show();
            }
        }

        function projectDateUpdate(startdate,enddate,taskId,target){
            //console.log(startdate+"<><>"+enddate);
            $.ajax({
                url: '<?php echo site_url(); ?>Projects/updateProjectDate',
                type: 'POST',
                data: {
                    startdate:startdate,
                    enddate:enddate,
                    TypeID:taskId
                },
                dataType: "JSON",
                success: function (data_st, textStatus) {
                    //console.log(data_st);
                    var proid = $("#newTaskInput").attr('data-projectid');
                    setCookie('selectedTask',taskId,1);
                    if(data_st.msg != 'TIMELESS'){
                        
                        if(target == "projectStartDate")
                            $("#"+target+taskId).val(moment(startdate).format('MMM D, YYYY'));
                        else
                            $("#"+target+taskId).val(moment(enddate).format('MMM D, YYYY'));
                    }else{
                        if(target == "projectStartDate")
                            swal("Oops...", "Your selected date has preceded the project end date.", "error");
                        else
                            swal("Oops...", "Your selected date has preceded the project start date.", "error");

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

        function thisValue(thisDate,taskId,targetID,durationID,type){
            
            
            if(targetID == 'startDatein'){
                
                var startdate =  moment($("#startDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate = moment($("#endDateinNew"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");

            }else if(targetID == 'endDatein'){
                
                var startdate =  moment($("#startDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#endDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");

            }else if(targetID == 'endDateinNew'){
                
                var startdate =  moment($("#startDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#endDateinNew"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");

            }else if(targetID == 'SubstartDatein'){

                var startdate =  moment($("#SubstartDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#SubendDateinNew"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");

            }else if(targetID == 'SubendDatein'){

                var startdate =  moment($("#SubstartDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#SubendDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
            }else if(targetID == 'SubendDateinNew'){

                var startdate =  moment($("#SubstartDatein"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#SubendDateinNew"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
            }else if(targetID == 'projectstartDateT'){

                var startdate =  moment($("#projectstartDateT"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#projectendtDateT"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
            
            }else if(targetID == 'projectendtDateT'){

                var startdate =  moment($("#projectstartDateT"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
                var enddate =  moment($("#projectendtDateT"+taskId).val()).format("YYYY-MM-DD HH:mm:ss");
            }

            //$("#dueDateSpan"+taskId).css('color','#808080');
            


            var now = moment(startdate); //todays date
            var end = moment(enddate); // another date

            var duration = moment.duration(end.diff(now));
            var days = duration.asDays();
            if(days >= 0) {
               
             //          console.log(durationID);
             // console.log(taskId);

             $("#"+durationID+taskId).val(days);

            $.ajax({
                url: '<?php echo site_url(); ?>Projects/updateTaskDate',
                type: 'POST',
                data: {
                    startdate:startdate,
                    enddate:enddate,
                    taskID:taskId,
                    this_type:type,
                    targetID:targetID 
                },
                    dataType: "JSON",
                    beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st, textStatus) {
                    console.log(data_st);
                    var proid = $("#newTaskInput").attr('data-projectid');
                    setCookie('selectedTask',taskId,1);
                    if(data_st.msg != 'TIMELESS'){

                        $("#dueDateSpan"+taskId).text(moment(enddate).format('MMM D YYYY'));
                        $("#datewiseserial"+taskId).text(moment(enddate).format('MMM D, YYYY'));
                        //$(".flatpickr-calendar").css("visibility","hidden");
                        //$("#taskInsertDiv").text("");
                        $("#sorryDiv").hide();
                        $("#newTaskInput").val("");
                        // if(targetID == 'SubendDateinNew' || targetID == 'SubstartDatein' || targetID == 'SubendDatein'){
                        //     //nothing
                        // }else{
                            //fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All'); 
                        //}
                        
                    }else{
                        if(type == 'task'){
                            var ttype = "project";
                        }

                        if(type == 'subtask'){
                            ttype = "task";
                        }
                        swal("Oops...", "Your selected due date has preceded the "+ttype+" start date.", "error");
                        //fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');

                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
         }else{
            if(targetID.indexOf('start')>-1) var param1='start',param2='due',param3='exceeded';
            if(targetID.indexOf('end')>-1) var param1='due',param2='start',param3='preceded';
            //fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
            //swal("Oops...", "Your selected "+param1+" date has "+param3+" the "+type+" "+param2+" date.", "error");
        }
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
        $('#openQtipProperty'+taskID).trigger('click');
    }

    function makeActive2(taskID){
        $('#SubopenQtipProperty'+taskID).trigger('click');
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
            setCookie('selectedTask',taskdataid,1);
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
            
            var SubTaskcontainer = $(".sendForSaveSubTask");
            
            if(!SubTaskcontainer.is(e.target) && SubTaskcontainer.has(e.target).length === 0){
                if($(".sendForSaveSubTask").is(':visible')){
                    openInput($("#subtaskinid").val());
                }
                
            }

            var container = $('.floting_box');
            var container2 = $('#myProjectDivList');
            var container3 = $('#ui-datepicker-div');
            var container4 = $('.select2-results__option');
            var container5 = $('.swal2-modal');
            var container6 = $('.qtip-content');
            var container7 = $('.flatpickr-calendar');
            var container8 = $('.itemstatus');
            var container9 = $('.floting_box_right');
            var container10 = $('.ekko-lightbox');
            var container11 = $('.taskComments');
            var container12 = $('.clickontitle');
            
            
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
                                        if  (!container8.is(e.target) && container8.has(e.target).length === 0)
                                        {
                                            if  (!container9.is(e.target) && container9.has(e.target).length === 0)
                                            {
                                                if  (!container10.is(e.target) && container10.has(e.target).length === 0)
                                                {
                                                    if  (!container11.is(e.target) && container11.has(e.target).length === 0)
                                                    {
                                                        if  (!$(e.target).hasClass('clickontitle') && !$(e.target).hasClass('Onlieline') )
                                                        {
                                                            $('.backDiv').remove();
                                                            $('.noBorder').removeClass('border');
                                                            $('.flatpickr-calendar').removeClass('open');
                                                            $("#chkforStory").val("");
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script type="text/javascript">
        $('body').delegate('#saveDrawing', 'click',function() {
            
            var formData = new FormData(document.getElementsByName('projectdrawing')[0]);
            
            //console.log('Display the key/value pairs');
            for (var pair of formData.entries())
            {
             //console.log(pair[0]+ ', '+ pair[1]); 
            }

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
                    //console.log(data_st);
                    if(data_st.newid > 0){
                        swal("Good Job!!!", "Successfully saved", "success");
                         fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
                         CloseFlotDiv();
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

     <script type="text/javascript">
        function qtipTaskByUser(element,pro_id,user_id,type_id){

            if($(element).qtip('api') == undefined){
            
                $(element).qtip({
                    
                    show: {
                        //event: 'click',
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
                        // adjust: {
                        //         method: 'none shift'
                        //     },
                        
                    },
                    style: {
                        classes: 'qtip-light qtip-rounded qtip-font',
                        //width: '300'
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
                                //console.log('response');
                                //console.log(response);
                                // if(response.task_detail==false){
                                //     api.set('content.text', '<div style="padding:5px">No tasks found</div>');
                                // }else{

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
                                            if(response.task_detail[k].length>0){
                                            qtc+='<table class="tbl-user-task">';
                                            qtc+='<thead>';
                                            qtc+='<tr><td>Task name</td><td>Status</td></tr>';
                                            qtc+='</thead>';
                                            qtc+='<tbody>';
                                            
                                                
                                                $.each(response.task_detail[k], function(k,v){
                                                    qtc+='<tr><td>'+v.Title+'</td><td>'+v.Status+'</td></tr>';

                                                });
                                            }

                                            qtc+='</tbody>';
                                            qtc+='</table>';
                                            qtc+='</div>';
                                        });
                                    }else{
                                        
                                        //console.log(crm_emp);
                                        //console.log(response.user_detail[0].assignBy);
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

                                        if(response.task_detail.length>0){
                                        qtc+='<table class="tbl-user-task">';
                                        qtc+='<thead>';
                                        qtc+='<tr><td>Task name</td><td>Status</td></tr>';
                                        qtc+='</thead>';
                                        qtc+='<tbody>';
                                        
                                            $.each(response.task_detail, function(k,v){
                                                qtc+='<tr><td>'+v.Title+'</td><td>'+v.Status+'</td></tr>';

                                            });
                                        }
                                        qtc+='</tbody>';
                                        qtc+='</table>';
                                        qtc+='</div>';
                                    }
                                    api.set('content.text', qtc);
                                //}

                                
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
    </script>
    <script type="text/javascript">
        function qtipByUser(element,pro_id,user_id,type_id){

            if($(element).qtip('api') == undefined){
            
                $(element).qtip({
                    
                    show: {
                        //event: 'click',
                        ready:true,
                    },
                    hide: {
                        event: 'click mouseleave',

                    },
                    
                    content: {text: 'Loading...' },
                    
                    position: {
                        at: 'right center',  
                        my: 'left center', 
                        viewport: $(window),
                        // adjust: {
                        //         method: 'none shift'
                        //     },
                        
                    },
                    style: {
                        classes: 'qtip-light qtip-rounded qtip-font',
                        //width: '300'
                    },
                    
                    events: {
                        hide: function (event, api) {
                            
                            $(this).qtip('destroy');
                            $( 'body').unbind( "keydown.qtipTaskByUser" );
                            
                        },
                        show: function(event, api) {

                            var requestass = $.ajax({
                                url: base_url+"projects/qtipUser",
                                method: 'POST',
                                data: {
                                    "user_id":user_id
                                },
                                dataType: 'JSON'
                            });
                            
                            requestass.done(function(response){
                                var qtc='';
                                qtc+='<div style="padding:5px">'
                                qtc+='<div class="usr-card">';
                                qtc+='<img src="'+base_url+"asset/img/avatars/"+response.user_detail[0].img+'" alt="'+response.user_detail[0].display_name+'" width=50 height=50>';
                                qtc+='<div class="usr-card-content">';
                                qtc+=   '<h3 style="padding:3px;font-size:14px">'+response.user_detail[0].full_name+'</h3>';
                                qtc+= '<p style="padding:3px;font-size:12px" >'+response.user_detail[0].email+'</p>';
                                qtc+='</p>';
                                qtc+='</div>';
                                qtc+='</div>';

                                
                                qtc+='</div>';
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
    </script>
    
    <?php include("template/dashboard_report_script.php"); ?>
    <?php include("Contacts/contact_script.php"); ?>

</body>
</html>



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
   

    function togglecalendar_startPro(serial){
        
        $.each(arr_fpstart,function(k,v){
            if(v.Id == serial){
                //console.log(v);
                v.date.toggle();
            }
        })
        
    }

    function togsubcalstart(serial){
        
        $.each(arr_sub_fpstart,function(k,v){
            if(v.Id == serial){
                v.date.toggle();
            }
        })
        
    }

    function togsubcalend(serial){
        
        $.each(arr_sub_fpend,function(k,v){
            if(v.Id == serial){
                v.date.toggle();

                if(v.date.days.lastChild.className == 'nddNbtn'){
                    $("#flatpickrBtn"+serial).remove();
                }else{
                    $('.'+v.date.days.className).append('<button class="nddNbtn" id="flatpickrBtn'+serial+'" onclick="setnoduedate('+serial+',\'SubTask\')">No Due Date</button>');
                }
            }
        })
        
    }
    
    function togglecalendar_endPro(serial){
        //$(".nddNbtn").remove();
        $.each(arr_fpend,function(k,v){
            if(v.Id == serial){
                v.date.toggle();
                if(v.date.days.lastChild.className == 'nddNbtn'){
                    $("#flatpickrBtn"+serial).remove();
                }else{
                    $('.'+v.date.days.className).append('<button class="nddNbtn" id="flatpickrBtn'+serial+'" onclick="setnoduedate('+serial+',\'Task\')">No Due Date</button>');
                }
                
            }
        })
    }

    function setnoduedate(id,type){
        var enddate = "0000-00-00";
        $.ajax({
            url: '<?php echo site_url(); ?>Projects/updateTaskNoDueDate',
            type: 'POST',
            data: {
               enddate:enddate,
               taskID:id,
               this_type:type 
            },
            dataType: "JSON",
            beforeSend: function () {
                //console.log("Emptying");
            },
            success: function (data_st, textStatus) {
                $("#datewiseserial"+id).text(moment(enddate).format('MMM D, YYYY'));
                $(".flatpickr-calendar").css("visibility","hidden");
                $("#taskInsertDiv").text("");
                $("#sorryDiv").hide();
                $("#newTaskInput").val("");
                fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    
    $(document).on('change keyup mousewheel','#projectDuration',function(e){
        
        var taregtid = e.target.id;
        var serial = $('#'+taregtid).data('id');
        
        var sel_date = moment($('#projectstartDate'+serial).val()).add($(e.currentTarget).val(), 'days').format('YYYY-MM-DD HH:mm:ss');
        
        $('#projectendtDate'+serial).val(sel_date);
        
        //$("#projectendtDate"+serial).setDate(sel_date);
        
    });
    
    $(document).on('click','#projectDuration',function(e){
        
        $(e.currentTarget).select();
    });

    $(document).on('click','.clickontitle',function(e){
        // console.log(e);
        
        if($(e.currentTarget).attr('id') != 'pronameSpan'){
            if(!$(e.currentTarget).hasClass('sline')){
                var serial = $(e.currentTarget).attr('data-serial');
                $(e.currentTarget).attr('contenteditable','true').addClass('sline');

                $(e.currentTarget).css('text-overflow','initial');
                $(".slineSS").css('white-space','normal');
                
                //$('body').append('<div class="backDivPro"></div>');
                $(e.currentTarget).focus(); 
            }
        }else{
           if(!$(e.currentTarget).hasClass('Onlieline')){
                var margin = $(e.currentTarget).css('margin-left').split('.');
                

                var serial = $(e.currentTarget).attr('data-serial');
                $("#ribbon").addClass('rib');
                $(e.currentTarget).attr('contenteditable','true').addClass('Onlieline');
                $(e.currentTarget).css('text-overflow','initial');
                if( parseInt(margin[0]) > 400){
                    $(e.currentTarget).addClass('CusOnlieline');
                }
                // $(".tagbtnDivclass").hide();
                //$(e.currentTarget).focus(); 
                placeCaretAtEnd($(e.currentTarget));

            } 
        }
    });
    
    function saveText(serial,e){
        var request = $.ajax({
            url: base_url+"todo/updateTodoNameHD",
            method: 'POST',
            data: {
                "todoname": $(e.currentTarget).text(),
                "todoserial": serial,
            },
            dataType: 'JSON'
        });
        
        request.done(function(response){
            


            
        });
    }

    
    
    $(document).on('blur','.clickontitle',function(e){
        var serial = $(e.currentTarget).attr('data-serial');
        if($(e.currentTarget).text() !=""){
            
            if($("#chkforStory").val() == 'Task' || $("#chkforStory").val() == 'SubTask'){
                //console.log($("#chkforStory").val());
                saveTitleWithStory(serial,e,$("#chkforStory").val());
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('single-line');
                $(".task-properties .fa-pencil").show();
                $('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');
                $("#taskdestext"+serial).text($(e.currentTarget).text());
                $("#subtasktitle"+serial).text($(e.currentTarget).text());
            }else{
                saveText(serial,e);

                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('sline');
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('Onlieline');
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('CusOnlieline');

                $(".slineSS").css('white-space','nowrap');
                $("#ribbon").removeClass('rib');
                $('.backDivPro').remove();
                $('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');
                $("#taskdestext"+serial).text($(e.currentTarget).text());
                $("#subtasktitle"+serial).text($(e.currentTarget).text());
                $(".tagbtnDivclass").show();
            }
        }
    });
    
    $(document).on('keydown','.clickontitle',function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            $(e.currentTarget).blur();
            //$('.clickontitle').trigger('blur');
            //saveTodoText(serial,e);
        }
        
    });

    $(document).on('mouseover', '.subtaskDetailDive',function(e){
        $(this).find(".datepicker").css('background','#f4f4ff');
        $(this).find(".duarationClass").css('background','#f4f4ff');
    });

    $(document).on('mouseover', '.proName, .imgrowTask, .icon-check, .open_newpro1',function(e){
        $(this).closest( ".taskDetailDive " ).find(".taskRowCus").css('border-left','3px solid #18c925');
        $(this).closest( ".taskDetailDive " ).find(".hover").css('background','#f4f4ff');
        $(this).closest( ".taskDetailDive " ).find(".check .datepicker").css('background','#f4f4ff');
        $(this).closest( ".taskDetailDive " ).find(".check .duarationClass").css('background','#f4f4ff');
    });

    $(document).on('mouseout', '.subtaskDetailDive',function(e){
        $(".datepicker").css('background','#ffffff');
        $(".duarationClass").css('background','#ffffff');
    });

    $(document).on('mouseout', '.proName, .imgrowTask, .icon-check, .open_newpro1',function(e){
        $(this).closest( ".taskDetailDive " ).find(".hover").css('background','#ffffff');
        $(this).closest( ".taskDetailDive " ).find(".taskRowCus").css('border-left','3px solid #ffffff');
        $(this).closest( ".taskDetailDive " ).find(".check .datepicker").css('background','#ffffff');
        $(this).closest( ".taskDetailDive " ).find(".check .duarationClass").css('background','#ffffff');
    });

    function pushtimer(selector, timerid){
        if(timerid == 0){
            $( ".pushtimer" ).trigger( "click" );
        }
        $(selector).data('abtimer').st_public_method(timerid);
    }

    function secondsTimeSpanToHMS(s) {
        var h = Math.floor(s/3600); //Get whole hours
        s -= h*3600;
        var m = Math.floor(s/60); //Get remaining minutes
        s -= m*60;
        return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
    }

    function starttimer(selector, uid){
        var curtime = $(selector).text();
        var acctime = secondsTimeSpanToHMS(Number($("#hourtimer"+uid).text())*3600);
        var strstr = acctime.split(":");
        strstr[3] = (Number($("#hourtimer"+uid).text())*3600).toFixed(2);
        if(uid != 0 && curtime != "00:00:00"){
            $(selector).data("abtimer").st_init_again(strstr[0],strstr[1],strstr[2],strstr[3]);
        }else{
            if(uid == 0){
                $(".starttimer").trigger("click");
            }
            else{
                $(selector).abtimer({
                    abtimer_hour: strstr[0],
                    abtimer_minute: strstr[1],
                    abtimer_second: strstr[2],
                    abtimer_total_second: strstr[3]
                });
            }   
        }
        
    }

   

    // swal("chat width", getCookie("feed_div_width"), "success");
</script>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev,subid) {
    ev.dataTransfer.setData("text", ev.target.id);
    ev.dataTransfer.setData("subid", subid);
    ev.dataTransfer.setData("taskid", $(ev.target).closest('.taskDetailDive').attr('data-serial'));
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var subid = ev.dataTransfer.getData("subid");
    var pid=$(ev.target).closest('.taskDetailDive').attr('data-serial');
    var taskid=ev.dataTransfer.getData("taskid");
    // console.log($(ev.target));
    // console.log(data);console.log(subid);
    // console.log(pid);console.log(taskid);

    if(pid==taskid) swal('Unable to move');
    else{

        var request = $.ajax({
            url: base_url+"projects/convertSubtask",
            method: 'POST',

            data: {
                subid: subid,
                pid: pid
            },
            dataType: 'JSON'
        });

        request.done(function(rsp) {
            
            fun_loadfulltable(rsp.HasParentId,'ASC');
        });
    }

    function goPro(value,proname,taskID = false){
        setCookie('project',value,1);
        setCookie('taskid',taskID,1);
        setCookie('projectName',proname,1);
    }

}

$('body').on('click','.cogs_set', function (e) {
    
    if($(e.target).closest( "div" ).find('.cogs_set').selector == '.cogs_set'){
        $(".pointer").attr('aria-expanded',true); 
    }
    
});

</script>

<script type="text/javascript">

   var datatable = $('#report_table').dataTable({
            "pageLength": 5,
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
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


    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });

    $('.tooltipped').tooltip({
        template: '<div class="tooltip foo-tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
    });

    function expandRibbon(){
        $("#ribbon").css('min-height','80px');
        $("#expandRibbon").css('display','none');
        $("#collaspeRibbon").css('display','block');
        $("#pronameSpan").css('float','left');
        $("#pronameSpan").css('font-size','30px');
        $("#pronameSpan").css('text-align','center');
        $("#pronameSpan").css('height','38px');
        $("#pronameSpan").css('margin-top','-5px');
        $("#pronameSpan").css('width','auto');
        $("#pronameSpan").css('width','auto');
        $(".Onlieline").css('width','50%');

        var line_width = $(".breadcrumb li").width();
        var title_widht = $("#pronameSpan").width() + 20;
        $("#pronameSpan").css('width',title_widht);
        var left_margin = (line_width/2) - (title_widht/2);
        $("#pronameSpan").css('margin-left',left_margin);
        $("#customExportDiv").css('display','none');
        $(".ribLi").css('padding-bottom','10px');
    }

    function collaspeRibbon(){
        $("#pronameSpan").css('width','auto');
        var pronameSpanWidth = $("#pronameSpan").width();
        var pronameSpanWidthNew;
        if(pronameSpanWidth > 345){
            pronameSpanWidthNew = '345'; 
        }else{
            pronameSpanWidthNew = pronameSpanWidth
        }
        var cusexppo = parseInt(pronameSpanWidthNew)+ 35;
        $("#pronameSpan").css('width',pronameSpanWidthNew);
        $("#customExportDiv").css('left',cusexppo+'px');

        $("#ribbon").css('min-height','40px');
        $("#collaspeRibbon").css('display','none');
        $("#expandRibbon").css('display','block');
        $("#pronameSpan").css('float','left');
        $("#pronameSpan").css('margin-left','20px');
        $("#pronameSpan").css('font-size','20px');
        $("#pronameSpan").css('text-align','left');

        $("#customExportDiv").css('display','block');
        
        $(".ribLi").css('padding-bottom','10px');

    }

    // $(".ribLi").click(function(e){
    //     $(".ribLi").removeClass("activeOL");
    //     console.log(e.target.id);
    //     console.log($('#'+e.target.id).addClass('activeOL'));
    // });

    $("#import_csv_in").on('change', function() {
        var form_data = new FormData();                  
            form_data.append('file', $('#import_csv_in')[0].files[0]);

        $.ajax({
            url: base_url+"projects/import_file",
            method: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,           
            dataType: 'JSON',
            beforeSend: function () {
                $('body').append('<div class="backDivPro"></div>');
                $('body').append('<img id="ajaxloder" src="'+base_url+'asset/img/ajax-loader.gif"/>');
            },
            success: function (response, textStatus) {
                setCookie('project',response.activityid,1);
                //$("#myModal").modal('hide');
                $('.backDivPro').remove();
                $('#ajaxloder').remove();

                swal('Import Completed');
                
                $('.backDiv').remove();
                $('.noBorder').removeClass('border');
                $('.flatpickr-calendar').removeClass('open');
                $("#myProjectOriginal").html("");
                $("#myProjectImported").html("");
                $("#mainProjectArea").css('display','none');
                $("#pronameSpan").text("");
            
                getAllProject();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

        this.value=null; return false;
    });

    function importNewReport(data){
        var created_date=moment(data[1]).format('MMM-DD-YYYY');
        var completed_date=moment(data[2]).format('MMM-DD-YYYY');
        var modify_date=moment(data[3]).format('MMM-DD-YYYY');
        var due_date=moment(data[6]).format('MMM-DD-YYYY');

        var newrow  =' <tr class="taskRow taskRowCus">'
        
                    + '<td title="'+data[0]+'">'+data[0]+'</td>'
                    + '<td>'+(created_date != "Invalid date"  ? created_date : "")+'</td>'
                    + '<td>'+(completed_date != "Invalid date" ? completed_date : "")+'</td>'
                    + '<td>'+(modify_date != "Invalid date" ? modify_date : "")+'</td>'
                    + '<td>'+data[4]+'</td>'
                    + '<td>'+(data[5] != null ? data[5] : "")+'</td>'
                    + '<td>'+(due_date != "Invalid date" ? due_date : "")+'</td>'
                    + '<td></td>'
                    + '<td>'+(data[8] != null ? data[8] : "")+'</td>'
                    + '<td>'+data[9]+'</td>'
                    + '<td>'+data[10]+'</td>'
                    +'</tr>';

        return $(newrow);
        
    }

    function process_imports(){
        //console.log(datatable.column( 9 ).data().unique().toArray());

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
            //console.log(response);
            setCookie('project',response.activityid,1);
            $("#myModal").modal('hide');
            swal('Import Completed');
            
            $('.backDiv').remove();
            $('.noBorder').removeClass('border');
            $('.flatpickr-calendar').removeClass('open');
            $("#myProjectOriginal").html("");
            $("#myProjectImported").html("");
            $("#mainProjectArea").css('display','none');
            $("#pronameSpan").text("");
            
            getAllProject();

        });
        request.fail(function(response){
            console.log(response.responseText);

        });

    }

    
    $( "body" ).delegate( ".qtipCloseDes", "click", function() {
        $('.qtip').remove();
    });

    function EditStatus(statusID){
        edit();
        $("#commentinputNEW").attr('data-action',statusID);
        $(".taskComments .note-editable").text($("#statusCmntID"+statusID).text());
    }

    function edit() {
        $('.summernote').summernote({
            height: 40,
            focus: true,
            placeholder: '',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['save',['save']],
                ['cancel',['cancel']]
            ]
        });
    }

    $('div').delegate('.summernote','focus',function(event){
        $('.note-editor').show();
        $("#commentinputNEW").hide();
    });

    $('div').delegate('.note-editable','focus',function(event){
        
        $(".note-editable").css('height','100px');
        $("#attachListDivCommnet").css('margin-top','14%');
        $("#attachListDivCommnet").css('min-height','327px');
        $(".taskComments .note-editable").text('');
    });

    $('div').delegate('.note-editable','blur',function(event){
        event.stopImmediatePropagation();
        if($(event.target).find('.note-btn-group').selector == '.note-btn-group'){
            //do nothing
        }else{
            $('.summernote').summernote('destroy');
            $("#commentinputNEW").show();
            $("#commentinputNEW").css('height','40px');
            $("#attachListDivCommnet").css('margin-top','0%');
            $("#attachListDivCommnet").css('min-height','440px'); 
        }
        
        //$(".note-editable").text('Write a status update for this project');
    });

    
    (function(factory){
        if(typeof define==='function'&&define.amd){
            define(['jquery'],factory)
        }else if(typeof module==='object'&&module.exports){
            module.exports=factory(require('jquery'));
        }else{
            factory(window.jQuery)
        }
    }
    (function($){

        $.extend(true,$.summernote.lang,{
            'en-US':{
                save:{
                    tooltip:'Post Status'
                }
            }
        });

        $.extend($.summernote.options,{
          save:{
            icon:'<i class="fa fa-floppy-o note-icon"></i> Post'
          }
        });

        $.extend($.summernote.plugins,{
            'save':function(context){
                var self=this;
                var ui=$.summernote.ui;
                var $note=context.layoutInfo.note;
                var $editor=context.layoutInfo.editor;
                var $editable=context.layoutInfo.editable;
                var options=context.options;
                var lang=options.langInfo;

                context.memo('button.save',function(){
                    var button=ui.button({
                        contents:options.save.icon,
                        tooltip:lang.save.tooltip,
                        click:function(){
                            saveStatusPost();
                        }
                    });
                    return button.render();
                });
            }
        });
    })
    
    );

    (function(factory){
        if(typeof define==='function'&&define.amd){
            define(['jquery'],factory)
        }else if(typeof module==='object'&&module.exports){
            module.exports=factory(require('jquery'));
        }else{
            factory(window.jQuery)
        }
    }
    
    (function($){
        $.extend(true,$.summernote.lang,{
            'en-US':{
                cancel:{
                    tooltip:'Cancel'
                }
            }
        });
        $.extend($.summernote.options,{
          cancel:{
            icon:'<i class="fa fa-eye-slash note-icon"></i> Cancel'
          }
        });
        $.extend($.summernote.plugins,{
            'cancel':function(context){
                var self=this;
                var ui=$.summernote.ui;
                var $note=context.layoutInfo.note;
                var $editor=context.layoutInfo.editor;
                var $editable=context.layoutInfo.editable;
                var options=context.options;
                var lang=options.langInfo;
                context.memo('button.cancel',function(){
                    var button=ui.button({
                        contents:options.cancel.icon,
                        tooltip:lang.cancel.tooltip,
                        click:function(){
                            $('.summernote').summernote('destroy');
                            $("#commentinputNEW").show();
                            $("#commentinputNEW").text('Write a status update for this project');
                            $("#commentinputNEW").css('height','40px');
                            $("#attachListDivCommnet").css('margin-top','0%');
                            $("#attachListDivCommnet").css('min-height','440px');
                        }
                    });
                    return button.render();
                });
            }
        });
    })
    );

    function saveStatusPost(){
        var valuee = $('.summernote').summernote('code');
        var type = $("#commentinputNEW").attr('data-status');
        var action = $("#commentinputNEW").attr('data-action');
        valuee = valuee.replace(/[<]br[^>]*[>]/gi,"");
        //alert(valuee.substring(0, valuee.lastIndexOf("<br>"))); 
        var taskID = $("#taskid").val();
        var projectID = $("#newTaskInput").attr('data-projectid');
        // console.log(valuee+"<><>"+type);
        // alert(taskID);
        if (type == 'TaskCmnt' || type == 'Todo') {
            var typeid = taskID;
            setCookie('selectedTask', taskID, 1);
        } else {
            typeid = projectID;
        }

        if(action == 0 ){
            $.ajax({
                url: '<?php echo base_url(); ?>projects/insertCmntStatus',
                type: 'POST',
                data: {type: type, comment: valuee, projectID: typeid},
                dataType: 'JSON',
                success: function (updated_id) {
                    $("#nocommentImg").remove();
                    $(".css3button").remove();
                    var projectsid = updated_id.activityid;
                    var tabDetail = '';
                    var gtlist = $(".commentgt");
                    $.each(gtlist, function (k, v) {
                        if (($(v).text().trim()).indexOf("Today") > -1) {
                            tabDetail = "alreadytoday";
                            return false;
                        }
                    });
                    if (tabDetail == "alreadytoday")
                        tabDetail = "";
                    else
                        tabDetail = drawCommentGroupTime($.now());

                    var matches = user_name.match(/\b(\w)/g);
                    var acronym = matches.join('');


                    tabDetail +='       <div class="panel panel-default proComm SA ptt'+projectsid+'">';
                    tabDetail +='           <div class="panel-body status">';
                    tabDetail +='               <div class="who clearfix">';
                    tabDetail +='                   <span class="comment_imghover">';
                    
                    // tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
                    tabDetail +='                   <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr">'+acronym+'</span>';
                    tabDetail +='                   <span class="from" style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+user_name+'</span><span class="CusUsrTm"> '+moment().format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                    tabDetail +='                   <span class="from" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+valuee+'</span>';
                    tabDetail +='                   <div class="name dropdown"><b></b>'+
                                                        '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
                                                            '<i class="fa fa-chevron-down pull-right"></i>'+
                                                        '</a>'+
                                                        '<ul class="dropdown-menu pull-right">'+
                                                            '<div class="arrow-top-right"></div>'+
                                                            '<li><a onclick="">Msg Info</a></li>'+
                                                            '<li><a onclick="delComment(\''+projectsid+'\')">Delete</a></li>'+
                                                            // '<li><a onclick="">Forward</a></li>'+
                                                        '</ul>'+
                                                        //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                    '</div>';
                    tabDetail +='               </div>';
                    tabDetail +='           </div>';
                    tabDetail +='       </div>';

                    $("#attachListDivCommnet").prepend(tabDetail);
                    $("#attachListDivCommnet").animate({scrollBottom: $('#attachListDivCommnet').prop("scrollHeight","0px")}, 1000);

                    //$("#commentinput").html("");
                    // $('.note-editor').hide();
                    // $("#commentinput").show();
                    $(".note-editable").text('');
                    if (type == 'Todo') {
                        updateNotyCommenthd(typeid, 'update');
                    }

                },
                error: function (e) {
                    console.log("Line 1204");
                    console.log(e.responseText);
                }
            });
        }else if(action > 0){
            $.ajax({
                url: '<?php echo base_url(); ?>projects/updateStatus',
                type: 'POST',
                data: {comment: valuee, comid: action},
                dataType: 'JSON',
                success: function (resp) {
                    if(resp.msg == 'Done'){
                        $("#commentinputNEW").attr('data-action','0');
                        $("#statusCmntID"+action).html(valuee);
                        $(".taskComments .note-editable").text('');
                    }
                },
                error: function (e) {
                    console.log("Line 1204");
                    console.log(e.responseText);
                }
            });
        }

        
    }


    console.log("Line =======================================");
    $("#taskInsertDivpro").height($(".taskDiv").height() - 30);
    
</script>




    

