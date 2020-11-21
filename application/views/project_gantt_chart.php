<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="<?php echo base_url()."require/plugins/autocomplete/jquery.auto-complete.css"; ?>" media="all" rel="stylesheet" type="text/css" />



<style> 
.trbottomcolor{
    border-bottom:1px solid #CCCCCC;
}
.circle{
    background: #FFF;
    width: 75px;
    height: 75px;
    padding: 15px;
    text-align: center;
    border-radius: 100px;
    border:2px solid #325467;
    float: left;
    color: #000;
}
.hrbar{
    width: 98%;
    height: 20px;
    background: #4e97c2;
    margin: 28px 0 0 2px;
}
.cBtn{
    margin: 0px 5px;
}
button:focus {outline:0 !important;}
.btn:focus{outline:0 !important;}
.col-lg-15 {
    width: 11%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.panel {
    border: 1px solid #3c8dbc;
}
.panel-arra {
    border-color: #3c8dbc !important;
    margin-top: 2%;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

.panel-arra .panel-heading {
    border-color: #3c8dbc;
    color: #fff;
    background-color: #3c8dbc;
}
.panel-heading {
    padding: 1px 0px !important;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    height: 25px;
    text-align: center !important;
}

.panel-body {
    padding: 3px !important;
    height: 26px;
}
.custom-panel-text{
    margin-top: 5px;
    color: #FFFFFF;
    font-size: 11px;
    text-align: center;
}

textarea:focus { 
    outline: none !important;
    border:1px solid #FFFFFF;
}
input:focus { 
    outline: none !important;
    border:1px solid #FFFFFF;
}

.label{
    white-space: normal;
}
.cusBtnForClo{
    width: 0px;
    padding-left: 2px;
    margin-top: -9%;
    margin-right: 0%;
    float: right;
    position: relative;
}
    #contextMenu {
        position: absolute;
        display:none;
        background-color: #FFFFFF;
        width: 200px;
        border-radius: 10px;
    }
    #projectmembers{
        width: 98%;
        text-align: left;
        border: none !important;
    }

    #projectmembers tr{
        border: none !important;
    }
    #projectmembers tr td{
        border: none !important;
        vertical-align: top;
    }

    #togPopH{
        width: 90%;
        border: none;
        margin-top: -8px;
    }
    #togPopH:focus{
        border: 1px solid #ccc;
    }
    .popover{max-width: 600px;}
    .popover-title { display: none; }
    .imgtd {width: 40px !important;}
    /*.box-title{
        color: #798281 !important;
    }*/
    .navbar-nav>li>a:hover{
        color: #fff !important; 
    }
    .fa-arrow-up,.fa-arrow-down{
        color: #607D8B !important;
    }
    .btn-info{
        background: #3C8DBC !important;
        border-color: #3C8DBC !important;   
    }
    .p-l-d{
        border-bottom: 5px #3C8DBC solid;
    }
    .iga2{
        background-color: none!important;
        height: 40px !important;
        margin-top: -5px;
    }
    .searchCls{
        border: 1px solid #ccc !important;
        color: #616161 !important;
        height: 40px !important;
    }
    .gridStyle{
        background-color: #fff !important;
        color: #616161 !important;
        border: 1px solid #ccc !important;
        margin-top: -5px !important;
        height: 40px !important;
    }
    .gridStyle3{
        color: #fff !important;
        border: 1px solid #ccc !important;
        margin-top: -5px !important;
        height: 40px !important;
        font-size: 21px !important;
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif !important;
        font-weight: 300  !important;
        word-spacing: 3px !important;
        background-color: #3C8DBC !important;
    }

    .gridStyle3:hover{
        background-color: #3C8DBC !important;
        color: #fff !important;
    }
    .gridStyle1{
        background-color: #fff !important;
        color: #616161 !important;
        border: 1px solid #ccc !important;
        height: 40px !important;
        margin-top: -5px !important;
    }

    

    .fa-search{
        color: #616161 !important
    }
    .top-menu{
        background: #fff !important;
    }
    .text-center,.cusSpan{
        color: black !important;
        font-weight: 600 !important;
    }
    .highlight{
        background: rgba(0,0,0,0.1) !important;
        color: white !important;
    }
    .highlight a:hover{
        background: rgba(0,0,0,0.1) !important;
    }
    .nav>li>a:hover,.nav>li>a:active,.nav>li>a:focus{
        background: rgba(0,0,0,0.1) !important;
        color: white !important;
    }
    .box.box-solid.box-success>.box-header {
        color: #fff;
        background: #00a65a !important;
        background-color: #00a65a;
    }
    .fa-arrow-left{
        color: #fff !important;
    }
    .modal-title{
        color: #1D4358 !important;
    }
    .formcc{
        background-color: #fff !important;
        color: #616161 !important;
        border: 1px solid #ccc !important;
        height: 40px !important;
    }
    .iga2{
        background-color: none !important;
        margin-right: 0px !important;
    }

    .hover-color:hover{
        color: #fff !important;
    }
    .nav>li>a:hover,.nav>li>a:active,.nav>li>a:focus{
        color: white !important;
    }
    .content-wrapper{
        min-height: 740px !important;
    }
    .createnewentry , .addedentry , .createsubtask,.addedsubtask{
        width: 100%;
        height: 40px;
        border-style:none !important;

    }

    #tbl_TaskEntry td { 
        padding:0px !important; 

    }
    .btn-gray{
        background-color: #e7e7e7;
        color: black;

    }
    .btn-gray2{
        background-color: #f2f2f2;
        color: black;

    }
    .select2-selection{
        border:0.01em solid lightgray !important;
    }
    .high{
        background:#e7e7e7 url(<?php echo base_url(); ?>require/img/high.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .low{
        background:#e7e7e7 url(<?php echo base_url(); ?>require/img/low.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .urgent{
        background:#e7e7e7 url(<?php echo base_url(); ?>require/img/urgent.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .normal{
        background:#e7e7e7 url(<?php echo base_url(); ?>require/img/normal.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​
    
.select2-search__field{
    width: 300%;
    font-size: 12px !important;
    font-family: 'ProximaNovaW01-Regular' !important;
    word-spacing: 9px;
    height: 16px !important;

}
.popupmenu{
    margin-left: 30px;color:black;font-size: 25px;color:blue;
}
.qtip-content
{
    overflow: visible !important;
}

.btn-popmenu{
    background-color: transparent !important;padding:0px 5px !important;
     width: 130% !important; margin-left: -20%;
   
}
.display-tag-image{
    float: right;
width: 40px;
height: 40px;
border-radius: 50%;
margin-right: 10px;
margin-top: 2px;
}

#tabindex5,#tabindex6{
    border: none;
}
#tabindex5:focus, #tabindex6:focus{
    border: 1px solid #000;
}
/*========mejba=========*/
</style>

<?php $this->load->view('Partial/pageHeader'); ?>


<style type="text/css">
    /* CSS by sujon */
    .ui-widget-size::-webkit-outer-spin-button,
    .ui-widget-size::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .ui-widget-size{
        -moz-appearance:textfield;
    }
     .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
    z-index: 1000000000000000000 !important;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
    .createnewentry , .addedentry , .createsubtask,.addedsubtask{
        width: 100%;
        height: 40px;
        border-style:none !important;

    }
    .createsubtask,.addedsubtask{
        font-size: 14px !important;
    }
    .qtip-fontsize{
        font-size: 17px !important;
        line-height: normal;
    }
    #tbl_TaskEntry td, #tbl_TaskCompleted td{ 
        padding:0px !important; 
    }

    .btn-gray{
        background-color: #e7e7e7;
        color: black;

    }
    .btn-gray2{
        background-color: #f2f2f2;
        color: black;

    }
    .select2-selection{
        border:0.01em solid lightgray !important;
         background-color: #e7e7e7 !important;

    }
    .dataTables_empty{display: none}
    .ui-datepicker {
        width: 18.7% !important;
        padding: 0;
    }
    #tbl_TaskEntry_info , #tbl_TaskCompleted_info{
        display: none
    }
   /* table, tr, td {
        border: none !important;
    }*/
    .table-striped > tbody > tr:nth-of-type(2n+1) {background-color: white !important;}
    .table-striped > tbody > tr:nth-of-type(2n) {background-color: lightgray !important;}

    .table-bordered {
        border: 1px solid rgba(71, 62, 62, 0.18) !important;
        background1: #CECCCC !important;
    }

    
    .bg-teal-gradient{
        background: rgba(250, 244, 244, 0.73) !important; 
    }
    .box.box-solid[class*='bg']>.box-header {
        background: rgba(131, 129, 129, 0.07) !important;
    }
    
    #tbl_TaskEntry *,#tbl_TaskCompleted *{
        font-weight: 300 !important;
        font-size: 16px;
        font-family: 'ProximaNovaW01-Regular' !important;
    }

    /* added by sujon @ 5.19.16 */
    td.details-control {
        background: url('<?php echo base_url('require/plugins/datatable_html/details_open.png'); ?>') no-repeat center center !important;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('<?php echo base_url('require/plugins/datatable_html/details_close.png'); ?>') no-repeat center center !important;
    }
    table.dataTable{
        border-collapse: collapse !important;
    }
    .count-down-bubble .ui-tooltip-tip{
    background-color: blue !important;
}


.select2-search__field{
    width: 300%;
    font-size: 12px !important;
    font-family: 'ProximaNovaW01-Regular' !important;
    word-spacing: 9px;
    height: 36px !important;

}
.task-set-icon{
        width: 22px;
     margin: 2px; 
    cursor: pointer;
    float:right;
}

.container-subcount {
    position: relative;
}

.subcount-center {
    position: absolute;
    left: 16px;
    top: 10px;
    color:orange;
    
}
.cls-open-subtasks{
    float: left;
   
    cursor: pointer;
}

