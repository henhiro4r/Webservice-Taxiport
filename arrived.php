<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
$idOrder = $_POST['idOrder'];

$update = $db->query("UPDATE taxi_order SET arrived = '1' WHERE id_order = $idOrder");
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