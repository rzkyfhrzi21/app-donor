<?php

include 'functions/data.php';

?>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Tentang Kami</h4>
                                <div class="footer-pera">
                                    <p>Setetes Darah Anda, Nyawa Mereka: Kolaborasi Kemanusiaan KSR PMI Darmajaya & UDD PMI Lampung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>KSR PMI Unit Darmajaya</h4>
                            <ul>
                                <li>
                                    <p>Alamat : Jl. ZA. Pagar Alam No.93, Gedong Meneng, Rajabasa, Bandar Lampung, Lampung 35141.</p>
                                </li>
                                <li><a href="https://api.whatsapp.com/send?phone=6287869026613&text=Halo, Kak Fauziah😊. Saya ingin bertanya .." target="_blank">Whatsapp : +62 878-6902-6613</a></li>
                                <li><a href="mailto:ksr@darmajaya.ac.id" target="_blank">Email : ksr@darmajaya.ac.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Tautan Penting</h4>
                            <ul>
                                <li><a href="https://pmi.or.id/" target="_blank">PMI Pusat</a></li>
                                <li><a href="http://pmilampung.or.id/" target="_blank">PMI Provinsi Lampung</a></li>
                                <li><a href="https://darmajaya.ac.id/" target="_blank">IIB Darmajaya</a></li>
                                <li><a href="abous">Tentang Kami</a></li>
                                <li><a href="contact">Kontak Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Ikuti Instagram Kami</h4>
                            <ul>
                                <li><a href="https://www.instagram.com/palangmerah_indonesia/" target="_blank">Palang Merah Indonesia</a></li>
                                <li><a href="https://www.instagram.com/pmilampung/" target="_blank">PMI Provinsi Lampung</a></li>
                                <li><a href="https://www.instagram.com/utdpmiprovinsilampung/" target="_blank">Unit Donor Darah PMI Lampung</a></li>
                                <li><a href="https://www.instagram.com/darmajayathebest/" target="_blank">Institut Informatika & Bisnis Darmajaya</a></li>
                                <li><a href="https://www.instagram.com/ksrpmidarmajaya/" target="_blank">KSR PMI Unit Darmajaya</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <div class="footer-pera footer-pera2">
                                <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                            </div>
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="#"
                                        method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                            class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                class="email_icon newsletter-submit button-contactForm"><img src="assets/img/gallery/form.png" alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.php"><img src="dashboard/assets/pmi-bgdatar.png" width="100px" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span><?= $pendonorBerhasil; ?> +</span>
                        <p>Aktivitas Donor</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span><?= $totalPendonor; ?> +</span>
                        <p>Total Pendonor</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span><?= $kegiatanDonor; ?> +</span>
                        <p>Kegiatan Donor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-8 ">
                        <div class="footer-copy-right">
                            <p class="text-white">
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> Hak cipta dilindungi. Desain <i class="fa fa-heart" aria-hidden="true"></i> oleh <a href="https://www.instagram.com/fauziahzhraaa__/" target="_blank" class="text-white">Fauziah Zahra</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4">
                        <div class="footer-social f-right">
                            <a href="https://www.instagram.com/utdpmiprovinsilampung/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://web.facebook.com/palangmerah/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/palangmerah" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- counter , waypoint -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>