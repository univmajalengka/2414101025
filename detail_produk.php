<?php 
include 'header.php'; 

// Cek apakah ada ID produk di URL
if (!isset($_GET['id'])) {
    // Jika tidak ada, kembali ke halaman utama
    header("Location: index.php");
    exit();
}

$id_produk = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($koneksi, $query);
$produk = mysqli_fetch_assoc($result);

// Jika produk dengan ID tersebut tidak ditemukan
if (!$produk) {
    echo "<div class='container my-5 text-center'><h4>Produk tidak ditemukan.</h4><a href='index.php'>Kembali ke Beranda</a></div>";
    include 'footer.php';
    exit();
}

$gambar = (!empty($produk['gambar_produk'])) ? 'assets/produk/' . $produk['gambar_produk'] : 'https://via.placeholder.com/400x400.png?text=No+Image';
?>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo $gambar; ?>" class="img-fluid rounded" alt="<?php echo $produk['nama_produk']; ?>">
                </div>
                
                <div class="col-md-7">
                    <h2 class="card-title" style="font-family: var(--heading-font);"><?php echo $produk['nama_produk']; ?></h2>
                    <h3 class="text-danger fw-bold my-3">Rp <?php echo number_format($produk['harga']); ?></h3>
                    
                    <hr>
                    
                    <h5>Deskripsi Produk</h5>
                    <p style="text-align: justify;"><?php echo nl2br($produk['deskripsi']); ?></p>
                    
                    <hr>
                    
                    <form action="keranjang_aksi.php" method="POST">
                        <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-md-8">
                                <button type="submit" name="tambah_ke_keranjang" class="btn btn-lg w-100" style="background-color: var(--dusty-rose); color: white;">
                                    <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            </div>
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