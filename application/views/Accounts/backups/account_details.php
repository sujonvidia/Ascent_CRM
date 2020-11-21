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
							<a href="#" style="font-size: 16px;"><?php echo $allAccounts[0]->accountname; ?></a>
						</li>
					</ul>
				</div>
				<div class="col-lg-5">
					<ul class="nav navbar-nav">
						<li class="dropdown notifications-menu"> 
							<a href="<?php echo base_url()."yzy-contacts/index/contact/account"; ?>" style="font-size: 16px;">Contacts</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-potentials/index/potential/account"; ?>" style="font-size: 16px;">Potentials</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-quotes/index/quote/account"; ?>" style="font-size: 16px;">Quotes</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-invoices/index/invoice/account"; ?>" style="font-size: 16px;">Invoices</a>
						</li>
						<li class="dropdown notifications-menu">
							<a href="<?php echo base_url()."yzy-services/index/service/account"; ?>" style="font-size: 16px;">Services</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-4 pull-right" style="margin: 10px 0 0 0;">
					<button onclick="oDiv(<?php echo $allAccounts[0]->accountid; ?>)" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-gear"></i>  Settings</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-user"></i> 5</button>
					<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-wechat"></i>  Account Chat</button>
					<button class="btn btn-primary btn-sm" id="switchView" data-view="list" style="margin-right: 5px;"><i class="fa  fa-th-large"></i></button>
				</div>

			</div>
		</div>
		<div class="row" style="display:none">
			<div class="col-lg-12" style="background-color: #2C6A95;height: 50px;">
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
				<div class="col-lg-12" style="background: #2C6A95;height: auto; min-height: 900px;">
					<div class="row">

						<div class="col-lg-12">&nbsp;</div>
						<div class="col-lg-12">
							<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">

								<div class="box-body border-radius-none" style="display: block;">
									<div class="col-lg-12" id="myTaskDiv">
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: #184c71;">
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

													<div class="col-lg-12" id="gridview_contacts" style="display:none;padding-left: 0px;"></div>
													
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
													<div class="col-lg-12" id="gridview_potentials" style="display:none;padding-left: 0px;"></div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
												<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
													<div class="col-lg-12" id="gridview_quotes" style="display:none;padding-left: 0px;"></div>
												</div>
											</div>
										</div>
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        	<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
							        		<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        			<div class="col-lg-12" id="gridview_invoice" style="display:none;padding-left: 0px;"></div>
							        		</div>
							        	</div>
							        </div>
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        	<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
							        		<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        			<div class="col-lg-12" id="gridview_service" style="display:none;padding-left: 0px;"></div>
							        		</div>
							        	</div>
							        </div>
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
										<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        	<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
							        		<div class="box-header" data-widget="collapse" style="background: #184c71;">
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
							        			<div class="col-lg-12" id="gridview_project" style="display:none;padding-left: 0px;"></div>
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



