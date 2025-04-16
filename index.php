<?php
    require_once("private/database.php");
?>
<?php
// fungsi untuk merandom avatar profil
function RandomAvatar(){
    $photoAreas = array("avatar1.png", "avatar2.png", "avatar3.png", "avatar4.png", "avatar5.png", "avatar6.png", "avatar7.png", "avatar8.png", "avatar9.png", "avatar10.png", "avatar11.png");
    $randomNumber = array_rand($photoAreas);
    $randomImage = $photoAreas[$randomNumber];
    echo $randomImage;
}
?>



<?php
// Konfigurasi koneksi database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'kp';

// Koneksi ke database
$mysqli = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Ambil jumlah laporan total
$total_laporan_query = "SELECT COUNT(*) AS total_laporan FROM laporan";
$total_laporan_result = $mysqli->query($total_laporan_query);
$total_laporan = $total_laporan_result->fetch_assoc()['total_laporan'];

// Ambil jumlah laporan menunggu
$menunggu_query = "SELECT COUNT(*) AS menunggu FROM laporan WHERE status = 'Menunggu'";
$menunggu_result = $mysqli->query($menunggu_query);
$total_menunggu = $menunggu_result->fetch_assoc()['menunggu'];

// Ambil jumlah laporan selesai
$selesai_query = "SELECT COUNT(*) AS selesai FROM laporan WHERE status = 'Ditanggapi'";
$selesai_result = $mysqli->query($selesai_query);
$total_selesai = $selesai_result->fetch_assoc()['selesai'];

// Tutup koneksi
$mysqli->close();
?>

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
    <link href="css/stylehome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    
