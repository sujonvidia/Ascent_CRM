	<div class="box box-success box-solid">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo ucfirst($text); ?></h3>
			<button type="button" style="display:none" id="close_pot" data-dismiss="modal" aria-hidden="true">×</button>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<table id="dataTables" class="table">
						<thead>
							<tr>
								<th><?php echo ucfirst($text)." Number"; ?></th>
								<th><?php echo ucfirst($text)." Name"; ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($tabledata) AND $tabledata != "") foreach($tabledata as $r) { ?>
							<tr>
								<td id="<?php echo $r->potentialid; ?>"><?php echo $r->potentialid; ?></td>
								<td id="<?php echo $r->potentialname; ?>"><?php echo $r->potentialname; ?></td>
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

			$("#sel_PotentialName_Qt").val(data[1]);
			$("#sel_PotentialId_Qt").val(data[0]);

			$("#selpopin_contact").val(data[1]);
			$("#selpopin_contact_new").val(data[1]);
			$("#close_pot").trigger("click");
		} );
	});
	</script>