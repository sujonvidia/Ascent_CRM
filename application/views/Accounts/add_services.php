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
<form method="POST" name="addServiceForm" id="addServiceForm" action="<?php echo site_url()."yzy-accounts/index/insertServices"; ?>">

<div class="message">
		<div class="box box-success">
			
			<div class="box-body" >
				<label class="control-label col-md-12"><b class="size-family-weight">Service Name</b></label>

				<div class="form-group col-md-12 add-border-bottom">
					<input required type="text" id="ServiceName_new" name="ServiceName_new" class="form-control">
				</div>
				
				<label class="control-label col-md-12"><b class="size-family-weight">Provide a description</b> (Optional)</label>
					<div class="form-group col-md-12">		
							<textarea class="form-control size-family-weight" id="newDescription" name="newDescription" type="text"></textarea>
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

<script type="text/javascript">
		function closeDiv(){
			$(".close").trigger( "click" );
		}
		</script>
		<script>
$(".modal-dialog").draggable();
</script>

