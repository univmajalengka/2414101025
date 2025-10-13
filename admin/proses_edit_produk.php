<?php
include '../koneksi.php';

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$gambar_lama = $_POST['gambar_lama'];

// Cek apakah ada gambar baru yang diupload
if ($_FILES['gambar_produk']['name'] != "") {
    $gambar_produk = $_FILES['gambar_produk']['name'];
    $gambar_tmp = $_FILES['gambar_produk']['tmp_name'];
    
    // Hapus gambar lama
    if (file_exists('../assets/produk/' . $gambar_lama)) {
        unlink('../assets/produk/' . $gambar_lama);
    }
    // Upload gambar baru
    move_uploaded_file($gambar_tmp, '../assets/produk/' . $gambar_produk);
} else {
    // Jika tidak ada, gunakan nama gambar lama
    $gambar_produk = $gambar_lama;
}

$query = "UPDATE produk SET 
            nama_produk='$nama_produk', 
            harga='$harga', 
            deskripsi='$deskripsi', 
            gambar_produk='$gambar_produk' 
          WHERE id_produk='$id_produk'";

if (mysqli_query($koneksi, $query)) {
    header("Location: produk.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>