<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
$idOrder = $_POST['idOrder'];

$driver = $db->query("SELECT id_driver FROM drivers WHERE email = '$email'");
$fetch = mysqli_fetch_assoc($driver);
$idDriver = $fetch['id_driver'];

$update = $db->query("UPDATE taxi_order SET taken_by = $idDriver WHERE id_order = $idOrder");
if ($update) {
	// $update2 = $db->query("UPDATE drivers SET check_in = '0' WHERE email = '$email'");
	// if ($update2) {
		toast(1);
	// }else{
		// toast(2);	
	// }
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