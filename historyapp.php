<?php 
include('inc/config.php');
// $value = json_decode(file_get_contents('php://input'));
$email = $_POST['email'];
$driver = $db->query("SELECT id_driver FROM drivers WHERE email = '$email'");
$fetch = mysqli_fetch_assoc($driver);
$idDriver = $fetch['id_driver'];

$his = $db->query("SELECT * FROM taxi_order WHERE arrived = '1' AND taken_by = $idDriver ORDER BY order_time DESC");

$count = $db->query("SELECT COUNT(id_order) as totaldata FROM taxi_order WHERE taken = $idDriver AND arrived = '1'");
$fetch = mysqli_fetch_assoc($count);
$response["total"] = $fetch['totaldata'];
// $sum = array();
// $sum = $fetch['totaldata'];
array_push($response["total"]);

$response["results"] = array();
while ($data = mysqli_fetch_assoc($his)) {
	$idloc = $data['id_location'];
	$location = $db->query("SELECT kecamatan, kelurahan FROM location WHERE id = $idloc");
	$locdata = mysqli_fetch_assoc($location);
	$history = array();
	// $order["id_order"] = $data['id_order'];
	// $order["nama"] = $data['nama'];
	$history["tujuan"] = $data['tujuan'];
	$history["kota"] = $data['kota'];
	$history["time"] = $data['order_time'];
	$history['kecamatan'] = $locdata['kecamatan'];
	$history['kelurahan'] = $locdata['kelurahan'];
	array_push($response["results"], $history);
}
echo json_encode($response);
?>