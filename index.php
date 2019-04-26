<?php 
session_start();
include('inc/config.php');

 ?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>taxiport</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php 
    if (!isset($_SESSION['admin'])) {
        echo "<meta http-equiv='refresh' content='0 url=login.php'>";
    } elseif (isset($_SESSION['admin'])) { ?>
    <?php include('inc/nav.php'); ?>
    <div class="container-fluid banner"></div>
    <div class="container nOrder">
        <form method="post" action="makeOrder.php">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="nama" required="" placeholder="Nama">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Total Penumpang</label>
                    <input class="form-control" type="number" name="totpenumpang" required="" placeholder="Total Penumpang (1 - 4)" min="1" max="4" step="1">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Alamat Tujuan</label>
                    <input class="form-control" type="text" name="tujuan" required="" placeholder="Alamat Tujuan">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Kota</label>
                    <select class="custom-select"  name="kota" required="">
                        <option value="" selected="">Pilih Kota</option>
                        <option value="SBY">Surabaya</option></select>
                </div>
                <div class="col-md-4">
                    <label>Kecamatan</label>
                    <input class="form-control" type="text" name="kecamatan" required="" placeholder="Kecamatan"><
                    /div>
                <div class="col-md-4">
                    <label>Kelurahan</label>
                    <input class="form-control" type="text" name="kelurahan" required="" placeholder="Kelurahan">
                </div>
            </div>
            <div class="form-row make">
                <div class="col-md-12">
                    <button class="btn btn-success makeor" type="submit">Make Order</button>
                </div>
            </div>
            <div class="form-row reset">
                <div class="col-md-12">
                    <button class="btn btn-outline-danger resetor" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <?php } ?>
</body>

</html>