<script src="../require/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<link href="../require/http/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<?php 
$str = $_POST["htmldata"];
// echo $str;
include("MPDF57/mpdf.php");
$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;

$mpdf->WriteHTML($str,2);
$mpdf->Output('mpdf.pdf','I');
exit;
?>