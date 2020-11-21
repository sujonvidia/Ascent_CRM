<script src="<?php echo base_url(); ?>asset/js/highcharts.js"></script>  

<script src="https://code.highcharts.com/highcharts-3d.js"></script>


<script type="text/javascript">
	

	function searchTask(task_name){
		$('.TaskListDiv').removeHighlight();
		$('.taskDetailDive').each(function(k,v){

			if($(v).find('.proName').text().toLowerCase().indexOf(task_name.toLowerCase())>-1){

				$(v).show();
				if(task_name) $(v).find('.proName').highlight( task_name );


			}else{
				$(v).hide();
			}
		});

		$('.subtaskDetailDive').each(function(k,v){

			if($(v).find('.proNameSub').text().toLowerCase().indexOf(task_name.toLowerCase())>-1){
				$(v).show();
				$(v).closest('.taskDetailDive').show();
				if(task_name) $(v).find('.proNameSub').highlight( task_name );
			}else{
				$(v).hide();
			}
		});
	}

	function genChart(p1,p2){
		var seriesarr=[];
		if(p1>0){
			seriesarr.push({
				name: 'Pending',
				data: [p1],
				color: '#ED7E30'

			});
		}
		if(p2>0){
			seriesarr.push({
				name: 'Completed',
				data: [p2],
				color: '#5C9BD5',
			});
		}

		var chart = {
			type: 'bar',
			//width: 800,
			height:200,
			options3d: {
				enabled: true,
				alpha: 10,
				//beta: 0,
				//viewDistance: 50,
				//depth: 30,

			}
		};
		var title = {
			text: 'Tasks Status'   
		};
		var xAxis = {
			categories: ['1'],
			title: {
				text: null
			}
		};
		var yAxis = {
			min: 0,
			//tickInterval: 5,
			allowDecimals: false,
			title: {
				text: '',
				align: 'high'
			},
			// labels: {
				// 	overflow: 'justify'
				// }
			};

			// var tooltip = {
				// 	valueSuffix: ' tasks'
				// };

				var plotOptions = {
					bar: {
						pointWidth:50,
						dataLabels: {
							enabled: true,
							color: 'black',
							x:20,
							y:-10,
							verticalAlign: 'bottom',
							//align: 'center',
							shadow:false,
						}
					},
					series: {
						stacking: 'normal'
					}
				};
				var legend = {
					layout: 'horizontal',
					align: 'center',
					verticalAlign: 'bottom',
					squareSymbol:true,
					symbolRadius: 0,
					//x: -40,
					//y: 200,
					//floating: true,
					borderWidth: 0,
					backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
					//shadow: true,
					reversed:true
				};
				var credits = {
					enabled: false
				};

				var json = {};   
				json.chart = chart; 
				json.title = title;   
				//json.subtitle = subtitle; 
				//json.tooltip = tooltip;
				json.xAxis = xAxis;
				json.yAxis = yAxis;  
				json.series = seriesarr;
				json.plotOptions = plotOptions;
				json.legend = legend;
				json.credits = credits;
				$('#container_chart').highcharts(json);

			}

			function drawOverdueTask(data){
				$("#tbl_overdue_tasks tbody").empty();

				if(data.length>0){
					$("#tbl_overdue_tasks tfoot").hide();
					$.each(data, function (key, value) {
						var enddatedue=moment(value.Enddate.split(" ")[0]);
						var overduedays = moment.duration(moment().startOf('day').diff(enddatedue)).asDays();

						var newrow='<tr>'
						+'<td>'+value.Title+'</td>'
						+'<td>'+(enddatedue.isValid() ? enddatedue.format('DD-MMM') : '') + '</td>'
						+'<td>'+(enddatedue.isValid() ? overduedays+' days' : '')+'</td>'
						+'<td>'+(value.tag_names != null ? value.tag_names : '') +'</td>'
						+'</tr>';

						$("#tbl_overdue_tasks tbody").append(newrow);


					});
				}else{
					$("#tbl_overdue_tasks tfoot").show();
				}
			}

			function drawNextdueTask(data){
				$("#tbl_nextdue_tasks tbody").empty();

				if(data.length>0){
					$("#tbl_nextdue_tasks tfoot").hide();

					$.each(data, function (key, value) {
						var enddatedue=moment(value.Enddate.split(" ")[0]);

						var newrow='<tr>'
						+'<td>'+(value.taskTitle != null ? value.taskTitle : '')+'</td>'
						+'<td>'+(value.subtaskTitle != null ? value.subtaskTitle : '')+'</td>'
						+'<td>'+(enddatedue.isValid() ? enddatedue.format('DD-MMM') : '') + '</td>'
						+'<td>'+(value.tag_names != null ? value.tag_names : '') +'</td>'
						+'</tr>';

						$("#tbl_nextdue_tasks tbody").append(newrow);


					});
				}else{
					$("#tbl_nextdue_tasks tfoot").show();
				}

				



			}

			function generatePreview(element){

				if(!$(element).hasClass('activeOL')){


					var request = $.ajax({
						url: base_url+"report/getReportDashboard",
						method: 'POST',
						data: {
							type_id: $('#newTaskInput').attr('data-projectid'),

						},
						dataType: 'JSON'
					});

					request.done(function(response){

						var startdate=moment(response.data[0].Startdate);
						var enddate=moment(response.data[0].Enddate);
						var enddatedue=moment(response.data[0].Enddate.split(" ")[0]);
						$('#rpt_title').text(response.data[0].Title);
						$('#rpt_status').text(response.data[0].Status);
						$('#rpt_admin').text(response.data[0].admin_name);
						$('#rpt_coadmins').text(response.data[0].coadmin_name);
						$('#rpt_members').text(response.data[0].member_name);
						$('#rpt_dur_from').text(startdate.format('DD-MMM-YYYY'));
						$('#rpt_dur_to').text(enddate.format('DD-MMM-YYYY'));

						var duration = moment.duration(enddatedue.diff(moment().startOf('day')));
						$('#rpt_due_days').text(duration.asDays());
						$('#rpt_due_tasks').text(response.duetasks);
						$('.rpt_overdue_tasks').text(response.overduetasks.length);
						$('.rpt_nextdue_tasks').text(response.duetasks_nextweek.length);

						if(response.laststatus){
							$('#rpt_laststatus_by').text(response.laststatus.full_name);
							$('#rpt_laststatus_on').text(moment(response.laststatus.time).format('DD-MMM-YYYY'));
							$('#rpt_laststatus_text').html(atob(response.laststatus.msg));
							$('#rpt_lastedited').show();

						}else{
							$('#rpt_lastedited').hide();
							$('#rpt_laststatus_text').html("No status update found.");
						}
						$('#rpt_tasks_total').text(response.tasks_total);

						$('#rpt_tasks_comp').text(response.tasks_comp);
						$('#rpt_tasks_pend').text(response.tasks_total-response.tasks_comp);
						$('.reportDiv').attr('class','col-lg-12 reportDiv').show();
						$('.filterDiv').attr('class','col-lg-9 filterDiv').hide();

						genChart(response.tasks_total-response.tasks_comp,response.tasks_comp);
						drawOverdueTask(response.overduetasks);
						drawNextdueTask(response.duetasks_nextweek);


					});
					request.always(function() { 
						
						if($('#rarrow').css('display')=='none'){
							
							$("#larrrow").trigger('click');
							$('.TaskListDiv').hide();
							$('#reportDivArea').show();

							$('.noBorder').removeClass('activeOL');
							$('.ribLi5').addClass('activeOL');

							$('#report_ganttDiv').hide();
							$('#report_panelDiv').show();
							$('#report_timelineDiv').hide();
							//$("#report_panelDiv").ready(function(){
							   //alert("Ready");
							   fun_loadfulltable($('#newTaskInput').attr('data-projectid'),'ASC','All');
							//});
							
						}
					});

				}
			}

			function closeReport(element){
				$(".ribLi1").trigger('click'); 
			}
				
			// 	var proid =  $('#newTaskInput').attr('data-projectid');
			// 	var lastselector = $("#closeReport").attr("data-lastclick");
			// 	//alert(lastselector);
			// 	$(".ribLi").removeClass('activeOL');
				
			// 	$("#"+lastselector).addClass('activeOL');
			// 	var select = ( lastselector.match(/[a-z]+/i));
			// 	console.log(select[0]);
			// 	if(select == "dashboardIMG"){
			// 		$("#dashboardIMG"+proid).trigger('click');
			// 	}
			// 	$(".inviteClose").hide();
			// 	$('#reportDivArea').hide();
			// 	$('#rarrow').hide();	
			// 	$('#larrrow').show();	
			// 	$("#reportDivArea").hide();
			// 	$("#leftFloat").css('display','none');
			// 	$("#leftFloat").text("");
			// 	$(".TaskListDiv").removeAttr('style');
			// 	$(".taskDate").removeClass('customdate3');
			// 	$(".taskDate").addClass('customdate');
			// 	$(".subtaskDatePicker").addClass('customdate');
			// 	$(".subtaskDatePicker").removeClass('customdate2');

			// 	//$(".projectListDiv").finish();

			// 	$(".projectListDiv").animate({
			// 		width: "toggle"
			// 	});

			// 	//$(".projectListDiv").stop(true, true).delay(100).animate({width:'toggle'}, 400);
			// }

			

			function statusColor(Status){
				var scolor;
				if(Status == 'none'){
					scolor='RED';
				}else if(Status == 'in progress'){
					scolor='BLUE';
				}else if(Status == 'completed'){
					scolor='GREEN';
				}else if(Status == 'on hold'){
					scolor='RED';
				}else if(Status == 'waiting for feedback'){
					scolor='ORANGE';
				}else if(Status == 'canceled'){
					scolor='RED';
				}else{
					scolor='#6EA7F2';
				}
				return scolor;
			}

			/// expand with color, background etc.
			function drawTextBG(ctx, txt, font, x, y) {

				//ctx.save();
				ctx.font = font;
				//ctx.textAlign = "center";
				ctx.textBaseline = 'top';

				ctx.fillStyle = '#FFFFFF';

				var width = ctx.measureText(txt).width;
				//ctx.globalCompositeOperation = "destination-over";
				ctx.fillRect(x-20, y, width, parseInt(font, 10));

				ctx.fillStyle = '#000';
				//ctx.globalCompositeOperation = "source-over";
				ctx.fillText(txt, x-20, y);

				//ctx.restore();
			}

			function generateTimeline(){
				var draw_lines=[];
				var draw_circles=[];
				var draw_text=[];

				$('#report_ganttDiv').hide();
				$('#report_panelDiv').hide();
				$('#report_timelineDiv').show();

				var request = $.ajax({
					url: base_url+"report/getReportTimeline3",
					method: 'POST',
					data: {
						type_id: $('#newTaskInput').attr('data-projectid')

					},
					//dataType: 'JSON'
				});

				request.fail(function(data) {

					console.log(data.responseText);
				});

				request.done(function(response){

					console.log('getReportTimeline',response);
					

					var data_full=response.data_pro[0];

					var sted=" : " + moment(data_full.Startdate).format('DD-MMM, YYYY') + " to " + moment(data_full.Enddate).format('DD-MMM, YYYY');
					$('#rpt_title_timeline').text(data_full.Title + sted);
					$("#tbl_timeline tbody").empty();

					var time_prostart = moment(data_full.Startdate.split(" ")[0]);
					var time_proend = moment(data_full.Enddate.split(" ")[0]);
					var maxlen=0;var ilen=0;
					var sortlen=response.datalen;
					var canvasheight=response.canvasheight;
					var lastdate=false;
					var maxheight=1;

					var canvas = document.getElementById("myCanvas");
					var ctx = canvas.getContext("2d");
					var dw=6; // draw width;
					canvas.width = $("#canvasDiv").width()*dw/5;
					canvas.height = $("#canvasDiv").height()*canvasheight/15;
					ctx.clearRect(0, 0, canvas.width, canvas.height);
					var container = document.getElementById('canvasDiv');
					container.scrollTop = container.scrollHeight/3;



					// // start from x:50
					var x=50;
					var y=(canvas.height/2); 

					var dh=20; // draw week height;
					var hgap=20;
					var hline=10;

					// // month generate
					var time_prostart = moment(data_full.Startdate.split(" ")[0]);
					var time_proend = moment(data_full.Enddate.split(" ")[0]);

					var prodiff=time_proend.diff(time_prostart, 'days');
					var time_now=moment().startOf('day');



					// project start
					
					var rem_days=Number(time_prostart.diff(time_now, 'days'));

					var row_pro	= '<tr>'
								+ '		<td>' + (time_prostart.isValid() ? time_prostart.format('D/MM/YYYY') : "") + '</td>'
								+ '		<td class="pro">PROJECT START</td>'
								+ '		<td>' + rem_days + '</td>';
								+ '</tr>';

					$("#tbl_timeline tbody").append(row_pro);


					$.each(response.sortedData, function (range_key, range_data) {

						ilen+=1;
						console.log('range_key',range_key);
						console.log('range_key',ilen);
						console.log('range_key',sortlen);

						var range_start=moment(range_key,'YYYY-MM-DD');

						var diff_range=Number(range_start.diff(time_prostart, 'days'));
						

						if(ilen==1){ 
							console.log('diff_range start',diff_range);
							if(diff_range>0){
								draw_text.push({
									textAlign:"center",
									type:"month",
									fillText: {
										text:time_prostart.format('DD-MMM'),
										xp:x+(maxlen)*dw,
										yp:y+10
									}
								});
								maxlen+=diff_range+10;
							}
						}


						draw_circles.push({
							type:'sort',
							arc: {xp:x+(maxlen)*dw,yp:y,r:5,start:0,end:Math.PI*2}

						});

						draw_text.push({
							textAlign:"center",
							type:"month",
							fillText: {
								text:range_start.format('DD-MMM'),
								xp:x+maxlen*dw,
								yp:y+10
							}
						});

						var height_task=1;
						var height_subtask=1;


						$.each(range_data.data, function (keytask, dd) {
							if(dd.Type=='Task'){

								draw_lines.push({
									type:'task',
									moveTo: {xp:x+maxlen*dw,yp:y}, 
									lineTo:  {xp:x+maxlen*dw,yp:y-height_task*dh-20}
								});

								draw_text.push({
									textAlign:"left",
									type:"task",
									fillText: {
										text:dd.Title,
										xp:x+maxlen*dw,
										yp:y-height_task*dh-10
									}
								});

								height_task+=1;

							}else{
								draw_lines.push({
									type:'subtask',
									moveTo: {xp:x+maxlen*dw,yp:y}, 
									lineTo:  {xp:x+maxlen*dw,yp:y+height_subtask*dh+30}
								});

								draw_text.push({
									textAlign:"left",
									type:"subtask",
									fillText: {text:dd.Title,xp:x+maxlen*dw,yp:y+height_subtask*dh+10}
								});
								height_subtask+=1;
							}

							var time_start=moment(dd.Startdate.split(" ")[0]);
							var time_end=moment(dd.Enddate.split(" ")[0]);

							var rem_days=Number(time_end.diff(time_now, 'days'));

							var row_stask = ' <tr>'

											+ '		<td>' + (time_end.isValid() ? time_end.format('D/MM/YYYY') : "") + '</td>'
											+ '		<td class="' + dd.Type + '">' + dd.Title + '</td>'
											+ '		<td>' + rem_days + '</td>';
								 + '</tr>';

							$("#tbl_timeline tbody").append(row_stask);


						});

						if(ilen==sortlen){}
							else{maxlen+=range_data.maxlen+10;}
						lastdate=	range_start;
						if(ilen==1) maxheight=height_task;



					});


					var rem_days=Number(time_proend.diff(time_now, 'days'));
					var row_pro='<tr>'

					+ '<td>' + (time_proend.isValid() ? time_proend.format('D/MM/YYYY') : "") + '</td>'
					+ '<td class="pro">PROJECT END</td>'
					+ '<td>' + rem_days + '</td>';
					+ '</tr>';

					$("#tbl_timeline tbody").append(row_pro);
					var diff_proend=0; 	var diff_vertical=0;
					var diff_prostartend=Number(time_proend.diff(time_prostart, 'days'));
					if(lastdate) diff_proend=Number(time_proend.diff(lastdate, 'days'));
					if(diff_prostartend==0) diff_vertical=30;

					// console.log('diff_proend',diff_proend);
					// console.log('diff_prostartend',diff_prostartend);
					// console.log('maxheight',maxheight);
					// console.log('maxheight',diff_vertical);

					draw_text.push({
						textAlign:"center",
						type:"project",
						fillText: {
							text:'PROJECT START',
							xp:x,
							yp:y-dh*maxheight-diff_vertical/2-10
						}
					});

					draw_lines.push({
						moveTo: {xp:x+maxlen*dw+diff_proend,yp:y}, 
						lineTo:  {xp:x+maxlen*dw+diff_proend,yp:y-dh*maxheight-diff_vertical}
					});

					draw_lines.push({
						moveTo: {xp:x,yp:y}, 
						lineTo:  {xp:x,yp:y-dh*maxheight-diff_vertical}
					});

					draw_circles.push({
						type:'project start',
						arc: {xp:x,yp:y,r:5,start:0,end:Math.PI*2}

					});

					draw_text.push({
						textAlign:"center",
						type:"project",
						fillText: {
							text:'PROJECT END',
							xp:x+maxlen*dw+diff_proend,
							yp:y-dh*maxheight-diff_vertical-10
						}
					});

					

					draw_circles.push({
						type:'project end',
						arc: {
							xp:x+maxlen*dw+diff_proend,
							yp:y,r:5,start:0,end:Math.PI*2
						}

					});

					// draw middle line
					
					draw_lines.push({
						moveTo: {xp:x,yp:y}, 
						lineTo:  {xp:x+maxlen*dw+diff_proend,yp:y}
					});

					

					draw_text.push({
						textAlign:"center",
						type:"month",
						fillText: {
							text:time_proend.format('DD-MMM'),
							xp:x+maxlen*dw+diff_proend,
							yp:y+10
						}
					});
					drawCanvas(ctx,draw_lines,draw_circles,draw_text);

				});


}

