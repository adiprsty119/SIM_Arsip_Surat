<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Kegiatan | Arsip Surat Pemerintah Papua Selatan</title>

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

            <!-- Sidebar -->
            <?php include("sidebarmenu.php"); ?>

            <!-- Header -->
            <?php include("header.php"); ?>

            <!-- Page Content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Galeri Kegiatan</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Konten Utama -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Galeri <small>Dokumentasi Kegiatan</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <button class="btn btn-success" data-toggle="collapse" data-target="#formGaleri">+ Tambah Galeri Kegiatan</button>

                                    <!-- Form Tambah Galeri -->
                                    <div id="formGaleri" class="collapse" style="margin-top: 20px;">
                                        <form action="proses/proses_galeri.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" name="judul" id="judul" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" class="form-control summernote" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto (JPG/PNG)</label>
                                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </form>
                                    </div>

                                    <hr>

                                    <!-- Tabel Daftar Galeri -->
                                    <h4>Daftar Galeri Kegiatan</h4>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Keterangan</th>
                                                <th>Foto</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($db, "SELECT * FROM tb_galeri ORDER BY id DESC");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                echo "<tr>
                                                    <td>{$no}</td>
                                                    <td>{$data['judul']}</td>
                                                    <td>{$data['keterangan']}</td>
                                                    <td><img src='img/foto_galeri/{$data['foto']}' width='100'></td>
                                                    <td>{$data['tanggal']}</td>
                                                    <td>
                                                        <a href='edit_galeri.php?id={$data['id']}' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                                                        <a href='proses/hapus_galeri.php?id={$data['id']}' class='btn btn-danger btn-xs' onclick=\"return confirm('Yakin ingin hapus foto ini?')\"><i class='fa fa-trash'></i> Hapus</a>
                                                    </td>
                                                </tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>

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