<?php
include '../../koneksi/koneksi.php';
$id_berkas = $_GET['id_berkas'];
mysqli_query($db, "DELETE FROM tb_berkasdigital WHERE id_berkas='$id_berkas'");
header("location:../databerkasdigital.php");
