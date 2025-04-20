<?php
include '../../koneksi/koneksi.php';  // Pastikan path benar

if (isset($_GET['id'])) {
    // Ambil ID laporan dari URL
    $id_laporan = $_GET['id'];

    // Query untuk menghapus laporan
    $query = "DELETE FROM tb_laporan WHERE id = '$id_laporan'";

    // Eksekusi query
    if (mysqli_query($db, $query)) {
        // Berhasil menghapus
        echo "<script>alert('Laporan berhasil dihapus'); window.location='../laporanperiodik.php';</script>";
    } else {
        // Gagal menghapus
        echo "<script>alert('Gagal menghapus laporan'); window.location='../laporanperiodik.php';</script>";
    }
} else {
    echo "<script>alert('ID laporan tidak ditemukan'); window.location='../laporanperiodik.php';</script>";
}
