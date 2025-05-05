<?php
include '../../koneksi/koneksi.php';
$id_info = $_GET['id_info'];
mysqli_query($db, "DELETE FROM tb_informasikepegawaian WHERE id_info='$id_info'");
header("location:../informasikepegawaian.php");
