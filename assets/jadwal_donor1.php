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

// echo $minggu_sekarang . " - ";
// echo $minggu_depan . " - ";
// echo $minggu_selanjutnya;

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
                                while ($kegiatan_sekarang = mysqli_fetch_array($sql_current_week)) :
                                    // Create a DateTime object
                                    $date = new DateTime($kegiatan_sekarang['tanggal_kegiatan']);
                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = $date->format('l, d F Y');

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $kegiatan_sekarang['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $kegiatan_sekarang['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $kegiatan_sekarang['id_kegiatan']; ?>">
                                                    <span><?= $kegiatan_sekarang['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $kegiatan_sekarang['id_kegiatan']; ?>" class="collapse show" aria-labelledby="heading<?= $kegiatan_sekarang['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $kegiatan_sekarang['waktu_mulai']; ?> - <?= $kegiatan_sekarang['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $kegiatan_sekarang['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $kegiatan_sekarang['alamat']; ?> </li>
                                                    <li>Kota : <?= $kegiatan_sekarang['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $kegiatan_sekarang['target_pendonor']; ?> Kantong</li>
                                                </ol>
                                                Kami tunggu kehadiranmu, #PahlawanDarah. Terima kasih banyak!
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

                                while ($kegiatan_depan = mysqli_fetch_array($sql_next_week)) :
                                    // Create a DateTime object
                                    $date = new DateTime($kegiatan_depan['tanggal_kegiatan']);
                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = $date->format('l, d F Y');

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $kegiatan_depan['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $kegiatan_depan['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $kegiatan_depan['id_kegiatan']; ?>">
                                                    <span><?= $kegiatan_depan['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $kegiatan_depan['id_kegiatan']; ?>" class="collapse" aria-labelledby="heading<?= $kegiatan_depan['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $kegiatan_depan['waktu_mulai']; ?> - <?= $kegiatan_depan['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $kegiatan_depan['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $kegiatan_depan['alamat']; ?> </li>
                                                    <li>Kota : <?= $kegiatan_depan['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $kegiatan_depan['target_pendonor']; ?> Kantong</li>
                                                </ol>
                                                Siapkan diri anda #PahlawanDarah untuk kembali berbuat baik minggu depan. Partisipasi Anda adalah harapan baru bagi mereka yang membutuhkan. Sampai jumpa!
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
                                while ($kegiatan_selanjutnya = mysqli_fetch_array($sql_week_after_next)) :
                                    // Create a DateTime object
                                    $date = new DateTime($kegiatan_selanjutnya['tanggal_kegiatan']);
                                    // Format the date to "Nama Hari, DD Month YYYY"
                                    $formattedDate = $date->format('l, d F Y');

                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $kegiatan_selanjutnya['id_kegiatan']; ?>">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $kegiatan_selanjutnya['id_kegiatan']; ?>" aria-expanded="false" aria-controls="collapse<?= $kegiatan_selanjutnya['id_kegiatan']; ?>">
                                                    <span><?= $kegiatan_selanjutnya['nama_kegiatan']; ?></span>
                                                    <p><?= $formattedDate; ?></p>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $kegiatan_selanjutnya['id_kegiatan']; ?>" class="collapse" aria-labelledby="heading<?= $kegiatan_selanjutnya['id_kegiatan']; ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Detail Kegiatan:
                                                <ol>
                                                    <li>Waktu Kegiatan: <?= $kegiatan_selanjutnya['waktu_mulai']; ?> - <?= $kegiatan_selanjutnya['waktu_selesai']; ?> WIB</li>
                                                    <li>Penyelenggara : <?= $kegiatan_selanjutnya['penyelenggara']; ?> & UDD PMI Provinsi Lampung</li>
                                                    <li>Lokasi : <?= $kegiatan_selanjutnya['alamat']; ?> </li>
                                                    <li>Kota : <?= $kegiatan_selanjutnya['kota']; ?>, Lampung</li>
                                                    <li>Target : <?= $kegiatan_selanjutnya['target_pendonor']; ?> Kantong</li>
                                                </ol>
                                                Informasi untuk minggu selanjutnya: Jadwal donor darah akan kembali hadir. Ayo <div class="text-danger">#PahlawanDarah</div>ajak teman dan keluarga, mari ciptakan dampak yang lebih besar bersama-sama.
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