<script type="text/javascript">
	// init sujon
	var arrPublic_ws=[];
	var arrManual_ws=[];

	var arrPublic_ps=[];
	var arrManual_ps=[];

	var arrTotalHoliday_ps=[];
	var arrTotalHoliday_ws=[];

	var got_pubhol=0;
	var _usersetid=0;

	var enumerateDaysBetweenDates = function(startDate, endDate) {
		var now = startDate.clone(), dates = [];

		while (now.isBefore(endDate) || now.isSame(endDate)) {
			dates.push(now.format('D MMM YYYY'));
			now.add('days', 1);
		}
		return dates;
	};


	var dt_pubhol_ws=$('#tbl_pubhol_ws').DataTable( {
		"searching": false,
		"paging": false,
		"ordering": false,
		"language": {
			"emptyTable": "Loading..."
		},
		"columnDefs": [{"targets": [ 3 ],"visible": false}],
		rowGroup: {dataSrc: 3}
	} );

	var dt_pubhol_ps=$('#tbl_pubhol_ps').DataTable( {
		"searching": false,
		"paging": false,
		"ordering": false,
		"language": {
			"emptyTable": "Loading..."
		},
		"columnDefs": [{"targets": [ 3 ],"visible": false}],
		rowGroup: {dataSrc: 3}
	} );

	function updateWorkCal(){
		var dayhour = Number($('#hour_perday').val());
		var arrWeekends=[];
		var arrWeekdays=[];

		$('.chk_ws_weekends').each(function(e){

			if($(this).closest('div').hasClass('checked')) 
				arrWeekends.push($(this).attr('data-name'));
			else arrWeekdays.push($(this).attr('data-name'));

		});

		var cal_weekday=	moment().weekdayCalc({  
			rangeStart: moment().startOf('year').format('D MMM YYYY'),  
			rangeEnd: moment().endOf('year').format('D MMM YYYY'),  
			weekdays: arrWeekdays,  
			exclusions: arrTotalHoliday_ws
			
		});

		$('#total_dayhour').html(dayhour);
		$('#total_workhour').html(dayhour*cal_weekday);
		$('#total_workday').html(cal_weekday);
		$('#total_weekends').html(arrWeekends.length);
		$('#total_holpublic').html(arrPublic_ws.length);
		$('#holcal_name').html($('#selectCountry_ws').select2('data')[0].text.split(" ")[0]);

		saveWorkspaceSet('auto');

	}

	// person calculation
	function updatePersonCal(){

		var dayhour = Number($('#hour_perday_ps').val());
		var hourly_rate = Number($('#hourlyrate_ps').val());
		var arrWeekends=[];
		var arrWeekdays=[];

		$('.chk_ps_weekends').each(function(e){

			if($(this).closest('div').hasClass('checked')) 
				arrWeekends.push($(this).attr('data-name'));
			else arrWeekdays.push($(this).attr('data-name'));

		});

		console.log('updatePersonCal',arrWeekdays,arrTotalHoliday_ps);

		var cal_weekday_ps =	moment().weekdayCalc({  
			rangeStart: moment().startOf('year').format('D MMM YYYY'),  
			rangeEnd: moment().endOf('year').format('D MMM YYYY'),  
			weekdays: arrWeekdays,  
			exclusions: arrTotalHoliday_ps
			
		});

		$('#hourly_rate_ps').html(hourly_rate);
		$('#total_dayhour_ps').html(dayhour);
		$('#total_workhour_ps').html(dayhour*cal_weekday_ps);
		$('#total_workday_ps').html(cal_weekday_ps);
		$('#total_weekends_ps').html(arrWeekends.length);
		$('#total_holpublic_ps').html(arrPublic_ps.length);
		$('#holcal_name_ps').html($('#selectCountry_ps').select2('data')[0].text.split(" ")[0]);

		savePersionSet('auto');

	}

	function getHolidaysWS(startdate,enddate){
		var tstart= moment(startdate).format('YYYY-MM-DD');
		var tend= moment(enddate).format('YYYY-MM-DD');
		var selcountry=$("#selectCountry_ws").val();

		var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/en.' + selcountry + '%23holiday%40group.v.calendar.google.com/events?key=AIzaSyCsKVDaSG0NHGILAok4LrTXm0o_nGId2H0&timeMin='+tstart+'T00:00:00Z&timeMax='+tend+'T23:59:59Z&singleEvents=true&orderBy=startTime';

		dt_pubhol_ws.clear();
		dt_pubhol_ws.draw();

		$.getJSON(calendarUrl).success(function(data) {
			console.log('getHolidaysWS data::',data);

			arrPublic_ws=[];
			$('.chk_ws_holidays').iCheck('destroy');


			for (item in data.items) {

				arrPublic_ws.push(moment(data.items[item].start.date).format('D MMM YYYY'));
				var startdate=moment(data.items[item].start.date);
				var uid=data.items[item].id;

				var newhol='<tr>'
				+'<td><input checked="checked" data-uid="'+uid+'" data-date="'+startdate.format('D MMM YYYY')+'" class="chk_ws_holidays" type="checkbox" ></td>'
				+ '<td>'+ data.items[item].summary + '</td>'
				+ '<td> ' + startdate.format('D MMM YYYY') + '</td>'
				+ '<td>'+ startdate.format('MMMM') + '</td>'
				+'</tr>';

				//$("#tbl_pubhol tbody").append(newhol);
				dt_pubhol_ws.row.add($(newhol));

			}

			dt_pubhol_ws.draw();

			$('.chk_ws_holidays').iCheck({
				checkboxClass: 'iradio_square-green',

			}).on('ifUnchecked', function(event){ 

				var index = arrPublic_ws.indexOf($(event.currentTarget).attr('data-date')); 
				if (index != -1) arrPublic_ws.splice(index, 1);

				arrTotalHoliday_ws=arrPublic_ws.concat(arrManual_ws);

				updateWorkCal();

				$.ajax({
					url: '<?php echo site_url('workspace/updateHolidayCal'); ?>',
					type: 'POST',
					data: {
						action: 'ifUnchecked',
						uid: $(event.currentTarget).attr('data-uid'),
						startdate: moment($(event.currentTarget).attr('data-date'),'D MMM YYYY').format('YYYY-MM-DD HH:mm:ss'),
						viewtype:'Workspace Holiday',
						selcountry: $('#selectCountry_ws').val()
					},
					dataType: "JSON"


				});

			}).on('ifChecked', function(event){ 
				arrPublic_ws.push($(event.currentTarget).attr('data-date'));
				arrTotalHoliday_ws=arrPublic_ws.concat(arrManual_ws);
				
				updateWorkCal();

				$.ajax({
					url: '<?php echo site_url('workspace/updateHolidayCal'); ?>',
					type: 'POST',
					data: {
						action: 'ifChecked',
						uid: $(event.currentTarget).attr('data-uid'),
						startdate: moment($(event.currentTarget).attr('data-date'),'D MMM YYYY').format('YYYY-MM-DD HH:mm:ss'),
						viewtype:'Workspace Holiday',
						selcountry: $('#selectCountry_ws').val()
					},
					dataType: "JSON"


				});


			});

			getHolidayCalendar('Workspace');


		})
		.error(function(error) {
			$("#output").html("An error occurred.");
		});
	}

	function getHolidayCalendar(viewtype,_usersetid=0){
		$.ajax({
			url: '<?php echo site_url('workspace/getHolidayCal'); ?>',
			type: 'POST',
			beforeSend: function() {

			},
			data: {
				viewtype: viewtype,
				usersetid:_usersetid

			},
			dataType: "JSON",
			success : function(data) {

				if(viewtype=='Workspace'){

					$.each(data.DBHoliday,function(i,holi){

						$('.chk_ws_holidays[data-uid="'+holi.Title+'"]').prop('checked', false).iCheck('update').trigger('ifUnchecked');

					});

					arrManual_ws=[];

					$.each(data.DBManual,function(i,holim){

						var manualdates=enumerateDaysBetweenDates(moment(holim.Startdate,'YYYY-MM-DD HH:mm:ss'),moment(holim.Enddate,'YYYY-MM-DD HH:mm:ss'));
						
						arrManual_ws=arrManual_ws.concat(manualdates);

					});

					$('#total_holmanual').html(arrManual_ws.length);

					arrTotalHoliday_ws=arrPublic_ws.concat(arrManual_ws);

					updateWorkCal();

				}else{
					// person wise
					$.each(data.DBHoliday,function(i,holi){

						$('.chk_ps_holidays[data-uid="'+holi.Title+'"]').prop('checked', false).iCheck('update').trigger('ifUnchecked');

					});

					arrManual_ps=[];

					$.each(data.DBManual,function(i,holim){

						var manualdates=enumerateDaysBetweenDates(moment(holim.Startdate,'YYYY-MM-DD HH:mm:ss'),moment(holim.Enddate,'YYYY-MM-DD HH:mm:ss'));
						
						arrManual_ps=arrManual_ps.concat(manualdates);

					});

					$('#total_holmanual_ps').html(arrManual_ps.length);

					arrTotalHoliday_ps=arrPublic_ps.concat(arrManual_ps);

					updatePersonCal();
					
				}


			},
			complete: function (jqXHR, status) {


			},

			error: function (jqXHR, status, err) {
				console.log(jqXHR.responseText);console.log(status);console.log(err);
			}


		});
	}

	function getSettingsData(viewtype){

		$.ajax({
			url: '<?php echo site_url('workspace/get_settings_holiday'); ?>',
			type: 'POST',
			beforeSend: function() {
				// $('*').qtip('hide');
				// $('#div_loading').show();
			},
			data: {

				viewtype: viewtype,
				usersetid:_usersetid

			},
			dataType: "JSON",
			success : function(data) {
				console.log(viewtype+' >> DB data',data);

				if(viewtype=='Workspace'){
					$('.chk_ws_weekends').prop('checked', false).iCheck('update');

					if(data.DBdata){

						$('#hour_perday').val(data.DBdata.HoursPerDay);
						$('#selectCountry_ws').val(data.DBdata.HolidayCalendar);

						$.each(data.DBdata.Weekends.split(","),function(i,valu){

							$('.chk_ws_weekends').each(function(ii,el){
								if($(el).attr('data-name')==valu){
									$(el).prop('checked', true).iCheck('update');
								}

							});

						});

					}else{
						$('#hour_perday').val(8);
						$('#selectCountry_ws').val('bd');
					}


					$('#selectCountry_ws').trigger("change");


				}else{

					$('.chk_ps_weekends').prop('checked', false).iCheck('update');
					$('#hourlyrate_ps').val(10);
					$('#hour_perday_ps').val(8);
					$('#selectCountry_ps').val('bd');

					if(data.DBdata){
						$('#hourlyrate_ps').val(data.DBdata.HourlyRate);
						$('#hour_perday_ps').val(data.DBdata.HoursPerDay);
						$('#selectCountry_ps').val(data.DBdata.HolidayCalendar);


						$.each(data.DBdata.Weekends.split(","),function(i,valu){

							$('.chk_ps_weekends').each(function(ii,el){
								if($(el).attr('data-name')==valu){
									$(el).prop('checked', true).iCheck('update');
								}

							});

						});

					}
					$('#selectCountry_ps').trigger("change");

				}


			},
			complete: function (jqXHR, status) {




			},

			error: function (jqXHR, status, err) {
				console.log(jqXHR.responseText);console.log(status);console.log(err);
			}


		});
	}

	function getHolidaysPS(startdate,enddate){
		var tstart= moment(startdate).format('YYYY-MM-DD');
		var tend= moment(enddate).format('YYYY-MM-DD');
		var selcountry=$("#selectCountry_ps").val();

		var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/en.' +  selcountry + '%23holiday%40group.v.calendar.google.com/events?key=AIzaSyCsKVDaSG0NHGILAok4LrTXm0o_nGId2H0&timeMin='+tstart+'T00:00:00Z&timeMax='+tend+'T23:59:59Z&singleEvents=true&orderBy=startTime';
		dt_pubhol_ps.clear();
		dt_pubhol_ps.draw();

		$.getJSON(calendarUrl).success(function(data) {
			console.log('getHolidaysPS data',data);

			arrPublic_ps=[];
			$('.chk_ps_holidays').iCheck('destroy'); // person holiday toggle

			for (item in data.items) {

				arrPublic_ps.push(moment(data.items[item].start.date).format('D MMM YYYY'));
				var startdate=moment(data.items[item].start.date);
				var uid=data.items[item].id;

				var newhol='<tr>'
				+'<td><input checked="checked" data-uid="'+uid+'" data-date="'+startdate.format('D MMM YYYY')+'" class="chk_ps_holidays" type="checkbox" ></td>'
				+ '<td>'+ data.items[item].summary + '</td>'
				+ '<td>' + startdate.format('D MMM YYYY') + '</td>'
				+ '<td>'+ startdate.format('MMMM') + '</td>'
				+'</tr>';

				//$("#tbl_pubhol tbody").append(newhol);
				dt_pubhol_ps.row.add($(newhol));

			}

			dt_pubhol_ps.draw();
		

			$('.chk_ps_holidays').iCheck({
				checkboxClass: 'iradio_square-green',

			}).on('ifUnchecked', function(event){ 

				var index = arrPublic_ps.indexOf($(event.currentTarget).attr('data-date')); 
				if (index != -1) arrPublic_ps.splice(index, 1);

				arrTotalHoliday_ps=arrPublic_ps.concat(arrManual_ps);

				updatePersonCal();

				$.ajax({
					url: '<?php echo site_url('workspace/updateHolidayCal'); ?>',
					type: 'POST',
					data: {
						action: 'ifUnchecked',
						uid: $(event.currentTarget).attr('data-uid'),
						startdate: moment($(event.currentTarget).attr('data-date'),'D MMM YYYY').format('YYYY-MM-DD HH:mm:ss'),
						viewtype:'Person Holiday',
						usersetid: _usersetid,
						selcountry: $('#selectCountry_ps').val()
					},
					dataType: "JSON"

				});

			}).on('ifChecked', function(event){ 
				arrPublic_ps.push($(event.currentTarget).attr('data-date'));
				arrTotalHoliday_ps=arrPublic_ps.concat(arrManual_ps);
				updatePersonCal();

				$.ajax({
					url: '<?php echo site_url('workspace/updateHolidayCal'); ?>',
					type: 'POST',
					data: {
						action: 'ifChecked',
						uid: $(event.currentTarget).attr('data-uid'),
						startdate: moment($(event.currentTarget).attr('data-date'),'D MMM YYYY').format('YYYY-MM-DD HH:mm:ss'),
						viewtype:'Person Holiday',
						usersetid: _usersetid,
						selcountry: $('#selectCountry_ps').val()
					},
					dataType: "JSON"

				});

			});

			getHolidayCalendar('Person',_usersetid);

			
		})
		.error(function(error) {
			$("#output").html("An error occurred.");
		});
	}

	$('#selectCountry_ws').on('change',function(e){

		getHolidaysWS(moment().startOf('year'),moment().endOf('year'));


	});

	$('#selectCountry_ps').on('change',function(e){

		getHolidaysPS(moment().startOf('year'),moment().endOf('year'));


	});

	var fp_holstart_ws =$('#startdatehol_ws').flatpickr({
		//inline: true, 
		enableTime : true,
		dateFormat: 'M-d-Y H:i:S',
		clickOpens: false,
		//defaultDate: data.todo_duedate,

		onChange: function(selectedDates, dateStr, instance) {
			var sel_date=(moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
			var sel_date2=(moment(selectedDates[0]).format('MMM-DD-YYYY HH:mm:ss'));

			$('#datetimepicker_start_hval').val(sel_date);
			//$('#datetimepicker_start').val(sel_date2);

		}
	});

	var fp_holend_ws =$('#enddatehol_ws').flatpickr({
		//inline: true, 
		enableTime : true,
		dateFormat: 'M-d-Y H:i:S',
		clickOpens: false,
		//defaultDate: data.todo_duedate,

		onChange: function(selectedDates, dateStr, instance) {
			var sel_date=(moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
			//var sel_date2=(moment(selectedDates[0]).format('MMM-DD-YYYY HH:mm:ss'));

			$('#datetimepicker_end_hval').val(sel_date);
			//$('#datetimepicker_end').val(sel_date2);
			//alert(sel_date2);

		}
	});

	// person wise
	var fp_holstart_ps =$('#startdatehol_ps').flatpickr({
		//inline: true, 
		enableTime : true,
		dateFormat: 'M-d-Y H:i:S',
		clickOpens: false,
		//defaultDate: data.todo_duedate,

		onChange: function(selectedDates, dateStr, instance) {
			var sel_date=(moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
			var sel_date2=(moment(selectedDates[0]).format('MMM-DD-YYYY HH:mm:ss'));

			$('#datetimepicker_start_hval').val(sel_date);

		}
	});

	var fp_holend_ps =$('#enddatehol_ps').flatpickr({
		//inline: true, 
		enableTime : true,
		dateFormat: 'M-d-Y H:i:S',
		clickOpens: false,
		//defaultDate: data.todo_duedate,

		onChange: function(selectedDates, dateStr, instance) {
			var sel_date=(moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
			//var sel_date2=(moment(selectedDates[0]).format('MMM-DD-YYYY HH:mm:ss'));

			$('#datetimepicker_end_hval').val(sel_date);
			//$('#datetimepicker_end').val(sel_date2);
			//alert(sel_date2);

		}
	});

	function togglecalendar_startModalWS(){
		fp_holstart_ws.toggle();
	}

	function togglecalendar_endModalWS(){
		fp_holend_ws.toggle();
	}

	function togglecalendar_startModalPS(){
		fp_holstart_ps.toggle();
	}

	function togglecalendar_endModalPS(){
		fp_holend_ps.toggle();
	}

	// workspace wise weekends
	$('.chk_ws_weekends').iCheck({
		checkboxClass: 'iradio_square-green',
	}).on('ifClicked', function(event){
		setTimeout(function(){ 

			updateWorkCal();

		}, 100);

	});

	// userwise weekends
	$('.chk_ps_weekends').iCheck({
		checkboxClass: 'iradio_square-green',
	}).on('ifClicked', function(event){
		setTimeout(function(){ 

			updatePersonCal();

		}, 100);

	});

	function fun_render_calendar(viewtype){

		if(viewtype=='Workspace'){
			var view = calman_ws.fullCalendar('getView');

		}
		if(viewtype=='Person'){
			var view = calman_ps.fullCalendar('getView');
		}

		var start_date=(moment(view.intervalStart).format('YYYY-MM-DD'));
		var end_date=(moment(view.intervalEnd).format('YYYY-MM-DD'));

		$.ajax({
			url: '<?php echo site_url('workspace/getHolidaysManuCal'); ?>',
			type: 'POST',
			beforeSend: function() {
				// $('*').qtip('hide');
				// $('#div_loading').show();
			},
			data: {
				start_date: start_date,
				end_date: end_date,
				viewname: view.title,
				viewtype: viewtype,
				usersetid:_usersetid

			},
			dataType: "JSON",
			success : function(data) {
				console.log(viewtype+'calendar',data);
				if(viewtype=='Workspace'){
					calman_ws.fullCalendar( 'removeEvents' );
					calman_ws.fullCalendar('addEventSource', data);
				}else{
					calman_ps.fullCalendar( 'removeEvents' );
					calman_ps.fullCalendar('addEventSource', data);
				}


			},
			complete: function (jqXHR, status) {




			},

			error: function (jqXHR, status, err) {
				console.log(jqXHR.responseText);console.log(status);console.log(err);
			}


		});
	}

	var calman_ws=$('#calman_ws').fullCalendar({
		//theme: true,
		header: false,
		selectable: true,
		timezone: false,
		select: function(start, end, jsEvent, view) {
			end=moment(end).subtract(1, 'seconds');
			fp_holstart_ws.setDate(moment(start).format('MMM-DD-YYYY HH:mm:ss'));
			fp_holend_ws.setDate(moment(end).format('MMM-DD-YYYY HH:mm:ss'));
			$('#entryname_ws,#location_ws,#descr_ws').val('');

			$('#HolidayModalNew_ws').modal('show');

		},

		viewRender: function(view, element) { 
			fun_render_calendar('Workspace');

		}


	});

	var calman_ps=$('#calman_ps').fullCalendar({
		//theme: true,
		header: false,
		selectable: true,
		timezone: false,
		select: function(start, end, jsEvent, view) {
			end=moment(end).subtract(1, 'seconds');
			fp_holstart_ps.setDate(moment(start).format('MMM-DD-YYYY HH:mm:ss'));
			fp_holend_ps.setDate(moment(end).format('MMM-DD-YYYY HH:mm:ss'));

			$('#entryname_ps,#location_ps,#descr_ps').val('');

			$('#HolidayModalNew_ps').modal('show');

		},
		viewRender: function(view, element) { 
			fun_render_calendar('Person');

		}

	});

	var calloadtime_ws=500;
	var calloadtime_ps=500;

	$('.chk_ws_months').iCheck({
		radioClass: 'iradio_square-calendar',
	}).on('ifChecked', function(event){
		setTimeout(function(){ 
			calman_ws.fullCalendar( 'gotoDate', moment($(event.currentTarget).attr('data-name'),'MMM') );

			calloadtime_ws=0;
			updateWorkCal();
			//fun_render_calendar('Workspace');

		}, calloadtime_ws);

	});

	// personwise months
	$('.chk_ps_months').iCheck({
		radioClass: 'iradio_square-calendar',
	}).on('ifChecked', function(event){
		setTimeout(function(){ 
			calman_ps.fullCalendar( 'gotoDate', moment($(event.currentTarget).attr('data-name'),'MMM') ); 
			calloadtime_ps=0;
			updatePersonCal();
			//fun_render_calendar('Person');

		}, calloadtime_ps);

	});

	function openWorkSettings(element){

		$('#chk_ws_months_'+moment().format('MMM').toLowerCase()).iCheck('check');

		fun_render_calendar('Workspace');
		getSettingsData('Workspace');

	}

	function openUserSettings(el,userid,username){

		_usersetid=userid;
		$('#chk_ps_months_'+moment().format('MMM').toLowerCase()).iCheck('check');
		$('#personwise_setname').text(username);
		fun_render_calendar('Person');
		getSettingsData('Person');
		$('#wpset1,#wpset2').hide('slow');
		$('#wpset3').show('slow');
	}

	function closeUserSettings(el){
		$('#wpset1,#wpset2').show('slow');
		$('#wpset3').hide('slow');
	}

</script>

<script type="text/javascript">
	function savePersionSet(viewtype='manual'){
		var arrwkends=[];
		var arrwkdays=[];

		$('.chk_ps_weekends').each(function(i,el){
			if($(el).iCheck('update')[0].checked) arrwkends.push($(el).attr('data-name'));
			else arrwkdays.push($(el).attr('data-name'));
		});

		var formData = new FormData($('#form_person_set')[0]);
		formData.append('arrwkends', arrwkends.join());
		formData.append('arrwkdays', arrwkdays.join());
		formData.append('usersetid', _usersetid);

		$.ajax({
			url: "workspace/add_person_set",
			type: "POST",
			data: formData,
			async: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function (data) {
				console.log('setting >>> savePersionSet');
				console.log(data);
				if(viewtype =='manual'){swal('Settings successfully saved');}

				//location.reload();

			},
			error: function (jqXHR, textStatus, errorThrown) {
				swal('error');
				console.log(jqXHR.responseText);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

	}

	function saveWorkspaceSet(viewtype='manual'){
		var arrwkends=[];
		var arrwkdays=[];

		$('.chk_ws_weekends').each(function(i,el){
			if($(el).iCheck('update')[0].checked) arrwkends.push($(el).attr('data-name'));
			else arrwkdays.push($(el).attr('data-name'));
		});

		var formData = new FormData($('#form_workspace_set')[0]);
		formData.append('arrwkends', arrwkends.join());
		formData.append('arrwkdays', arrwkdays.join());

		$.ajax({
			url: "workspace/add_workspace_set",
			type: "POST",
			data: formData,
			async: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function (data) {
				console.log('setting add');
				console.log(data);
				if(viewtype =='manual'){swal('Settings successfully saved');}
				
				//location.reload();

			},
			error: function (jqXHR, textStatus, errorThrown) {
				swal('error');
				console.log(jqXHR.responseText);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

	}

	function saveHolidayPS(el){
		var formData = new FormData($('#form_holiday_ps')[0]);

		var startdate=moment($('#startdatehol_ps').val(),'MMM-DD-YYYY HH:mm:ss');
		var enddate=moment($('#enddatehol_ps').val(),'MMM-DD-YYYY HH:mm:ss');
		formData.append('startdatehol_ps', startdate.format('YYYY-MM-DD HH:mm:ss'));
		formData.append('enddatehol_ps', enddate.format('YYYY-MM-DD HH:mm:ss'));
		formData.append('usersetid', _usersetid);

		$.ajax({
			url: "workspace/add_holiday_ps",
			type: "POST",
			data: formData,
			async: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function (data) {
				console.log('holiday add');
				console.log(data);

				$('#HolidayModalNew_ps').modal('hide');
				fun_render_calendar('Person');
				getSettingsData('Person');


				//location.reload();

			},
			error: function (jqXHR, textStatus, errorThrown) {
				swal('error');
				console.log(jqXHR.responseText);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
</script>

<script type="text/javascript">
	

	function saveHolidayWS(el){
		var formData = new FormData($('#form_holiday_ws')[0]);

		var startdate=moment($('#startdatehol_ws').val(),'MMM-DD-YYYY HH:mm:ss');
		var enddate=moment($('#enddatehol_ws').val(),'MMM-DD-YYYY HH:mm:ss');
		formData.append('startdatehol_ws', startdate.format('YYYY-MM-DD HH:mm:ss'));
		formData.append('enddatehol_ws', enddate.format('YYYY-MM-DD HH:mm:ss'));


		$.ajax({
			url: "workspace/add_holiday_ws",
			type: "POST",
			data: formData,
			async: false,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function (data) {
				console.log('holiday add');
				console.log(data);

				$('#HolidayModalNew_ws').modal('hide');
				fun_render_calendar('Workspace');
				getSettingsData('Workspace');

				//location.reload();

			},
			error: function (jqXHR, textStatus, errorThrown) {
				swal('error');
				console.log(jqXHR.responseText);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
</script>