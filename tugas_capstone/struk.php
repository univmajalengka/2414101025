<?php
// struk.php - tampilan struk pemesanan yang bisa di-download sebagai gambar

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .struk-container {
            max-width: 520px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #15803d;
            padding: 20px 18px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo-title {
            font-weight: bold;
            font-size: 22px;
            color: #15803d;
        }
        .logo-sub {
            font-size: 14px;
            color: #6b7280;
        }
        h2 {
            text-align: center;
            margin: 10px 0 16px;
            font-size: 18px;
            color: #15803d;
        }
        .info {
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }
        .label {
            font-weight: bold;
            color: #4a4a4a;
        }
        .footer-note {
            margin-top: 16px;
            font-size: 14px;
            text-align: center;
            color: #6b7280;
        }
        .services {
            font-size: 16px;
            margin-top: 15px;
            color: #4a4a4a;
        }
        .services li {
            margin: 5px 0;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #15803d;
            margin-top: 10px;
        }
        .total-price {
            font-size: 20px;
            color: #f76b8a;
        }
        .btn {
            background-color: #15803d;
            padding: 10px 20px;
            color: white;
            border-radius: 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #1a6039;
        }
    </style>
</head>
<body>

<div class="struk-container" id="strukContainer">
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

    <div class="services">
        <strong>Layanan Tambahan:</strong>
        <ul>
            <?php if ($data['penginapan'] > 0): ?>
                <li>Penginapan: Rp <?= number_format($data['penginapan'], 0, ',', '.'); ?></li>
            <?php endif; ?>
            <?php if ($data['transportasi'] > 0): ?>
                <li>Transportasi: Rp <?= number_format($data['transportasi'], 0, ',', '.'); ?></li>
            <?php endif; ?>
            <?php if ($data['servis_makanan'] > 0): ?>
                <li>Servis/Makanan: Rp <?= number_format($data['servis_makanan'], 0, ',', '.'); ?></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="total">
        <p><span class="label">Total Harga Paket + Layanan Tambahan:</span></p>
        <p class="total-price">Rp <?= number_format($data['harga_paket'] * $data['jumlah_orang'] + $data['penginapan'] + $data['transportasi'] + $data['servis_makanan'], 0, ',', '.'); ?></p>
        <p><span class="label">Total Tagihan:</span></p>
        <p class="total-price">Rp <?= number_format($data['total_tagihan'], 0, ',', '.'); ?></p>
    </div>

    <div class="footer-note">
        Tunjukkan struk ini kepada petugas Jagara Eco Park saat kedatangan.<br>
        Terima kasih sudah memilih Jagara Eco Park 🌿
    </div>

    <!-- Tombol untuk mengunduh struk -->
    <a href="#" class="btn" id="downloadBtn" download>
        Download Gambar Struk
    </a>
</div>

<script>
    // Fungsi untuk mengunduh struk sebagai gambar PNG
    document.getElementById("downloadBtn").onclick = function() {
        var strukElement = document.getElementById("strukContainer");
        html2canvas(strukElement).then(function(canvas) {
            var imageURL = canvas.toDataURL("image/png");
            var link = document.createElement('a');
            link.href = imageURL;
            link.download = 'struk_pemesanan.png'; // Ganti nama file jika perlu
            link.click();
        });
    }
</script>

</body>
</html>
