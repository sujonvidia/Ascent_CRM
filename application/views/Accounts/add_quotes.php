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
<form method="POST" name="addQtForm" id="addQtForm" action="<?php echo site_url()."yzy-accounts/index/insertQuotes"; ?>">

<input type="hidden" name="taskid" value="<?php echo ($taskid); ?>" class="form-control">

	<div class="message">
		<div class="box box-success">
			
			<div class="box-body" >
				<label class="control-label col-md-12"><b class="size-family-weight">Name the quote</b></label>

				<div class="form-group col-md-12 add-border-bottom">
					<input required type="text" id="Qt_Subject_new" name="Qt_Subject_new" class="form-control">
					<input type="hidden" id="load_acc_id" name="load_acc_id" class="form-control">
				</div>

				<div class="form-group col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab_description">Description</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_privacy">Privacy</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_assign">Share</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_relatedto">Related To</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_address">Address</a></li>
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
									<select id="pot_privacy_new" name="pot_privacy_new" class="form-control size-family-weight">
										<option value="Private">Private</option>
										<option value="Public">Public</option>
									</select>
								</div>

							</div>
						</div>

						<div id="tab_assign" class="tab-pane fade">
							<div class="form-group col-md-12 add-border-bottom">
								<h5 class="size-family-weight"><b>Who can view this?*</b></h5>
								<div class="form-group col-md-12">

									<div class="col-md-12">
										<label class="control-label">
											<input type="radio" name="sharedtypeQt_new" checked id="sharedtypeQtU_new" value="U"  onclick="toggleSharedQtType(this.value)"> User &nbsp;
											<input type="radio" name="sharedtypeQt_new" id="sharedtypeQtG_new" value="G"  onclick="toggleSharedQtType(this.value)"> Group
										</label>
									</div>
									<div class="col-md-12">
										<span id="sharedQt_user_new" >
											<select multiple="multiple"  name="sharedQt_userid_new[]" id="sharedQt_userid_new"  class="form-control select2_multiple">
												<?php foreach ($users as $r) { ?>
												<option <?php if($id==$r->ID) echo "selected" ?>  value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->full_name); ?></option>
												<?php } ?>
											</select>
										</span>
										<span id="sharedQt_group_new">
											<select multiple="multiple" name="sharedQt_groupid_new[]" id="sharedQt_groupid_new" class="form-control select2_multiple">
												<?php foreach ($groups as $r) { ?>
												<option value="<?php echo $r->groupid; ?>"><?php echo ucfirst($r->groupname); ?></option>
												<?php } ?>
											</select>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div id="tab_relatedto" class="tab-pane fade in">
							<br />
							<div class="form-group col-md-12 ">
									<label class="control-label col-md-4 size-family-weight">Account Name</label>
									<div class="col-md-8">
										<div class="input-group">
											<input type="text" name="accountname_qtnew" id="accountname_qtnew" class="form-control input-sm readonly">
											<input type="hidden" readonly="" name="accountid_qtnew" id="accountid_qtnew" class="form-control input-sm">
											<a href="<?php echo base_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
										</div>
									</div>
								</div>
						</div>
						<div id="tab_address" class="tab-pane fade in">
							<div class="form-group col-md-12 add-border-bottom" >
								
								<h5 class="size-family-weight">Billing Address</h5>

								<div class="col-md-12">
									<textarea value="" name="bill_street_new" tabindex="" class="form-control input-sm" rows="2"></textarea>
								</div>

							</div>
							<div class="form-group col-md-12 " >

								<h5 class="size-family-weight">Shipping Address</h5>

								<div class="col-md-12 size-family-weight">
									<textarea value="" name="ship_street_new" tabindex="" class="form-control input-sm" rows="2"></textarea>
								</div>

							</div>
						</div>

						<div id="tab_stage" class="tab-pane fade in">
							<div class="form-group col-md-12">
								<h5 class="size-family-weight"><b>Quote Stage *</b></h5>

								<div class="col-md-12">
									<select name="quotestage" tabindex="" class="form-control input-sm size-family-weight">
										<option value="Created">Created</option>
										<option value="Delivered">Delivered</option>
										<option value="Reviewed">Reviewed</option>
										<option value="Accepted">Accepted</option>
										<option value="Rejected">Rejected</option>
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

<script type = "text/javascript" >

$("#accountid_qtnew").val($("#cur_accountid").val());
$("#accountname_qtnew").val($("#cur_accountname").val());
	/** This is Javascript Function which is used to toogle between
		* assigntype user and group/team select options while assigning owner to entity.
		**/
		$("#assign_team2").hide();
		function toggleAssignType(currType)
		{
			if (currType == "U")
			{
				$("#assign_user").show();
				$("#assign_team").hide();
			}
			if (currType == "T")
			{
				$("#assign_user").hide();
				$("#assign_team").show();
			}
			if (currType == "U2")
			{
				$("#assign_user2").show();
				$("#assign_team2").hide();
			}
			if (currType == "T2")
			{
				$("#assign_user2").hide();
				$("#assign_team2").show();
			}
		}
		$("#sharedQt_group").hide();
		$("#sharedQt_group_new").hide();
		function toggleSharedQtType(currType)
		{
			if (currType == "U")
			{
				$("#sharedQt_user_new").show("slow");
				$("#sharedQt_group_new").hide("slow");
			}
			else
			{
				$("#sharedQt_user_new").hide("slow");
				$("#sharedQt_group_new").show("slow");
			}
		}
		</script>
		<script>
		
    // $(".select2_multiple").select2({
    //   maximumSelectionLength: 10,
    //   placeholder: "Select",
    //   allowClear: true
    // });
$(".select2_multiple").select2({width: '100%'});

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