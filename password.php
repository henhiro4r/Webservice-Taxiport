<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$id = $_POST['id'];
$email = $_POST['email'];
$pass = md5($_POST['password']);

if ($id != "") {
	$cekuser = $db->query("SELECT email FROM user WHERE iduser = $id");
    	if ($cekuser->num_rows != 0) {
    		$change = $db->query("UPDATE user SET password = '$pass' WHERE iduser = $id");
    		if($change){
    		    toast(1);
    		}
    	else{
    	    toast(0);
    	}
	}else{
		toast(2);
	}
}else{
	$cekuser = $db->query("SELECT email FROM user WHERE email = '$email'");
	if ($cekuser->num_rows != 0) {
		$change = $db->query("UPDATE user SET password = '$pass' WHERE email = '$email'");
		if($change){
		    toast(1);
		}
		else{
		    toast(0);
		}
	}else{
		toast(2);
	}
}


function toast($message){
	$response["code"] = $message;
	//$code = array();
	//$code = $message;
	array_push($response["code"], $code);
	echo json_encode($response);
}
?>