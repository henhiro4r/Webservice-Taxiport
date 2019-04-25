<?php
require("phpmailer/src/PHPMailer.php");
require("phpmailer/src/SMTP.php");
require("phpmailer/src/Exception.php");

include('inc/config.php');
$nama = $_POST['nama'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$domisili = $_POST['domisili'];
$plate = $_POST['plate'];

$names = str_replace(' ','-',$nama);

$file = basename($_FILES["fotoprofile"]["name"]);
$tipe = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$photo = "photo/".$names."_fotoprofile.".$tipe;
move_uploaded_file($_FILES["fotoprofile"]["tmp_name"], $photo.".".$tipe);

$file = basename($_FILES["kartutandapen"]["name"]);
$tipe = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$ktp = "photo/".$names."_ktp.".$tipe;
move_uploaded_file($_FILES["kartutandapen"]["tmp_name"], $ktp.".".$tipe);

$file = basename($_FILES["sim"]["name"]);
$tipe = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$license = "photo/".$names."_sim.".$tipe;
move_uploaded_file($_FILES["sim"]["tmp_name"], $license.".".$tipe);
//generate token
$str = "01234567890abcdefghijklmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str2 = str_shuffle($str);
$str3 = substr($str2, 0, 10); //token for input to database
$str4 = substr($str2, 0, 4);
$password = $nama.$str4;
$pass = md5($password);

$cekMail = $db->query("SELECT email FROM user WHERE email = '$email'");
if ($cekMail->num_rows != 0) {
	$msg = "Email already registered"; // user already exist
}else{
	$add = $db->query("INSERT INTO drivers VALUES(NULL, '$nama', '$email', '$pass', 'notelp', '$domisili', '$photo', '$plate', '$license', '$ktp' , '1' , '0', '$str3', '0')");
	if ($add) {
		$mail = new PHPMailer\PHPMailer\PHPMailer();

		$mail->isSMTP();
		// $mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'uceastexpo@gmail.com';
		$mail->Password = 'eastexpo2018';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('taxiportapp@gmail.com', 'TaxiPort Application');
		$mail->addReplyTo('taxiportapp@gmail.com', 'TaxiPort Application');

		$mail->addAddress($show['email'], $email);
		// $mail->addCC($show['email']);
		$mail->addBCC('noreply.dummy.website@gmail.com');
		$mail->addBCC('backup.website.mailer@gmail.com');
		$mail->Subject = 'Taxiport Driver Registration';
		$mail->isHTML(true);
		$mail->Body = '<!DOCTYPE html>
		<html>
		<head>
		<title></title>
		</head>
		<body style="background-color: #fbfbfb; margin: 0; color: #727272">
		<div style="background-color: #fff; width: 600px; margin: 0 auto; font-family:Raleway, sans-serif; color:black; border-radius: 40px; border: 1px solid #00ad41;">
		<div style="text-align: center; border-bottom: 1px solid #00ad41;">
		<img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7f98014e-7a83-4138-a97a-bbc112df6319/dd434tb-39564f08-bdd2-49ac-ad97-c3e4e59b1686.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzdmOTgwMTRlLTdhODMtNDEzOC1hOTdhLWJiYzExMmRmNjMxOVwvZGQ0MzR0Yi0zOTU2NGYwOC1iZGQyLTQ5YWMtYWQ5Ny1jM2U0ZTU5YjE2ODYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.11LnR-WkhRtkz4Ti6uoj4Vjf8XrfYcQwNpD8z9VqGmQ" style="max-width:50%;height:auto;vertical-align:middle; margin-top: 15px; margin-bottom: 15px;">
		</div>
		<div style="text-align: justify; padding: 10px 15px;">
		<h2 style="font-weight: bold; text-align: center;">Hi, '.$nama.'</h2>
		<p style="text-align: center;">Thank you for creating a TaxiPort Account. <br/> <br/></p> 
		<p style="text-align: center;"> Here your password for login to TaxiPort</p>
		<h1 style="text-align: center;">'.$str3.'</h1>
		<p style="text-align: center;">And please verify your email address to use TaxiPort App</p>
		<div style="text-align: center; padding: 10px 15px;">
		<div style="margin-left:auto; margin-right: auto; background-color: #00ad41; padding: 15px; border-radius: 10px; width: 30%;">
		<a href="https://fusionsvisual.com/taxiport/confirm.php?token='.$str3.'&email='.$email.'" style="text-decoration: none; color: #fff;"><b>Confirm Email</b></a>
		</div>
		</div>
		<p style="text-align: center;">Enjoy your new experience with us, <br> <br> TaxiPort Development Team</p>
		</div>
		<div style="padding: 10px 15px; text-align: center; border-top: 1px solid #00ad41; font-size: 0.75em;">
		<p style="margin: 0;">You received this email because you signed up to receive email updates from TaxiPort.</p>
		</div>
		</div>
		</body>
		</html>';

		if (!$mail->send()) {
			$msg = "Something went wrong, please try again!";
		} else {
			$msg = "Registration success, please check your email";
		}

		echo "<script>alert('".$msg."')</script>";
		echo "<script>location.href='newDriver.php'</script>";
	}
	echo "<script>alert('".$msg."')</script>";
	echo "<script>location.href='newDriver.php'</script>";
}
?>