<style>
    .datepicker{ z-index: 1000000000 !important;}
	.box-footer {
		background-color: #3c8dbc !important;
	}
	.modal-dialog{
		min-width: 700px !important;
        top: 129px; 		
	}
	.modal-header .close {
		margin-top: -10px !important;
		font-size: 31px !important;
		color: #fff;
		opacity: 9.8;
	}
	.modal-content{
	   border-top-right-radius: 47px !important;
	   border-top-left-radius: 47px !important;
	}
</style>
<form method="POST" name="addpotForm" id="addpotForm" action="<?php echo site_url()."yzy-potentials/index/addPotential"; ?>">
	

	<div class="message">
		<div class="box box-success">
			
			<div class="box-body" >
				<label class="control-label col-md-12"><b class="size-family-weight">Name the potential</b></label>

				<div class="form-group col-md-12">
					<input required type="text" id="pot_name_new" name="pot_name_new" class="form-control">
					<input type="hidden" id="load_acc_id" name="load_acc_id" class="form-control">
				</div>
				<div class="form-group col-md-12"><hr></div>

				<div class="form-group col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a class="size-family-weight" data-toggle="tab" href="#tab_description">Description</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_privacy">Privacy</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_assign">Share</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_relatedto">Related To</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_dates">Dates</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_stage">Stage</a></li>
					</ul>

					<div class="tab-content">
						<div id="tab_description" class="tab-pane fade in active">
							<h5 class="size-family-weight"><b>Provide a description</b>(Optional)</h5>
							
							<textarea class="form-control" id="newDescription" name="newDescription" type="text"></textarea>
							
						</div>

						<div id="tab_privacy" class="tab-pane fade">
							<div class="form-group col-md-12">
								<h5 class="size-family-weight"><b>Select privacy: </b></h5>
								<div class="col-lg-12">
									<select id="pot_privacy_new" name="pot_privacy_new" class="form-control">
										<option value="Private">Private</option>
										<option value="Public">Public</option>
									</select>
								</div>

							</div>
						</div>

						<div id="tab_assign" class="tab-pane fade">
							<div class="form-group col-md-12">
								<h5 class="size-family-weight"><b>Who can view this?*</b></h5>
								<div class="form-group col-md-12">

									<div class="col-md-12">
										<label class="control-label">
											<input type="radio" name="sharedtypePot_new" checked id="sharedtypePotU_new" value="U"  onclick="toggleSharedPotType(this.value)"> User &nbsp;
											<input type="radio" name="sharedtypePot_new" id="sharedtypePotG_new" value="G"  onclick="toggleSharedPotType(this.value)"> Group
										</label>
									</div>

									<div class="col-md-12">
										<span id="sharedPot_user_new" >
											<select multiple="multiple"  name="sharedPot_userid_new[]" id="sharedPot_userid_new"  class="form-control select2_multiple">
												<?php foreach ($users as $r) { ?>
												<option <?php if($id==$r->ID) echo "selected" ?>  value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
												<?php } ?>
											</select>
										</span>
										<span id="sharedPot_group_new">
											<select multiple="multiple" name="sharedPot_groupid_new[]" id="sharedPot_groupid_new" class="form-control select2_multiple">
												<?php foreach ($groups as $r) { ?>
												<option value="<?php echo $r->groupid; ?>"><?php echo ucfirst($r->groupname); ?></option>
												<?php } ?>
											</select>
										</span>
									</div>

								</div>

								


							</div>
						</div>

						<div id="tab_dates" class="tab-pane fade in">
							<div class="form-group col-md-12">
								<h5 class="size-family-weight"><b>Expected Close Date *</b></h5>

								<input type="text" name="expected_closedate_new" id="expected_closedate_new" class="datepicker form-control">
							</div>
						</div>
						<div id="tab_relatedto" class="tab-pane fade in">
							<br />
							<div class="form-group col-md-12" >
									<div class="col-md-4">

										<label class="control-label size-family-weight">Related To</label>
									</div>	

									<div class="col-lg-4">

										<select id="sel_relatedtype_new" class="form-control input-sm size-family-weight" name="sel_relatedtype_new" >
											<option value="Accounts">Accounts</option> 
											<option value="Contacts">Contacts</option> 
										</select>
									</div>

									
									<div class="col-md-4">
										
										<div class="input-group">
											<input type="text" name="relatedto_pot_new" id="selpopin_account_new" class="form-control input-sm readonly">
											<input type="hidden" readonly="" name="relatedtoid_pot_new" id="relatedtoid_pot_new" class="form-control input-sm">
											<a id="openpop_pot_relto_new" href="<?php echo base_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
										</div>
										
									</div>
								</div>
							</div>

						<div id="tab_stage" class="tab-pane fade in">
							<div class="form-group col-md-12">
								<h5 class="size-family-weight"><b>Sales Stage *</b></h5>

								<div class="col-md-12">
									<select name="sales_stage_new" tabindex="" class="form-control input-sm size-family-weight">
										<option value="Prospecting">Prospecting</option>
										<option value="Qualification">Qualification</option>
										<option value="Needs Analysis">Needs Analysis</option>
										<option value="Value Proposition">Value Proposition</option>
										<option value="Id. Decision Makers">Id. Decision Makers</option>
										<option value="Perception Analysis">Perception Analysis</option>
										<option value="Proposal/Price Quote">Proposal/Price Quote</option>
										<option value="Negotiation/Review">Negotiation/Review</option>
										<option value="Closed Won">Closed Won</option>
										<option value="Closed Lost">Closed Lost</option>
									</select>
								</div>
							</div>
						</div>

					</div>
				</div>



			</div>
			<div class="box-footer">
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
					<a href="" style="text-align:center;color: #fff;font-size: 30px;font-weight:300;left: 10%;position: relative;"><input type="submit" value="CREATE" style="background: none;border:none;"></a>
						<!--<button type="submit" class="btn btn-primary">Create</button> 
						<button type="button" onclick="closeDiv()" class="btn btn-primary">Cancel</button>-->
					</div>
				</div>    
			</div>
		</div>    
	</div>
	
