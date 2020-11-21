<?php

$action=$_GET['action'];
$year=$_GET['year'];
$country=$_GET['country'];
$url="http://www.kayaposoft.com/enrico/json/v1.0/index.php?action=$action&year=$year&country=$country";
file_put_contents('holidaylist.txt',$url);
$retVal = file_get_contents($url);	// TODO: change this
for ($i = 0; $i < count($http_response_header); $i++) { // forward Content-Type HTTP header 
    if (strpos($http_response_header[$i], "Content-Type") === 0)
        header($http_response_header[$i]);
}
echo $retVal;
?>