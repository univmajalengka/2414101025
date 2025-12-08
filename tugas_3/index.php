<?php
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama Pendaftaran</title>
</head>
<body>

<h1>Halaman Utama Pendaftaran Siswa Baru</h1>

<?php if ($status === 'sukses'): ?>
    <p style="color: green;">Pendaftaran berhasil disimpan.</p>
<?php elseif ($status === 'gagal'): ?>
    <p style="color: red;">Pendaftaran gagal disimpan.</p>
<?php endif; ?>

<p><a href="form-daftar.php">Kembali ke Form Pendaftaran</a></p>

</body>
</html>