</form>

<script>
$("#relatedtoid_pot_new").val($("#cur_accountid").val());
$("#selpopin_account_new").val($("#cur_accountname").val());

$("#sharedPot_group").hide();
$("#sharedPot_group_new").hide();
function toggleSharedPotType(currType)
{
	if (currType == "U")
	{
		$("#sharedPot_user_new").show("slow");
		$("#sharedPot_group_new").hide("slow");
	}
	else
	{
		$("#sharedPot_user_new").hide("slow");
		$("#sharedPot_group_new").show("slow");
	}
}
$( "#sel_relatedtype_new" ).change(function() {
	if( $( this ).val()=="Contacts" ){
		$("#openpop_pot_relto_new").attr("href", ci_baseurl+"yzy-contacts/index/popupsearch/contactdetails");
		$('[name=relatedto_pot_new]').val("");
		$('[name=relatedto_pot_new]').attr("id","selpopin_contact_new");
	}
	if( $( this ).val()=="Accounts" ){
		$("#openpop_pot_relto_new").attr("href", ci_baseurl+"modulecontrol/popupsearch/account");
		$('[name=relatedto_pot_new]').val("");
		$('[name=relatedto_pot_new]').attr("id","selpopin_account_new");
	}
});
</script>
<script>

    // $(".select2_multiple").select2({
    //   maximumSelectionLength: 10,
    //   placeholder: "Select",
    //   allowClear: true
    // });
$(".select2_multiple").select2({width: '100%'});

</script>
<script type="text/javascript">
$('.datepicker').datepicker({
	format:'yyyy-mm-dd',autoclose: true
});
$(".datepicker").datepicker("setDate", new Date());
</script>
<script>

$(".readonly").keydown(function(e){
	e.preventDefault();
});
</script>

<script type="text/javascript">
function closeDiv(){
	$(".close").trigger( "click" );
}
</script>
<script>
$(".modal-dialog").draggable();
</script>