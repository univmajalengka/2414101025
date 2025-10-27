<?php
// Sisipkan file koneksi agar session bisa dimulai
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Fluffy Charmies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--light-gray);
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .login-card h3 {
            font-family: var(--heading-font);
            color: var(--dusty-rose);
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .btn-login {
            background-color: var(--sage-green);
            border-color: var(--sage-green);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3>Admin Login</h3>
        <?php 
        // Menampilkan pesan error jika ada
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
            echo '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>';
        }
        ?>
        <form action="proses_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
    </div>
</body>
</html>