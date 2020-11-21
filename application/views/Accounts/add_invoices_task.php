<style>
	
	.modal-dialog{
		/*min-width: 700px !important;*/
        top: 20px; 		
	}
	.modal-body{
		height: 110px;
	}
	
	
</style>
<button id="close_addinvoice_task" type="button" class="close" data-dismiss="modal" style="display:none">×</button>
<form method="POST" name="form_invoiceTask" id="form_invoiceTask" action="<?php echo site_url()."Projects/insertInvoices/".$quoteid."/".$pro_id."/".$taskid; ?>">

			<div class="box-body">
				
				<div class="form-group col-md-12">
					<input autocomplete="off" required type="text" id="inv_subject_new" name="inv_subject_new" class="form-control" placeholder="Name of the invoice" onfocus="this.placeholder=''" onblur="this.placeholder='Name of the invoice'">
					<input type="submit" value="CREATE" id="create_new_invoice" class="form-control">
					<input type="hidden" id="load_acc_id" name="load_acc_id" class="form-control">
				</div>
				

				<div class="form-group col-md-12" style="display:none">
					<ul class="nav nav-tabs">
						<li class="active"><a class="size-family-weight" data-toggle="tab" href="#tab_description">Description</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_privacy">Privacy</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_assign">Share</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_relatedto">Related To</a></li>
						<li><a class="size-family-weight" data-toggle="tab" href="#tab_address">Address</a></li>
						
					</ul>

					<div class="tab-content">
						<div id="tab_description" class="tab-pane fade in active">
							<h5 class="size-family-weight"><b>Provide a description</b>(Optional)</h5>
							
							<textarea class="form-control size-family-weight" id="newDescription" name="newDescription" type="text"></textarea>
							
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
											<input type="radio" name="inv_sharedtype_new" checked id="inv_sharedtype_new" value="U"  onclick="toggleSharedQtType(this.value)"> User &nbsp;
											<input type="radio" name="inv_sharedtype_new" id="inv_sharedtype_new" value="G"  onclick="toggleSharedQtType(this.value)"> Group
										</label>
									</div>

									
									<div class="col-md-12">
										<span id="sharedQt_user_new" >
											<select multiple="multiple"  name="inv_shared_userid_new[]" id="inv_shared_userid_new"  class="form-control select2_multiple size-family-weight">
												<?php foreach ($users as $r) { ?>
												<option <?php if($id==$r->ID) echo "selected" ?>  value="<?php echo $r->ID; ?>" ><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
												<?php } ?>
											</select>
										</span>
										<span id="sharedQt_group_new">
											<select multiple="multiple" name="inv_shared_groupid_new[]" id="inv_shared_groupid_new" class="form-control select2_multiple size-family-weight">
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
											<input type="text" name="inv_accountname_new" id="inv_accountname_new" class="form-control input-sm readonly">
											<input type="hidden" readonly="" name="inv_accountid_new" id="inv_accountid_new" class="form-control input-sm">
											<a href="<?php echo site_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
										</div> 
									</div>
								</div>
							</div>
						<div id="tab_address" class="tab-pane fade in">
							<div class="form-group col-md-12 add-border-bottom" >
								
								<h5 class="size-family-weight">Billing Address</h5>

								<div class="col-md-12 size-family-weight">
									<textarea value="" name="inv_bill_street_new" tabindex="" class="form-control input-sm" rows="2"></textarea>
								</div>

							</div>
							<div class="form-group col-md-12 " >

								<h5 class="size-family-weight">Shipping Address</h5>

								<div class="col-md-12">
									<textarea value="" name="inv_ship_street_new" tabindex="" class="form-control input-sm" rows="2"></textarea>
								</div>

							</div>
						</div>

					</div>
				</div>


			</div>
			
	 
	

</form>

<script type = "text/javascript" >
	$("#inv_accountid_new").val($("#cur_accountid").val());
	$("#inv_accountname_new").val($("#cur_accountname").val());
	
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

	$('form[name=form_invoiceTask]').submit(function (e) {

		e.preventDefault();
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: this.action,
			type: this.method,
			data: formData,
			dataType: "JSON",
			contentType: false,
			processData: false,
			success: function (data) {
				console.log("invoice inserted");console.log(data);
				drawInvoiceItems(data.task_invoices[0]);
				// $('#invoice_details').treegrid({
    //                     initialState:'collapsed'
    //                 });
				
				$('#close_addinvoice_task').click();
				$('.nav-tabs a[href="#tab_5T"]').tab('show');
				$("#box-tab-inv").animate({scrollTop: $('#box-tab-inv').prop("scrollHeight")}, 1000);
				$('#invoice_details tbody > tr:last td:first').click();


			},
			error: function (jqXHR, textStatus, errorThrown) {

				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	});

	$(".select2_multiple").select2({width: '100%'});

	$(".readonly").keydown(function(e){
		e.preventDefault();
	});

	function closeDiv(){
		$(".close").trigger( "click" );
	}

	$(".modal-dialog").draggable();

</script>