<div id="myDivPot" style="display:none">
	<div class="togPot" style="cursor:pointer;" onclick="oDivPot(0)"><i class="fa fa-close cl"></i></div>
	<div class="row">
		<div class="col-lg-12">
			<div style="font-size: 17px;"><p id="togPotH"></p></div>
			<p class="small" style="color:#616161">Date: <?php echo date("Y-m-d"); ?></p>
		</div>
	</div>
	
	<!-- Custom Tabs -->
	<div class="box">
		<div class="box-body" style="height: 600px;min-height: 400px;overflow-x: hidden;overflow-y: auto;">
			<form method="post" role="form" id="form_potset" name="form_potset">
				
				
				<div id="basic_info" class="tab-pane fade in active">
					<h4 class="box-title cls-setting-title">Potential Information</h4>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label col-md-4">Potential Name</label>

							<div class="col-md-6">
								<input type="text" name="PotentialName" id="PotentialName" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="control-label col-md-4">Potential No</label>
							<div class="col-md-8">
								<input type="text" name="PotentialNo" id="PotentialNo" readonly class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
								<label class="control-label">Related To <span class="required">*</span></label>
							</div>
							<div class="row">
								<div class="row col-lg-8">

									<select id="sel_relatedtype" class="form-control input-sm" name="sel_relatedtype" >
										<option value="Accounts">Accounts</option> 
										<option value="Contacts">Contacts</option> 
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="input-group">
									<input required type="text" name="relatedto_pot" id="selpopin_account" class="form-control input-sm readonly">
									<a id="openpop_pot_relto" href="<?php echo site_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
								</div>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label col-md-4">Amount</label>
							<div class="col-md-8">
								<input type="text" name="office_phone" id="office_phone" class="form-control">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label col-md-4">Type</label>
							<div class="col-md-8">
								<select name="opportunity_type" tabindex="" class="small">
									<option value="--None--">
										--None--
									</option>
									<option value="Existing Business">
										Existing Business
									</option>
									<option value="New Business">
										New Business
									</option>
								</select>
							</div>
						</div>
						
						<label class="control-label col-md-4">Lead Source</label>
						<div class="col-md-8">
							<select name="leadsource" tabindex="" class="small">
								<option value="--None--">
									--None--
								</option>
								<option value="Cold Call">
									Cold Call
								</option>
								<option value="Existing Customer">
									Existing Customer
								</option>
								<option value="Self Generated">
									Self Generated
								</option>
								<option value="Employee">
									Employee
								</option>
								<option value="Partner">
									Partner
								</option>
								<option value="Public Relations">
									Public Relations
								</option>
								<option value="Direct Mail">
									Direct Mail
								</option>
								<option value="Conference">
									Conference
								</option>
								<option value="Trade Show">
									Trade Show
								</option>
								<option value="Web Site">
									Web Site
								</option>
								<option value="Word of mouth">
									Word of mouth
								</option>
								<option value="Other">
									Other
								</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label class="control-label col-md-4">Lead Source </label>
						<div class="col-md-8">
							<select name="lead_source" id="lead_source" tabindex="" class="form-control input-sm">
								<option value="--None--">--None--</option>
								<option value="Cold Call">Cold Call</option>
								<option value="Existing Customer">Existing Customer</option>
								<option value="Self Generated">Self Generated</option>
								<option value="Employee">Employee</option>
								<option value="Partner">Partner</option>
								<option value="Public Relations">Public Relations</option>
								<option value="Direct Mail">Direct Mail</option>
								<option value="Conference">Conference</option>
								<option value="Trade Show">Trade Show</option>
								<option value="Web Site">Web Site</option>
								<option value="Word of mouth">Word of mouth</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>

					<div class="form-group col-md-6">
						<label class="control-label col-md-4">Next Step</label>
						<div class="col-md-8">
							<input type="text" name="contact_title" id="contact_title" class="form-control input-sm">
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group col-md-12">
						<div class="col-md-2"></div>
						<div class="col-md-10">
							<span id="assign_user2" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo 'style="display:block"'; else  echo 'style="display:none"'; ?>>
								<select multiple="multiple" name="sel_shared_userid[]" id="sel_assigned_userid2" class="form-control customDisable input-sm select2_multiple">
									<?php foreach ($users as $r) { ?>
									<option value="<?php echo $r->ID; ?>" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->userteamid == $r->ID) echo 'selected';  ?> ><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
									<?php } ?>
								</select>
							</span>
							<span id="assign_team2" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo 'style="display:block"'; else  echo 'style="display:none"'; ?> >
								<select multiple="multiple" name="sel_shared_teamid[]" id="sel_assigned_teamid2" class="form-control customDisable input-sm select2_multiple">
									<?php foreach ($groups as $r) { ?>
									<option value="<?php echo $r->groupid; ?>" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->userteamid == $r->groupid) echo 'selected';  ?>><?php echo ucfirst($r->groupname); ?></option>
									<?php } ?>
								</select>
							</span>
						</div>
					</div>
				</div>



				<div class="row">&nbsp;</div>
				<h4 class="box-title cls-setting-title">Description Information</h4>

				<div class="row">
					<div class="form-group col-md-12">
						<label class="control-label col-md-2">Description </label>
						<div class="col-md-10">
							<textarea name="contact_description" id="contact_description" class="form-control input-sm" rows="3"> <?php //if($pid != -1) echo $allProjectList[$pid]->description; ?></textarea>
						</div>
					</div>
				</div>

				
				
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-5">
						<!--<?php //if($pid != -1) { ?><button type="button" class="btn btn-primary">Update</button> -->
						<?php //} else { ?><button id="btn_contactsave" type="submit" class="btn btn-primary">Save</button><?php //} ?>
						<button type="button" id="btn_contactcancel" onclick="oDiv(0)" class="btn btn-primary">Cancel</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>
	
	<hr>
