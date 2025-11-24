<?php
// struk.php - tampilan struk pemesanan yang bisa di-print

include 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "Data struk tidak valid.";
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = $id");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data struk tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pemesanan - <?= htmlspecialchars($data['kode_pemesanan']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f1f5f9;
        }
        .struk-container {
            max-width: 520px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #d0d7e2;
            padding: 20px 18px;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo-title {
            font-weight: bold;
            font-size: 18px;
        }
        .logo-sub {
            font-size: 12px;
            color: #6b7280;
        }
        h2 {
            text-align: center;
            margin: 10px 0 16px;
            font-size: 18px;
        }
        .info {
            margin-bottom: 6px;
            font-size: 14px;
        }
        .label {
            font-weight: bold;
        }
        .footer-note {
            margin-top: 16px;
            font-size: 12px;
            text-align: center;
            color: #6b7280;
        }

        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
            }
            .struk-container {
                box-shadow: none;
                border-radius: 0;
                border: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

<div class="struk-container">
    <div class="logo">
        <div class="logo-title">Jagara Eco Park</div>
        <div class="logo-sub">Desa Jagara, Kec. Darma, Kab. Kuningan, Jawa Barat</div>
    </div>

    <h2>Struk Pemesanan</h2>

    <p class="info"><span class="label">Kode Pemesanan:</span> <?= htmlspecialchars($data['kode_pemesanan']); ?></p>
    <p class="info"><span class="label">Nama:</span> <?= htmlspecialchars($data['nama']); ?></p>
    <p class="info"><span class="label">No. WhatsApp:</span> <?= htmlspecialchars($data['whatsapp']); ?></p>
    <p class="info"><span class="label">Email:</span> <?= htmlspecialchars($data['email']); ?></p>
    <p class="info"><span class="label">Paket Wisata:</span> <?= htmlspecialchars($data['paket']); ?></p>
    <p class="info"><span class="label">Tanggal Kunjungan:</span> <?= htmlspecialchars($data['tanggal_kunjungan']); ?></p>
    <p class="info"><span class="label">Jumlah Orang:</span> <?= htmlspecialchars($data['jumlah_orang']); ?></p>
    <p class="info"><span class="label">Catatan:</span> <?= nl2br(htmlspecialchars($data['catatan'])); ?></p>
    <p class="info"><span class="label">Tanggal Pemesanan:</span> <?= htmlspecialchars($data['created_at']); ?></p>

    <div class="footer-note">
        Tunjukkan struk ini kepada petugas Jagara Eco Park saat kedatangan.<br>
        Terima kasih sudah memilih Jagara Eco Park 🌿
    </div>
</div>

</body>
</html>
