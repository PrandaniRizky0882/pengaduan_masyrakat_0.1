<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alikasi Pengaduan Masyarakat</title>
</head>
<body style="background: url(img/bg.jpg); background-size: cover;">
    <div class="container">

    <?php 

    include 'conn/koneksi.php';
    if (@$_GET['p'] == "") {
        include_once 'login.php';
    }
    elseif (@$_GET['p'] == "login") {
        include_once 'login.php';
    }
    elseif (@$_GET['p'] == "logout") {
        include_once 'logout.php';
    }
    ?>

    </div>
</body>
</html>