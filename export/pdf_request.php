<?php
	$link = mysql_connect('localhost', 'root', 'YeezY@001');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	// mysql_close($link);
	$db_selected = mysql_select_db('navcon', $link);
	if (!$db_selected) {
		die ('Erro : ' . mysql_error());
	}

	$q = mysql_query("SELECT * FROM crm_savetempdata WHERE uid = '".$_REQUEST["inserid"]."'") or die(mysql_error());
	if(mysql_num_rows($q)>0){
		$str = "<table>";
		$i=0;
		while($rows = mysql_fetch_array($q, MYSQL_ASSOC)){
			$str .= "<tr>".base64_decode($rows["tempdata"])."</tr>";
			if($i==52) break;
			$i++;
		}
		$str .= "</table>";
		// echo file_put_contents("22table.txt", $str);
		// echo $str;
		// echo gzuncompress(base64_decode($str["tempdata"]));
		clearstatcache();
		include("MPDF57/mpdf.php");
		$mpdf=new mPDF('utf-8',array(1000,1000));
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($str);
		$mpdf->Output('mpdf.pdf','I');
		exit;
	}
	
?>