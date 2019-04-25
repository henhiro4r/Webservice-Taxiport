<?php 

define('DB_NAME','u6060829_taxiport');

define('DB_USER','u6060829_taxiadmin');

define('DB_PASSWORD','s4l4mentrepreneur');

define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8mb4');

define('DB_COLLATE', '');

$db = new mysqli("localhost", "u6060829_taxiadmin", "s4l4mentrepreneur", "u6060829_taxiport");

if (!$db) {
	die("Bad Server Connection");
}

?>