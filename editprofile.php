<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
$nama = $_POST['nama'];
$phone = $_POST['phone'];

$update = $db->query("UPDATE drivers SET nama = '$nama', no_telp = '$phone' WHERE email = '$email'");
if ($update) {
	toast(1);
}else{
	toast(2);
}

function toast($message){
	$response["code"] = $message;
	//$code = array();
	//$code = $message;
	array_push($response["code"], $code);
	echo json_encode($response);
}
?>