<div class="col-lg-12">
  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Create New Account<?php //if($pid != -1) echo $pid; ?></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
   
    <div class="box-body">
        <h4 class="box-title">Account Basic Information</h4>

        <form method="post" action="<?php echo site_url('yzy-accounts/saveacc/save'); ?>" data-parsley-validate class="form-horizontal form-label-left">
            <?php //if(validation_errors() != null) echo '<p style="text-align: center;color: RED;">'.validation_errors().'</p>'; ?>     
            <?php //if(isset($message) AND $message != "") echo '<p style="text-align: center;color: GREEN;">'.$message.'</p>'; ?>   
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Account Name <span class="required">*</span></label>
                <div class="col-md-9">
                        <input type="text" name="accountName" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->projectname ."'"; ?> required="required" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Account No </label>
                <div class="col-md-9">
                        <input type="text" name="accountNumber" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->projectid ."'"; ?> placeholder="AUTO GEN ON SAVE" disabled class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Website </label>
                <div class="col-md-9">
                        <input name="website" id="startdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->startdate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>

            <div class="form-group col-md-6">
                    <label class="control-label col-md-3">Ticker Symbol </label>
                    <div class="col-md-9">
                            <input name="tickerSymbol" id="targetdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetenddate ."'"; ?> class="date-picker form-control" type="text">
                    </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Email </label>
                <div class="col-md-9">
                    <input name="email" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="email">
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Member Of </label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="text" name="memberOf" id="relatedto" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->relatedto ."'"; ?> class="form-control">
                        <a href="<?php echo site_url()."modulecontrol/popupsearch/account"; ?>" class="input-group-addon" data-title="Related To" data-toggle="lightbox" data-parent="" data-gallery="remoteload"><i class="fa fa-plus-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Fax </label>
                <div class="col-md-9">
                        <input name="fax" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Primary Phone </label>
                <div class="col-md-9">
                        <input name="phone" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Secondary Phone </label>
                <div class="col-md-9">
                        <input name="secondPhone" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Employees </label>
                <div class="col-md-9">
                        <input name="employees" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Ownership </label>
                <div class="col-md-9">
                        <input name="ownerShip" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Primary Email</label>
                <div class="col-md-9">
                        <input name="primaryEmail" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="email">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Secondary Email</label>
                <div class="col-md-9">
                        <input name="secondEmail" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Industry </label>
                <div class="col-md-9">
                    <select class="form-control customDisable" name="industry">
                        <option value="Draft">--None--</option>
                        <option value="Cold Call">Cold Call</option>
                        <option value="Existing Customer">Existing Customer</option>
                        <option value="Self Generated">Self Generated</option>
                        <option value="Employee">Employee</option>
                        <option value="Partner">Partner</option>
                        <option value="Public Relations">Public Relations</option>
                        <option value="Direct Mail">Direct Mail</option>
                        <option value="Conference">Conference</option>
                        <option value="Trade Show">Trade Show</option>
                        <option value="Web Site">Web Site</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Other">Other</option>
                    </select>

                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Rating </label>
                <div class="col-md-9">
                    <select class="form-control customDisable" name="rating">
                        <option value="Draft">--None--</option>
                        <option value="Cold Call">Cold Call</option>
                        <option value="Existing Customer">Existing Customer</option>
                        <option value="Self Generated">Self Generated</option>
                        <option value="Employee">Employee</option>
                        <option value="Partner">Partner</option>
                        <option value="Public Relations">Public Relations</option>
                        <option value="Direct Mail">Direct Mail</option>
                        <option value="Conference">Conference</option>
                        <option value="Trade Show">Trade Show</option>
                        <option value="Web Site">Web Site</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Other">Other</option>
                    </select>

                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Type </label>
                <div class="col-md-9">
                    <select class="form-control customDisable" name="type">
                        <option value="Draft">--None--</option>
                        <option value="Cold Call">Cold Call</option>
                        <option value="Existing Customer">Existing Customer</option>
                        <option value="Self Generated">Self Generated</option>
                        <option value="Employee">Employee</option>
                        <option value="Partner">Partner</option>
                        <option value="Public Relations">Public Relations</option>
                        <option value="Direct Mail">Direct Mail</option>
                        <option value="Conference">Conference</option>
                        <option value="Trade Show">Trade Show</option>
                        <option value="Web Site">Web Site</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Other">Other</option>
                    </select>

                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">SIC Code </label>
                <div class="col-md-9">
                    <input name="siccode" id="actualdate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->actualenddate ."'"; ?> class="date-picker form-control" type="text">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Annual Revenue</label>

                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" name="annualRevenue" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Assigned To <span class="required">*</span></label>
                <div class="col-md-4">
                    <label class="control-label">
                        <input type="radio" name="assigntype" class="customDisable" checked="checked" value="U" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo "checked";  ?> onclick="toggleAssignType(this.value)"> User &nbsp;
                        <input type="radio" name="assigntype" class="customDisable" value="T" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo "checked";  ?> onclick="toggleAssignType(this.value)"> Group
                    </label>
                </div>
                <div class="col-md-5">
                    <span id="assign_user" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'userid') echo 'style="display:block"'; else  echo 'style="display:none"'; ?>>
                        <select name="assigned_user_id" class="form-control customDisable">
                        <?php foreach ($users as $r) { ?>
                            <option value="<?php echo $r->ID; ?>" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->userteamid == $r->ID) echo 'selected';  ?> ><?php echo ucfirst($r->first_name . " " . $r->last_name); ?></option>
                        <?php } ?>
                        </select>
                    </span>
                    <span id="assign_team" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->idtype == 'teamid') echo 'style="display:block"'; else  echo 'style="display:none"'; ?> >
                        <select name="assigned_team_id" class="form-control customDisable">
                        <?php foreach ($groups as $r) { ?>
                            <option value="<?php echo $r->groupid; ?>" <?php //if(isset($tag) AND $tag != "" AND $tag[0]->userteamid == $r->groupid) echo 'selected';  ?>><?php echo ucfirst($r->groupname); ?></option>
                        <?php } ?>
                        </select>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="control-label col-md-3">Email Opt Out</label>
                <div class="col-md-9 checkbox">
                    <input type="checkbox" name="emailoptout" value="1">
                </div>
            </div>
            <div class="form-group col-md-6">
            <label class="control-label col-md-3">Notify Owner</label>
            <div class="col-md-9 checkbox">
                <input type="checkbox" name="notifyOwner" value="1">
            </div>
            </div>
            <div class="form-group col-md-6">
                    &nbsp;
            </div>

            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <h4 class="box-title">Address Information</h4>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing City </label>
                    <div class="col-md-9">
                            <input type="text" name="bcity" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping City </label>
                    <div class="col-md-9">
                            <input type="text" name="scity" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing ZIP Code </label>
                    <div class="col-md-9">
                            <input type="text" name="bzip" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping ZIP Code </label>
                    <div class="col-md-9">
                            <input type="text" name="szip" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing Country </label>
                    <div class="col-md-9">
                            <input type="text" name="bcountry" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping Country </label>
                    <div class="col-md-9">
                            <input type="text" name="scountry" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing State </label>
                    <div class="col-md-9">
                            <input type="text" name="bstate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping State </label>
                    <div class="col-md-9">
                            <input type="text" name="sstate" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing Street </label>
                    <div class="col-md-9">
                            <input type="text" name="bstreet" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping Street </label>
                    <div class="col-md-9">
                            <input type="text" name="sstreet" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Billing PO Box </label>
                    <div class="col-md-9">
                            <input type="text" name="bpo" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            <div class="form-group col-md-6">

                    <label class="control-label col-md-3">Shipping PO Box </label>
                    <div class="col-md-9">
                            <input type="text" name="spo" <?php //if($pid != -1) echo "value = '". $allProjectList[$pid]->targetbudget ."'"; ?> class="form-control">
                    </div>
            </div>
            
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <h4 class="box-title">Description Information</h4>
            <!-- <h3>DatePicker</h3>
            <input type="text" id="datetimepicker3"/> -->
            <div class="form-group col-md-11">
                    <label class="control-label col-md-2">Description </label>
                    <div class="col-md-10">
                            <textarea name="description" class="form-control" rows="3"> <?php //if($pid != -1) echo $allProjectList[$pid]->description; ?></textarea>
                    </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <?php //if($pid != -1) { ?><button type="button" class="btn btn-primary">Update</button> 
                    <?php //} else { ?><button type="submit" class="btn btn-primary">Save</button><?php //} ?>
                    <button type="button" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>     
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->