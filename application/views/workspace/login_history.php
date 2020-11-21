<div class="panel panel-default">
    <div class="panel-heading">
        Login History
    </div>
    <div class="panel-body">
		<div class="col-lg-12">
			<div class="col-lg-10 form-group">
				<label class="col-lg-2 control-label">User Name</label>
				<div class="col-lg-5 text-center">
					<select class="form-control" onchange="loadLogHistory(this.value)">
						<option>Select User Name</option>
						<option value="All">All</option>
						<?php 
						// $contacts = $this->db->get_where("crm_users", array("org_id"=>$org_id, "ID !="=>$id))->result(); 
						foreach ($members as $value) { ?>
						<option value="<?php echo $value->ID; ?>"><?php echo $value->full_name; ?></option><?php
					} ?>
				</select>
			</div>
		</div>
		</div>
		<div class="col-lg-12" id="listView">
			<div class="dataTable_wrapper" style="background: #FFF; color: #000; " >
				<table class="table table-striped table-bordered table-hover" id="userListView">
					<thead>
						<tr>
							<th width="50px">#</th>
							<th>User Name</th>
							<th>IP Address</th>
							<th>Browser</th>
							<th>Sign in Time</th>
							<th>Sign out Time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$login_history = $this->db->query("SELECT lh.*, u.full_name, u.ID FROM crm_login_history as lh, crm_users as u WHERE u.org_id = '$org_id' AND u.ID = lh.user_id ORDER BY lh.sign_in_time DESC LIMIT 200")->result();
					// foreach($login_history as $k=>$v){
					// 	$status = "Login";
					// 	$logout = "---";
					// 	if($v->sign_out_time) {$status = "Logout"; $logout = $v->sign_out_time;}
					// 	echo "<tr>";
					// 	echo "<td>".$k."</td>";
					// 	echo "<td>".$v->full_name."</td>";
					// 	echo "<td>".$v->ip_address."</td>";
					// 	echo "<td>".$v->browser."</td>";
					// 	echo "<td>".$v->sign_in_time."</td>";
					// 	echo "<td>".$logout."</td>";
					// 	echo "<td>".$status."</td>";
					// 	echo "</tr>";
					// }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>