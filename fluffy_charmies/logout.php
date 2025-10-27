<?php
// Sisipkan koneksi untuk memulai sesi
include 'koneksi.php';

// Hancurkan semua data sesi
session_destroy();

// Arahkan kembali ke halaman login
header("Location: login.php");
exit();
?>