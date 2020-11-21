	<div id="wpset3" style="display: none" class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="overflow: auto;">
				<span>Person wise setting</span> of 
				<span style="font-weight: bold;" id="personwise_setname"></span>

				<i style="float: right;" onclick="closeUserSettings(this)" class="fa fa-times hvr-glow clasI" aria-hidden="true"
				"></i>


			</div>
			<div class="panel-body">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-10">
					<form id="form_person_set" class="form-horizontal">
						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Hourly rate</label>
							<div class="col-sm-10"> 
								<input onchange="updatePerCal()" type="number" class="form-control" id="hourlyrate_ps" name="hourlyrate_ps" value="10">
							</div>

						</div>
						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Default hours per day:</label>
							<div class="col-sm-10"> 
								<input onchange="updatePerCal()" type="number" class="form-control" id="hour_perday_ps" name="hour_perday_ps" value="10">
							</div>
						</div>
						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Define Weekends:</label>
							<div class="col-sm-10"> 

								<label class="col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Sun" class="chk_ps_weekends" type="checkbox" >
									Sun
								</label>
								<label class="col-sm-1"  style="padding: 0px;width: 14%">
									<input data-name="Mon" class="chk_ps_weekends" type="checkbox" >
									Mon
								</label>
								<label class="col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Tue" class="chk_ps_weekends" type="checkbox" >
									Tue
								</label>
								<label class="col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Wed" class="chk_ps_weekends" type="checkbox" >
									Wed
								</label>
								<label class=" col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Thu" class="chk_ps_weekends" type="checkbox" >
									Thu
								</label>
								<label class="col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Fri" class="chk_ps_weekends" type="checkbox" >
									Fri
								</label>
								<label class=" col-sm-1" style="padding: 0px;width: 14%">
									<input data-name="Sat" class="chk_ps_weekends" type="checkbox" >
									Sat
								</label>

							</div>
						</div>
						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Import Holidays</label>
							<div class="col-sm-10"> 
								<select name="selectCountry_ps" class="select2" id="selectCountry_ps">
									<option value="bd">Bangladeshi Holidays</option>

									<option value="australian">Australian Holidays</option>
									<option value="austrian">Austrian Holidays</option>


									<option value="brazilian">Brazilian Holidays</option>
									<option value="canadian">Canadian Holidays</option>
									<option value="china">China Holidays</option>

									<option value="danish">Danish Holidays</option>
									<option value="dutch">Dutch Holidays</option>
									<option value="finnish">Finnish Holidays</option>
									<option value="french">French Holidays</option>
									<option value="german">German Holidays</option>
									<option value="greek">Greek Holidays</option>
									<option value="hong_kong">Hong Kong Holidays</option>
									<option value="indian">Indian Holidays</option>
									<option value="indonesian">Indonesian Holidays</option>

									<option value="irish">Irish Holidays</option>

									<option value="italian">Italian Holidays</option>
									<option value="japanese">Japanese Holidays</option>
									<option value="jewish">Jewish Holidays</option>
									<option value="malaysia">Malaysian Holidays</option>
									<option value="mexican">Mexican Holidays</option>
									<option value="new_zealand">New Zealand Holidays</option>
									<option value="norwegian">Norwegian Holidays</option>
									<option value="philippines">Philippines Holidays</option>
									<option value="polish">Polish Holidays</option>
									<option value="portuguese">Portuguese Holidays</option>
									<option value="russian">Russian Holidays</option>
									<option value="singapore">Singapore Holidays</option>
									<option value="sa">South Africa Holidays</option>
									<option value="south_korea">South Korean Holidays</option>
									<option value="spain">Spain Holidays</option>
									<option value="swedish">Swedish Holidays</option>
									<option value="taiwan">Taiwan Holidays</option>

									<option value="uk">UK Holidays</option>
									<option value="usa">US Holidays</option>
									<option value="vietnamese">Vietnamese Holidays</option>


								</select>


							</div>
						</div>
						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Delete Option</label>
							<div class="col-sm-10"> 
								<table id="tbl_pubhol_ps" class="table table-striped table-hover table-condensed" style="width: 100%">
									<thead >
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th></th>

										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>


							</div>

						</div>

						<div class="form-group">
							<div style="padding: 0px" class="col-sm-2"></div>
							<div class="col-sm-10">

							</div>

						</div>

						<div class="form-group">
							<label style="padding: 0px" class="control-label col-sm-2">Add a holiday Manually</label>

							<div class="col-sm-10"> 

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Jan" id="chk_ps_months_jan" class="chk_ps_months" name="rdo_ps_months" type="radio" > Jan
								</label>

								<label class="icon-cal col-sm-1"  style="padding: 0px;width: 8%">
									<input data-name="Feb" id="chk_ps_months_feb" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Feb
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Mar" id="chk_ps_months_mar" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Mar
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Apr" id="chk_ps_months_apr" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Apr
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="May" id="chk_ps_months_may" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									May
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Jun" id="chk_ps_months_jun" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Jun
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Jul" id="chk_ps_months_jul" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Jul
								</label>

								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Aug" id="chk_ps_months_aug" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Aug
								</label>
								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Sep" id="chk_ps_months_sep" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Sep
								</label>
								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Oct" id="chk_ps_months_oct" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Oct
								</label>
								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Nov" id="chk_ps_months_nov" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Nov
								</label>
								<label class="icon-cal col-sm-1" style="padding: 0px;width: 8%">
									<input data-name="Dec" id="chk_ps_months_dec" class="chk_ps_months" name="rdo_ps_months" type="radio" >
									Dec
								</label>

							</div>

						</div>

						<div class="form-group">
							<div style="padding: 0px" class="col-sm-2"></div>
							<div class="col-sm-10">
								<div id='calman_ps'></div>
							</div>

						</div>

						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<button onclick="savePersionSet()" type="button" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>

				<div style="background: #ccc" class="col-xs-12 col-sm-5 col-md-5 col-lg-2">
					<hr>
					<div>
						Hourly rate:
						<label id="hourly_rate_ps"></label>
					</div>

					<hr>
					<div>
						Total hour per day:
						<label id="total_dayhour_ps"></label>
					</div>
					<hr>
					<div>
						Total weekends:
						<label id="total_weekends_ps"></label>
					</div>
					<hr>
					<div>
						Holiday Calendar:
						<label id="holcal_name_ps"></label>
					</div>
					<hr>
					<div>
						Total Public Holiday:
						<label id="total_holpublic_ps"></label>
					</div>
					<hr>
					<div>
						Total Manual Holiday:
						<label id="total_holmanual_ps"></label>
					</div>
					<hr>
					<div>
						Total Working Day:
						<label id="total_workday_ps"></label>
					</div>
					<hr>
					<div>
						Total Working Hour:
						<label id="total_workhour_ps"></label>
					</div>
					<hr>
				</div>

		</div>
	</div>
