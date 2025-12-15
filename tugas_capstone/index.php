<?php
// index.php - halaman utama Jagara Eco Park
include 'header.php';
?>

<!-- ====================== BERANDA / HERO (FULL IMAGE) ====================== -->
<section id="beranda" class="hero-section">
    <div class="hero-bg"></div>

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
        <h2 class="section-title center">Tentang Jagara Eco Park</h2>
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
                <img src="assets/images/obyek-mini-gokart.jpg" alt="Mini Gokart" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Mini Gokart</h3>
                <a class="btn-detail" href="#detail-gokart">Lihat Detail</a>
            </div>

            <!-- 2 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-mini-atv.jpg" alt="Mini ATV Ride" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Mini ATV Ride</h3>
                <a class="btn-detail" href="#detail-atv">Lihat Detail</a>
            </div>

            <!-- 3 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-fun-slide.jpg" alt="Fun Slide" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Fun Slide</h3>
                <a class="btn-detail" href="#detail-slide">Lihat Detail</a>
            </div>

            <!-- 4 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-cabin-teras-bumi.jpg" alt="Cabin Teras Bumi" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Cabin Teras Bumi</h3>
                <a class="btn-detail" href="#detail-cabin">Lihat Detail</a>
            </div>

            <!-- 5 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-istana-balon.jpg" alt="Istana Balon" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Istana Balon</h3>
                <a class="btn-detail" href="#detail-balon">Lihat Detail</a>
            </div>

            <!-- 6 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-area-indoor.jpg" alt="Area Indoor" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
                <h3>Area Indoor</h3>
                <a class="btn-detail" href="#detail-indoor">Lihat Detail</a>
            </div>

            <!-- 7 -->
            <div class="obyek-card">
                <img src="assets/images/obyek-area-outdoor.jpg" alt="Area Outdoor" style="width:100%; height:300px; object-fit:cover; border-radius:14px;">
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

        <div class="paket-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <!-- Paket 1 -->
            <article class="paket-card" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                <div class="paket-image" style="width: 100%; height: 100%; position: relative; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                    <img src="assets/images/paket1.jpg" alt="Paket Breakfast at Teras Bumi Cabin" style="
                        width: 100%; 
                        height: 100%;
                        object-fit: cover;  /* Menyesuaikan gambar untuk mengisi seluruh kontainer */
                        border-radius: 16px;  /* Lengkungan atas */
                    ">
                </div>
                <div class="paket-content" style="padding: 16px;">
                    <h3 style="font-size: 18px; font-weight: 700; color: #1f2933; text-align: center;">Paket Breakfast at Teras Bumi Cabin</h3>
                    <p class="paket-info" style="color: #6b7280; font-size: 14px; margin: 8px 0; text-align: center;">Setiap Sabtu & Minggu • Jam 07.00 – 10.00</p>
                    <p class="paket-desc" style="font-size: 14px; color: #4b5563; text-align: center;">
                        Nikmati sarapan hangat bersama keluarga dengan menu pilihan,
                        minuman, dan pemandangan Waduk Darma yang menenangkan dari Teras Bumi Cabin.
                    </p>
                    <p class="paket-price" style="font-size: 16px; font-weight: 700; color: #ff7b00; margin-top: 10px; text-align: center;">Mulai dari Rp65.000/orang</p>
                    <!-- Tombol Pemesanan dan Ikon YouTube berdampingan -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 12px; margin-top: 12px;">
                        <!-- Tombol Pesan Sekarang -->
                        <a href="pemesanan" style="padding: 10px 20px; background-color: #ff7b00; color: white; border-radius: 999px; font-size: 14px; text-decoration: none;">
                            Pesan Sekarang
                        </a>
                        
                        <!-- Ikon YouTube -->
                        <a href="https://www.youtube.com/watch?v=YOUR_VIDEO_ID" target="_blank" style="text-decoration: none; display: inline-block;">
                            <img src="assets/images/iconyt.jpeg" alt="YouTube Video" style="width: 40px; height: 40px; object-fit: contain;">
                        </a>
                    </div>
                </div>
            </article>

            <!-- Paket 2 -->
            <article class="paket-card" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                <div class="paket-image" style="width: 100%; height: 100%; position: relative; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                    <img src="assets/images/paket2.jpg" alt="Paket Family Gathering Jagara Eco Park" style="
                        width: 100%; 
                        height: 100%;
                        object-fit: cover;  /* Menyesuaikan gambar untuk mengisi seluruh kontainer */
                        border-radius: 16px;  /* Lengkungan atas */
                    ">
                </div>
                <div class="paket-content" style="padding: 16px;">
                    <h3 style="font-size: 18px; font-weight: 700; color: #1f2933; text-align: center;">Paket Family / Community Gathering</h3>
                    <p class="paket-info" style="color: #6b7280; font-size: 14px; margin: 8px 0; text-align: center;">Reservasi H-7</p>
                    <p class="paket-desc" style="font-size: 14px; color: #4b5563; text-align: center;">
                        Paket khusus untuk keluarga besar atau komunitas yang ingin mengadakan
                        gathering di Jagara Eco Park, termasuk area reservasi, konsumsi,
                        dan aktivitas sederhana yang bisa disesuaikan.
                    </p>
                    <p class="paket-price" style="font-size: 16px; font-weight: 700; color: #ff7b00; margin-top: 10px; text-align: center;">Mulai dari Rp150.000/orang</p>
                    <!-- Tombol Pemesanan dan Ikon YouTube berdampingan -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 12px; margin-top: 12px;">
                        <!-- Tombol Pesan Sekarang -->
                        <a href="pemesanan" style="padding: 10px 20px; background-color: #ff7b00; color: white; border-radius: 999px; font-size: 14px; text-decoration: none;">
                            Pesan Sekarang
                        </a>
                        
                        <!-- Ikon YouTube -->
                        <a href="https://www.youtube.com/watch?v=YOUR_VIDEO_ID" target="_blank" style="text-decoration: none; display: inline-block;">
                            <img src="assets/images/iconyt.jpeg" alt="YouTube Video" style="width: 40px; height: 40px; object-fit: contain;">
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ====================== PEMESANAN ====================== -->
<section id="pemesanan" class="section">
    <div class="container">
        <h2 class="section-title" style="font-size: 32px; font-weight: 700; text-align: center; color: #1f2933;">Pemesanan Paket Wisata</h2>
        <p class="section-text" style="text-align: center; font-size: 14px; color: #6b7280; margin-top: 10px;">
            Silakan isi form di bawah ini untuk melakukan pemesanan paket wisata.
            Setelah mengisi form, kamu akan mendapatkan ringkasan pemesanan dan struk
            yang bisa diunduh sebagai bukti. (yang bertanda * wajib diisi)
        </p>

        <form class="form-pemesanan" action="proses_pemesanan.php" method="POST" id="formPemesanan" style="background-color: #ffffff; border-radius: 16px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);">
            <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                    <label for="nama" style="font-size: 14px; color: #1f2933;">Nama Pemesan*</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                    <span id="errorNama" style="color:red; font-size:12px;"></span>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                    <label for="whatsapp" style="font-size: 14px; color: #1f2933;">No. WhatsApp*</label>
                    <input type="text" id="whatsapp" name="whatsapp" placeholder="0822-4000-2320" required style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                    <span id="errorWhatsapp" style="color:red; font-size:12px;"></span>
                </div>
            </div>

            <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                    <label for="email" style="font-size: 14px; color: #1f2933;">Email</label>
                    <input type="email" id="email" name="email" placeholder="annisaal@gmail.com" style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                    <span id="errorEmail" style="color:red; font-size:12px;"></span>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                  <label for="paket" style="font-size: 14px; color: #1f2933;">Pilih Paket Wisata*</label>
                  <select id="paket" name="paket" onchange="hitungTagihan()" required style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">

                    <option value="">-- Pilih Paket --</option>
                    <option value="Breakfast at Teras Bumi Cabin" data-harga="65000">Breakfast at Teras Bumi Cabin</option>
                    <option value="Family / Community Gathering" data-harga="150000">Family / Community Gathering</option>
                 </select>
                 <span id="errorPaket" style="color:red; font-size:12px;"></span>
                </div>

            </div>

            <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                    <label for="tanggal" style="font-size: 14px; color: #1f2933;">Tanggal Kunjungan*</label>
                    <input type="date" id="tanggal" name="tanggal" required style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                    <span id="errorTanggal" style="color:red; font-size:12px;"></span>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                    <label for="jumlah" style="font-size: 14px; color: #1f2933;">Jumlah Orang*</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" value="1" required style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;" oninput="hitungTagihan()">
                    <span id="errorJumlah" style="color:red; font-size:12px;"></span>
                </div>
            </div>

            <div class="form-group" style="display: flex; flex-direction: column; gap: 8px; margin-top: 20px;">
                <label for="pelayananTambahan" style="font-size: 14px; color: #1f2933;">Pelayanan Tambahan</label>
                <p style="font-size: 12px; color: #6b7280;">Pilih layanan tambahan sesuai kebutuhan kamu. Harga akan dihitung otomatis.</p>
            </div>

            <div class="form-row" style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="penginapan" name="penginapan" value="1000000" onclick="hitungTagihan()" style="width: 20px; height: 20px;">
                    <label for="penginapan" style="font-size: 14px; color: #1f2933;">Penginapan (Rp 1.000.000)</label>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="transportasi" name="transportasi" value="1200000" onclick="hitungTagihan()" style="width: 20px; height: 20px;">
                    <label for="transportasi" style="font-size: 14px; color: #1f2933;">Transportasi (Rp 1.200.000)</label>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="servisMakanan" name="servisMakanan" value="500000" onclick="hitungTagihan()" style="width: 20px; height: 20px;">
                    <label for="servisMakanan" style="font-size: 14px; color: #1f2933;">Servis/Makanan (Rp 500.000)</label>
                </div>
            </div>

            <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px; margin-top: 20px;">
                    <label for="totalHarga" style="font-size: 14px; color: #1f2933;">Total Harga Paket + Total Harga Pelayanan Tambahan</label>
                    <input type="text" id="totalHarga" name="totalHarga" readonly style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                </div>
                <div class="form-group" style="display: flex; flex-direction: column; gap: 8px; margin-top: 20px;">
                    <label for="jumlahTagihan" style="font-size: 14px; color: #1f2933;">Jumlah Tagihan</label>
                    <input type="text" id="jumlahTagihan" name="jumlahTagihan" readonly style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;">
                </div>
            </div>

            <div class="form-group" style="display: flex; flex-direction: column; gap: 8px;">
                <label for="catatan" style="font-size: 14px; color: #1f2933;">Catatan Tambahan</label>
                <textarea id="catatan" name="catatan" rows="4" placeholder="Tuliskan kebutuhan khusus atau pertanyaan kamu" style="padding: 10px; border-radius: 10px; border: 1px solid #d0d7e2; font-size: 14px;"></textarea>
            </div>

            <!-- Bagian Tombol di bawah Form -->
