<?php 
include 'header.php'; 
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manajemen Produk</h3>
    </div>
    <div class="card-body">
        <a href="tambah_produk.php" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Produk Baru</a>
        
        <form action="produk.php" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari nama produk..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ==========================================
                    // == 2. LOGIKA QUERY PHP DIPERBARUI      ==
                    // ==========================================
                    $keyword = '';
                    if (isset($_GET['keyword'])) {
                        $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
                    }

                    // Query dasar
                    $query = "SELECT * FROM produk";

                    // Jika ada kata kunci pencarian, tambahkan kondisi WHERE
                    if ($keyword != '') {
                        $query .= " WHERE nama_produk LIKE '%" . $keyword . "%'";
                    }

                    $query .= " ORDER BY id_produk DESC";
                    
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $gambar = (!empty($row['gambar_produk'])) ? '../assets/produk/' . $row['gambar_produk'] : 'https://via.placeholder.com/100x100.png?text=No+Image';
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><img src="<?php echo $gambar; ?>" width="100" class="img-thumbnail"></td>
                        <td><?php echo $row['nama_produk']; ?></td>
                        <td>Rp <?php echo number_format($row['harga']); ?></td>
                        <td class="text-center">
                            <a href="detail_produk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                            <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="hapus_produk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="bi bi-trash3"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; 
?>