function drawCanvas(ctx,draw_lines,draw_circles,draw_text){
	var color_line="#DDDEDA";
	var color_circle="#F65242";
	var color_text="#70B5CF";

	$.each(draw_lines, function (kl, dl) {
		ctx.strokeStyle = color_line; // middle line color
		ctx.moveTo(dl.moveTo.xp,dl.moveTo.yp);
		ctx.lineTo(dl.lineTo.xp,dl.lineTo.yp);
		ctx.stroke();
	});

	$.each(draw_circles, function (kc, dc) {
		//ctx.strokeStyle = "#FFFFFF";
		ctx.fillStyle = color_circle;
		ctx.beginPath();
		ctx.arc(dc.arc.xp,dc.arc.yp,dc.arc.r,dc.arc.start,dc.arc.end);
		ctx.closePath();
		ctx.fill();
	});

	$.each(draw_text, function (kt, dt) {
		//ctx.save();
		ctx.font = "12px Arial";
		
		ctx.textAlign = dt.textAlign;
		ctx.textBaseline = 'top';
		ctx.fillStyle = '#FFFFFF'; // box color

		var width = ctx.measureText(dt.fillText.text).width;
		

		ctx.fillRect(dt.fillText.xp-5, dt.fillText.yp, width, parseInt("12px Arial", 10));

		ctx.fillStyle = color_text;
		//ctx.globalCompositeOperation = "source-over";
		ctx.fillText(dt.fillText.text, dt.fillText.xp+5, dt.fillText.yp);

		//ctx.restore();
		// }else{
			// 	ctx.font = "12px Arial";
			// 	ctx.textAlign = dt.textAlign;
			// 	ctx.fillStyle = color_text; // text color
			// 	ctx.fillText(dt.fillText.text,dt.fillText.xp,dt.fillText.yp);
			// }



		});
}


