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

            <div style="margin-top:16px; display:flex; flex-wrap:wrap; gap:10px;">
                <a class="btn-primary" href="struk.php?id=<?= $data['id']; ?>" target="_blank">
                    Download Struk Pemesanan
                </a>

                <!-- Tombol ke WhatsApp (bisa diganti nomor resminya) -->
                <?php
                $nomorAdmin = "628xxxxxxxxxx"; // ganti dengan nomor WA admin tanpa 0 di depan
                $pesanWA = urlencode("Halo admin Jagara Eco Park, saya ingin konfirmasi pemesanan dengan kode: " . $data['kode_pemesanan']);
                $linkWA = "https://wa.me/" . $nomorAdmin . "?text=" . $pesanWA;
                ?>
                <a class="btn-outline" href="<?= $linkWA; ?>" target="_blank">
                    Chat Admin via WhatsApp
                </a>
            </div>
        <?php else: ?>
            <p>Data pemesanan tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</section>

<?php
include 'footer.php';
?>
