<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'kp';

try {
    // Membuat koneksi menggunakan OOP
    $conn = new mysqli($host, $user, $password, $dbname);
    
    // Cek koneksi
    if ($conn->connect_error) {
        throw new Exception("Koneksi gagal: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Menangani error dan menampilkan pesan yang lebih jelas
    die("Error: " . $e->getMessage());
}
?>
