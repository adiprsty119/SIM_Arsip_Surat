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
    <title>Laporan Periodik | Arsip Surat Pemerintah Papua Selatan</title>

    <!-- CSS -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
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
                            <h3>Laporan Periodik Kasubbag</h3> <!-- Sesuaikan dengan nama halaman -->
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- Konten Utama -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Laporan Periodik </h2> <!-- Sesuaikan dengan deskripsi -->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <!-- Tombol Tambah Laporan -->
                                    <button class="btn btn-success" data-toggle="collapse" data-target="#formLaporan">+ Tambah Laporan Periodik</button>

                                    <div id="formLaporan" class="collapse" style="margin-top:20px;">
                                        <form action="proses/proses_laporan.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="judul">Judul Laporan</label>
                                                <input type="text" id="judul" name="judul" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="file">File Laporan (PDF)</label>
                                                <input type="file" id="file" name="file" class="form-control" required accept=".pdf">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Upload Laporan</button>
                                            </div>
                                        </form>
                                    </div>

                                    <hr>

                                    <!-- Daftar Laporan Periodik -->
                                    <h4>Daftar Laporan Periodik</h4>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>File</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($db, "SELECT * FROM tb_laporan ORDER BY id DESC");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                echo "<tr>
                                                <td>{$no}</td>
                                                <td>{$data['judul']}</td>
                                                <td><a href='../admin/file_laporan/{$data['file']}' target='_blank'>Unduh</a></td>
                                                <td>{$data['tanggal']}</td>
                                                <td>
                                                    <a href='edit_laporan.php?id={$data['id']}' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                                                    <a href='proses/hapus_laporan.php?id={$data['id']}' class='btn btn-danger btn-xs' onclick=\"return confirm('Yakin ingin hapus laporan ini?')\">
                                                        <i class='fa fa-trash'></i> Hapus
                                                    </a>
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
                    Arsip Surat Pemerintah Papua Selatan - Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
</body>

</html>
