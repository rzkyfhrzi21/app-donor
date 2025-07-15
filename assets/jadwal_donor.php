<?php
include 'functions/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

// Initialize date variables
$tanggalTerakhir = new DateTime();
$mingguSekarang = clone $tanggalTerakhir; // Start of the current week
$mingguSekarang->modify('monday this week');

$mingguDepan = clone $mingguSekarang; // Start of the next week
$mingguDepan->modify('+1 week');

$mingguSelanjutnya = clone $mingguDepan; // Start of the week after next
$mingguSelanjutnya->modify('+1 week');

// Convert to date format
$minggu_sekarang = $mingguSekarang->format('Y-m-d');
$minggu_depan = $mingguDepan->format('Y-m-d');
$minggu_selanjutnya = $mingguSelanjutnya->format('Y-m-d');


?>

<section class="accordion fix section-padding30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="section-tittle text-center mb-100">
                    <h2>Jadwal Kegiatan Donor Darah</h2>
                    <p>Temukan kesempatan berbuat baik terdekat Anda. Berikut adalah jadwal lengkap kegiatan donor darah yang akan datang. Pilih lokasi dan waktu yang paling sesuai untuk Anda, dan jadilah #PahlawanDarah hari ini.</p>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-11">
                <div class="properties__button mb-40">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="minggu-sekarang-tab" data-toggle="tab" href="#minggu-sekarang" role="tab" aria-controls="minggu-sekarang" aria-selected="true">Minggu Ini</a>
                            <a class="nav-item nav-link" id="minggu-depan-tab" data-toggle="tab" href="#minggu-depan" role="tab" aria-controls="minggu-depan" aria-selected="false"> Minggu Depan</a>
                            <a class="nav-item nav-link" id="minggu-selanjutnya-tab" data-toggle="tab" href="#minggu-selanjutnya" role="tab" aria-controls="minggu-selanjutnya" aria-selected="false"> Minggu Selanjutnya</a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="minggu-sekarang" role="tabpanel" aria-labelledby="minggu-sekarang-tab">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="accordion-wrapper">
                            <div class="accordion" id="accordionExample">
                                <?php
                                $sql_current_week = mysqli_query($koneksi, "SELECT * FROM kegiatan_donor WHERE tanggal_kegiatan >= '{$minggu_sekarang}' AND tanggal_kegiatan < '{$mingguDepan->format('Y-m-d')}' ORDER BY tanggal_kegiatan ASC");
                                while ($jadwal_kegiatan = mysqli_fetch_array($sql_current_week)) :

                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = formatTanggalIndonesia($jadwal_kegiatan['tanggal_kegiatan']);

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                                    <span><?= $jadwal_kegiatan['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" class="collapse show" aria-labelledby="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $jadwal_kegiatan['waktu_mulai']; ?> - <?= $jadwal_kegiatan['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $jadwal_kegiatan['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $jadwal_kegiatan['alamat']; ?> </li>
                                                    <li>Kota : <?= $jadwal_kegiatan['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $jadwal_kegiatan['target_pendonor']; ?> Kantong</li>
                                                    <li>CP : <a href="https://api.whatsapp.com/send?phone=6287869026613&text=Halo, Kak Fauziah. Saya ingin bertanya  tentang kegiatan <?= $jadwal_kegiatan['nama_kegiatan']; ?>" class="text-primary" target="_blank">+62 878-6902-6613</a> (Fauziah Zahra)</li>
                                                </ol>

                                                Kami tunggu kehadiranmu <code>#PahlawanDarah</code>. Terima kasih banyak!
                                            </div>
                                            <div class="d-sm-block mb-5 pb-4">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2577789156016!2d105.24704462498386!3d-5.377611694601314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dac5f1bf788b%3A0x2458668e7c62825f!2sInstitut%20Informatika%20dan%20Bisnis%20Darmajaya!5e0!3m2!1sid!2sid!4v1751505916599!5m2!1sid!2sid" frameborder="0" width="100%" position: absolute; style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="minggu-depan" role="tabpanel" aria-labelledby="minggu-depan-tab">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="accordion-wrapper">
                            <div class="accordion" id="accordionExample">
                                <?php

                                $sql_next_week = mysqli_query($koneksi, "SELECT * FROM kegiatan_donor WHERE tanggal_kegiatan >= '{$mingguDepan->format('Y-m-d')}' AND tanggal_kegiatan < '{$mingguSelanjutnya->format('Y-m-d')}'");

                                while ($jadwal_kegiatan = mysqli_fetch_array($sql_next_week)) :

                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = formatTanggalIndonesia($jadwal_kegiatan['tanggal_kegiatan']);

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                                    <span><?= $jadwal_kegiatan['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" class="collapse" aria-labelledby="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $jadwal_kegiatan['waktu_mulai']; ?> - <?= $jadwal_kegiatan['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $jadwal_kegiatan['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $jadwal_kegiatan['alamat']; ?> </li>
                                                    <li>Kota : <?= $jadwal_kegiatan['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $jadwal_kegiatan['target_pendonor']; ?> Kantong</li>
                                                    <li>CP : <a href="https://api.whatsapp.com/send?phone=6287869026613&text=Halo, Kak Fauziah. Saya ingin bertanya  tentang kegiatan <?= $jadwal_kegiatan['nama_kegiatan']; ?>" class="text-primary" target="_blank">+62 878-6902-6613</a> (Fauziah Zahra)</li>
                                                </ol>
                                                Siapkan diri anda <code>#PahlawanDarah</code> untuk kembali berbuat baik minggu depan. Partisipasi Anda adalah harapan baru bagi mereka yang membutuhkan. Sampai jumpa!
                                            </div>
                                            <div class="d-sm-block mb-5 pb-4">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2577789156016!2d105.24704462498386!3d-5.377611694601314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dac5f1bf788b%3A0x2458668e7c62825f!2sInstitut%20Informatika%20dan%20Bisnis%20Darmajaya!5e0!3m2!1sid!2sid!4v1751505916599!5m2!1sid!2sid" frameborder="0" width="100%" position: absolute; style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="minggu-selanjutnya" role="tabpanel" aria-labelledby="minggu-selanjutnya-tab">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="accordion-wrapper">
                            <div class="accordion" id="accordionExample">
                                <?php

                                $sql_week_after_next = mysqli_query($koneksi, "SELECT * FROM kegiatan_donor WHERE tanggal_kegiatan >= '{$mingguSelanjutnya->format('Y-m-d')}' ORDER BY tanggal_kegiatan ASC");
                                while ($jadwal_kegiatan = mysqli_fetch_array($sql_week_after_next)) :

                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = formatTanggalIndonesia($jadwal_kegiatan['tanggal_kegiatan']);

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>">
                                                    <span><?= $jadwal_kegiatan['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $jadwal_kegiatan['id_kegiatan']; ?>" class="collapse" aria-labelledby="heading<?= $jadwal_kegiatan['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $jadwal_kegiatan['waktu_mulai']; ?> - <?= $jadwal_kegiatan['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $jadwal_kegiatan['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $jadwal_kegiatan['alamat']; ?> </li>
                                                    <li>Kota : <?= $jadwal_kegiatan['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $jadwal_kegiatan['target_pendonor']; ?> Kantong</li>
                                                    <li>CP : <a href="https://api.whatsapp.com/send?phone=6287869026613&text=Halo, Kak Fauziah. Saya ingin bertanya  tentang kegiatan <?= $jadwal_kegiatan['nama_kegiatan']; ?>" class="text-primary" target="_blank">+62 878-6902-6613</a> (Fauziah Zahra)</li>
                                                </ol>
                                                Informasi untuk minggu selanjutnya: Jadwal donor darah akan kembali hadir. Ayo <code>#PahlawanDarah</code> ajak teman dan keluarga, mari ciptakan dampak yang lebih besar bersama-sama.
                                            </div>
                                            <div class="d-sm-block mb-5 pb-4">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2577789156016!2d105.24704462498386!3d-5.377611694601314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dac5f1bf788b%3A0x2458668e7c62825f!2sInstitut%20Informatika%20dan%20Bisnis%20Darmajaya!5e0!3m2!1sid!2sid!4v1751505916599!5m2!1sid!2sid" frameborder="0" width="100%" position: absolute; style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Nav Card -->
    </div>
</section>