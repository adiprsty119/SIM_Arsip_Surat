<?php
include '../../koneksi/koneksi.php';

$id = $_POST['id'];
$pegawai = $_POST['pegawai'];
$tujuan = $_POST['tujuan'];
$tanggal = date('tanggal');

$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_sptsppd WHERE id='$id'"));
$folder = '../file_spt_sppd/';

$spt = $data['spt'];
$sppd = $data['sppd'];

if (!empty($_FILES['spt']['name'])) {
    $spt = time() . '_spt_' . basename($_FILES['spt']['name']);
    move_uploaded_file($_FILES['spt']['tmp_name'], $folder . $spt);
}
if (!empty($_FILES['sppd']['name'])) {
    $sppd = time() . '_sppd_' . basename($_FILES['sppd']['name']);
    move_uploaded_file($_FILES['sppd']['tmp_name'], $folder . $sppd);
}

$query = "UPDATE tb_sptsppd SET pegawai='$pegawai', tujuan='$tujuan', spt='$spt', sppd='$sppd', tanggal='$tanggal' WHERE id='$id'";
mysqli_query($db, $query);

echo "<script>alert('Data berhasil diupdate'); window.location='../spt_sppd.php';</script>";
