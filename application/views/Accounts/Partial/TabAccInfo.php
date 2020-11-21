<div class="col-lg-12">
	<div class="box box-success box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">Accounts</h3>
		</div>
		
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
              	<thead style="background-color: #DBEBFF;">
                    <tr class="headings" >
                        
                        <th class=" "><input type="checkbox" name="selectall"></th>
                        <th class=" "><a href="javascript:;">Account Name</a></th>
                        <th class=" "><a href="javascript:;">Account No</a></th>
                        <th class=" "><a href="javascript:;">Industry</a></th>
                        <th class=" "><a href="javascript:;">Ownership</a></th>
                        <th class=" "><a href="javascript:;">SIC Code</a></th>
                        <th class=" "><a href="javascript:;">Phone</a></th>
                        <th class=" "><a href="javascript:;">Email</a></th>
                        <th class=" "><a href="javascript:;">Website</a></th>
                        <th class=" "><a href="javascript:;">Assigned To</a></th>
                        <th class=" "><a href="javascript:;">Action</a></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($allAccounts as $value){?>
                        <tr style="text-align:left;">
                            <td class=" "><input type="checkbox" name="selectall"></td>
                            <td class=" "><a href="<?php echo site_url('modulecontrol/newproject/'.$value->accountid ); ?>"><?php echo $value->accountname;?></a></td>
                            <td class=" "><?php echo $value->account_no;?></td>
                            <td class=" "><?php echo $value->industry;?></td>
                            <td class=" "><?php echo $value->ownership;?></td>
                            <td class=" "><?php echo $value->siccode;?></td>
                            <td class=" "><?php echo $value->phone;?></td>
                            <td class=" "><?php echo $value->email1;?></td>
                            <td class=" "><?php echo $value->website;?></td>
                            <td class=" "><?php echo $value->assign_to; ?></td>
                            <td class=" "><a href="<?php echo site_url('modulecontrol/edittask/'.$value->accountid) ?>"><i class="fa fa-edit "></i></a> | <a href="<?php echo site_url('modulecontrol/deletetask/'.$value->accountid) ?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php }?>   
                </tbody>

            </table>

		</div><!-- /.share -->
		<div class="box-footer">
			
		</div>
	</div><!-- /.box (share box) -->
</div>