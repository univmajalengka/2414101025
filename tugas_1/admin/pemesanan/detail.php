<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit;
}

include '../../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: daftar_pemesanan.php");
    exit;
}

$result = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = $id");
$data   = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: daftar_pemesanan.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pemesanan - Admin Jagara Eco Park</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">

<header class="admin-header">
    <div class="admin-header-inner">
        <div class="admin-brand">
            <span class="brand-title">Admin Jagara Eco Park</span>
            <span class="brand-subtitle">Detail Pemesanan</span>
        </div>
        <nav class="admin-nav">
            <a href="../index.php">Dashboard</a>
            <a href="daftar_pemesanan.php">Data Pemesanan</a>
            <a href="../logout.php" class="logout-link">Logout</a>
        </nav>
    </div>
</header>

<main class="admin-main container">
    <h1>Detail Pemesanan</h1>

    <div class="admin-detail-box">
        <p><strong>Kode Pemesanan:</strong> <?= htmlspecialchars($data['kode_pemesanan']); ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama']); ?></p>
        <p><strong>No. WhatsApp:</strong> <?= htmlspecialchars($data['whatsapp']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
        <p><strong>Paket:</strong> <?= htmlspecialchars($data['paket']); ?></p>
        <p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($data['tanggal_kunjungan']); ?></p>
        <p><strong>Jumlah Orang:</strong> <?= htmlspecialchars($data['jumlah_orang']); ?></p>
        <p><strong>Catatan:</strong> <?= nl2br(htmlspecialchars($data['catatan'])); ?></p>
        <p><strong>Waktu Pemesanan:</strong> <?= htmlspecialchars($data['created_at']); ?></p>
    </div>

    <div class="admin-actions">
        <a href="daftar_pemesanan.php" class="btn-admin-secondary">Kembali</a>
        <a href="../../struk.php?id=<?= $data['id']; ?>" class="btn-admin-primary" target="_blank">Lihat Struk</a>
    </div>
</main>

<script src="../assets/js/admin.js"></script>
</body>
</html>
