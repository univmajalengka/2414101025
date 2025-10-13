<?php 
include 'header.php'; 

// Ambil ID produk dari URL
$id_produk = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($koneksi, $query);
$produk = mysqli_fetch_assoc($result);

$gambar = (!empty($produk['gambar_produk'])) ? '../assets/produk/' . $produk['gambar_produk'] : 'https://via.placeholder.com/400x400.png?text=No+Image';
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Produk: <?php echo $produk['nama_produk']; ?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5 text-center">
                <img src="<?php echo $gambar; ?>" class="img-fluid rounded shadow-sm" alt="Gambar <?php echo $produk['nama_produk']; ?>">
            </div>
            <div class="col-md-7">
                <h3><?php echo $produk['nama_produk']; ?></h3>
                <hr>
                <p><strong>Harga:</strong> Rp <?php echo number_format($produk['harga']); ?></p>
                <hr>
                <h5>Deskripsi</h5>
                <p style="text-align: justify;">
                    <?php echo nl2br($produk['deskripsi']); // nl2br untuk menjaga format paragraf ?>
                </p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="produk.php" class="btn btn-secondary">Kembali ke Manajemen Produk</a>
    </div>
</div>

<?php 
include 'footer.php'; 
?>