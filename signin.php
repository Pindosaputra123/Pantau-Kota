<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"]; // Ambil nilai role dari form

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $query_sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query_sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $role);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Pendaftaran berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signin.css">
    <title>Register Page</title>
</head>
<body>
<div class="container">
    <!-- Section kiri: Form Registrasi -->
    <div class="left-section">
        <h1>REGISTER</h1>
        <form action="" method="POST">
            <div class="box-input">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="box-input">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box-input">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <!-- Input hidden untuk role -->
            <input type="hidden" name="role" value="user">
            <button type="submit" name="register" class="btn-input">Register</button>
            <div class="bottom">
                <p>Apakah sudah punya akun?
                    <a href="login.php">Login disini</a>
                </p>
            </div>
        </form>
    </div>
    <!-- Section kanan: Gambar dengan overlay -->
    <div class="right-section">
        <div class="overlay"></div>
        <div class="text-content">
            <h1>Saur Warga</h1>
            <p>Membangun Karawang yang lebih melalui aspirasi dan evaluasi</p>
        </div>
    </div>
</div>
</body>
</html>
