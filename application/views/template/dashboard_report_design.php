<style type="text/css">

	



	.duSpan:hover {
		border: 3px solid #bfbfbf; 
		color: #3276b1;
		cursor: pointer;
		opacity: inherit;
		box-shadow: 0px 0px 0px 3px #bfbfbf !important;
		transition: box-shadow 0.3s ease-in-out;
	}

	.span-vertran{
		transform: rotate(90deg);
		transform-origin: left top 0;float: left;

		margin-left: 15px;
		white-space: nowrap;
	}
	.proDiv{
		height: initial;
		width: 100%;
		height: 615px;
		overflow: auto;
	}
	.notborder{
		border:none !important;
	}
	.td-status{
		text-transform:capitalize
	}
	#tbl_ganttchart tbody .Task, #tbl_timeline tbody .Task{
		font-weight: bold;
		font-size: 16px;
	}

	#tbl_ganttchart tbody .SubTask, #tbl_timeline tbody .SubTask{

		font-size: 14px;
	}

	#tbl_ganttchart tbody td , #tbl_timeline tbody td{
		border:2px solid #ccc;
		border-bottom: none;

	}

	#tbl_ganttchart td,#tbl_ganttchart th,#tbl_timeline td,#tbl_timeline th{
		padding:5px;white-space: nowrap;
	}

</style>

<style type="text/css">
	#report_panelDiv {
		border-radius: 8px;
		margin-bottom: 16px;
		height: 615px;
		overflow-y: auto;
	}
	#widget-grid-row{
		padding-top: 1%;
	}
</style>
<style type="text/css">


	#tbl_overdue_tasks td,#tbl_nextdue_tasks td{
		border:2px solid #ccc;
		padding:5px;
	}
	#rpt_title{
		font-size: 30px;
		color: #0476CB;
	}
	#rpt_status{
		text-transform:capitalize
	}
	.span-purple{
		color: #773AA4;
	}
	.span-content{
		font-size: 20px;
	}
