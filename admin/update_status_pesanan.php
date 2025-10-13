<?php
include '../koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari form
    $id_pesanan = $_POST['id_pesanan'];
    $status_baru = $_POST['status_baru'];

    // Query untuk update status
    $query = "UPDATE pesanan SET status = '$status_baru' WHERE id_pesanan = '$id_pesanan'";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kembali ke halaman pesanan
        header("Location: pesanan.php");
        exit();
    } else {
        // Jika gagal, tampilkan error
        echo "Error updating record: " . mysqli_error($koneksi);
    }
} else {
    // Jika file diakses langsung, kembalikan ke halaman pesanan
    header("Location: pesanan.php");
    exit();
}
?>