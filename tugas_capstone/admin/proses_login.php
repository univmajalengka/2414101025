<?php
session_start();

// Username & password yang diizinkan (sederhana)
$valid_username = 'admin';
$valid_password = 'admin123';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username']  = $username;
    header("Location: index.php");
    exit;
} else {
    $error = "Username atau password salah.";
    header("Location: login.php?error=" . urlencode($error));
    exit;
}