</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!--Success Modal Saved-->
    <div class="modal fade" id="successmodalclear" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content bg-2">
                <div class="modal-header ">
                    <h4 class="modal-title text-center text-green">Sukses</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Pengaduan Berhasil Di Kirim</p>
                    <p class="text-center">Untuk Mengetahui Status Pengaduan</p>
                    <p class="text-center">Silahkan Buka Menu <a href="lihat">Lihat Pengaduan</a> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-green" onclick="location.href='index';" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['status'])) {
    ?>
    <script type="text/javascript">
        $("#successmodalclear").modal();
    </script>
    <?php
        }
    ?>
    <!-- body -->
    <div class="shadow">
        <!-- navbar -->
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

        <!-- end navbar -->

        <section class=header-main">
            <div class="hero">
                <div class="header-text">
                    <h3>Selamat Datang di</h3>
                    <h1>Website</h1>
                    <h1><span style="color:#3E7D60">Saur Warga</span></h1>
                    <p>Wadah aspirasi dan keluh kesah<br>
                    bagi masyarakat Karawang<br>
                    untuk suara yang lebih didengar</p>
                    <a href="lapor.php" class="btn button-green">Laporan Kita</a>
                </div>

                <div class="header-image">
                    <img src="images/orang.png" alt="orang">
                </div>
            </div>
        </section>

        <section class="statistik" style="background-image: url('images/cover_hijau.png');">
            <div class="stat">
                <h2><?php echo $total_laporan; ?></h2>
                <p>Total Laporan</p>
            </div>
            <div class="stat">
                <h2><?php echo $total_menunggu; ?></h2>
                <p>Menunggu</p>
            </div>
            <div class="stat">
                <h2><?php echo $total_selesai; ?></h2>
                <p>Selesai</p>
            </div>
        </section>


        <section class="about">
            <div class="about-image">
                <img src="images/about.png" alt="about">
            </div>
            <div class="about-text">
                <h2><span style="color:#3E7D60">Tentang</span></h2>
                <h2>Saur Warga</h2>
                <p>
                    Saur Warga adalah sebuah platform pengaduan masyarakat berbasis website yang dirancang
                    untuk mempermudah warga dalam menyampaikan keluhan atau aspirasi mereka kepada pemerintah
                    secara cepat, transparan, dan efisien. Platform ini bertujuan untuk menjembatani komunikasi
                    antara masyarakat dan pemerintah dengan menyediakan proses pelaporan yang mudah diakses
                    serta transparan. Melalui Saur Warga, pengguna dapat membuat laporan secara langsung,
                    memantau status dan perkembangan pengaduannya, serta menerima notifikasi atau umpan balik
                    terkait tindak lanjut yang diambil pemerintah.
                </p>
                <p class="nkri">Persatuan bukan tentang menyamakan segalanya, tapi memastikan semua mendapat tempat yang sama mulianya.</p>
                <p>R.A. Kartini</p>
            </div>
        </section>
        
        <div class="main-content">
            <!-- section -->
            <div class="section">
                <div class="row">
                    <!-- laporan Terbaru -->
                    <div class="col-md-8">
                        <br>
                        <h3 class="text-center h3-custom"><span style="color:#3E7D60">Pengaduan</span> Terbaru</h3>
                        <hr class="custom-line"/>
                        <hr>
                        <!-- scroll-laporan -->
                        <div class="scroll-laporan">
                            <?php
                            // Ambil semua record dari tabel laporan
                            $statement = $db->query("SELECT * FROM `laporan` ORDER BY id DESC");
                            foreach ($statement as $key ) {
                                $mysqldate = $key['tanggal'];
                                $phpdate = strtotime($mysqldate);
                                $tanggal = date( 'd F Y, H:i:s', $phpdate);
                                ?>
                                <div class="panel-body card-shadow-2">
                                    <a class="media-left" href="#"><img class="img-circle img-sm form-shadow" src="images/avatar/<?php RandomAvatar(); ?>"></a>
                                    <div class="media-body">
                                        <div>
                                            <h4 class="text-green profil-name" style="font-family: monospace;"><?php echo $key['nama']; ?></h4>
                                            <p class="text-muted text-sm"><i class="fa fa-th fa-fw"></i>  -  <?php echo $tanggal; ?></p>
                                        </div>
                                        <hr class="hr-nama">
                                        <p>
                                            <?php echo $key['isi']; ?>
                                        </p>
                                    </div>
                                    <!-- media body -->
                                </div>
                                <!-- panel body -->
    
                                <?php
                            }
                            ?>
    
                        </div>
                        <!-- end scroll-laporan -->
                    </div>
                    <!-- End Laporan Terbaru -->

                <!-- Social Media Feed -->
                <div class="col-md-4">
                    <br>
                    <!-- header text social-feed -->
                    <h3 class="text-center h3-custom"><span style="color:#3E7D60">Social</span> Feed</h3>
                    <hr class="custom-line"/>
                    <!-- end header text social-feed -->
                    <!-- Twitter Feed -->
                    <div class="box">
                        <div class="box-icon shadow">
                            <span class="fa fa-2x fa-twitter"></span>
                        </div>
                        <div class="info">
                            <h3 class="text-center">twitter</h3>
                            <a class="twitter-timeline" href="https://twitter.com/KarawangDay?lang=en" data-width="500" data-height="300">Tweets by Humas Pemkab Karawang</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                    <!-- End Twitter Feed -->
                    <!-- End Social Media Feed -->
                </div>
                <!-- end row -->
            </div>
            <section class="kritik">
                        <div class="kritik-text">
                            <h1><span style="color:#3E7D60">Kritik</span> & Saran</h1>
                            <p>sebagai bahan evaluasi pengembangan</p>
                        </div>
                        <div class="kritik-form" style="background-image: url('images/cover_hijau.png');">
                            <img src="images/orang.png" alt="kritik">
                            <form class="form-horizontal" role="form" method="post" action="index.php">
                                <input type="text" class="form-control" id="kritik" name="kritik" placeholder="Tuliskan kritik dan saran untuk website">
                                <button type="submit" class="btn btn-primary-custom form-shadow">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

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

    </div>
    <!-- end main-content -->

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




<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil semua elemen yang ingin di-observe
        const elementsToObserve = document.querySelectorAll('.kritik-text h1, .h3-custom');

        // Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scrolled'); // Tambahkan class
                } else {
                    entry.target.classList.remove('scrolled'); // Hapus class jika keluar viewport
                }
            });
        }, { threshold: 0.8 }); // Aktifkan ketika 80% elemen terlihat

        // Observasi setiap elemen
        elementsToObserve.forEach(element => {
            observer.observe(element);
        });
    });




    // Fungsi untuk animasi counter
function animateCounter(element, start, end, duration) {
    let startTimestamp = null;

    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        element.textContent = value;
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };

    window.requestAnimationFrame(step);
}

    // Menjalankan animasi untuk setiap elemen statistik
    document.addEventListener("DOMContentLoaded", () => {
        const totalLaporanElement = document.querySelector(".stat:nth-child(1) h2");
        const menungguElement = document.querySelector(".stat:nth-child(2) h2");
        const selesaiElement = document.querySelector(".stat:nth-child(3) h2");

        // Memulai animasi
        animateCounter(totalLaporanElement, 0, parseInt(totalLaporanElement.textContent), 1000);
        animateCounter(menungguElement, 0, parseInt(menungguElement.textContent), 1000);
        animateCounter(selesaiElement, 0, parseInt(selesaiElement.textContent), 1000);
    });


</script>

</body>
</html>
