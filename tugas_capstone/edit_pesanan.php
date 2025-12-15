<?php
// edit_pesanan.php - Mengedit data pemesanan berdasarkan ID

include('koneksi.php');

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "Data pesanan tidak valid.";
    exit;
}

// Query untuk mengambil data pesanan berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pesanan tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $paket = $_POST['paket'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $catatan = $_POST['catatan'];

    // Layanan tambahan
    $penginapan = isset($_POST['penginapan']) ? 'Y' : 'T';
    $transportasi = isset($_POST['transportasi']) ? 'Y' : 'T';
    $servisMakanan = isset($_POST['servisMakanan']) ? 'Y' : 'T';

    // Hitung total harga dan total tagihan
    $harga_per_orang = ($paket === "Breakfast at Teras Bumi Cabin") ? 65000 : 150000;
    $total_harga = $harga_per_orang * $jumlah;

    if ($penginapan === 'Y') $total_harga += 1000000;
    if ($transportasi === 'Y') $total_harga += 1200000;
    if ($servisMakanan === 'Y') $total_harga += 500000;

    // Update query untuk menyimpan perubahan data
$update_query = "UPDATE pemesanan SET 
                        nama = '$nama',
                        whatsapp = '$whatsapp',
                        email = '$email',
                        paket = '$paket',
                        tanggal_kunjungan = '$tanggal',
                        jumlah_orang = '$jumlah',
                        catatan = '$catatan',
                        penginapan = '$penginapan',
                        transportasi = '$transportasi',
                        servis_makanan = '$servisMakanan',
                        harga_paket = '$harga_per_orang',
                        total_tagihan = '$total_harga'
                    WHERE id = $id";


    $result = mysqli_query($koneksi, $update_query);

    if ($result) {
        // Redirect ke daftar pesanan setelah sukses
        header("Location: daftar-pesanan.php?status=updated");
        exit;
    } else {
        echo "Gagal memperbarui data pesanan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #1f2933;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #1f2933;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #d0d7e2;
            font-size: 14px;
        }

        .form-group input[type="checkbox"] {
            width: auto;
        }

        .form-group input[type="submit"] {
            background-color: #ff7b00;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 30px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #ff5722;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #1f2933;
        }

        .section-text {
            font-size: 14px;
            color: #6b7280;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Pesanan</h2>

    <form method="POST">
        <div class="form-group">
            <label for="nama">Nama Pemesan:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>

        <div class="form-group">
            <label for="whatsapp">No. WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" value="<?= htmlspecialchars($data['whatsapp']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
        </div>

        <div class="form-group">
            <label for="paket">Paket Wisata:</label>
            <select id="paket" name="paket" required>
                <option value="Breakfast at Teras Bumi Cabin" <?= ($data['paket'] == "Breakfast at Teras Bumi Cabin") ? 'selected' : ''; ?>>Breakfast at Teras Bumi Cabin</option>
                <option value="Family / Community Gathering" <?= ($data['paket'] == "Family / Community Gathering") ? 'selected' : ''; ?>>Family / Community Gathering</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Kunjungan:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal_kunjungan']; ?>" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah Orang:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= $data['jumlah_orang']; ?>" min="1" required>
        </div>

        <div class="form-group">
            <label for="catatan">Catatan:</label>
            <textarea id="catatan" name="catatan"><?= htmlspecialchars($data['catatan']); ?></textarea>
        </div>

        <div class="form-group">
            <label>Pelayanan Tambahan:</label><br>
            <input type="checkbox" id="penginapan" name="penginapan" <?= ($data['penginapan'] == 'Y') ? 'checked' : ''; ?>>
            <label for="penginapan">Penginapan (Rp 1.000.000)</label><br>

            <input type="checkbox" id="transportasi" name="transportasi" <?= ($data['transportasi'] == 'Y') ? 'checked' : ''; ?>>
            <label for="transportasi">Transportasi (Rp 1.200.000)</label><br>

            <input type="checkbox" id="servisMakanan" name="servisMakanan" <?= ($data['servis_makanan'] == 'Y') ? 'checked' : ''; ?>>
            <label for="servisMakanan">Servis/Makanan (Rp 500.000)</label><br>
        </div>

        <div class="form-group">
            <input type="submit" value="Update Pesanan">
        </div>
    </form>
</div>

</body>
</html>
