	
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/js/plugin/MultiDatesPicker-1.6.3/css/jquery-ui.css">

	<script src="<?php echo base_url();?>asset/js/plugin/MultiDatesPicker-1.6.3/jquery-ui.multidatespicker.js"></script> -->

	<!-- <script src="<?php echo base_url();?>asset/js/plugin/later/later.js"></script> -->
		<script src="<?php echo base_url();?>asset/js/plugin/rrule/lib/rrule.js"></script>
		<!-- <script src="<?php echo base_url();?>asset/js/plugin/rrule/lib/nlp.js"></script> -->



	<style type="text/css">

		#antoform .modal-content{
			width: initial !important;
		}
		#antoform .proCalarea{
			border-radius: 6px !important;
			border: 2px solid #cecbcb;
		}
		#antoform .modal-header{
			padding: 3px;
		}
		#antoform .modal-body{
			/*padding: 0px;*/
		}
		#antoform .form-group{
			margin-bottom: 5px;
		}
		#tab_recurrence .form-group{
			/*padding-bottom: 5px;*/
			border: 1px solid #ccc;
		}
		#antoform .modal-footer{
			padding: 5px;
		}
		#antoform .nav>li>a{
			padding: 5px;
		}
		#antoform .close-entryform{
			margin-right: 7px;
		}
		#antoform .modal-title{
			margin-left: 7px;
		}
		#antoform input[type="text"]{
			width: 100%;
		}
		#antoform [class^="col"] {
			padding-left: 5px;
			padding-right: 5px;
		}
		#antoform .row{
			margin-left: -5px;
			margin-right: -5px;
		}
		#antoform .form-control{
			padding: 2px;
			
		}

		#sel_start_times, #sel_end_times, #sel_durations {
			width: 100px;
			height: 30px;
		}

		#timetxt_start, #timetxt_end, #timetxt_dur {
			width: 75px !important;
			margin-left: -100px;
			height: 25px;
			border: none;
		}

		#antoform #openProjectTaskDiv{
			color: #000000;
			background-color: #F1F1EF;
			border: 2px solid #C8C8CA;
			display: none;
			text-align: justify;
			position: fixed;
			top: 42%;
    	left: 50%;
			z-index: 11111;
			width: 300px;
			height: auto;
			/*min-height: 250px;*/
			}
			#antoform #openProjectTaskDiv .optd{
			background: #C7CFD4;
			margin: 5px 0px;
			padding: 10px;
			/*font-size: 18px;*/
			}
			#antoform #opd, #antoform #otd {
			font-weight: bold;
			/*font-size: 18px;*/
			}
			#antoform #openProjectTaskListDiv{
			color: #000000;
			background-color: #F1F1EF;
			border: 2px solid #C8C8CA;
			display: none;
			text-align: justify;
			position: fixed;
			top: 43%;
			left: 43%;
			z-index: 111111;
			width: 300px;
			height: auto;
			}
			#antoform .optld-body p{
			padding: 10px;
			background: #CED0D4;
			}
			#antoform .optld-body p:hover{
			background: #27b6ba;
			}
	</style>

	<div data-keyboard="true" id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>


	<form novalidate method="post" id="antoform" class="form-horizontal calender" role="form">
		<div id="openProjectTaskDiv">
			<div class="col-lg-12 size-family-sidebar" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;"> Select Task Location
				<button type="button" onclick="openLocation()" class="btn btn-info btn-sm pull-right" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-12 optd size-family-sidebar">
					<div onclick="openLocationListCal('Project')" style="cursor: pointer; color: #28546B;">Project <br>
						<span id="opd"></span><span class="pull-right" style="margin-top: -5px"><i class="fa fa-chevron-right"></i></span></div>
					</div>

				</div>
				<div class="col-lg-12 optld-footer" style="display: none;">
					<button type="button" class="btn btn-block btn-info btn-flat" onclick="closeto()" style="font-weight: bold; font-size: 12px;">Close</button>
				</div>
				<div class="col-lg-12">&nbsp;</div>
			</div>

			<div id="openProjectTaskListDiv">
				<input type="hidden" id="optld-pid" value="0">
				<input type="hidden" name="taskloc-pid" id="optld-temp-pid" value="0">
				<input type="hidden" name="taskloc-tlid" id="optld-temp-tlid" value="0000000000">
				<input type="hidden" name="taskloc-taskid" id="optld-taskid" value="0">
				<input type="hidden" name="taskloc-status" id="optld-status" value="0">
				<input type="hidden" id="optld-tlid" value="0">

				<div class="col-lg-12" style="background: #3C8DBC;font-size: 14px;padding: 8px;color: #FFF;">
					<button type="button" onclick="openLocationListCal(0)" class="btn btn-info" style="margin-top: -8px;" data-toggle="tooltip" title="" data-original-title="Back"><i class="fa fa-chevron-left"></i></button>
					<span id="optld-head"></span> 
				</div>

				<div class="col-lg-12">
					<input type="text" onkeyup="searchlist($(this).val())" class="form-control" style="margin: 5px 0px; width: 260px;" placeholder="Search...">
				</div>
				<div class="col-lg-12 optld-body" style="max-height: 190px;overflow: auto;"> 
				</div>
			</div>

			<div id="CalenderModalNew" class="modal fade" tabindex='-1'>

				<input type="hidden" class="form-control" id="recur_duration" name="recur_duration"/>
				<input type="hidden" class="form-control" id="recur_pattern" name="recur_pattern"/>

				<input id="datetimepicker_start_hval" type="hidden" name="start_date" >
				<input id="datetimepicker_end_hval" type="hidden" name="end_date" >

				<div class="modal-dialog modal-md" >

					<div class="modal-content">

						<div class="modal-header" style="">
							<button type="button" class="close close-entryform" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title " id="myModalLabel">New</h4>
						</div>

						<div class="modal-body" style="padding:2px;">


							<ul class="nav nav-tabs">
								<li class="active ">
									<a style="color: #3c8dbc !important;" data-toggle="tab" href="#tab_newtask">Home</a>
								</li>
								<li>
									<a style="color: #3c8dbc !important;" data-toggle="tab" href="#tab_alarm" class="">Alarm</a>
								</li>
								<li>
									<a style="color: #3c8dbc !important;" data-toggle="tab" href="#tab_recurrence" class="">Recurrence</a>
								</li>
							</ul>

							<div class="tab-content">

								<div id="tab_newtask" style="padding:15px" class="tab-pane fade in active ">

									<input type="hidden" id="calendar_id" name="calendar_id" />

									<div class="form-group">

										<label class="control-label col-sm-2 " for="entryname">Title:</label>

										<div class="col-sm-4">
											<input type="text" class="form-control  proCalarea" id="entryname" name="entry_name" placeholder="Type Title here...">
										</div>

										<label class="control-label col-sm-2 " for="location">Location:</label>

										<div class="col-sm-4">
											<input type="text" class="form-control  proCalarea" id="location" name="location" placeholder="Type Location here...">
										</div>

										<div class="col-sm-2" style="display: none">
											<input type="color" value="#FFA500" class="form-control  proCalarea" id="entry_color_new" name="entry_color"/>
										</div>
									</div>

									<div class="form-group">

										<label class="control-label col-sm-2 " for="datetimepicker_start">Start:</label>
										<div class="col-sm-4">
											<li class="ddm-duecalendar" style="display:inline">
												<input class="dropdown-toggle dd-link form-control proCalarea" id="datetimepicker_start" type="text" onclick="togglecalendar_startModal()">

											</li>
										</div>

										<label class="control-label col-sm-2 " for="datetimepicker_end">End:</label>
										<div class="col-sm-4">
											<li class="ddm-duecalendar" style="display:inline">
												<input class="dropdown-toggle dd-link form-control proCalarea" id="datetimepicker_end" type="text" onclick="togglecalendar_endModal()">

											</li>

										</div>

									</div>


									<div class="form-group">


										<label class="control-label col-sm-2 " for="descr">Description:</label>
										<div class="col-sm-10">
											<input class="form-control  proCalarea" id="descr" name="descr" placeholder="Enter Description">
										</div>
									</div>

									<div class="form-group">

										<label class="control-label col-sm-2 ">Type:</label>
										<div class="col-sm-4" style="padding-top: 5px">

											<label><input checked id="rdo_event" onclick="fun_rdo_entrytype(this)" type="radio" name="entry_type" class=" proCalarea" value="Event">Event</label>

											<label><input id="rdo_todo" onclick="fun_rdo_entrytype(this)" type="radio" name="entry_type" class=" proCalarea" value="Todo" >Quick List</label>

											<label><input id="rdo_task" onclick="fun_rdo_entrytype(this)" type="radio" name="entry_type" class=" proCalarea" value="Task" >Task</label>

										</div>

										<label class="control-label col-sm-2 ">Priority:</label>
										<div class="col-sm-4" style="padding-top: 5px">
											<input type="radio" class="" name="priority" value="Low">Low
											<input type="radio" class="" name="priority" value="Medium" checked>Medium
											<input type="radio" class="" name="priority" value="High">High
										</div>


									</div>

									<div class="form-group">
										<!-- start for Event/Todo -->
										<div id="divEventTodoAss">
											<label class="control-label col-sm-2 ">Assignee:</label>
											<div class="col-sm-4">

												<div id="assign_to_user">
													<select class="form-control  proCalarea" id="select_user_new" style="width:100%" name="select_user_new[]" multiple="multiple" >
														<?php

														foreach ($users as $value) {
															echo '<option value="' . $value->ID . '">' . $value->full_name . '</option>';
														}

														?>
													</select>
												</div>

											</div>

										</div>
										<!-- end for Event/Todo -->

										<!-- start for Task -->
										<div id="divTaskAss" style="display: none">

											<label class="control-label col-sm-2 ">Members:</label>
											<div class="col-sm-4">
												<select name="member[]" id="memberTask" multiple="multiple" class="select2_multiple30 proCalarea" style="width: 100%;">
													<?php

													foreach ($users as $value) {
														echo '<option value="' . $value->ID . '">' . $value->full_name . '</option>';
													}

													?>
												</select>

											</div>
										</div>
										<!-- end for Task -->

										<label class="control-label col-sm-2 ">Add Guest:</label>
										<div class="col-sm-4">

											<select  class="form-control  proCalarea" id="select_guests" style="width:100%" name="select_guests[]" multiple="multiple" >
												<?php if(isset($getGuestEmail)){
													foreach ($getGuestEmail as $item):?>

													<?php echo '<option value="'.$item->id.'">'.$item->emailaddr.'</option>' ?>

												<?php endforeach;} ?>
											</select>
										</div>

									</div>

								</div>

								<div id="tab_alarm" style="padding:15px" class="tab-pane fade">


									<div class="form-group">
										<label class="control-label col-sm-2 " for="sel_alarm">Reminder:</label>
										<div class="col-sm-10">
											<select class="form-control " name="sel_alarm" id="sel_alarm">
												<option value="None">None</option>
												<option value="15 minutes">15 minute before appointment</option>
												<option value="1 hour">1 hour before appointment</option>
												<option value="1 day">1 day before appointment</option>
												<option value="custom">Custom</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-12 ">Action/Trigger:</label>
										<div class="">
											<div class="col-sm-10 ">
												<input type="hidden" id="sel_alarm_action_all" name="sel_alarm_action_all">
												<select class="form-control " id="sel_alarm_action" style="width:100%" name="sel_alarm_action[]" size="5" multiple>

												</select>
											</div>
											<div class="col-sm-2">
												<div class="btn-group-vertical">
													<button disabled id="btn_alarm_add" type="button" class="btn btn-primary">Add</button>
													<button disabled id="btn_alarm_edit" data-toggle="modal" type="button" class="btn btn-primary" data-target="#AlarmEditModal">Edit</button>
													<button disabled id="btn_alarm_remove" type="button" class="btn btn-primary">Remove</button>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div id="tab_recurrence" style="padding:15px" class="tab-pane fade ">

									<div class="row">
										<label> 
											<input id="chk_recur_status" type="checkbox" name="chk_recur_status"> Enable recurrence
										</label>
									</div>

									<div class="form-group">
										<label class="col-sm-12">Appointment Time:</label>
										<div class="col-sm-12">
											<label class="col-sm-12">
												<div class="col-sm-4">
													Start :
													<select id="sel_start_times"></select>
													<input id="timetxt_start" type="text" name="timebox_start" maxlength="8" value="12:00 AM">
													

												</div>
												
												<div class="col-sm-4">
													End :
													<select id="sel_end_times"></select>
													<input id="timetxt_end" name="timebox_end" maxlength="8" value="12:00 AM">
												</div>

												<div class="col-sm-4">
													Duration :
													<select id="sel_durations">
														<option>0 minutes</option>
														<option>5 minutes</option>
														<option>10 minutes</option>
														<option>15 minutes</option>
														<option>30 minutes</option>
														<option>1 hours</option>
														<option>2 hours</option>
														<option>3 hours</option>
														<option>4 hours</option>
														<option>5 hours</option>
														<option>6 hours</option>
														<option>7 hours</option>
														<option>8 hours</option>
														<option>9 hours</option>
														<option>10 hours</option>
														<option>11 hours</option>
														<option>12 hours</option>
														<option>18 hours</option>
														<option>24 hours</option>
														<!-- <option selected="selected">1 days</option>
														<option>2 days</option>
														<option>3 days</option>
														<option>4 days</option>
														<option>1 weeks</option>
														<option>2 weeks</option> -->

													</select>
													<input id="timetxt_dur" name="timetxt_dur" maxlength="8" value="24 hours">
												</div>
											</label>
											
										</div>

									</div>

									<div class="form-group">
										<label class="col-sm-12">Recurrence pattern:</label>

										<div class="col-sm-2" style="border-right: 1px solid #ccc;">

											<label class="col-sm-12" onclick="changeRecurPattern(this)">
												<input value="days"  type="radio" name="sel_recur_pattern">
												<span>Daily</span>
											</label>


											<label class="col-sm-12" onclick="changeRecurPattern(this)"><input value="weeks" checked type="radio" name="sel_recur_pattern">
												<span>Weekly</span>
											</label>


											<label class="col-sm-12" onclick="changeRecurPattern(this)"><input value="months" type="radio" name="sel_recur_pattern">
												<span>Monthly</span>
											</label>


											<label class="col-sm-12" onclick="changeRecurPattern(this)"><input value="years" type="radio" name="sel_recur_pattern">
												<span>Yearly</span>
											</label>


										</div>

										<div id="dailyDiv" class="col-sm-10 recur-pat-div" style="display: none">

											<label class="col-sm-12">
												<div class="col-sm-3">
													<input checked="checked" value="every_count" type="radio" name="daily_every"> Every
												</div>
												<div class="col-sm-2">
													<input style="width: 100%" type="number" min="1" class="recur_every_occur" id="daily_recur_every" name="input_recur_every_day" value="1">
												</div>
												<div class="col-sm-2"> day(s)
												</div>
											</label>

											<label class="col-sm-12">
												<div class="col-sm-12">
													<input type="radio" value="every_weekday" name="daily_every">
													Every weekday
												</div>
											</label>

										</div>

										<div id="weeklyDiv" class="col-sm-10 recur-pat-div" style="display: none">

											<div class="col-sm-12">
												<div class="col-sm-3">
													Recur Every
												</div>
												<div class="col-sm-2">
													<input id="week_every_num" style="width: 100%" type="number" name="input_recur_every_week" value="1" min="1">
												</div>
												<div class="col-sm-4"> 
													week(s) on:
												</div>
											</div>

											<div class="col-sm-12">

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_sun"> Sunday
												</label>	

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_mon"> Monday
												</label>

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_tue"> Tuesday
												</label>

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_wed"> Wednesday
												</label>

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_thu"> Thursday
												</label>

												<label  class="col-sm-3">
													<input type="checkbox" name="chk_week_fri"> Friday
												</label>

												<label class="col-sm-3">
													<input type="checkbox" name="chk_week_sat"> Saturday
												</label>

											</div>

										</div>

										<div id="monthlyDiv" class="col-sm-10 recur-pat-div" style="display: none">

											<label class="col-sm-12">
												
												<input checked="checked" type="radio" name="month-opt" value="month-opt1">
												Day 
												<input id="month_day_num" min="1" type="text" name="input_recur_every_month_day" style="width: 10%"> 
												of every
												<input id="month_day_every" type="number" min="1" value="1" name="input_recur_every_month" style="width: 10%"> 
												month(s)

											</label>

											<label class="col-sm-12">
												
												<input type="radio" name="month-opt" value="month-opt2">
												The 
												<select id="month_opt2_sel1">
													<option value="1">first</option>
													<option value="2">second</option>
													<option value="3">third</option>
													<option value="4">fourth</option>
													<option value="-1">last</option>
												</select>

												<select id="month_opt2_sel2">
													<option value="day">day</option>
													<!-- <option value="weekday">weekday</option>
													<option value="weekend">weekend day</option> -->
													<option value="Sunday">Sunday</option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday">Saturday</option>
												</select>

												of every
												<input id="month_the_every" type="number" name="" value="1" min="1" style="width: 10%">
												month(s)
												
											</label>

										</div>

										<div id="yearlyDiv" class="col-sm-10 recur-pat-div" style="display: none">

											<label class="col-sm-12">

												Recur Every
												<input id="year_every_num" style="width: 10%" type="number" name="input_recur_every_year" min="1" value="1">
												year(s)
											</label>

											<label class="col-sm-12">

												<input checked="checked" type="radio" name="year-opt" value="year-opt1">
												On : 
												<select id="yearopt1_name">
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>

												<input id="yearopt1_day" type="number" name="" min="1"  value="1" style="width: 10%"> 

											</label>

											<label class="col-sm-12">

												<input type="radio" name="year-opt" value="year-opt2" >
												On the: 
												<select id="yearopt2_int">
													<option value="1">first</option>
													<option value="2">second</option>
													<option value="3">third</option>
													<option value="4">fourth</option>
													<option value="-1">last</option>
												</select>

												<select id="yearopt2_day">
													<option>day</option>
													<!-- <option>weekday</option>
													<option>weekend day</option> -->
													<option>Sunday</option>
													<option>Monday</option>
													<option>Tuesday</option>
													<option>Wednesday</option>
													<option>Thursday</option>
													<option>Friday</option>
													<option>Saturday</option>
												</select>
												of
												<select id="yearopt2_year">
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>

											</label>

										</div>

									</div>

									<div class="form-group">
										<label class="col-sm-12">Range of recurrence:</label>
										<div class="row">
											<div class="col-sm-6">
												<label class="col-sm-12">
													<div class="col-sm-4">
														Start : 
													</div>
													<div class="col-sm-4">
														<input onclick="togglecalendar_startRecur()" id="recur_startdate" type="text" name="">
													</div> 
												</label>
											</div>

											<div class="col-sm-6">
												<label class="col-sm-12">

													<div class="col-sm-12">
														<input  value="recur_noend" type="radio" name="recur_fuf"> No end date
													</div>

												</label> 

												<label class="col-sm-12">

													<div class="col-sm-4">
														<input checked="checked" value="recur_for" type="radio" name="recur_fuf">
														End after 
													</div>

													<div class="col-sm-4">
														<input min="1" style="width: 100%" id="input_recur_occur" name="input_recur_occur" type="number" class="recur_every_occur" value="10">
													</div>

													<div class="col-sm-4">
														occurrences
													</div>
												</label>

												<label class="col-sm-12">
													<div class="col-sm-4">
														<input value="recur_until" type="radio" name="recur_fuf">
														End by 
													</div>
													<div class="col-sm-4">
														<input onclick="togglecalendar_endRecur()" id="recur_endbydate" type="text" name="datetimepicker_recur">
													</div>
												</label>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="modal-footer" style="margin-right: 10px;">
							<button onclick="closeLocation()" type="button" class="btn btn-default antoclose btn-lg" data-dismiss="modal">Cancel</button>
							<button id="submit_full_form" type="submit" class="btn btn-primary antosubmit btn-lg">Create</button>

						</div>
					</div>
				</div>
			</div>

			<!-- Start Alarm Modals-->

			<div id="AlarmCustomiseModal" class="modal fade">

				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close close-entryform" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title " id="myModalLabel">Add Alarm</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label>Alarm Type:</label>
							</div>	

							<div class="form-group">

								<div class="col-sm-3" style="width: 22%">

									<select class="form-control" name="alarm_type1" id="alarm_type1">
										<option value="mail">Send a mail</option>
										<option value="call">Call a number</option>
										<option value="popup">Popup an alert</option>
										<option value="sound">Play a sound</option>

									</select>
								</div>

								<div class="col-sm-2">
									<input min="1" type="number" value="1" class="form-control" name="alarm_type2" id="alarm_type2">
								</div>

								<div class="col-sm-2">
									<select class="form-control" name="alarm_type3" id="alarm_type3">
										<option value="minutes">minute(s)</option>
										<option value="hours">hour(s)</option>
										<option value="days">day(s)</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select class="form-control" name="alarm_type4" id="alarm_type4">
										<option value="before">before</option>
										<option value="after">after</option>

									</select>
								</div>
								<div class="col-sm-3" style="width: 28%">
									<select class="form-control" name="alarm_type5" id="alarm_type5">
										<option value="startof">start of appointment</option>
										<option value="endof">end of appointment</option>

									</select>
								</div>
							</div>

							<div class="form-group">

								<label>Repeat:</label>

								<div class="col-sm-12">
									
									<label>
										<input id="chk_repeat_alarm" type="checkbox">
										<b> Repeat the alarm </b>
									</label>
									
								</div>
								<div id="div_repeat_alarm">
									<div class="col-sm-2">
										<input class="form-control" min="1" value="1" style="width:100%" type="number" id="alarm_repeat1">

									</div>
									<div class="col-sm-3" style="width: 20%">
										<label style="margin-top: 5px;">extra times every</label>
									</div>
									<div class="col-sm-2">
										<input class="form-control" min="1" value="1" style="width:100%" type="number" id="alarm_repeat2">

									</div>
									<div class="col-sm-2">
										<select class="form-control" name="reminder" id="alarm_repeat3">
											<option value="minutes">minute(s)</option>
											<option value="hours">hour(s)</option>
											<option value="days">day(s)</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">

								<label>Options:</label>

								<div class="col-lg-12">
									<label>
										<input id="chk_custom_message" type="checkbox">
										<b> Custom message </b>
									</label>
									
								</div>
								<div id="div_custom_message">
									<div class="col-sm-2">

										<label>Message</label>

									</div>
									<div class="col-sm-10">
										<textarea class="form-control" rows="2" id="txt_message"></textarea>
									</div>
								</div>

							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-lg antoclose" data-dismiss="modal">Close</button>
							<button id="save_add_alarm" type="button" data-toggle="modal" class="btn btn-primary btn-lg antosubmit">Save</button>
						</div>
						
					</div>
					<!--	</form> -->
				</div>

			</div>

			<div id="AlarmEditModal" class="modal fade">

				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close close-entryform" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Edit Alarm</h4>
						</div>
						<div class="modal-body">

							<!-- <form class="form-horizontal" role="form"> -->
							<div class="form-group">
								<label>Alarm Type:</label>
							</div>	

							<div class="form-group">

								<div class="col-sm-3" style="width: 22%">

									<select class="form-control" name="reminder" id="alarmedit_type1">
										<option value="mail">Send a mail</option>
										<option value="call">Call a number</option>
										<option value="popup">Popup an alert</option>
										<option value="sound">Play a sound</option>


									</select>
								</div>

								<div class="col-sm-2">
									<input min="1" value="1" type="number" class="form-control" id="alarmedit_type2">
								</div>

								<div class="col-sm-2">
									<select class="form-control" name="reminder" id="alarmedit_type3">
										<option value="minutes">minute(s)</option>
										<option value="hours">hour(s)</option>
										<option value="days">day(s)</option>
									</select>
								</div>

								<div class="col-sm-2">
									<select class="form-control" name="reminder" id="alarmedit_type4">
										<option value="before">before</option>
										<option value="after">after</option>

									</select>
								</div>

								<div class="col-sm-3" style="width: 28%">
									<select class="form-control" name="reminder" id="alarmedit_type5">
										<option value="startof">start of appointment</option>
										<option value="endof">end of appointment</option>

									</select>
								</div>
							</div>


							<div class="form-group">

								<label>Repeat:</label>

								<div class="col-sm-12">

									<label><input id="chk_repeat_alarm_edit" type="checkbox"><b> Repeat the alarm </b></label>

								</div>
								<div id="div_repeat_alarm_edit">
									<div class="col-sm-2">
										<input class="form-control" min="1" value="1" style="width:100%" type="number" id="alarmedit_repeat1">

									</div>
									<div class="col-sm-3" style="width: 20%">
										<label style="margin-top: 5px;">extra times every</label>
									</div>
									<div class="col-sm-2">
										<input class="form-control" min="1" value="1" style="width:100%" type="number" id="alarmedit_repeat2">

									</div>
									<div class="col-sm-2">
										<select class="form-control" name="reminder" id="alarmedit_repeat3">
											<option value="minutes">minute(s)</option>
											<option value="hours">hour(s)</option>
											<option value="days">day(s)</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">

								<label>Options:</label>

								<div class="col-sm-12">
									<label><input id="chk_custom_message_edit" type="checkbox"><b> Custom message </b></label>

								</div>
								<div id="div_custom_message_edit">
									<div class="col-sm-2">

										<label>Message</label>

									</div>
									<div class="col-sm-10">
										<textarea class="form-control" rows="2" id="txt_message_edit"></textarea>
									</div>
								</div>

							</div>
							<!-- </form> -->
						</div>
						<div class="modal-footer">
							<button id="close_edit_alarm" type="button" class="btn btn-default btn-lg antoclose">Close</button>
							<button id="save_edit_alarm" type="button" data-toggle="modal" class="btn btn-primary btn-lg antosubmit">Save</button>
						</div>
						
					</div>
					<!--	</form> -->
				</div>

			</div>

			<!-- End Alarm Modals-->
		</form>

		<script type="text/javascript">

		function template(data, container) {
			var matches = data.text.match(/\b(\w)/g);
			var acronym = matches.join(''); 
			return acronym;
		}

			function getweekdays(input1,input2){
				var rwkday;
				if($('#'+input1).val()=='Sunday' && $('#'+input2).val()=="1") rwkday=RRule.SU.nth(+1);
				if($('#'+input1).val()=='Sunday' && $('#'+input2).val()=="2") rwkday=RRule.SU.nth(+2);
				if($('#'+input1).val()=='Sunday' && $('#'+input2).val()=="3") rwkday=RRule.SU.nth(+3);
				if($('#'+input1).val()=='Sunday' && $('#'+input2).val()=="4") rwkday=RRule.SU.nth(+4);
				if($('#'+input1).val()=='Sunday' && $('#'+input2).val()=="-1") rwkday=RRule.SU.nth(-1);

				if($('#'+input1).val()=='Monday' && $('#'+input2).val()=="1") rwkday=RRule.MO.nth(+1);
				if($('#'+input1).val()=='Monday' && $('#'+input2).val()=="2") rwkday=RRule.MO.nth(+2);
				if($('#'+input1).val()=='Monday' && $('#'+input2).val()=="3") rwkday=RRule.MO.nth(+3);
				if($('#'+input1).val()=='Monday' && $('#'+input2).val()=="4") rwkday=RRule.MO.nth(+4);
				if($('#'+input1).val()=='Monday' && $('#'+input2).val()=="-1") rwkday=RRule.MO.nth(-1);

				if($('#'+input1).val()=='Tuesday' && $('#'+input2).val()=="1") rwkday=RRule.TU.nth(+1);
				if($('#'+input1).val()=='Tuesday' && $('#'+input2).val()=="2") rwkday=RRule.TU.nth(+2);
				if($('#'+input1).val()=='Tuesday' && $('#'+input2).val()=="3") rwkday=RRule.TU.nth(+3);
				if($('#'+input1).val()=='Tuesday' && $('#'+input2).val()=="4") rwkday=RRule.TU.nth(+4);
				if($('#'+input1).val()=='Tuesday' && $('#'+input2).val()=="-1") rwkday=RRule.TU.nth(-1);

				if($('#'+input1).val()=='Wednesday' && $('#'+input2).val()=="1") rwkday=RRule.WE.nth(+1);
				if($('#'+input1).val()=='Wednesday' && $('#'+input2).val()=="2") rwkday=RRule.WE.nth(+2);
				if($('#'+input1).val()=='Wednesday' && $('#'+input2).val()=="3") rwkday=RRule.WE.nth(+3);
				if($('#'+input1).val()=='Wednesday' && $('#'+input2).val()=="4") rwkday=RRule.WE.nth(+4);
				if($('#'+input1).val()=='Wednesday' && $('#'+input2).val()=="-1") rwkday=RRule.WE.nth(-1);

				if($('#'+input1).val()=='Thursday' && $('#'+input2).val()=="1") rwkday=RRule.TH.nth(+1);
				if($('#'+input1).val()=='Thursday' && $('#'+input2).val()=="2") rwkday=RRule.TH.nth(+2);
				if($('#'+input1).val()=='Thursday' && $('#'+input2).val()=="3") rwkday=RRule.TH.nth(+3);
				if($('#'+input1).val()=='Thursday' && $('#'+input2).val(+input2)=="4") rwkday=RRule.TH.nth(+4);
				if($('#'+input1).val()=='Thursday' && $('#'+input2).val()=="-1") rwkday=RRule.TH.nth(-1);

				if($('#'+input1).val()=='Friday' && $('#'+input2).val()=="1") rwkday=RRule.FR.nth(+1);
				if($('#'+input1).val()=='Friday' && $('#'+input2).val()=="2") rwkday=RRule.FR.nth(+2);
				if($('#'+input1).val()=='Friday' && $('#'+input2).val()=="3") rwkday=RRule.FR.nth(+3);
				if($('#'+input1).val()=='Friday' && $('#'+input2).val()=="4") rwkday=RRule.FR.nth(+4);
				if($('#'+input1).val()=='Friday' && $('#'+input2).val()=="-1") rwkday=RRule.FR.nth(-1);

				if($('#'+input1).val()=='Saturday' && $('#'+input2).val()=="1") rwkday=RRule.SA.nth(+1);
				if($('#'+input1).val()=='Saturday' && $('#'+input2).val()=="2") rwkday=RRule.SA.nth(+2);
				if($('#'+input1).val()=='Saturday' && $('#'+input2).val()=="3") rwkday=RRule.SA.nth(+3);
				if($('#'+input1).val()=='Saturday' && $('#'+input2).val()=="4") rwkday=RRule.SA.nth(+4);
				if($('#'+input1).val()=='Saturday' && $('#'+input2).val()=="-1") rwkday=RRule.SA.nth(-1);

				return rwkday;

			}

			$('#antoform').submit(function(e) {

				//console.log('sub');console.log($(this));
				e.preventDefault();

				if(moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss').isAfter(moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss'))){
					swal('Please check start & end dates');
					return;
				}
				

				for (var i = 0; i < document.getElementById("sel_alarm_action").options.length; i++)
				{

					document.getElementById("sel_alarm_action").options[i].selected = true;
				}


				if($('#rdo_task').is(":checked")){
					if($('#optld-temp-pid').val() == "0"){
						swal('Please select task location'); return;
					}
				}
				
				if($('#chk_recur_status').is(':checked')){
					if($('[name=sel_recur_pattern]:checked').val()=="weeks"){
						if($('[name^=chk_week]:checked').length==0){
							swal('Please check recurrence pattern'); return;
						}
					}
				}

				var formData = new FormData($(this)[0]);
				var occur=Number($('#input_recur_occur').val());
				var occur_start=moment($('#recur_startdate').val(),'MMM-DD-YYYY');
				var occur_end=moment($('#recur_endbydate').val(),'MMM-DD-YYYY');



				if($('[name=sel_recur_pattern]:checked').val()=='days'){
					var every=Number($('#daily_recur_every').val());

					var rule = new RRule({
						freq: RRule.DAILY,
						interval: every,
						dtstart: occur_start.toDate(),
						
					});

					formData.append('rrulename', rule.toString());

				}

				if($('[name=sel_recur_pattern]:checked').val()=='weeks'){
					var every=Number($('#week_every_num').val());
					var wkarr=[];

					if($('[name=chk_week_sun]').is(':checked')) wkarr.push(RRule.SU);
					if($('[name=chk_week_mon]').is(':checked')) wkarr.push(RRule.MO);
					if($('[name=chk_week_tue]').is(':checked')) wkarr.push(RRule.TU);
					if($('[name=chk_week_wed]').is(':checked')) wkarr.push(RRule.WE);
					if($('[name=chk_week_thu]').is(':checked')) wkarr.push(RRule.TH);
					if($('[name=chk_week_fri]').is(':checked')) wkarr.push(RRule.FR);
					if($('[name=chk_week_sat]').is(':checked')) wkarr.push(RRule.SA);


					var rule = new RRule({
						freq: RRule.WEEKLY,
						interval: every,
						byweekday: wkarr,
						dtstart: occur_start.toDate()
						
					});

					formData.append('rrulename', rule.toString());

				}

				if($('[name=sel_recur_pattern]:checked').val()=='months'){

					if($('[name=month-opt]:checked').val()=='month-opt1'){
						var selnum=$('#month_day_num').val();
						var every=Number($('#month_day_every').val());


						var rule = new RRule({
							freq: RRule.MONTHLY,
							interval: every,
							bymonthday:selnum,
							dtstart: occur_start.toDate()
						});


						formData.append('rrulename', rule.toString());

					}

					if($('[name=month-opt]:checked').val()=='month-opt2'){
						var selnum=($('#month_opt2_sel1').val());
						var selday=($('#month_opt2_sel2').val());
						var every=Number($('#month_the_every').val());


						if($('#month_opt2_sel2').val()=='day'){
							var rule = new RRule({
								freq: RRule.MONTHLY,
								interval: every,
								bymonthday:selnum,
								dtstart: occur_start.toDate()

							});


							formData.append('rrulename', rule.toString());

						}else{
							var rwkday=getweekdays('month_opt2_sel2','month_opt2_sel1');

							var rule = new RRule({
								freq: RRule.MONTHLY,
								interval: every,
								byweekday: rwkday,
								dtstart: occur_start.toDate()
							});


							formData.append('rrulename', rule.toString());

						}

					}
				}

				if($('[name=sel_recur_pattern]:checked').val()=='years'){
					var every=Number($('#year_every_num').val());

					if($('[name=year-opt]:checked').val()=='year-opt1'){

						var monthnum=Number($('#yearopt1_name').val());
						var daynum=Number($('#yearopt1_day').val());

						var rule = new RRule({
							freq: RRule.YEARLY,
							interval: every,
							bymonth:monthnum,
							bymonthday:daynum,
							//until: moment(viewdata.intervalEnd).toDate(),
							count: occur,
							dtstart: occur_start.toDate()
						});


						formData.append('rrulename', rule.toString());

					}

					if($('[name=year-opt]:checked').val()=='year-opt2'){
						if($('#yearopt2_day').val()=='day'){

							var monthnum=Number($('#yearopt2_year').val());
							var daynum=Number($('#yearopt2_int').val());

							var rule = new RRule({
								freq: RRule.YEARLY,
								interval: every,
								bymonth:monthnum,
								bymonthday:daynum,
								dtstart: occur_start.toDate(),
								//until: moment(viewdata.intervalEnd).toDate(),
								count: occur
							});

							formData.append('rrulename', rule.toString());

						}else{


							var monthnum=Number($('#yearopt2_year').val());
							var daynum=Number($('#yearopt2_int').val());
							var rwkday=getweekdays('yearopt2_day','yearopt2_int');

							var rule = new RRule({
								freq: RRule.YEARLY,
								interval: every,
								bymonth:monthnum,
								//bymonthday:daynum,
								byweekday: rwkday,
								//until: moment(viewdata.intervalEnd).toDate(),
								count: occur,
								dtstart: occur_start.toDate()
							});

							formData.append('rrulename', rule.toString());

						}
					}

				}

				formData.append('recur_endbydate',occur_end.format('YYYY-MM-DD'));


				$.ajax({
					url: this.action,
					type: this.method,
					data: formData,
					async: false,
					contentType: false,
					processData: false,
					dataType: "JSON",
					success: function (data) {
						console.log('data add');
						console.log(data);
						location.reload();

					},
					error: function (jqXHR, textStatus, errorThrown) {
						swal('error');
						console.log(jqXHR.responseText);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});
			});

		</script>

		<script>
			var login_userid = <?php echo $id; ?>;
			var flat_startdate_cal;
			var flat_enddate_cal;


			$('.chk_cal_filter').prop('checked',true);

			function fun_add_startalarm(element){
				var addornot=true;
				$("#sel_alarm_action > option").each(function() {
					if(this.text=="Popup an alert 15 minutes before start of appointment"){
						alert('Already Exists');
						addornot=false;
						return;
					}
				});

				if(addornot){
					var hash = {};
					hash['type'] = "popup,15,minutes,before,startof";
					var json_val = JSON.stringify(hash);
					$('#sel_alarm_action')

					.append($("<option></option>")
						.attr("value", json_val)
						.text("Popup an alert 15 minutes before start of appointment"));
				}

			}

			function fun_rem_startalarm(element){

				$("#sel_alarm_action > option").each(function() {
					if(this.text=="Popup an alert 15 minutes before start of appointment"){
						$(this).remove();
						return;
					}
				});


			}

			function fun_add_endalarm(element){
				var addornot=true;
				$("#sel_alarm_action > option").each(function() {
					if(this.text=="Popup an alert 15 minutes before end of appointment"){

						alert('Already Exists');
						addornot=false;
						return;
					}
				});

				if(addornot){
					var hash = {};
					hash['type'] = "popup,15,minutes,before,endof";
					var json_val = JSON.stringify(hash);
					$('#sel_alarm_action')

					.append($("<option></option>")
						.attr("value", json_val)
						.text("Popup an alert 15 minutes before end of appointment"));
				}

			}

			function fun_rem_endalarm(element){

				$("#sel_alarm_action > option").each(function() {
					if(this.text=="Popup an alert 15 minutes before start of appointment"){
						$(this).remove();
						return;
					}
				});


			}

			function fun_enable_startalarm(element){
				$('#btn_add_startalarm').removeAttr('disabled');
			}

			function fun_enable_endalarm(element){
				$('#btn_add_endalarm').removeAttr('disabled');
			}

			function fun_rdo_entrytype(element){
				if($(element).attr('id')=='rdo_task'){
					$("#entry_color_new").val("#3a87ad");
					openLocation();
					//$('#myModalLabel').text('New Task');
					$('#divTaskAss').fadeIn('slow');
					$('#divEventTodoAss').hide();
					$('#chk_recur_status').removeAttr('checked').prop("disabled", true);
					
				}
				else{
					if($(element).attr('id')=='rdo_event'){
						$("#entry_color_new").val("#FFA500");
						$('#chk_recur_status').removeAttr('checked').prop("disabled", false);
					}
					if($(element).attr('id')=='rdo_todo'){
						$("#entry_color_new").val("#228B22");
						$('#chk_recur_status').removeAttr('checked').prop("disabled", true);
						//$('#myModalLabel').text('New Todo');
					}
					$('#divTaskAss').hide();
					$('#divEventTodoAss').fadeIn('slow');
					$('#openProjectTaskDiv').hide();
					$('#openProjectTaskListDiv').hide();
				}
			}

			function closeLocation(){
				if($('#openProjectTaskDiv').css('display')=='block'){
					openLocation();
				}
			}
			function openLocation() {

				var effect = 'slide';
				var options = {direction: 'right'};
				var duration = 500;
				$('#openProjectTaskDiv').toggle(effect, options, duration, function(){});
			}

			function projectmoveto(projectid, projectname) {
				$("#optld-temp-pid").val(projectid);
				$("#opd").html(projectname);
				if ($("#optld-temp-pid").val() != $("#optld-pid").val()) {
					$.ajax({
						url: '<?php echo site_url('calendar/getTaskList'); ?>',
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
				openLocationListCal(0);
			}

			function taskmoveto(taskid, taskname) {
				$("#optld-temp-tlid").val(taskid);
				$("#otd").html(taskname);
				if ($("#optld-temp-tlid").val() != $("#optld-tlid").val())
					$(".optld-footer").show();
				openLocationListCal(0);
			}


			function drawtasklist(inputDiv, taskname) {
				tempprojectlist.push({id: inputDiv, name: taskname});
				$(".optld-body").append("<p onclick='taskmoveto(" + inputDiv + ", \"" + taskname + "\")'>" + taskname + "</p>");
			}

			function closeto() {
				$('#openProjectTaskDiv').hide();
				$('#openProjectTaskListDiv').hide();
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

			function openLocationListCal(title) {

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
							url: '<?php echo site_url('calendar/getproject'); ?>',
							type: 'POST',
							dataType: "json",
							// beforeSend: function () {
								// },
								success: function (data) {
									$.each(data.projects, function (key, value) {
										drawprojectlistCal(data.projects[key].Id, data.projects[key].Title);
									});
								}
							});
					} else if (title == "Tasklist") {
						$(".optld-body").html("");
						tempprojectlist = [];
						var tempid = $("#optld-temp-pid").val();
						$.ajax({
							url: '<?php echo site_url('calendar/getTaskList'); ?>',
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

			function drawprojectlistCal(projectid, projectname) {
				tempprojectlist.push({id: projectid, name: projectname});
				if (projectid == $("#optld-pid").val())
					$(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "<span class='pull-right'><i class='fa fa-check'></i></span></p>");
				else
					$(".optld-body").append("<p onclick='projectmoveto(" + projectid + ", \"" + projectname + "\")'>" + projectname + "</p>");
			}


			function validateEmail(email) {
				var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			}

			$("#select_user_new , #select_group_new").select2({
				placeholder: "Type user name here to add...",
				containerCssClass: "select2-round",
				templateSelection: template,
			});

			console.log('flat_startdate_cal',flat_startdate_cal);

			flat_startdate_cal =$('#datetimepicker_start').flatpickr({
				//inline: true, 
				enableTime : true,
				dateFormat: 'M-d-Y H:i:S',
				clickOpens: false,
				

				onChange: function(selectedDates, dateStr, instance) {
					var sel_start=moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss');
					var sel_end=moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss');
					
					$('#datetimepicker_start_hval').val(sel_start);
					
					$('#timetxt_start').val(moment(selectedDates[0]).format('h:mm A'));
				
					flat_startdate_recur.setDate(moment(selectedDates[0]).format("MMM-DD-YYYY"));

					var durcnt=$('#timetxt_dur').val().split(" ")[0].trim();
					var durpat=$('#timetxt_dur').val().split(" ")[1].trim();

					var isneg=parseFloat(durcnt);
															
					if(isneg<0){
						var newhour=24+isneg;
					}else{
						var newhour=isneg;
					}

					var new_end=moment(selectedDates[0]).add(newhour,durpat);
					flat_enddate_cal.setDate(new_end.format("MMM-DD-YYYY HH:mm:ss"));
						$('#timetxt_end,#sel_start_times').val(moment(new_end).format('h:mm A'));

					flat_enddate_cal.set('minDate',moment(selectedDates[0]).format("MMM-DD-YYYY HH:mm:ss"));
					flat_startdate_cal.close();
				}
			});

			flat_enddate_cal =$('#datetimepicker_end').flatpickr({
				//inline: true, 
				enableTime : true,
				dateFormat: 'M-d-Y H:i:S',
				clickOpens: false,
				//defaultDate: data.todo_duedate,

				onChange: function(selectedDates, dateStr, instance) {
					var sel_end=(moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
					
					$('#datetimepicker_end_hval').val(sel_end);
					
					$('#timetxt_end').val(moment(selectedDates[0]).format('h:mm A'));

					var diff_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');

					var diff_end=moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss');
					
					var diffdur = parseInt(moment.duration(diff_end.diff(diff_start)).asHours());
					
					$('#timetxt_dur,#sel_durations').val(diffdur+" hours");
					flat_enddate_cal.close();

				}
			});


			flat_startdate_recur =$('#recur_startdate').flatpickr({
				
				enableTime : false,
				dateFormat: 'M-d-Y',
				clickOpens: false,
				//defaultDate: data.todo_duedate,

				onChange: function(selectedDates, dateStr, instance) {
					var rec_start=$('#recur_startdate').val();
					var time_start=$('#timetxt_start').val();
					var sync_start=moment(rec_start+" "+time_start,'MMM-DD-YYYY h:mm A');
					flat_startdate_cal.setDate(sync_start.format("MMM-DD-YYYY HH:mm:ss"));

					var main_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');

					var durcnt=$('#timetxt_dur').val().split(" ")[0].trim();
					var durpat=$('#timetxt_dur').val().split(" ")[1].trim();

					var isneg=parseFloat(durcnt);
															
					if(isneg<0){
						var newhour=24+isneg;
					}else{
						var newhour=isneg;
					}

					main_start.add(newhour,durpat);
					flat_enddate_cal.setDate(main_start.format("MMM-DD-YYYY HH:mm:ss"));
					$("#timetxt_dur,#sel_durations").val(newhour+" hours");

				}
			});

			flat_enddate_recur =$('#recur_endbydate').flatpickr({
				//inline: true, 
				enableTime : false,
				dateFormat: 'M-d-Y',
				clickOpens: false,
				//defaultDate: data.todo_duedate,

				onChange: function(selectedDates, dateStr, instance) {

				}
			});


			function togglecalendar_startModal(){
				flat_startdate_cal.toggle();
			}

			function togglecalendar_endModal(){
				flat_enddate_cal.toggle();
			}

			function togglecalendar_startRecur(){
				
				flat_startdate_recur.toggle();
			}

			function togglecalendar_endRecur(){
				flat_enddate_recur.toggle();
			}

			$("#select_guests").select2({
				tags: true,
				createTag: function(term, data) {
					var value = term.term;
					if(validateEmail(value)) {
						return {
							id: value,
							text: value
						};
					}
					return null;            
				}
			}).on("change", function(e) {
				var isNew = $(this).find('[data-select2-tag="true"]');


				if(isNew.length){



					$.ajax({
						url: '<?php echo site_url('calendar/saveGuestEmail'); ?>',
						type: 'POST',
						data: {
							newemail: isNew.val(),
							user_id:login_userid

						},
						dataType: "JSON",
						success : function(data) {

							isNew.replaceWith('<option selected value="'+data.new_guestid+'">'+isNew.val()+'</option>');
						},

					});
				}
			});

			$('input[type=radio][name=assign_new]').change(function () {
				if (this.value == 'Group') {
					$("#assign_to_group").show("slow");
					$("#assign_to_user").hide("slow");

				}
				else if (this.value == 'Individual') {
					$("#assign_to_group").hide("slow");
					$("#assign_to_user").show("slow");
				}
			});

			var todo_serial=0;
			var events_old = [];
			var events_new = [];
			var event_display="all";
			var srcAll=[];

			function clearAllInputs(selector) {
				$(selector).find(':input').each(function () {

					if (this.type == 'submit') {
						//do nothing
					}
					else if (this.type == 'checkbox' || this.type == 'radio') {

						this.checked = false;
					}
					else if (this.type == 'file') {
						var control = $(this);
						control.replaceWith(control = control.clone(true));
					} else if (this.type == 'number') {
						$(this).val('1');


					} else if (this.type == 'textarea') {

						$(this).val('');
					} else {
						$(this).prop("selectedIndex", 0);
					}
				});
			}

			function generate_alarms(entries) {
				var alarm_entries = new Array();

				var len = entries.length;
				for (var i = 0; i < len; i++) {
					if (entries[i].alarm_type != null) {
						var start_time = moment(entries[i].start);
						var end_time = moment(entries[i].end);
						//var dur = (moment.duration(m2.diff(m1))).asDays();

						if (entries[i].alarm_type != null) var alarm_types = entries[i].alarm_type.split(';');
						if (entries[i].alarm_repeat != null) var alarm_repeats = entries[i].alarm_repeat.split(';');

						$.each(alarm_types, function (j, val) {
							//alert(alarm_types [i]); 
							if (alarm_types[j] != null) {
								var alarm_parts = alarm_types[j].split(',');
								var alarm_time;
								if (alarm_parts[4] == "startof") {
									if (alarm_parts[3] == "before") {
										if (alarm_parts[2] == "minutes") {
											alarm_time = moment(entries[i].start).subtract({'minutes': parseInt(alarm_parts[1])});
										}
										if (alarm_parts[2] == "hours") {
											alarm_time = moment(entries[i].start).subtract({'hours': parseInt(alarm_parts[1])});
										}
										if (alarm_parts[2] == "days") {
											alarm_time = moment(entries[i].start).subtract({'days': parseInt(alarm_parts[1])});
										}
									}
									else if (alarm_parts[3] == "after") {
										if (alarm_parts[2] == "minutes") {
											alarm_time = moment(entries[i].start).add({'minutes': parseInt(alarm_parts[1])});
										}
										if (alarm_parts[2] == "hours") {
											alarm_time = moment(entries[i].start).add({'hours': parseInt(alarm_parts[1])});
										}
										if (alarm_parts[2] == "days") {
											alarm_time = moment(entries[i].start).add({'days': parseInt(alarm_parts[1])});
										}
									}
								}
								if (entries[i].end !== " ") {
									if (alarm_parts[4] == "endof") {
										if (alarm_parts[3] == "before") {
											if (alarm_parts[2] == "minutes") {
												alarm_time = moment(entries[i].end).subtract({'minutes': parseInt(alarm_parts[1])});
											}
											if (alarm_parts[2] == "hours") {
												alarm_time = moment(entries[i].end).subtract({'hours': parseInt(alarm_parts[1])});
											}
											if (alarm_parts[2] == "days") {
												alarm_time = moment(entries[i].end).subtract({'days': parseInt(alarm_parts[1])});
											}
										}
										else if (alarm_parts[3] == "after") {
											if (alarm_parts[2] == "minutes") {
												alarm_time = moment(entries[i].end).add({'minutes': parseInt(alarm_parts[1])});
											}
											if (alarm_parts[2] == "hours") {
												alarm_time = moment(entries[i].end).add({'hours': parseInt(alarm_parts[1])});
											}
											if (alarm_parts[2] == "days") {
												alarm_time = moment(entries[i].end).add({'days': parseInt(alarm_parts[1])});
											}
										}
									}
								}
								if (alarm_time !== undefined) {
									var alarm_options=new Array();
									if (entries[i].alarm_option != null){
										alarm_options = entries[i].alarm_option.split(String.fromCharCode(0x1D));
									}else{alarm_options[j]="";}
									console.log('entries[i]');console.log(entries[i]);
									var newAlarm = {
										title: entries[i].Title,
										action: alarm_parts[0],
										time: alarm_time,
										entry_start: start_time,
										entry_end: end_time,
										creator_id: entries[i].CreatedBy,
										tag_ids: entries[i].tag_ids,
										custom_msg: alarm_options[j],
										entry_type: entries[i].Type,
										entry_priority: entries[i].Priority,
										entry_description: entries[i].Description
									};
									alarm_entries.push(newAlarm);

									// $.each(alarm_repeats[j], function (z, val) {
										//alert(alarm_types [i]); 
										if(alarm_repeats != null){
											if (alarm_repeats[j] != null) {
												var repeat_parts = alarm_repeats[j].split(',');
												for (loop = 1; loop <= parseInt(repeat_parts[0]); loop++) {
													var repeat_time;
													if (repeat_parts[2] === "minutes")
														repeat_time = moment(alarm_time).add({'minutes': loop * parseInt(repeat_parts[1])});
													if (repeat_parts[2] === "hours")
														repeat_time = moment(alarm_time).add({'hours': loop * parseInt(repeat_parts[1])});
													if (repeat_parts[2] === "days")
														repeat_time = moment(alarm_time).add({'days': loop * parseInt(repeat_parts[1])});

													var newRepeat = {
														title: entries[i].Title,
														action: alarm_parts[0],
														time: repeat_time,
														entry_start: start_time,
														entry_end: end_time,
														creator_id: entries[i].CreatedBy,
														tag_ids: entries[i].tag_ids,
														custom_msg: alarm_options[j],
														entry_type: entries[i].Type,
														entry_priority: entries[i].Priority,
														entry_description: entries[i].Description
													};
													alarm_entries.push(newRepeat);
												}
											}
										}
									}
								}
							});


}
}
return alarm_entries;
}

function generate_repeats(entries) {
	var len = entries.length;

	for (var i = 0; i < len; i++) {
		if (entries[i].y_repeat == "Daily") {

			var m1 = moment(entries[i].start);
			var m2 = moment(entries[i].end);
			
			var dur = (moment.duration(m2.diff(m1))).asDays();

			for (var j = 0; j < dur; j++) {

				var tmp_start = entries[i].start;
				var tmp_end = entries[i].end;
				var newstart = (moment(tmp_start).add({'days': j}).format('YYYY-MM-DD HH:mm:ss'));
				var newend;
				if (entries[i].duration.indexOf("a day") > -1) {
					newend = (moment(newstart).add({'days': 1}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("hour") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'hours': num}).format('YYYY-MM-DD HH:mm:ss'));
				}

				var newObj = {
					id: entries[i].Id,
					title: entries[i].Title,
					type: entries[i].Type,
					start: newstart,
					end: newend,
					backgroundColor: entries[i].backgroundColor,
				};
				entries.push(newObj);
			}
		}
		if (entries[i].y_repeat == "Weekly") {

			var m1 = moment(entries[i].start);
			var m2 = moment(entries[i].end);
			var dur = (moment.duration(m2.diff(m1))).asWeeks();

			for (var j = 0; j < dur; j++) {

				var tmp_start = entries[i].start;
				var tmp_end = entries[i].end;
				var newstart = (moment(tmp_start).add({'weeks': j}).format('YYYY-MM-DD HH:mm:ss'));
				var newend;

				if (entries[i].duration.indexOf("a day") > -1) {
					newend = (moment(newstart).add({'days': 1}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("hour") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'hours': num}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("week") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'weeks': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}

				var newObj = {
					id: entries[i].id,
					title: entries[i].Title,
					type: entries[i].Type,
					start: newstart,
					end: newend,
					backgroundColor: entries[i].backgroundColor,
				};
				entries.push(newObj);
			}
		}
		if (entries[i].y_repeat == "Monthly") {

			var m1 = moment(entries[i].start);
			var m2 = moment(entries[i].end);
			var dur = (moment.duration(m2.diff(m1))).asMonths();

			for (var j = 0; j < dur; j++) {

				var tmp_start = entries[i].start;
				var tmp_end = entries[i].end;
				var newstart = (moment(tmp_start).add({'months': j}).format('YYYY-MM-DD HH:mm:ss'));

				var newend;
				if (entries[i].duration.indexOf("a day") > -1) {
					newend = (moment(newstart).add({'days': 1}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("days") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'days': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("hour") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'hours': num}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("week") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'weeks': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}

				var newObj = {
					id: entries[i].id,
					title: entries[i].Title,
					type: entries[i].Type,
					start: newstart,
					end: newend,
					backgroundColor: entries[i].backgroundColor,
				};

				entries.push(newObj);
			}
		}
		if (entries[i].y_repeat == "Yearly") {

			var m1 = moment(entries[i].start);
			var m2 = moment(entries[i].end);

			var dur = (moment.duration(m2.diff(m1))).asYears();


			for (var j = 0; j < dur; j++) {

				var tmp_start = entries[i].start;
				var tmp_end = entries[i].end;
				var newstart = (moment(tmp_start).add({'years': j}).format('YYYY-MM-DD HH:mm:ss'));

				var newend;

				if (entries[i].duration.indexOf("a day") > -1) {
					newend = (moment(newstart).add({'days': 1}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
					
				}
				if (entries[i].duration.indexOf("days") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');

					newend = (moment(newstart).add({'days': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("hour") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'hours': num}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("week") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					newend = (moment(newstart).add({'weeks': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
				}
				if (entries[i].duration.indexOf("year") > -1) {
					var num = entries[i].duration.replace(/[^0-9]/g, '');
					
					newend = (moment(newstart).add({'years': num}).subtract({'seconds': 1}).format('YYYY-MM-DD HH:mm:ss'));
					
				}

				var newObj = {
					id: entries[i].id,
					title: entries[i].Title,
					type: entries[i].Type,
					start: newstart,
					end: newend,
					backgroundColor: entries[i].backgroundColor,
				};

				entries.push(newObj);
			}
		}
	}
	// delete original repeat entries
	$.each(entries, function (el, i) {
		if (this.y_repeat == "Daily") {
			entries.splice(el, 1);
		}
	});
	$.each(entries, function (el, i) {
		if (this.y_repeat == "Weekly") {
			entries.splice(el, 1);
		}
	});
	$.each(entries, function (el, i) {
		if (this.y_repeat == "Monthly") {
			entries.splice(el, 1);
		}
	});
	$.each(entries, function (el, i) {
		if (this.y_repeat == "Yearly") {
			entries.splice(el, 1);
		}
	});
	return 	entries;
}

function fun_add_new_entry(source, new_start, new_end,srcNew) {

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
		end: moment(new_end), // changed
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
		start: moment(new_start), // changed
		start_date: source.start,
		status: source.status,
		tag_ids: source.tag_ids,
		title: source.title,
		type: source.type,
		user_id: source.opened_by,
		y_repeat: source.y_repeat,
		guests: source.guests
	};
	srcNew.push(newObj);

}

function fun_genarate_source(source,viewdata) {

	var viewstart=(moment(viewdata.intervalStart));
	var viewend=(moment(viewdata.intervalEnd));

	srcAll = source;
	srcNew=[];

	var len = srcAll.length;

	for (var si = 0; si < len; si++) {
		
		var startDate = moment(srcAll[si].start,'YYYY-MM-DD HH:mm:ss');
		var endDate = moment(srcAll[si].end,'YYYY-MM-DD HH:mm:ss');
		var durdiff = moment.duration(endDate.diff(startDate, 'seconds'));
		
		srcAll[si].end=(moment(srcAll[si].end).add({'hours': 9}));
		
		var recur_execptions;

		var every = parseInt(srcAll[si].recur_every);
		var occur = parseInt(srcAll[si].recur_occur);
		var pattern = srcAll[si].recur_pattern;
		var rectype=srcAll[si].recur_type;
		
		var newStart;var newEnd;
		

		if(srcAll[si].recur_status==1){

			var options = RRule.parseString(srcAll[si].recur_options);
			if (srcAll[si].recur_type == "recur_for") {
				options.count = occur;
			}else{
				options.until = moment(srcAll[si].recur_until,'YYYY-MM-DD').toDate();
			}

			var rule = new RRule(options)

			var occ=rule.between(viewstart.toDate(), viewend.toDate());

			for (i = 0; i < occ.length; i++) {
				newStart = moment(occ[i]);
				newEnd = moment(occ[i]).add({'seconds': durdiff });
				fun_add_new_entry(srcAll[si], newStart, newEnd,srcNew);
			}

		}else{
			fun_add_new_entry(srcAll[si], srcAll[si].start, srcAll[si].end,srcNew);
		}

	}

	return srcNew;

}

function fun_close_dropdown(dd_serial){
	$('#dd_div_'+dd_serial).removeClass('open');
}
function fun_open_dropdown(dd_serial){
	$('.dropdown').removeClass('open');
	$('#dd_div_'+dd_serial).addClass("open");

};


$( document ).on( "click", "ul.dropdown-bkcolor-view", function(e) {
	console.log('e.target>add-border');console.log(e.target);
	if($(e.target).hasClass("close-da-picker") || $(e.target).hasClass("btn-picker-remove") || $(e.target).hasClass("btn-picker-add")){

	}else{

		e.stopPropagation();
	}
});

// function fun_delTodo(serial){

	// 	swal({
		// 		title: "Are you sure?",
		// 					//text: "Your will not be able to recover this imaginary file!",
		// 					type: "warning",
		// 					showCancelButton: true,
		// 					confirmButtonClass: "btn-danger",
		// 					confirmButtonText: "Yes, delete it!",
		// 					closeOnConfirm: false
		// 				},
		// 				function(){
			// 					var request = $.ajax({
				// 						url: base_url+"todo/delNewTodo",
				// 						method: 'POST',
				// 						data: {
					// 							user_id: "<?php echo $id; ?>",
					// 							todo_id:serial
					// 						},
					// 						dataType: 'JSON'
					// 					});
					// 					request.done(function(response){
						// 						$('#todoRow'+serial).remove();
						// 						swal("Deleted!", "Your To-do has been deleted.", "success");


						// 					});



						// 				});

						// }





						$('ul.dropdown-bkcolor-view li').click(function(e) 
						{ 
							$('#DueDateText').text($(this).text());
						});


					</script>

					<script type="text/javascript">
						function save_recur() {
							$("#recur_open").addClass("btn-success");
							$("#datetimepicker_start").val($("#datetimepicker_repeat_start").val());
							$("#datetimepicker_end").val($("#datetimepicker_repeat_end").val());
							$("#recur_duration").val($("#repeat_duration").val());
							$("#recur_pattern").val($("#repeat_pattern").val());
							$('#RecurModalNew').modal('hide');
						}

						//$(function () {

							$('#save_add_alarm').click(function (event) {
								event.preventDefault();
								var optionValueRepeat;
								var txt_mes = "";
								var optionName = $('#alarm_type1 option:selected').text() + ' ' + $('#alarm_type2').val() + ' ' + $('#alarm_type3 option:selected').text() + ' ' + $('#alarm_type4 option:selected').text() + ' ' + $('#alarm_type5 option:selected').text();
								var optionValueType = $('#alarm_type1').val() + ',' + $('#alarm_type2').val() + ',' + $('#alarm_type3').val() + ',' + $('#alarm_type4').val() + ',' + $('#alarm_type5').val();
								if ($("#chk_repeat_alarm").is(':checked')) {

									optionNameRepeat = $('#alarm_repeat1').val() + ' ' + $('#alarm_repeat2').val() + ' ' + $('#alarm_repeat3 option:selected').text();
									optionValueRepeat = $('#alarm_repeat1').val() + ',' + $('#alarm_repeat2').val() + ',' + $('#alarm_repeat3').val();
								} else {
									optionValueRepeat = undefined
								}
								if ($("#chk_custom_message").is(':checked')) {
									txt_mes = $('#txt_message').val();
								} else {
									txt_mes = "";
								}
								var hash = {};
								hash['type'] = optionValueType;
								hash['repeat'] = optionValueRepeat;
								hash['option'] = txt_mes;
								var json_val = JSON.stringify(hash);

								$('#sel_alarm_action')
								.append($("<option></option>")
									.attr("value", json_val)
									.text(optionName));

								$('#AlarmCustomiseModal').modal('hide');
							});

							$('#save_edit_alarm').click(function (event) {
								event.preventDefault();
								var optionValueRepeat = "";
								var txt_mes_edit = "";
								var optionName = $('#alarmedit_type1 option:selected').text() + ' ' + $('#alarmedit_type2').val() + ' ' + $('#alarmedit_type3 option:selected').val() + ' ' + $('#alarmedit_type4 option:selected').text() + ' ' + $('#alarmedit_type5 option:selected').text();
								var optionValue = $('#alarmedit_type1').val() + ',' + $('#alarmedit_type2').val() + ',' + $('#alarmedit_type3').val() + ',' + $('#alarmedit_type4').val() + ',' + $('#alarmedit_type5').val();
								if ($("#chk_repeat_alarm_edit").is(':checked')) {
									optionValueRepeat = $('#alarmedit_repeat1').val() + ',' + $('#alarmedit_repeat2').val() + ',' + $('#alarmedit_repeat3').val();
								} else {
									optionValueRepeat = ""
								}
								if ($("#chk_custom_message_edit").is(':checked')) {
									var txt_mes_edit = $('#txt_message_edit').val();
								} else {
									txt_mes_edit = "";
								}

								var hash = {};
								hash['type'] = optionValue;
								hash['repeat'] = optionValueRepeat;
								hash['option'] = txt_mes_edit;
								var json_val = JSON.stringify(hash);

								$('#sel_alarm_action').find(":selected").attr('value', json_val).text(optionName);
								$('#AlarmEditModal').modal('hide');
							});
							$('#btn_alarm_remove').click(function () {
								var $select = $('#sel_alarm_action');
								$('option:selected', $select).remove();
							});

							$('#close_edit_alarm').click(function (event) {
								event.preventDefault();
								$('#AlarmEditModal').modal('hide');
							});
							$('#btn_alarm_add').click(function () {
								clearAllInputs('#AlarmCustomiseModal');
								$('#div_repeat_alarm *').prop('disabled', true);
								$('#div_custom_message *').prop('disabled', true);
								$('#AlarmCustomiseModal').modal('show');
							});
							$('#btn_alarm_edit').click(function () {
								var $select = $('#sel_alarm_action');
								var values = ($('option:selected', $select).attr('value'));
								var obj = jQuery.parseJSON(values);
								var array_type = obj.type.split(",");
								for (i = 1; i <= array_type.length; i++) {

									$('#alarmedit_type' + i).val(array_type[i - 1]);
								}

								//console.log(obj.repeat);
								if (obj.repeat == undefined || obj.repeat == "") {

									$('#div_repeat_alarm_edit *').prop('disabled', true);
									$('#chk_repeat_alarm_edit').prop('checked', false);
									$('#alarmedit_repeat1, #alarmedit_repeat2').val('');
								} else {

									$('#div_repeat_alarm_edit *').prop('disabled', false);
									$('#chk_repeat_alarm_edit').prop('checked', true);
									var array_repeat = obj.repeat.split(",");
									for (i = 1; i <= array_repeat.length; i++) {

										$('#alarmedit_repeat' + i).val(array_repeat[i - 1]);
									}
								}


								//console.log(obj.option);
								if (obj.option == undefined || obj.option == "") {
									$('#div_custom_message_edit *').prop('disabled', true);
									$('#chk_custom_message_edit').prop('checked', false);
									$('#txt_message_edit').val('');
								} else {

									$('#div_custom_message_edit *').prop('disabled', false);
									$('#chk_custom_message_edit').prop('checked', true);
									$('#txt_message_edit').val(obj.option);
								}


							});

							$('#sel_alarm').on('change', function () {

								if (this.value == "custom") {
									$('#btn_alarm_add').prop('disabled', false);

								}
								else {
									$('#btn_alarm_add').prop('disabled', true);
									$('#btn_alarm_edit').prop('disabled', true);
									$('#btn_alarm_remove').prop('disabled', true);

								}

								if (this.value == "15 minutes") {

									var hash = {};
									hash['type'] = "popup,15,minutes,before,startof";
									var json_val = JSON.stringify(hash);
									$('#sel_alarm_action')
									.find('option')
									.remove()
									.end()
									.append($("<option></option>")
										.attr("value", json_val)
										.text("Popup an alert 15 minutes before the start of the appointment"));
									$('#btn_add_startalarm').attr('disabled','disabled');
								}
								if (this.value == "1 hour") {

									var hash = {};
									hash['type'] = "popup,1,hours,before,startof";
									var json_val = JSON.stringify(hash);
									$('#sel_alarm_action')
									.find('option')
									.remove()
									.end()
									.append($("<option></option>")
										.attr("value", json_val)
										.text("Popup an alert 1 hour before the start of the appointment"));
								}
								if (this.value == "1 day") {

									var hash = {};
									hash['type'] = "popup,1,days,before,startof";
									var json_val = JSON.stringify(hash);
									$('#sel_alarm_action')
									.find('option')
									.remove()
									.end()
									.append($("<option></option>")
										.attr("value", json_val)
										.text("Popup an alert 1 day before the start of the appointment"));
								}
								if (this.value == "None") {

									$('#sel_alarm_action')
									.find('option')
									.remove()
									.end();
								}
							});

							$("select#sel_alarm_action").change(function () {

								$('#btn_alarm_edit').prop('disabled', false);
								$('#btn_alarm_remove').prop('disabled', false);
							});


							$('.antosubmit2').click(function () {
								var form = $("#antoform2");
								var url = form.attr("action");
								var formData = form.serialize();
								$.post(url, formData, function (data) {

									location.reload();
								});
							});
							$('.antosubmit3').click(function () {
								var form = $("#email_form");
								var url = form.attr("action");
								var formData = form.serialize();
								$.post(url, formData, function (data) {

									location.reload();
								});
							})
							$('.antosubmit4').click(function () {
								var form = $("#event_form");
								var url = form.attr("action");
								var formData = form.serialize();
								$.post(url, formData, function (data) {

									location.reload();
								});
							})
							$('.antosubmit5').click(function () {
								var form = $("#todo_form");
								var url = form.attr("action");
								var formData = form.serialize();
								$.post(url, formData, function (data) {

									location.reload();
								});
							});
							// Recurrence Setup	
							$('.antosubmit6').click(function () {
								var rep_dur = $("#repeat_duration").val();
								//alert(rep_dur);
								var rep_pat = ($('#repeat_pattern').val());
								if (rep_pat.indexOf("Daily") > -1) {
									if (rep_dur.indexOf("days") > -1 || rep_dur.indexOf("week") > -1) {
										alert("Please shorten the duration or change the recurrence pattern.");
									} else {
										save_recur();
									}
								}
								if (rep_pat.indexOf("Weekly") > -1) {
									if (rep_dur.indexOf("weeks") > -1) {
										alert("Please shorten the duration or change the recurrence pattern.");
									} else {
										save_recur();
									}
								}
								if ((rep_pat.indexOf("Monthly") > -1) || (rep_pat.indexOf("Yearly") > -1)) {
									save_recur();
								}
							})
							// Alarm Setup	
							$('.antosubmit_alarm').click(function () {
								var rep_dur = $("#select_email_alarm").val();

							});

							$('#datetimepicker_repeat').prop('disabled', true);
							$('#datetimepicker_repeat2').prop('disabled', true);
							$('#repeat').on('change', function (e) {
								var optionSelected = $("option:selected", this);
								var valueSelected = this.value;
								if (valueSelected == "No") {
									$('#datetimepicker_repeat').prop('disabled', true);
								} else {
									$('#datetimepicker_repeat').prop('disabled', false);
								}
								;
							});
							$('#repeat2').on('change', function (e) {
								var optionSelected = $("option:selected", this);
								var valueSelected = this.value;
								if (valueSelected == "No") {
									$('#datetimepicker_repeat2').prop('disabled', true);
								} else {
									$('#datetimepicker_repeat2').prop('disabled', false);
								}
								;
							});
							$('#div_recur_until').hide();
							$('#recur_fuf').on('change', function (e) {
								var optionSelected = $("option:selected", this);
								var valueSelected = this.value;
								if (valueSelected == "recur_for") {
									$('#div_recur_for').show();
									$('#div_recur_until').hide();
								}
								if (valueSelected == "recur_until") {
									$('#div_recur_until').show();
									$('#div_recur_for').hide();
								}
								if (valueSelected == "recur_forever") {
									$('#div_recur_until').hide();
									$('#div_recur_for').hide();
								}

							});
							$('#div_repeat_alarm *').prop('disabled', true);
							$('#div_repeat_alarm_edit *').prop('disabled', true);
							$('#chk_repeat_alarm').change(function () {
								if ($(this).is(":checked")) {
									$('#div_repeat_alarm *').prop('disabled', false);
								} else {
									$('#div_repeat_alarm *').prop('disabled', true);
								}

							});
							$('#chk_repeat_alarm_edit').change(function () {
								if ($(this).is(":checked")) {
									$('#div_repeat_alarm_edit *').prop('disabled', false);
								} else {
									$('#div_repeat_alarm_edit *').prop('disabled', true);
								}

							});
							$('#div_custom_message *').prop('disabled', true);
							$('#chk_custom_message').change(function () {
								if ($(this).is(":checked")) {
									$('#div_custom_message *').prop('disabled', false);
								} else {
									$('#div_custom_message *').prop('disabled', true);
								}

							});
							$('#chk_custom_message_edit').change(function () {
								if ($(this).is(":checked")) {
									$('#div_custom_message_edit *').prop('disabled', false);
								} else {
									$('#div_custom_message_edit *').prop('disabled', true);
								}

							});
							$('#div_recurs *').prop('disabled', true);
							$('#chk_recurs').change(function () {
								if ($(this).is(":checked")) {
									$('#div_recurs *').prop('disabled', false);
									$('#btn_recur_add').prop('disabled', false);
								} else {
									$('#div_recurs *').prop('disabled', true);
									$('#btn_recur_add').prop('disabled', true);
								}

							});
							//});
						</script>

						<script>

							function fun_range_check(exception_date) {
								var rangechk = false;
								$.each(dateRange, function (index, value) {
									if (value == exception_date) {
										rangechk = true;
										return false;
									}
								});

								return rangechk;
							}
							function fun_previewcal(dateRange) {
								//$("#datePick").multiDatesPicker("destroy");
								var cal_time = moment($("#datetimepicker_start").val());
								var ms = cal_time.diff(moment(), 'months');
								var showmonth = ms + 'm';


								// $('#datePick').multiDatesPicker({
								// 	inline: true,
								// 	numberOfMonths: 3,
								// 	showButtonPanel: true,
								// 	defaultDate: showmonth,
								// 	beforeShowDay: function (date) {
								// 		var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
								// 		return [!(dateRange.indexOf(dateString) == -1)];
								// 	},
								// 	onSelect: function (date) {
								// 		var add_expdate = (moment(date).format('YYYY-MM-DD'));
								// 		$('#sel_recur_exception').append($('<option>', {
								// 			value: add_expdate,
								// 			text: add_expdate
								// 		}));
								// 		var index = dateRange.indexOf(add_expdate);
								// 		if (index >= 0) {
								// 			dateRange.splice(index, 1);
								// 		}
								// 		//console.log("add after");
								// 		//console.log(dateRange);
								// 		fun_previewcal(dateRange);
								// 	}

								// });
							}

							function fun_load_recur() {
								var startDate = (moment($('#datetimepicker_start').val()).format("YYYY-MM-DD"));
								var endDate = (moment($('#datetimepicker_end').val()).format("YYYY-MM-DD"));
								dateRange = [];
								// populate the array
								for (var d = new Date(startDate); d <= new Date(endDate); d.setDate(d.getDate() + 1)) {
									dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
								}
								if ($("#chk_recurs").is(':checked')) {
									var every = parseInt($('#input_recur_every').val());
									var pattern = $("#sel_recur_pattern option:selected").val();
									var type = $("#recur_fuf option:selected").val();
									var occur = parseInt($('#input_recur_occur').val());
									var every_pattern = every + " " + pattern;
									var startDate = (moment($('#datetimepicker_start').val()).format("YYYY-MM-DD"));
									var endDate = (moment($('#datetimepicker_end').val()).format("YYYY-MM-DD"));
									//console.log("before recur");
									//console.log(dateRange);
									if (type == "recur_for") {
										for (i = 1; i <= occur; i++) {
											var newStart;
											var newEnd;
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
											for (var d = new Date(newStart); d <= new Date(newEnd); d.setDate(d.getDate() + 1)) {
												// dont add if exists
												var index = dateRange.indexOf($.datepicker.formatDate('yy-mm-dd', d));
												if (index == -1) {
													dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
												}

											}

										}
									}
									if (type == "recur_until") {
										if ($('#datetimepicker_recur').val() != "") {
											if (isNaN(every) == false) {
												//alert($('#datetimepicker_recur').val());
												var date_limit = (moment($('#datetimepicker_recur').val()));
												i = 0;
												while (true) {
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
													//alert(newStart);
													if (moment(newStart).isAfter(date_limit, 'day')) {
														//alert("break");
														break;
													} else {
														for (var d = new Date(newStart); d <= new Date(newEnd); d.setDate(d.getDate() + 1)) {
															// dont add if exists
															var index = dateRange.indexOf($.datepicker.formatDate('yy-mm-dd', d));
															if (index == -1) {
																dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
															}

														}
													}
												}
											}
										}
									}
								}

								$("#sel_recur_exception option").each(function (i) {
									var index = dateRange.indexOf($(this).text());
									if (index >= 0) {
										dateRange.splice(index, 1);
									} else {
										$("#sel_recur_exception option[value='" + $(this).text() + "']").remove();
									}
								});
								//console.log("load after");
								//console.log(dateRange);
							}

							//$(function () {


								function validateEmail(email) {
									var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
									return re.test(email);
								}





								$('.close_addexception').on('click', function () {
									$('#RecurExceptionModal').modal('hide');
								});

								$('.close-entryform').on('click', function () {
									$('#openProjectTaskDiv').hide();
									$('#openProjectTaskListDiv').hide();
								});
								$('.close_editexception').on('click', function () {
									$('#RecurExceptionModalEdit').modal('hide');
								});
								$('#sel_recur_exception').focus(function () {

									$('#btn_recur_edit').prop('disabled', false);
									$('#btn_recur_remove').prop('disabled', false);
								});
								$('#btn_recur_edit').on('click', function () {

									$('#dtp_except_edit').val($("#sel_recur_exception option:selected").text());
									$('#RecurExceptionModalEdit').modal();
								});
								$('#btn_recur_remove').on('click', function () {

									$('#sel_recur_exception :selected').each(function (i, selected) {
										dateRange.push($(selected).text());
									});
									$("#sel_recur_exception option:selected").remove();
									fun_previewcal(dateRange);
								});
								$('#btn_editexception').on('click', function () {
									var exception_date = $('#dtp_except_edit').val();
									var editornot = true;
									if (exception_date != "") {
										$("#sel_recur_exception option").each(function (i) {

											if ($(this).text() == exception_date) {
												editornot = false;
												return false;
											}

										});
										if (editornot) {
											if (fun_range_check(exception_date)) {
												//console.log("edit before");
												//console.log(dateRange);
												dateRange.push($("#sel_recur_exception option:selected").val());
												var index = dateRange.indexOf($('#dtp_except_edit').val());
												if (index >= 0) {
													dateRange.splice(index, 1);
												}

												//console.log("edit after");
												console.log(dateRange);
												$("#sel_recur_exception option:selected").val($('#dtp_except_edit').val()).text($('#dtp_except_edit').val());
												$('#RecurExceptionModalEdit').modal('hide');
												fun_previewcal(dateRange);
											} else {
												alert("Date is out of range.");
											}
										} else {
											alert("Date already added.");
										}
									} else {
										alert("Please select a date.");
									}

								});
								$('#btn_addexception').on('click', function () {

									var exception_date = $('#datetimepicker_except').val();
									var addornot = true;
									if (exception_date != "") {
										$("#sel_recur_exception option").each(function (i) {

											if ($(this).text() == exception_date) {
												addornot = false;
												return false;
											}

										});
										if (addornot) {

											if (fun_range_check(exception_date)) {
												$('#sel_recur_exception').append($('<option>', {
													value: exception_date,
													text: exception_date
												}));
												//console.log("add before");
												//console.log(dateRange);
												var index = dateRange.indexOf(exception_date);
												if (index >= 0) {
													dateRange.splice(index, 1);
												}
												//console.log("add after");
												//console.log(dateRange);
												fun_previewcal(dateRange);
											} else {
												alert("Date is out of range.");
											}
										} else {
											alert("Date already added.");
										}
									} else {
										alert("Please select a date.");
									}
								});

								$(document).on('keyup mouseup change mousewheel', '.recur_every_occur', function () {

									fun_load_recur();
									fun_previewcal(dateRange);
									//console.log("after recur");
									//console.log(dateRange);

								});

								$(document).on('click', '.copy_calendar', function () {
									$('*').qtip('hide');
									$('#antoform').trigger("reset");
									$('#myModalLabel').text("New Calendar Entry");
									$('#submit_full_form').text("Create");
									$("#select_user_new").val('').trigger('change');
									$("#assign_to_group").hide("slow");
									$("#assign_to_user").show("slow");
									$("#antoform").attr("action", "<?php echo site_url('calendar/addCalendarEntryHD'); ?>");
									$('#sel_alarm_action').empty();
									$('#sel_recur_exception').empty();
									$("#chk_recurs").prop('checked', false);
									$('#div_recurs *').prop('disabled', true);
									$('#btn_recur_add').prop('disabled', true);
									$('#div_recur_for').show();
									$('#div_recur_until').hide();

									$("#entryname").val($(this).attr("data-title"));
									$("#datetimepicker_start").val($(this).attr("data-start"));
									$("#datetimepicker_end").val($(this).attr("data-end"));

									$('#fc_create').click();
									$('.nav-tabs a[href="#tab_newtask"]').tab('show');

								});

								$(document).on('click', '.delete_calendar', function () {
									$('*').qtip('hide');
									var serial = ($(this).attr("data-id"));


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
											url: base_url+"todo/delCalendarEntry",
											method: 'POST',
											data: {
												//user_id: user_id,
												serial:serial
											},
											//dataType: 'JSON'
										});
										request.done(function(response){
											fun_refresh_cal();
										});
										request.fail(function(response){
											console.log(response);
										});


									});



								});

								$(document).on('click', '.edit_calendar', function () {
									$('*').qtip('hide');

									var data = event_data;
									console.log('edit_calendar');console.log(data);
									if (data.group_id == null) {
										if (data.tag_ids != null)
											$("#select_user_new").val(data.tag_ids.split(',')).trigger('change');

										$("#assign_to_group").hide("slow");
										$("#assign_to_user").show("slow");
									} else {
										$("#assign_to_group").show("slow");
										$("#assign_to_user").hide("slow");
									}
									$('#myModalLabel').text("Update");
									$('#submit_full_form').text("Update");
									$("#antoform").attr("action", "<?php echo site_url('calendar/updateCalendar'); ?>");
									$('#calendar_id').val(data.cal_id);
									$('#parent_id_event').val(data.cal_id);
									$('#parent_id_todo').val(data.cal_id);
									$('#entryname').val(data.title);
									$('#location').val(data.Location);
									$('#descr').val(data.Description);
									$('#entry_color_new').val(data.backgroundColor);
									$('#datetimepicker_start_hval').val(moment(data.start).format("YYYY-MM-DD HH:mm:ss"));
									$('#datetimepicker_start').val(moment(data.start).format('MMM-DD-YYYY HH:mm:ss'));
									//if (data.end != null){
										//alert(data.end_date);
										$('#datetimepicker_end_hval').val(moment(data.end).subtract(9, 'hours').format('YYYY-MM-DD HH:mm:ss'));
										$('#datetimepicker_end').val(moment(data.end).subtract(9, 'hours').format('MMM-DD-YYYY HH:mm:ss'));

										// flat_startdate.setDate($("#datetimepicker_start").val());
										// flat_enddate.setDate($("#datetimepicker_end").val());

										$('input[name="entry_type"][value="' + data.type + '"]').prop('checked', true);
										$('input[name="priority"][value="' + data.priority + '"]').prop('checked', true);
										if (data.group_id == null) {
											$('input[name="assign_new"][value="Individual"]').prop('checked', true);
										} else {
											$('input[name="assign_new"][value="Group"]').prop('checked', true);
										}

										// var alarm_type = jQuery.parseJSON( data.alarm_type );
										// console.log( alarm_type );
										var alarm_types, alarm_repeats, alarm_options;
										$('#sel_alarm_action').empty();
										if (data.alarm_type != null) {
											alarm_types = data.alarm_type.split(';');
											if (data.alarm_repeat != null) {
												alarm_repeats = data.alarm_repeat.split(';');
											}
											if (data.alarm_option != null) {
												alarm_options = data.alarm_option.split(String.fromCharCode(0x1D));
											}
											$.each(alarm_types, function (i, val) {
												//alert(alarm_types [i]); 
												if (alarm_types[i] != null) {
													var alarm_parts = alarm_types[i].split(',');
													// display type details
													var str;
													if (alarm_parts[0] == "popup")
														str = "Popup an alert ";
													if (alarm_parts[0] == "mail")
														str = "Send a mail ";
													if (alarm_parts[0] == "call")
														str = "Call a number ";
													if (alarm_parts[0] == "sound")
														str = "Play a sound ";
													str += alarm_parts[1] + " ";
													str += alarm_parts[2] + " ";
													str += alarm_parts[3] + " ";
													if (alarm_parts[4] == "startof")
														str += "start of appointment";
													if (alarm_parts[4] == "endof")
														str += "end of appointment";
												}
												//if(alarm_repeats != null){var repeat_parts = alarm_repeats[i].split(',');}
												var hash = {};
												if (data.alarm_type != null)
													hash['type'] = alarm_types[i];
												if (data.alarm_repeat != null)
													hash['repeat'] = alarm_repeats[i];
												if (data.alarm_option != null)
													hash['option'] = alarm_options[i];
												var json_val = JSON.stringify(hash);
												$('#sel_alarm_action')
												.append($("<option></option>")
													.attr("value", json_val)
													.text(str));
											});
											if (alarm_types.length > 1) {
												$('#sel_alarm').val('custom');
												$('#btn_alarm_add').prop('disabled', false);
											} else {
												$('#btn_alarm_add').prop('disabled', true);
												if (alarm_types[0] == "popup,15,minutes,before,startof") {
													$("#sel_alarm").val("15 minutes");
												}
												else if (alarm_types[0] == "popup,1,hours,before,startof") {
													$("#sel_alarm").val("1 hour");
												}
												else if (alarm_types[0] == "popup,1,days,before,startof") {
													$("#sel_alarm").val("1 day");
												}
												else {
													$("#sel_alarm").val("custom");
													$('#btn_alarm_add').prop('disabled', false);
												}
											}
										}
										if (data.recur_type != null) {
											$('#chk_recurs').prop("checked", true);
											$('#div_recurs *').prop('disabled', false);
											$('#btn_recur_add').prop('disabled', false);
											$('#input_recur_every').val(data.recur_every);
											$('#sel_recur_pattern').val(data.recur_pattern);
											$('#recur_fuf').val(data.recur_type);
											if (data.recur_type == "recur_for") {
												$('#input_recur_occur').val(data.recur_occur);
												$('#div_recur_for').show();
												$('#div_recur_until').hide();
											}
											if (data.recur_type == "recur_until") {

												$('#datetimepicker_recur').val(data.recur_until);
												$('#div_recur_for').hide();
												$('#div_recur_until').show();
											}
											$('#sel_recur_exception').empty();
											if (data.recur_exceptions != null) {
												var recur_execptions = data.recur_exceptions.split(';');
												$.each(recur_execptions, function (i, val) {

													$('#sel_recur_exception')
													.append($("<option></option>")
														.attr("value", val)
														.text(val));
												});
											}
										} else {
											$('#chk_recurs').prop("checked", false);
											$('#div_recurs *').prop('disabled', true);
											$('#btn_recur_add').prop('disabled', true);
										}

										if (data.Guests != null){
											if (!!data.Guests){

												var guests_data=data.Guests.split(',');
												$("#select_guests").val(guests_data).trigger('change');

												//  $.each(guests_data,function(number,guest){
													//     var newState = new Option(guest, guest, true, true);

													//     $("#select_guests").append(newState).trigger('change');
													// });
												}
											}
											//console.log('edit data');
											//console.log(data);
											if(data.this_type=='task'){
												$('#divTaskAss').show();
												$('#divEventTodoAss').hide();

												var arrSuper=[];var arrMember=[];var arrFollowers=[];

												if(data.task_tags !=null){
													var task_tags=data.task_tags.split(',');

													$.each(task_tags,function(i,v){
														var tags=v.split('-');
														if(tags[1]=="0"){
															arrSuper.push(tags[0]);
														}else{
															arrMember.push(tags[0]);
														}
													});
												}
												// if(data.task_followers !=null){
													// 	arrFollowers=data.task_followers.split(',');
													// }
													$('#assignToMemberTask').val(arrSuper).trigger('change');
													$('#memberTask').val(arrMember).trigger('change');
													//$('#followersTask').val(arrFollowers).trigger('change');

												}else{
													$('#divTaskAss').hide();
													$('#divEventTodoAss').show();
												}

												$("#CalenderModalNew").modal();
												$('.nav-tabs a[href="#tab_newtask"]').tab('show');


											});

	// $(document).on("keypress", "form", function (event) {
		// 	return event.keyCode != 13;
		// });

		$(document).on("click", "#cal_all", function (event) {
			event_display = "all";
			$('#calendar').fullCalendar('refetchEvents');
			$(".filter-type *").removeClass("active");
			$(this).addClass("active");
		});

		$(document).on("click", "#cal_event", function (event) {
			event_display = "event";
			$('#calendar').fullCalendar('refetchEvents');
			$(".filter-type *").removeClass("active");
			$(this).addClass("active");
		});
		$(document).on("click", "#cal_todo", function (event) {
			event_display = "todo";
			$('#calendar').fullCalendar('refetchEvents');
			$(".filter-type *").removeClass("active");
			$(this).addClass("active");
		});
		$(document).on("click", "#cal_task", function (event) {
			event_display = "task";
			$('#calendar').fullCalendar('refetchEvents');
			$(".filter-type *").removeClass("active");
			$(this).addClass("active");
		});
		$(document).on('change', '#change_sortby', function () {

			event_display = $(this).val();
			$('#calendar').fullCalendar('refetchEvents');

		});
		$(document).on('change', '#sel_my_calendar', function () {

			srcAll = fun_genarate_source("event");
			//alert(srcAll);
			$('#calendar').fullCalendar('removeEventSource', srcAll);
			$('#calendar').fullCalendar('refetchEvents');
			//$('#calendar').fullCalendar('addEventSource', srcAll);
			//$('#calendar').fullCalendar( 'removeEvents',function(event){if(event.type=="todo") return true; } );

		});

		$(document).on('switchChange.bootstrapSwitch', '.clshol_notify', function (event, state) {
			var hol_name = $('.pubhol_name').html();
			var hol_start = $('.pubhol_start').html();

			hol_start = (moment(hol_start).format("YYYY-MM-DD"));
			//console.log(event);

			if (state == true) {
				// alert("in");
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('calendar/addHolidayPopup'); ?>",
					data: {name: hol_name, startdate: hol_start},
					//dataType: "html",
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
			if (state == false) {

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('calendar/delHolidayPopup'); ?>",
					data: {name: hol_name, startdate: hol_start},
					//dataType: "html",
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
		});

		//});

		// function goProjectPage(){
			// 	var str = location.pathname.substring(1);
			// 	var res = str.split("/");
			// 	var url = res[1]+res[2];
			// 	var baseUrl = '<?php echo base_url(); ?>';
			// 	var org_id = '<?php echo $org_id; ?>';
			// 	var customUrl = baseUrl+org_id+".com/yzy-projects/index/projects";

			// 	$.ajax({
				// 		type: "POST",
				// 		url: '<?php echo site_url(); ?>SessionManagement/set_session',
				// 		data: {
					// 			url: 'NA'
					// 		},
					// 		success: function (data) {
						// 			window.location.href = customUrl
						// 		},
						// 		error: function (xhr, desc, err) {
							// 			console.log('error');
							// 		}
							// 	});
							// }
						</script>


						<script>
							var dateRange = []; // array to hold the range
							//$(function () {

								//$('#datePick').multiDatesPicker();
								$('#dtp_except_edit,#datetimepicker_recur').flatpickr();


								$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
									var target = $(e.target).attr("href") // activated tab
									if (target == "#tab_recurrence") {

										fun_load_recur();
										var cal_time = moment($("#datetimepicker_start").val());
										var ms = cal_time.diff(moment(), 'months');
										var showmonth = ms + 'm';
										//$("#datePick").multiDatesPicker("destroy");
										// $('#datePick').multiDatesPicker({
										// 	inline: true,
										// 	numberOfMonths: 3,
										// 	showButtonPanel: true,
										// 	defaultDate: showmonth,
										// 	beforeShowDay: function (date) {
										// 		var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
										// 		return [!(dateRange.indexOf(dateString) == -1)];
										// 	},
										// 	onSelect: function (date) {
										// 		var add_expdate = (moment(date).format('YYYY-MM-DD'));
										// 		$('#sel_recur_exception').append($('<option>', {
										// 			value: add_expdate,
										// 			text: add_expdate
										// 		}));
										// 		var index = dateRange.indexOf(add_expdate);
										// 		if (index >= 0) {
										// 			dateRange.splice(index, 1);
										// 		}
										// 		//console.log("add after");
										// 		//console.log(dateRange);
										// 		fun_previewcal(dateRange);
										// 	}

										// });
									}
								});
								//});
							</script>

							<!-- script to save,edit calendar entry to database -->

							<script type="text/javascript">
								//$(function () {

									function set_recurPattern() {
										var m1 = moment($("#datetimepicker_repeat_start").val());
										var m2 = moment($("#datetimepicker_repeat_end").val());
										var dur = (moment.duration(m2.diff(m1)));


										if (dur.asDays() > 1) {
											if ($("#repeat_pattern option[value='Daily']").length == 0) {
												$('#repeat_pattern').append($(document.createElement("option")).
													attr("value", "Daily").text("Daily"));
											}
										} else {
											$("#repeat_pattern option[value='Daily']").remove();
										}

										if (dur.asDays() > 7) {
											if ($("#repeat_pattern option[value='Weekly']").length == 0) {
												$('#repeat_pattern').append($(document.createElement("option")).
													attr("value", "Weekly").text("Weekly"));
											}
										} else {
											$("#repeat_pattern option[value='Weekly']").remove();
										}

										if (dur.asMonths() > 1) {
											if ($("#repeat_pattern option[value='Monthly']").length == 0) {
												$('#repeat_pattern').append($(document.createElement("option")).
													attr("value", "Monthly").text("Monthly"));
											}
										} else {
											$("#repeat_pattern option[value='Monthly']").remove();
										}

										if (dur.asYears() > 1) {
											if ($("#repeat_pattern option[value='Yearly']").length == 0) {
												$('#repeat_pattern').append($(document.createElement("option")).
													attr("value", "Yearly").text("Yearly"));
											}
										} else {
											$("#repeat_pattern option[value='Yearly']").remove();
										}

										$('#repeat_pattern').on('change', function () {

										});
									}



									$('.modal-dialog').draggable({
										handle: ".modal-header"
									});

									$('#RecurModalNew').on('shown.bs.modal', function () {

										$("#datetimepicker_repeat_start").val($("#datetimepicker_start").val());
										$("#datetimepicker_repeat_end").val($("#datetimepicker_end").val());
										set_recurPattern();
									});
									$("#datetimepicker_repeat_start , #datetimepicker_repeat_end").change(function () {
										set_recurPattern();
									});
									//});
								</script>

								<script type="text/javascript">
									$("#assignToMemberTask").select2({
										maximumSelectionLength: 10,
										placeholder: "Add project Supervisors",
										allowClear: true
									});
									$("#memberTask").select2({
										maximumSelectionLength: 10,
										placeholder: "Add project Members",
										allowClear: true
									});
									$("#followersTask").select2({
										maximumSelectionLength: 10,
										placeholder: "Add project Followers",
										allowClear: true
									});
									var fpendasg= flatpickr('input[type="date"]', {
										enableTime: false,
										//dateFormat: 'M-d-Y',
										//clickOpens:false,
										//minDate:moment(item.Startdate).format('MMM-DD-YYYY'),
										onChange: function(selectedDates, dateStr, instance) {
											//thisValue(selectedDates[0],serial,'endDateinAsg','duration','todo',nowid);
										}
									});
								</script> 

								<script type="text/javascript">
									// init values
									$('#weeklyDiv').show();
									var start = moment().startOf('day');
									var end = moment().endOf('day');
									$('#sel_start_times,#sel_end_times').empty();

									while(end>start){
										$('#sel_start_times,#sel_end_times').append('<option>'+start.format('h:mm A')+'</option');
										start=moment(start).add(30,'minutes');
									}

									$('#sel_durations,#timetxt_dur').val('24 hours');
									$('#timetxt_start').val('12:00 AM');

									function changeRecurPattern(element){
										if($(element).find('span').html()=="Daily"){
											$('.recur-pat-div').hide();
											$('#dailyDiv').show();
										}else if($(element).find('span').html()=="Weekly"){
											$('.recur-pat-div').hide();
											$('#weeklyDiv').show();
										}else if($(element).find('span').html()=="Monthly"){
											$('.recur-pat-div').hide();
											$('#monthlyDiv').show();
										}else if($(element).find('span').html()=="Yearly"){
											$('.recur-pat-div').hide();
											$('#yearlyDiv').show();
										}
									}

									$("#sel_start_times,#timetxt_start").change(function(el){ 

										var vtext= $(el.currentTarget).val();
										$("#timetxt_start").val(vtext.trim());
										
										var hasday=$('#timetxt_dur').val().indexOf('day');
										var hasweek=$('#timetxt_dur').val().indexOf('week');
										var hasminute=$('#timetxt_dur').val().indexOf('minute');
										var hashour=$('#timetxt_dur').val().indexOf('hour');

										if(hasday>-1 || hasweek > -1){
											var start = moment().startOf('day');
											var end = moment().endOf('day');
										}else{
											var start = moment($(el.currentTarget).val(),'h:mm A');
											var end = moment(start).add(24,'hours');
										}

										$('#sel_end_times').empty();
										var mainstart=start;

										while(end>start){
											var diff=start.diff(mainstart, 'hours',true);

											//$('#sel_end_times').append('<option>'+start.format('h:mm A')+ ' (' +diff+ ' hours)' +'</option');
											$('#sel_end_times').append('<option>'+start.format('h:mm A')+ '</option');
											start=moment(start).add(30,'minutes');
										}

										if(hasday>-1 || hasweek > -1){
											$('#timetxt_end,#sel_end_times').val($(el.currentTarget).val());
										}else{
											var durct=Number($('#timetxt_dur').val().split(" ")[0]);
											if(hasminute>-1){

												$("#timetxt_end,#sel_end_times").val(moment(mainstart).add(durct,'minutes').format('h:mm A'));

											}
											if(hashour>-1){
												
												$("#timetxt_end,#sel_end_times").val(moment(mainstart).add(durct,'hours').format('h:mm A'));

											}

										}


										
										var rec_start=$('#recur_startdate').val();
										var time_start=$(this).val();
										
										var main_end=moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss').format('MMM-DD-YYYY');

										var time_end=$('#timetxt_end').val();
										var sync_start=moment(rec_start+" "+time_start,'MMM-DD-YYYY h:mm A');
										var sync_end=moment(main_end+" "+time_end,'MMM-DD-YYYY h:mm A');

										flat_startdate_cal.setDate(sync_start.format("MMM-DD-YYYY HH:mm:ss"));

										flat_enddate_cal.setDate(sync_end.format("MMM-DD-YYYY HH:mm:ss"));

									});

									$("#sel_end_times,#timetxt_end").change(function(el){ 
										//var vtext= $(el.currentTarget).val().split("(")[0];
										var vtext= $(el.currentTarget).val();
										$("#timetxt_end").val(vtext.trim());
										console.log(vtext);

										var main_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');
										var main_end=moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss');
										console.log(main_end);

										var new_end=moment(main_end.format('MMM-DD-YYYY') + " " + vtext,'MMM-DD-YYYY h:mm A');
										var mdiff=moment.duration(new_end.diff(main_start)).asMinutes();
										console.log(mdiff);

										var isneg=parseFloat(mdiff);
										
										if(isneg<0){
											new_end.add(1,'days');
										}

										flat_enddate_cal.setDate(new_end.format('MMM-DD-YYYY HH:mm:ss'));

										var diff_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');

										var diff_end=moment($('#datetimepicker_end').val(),'MMM-DD-YYYY HH:mm:ss');
										
										var diffdur = parseInt(moment.duration(diff_end.diff(diff_start)).asHours());
										
										$('#timetxt_dur,#sel_durations').val(diffdur+" hours");


										// var tstart=moment($("#timetxt_start").val(),'h:mm A');
										// var tend=moment($("#timetxt_end").val(),'h:mm A');
										// var hdiff=moment.duration(tend.diff(tstart)).asHours();
										// $("#timetxt_dur,#sel_durations").val(hdiff+" hours");

										// var hasday=$('#timetxt_dur').val().indexOf('day');
										// var hasweek=$('#timetxt_dur').val().indexOf('week');
										// var hasminute=$('#timetxt_dur').val().indexOf('minute');
										// var hashour=$('#timetxt_dur').val().indexOf('hour');

										// if(hasday>-1 || hasweek > -1){
										// 	var start = moment().startOf('day');
										// 	var end = moment().endOf('day');
										// }else{
										// 	var start = moment($('#timetxt_start').val(),'h:mm A');
										// 	var end = moment(start).add(24,'hours');
										// }

										// $('#sel_end_times').empty();
										
										// while(end>start){
											
										// 	$('#sel_end_times').append('<option>'+start.format('h:mm A')+ '</option');
										// 	start=moment(start).add(30,'minutes');
										// }

										// $("#timetxt_end,#sel_end_times").val(vtext.trim());

										// var main_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');

										// var durcnt=$('#timetxt_dur').val().split(" ")[0].trim();
										// var durpat=$('#timetxt_dur').val().split(" ")[1].trim();

										// var isneg=parseFloat(durcnt);
										
										// if(isneg<0){
										// 	var newhour=24+isneg;
										// }else{
										// 	var newhour=isneg;
										// }

										// main_start.add(newhour,durpat);
										// flat_enddate.setDate(main_start.format("MMM-DD-YYYY HH:mm:ss"));
										
										// $("#timetxt_dur,#sel_durations").val(newhour+" hours");


									});

									$("#sel_durations").change(function(el){
										var durcnt=$(this).val().split(" ")[0].trim();
										var durpat=$(this).val().split(" ")[1].trim();

										$("#timetxt_dur").val($("#sel_durations").val());

										var hasday=$('#timetxt_dur').val().indexOf('day');
										var hasweek=$('#timetxt_dur').val().indexOf('week');
										var hasminute=$('#timetxt_dur').val().indexOf('minute');
										var hashour=$('#timetxt_dur').val().indexOf('hour');

										if(hasday>-1 || hasweek > -1){
											var start = moment().startOf('day');
											var end = moment().endOf('day');
										}else{
											var start = moment($('#timetxt_start').val(),'h:mm A');
											var end = moment(start).add(24,'hours');
										}

										$('#sel_end_times').empty();
										var mainstart=start;

										while(end>start){
											var diff=start.diff(mainstart, 'hours',true);

											$('#sel_end_times').append('<option>'+start.format('h:mm A')+ '</option');
											start=moment(start).add(30,'minutes');
										}

										$('#timetxt_end').val(moment($('#timetxt_start').val(),'h:mm A').add(durcnt,durpat).format('h:mm A'));
										$('#sel_end_times').val($('#timetxt_end').val());

										var main_start=moment($('#datetimepicker_start').val(),'MMM-DD-YYYY HH:mm:ss');

										var durcnt=$('#timetxt_dur').val().split(" ")[0].trim();
										var durpat=$('#timetxt_dur').val().split(" ")[1].trim();

										var isneg=parseFloat(durcnt);
										
										if(isneg<0){
											var newhour=24+isneg;
										}else{
											var newhour=isneg;
										}

										main_start.add(newhour,durpat);

										
										flat_enddate_cal.setDate(main_start.format("MMM-DD-YYYY HH:mm:ss"));
										$("#timetxt_dur,#sel_durations").val(newhour+" hours");
										

									});

									function calendarNewEntryModal(entryname=null,start,end){
										
										if(start==undefined) start=moment().startOf('day');
										if(end==undefined) end=moment().endOf('day');
										

										$('#antoform').trigger("reset");
										$('#myModalLabel').text("New");
										$('#submit_full_form').text("Create");
										$("#select_user_new").val('').trigger('change');
										$("#assign_to_group").hide("slow");
										$("#assign_to_user").show("slow");
										$("#antoform").attr("action", "<?php echo site_url('calendar/addCalendarEntryHD'); ?>");
										$('#sel_alarm_action').empty();
										$('#sel_recur_exception').empty();
										$("#chk_recurs").prop('checked', false);
										$('#div_recurs *').prop('disabled', true);
										$('#btn_recur_add').prop('disabled', true);
										$('#div_recur_for').show();
										$('#div_recur_until').hide();
										
										$('#btn_add_startalarm').removeAttr("disabled");
										
										$('#select_guests').val('').trigger('change');
										
										$("#datetimepicker_start_hval").val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
										$("#datetimepicker_start").val(moment(start).format('MMM-DD-YYYY HH:mm:ss'));
										
										$("#datetimepicker_end_hval").val(moment(end).subtract('seconds', 1).format("YYYY-MM-DD HH:mm:ss"));
										$("#datetimepicker_end").val(moment(end).subtract('seconds', 1).format("MMM-DD-YYYY HH:mm:ss"));
										console.log('entryname',entryname);
										if(entryname !=null) $('#entryname').val(entryname);

										// flat_startdate.setDate(moment(start).format("MMM-DD-YYYY HH:mm:ss"));
										// flat_enddate.setDate(moment(end).subtract('seconds', 1).format("MMM-DD-YYYY HH:mm:ss"));

										$('.flatpickr-calendar').addClass('dateIsPicked').removeClass('arrowTop');
										$('#fc_create').click();
										$('.nav-tabs a[href="#tab_newtask"]').tab('show');
									}


								</script>