</div>

<div id="HolidayModalNew_ps" class="modal fade" tabindex='-1'>

	<div class="modal-dialog" >

		<div class="modal-content">

			<div class="modal-header" style="">
				<button type="button" class="close close-entryform  size-family-weight" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title size-family-weight" id="myModalLabel_ps">New User Holiday</h4>
			</div>
			<div class="modal-body">

				<form id="form_holiday_ps" class="form-horizontal">

					<div class="form-group">
						<label class="control-label col-sm-2 size-family-weight" for="entryname">Title:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control size-family-weight proTaskarea" id="entryname_ps" name="entryname_ps" placeholder="Type Title here...">
						</div>

					</div>

					<div class="form-group">
						<label class="control-label col-sm-2 size-family-weight" for="location">Location:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control size-family-weight proTaskarea" id="location_ps" name="location_ps" placeholder="Type Location here...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2 size-family-weight">Start:</label>
						<div class="col-sm-10">
							<li class="ddm-duecalendar" style="display:inline">
								<input class="dropdown-toggle dd-link form-control proTaskarea" id="startdatehol_ps" type="text" onclick="togglecalendar_startModalPS()">

							</li>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2 size-family-weight">End:</label>
						<div class="col-sm-10">
							<li class="ddm-duecalendar" style="display:inline">
								<input class="dropdown-toggle dd-link form-control proTaskarea" id="enddatehol_ps" type="text" onclick="togglecalendar_endModalPS()">

							</li>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2 size-family-weight" for="descr">Description:</label>
						<div class="col-sm-10">
							<input class="form-control size-family-weight proTaskarea" id="descr_ps" name="descr_ps" placeholder="Enter Description">
						</div>
					</div>

				</form>


			</div>

			<div class="modal-footer">
				<button onclick="saveHolidayPS(this)" id="submit_full_form_ps" type="button" class="btn btn-primary">Create</button>

				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				
			</div>

		</div>

	</div>
</div>

