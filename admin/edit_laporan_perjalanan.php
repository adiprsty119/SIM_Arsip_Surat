<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan');window.location='laporan_perjalanan.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($db, $_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_laporan_perjalanan WHERE id='$id'"));

if (!$data) {
    echo "<script>alert('Data tidak ditemukan');window.location='laporan_perjalanan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Laporan Perjalanan</title>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container">
    <h3>Edit Laporan Perjalanan Dinas</h3>
    <form action="proses/update_laporan_perjalanan.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" name="pegawai" class="form-control" value="<?= $data['pegawai'] ?>" required>
        </div>

        <div class="form-group">
            <label>Laporan Materi</label><br>
            <a href="file_laporan/<?= $data['laporan'] ?>" target="_blank">Lihat Laporan Lama</a>
            <input type="file" name="laporan" class="form-control">
        </div>

        <div class="form-group">
            <label>Dokumentasi</label><br>
            <a href="file_laporan/<?= $data['dokumentasi'] ?>" target="_blank">Lihat Dokumentasi Lama</a>
            <input type="file" name="dokumentasi" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="laporan_perjalanan.php" class="btn btn-default">Batal</a>
    </form>
</body>

</html>