<!DOCTYPE html>
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
    <div class="container-fluid title">
        <h1>NEW DRIVER</h1>
    </div>
    <div class="container">
        <form method="post" action="adddriver.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" required="" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" required="" placeholder="Alamat Email">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Nomor Telepon</label>
                    <input class="form-control" type="tel"  name="notelp" required="" placeholder="Nomor Telepon" minlength="11" maxlength="13">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Alamat Domisili</label>
                    <input class="form-control" type="text" name="domisili" required="" placeholder="Alamat Domisili">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Plat Nomor Mobil</label>
                    <input class="form-control" type="text"  name="plate" required="" placeholder="Plat Nomor Mobil">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Foto</label>
                    <input class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-xl-center" name="pic" type="file" required="" accept="image/*">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Foto KTP</label>
                    <input class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-xl-center" name="ktp" type="file" required="" accept="image/*">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label>Foto SIM</label>
                    <input class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-xl-center" name="sim" type="file" required="" accept="image/*"> 
                </div>
            </div>
            <div class="form-row make">
                <div class="col-md-12">
                    <button class="btn btn-success makeor" type="submit">Register</button>
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