<?php
require_once("private/database.php");
session_start();

// Validasi CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

try {
    // Hapus akun dari database
    $delete_query = "DELETE FROM users WHERE username = :username";
    $stmt = $db->prepare($delete_query);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Hapus sesi
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
