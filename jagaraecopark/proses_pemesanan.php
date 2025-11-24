<?php
// proses_pemesanan.php - menyimpan data pemesanan ke database

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

// Ambil data dari form
$nama     = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$whatsapp = isset($_POST['whatsapp']) ? trim($_POST['whatsapp']) : '';
$email    = isset($_POST['email']) ? trim($_POST['email']) : '';
$paket    = isset($_POST['paket']) ? trim($_POST['paket']) : '';
$tanggal  = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$jumlah   = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 1;
$catatan  = isset($_POST['catatan']) ? trim($_POST['catatan']) : '';

// Validasi sederhana
if ($nama === '' || $whatsapp === '' || $paket === '' || $tanggal === '' || $jumlah < 1) {
    // Kalau ada data penting yang kosong, balikin ke form
    header("Location: index.php#pemesanan");
    exit;
}

// Kode pemesanan unik, contoh: JEP-20251123123045
$kode_pemesanan = 'JEP-' . date('YmdHis');

// Simpan ke database
$query = "INSERT INTO pemesanan 
          (kode_pemesanan, nama, whatsapp, email, paket, tanggal_kunjungan, jumlah_orang, catatan)
          VALUES
          ('$kode_pemesanan', '$nama', '$whatsapp', '$email', '$paket', '$tanggal', '$jumlah', '$catatan')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    $id_baru = mysqli_insert_id($koneksi);
    header("Location: pemesanan_sukses.php?id=" . $id_baru);
    exit;
} else {
    // Untuk debugging
    // echo "Error: " . mysqli_error($koneksi);
    header("Location: index.php#pemesanan");
    exit;
}
