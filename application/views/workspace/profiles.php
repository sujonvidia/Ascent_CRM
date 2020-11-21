<style type="text/css">
    .access_assign_to, .profile_access, .pchkre, .profile_add_form{display: none;}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        Privilege
        <a onclick="add_new_profile()" class="pull-right panel-right-btn" title="Add Privilege"><img class="add_new_profile_img" src="<?php echo base_url("asset/img/icons/Add Project.png"); ?>"></a>
    </div>
    <div class="panel-body">
    	<table class="table table-striped table-bordered table-hover profile_list_table">
    		<thead>
    			<tr>
    				<th width="50px" style="size-family-weight">#</th>
    				<th style="size-family-weight">Privilege Name</th>
    				<th style="size-family-weight">Description</th>
    				<th style="size-family-weight">Organization</th>
    				<th style="size-family-weight">Last Modified</th>
                    <th style="size-family-weight">&nbsp;</th>
    				<th style="size-family-weight">&nbsp;</th>
    			</tr>
    		</thead>
    		<tbody>
	    	<?php 
	    	if(count($profileList)>0) { 
	    		foreach($profileList as $k=>$v) { ?>
		    	<tr>
		    		<td><?php echo $k+1; ?></td>
		    		<td><?php echo $v->profile_name; ?></td>
		    		<td><?php echo $v->description; ?></td>
		    		<td><?php echo $v->org_id; ?></td>
                    <td><?php echo $v->last_update; ?></td>
		    		<td><input onclick="addUsersPrivilege(this)" data-proid="<?php echo $v->id; ?>" data-proname="<?php echo $v->profile_name; ?>" type="button" value="Assign to" class="btn btn-default btn-xs"></td>
		    		<td><a href="#" onclick="editprofile(this)" data-proid="<?php echo $v->id; ?>" data-proname="<?php echo $v->profile_name; ?>" data-prodescription="<?php echo $v->description; ?>" ><i class="fa fa-pencil-square-o fa-lg"></i></a> | 
                        <a href="<?php echo site_url("workspace/rpg_delete/p/".$v->id); ?>"><i class="fa fa-trash-o fa-lg"></i></a></td>
		    	</tr><?php 
		    	}
		    } ?>
		    </tbody>
	    </table>


        <div class="col-lg-12 profile_add_form">
            <form>
                <div class="col-lg-10 form-group">
                    <label class="col-lg-2 control-label">Privilege Name <span class="text-red">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" name="profilename" id="profilename" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-10 form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-8">
                        <textarea name="pdescription" id="pdescription" class="form-control"></textarea>
                    </div>
                </div>
                <!-- <div class="col-lg-10 form-group">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-8 smart-form">
                        <label class="radio"><input onclick="onoffsm('o')" type="radio" name="ril"><i></i>I would like to setup a base profile and edit privileges (Recommended)</label>
                        <select class="form-control pchkre">
                        <?php $profilelist = $this->db->get_where("crm_profile_privileges", array("org_id"=>$org_id))->result();
                        foreach ($profilelist as $pk => $pv): ?>
                            <option value="<?php echo $pv->id; ?>"><?php echo $pv->profile_name; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <br><br>
                        <label class="radio"><input onclick="onoffsm('f')" type="radio" name="ril"><i></i>I will choose the privileges from scratch (Advanced Users)</label>
                        <label class="label">&nbsp;</label>
                    </div>
                </div> -->
                <div class="col-lg-10">
                    <input type="hidden" name="profileid" id="profileid">
                    <button type="reset" class="btn btn-default" onclick="add_new_profile()">Cancel</button>
                    <button type="button" onclick="save_profile()" class="btn btn-primary">Save & Next</button>
                </div>
            </form>
        </div>

        <div class="col-lg-12 profile_access">
            <!-- <form action="<?php echo site_url("workspace/save_profile_access"); ?>" method="POST">
                <div class="box-body" id="privileges">
                    <br>
                    <h4>Global Privileges</h4>
                    <hr>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2" rowspan="2">Modules to be shown</th>
                                    <th colspan="3" style="padding: 0px; text-align: center;">Edit Permissions</th>
                                </tr>
                                <tr>
                                    <th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="editall" id="editall" class="WW"> Create/Edit</th>
                                    <th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="viewall" id="viewall" class="RR"> View</th>
                                    <th style="padding: 0px; text-align: center; width: 125px;"><input type="checkbox" name="deleteall" id="deleteall" class="DD"> Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="pro" id="pro" checked></td>
                                    <td>Projects</td>
                                    <td class="text-center"><input type="checkbox" name="proW" id="proW" value="W" class="W" checked></td>
                                    <td class="text-center"><input type="checkbox" name="proR" id="proR" value="R" class="R" checked></td>
                                    <td class="text-center"><input type="checkbox" name="proD" id="proD" value="D" class="D" checked></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="tod" id="tod" checked></td>
                                    <td>ToDo</td>
                                    <td class="text-center"><input type="checkbox" name="todW" id="todW" value="W" class="W" checked></td>
                                    <td class="text-center"><input type="checkbox" name="todR" id="todR" value="R" class="R" checked></td>
                                    <td class="text-center"><input type="checkbox" name="todD" id="todD" value="D" class="D" checked></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="cal" id="cal" checked></td>
                                    <td>Calendar</td>
                                    <td class="text-center"><input type="checkbox" name="calW" id="calW" value="W" class="W" checked></td>
                                    <td class="text-center"><input type="checkbox" name="calR" id="calR" value="R" class="R" checked></td>
                                    <td class="text-center"><input type="checkbox" name="calD" id="calD" value="D" class="D" checked></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="dct" id="dct" checked></td>
                                    <td>Direct Chat and Group Chat</td>
                                    <td class="text-center"><input type="checkbox" name="dctW" id="dctW" value="W" class="W" checked></td>
                                    <td class="text-center"><input type="checkbox" name="dctR" id="dctR" value="R" class="R" checked></td>
                                    <td class="text-center"><input type="checkbox" name="dctD" id="dctD" value="D" class="D" checked></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="pct" id="pct"></td>
                                    <td>Project Chat</td>
                                    <td class="text-center"><input type="checkbox" name="pctW" id="pctW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="pctR" id="pctR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="pctD" id="pctD" value="D" class="D"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="fil" id="fil"></td>
                                    <td>My Files</td>
                                    <td class="text-center"><input type="checkbox" name="filW" id="filW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="filR" id="filR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="filD" id="filD" value="D" class="D"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="rep" id="rep"></td>
                                    <td>My Reports</td>
                                    <td class="text-center"><input type="checkbox" name="repW" id="repW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="repR" id="repR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="repD" id="repD" value="D" class="D"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="wor" id="wor"></td>
                                    <td>Create Workspace</td>
                                    <td class="text-center"><input type="checkbox" name="worW" id="worW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="worR" id="worR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="worD" id="worD" value="D" class="D"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="ptl" id="ptl"></td>
                                    <td>Privilege, Team, Login info</td>
                                    <td class="text-center"><input type="checkbox" name="ptlW" id="ptlW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="ptlR" id="ptlR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="ptlD" id="ptlD" value="D" class="D"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="rol" id="rol"></td>
                                    <td>Create Role</td>
                                    <td class="text-center"><input type="checkbox" name="rolW" id="rolW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="rolR" id="rolR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="rolD" id="rolD" value="D" class="D"></td>
                                </tr>
                                <?php if(user_privilege($id, $org_id, "bar") == "RWD") { ?>
                                <tr>
                                    <td style="width: 50px"><input type="checkbox" name="bar" id="bar"></td>
                                    <td>Backup and Restore</td>
                                    <td class="text-center"><input type="checkbox" name="barW" id="barW" value="W" class="W"></td>
                                    <td class="text-center"><input type="checkbox" name="barR" id="barR" value="R" class="R"></td>
                                    <td class="text-center"><input type="checkbox" name="barD" id="barD" value="D" class="D"></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="gpprofileid" id="gpprofileid">
                    <button type="reset" class="btn btn-default" onclick="open_profile_table()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form> -->
        </div>
        <div class="access_assign_to">
            <h3></h3>
            <form action="<?php echo site_url("workspace/assign_profile_access"); ?>" method="POST">
                <div class="col-lg-12 smart-form">
                    <?php if(isset($members)) foreach ($members as $v) {?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="checkbox"><input type="checkbox" name="access_assign_to_users[]" value="<?php echo $v->ID; ?>" class="aatu<?php echo $v->ID; ?>"><i></i><?php echo $v->full_name; ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12">&nbsp;</div>
                <div class="col-lg-12">
                    <input type="hidden" name="privilegeId" id="privilegeId">
                    <a class="btn btn-default" href="<?php echo site_url("workspace/cancelapa");?>">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>