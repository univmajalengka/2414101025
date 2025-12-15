<?php
// Koneksi ke database
include('koneksi.php');

// Mengambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$whatsapp = $_POST['whatsapp'];
$email = $_POST['email'];
$paket = $_POST['paket'];
$jumlah_orang = $_POST['jumlah_orang'];
$catatan = $_POST['catatan'];

// Query untuk update data pesanan
$query = "UPDATE pemesanan SET 
    nama = '$nama',
    whatsapp = '$whatsapp',
    email = '$email',
    paket = '$paket',
    jumlah_orang = '$jumlah_orang',
    catatan = '$catatan'
    WHERE id = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo "Pesanan berhasil diubah.";
    header("Location: daftar-pesanan.php"); // Redirect ke halaman daftar pesanan setelah update
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
