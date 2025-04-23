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
    <link href="css/cara.css" rel="stylesheet">

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

            <div class="container-news">
        <!-- Author Section -->
        <div class="author-news">
            <p class="name-author">Karawang, Jawa Barat</p>
            <p class="publish-date">Humas, Pemerintahan Karawang</p>
        </div>

        <!-- Title Section -->
        <div class="title-news">
            <h1>Pemerintah Kabupaten Karawang</h1>
        </div>

        <!-- Content Section -->
        <div class="content-news">
            <p>
                Kabupaten Karawang adalah sebuah wilayah di Provinsi Jawa Barat, Indonesia, yang memiliki sejarah panjang dan potensi ekonomi yang besar. Karawang
                dikenal sebagai "Lumbung Padi Jawa Barat" karena kontribusinya yang signifikan dalam sektor pertanian, khususnya padi. Nama "Karawang" berasal dari
                kata dalam bahasa Sunda yang berarti tanah datar yang subur, mencerminkan kondisi geografis wilayah ini yang cocok untuk pertanian. Kabupaten ini
                terletak di bagian utara Jawa Barat dengan ibu kota di Karawang, sebuah kota yang menjadi pusat kegiatan industri, ekonomi, pendidikan, dan pemerintahan.
            </p>

            <p>
                Secara geografis, Karawang berada di dataran rendah dan dekat dengan pesisir utara Jawa. Wilayah ini dialiri oleh sungai-sungai besar seperti Sungai
                Citarum dan Sungai Cibeet, yang menjadi sumber utama pengairan sawah dan kebutuhan air masyarakat. Dengan tanah yang subur dan sistem irigasi yang baik,
                Karawang menjadi daerah yang strategis untuk sektor pertanian dan pengembangan kawasan industri.
            </p>

            <p>
                Kabupaten Karawang dikenal dengan warisan budaya Sunda dan tradisi lokal seperti Jaipongan, Gembyung, dan Wayang Golek. Selain itu, bahasa Sunda yang digunakan
                di Karawang memiliki dialek khas yang dipengaruhi oleh daerah sekitarnya.
            </p>

            <p>
                Kondisi Demografis dan Ekonomi
                Kabupaten Karawang memiliki populasi lebih dari 2,4 juta jiwa (data 2024), dengan komposisi penduduk yang bekerja di sektor industri, pertanian, perdagangan,
                dan jasa. Karawang menjadi salah satu pusat industri nasional dengan banyaknya kawasan industri besar seperti KIIC dan Surya Cipta, yang menjadi rumah bagi
                berbagai perusahaan multinasional. Sektor pendidikan juga terus berkembang dengan adanya perguruan tinggi dan lembaga pendidikan kejuruan yang mendukung
                tenaga kerja lokal.
            </p>

            <p>
                Pemerintahan Kabupaten Karawang
                Pemerintahan Kabupaten Karawang dijalankan oleh Bupati dan Wakil Bupati berdasarkan sistem otonomi daerah. Kantor pemerintahan pusat terletak di Karawang,
                yang juga menjadi pusat administrasi kabupaten. Struktur pemerintahan mencakup berbagai dinas dan badan yang menangani urusan pendidikan, kesehatan,
                perindustrian, dan pariwisata.
            </p>

            <p>
                Kabupaten Karawang terdiri dari 30 kecamatan, masing-masing dipimpin oleh seorang camat. Setiap kecamatan terdiri dari desa dan kelurahan yang jumlahnya
                mencapai ratusan, dengan fokus utama pada pembangunan infrastruktur dan peningkatan kesejahteraan masyarakat.
            </p>

            <p>
                Dalam hal pelayanan publik, Kabupaten Karawang telah mengembangkan berbagai inovasi berbasis teknologi, seperti sistem pelayanan satu pintu (OSS) dan
                layanan digital berbasis aplikasi untuk memudahkan masyarakat dalam mengakses layanan pemerintah. Program pembangunan infrastruktur juga menjadi prioritas,
                termasuk pembangunan jalan, irigasi, jembatan, dan fasilitas umum.
            </p>

            <p>
                Potensi Pembangunan dan Inovasi
                Kabupaten Karawang memiliki potensi besar dalam bidang industri, pertanian modern, dan pariwisata. Pemerintah daerah aktif mendorong pengembangan UMKM
                (Usaha Mikro, Kecil, dan Menengah) melalui pelatihan keterampilan, promosi produk lokal, serta fasilitasi akses pembiayaan dan pasar. Di sektor pariwisata,
                pendekatan pembangunan berkelanjutan dan berbasis masyarakat menjadi strategi utama.
            </p>

            <p>
                Sebagai wilayah yang dinamis dan strategis di koridor industri Jawa Barat, Karawang memiliki visi untuk menjadi kabupaten yang maju dan berdaya saing
                di tingkat nasional dan internasional. Pemerintah daerah juga gencar menjalankan program-program keberlanjutan seperti pengelolaan limbah industri,
                konservasi air, dan penggunaan energi ramah lingkungan.
            </p>

            <p>
                Dengan perpaduan antara warisan budaya, pertanian yang kuat, dan industri modern, Kabupaten Karawang tidak hanya menjadi pusat ekonomi penting, tetapi
                juga tempat yang menjanjikan untuk kehidupan yang seimbang dan berkelanjutan. Peran pemerintah sangat penting dalam menjaga pertumbuhan ini tetap inklusif
                dan ramah lingkungan.
            </p>
        </div>
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


            <!-- end main-content -->
            </div>

            <hr>

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
                        Jl. A. Yani No. 1 Karawang
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
