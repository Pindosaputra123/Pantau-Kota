<?php
session_start();
require 'koneksi.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Validasi email, password, dan role
    if (!empty($email) && !empty($password) && !empty($role)) {
        // Query untuk memeriksa pengguna di database
        $query_sql = "SELECT * FROM users WHERE email = ? AND role = ?";
        $stmt = mysqli_prepare($conn, $query_sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $role);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil, set session
            $_SESSION["username"] = $user['username'];
            $_SESSION["role"] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header("Location: admin/index.php");
            } elseif ($user['role'] === 'user') {
                header("Location: index.php");
            } else {
                $message = "Role tidak valid.";
            }
            exit();
        } else {
            $message = "Email, Password, atau Role salah.";
        }
    } else {
        $message = "Semua field wajib diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="right-section">
    <div class="overlay"></div>
        <div class="text-content">
            <h1>Saur Warga</h1>
            <p>Membangun Karawang yang lebih melalui aspirasi dan evaluasi</p>
        </div>
    </div>



    <div class="left-section">
 





        <h1>LOGIN</h1>
        <form action="" method="POST">
            <div class="box-input">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box-input">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="box-input">
                <select name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn-input">Login</button>
            <div class="bottom">
                <p>Belum punya akun?
                    <a href="signin.php">Daftar disini</a>
                </p>
            </div>
        </form>
        <?php if (!empty($message)): ?>
            <p class="error"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
