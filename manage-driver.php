<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TaxiPort | Driver </title>
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
        <h1>MANAGE DRIVER</h1>
    </div>
    <div class="container"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <?php } ?>
</body>

</html>