<?php 
include('inc/config.php');
session_start();
$uname = $_POST['uname'];
$pass = md5($_POST['pass']);
$query = $db->query("SELECT id, username, password FROM admin WHERE (username = '$uname') AND (password = '$pass')");
$jum = mysqli_num_rows($query);

if ($jum == 1) {
		$_SESSION['admin'] = $id;
		echo "<meta http-equiv='refresh' content='0 url=index.php'>";
	}	
else {
	echo "<script>alert('Login Failed')</script>";
	echo "<meta http-equiv='refresh' content='0 url=login.php'>";
}
?>