<?php 
/*if($id > 0)
	$db_file_lists = $this->db->get_where("crm_docs",array("user_id"=>$id))->result(); 
else
	$db_file_lists = $this->db->get("crm_docs")->result(); 
echo '<script>var id = '.json_encode($id).';</script>';
echo '<script>var dbFileLists = '.json_encode($db_file_lists).';</script>';*/
?>
<div class="col-md-12">
	<div id="site-map">
		
	</div>
	<input type="hidden" id="site-map-val" />
	<div class="createBtn btn-group">
		<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-left: 10px;"><i class="fa fa-plus" style="position: relative;"></i></button>
		<ul class="dropdown-menu">
			<li><a data-title="File Upload" data-toggle="lightbox" title="File Upload" href="<?php echo site_url("myfiles/openlightbox/upload_docs") ?>"><i class="fa fa-upload"></i> Upload</a></li>
			<li class="hide_in_project"><a data-title="Create New Folder" data-toggle="lightbox" title="Create New Folder" href="<?php echo site_url("myfiles/openlightbox/create_folder") ?>"><i class="fa fa-folder"></i> Folder</a></li>
			<li><a data-title="Create New File" data-toggle="lightbox" title="Create New File" href="<?php echo site_url("myfiles/openlightbox/create_text_file.php") ?>"><i class="fa fa-file-text-o"></i> Text File</a></li>
		</ul>
	</div>
	<div class="group-action" style="display: none;">
		<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_selected()">Delete</a>&nbsp;
		<!-- <a class="btn btn-primary" href="javascript:void(0);">Download</a> -->
	</div>
	<div class="col-md-12" id="file-explorer">
		<table class="table">
			<thead>
				<tr>
					<th width="20">&nbsp;</th>
					<th colspan="3">Name</th>
					<th width="100">Size</th>
					<th width="150">Modified</th>
				</tr>
			</thead>
			<tbody id="fx-body">

			</tbody>
		</table>
	</div>
</div>