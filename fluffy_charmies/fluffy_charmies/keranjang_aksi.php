<?php
// Wajib ada untuk memulai session
include 'koneksi.php';

// --- LOGIKA UNTUK MENAMBAH PRODUK ---
if (isset($_POST['tambah_ke_keranjang'])) {
    
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = array();
    }

    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk] += $jumlah;
    } else {
        $_SESSION['keranjang'][$id_produk] = $jumlah;
    }

    header("Location: keranjang.php");
    exit();
}

// --- LOGIKA BARU UNTUK MENGHAPUS ITEM ---
if (isset($_GET['hapus_item'])) {
    
    $id_produk_hapus = $_GET['hapus_item'];

    if (isset($_SESSION['keranjang'][$id_produk_hapus])) {
        unset($_SESSION['keranjang'][$id_produk_hapus]);
    }

    header("Location: keranjang.php");
    exit();
}

// Jika file diakses tanpa aksi, kembalikan ke halaman utama
header("Location: index.php");
exit();
?>