function generateGantt(){
	$('#report_ganttDiv').show();
	$('#report_panelDiv').hide();
	$('#report_timelineDiv').hide();

	var request = $.ajax({
		url: base_url+"report/getReportGantt",
		method: 'POST',
		data: {
			type_id: $('#newTaskInput').attr('data-projectid')

		},
		dataType: 'JSON'
	});

	request.done(function(response){


		console.log('getReportGantt',response);
		var data_full=response.data_pro[0];
		var sted=" : " + moment(data_full.Startdate).format('DD-MMM, YYYY') + " to " + moment(data_full.Enddate).format('DD-MMM, YYYY');
		$('#rpt_title_gantt').text(data_full.Title + sted);
		$('.dyn-ganttdates').remove();

		// month generate
		var dateStart = moment(data_full.Startdate.split(" ")[0]);
		var dateEnd = moment(data_full.Enddate.split(" ")[0]);

		while (dateEnd >= dateStart) {
			var a = moment(dateStart, "MMM-YY").endOf('month');
			var b = moment(dateStart, "MMM-YY");
			var c = (a.diff(b, 'days'));

			$('#tbl_ganttchart thead > tr').append('<th style="text-align: center;" colspan="'+ (c+1) +'" class="dyn-ganttdates">'+dateStart.format('MMM-YY')+'</th>');

			dateStart.add(c+1,'d');

		}
		// week generate
		var dateStart2 = moment(data_full.Startdate.split(" ")[0]);
		var dateEnd2 = moment(data_full.Enddate.split(" ")[0]);

		var newrow='<tr style="border-bottom:2px solid #ccc;" class="dyn-ganttdates">';
		while (dateEnd2 >= dateStart2) {
			var cols=7;
			if(dateEnd2.diff(dateStart2, 'days') < 7){
				cols=dateEnd2.diff(dateStart2, 'days')+2;
			}

			newrow +='<th style="text-align: left" colspan="'+cols+'">'+dateStart2.format('D-MMM')+'</th>';
			dateStart2.add(1,'w');

		}

		newrow+='</tr>';

		$('#tbl_ganttchart thead').append(newrow);

		$("#tbl_ganttchart tbody").empty();

		$.each(data_full.data_tasks, function (keytask, task) {
			var sdt=moment(task.Startdate.split(" ")[0]);
			var edt=moment(task.Enddate.split(" ")[0]);

			var row_task='<tr >'
			+ '<td class="task">' + task.Title + '</td>'
			+ '<td>' + (sdt.isValid() ? sdt.format('D-MMM-YY') : "") + '</td>'
			+ '<td>' + (edt.isValid() ? edt.format('D-MMM-YY') : "") + '</td>'
			+ '<td>' + (sdt.isValid() && edt.isValid() ? Number(edt.diff(sdt, 'days')+1) : 0) + '</td>';

			row_task+= '<td style="color:'+statusColor(task.Status)+'" class="td-status">' + task.Status + '</td>';

			var pro_start=moment(data_full.Startdate.split(" ")[0]);
			var pro_end=moment(data_full.Enddate.split(" ")[0]);

			// generate days
			while (pro_end >= pro_start) {
				var bc='none';

				if (sdt <= pro_start && pro_start <= edt) {
					bc='#CAB8CA'
				}
				row_task+= '<td style="background:'+bc+';" class="notborder"></td>';
				pro_start.add(1,'d');
			}

			row_task+= '</tr>';

			$("#tbl_ganttchart tbody").append(row_task);

			$.each(task.data_subtasks, function (keysub, subtask) {

				var sdt2=moment(subtask.Startdate.split(" ")[0]);
				var edt2=moment(subtask.Enddate.split(" ")[0]);

				var row_subtask='<tr >'
				+ '<td class="subtask"><i class="fa fa-angle-double-right"></i> ' + subtask.Title + '</td>'
				+ '<td>' + (sdt2.isValid() ? sdt2.format('D-MMM-YY') : "") + '</td>'
				+ '<td>' + (edt2.isValid() ? edt2.format('D-MMM-YY') : "") + '</td>'
				+ '<td>' + (sdt2.isValid() && edt2.isValid() ? Number(edt2.diff(sdt2, 'days')+1) : 0) + '</td>'
				+ '<td style="color:'+statusColor(subtask.Status)+'" class="td-status">' + subtask.Status + '</td>';

				var pro_start2=moment(data_full.Startdate.split(" ")[0]);
				var pro_end2=moment(data_full.Enddate.split(" ")[0]);

				while (pro_end2 >= pro_start2) {
					var bc2='none';

					if (sdt2 <= pro_start2 && pro_start2 <= edt2) {
						bc2='#CAB8CA'
					}
					row_subtask+= '<td style="background:'+bc2+';" class="notborder"></td>';
					pro_start2.add(1,'d');
				}

				row_subtask+= '</tr>';

				$("#tbl_ganttchart tbody").append(row_subtask);


			});


			if(keytask == data_full.data_tasks.length-1){}
				else{
					$("#tbl_ganttchart tbody").append('<tr><td colspan="'+$("#tbl_ganttchart tbody > tr td").length+'"></td></tr>');
				}

			});


	});
}

function generateOverview(){
	$('#report_ganttDiv').hide();
	$('#report_panelDiv').show();
	$('#report_timelineDiv').hide();

}
</script>