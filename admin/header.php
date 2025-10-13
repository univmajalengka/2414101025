<?php
// Wajib ada di setiap halaman admin
include '../koneksi.php'; // Hubungkan ke koneksi.php

// 1. Cek apakah admin sudah login
if (!isset($_SESSION['id_admin'])) {
    // Jika belum, tendang ke halaman login
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Fluffy Charmies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
/* Hilangkan jarak kosong atas halaman admin */
body {
  margin: 0;
  padding: 0;
}

/* Pastikan header admin nempel ke atas */
header, .admin-header, .navbar {
  margin-top: 1 !important;
  padding-top: 0 !important;
  top: 0;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--dusty-rose);">
  <div class="container">
    <img src="../assets/logo.png" alt="Fluffy Charmies Logo" width="40" height="40" class="me-2 rounded-circle">
    <a class="navbar-brand" href="index.php"><strong>Admin Fluffy Charmies</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAdmin">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produk.php">Manajemen Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan.php">Pesanan Masuk</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> <?php echo $_SESSION['nama_lengkap']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">