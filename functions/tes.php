<?php

include 'koneksi.php';

function uploadImgKegiatan()
{
    // Pastikan $_FILES['img_kegiatan'] adalah array
    if (!isset($_FILES['img_kegiatan']) || !is_array($_FILES['img_kegiatan']['name'])) {
        echo "<script>
                alert('Tidak ada file yang diupload!');
                location.replace('../dashboard/admin?page=profile');
            </script>";
        return []; // Kembalikan array kosong jika tidak ada file
    }

    $files = $_FILES['img_kegiatan']; // Mengambil array dari file yang diupload
    // $valid_img = ['jpg', 'jpeg', 'png'];
    $uploadedImages = []; // Array untuk menyimpan nama file yang berhasil diupload
    $invalidFiles = []; // Array untuk menyimpan nama file yang tidak valid

    for ($i = 0; $i < count($files['name']); $i++) {
        $nama_img = $files['name'][$i];
        $size_img = $files['size'][$i];
        $tmp_name = $files['tmp_name'][$i];

        $extensi_img = explode('.', $nama_img);
        $extensi_img = strtolower(end($extensi_img));

        // Validasi ekstensi
        // if (!in_array($extensi_img, $valid_img)) {
        //     $invalidFiles[] = $nama_img; // Simpan nama file yang tidak valid
        //     continue; // Lewati file ini dan lanjut ke file berikutnya
        // }

        // Validasi ukuran
        if ($size_img > 1000000) {
            $invalidFiles[] = $nama_img; // Simpan nama file yang tidak valid
            continue; // Lewati file ini dan lanjut ke file berikutnya
        }

        // Jika valid, upload file
        $img_baru = uniqid() . '.' . $extensi_img;

        if (move_uploaded_file($tmp_name, '../dashboard/assets/kegiatan/' . $img_baru)) {
            $uploadedImages[] = $img_baru; // Simpan nama file yang berhasil diupload
        }
    }

    // Jika ada file yang tidak valid, tampilkan pesan
    if (!empty($invalidFiles)) {
        $invalidFilesList = implode(', ', $invalidFiles);
        echo "<script>
                alert('File berikut tidak valid: $invalidFilesList');
                location.replace('../dashboard/admin?page=tes');
            </script>";
    }

    return $uploadedImages; // Kembalikan array dari nama file yang berhasil diupload
}

if (isset($_POST['upload_imgkegiatan'])) {
    $id_kegiatan = 99;
    $img_kegiatan = uploadImgKegiatan();

    // Pastikan ada gambar yang berhasil diupload sebelum menyimpan ke database
    if (!empty($img_kegiatan)) {
        // Loop untuk menyimpan setiap gambar ke database
        foreach ($img_kegiatan as $img) {
            $query_tambah = "INSERT INTO galeri_kegiatan(id_kegiatan, img_kegiatan) 
                             VALUES ('$id_kegiatan', '$img')";

            if (!mysqli_query($koneksi, $query_tambah)) {
                // Gagal
                header('Location: ../dashboard/admin?page=tes&action=addkegiatan&status=error');
                exit();
            }
        }

        // Berhasil
        header('Location: ../dashboard/admin?page=tes&action=addkegiatan&status=success');
        exit();
    } else {
        // Jika tidak ada gambar yang berhasil diupload
        header('Location: ../dashboard/admin?page=tes&action=addkegiatan&status=error');
        exit();
    }
}
