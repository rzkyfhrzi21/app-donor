<?php

include 'functions/insight.php';
include 'functions/data.php';


?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Donor Darah KSR PMI Darmajaya & Info Stok Darah | Donorku</title>

    <meta name="description" content="Cari jadwal donor darah terbaru di Lampung dengan mudah. Donorku menyediakan informasi lokasi, jam, dan ketersediaan stok darah dari UDD PMI. Ayo jadi pahlawan kemanusiaan!">

    <meta name="keywords" content="donor darah, pmi lampung, jadwal donor darah, udd lampung, stok darah, donorku, donor darah lampung, info donor darah">

    <link rel="canonical" href="https://www.donorku.com/">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Jadwal Donor Darah Lampung & Info Stok Darah | Donorku">
    <meta property="og:description" content="Cari jadwal & lokasi donor darah terdekat di Lampung. Donorku membantu Anda menjadi pahlawan kemanusiaan.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.donorku.com/">
    <meta property="og:image" content="https://www.donorku.com/assets/img/gallery/donorsekarang.png">
    <meta property="og:site_name" content="Donorku">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Jadwal Donor Darah Lampung & Info Stok Darah | Donorku">
    <meta name="twitter:description" content="Cari jadwal & lokasi donor darah terdekat di Lampung. Donorku membantu Anda menjadi pahlawan kemanusiaan.">
    <meta name="twitter:image" content="https://www.donorku.com/assets/img/gallery/donorsekarang.png">
    <?php include 'assets/css.php'; ?>
</head>

<body>

    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.php"><img src="assets/pmi-datar.png" width="120px" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index">Beranda</a></li>
                                            <li><a href="about">Tentang</a></li>
                                            <li><a href="schedule">Kegiatan Donor</a></li>
                                            <li><a href="contact">Kontak Kami</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="dashboard" class="btn header-btn">Gabung Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area position-relative">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".1s">Ayo Menjadi #PahlawanDarah</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".5s">Setetes Darah Anda, Nyawa Mereka</h1>

                                    <div class="slider-btns">
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="dashboard" class="btn hero-btn">Daftar Sekarang</a>
                                        <!-- <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn" href="https://www.instagram.com/reel/DCrKBY-votl/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
                                            <i class="fas fa-play"></i></a>
                                        <p class="video-cap d-none d-sm-blcok" data-animation="fadeInRight" data-delay="1.0s">Story Vidoe<br> Watch</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter Section Begin -->
            <div class="counter-section d-none d-sm-block">
                <h4 class="text-center mb-3" style="color:#ffdb6f">Hitung Mundur Donor Berikutnya</h4>
                <div class="cd-timer" id="countdown"></div>
            </div>
            <!-- Counter Section End -->
        </div>
        <!-- slider Area End-->

        <!--? Tentang Donor Start-->
        <?php include 'assets/tentang_donor.php'; ?>
        <!-- Tentang Donor End-->

        <!-- Struktur Organisasi Area Start -->
        <?php
        // include 'assets/pengurus.php'; 
        ?>
        <!-- Struktur Organisasi Area End -->

        <!-- Kegiatan Donor Start -->
        <?php include 'assets/jadwal_donor.php'; ?>
        <!-- Kegiatan Donor End -->

        <!-- Galeri Donor Start -->
        <?php include 'assets/galeri_donor.php'; ?>
        <!-- Galeri Donor End -->

        <!-- Lokasi Donor Card Start -->
        <?php include 'assets/lokasi_donor.php'; ?>
        <!-- Lokasi Donor Card End -->

        <!-- Brand Area Start-->
        <section class="work-company section-padding30" style="background: #dc3545;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-8">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-50">
                            <h2>Didukung Penuh Oleh</h2>
                            <p>Gerakan kemanusiaan ini terwujud berkat sinergi dan dukungan penuh dari berbagai institusi terpercaya. Kolaborasi strategis antara pilar pendidikan, pemerintah, serta organisasi kemanusiaan tingkat nasional hingga internasional menjadi fondasi kami dalam melayani masyarakat.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="logo-area">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/dj.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/pmi.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/bdl.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/ksr.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/icrc.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="single-logo mb-30">
                                        <img src="assets/img/logo/donorku.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Brand Area End-->

        <!-- Blog Area Start -->
        <!-- <section class="home-blog-area section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="section-tittle text-center mb-50">
                            <h2>News From Blog</h2>
                            <p>There arge many variations ohf passages of sorem gp ilable, but the majority have ssorem gp iluffe.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/gallery/home-blog1.png" alt="">
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>| Physics</p>
                                    <h3><a href="blog_details.php">Footprints in Time is perfect House in Kurashiki</a></h3>
                                    <a href="blog_details.php" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/gallery/home-blog2.png" alt="">
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>| Physics</p>
                                    <h3><a href="blog_details.php">Footprints in Time is perfect House in Kurashiki</a></h3>
                                    <a href="blog_details.php" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Blog Area End -->
    </main>

    <!-- FOOTER -->
    <?php include 'assets/footer.php'; ?>
    <!-- FOOTER -->
    <script>
        // Countdown ke waktu kegiatan donor darah
        var timerdate = "<?= $timestamp ?>";

        $("#countdown").countdown(timerdate, function(event) {
            $(this).html(
                event.strftime(
                    "<div class='cd-item'><span>%D</span><p>Hari</p></div>" +
                    "<div class='cd-item'><span>%H</span><p>Jam</p></div>" +
                    "<div class='cd-item'><span>%M</span><p>Menit</p></div>" +
                    "<div class='cd-item'><span>%S</span><p>Detik</p></div>"
                )
            );
        });
    </script>
</body>

</html>