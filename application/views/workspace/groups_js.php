<script src="<?php echo base_url("asset/js/plugin/multi-select/jquery.multi-select.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
$('#selectRole').multiSelect({
  selectableHeader: "<div class='custom-header'>Selectable items</div>",
  selectionHeader: "<div class='custom-header'>Selection items</div>"
});
$('#selectUser').multiSelect({
  selectableHeader: "<div class='custom-header'>Selectable items</div>",
  selectionHeader: "<div class='custom-header'>Selection items</div>"
});

$("#selectRole").hide();
$("#ms-selectRole").hide();
$("#selectUser").hide();
$("#ms-selectUser").hide();


	function add_new_group(){
		if($(".group_add_form").is(":visible")){
			$(".group_add_form").hide("slow");
			$(".group_list_table").show("slow");
			$(".add_new_group_img").attr("src", base_url+"asset/img/icons/Add Project.png");
			
			/*Reset the form field*/
			$("#groupid").val("");
			$("#groupname").val("");
			$("#description").text("");
			$(".hideWhenEdit").show();
			$(".showWhenEdit").hide();
		}else{
			$(".group_list_table").hide("slow");
			$(".group_add_form").show("slow");
			$(".add_new_group_img").attr("src", base_url+"asset/img/icons/larrrow.png");
		}
	}

	function edit_groups(e){
		$("#groupid").val($(e).attr("data-groupid"));
		$("#groupname").val($(e).attr("data-groupname"));
		$("#description").text($(e).attr("data-description"));
		$(".hideWhenEdit").hide();
		var roleList = $(e).attr("data-member_roles");
		var uList = $(e).attr("data-member_users");
		if(roleList != ""){
			var rolestr = "<ol>";
			$.each(roleList.split(","), function(k,v){
				$.each(jsroles, function(kk,vv){
					if(v == vv.id){
						rolestr += "<li>"+vv.role_name + "</li>";
					}
				});
			});
			rolestr += "</ol>";
			$(".showWhenEdit").html("<b>Role List</b><br>"+rolestr);
		}else if(uList != ""){
			var ustr = "<ol>";
			$.each(uList.split(","), function(k,v){
				$.each(jsmembers, function(kk,vv){
					if(v == vv.ID){
						ustr += "<li>"+vv.full_name + "</li>";
					}
				});
			});
			ustr += "</ol>";
			$(".showWhenEdit").html("<b>User List</b><br>"+ustr);
		}
		$(".showWhenEdit").show();
		add_new_group();
	}

	function loadMultiSelect(v){
      $("#selectRole").hide();
      $("#ms-selectRole").hide();
      $("#selectUser").hide();
      $("#ms-selectUser").hide();

      $("#select"+v).show();
      $("#ms-select"+v).show("slow");
    }
</script>