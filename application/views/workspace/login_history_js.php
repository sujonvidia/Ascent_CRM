<script type="text/javascript">
	<?php echo "var loginHistory = ". json_encode($login_history) . ";\n"; ?>
  	loadLogHistory("All");
  
	function drawTableDesign(sl, name, ip, bw, login, logout, status){
		var design = "<tr>";
		design += '<td>'+sl+'</td>';
		design += '<td>'+name+'</td>';
		design += '<td>'+ip+'</td>';
		design += '<td>'+bw+'</td>';
    	design += '<td>'+login+'</td>';
    	design += '<td>'+logout+'</td>';
		design += '<td>'+status+'</td>';
		design += '</tr>';
		return design;
	}

  function loadLogHistory(v){
    var design = ""; var j=1;
    for(var i=0; i<loginHistory.length; i++){
      var status = "Login";
      var logout = "---";
      if(v== "All"){
        if(loginHistory[i].sign_out_time) {status = "Logout"; logout = loginHistory[i].sign_out_time;}
        design += drawTableDesign((j++), loginHistory[i].full_name, loginHistory[i].ip_address, loginHistory[i].browser, loginHistory[i].sign_in_time, logout, status);
      }
      else if(loginHistory[i].ID == v){
        if(loginHistory[i].sign_out_time) {status = "Logout"; logout = loginHistory[i].sign_out_time;}
        design += drawTableDesign((j++), loginHistory[i].full_name, loginHistory[i].ip_address, loginHistory[i].browser, loginHistory[i].sign_in_time, logout, status);
      }
    }
    $("#userListView tbody").html("");
    $("#userListView tbody").html(design);
  }
</script>