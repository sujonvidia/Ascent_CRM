<script type="text/javascript">

	function add_new_profile(){
		if($(".profile_add_form").is(":visible")){
			$(".profile_add_form").hide("slow");
			$(".profile_list_table").show("slow");
			$(".add_new_profile_img").attr("src", base_url+"asset/img/icons/Add Project.png");
			
			// Reset the form field
			$("#profileid").val("");
			$("#profilename").val("");
			$("#pdescription").text("");
			$("input[type='checkbox']").prop("checked", false);			
		}else{
			$(".profile_list_table").hide("slow");
			$(".profile_add_form").show("slow");
			$(".add_new_profile_img").attr("src", base_url+"asset/img/icons/larrrow.png");
		}
	}

	function onoffsm(str){
		if(str == "o"){
			$(".pchkre").show("slow");
		}else{
			$(".pchkre").hide("slow");
		}
	}

	function save_profile(){
		if($("#profilename").val() != ""){
			var req = $.ajax({
				url: "<?php echo site_url("workspace/new_profile_post"); ?>",
				type: "POST",
				data: {profilename: $("#profilename").val(), pdescription: $("#pdescription").val(), profileid: $("#profileid").val()},
				dataType: "JSON"
			});
			req.done(function(res){
				set_privilege_data(res[0]);
				$("#privileges h4").html("Set Global Privileges for '"+$("#profilename").val()+"'");
				$(".profile_access").show("slow");
				$(".profile_add_form").hide("slow");
				$("#gpprofileid").val(res[0].id);
			});
		}else{
			swal("Error Message", "Please give a profile name...", "error").then(function(){
				$("#profilename").focus();
			});
		}
	}

	function set_privilege_data(data){
		$.each(data, function(k,v){
			if(v != null){
				var thisall = true;
				if(v.search("R") != -1) $("#"+k+"R").prop("checked", "checked"); else thisall = false;
				if(v.search("W") != -1) $("#"+k+"W").prop("checked", "checked"); else thisall = false;
				if(v.search("D") != -1) $("#"+k+"D").prop("checked", "checked"); else thisall = false;
				if(thisall) $("#"+k).prop("checked", "checked");
			}
		});
	}

	function open_profile_table(){
		$(".profile_access").hide();
		$(".profile_add_form").hide();
		$(".profile_list_table").show("slow");
		$(".add_new_profile_img").attr("src", base_url+"asset/img/icons/Add Project.png");
			
		// Reset the form field
		$("#profileid").val("");
		$("#profilename").val("");
		$("#pdescription").text("");
		$("input[type='checkbox']").prop("checked", false);
	}

	function editprofile(e){
		$("#profilename").val($(e).attr("data-proname"));
		$("#pdescription").val($(e).attr("data-prodescription"));
		$("#profileid").val($(e).attr("data-proid"));
		add_new_profile();
	}

	$("#privileges").on("click", "input[type='checkbox']", function(e) {
		console.log(e);
		var id = e.target.id;
		if(id == "viewall"){
			$(".R").prop("checked", $(this).prop("checked"));
		} 
		else if(id == "editall"){
			$(".W").prop("checked", $(this).prop("checked"));
		} 
		else if(id == "deleteall"){
			$(".D").prop("checked", $(this).prop("checked"));
		}

		else if(id.length == 3){
			$("#"+id+"R").prop("checked", $(this).prop("checked"));
			$("#"+id+"W").prop("checked", $(this).prop("checked"));
			$("#"+id+"D").prop("checked", $(this).prop("checked"));
		}

		else if(id.length == 4){
			var eclass = $("#"+id).attr("class");
			var idprifix = id.slice(0, 3);
			var lenOfClass = $("."+eclass).length;
			var lenOfChkClass = $("."+eclass+":checked").length;
			if(lenOfClass == lenOfChkClass)
				$("."+eclass+eclass).prop("checked", true);
			else
				$("."+eclass+eclass).prop("checked", false);

			if($("#"+idprifix+"R").is(':checked') &&$("#"+idprifix+"W").is(':checked') &&$("#"+idprifix+"D").is(':checked'))
				$("#"+idprifix).prop("checked", true);
			else
				$("#"+idprifix).prop("checked", false);
		}

		if($("#viewall").is(':checked') && $("#editall").is(':checked') && $("#deleteall").is(':checked')){
			$("input[type='checkbox']").prop("checked", $(this).prop("checked"));
		} 
		

    });


    function addUsersPrivilege(e){
    	$(".profile_list_table").hide("slow");
    	$(".access_assign_to").show();
    	$(".access_assign_to h3").html($(e).attr("data-proname"));
    	$("#privilegeId").val($(e).attr("data-proid"));
    	var req = $.ajax({
    			url: "<?php echo site_url("workspace/search_assign_access"); ?>",
    			type: "POST",
    			data: {privileges: $(e).attr("data-proid")},
    			dataType: "JSON"
    		});
    	req.done(function(res){
    		if(res.length>0){
    			$.each(res, function(k,v){
    				$(".aatu" + v.user_id).prop("checked", "checked");
    			});
    		}
    	});
    }
</script>