<div class="form-buttons" style="display: flex; gap: 20px; justify-content: center; margin-top: 20px;">
    <button type="submit" id="btnKirim" class="btn-primary" style="padding: 12px 20px; background-color: #ff7b00; color: white; border-radius: 30px; font-size: 16px; font-weight: bold; border: none; cursor: pointer;">Kirim Pemesanan</button>
    <a href="daftar-pesanan.php" class="modifikasi-btn" style="padding: 12px 20px; background-color: #4CAF50; color: white; border-radius: 30px; font-size: 16px; font-weight: bold; text-decoration: none; cursor: pointer; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, box-shadow 0.3s ease;">
        Modifikasi Pesanan
    </a>
    <style>
    .modifikasi-btn {
        padding: 12px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 30px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Bayangan lebih tajam */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .modifikasi-btn:hover {
        transform: translateY(-4px); /* Mengangkat tombol */
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4); /* Bayangan lebih tajam */
    }
</style>

</div>       
        </form>
    </div>
</section>

<script>
    function hitungTagihan() {
    var paket = document.getElementById("paket").value;

    // Validasi jika paket belum dipilih
    if (paket === "") {
        alert("Pilih paket wisata terlebih dahulu.");
        return;
    }

    // Ambil jumlah orang
    var jumlahOrang = document.getElementById("jumlah").value;

    // Validasi jumlah orang
    if (isNaN(jumlahOrang) || jumlahOrang < 1) {
        alert("Jumlah orang harus diisi dengan angka yang valid.");
        return;
    }

    // Ambil harga dari atribut data-harga di option
    var hargaPerOrang = document.querySelector("#paket option:checked").getAttribute("data-harga");
    hargaPerOrang = parseInt(hargaPerOrang); // Konversi ke integer

    // Hitung harga berdasarkan jumlah orang
    var totalHarga = hargaPerOrang * jumlahOrang;

    // Menambahkan biaya pelayanan tambahan jika dipilih
    var pelayananTotal = 0;
    var tambahan = "";

    if (document.getElementById("penginapan").checked) {
        pelayananTotal += 1000000; // Penginapan
        tambahan += "Rp 1.000.000 (Penginapan) + ";
    }
    if (document.getElementById("transportasi").checked) {
        pelayananTotal += 1200000; // Transportasi
        tambahan += "Rp 1.200.000 (Transportasi) + ";
    }
    if (document.getElementById("servisMakanan").checked) {
        pelayananTotal += 500000; // Servis/Makanan
        tambahan += "Rp 500.000 (Servis/Makanan) + ";
    }

    // Remove the last "+" sign
    if (tambahan.endsWith(" + ")) {
        tambahan = tambahan.slice(0, -3); // Remove the trailing '+'
    }

    // Menampilkan harga paket dan pelayanan tambahan
    var hargaPaketStr = "Rp " + totalHarga.toLocaleString();
    var hargaPelayananStr = "Rp " + pelayananTotal.toLocaleString();

    // Menampilkan total harga paket + pelayanan tambahan
    document.getElementById("totalHarga").value = hargaPaketStr + " + " + hargaPelayananStr;
    
    // Menampilkan jumlah tagihan
    var jumlahTagihan = totalHarga + pelayananTotal;
    document.getElementById("jumlahTagihan").value = "Rp " + jumlahTagihan.toLocaleString();
}
function validasiForm() {
    var nama = document.getElementById("nama").value;
    var whatsapp = document.getElementById("whatsapp").value;
    var paket = document.getElementById("paket").value;
    var jumlahOrang = document.getElementById("jumlah").value;
    
    if (nama === "" || whatsapp === "" || paket === "" || jumlahOrang === "") {
        alert("Semua field harus diisi!");
        return false; // mencegah pengiriman form
    }
    return true; // melanjutkan pengiriman form
}


    // Fungsi untuk memvalidasi form sebelum pengiriman
    function validateFormBeforeSubmit() {
        let valid = true;
        let pesan = "";

        // Validasi untuk Nama Pemesan
        let nama = document.getElementById("nama").value;
        if (nama === "") {
            pesan += "Nama pemesan harus diisi.\n";
            valid = false;
        }

        // Validasi untuk WhatsApp
        let whatsapp = document.getElementById("whatsapp").value;
        if (whatsapp === "") {
            pesan += "Nomor WhatsApp harus diisi.\n";
            valid = false;
        }

        // Validasi untuk Email
        let email = document.getElementById("email").value;
        if (email === "") {
            pesan += "Email harus diisi.\n";
            valid = false;
        }

        // Validasi untuk Paket Wisata
        let paket = document.getElementById("paket").value;
        if (paket === "") {
            pesan += "Pilih paket wisata.\n";
            valid = false;
        }

        // Validasi untuk Tanggal Kunjungan
        let tanggal = document.getElementById("tanggal").value;
        if (tanggal === "") {
            pesan += "Tanggal kunjungan harus diisi.\n";
            valid = false;
        }

        // Validasi untuk Jumlah Orang
        let jumlah = document.getElementById("jumlah").value;
        if (jumlah === "" || isNaN(jumlah) || jumlah < 1) {
            pesan += "Jumlah orang harus diisi dengan angka yang valid.\n";
            valid = false;
        }

        // Menampilkan pesan error jika form tidak valid
        if (!valid) {
            alert("Lengkapi semua data:\n\n" + pesan);
        }

        return valid; // Hanya mengizinkan pengiriman form jika valid
    }

    // Event listener untuk tombol Kirim
    document.getElementById("formPemesanan").onsubmit = function(event) {
        if (!validateFormBeforeSubmit()) {
            event.preventDefault(); // Mencegah form untuk submit jika validasi gagal
        }
    };


    // Fungsi untuk memvalidasi form sebelum pengiriman
    function validateFormBeforeSubmit() {
        let valid = true;
        let pesan = "";

        // Validasi untuk Nama Pemesan
        let nama = document.getElementById("nama").value;
        if (nama === "") {
            pesan += "Nama pemesan harus diisi.\n";
            valid = false;
        }

        // Validasi lainnya untuk field lain...

        // Menampilkan pesan error jika form tidak valid
        if (!valid) {
            alert("Lengkapi semua data:\n\n" + pesan);
        }

        return valid; // Hanya mengizinkan pengiriman form jika valid
    }

    // Fungsi untuk men-submit form jika validasi berhasil
    function submitForm(event) {
        // Pastikan form valid sebelum mengirim
        if (!validateFormBeforeSubmit()) {
            event.preventDefault(); // Mencegah form untuk submit jika validasi gagal
        } else {
            alert("Form berhasil dikirim!");
            // Redirection ke halaman sukses setelah form valid
            window.location.href = "pemesanan_sukses.php";
        }
    }

    // Menambahkan event listener untuk tombol Kirim
    document.getElementById("formPemesanan").onsubmit = function(event) {
        submitForm(event); // Memanggil fungsi submitForm untuk validasi dan pengiriman form
    };





</script>




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
