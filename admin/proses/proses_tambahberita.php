<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = mysqli_real_escape_string($db, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
    $tanggal   = $_POST['tanggal_terbit'];
    $penulis   = mysqli_real_escape_string($db, $_POST['penulis']);

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $path   = "../images/" . $gambar;

    if (move_uploaded_file($tmp, $path)) {
        // Query simpan ke database
        $sql = "INSERT INTO berita (judul, deskripsi, gambar, tanggal, penulis)
                VALUES ('$judul', '$deskripsi', '$gambar', '$tanggal', '$penulis')";

        if (mysqli_query($db, $sql)) {
            echo "<script>alert('Berita berhasil ditambahkan!'); window.location.href='../daftarberita.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyimpan data.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Upload gambar gagal!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid.'); window.history.back();</script>";
}
