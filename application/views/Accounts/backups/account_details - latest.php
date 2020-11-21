<?php $this->load->view('Partial/pageHeader'); ?>
<!-- Content Wrapper. Contains page content -->
<style>
.add-border-bottom{
	border-bottom:1px solid #ddd;
	padding-bottom:15px
}
[id^="ekkoLightbox"] {
	z-index:100000000 !important;
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
.formcc{
	background-color: #3C8DBC !important;
	color: #FFFFFF !important;
}
.iga2{
	background-color: none!important;
}
::-webkit-input-placeholder {
	color: #FFFFFF !important;
}

:-moz-placeholder { /* Firefox 18- */
	color: #FFFFFF !important;  
}

::-moz-placeholder {  /* Firefox 19+ */
	color: #FFFFFF !important;  
}

:-ms-input-placeholder {  
	color: #FFFFFF !important;  
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
</style>
<div class="content-wrapper">
	
	<div class="row">
		<div class="col-lg-12" style="background-color: #1f5c87;height: 50px;">
			<div class="col-lg-3">
				<ul class="nav navbar-nav">
					
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu" id="notificationDiv">
						<a href="#" onclick="history.go(-1);">
							<i class="fa fa-arrow-left"></i></a>
						</li>
						<li>
							<a href="#" style="font-size: 16px;color:#fff"><?php echo $allAccounts[0]->accountname; ?></a>
						</li>
					</ul>
				</div>
				<div class="col-lg-5">
					<ul class="nav navbar-nav">
						<li class="dropdown notifications-menu"> 
							<a href="<?php echo base_url()."yzy-contacts/index/contact/account/".$accid; ?>" style="font-size: 16px;color:#fff">Contacts</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-potentials/index/potential/account/".$accid; ?>" style="font-size: 16px;color:#fff">Potentials</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-quotes/index/quote/account/".$accid; ?>" style="font-size: 16px;color:#fff">Quotes</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-invoices/index/invoice/account/".$accid; ?>" style="font-size: 16px;color:#fff">Invoices</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-services/index/service/account"; ?>" style="font-size: 16px;color:#fff">Services</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-4 pull-right" style="margin: 10px 0 0 0;">
					<button onclick="oDiv(<?php echo $allAccounts[0]->accountid; ?>)" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-gear"></i>  Settings</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-user"></i> 5</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-wechat"></i>  Account Chat</button>
					<button class="btn btn-primary btn-sm" id="switchView" data-view="grid" style="margin-right: 5px;"><i class="fa  fa-th-large"></i></button>
				</div>

			</div>
		</div>
		<div class="row" style="display:none">
			<div class="col-lg-12" style="background-color: #F1F1F1;height: 50px;">
				<div class="col-lg-6 p-l-d2">
					<div class="col-lg-2">
						<select class="form-control4" onchange="getpriolist($(this).val())">
							<option value="High">All</option>
							<option value="High">Assigned to me</option>
							<option value="High">Created by me</option>
							<option value="High">Following</option>
						</select>
					</div>
					<div class="col-lg-7">
						<div class="input-group iga2">
							<span class="input-group-addon" style="border-color: #154566;background-color: #154566"><i class="fa fa-search"></i></span>
							<input type="email" class="form-control formcc" placeholder="Search Contacts">
						</div>
					</div>

				</div>
				<div class="col-lg-6" style="margin: 10px 0 0 0;">

					<div class="col-lg-4 pull-right"><button class="btn btn-block btn-info btn-sm" onclick="openTaskDiv()" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Contact</button></div>
					<div class="col-lg-1 pull-right"><button class="btn btn-primary btn-sm " style="margin-right: 5px;" d><i class="fa  fa-th-large"></i></button></div>	
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
														<a data-toggle="lightbox" data-title="Add New Contact" href="<?php echo base_url()."yzy-accounts/index/viewAddContacts"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Contact</a>
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
																	<td><?php echo $value->member_names;?></td>
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

														<a data-toggle="lightbox" data-title="Add New Potential" href="<?php echo base_url()."yzy-accounts/index/viewAddPotentials"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Potential</a>
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
																	<td><?php echo $value->member_names;?></td>
																	
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
														<a data-toggle="lightbox" data-title="Add New Quotes" href="<?php echo site_url()."yzy-accounts/index/viewAddQuotes"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Quote</a>
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
																	<td><?php echo $value->member_names;?></td>
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
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Sales Order</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
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
							        				<a data-toggle="lightbox" data-title="Add New Invoice" href="<?php echo site_url()."yzy-accounts/index/viewAddInvoices"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Invoice</a>
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
							        							<td><?php echo $value->member_names;?></td>

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
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Activities</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Email</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Activity History</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Documents</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Trouble Tickets</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Products</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Service Contracts</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
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
							        				<a data-toggle="lightbox" data-title="Add New Services" href="<?php echo site_url()."yzy-accounts/index/viewAddServices"; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Service</a>
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
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #F1F1F1 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #F1F1F1 ), color-stop(1, #F1F1F1 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: F1F1F1;">
										<i class="fa fa-arrow-up"></i>
										<span style="margin-left: 5px;">
										<h3 class="box-title">Assets</h3>
										</span>
										
										</div>
										<div class="box-body border-radius-none" style="display: block;">
										<div style="position: absolute; right: 10px; margin-top: -45px;">
										<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
										</div>
										<div class="table-responsive" style="background: #FFF; color:#000;">
										
										</div>
										</div>
							            </div>
							        </div> -->
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
							        							<td><a href=""><?php echo $value->member_names;?></a></td>

							        							<!--<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDivPot(<?php echo $value->serviceid; ?>)"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>-->
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
function callTurnBox(id) {
	$('#clickTab').trigger('click');
	console.log(id);

	ajaxDataSend(id);
}
</script>
<script type="text/javascript">
var myStararray = new Array();
var myProarray = new Array();
var myOtherarray = new Array();

</script>
<script>   //no need to specify the language
function ajaxDataSend(Vid) {
		// $(".mousechange").click(function(e){  // passing down the event 

			$.ajax({
				url: '<?php echo site_url(); ?>yzy-tasks/index/taskDetail',
				type: 'POST',
				data: {Vid: Vid},
				dataType: "json",
				beforeSend: function () {
					console.log("Emptying");
					$("#commentList").html("");
					$(".textarea").html('');
					$("#txtHint").html('');

				},
				success: function (data, textStatus) {

					console.log(data);
					var string = '<div class="parent">' +
					'<div class="child-left">' +
					'<h3>Title: ' + data.dataList[0].projecttaskname + '</h3>' +
					'<input type="hidden" class="postID" id="postID" value="' + data.dataList[0].projecttaskid + '" />' +
					'<p class="text-detail">Detail: <br >' + data.dataList[0].description + '</p>' +
					'</div>' +
					'<div class="child-right">' +
					'<p class="r-s"><span style="font-size:10px;">Project:</span><br> ' + data.dataList[0].projectname + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Task Code:</span><br> ' + data.dataList[0].projecttaskcode + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Task Type:</span><br> ' + data.dataList[0].projecttasktype + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Task Priority:</span><br> ' + data.dataList[0].projecttaskpriority + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Task Progress:</span><br> ' + data.dataList[0].projecttaskprogress + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Task Hours:</span><br> ' + data.dataList[0].projecttaskhours + '</p>' +
					'<p class="r-s"><span style="font-size:10px;">Project Status:</span><br> INCOMPLETE</p>' +
					'<p class="r-s"><span style="font-size:10px;">Start Date:</span><br><span>' + data.dataList[0].startdate + '</span></p>' +
					'<p class="r-s"><span style="font-size:10px;">End Date:</span><br><span>' + data.dataList[0].enddate + '</span></p>' +
					'<p class="r-s"><span style="font-size:10px;">Task Status:</span><br> INCOMPLETE</p>' +
					'<p class="r-s" id="tag"></p>' +
					'</div>' +
					'</div>';

					$("#txtHint").html(string);
				},
				error: function (jqXHR, textStatus, errorThrown) {
				// Some code to debbug e.g.:               
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
return false;
		//e.preventDefault(); // could also use: return false;
		//});
}
</script>
<script type="text/javascript">
$(document).ready(function ($) {
		// delegate calls to data-toggle="lightbox"
		$(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
			event.preventDefault();
			return $(this).ekkoLightbox({
				onShown: function() {
					if (window.console) {
						return console.log('Checking our the events huh?');
					}
				},
				onNavigate: function(direction, itemIndex) {
					if (window.console) {
						return console.log('Navigating '+direction+'. Current item: '+itemIndex);
					}
				}
			});
		});
	});
</script>
<!-- /Lightbox -->

<script type="text/javascript">
$('.datepick').datepicker({
	format:'yyyy-mm-dd',autoclose: true
});
</script>




<!-- Function For open new project create div -->
<script type="text/javascript">
function openDiv(){
	$(".ImgBoxBack").css('display','block');
	$("#propertiesBox").css("display","block");
}
function closeDiv(id){
	$(".ImgBoxBack").css('display','none');
	$("#"+id).css('display','none');
}

</script>

<script type="text/javascript">
function createPro(){
	var pName = $("#ptn").val();
	var pStat = $("#ptp").val();
	var pTypeU = $("#assigntypeU");
	var pTypeT = $("#assigntypeT");
	console.log(pName+" "+pStat);

	var ico = "";

	if(pStat == "Private"){
		ico = "fa-lock";
	}else if(pStat == "Public"){
		ico = "fa-globe";
	}
	var d = $.now();

	if(pTypeU.is(':checked') || pTypeT.is(':checked')){
		ara = "myProarray";
	}else{
		ara = "myOtherarray";
	}

	var str = '<div class="col-lg-3" id="'+d+'" style="height:200px;border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
	str +='<div class="col-lg-10" >';
	str +='<a href="<?php echo base_url()."yzy-projects/index/newPro/"; ?>'+d+'"><P style="color:#6E777B;padding: 10px 0px 0px 0px;"><i class="fa '+ ico +'"></i>  '+ pName +'</p></a>';
	str +='</div>';
	str +='<div class="col-lg-1" style="padding: 8px;">';
	str +='<button data-araa="'+ara+'" data-id="'+d+'" onclick="goStar($(this).data(\'araa\'),$(this).data(\'id\'))" type="button" class="btn btn-default"><i class="fa fa-star" style="color: #f9a50f;"></i></button>';
	str +='<button type="button" class="btn btn-default"><i class="fa fa-gear"></i></button>';
	str +='</div>';
	str +='</div>';


	if($('input[name=assigntype]:checked').length == 0 ){
		myOtherarray.push([str,d]);
		$("#otherProjectDiv").html("");
		$.each( myOtherarray, function( key, value ) {
			$("#otherProjectDiv").append(value[0]);
		});
		$('#pForm')[0].reset();
		closeDiv('propertiesBox');
	}else{
		myProarray.push([str,d]);
		$("#myProjectDiv").html("");
		$.each( myProarray, function( key, value ) {
			$("#myProjectDiv").append(value[0]);
		});

		$('#pForm')[0].reset();
		closeDiv('propertiesBox');
	}

}

function goStar(ary,d){
	var descDiv = $("#"+d).html();
	console.log(descDiv);
	var newstr = '<div class="col-lg-3" id="'+d+'" style="height:200px;border-radius: 8px;background-color: #FFFFFF; margin: 0px 20px 20px 0;cursor: pointer;">';
	newstr += descDiv;
	newstr +='</div>';

	$("#"+d).remove();
	removeArra(ary,d);

	myStararray.push([newstr,d]);
	$("#starProjectDiv").html("");
	$.each( myStararray, function( key, value ) {
		$("#starProjectDiv").append(value[0]);
	});

	$("#otherProjectDiv").html("");
	$.each( myOtherarray, function( key, value ) {
		$("#otherProjectDiv").append(value[0]);
	});

	$("#myProjectDiv").html("");
	$.each( myProarray, function( key, value ) {
		$("#myProjectDiv").append(value[0]);
	});
			//$("#myProjectDiv").append(str);
		}
		
		</script>
		<script type="text/javascript">
		$(document).ready(function(){
			//$("#assigntypeU").prop("checked",true);
		});
		</script>
		<script type="text/javascript">
		function removeArra(ary,d){
			if(ary == 'myOtherarray' ){
				myarray = myOtherarray;
			}else if(ary == 'myProarray'){
				myarray = myProarray;
			}
			
			$.each(myarray, function( key, value ) {
				if(value[1] === d){
					myarray.splice(myarray.indexOf(d), 1);
				}
				
			});
			
			
		}
		function golink(pid){
			$.ajax({
				url: '<?php echo site_url(); ?>yzy-projects/index/newPro',
				type: 'POST',
				data: {pid: pid},
				dataType: "json",
				beforeSend: function () {
					console.log("Emptying");
				},
				success: function (data, textStatus) {
					
					console.log(data);
					
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
		
		function openTaskDiv(){
			var d = $.now();
			var myStr ='<div class="demo-wrapper css3-bounce-effect col-lg-3">';
			myStr +='<div class="css3-notification">';
			myStr +='<input type="email" class="form-control" placeholder="New Contact">';
			myStr +='<p onclick="openIn(\''+d+'\')" style="cursor:pointer;"><i class="fa  fa-plus"> Add Contact</p>';
			myStr +='<div class="row" id="'+d+'"></div>';
			myStr +='<div class="row" id="list'+d+'"></div>';
			myStr +='</div>';
			myStr +='</div>';
			
			$("#myTaskDiv").append(myStr);
			
		}
		
		function openIn(d){
			var inFut ='<div class="form-group"><textarea id="text'+d+'" style="width: 90%;margin: 13px;" class="form-control"></textarea><button class="btn btn-info btn-xs" onclick="listOpen(\''+d+'\')">Create</button>&nbsp;<button class="btn btn-info btn-xs">Cancel</button></div>';
			$("#"+d).append(inFut);
		}
		
		function listOpen(id){
			var textVal = $("#text"+id).val();
			
			var textString = '<div class="col-lg-12" style="background-color:#FFFFFF;width: 96%;margin: 5px 0 5px 5px;"><div class="col-lg-1"><input type="checkbox" style="margin-top: 8px;"></div><div class="col-lg-10" style="cursor:pointer;"><p style="font-size: 1.3rem;font-weight: 500;color:#000000;" onclick="oDiv(0)">'+textVal+'</p></div></div>';
			$("#list"+id).append(textString);
			$("#togPopH").html(textVal);
			
		}
		</script>
		<script type="text/javascript">
		<?php echo "var jqAccInfo = ". json_encode($jqAllAccInfo) . ";\n"; ?>
		
		function oDiv(accid){
			if(accid){
				var position = "";
				for(var i = 0; i < jqAccInfo.length; i++){
					if((jqAccInfo[i].accountid).indexOf(accid) > -1)
						position = i;
				}
				$("#togPopH").html(jqAccInfo[position].accountname);
				if(jqAccInfo[position].favorite == "YES")
					$("#accStar").prop('checked', true);
				else
					$("#accStar").prop('checked', false);
				$("#accId").val(jqAccInfo[position].accountid);
				$("#accountName").val(jqAccInfo[position].accountname);
				$("#accountNumber").val(jqAccInfo[position].account_no);
				$("#phone").val(jqAccInfo[position].phone);
				$("#website").val(jqAccInfo[position].website);
				$("#fax").val(jqAccInfo[position].fax);
				$("#email").val(jqAccInfo[position].email1);
				// $("#relatedto").val(jqAccInfo[position].assign_to);
				
				// $("#employees").val(jqAccInfo[position].employees);
				$("#secondPhone").val(jqAccInfo[position].otherphone);
				$("#secondEmail").val(jqAccInfo[position].email2);
				$("#ownerShip").val(jqAccInfo[position].ownership);
				$("#siccode").val(jqAccInfo[position].siccode);
				$("#industry option").filter(function() {
					return $(this).val() == jqAccInfo[position].industry; 
				}).prop('selected', true);
				$("#rating option").filter(function() {
					return $(this).val() == jqAccInfo[position].rating; 
				}).prop('selected', true);
				$("#accounttype option").filter(function() {
					return $(this).val() == jqAccInfo[position].account_type; 
				}).prop('selected', true);
				
				$.ajax({
					url: '<?php echo site_url(); ?>yzy-accounts/index/readBillingShiping',
					type: 'POST',
					data: {id: accid},
					dataType: "json",
					beforeSend: function () {
						console.log("Emptying");
					},
					success: function (data) {
						if(data != ""){
							console.log(data['bill'][0].bill_city);
							$("#bcity").val(data['bill'][0].bill_city);
							$("#bzip").val(data['bill'][0].bill_code);
							$("#bcountry").val(data['bill'][0].bill_country);
							$("#bstate").val(data['bill'][0].bill_state);
							$("#bstreet").val(data['bill'][0].bill_street);
							$("#bpo").val(data['bill'][0].bill_pobox);
							
							$("#scity").val(data['ship'][0].ship_city);
							$("#szip").val(data['ship'][0].ship_code);
							$("#scountry").val(data['ship'][0].ship_country);
							$("#sstate").val(data['ship'][0].ship_state);
							$("#sstreet").val(data['ship'][0].ship_street);
							$("#spo").val(data['ship'][0].ship_pobox);
						}
						else{
							$("#bcity").val("");
							$("#bzip").val("");
							$("#bcountry").val("");
							$("#bstate").val("");
							$("#bstreet").val("");
							$("#bpo").val("");
							
							$("#scity").val("");
							$("#szip").val("");
							$("#scountry").val("");
							$("#sstate").val("");
							$("#sstreet").val("");
							$("#spo").val("");
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

			// Set the effect type
			var effect = 'slide';
			
			// Set the options for the effect type chosen
			var options = { direction: 'right' };
			
			// Set the duration (default: 400 milliseconds)
			var duration = 500;
			
			$('#myDiv').toggle(effect, options, duration);
			
			console.log(jqAccInfo);
		}
		</script>
		
		<script type="text/javascript">
		function osDiv(){
			// Set the effect type
			var effect = 'slide';
			
			// Set the options for the effect type chosen
			var options = { direction: 'right' };
			
			// Set the duration (default: 400 milliseconds)
			var duration = 500;
			
			$('#setMyDiv').toggle(effect, options, duration);
		}
		</script>		
		<script type="text/javascript">
    	// $('.datepick').datetimepicker({
		// timepicker:false,
		// format:'Y-m-d'
		// });
$( "#sel_relatedtype_pot" ).change(function() {
	if( $( this ).val()=="Contacts" ){
		$("#openpop_pot_relto").attr("href", "<?php echo base_url()."yzy-contacts/index/popupsearch/contactdetails"; ?>");
		$('[name=relatedto_pot]').val("");
		$('[name=relatedto_pot]').attr("id","selpopin_contact_pot");
	}
	if( $( this ).val()=="Accounts" ){
		$("#openpop_pot_relto").attr("href", "<?php echo base_url()."modulecontrol/popupsearch/account"; ?>");
		$('[name=relatedto_pot]').val("");
		$('[name=relatedto_pot]').attr("id","selpopin_account_pot");
	}
});
</script>
<script>

$(".readonly").keydown(function(e){
	e.preventDefault();
});
</script>

<script>
var user_id = "<?php echo $id; ?>";
var ci_baseurl="<?php echo site_url(); ?>";

<?php echo "var contact_data = ". json_encode($allContacts) . ";\n"; ?>

$.each(contact_data, function( index, value ) {
	var str='<a href="<?php echo base_url()."yzy-contacts/index/contact/account/".$accid."/"; ?>'+ value.contactid +'">';
	str +='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.creator === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.lastname+'</span>';
		str +='</div>';
		str +='</div>';
		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Title: </b>'+ value.title +' </div>';
		str +='<div class="info_details"><b>Mobile: </b>'+ value.mobile+' </div>';
		str +='<div class="info_details"><b>Email: </b>'+value.email +' </div>';
		str +='<div class="info_details"><b>Shared To: </b>'+value.member_names +' </div>';
		str +='</div>';

		str+='</div>';
		str+='</div>';
		str+='</a>';
		
		$("#gridview_contacts").append(str);
	});

<?php echo "var potential_data = ". json_encode($allPotentials) . ";\n"; ?>
console.log(potential_data);
$.each(potential_data, function( index, value ) {
	var str='<a href="<?php echo base_url()."yzy-potentials/index/potential/account/".$accid."/"; ?>'+ value.potentialid +'">';
	str +='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="" style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.creator === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.potentialname+'</span>';
		str +='</div>';
		str +='</div>';

		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Sales Stage: </b>'+ value.sales_stage +' </div>';
		str +='<div class="info_details"><b>Close Date: </b>'+ value.closingdate+' </div>';
		str +='<div class="info_details"><b>Amount: </b>'+value.amount +' </div>';
		str +='<div class="info_details"><b>Shared To: </b>'+value.member_names +' </div>';
		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_potentials").append(str);
	});

<?php echo "var quote_data = ". json_encode($allQuotes) . ";\n"; ?>

$.each(quote_data, function( index, value ) {
	var str='<a href="<?php echo base_url()."yzy-quotes/index/quote/account/".$accid."/"; ?>'+ value.quoteid +'">';
	//str +='<a data-toggle="lightbox" data-title="Add New Quotes" href="<?php echo base_url()."yzy-quotes/index/viewSettings/'+value.quoteid+'"; ?>" >';
	 str +='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
		
		str +='<div id="" style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.creator === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.subject+'</span>';
		str +='</div>';
		str +='</div>';

		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Quote Stage: </b>'+ value.quotestage +' </div>';
		str +='<div class="info_details"><b>Carrier: </b>'+ value.carrier+' </div>';
		str +='<div class="info_details"><b>Shipping: </b>'+value.shipping +' </div>';
		str +='<div class="info_details"><b>Shared To: </b>'+value.member_names +' </div>';
		str +='</div>';

		str+='</div>';
		str+='</div>';
		str+='</a>';
		
		$("#gridview_quotes").append(str);
	});

<?php echo "var invoice_data = ". json_encode($allInvoices) . ";\n"; ?>

$.each(invoice_data, function( index, value ) {
	var str='<a href="<?php echo base_url()."yzy-invoices/index/invoice/account/".$accid."/"; ?>'+ value.invoiceid +'">';
	str +='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="" style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.creator === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.subject+'</span>';
		str +='</div>';
		str +='</div>';

		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Status: </b>'+ value.invoicestatus +' </div>';
		str +='<div class="info_details"><b>Invoice Date: </b>'+ value.invoicedate+' </div>';
		str +='<div class="info_details"><b>Due Date: </b>'+value.duedate +' </div>';
		str +='<div class="info_details"><b>Shared To: </b>'+value.member_names +' </div>';
		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_invoice").append(str);
	});

<?php echo "var service_data = ". json_encode($allServices) . ";\n"; ?>

$.each(service_data, function( index, value ) {
	var str='<a href="<?php echo base_url()."yzy-services/index/service/account/0/"; ?>'+ value.serviceid +'">';
	str +='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="" style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.creator === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.servicename+'</span>';
		str +='</div>';
		str +='</div>';

		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Price: </b>'+value.unit_price +' </div>';
		str +='<div class="info_details"><b>VAT: </b>'+ value.tax_vat +' </div>';
		str +='<div class="info_details"><b>Sales: </b>'+ value.tax_sales+' </div>';
		str +='<div class="info_details"><b>Service: </b>'+value.tax_service +' </div>';
		
		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_service").append(str);
	});

<?php echo "var project_data = ". json_encode($allProjects) . ";\n"; ?>

$.each(project_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="" onclick="oDiv(\''+value.serviceid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row info_1strow">';

		str +='<div class="col-lg-1" >';
		if (value.createdBy === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span style="color:#6E777B;font-size:large;font-weight: bold">'+value.projectname+'</span>';
		str +='</div>';
		str +='</div>';
		// second row info
		str +='<div class="col-lg-12" style="padding-bottom: 5px;">';
		str +='<div class="info_details"><b>Project Group: </b>'+value.projectstatus +' </div>';
		str +='<div class="info_details"><b>Type: </b>'+value.projecttype +' </div>';
		str +='<div class="info_details"><b>Start Date: </b>'+ value.startdate +' </div>';
		str +='<div class="info_details"><b>Status: </b>'+ value.proCurSta+' </div>';
		
		
		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_project").append(str);
	});


$("#switchView").click(function(e){ 

	if($(this).attr('data-view')=="list"){

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

		$(this).attr("data-view","grid"); 
		return;
	}
	if($(this).attr('data-view')=="grid"){
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

	$(this).attr('data-view',"list"); //setter
	return;
}
});

</script>
<script type="text/javascript">
    // $( document ).on( "click", "#expand_mydiv", function() { 
    //   if($( this ).hasClass( "fa-compress" )) $('#myDiv').animate({width: '46%'});
    //   else $('#myDiv').animate({width: '90%'});


    //   $(this).toggleClass("fa-compress fa-expand");
    // });
</script>
<script type="text/javascript"> 
var baseloc="<?php echo base_url(); ?>";
function closeSetDiv(divid){
	
	// Set the effect type
	var effect = 'slide';

		// Set the options for the effect type chosen
		var options = { direction: 'right' };

		// Set the duration (default: 400 milliseconds)
		var duration = 500;

		$('#'+divid+'').toggle(effect, options, duration);
	}
	function expandSetDiv(divid,element){

		if($( element ).hasClass( "fa-compress" )) $('#'+divid+'').animate({width: '46%'});
		else $('#'+divid+'').animate({width: '90%'});


		$(element).toggleClass("fa-compress fa-expand");
	}

	
$(document).on('click', 'div[id^="os_pot"]', function() {
	
	var item_id = $(this).attr('id').replace(/os_pot/, '');
	var position = "";
	for(var i = 0; i < potential_data.length; i++){
		if((potential_data[i].potentialid).indexOf(item_id) > -1)
			position = i;
	}

	console.log("info::::::");
	console.log(potential_data[position]);

	$("#myDivPot #togPopH").html(potential_data[position].potentialname);
				// $("#salutation_type").val(potential_data[position].salutation);
				$("#myDivPot #pot_name").val(potential_data[position].potentialname);
				$("#myDivPot #pot_id").val(potential_data[position].potentialid);
				$("#myDivPot #sel_relatedtype").val(potential_data[position].potentialtype);
				$("#myDivPot #relatedtoid_pot_up").val(potential_data[position].related_to);

				$("#myDivPot #pot_amount").val(potential_data[position].amount);
				$("#myDivPot #pot_type").val(potential_data[position].typeofrevenue);
				$("#myDivPot #expected_closedate").val(potential_data[position].closingdate);
				
				$("#myDivPot #lead_source").val(potential_data[position].leadsource);
				$("#myDivPot #pot_nextstep").val(potential_data[position].nextstep);
				$("#myDivPot #sales_stage").val(potential_data[position].sales_stage);
				$("#myDivPot #pot_description").val(potential_data[position].description);

				if(potential_data[position].potentialtype=="Contacts"){

					$("#myDivPot #openpop_pot_relto").attr("href", ci_baseurl+"yzy-contacts/index/popupsearch/contactdetails");
					$('#myDivPot [name=relatedto_pot]').attr("id","selpopin_contact_pot");
					$('#myDivPot [name=relatedto_pot]').val(potential_data[position].contactname_db);


				}else{

					$("#myDivPot #openpop_pot_relto").attr("href", ci_baseurl+"modulecontrol/popupsearch/account");
					
					$('#myDivPot [name=relatedto_pot]').attr("id","selpopin_account_pot");
					$('#myDivPot [name=relatedto_pot]').val(potential_data[position].accountname);
				}
				
				
				$("#myDivPot #sel_assigned_userid2 *").prop("selected",false);
				if(potential_data[position].member_ids !=null){
					var c = (potential_data[position].member_ids).split(",");
					
					
					$.each(c,function(key){
						
						

						$('#myDivPot #sel_assigned_userid2 option[value="'+c[key]+'"]').prop("selected","selected");
						
					});
					
				}
				$("#myDivPot #sel_assigned_userid2").trigger("change");
				
				
				


			// Set the effect type
			var effect = 'slide';
			
			// Set the options for the effect type chosen
			var options = { direction: 'right' };
			
			// Set the duration (default: 400 milliseconds)
			var duration = 500;
			
			$('#myDivPot').toggle(effect, options, duration);
		});

</script>
<script type = "text/javascript" >
	/** This is Javascript Function which is used to toogle between
		* assigntype user and group/team select options while assigning owner to entity.
		**/
		$(".assign_team2").hide();
		function toggleAssignType(divid,currType)
		{
			if (currType == "U")
			{
				$('#'+divid +' .assign_user').show();
				$('#'+divid +' .assign_team').hide();
			}
			if (currType == "T")
			{

				$('#'+divid +' .assign_user').hide();
				$('#'+divid +' .assign_team').show();
			}
			if (currType == "U2")
			{
				
				$('#'+divid +' .assign_user2').show();
				$('#'+divid +' .assign_team2').hide();
			}
			if (currType == "T2")
			{

				$('#'+divid +' .assign_user2').hide();
				$('#'+divid +' .assign_team2').show();
			}
		}
		</script>