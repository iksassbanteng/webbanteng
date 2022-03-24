<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class=" mt-5 m-auto padding-nduwur">
        <div class="row bg-primary padding-row pt-5">

            <div class="col-md-6 ">
                <img class="rounded img-thumbnail" src="https://siakad.ibrahimy.ac.id/assets/img/gambar depan unib.jpg" width="100%" alt="">
            </div>
            <div class="col-md-6">

                <h4>Masuk ke Pesbuk</h4>

                <form action="login.php" method="POST">

                    <div class="form-group">
                        <label for="NIS">Username</label>
                        <input class="form-control col-6" type="text" name="NIS" placeholder="NIS" />
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control col-6" type="password" name="TELEPON" placeholder="Password" />
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

                </form>

            </div>

        </div>
    </div>

</body>

</html>
<?php

session_start();
include_once 'config.php';


if (isset($_POST['login'])) {

    $us = $_POST['NIS'];
    $pa = $_POST['TELEPON'];
    $sql = "SELECT * FROM santri where NIS = '" . $_POST['NIS'] . "' AND TELEPON ='" . $_POST['TELEPON'] . "'";
    $rs = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($rs);

    if ($cek > 0) {

        $data = mysqli_fetch_assoc($rs);

        // cek jika user login sebagai admin
        if ($data['level'] == "admin") {

            // buat session login dan username
            $_SESSION['nama'] = $data['NAMA'];
            // alihkan ke halaman dashboard admin
            header("location:../admin");

            // cek jika user login sebagai pegawai
        } else if ($data['level'] == "") {
            // buat session login dan username
            $_SESSION['nama'] = $data['NAMA'];
            $_SESSION['nis'] = $data['NIS'];
            // alihkan ke halaman dashboard pegawai
            header("location:../user");

            // cek jika user login sebagai pengurus     
        } else {
            echo '<div class="alert alert-warning">Gagal else2</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal Login</div>';
    }
}

?>