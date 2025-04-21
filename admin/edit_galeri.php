<?php
session_start();
include '../koneksi/koneksi.php';
include "login/ceksession.php";

// Validasi ID galeri
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('ID galeri tidak ditemukan'); window.location='galerikegiatan.php';</script>";
    exit;
}

$query = mysqli_query($db, "SELECT * FROM tb_galeri WHERE id = $id");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data galeri tidak ditemukan'); window.location='galerikegiatan.php';</script>";
    exit;
}

$judul = $data['judul'] ?? '';
$keterangan = $data['keterangan'] ?? '';
$foto = $data['foto'] ?? '';
$fotoPath = "img/foto_galeri/" . $foto;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Galeri | Arsip Surat Pemerintah Papua Selatan</title>

    <!-- CSS -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php include("sidebarmenu.php"); ?>
            <?php include("header.php"); ?>

            <!-- Page Content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit Galeri Kegiatan</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Form Edit Galeri -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Edit <small>Galeri Kegiatan</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="proses/update_galeri.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $id ?>">

                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" name="judul" value="<?= htmlspecialchars($judul) ?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" class="form-control summernote" required><?= $keterangan ?></textarea>
                                        </div>

                                        <?php if (!empty($foto) && file_exists(__DIR__ . "/$fotoPath")): ?>
                                            <div class="form-group">
                                                <label>Foto Lama</label><br>
                                                <img src="<?= $fotoPath ?>" width="200">
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <label>Ganti Foto (Opsional)</label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        <a href="galerikegiatan.php" class="btn btn-default">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <footer>
                <div class="pull-right">
                    SIM ADMINISTRASI Pemerintah Papua Selatan - by <a href="https://www.instagram.com/id.toma/">TOMA</a>
                </div>
                <div class="clearfix"></div>
            </footer>

        </div>
    </div>

    <!-- JS -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <script src="../assets/build/js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>
</body>

</html>