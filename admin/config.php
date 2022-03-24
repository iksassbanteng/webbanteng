<?php
//koneksi ke database mysql,
$server = 'localhost';
$user = 'root';
$pwd = '';
$dbname = 'dbbanteng';
$koneksi = mysqli_connect($server,$user,$pwd,$dbname);

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
