<?php

include 'koneksi.php';
session_start();

ob_start();

function uploadImg()
{
    $nama_img     = $_FILES['img_donor']['name'];
    $size_img     = $_FILES['img_donor']['size'];
    $tmp_name     = $_FILES['img_donor']['tmp_name'];

    $valid_img    = ['jpg', 'jpeg', 'png'];
    $extensi_img  = strtolower(pathinfo($nama_img, PATHINFO_EXTENSION));

    if (!in_array($extensi_img, $valid_img)) {
        echo "<script>alert('Ekstensi gambar tidak valid!');location.replace('../dashboard/admin?page=profile');</script>";
    } else if ($size_img > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar (maks 1MB)!');location.replace('../dashboard/admin?page=profile');</script>";
    } else {
        $img_baru = uniqid() . '.' . $extensi_img;
        move_uploaded_file($tmp_name, '../dashboard/assets/donor/' . $img_baru);
        return $img_baru;
    }
}

// =====================================================
// 🧍‍♂️ FORM PENDAFTARAN DONOR
// =====================================================
if (isset($_POST['btn_daftardonor'])) {

    $nama_user        = htmlspecialchars(trim($_POST['nama_user']));
    $id_kegiatan      = htmlspecialchars(trim($_POST['id_kegiatan']));
    $tanggal_kegiatan = htmlspecialchars(trim($_POST['tanggal_kegiatan']));
    $email_user       = htmlspecialchars(trim($_POST['email_user'] ?? ''));

    $keadaan_sehat      = $_POST['keadaan_sehat'] ?? '';
    $gejala             = $_POST['gejala'] ?? '';
    $hamil              = $_POST['hamil'] ?? '';
    $vaksin             = $_POST['vaksin'] ?? '';
    $transfusi          = $_POST['transfusi'] ?? '';
    $tindik             = $_POST['tindik'] ?? '';
    $obat               = $_POST['obat'] ?? '';
    $usia               = $_POST['usia'] ?? '';
    $haid               = $_POST['haid'] ?? '';
    $terakhir_donor     = $_POST['terakhir_donor'] ?? '';
    $riwayat_penyakit   = $_POST['riwayat_penyakit'] ?? '';

    // ===============================
    // 💉 Validasi kelayakan pendonor
    // ===============================
    if ($keadaan_sehat === 'Tidak') {
        $status     = 'tidak berhasil';
        $ket        = 'tidaksehat';
        $keterangan = 'Kondisi badan sedang tidak sehat sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($gejala === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'adagejala';
        $keterangan = 'Kondisi badan sedang tidak prima karena terdapat gejala penyakit, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($hamil === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'sedanghamil';
        $keterangan = 'Anda sedang dalam masa hamil, menyusui, atau baru melahirkan, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($vaksin === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'baruvaksin';
        $keterangan = 'Anda baru saja menerima vaksin, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($riwayat_penyakit === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'adariwayatpenyakit';
        $keterangan = 'Anda memiliki riwayat penyakit berat, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($transfusi === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'barutransfusi';
        $keterangan = 'Anda baru saja menerima transfusi darah, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($tindik === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'adatindik';
        $keterangan = 'Anda baru saja melakukan tindik, yang dapat meningkatkan risiko infeksi, sehingga tidak diperbolehkan untuk mendonorkan darah.';
    } else if ($usia < 17 || $usia > 65) {
        $status     = 'tidak berhasil';
        $ket        = 'usianotvalid';
        $keterangan = 'Usia Anda tidak memenuhi syarat untuk mendonorkan darah. Anda harus berusia antara 17 hingga 65 tahun.';
    } else if ($obat === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'barukonsumsiobat';
        $keterangan = 'Anda sedang mengonsumsi obat-obatan, yang dapat mempengaruhi kesehatan Anda dan kelayakan untuk mendonorkan darah.';
    } else if ($haid === 'Ya') {
        $status     = 'tidak berhasil';
        $ket        = 'baruhaid';
        $keterangan = 'Anda sedang dalam masa haid, yang dapat mempengaruhi kesehatan dan kelayakan Anda untuk mendonorkan darah.';
    } else if ($terakhir_donor === '<2 bulan lalu') {
        $status     = 'tidak berhasil';
        $ket        = 'belum60hari';
        $keterangan = 'Anda belum memenuhi syarat waktu minimal antara donor darah. Anda harus menunggu setidaknya 60 hari setelah donor terakhir.';
    } else {
        $status     = 'layak';
        $keterangan = 'Anda memenuhi semua syarat untuk mendonorkan darah. Silakan datang ke lokasi untuk cek kesehatan';
    }

    // Simpan ke database
    $query_daftar = "INSERT INTO riwayat_donor 
                        SET 
                            nama_user='$nama_user', 
                            id_kegiatan='$id_kegiatan',
                            tanggal_kegiatan='$tanggal_kegiatan',
                            usia='$usia',
                            sesi_donor=1,
                            status='$status',
                            keterangan='$keterangan'";
    $sql_daftar = mysqli_query($koneksi, $query_daftar);

    // =====================================
    // 📩 Kirim Email jika status = gagal
    // =====================================
    if ($sql_daftar && $status === 'tidak berhasil') {
        $data_notif = [
            'email_user' => $email_user,
            'kode_pesan' => 0,
            'nama_user' => $nama_user,
            'tanggal_kegiatan' => $tanggal_kegiatan
        ];

        // Gunakan CURL agar function_notif.php dijalankan terpisah
        $ch = curl_init("http://localhost/app-donor/functions/function_notif.php");
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_notif,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5
        ]);
        curl_exec($ch);
        curl_close($ch);
    }


    // =====================================
    // 🔁 Redirect setelah submit
    // =====================================
    if ($sql_daftar && $status === 'layak') {
        header('Location: ../dashboard/pendonor?page=riwayat donor&action=daftardonor&status=success');
    } else if ($sql_daftar && $status === 'tidak berhasil') {
        header('Location: ../dashboard/pendonor?page=riwayat donor&action=daftardonor&status=warning&ket=' . $ket);
    } else {
        $error = mysqli_error($koneksi);
        header('Location: ../dashboard/pendonor?page=mulai donor&action=daftardonor&status=error&message=' . urlencode($error));
    }
    exit();
}

