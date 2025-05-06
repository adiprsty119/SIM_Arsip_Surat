<?php
include '../../koneksi/koneksi.php';
$id_berita = $_GET['id'];
mysqli_query($db, "DELETE FROM berita WHERE id='$id_berita'");
header("location:../daftarberita.php");
