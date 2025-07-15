<?php

include 'koneksi.php';
$tanggal_sekarang   = date('Y-m-d');
$waktu_sekarang     = date('H:i');
$tahun_sekarang     = date('Y');


// Menghitung Waktu Donor Darah Terdekat
$query = "SELECT tanggal_kegiatan, waktu_mulai FROM kegiatan_donor 
          WHERE CONCAT(tanggal_kegiatan, ' ', waktu_mulai) > NOW() 
          ORDER BY tanggal_kegiatan, waktu_mulai 
          LIMIT 1";

$result = $koneksi->query($query);
$row = $result->fetch_assoc();

if ($row) {
    // Format ke "YYYY/MM/DD HH:MM:SS"
    $waktuGabung = $row['tanggal_kegiatan'] . ' ' . $row['waktu_mulai'];
    $timestamp = date('Y/m/d H:i:s', strtotime($waktuGabung));
} else {
    // Fallback tanggal jauh di masa depan
    $timestamp = "2077/01/01 00:00:00";
}


// echo $waktuKegiatanTerdekat;


// Menghitung total pengguna
$sql_totalPendonor = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pendonor FROM users");
$totalPendonor = mysqli_fetch_assoc($sql_totalPendonor)['total_pendonor'];

// Menghitung total pendonor berhasil
$sql_kegiatanDonor = mysqli_query($koneksi, "SELECT COUNT(*) AS kegiatan_donor FROM kegiatan_donor");
$kegiatanDonor = mysqli_fetch_assoc($sql_kegiatanDonor)['kegiatan_donor'];

// Menghitung total pendonor berhasil
$sql_pendonorBerhasil = mysqli_query($koneksi, "SELECT COUNT(*) AS pendonor_berhasil FROM riwayat_donor");
$pendonorBerhasil = mysqli_fetch_assoc($sql_pendonorBerhasil)['pendonor_berhasil'];

// Menghitung jumlah pengunjung hari ini
$sql_PengunjungHariIni = mysqli_query($koneksi, "SELECT COUNT(*) AS pengunjung_hariIni FROM web_view WHERE tgl = '$tanggal_sekarang'");
$totalPengunjungHariIni = mysqli_fetch_assoc($sql_PengunjungHariIni)['pengunjung_hariIni'];

// Menghitung jumlah seluruh pengunjung
$sql_Pengunjung = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pengunjung FROM web_view");
$totalPengunjung = mysqli_fetch_assoc($sql_Pengunjung)['total_pengunjung'];

// Menghitung jumlah pengguna baru tahun ini
$sql_PenggunaBaru = mysqli_query($koneksi, "SELECT COUNT(*) AS pengguna_baru FROM users WHERE LEFT(created_at, 4) = '$tahun_sekarang'");
$totalPenggunaBaru = mysqli_fetch_assoc($sql_PenggunaBaru)['pengguna_baru'];

// Menghitung jumlah seluruh kegiatan donor
$sql_TotalKegiatan = mysqli_query($koneksi, "SELECT COUNT(*) AS total_kegiatan FROM kegiatan_donor");
$totalKegiatan = mysqli_fetch_assoc($sql_TotalKegiatan)['total_kegiatan'];

// Query untuk menghitung jumlah pengguna laki-laki
$sql_PenggunaLakiLaki = mysqli_query($koneksi, "SELECT COUNT(*) AS penggunaLakiLaki FROM users WHERE jenis_kelamin = 'Laki-laki'");
$totalPenggunaLakiLaki = mysqli_fetch_assoc($sql_PenggunaLakiLaki)['penggunaLakiLaki'];

// Query untuk menghitung jumlah pengguna laki-laki
$sql_PenggunaPerempuan = mysqli_query($koneksi, "SELECT COUNT(*) AS penggunaPerempuan FROM users WHERE jenis_kelamin = 'Perempuan'");
$totalPenggunaPerempuan = mysqli_fetch_assoc($sql_PenggunaPerempuan)['penggunaPerempuan'];

// Query untuk menghitung jumlah donor berdasarkan status dan nama kegiatan
// $sql = "
//     SELECT kd.nama_kegiatan, rd.status, COUNT(*) AS total 
//     FROM riwayat_donor rd
//     JOIN kegiatan_donor kd ON rd.id_kegiatan = kd.id_kegiatan
//     WHERE rd.status IN ('tidak berhasil', 'berhasil', 'layak') 
//     GROUP BY kd.nama_kegiatan, rd.status
// ";
// $result = mysqli_query($koneksi, $sql);

// // Inisialisasi array untuk menyimpan data
// $kegiatanLabels = [];
// $statusCounts = [
//     'tidak berhasil' => [],
//     'berhasil' => [],
//     'layak' => []
// ];

// // Mengambil data dari query
// while ($row = mysqli_fetch_assoc($result)) {
//     $kegiatanLabels[] = $row['nama_kegiatan'];
//     $statusCounts[$row['status']][] = $row['total'];
// }


// // Menghitung total untuk setiap kegiatan
// $finalCounts = [
//     'tidak berhasil' => array_fill(0, count($kegiatanLabels), 0),
//     'berhasil' => array_fill(0, count($kegiatanLabels), 0),
//     'layak' => array_fill(0, count($kegiatanLabels), 0),
// ];

// // Mengisi total berdasarkan kegiatan
// foreach ($statusCounts as $status => $counts) {
//     foreach ($counts as $index => $count) {
//         $finalCounts[$status][$index] += $count;
//     }
// }
