<?php
include '../koneksi/koneksi.php';

$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];

$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];
$folder = "uploads/";

move_uploaded_file($tmp, $folder . $foto);

mysqli_query($db, "INSERT INTO tb_galeri (judul, foto, tanggal) VALUES ('$judul', '$foto', '$tanggal')");

header("Location: galerikegiatan.php");
