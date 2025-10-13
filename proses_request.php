<?php
// Tidak perlu session, karena ini adalah form publik

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $nama = $_POST['nama_request'];
    $no_wa = $_POST['wa_request'];
    $deskripsi = $_POST['deskripsi_request'];

    // Nomor WA Owner (sesuai yang kamu berikan)
    $nomor_wa_owner = "62895373217573";

    // Format pesan untuk WhatsApp
    $pesan_wa = "Halo Fluffy Charmies! ✨\n\n";
    $pesan_wa .= "Saya mau konsultasi untuk pesanan custom/request.\n\n";
    $pesan_wa .= "Nama: " . $nama . "\n";
    $pesan_wa .= "No. WhatsApp: " . $no_wa . "\n\n";
    $pesan_wa .= "Detail Request:\n";
    $pesan_wa .= '"' . $deskripsi . '"' . "\n\n";
    $pesan_wa .= "Mohon informasinya ya untuk kemungkinan pembuatan dan perkiraan harganya. Terima kasih!";

    // Buat link WhatsApp
    $link_wa = "https://api.whatsapp.com/send?phone=" . $nomor_wa_owner . "&text=" . urlencode($pesan_wa);

    // Arahkan ke WhatsApp
    header("Location: " . $link_wa);
    exit();

} else {
    // Jika file diakses langsung tanpa submit form, kembalikan ke halaman utama
    header("Location: index.php");
    exit();
}
?>