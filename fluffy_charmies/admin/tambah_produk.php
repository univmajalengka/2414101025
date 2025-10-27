<?php 
include 'header.php'; 
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Produk Baru</h3>
    </div>
    <div class="card-body">
        <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar_produk" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
            <a href="produk.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php 
include 'footer.php'; 
?>