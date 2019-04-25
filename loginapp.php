<?php 
include('inc/config.php');
// $value = file_get_contents('php://input');
//data from login activity
$email = $_POST['email'];
$pass = md5($_POST['password']);
// $email = "henry@gmail.com";
// $pass = md5(1234);
$query = $db->query("SELECT id_driver, nama, email, password, no_telp, photo, loginstatus FROM drivers WHERE (email = '$email') AND (password = '$pass')");
$jum = mysqli_num_rows($query);
$validate = mysqli_fetch_assoc($query);
$response = array();

if ($jum == 1) {
	if ($validate['loginstatus'] == 1) {
		toast(0);
	}else{
		$update = $db->query("UPDATE drivers SET loginstatus = '1' WHERE email = '$email'");
		if ($update) {
			$code = 1;
			$response["code"] = $code;
			//array_push($response["code"]);
			//object json profile
			// $user["id_driver"] = $validate["id_driver"];
			// $user["email"] = $validate["email"];
			// $user["password"] = $validate["password"];
			$user = array();
			$user["nama"] = $validate["nama"];
			$user["phone"] = $validate["no_telp"];
			$user["photo"] = $validate["photo"];
			$response["profile"] = $user;
			//array_push($profile["profile"]);
			echo json_encode($response);
		}else{
			toast(0); //login failed
		}
	}
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