</div><!-- /.col -->

<div id="setMyDiv">
	<div class="togPop" style="cursor:pointer;" onclick="osDiv()"><i class="fa fa-close cl"></i></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-1">
				<input type="checkbox" style="margin-top: 22px;">
			</div>
			<div class="col-lg-11" style="margin-left: -40px;font-size: 17px;"><p id="togPopH">Test Project Name</p></div>
			<p class="small" style="color:#616161">#116 Created by Dipok C on Mar 1, 2016 at 05:41 pm • updated a few seconds ago</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<!-- Custom Tabs -->
			<div class="box">
				<div class="box-body" style="height: 571px;min-height: 300px; overflow-y: auto;">
					<div class="form-group col-lg-12">
						<label class="control-label col-lg-4" style="margin-top: 10px;"><i class="fa fa-list-ul"></i> Start Date</label>
						
						<div class="col-lg-8">
							<div class="input-group feedtext">
								<button class="btn btn-default"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
					<div class="form-group col-lg-12">
						<label class="control-label col-lg-4" style="margin-top: 10px;"><i class="fa fa-list-ul"></i> Due Date</label>
						
						<div class="col-lg-8">
							<div class="input-group feedtext">
								<button class="btn btn-default" style="margin-top: 10px;"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
					
					<div class="form-group col-lg-12">
						<label class="control-label col-lg-4"><i class="fa fa-list-ul"></i> Completion Date</label>
						
						<div class="col-lg-8">
							<div class="input-group feedtext">
								<button class="btn btn-default"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
					<hr />
					<div class="form-group col-lg-12">
						<label class="control-label col-lg-3" style="margin-top: 10px;">Project Members</label>
						
						<div class="col-lg-1">
							<div class="input-group feedtext">
								<button class="btn btn-default" style="margin-top: 10px;"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="input-group feedtext">
								<button class="btn btn-block btn-default">Mahfuzur Rahman <i class="fa fa-close pull-right"></i></button>
								<button class="btn btn-block btn-default">Sujon <i class="fa fa-close pull-right"></i></button>
								<button class="btn btn-block btn-default">Hasib <i class="fa fa-close pull-right"></i></button>
							</div>
						</div>
					</div>
					<hr />
					
					<div class="form-group col-lg-12">
						<div class="row" style="padding: 5px;">
							<label class="control-label col-lg-4" style="margin-top: 0px;">Tasks are assigned to me</label>
							<div class="col-md-8">
								<div class="demo">
									<input type="checkbox" value="1" checked>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<div class="form-group col-lg-12">
						<div class="row" style="padding: 5px;">
							<label class="control-label col-lg-4" style="margin-top: 10px;">Copy Project</label>
							<div class="col-md-8">
								<div class="input-group feedtext">
									<button class="btn btn-block btn-default" style="margin-top: 10px;">Copy Project</button>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<div class="form-group col-lg-12">
						<div class="row" style="padding: 5px;">
							<label class="control-label col-lg-4" style="margin-top: 10px;">Delete Project</label>
							<div class="col-md-8">
								<div class="input-group feedtext">
									<button class="btn btn-block btn-danger" style="margin-top: 10px;">Delete Project</button>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<div class="form-group col-lg-12">
						<label class="control-label col-lg-4">Permission Settings</label>
						
						<div class="col-lg-8">
							<div class="input-group feedtext">
								<select class="form-control">
									<option>Project Members have FULL access.</option>
									<option>Project Members have LIMITED access.</option>
									<option>Project Members have RESTRICTED Access.</option>
								</select>
							</div>
						</div>
					</div>
					<hr />
					<div class="form-group col-md-12">
						<label class="control-label col-md-4">Status </label>
						<div class="col-md-8">
							<select name="projectstatus" class="form-control">
								<option value="--none--">--none--</option>
								<option value="prospecting">Prospecting</option>
								<option value="initiated">Initiated</option>
								<option value="in progress">In progress</option>
								<option value="waiting for feedback">Waiting for feedback</option>
								<option value="on hold">On hold</option>
								<option value="completed">Completed</option>
								<option value="delivered">Delivered</option>
								<option value="archived">Archived</option>
							</select>
						</div>
					</div>
					<div class="form-group col-lg-12">
						<label class="control-label col-md-4">Type </label>
						<div class="col-md-8">
							<select name="projecttasktype" id="projecttasktype" class="form-control">
								<option value="--none--">--none--</option>
								<option value="administrative">Administrative</option>
								<option value="operative">Operative</option>
								<option value="other">Other</option>
							</select>
						</div>
					</div>
					<div class="form-group col-lg-12">
						<label class="control-label col-md-4">Progress </label>
						<div class="col-md-8">
							<select name="projecttaskprogress" id="projecttaskprogress" class="form-control">
								<option value="--none--">--none--</option>
								<option value="10%">10%</option>
								<option value="20%">20%</option>
								<option value="30%">30%</option>
								<option value="40%">40%</option>
								<option value="50%">50%</option>
								<option value="60%">60%</option>
								<option value="70%">70%</option>
								<option value="80%">80%</option>
								<option value="90%">90%</option>
								<option value="100%">100%</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="control-label col-md-4">Target budget </label>
						<div class="col-md-8">
							<input type="text" name="targetbudget" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="control-label col-md-4">URL </label>
						<div class="col-md-8">
							<input type="text" name="url"  class="form-control">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="control-label col-md-4">Priority </label>
						<div class="col-md-8">
							<select name="ticketpriorities" class="form-control">
								<option value="Low">Low</option>
								<option value="Normal">Normal</option>
								<option value="High">High</option>
								<option value="Urgent">Urgent</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="control-label col-md-4">Description </label>
						<div class="col-md-8">
							<textarea name="description" class="form-control" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Save</button>
							<button type="button" class="btn btn-primary">Cancel</button>
						</div>
					</div>
				</div><!-- /.box-body -->
				<hr>
			</div><!-- /.col -->
		</div><!-- /.col -->
	</div>
