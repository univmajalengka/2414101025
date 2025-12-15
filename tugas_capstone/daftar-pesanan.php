<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <!-- Menyambungkan File CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php
    // Koneksi ke database
    include('koneksi.php');

    // Query untuk mengambil data pesanan
    $query = "SELECT * FROM pemesanan"; 
    $result = mysqli_query($koneksi, $query);
    ?>

    <section id="modifikasi-pesanan">
        <div class="container">
            <h2 class="section-title">Daftar Pesanan</h2>

            <!-- Tabel Daftar Pesanan -->
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No. WhatsApp</th>
                        <th>Email</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Paket Wisata</th>
                        <th>Jumlah Orang</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data pesanan
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['whatsapp'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['tanggal_kunjungan'] . "</td>";
                        echo "<td>" . $row['paket'] . "</td>";
                        echo "<td class='center-align'>" . $row['jumlah_orang'] . "</td>";

                        // Menampilkan Total Tagihan
                        echo "<td>Rp " . number_format($row['total_tagihan'], 0, ',', '.') . "</td>";

                        echo "<td>
        <a href='edit_pesanan.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a>
        <a href='delete_pesanan.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pesanan ini?\")'>Delete</a>
    </td>";

                            
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
