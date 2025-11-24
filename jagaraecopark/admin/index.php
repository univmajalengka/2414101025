<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include '../koneksi.php';

// Ambil ringkasan
$totalPemesanan = 0;
$resultCount = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pemesanan");
if ($resultCount) {
    $row = mysqli_fetch_assoc($resultCount);
    $totalPemesanan = (int)$row['total'];
}

// Ambil 5 pemesanan terbaru
$resultLatest = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY created_at DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Jagara Eco Park</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="admin-body">

<header class="admin-header">
    <div class="admin-header-inner">
        <div class="admin-brand">
            <span class="brand-title">Admin Jagara Eco Park</span>
            <span class="brand-subtitle">Panel Pemesanan</span>
        </div>
        <nav class="admin-nav">
            <a href="index.php">Dashboard</a>
            <a href="pemesanan/daftar_pemesanan.php">Data Pemesanan</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </nav>
    </div>
</header>

<main class="admin-main container">
    <h1>Dashboard</h1>

    <div class="admin-cards">
        <div class="admin-card">
            <h3>Total Pemesanan</h3>
            <p class="admin-card-number"><?= $totalPemesanan; ?></p>
            <p class="admin-card-note">Total data pemesanan yang masuk</p>
        </div>
    </div>

    <section class="admin-section">
        <h2>Pemesanan Terbaru</h2>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Jumlah</th>
                        <th>Waktu Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($resultLatest && mysqli_num_rows($resultLatest) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($resultLatest)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['kode_pemesanan']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['paket']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_kunjungan']); ?></td>
                            <td><?= htmlspecialchars($row['jumlah_orang']); ?></td>
                            <td><?= htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <a href="pemesanan/detail.php?id=<?= $row['id']; ?>">Detail</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Belum ada data pemesanan.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script src="assets/js/admin.js"></script>
</body>
</html>
