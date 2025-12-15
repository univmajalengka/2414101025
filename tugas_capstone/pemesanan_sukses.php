<?php
// pemesanan_sukses.php - menampilkan ringkasan pemesanan

include 'koneksi.php';
include 'header.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "<section class='section'><div class='container'><p>Data pemesanan tidak valid.</p></div></section>";
    include 'footer.php';
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = $id");
$data  = mysqli_fetch_assoc($query);
?>


<section class="section">
    <div class="container">
        <h2 class="section-title">Pemesanan Berhasil</h2>
        <p class="section-text">
            Terima kasih, pesanan kamu sudah kami terima. Berikut adalah ringkasan pemesananmu.
        </p>

        <?php if ($data): ?>
            <div class="form-pemesanan" style="margin-top:16px;">
                <p><strong>Kode Pemesanan:</strong> <?= htmlspecialchars($data['kode_pemesanan']); ?></p>
                <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama']); ?></p>
                <p><strong>No. WhatsApp:</strong> <?= htmlspecialchars($data['whatsapp']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
                <p><strong>Paket Wisata:</strong> <?= htmlspecialchars($data['paket']); ?></p>
                <p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($data['tanggal_kunjungan']); ?></p>
                <p><strong>Jumlah Orang:</strong> <?= htmlspecialchars($data['jumlah_orang']); ?></p>
                <p><strong>Catatan:</strong> <?= nl2br(htmlspecialchars($data['catatan'])); ?></p>
            </div>

            <!-- Menampilkan Total Harga Paket + Layanan Tambahan -->
            <div class="form-pemesanan" style="margin-top:16px;">
                <p><strong>Total Harga Paket + Layanan Tambahan:</strong> <?= "Rp " . number_format($data['harga_paket'] * $data['jumlah_orang'] + $data['penginapan'] + $data['transportasi'] + $data['servis_makanan'], 0, ',', '.'); ?></p>
                <p><strong>Total Tagihan:</strong> <?= "Rp " . number_format($data['total_tagihan'], 0, ',', '.'); ?></p>
            </div>

            <!-- Menampilkan Layanan Tambahan -->
            <div class="form-pemesanan" style="margin-top:16px;">
                <p><strong>Layanan Tambahan:</strong></p>
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

            <div style="margin-top:16px; display:flex; flex-wrap:wrap; gap:10px;">
                <a class="btn-primary" href="struk.php?id=<?= $data['id']; ?>" target="_blank">
                    Download Struk Pemesanan
                </a>

                <!-- Tombol ke WhatsApp (bisa diganti nomor resminya) -->
                <?php
                $nomorAdmin = "62895373217573"; // ganti dengan nomor WA admin tanpa 0 di depan
                $pesanWA = urlencode("Halo admin Jagara Eco Park, saya ingin konfirmasi pemesanan dengan kode: " . $data['kode_pemesanan']);
                $linkWA = "https://wa.me/" . $nomorAdmin . "?text=" . $pesanWA;
                ?>
                <a class="btn-outline" href="<?= $linkWA; ?>" target="_blank">
                    Chat Admin via WhatsApp
                </a>
                <a href="daftar-pesanan.php" class="modifikasi-btn" style="padding: 12px 20px; background-color: #4CAF50; color: white; border-radius: 30px; font-size: 16px; font-weight: bold; text-decoration: none; cursor: pointer; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, box-shadow 0.3s ease;">
        Modifikasi Pesanan
    </a>
    <style>
    .modifikasi-btn {
        padding: 12px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 30px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Bayangan lebih tajam */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .modifikasi-btn:hover {
        transform: translateY(-4px); /* Mengangkat tombol */
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4); /* Bayangan lebih tajam */
    }
</style>
            </div>
        <?php else: ?>
            <p>Data pemesanan tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</section>


<?php
include 'footer.php';
?>
