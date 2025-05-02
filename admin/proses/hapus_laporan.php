<?php
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id_laporan = $_GET['id'];
    $query = "DELETE FROM tb_laporan WHERE id = '$id_laporan'";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Laporan berhasil dihapus'); window.location='../laporanperiodik.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus laporan'); window.location='../laporanperiodik.php';</script>";
    }
} else {
    echo "<script>alert('ID laporan tidak ditemukan'); window.location='../laporanperiodik.php';</script>";
}
