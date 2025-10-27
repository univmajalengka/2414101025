<?php
include 'header.php'; 

// Cek data pesanan dari session
if (!isset($_SESSION['pesanan_terakhir'])) {
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
$pesanan = $_SESSION['pesanan_terakhir'];

// --- Link WhatsApp untuk Tombol Kontak ---
$nomor_wa_owner = "62895373217573";
$pesan_wa_kontak = "Halo Fluffy Charmies, saya mau mengirimkan struk pesanan saya.";
$link_wa_kontak = "https://api.whatsapp.com/send?phone=" . $nomor_wa_owner . "&text=" . urlencode($pesan_wa_kontak);
?>
<style>
    /* ... (kode CSS struk dari jawaban sebelumnya ada di sini) ... */
    .receipt-container{display:flex;justify-content:center;align-items:center;padding:40px 0;background-color:var(--light-gray)}.receipt{width:100%;max-width:450px;background:#fff;border-radius:15px;box-shadow:0 5px 20px rgba(0,0,0,.1);padding:30px;font-family:'Poppins',sans-serif}.receipt .header{text-align:center;margin-bottom:25px;border-bottom:2px dashed #eee;padding-bottom:15px}.receipt .header h3{font-weight:700;color:var(--sage-green);margin:0}.receipt .details p{margin-bottom:10px;font-size:14px;display:flex;justify-content:space-between}.receipt .details p span:first-child{color:#888}.receipt .details p span:last-child{font-weight:600;text-align:right;color:#333}.receipt .order-details{background-color:#f8f9fa;border:1px solid #eee;border-radius:8px;padding:15px;margin:25px 0}.receipt .order-details h4{font-size:16px;font-weight:600;margin-bottom:10px}.receipt .order-details p{margin:0;font-size:14px;color:#555;white-space:pre-wrap}.receipt .total-section{background-color:var(--dusty-rose);color:#fff;border-radius:8px;padding:20px;text-align:center;margin:25px 0}.receipt .total-section p{margin:0;font-size:14px;opacity:.9}.receipt .total-section strong{font-size:28px;display:block;margin-top:5px}.receipt .footer{text-align:center;font-size:12px;color:#999}
    .action-steps { margin-top: 2rem; border: 2px dashed var(--sage-green); border-radius: 15px; padding: 1.5rem; }
    .step { margin-bottom: 1rem; }
    .step .step-number { background-color: var(--dusty-rose); color: white; border-radius: 50%; width: 30px; height: 30px; display: inline-block; text-align: center; line-height: 30px; font-weight: bold; margin-right: 10px;}
    /* rapikan baris detail 2 kolom agar alamat panjang membungkus */
.receipt .details p{
  margin-bottom:10px;
  font-size:14px;
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  gap:12px;
}
.receipt .details p span:first-child{
  color:#888;
  min-width:45%;
}
.receipt .details p span:last-child{
  font-weight:600;
  color:#333;
  text-align:right;
  max-width:55%;
  white-space:pre-wrap;
  word-wrap:break-word;
  word-break:break-word;
}

</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <<div id="struk-container" class="receipt">
  <div class="header">
    <h3>Pesanan Berhasil Dibuat!</h3>
    <p class="text-muted mt-1">Berikut adalah detail pesanan Anda.</p>
  </div>

  <div class="details">
    <p>
      <span>Nama Pemesan:</span>
      <span><?php echo htmlspecialchars($pesanan['nama'] ?? ''); ?></span>
    </p>
    <p>
      <span>Nomor WhatsApp:</span>
      <span><?php echo htmlspecialchars($pesanan['no_wa'] ?? ''); ?></span>
    </p>
    <!-- ⬇️ Tambahan: Alamat Pengiriman -->
    <p>
      <span>Alamat Pengiriman:</span>
      <span><?php echo nl2br(htmlspecialchars($pesanan['alamat'] ?? '')); ?></span>
    </p>
  </div>

  <div class="order-details">
    <h4>Detail Pesanan</h4>
    <p><?php echo htmlspecialchars($pesanan['detail'] ?? ''); ?></p>
  </div>

  <div class="total-section">
    <p>Total Pembayaran</p>
    <strong>Rp <?php echo number_format((float)($pesanan['total'] ?? 0)); ?></strong>
  </div>

  <div class="footer">Terima kasih telah berbelanja di Fluffy Charmies!</div>
</div>


            <div class="action-steps text-center">
                <h4 style="font-family: var(--heading-font);">Selesaikan Pesananmu!</h4>
                <div class="step mt-4">
                    <h5><span class="step-number">1</span> Simpan Struk Ini</h5>
                    <p class="text-muted">Simpan struk ini sebagai gambar di perangkatmu.</p>
                    <button id="btn-share" class="btn btn-secondary mb-2 w-100"><i class="bi bi-share"></i> Bagikan Struk (Untuk HP)</button>
                    <button id="btn-download" class="btn btn-secondary w-100"><i class="bi bi-download"></i> Download Struk (Untuk Komputer)</button>
                </div>
                <hr>
                <div class="step">
                    <h5><span class="step-number">2</span> Kirim ke Admin</h5>
                    <p class="text-muted">Klik di bawah ini untuk membuka WhatsApp admin, lalu kirim gambar struk yang sudah kamu simpan.</p>
                    <a href="<?php echo $link_wa_kontak; ?>" target="_blank" class="btn btn-lg btn-success w-100">
                        <i class="bi bi-whatsapp"></i> Hubungi Admin via WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    const strukElement = document.getElementById('struk-container');
    const shareButton = document.getElementById('btn-share');
    const downloadButton = document.getElementById('btn-download');
    const downloadStruk = () => { html2canvas(strukElement).then(canvas => { const link = document.createElement('a'); link.download = 'struk-fluffy-charmies.png'; link.href = canvas.toDataURL('image/png'); link.click(); }); };
    const shareStruk = () => { html2canvas(strukElement).then(canvas => { canvas.toBlob(function(blob) { const file = new File([blob], "struk-fluffy-charmies.png", { type: "image/png" }); const filesArray = [file]; if (navigator.canShare && navigator.canShare({ files: filesArray })) { navigator.share({ files: filesArray, title: 'Struk Pemesanan Fluffy Charmies', text: 'Halo Fluffy Charmies, ini pesanan saya.', }); } else { alert('Browser Anda tidak mendukung fitur berbagi. Silakan download gambar struknya.'); downloadStruk(); } }, 'image/png'); }); };
    downloadButton.addEventListener('click', downloadStruk);
    shareButton.addEventListener('click', shareStruk);
</script>

<?php 
unset($_SESSION['pesanan_terakhir']);
?>