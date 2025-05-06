<?php
session_start();
include "../../koneksi/koneksi.php";
include "../login/ceksession.php";

// Validasi input ID
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "<script>alert('ID tidak valid'); window.location='../daftarberita.php';</script>";
    exit;
}

$id = intval($_POST['id']);
$judul = mysqli_real_escape_string($db, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
$tanggal = mysqli_real_escape_string($db, $_POST['tanggal_terbit']);
$penulis = mysqli_real_escape_string($db, $_POST['penulis']);

// Ambil data lama
$query = mysqli_query($db, "SELECT gambar FROM berita WHERE id='$id'");
$data_lama = mysqli_fetch_assoc($query);
$gambar_lama = $data_lama['gambar'];

// Cek apakah user upload gambar baru
$gambar_baru = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$upload_dir = "../images/";
$gambar_final = $gambar_lama; // default tetap gambar lama

if (!empty($gambar_baru)) {
    // Generate nama unik
    $ext = pathinfo($gambar_baru, PATHINFO_EXTENSION);
    $nama_file_baru = uniqid("img_") . "." . $ext;
    $path_final = $upload_dir . $nama_file_baru;

    // Pindahkan file baru
    if (move_uploaded_file($gambar_tmp, $path_final)) {
        // Hapus file lama jika ada
        if (!empty($gambar_lama) && file_exists($upload_dir . $gambar_lama)) {
            unlink($upload_dir . $gambar_lama);
        }
        $gambar_final = $nama_file_baru;
    } else {
        echo "<script>alert('Gagal mengupload gambar baru'); window.location='../daftarberita.php';</script>";
        exit;
    }
}

// Update ke database
$update = mysqli_query($db, "UPDATE berita SET 
    judul='$judul',
    deskripsi='$deskripsi',
    tanggal='$tanggal',
    penulis='$penulis',
    gambar='$gambar_final'
    WHERE id='$id'
");

if ($update) {
    echo "<script>alert('Berita berhasil diperbarui'); window.location='../daftarberita.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui berita'); window.location='../daftarberita.php';</script>";
}
