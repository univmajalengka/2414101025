<?php
// proses_login.php
session_start();
require_once 'koneksi.php'; // pastikan variabel koneksinya bernama $koneksi

// Hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: login.php');
  exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
  header('Location: login.php?pesan=gagal');
  exit;
}

// Siapkan query aman
if (!$stmt = mysqli_prepare($koneksi, "SELECT id_admin, username, password, nama_lengkap, foto_pribadi FROM admin WHERE username = ? LIMIT 1")) {
  // fallback jika DB error
  header('Location: login.php?pesan=gagal');
  exit;
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  // Cocokkan password hash
  if (password_verify($password, $row['password'])) {
    // Regenerasi session id utk keamanan (hindari session fixation)
    session_regenerate_id(true);

    $_SESSION['id_admin']      = $row['id_admin'];
    $_SESSION['nama_lengkap']  = $row['nama_lengkap'];
    $_SESSION['foto_pribadi']  = $row['foto_pribadi'];
    $_SESSION['username']      = $row['username'];

    header('Location: admin/index.php');
    exit;
  }
}

// Jika gagal
header('Location: login.php?pesan=gagal');
exit;
