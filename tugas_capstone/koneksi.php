<?php
// koneksi.php - koneksi database Jagara Eco Park

$host     = "localhost";
$user     = "root";
$password = "";
$database = "db_jagaraecopark"; 

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
