<?php 
include 'header.php'; 

// Ambil ID produk dari URL
$id_produk = $_GET['id'];
// Query data produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($koneksi, $query);
$produk = mysqli_fetch_assoc($result);
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Produk</h3>
    </div>
    <div class="card-body">
        <form action="proses_edit_produk.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
            <input type="hidden" name="gambar_lama" value="<?php echo $produk['gambar_produk']; ?>">

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $produk['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?php echo $produk['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar_produk" class="form-label">Ganti Gambar Produk (Opsional)</label>
                <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                <small class="form-text text-muted">Gambar saat ini:</small><br>
                <img src="../assets/produk/<?php echo $produk['gambar_produk']; ?>" width="100" class="mt-2 img-thumbnail">
            </div>
            <button type="submit" class="btn btn-primary">Update Produk</button>
            <a href="produk.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php 
include 'footer.php'; 
?>