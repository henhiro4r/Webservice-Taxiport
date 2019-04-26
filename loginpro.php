<?php 
include('inc/config.php');
session_start();
$uname = $_POST['uname'];
$pass = md5($_POST['pass']);
$query = $db->query("SELECT id_admin, username, password FROM admin WHERE (username = '$uname') AND (password = '$pass')");
$fetch = mysqli_fetch_assoc($query);
$jum = mysqli_num_rows($query);

if ($jum == 1) {
		$_SESSION['admin'] = $fetch['id_admin'];
		echo "<meta http-equiv='refresh' content='0 url=index.php'>";
	}	
else {
	echo "<script>alert('Login Failed')</script>";
	echo "<meta http-equiv='refresh' content='0 url=login.php'>";
}
?>