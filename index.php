<?php 
include 'header.php'; 
?>

<section id="beranda" class="hero-section d-flex align-items-center justify-content-center text-center ">
    <canvas id="sparkleCanvas"></canvas>
  <div class="hero-overlay">
    <h1 class="fw-bold mb-3">Selamat Datang di Fluffy Charmies!</h1>
    <p class="lead mb-4">Your Daily Dose of Cuteness!</p>
    <a href="#produk" class="btn btn-lg hero-btn">Lihat Koleksi Kami</a>
  </div>
</section>


<section id="tim-kami" style="background-color: var(--light-gray); padding: 100px 0; margin-bottom: 0;">
  <div class="container">
    <h2 class="fw-bold mb-5 text-center">Meet the Charmies</h2>

    <div class="row align-items-center justify-content-center">
      <!-- TEKS (kiri) -->
      <div class="col-md-6 reveal from-left" style="padding-left:60px; padding-right:40px;">
        <h3 class="fw-bold mb-2">Annisa Aprilia Lestari</h3>
        <p class="text-muted mb-3">Owner &amp; Crafter</p>
        <p class="mt-3">
          Hai! Saya Annisa Aprilia Lestari, founder dari Fluffy Charmies. Saya memulai bisnis ini dari hobi membuat kerajinan
          tangan berbahan kawat bulu dan kini berkembang menjadi produk custom yang penuh makna dan keunikan. Setiap karya saya
          buat dengan cinta dan detail untuk memberikan kebahagiaan bagi setiap pelanggan.
        </p>
        <!-- Kalimat penutup + link IG -->
<p class="owner-ig-text">
  🌟 Temukan lebih banyak karya dan update terbaru di 
  <a href="https://instagram.com/annsa.al" target="_blank" rel="noopener noreferrer" class="ig-link">
    <i class="bi bi-instagram"></i> @annsa.al
  </a>
</p>

      </div>

      <!-- FOTO (kanan) -->
      <div class="col-md-6 text-center reveal from-right">
        <div class="owner-tilt-wrap">
          <img src="assets/owner/annisa.jpg" alt="Annisa Aprilia Lestari" class="img-fluid owner-photo">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================= PRODUK KAMI (Carousel) ======================= -->
<section id="produk" class="produk-sec">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="font-family: var(--heading-font);">Produk Kami</h2>

    <?php
      $q = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 30");
      $items = [];
      while($row = mysqli_fetch_assoc($q)){ $items[] = $row; }
    ?>

    <?php if(count($items) === 0): ?>
      <p class="text-center text-muted mb-0">Belum ada produk untuk ditampilkan.</p>
    <?php else: ?>
      <div class="produk-wrap">
        <button class="produk-nav left" type="button" aria-label="Geser kiri">‹</button>
        <div class="produk-rail" id="produkRail">
          <?php foreach($items as $produk):
            $gambar = (!empty($produk['gambar_produk']))
              ? 'assets/produk/'.$produk['gambar_produk']
              : 'https://via.placeholder.com/600x400.png?text=No+Image';
          ?>
          <a class="produk-card" href="detail_produk.php?id=<?php echo $produk['id_produk']; ?>">
            <img src="<?php echo $gambar; ?>" alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>">
            <div class="produk-info">
              <h5 class="produk-title"><?php echo htmlspecialchars($produk['nama_produk']); ?></h5>
              <div class="produk-bottom">
                <span class="harga">Rp <?php echo number_format($produk['harga']); ?></span>
                <span class="btn-produk">Lihat Detail</span>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <button class="produk-nav right" type="button" aria-label="Geser kanan">›</button>
      </div>
    <?php endif; ?>
  </div>
</section>


<section id="request" style="padding: 60px 0; background-color: var(--light-gray);">
    <div class="container">
        <h2 class="text-center mb-4" style="font-family: var(--heading-font);">Punya Ide Sendiri?</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="proses_request.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_request" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" name="nama_request" id="nama_request" required>
                    </div>
                    <div class="mb-3">
                        <label for="wa_request" class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" name="wa_request" id="wa_request" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_request" class="form-label">Jelaskan Idemu</label>
                        <textarea class="form-control" name="deskripsi_request" id="deskripsi_request" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg" style="background-color: var(--dusty-rose); color: white;">Kirim Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="lokasi" style="background-color: var(--cream); padding: 0;">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Lokasi Kami</h2>

    <div class="row g-4 align-items-start">
      <!-- KIRI: detail alamat & jam buka -->
      <div class="col-md-6">
        <div class="mb-4">
          <h3 class="fw-bold mb-2">Alamat</h3>
          <address class="mb-0" style="font-style: normal; line-height:1.8;">
            Jl. Kh. Abdul Halim No.188, Majalengka Kulon,<br>
            Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418
          </address>
        </div>

        <hr class="my-4">

        <div class="mb-4">
          <h3 class="fw-bold mb-2">Jam Buka</h3>
          <p class="mb-1">Senin–Minggu</p>
          <p class="mb-0">06.00 – 19.00 WIB</p>
        </div>

        <hr class="my-4">

        <!-- Tombol aksi -->
        <?php
    
          $wa_number = '62895373217573';
          // tautan Google Maps ke alamat toko
          $gmap_place = 'https://maps.app.goo.gl/f765QcAUJgFtSfET6?g_st=ac'; 
        ?>
        <div class="d-flex flex-wrap gap-3">
          <a href="https://api.whatsapp.com/send?phone=<?php echo $wa_number; ?>&text=Halo%20Fluffy%20Charmies%2C%20saya%20ingin%20tanya%20produk."
             class="btn-fc btn-fc-primary" target="_blank" rel="noopener">
            💬 Chat WhatsApp
          </a>
          <a href="<?php echo $gmap_place; ?>" class="btn-fc btn-fc-outline" target="_blank" rel="noopener">
            🧭 Arahkan via Google Maps
          </a>
          <a href="#produk" class="btn-fc btn-fc-ghost">
            Lihat Produk
          </a>
        </div>
      </div>

      <!-- KANAN: peta -->
      <div class="col-md-6">
        <!-- Ganti src iframe dengan Embed Google Maps milik alamatmu -->
        <div class="map-card">
          <iframe
  title="Peta Fluffy Charmies"
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"
  src="https://www.google.com/maps/embed?pb=!1m20!1m8!1m3!1d3961.4852994952703!2d108.24103772499566!3d-6.832267343165716!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d-6.8320506!2d108.2431988!4m3!3m2!1d-6.832490099999999!2d108.2440209!5e0!3m2!1sid!2sid!4v1759677034322!5m2!1sid!2sid"
  style="border:0;" allowfullscreen></iframe>

        </div>
        <small class="text-muted d-block mt-2">Geser/zoom untuk melihat rute terbaik.</small>
      </div>
    </div>
  </div>
</section>


<?php 
include 'footer.php'; 
?>