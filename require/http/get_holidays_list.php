<?php


$retVal = file_get_contents("http://www.kayaposoft.com/enrico/json/v1.0/index.php?action=getSupportedCountries");	// TODO: change this
for ($i = 0; $i < count($http_response_header); $i++) { // forward Content-Type HTTP header 
    if (strpos($http_response_header[$i], "Content-Type") === 0)
        header($http_response_header[$i]);
}
echo $retVal;
?>