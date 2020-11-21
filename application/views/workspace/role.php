<?php 
	foreach($roles as $value) {
		$listOfProfile = explode(",", $value->profile_id);
		$userRoleList = explode(",", $value->user_id);
		$l = ""; $namelst = ""; $imglst = ""; $imgstr = "";
		if(count($members)>0){
			foreach($members as $rm){
				if(array_search($rm->ID, $userRoleList) !== FALSE){
					$namelst .= $rm->full_name.'<br>';
					$imglst .= '<img src="'.base_url().'asset/img/avatars/'.$rm->img.'" class="online tag">';
				}
			}
		}
		$imgstr = "<div id=img". $value->id ." onmouseover=\"callcuspop(\'".$value->id."\', \'".$namelst."\')\" onmouseout=\"callcuspop2()\" class=\"col-lg-12\" style=\"color: #000000;\" >";
		$imgstr .= $imglst;
		$imgstr .= '</div>';
		if(isset($profiles) AND $profiles != "") foreach($profiles as $v) {
			if (array_search($v->id, $listOfProfile) !== FALSE) {
				$l .= '<i class="fa fa-fw fa-angle-double-right"></i> '.$v->profile_name."<br>";
			}
		}
		$datavalue .= "{ id: ". $value->id.", name: '".$value->role_name."', parent: ". $value->reports_to .", description: '". $l ."', imglst: '".$imgstr."' },";
	} ?>
<link href="<?php echo base_url("asset/js/plugin/orgChart/jquery.orgchart.css"); ?>" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
	#orgChart{ width: auto; height: auto; color: #000; }
	#orgChartContainer{ width: 100%; height: 500px; overflow: auto; background: #eeeeee; color: #000; }
	.orgDiscription{text-align: left; padding-left: 10px; font-size: 12px;}
</style>
<div id="orgChartContainer">
	<div id="orgChart"></div>
</div>