<?php 
include('inc/config.php');
session_start();
$nama = $_POST['nama'];
$tujuan = $_POST['tujuan'];
$kota = $_POST['kota'];
$totpenumpang = $_POST['totpenumpang'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$createdBy = $_SESSION['admin'];
$loc = $db->query("SELECT id, harga FROM location WHERE kecamatan = '$kecamatan' AND kelurahan = '$kelurahan'");
$location = mysqli_fetch_assoc($loc);
$locid = $location['id'];

if ($loc->num_rows == 1) {
	$order = $db->query("INSERT INTO taxi_order VALUES(NULL, '$nama', '$tujuan', '$kota', $totpenumpang, CURRENT_TIMESTAMP, NULL,'0', '0',$locid,$createdBy)");
	if ($order) { ?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
			<title>Invoice Taxi Order</title>
			<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
			<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
			<link rel="stylesheet" href="assets/css/styles.css">
		</head>
		<body>
			<div class="container-fluid title">
				<h1>INVOICE</h1>
			</div>
			<div class="container nOrder">
				<div class="form-row">
					<div class="col-md-12">
						<label>Nama</label>
						<p class="form-control text-center"><?= $nama ?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<label>Total Penumpang</label>
						<p class="form-control text-center"><?=$totpenumpang?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<label>Alamat Tujuan</label>
						<p class="form-control text-center"><?=$tujuan?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4">
						<label>Kota</label>
						<p class="form-control text-center"><?=$kota?></p>
					</div>
					<div class="col-md-4">
						<label>Kecamatan</label>
						<p class="form-control text-center"><?=$kecamatan?></p>
					</div>
					<div class="col-md-4">
						<label>Kelurahan</label>
						<p class="form-control text-center"><?=$kelurahan?></p>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<h3 class="btn-danger text-center">Rp <?=$location['harga']?></h3>
					</div>
				</div>
				<div class="form-row make">
					<div class="col-md-12">
						<a class="btn btn-success makeor" href="index.php">Back</a>
					</div>
				</div>
			</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.min.js"></script>
			<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
		</body>
		</html>	
	<? }else{
		$msg = "Error, Please Try Again";
		echo "<script>alert('".$msg."')</script>";
		echo "<script>location.href='index.php'</script>";
	}
}else {
	$msg = "Cannot detect location";
	echo "<script>alert('".$msg."')</script>";
	echo "<script>location.href='index.php'</script>";
} ?>