<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../login.php");
    exit;
}

include '../../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id = $id");
}

header("Location: daftar_pemesanan.php");
exit;
