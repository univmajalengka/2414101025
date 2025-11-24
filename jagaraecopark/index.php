<?php
// index.php - halaman utama Jagara Eco Park
include 'header.php';
?>

<!-- ====================== BERANDA / HERO (FULL IMAGE) ====================== -->
<section id="beranda" class="hero-section">
    <div class="hero-bg"></div>

    <!-- SOCIAL MEDIA VERTICAL DI KIRI -->
    <div class="hero-social-bar">
        <a href="https://www.instagram.com/jagaraeco.park" target="_blank" title="Instagram Jagara">@</a>
        <a href="https://www.instagram.com/jagabumi.coffee" target="_blank" title="Jagabumi Coffee">J</a>
        <a href="https://www.youtube.com" target="_blank" title="YouTube">▶</a>
    </div>

    <div class="container hero-layout">
        <!-- KIRI: TEKS UTAMA + TOMBOL -->
        <div class="hero-left">
    <p class="hero-tagline">
        <span>EXPLORE • DREAM • DESTINATION</span>
    </p>

    <h1>
        Jagara<br>
        <span class="hero-highlight">Eco Park</span>
    </h1>

    <p class="hero-subtitle">
        Destinasi wisata alam di Waduk Darma dengan suasana hangat,
        spot foto estetik, dan area kuliner yang nyaman.
    </p>

    <button class="btn-primary hero-cta" onclick="window.location='#pemesanan';">
        Book Now
    </button>
</div>


        <!-- KANAN: 3 KARTU FOTO TANPA TEKS -->
        <div class="hero-right">
            <div class="hero-thumbs">
                <div class="hero-thumb">
                    <img src="assets/images/foto1.jpg" alt="">
                </div>
                <div class="hero-thumb">
                    <img src="assets/images/foto2.jpg" alt="">
                </div>
                <div class="hero-thumb">
                    <img src="assets/images/foto3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ====================== ABOUT ====================== -->
<section id="about" class="section">
    <div class="container">
        <h2 class="section-title">Tentang Jagara Eco Park</h2>
        <p class="section-text">
            Jagara Eco Park adalah kawasan wisata alam yang berada di Desa Jagara, Kecamatan Darma,
            Kabupaten Kuningan, Jawa Barat. Berada di tepi Waduk Darma dengan latar Gunung Ciremai,
            tempat ini menawarkan perpaduan suasana alam yang sejuk, spot foto instagramable,
            serta area kuliner yang nyaman melalui Jagabumi Coffee dan Teras Bumi Cabin.
        </p>
        <p class="section-text">
            Pengunjung dapat menikmati sarapan, brunch, atau sekadar ngopi santai sambil
            memandangi hamparan air Waduk Darma yang tenang. Jagara Eco Park cocok untuk
            keluarga, pasangan, maupun komunitas yang ingin mencari suasana hangat dan menenangkan.
        </p>

                <!-- PROFIL PEMBUAT WEBSITE -->
        <div class="about-profile">
            <div class="profile-card">
                <div class="profile-photo">
                    <img src="assets/images/foto-profil.jpg" alt="Foto Annisa Aprilia Lestari">
                </div>
                <div class="profile-info">
                    <h3>Profil Pembuat Website</h3>
                    <p><strong>Nama:</strong> Annisa Aprilia Lestari</p>
                    <p><strong>NPM:</strong> 2414101025</p>
                    <p><strong>Program Studi:</strong> Informatika, Fakultas Teknik</p>
                    <p><strong>Universitas:</strong> Universitas Majalengka</p>
                    <p><strong>Mata Kuliah:</strong> Pengembangan Aplikasi Berbasis Web</p>
                    <p class="profile-note">
                        Website promosi Jagara Eco Park ini dibuat sebagai tugas mata kuliah
                        Pengembangan Aplikasi Berbasis Web pada semester 3.
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- ==================== OBYEK WISATA ==================== -->
<section id="obyek" class="section">
    <div class="container">
        <h2 class="section-title">Obyek Wisata</h2>

        <!-- WRAPPER HORIZONTAL -->
        <div class="obyek-slider">

            <!-- 1 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-mini-gokart.jpg" alt="Mini Gokart">
                <h3>Mini Gokart</h3>
                <a class="btn-detail" href="#detail-gokart">Lihat Detail</a>
            </div>

            <!-- 2 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-mini-atv.jpg" alt="Mini ATV Ride">
                <h3>Mini ATV Ride</h3>
                <a class="btn-detail" href="#detail-atv">Lihat Detail</a>
            </div>

            <!-- 3 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-fun-slide.jpg" alt="Fun Slide">
                <h3>Fun Slide</h3>
                <a class="btn-detail" href="#detail-slide">Lihat Detail</a>
            </div>

            <!-- 4 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-cabin-teras-bumi.jpg" alt="Cabin Teras Bumi">
                <h3>Cabin Teras Bumi</h3>
                <a class="btn-detail" href="#detail-cabin">Lihat Detail</a>
            </div>

            <!-- 5 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-istana-balon.jpg" alt="Istana Balon">
                <h3>Istana Balon</h3>
                <a class="btn-detail" href="#detail-balon">Lihat Detail</a>
            </div>

            <!-- 6 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-area-indoor.jpg" alt="Area Indoor">
                <h3>Area Indoor</h3>
                <a class="btn-detail" href="#detail-indoor">Lihat Detail</a>
            </div>

            <!-- 7 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-area-outdoor.jpg" alt="Area Outdoor">
                <h3>Area Outdoor</h3>
                <a class="btn-detail" href="#detail-outdoor">Lihat Detail</a>
            </div>

        </div>
    </div>
