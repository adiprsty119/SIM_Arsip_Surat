<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_spt_sppd WHERE id='$id'"));

$folder = '../file_spt_sppd/';
if ($data) {
    if (file_exists($folder . $data['spt'])) unlink($folder . $data['spt']);
    if (file_exists($folder . $data['sppd'])) unlink($folder . $data['sppd']);
    mysqli_query($db, "DELETE FROM tb_spt_sppd WHERE id='$id'");
}

echo "<script>alert('Data berhasil dihapus'); window.location='../spt_sppd.php';</script>";
