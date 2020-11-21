<?php $this->load->view('Partial/pageHeader'); ?>
<!-- Content Wrapper. Contains page content -->
<style>
.add-border-bottom{
	border-bottom:1px solid #ddd;
	padding-bottom:15px
}
[id^="ekkoLightbox"] {
	z-index:100000000 !important;
	padding-right: 135px !important;
}
.modal-dialog{
	margin: 100px auto !important;
	width: 662px !important;
	height: 650px !important;
	max-width: 662px !important;
}
.select2-dropdown {
	z-index: 1000000000 !important;
}
[id^="listview_"] {
	display: none;
}
[id^="gridview_"] {
	display: block;
}
.info_details{
	color:black !important;
}
.info_1strow{
	border-bottom-style: groove;padding:5px;cursor: pointer;
}
.box-title{
	color: #798281 !important;
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
.fa-search{
	color: #3C8DBC !important
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
.settingsDiv {
	color: #000000;
	background-color: #FFFFFF;
	border: 2px solid #E0E0E0;
	display: none;
	text-align: justify;
	position: fixed;
	top: 7%;
	right: 0px;
	z-index: 100;
	width: 46%;
	height: auto;
	min-height: 55%;
}
.settingsDiv p {
	margin-left: 15px;
	font-size: 0.917em;
}
.tag{
	border: 2px solid #FEFF00;
	width: 25px;
	height: 25px;
	border-radius: 50% !important;
	vertical-align: middle;
	margin: 0px -10px 10px 0px;

}

.tagAs{
	border: 2px solid #00a65a;
	width: 40px;
	height: 40px;
	border-radius: 50% !important;
	vertical-align: middle;
	margin: 0px -10px 10px 0px;

}
.info_details{
	color: black !important;
	white-space: nowrap;
	overflow: hidden !important;
	text-overflow: ellipsis;
}

</style>
<div class="content-wrapper">
	<input id="cur_accountid" type="hidden" value="<?php echo $accid; ?>">
	<input id="cur_accountname" type="hidden" value="<?php echo $account_name[0]->accountname; ?>">
	
	<div class="row">
		<div class="col-lg-12" style="background-color: #0C4C71;height: 50px;">
			<div class="col-lg-3">
				<ul class="nav navbar-nav">
					
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu" id="notificationDiv">
						<a href="#" onclick="history.go(-1);">
							<i class="fa fa-arrow-left"></i></a>
						</li>
						<li>
							<a href="<?php echo base_url()."yzy-accounts/index/account_details/".$accid; ?>"><?php echo $account_name[0]->accountname; ?></a>
						</li>
					</ul>
				</div>
				<div class="col-lg-5">
					<ul class="nav navbar-nav nav-margin">
						<li class="dropdown notifications-menu"> 
							<a class="font-color-family" href="<?php echo base_url()."yzy-contacts/index/contact/account/".$accid; ?>">Contacts</a>
						</li>
						<li class="dropdown notifications-menu">
							<a class="font-color-family" href="<?php echo base_url()."yzy-potentials/index/potential/account/".$accid; ?>">Potentials</a>
						</li>
						<li class="dropdown notifications-menu">
							<a class="font-color-family" href="<?php echo base_url()."yzy-quotes/index/quote/account/".$accid; ?>">Quotes</a>
						</li>
						<li class="dropdown notifications-menu">
							<a class="font-color-family" href="<?php echo base_url()."yzy-invoices/index/invoice/account/".$accid; ?>">Invoices</a>
						</li>
						<li class="dropdown notifications-menu">
							<a  class="font-color-family" href="<?php echo base_url()."yzy-services/index/service/account/".$accid; ?>">Services</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-4 pull-right" style="margin: 10px 0 0 0;">
					<button onclick="oDiv(<?php echo $allAccounts[0]->accountid; ?>)" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-gear"></i>  Settings</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-user"></i> 5</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-wechat"></i>  Account Chat</button>
					
					
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" style="background-color: #fff;height: 50px;">
				<div class="col-lg-1 p-l-d">
					<b class="text-center ">All Associated</b>
				</div>
				<div class="col-lg-6" style="margin-top: 10px;">
					<div class="col-lg-9">
						<span class="cusSpan">Sort by</span>
						<select class="form-control3 gridStyle" onchange="window.location.href='<?php echo site_url("yzy-accounts/index/account"); ?>'+'/'+$(this).val()">
							<option value="">Select</option>
							<option value="accountname">Name</option>
							<option value="last_update">Last Updated</option>
						</select>
					</div>
					<button class="btn btn-primary btn-sm gridStyle active" id="switchGrid" data-view="grid" style="margin-right: 5px;"><i class="fa fa-th-large"></i></button>
					<button class="btn btn-primary btn-sm gridStyle" id="switchList" data-view="list" style="margin-right: 5px;"><i class="fa fa-list"></i></button>
					<button class="btn btn-primary btn-sm gridStyle" id="switchTable" data-view="table" style="margin-right: 5px;"><i class="fa fa-table"></i></button>
				</div>
				<div class="col-lg-3" style="margin: 10px 0 0 0;">
					<div class="input-group iga2">
						<span class="input-group-addon" style="border-color: none;background-color: none"><i class="fa fa-search"></i></span>
						<input type="text" onkeyup="searchBox(this.value)" class="form-control formcc" placeholder="Search">
					</div>	
				</div>


			</div>
		</div>

		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12" style="background: #F1F1F1;height: auto; min-height: 900px;">
					<div class="row">

						<div class="col-lg-12">&nbsp;</div>
						<div class="col-lg-12">
							<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">

								<div class="box-body border-radius-none" style="display: block;">
									<div class="col-lg-12" id="myTaskDiv2">
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Contacts</h3>
													</span>
												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">
														<a data-toggle="lightbox" data-title="Add New Contact" href="<?php echo base_url()."yzy-accounts/index/viewAddContacts"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;width: 100px;"><i class="fa fa-plus"></i> New Contact</a>
													</div>
													<div id="listview_contacts" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	
																	<th>Last Name</th>
																	<th>First Name</th>
																	<th>Title</th>
																	<th>Account Name</th>
																	<th>Email</th>
																	<th>Office Phone</th>
																	<th>Assigned To</th>

																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody>
																<?php if(isset($allContacts) AND $allContacts != "") foreach($allContacts as $value){?>
																<tr style="text-align:left;">
																	<td><?php echo $value->lastname;?></td>
																	<td><?php echo $value->firstname;?></td>
																	<td><?php echo $value->title;?></td>
																	<td><a href="#"><?php echo $value->accountname;?></a></td>
																	<td><?php echo $value->email;?></td>
																	<td><?php echo $value->phone;?></td>
																	<td><?php echo preg_replace('/[\x00-\x1D]/', ',', $value->member_names);?></td>
																	<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDiv('<?php echo $value->accountid;?>')"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>

													<div class="col-lg-12" id="gridview_contacts" style="padding-left: 0px;"></div>
													
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Potentials</h3>
													</span>

												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">

														<a data-toggle="lightbox" data-title="Add New Potential" href="<?php echo base_url()."yzy-accounts/index/viewAddPotentials"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;width: 100px;"><i class="fa fa-plus"></i> New Potential</a>
													</div>

													<div id="listview_potentials" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Potential</th>
																	<th>Related To</th>
																	<th>Sales Stage	</th>
																	<th>Amount (In $)</th>
																	<th>Expected Close Date</th>
																	<th>Assigned To</th>

																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody >
																<?php foreach($allPotentials as $value){?>
																<tr style="text-align:left;">
																	<td><a href=""><?php echo $value->potentialname;?></a></td>
																	<td><a href=""><?php echo $value->related_to;?></a></td>
																	<td><?php echo $value->sales_stage;?></td>
																	<td><?php echo $value->amount;?></td>
																	<td><?php echo $value->closingdate;?></td>
																	<td><?php echo preg_replace('/[\x00-\x1D]/', ',', $value->member_names);?></td>
																	
																	<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDivPot(<?php echo $value->potentialid; ?>)"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-12" id="gridview_potentials" style="padding-left: 0px;"></div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Quotes</h3>
													</span>

												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">
														<a data-toggle="lightbox" data-title="Add New Quotes" href="<?php echo site_url()."yzy-accounts/index/viewAddQuotes"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;width: 100px;"><i class="fa fa-plus"></i> New Quote</a>
													</div>
													<div id="listview_quotes" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Quote No</th>
																	<th>Subject</th>
																	<th>Quote Stage</th>
																	<th>Potential Name</th>
																	<th>Account Name</th>
																	<th>Total</th>
																	<th>Assigned To</th>

																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody >
																<?php foreach($allQuotes as $value){?>
																<tr style="text-align:left;">
																	<td><a href=""><?php echo $value->quoteid;?></a></td>
																	<td><a href=""><?php echo $value->subject;?></a></td>
																	<td><?php echo $value->quotestage;?></td>
																	<td><?php echo $value->potentialname_db;?></td>
																	<td><a href=""><?php echo $value->accountname;?></a></td>
																	<td><?php echo $value->total;?></td>
																	<td><?php echo preg_replace('/[\x00-\x1D]/', ',', $value->member_names);?></td>
																	<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDivPot(<?php echo $value->potentialid; ?>)"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-12" id="gridview_quotes" style="padding-left: 0px;"></div>
												</div>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Invoice</h3>
													</span>

												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">
														<a data-toggle="lightbox" data-title="Add New Invoice" href="<?php echo site_url()."yzy-accounts/index/viewAddInvoices"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;width: 100px;"><i class="fa fa-plus"></i> New Invoice</a>
													</div>
													<div id="listview_invoice" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Invoice No</th>
																	<th>Subject</th>
																	<th>Status</th>
																	<th>Total</th>
																	<th>Assigned To</th>


																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody >
																<?php foreach($allInvoices as $value){?>
																<tr style="text-align:left;">
																	<td><a href=""><?php echo $value->invoiceid;?></a></td>
																	<td><a href=""><?php echo $value->subject;?></a></td>
																	<td><?php echo $value->invoicestatus;?></td>
																	<td><?php echo $value->total;?></td>
																	<td><?php echo preg_replace('/[\x00-\x1D]/', ',', $value->member_names);?></td>

																	<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDivPot(<?php echo $value->invoiceid; ?>)"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-12" id="gridview_invoice" style="padding-left: 0px;"></div>
												</div>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Services</h3>
													</span>

												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">
														<a data-toggle="lightbox" data-title="Add New Services" href="<?php echo site_url()."yzy-accounts/index/viewAddServices"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;width: 100px;"><i class="fa fa-plus"></i> New Service</a>
													</div>
													<div id="listview_service" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Service No</th>
																	<th>Service Name</th>
																	<th>Commission Rate (%)</th>
																	<th>No of Units</th>
																	<th>Price</th>

																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody>
																<?php foreach($allServices as $value){?>
																<tr style="text-align:left;">
																	<td><a href=""><?php echo $value->serviceid;?></a></td>
																	<td><a href=""><?php echo $value->servicename;?></a></td>
																	<td><a href=""><?php echo $value->commissionrate;?></a></td>
																	<td><a href=""><?php echo $value->qty_per_unit;?></a></td>
																	<td><a href=""><?php echo $value->unit_price;?></a></td>

																	<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDivPot(<?php echo $value->serviceid; ?>)"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-12" id="gridview_service" style="padding-left: 0px;"></div>
												</div>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
													<i class="fa fa-arrow-up"></i>
													<span style="margin-left: 5px;">
														<h3 class="box-title">Projects</h3>
													</span>

												</div>
												<div class="box-body border-radius-none" style="display: block;">
													<div style="position: absolute; right: 10px; margin-top: -45px;">
														<!-- <a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a> -->
													</div>
													<div id="listview_project" class="table-responsive" style="background: #FFF; color:#000;">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Project Name</th>
																	<th>Start Date</th>
																	<th>Status</th>
																	<th>Type</th>
																	<th>Assigned To</th>

																	<!--<th style="text-align:center;">Action</th>-->
																</tr>
															</thead>
															<tbody id="projectListView">
																<?php foreach($allProjects as $value){?>
																<tr style="text-align:left;">
																	<td><a href=""><?php echo $value->projectname;?></a></td>
																	<td><a href=""><?php echo $value->startdate;?></a></td>
																	<td><a href=""><?php echo $value->projectstatus;?></a></td>
																	<td><a href=""><?php echo $value->projecttype;?></a></td>
																	<td><?php echo preg_replace('/[\x00-\x1D]/', ',', $value->member_names);?></td>


																</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-12" id="gridview_project" style="padding-left: 0px;"></div>
												</div>
											</div>
										</div>

									</div> 
								</div><!-- /.box-body -->

							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div><!-- /.content-wrapper -->
	<?php $this->load->view('Partial/pageFooter'); ?>


	<script type="text/javascript">
	var user_id = "<?php echo $id; ?>";
	var ci_baseurl="<?php echo site_url(); ?>";
	start_count=0;
	load_count=8;
//$( document ).ready(function() {
	var timeout;
	$(window).on("scroll", function() {
		clearTimeout(timeout);  
		timeout = setTimeout(function() {
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();
			if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
				start_count+=8;
				load_count+=8;
				load_content(start_count,load_count);
			}
		}, 50);
	});
	$.ajax({
		url: '<?php echo site_url(); ?>yzy-accounts/index/getaccountsfull/'+load_count+'/<?php echo $accid; ?>',
		dataType: "JSON",
		beforeSend: function () {
			console.log("Emptying");
		},
		success: function (data, textStatus) {
			console.log("datafffffffffff");
			console.log(data);
			full_data=data;
			load_content(start_count,load_count);

		},
		error: function (jqXHR, textStatus, errorThrown) {
					// Some code to debbug e.g.:               
					console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
				}
			});
	
	function load_content(start_count,load_count){

		if($( "#switchGrid" ).hasClass( "active" )){divtag="tagAs";divwidth="23%";divheight="200px";divcol="";divhr='<hr style="display:block" class="hr_show">';}
		if($( "#switchList" ).hasClass( "active" )){divtag="tag";divwidth="100%";divheight="85px";divcol="col-lg-3";divhr='<hr style="display:none" class="hr_show">';}


		$.each(full_data, function( index, value ) {
			
			if (start_count <= index  && index < load_count){
				if("dataofcontact" in full_data[index]){
					var str = '<div onclick="oDiv(\''+value.contactid+'\')" class="likeIT col-lg-3" id="'+value.contactDivid+'" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
					// start full info row
					str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.lastname +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>Title: </b><span id="divdata_title">'+ value.title +' </span></div>';
							str +='<div class="info_details '+divcol+'"><b>Mobile: </b><span id="divdata_mobile">'+ value.mobile+' </span></div>';
							str +='<div class="info_details '+divcol+'"><b>Email: </b>  <a title="'+value.email+'" class="divdata_email" href="mailto:'+value.email+'">'+value.email+'</a></div>';
							// start detail info row

							str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row

					if(value.member_imgs !=null){
						var tag_imgs=value.member_imgs.split(String.fromCharCode(0x1D));
						var tag_disnames=value.member_names.split(String.fromCharCode(0x1D));
						// start tag row
						str +='<div id="tag'+value.contactDivid+'" class="col-lg-12 pull-right" style="text-align: right;" >';
						
						$.each(tag_imgs, function (key, value) {
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+tag_imgs[key]+'" alt="'+tag_disnames[key]+'" Title="'+tag_disnames[key]+'" class="online '+divtag+'">';
						});
						
						str +='</div>';
					// end tag row
				}

				str+='</div>';

				$("#gridview_contacts").append(str);
			}

			if("dataofpotential" in full_data[index]){
				var str = '<div onclick="oDiv(\''+value.potentialid+'\')" class="likeIT col-lg-3" id="'+value.Divid+'" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
				
				

		// start full info row
		str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.potentialname +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>Sales Stage: </b>'+ value.sales_stage +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Close Date: </b>'+ value.closingdate+' </div>';
							str +='<div class="info_details '+divcol+'"><b>Amount: </b>'+value.amount +' </div>';
							// start detail info row

							str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row


					if(value.member_imgs !=null){
						var tag_imgs=value.member_imgs.split(String.fromCharCode(0x1D));
						var tag_disnames=value.member_names.split(String.fromCharCode(0x1D));
						// start tag row
						str +='<div id="tag'+value.Divid+'" class="col-lg-12 pull-right" style="text-align: right;" >';
						
						$.each(tag_imgs, function (key, value) {
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+tag_imgs[key]+'" alt="'+tag_disnames[key]+'" Title="'+tag_disnames[key]+'" class="online '+divtag+'">';
						});
						
						str +='</div>';
					// end tag row
				}

				str+='</div>';

				$("#gridview_potentials").append(str);
			}
			if("dataofquote" in full_data[index]){



				var str = '<div onclick="oDiv(\''+value.quoteid+'\')" class="likeIT col-lg-3" id="'+value.Divid+'" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
					// start full info row
					str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.subject +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>Sales Stage: </b>'+ value.quotestage +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Close Date: </b>'+ value.carrier+' </div>';
							str +='<div class="info_details '+divcol+'"><b>Amount: </b>'+value.shipping +' </div>';
		// start detail info row

		str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row

					if(value.member_imgs !=null){
						var tag_imgs=value.member_imgs.split(String.fromCharCode(0x1D));
						var tag_disnames=value.member_names.split(String.fromCharCode(0x1D));
						// start tag row
						str +='<div id="tag'+value.contactDivid+'" class="col-lg-12 pull-right" style="text-align: right;" >';
						
						$.each(tag_imgs, function (key, value) {
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+tag_imgs[key]+'" alt="'+tag_disnames[key]+'" Title="'+tag_disnames[key]+'" class="online '+divtag+'">';
						});
						
						str +='</div>';
					// end tag row
				}

				str+='</div>';


				$("#gridview_quotes").append(str);
			}
			if("dataofinvoice" in full_data[index]){

				

				var str = '<div onclick="oDiv(\''+value.invoiceid+'\')" class="likeIT col-lg-3" id="'+value.Divid+'" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
					// start full info row
					str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.subject +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>Status: </b>'+ value.invoicestatus +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Invoice Date: </b>'+ value.invoicedate+' </div>';
							str +='<div class="info_details '+divcol+'"><b>Due Date: </b>'+value.duedate +' </div>';
							// start detail info row

							str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row

					if(value.member_imgs !=null){
						var tag_imgs=value.member_imgs.split(String.fromCharCode(0x1D));
						var tag_disnames=value.member_names.split(String.fromCharCode(0x1D));
						// start tag row
						str +='<div id="tag'+value.contactDivid+'" class="col-lg-12 pull-right" style="text-align: right;" >';
						
						$.each(tag_imgs, function (key, value) {
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+tag_imgs[key]+'" alt="'+tag_disnames[key]+'" Title="'+tag_disnames[key]+'" class="online '+divtag+'">';
						});
						
						str +='</div>';
					// end tag row
				}

				str+='</div>';
				
				$("#gridview_invoice").append(str);
			}
			if("dataofservice" in full_data[index]){

				

				var str = '<div onclick="oDiv(\''+value.serviceid+'\')" class="likeIT col-lg-3" id="'+value.Divid+'" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
					// start full info row
					str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.servicename +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>VAT: </b>'+ value.tax_vat +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Sales: </b>'+ value.tax_sales+' </div>';
							str +='<div class="info_details '+divcol+'"><b>Service: </b>'+value.tax_service +' </div>';
							// start detail info row

							str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row

					

					str+='</div>';
					
					$("#gridview_service").append(str);
				}
				if("dataofproject" in full_data[index]){

					

					var str = '<div onclick="oDiv(\''+value.projectid+'\')" class="likeIT col-lg-3" style="width:'+divwidth+';min-height:'+divheight+';border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
					// start full info row
					str +='<div class="row" style="padding: 10px;">';

						// start main info row
						str +='<div class="col-lg-10">';

							// start title info row
							str +='<div class="info_name_img '+divcol+'">';
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+value.createdby_img+'" width="30px" height="30px" style="border-radius:4px;">';
							str +='<span class="item_title"><span id="divdata_name">'+ value.projectname +'</span></span>';
							str +='</div>';
							// end title info row
							
							str +=divhr;
							
							// start detail info row   
							str +='<div class="info_details '+divcol+'"><b>Type: </b>'+value.projecttype +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Start Date: </b>'+ value.startdate +' </div>';
							str +='<div class="info_details '+divcol+'"><b>Status: </b>'+ value.proCurSta+' </div>';
							// start detail info row

							str +='</div>';
						// end main info row

						str +='</div>';
					// end full info row

					if(value.member_imgs !=null){
						var tag_imgs=value.member_imgs.split(String.fromCharCode(0x1D));
						var tag_disnames=value.member_names.split(String.fromCharCode(0x1D));
						// start tag row
						str +='<div id="tag'+value.contactDivid+'" class="col-lg-12 pull-right" style="text-align: right;" >';
						
						$.each(tag_imgs, function (key, value) {
							str +='<img src="<?php echo base_url(); ?>require/dist/img/'+tag_imgs[key]+'" alt="'+tag_disnames[key]+'" Title="'+tag_disnames[key]+'" class="online '+divtag+'">';
						});
						
						str +='</div>';
					// end tag row
				}

				str+='</div>';
				
				$("#gridview_project").append(str);
			}
		}

	});


}

$("#switchGrid").click(function(e){ 

	$("#listview_contacts").hide();
	$("#gridview_contacts").show();

	$("#listview_potentials").hide();
	$("#gridview_potentials").show();

	$("#listview_quotes").hide();
	$("#gridview_quotes").show();

	$("#listview_invoice").hide();
	$("#gridview_invoice").show();

	$("#listview_service").hide();
	$("#gridview_service").show();

	$("#listview_project").hide();
	$("#gridview_project").show();
	$(".gridStyle").removeClass('active');
	$(this).addClass('active');

	$(".likeIT").css('min-height', '200px');
	$(".likeIT").animate({"width": "23%"}, "slow");
	$(".online").removeClass('tag').addClass('tagAs');

	$(".info_details").removeClass( "col-lg-3" );
	$(".info_name_img").removeClass( "col-lg-3" );
	$( ".hr_show" ).show();

});
$("#switchList").click(function(e){

	$("#listview_contacts").hide();
	$("#gridview_contacts").show();

	$("#listview_potentials").hide();
	$("#gridview_potentials").show();

	$("#listview_quotes").hide();
	$("#gridview_quotes").show();

	$("#listview_invoice").hide();
	$("#gridview_invoice").show();

	$("#listview_service").hide();
	$("#gridview_service").show();

	$("#listview_project").hide();
	$("#gridview_project").show();
	$(".gridStyle").removeClass('active');
	$(this).addClass('active');

	$(".likeIT").css('min-height', '85px');
	$(".likeIT").animate({"width": "100%"}, "slow");
	$(".online").removeClass('tagAs').addClass('tag');

	$(".info_details").addClass( "col-lg-3" );
	$(".info_name_img").addClass( "col-lg-3" );
	$( ".hr_show" ).hide();

});

$("#switchTable").click(function(e){ 
	$("#listview_contacts").show();
	$("#gridview_contacts").hide();

	$("#listview_potentials").show();
	$("#gridview_potentials").hide();

	$("#listview_quotes").show();
	$("#gridview_quotes").hide();

	$("#listview_invoice").show();
	$("#gridview_invoice").hide();

	$("#listview_service").show();
	$("#gridview_service").hide();

	$("#listview_project").show();
	$("#gridview_project").hide();
	$(".gridStyle").removeClass('active');
	$(this).addClass('active');

});


//});

</script>




