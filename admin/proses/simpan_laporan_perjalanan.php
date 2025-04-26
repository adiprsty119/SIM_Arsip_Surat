<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pegawai = mysqli_real_escape_string($db, $_POST['pegawai']);
    $tanggal = date('Y-m-d');

    $laporan    = $_FILES['file_laporan'];
    $dokumentasi = $_FILES['dokumentasi'];

    $upload_dir = '../file_laporan/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Rename file to avoid duplicates
    $laporan_name     = time() . '_laporan_' . preg_replace('/\s+/', '_', basename($laporan['name']));
    $dokumentasi_name = time() . '_dokumentasi_' . preg_replace('/\s+/', '_', basename($dokumentasi['name']));

    $laporan_path     = $upload_dir . $laporan_name;
    $dokumentasi_path = $upload_dir . $dokumentasi_name;

    // Upload file
    $uploadLaporan    = move_uploaded_file($laporan['tmp_name'], $laporan_path);
    $uploadDokumentasi = move_uploaded_file($dokumentasi['tmp_name'], $dokumentasi_path);

    if ($uploadLaporan && $uploadDokumentasi) {
        $query = "INSERT INTO tb_laporan_perjalanan (pegawai, dokumentasi, laporan, tanggal) 
                  VALUES ('$pegawai', '$laporan_name', '$dokumentasi_name', '$tanggal')";
        $insert = mysqli_query($db, $query);

        if ($insert) {
            echo "<script>alert('Laporan berhasil disimpan'); window.location='../laporan_perjalanan.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database'); window.location='../laporan_perjalanan.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal upload file, pastikan format benar dan ukuran tidak terlalu besar'); window.location='../laporan_perjalanan.php';</script>";
    }
}
