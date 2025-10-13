<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fluffy Charmies - Gantungan Kunci Custom</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fc-nav fixed-top">
  <div class="container">
    <img src="assets/logo.png" alt="Fluffy Charmies Logo" width="40" height="40" class="me-2 rounded-circle">
    <a class="navbar-brand" href="index.php#beranda" style="font-family: var(--heading-font); color: var(--dusty-rose);">
        <strong>Fluffy Charmies</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#tim-kami">Meet the Charmies</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#produk">Produk Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#request">Request</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#lokasi">Lokasi</a></li>
      </ul>
      <ul class="navbar-nav ms-2">
        <li class="nav-item">
          <a class="btn btn-sm" href="keranjang.php" style="background-color: var(--sage-green); color: white;">
            <i class="bi bi-cart"></i> Keranjang
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