</style>
<div class="row" id="widget-grid-row">
	
	

	<div id="reportDivArea" class="col-lg-12 reportDiv" style="display: none;margin-left: 2%;width: 98%;">
		
		<div class="col-lg-11" style="width: 97%">
			<!-- timeline -->
			<div id="report_panelDiv" class="panel panel-default proDiv">
				<div id="report_panel" class="panel-body">
					<!-- 1st section -->
					<div style="padding-left: 10px;padding-bottom: 10px">
						<h1 id="rpt_title"></h1>

						<div style="width: 78%;float: left">
							<div style="    margin-bottom: 10px;">
								<span class="span-purple">Duration:</span>
								<span id="rpt_dur_from" class="span-content"></span> to
								<span id="rpt_dur_to" class="span-content"></span> |
								<span class="span-purple">Status:</span>
								<span id="rpt_status" class="span-content"></span>

							</div>

							<div >
								<span class="span-purple">Project Admin:</span>
								<span class="span-content" id="rpt_admin"></span> ,

								<span class="span-purple">Project Co-Admin(s):</span>
								<span class="span-content" id="rpt_coadmins"></span>

							</div>

							<div >
								<span class="span-purple">Project Members:</span>
								<span class="span-content" id="rpt_members"></span>

							</div>
						</div>

						<div style="width: 12%;float: right;">
							<div style="border: 2px solid #773AA4;border-radius: 8px;padding: 10px">
								<div>Due in: 
									<span id="rpt_due_days" class="span-content"></span> days</div>
									<div>Due Tasks: <span id="rpt_due_tasks" class="span-content"></span></div>
									<div>Overdue Tasks: <span id="" class="span-content rpt_overdue_tasks"></span> </div>
								</div>

							</div>
						</div>

						<!-- 2nd section -->
						<div style="border: 2px solid #0476CB;border-radius: 8px;padding: 10px;clear: both;position: relative;top: 10px;">
							<span style="color: #0476CB;" class="span-content">Status Update</span>
							<span id="rpt_lastedited" style="color: #0476CB;font-style: italic;">last edited by <span id="rpt_laststatus_by"></span> on <span id="rpt_laststatus_on"></span>:</span>

							<div id="rpt_laststatus_text" style="margin-top: 10px;margin-bottom: 10px">
							</div>
						</div>

						<!-- 3rd section -->
						<div style="padding-left: 10px;margin-top: 20px">

							<span style="color: #0476CB;" class="span-content">Progress Report:</span>

							<div>
								<span class="span-purple">Total Tasks:</span>
								<span id="rpt_tasks_total">0</span> | 
								<span class="span-purple">Completed:</span>
								<span id="rpt_tasks_comp">0</span> | 
								<span class="span-purple">Pending:</span>
								<span id="rpt_tasks_pend">0</span>
							</div>
							<div id="container_chart" style="border:1px solid #ccc;"></div>
						</div>

						<!-- 4th section -->
						<div style="padding-left: 10px;margin-top: 20px">
							<span class="span-content span-purple">Overdue Tasks: </span><span id="" style="color: red;" class="span-content rpt_overdue_tasks"></span>

							<table id="tbl_overdue_tasks">

								<thead style="background: #AEAAAA;font-weight: bold;font-size: 14px;">
									<tr>
										<td>Task </td>
										<td>Due Date</td>
										<td>Overdue Days</td>
										<td>Assigned to</td>
									</tr>
								</thead>

								<tbody>

								</tbody>

								<tfoot style="display: none">
									<tr>
										<td colspan="100" style="text-align: center;">
											No overdue tasks found
										</td>
									</tr>
								</tfoot>

							</table>

						</div>

						<!-- 5th section -->
						<div style="padding-left: 10px;margin-top: 20px">
							<span class="span-content span-purple">Tasks due by next week: </span><span id="" style="color: black;" class="span-content rpt_nextdue_tasks"></span>

							<table id="tbl_nextdue_tasks">

								<thead style="background: #AEAAAA;font-weight: bold;    font-size: 14px;">
									<tr>
										<td>Task</td>
										<td>Sub-task</td>
										<td>Due Date</td>
										<td>Assigned to</td>
									</tr>
								</thead>

								<tbody>

								</tbody>

								<tfoot style="display: none">
									<tr>
										<td colspan="100" style="text-align: center;">
											No due tasks found
										</td>
									</tr>
								</tfoot>

							</table>

						</div>


					</div> <!-- panel body ends -->
				</div> <!-- panel ends -->

				<!-- gantt -->
				<div id="report_ganttDiv" class="panel panel-default proDiv" style="display: none">
					<div id="report_panel_gantt" class="panel-body">
						<!-- 1st section -->
						<div style="padding-left: 10px;padding-bottom: 10px">
							<h1 id="rpt_title_gantt"></h1>
							<div style="border: 2px solid #ccc;display: inline-block;">
								<table id="tbl_ganttchart">
									<thead>
										<tr>
											<th rowspan="2">ACTIVITY</th>
											<th rowspan="2">Start Date</th>
											<th rowspan="2">End Date</th>
											<th rowspan="2">Duration (days)</th>
											<th rowspan="2" style="border-right: 2px solid #ccc">Status</th>

										</tr>
									</thead>

									<tbody>

									</tbody>
								</table>
							</div>
							
						</div>
						
					</div> <!-- gantt panel body ends -->
				</div> <!-- gantt panel ends -->

				<!-- timeline -->
				<div id="report_timelineDiv" class="panel panel-default proDiv" style="display: none">
					<div id="report_panel_timeline" class="panel-body">
						<!-- 1st section -->
						<div style="padding-left: 10px;padding-bottom: 10px">
							<h1 id="rpt_title_timeline"></h1>
							<div id="canvasDiv" style="width: 100%;height: 500px;overflow: auto;border:2px solid #ccc">
							
								<canvas id="myCanvas">
								</canvas>
								</div>

								<div style="border: 2px solid #ccc;display: inline-block;margin-top: 10px">
								<table id="tbl_timeline">
									<caption style="background: #2A2C3B;color:#70B5CF">PROJECT DETAILS</caption>
									<thead>
										<tr>
											<th>DATE</th>
											<th>Task/Subtask</th>
											<th>Duration (days)</th>

										</tr>
									</thead>

									<tbody>

									</tbody>
								</table>

							</div>
							
						</div>
						
					</div> <!-- timeline panel body ends -->
				</div> <!-- timeline panel ends -->


			</div> <!-- report div ends -->


			<div class="col-lg-1" style="width: 3%">
				<i onclick="closeReport(this)" data-lastclick="" data-expand="" id="closeReport" class="fa fa-times hvr-glow clasI" aria-hidden="true"></i>
				<span style="margin-bottom: 30px;" onclick="generateOverview()"  class="duSpan span-vertran">Overview</span>
				<span style="margin-bottom: 40px;" onclick="generateGantt()"  class="duSpan span-vertran">Gantt Chart</span>
				<span onclick="generateTimeline()"  class="duSpan span-vertran">Timeline</span>
			</div>

		</div> <!-- report area ends -->