<?php
// proses_pemesanan.php - menyimpan data pemesanan ke database

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';

// Ambil data dari form
$nama       = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$whatsapp   = isset($_POST['whatsapp']) ? trim($_POST['whatsapp']) : '';
$email      = isset($_POST['email']) ? trim($_POST['email']) : '';
$paket      = isset($_POST['paket']) ? trim($_POST['paket']) : '';
$tanggal    = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$jumlah     = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 1;
$catatan    = isset($_POST['catatan']) ? trim($_POST['catatan']) : '';

// Ambil data untuk layanan tambahan
$penginapan = isset($_POST['penginapan']) ? (int) $_POST['penginapan'] : 0;
$transportasi = isset($_POST['transportasi']) ? (int) $_POST['transportasi'] : 0;
$servisMakanan = isset($_POST['servisMakanan']) ? (int) $_POST['servisMakanan'] : 0;

// Validasi sederhana
if ($nama === '' || $whatsapp === '' || $paket === '' || $tanggal === '' || $jumlah < 1) {
    // Kalau ada data penting yang kosong, balikin ke form
    header("Location: index.php#pemesanan");
    exit;
}

// Kode pemesanan unik, contoh: JEP-20251123123045
$kode_pemesanan = 'JEP-' . date('YmdHis');

// Hitung harga paket per orang berdasarkan paket yang dipilih
$harga_per_orang = 0;
if ($paket === "Breakfast at Teras Bumi Cabin") {
    $harga_per_orang = 65000;
} else if ($paket === "Family / Community Gathering") {
    $harga_per_orang = 150000;
}

// Tambahkan biaya layanan tambahan ke harga
$total_harga = $harga_per_orang * $jumlah + $penginapan + $transportasi + $servisMakanan;

// Hitung total tagihan (harga per orang * jumlah orang)
$total_tagihan = $total_harga;

// Simpan ke database
$query = "INSERT INTO pemesanan 
          (kode_pemesanan, nama, whatsapp, email, paket, tanggal_kunjungan, jumlah_orang, catatan, penginapan, transportasi, servis_makanan, harga_paket, total_tagihan)
          VALUES
          ('$kode_pemesanan', '$nama', '$whatsapp', '$email', '$paket', '$tanggal', '$jumlah', '$catatan', '$penginapan', '$transportasi', '$servisMakanan', '$harga_per_orang', '$total_tagihan')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    $id_baru = mysqli_insert_id($koneksi);
    header("Location: pemesanan_sukses.php?id=" . $id_baru);
    exit;
} else {
    // Untuk debugging
    // echo "Error: " . mysqli_error($koneksi);
    header("Location: index.php#pemesanan");
    exit;
}
?>
