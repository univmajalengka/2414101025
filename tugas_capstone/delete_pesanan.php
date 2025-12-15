<?php
// koneksi ke database
include 'koneksi.php';

// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    // Jika ID tidak valid, kembali ke halaman daftar pesanan
    header("Location: daftar-pesanan.php");
    exit;
}

// Query untuk menghapus data berdasarkan ID
$query = "DELETE FROM pemesanan WHERE id = $id";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Cek apakah query berhasil
if ($result) {
    // Jika berhasil, arahkan kembali ke daftar pesanan
    header("Location: daftar-pesanan.php?status=success");
    exit;
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . mysqli_error($koneksi);
    exit;
}
?>
