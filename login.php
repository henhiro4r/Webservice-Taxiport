<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TaxiPort | Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container imgg"><img class="img-fluid" src="assets/img/taxiport.png" width="400">
        <form method="post" action="loginpro.php">
            <div class="form-row">
                <div class="col-md-12">
                    <input class="form-control inlog" type="text" name="uname" required="" placeholder="Username">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <input class="form-control inlog" type="password" name="pass" required="" placeholder="Password" minlength="6" maxlength="12">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 log">
                    <button class="btn btn-success logbtn" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>