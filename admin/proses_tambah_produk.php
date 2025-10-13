<?php
include '../koneksi.php';

$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

// Proses upload gambar
$gambar_produk = $_FILES['gambar_produk']['name'];
$gambar_tmp = $_FILES['gambar_produk']['tmp_name'];
move_uploaded_file($gambar_tmp, '../assets/produk/' . $gambar_produk);

// Query INSERT disederhanakan tanpa kategori
$query = "INSERT INTO produk (nama_produk, harga, deskripsi, gambar_produk) 
          VALUES ('$nama_produk', '$harga', '$deskripsi', '$gambar_produk')";

if (mysqli_query($koneksi, $query)) {
    header("Location: produk.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>