.add-circle-border {
  display: inline-block;
  border-radius: 50%;
  margin:5px;
  background: radial-gradient(circle at 50% 120%, #81e8f6, #76deef 10%, #055194 80%, #062745 100%);
  position: relative;
  width: 50%;
  height: 0;
  padding-bottom: 50%;
    
}
.add-circle-border-sub {
  display: inline-block;
  border-radius: 50%;
  margin:5px;
  background: radial-gradient(circle at 50% 120%, #81e8f6, #76deef 10%, #055194 80%, #062745 100%);
  position: relative;
  width: 70%;
  height: 0;
  padding-bottom: 70%;
    
}
.add-circle-border:before, .add-circle-border-sub:before {
  content: "";
  position: absolute;
  top: 1%;
  left: 5%;
  width: 90%;
  height: 90%;
  border-radius: 50%;
  background: radial-gradient(circle at 50% 0px, #ffffff, rgba(255, 255, 255, 0) 58%);
  filter: blur(5px);
  z-index: 2;
}
.subtasktable{
    margin-bottom: 0px;
    margin-left: 3.4%;
    width: 96.7%;
}
.subtasktable td:nth-child(1){
    width: 3%;
}
.subtasktable td:nth-child(2){
    /*width: 1.45%;*/
}
.subtasktable td:nth-child(3){
   width: 33.45%;
}
.subtasktable td:nth-child(4){
   width: 11.55%;
}
.subtasktable td:nth-child(5){
    width: 20.9%;
}
.cls-exD-span{
    float:right;position: relative;width: auto;margin-right:2px;margin-top: 1%;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12" style="background-color: #1D4358;height: 51px;">
            <div class="col-lg-6 col-md-6">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu" id="notificationDiv"> <a href="#" onclick="history.go(-1);"> <i class="fa fa-arrow-left"></i></a> </li>
                    <li class="dropdown notifications-menu" id="notificationDiv"> <a href="#" >
                            <?php
                            if ($allProjectList[0]->project_type == 'SP') {
                                echo '<i style="color: #f9a50f;" class="fa fa-star"></i>';
                            } else {
                                echo '<i style="color: #888888;" class="fa fa-star"></i>';
                            }
                            ?>
                        </a> </li>
                    <li><a href="<?php echo base_url()."yzy-projects/index/newPro/".$allProjectList[0]->projectDivid."/".$allProjectList[0]->projectid; ?>" class="proname" style="color:#fff"><?php echo $allProjectList[0]->projectname; ?></a> </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6" id="subToogMobile" style="display: none; margin-top: 5px;margin-left: 0%;">
                
                <div class="btn-group pull-right">
                  <button class="btn btn-success btn-sm dropdown-toggle" id="togBtn" data-toggle="dropdown" role="button" style="background-color: #3c8dbc;width: 52px;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;"><i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a onclick="osDiv(<?php echo $allProjectList[0]->projectid; ?>)" href="#">Setting</a></li>
                    <li><a onclick="TagList()" href="#">Member (<?php echo $totalMember; ?>)</a></li>
                    <li><a href="#" onclick="openprojectchat('<?php echo $allProjectList[0]->projectid; ?>', '<?php if($allProjectList[0]->project_chat_name == "") echo str_replace("'", " ", $allProjectList[0]->projectname); else echo $allProjectList[0]->project_chat_name; ?>', 'project')">Open Chat</a></li>
                    <li><a href ="<?php echo site_url('yzy-projects/index/gantt_chart/'.$allProjectList[0]->projectid); ?>">Gantt Chart</a></li>
                    <li><a href="<?php echo site_url("yzy-projects/index/timeline/".$allProjectList[0]->projectid); ?>">Timeline</a></li>
                  </ul>
                </div>
                <div class="iga2 pull-left" style="width:78%;float: right;margin-top: 0px;margin-right: 10px !important;">    <span class="input-group-addon searchBtnMobile" style="width: 52px;float: left;height: 40px;"><i class="fa fa-search" style="margin-top: 6px;"></i></span>
                    <!-- <input id="search_inputboxMobile" style="width: 79%;display:block;height: 40px !important; background-color: rgb(231, 231, 231);" type="email" class="form-control size-family-weight" placeholder="Search Task"> -->

                    <input id="search_inputbox" style="width: 79%;display:block;height: 40px !important; background-color: rgb(231, 231, 231);" type="email" class="form-control size-family-weight" placeholder="Search Task">
                    
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6" id="subToogDesktop" style="margin-top: 5px;margin-left: 0%;">
                <button onclick="osDiv(<?php echo $allProjectList[0]->projectid; ?>)" class="btn btn-info btn-sm pull-right " style="background-color: #3c8dbc;margin-right: 7%;font-size: 14px;word-spacing: 3px;height: 40px;">
                    <i class="fa fa-gear cBtn" title="Setting"></i>
                </button>
                <button title="Assign To" class="btn btn-info btn-sm pull-right" onclick="TagList()" style="background-color: #3c8dbc;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;"><i class="fa fa-user"></i> <?php echo $totalMember; ?></button>
                <button title="Chat" class="btn btn-info btn-sm pull-right" id="opneChat" onclick="openprojectchat('<?php echo $allProjectList[0]->projectid; ?>', '<?php if($allProjectList[0]->project_chat_name == "") echo str_replace("'", " ", $allProjectList[0]->projectname); else echo $allProjectList[0]->project_chat_name; ?>', 'project')" style="background-color: #3c8dbc;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;"><i class="fa fa-wechat cBtn"></i> </button>
                <a href="<?php echo site_url('yzy-projects/index/gantt_chart/'.$allProjectList[0]->projectid); ?>" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;"><img src="<?php echo base_url(); ?>require/img/gantt-chart-icon.png" class="cBtn" title="Gantt Chart" style="width:20px; height:20px;"></a>
                <a href="<?php echo site_url("yzy-projects/index/timeline/".$allProjectList[0]->projectid); ?>" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;" ><img src="<?php echo base_url(); ?>require/img/timeline.png" class="cBtn" style="width:20px; height:20px;margin-top: 5px;" title="Timeline"></a>
                <!-- <button class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;font-size: 14px;margin-right: 10px;word-spacing: 3px;height: 40px;"><i class="fa fa-history"></i></button> -->
                <div class="input-group iga2" style="float: right;margin-top: 0px;margin-right: 10px !important;"> 
                    <input id="search_inputbox" style="display:none;height: 40px !important; background-color: rgb(231, 231, 231);" type="email" class="form-control size-family-weight" placeholder="Search Task">
                    <span class="input-group-addon searchBtn" style="width:50px;border-color: none;background-color: none"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- =========================== ganttchart content start ==================== -->
    <style type="text/css">
        hr{margin:0px;}
        .deg90{
            -ms-transform: rotate(90deg); /* IE 9 */
            -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
            transform: rotate(90deg);
        }
        .bordercolorEEE{border-right: 1px solid #EEE;background-color: #FFF;}
        .bordercolorNone{border-right: none;}
        .topheadmonth{border-left:1px solid #CCC;border-bottom:1px solid #CCC;}
        .bbhr{border-bottom:1px solid #000;}
        .brhr{border-right: 1px solid #CDCDCD;}
        .tasktitledesign{
            border-right:1px solid #CCC;
            margin:5px 0px;
            white-space: nowrap;
            max-width: 300px;
            width: 300px;
            overflow: hidden;
            background-color: #FFF;
        }
        .gridboxsize{min-width:20px;text-align:center;}
        .stbg{background:#e7e7e7;}
        .sttitle{
            padding-left:10px;
            border-right:1px solid #CCC;
            margin:5px 0px;
            white-space: nowrap;
            max-width: 300px;
            overflow: hidden;
        }
    </style>
    <div style="overflow: auto;margin-top: 5px;">
        <?php 
        $id = array();
        $name = array();
        $sdt = array();
        $edt = array();
        $protask = array();
        for($i=0; $i<count($allTask); $i++){
            // if(strtotime($allTask[$i]->startdate) >= strtotime("2016-05-01 00:00:00") AND strtotime($allTask[$i]->startdate) <= strtotime("2016-05-30 23:59:59"))
            $protask[] = $allTask[$i];
        }

        if(isset($allTask) AND $allTask != "") {
            foreach ($allTask as $key => $value) {
                array_push($id, $value->projecttaskid);
                array_push($name, $value->projecttaskname);
                if($value->startdate == "0000-00-00 00:00:00"){
                    array_push($sdt, date("Y-m-d"));
                }
                else{
                    array_push($sdt, substr($value->startdate, 0, 10));
                }
                
                if($value->enddate == "0000-00-00 00:00:00"){
                    array_push($edt, substr($value->startdate, 0, 10));
                }
                else{
                    array_push($edt, substr($value->enddate, 0, 10));
                }
            }
        } 

        ?>
        <?php   // echo "Min:". min($sdt); echo "<br>";
                // echo "Max:". max($edt); echo "<br>"; ?>
        <?php 
        if(isset($fdate) AND $fdate !== FALSE){
            $startDate = $fdate;
            $sd = new DateTime($fdate);
            $ed = new DateTime($tdate);
            $dayno = date('d', strtotime($fdate));
            $weekno = date('W', strtotime($fdate));
            $monthno = date('m', strtotime($fdate));
            $yearno = date('Y', strtotime($fdate));
        }else{
            $startDate = min($sdt);
            $sd = new DateTime(min($sdt));
            $ed = new DateTime(max($edt));
            $dayno = date('d', strtotime(min($sdt)));
            $weekno = date('W', strtotime(min($sdt)));
            $monthno = date('m', strtotime(min($sdt)));
            $yearno = date('Y', strtotime(min($sdt)));
        }

        $diff = $ed->diff($sd)->format("%a");
        // echo $diff;
        $bgcolor = array("#009688","#4caf50",
                            "#8bc34a","#3f51b5",
                            "#ffeb3b","#ff9800",
                            "#673ab7","#00bcd4");
        ?>
        <div class="col-md-12" style="border-bottom:1px solid #CDCDCD;">
            <div class="pull-right" id="btnGantt" style="height:40px;">
                <button onclick="printit()" class="btn btn-default btn-flat">Print</button>
                <!-- <button onClick ="$('#tasktimeplan').tableExport({type:'png',escape:'false'});" class="btn btn-default btn-flat">PNG</button> -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Export</button>
                    <ul class="dropdown-menu">
                    <li><button id="btnExcel" class="btn btn-default btn-block btn-flat">Excel</button></li>
                    <li><button id="btnDoc" class="btn btn-default btn-block btn-flat">Doc</button></li>
                    <li><button id="btnPdf" class="btn btn-default btn-block btn-flat">PDF</button></li>
                    </ul>
                </div>
                
                
                <!-- <button onClick ="$('#tasktimeplan').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-flat">Excel</button> -->
                <button onclick="changegridcolor(this)" class="btn btn-default btn-flat">Hide Grid</button>
                <button onclick="interval(1)" class="btn btn-default btn-flat">Day</button>
                <button onclick="interval(7)" class="btn btn-default btn-flat">Week</button>
                <button onclick="interval(30)" class="btn btn-default btn-flat">Month</button>
            </div>
            <div class="pull-right" style="height:40px;">
                <input id="fdate" style="padding: 3px 0px 7px 0px;" type="text" class="datetimepicker" placeholder="From Date" value="<?php echo $fdate; ?>">
                <input id="tdate" style="padding: 3px 0px 7px 0px;" type="text" class="datetimepicker" placeholder="To Date" value="<?php echo $tdate; ?>">
                <button type="button" class="btn btn-default btn-flat" onclick="searchgc()">Go</button> &nbsp; &nbsp; 
            </div>
            
        </div>
        
        <div id="tasktimeplan" style="padding:10px;">
            
        </div>
    </div>
    <!-- =========================== ganttchart content start ==================== -->
</div>
<!-- /.content-wrapper -->
<style>
        .context-menu-abc
        {
            border: 1px solid gray;
            padding: 5px;
        }

        /* used for all items */
        .context-menu-item { min-height: 18px; background-repeat: no-repeat; background-position: 4px 4px; }
        /* all custom icons */
        .context-menu-item.context-menu-icon-firstOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/task-complete.png"); }
        .context-menu-item.context-menu-icon-secondOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/businessman-linked-to-money-and-time.png"); }
        .context-menu-item.context-menu-icon-thirdOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/attached-files(1).png"); }
        .context-menu-item.context-menu-icon-forthOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/myspace-logo(3).png"); }
        .context-menu-item.context-menu-icon-fifthOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/circular-speech-bubble-with-three-dots-inside.png"); }
        .context-menu-item.context-menu-icon-sixthOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/settings-three-gears-interface-symbol.png"); }
        .context-menu-item.context-menu-icon-seventhOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/delete-photo.png"); }
        .context-menu-item.context-menu-icon-eighthOpt { background-image: url("<?php echo base_url(); ?>require/images/menuimg/16x16/priority16.png"); }

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
        right: 60px;
        z-index: 101;
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
        right: 60px;
        z-index: 101;
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
    .high{
        background:#FFFFFF url(<?php echo base_url(); ?>require/img/high.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .low{
        background:#FFFFFF url(<?php echo base_url(); ?>require/img/low.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .urgent{
        background:#FFFFFF url(<?php echo base_url(); ?>require/img/urgent.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​

    .normal{
        background:#FFFFFF url(<?php echo base_url(); ?>require/img/normal.png) no-repeat 4px 4px;
        padding:4px 4px 4px 22px;
        height:18px;
    }​



/*ul.select2-results {
    max-height: 100px;
}*/
</style>
<div id="openProjectTaskDiv">
    <div class="col-lg-12 size-family-sidebar" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;"> Select Task Location
        <button onclick="openLocation()" class="btn btn-info btn-sm pull-right" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-12 optd size-family-sidebar">
            <div onclick="openLocationList('Project')" style="cursor: pointer; color: #28546B;">Project <br>
                <span id="opd"></span><span class="pull-right" style="margin-top: -5px"><i class="fa fa-chevron-right"></i></span></div>
        </div>
        <div class="col-lg-12 optd size-family-sidebar">
            <div onclick="openLocationList('Tasklist')" style="cursor: pointer; color: #28546B;">Tasklist<br>
                <span id="otd"></span><span class="pull-right size-family-sidebar" style="margin-top: -5px"><i class="fa fa-chevron-right"></i></span></div>
        </div>
    </div>
    <div class="col-lg-12 optld-footer" style="display: none;">
        <button class="btn btn-block btn-info btn-flat" onclick="moveto()" style="font-weight: bold; font-size: 12px;">Move Task</button>
    </div>
    <div class="col-lg-12">&nbsp;</div>
</div>
<div id="openProjectTaskListDiv">
    <input type="hidden" id="optld-pid" value="<?php echo $pid; ?>">
    <input type="hidden" id="optld-temp-pid" value="<?php echo $pid; ?>">
    <input type="hidden" id="optld-tlid">
    <input type="hidden" id="optld-temp-tlid">
    <div class="col-lg-12" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;">
        <button onclick="openLocationList(0)" class="btn btn-info" style="margin-top: -8px;" data-toggle="tooltip" title="" data-original-title="Back"><i class="fa fa-chevron-left"></i></button>
        <span id="optld-head"></span> </div>
    <div class="col-lg-12">
        <input type="text" onkeyup="searchlist($(this).val())" class="form-control" style="margin: 5px 0px; width: 260px;" placeholder="Search...">
    </div>
    <div class="col-lg-12 optld-body" style="max-height: 190px;overflow: auto;"> </div>
</div>

<!-- Project chat -->
<div id="projectchatdiv">
    
    <div class="box box-yzy direct-chat box-solid direct-chat-success">
        <div class="box-header with-border" style="height:50px;background:#fff">
            <div id="groupmemberlist" style="position: fixed;margin-top: 40px;background: #FFF;z-index: 1;width: 600px;">
                <select class="select_gc_chat_member form-control tabindex1" id="tabindex1" tabindex="1" multiple="multiple" style="height:50px;" onchange="updategrouplist()">
                    <?php foreach ($memberList as $key => $value) { ?>
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
                        <input type=text class="form-control tabindex2" tabindex="2" id="editGroupNameText" style="background-color: #fff; color:#000;" name="GroupNameText" size="75" onfocus="$('#editGroupNameTextSpan').show()" onblur="$('#editGroupName').submit()">
                    </div>
                    <span class="input-group-btn" id="editGroupNameTextSpan" style="display:none;">
                        <button class="btn btn-default btn-flat" type="button" style="margin-top:1px;">Go!</button>
                    </span>
                </form>
            </h3>
            <div style="position: relative;background: #E6E6E6; margin-top: -58px; margin-left: -40px; width: 30px; height: 30px; color: #000;">
                <i class="fa fa-times tabindex7" id="tabindex7" tabindex="7" onclick="closeprojectchat()" style="padding: 5px;font-size: 20px;"></i>
            </div>
        </div>
        <div class="box-body" id="chat99" style="height:580px;margin-top: 50px;">
            <div id="cstream99" style="height:auto;font-weight: 400;" class="direct-chat-messages"></div>
        </div>
        <div class="box-footer" style="display: block;">
            <div class="col-md-2" style="padding:0px;background:#3c8dbc;border: 1px solid #3c8dbc;">
                <a class="btn btn-box-tool tabindex5" id="tabindex5" tabindex="5" href="#popupTop99" onClick="drawPopOverDiv(99)" role="button" data-toggle="modal-popover" data-placement="top"><i class="fa fa-smile-o" style="font-size:22px;color:#FFF;"></i></a>
                <a class="btn btn-box-tool sendfile99 tabindex6" id="tabindex6" tabindex="6" href="<?php echo site_url().'chat/openfile/99'; ?>" data-title="Attachments" data-toggle="lightbox"><i class="fa fa-paperclip" style="font-size:22px;color:#FFF;"></i></a>
            </div>
            <div class="col-md-10" style="padding-left: 0px;">
                <form id="msenger99" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="mid" id="mid99" value="<?php echo $user_email; ?>">
                    <input type="hidden" name="fid" id="fid99">
                    <input type="hidden" name="dName" id="dName99" value="">
                    <div class="input-group">
                        <textarea ng-model="message" focus-on-change="message" name="msg" id="msg-min99" class="form-control ng-pristine ng-untouched ng-valid tabindex3" tabindex="3" style="height: 34px"></textarea>
                        <span class="input-group-btn">
                            <button type="button" id="sb-mt99" onClick="sendMsg(99)" class="btn btn-success btn-flat tabindex4" tabindex="4">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Pop UP div for image sliding Start -->
<div class="row" id="popUpDiv">
    <div class="ImgBoxBack"></div>
    <div id="ImgBox">
        <div class="bn">
            <button id="clsBtn" onclick="closeDiv('ImgBox')" class="btn button size-family-sidebar">X</button>
        </div>
        <div class="message">
            <div class="imgDiv" id="imgDiv" >
                <div class="commentArea"></div>
                <div id="slider"> <a href="#" class="control_next size-family-sidebar">>></a> <a href="#" class="control_prev"><<</a>
                    <ul class="sliderUL">
                    </ul>
                </div>
            </div>
            <div class="commentDiv" >
                <div class="profileDiv">
                    <div class="profileItem"> <img alt="user image" class="online userimg">
                        <p class="message"> <a href="#" class="username"></a> <br/>
                            <small class="text-muted"> <i class="fa fa-clock-o"></i> 2016-11-12</small> </p>
                    </div>
                </div>
                <hr />
                <div class="box-body chat commentListDiv" id="chat-box2"> </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="widget-area no-padding blank">
                            <div class="status-upload">
                                <form>
                                    <textarea class="Rcomment" placeholder="Write a comment..." ></textarea>
                                    <input type="hidden" class="RuserID" name="userID"  value="<?php echo $id; ?>">
                                    <input type="hidden" class="RuserImg" name="userImg"  value="<?php echo $user_img; ?>">
                                    <input type="hidden" class="RuserName" name="userName"  value="<?php echo $username; ?>">
                                    <button type="button"  onclick="sendReply($(this).data('value'), $(this).data('taskid'), $(this).data('typeid'))" class="btn btn-success green popReply"><i class="fa fa-share"></i> Comment</button>
                                </form>
                            </div>
                            <!-- Status Upload  -->
                        </div>
                        <!-- Widget Area -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pop UP div for image sliding END -->
<!-- Model Create TaskList END -->
<div id="popMemBox007" style="position: fixed;display:none;top: 105px;right: 20px;background: rgb(248, 243, 243);width: 300px;height: auto; padding:10px;">
    <h3 class="box-title" style="color:#3C8DBC;">Member of this project</h3>
    <button class="btn btn-flat btn-block" onclick="createnewgroupchat()" id="sgcbtn" style="display:none;background:#3C8DBB;color:#FFF;">Start Group Chat</button>
    <table class="table">
    <?php foreach($memberList as $line) { if($line->email == $user_email) continue; ?>
        <tr data-container="body" data-toggle="popover" data-html="true" data-trigger="hover" data-title="false" data-placement="left" data-content="<table><tr><td><img src='<?php echo base_url('require/dist/img/'.$line->img); ?>'></td><td style='padding-left:10px;'><h3><?php echo $line->full_name." (".$line->display_name.")"; ?></h3><br>Email: <?php echo $line->email; ?><br><?php echo $line->designation; ?><br><?php echo $line->org_id; ?></td></tr></table>">
            <td style="border: none !important;">
                <input type="checkbox" class="groupMemberSelect" value="<?php echo $line->email; ?>">
                <a href="#" onClick="openChatWindow('<?php echo $line->email; ?>', '<?php echo $line->full_name; ?>', '<?php echo $line->img; ?>')">
                    <?php echo $line->full_name; ?>
                </a>
            </td>
            <td style="border: none !important;"><i class="is_online<?php echo $line->ID; ?>" style="font-size: 10px;margin-top:7px;"></i>&nbsp;</td>
            <td style="border: none !important; width:40px;text-align:right" onClick="poketoyou(<?php echo $line->ID; ?>, this)"><button class="btn btn-default btn-xs">Poke</button></td>
        </tr>
    <?php } ?>
    </table>
</div>
<div id="popTagBox"></div>
<div id="popProBox"></div>
<div id="popTaskTag"></div>
<div id="popMileStone"></div>
<div id="popAssignto"></div>
<div id="popMembers"></div>
<div id="popDescritption"></div>
<div id="popMembers"></div>
<div id="popProgress"></div>
<div id="popEstTime"></div>
 

<?php $this->load->view('Partial/pageFooter'); ?>
<!-- ganttchart script -->
<script src="<?php echo base_url('require/plugins/dateformat-master/date.format.min.js'); ?>"></script>
<!-- jquery print -->
<script src="<?php echo base_url('export/jqprint/jquery.jqprint.0.3.js'); ?>"></script>
<script type="text/javascript">
    var gridclassname = "bordercolorEEE";
    $(function(){
        interval(<?php echo $interval;?>);
    });
    var startDate = new Date(<?php echo json_encode($startDate); ?>);
    <?php echo "var protaskjs = ". json_encode($protask) . ";\n"; ?>
    <?php echo "var allSubTaskjs = ". json_encode($allSubTask) . ";\n"; ?>
    <?php echo "var sdt = ". json_encode($sdt) . ";\n"; ?>
    <?php echo "var edt = ". json_encode($edt) . ";\n"; ?>
    <?php echo "var bgcolor = ". json_encode($bgcolor) . ";\n"; ?>
    var siteurl = '<?php echo site_url("yzy-projects/index/gantt_chart/".$pid); ?>';
    var diff = '<?php echo $diff; ?>'; // day wise different 
    var dayno = parseInt("<?php echo $dayno; ?>");
    var weekno = parseInt("<?php echo $weekno; ?>");
    var monthno = parseInt("<?php echo $monthno; ?>");
    var yearno = parseInt("<?php echo $yearno; ?>");
    var fdate = "<?php echo $fdate; ?>";
    var tdate = "<?php echo $tdate; ?>";
    

    function engMonth(v){
        var str = "dfsasd";
        switch(v){
            case 1: 
                str = "Jan"; break;
            case 2: 
                str = "Feb"; break;
            case 3: 
                str = "Mar"; break;
            case 4: 
                str = "Apr"; break;
            case 5: 
                str = "May"; break;
            case 6: 
                str = "Jun"; break;
            case 7: 
                str = "Jul"; break;
            case 8: 
                str = "Aug"; break;
            case 9: 
                str = "Sep"; break;
            case 10: 
                str = "Oct"; break;
            case 11: 
                str = "Nov"; break;
            case 12: 
                str = "Dec"; break;
        }
        return str;
    }

    function daysMonth(v){
        var str = "";
        switch(v){
            case 1: case 3: case 5: case 7: case 8: case 10: case 12: 
                str = 31; break;
            case 2: 
                if(is_leapyear(yearno)) str = 29;
                else str = 28; 
                break;
            case 4: case 6: case 9: case 11: 
                str = 30; break;
        }
        return str;
    }

    function is_leapyear(year) {
        if(((year%4==0) && (year%100!=0)) || year%400==0) {
            return true;
        }
        return false;
    }

    function interval(v){
        console.log(protaskjs);
        $counttd = 1;
        var design = '<table><tr><td><table style="border-collapse: collapse;">';
        if(v==1){
            var n = (Math.ceil(diff/v));
            design += '<tr>';
            design += '<td rowspan=2 height=65px width=300px style="border-right:1px solid #CCC;"><h3>Tasks</h3></td>';
            
            var mn = monthno;
            var dn = dayno;
            var yn = yearno;
            var sdth = startDate;
            for(var i=0; i<=n; ){
                var thistdcolspan = (daysMonth(mn) - dn) + 1;
                design += '<td colspan="'+thistdcolspan+'" class="topheadmonth">'+engMonth(mn)+" "+yn+'</td>';
                
                mn++; dn=1; i+= thistdcolspan;
                if(mn==13){yn++; mn=1;}
            }
            design += '</tr>';
            design += '<tr class="bbhr">';
            
            for(var i=0; i<=n; i++){
                design += '<td align="center" class="brhr">';
                
                var d = new Date(startDate);
                d.setDate(d.getDate()+i);
                var hd = d.getDate();
                if(hd>9) design += hd;
                else design += "0"+hd;
                design += '</td>';
            }
            design += '</tr>';
            var j = 0;
            $.each(protaskjs, function(k, v) {
                if(fdate && tdate){
                    if(fdate<=sdt[k] && tdate>=edt[k]){
                        design += '<tr class="trbottomcolor">';
                        design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                        
                        
                        for(var i=0; i<=diff; i++){
                            var d = new Date(startDate);
                            var aa = d.setDate(d.getDate()+i);
                            var thistd = new Date(aa).format('Y-m-d');
                            var tdcolor = "";
                            var title = "";
                            if((thistd >= sdt[k]) && (thistd <= edt[k])){
                                tdcolor = bgcolor[j];
                                title = sdt[k] + " - " + edt[k];
                            }
                            design += '<td class="'+gridclassname+' gridboxsize" style="background:'+tdcolor+'" title="'+title+'">';
                            
                            design += '</td>';
                        }
                        design += '</tr>';
                        // design += '<tr class="separetor" style="line-height: 2px;">';
                        // design += '<td><hr></td>';
                        
                        // design += '<td colspan="'+(diff+1)+'"><hr></td>';
                        
                        // design += '</tr>';
                        $.each(allSubTaskjs, function(sk, sv){
                            if(sv.parenttaskID == protaskjs[k].projecttaskid){
                                design += '<tr class="stbg trbottomcolor">';
                                design += '<td title="'+sv.projecttaskname+'" style="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                                
                                for(var i=0; i<=diff; i++){
                                    var d = new Date(startDate);
                                    var aa = d.setDate(d.getDate()+i);
                                    var thistd = new Date(aa).format('Y-m-d');
                                    var tdcolor = "";
                                    var title = "";
                                    if(sv.startdate == "0000-00-00 00:00:00"){
                                        var stsd = startDate;
                                    }
                                    else{
                                        var stsd = (sv.startdate).substring(0, 10);
                                    }
                                    
                                    if(sv.enddate == "0000-00-00 00:00:00"){
                                        var sted = stsd;
                                    }
                                    else{
                                        var sted = (sv.enddate).substring(0, 10);
                                    }
                                    if((thistd >= stsd) && (thistd <= sted)){
                                        tdcolor = bgcolor[j];
                                        title = stsd + " - " + sted;
                                    }
                                    design += '<td class="'+gridclassname+'" style="text-align:right;background:'+tdcolor+'" title="'+title+'">';
                                    design += '</td>';
                                    
                                }
                                design += '</tr>';
                                // design += '<tr class="separetor" style="line-height: 2px;">';
                                // design += '<td><hr></td>';
                                
                                // design += '<td colspan="'+(diff+1)+'"><hr></td>';
                                
                                // design += '</tr>';
                            }
                        });
                        j = j+1; if(j==8) j=0; 
                    }
                }
                else{
                    design += '<tr class="trbottomcolor">';
                    design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                    
                    
                    for(var i=0; i<=diff; i++){
                        var d = new Date(startDate);
                        var aa = d.setDate(d.getDate()+i);
                        var thistd = new Date(aa).format('Y-m-d');
                        var tdcolor = "";
                        var title = "";
                        if((thistd >= sdt[k]) && (thistd <= edt[k])){
                            tdcolor = bgcolor[j];
                            title = sdt[k] + " - " + edt[k];
                        }
                        design += '<td class="'+gridclassname+' gridboxsize" style="background:'+tdcolor+'" title="'+title+'">';
                        
                        design += '</td>';
                    }
                    design += '</tr>';
                    // design += '<tr class="separetor" style="line-height: 2px;">';
                    // design += '<td><hr></td>';
                    
                    // design += '<td colspan="'+(diff+1)+'"><hr></td>';
                    
                    // design += '</tr>';
                    $.each(allSubTaskjs, function(sk, sv){
                        if(sv.parenttaskID == protaskjs[k].projecttaskid){
                            design += '<tr class="stbg trbottomcolor">';
                            design += '<td title="'+sv.projecttaskname+'" style="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                            
                            for(var i=0; i<=diff; i++){
                                var d = new Date(startDate);
                                var aa = d.setDate(d.getDate()+i);
                                var thistd = new Date(aa).format('Y-m-d');
                                var tdcolor = "";
                                var title = "";
                                if(sv.startdate == "0000-00-00 00:00:00"){
                                    var stsd = startDate;
                                }
                                else{
                                    var stsd = (sv.startdate).substring(0, 10);
                                }
                                
                                if(sv.enddate == "0000-00-00 00:00:00"){
                                    var sted = stsd;
                                }
                                else{
                                    var sted = (sv.enddate).substring(0, 10);
                                }
                                if((thistd >= stsd) && (thistd <= sted)){
                                    tdcolor = bgcolor[j];
                                    title = stsd + " - " + sted;
                                }
                                design += '<td class="'+gridclassname+'" style="text-align:right;background:'+tdcolor+'" title="'+title+'">';
                                design += '</td>';
                                
                            }
                            design += '</tr>';
                            // design += '<tr class="separetor" style="line-height: 2px;">';
                            // design += '<td><hr></td>';
                            
                            // design += '<td colspan="'+(diff+1)+'"><hr></td>';
                            
                            // design += '</tr>';
                        }
                    });
                    j = j+1; if(j==8) j=0; 
                }
            });
        } 
        else if(v==7) {
            design += '<tr style="border-bottom:1px solid #000;">';
            design += '<td height=65px width=300px style="border-right:1px solid #CCC;">Tasks</td>';
            
            var s = weekno;
            var wn = weekno;
            var yn = yearno;
            var n = (Math.ceil(diff/v)) + s;
            var sdsdsd = new Date(startDate);
            for(var i=s; i<n; i++){
                design += '<td align="center" class="brhr">';
                
                if(wn>9) design += "Week: " + wn +"<br>";
                else design += "Week: 0" + wn +"<br>";
                sdsdsd = new Date(sdsdsd);
                var wsd = new Date(sdsdsd).format('d M');
                var aaaa = sdsdsd.setDate(sdsdsd.getDate()+7);
                var wed = new Date(aaaa).format('d M, Y');
                design += wsd+" - "+wed+'</td>';
                wn++; if(wn==53) {wn=1; yn++;}
            }
            design += '</tr>';
            var j = 0;
            $.each(protaskjs, function(k, v) {
                if(fdate && tdate){
                    if(fdate<=sdt[k] && tdate>=edt[k]){
                        design += '<tr class="trbottomcolor">';
                        design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                        
                        var di = 0; // date interval
                        for(var oi=s; oi<n; oi++){ // oi = outer i
                            design += '<td><table width=100%><tr>';
                            
                            var d = new Date(startDate);
                            for(var i=0; i<7; i++){
                                var ddd = new Date(startDate);
                                var aa = ddd.setDate(d.getDate()+di);
                                var thistd = new Date(aa).format('Y-m-d');
                                var tdcolor = ""; var title = "";
                                if((thistd >= sdt[k]) && (thistd <= edt[k])){
                                    tdcolor = bgcolor[j];
                                    title = sdt[k] + " - " + edt[k];
                                }
                                design += '<td class="'+gridclassname+'" style="min-width:20px;background:'+tdcolor+';" title="'+title+'">&nbsp;';
                                
                                design += '</td>';
                                di++;
                            }
                            design += '</tr></table></td>';
                        }
                        design += '</tr>';
                        // design += '<tr class="separetor" style="line-height: 2px;">';
                        // design += '<td><hr></td>';
                        
                        // design += '<td colspan="'+diff+'"><hr></td>';
                        
                        // design += '</tr>';
                        $.each(allSubTaskjs, function(sk, sv){
                            if(sv.parenttaskID == protaskjs[k].projecttaskid){
                                design += '<tr class="stbg trbottomcolor">';
                                design += '<td title="'+sv.projecttaskname+'" class="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                                
                                var stdi = 0; // date interval
                                for(var oi=s; oi<n; oi++){ // oi = outer i
                                    design += '<td><table width=100%><tr>';
                                    
                                    var dd = new Date(startDate);
                                    for(var i=0; i<7; i++){
                                        var dddd = new Date(startDate);
                                        var aaa = dddd.setDate(dd.getDate()+stdi);
                                        var thistd = new Date(aaa).format('Y-m-d');
                                        var tdcolor = "";
                                        var title = "";
                                        if(sv.startdate == "0000-00-00 00:00:00"){
                                            var stsd = startDate;
                                        }
                                        else{
                                            var stsd = (sv.startdate).substring(0, 10);
                                        }
                                        
                                        if(sv.enddate == "0000-00-00 00:00:00"){
                                            var sted = stsd;
                                        }
                                        else{
                                            var sted = (sv.enddate).substring(0, 10);
                                        }
                                        
                                        if((thistd >= stsd) && (thistd <= sted)){
                                            tdcolor = bgcolor[j];
                                            title = stsd + " - " + sted;
                                        }
                                        design += '<td class="'+gridclassname+'" style="min-width:20px;text-align:right;background:'+tdcolor+'" title="'+title+'">&nbsp;';
                                        
                                        design += '</td>';
                                        stdi++;
                                    }
                                    design += '</tr></table></td>';
                                }
                                design += '</tr>';
                                // design += '<tr class="separetor" style="line-height: 2px;">';
                                // design += '<td><hr></td>';
                                
                                // design += '<td colspan="'+diff+'"><hr></td>';
                                
                                // design += '</tr>';
                            }
                        });
                        j = j+1; if(j==8) j=0;
                    }
                }
                else{
                    design += '<tr class="trbottomcolor">';
                    design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                    
                    var di = 0; // date interval
                    for(var oi=s; oi<n; oi++){ // oi = outer i
                        design += '<td><table width=100%><tr>';
                        
                        var d = new Date(startDate);
                        for(var i=0; i<7; i++){
                            var ddd = new Date(startDate);
                            var aa = ddd.setDate(d.getDate()+di);
                            var thistd = new Date(aa).format('Y-m-d');
                            var tdcolor = ""; var title = "";
                            if((thistd >= sdt[k]) && (thistd <= edt[k])){
                                tdcolor = bgcolor[j];
                                title = sdt[k] + " - " + edt[k];
                            }
                            design += '<td class="'+gridclassname+'" style="min-width:20px;background:'+tdcolor+';" title="'+title+'">&nbsp;';
                            
                            design += '</td>';
                            di++;
                        }
                        design += '</tr></table></td>';
                    }
                    design += '</tr>';
                    // design += '<tr class="separetor" style="line-height: 2px;">';
                    // design += '<td><hr></td>';
                    
                    // design += '<td colspan="'+diff+'"><hr></td>';
                    
                    // design += '</tr>';
                    $.each(allSubTaskjs, function(sk, sv){
                        if(sv.parenttaskID == protaskjs[k].projecttaskid){
                            design += '<tr class="stbg trbottomcolor">';
                            design += '<td title="'+sv.projecttaskname+'" class="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                            
                            var stdi = 0; // date interval
                            for(var oi=s; oi<n; oi++){ // oi = outer i
                                design += '<td><table width=100%><tr>';
                                
                                var dd = new Date(startDate);
                                for(var i=0; i<7; i++){
                                    var dddd = new Date(startDate);
                                    var aaa = dddd.setDate(dd.getDate()+stdi);
                                    var thistd = new Date(aaa).format('Y-m-d');
                                    var tdcolor = "";
                                    var title = "";
                                    if(sv.startdate == "0000-00-00 00:00:00"){
                                        var stsd = startDate;
                                    }
                                    else{
                                        var stsd = (sv.startdate).substring(0, 10);
                                    }
                                    
                                    if(sv.enddate == "0000-00-00 00:00:00"){
                                        var sted = stsd;
                                    }
                                    else{
                                        var sted = (sv.enddate).substring(0, 10);
                                    }
                                    
                                    if((thistd >= stsd) && (thistd <= sted)){
                                        tdcolor = bgcolor[j];
                                        title = stsd + " - " + sted;
                                    }
                                    design += '<td class="'+gridclassname+'" style="min-width:20px;text-align:right;background:'+tdcolor+'" title="'+title+'">&nbsp;';
                                    
                                    design += '</td>';
                                    stdi++;
                                }
                                design += '</tr></table></td>';
                            }
                            design += '</tr>';
                            // design += '<tr class="separetor" style="line-height: 2px;">';
                            // design += '<td><hr></td>';
                            
                            // design += '<td colspan="'+diff+'"><hr></td>';
                            
                            // design += '</tr>';
                        }
                    });
                    j = j+1; if(j==8) j=0;
                }
                 
            });
        } 
        else if(v==30) {
            design += '<tr style="border-bottom:1px solid #000;">';
            design += '<td height=65px width=300px style="border-right:1px solid #CCC;">Tasks</td>';
            
            var s = monthno;
            var mn = monthno;
            var yn = yearno;
            var n = (Math.ceil(diff/v)) + s;

            for(var i=s; i<n; i++){
                design += '<td align="center" class="brhr">';
                
                design += engMonth(mn)+", "+yn;
                design += '</td>';
                mn++; if(mn==13) {mn=1; yn++;}
            }
            design += '</tr>';
            var j = 0;
            $.each(protaskjs, function(k, v) {
                if(fdate && tdate){
                    if(fdate<=sdt[k] && tdate>=edt[k]){
                        design += '<tr class="trbottomcolor">';
                        design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                        
                        var di = 0; // date interval
                        for(var oi=s; oi<n; oi++){ // oi = outer i
                            design += '<td><table width=100%><tr>';
                            
                            var d = new Date(startDate);
                            for(var i=0; i<daysMonth(s); i++){
                                var ddd = new Date(startDate);
                                var aa = ddd.setDate(d.getDate()+di);
                                var thistd = new Date(aa).format('Y-m-d');
                                var tdcolor = ""; var title = "";
                                if((thistd >= sdt[k]) && (thistd <= edt[k])){
                                    tdcolor = bgcolor[j];
                                    title = sdt[k] + " - " + edt[k];
                                }
                                design += '<td class="'+gridclassname+'" style="background:'+tdcolor+';" title="'+title+'">&nbsp;';
                                design += '</td>';
                                
                                di++;
                            }
                            design += '</tr></table></td>';
                        }
                        design += '</tr>';
                        // design += '<tr class="separetor" style="line-height: 2px;">';
                        // design += '<td><hr></td>';
                        
                        // design += '<td colspan="'+diff+'"><hr></td>';
                        
                        // design += '</tr>';
                        $.each(allSubTaskjs, function(sk, sv){
                            if(sv.parenttaskID == protaskjs[k].projecttaskid){
                                design += '<tr class="stbg trbottomcolor">';
                                design += '<td title="'+sv.projecttaskname+'" class="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                                
                                var stdi = 0; // date interval
                                for(var oi=s; oi<n; oi++){ // oi = outer i
                                    design += '<td><table width=100%><tr>';
                                    
                                    var dd = new Date(startDate);
                                    for(var i=0; i<daysMonth(s); i++){
                                        var dddd = new Date(startDate);
                                        var aaa = dddd.setDate(dd.getDate()+stdi);
                                        var thistd = new Date(aaa).format('Y-m-d');
                                        var tdcolor = "";
                                        var title = "";
                                        if(sv.startdate == "0000-00-00 00:00:00"){
                                            var stsd = startDate;
                                        }
                                        else{
                                            var stsd = (sv.startdate).substring(0, 10);
                                        }
                                        
                                        if(sv.enddate == "0000-00-00 00:00:00"){
                                            var sted = stsd;
                                        }
                                        else{
                                            var sted = (sv.enddate).substring(0, 10);
                                        }
                                        
                                        if((thistd >= stsd) && (thistd <= sted)){
                                            tdcolor = bgcolor[j];
                                            title = stsd + " - " + sted;
                                        }
                                        design += '<td class="'+gridclassname+'" style="text-align:right;background:'+tdcolor+'" title="'+title+'">&nbsp;';
                                        
                                        design += '</td>';
                                        stdi++;
                                    }
                                    design += '</tr></table></td>';
                                }
                                design += '</tr>';
                                // design += '<tr class="separetor" style="line-height: 2px;">';
                                // design += '<td><hr></td>';
                                
                                // design += '<td colspan="'+diff+'"><hr></td>';
                                
                                // design += '</tr>';
                            }
                        });
                        j = j+1; if(j==8) j=0; 
                    }
                }
                else{
                    design += '<tr class="trbottomcolor">';
                    design += '<td title="'+ protaskjs[k].projecttaskname+'" class="tasktitledesign">' + protaskjs[k].projecttaskname+'</td>';
                    
                    var di = 0; // date interval
                    for(var oi=s; oi<n; oi++){ // oi = outer i
                        design += '<td><table width=100%><tr>';
                        
                        var d = new Date(startDate);
                        for(var i=0; i<daysMonth(s); i++){
                            var ddd = new Date(startDate);
                            var aa = ddd.setDate(d.getDate()+di);
                            var thistd = new Date(aa).format('Y-m-d');
                            var tdcolor = ""; var title = "";
                            if((thistd >= sdt[k]) && (thistd <= edt[k])){
                                tdcolor = bgcolor[j];
                                title = sdt[k] + " - " + edt[k];
                            }
                            design += '<td class="'+gridclassname+'" style="background:'+tdcolor+';" title="'+title+'">&nbsp;';
                            design += '</td>';
                            
                            di++;
                        }
                        design += '</tr></table></td>';
                    }
                    design += '</tr>';
                    // design += '<tr class="separetor" style="line-height: 2px;">';
                    // design += '<td><hr></td>';
                    
                    // design += '<td colspan="'+diff+'"><hr></td>';
                    
                    // design += '</tr>';
                    $.each(allSubTaskjs, function(sk, sv){
                        if(sv.parenttaskID == protaskjs[k].projecttaskid){
                            design += '<tr class="stbg trbottomcolor">';
                            design += '<td title="'+sv.projecttaskname+'" class="sttitle"><i class="fa fa-level-up deg90"></i> ' +sv.projecttaskname+'</td>';
                            
                            var stdi = 0; // date interval
                            for(var oi=s; oi<n; oi++){ // oi = outer i
                                design += '<td><table width=100%><tr>';
                                
                                var dd = new Date(startDate);
                                for(var i=0; i<daysMonth(s); i++){
                                    var dddd = new Date(startDate);
                                    var aaa = dddd.setDate(dd.getDate()+stdi);
                                    var thistd = new Date(aaa).format('Y-m-d');
                                    var tdcolor = "";
                                    var title = "";
                                    if(sv.startdate == "0000-00-00 00:00:00"){
                                        var stsd = startDate;
                                    }
                                    else{
                                        var stsd = (sv.startdate).substring(0, 10);
                                    }
                                    
                                    if(sv.enddate == "0000-00-00 00:00:00"){
                                        var sted = stsd;
                                    }
                                    else{
                                        var sted = (sv.enddate).substring(0, 10);
                                    }
                                    
                                    if((thistd >= stsd) && (thistd <= sted)){
                                        tdcolor = bgcolor[j];
                                        title = stsd + " - " + sted;
                                    }
                                    design += '<td class="'+gridclassname+'" style="text-align:right;background:'+tdcolor+'" title="'+title+'">&nbsp;';
                                    
                                    design += '</td>';
                                    stdi++;
                                }
                                design += '</tr></table></td>';
                            }
                            design += '</tr>';
                            // design += '<tr class="separetor" style="line-height: 2px;">';
                            // design += '<td><hr></td>';
                            
                            // design += '<td colspan="'+diff+'"><hr></td>';
                            
                            // design += '</tr>';
                        }
                    });
                    j = j+1; if(j==8) j=0; 
                }
                
            });
        }

        design += '</table></td><td>&nbsp;&nbsp;&nbsp;</td></tr></table>';
        // console.log(allSubTaskjs);
        $("#tasktimeplan").html(design);
    }

    function changegridcolor(e){
        console.log($(e).html());
        if($(e).html() == "Hide Grid"){
            gridclassname = "bordercolorNone";
            $(".bordercolorEEE").attr("class", "bordercolorNone");
            $(e).html("Show Grid");
        }else{
            gridclassname = "bordercolorEEE";
            $(".bordercolorNone").attr("class", "bordercolorEEE");
            $(e).html("Hide Grid");
        }
    }

    function exporttopdf(){
        document.cookie = 'htmldata=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        // var fullhtmldata = "htmldata=" + $("#tasktimeplan").html();
        var fullhtmldata = "htmldata=asd afsd fasd fasd fasd fasd fasd fjalsdkjfa lsjdflasj dflajsdfjasd jfasdlfjasdfj asdjf";
        document.cookie = fullhtmldata;
        window.open("<?php echo base_url("export/pdf.php"); ?>");
    }
    function printit(){
        $('#tasktimeplan').jqprint();
        return false;
    }



    $(document).ready(function() {
      $("#btnPdf").click(function(e) {
        var posttable = [];
        $("#tasktimeplan tr").each(function(k,v){
            console.log(v.innerHTML);
            posttable.push(btoa(v.innerHTML));
        }); 
        // console.log(posttable);
        // $.each(posttable, function(k,v){
        //  console.log(v);
        // });
        // var htmldata = $("#tasktimeplan").html();
        $.ajax({
            url: '<?php echo site_url("yzy-projects/index/savetempdata"); ?>',
            type: "POST",
            dataType: 'json',
            data: { htmldata:posttable },
            success:function (data){
                window.open('<?php echo base_url("export/pdf_request.php?inserid="); ?>'+data.tempid);
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("514");
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
        // window.open('<?php echo base_url("export/pdf_request.php?asdf="); ?>'+htmldata);
      });

      $("#btnDoc").click(function(e) {
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-doc';
        var table_div = document.getElementById('tasktimeplan');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.doc';
        a.click();
      });

      $("#btnExcel").click(function(e) {
        $(".separetor").remove();
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('tasktimeplan');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
      });
    });



    function searchgc(){
        console.log($("#fdate").val());
        console.log($("#tdate").val());
        window.location.href='<?php echo site_url("yzy-projects/index/gantt_chart/".$pid."/1"); ?>'+"/"+(($("#fdate").val()).substring(0, 10))+"/"+(($("#tdate").val()).substring(0, 10));
    }

    $('.datetimepicker').datetimepicker({
        startDate:'+01-05-1971',//or 1986/12/08
        format:'Y-m-d H:i:s',
        closeOnDateSelect: true
    });
</script>
<!-- End ganttchart -->
<script type="text/javascript">
    var newTagArr = [];
</script>
<script type="text/javascript">
    function toggleDiv() {
        var winsize = window.innerHeight;
        var opntid = $("#taskOpenBy").val();
        var myseid = "<?php echo $id; ?>";
        if($("#feedDiv").css("display") == "none"){
            $(".feedbackbtn").css("margin-left","-665px");
        }else{
            $(".feedbackbtn").css("margin-left","-65px");
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
                $("#feedDiv").toggle();
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

</script>
<script type="text/javascript">
    var selectArray = <?php echo json_encode($users); ?>;
    console.log(selectArray);
    var newSelArr = selectArray;

    $("#assignToMember").html("");
    $("#assignToMemberset").html("");

    $(".select2_multiple01 option:selected").removeAttr("selected");
    $("#assignToMemberset option:selected").removeAttr("selected");
    
    $("#assignToMember").append('<option value="#addnew">Invite new people +</option>');
    $("#assignToMemberset").append('<option value="#addnew">Invite new people +</option>');
    
    $.each(selectArray, function (key, value) {
        //console.log(name);
        var name = value.full_name;

        // console.log(name);
        //newSelArr.push([value.ID,name]);

        $("#assignToMember").append('<option value="' + value.ID + '" >' + name + '</option>');
        $("#assignToMemberset").append('<option value="' + value.ID + '" >' + name + '</option>');

    });
    $("#assignToMemberset").trigger("change", [true]);
</script>

<style type="text/css">
#openProjectTaskDiv2{
   color: #000000;
   background-color: #F1F1EF;
   border: 2px solid #C8C8CA;
   display: none;
   text-align: justify;
   position: fixed;
   top: 50%;
   right: 42px;
   z-index: 101;
   width: 33.7%;
   height: auto;
   /*min-height: 250px;*/
 }
.btn-modal-newpro{
  width: 100%;background-color: #3c8dbc;color:white;height: 50px;
}
.modal-dialog{
    min-width: 500px !important;
    

}
.modal{
    z-index: 15002 !important;
}
 
</style>
<div id="openProjectTaskDiv2">
    <div class="col-lg-12" style="background: #3C8DBC;font-size: 22px; font-weight: 300;padding: 8px;color: #FFF;"> Invite people
      <i class="fa fa-times pull-right" onclick="openInvitePeople()" data-toggle="tooltip" title="" data-original-title="Remove" style="color: #fff; font-size: 30px; position: relative;font-weight:100"></i>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <div style="margin-top:10px;">
            <input id="gUserEmail" type="email" class="tags form-control" />
            <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-12" style="word-spacing: 3px; margin: 10px 0px;padding-left:0px; font-size:14px;"><a class="btn default btn-md" id="emailbodyClick">Work Description <span class="glyphicon glyphicon-triangle-bottom"></span></a></label>
        <div id="emailbodyOpen" style="display:none;">
            <textarea id="emailbodytext" class="form-control" style="color:#A4A2A2;" rows="3">We like to notice you that, you are now registered in our yeezy communication portal. You can easily access our portal using following credentials.</textarea>
        </div>
    </div>
      <div class="form-group">
      <button id="gUserEmailBtn" data-id="gUserEmailBtn" onclick="inviteUser($(this).data('id'))" type="button" class="btn btn-modal-newpro" style="font-weight: 300;font-size: 30px;">Invite</button>
    </div>
    </div>
    <div class="col-lg-12">&nbsp;</div>
</div>
<div id="pushNotDiv">
    <div class="round-button" data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'),'normal')"><div class="round-button-circle" id="r3"><a class="round-button">Reminder</a></div></div>
    <div class="round-button"  data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'),'warning')"><div class="round-button-circle" id="r2"><a class="round-button">Urgent</a></div></div>
    <div class="round-button" data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'),'urgent')"><div class="round-button-circle" id="r1"><a class="round-button">Warning</a></div></div>
    
   <!--  <img style="margin: 2%;cursor:pointer;" id="emargencyBtn" data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'))" src="<?php echo base_url(); ?>require/img/emargency2.png">
    <img style="margin: 2%;cursor:pointer;" id="emargencyBtn" data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'))" src="<?php echo base_url(); ?>require/img/emargency2.png">
    <img style="margin: 2%;cursor:pointer;" id="emargencyBtn" data-projectid="<?php echo $allProjectList[0]->projectid; ?>" onclick="goForEmargency($(this).data('projectid'))" src="<?php echo base_url(); ?>require/img/emargency2.png"> -->
</div>
  <script type="text/javascript">
  function osDiv(projectID) {
        var winsize = window.innerHeight;
        // console.log(winsize);
        if(winsize < 500){
            alert("Your browser height is too low to display this settings");
        }else{
            // Set the effect type
            var effect = 'slide';

            // Set the options for the effect type chosen
            var options = {direction: 'right'};

            // Set the duration (default: 400 milliseconds)
            var duration = 500;
            $.ajax({
                url: '<?php echo site_url(); ?>yzy-projects/index/getProDetail',
                type: 'POST',
                data: {
                    projectID: projectID
                },
                dataType: "json",
                beforeSend: function () {
                    // console.log("Emptying");
                    //console.log(projectID);
                    $("#togPopH").val("");
                    $("#tasknametitle").val("");
                    $("#assMembers").html("");
                },
                success: function (data, textStatus) {

                    //console.log(data);
                    propertiesLoad2ForSetting(data);
                    $('#setMyDiv').toggle(effect, options, duration);
                    if(winsize>930) var mydivbodysize = "676";
                    else var mydivbodysize = (winsize - 254);
                    $("#setMyDiv .box-body").css("height",mydivbodysize);
                    // console.log($("#setMyDiv .box-body").css("height"));
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
    function propertiesLoad2ForSetting(data) {
        $("#relatedto").hide();
        $("#assign_A").hide();
        $("#assign_C").hide();

        $("#memberset").html("");
        $.each(selectArray, function (key, value) {
            var name = value.full_name;
            $("#memberset").append('<option value="' + value.ID + '">' + name + '</option>');
        });

        //$(".select2_multiple30 option:selected").removeAttr("selected");

        $("#settingHead").html(data.proDetail[0].projectname);
        $("#datetimepicker7set").val(data.proDetail[0].startdate);
        $("#datetimepicker8set").val(data.proDetail[0].targetenddate);
        $("#datetimepicker9set").val(data.proDetail[0].actualenddate);



        $('#ProjectTypeset option[value="' + data.proDetail[0].projectstatus + '"]').attr("selected", "selected");
        $('#projectstatusset option[value="' + data.proDetail[0].proCurSta + '"]').attr("selected", "selected");

        //$('#projectstatus').val(data.proDetail[0].proCurSta);
        $('#projecttasktypeset option[value="' + data.proDetail[0].projecttype + '"]').attr("selected", "selected");
        $('#projecttaskprogressset option[value="' + data.proDetail[0].progress + '"]').attr("selected", "selected");
        $("#targetbudgetset").val(data.proDetail[0].targetbudget);
        $("#URLset").val(data.proDetail[0].projecturl);
        $('#ticketprioritiesset option[value="' + data.proDetail[0].projectpriority + '"]').attr("selected", "selected");
        $('#assignToMemberset option[value="' + data.proDetail[0].assignTo + '"]').attr("selected", "selected");
        $("#descriptionset").text(data.proDetail[0].description);
        $("#projecteidset").val(data.proDetail[0].projectid);
        $("#typeset").val(data.proDetail[0].project_type);

        $('#assignToMember option[value="' + data.proDetail[0].assignTo + '"]').attr("selected", "selected");
        $("#assignToMember").trigger("change", [true]);
        
        $("#assignToMember").change(function(e){
                e.preventDefault();
                var valu = $(this[this.selectedIndex]).val();
                if (valu =='#addnew') {
                  $(this[this.selectedIndex]).attr('selected',false);
                  openInvitePeople('#assignToMember');
                }
            });


        $.each(data.tag, function (key, value) {
            // console.log(data.tag[key].user_status);
            if (data.tag[key].user_status == 0) {
                $('#assignToMemberset option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
            }
            $("#assignToMemberset").trigger("change", [true]);
        });


        //$(".select2_multiple30 option:selected").removeAttr("selected");
        $.each(data.tag, function (key, value) {
            // console.log(data.tag[key].user_status);
            if (data.tag[key].user_status == 1) {
                $('.select2_multiple30 option[value="' + data.tag[key].ID + '"]').prop("selected", "selected");
            }
            $(".select2_multiple30").trigger("change", [true]);
        });

        if (data.proDetail[0].relatedto == 'Account') {
            $("#relatedToA").attr('checked', true);
            $("#relatedto").show('slide');
        } else {
            $("#relatedToC").attr('checked', true);
            $("#relatedto").show('slide');
        }

        $("#relatedto").val(data.proDetail[0].relatedToVal);




    }
  $("#assignToMember").change(function(e){
        e.preventDefault();
        var valu = $(this[this.selectedIndex]).val();
        if (valu =='#addnew') {
          $(this[this.selectedIndex]).attr('selected',false);
          openInvitePeople('#assignToMember');
        }
    });
    $("#assignToMemberset").change(function(e){
        e.preventDefault();
        var valu = $(this[this.selectedIndex]).val();
        if (valu =='#addnew') {
          $(this[this.selectedIndex]).attr('selected',false);
          openInvitePeople('#assignToMemberset');
        }
    });
    
    var standard_message = $('#emailbodytext').val();
    $(document).ready(function(){
      $("#emailbodyClick").click(function(){
        $("#emailbodyOpen").toggle();
        $(this).find('span').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top')
      });
    });
    $('#emailbodytext').focus(function(){
        if ($(this).val() == standard_message)
            $(this).val("");
    });
    $('#emailbodytext').blur(function(){
        if ($(this).val() == "")
            $(this).val(standard_message);
    });
    function openInvitePeople(valu){
       $("#gUserEmail").trigger('click');
       var effect = 'slide';
       var options = { direction: 'right' };
       var duration = 500;
       $("#gUserEmailBtn").attr('data-id',valu);
       $('#openProjectTaskDiv2').toggle(effect, options, duration, function(){
            $(this).find('input[placeholder="Email Addresses"]').focus();
       });
     }

     
  </script>


<script type="text/javascript">
    function selectSplice(val) {
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

        //console.log(newSelArr);


        jQuery.grep(newSelArr, function (el) {

            if (jQuery.inArray(el, val) == -1)
                unique.push(el);
            i++;

        });
        //console.log(unique);

        for (var i = 0; i < unique.length; i++) {
            $.each(selectArray, function (key, value) {
                if (unique[i] === value.ID) {
                    finalArr.push(value);
                }

            });

        }

        //console.log(finalArr);

        $("#member").append('<option value="#addnew">Invite new people +</option>');
        $("#project_members").append('<option value="#addnew">Invite new people +</option>');
        $.each(finalArr, function (key, value) {
            var name = value.full_name;
            $("#member").append('<option value="' + value.ID + '">' + name + '</option>');
            $("#project_members").append('<option value="' + value.ID + '">' + name + '</option>');
        });

        $(".select2_multiple30").trigger("change", [true]);

    }

$("#member").change(function(e){
  e.preventDefault();
  var valu = $(this[this.selectedIndex]).val();
  if (valu =='#addnew') {
    $(this[this.selectedIndex]).attr('selected',false);
    openInvitePeople('#member');
  }
});
</script>
<script type="text/javascript">
    function shoModal(modalid) {
        //console.log(modalid);
        if (modalid == "#addNewSubCategory")
            $(modalid).modal();
    }
</script>
<script type="text/javascript">
    var myStararray = new Array();
    var myProarray = new Array();
    var myOtherarray = new Array();

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
    $(document).ready(function () {
        $(".editBtn").click(function () {
            $(".customDisable").attr("disabled", false);
        });
    });
</script>
<!-- Function For open new project create div -->
<script type="text/javascript">
    function openDiv() {
        $(".ImgBoxBack").css('display', 'block');
        $("#propertiesBox").css("display", "block");
    }
    function closeDiv(id) {
        $(".ImgBoxBack").css('display', 'none');
        $("#" + id).css('display', 'none');
    }

</script>

<script type="text/javascript">
    function removeArra(ary, d) {
        if (ary == 'myOtherarray') {
            myarray = myOtherarray;
        } else if (ary == 'myProarray') {
            myarray = myProarray;
        }

        $.each(myarray, function (key, value) {
            if (value[1] === d) {
                myarray.splice(myarray.indexOf(d), 1);
            }

        });


    }
    
</script>

<script type="text/javascript">
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

        var wrapper = $("#table_container");

        if (!wrapper.is(e.target) // if the target of the click isn't the container...
                && wrapper.has(e.target).length === 0) // ... nor a descendant of the container
        {
            $('#popupSubMenu button').each(function (index, value) { 
              $(value).addClass("disabled"); 
            });
            $('#popupMainMenu button').each(function (index, value) { 
              $(value).addClass("disabled"); 
            });
        }
        
    });

    function openLocation() {
        $("#opd").html($("#loc").attr("data-project"));
        $("#otd").html($("#loc").attr("data-task"));
        var effect = 'slide';
        var options = {direction: 'right'};
        var duration = 500;
        $('#openProjectTaskDiv2').toggle(effect, options, duration, function(){
            $(this).find('input[placeholder="Email Addresses"]').focus();
       });
    }

    function drawprojectlist(projectid, projectname) {
        tempprojectlist.push({id: projectid, name: projectname});
        if (projectid == $("#optld-pid").val())
            $(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "<span class='pull-right'><i class='fa fa-check'></i></span></p>");
        else
            $(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "</p>");
    }

    function drawtasklist(inputDiv, taskname) {
        tempprojectlist.push({id: inputDiv, name: taskname});
        $(".optld-body").append("<p onclick='taskmoveto(" + inputDiv + ", \"" + taskname + "\")'>" + taskname + "</p>");
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
</script>
<div id="setMyDiv">
    <div class="togPop" style="cursor:pointer;" onclick="osDiv(<?php echo $allProjectList[0]->projectid; ?>)"><i class="fa fa-close cl"></i></div>
    <div class="row" style="background-color: #FFF;margin-left: 0%;">
        <div class="col-lg-12" style="background-color: #FFF;margin-left: 2%;padding-right: 5%;margin-bottom: 2%;">
            <div class="col-lg-11" style="margin-top: 10px;margin-left: 0px;font-size: 17px;">
                <input type="checkbox" class="archive" id="archive">
                <p style="font-size: 1.30em;font-weight: 600;" id="settingHead"></p>
            </div>
            <p class="small" style="color:#616161" id="togPopTime"></p>
            <i id="expand_mydivSet" class="fa fa-2x fa-arrows-alt"></i>
            <div style="position: relative; float: right; margin-right: 40px; margin-top: -45px;">
                <p id="update_oksett" style="font-size: 14px;margin-top: 16%;"><i style="color:green" class="fa fa-check" aria-hidden="true"><b> Updated</b></i></p>
                <p id="update_notsett" style="font-size: 14px;margin-top: 16%;"><i style="color:red" class="fa fa-times" aria-hidden="true"><b> Not Updated</b></i></p>
            </div>
        </div>
    </div>
    <form action="<?php echo base_url(); ?>yzy-projects/index/updateProject " name="form_dataset2" id="form_dataset2" method="POST">
    <div class="row" style="background-color: #FFF;margin-left: 0%;">
        <!-- <div class="col-lg-3" style="width: 19%; padding: 0px;margin-left: 2%;">
            <p class="" style="color:#616161;margin-top: 3px;">Date: 2016-04-25</p>
        </div> -->
        <div class="col-md-3" style="width: 20%; padding: 0px;margin-left: 2%;">
            <span style="width: 100px;margin-left:250px" onclick="deleteProject()"  class="btn btn-xs btn-warning"><i class="fa fa-sticky-note"></i> Delete Project</span>
        </div>
        <div class="col-md-3" style=" width: 46%; padding: 0px;">
            <span style="width: 100px; margin-left:220px" class="btn btn-xs btn-info" onclick="copyProject()" href=""><i class="ion-ios-calendar-outline"></i> Copy Project</span>
        </div>
        <div class="col-md-6" style="width: 30%;padding-left: 0px;">
            <div class="headerDivider"></div>
            <button type="button" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" onclick="osDiv(<?php echo $allProjectList[0]->projectid; ?>)">Exit</button>
            <button type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Update</button>
            <div class="headerDivider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            
                <div class="box">
                    <div class="box-body" style="height: 545px;min-height: 300px; overflow-y: auto;">
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2 size-family-sidebar" >Description </label>
                            <div class="col-md-10">
                                <textarea style="margin-left: -1%;width: 101%;" name="description" class="form-control size-family-sidebar" id="descriptionset" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Startdate</label>
                            <div class="col-lg-8">
                                <div class="input-group feedtext">
                                    <input name="startdate" type="text" class="form-control size-family-sidebar" id="datetimepicker7set" value=""  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Duedate</label>
                            <div class="col-lg-8">
                                <div class="input-group feedtext">
                                    <input name="targetdate" type="text" class="form-control size-family-sidebar" id="datetimepicker8set" value=""  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-lg-4 size-family-sidebar">Date</label>
                            <div class="col-lg-8">
                                <div class="input-group feedtext">
                                    <input name="actualdate" type="text" class="form-control size-family-sidebar" id="datetimepicker9set" value=""  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label col-lg-4 size-family-sidebar" style="margin-top: 10px;">Relatedto</label>
                            <div class="col-md-8">
                                <label class="control-label size-family-sidebar">
                                    <input type="radio" name="relatedTo" id="relatedToA" class="customDisable size-family-sidebar" value="A" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo "checked";   ?> onclick="toggleRelatedTo(this.value)">
                                    Accounts &nbsp;
                                    <input type="radio" name="relatedTo" id="relatedToC" class="customDisable size-family-sidebar" value="C" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo "checked";   ?> onclick="toggleRelatedTo(this.value)">
                                    Contacts </label>
                            </div>
                            <div class="col-md-8"> <span>
                                    <div class="input-group" style="margin-bottom: 10px;">
                                        <input type="text" name="relatedtoVal" id="relatedto" class="form-control customDisable size-family-sidebar">
                                        <a  id="assign_A" href="<?php echo site_url() . "modulecontrol/searchproject/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a> <a id="assign_C" href="<?php echo site_url() . "modulecontrol/searchproject/contactdetails"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a> </div>
                                </span> </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label col-lg-2 size-family-sidebar" style="margin-top: 1%;margin-right: -0.5%;">Supervisor</label>
                            <div class="col-md-10">
                                <select name="assignto[]" multiple="multiple" id="assignToMemberset" class="size-family-sidebar" onchange="selectSplice($(this).val())" style="padding-left: -5%;width: 100.5%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label col-lg-2 size-family-sidebar" style="margin-top: 3%;margin-right: -0.5%;">Members</label>
                            <div class="col-lg-10 size-family-sidebar">
                                <select name="member[]" id="memberset" multiple="multiple" class="select2_multiple size-family-sidebar" style="width: 100.5%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-2 size-family-sidebar" style="margin-right: -0.5%;">URL </label>
                            <div class="col-md-10">
                                <input type="text" name="url" id="URLset" class="form-control size-family-sidebar">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-lg-4 size-family-sidebar">Group</label>
                            <div class="col-lg-8">
                                <div class="input-group feedtext">
                                    <select class="form-control size-family-sidebar" name="ProjectType" id="ProjectTypeset">
                                        <option value="Private">Private</option>
                                        <option value="Public">Public</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-4 size-family-sidebar">Status</label>
                            <div class="col-md-8">
                                <select name="projectstatus" id="projectstatusset" class="form-control size-family-sidebar">
                                    <?php foreach ($projectstatus as $r) { ?>
                                        <option value="<?php echo $r->projectstatus; ?>"><?php echo ucfirst($r->projectstatus); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-md-4 size-family-sidebar">Type</label>
                            <div class="col-md-8">
                                <select name="projecttasktype" id="projecttasktypeset" class="form-control size-family-sidebar">
                                    <?php foreach ($projecttasktype as $r) { ?>
                                        <option value="<?php echo $r->projecttasktype; ?>"><?php echo ucfirst($r->projecttasktype); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label col-md-4 size-family-sidebar">Progress </label>
                            <div class="col-md-8">
                                <select name="projecttaskprogress" id="projecttaskprogressset"  class="form-control size-family-sidebar">
                                    <?php foreach ($projecttaskprogress as $r) { ?>
                                        <option value="<?php echo $r->projecttaskprogress; ?>"><?php echo ucfirst($r->projecttaskprogress); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-4 size-family-sidebar">Budget </label>
                            <div class="col-md-8">
                                <input type="text" name="targetbudget" id="targetbudgetset" class="form-control size-family-sidebar">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-4 size-family-sidebar">Priority </label>
                            <div class="col-md-8">
                                <select name="ticketpriorities" id="ticketprioritiesset" class="form-control size-family-sidebar">
                                    <?php foreach ($ticketpriorities as $r) { ?>
                                        <option value="<?php echo $r->ticketpriorities; ?>"><?php echo ucfirst($r->ticketpriorities); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr />



                    </div>
                    <div class="box-footer" style="background-color: #FFF;margin-left: 0%;">
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <input type="hidden" name="projecteid" value="" id="projecteidset" />
                                <input type="hidden" name="lasUpdate" value="<php echo date('Y-m-d H:i:s'); ?>" id="lasUpdate" />
                                <input type="hidden" name="type" value="" id="type" />
                                <button type="button" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" onclick="osDiv(<?php echo $allProjectList[0]->projectid; ?>)">Exit</button>
                                <button type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.col -->
        </div>
        <!-- /.col -->
    </div>
    </form>
</div>
<script type="text/javascript">
function TagList() {
        if($("#popMemBox007").css("display") == "none"){
            $("#popMemBox007 table .grouprow").remove();
            $(".groupMemberSelect").attr("checked", false);
            $("#sgcbtn").hide();
            var request = $.ajax({
                url: "<?php echo site_url("chat/groupList"); ?>",
                data: {pid: "<?php echo $allProjectList[0]->projectid; ?>", uid: "<?php echo $user_email; ?>"},
                method: "POST",
                dataType: "json"
            });            
            request.done(function(rsp) {
                $.each(rsp[0], function(k,v){
                    var design = '';
                    if(k==0)
                        design += '<tr class="grouprow" id="grouprow'+v.group_id+'" style="border-top: 1px solid #000 !important;">';
                    else
                        design += '<tr class="grouprow" id="grouprow'+v.group_id+'">';
                    design +=   '<td style="border: none !important;"><a href="#" onclick="opengroupchat('+v.group_id+', \''+v.group_name+'\' )">'+v.group_name+'</a></td>';
                    design +=   '<td style="border: none !important;">&nbsp;</td>';
                    design +=   '<td style="border: none !important; width:40px;text-align:right"><button class="btn btn-danger btn-xs" title="Delete Group" onclick="deleteGroup('+v.group_id+')"><i class="fa fa-trash-o"></i></button></td>';
                    design += '</tr>';
                    $("#popMemBox007 table").append(design);
                });
            });
            
            $("#popMemBox007").toggle("slideDown");
            is_online();
        }
    }

    function closeprojectchat(){
        $('#cstream99').text("");
        globalMsgArray.length = 0;
        $('#cstream99').html("");
        $('#projectchatdiv').hide("slow");
    }
    
    function openprojectchat(pid,pname,type) {
        var winsize = window.innerHeight;
        var winW = window.innerWidth;
        console.log(winW);
        if(winsize < 300){
            alert("Your browser height is too low to open this window");
        }else{
            $("#editGroupNameText").val(pname);
            globalMsgArray.length = 0;
            $('#cstream99').html("");
            var mid = $("#mid99").val();
            var request1 = $.ajax({
                url: "<?php echo site_url("chat/searchGroupMember"); ?>",
                method: "POST",
                data: {group_id : pid},
                dataType: "json"
            });
            request1.done(function( rsp ) {
                // $(".select_gc_chat_member").html("");
                $(".select_gc_chat_member option:selected").removeAttr("selected");
                $.each(rsp.data, function(k,v){
                    if(mid != v){
                        // $(".select_gc_chat_member").append('<option value="' + v + '">' + v + '</option>');
                        $('.select_gc_chat_member option[value="' + v + '"]').prop("selected", "selected");
                    }
                });
                $(".select_gc_chat_member").trigger("change", [true]);
                $(".select_gc_chat_member").select2({width: '100%'});
            });
            if(type == "project"){
                $(".select_gc_chat_member").prop("disabled", true);
            }else{
                $(".select_gc_chat_member").prop("disabled", false);
            }
            $('#projectchatdiv').show("slow");
            $('#pid99').val(pid);
            $('#fid99').val(pid);
            if($("#projectchatdiv").css('display') !== 'none'){
                var myEmail = $("#mid99").val();
                var frndEmail = $("#fid99").val();
                var request = $.ajax({
                    url: "<?php echo site_url("chat/searchOldMsg"); ?>",
                    method: "POST",
                    data: { mid : myEmail, fid : frndEmail },
                    dataType: "json"
                });
                request.done(function( rsp ) {
                    $.each(rsp, function(keyId, keyValue){
                        if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
                            globalMsgArray.push(keyValue.msgid);
                            if(keyValue.type == 'right')
                                drawSendMsg(99, keyValue.time, '<?php echo $user_img; ?>', keyValue.msg);
                            else if(keyValue.type == 'left')
                                drawReceiveMsg(99, keyValue.time, keyValue.img, keyValue.msg);
                        }
                    });
                    // $('#chat99').scrollTop($('#cstream99').height());
                    if(winsize>700) var mydivbodysize = "500";
                    else var mydivbodysize = (winsize - 250);
                    $("#chat99").css("height",mydivbodysize);

                    $("#chat99").animate({scrollTop: $('#chat99').prop("scrollHeight")}, 1000);
                    $('#msenger99 textarea').val('');
                    $('#msenger99 textarea').focus();
                });
            }
            // return false;
        }
    }

    function updategrouplist(){
        var pid = $("#pid99").val();
        var mid = $("#mid99").val();
        var member = $(".select_gc_chat_member").val();
        var request1 = $.ajax({
            url: "<?php echo site_url("chat/updateGroupMember"); ?>",
            method: "POST",
            data: {group_id : pid, member: member, mid: mid},
            dataType: "json"
        });
        request1.done(function( rsp ) {
            console.log("update success");
        });
        // console.log($(".select_gc_chat_member").val());
    }

    
</script>
<script type="text/javascript">
    function offMDiv() {
        $("#feedDiv").hide();
        var effect = 'slide';
        var options = {direction: 'right'};
        var duration = 500;
        $('#myDiv').toggle(effect, options, duration);
    }
</script>

<script type="text/javascript">
    function opendiv() {
        // Set the effect type
        var effect = 'slide';

        // Set the options for the effect type chosen
        var options = {direction: 'right'};

        // Set the duration (default: 400 milliseconds)
        var duration = 500;
        $('#selectDiv').toggle(effect, options, duration);

        //console.log($("#assignToMember").val());
        //selectSplice($("#assignToMember").val());
    }
    
</script>
<script>
  $(function () {
    $("#assignToMember").select2({
      maximumSelectionLength: 10,
      placeholder: "Add project Administrator/Supervisor/Co-ordinator",
      allowClear: true
    });
  });
</script>

<script>
    $(function () {
        $(".select2_multiple3").select2({
            maximumSelectionLength: 10,
            placeholder: "Add People who are involved in this project",
            allowClear: true
        });
    });
</script>

<script>
    $(function () {
        $("#assignToMemberset").select2({
            maximumSelectionLength: 10,
            placeholder: "Add People who are involved in this project",
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple30").select2({
            maximumSelectionLength: 10,
            placeholder: "ADD PROJECT ADMINISTRATOR/SUPERVISOR/CO-ORDINATOR",
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select_gc_chat_member").select2({
            maximumSelectionLength: 10,
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple1").select2({
            maximumSelectionLength: 10,
            placeholder: "Add People who are involved in this project",
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple4").select2({
            maximumSelectionLength: 10,
            placeholder: "Add project Administrator/Supervisor/Co-ordinator",
            allowClear: true,
            minimumResultsForSearch: 1,
            tags: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple2").select2({
            maximumSelectionLength: 10,
            placeholder: "Select Tag",
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple5").select2({
            maximumSelectionLength: 10,
            placeholder: "Select Tag",
            allowClear: true
        });
    });
</script>
<script>
    $(function () {
        $(".select2_multiple6").select2({
            maximumSelectionLength: 10,
            placeholder: "Select Tag",
            allowClear: true
        });
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
</script>
<script type="text/javascript">

    function callmodal(valueid2, username, userIMG, commID, typeid, imageSRC) {
        //console.log(imageSRC);
        var valueid = valueid2 + "p_r";
        //console.log(valueid+","+typeid);
        var IMGURL = '<?php echo site_url(); ?>/require/dist/img';
        var userimg = '<?php echo site_url(); ?>/require/dist/img/' + userIMG;
        $.ajax({
            url: "<?php echo site_url(); ?>yzy-tasks/index/replyRetrive",
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
                    Commentstring += '<div class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' + dateasd + '</small>' + data.allReply[key].user_name + '</a>' + data.allReply[key].comment + '</div>';
                    Commentstring += '<small id="reply' + i + '"  data-name = "' + data.allReply[key].user_name + '"  data-value="' + commID + '" onclick="openReplyBox($(this).data(\'value\'),$(this).data(\'name\'))" class="pull-left" style="margin-left:9%; color: #3C8DBC; cursor: pointer;">Reply</small>';
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
//    


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
    
    function deleteGroup(group_id){
        var url = "<?php echo site_url("chat/deleteGroup"); ?>"+"/"+group_id;
        var request = $.ajax({
            url: url,
            method: "POST",
            dataType: "json"
        });
        
        request.done(function(rsp) {
            $("#grouprow"+group_id).hide("slow");
        });
    }

    function createnewgroupchat(){
        var member = [];
        $("input.groupMemberSelect:checkbox:checked").each(function(){
            member.push($(this).val());
        });
        console.log(member);
        var group_id = Date.now() + Math.floor((Math.random() * 10000) + 1);
        var request = $.ajax({
            url: "<?php echo site_url("chat/createGroup"); ?>",
            method: "POST",
            data: {member: member, mid: "<?php echo $user_email; ?>", group_id: group_id, pid: "<?php echo $allProjectList[0]->projectid; ?>"},
            dataType: "json"
        });
        
        request.done(function( rsp ) {
            // console.log(rsp.result);
            if(rsp.result == "new"){
                $("#popMemBox007").hide();
                $("#fid99").val(group_id);
                openprojectchat(group_id, "New Group","group");
            } else if(rsp.result == "old"){
                opengroupchat(rsp.group_id, rsp.group_name);
            }
        });
        request.fail(function(){
            console.log("Error in createnewgroupchat function");
        });
        // alert("Under construction. Please wait...");
    }

    function opengroupchat(gid, gname){
        $("#popMemBox007").hide();
        $("#fid99").val(gid);
        openprojectchat(gid, gname, "group");
    }

</script>


<script type="text/javascript">
    // setInterval(function(){
    //      var tid = $("#taskID").val();
    //      var pid = $("#projecteid").val();
    //      ajaxTaskDetail(tid,pid);
    //  }, 2000);
    // setInterval(ajaxTaskDetail(tid,pid),50); 
    function TagListOut(vId) {
        //alert("Ohhh!!! checking event?");
        $("#arrow" + vId).css("display", "block");
        $("#arrow_box" + vId + "P").html("");
        $("#img_box" + vId).html("");
        //console.log('Check On CLick');
    }
</script>


<script type="text/javascript">
    function opneChat() {
        
        $('#toggleChatListWindow').trigger('click', [true]);

    }

</script>
<script type="text/javascript">
    $(document).on("click", "#expand_mydivSet", function () {
        if ($(this).hasClass("fa-arrows-alt"))
            $('#setMyDiv').animate({width: '46%'});
        else
            $('#setMyDiv').animate({width: '90%'});


        $(this).toggleClass("fa-arrows-alt fa-compress");
    });

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
</script>

<style type="text/css">
    /* CSS by sujon */
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
    max-width: 1200px !important;
    min-width: 300px !important;
    box-shadow: 5px 5px 5px #888888 !important;
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
    
     #tbl_TaskEntry tr td:nth-last-child(-n+5),#tbl_TaskCompleted tr td:nth-last-child(-n+5) { 
        background-color: #E7E7E7 !important;
    }
   #tbl_TaskEntry td:nth-of-type(2),#tbl_TaskCompleted td:nth-of-type(2) {

    display: none;

    }
.select2-selection{
    border:none !important;
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
 .qtip-icon .ui-icon{
    font-family: 'ProximaNovaW01-Regular' !important;
 }
</style>
<script type="text/javascript">
    var newrownum = 0;
    var pro_id = '<?php echo $allProjectList[0]->projectid; ?>';

function goForEmargency(projectID,status){
      var taskID = $("#emBtn").val();

      console.log(projectID);
      console.log(taskID);
      console.log(status);
      
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
            console.log(rsp.status);
            if(rsp.status == 'done'){
              bootbox.dialog({
                message: "Successfully notified this task members",
                title: "Success Message",
                buttons: {
                    success: {
                        label: "Ok!",
                        className: "btn-danger",
                        callback: function () {

                        }
                    }

                }
            });
            }else if(rsp.status == 'fail'){
              bootbox.dialog({
                message: "No member(s) found to notify. Please add member first",
                title: "Error Message",
                buttons: {
                    success: {
                        label: "Ok!",
                        className: "btn-danger",
                        callback: function () {

                        }
                    }

                }
            });
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

function openChat(){
    if ($("#chatlistwindow").is(":visible")) 
        disableChatList();
             else 
                enablechatlistwindow();
                $("#myDiv").hide('slow');
}


function  removethis(inputID,imgName,taskid,type){
    console.log(inputID+""+imgName+""+taskid+""+type);
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
                if(rsp.status == 'done'){
                    console.log(rsp);
                    $("#"+imgName+taskid).remove();
                }else{
                    bootbox.dialog({
                        message: "Already taged!!!",
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
                }
                
                
              });
    
}
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.0.1/jquery.contextMenu.min.js"></script>
 -->

 <script>
        
    $(document).ready(function(){
        
        $("#tbl_TaskEntry").on('click focus', 'tr', function (event) {
           
            var thisID = event.target.id;
            //$("#"+thisID+"_exD").css("display","none");

            $("#"+thisID).focusout(function() {
                $("#"+thisID+"_exD").css("display","block");
            });

        });

         $("#tbl_TaskEntry").on('click focus', 'tr[id^="subtaskrow_"]', function (event) {

            var thisID = event.target.id;
            //$("#"+thisID+"_sub_exD").css("display","none");

            $("#"+thisID).focusout(function() {
                $("#"+thisID+"_sub_exD").css("display","block");
            });

        });

        //$(this).closest('table').attr('id')

        
    });
 
    
    
    function saveTag(id,name,taskid,label,status,inType){
        //console.log(inputID+":"+imgName);
        var $contextMenu = $("#contextMenu");
        var request = $.ajax({
               url: '<?php echo site_url(); ?>yzy-projects/index/saveTag',
                method: "POST",
                data:{
                  name:name,
                  type:inType
                },
                dataType: "json"
              });
              request.done(function(rsp) {
                if(rsp.status == 'done'){
                    $("#taglistOption").append('<li><a href="#">'+name+'</a></li>');
                    $("#tagtitleAdd").html('<a href="#">Add New +</a>');
                    $contextMenu.hide();
                    $('.autocomplete-suggestions').css('display','none');
                    if(inType == 'S'){
                        changeSubTaskTag(name,taskid,label,status);
                    }else if(inType == 'T'){
                        changeTaskTag(id,name,taskid,label,status);
                    }
                    
                }else{
                    bootbox.dialog({
                        message: "Already taged!!!",
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
                }
                
                
              });
    }
    
    function openEmargencyDiv(){
        // Set the effect type
        var effect = 'slide';

        // Set the options for the effect type chosen
        var options = { direction: 'left' };

        // Set the duration (default: 400 milliseconds)
        var duration = 500;

        $('#pushNotDiv').toggle(effect, options, duration);   
    }

</script>
<script type="text/javascript">
    function ganttchart(){
        if($(".gantt_chart").css("display") == "block"){
            $(".gantt_chart").hide("slow");
            $(".demo-wrapper").show("slow");
        }else{
            $(".demo-wrapper").hide("slow");
            $(".gantt_chart").show("slow");
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.searchBtn', function (e) {
            $("#search_inputbox").toggle('slow').click().focus();
        });
        

           
    });


    $(document).ready(function()
    {
        $('#search_inputbox').keyup(function()
        {
            searchTable($(this).val());
            // searchTable($(this).val() , 'tbl_TaskCompleted');
        });
    });

    function searchTable(inputVal)
    {
        var tablerow = $('.trbottomcolor');
        tablerow.each(function(index, row)
        {
            console.log("select search inputs:");
            var allCells = $(row).find("td");
            if(allCells.length > 0)
            {
                var found = false;
                allCells.each(function(index, td)
                {
                    var regExp = new RegExp(inputVal, 'i');
                    if(regExp.test($(td).html()))
                    {
                        found = true;
                        return false;
                    }
                });
                if(found == true) {
                    $(row).show();
                    // console.log($(row));
                    // if( $(row).attr('id').indexOf('subtaskrow') !=-1 ) {
                    //     $(row).closest('table').show();
                    //     $(row).closest('table').closest('tr').prev().show();
                    // }
                }
                else $(row).hide();
            }
        });
    }

    $('body').click(function(e){
        var clickedOn = $(e.target);
        if (clickedOn.parents().andSelf().is('#tbl_TaskEntry')){
          console.log( "Clicked on", clickedOn[0], "inside the div" );
        }else{
          $(".trSubtaskNewEntry").hide();
        }
    });

    $( document ).on( 'keydown', function ( e ) {
        if ( e.keyCode === 27 ) { // ESC
            var proID = <?php echo $allProjectList[0]->projectid; ?>;
            
            //alert("Press esc huuh???");
            
            if($("#setMyDiv").is(":visible")){
                osDiv(proID);
            }

            if($("#myDiv").is(":visible")){
                offMDiv();
            }

            if($("#openProjectTaskDiv").is(":visible")){
                openLocation();
            }

            if($("#openProjectTaskDiv2").is(":visible")){
                openInvitePeople();
            }

            if($("#projectchatdiv").is(":visible")){
                closeprojectchat();
            }

            if($("#popMemBox007").is(":visible")){
                
                $("#popMemBox007").css('display','none');
                //TagList();
                //$("#TagListAsignTo").trigger("click");
            }
        }
    });
</script>

<style type="text/css">
    .imgMenu{
        margin-right: 4%;
        padding: 0% 0% 2% 0%;
    }
    #contextMenu>ul>li>a:hover, #contextMenu>ul>li>a:active, #contextMenu>ul>li>a:focus{
        background-color: #3C8DBC !important;
        color: #FFFFFF;
    }
    /*#tbl_TaskEntry tr td:nth-child(3) {
        background-color: #e7e7e7  !important;
    }

    #tbl_TaskEntry tr td:nth-child(4) {
        background-color: #e7e7e7  !important;
    }

    #tbl_TaskEntry tr td:nth-child(5) {
        background-color: #e7e7e7  !important;
    }

    #tbl_TaskEntry tr td:nth-child(6) {
        background-color: #e7e7e7  !important;
    }*/

    .rowColor{
        background-color: #f2f2f2 !important;
    }

    .MainrowColor{
        background-color: #e7e7e7 !important;
    }

    
    .dropdownmenu>.dropdown-menu {
        width: 100%;
    }

    /* CSS by sujon */
    .ui-state-highlight { height: 3em; line-height: 3em;background-color: yellow !important }
    .ui-sortable-helper {
    display: table;
    }
    .sortable{overflow: auto;}
</style>