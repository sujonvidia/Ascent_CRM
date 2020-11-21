<?php $this->load->view('Partial/pageHeader'); ?>

<!-- Content Wrapper. Contains page content -->
<style>
.box-header{
	background: rgba(158, 158, 158, 0.04) !important
}
a:hover{
	color:black !important;
}
.display-inline{
	display: inline;
}
.display-block{
	display: block;
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
    margin-right: -20px !important;

</style>
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12" style="background-color: #0C4C71;height: 51px;">
			<div class="col-lg-3">
				
			</div>
			<div class="col-lg-6">
				<ul class="nav navbar-nav nav-margin">
					<li class="dropdown notifications-menu">

						<a class="highlight font-color-family" href="<?php echo base_url()."yzy-accounts/index/account"; ?>" >Accounts </a>
					</li>
					<li class="dropdown notifications-menu">

						<a class="font-color-family" href="<?php echo base_url()."yzy-contacts/index/contact/account"; ?>" >Contacts </a>
					</li>
					<li class="dropdown notifications-menu">

						<a  class="font-color-family" href="<?php echo base_url()."yzy-potentials/index/potential/account"; ?>">Potentials </a>
					</li>
					<li class="dropdown notifications-menu">
						<a class="font-color-family" href="<?php echo base_url()."yzy-quotes/index/quote/account"; ?>" >Quotes </a>
					</li>
					<li class="dropdown notifications-menu">
						<a class="font-color-family" href="<?php echo base_url()."yzy-invoices/index/invoice/account"; ?>" >Invoices </a>
					</li>
					<li class="dropdown notifications-menu">
						<a class="font-color-family" href="<?php echo base_url()."yzy-services/index/service/account"; ?>" >Services </a>
					</li>
				</ul>
			</div>

			<!-- <div class="col-lg-4 pull-right" style="margin: 10px 0 0 0;">
				<button onclick="oDiv(<?php echo $allAccounts[0]->accountid; ?>)" class="btn btn-info btn-sm pull-right" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-gear"></i>  Settings</button>
				<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-user"></i> 5</button>
				<button class="btn btn-info btn-sm pull-right" onclick="openDiv()" style="background-color: #3c8dbc;    margin-right: 10px;"><i class="fa fa-wechat"></i>  Account Chat</button>
			</div> -->

		</div>
	</div>
	<div class="row">
		<div class="col-lg-12" style="background-color: #fff;height: 50px;">
			<div class="col-lg-1 p-l-d">
				<b class="text-center ">All Accounts</b>
			</div>
			<div class="col-lg-6" style="margin-top: 10px;">
				<div class="col-lg-11">
					<span class="cusSpan">Sort by</span>
					<select class="form-control3 gridStyle" onchange="window.location.href='<?php echo site_url("yzy-accounts/index/account"); ?>'+'/'+$(this).val()">
						<option value="">Select</option>
						<option value="accountname">Name</option>
						<option value="last_update">Last Updated</option>
					</select>
				</div>
				<div class="col-lg-1" id="grd"><button id="click_view_grd" onclick="viewstyle('grd')" class="btn btn-primary btn-sm gridStyle" style="margin-right: 5px;"><i class="fa fa-th-large"></i></button></div>
				<div class="col-lg-1" id="lst" style="display: none;"><button onclick="viewstyle('lst')" class="btn btn-primary btn-sm gridStyle" style="margin-right: 5px;"><i class="fa fa-list"></i></button></div>
			</div>
			<div class="col-lg-3" style="margin: 10px 0 0 0;">
				<div class="input-group iga2">
					<span class="input-group-addon" style="border-color: none;background-color: none"><i class="fa fa-search"></i></span>
					<input type="text" onkeyup="searchBox(this.value)" class="form-control formcc" placeholder="Search Accounts">
				</div>	
			</div>
			<div class="col-lg-2" style="margin: 10px 0 0 0;">
				<button class="btn btn-block btn-sm gridStyle3" onclick="openDiv()" style="font-size:15px;font-family: normal;"><i class="fa fa-plus"></i> New Account</button>	
			</div>

		</div>
	</div>
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12" style="background: #DFDFDF;height: auto; min-height: 800px;">
				<div class="row">
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">
						<div class="box box-solid bg-teal-gradient" style="background: #DFDFDF !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #DFDFDF ), color-stop(1, #DFDFDF )) !important;">
							<div class="box-header" data-widget="collapse" style="background: #184c71;">
								<i class="fa fa-arrow-up"></i>
								<span style="margin-left: 5px;">
									<i class="fa fa-star" style="color: #f9a50f;"></i>
									<h3 class="box-title">Starred Account</h3>
								</span>

							</div>
							<div class="box-body border-radius-none" style="display: block;">
								
							</div>
							<div class="box-body border-radius-none" id="starAccGrdView" style="display: none;">

							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="box box-solid bg-teal-gradient" style="background: #DFDFDF !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #DFDFDF ), color-stop(1, #DFDFDF )) !important;">
							<div class="box-header" data-widget="collapse" style="background: #184c71;">
								<i class="fa fa-arrow-up"></i>
								<span style="margin-left: 5px;">
									<h3 class="box-title">All Accounts</h3>
								</span>

							</div>

							<div class="box-body border-radius-none" id="myAccGrdView" style="display: none;">

							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="box box-solid bg-teal-gradient" style="background: #DFDFDF !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #DFDFDF ), color-stop(1, #DFDFDF )) !important;">
							<div class="box-header" data-widget="collapse" style="background: #184c71;">
								<i class="fa fa-arrow-up"></i>
								<span style="margin-left: 5px;">
									<h3 class="box-title">Archived Accounts</h3>
								</span>

							</div>

							<div class="box-body border-radius-none" id="otherAccGrdView" style="display: none;">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.content-wrapper -->
<div class="row" id="propertiesEdit">
	<div class="ImgBoxBack"></div>
	<div id="propertiesBox" style="width: 30%;height:auto;left: 48%;">

		<div class="message">
			<div class="box box-success">
				<div class="box-header">
					<div class="bn"><button onclick="closeDiv('propertiesBox')" class="btn button">X</button></div>
					<h3>Create a new Account</h3>
					<hr/>
				</div>
				<div class="box-body">
					<form name="pForm" id="pForm">
						<div class="form-group col-md-12">
							<input type="text" id="accName" name="accName" class="form-control" placeholder="Account Name" autofocus>
						</div>
						<div class="form-group col-md-12">
							<input type="text" id="accNo" name="accNo" class="form-control" placeholder="Account Number">
						</div>
						<div class="form-group col-md-12">
							<input type="text" id="officePhone" name="officePhone" class="form-control" placeholder="Phone Number">
						</div>
					</form>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<button type="button" onclick="createPro();" class="btn btn-primary">Create</button> 
							<button type="button" onclick="closeDiv('propertiesBox')" class="btn btn-primary">Cancel</button>
						</div>
					</div>    
				</div>
			</div>    
		</div>
	</div>   
</div>
<div id="myDiv">
	<div class="togPop" style="cursor:pointer;" onclick="oDiv(0)"><i class="fa fa-close cl"></i></div>

	<div class="row">
		<div class="col-lg-8">
			<h3><p id="togPopH"></p></h3>
		</div>

		<div class="col-lg-3">
			<h4 id="update_ok"><p><i style="color:green" class="fa fa-check" aria-hidden="true"><b> Updated</b></i></p></h4>
			<h4 id="update_not"><p><i style="color:red" class="fa fa-times" aria-hidden="true"><b> Not Updated</b></i></p></h4>
		</div>
		
		<div class="col-lg-1">
			<i id="expand_mydiv" class="fa fa-expand fa-2x" style="color: blue;margin-top:5px;margin-left:-5px"></i>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<p class="" style="color:#616161">Date: <?php echo date("Y-m-d"); ?></p>

		</div>

		<div class="col-lg-2">
			<a class="btn btn-xs btn-primary disabled" href=""><i class="fa fa-envelope"></i> Send Mail</a>
		</div>
		<div class="col-lg-2">
			<a class="btn btn-xs btn-success disabled" href=""><i class="ion-ios-calendar"></i> Add Event</a>
		</div>
		<div class="col-lg-2">
			<a class="btn btn-xs btn-info disabled" href=""><i class="ion-ios-calendar-outline"></i> Add To Do</a>
		</div>
		<div class="col-lg-2">
			<a class="btn btn-xs btn-warning disabled" href=""><i class="fa fa-sticky-note"></i> Add Note</a>
		</div>
	</div>




	<div class="row">
		<div class="col-md-12">
			<!-- Custom Tabs -->
			<div class="box">
				<form id="form_dataset" name="form_dataset" action="<?php echo site_url()."yzy-accounts/index/addAccount/update"; ?>" method="POST">
					<input type="hidden" name="accId" id="accId">
					<div class="box-body" style="height: 600px;min-height: 400px;overflow-x: hidden;overflow-y: auto;">
									<!-- <div class="form-group col-md-12">
										<input type="checkbox" name="accStar" id="accStar">
										<label class="control-label">Make it star account</label>
									</div> -->
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Account Name</label>
											<div class="col-md-9">
												<input type="text" name="accName" id="accountName" class="form-control" required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Account No </label>
											<div class="col-md-9">
												<input type="text" name="accNo" id="accountNumber" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Primary Phone </label>
											<div class="col-md-9">
												<input type="text" name="officePhone" id="phone" class="form-control">
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Website </label>
											<div class="col-md-9">
												<input type="url" name="website" id="website" class="form-control">
											</div>
										</div>
									</div>

			            <!-- <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Ticker Symbol </label>
		                    <div class="col-md-9">
		                        <input name="tickerSymbol" id="targetdate" class="date-picker form-control" type="text">
		                    </div>
		                </div> -->
		                <div class="row">
		                	<div class="form-group col-md-6">
		                		<label class="control-label col-md-3">Fax </label>
		                		<div class="col-md-9">
		                			<input type="text" name="fax" id="fax" class="form-control">
		                		</div>
		                	</div>
		                	<div class="form-group col-md-6">
		                		<label class="control-label col-md-3">Email </label>
		                		<div class="col-md-9">
		                			<input type="email" name="email" id="email" class="form-control">
		                		</div>
		                	</div>
		                </div>
			            <!-- <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Member Of </label>
			                <div class="col-md-9">
			                    <div class="input-group">
			                        <input type="text" name="memberOf" id="relatedto" class="form-control">
			                        <a href="<?php echo site_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
			                    </div>
			                </div>
			            </div> -->
			            <!-- <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Employees</label>
			                <div class="col-md-9">
			                    <input type="text" name="employees" id="employees" class="form-control">
			                </div>
			            </div> -->
			            <div class="row">
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Secondary Phone</label>
			            		<div class="col-md-9">
			            			<input type="text" name="secondPhone" id="secondPhone" class="form-control">
			            		</div>
			            	</div>
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Secondary Email</label>
			            		<div class="col-md-9">
			            			<input type="email" name="secondEmail" id="secondEmail" class="form-control">
			            		</div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Ownership</label>
			            		<div class="col-md-9">
			            			<input type="text" name="ownerShip" id="ownerShip" class="form-control">
			            		</div>
			            	</div>
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Industry </label>
			            		<div class="col-md-9">
			            			<select class="form-control" name="industry" id="industry">
			            				<option value="">--None--</option>
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
			            </div>
			            <div class="row">
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Rating </label>
			            		<div class="col-md-9">
			            			<select name="rating" id="rating" class="form-control">
			            				<option value="">--None--</option>
			            				<option value="Acquired">Acquired</option>
			            				<option value="Active">Active</option>
			            				<option value="Market Failed">Market Failed</option>
			            				<option value="Project Cancelled">Project Cancelled</option>
			            				<option value="Shutdown">Shutdown</option>
			            			</select>
			            		</div>
			            	</div>
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Type </label>
			            		<div class="col-md-9">
			            			<select name="accounttype" id="accounttype" class="form-control">
			            				<option value="--None--">--None--</option>
			            				<option value="Analyst">Analyst</option>
			            				<option value="Competitor">Competitor</option>
			            				<option value="Customer">Customer</option>
			            				<option value="Integrator">Integrator</option>
			            				<option value="Investor">Investor</option>
			            				<option value="Partner">Partner</option>
			            				<option value="Press">Press</option>
			            				<option value="Prospect">Prospect</option>
			            				<option value="Reseller">Reseller</option>
			            				<option value="Other">Other</option>
			            			</select>
			            		</div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">SIC Code </label>
			            		<div class="col-md-9">
			            			<input type="text" name="siccode" id="siccode" class="form-control">
			            		</div>
			            	</div>
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Annual Revenue</label>

			            		<div class="col-md-9">
			            			<div class="input-group">
			            				<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
			            				<input type="text" name="annualRevenue" id="annualRevenue" class="form-control" >
			            			</div>
			            		</div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="form-group col-md-6">
			            		<label class="control-label col-md-3">Assigned To <span class="required">*</span></label>
			                <!-- <div class="col-md-4">
			                    <label class="control-label">
			                        <input type="radio" name="assigntype" checked="checked" value="U" onclick="toggleAssignType(this.value)"> User &nbsp;
			                        <input type="radio" name="assigntype" value="T" onclick="toggleAssignType(this.value)"> Group
			                    </label>
			                </div> -->
			                <div class="col-md-9">
			                	<span id="assign_user">
			                		<select name="assigned_user_id" id="assigned_user_id" class="form-control">
			                			<option value="">Select</option>
			                			<?php foreach ($users as $r) { ?>
			                			<option value="<?php echo $r->ID; ?>"><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
			                			<?php } ?>
			                		</select>
			                	</span>
			                    <!-- <span id="assign_team">
			                        <select name="assigned_team_id" class="form-control">
			                        <?php foreach ($groups as $r) { ?>
			                            <option value="<?php echo $r->groupid; ?>"><?php echo ucfirst($r->groupname); ?></option>
			                        <?php } ?>
			                        </select>
			                    </span> -->
			                </div>
			            </div>
			        </div>
			        <div class="form-group col-md-6">&nbsp;</div>
			        <div class="row">&nbsp;</div>
			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<h4 class="box-title">Address Information</h4>


			        	</div>
			        	<div class="form-group col-md-3">
			        		<a id="locate_map_mailing" class="btn btn-xs btn-primary" data-title="Locate Mailing Map" data-toggle="lightbox" data-parent="" data-gallery="remoteload" >Locate Mailing Map</a>
			        	</div>
			        	<div class="form-group col-md-3">
			        		<a id="locate_map_other" class="btn btn-xs btn-primary" data-title="Locate Other Map" data-toggle="lightbox" data-parent="" data-gallery="remoteload" >Locate Other Map</a>
			        	</div>
			        	
			        </div>

			        
			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing Street </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bstreet" id="bstreet" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping Street </label>
			        		<div class="col-md-9">
			        			<input type="text" name="sstreet" id="sstreet" class="form-control">
			        		</div>
			        	</div>
			        </div>

			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing PO Box </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bpo" id="bpo" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping PO Box </label>
			        		<div class="col-md-9">
			        			<input type="text" name="spo" id="spo" class="form-control">
			        		</div>
			        	</div>
			        	
			        </div>
			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing City </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bcity" id="bcity" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping City </label>
			        		<div class="col-md-9">
			        			<input type="text" name="scity" id="scity" class="form-control">
			        		</div>
			        	</div>
			        	
			        </div>
			        <div class="row">
			        	
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing State </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bstate" id="bstate" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping State </label>
			        		<div class="col-md-9">
			        			<input type="text" name="sstate" id="sstate" class="form-control">
			        		</div>
			        	</div>
			        </div>

			        

			        

			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing ZIP Code </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bzip" id="bzip" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping ZIP Code </label>
			        		<div class="col-md-9">
			        			<input type="text" name="szip" id="szip" class="form-control">
			        		</div>
			        	</div>
			        	
			        </div>
			        <div class="row">
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Billing Country </label>
			        		<div class="col-md-9">
			        			<input type="text" name="bcountry" id="bcountry" class="form-control">
			        		</div>
			        	</div>
			        	<div class="form-group col-md-6">
			        		<label class="control-label col-md-3">Shipping Country </label>
			        		<div class="col-md-9">
			        			<input type="text" name="scountry" id="scountry" class="form-control">
			        		</div>
			        	</div>
			        	
			        </div>
			        <div class="row">&nbsp;</div>

			        <h4 class="box-title">Description Information</h4>

			        <div class="row">
			        	<div class="form-group col-md-12">
			        		<label class="control-label col-md-2">Description </label>
			        		<div class="col-md-10">
			        			<textarea name="description" id="description" class="form-control" rows="3"></textarea>
			        		</div>
			        	</div>
			        </div>
			        <div class="ln_solid"></div>
			        <div class="form-group">
			        	<div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
			        		
			        		<button type="submit" class="btn btn-primary">Update</button>
			        		<button type="button" class="btn btn-primary" onclick="oDiv(0)">Exit</button>
			        	</div>
			        </div>
			        <hr />
			    </div><!-- /.box-body -->
			    <hr>
			</form>
		</div><!-- /.col -->
	</div><!-- /.col -->
</div>
</div>
<div id="popTagBox"></div>
<?php $this->load->view('Partial/pageFooter'); ?>
<script type="text/javascript">
function callTurnBox(id) {
	$('#clickTab').trigger('click', [true]);
	console.log(id);

	ajaxDataSend(id);
}
</script>
<script type="text/javascript">

var myStararray = new Array();
var myProarray = new Array();
var myOtherarray = new Array();

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
    // function toggleAssignType(currType)
    // {
    //     if (currType == "U")
    //     {
    //         $("#assign_user").show("slow");
    //         $("#assign_team").hide("slow");
    //     }
    //     else
    //     {
    //         $("#assign_user").hide("slow");
    //         $("#assign_team").show("slow");
    //     }
    // }
    </script>
    <script type="text/javascript">
    function createPro(){
    	var accName = $("#accName").val();
    	var accNo = $("#accNo").val();
    	var officePhone = $("#officePhone").val();

    	var request = $.ajax({
    		url: "<?php echo site_url("yzy-accounts/index/addAccount"); ?>",
    		method: "POST",
    		data: {accName: accName, accNo: accNo, officePhone: officePhone},
    		dataType: "json"
    	});

    	request.done(function( rsp ) {
    		if(rsp.message == "ok"){
    			location.reload();
    			// var str = '<tr>';
    			// str += '<td><a href="#">'+accName+'</a></td>';
    			// str +='<td>'+accNo+'</td>';
    			// str +='<td>'+officePhone+'</td>';
    			// str +='<td>&nbsp;</td>';
    			// str +='<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDiv(\'asdasd\')"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>';
    			// str +='</tr>';

    			// $("#myAccListView").append(str);
    			// $('#pForm')[0].reset();
    			// closeDiv('propertiesBox');
    		}else{
    			alert("Something error...");
    		}
    	});
    	request.fail(function(){
    		console.log("Fail to rename...");
    	});
    }
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
    <?php echo "var jqAccInfo = ". json_encode($jqAllAccInfo) . ";\n"; ?>



    
    
    // function drawTableDesign(accName, accNo, officePhone, accid){
    // 	var str = '<tr>';
    // 	str += '<td><a href="#">'+accName+'</a></td>';
    // 	str +='<td>'+accNo+'</td>';
    // 	str +='<td>'+officePhone+'</td>';
    // 	str +='<td>&nbsp;</td>';
    // 	str +='<td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDiv('+accid+')"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>';
    // 	str +='</tr>';
    // 	return str;
    // }

 //    function searchBox(v){
 //    	var key = v.toLowerCase().trim();
 //    	var uid = "<?php echo $id; ?>";
 //    	var star_design = "";
 //    	var my_design = "";
 //    	var other_design = "";

 //    	for(var i=0;i<jqAccInfo.length;i++){
 //    		var str = (jqAccInfo[i].accountname).toLowerCase().trim();
 //    		if(str.indexOf(key) > -1){
	// 			// console.log(jqAccInfo[i].accountname);
	// 			if(jqAccInfo[i].favorite == 1 && (jqAccInfo[i].createdby == uid || jqAccInfo[i].assign_to == uid)){
	// 				star_design += drawTableDesign(jqAccInfo[i].accountname, jqAccInfo[i].account_no, jqAccInfo[i].phone, jqAccInfo[i].accountid);
	// 			}
	// 			else if(jqAccInfo[i].favorite == 0 && jqAccInfo[i].createdby == uid && jqAccInfo[i].assign_to == ""){
	// 				my_design += drawTableDesign(jqAccInfo[i].accountname, jqAccInfo[i].account_no, jqAccInfo[i].phone, jqAccInfo[i].accountid);
	// 			}else if(jqAccInfo[i].createdby == uid && jqAccInfo[i].assign_to != ""){
	// 				other_design += drawTableDesign(jqAccInfo[i].accountname, jqAccInfo[i].account_no, jqAccInfo[i].phone, jqAccInfo[i].accountid);
	// 			}
	// 		}
	// 	}
	// 	$("#starAccListView table tbody").html("");
	// 	$("#starAccListView table tbody").html(star_design);

	// 	$("#myAccListView table tbody").html("");
	// 	$("#myAccListView table tbody").html(my_design);

	// 	$("#otherAccListView table tbody").html("");
	// 	$("#otherAccListView table tbody").html(other_design);
	// }
	var user_id = "<?php echo $id; ?>";
	function drawDiv(datadiv){
		var ci_baseurl="<?php echo site_url(); ?>";
		var acc_url = "".concat(ci_baseurl,"yzy-accounts/index/account_details/",datadiv.accountid);
		
		if(datadiv.favorite == 1){
			star_color="f9a50f";
			star_fun="delStar";
		}else{
			star_color="888888";
			star_fun="goStar";
		}
		
		
		var str ='<div id="divacc'+datadiv.accountid+'" class="col-lg-3 likeIT" style="min-height:200px;border-radius: 8px;background-color: #FFFFFF;margin: 0px 20px 20px 0;">';
		str +='<div id="div_showsettings" onclick="oDiv(\''+datadiv.accountid+'\')" style="cursor: pointer;">';
		// first row
		str +='<div class="row"  style="padding:5px;cursor: pointer;">';

		str +='<div class="col-lg-1" >';
		if (datadiv.createdby === user_id)
			str +='<span class="label label-danger">M</span>';
		else 
			str +='<span class="label label-danger">O</span>';
		str +='</div>';

		str +='<div class="col-lg-8" >';
		str +='<span id="divdata_name" style="color:#6E777B;font-size:large;font-weight: bold">'+datadiv.accountname+'</span>';
		str +='</div>';

		str +='<div class="col-lg-2 test">';
		str +='<button  data-type="'+datadiv.star_type+'" data-id="'+datadiv.accountid+'" onclick="'+star_fun+'('+datadiv.accountid+ ')" type="button" class="btn btn-default pull-right"><i class="fa fa-star" style="color: #'+star_color+';"></i></button>';
		str +='<button type="button" data-archive="'+datadiv.archivestatus+'"  class="btn btn-default pull-right" onclick="oArc('+datadiv.accountid+','+datadiv.archivestatus+','+datadiv.favorite+')"><i class="fa fa-archive"></i></button>';
		str +='</div>';

		str +='</div>';
		// second row
		str +='<div class="col-lg-12" style="border-bottom-style: groove;padding-bottom: 5px;">';
		str +='<div class="col-lg-12">';
		str +='<span class="div-data-info" style="color:black;display:block;"><b>Phone: </b><span id="divdata_phone"> '+datadiv.phone+'</span> , ';
		str +='<span class="div-data-info" style="color:black;display:block;"><b>Email: </b><a id="divdata_email" href="mailto:'+datadiv.email1+'">'+datadiv.email1+'</a>, </span>'; 
		str +='<span class="div-data-info" style="color:black;display:block;"><b>Website: </b><a id="divdata_website" target="_blank" href="'+datadiv.website+'">'+datadiv.website+'</a></span>';
		str +='</div>';
		str +='</div>';
		str+='</div>';
		// third row
		
		str +='<div class="row" >';
		str +='<div class="col-lg-12" style="padding:5px;">';

		str+='<div class="col-lg-2"><a title="Show Associated Projects" href="#popupProjects' + datadiv.accountid + '" role="button" data-toggle="modal-popover" data-trigger="modal-hover" data-placement="bottom" ><i class="fa fa-suitcase"></i> </a></div>';
		str+='<div class="col-lg-2"><a title="Show Associated Contacts" href="#popupContacts' + datadiv.accountid + '" role="button" data-toggle="modal-popover" data-trigger="modal-hover" data-placement="bottom" ><i class="fa fa-phone-square"></i> </a></div>';
		str+='<div class="col-lg-2"><a title="Show Associated Potentials" href="#popupPotentials' + datadiv.accountid + '" role="button" data-toggle="modal-popover" data-trigger="modal-hover" data-placement="bottom" ><i class="fa fa-line-chart"></i> </a></div>';
		str+='<div class="col-lg-2"><a title="Show Associated Quotes" href="#popupQuotes' + datadiv.accountid + '" role="button" data-toggle="modal-popover" data-trigger="modal-hover" data-placement="bottom" ><i class="fa fa-quote-right"></i> </a></div>';
		str+='<div class="col-lg-2"><a title="Show Associated Invoices" href="#popupInvoices' + datadiv.accountid + '" role="button" data-toggle="modal-popover" data-trigger="modal-hover" data-placement="bottom" ><i class="fa fa-usd"></i> </a></div>';
		str+='<div class="col-lg-2" style="color: #000000;">';
		str+='<a href="'+acc_url+'" class="btn btn-default btn-xs pull-right" title="More Info" >See more</a>';
		str+='</div>';

		str+='</div>';
		str+='</div>';
		

		str+='</div>';
		
		$.ajax({
			url: '<?php echo site_url(); ?>yzy-accounts/index/getPopupInfo',
			type: 'POST',
			data: {accid: datadiv.accountid},
			dataType: "json",
			beforeSend: function () {
				console.log("Emptying");
			},
			success: function (data, textStatus) {
				console.log("get infosssss:");
				console.log(data);
				$.each(data, function (key, value) {
					
					var design="";
					
					if(key=="Projects"){
						design +='<div id="popup'+key+ datadiv.accountid +'" class="popover" style="width:275px;">';
						design += '<div class="col-lg-12"><div class="box-header with-border">';
						design += '<h3 class="box-title" style="color:#3C8DBC;">Associated '+ key +':</h3>';
						$.each(data.Projects, function (key, value) {
							design += '<table style="width: 80%; text-align:left;margin-left:20px;border-bottom:1px solid #000000;"><tr><td colspan="2">'+value.projectname+'</td></tr></table>';

						});
					}
					if(key=="Contacts"){
						design +='<div id="popup'+key+ datadiv.accountid +'" class="popover" style="width:275px;">';
						design += '<div class="col-lg-12"><div class="box-header with-border">';
						design += '<h3 class="box-title" style="color:#3C8DBC;">Associated '+ key +':</h3>';
						$.each(data.Contacts, function (key, value) {
							design += '<table style="width: 80%; text-align:left;margin-left:20px;border-bottom:1px solid #000000;"><tr><td colspan="2">'+value.lastname+'</td></tr></table>';

						});
					}
					if(key=="Potentials"){
						design +='<div id="popup'+key+ datadiv.accountid +'" class="popover" style="width:275px;">';
						design += '<div class="col-lg-12"><div class="box-header with-border">';
						design += '<h3 class="box-title" style="color:#3C8DBC;">Associated '+ key +':</h3>';
						$.each(data.Potentials, function (key, value) {
							design += '<table style="width: 80%; text-align:left;margin-left:20px;border-bottom:1px solid #000000;"><tr><td colspan="2">'+value.potentialname+'</td></tr></table>';

						});
					}
					if(key=="Quotes"){
						design +='<div id="popup'+key+ datadiv.accountid +'" class="popover" style="width:275px;">';
						design += '<div class="col-lg-12"><div class="box-header with-border">';
						design += '<h3 class="box-title" style="color:#3C8DBC;">Associated '+ key +':</h3>';
						$.each(data.Quotes, function (key, value) {
							design += '<table style="width: 80%; text-align:left;margin-left:20px;border-bottom:1px solid #000000;"><tr><td colspan="2">'+value.subject+'</td></tr></table>';

						});
					}
					if(key=="Invoices"){
						design +='<div id="popup'+key+ datadiv.accountid +'" class="popover" style="width:275px;">';
						design += '<div class="col-lg-12"><div class="box-header with-border">';
						design += '<h3 class="box-title" style="color:#3C8DBC;">Associated '+ key +':</h3>';
						$.each(data.Invoices, function (key, value) {
							design += '<table style="width: 80%; text-align:left;margin-left:20px;border-bottom:1px solid #000000;"><tr><td colspan="2">'+value.subject+'</td></tr></table>';

						});
					}
					design += '</div></div>';
					design += '<div id="popTag'+ datadiv.accountid +'" style="padding: 5px;"></div>';
					design += '<img id="popTagImg'+ datadiv.accountid +'" style="display:none;padding: 3% 0% 0% 44%;" src="<?php echo base_url(); ?>require/images/lo.gif" />';
					design += '<div class="arrow"></div>';
					design += '<div class="popover-content"></div>';

					$("#popTagBox").append(design);

				});



},
error: function (jqXHR, textStatus, errorThrown) {
					// Some code to debbug e.g.:               
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
return str;
}
function oArc(pid,pstatus,pstar){
	var ptype="<?php echo $menuName; ?>";

	$.ajax({
		url: '<?php echo site_url(); ?>yzy-accounts/index/updateArchive',
		type: 'POST',
		data: {pid: pid, pstatus: pstatus, pstar:pstar, ptype:ptype},
		dataType: "html",
		beforeSend: function () {
			console.log("Emptying");
		},
		success: function (data, textStatus) {
			alert(data);
			location.reload();

		},
		error: function (jqXHR, textStatus, errorThrown) {
					// Some code to debbug e.g.:               
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
}
function goStar(conid){

	$.ajax({
		url: '<?php echo site_url(); ?>yzy-accounts/index/updateStar',
		type: 'POST',
		data: {Cid: conid},
		dataType: "html",
		beforeSend: function () {


		},
		success: function (data, textStatus) {
			location.reload();

		},
		error: function (jqXHR, textStatus, errorThrown) {
				// Some code to debbug e.g.:               
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

}
function delStar(conid){

	$.ajax({
		url: '<?php echo site_url(); ?>yzy-accounts/index/delStar',
		type: 'POST',
		data: {Cid: conid},
		dataType: "html",
		beforeSend: function () {


		},
		success: function (data, textStatus) {
			location.reload();

		},
		error: function (jqXHR, textStatus, errorThrown) {
				// Some code to debbug e.g.:               
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

}
function viewstyle(type){
	if(type == "grd"){

		$(".div-data-info").css("display", "block");

		var uid = "<?php echo $id; ?>";
		var star_design = "";
		var my_design = "";
		var other_design = "";

		for(var i=0;i<jqAccInfo.length;i++){


			if(jqAccInfo[i].favorite == 1){
				star_design += drawDiv(jqAccInfo[i]);
			}
			else{
				if(jqAccInfo[i].archivestatus ==0){
					my_design += drawDiv(jqAccInfo[i]);

				}else{other_design += drawDiv(jqAccInfo[i]);}
			}
		}

		$("#starAccListView").hide();
		$("#starAccGrdView").html(star_design);
		$("#starAccGrdView").show();
			// console.log(star_design);
			$("#myAccListView").hide();
			$("#myAccGrdView").html(my_design);
			$("#myAccGrdView").show();
			// console.log(my_design);
			$("#otherAccListView").hide();
			$("#otherAccGrdView").html(other_design);
			$("#otherAccGrdView").show();
			// console.log(other_design);
			$("#grd").hide();
			$("#lst").show();
		} else if(type == "lst"){
			$('.likeIT').toggleClass( 'col-lg-3','col-lg-12');
			$(".div-data-info").css("display", "inline");
			// $("#starAccGrdView").hide();
			// $("#starAccListView").show();
			
			// $("#myAccGrdView").hide();
			// $("#myAccListView").show();
			
			// $("#otherAccGrdView").hide();
			// $("#otherAccListView").show();

			$("#lst").hide();
			$("#grd").show();
		}
	}

	function oDiv(accid){
		if(accid){
			$.ajax({
				url: '<?php echo site_url(); ?>yzy-accounts/index/getbyID/'+accid,
				dataType: "JSON",
				type: "POST",
				success : function(data) {
					$("#togPopH").html(data.updated_data[0].accountname);
					if(data.updated_data[0].favorite == 1)
						$("#accStar").prop('checked', true);
					else
						$("#accStar").prop('checked', false);
					$("#accId").val(data.updated_data[0].accountid);
					$("#accountName").val(data.updated_data[0].accountname);
					$("#accountNumber").val(data.updated_data[0].account_no);
					$("#phone").val(data.updated_data[0].phone);
					$("#website").val(data.updated_data[0].website);
					$("#fax").val(data.updated_data[0].fax);
					$("#email").val(data.updated_data[0].email1);
					$("#description").val(data.updated_data[0].description);
					$("#annualRevenue").val(data.updated_data[0].annualrevenue);
			// $("#relatedto").val(data.updated_data[0].assign_to);

			// $("#employees").val(data.updated_data[0].employees);
			$("#secondPhone").val(data.updated_data[0].otherphone);
			$("#secondEmail").val(data.updated_data[0].email2);
			$("#ownerShip").val(data.updated_data[0].ownership);
			$("#siccode").val(data.updated_data[0].siccode);
			$("#assigned_user_id").val(data.updated_data[0].assign_to);
			$("#industry option").filter(function() {
				return $(this).val() == data.updated_data[0].industry; 
			}).prop('selected', true);
			$("#rating option").filter(function() {
				return $(this).val() == data.updated_data[0].rating; 
			}).prop('selected', true);
			$("#accounttype option").filter(function() {
				return $(this).val() == data.updated_data[0].account_type; 
			}).prop('selected', true);
			var baseloc="<?php echo base_url(); ?>";
			
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
						//console.log(data['bill'][0].bill_city);
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

						var loc_add_mailing="";
						if(data['bill'][0].bill_street !="") loc_add_mailing+=data['bill'][0].bill_street;
						if(data['bill'][0].bill_pobox !="") loc_add_mailing+=" "+data['bill'][0].bill_pobox;
						if(data['bill'][0].bill_city !="") loc_add_mailing+=" "+data['bill'][0].bill_city;
						if(data['bill'][0].bill_state !="") loc_add_mailing+=" "+data['bill'][0].bill_state;
						if(data['bill'][0].bill_country !="") loc_add_mailing+=" "+data['bill'][0].bill_country;
						if(data['bill'][0].bill_code !="") loc_add_mailing+=" "+data['bill'][0].bill_code;

						
						$("#locate_map_mailing").attr("href",baseloc+"modulecontrol/popuplocation/"+ encodeURI(loc_add_mailing));

						var loc_add_other="";
						if(data['ship'][0].ship_street !="") loc_add_other+=data['ship'][0].ship_street;
						if(data['ship'][0].ship_pobox !="") loc_add_other+=" "+data['ship'][0].ship_pobox;
						if(data['ship'][0].ship_city !="") loc_add_other+=" "+data['ship'][0].ship_city;
						if(data['ship'][0].ship_state !="") loc_add_other+=" "+data['ship'][0].ship_state;
						if(data['ship'][0].ship_country !="") loc_add_other+=" "+data['ship'][0].ship_country;
						if(data['ship'][0].ship_code !="") loc_add_other+=" "+data['ship'][0].ship_code;
						
						$("#locate_map_other").attr("href",baseloc+"modulecontrol/popuplocation/"+ encodeURI(loc_add_other));

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
	        // return false;

			// console.log(jqAccBilling);
		},
		error: function (jqXHR, textStatus, errorThrown) {

			console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
		}
	});
			// var position = "";
			// for(var i = 0; i < jqAccInfo.length; i++){
			// 	if((jqAccInfo[i].accountid).indexOf(accid) > -1)
			// 		position = i;
			// }
			
			
		}
		
		// Set the effect type
		var effect = 'slide';

	    // Set the options for the effect type chosen
	    var options = { direction: 'right' };

	    // Set the duration (default: 400 milliseconds)
	    var duration = 500;

	    $('#myDiv').toggle(effect, options, duration);

	    // console.log(jqAccInfo);
	}
	</script>
	<script type="text/javascript">
	$(document).ready(function () {
		$("#click_view_grd").trigger("click", [true]);

		$("div#div_showsettings a").click(function(e) { e.stopPropagation(); })
		$("div#div_showsettings button").click(function(e) { e.stopPropagation(); })
	});
	</script>

	<script type="text/javascript">
	$( window ).load(function() {
		$("#update_ok").hide();
		$("#update_not").hide();

		$(document).on('keyup keypress change', '#form_dataset :input', function(e,isScriptInvoked) {
			if (isScriptInvoked === true) {

			} else {
				$("#update_not").show();
				$("#update_ok").hide();
			}
		});
	});
	</script>
	
	<!-- script to update data dynamically -->
	<script type="text/javascript">
	

	$('form[name=form_dataset]').submit(function(e) {

		e.preventDefault();
		var formData = new FormData($(this)[0]);

		$.ajax({
			url : this.action,
			type : this.method,
			data : formData,
			contentType: false,
			processData: false,
			
			success : function(updated_id) {
				
				$.ajax({
					url: '<?php echo site_url(); ?>yzy-accounts/index/getbyID/'+$('#accId').val(),
					dataType: "JSON",
					type: "POST",
					success : function(response) {
						$('#divacc'+response.updated_data[0].accountid +' #divdata_name').html(response.updated_data[0].accountname);
						$('#divacc'+response.updated_data[0].accountid +' #divdata_phone').html(response.updated_data[0].phone);
						$('#divacc'+response.updated_data[0].accountid +' #divdata_email').html(response.updated_data[0].email1).attr("href", 'mailto:'+response.updated_data[0].email1);
						$('#divacc'+response.updated_data[0].accountid +' #divdata_website').html(response.updated_data[0].website).attr("href", response.updated_data[0].website);
						
						$("#update_not").hide();
						$("#update_ok").show();
					},
					error: function (jqXHR, textStatus, errorThrown) {

						console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
					}
				});
			},
			error: function (jqXHR, textStatus, errorThrown) {

				console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
			}
		});
});
</script>