</section>


<!-- Modal Detail Obyek -->
<div id="obyekModal" class="obyek-modal">
  <div class="obyek-modal-dialog">
    <button class="obyek-modal-close" aria-label="Tutup">&times;</button>
    <h3 id="modalNama"></h3>
    <p id="modalHarga" class="obyek-modal-price"></p>
    <p id="modalDeskripsi" class="obyek-modal-desc"></p>
  </div>
</div>



<!-- ====================== FASILITAS WISATA ====================== -->
<section id="fasilitas" class="section">
    <div class="container">
        <h2 class="section-title">Fasilitas Wisata</h2>
        <div class="fasilitas-layout">
            <ul class="fasilitas-list">
                <li>Area parkir luas untuk mobil dan motor</li>
                <li>Jagabumi Coffee & Teras Bumi Cabin</li>
                <li>Area duduk indoor dan outdoor</li>
                <li>Toilet umum dan mushola</li>
                <li>Spot foto keluarga dan pasangan</li>
                <li>Area santai dengan bean bag (pada waktu tertentu)</li>
            </ul>
            <p class="section-text">
                Fasilitas di Jagara Eco Park terus dikembangkan untuk memberikan pengalaman
                terbaik bagi pengunjung. Mulai dari kenyamanan tempat duduk, kebersihan area,
                hingga pelayanan ramah dari para petugas dan barista.
            </p>
        </div>
    </div>
</section>

<!-- ====================== PAKET WISATA ====================== -->
<section id="paket" class="section section-alt">
    <div class="container">
        <h2 class="section-title">Paket Wisata Jagara Eco Park</h2>
        <p class="section-text center">
            Pilih paket yang sesuai dengan rencana liburanmu. Cocok untuk keluarga, pasangan,
            maupun gathering komunitas.
        </p>

        <div class="paket-grid">
            <!-- Paket 1 -->
            <article class="paket-card">
                <div class="paket-image">
                    <img src="assets/images/paket1.jpg" alt="Paket Breakfast at Teras Bumi Cabin">
                </div>
                <div class="paket-content">
                    <h3>Paket Breakfast at Teras Bumi Cabin</h3>
                    <p class="paket-info">Setiap Sabtu & Minggu • Jam 07.00 – 10.00</p>
                    <p class="paket-desc">
                        Nikmati sarapan hangat bersama keluarga dengan menu pilihan,
                        minuman, dan pemandangan Waduk Darma yang menenangkan dari Teras Bumi Cabin.
                    </p>
                    <p class="paket-price">Mulai dari Rp65.000/orang</p>
                </div>
            </article>

            <!-- Paket 2 -->
            <article class="paket-card">
                <div class="paket-image">
                    <img src="assets/images/paket2.jpg" alt="Paket Family Gathering Jagara Eco Park">
                </div>
                <div class="paket-content">
                    <h3>Paket Family / Community Gathering</h3>
                    <p class="paket-info">Minimal 20 orang • Reservasi H-7</p>
                    <p class="paket-desc">
                        Paket khusus untuk keluarga besar atau komunitas yang ingin mengadakan
                        gathering di Jagara Eco Park, termasuk area reservasi, konsumsi,
                        dan aktivitas sederhana yang bisa disesuaikan.
                    </p>
                    <p class="paket-price">Mulai dari Rp150.000/orang</p>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ====================== PEMESANAN ====================== -->
