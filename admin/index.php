<?php 
// Sisipkan header admin
include 'header.php'; 

// Query untuk mengambil data statistik (query kategori dihapus)
$total_produk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM produk"))['total'];
$total_pesanan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pesanan"))['total'];

// Query untuk mengambil data semua admin (owner)
$query_owner = "SELECT * FROM admin";
$result_owner = mysqli_query($koneksi, $query_owner);
?>

<div class="alert alert-light" style="background-color: var(--sage-green); color: white;">
    <h4 class="alert-heading">Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!</h4>
    <p>Ini adalah halaman dashboard untuk mengelola website Fluffy Charmies.</p>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 mb-4">
        <div class="card text-white" style="background-color: var(--dusty-rose);">
            <div class="card-body text-center">
                <i class="bi bi-box-seam fs-1"></i>
                <h5 class="card-title mt-2">Total Produk</h5>
                <p class="card-text fs-2"><?php echo $total_produk; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card text-white" style="background-color: var(--sage-green);">
            <div class="card-body text-center">
                <i class="bi bi-receipt fs-1"></i>
                <h5 class="card-title mt-2">Pesanan Masuk</h5>
                <p class="card-text fs-2"><?php echo $total_pesanan; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- KARTU OWNER TUNGGAL (centered) -->
<div class="card border-0 shadow-sm text-center p-4 mt-4 mx-auto" style="max-width: 780px;">
  <h4 class="fw-bold mb-3">Owner "Fluffy Charmies"</h4>

  <!-- Foto -->
  <img src="../assets/owner/annisa.jpg"
       alt="Annisa Aprilia Lestari"
       class="owner-card-photo mb-3">

  <!-- Teks -->
  <h5 class="fw-bold mb-1">Annisa Aprilia Lestari</h5>
  <p class="text-muted mb-3">Owner &amp; Crafter</p>
  <p class="mb-0 px-3" style="line-height:1.8; text-align:justify; text-justify:inter-word;">
    Founder Fluffy Charmies—pengrajin dan kreator produk handmade berbahan flanel
    dengan fokus pada desain custom yang detail dan personal. Setiap karya dibuat
    untuk menghadirkan pengalaman yang bermakna dan menyenangkan bagi pelanggan.
  </p>
</div>




<?php 
// Sisipkan footer admin
include 'footer.php'; 
?>