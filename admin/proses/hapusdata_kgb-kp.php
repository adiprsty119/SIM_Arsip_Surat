<?php
include '../../koneksi/koneksi.php';
$id_riwayat = $_GET['id_riwayat'];
mysqli_query($db, "DELETE FROM tb_riwayat_kgp_kp WHERE id_riwayat='$id_riwayat'");
header("location:../datakgb-kp.php");