<section id="pemesanan" class="section">
    <div class="container">
        <h2 class="section-title">Pemesanan Paket Wisata</h2>
        <p class="section-text">
            Silakan isi form di bawah ini untuk melakukan pemesanan paket wisata.
            Setelah mengisi form, kamu akan mendapatkan ringkasan pemesanan dan struk
            yang bisa diunduh sebagai bukti.
        </p>

        <form class="form-pemesanan" action="proses_pemesanan.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="whatsapp">No. WhatsApp</label>
                    <input type="text" id="whatsapp" name="whatsapp" placeholder="08xx-xxxx-xxxx" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email (opsional)</label>
                    <input type="email" id="email" name="email" placeholder="contoh@email.com">
                </div>
                <div class="form-group">
                    <label for="paket">Pilih Paket Wisata</label>
                    <select id="paket" name="paket" required>
                        <option value="">-- Pilih Paket --</option>
                        <option value="Breakfast at Teras Bumi Cabin">Breakfast at Teras Bumi Cabin</option>
                        <option value="Family / Community Gathering">Family / Community Gathering</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Orang</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan Tambahan</label>
                <textarea id="catatan" name="catatan" rows="4" placeholder="Tuliskan kebutuhan khusus atau pertanyaan kamu"></textarea>
            </div>

            <button type="submit" class="btn-primary">Kirim Pemesanan</button>
        </form>
    </div>
</section>

<!-- ====================== GALERI & VIDEO ====================== -->
<section id="galeri" class="section section-alt">
    <div class="container">
        <h2 class="section-title">Galery Jagara Eco Park</h2>
        <!-- Wall foto tanpa caption -->
        <div class="galeri-wall">
            <div class="galeri-item">
                <img src="assets/images/g1.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g2.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g3.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g4.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g5.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g6.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g7.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g8.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g9.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g10.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g11.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g12.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g13.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g14.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g15.jpg" alt="Galeri Jagara">
             </div>
            <div class="galeri-item">
                <img src="assets/images/g16.jpg" alt="Galeri Jagara">
             </div>
            <div class="galeri-item">
                <img src="assets/images/g17.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g18.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g19.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g20.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g21.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g22.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g23.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g24.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g25.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g26.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g27.jpg" alt="Galeri Jagara">
             </div>
            <div class="galeri-item">
                <img src="assets/images/g28.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g29.jpg" alt="Galeri Jagara">
            </div>
            <div class="galeri-item">
                <img src="assets/images/g30.jpg" alt="Galeri Jagara">
    </div>
</section>

<!-- ===================== VIDEO YOUTUBE ===================== -->
<section id="video" class="section">
    <div class="container" style="text-align:center;">

        <div class="video-wrapper" style="
            max-width: 900px;
            margin: 0 auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        ">
            <iframe 
    width="100%" 
    height="500"
    src="https://www.youtube.com/embed/fE_I2AKK0U4"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
></iframe>

        </div>
    </div>
</section>



<!-- ===================== LOKASI ===================== -->
<section id="lokasi" class="section section-alt lokasi-section">
    <div class="container lokasi-layout">
        <!-- Kolom kiri: info alamat & jam buka -->
        <div class="lokasi-info">
            <h2 class="section-title">Lokasi Jagara Eco Park</h2>
            <p class="section-text">
                Jagara Eco Park berlokasi di tepi Waduk Darma dengan panorama alam yang sejuk dan instagramable.
            </p>

            <div class="lokasi-block">
                <h3>Alamat</h3>
                <p>
                    Jagara Eco Park<br>
                    Jl. Sakerta Timur, Desa Jagara,<br>
                    Kec. Darma, Kab. Kuningan, Jawa Barat
                </p>
            </div>

            <div class="lokasi-block">
                <h3>Jam Operasional</h3>
                <p>
                    Senin – Jum'at<br>
                    10.00 – 21.00 WIB<br>
                    Sabtu – Minggu<br>
                    09.00 – 21.00 WIB<br>
                </p>
            </div>

            <div class="lokasi-actions">
                <a href="https://wa.me/6282240002320" target="_blank" class="btn-primary lokasi-btn">
                    Chat WhatsApp
                </a>
                <a href="https://www.google.com/maps?q=Jagara+Eco+Park+Kuningan" 
                   target="_blank" 
                   class="btn-outline lokasi-btn">
                    Buka di Google Maps
                </a>
            </div>
        </div>

        <!-- Kolom kanan: embed Google Maps -->
        <div class="lokasi-map">
            <div class="lokasi-map-embed">
                <iframe
                    src="https://www.google.com/maps?q=Jagara+Eco+Park+Kuningan&output=embed"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <p class="lokasi-note">
                Geser / zoom peta untuk melihat rute terbaik menuju Jagara Eco Park.
            </p>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
