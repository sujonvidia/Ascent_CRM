	<div class="box box-success box-solid">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo ucfirst($text); ?></h3>

			<button type="button" style="display:none" id="close_svc" data-dismiss="modal" aria-hidden="true">×</button>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<table id="dataTables" class="table">
						<thead>
							<tr>
								<th><?php echo ucfirst($text)." Number"; ?></th>
								<th><?php echo ucfirst($text)." Name"; ?></th>
								<th><?php echo ucfirst($text)." Price ($)"; ?></th>

								<th><?php echo ucfirst($text)." tax_vat"; ?></th>
								<th><?php echo ucfirst($text)." tax_sales"; ?></th>
								<th><?php echo ucfirst($text)." tax_service"; ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($tabledata) AND $tabledata != "") foreach($tabledata as $r) { ?>
							<tr>
								<td id="<?php echo $r->serviceid; ?>"><?php echo $r->serviceid; ?></td>
								<td id="<?php echo $r->servicename; ?>"><?php echo $r->servicename; ?></td>
								<td id="<?php echo $r->unit_price; ?>"><?php echo $r->unit_price; ?></td>
								
								<td id="<?php echo $r->tax_vat; ?>"><?php echo $r->tax_vat; ?></td>
								<td id="<?php echo $r->tax_sales; ?>"><?php echo $r->tax_sales; ?></td>
								<td id="<?php echo $r->tax_service; ?>"><?php echo $r->tax_service; ?></td>
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
	var snum=<?php echo ($srvnum); ?>;
	$(function () {
		
		var table =$('#dataTables').DataTable();
		$('#dataTables tbody').on('click', 'tr', function () {

			var data = table.row( this ).data();

			// $("#sel_PotentialName_Qt").val(data[1]);
			// $("#sel_PotentialId_Qt").val(data[0]);

			// $("#selpopin_contact").val(data[1]);
			// $("#selpopin_contact_new").val(data[1]);

			$("#sel_servicename_item"+snum).val(data[1]);
			$("#sel_serviceid_item"+snum).val(data[0]);



			if(data[3]==""){
				data_vat=null;
				$("#load_tax_vat"+snum).val("null");
			}
			else{
				data_vat=data[3];
				$("#load_tax_vat"+snum).val(data[3]);
			}

			if(data[4]==""){
				data_sales=null;
				$("#load_tax_sales"+snum).val("null");
			}
			else{
				data_sales=data[4];
				$("#load_tax_sales"+snum).val(data[4]);
			}

			if(data[5]==""){
				data_service=null;
				$("#load_tax_service"+snum).val("null");
			}
			else{
				data_service=data[5];
				$("#load_tax_service"+snum).val(data[5]);
			}
			$('#open_tax'+snum).attr("href",'http://172.16.0.64/yeezy/yzy-accounts/index/popuptax/'+snum+'/'+data_vat+'/'+data_sales+'/'+data_service+'/'+$("#total_afterdiscount"+snum).html()+'');

			$("#close_svc").trigger("click");
		} );
});
	</script>