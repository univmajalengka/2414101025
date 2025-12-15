<?php
// header.php - bagian atas website Jagara Eco Park
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jagara Eco Park - Wisata Waduk Darma Kuningan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS utama -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <!-- Logo / Brand -->
        <a href="#beranda" class="brand">
            <img src="assets/images/logo.png" alt="Logo Jagara Eco Park" class="brand-logo">
            <div class="brand-text">
                <span class="brand-title">Jagara Eco Park</span>
                <span class="brand-subtitle">Waduk Darma • Kuningan</span>
            </div>
        </a>

        <!-- SEARCH -->
        <form class="header-search" action="#" onsubmit="return false;">
            <input type="text" placeholder="Search destination...">
            <button type="submit">🔍</button>
        </form>

        <nav class="main-nav" id="mainNav">
    <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#obyek">Obyek </a></li>
        <li><a href="#fasilitas">Fasilitas</a></li>
        <li><a href="#paket">Paket</a></li>
        <li><a href="#pemesanan">Pemesanan</a></li>
        <li><a href="#galeri">Galeri</a></li>
        <li><a href="#lokasi">Lokasi</a></li>
    </ul>
</nav>



        <!-- Tombol hamburger (untuk HP/tablet) -->
        <button class="nav-toggle" id="navToggle" aria-label="Buka menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
