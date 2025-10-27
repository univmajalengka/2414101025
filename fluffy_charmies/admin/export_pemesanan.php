<?php
// !!! pastikan path ini sesuai:
require_once __DIR__ . '/../koneksi.php'; // atau __DIR__.'/koneksi.php' bila koneksi.php ada di folder admin

// Tangkap filter (opsional)
$status     = isset($_GET['status'])    ? mysqli_real_escape_string($koneksi, $_GET['status'])    : '';
$date_from  = isset($_GET['date_from']) ? mysqli_real_escape_string($koneksi, $_GET['date_from']) : '';
$date_to    = isset($_GET['date_to'])   ? mysqli_real_escape_string($koneksi, $_GET['date_to'])   : '';

// Header agar diunduh sebagai CSV
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=riwayat_pesanan_' . date('Ymd_His') . '.csv');

// BOM untuk Excel (UTF-8)
echo "\xEF\xBB\xBF";

$out = fopen('php://output', 'w');
// Pakai delimiter ; (aman untuk regional yg pakai koma desimal)
$dlm = ';';

// Header kolom
fputcsv($out, ['No','Tanggal Pesan','Pemesan','No. WA','Detail Pesanan','Total Harga','Status'], $dlm);

// Helper: pastikan Excel tidak membaca rumus
function csv_safe_text($s) {
  // normalisasi linebreak
  $s = str_replace(["\r\n", "\r"], "\n", (string)$s);
  // kalau diawali = + - @ → prefix apostrof agar dianggap teks
  if (preg_match('/^[=\+\-\@]/', $s)) {
    $s = "'".$s;
  }
  return $s;
}

// Build query sama seperti tampilan
$where = [];
if ($status !== '')     $where[] = "status = '{$status}'";
if ($date_from !== '')  $where[] = "DATE(tanggal_pesan) >= '{$date_from}'";
if ($date_to !== '')    $where[] = "DATE(tanggal_pesan) <= '{$date_to}'";

$sql = "SELECT * FROM pesanan";
if ($where) $sql .= " WHERE " . implode(' AND ', $where);
$sql .= " ORDER BY id_pesanan DESC";

$res = mysqli_query($koneksi, $sql);
$no = 1;

while ($row = mysqli_fetch_assoc($res)) {
  // No. WA → paksa teks (hindari 6.28E+13)
  $wa = "'".$row['no_wa'];

  // Detail pesan → aman dari CSV injection & tetap multiline
  $detail = csv_safe_text($row['detail_pesanan']);

  // Total harga: boleh tetap string "Rp10.000"
  $total = 'Rp ' . number_format((float)$row['total_harga'], 0, ',', '.');

  fputcsv($out, [
    $no++,
    $row['tanggal_pesan'],
    $row['nama_pemesan'],
    $wa,
    $detail,
    $total,
    $row['status']
  ], $dlm);
}

fclose($out);
exit;