// =====================================================
// 💉 FORM MULAI DONOR (dengan notifikasi email otomatis)
// =====================================================
if (isset($_POST['btn_mulaidonor'])) {
    $id_riwayat        = htmlspecialchars(trim($_POST['id_riwayat']));
    $id_kegiatan       = htmlspecialchars(trim($_POST['id_kegiatan']));
    $nama_user         = htmlspecialchars(trim($_POST['nama_user']));
    $tanggal_kegiatan  = htmlspecialchars(trim($_POST['tanggal_kegiatan']));
    $email_user        = htmlspecialchars(trim($_POST['email_user'] ?? ''));

    $gol_darah         = htmlspecialchars(trim($_POST['gol_darah']));
    $usia              = htmlspecialchars(trim($_POST['usia']));
    $berat_badan       = htmlspecialchars(trim($_POST['berat_badan']));
    $nilai_hb          = htmlspecialchars(trim($_POST['nilai_hb']));
    $sistolik          = htmlspecialchars(trim($_POST['sistolik']));
    $diastolik         = htmlspecialchars(trim($_POST['diastolik']));
    $data_sesuai       = htmlspecialchars(trim($_POST['data_sesuai']));
    $tekanan_darah     = $sistolik . '/' . $diastolik;

    // Ambil batas kriteria donor terbaru
    $sql_donor = "SELECT * FROM kriteria_donor ORDER BY id_kriteria DESC LIMIT 1";
    $query_donor = mysqli_query($koneksi, $sql_donor);
    $kriteria = mysqli_fetch_array($query_donor);

    // ===========================
    // 🔍 Validasi kesehatan donor
    // ===========================
    if ($berat_badan < $kriteria['bb_minimal']) { // Validasi BB Pendonor
        $status     = 'tidak berhasil';
        $ket        = 'bbnotvalid';
        $keterangan = 'Berat badan Anda tidak memenuhi syarat minimal untuk mendonorkan darah. Pastikan berat badan Anda setidaknya ' . $kriteria['bb_minimal'] . ' kg.';
    } else if ($nilai_hb < $kriteria['hb_minimal'] || $nilai_hb > $kriteria['hb_maksimal']) { // Validasi Hemoglobin Pendonor
        $status     = 'tidak berhasil';
        $ket        = 'nilaihbnotvalid';
        $keterangan = 'Nilai hemoglobin Anda tidak memenuhi syarat. Nilai hemoglobin harus berada dalam rentang ' . $kriteria['hb_minimal'] . ' - ' . $kriteria['hb_maksimal'] . ' g/dL.';
    } else if ($sistolik < $kriteria['sistolik_minimal'] || $sistolik > $kriteria['sistolik_maksimal']) { // Validasi Tekanan Darah Atas Pendonor
        $status     = 'tidak berhasil';
        $ket        = 'tensinotvalid';
        $keterangan = 'Tekanan darah sistolik Anda tidak memenuhi syarat. Tekanan darah sistolik harus berada dalam rentang ' . $kriteria['sistolik_minimal'] . ' - ' . $kriteria['sistolik_maksimal'] . ' mmHg.';
    } else if ($diastolik < $kriteria['diastolik_minimal'] || $diastolik > $kriteria['diastolik_maksimal']) { // Validasi Tekanan Darah Bawah Pendonor
        $status     = 'tidak berhasil';
        $ket        = 'tensinotvalid';
        $keterangan = 'Tekanan darah diastolik Anda tidak memenuhi syarat. Tekanan darah diastolik harus berada dalam rentang ' . $kriteria['diastolik_minimal'] . ' - ' . $kriteria['diastolik_maksimal'] . ' mmHg.';
    } else if ($data_sesuai == 'tidak') { // Validasi Tekanan Darah Bawah Pendonor
        $status     = 'tidak berhasil';
        $ket        = 'datanotvalid';
        $keterangan = 'Data anda tidak sesuai dengan foto identitas.';
    } else { // Pendonor Bisa Donor Jika Lolos Semua Validasi
        $status     = 'berhasil';
        $keterangan = 'Anda memenuhi semua syarat untuk mendonorkan darah. Setetes darah anda sangat berarti!';
    }
    // Simpan hasil pemeriksaan ke database
    $query_update = "UPDATE riwayat_donor 
                        SET 
                            nama_user='$nama_user', 
                            id_kegiatan='$id_kegiatan', 
                            gol_darah='$gol_darah', 
                            tanggal_kegiatan='$tanggal_kegiatan', 
                            berat_badan='$berat_badan', 
                            nilai_hb='$nilai_hb', 
                            tekanan_darah='$tekanan_darah',
                            status='$status', 
                            keterangan='$keterangan' 
                        WHERE id_riwayat='$id_riwayat'";
    $update = mysqli_query($koneksi, $query_update);

    // ===================================================
    // 📧 Kirim Email: berhasil (1) atau gagal pemeriksaan (2)
    // ===================================================
    if ($update) {
        $kode_pesan = ($status == 'berhasil') ? '1' : '2'; // ✅ sesuai aturan baru

        $data_notif = [
            'email_user' => $email_user,
            'kode_pesan' => $kode_pesan,
            'nama_user' => $nama_user,
            'tanggal_kegiatan' => $tanggal_kegiatan
        ];

        // Gunakan CURL agar tidak mengganggu redirect
        $ch = curl_init("http://localhost/app-donor/functions/function_notif.php");
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_notif,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5
        ]);
        curl_exec($ch);
        curl_close($ch);
    }

    // ===================================================
    // 🔁 Redirect ke halaman hasil
    // ===================================================
    if ($update && $status == 'berhasil') {
        header('Location: ../dashboard/admin?page=cek kesehatan&id=' . $id_kegiatan . '&action=mulaidonor&status=success');
    } else if ($update && $status == 'tidak berhasil') {
        header('Location: ../dashboard/admin?page=cek kesehatan&id=' . $id_kegiatan . '&action=mulaidonor&status=warning&ket=' . $ket);
    } else {
        $error = mysqli_error($koneksi);
        header('Location: ../dashboard/admin?page=cek kesehatan&id=' . $id_kegiatan . '&action=mulaidonor&status=error&message=' . urlencode($error));
    }
    exit();
}


// =====================================================
// 🗑️ HAPUS RIWAYAT DONOR
// =====================================================
if (isset($_POST['btn_hapusriwayat'])) {
    $id_riwayat = htmlspecialchars($_POST['id_riwayat']);
    $query = "DELETE FROM riwayat_donor WHERE id_riwayat = '$id_riwayat'";
    $hapus = mysqli_query($koneksi, $query);

    if ($hapus) {
        header('Location: ../dashboard/admin?page=riwayat donor&action=deleteriwayat&status=success');
    } else {
        $error = mysqli_error($koneksi);
        header('Location: ../dashboard/admin?page=riwayat donor&action=deleteriwayat&status=error&message=' . urlencode($error));
    }
}

ob_end_flush();
