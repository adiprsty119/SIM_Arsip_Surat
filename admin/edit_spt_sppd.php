<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_spt_sppd WHERE id='$id'"));

if (!$data) {
    echo "<script>alert('Data tidak ditemukan'); window.location='spt_sppd.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit SPT dan SPPD</title>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Edit SPT & SPPD</h3>
        <form action="proses/update_spt_sppd.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" name="pegawai" value="<?= htmlspecialchars($data['pegawai']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" value="<?= htmlspecialchars($data['tujuan']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>File SPT (Kosongkan jika tidak diganti)</label>
                <input type="file" name="spt" class="form-control">
            </div>
            <div class="form-group">
                <label>File SPPD (Kosongkan jika tidak diganti)</label>
                <input type="file" name="sppd" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="spt_sppd.php" class="btn btn-default">Batal</a>
        </form>
    </div>
</body>

</html>