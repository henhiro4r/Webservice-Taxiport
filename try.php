<?php 
$response["code"] = array();
$code = array();
$code = 2;
array_push($response["code"], $code);

$profile["profile"] = array();
$user = array();
$user["name"] = "Henry";
$user["phone"] = "089674957080";
array_push($profile["profile"], $user);

echo json_encode(array($response, $profile));
?>