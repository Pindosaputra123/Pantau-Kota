<?php
require_once("database.php");

session_start(); // Memulai sesi

// Inisialisasi variabel $account sebagai null secara default
$account = null;

// Fungsi untuk membuat token CSRF
function generate_csrf_token() {
    return bin2hex(random_bytes(32));
}

// Jika token CSRF belum ada, buat token baru dan simpan di sesi
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generate_csrf_token();
}

// Token CSRF dari sesi
$csrf_token = $_SESSION['csrf_token'];

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    try {
        // Query ke database untuk mendapatkan detail pengguna
        $query = "SELECT id, username, email, role FROM users WHERE username = :username";
        $stmt = $db->prepare($query); // Menggunakan PDO
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Jika data pengguna ditemukan, simpan ke $account
        if ($stmt->rowCount() > 0) {
            $account = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        // Menangani kesalahan koneksi atau query
        echo "Database error: " . $e->getMessage();
        exit;
    }
}

// Fungsi untuk memvalidasi token CSRF
function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Jika metode POST digunakan, validasi token CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
        echo "Invalid CSRF token.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saur Warga</title>
    <link rel="shortcut icon" href="images/samblog.svg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/stylehome.css" rel="stylesheet">
    <link href="css/profil.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/animate.min.css">
    <title>Profile</title>
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Navbar -->
<div class="shadow">
    <div class="navbar">
        <div class="main-logo">
            <a href="/"><img src="images/samblog.svg" alt="Logo Sambat" class="main-logo"></a>
            <div class="sub-tem">
                <h1>Saur Warga</h1>
            </div>
        </div>
        <div class="menu">
            <a href="index.php" target="_top">UTAMA</a>
            <a href="lapor.php" target="_top">LAPOR</a>
            <a href="lihat.php" target="_top">LIHAT LAPORAN</a>
            <a href="cara.php" target="_top">PROFIL DINAS</a>
            <a href="faq.php" target="_top">TENTANG</a>
        </div>

        <?php if (isset($username)): ?>
        <div class="logsig">
            <a href="/Pengaduan-Masyarakat/profile.php">
                <button class="login-new-btn"><?= htmlspecialchars($username) ?></button>
            </a>
        </div>
        <?php else: ?>
        <div class="logsig">
            <a href="/Pengaduan-Masyarakat/login.php"><button class="login-btn">Masuk</button></a>
            <a href="/Pengaduan-Masyarakat/signin.php"><button class="signup-btn">Daftar</button></a>
        </div>
        <?php endif; ?>
    </div>

    <section class="dashboard-container">
        <div class="dashboard-header">
            <h1>Selamat Datang, <span><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></span>!</h1>
            <h2>Profil Anda</h2>
        </div>

        <div class="profile-section">
            <form action="/Pengaduan-Masyarakat/update" method="POST" class="profile-form">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="new_username" 
                           value="<?= htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8'); ?>" 
                           placeholder="Enter a new username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="new_email" 
                           value="<?= htmlspecialchars($account['email'], ENT_QUOTES, 'UTF-8'); ?>" 
                           placeholder="Enter a new email">
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new_password" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current_password" 
                           placeholder="Enter current password" required>
                </div>
                <div class="form-group">
                    <label for="retype-password">Confirm New Password:</label>
                    <input type="password" id="retype-password" name="confirm_password" 
                           placeholder="Re-enter new password">
                </div>
                <button type="submit" class="btn-save-profile">Simpan</button>
            </form>
        </div>
        <div class="action-buttons">
            <a href="/Pengaduan-Masyarakat/logout.php" class="btn-logout">Log Out</a>
            <form action="/Pengaduan-Masyarakat/delete.php" method="POST" class="delete-account-form">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="btn-delete-account" 
                        onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                    Hapus Akun
                </button>
            </form>
        </div>
    </section>




     <!-- Footer -->
     <footer class="footer text-center">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-map-marker"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Kantor</h4>
                        </li>
                    </ul>
                    <p class="mb-0">
                        Jl. A. Yani No 1 Karawang
                        <br>Karawang, Jawa Barat
                    </p>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-rss"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Sosial Media</h4>
                        </li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/KarawangDay?lang=en">
                                <i class="fa fa-fw fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-envelope-o"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Kontak</h4>
                        </li>
                    </ul>
                    <p class="mb-0">
                        +62 812-3456-7890 <br>
                        https://karawangkab.go.id/opd <br>
                        karawangpemkab@gmail.com
                    </p>
                </div>
            </div>
        </footer>
        <!-- /footer -->

    <div class="copyright">
        <p style="text-align: center; color: white">v-1.0 | Copyright &copy; Pemerintahan Kabupaten Karawang</p>
    </div>
</div>
</body>
</html>
