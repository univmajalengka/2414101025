<?php
// export_excel.php - meng-export data pemesanan ke file Excel

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit;
}

include '../../koneksi.php';

// Ambil keyword pencarian (kalau ada) supaya export bisa ikut filter
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

// Set header untuk download sebagai Excel
$filename = "data_pemesanan_" . date('Ymd_His') . ".xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

// Mulai output tabel HTML (bisa dibaca Excel)
echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>Kode Pemesanan</th>
        <th>Nama</th>
        <th>No. WhatsApp</th>
        <th>Email</th>
        <th>Paket Wisata</th>
        <th>Tanggal Kunjungan</th>
        <th>Jumlah Orang</th>
        <th>Catatan</th>
        <th>Waktu Pemesanan</th>
      </tr>";

if ($result && mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['kode_pemesanan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>'" . htmlspecialchars($row['whatsapp']) . "</td>"; // pakai ' biar 08 tidak hilang
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['paket']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tanggal_kunjungan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['jumlah_orang']) . "</td>";
        echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>Tidak ada data pemesanan.</td></tr>";
}

echo "</table>";
exit;
