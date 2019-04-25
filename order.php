<?php 
include('inc/config.php');
$value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
// $email = "henry@gmail.com";
$driver = $db->query("SELECT id_driver FROM drivers WHERE email = '$email'");
$fetch = mysqli_fetch_assoc($driver);
$idDriver = $fetch['id_driver'];

$ord = $db->query("SELECT * FROM taxi_order WHERE taken = '0' AND arrived = '0' ORDER BY order_time DESC");
$count = $db->query("SELECT COUNT(id_order) as totaldata FROM taxi_order WHERE taken = '0' AND arrived = '0'");
$fetch = mysqli_fetch_assoc($count);

$take = $db->query("SELECT * FROM taxi_order WHERE taken = '1' AND taken_by = $idDriver AND arrived = '0'");
$takes = mysqli_fetch_assoc($take);
$idloca = $takes['id_location'];
$loca = $db->query("SELECT kecamatan, kelurahan FROM location WHERE id = $idloca");
$locdat = mysqli_fetch_assoc($loca);

$response["total"] = $fetch['totaldata'];
// $sum = array();
// $sum = $fetch['totaldata'];
array_push($response["total"]);

$response["results"] = array();
while ($data = mysqli_fetch_assoc($ord)) {
	$idloc = $data['id_location'];
	$location = $db->query("SELECT kecamatan, kelurahan FROM location WHERE id = $idloc");
	$locdata = mysqli_fetch_assoc($location);
	$order = array();
	$order["id_order"] = $data['id_order'];
	$order["nama"] = $data['nama'];
	$order["tujuan"] = $data['tujuan'];
	$order["kota"] = $data['kota'];
	$order["penumpang"] = $data['penumpang'];
	$order["time"] = $data['order_time'];
	$order["kecamatan"] = $locdata['kecamatan'];
	$order["kelurahan"] = $locdata['kelurahan'];
	array_push($response["results"], $order);
}

if ($take->num_rows == 1) {
    $taken = array();
	$taken["id_order"] = $takes['id_order'];
	$taken["nama"] = $takes['nama'];
	$taken["tujuan"] = $takes['tujuan'];
	$taken["kota"] = $takes['kota'];
	$taken["penumpang"] = $takes['penumpang'];
	$taken["time"] = $takes['order_time'];
	$taken["kecamatan"] = $locdat['kecamatan'];
	$taken["kelurahan"] = $locdat['kelurahan'];
	$response["taken"] = $taken;
	array_push($response["taken"]);
	echo json_encode($response);
}else{
	echo json_encode($response);
}
?>
