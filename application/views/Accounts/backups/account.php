<?php $this->load->view('Partial/pageHeader'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="row">
	    <div class="col-lg-12" style="background-color: #1f5c87;height: 50px;">
	    	<div class="col-lg-4">
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
	    	<div class="col-lg-4" style="padding-left: 10%;">
	    		<ul class="nav navbar-nav">
          			<li class="dropdown notifications-menu">
	                	<a href="#" style="font-size: 16px;">Contacts</a>
	              	</li>
	              	<li class="dropdown notifications-menu">
	                	<a href="#" style="font-size: 16px;">Potentials</a>
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
													<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Contact</a>
												</div>
							                 	<div class="table-responsive" style="background: #FFF; color:#000;">
					                                <table class="table table-striped table-bordered table-hover">
					                                    <thead>
					                                        <tr>
					                                            <th>Account Name</th>
					                                            <th>Last Name</th>
					                                            <th>First Name</th>
					                                            <th>Mobile</th>
					                                            <th style="text-align:center;">Action</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody id="accListView">
					                                    	<?php if(isset($allContacts) AND $allContacts != "") foreach($allContacts as $value){?>
										                        <tr style="text-align:left;">
										                            <td><?php echo $value->accountid;?></td>
										                            <td><a href="#"><?php echo $value->firstname;?></a></td>
										                            <td><a href="#"><?php echo $value->lastname;?></a></td>
										                            <td><?php echo $value->mobile;?></td>
										                            <td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDiv('<?php echo $value->accountid;?>')"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>
										                        </tr>
										                    <?php } ?>
					                                    </tbody>
					                                </table>
					                            </div>
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
													<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New Potentials</a>
												</div>
							                 	<div class="table-responsive" style="background: #FFF; color:#000;">
					                                <!-- <table class="table table-striped table-bordered table-hover">
					                                    <thead>
					                                        <tr>
					                                            <th>Account Name</th>
					                                            <th>Account No</th>
					                                            <th>Phone</th>
					                                            <th>Website</th>
					                                            <th style="text-align:center;">Action</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody id="accListView">
					                                    	<?php foreach($allAccounts as $value){?>
										                        <tr style="text-align:left;">
										                            <td><a href="<?php echo site_url()."yzy-accounts/index/account_details/".$value->accountid; ?>"><?php echo $value->accountname;?></a></td>
										                            <td><?php echo $value->account_no;?></td>
										                            <td><?php echo $value->phone;?></td>
										                            <td><?php echo $value->website;?></td>
										                            <td align="center"><i class="fa fa-gear" style="cursor: pointer;" onclick="oDiv('<?php echo $value->accountid;?>')"></i> | <i class="fa fa-trash" style="cursor: pointer;"></i></td>
										                        </tr>
										                    <?php } ?>
					                                    </tbody>
					                                </table> -->
					                            </div>
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
													<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
												</div>
							                 	<div class="table-responsive" style="background: #FFF; color:#000;">
					                                
					                            </div>
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
													<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
												</div>
							                 	<div class="table-responsive" style="background: #FFF; color:#000;">
					                                
					                            </div>
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
					    			<!-- <div class="col-lg-12">
					    				<div class="box box-solid bg-teal-gradient" style="background: #2C6A95 !important;   background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2C6A95 ), color-stop(1, #2C6A95 )) !important;">
							                <div class="box-header" data-widget="collapse" style="background: #184c71;">
							                  <i class="fa fa-arrow-up"></i>
							                  <span style="margin-left: 5px;">
							                  		<h3 class="box-title">Services</h3>
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
													<a href="<?php echo site_url().'yzy-contacts/index/contact'; ?>" class="btn btn-block btn-info btn-sm" style="background-color: #27b6ba;"><i class="fa fa-plus"></i> New</a>
												</div>
							                 	<div class="table-responsive" style="background: #FFF; color:#000;">
					                            
					                            </div>
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
<div id="myDiv">
	<div class="togPop" style="cursor:pointer;" onclick="oDiv(0)"><i class="fa fa-close cl"></i></div>
	<div class="row">
		<div class="col-lg-12">
			<div style="font-size: 17px;"><p id="togPopH"></p></div>
			<p class="small" style="color:#616161">Date: <?php echo date("Y-m-d"); ?></p>
		</div>
	</div>
	
	<div class="row">
        <div class="col-md-12">
          	<!-- Custom Tabs -->
          	<div class="box">
          	<div class="box-body" style="height: 600px;min-height: 400px;overflow-x: hidden;overflow-y: auto;">
          			<form action="<?php echo site_url()."yzy-accounts/index/addAccount/update"; ?>" method="POST">
          				<input type="hidden" name="accId" id="accId">
          				<div class="form-group col-md-12">
			                <input type="checkbox" name="accStar" id="accStar">
			                <label class="control-label">Make it star account</label>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Account Name</label>
			                <div class="col-md-9">
		                        <input type="text" name="accName" id="accountName" class="form-control" required>
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Account No </label>
			                <div class="col-md-9">
			                    <input type="text" name="accNo" id="accountNumber" class="form-control" required>
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Primary Phone </label>
			                <div class="col-md-9">
		                        <input type="text" name="officePhone" id="phone" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Website </label>
			                <div class="col-md-9">
		                        <input type="text" name="website" id="website"class="form-control">
			                </div>
			            </div>

			            <!-- <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Ticker Symbol </label>
		                    <div class="col-md-9">
		                        <input name="tickerSymbol" id="targetdate" class="date-picker form-control" type="text">
		                    </div>
			            </div> -->
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Fax </label>
			                <div class="col-md-9">
		                        <input type="text" name="fax" id="fax" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Email </label>
			                <div class="col-md-9">
			                    <input type="email" name="email" id="email" class="form-control">
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
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Secondary Phone</label>
			                <div class="col-md-9">
			                    <input type="text" name="secondPhone" id="secondPhone" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Secondary Email</label>
			                <div class="col-md-9">
		                        <input type="email" name="secondEmail" id="secondEmail" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Ownership</label>
			                <div class="col-md-9">
			                    <input type="text" name="ownerShip" id="ownerShip" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
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
			            <div class="form-group col-md-12">
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
			            <div class="form-group col-md-12">
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
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">SIC Code </label>
			                <div class="col-md-9">
			                    <input type="text" name="siccode" id="siccode" class="form-control">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Annual Revenue</label>

			                <div class="col-md-9">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
			                        <input type="text" name="annualRevenue" id="annualRevenue" class="form-control" >
			                    </div>
			                </div>
			            </div>
			            <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Assigned To <span class="required">*</span></label>
			                <div class="col-md-4">
			                    <label class="control-label">
			                        <input type="radio" name="assigntype" class="customDisable" checked="checked" value="U" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo "checked";  ?> onclick="toggleAssignType(this.value)"> User &nbsp;
			                        <input type="radio" name="assigntype" class="customDisable" value="T" onclick="toggleAssignType(this.value)"> Group
			                    </label>
			                </div>
			                <div class="col-md-9">
			                    <span id="assign_user">
			                        <select name="assigned_user_id" class="form-control">
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

			            <!-- <div class="form-group col-md-12">
			                <label class="control-label col-md-3">Email Opt Out</label>
			                <div class="col-md-9 checkbox">
			                    <input type="checkbox" name="emailoptout" value="1">
			                </div>
			            </div>
			            <div class="form-group col-md-12">
				            <label class="control-label col-md-3">Notify Owner</label>
				            <div class="col-md-9 checkbox">
				                <input type="checkbox" name="notifyOwner" value="1">
				            </div>
			            </div> -->
			            <div class="form-group col-md-12">
			                    &nbsp;
			            </div>

			            <div class="row">&nbsp;</div>
			            <div class="row">&nbsp;</div>
			            <h4 class="box-title">Address Information</h4>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing City </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bcity" id="bcity" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing ZIP Code </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bzip" id="bzip" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing Country </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bcountry" id="bcountry" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing State </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bstate" id="bstate" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing Street </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bstreet" id="bstreet" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Billing PO Box </label>
		                    <div class="col-md-9">
	                            <input type="text" name="bpo" id="bpo" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping City </label>
		                    <div class="col-md-9">
	                            <input type="text" name="scity" id="scity" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping ZIP Code </label>
		                    <div class="col-md-9">
	                            <input type="text" name="szip" id="szip" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping Country </label>
		                    <div class="col-md-9">
	                            <input type="text" name="scountry" id="scountry" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping State </label>
		                    <div class="col-md-9">
	                            <input type="text" name="sstate" id="sstate" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping Street </label>
		                    <div class="col-md-9">
	                            <input type="text" name="sstreet" id="sstreet" class="form-control">
		                    </div>
			            </div>
			            <div class="form-group col-md-12">
		                    <label class="control-label col-md-3">Shipping PO Box </label>
		                    <div class="col-md-9">
	                            <input type="text" name="spo" id="spo" class="form-control">
		                    </div>
			            </div>
			            <div class="row">&nbsp;</div>
			            <div class="row">&nbsp;</div>
			            <h4 class="box-title">Description Information</h4>
			            <div class="form-group col-md-11">
		                    <label class="control-label col-md-2">Description </label>
		                    <div class="col-md-10">
	                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
		                    </div>
			            </div>
			            <div class="ln_solid"></div>
			            <div class="form-group">
			                <div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
			                    <?php //if($pid != -1) { ?><button type="button" class="btn btn-primary">Update</button> 
			                    <?php //} else { ?><button type="submit" class="btn btn-primary">Save</button><?php //} ?>
			                    <button type="button" class="btn btn-primary">Cancel</button>
			                </div>
			            </div>
			            <hr />
			        </form>
            </div><!-- /.box-body -->
            <hr>
            </div><!-- /.col -->
        </div><!-- /.col -->
	</div>
</div>
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
//    $('.date-picker').datepicker({
//        format:'yyyy-mm-dd'
//    });
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