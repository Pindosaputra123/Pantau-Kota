<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Saur Warga</title>
    <link rel="shortcut icon" href="images/samblog.svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/faq.css" rel="stylesheet">
</head>

<body>

        <div class="shadow">
        <?php
// Fungsi untuk menentukan halaman aktif
function isActive($page) {
    return basename($_SERVER['PHP_SELF']) == $page ? 'active-menu' : '';
}
?>
    <div class="navbar">
        <div class="main-logo">
            <a href="/">
                <img src="images/samblog.svg" alt="Logo Sambat" class="main-logo">
            </a>
            <div class="sub-tem">
                <h1>Saur Warga</h1>
            </div>
        </div>

        <div class="menu">
            <a href="index.php" class="<?= isActive('index.php') ?>" target="_top">HOME</a>
            <a href="lapor.php" class="<?= isActive('lapor.php') ?>" target="_top">LAPOR</a>
            <a href="lihat.php" class="<?= isActive('lihat.php') ?>" target="_top">LIHAT LAPORAN</a>
            <a href="cara.php" class="<?= isActive('cara.php') ?>" target="_top">PROFIL DINAS</a>
            <a href="faq.php" class="<?= isActive('faq.php') ?>" target="_top">TENTANG</a>
        </div>

        <?php
        session_start(); // Start session to store user information
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        ?>

        <?php if ($username) : ?> 
            <div class="logsig">
                <a href="/Pengaduan-Masyarakat/profile.php">
                    <button class="login-new-btn">
                        <?= htmlspecialchars($username) ?>
                    </button>
                </a>
            </div>
        <?php else: ?>
            <div class="logsig">
                <a href="/Pengaduan-Masyarakat/login.php">
                    <button class="login-btn">Masuk</button>
                </a>
                <a href="/Pengaduan-Masyarakat/signin.php">
                    <button class="signup-btn">Daftar</button>
                </a>
            </div>
        <?php endif; ?>
    </div>


            <!-- content -->
            <div class="main-content">
                <h3>Saur Warga (SW)</h3>
                <hr/>
		        <p class="text-justify">
                Saur Warga: Solusi Digital untuk Aspirasi dan Pengaduan Masyarakat

                Saur Warga adalah platform berbasis website yang dirancang untuk memberikan ruang bagi masyarakat dalam menyampaikan aspirasi, pengaduan, dan keluhan secara mudah, transparan, dan efisien. Platform ini bertujuan untuk menjembatani komunikasi antara masyarakat dengan pihak yang berwenang, sehingga permasalahan yang dihadapi dapat ditangani dengan lebih cepat dan tepat sasaran.
                </p>
                <hr/>
        		<p class="text-justify">
                Melalui Saur Warga, pengguna dapat melaporkan berbagai jenis masalah yang berkaitan dengan layanan publik, infrastruktur, keamanan, hingga isu sosial di lingkungan mereka. Sistem ini dilengkapi dengan fitur unggulan seperti pelacakan laporan secara real-time, yang memungkinkan pengguna memantau perkembangan penyelesaian pengaduan mereka. Selain itu, platform ini menyediakan sistem kategori laporan yang terorganisir, sehingga pengelola dapat memproses pengaduan sesuai prioritas dan tanggung jawab masing-masing pihak.
                </p>
                <hr/>
        		<p class="text-justify">
                Dengan antarmuka yang ramah pengguna dan navigasi yang sederhana, Saur Warga dapat diakses oleh semua kalangan, baik melalui perangkat komputer maupun ponsel. Melalui pendekatan teknologi modern, Saur Warga menjadi salah satu inovasi yang mendukung partisipasi aktif masyarakat dalam pembangunan dan perbaikan layanan publik, sekaligus menciptakan transparansi dalam penanganan masalah yang terjadi di sekitar kita.
                </p>
                <hr/>
        		<p class="text-justify">
                Sebagai sebuah inisiatif berbasis teknologi, Saur Warga diharapkan mampu menjadi sarana yang efektif untuk menyuarakan aspirasi masyarakat, meningkatkan kualitas hidup, dan membangun hubungan yang lebih baik antara warga dan pemerintah.
                </p>
                <hr/>
        		<p class="text-justify">
                Platform "Saur Warga" mengintegrasikan fungsi transparansi, sehingga pelapor dapat memantau perkembangan pengaduannya secara real-time. Dengan demikian, SRW diharapkan dapat mempercepat respons pemerintah terhadap keluhan masyarakat serta meningkatkan akuntabilitas dalam penanganan pengaduan.
                </p>
                <hr>
            </div>

            <!-- link to top -->
            <a id="top" href="#" onclick="topFunction()">
                <i class="fa fa-arrow-circle-up"></i>
            </a>
            <script>
                // When the user scrolls down 100px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};
                function scrollFunction() {
                    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                        document.getElementById("top").style.display = "block";
                    } else {
                        document.getElementById("top").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
            <!-- link to top -->

            <!-- Footer -->
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
            <!-- shadow -->
        </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>
