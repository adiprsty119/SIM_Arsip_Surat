<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($db, $_POST['judul']);
    $tanggal = date('Y-m-d'); // Simpan tanggal saat upload

    // File upload
    $file = $_FILES['file']['name'];
    $tmp  = $_FILES['file']['tmp_name'];
    $folder = "../file_laporan/";

    // Validasi tipe file
    $allowed_ext = ['pdf'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed_ext)) {
        // Nama file unik
        $nama_file = time() . '_' . preg_replace('/\s+/', '_', $file);
        $target = $folder . $nama_file;

        if (move_uploaded_file($tmp, $target)) {
            // Simpan ke database
            $query = "INSERT INTO tb_laporan (judul, file, tanggal) VALUES ('$judul', '$nama_file', '$tanggal')";
            $insert = mysqli_query($db, $query);

            if ($insert) {
                echo "<script>alert('Laporan berhasil diupload'); window.location='../laporanperiodik.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan ke database'); window.location='../laporanperiodik.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload file'); window.location='../laporanperiodik.php';</script>";
        }
    } else {
        echo "<script>alert('Hanya file PDF yang diperbolehkan'); window.location='../laporanperiodik.php';</script>";
    }
} else {
    echo "<script>alert('Metode tidak diperbolehkan'); window.location='../laporanperiodik.php';</script>";
}
