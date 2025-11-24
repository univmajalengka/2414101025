<?php
session_start();

// Kalau sudah login, langsung ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Jagara Eco Park</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="admin-login-body">

<div class="admin-login-wrapper">
    <h2>Login Admin</h2>
    <p class="subtitle">Masuk ke panel admin Jagara Eco Park</p>

    <?php if ($error): ?>
        <div class="alert alert-error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="proses_login.php" method="POST" class="admin-login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required placeholder="admin">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required placeholder="••••••">
        </div>
        <button type="submit" class="btn-admin-primary">Masuk</button>
    </form>

    <p class="hint">
        (Contoh saja: username <strong>admin</strong>, password <strong>admin123</strong>)
    </p>
</div>

</body>
</html>
