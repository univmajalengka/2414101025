<?php 
include 'header.php'; 
?>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title" style="font-family: var(--heading-font);">Keranjang Belanja Anda</h3>
        </div>
        <div class="card-body">
            <?php
            // Cek apakah keranjang kosong
            if (empty($_SESSION['keranjang'])) {
                echo "<div class='text-center py-5'>";
                echo "<h4>Keranjang belanja Anda masih kosong.</h4>";
                echo "<a href='index.php#produk' class='btn mt-3' style='background-color: var(--dusty-rose); color: white;'>Mulai Belanja</a>";
                echo "</div>";
            } else {
            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Produk</th>
                            <th>Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_harga = 0;
                        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                            // Ambil data produk dari database
                            $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
                            $result = mysqli_query($koneksi, $query);
                            $produk = mysqli_fetch_assoc($result);
                            
                            $subtotal = $produk['harga'] * $jumlah;
                            $total_harga += $subtotal;
                            $gambar = (!empty($produk['gambar_produk'])) ? 'assets/produk/' . $produk['gambar_produk'] : 'https://via.placeholder.com/100x100.png?text=No+Image';
                        ?>
                        <tr>
                            <td style="width: 100px;">
                                <img src="<?php echo $gambar; ?>" class="img-fluid rounded">
                            </td>
                            <td>
                                <strong><?php echo $produk['nama_produk']; ?></strong>
                            </td>
                            <td>Rp <?php echo number_format($produk['harga']); ?></td>
                            <td class="text-center"><?php echo $jumlah; ?></td>
                            <td>Rp <?php echo number_format($subtotal); ?></td>
                            <td>
                                <a href="keranjang_aksi.php?hapus_item=<?php echo $id_produk; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini dari keranjang?')">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end"><h4>Total Belanja:</h4></th>
                            <th colspan="2"><h4>Rp <?php echo number_format($total_harga); ?></h4></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="index.php#produk" class="btn btn-outline-secondary">Lanjutkan Belanja</a>
                <a href="checkout.php" class="btn" style="background-color: var(--sage-green); color: white;">Lanjutkan ke Pengiriman</a>
            </div>
            <?php
            } // Penutup else
            ?>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; 
?>