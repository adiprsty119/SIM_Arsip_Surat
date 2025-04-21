<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];

// Ambil nama file foto dari database
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT foto FROM tb_galeri WHERE id='$id'"));
$foto = $data['foto'];

// Path ke folder tempat menyimpan gambar
$folder = '../img/foto_galeri/';
$path_foto = $folder . $foto;

// Hapus file foto jika ada
if (!empty($foto) && file_exists($path_foto)) {
    unlink($path_foto);
}

// Hapus data dari database
$hapus = mysqli_query($db, "DELETE FROM tb_galeri WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Galeri berhasil dihapus'); window.location='../galerikegiatan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus galeri'); window.location='../galerikegiatan.php';</script>";
}
