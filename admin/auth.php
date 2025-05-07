<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Simpan URL halaman yang diminta sebelum login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Simpan halaman sebelumnya
    header("Location: /Pengaduan-Masyarakat/login.php");
    exit();
}
?>
