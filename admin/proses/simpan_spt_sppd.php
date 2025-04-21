<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pegawai = mysqli_real_escape_string($db, $_POST['pegawai']);
    $tujuan = mysqli_real_escape_string($db, $_POST['tujuan']);
    $tanggal = date('Y-m-d');

    $spt = $_FILES['spt'];
    $sppd = $_FILES['sppd'];

    $upload_dir = '../file_spt_sppd/';
    if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);

    $spt_name = time() . '_spt_' . basename($spt['name']);
    $sppd_name = time() . '_sppd_' . basename($sppd['name']);

    $spt_path = $upload_dir . $spt_name;
    $sppd_path = $upload_dir . $sppd_name;

    if (move_uploaded_file($spt['tmp_name'], $spt_path) && move_uploaded_file($sppd['tmp_name'], $sppd_path)) {
        $query = "INSERT INTO tb_spt_sppd (pegawai, tujuan, spt, sppd, tanggal) 
                  VALUES ('$pegawai', '$tujuan', '$spt_name', '$sppd_name', '$tanggal')";
        mysqli_query($db, $query);
        echo "<script>alert('Data berhasil disimpan'); window.location='../spt_sppd.php';</script>";
    } else {
        echo "<script>alert('Gagal upload file'); window.location='../spt_sppd.php';</script>";
    }
}
