<style>
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
<form method="POST" name="addQtForm" id="addQtForm" action="<?php echo site_url()."yzy-contacts/index/savecontact"; ?>">


	<div class="message">
		<div class="box box-success">
			
			<div class="box-body">
				<label class="control-label col-md-12"><b class="size-family-weight">Name the contact</b></label>
				<div class="col-md-4">
					<select required name="salutation_type" id="salutation_type" class="form-control input-sm size-family-weight">
						<option selected="" value="--None--">--None--</option>
						<option value="Mr.">Mr.</option>
						<option value="Ms.">Ms.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Dr.">Dr.</option>
						<option value="Prof.">Prof.</option>
					</select>
				</div>
				<div class="col-md-4">
					<input required placeholder="First name" name="first_name" id="first_name" class="form-control input-sm size-family-weight" type="text">
				</div>
				<div class="col-md-4">
					<input required placeholder="Last name" type="text" id="ptn" name="ptn" class="form-control input-sm size-family-weight">
				</div>

				<div class="form-group col-md-12"><hr></div>

				<div class="form-group col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab_description">Description</a></li>
						<li><a data-toggle="tab" href="#tab_privacy">Privacy</a></li>
						<li><a data-toggle="tab" href="#tab_assign">Share</a></li>
					</ul>

					<div class="tab-content">
						<div id="tab_description" class="tab-pane fade in active">
							<h5 class="size-family-weight"><b>Provide a description</b>(Optional)</h5>
							
							<textarea class="form-control size-family-weight" id="newDescription" name="newDescription" type="text"></textarea>
							
						</div>

						<div id="tab_privacy" class="tab-pane fade size-family-weight">
							<div class="form-group col-md-12 size-family-weight">
								<h5 class="size-family-weight"><b>Select privacy: </b></h5>
								<div class="col-lg-12">
									<select id="ptp" name="ptp" class="form-control size-family-weight">
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
											<input type="radio" name="assigntype" checked id="assigntypeU" class="customDisable" value="U" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo "checked";  ?> onclick="toggleAssignType(this.value)"> User &nbsp;
											<input type="radio" name="assigntype" id="assigntypeT" class="customDisable" value="T" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo "checked";  ?> onclick="toggleAssignType(this.value)"> Group
										</label>
									</div>

									<div class="col-md-12">
										<div id="assign_userd" >
											<select multiple="multiple"  name="assigned_user_id[]" id="assigned_user_id"  class="form-control customDisable select2_multiple size-family-weight">
												<?php foreach ($users as $r) { ?>
												<option <?php if($id==$r->ID) echo "selected" ?>  value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
												<?php } ?>
											</select>
										</div>
										<div id="assign_teamd">
											<select multiple="multiple" name="assigned_team_id[]" id="assigned_team_id" class="form-control customDisable select2_multiple size-family-weight">
												<?php foreach ($groups as $r) { ?>
												<option value="<?php echo $r->groupid; ?>"><?php echo ucfirst($r->groupname); ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
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
	/** This is Javascript Function which is used to toogle between
		* assigntype user and group/team select options while assigning owner to entity.
		**/
		$("#assign_teamd").hide();
		function toggleAssignType(currType)
		{
			if (currType == "U")
			{
				$("#assign_userd").show();
				$("#assign_teamd").hide();
			}
			if (currType == "T")
			{
				
				$("#assign_userd").hide();
				$("#assign_teamd").show();
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