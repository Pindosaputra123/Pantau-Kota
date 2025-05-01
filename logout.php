<?php
session_start();

// Simpan halaman saat logout
$logout_redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : '/Pengaduan-Masyarakat/index.php';

// Hapus semua sesi
session_unset();
session_destroy();

// Redirect ke halaman yang ditentukan
header("Location: $logout_redirect_url");
exit();
?>
