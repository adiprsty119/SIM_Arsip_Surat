<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pegawai         = mysqli_real_escape_string($db, $_POST['pegawai']);
    $nama_dokumen    = mysqli_real_escape_string($db, $_POST['nama_dokumen']);
    $kategori        = mysqli_real_escape_string($db, $_POST['kategori_dokumen']);
    $tanggal_upload  = mysqli_real_escape_string($db, $_POST['tanggal_upload']);
    $keterangan      = mysqli_real_escape_string($db, $_POST['keterangan']);

    $upload_file     = $_FILES['upload_file'];

    $upload_dir = '../../berkas/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Rename dan sanitasi nama file
    $original_name = basename($upload_file['name']);
    $safe_name     = time() . '_' . preg_replace('/\s+/', '_', $original_name);
    $file_path     = $upload_dir . $safe_name;

    // Upload
    if (move_uploaded_file($upload_file['tmp_name'], $file_path)) {
        $query = "INSERT INTO tb_berkasdigital (nip, nama_dokumen, kategori_dokumen, tanggal_upload, file_path, keterangan) 
                  VALUES ('$pegawai', '$nama_dokumen', '$kategori', '$tanggal_upload', '$safe_name', '$keterangan')";

        if (mysqli_query($db, $query)) {
            echo "<script>alert('Data berhasil disimpan'); window.location='../databerkasdigital.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database'); window.location='../databerkasdigital.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload file'); window.location='../databerkasdigital.php';</script>";
    }
}
