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
	$order = $db->query("INSERT INTO taxi_order VALUES(NULL, '$nama', '$tujuan', '$kota', $totpenumpang, CURRENT_TIMESTAMP, NULL,'0',$locid,$createdBy)");
	echo "fares : Rp".$location['harga'];

}else{
	$msg = "Cannot detect location";
}
?>