<?php 
include('inc/config.php');
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TaxiPort | History Order</title>
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
    <div class="container-fluid title">
        <h1>HISTORY</h1>
    </div>
    <div class="container his">
        <?php 
            $data = $db->query("SELECT * FROM taxi_order ORDER BY order_time DESC");
            while ($show = mysqli_fetch_assoc($data)) { 
                $id = $show['taken_by'];
                $name = $db->query("SELECT name FROM drivers WHERE id_driver = $id");
                $namee = mysqli_fetch_assoc($name);
                if ($namee['name'] == "") {
                    $Drivername = "Wating";
                }else{
                    $Drivername = $namee['name'];
                }

               if($show['taken'] = '1' && $show['arrived'] == '0') {
                    $color = "orange";
                    $status = "Ongoing";
                }else if ($show['taken'] = '1' && $show['arrived'] == '1') {
                    $color = "green";
                    $status = "Completed";
                }
                ?>
                <div class="col-md-12 box">
                    <h3><?=$show['tujuan']?></h3>
                    <h5>Taken By (<?= $Drivername ?>)</h5>
                    <h5>Status <span style="color : <?=$color?>">( <?= $status ?> )</span></h5>
                    <p>Order Made ( <?=$show['order_time']?> )</p>
                </div>
        <?php } ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <?php } ?>
</body>

</html>