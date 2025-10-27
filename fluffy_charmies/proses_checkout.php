<?php
include 'koneksi.php';

// Menangkap data dari form checkout
$nama_pemesan = $_POST['nama_pemesan'];
$no_wa = $_POST['no_wa'];
$alamat = $_POST['alamat'];
$tanggal_pesan = date('Y-m-d H:i:s');
$detail_pesanan_text = "";
$total_harga = 0;

// Memproses setiap item di keranjang
foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
    $query_produk = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result_produk = mysqli_query($koneksi, $query_produk);
    $produk = mysqli_fetch_assoc($result_produk);

    $subtotal = $produk['harga'] * $jumlah;
    $total_harga += $subtotal;

    // Membuat format teks untuk detail pesanan
    $detail_pesanan_text .= "- " . $produk['nama_produk'] . " (x" . $jumlah . ")\n";
}

// Menyimpan pesanan ke tabel 'pesanan' di database
$query_insert = "INSERT INTO pesanan (nama_pemesan, no_wa, alamat, detail_pesanan, total_harga, tanggal_pesan)
                 VALUES ('$nama_pemesan', '$no_wa', '$alamat', '$detail_pesanan_text', '$total_harga', '$tanggal_pesan')";

if (mysqli_query($koneksi, $query_insert)) {
    // Jika berhasil, simpan info pesanan ke session untuk ditampilkan di struk
    $_SESSION['pesanan_terakhir'] = [
        'nama' => $nama_pemesan,
        'no_wa' => $no_wa,
        'alamat' => $alamat,
        'detail' => $detail_pesanan_text,
        'total' => $total_harga
    ];

    // Kosongkan keranjang
    unset($_SESSION['keranjang']);

    // Arahkan ke halaman struk
    header("Location: struk.php");
    exit();
} else {
    echo "Gagal menyimpan pesanan: " . mysqli_error($koneksi);
}

?>