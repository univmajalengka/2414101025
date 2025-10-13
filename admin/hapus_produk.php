<?php
include '../koneksi.php';

$id_produk = $_GET['id'];

// Ambil nama file gambar sebelum menghapus data dari database
$query_gambar = "SELECT gambar_produk FROM produk WHERE id_produk = '$id_produk'";
$result_gambar = mysqli_query($koneksi, $query_gambar);
$data_gambar = mysqli_fetch_assoc($result_gambar);
$nama_gambar = $data_gambar['gambar_produk'];

// Hapus file gambar dari folder assets jika file ada
if ($nama_gambar && file_exists('../assets/produk/' . $nama_gambar)) {
    unlink('../assets/produk/' . $nama_gambar);
}

// Hapus data produk dari database
$query_hapus = "DELETE FROM produk WHERE id_produk = '$id_produk'";
if (mysqli_query($koneksi, $query_hapus)) {
    header("Location: produk.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>