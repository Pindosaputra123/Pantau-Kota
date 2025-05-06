<?php
session_start();

// Redirect ke halaman 'Pengaduan-Masyarakat/index.php' setelah logout
$logout_redirect_url = '/Pengaduan-Masyarakat/index.php';

// Hapus semua sesi
session_unset();
session_destroy();

// Redirect ke halaman yang ditentukan
header("Location: $logout_redirect_url");
exit();
?>