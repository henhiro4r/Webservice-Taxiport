<?php 
error_reporting(0);
include('inc/config.php');
$email = $_GET['email'];
$token = $_GET['token'];

$data = $db->query("SELECT email, token, isvalidate FROM drivers WHERE email = '$email' AND token = '$token' AND isvalidate = '0'");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #fbfbfb; margin: 0;">
	<div style="background-color: #fff; width: 600px; margin: 0 auto; font-family:Raleway, sans-serif; color:black; border-radius: 40px; border: 1px solid #00ad41; margin-top: 16em;">
		<div style="text-align: center;">
			<img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7f98014e-7a83-4138-a97a-bbc112df6319/dd43713-ed5cfbf8-15f4-48bd-9946-f4a02f5b7df0.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzdmOTgwMTRlLTdhODMtNDEzOC1hOTdhLWJiYzExMmRmNjMxOVwvZGQ0MzcxMy1lZDVjZmJmOC0xNWY0LTQ4YmQtOTk0Ni1mNGEwMmY1YjdkZjAucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.ziyt3_p1XLKorvafbrMynvYnuUcCQqGe6ngRLc_hrc0" style="max-width:50%;height:auto;vertical-align:middle; margin-top: 15px; margin-bottom: 15px;">
			<?php
			if ($email == "" || $token == "") {
			 	echo '<h1 style="text-align: center;">Email Not Found!</h1>';
			 }else{
			 	if ($data->num_rows == 1) {
					$update = $db->query("UPDATE drivers SET token = null, isvalidate = '1' WHERE email = '$email'");
					if ($update) {
						echo '<h1 style="text-align: center;">Email Confirmed</h1>';	
					}
				}else{
					echo '<h1 style="text-align: center;">Email Already Confirmed</h1>';
				}
			 }
			?>
		</div>
	</div>
</body>
</html>