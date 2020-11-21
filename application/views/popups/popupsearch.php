<div class="box box-success box-solid">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo ucfirst($text); ?></h3>
		<button type="button" style="display:none" id="close_acc" data-dismiss="modal" aria-hidden="true">×</button>
	</div><!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<table id="dataTables" class="table">
					<thead>
						<tr>
							<th><?php echo ucfirst($text)." ID"; ?></th>
							<th><?php echo ucfirst($text)." Number"; ?></th>
							<th><?php echo ucfirst($text)." Name"; ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($tabledata) AND $tabledata != "") foreach($tabledata as $r) { ?>
							<tr>
								<td class="accid" id="<?php echo $r->accountid; ?>"><?php echo $r->accountid; ?></td>
								<td ><?php echo $r->account_no; ?></td>
								<td ><?php echo $r->accountname; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.box-body -->
</div>

<style>
	thead th {background-color: #616060;color: white;}
	.odd{background-color: #DCD5D5; color:#000;}
	.even{background-color: #DDDDDD; color:#000;}
	tbody tr:hover{background-color: #FFFF99; color:#000;}
</style>
<script type="text/javascript">
	$(function () {
		var table =$('#dataTables').DataTable();
		$('#dataTables tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
       	
        	$("#selpopin_accountname").val(data[2]);
		 	$("#selpopin_accountid").val(data[0]);

		 	$("#sel_accountid").val(data[0]);
		 	
		 	$("#accountname_qtnew").val(data[2]);
		 	$("#accountid_qtnew").val(data[0]);

		 	$("#selpopin_account").val(data[2]);
		 	$("#selpopin_account_pot").val(data[2]);
			$("#selpopin_account_new").val(data[2]);
			
			$("#relatedtoid_pot_new").val(data[0]);
			$("#relatedtoid_pot_up").val(data[0]);

			$("#accountname_qtnew").val(data[2]);
		 	$("#accountid_qtnew").val(data[0]);

		 	$("#sel_AccountName_Qt").val(data[2]);
		 	$("#sel_AccountId_Qt").val(data[0]);

		 	$("#inv_accountname_new").val(data[2]);
		 	$("#inv_accountid_new").val(data[0]);

		 	$("#sel_AccountName_inv").val(data[2]);
		 	$("#sel_AccountId_inv").val(data[0]);


		 	$("#close_acc").trigger("click"); 
   	 } );
		// $('#dataTables tbody tr').on('click', function(e) {
		// 	console.log(event);
		// 	$("#selpopin_account").val(event.target.id);
		// 	$("#selpopin_account_new").val(event.target.id);
		// 	$("#selpopin_account_qt").val(event.target.id);
		// 	$("#close_acc").trigger("click"); 
			
		// });
		
	});
</script>