</div>

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


<?php
if ($pid != -1) {
	?>
	<script type="text/javascript">
	$(document).ready(function () {
		$(".customDisable").attr("disabled", true);
	});
	</script>
	<?php
}
?>

<script type="text/javascript">
$(document).ready(function () {
	$(".editBtn").click(function () {
		$(".customDisable").attr("disabled", false);
	});
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
<script type = "text/javascript" >
	/** This is Javascript Function which is used to toogle between
		* assigntype user and group/team select options while assigning owner to entity.
		**/
		function toggleAssignType(currType)
		{
			if (currType == "U")
			{
				$("#assign_user").show("slow");
				$("#assign_team").hide("slow");
			}
			else
			{
				$("#assign_user").hide("slow");
				$("#assign_team").show("slow");
			}
		}
		$("#sharedPot_group").hide();
		function toggleSharedPotType(currType)
		{
			if (currType == "U")
			{
				$("#sharedPot_user").show("slow");
				$("#sharedPot_group").hide("slow");
			}
			else
			{
				$("#sharedPot_user").hide("slow");
				$("#sharedPot_group").show("slow");
			}
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
		<?php echo "var jqPotInfo = ". json_encode($jqAllPotInfo) . ";\n"; ?>
		
		<?php echo "var jqQtInfo = ". json_encode($jqAllQtInfo) . ";\n"; ?>
		console.log(jqQtInfo);
		
		function oDivPot(accid){
			if(accid){
				
				var position = "";
				for(var i = 0; i < jqPotInfo.length; i++){
					if((jqPotInfo[i].potentialid).indexOf(accid) > -1)
						position = i;
				}
				alert(jqPotInfo[position].potentialname);
				$("#togPotH").html(jqPotInfo[position].potentialname);
				// if(jqPotInfo[position].star_type == 1)
				// $("#accStar").prop('checked', true);
				// else
				// $("#accStar").prop('checked', false);
				// $("#accId").val(jqPotInfo[position].accountid);
				// $("#accountName").val(jqPotInfo[position].accountname);
				// $("#accountNumber").val(jqPotInfo[position].account_no);
				// $("#phone").val(jqPotInfo[position].phone);
				// $("#website").val(jqPotInfo[position].website);
				// $("#fax").val(jqPotInfo[position].fax);
				// $("#email").val(jqPotInfo[position].email1);
				// // $("#relatedto").val(jqAccInfo[position].assign_to);
				
				// // $("#employees").val(jqAccInfo[position].employees);
				// $("#secondPhone").val(jqPotInfo[position].otherphone);
				// $("#secondEmail").val(jqPotInfo[position].email2);
				// $("#ownerShip").val(jqPotInfo[position].ownership);
				// $("#siccode").val(jqAccInfo[position].siccode);
				// $("#industry option").filter(function() {
					// return $(this).val() == jqAccInfo[position].industry; 
				// }).prop('selected', true);
				// $("#rating option").filter(function() {
					// return $(this).val() == jqAccInfo[position].rating; 
				// }).prop('selected', true);
				// $("#accounttype option").filter(function() {
					// return $(this).val() == jqAccInfo[position].account_type; 
				// }).prop('selected', true);



}

			// Set the effect type
			var effect = 'slide';
			
			// Set the options for the effect type chosen
			var options = { direction: 'right' };
			
			// Set the duration (default: 400 milliseconds)
			var duration = 500;
			
			$('#myDivPot').toggle(effect, options, duration);
			
			console.log(jqPotInfo);
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
$( "#sel_relatedtype" ).change(function() {
	if( $( this ).val()=="Contacts" ){
		$("#openpop_pot_relto").attr("href", "<?php echo base_url()."yzy-contacts/index/popupsearch/contactdetails"; ?>");
		$('[name=relatedto_pot]').val("");
		$('[name=relatedto_pot]').attr("id","selpopin_contact");
	}
	if( $( this ).val()=="Accounts" ){
		$("#openpop_pot_relto").attr("href", "<?php echo base_url()."modulecontrol/popupsearch/account"; ?>");
		$('[name=relatedto_pot]').val("");
		$('[name=relatedto_pot]').attr("id","selpopin_account");
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
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.contactid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_contacts").append(str);
	});

<?php echo "var potential_data = ". json_encode($allPotentials) . ";\n"; ?>

$.each(potential_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.potentialid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_potentials").append(str);
	});

<?php echo "var quote_data = ". json_encode($allQuotes) . ";\n"; ?>

$.each(quote_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.quoteid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_quotes").append(str);
	});

<?php echo "var invoice_data = ". json_encode($allInvoices) . ";\n"; ?>

$.each(invoice_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.invoiceid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_invoice").append(str);
	});

<?php echo "var service_data = ". json_encode($allServices) . ";\n"; ?>

$.each(service_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.serviceid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

		str +='</div>';

		str+='</div>';
		str+='</div>';
		
		$("#gridview_service").append(str);
	});

<?php echo "var project_data = ". json_encode($allProjects) . ";\n"; ?>

$.each(project_data, function( index, value ) {
	var str ='<div class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
	str +='<div id="div_showsettings" onclick="oDiv(\''+value.serviceid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row" style="padding:5px;cursor: pointer;">';

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
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';

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