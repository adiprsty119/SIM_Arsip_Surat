<?php
include "../../koneksi/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_laporan_perjalanan WHERE id='$id'"));

if ($data) {
    $folder = '../file_laporan/';
    if (file_exists($folder . $data['laporan'])) unlink($folder . $data['laporan']);
    if (file_exists($folder . $data['dokumentasi'])) unlink($folder . $data['dokumentasi']);
    mysqli_query($db, "DELETE FROM tb_laporan_perjalanan WHERE id='$id'");
}

echo "<script>alert('Data berhasil dihapus');window.location='../laporan_perjalanan.php';</script>";
