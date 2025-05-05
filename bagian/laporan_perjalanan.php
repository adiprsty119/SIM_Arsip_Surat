<?php
session_start();
include "login/ceksession.php";
include "../koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Perjalanan Dinas | Arsip Surat Pemerintah Papua Selatan</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                            <h3>Laporan Materi / Hasil Perjalanan Dinas</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- Konten Utama -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Laporan Perjalanan Dinas</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <!-- Tombol Tambah Form -->
                                    <button class="btn btn-success" data-toggle="collapse" data-target="#formLaporan">+ Tambah Laporan</button>

                                    <!-- Form Tambah -->
                                    <div id="formLaporan" class="collapse" style="margin-top: 20px;">
                                        <form action="proses/simpan_laporan_perjalanan.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Pegawai</label>
                                                <select name="pegawai" class="form-control" required>
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    <?php
                                                    $queryPegawai = mysqli_query($db, "SELECT nip, nama_lengkap FROM nominatif_asn ORDER BY nama_lengkap ASC");
                                                    while ($pegawai = mysqli_fetch_array($queryPegawai)) {
                                                        $label = "{$pegawai['nip']} ({$pegawai['nama_lengkap']})";
                                                        echo "<option value='{$pegawai['nama_lengkap']}'>{$label}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporan">Upload Laporan Materi (PDF)</label>
                                                <input type="file" name="laporan" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dokumentasi">Upload Dokumentasi (PDF/JPG/PNG)</label>
                                                <input type="file" name="dokumentasi" accept="application/pdf,image/*" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                    <hr>
                                    <!-- Tabel Data -->
                                    <h3>Data Laporan Perjalanan</h3>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pegawai</th>
                                                <th>Laporan</th>
                                                <th>Dokumentasi</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = mysqli_query($db, "SELECT * FROM tb_laporan_perjalanan ORDER BY id DESC");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                                echo "<tr>
                                                    <td>{$no}</td>
                                                    <td>{$data['pegawai']}</td>
                                                    <td><a href='file_laporan/{$data['laporan']}' target='_blank'>Lihat Laporan</a></td>
                                                    <td><a href='file_laporan/{$data['dokumentasi']}' target='_blank'>Lihat Dokumentasi</a></td>
                                                    <td>{$data['tanggal']}</td>
                                                    <td><a href='edit_laporan_perjalanan.php?id={$data['id']}' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i></a>
                                                    <a href='proses/hapus_laporan_perjalanan.php?id={$data['id']}' class='btn btn-danger btn-xs' onclick=\"return confirm('Yakin ingin hapus laporan ini?')\"><i class='fa fa-trash'></i></a>
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
</body>

</html>