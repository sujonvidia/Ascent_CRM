<link href="<?php echo base_url("asset/js/plugin/multi-select/multi-select.css"); ?>" media="screen" rel="stylesheet" type="text/css">
<style type="text/css">
	.group_add_form, .showWhenEdit{display: none;}
</style>
<div class="panel panel-default">
	<div class="panel-heading">
		Team
		<div onclick="add_new_group()" class="pull-right panel-right-btn" title="Add Team"><img class="add_new_group_img" src="<?php echo base_url("asset/img/icons/Add Project.png"); ?>"></div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-bordered table-hover group_list_table">
			<thead>
				<tr>
					<th class="size-family-weight">#</th>
					<th class="size-family-weight">Team Name</th>
					<th class="size-family-weight">Description</th>
					<th class="size-family-weight">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(count($group_list)>0){
						$i=1; foreach($group_list as $value) { ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><a href="#" onclick="edit_groups(this)" 
									data-groupid="<?php echo $value->groupid; ?>" 
									data-groupname="<?php echo $value->groupname; ?>" 
									data-description="<?php echo $value->description; ?>" 
									data-member_users="<?php echo $value->member_users; ?>" 
									><?php echo $value->groupname; ?></a></td>
							<td><?php echo $value->description; ?></td>
							<td align="center">
								<a href="#" onclick="edit_groups(this)" data-groupid="<?php echo $value->groupid; ?>" data-groupname="<?php echo $value->groupname; ?>" data-description="<?php echo $value->description; ?>" data-member_users="<?php echo $value->member_users; ?>"><i class="fa fa-pencil-square-o fa-lg"></i></a> | 
								<a href="<?php echo site_url("workspace/rpg_delete/g/".$value->groupid); ?>"><i class="fa fa-trash-o fa-lg"></i></a>
							</td>
						</tr>
						<?php } 
					}?>
			</tbody>
		</table>
		
		<div class="col-lg-12 group_add_form">
			<form action="<?php echo site_url("workspace/new_group_post"); ?>" method="POST">
				<div class="col-lg-10 form-group">
					<label class="col-lg-2 control-label">Team Name <span class="text-red">*</span></label>
					<div class="col-lg-8">
						<input type="text" name="groupname" id="groupname" class="form-control" required>
					</div>
				</div>
				<div class="col-lg-10 form-group">
					<label class="col-lg-2 control-label">Description</label>
					<div class="col-lg-8">
						<textarea name="description" id="description" class="form-control"></textarea>
					</div>
				</div>
				<div class="col-lg-10 pull-right showWhenEdit"></div>
				<div class="col-lg-10 form-group hideWhenEdit">
					<label class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-lg-8">
						<select class="form-control" onchange="loadMultiSelect(this.value)">
							<option>Select</option>
							<option value="Role">Role</option>
							<option value="User">User</option>
						</select>
					</div>
				</div>
				<div class="col-lg-12 hideWhenEdit">&nbsp;</div>
				<div class="col-lg-10 pull-right hideWhenEdit">
					<select multiple="multiple" id="selectRole" name="selectRole[]">
						<?php if(isset($roles)) foreach ($roles as $v) {?>
							<option value="<?php echo $v->id; ?>"><?php echo $v->role_name; ?></option>
						<?php } ?>
					</select>
					<select multiple="multiple" id="selectUser" name="selectUser[]">
						<?php if(isset($members)) foreach ($members as $v) {?>
							<option value="<?php echo $v->ID; ?>"><?php echo $v->full_name; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-12">&nbsp;</div>
				<div class="col-lg-10">
					<input type="hidden" name="groupid" id="groupid">
					<button type="reset" class="btn btn-default" onclick="add_new_group()">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>