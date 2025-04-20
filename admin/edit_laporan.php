<?php
session_start();
include "login/ceksession.php";
include "../koneksi/koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM tb_laporan WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan');window.location='laporanperiodik.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Laporan Periodik</title>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Edit Laporan Periodik</h2>
        <form action="update_laporan.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="form-group">
                <label for="judul">Judul Laporan</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?= $data['judul']; ?>" required>
            </div>

            <div class="form-group">
                <label>File Lama: </label>
                <p><a href="../file_laporan/<?= $data['file']; ?>" target="_blank"><?= $data['file']; ?></a></p>
                <label for="file">Ganti File Laporan (Opsional)</label>
                <input type="file" name="file" id="file" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file</small>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="laporanperiodik.php" class="btn btn-default">Kembali</a>
        </form>
    </div>
</body>

</html>