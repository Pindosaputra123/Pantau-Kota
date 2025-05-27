<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kp";

try {
    // Buat koneksi database menggunakan PDO
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tampilkan pesan error
    die("Terjadi masalah: " . $e->getMessage());
}

// Fungsi untuk mendapatkan data admin yang sedang login
// Fungsi untuk mendapatkan data user yang sedang login
function logged_admin() {
    global $db, $admin_login, $role, $id_user;

    // Cek apakah session user aktif
    if (isset($_SESSION['email'])) {
        $admin_login = $_SESSION['email'];

        $sql = "SELECT id, email, role 
                FROM users 
                WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $admin_login);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $role = $result['role'];
            $id_user = $result['id'];
        } else {
            $role = null;
            $id_user = null;
        }
    } else {
        $admin_login = null;
        $role = null;
        $id_user = null;
    }
}
