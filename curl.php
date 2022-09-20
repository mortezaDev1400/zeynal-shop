<?php 

$url = 'https://jsonplaceholder.typicode.com/posts/1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
$result = curl_exec($ch);
$err = curl_error($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);
echo "</br>";
if (isset($err) && $err == '') {
	var_dump('curl is connect successfull');
}else{
	var_dump('curl is not connect successfull');
}
