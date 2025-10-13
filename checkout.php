<?php 
include 'header.php'; 

// Jika keranjang kosong, tidak boleh masuk ke halaman ini
if (empty($_SESSION['keranjang'])) {
    header("Location: keranjang.php");
    exit();
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title" style="font-family: var(--heading-font);">Data Pengiriman</h3>
                </div>
                <div class="card-body">
                    <p>Silakan isi data di bawah ini untuk melanjutkan pemesanan.</p>
                    <form action="proses_checkout.php" method="POST">
                        <div class="mb-3">
                            <label for="nama_pemesan" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                            <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="Contoh: 628123456789" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg" style="background-color: var(--dusty-rose); color: white;">
                                Buat Pesanan & Struk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; 
?>