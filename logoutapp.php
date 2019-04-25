<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
if($email == ""){
    toast(2);
}else{
    $update = $db->query("UPDATE drivers SET loginstatus = '0' WHERE email = '$email'");
    if ($update) {
    	toast(1);
    }else{
    	toast(2);
    }
}

function toast($message){
	$response["code"] = $message;
	// $code = array();
	// $code = $message;
	array_push($response["code"]);
	echo json_encode($response);
}
?>