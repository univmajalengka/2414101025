<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit;
}

include '../../koneksi.php';

// Ambil keyword pencarian (kalau ada)
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';

$where = '';
if ($keyword !== '') {
    $keywordEsc = mysqli_real_escape_string($koneksi, $keyword);
    $where = "WHERE 
                kode_pemesanan LIKE '%$keywordEsc%' OR
                nama LIKE '%$keywordEsc%' OR
                whatsapp LIKE '%$keywordEsc%' OR
                paket LIKE '%$keywordEsc%' OR
                tanggal_kunjungan LIKE '%$keywordEsc%'";
}

$sql = "SELECT * FROM pemesanan $where ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pemesanan - Admin Jagara Eco Park</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">

<header class="admin-header">
    <div class="admin-header-inner">
        <div class="admin-brand">
            <span class="brand-title">Admin Jagara Eco Park</span>
            <span class="brand-subtitle">Data Pemesanan</span>
        </div>
        <nav class="admin-nav">
            <a href="../index.php">Dashboard</a>
            <a href="daftar_pemesanan.php" class="active">Data Pemesanan</a>
            <a href="../logout.php" class="logout-link">Logout</a>
        </nav>
    </div>
</header>

<main class="admin-main container">
    <h1>Data Pemesanan</h1>

    <!-- Form Pencarian + Export -->
    <form method="get" class="admin-search-form">
        <input 
            type="text" 
            name="q" 
            placeholder="Cari nama, kode, paket, WhatsApp, atau tanggal kunjungan..." 
            value="<?= htmlspecialchars($keyword); ?>"
        >
        <button type="submit" class="btn-admin-primary">Cari</button>

        <?php if ($keyword !== ''): ?>
            <a href="daftar_pemesanan.php" class="btn-admin-secondary btn-reset">Reset</a>
        <?php endif; ?>

        <!-- Export ke Excel (ikut filter pencarian kalau ada) -->
        <a 
            href="export_excel.php<?= $keyword !== '' ? '?q=' . urlencode($keyword) : ''; ?>" 
            class="btn-admin-success"
        >
            Export ke Excel
        </a>
    </form>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>WhatsApp</th>
                    <th>Paket</th>
                    <th>Tgl Kunjungan</th>
                    <th>Jumlah</th>
                    <th>Waktu Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_pemesanan']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['whatsapp']); ?></td>
                        <td><?= htmlspecialchars($row['paket']); ?></td>
                        <td><?= htmlspecialchars($row['tanggal_kunjungan']); ?></td>
                        <td><?= htmlspecialchars($row['jumlah_orang']); ?></td>
                        <td><?= htmlspecialchars($row['created_at']); ?></td>
                        <td>
                            <a href="detail.php?id=<?= $row['id']; ?>">Detail</a> |
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">
                        <?php if ($keyword === ''): ?>
                            Belum ada data pemesanan.
                        <?php else: ?>
                            Data dengan kata kunci "<strong><?= htmlspecialchars($keyword); ?></strong>" tidak ditemukan.
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<script src="../assets/js/admin.js"></script>
</body>
</html>
