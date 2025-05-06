<?php
include '../koneksi/koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Berita</title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">
    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">

    <style>
        #modalKonfirmasi {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .modal-content {
            background: #fff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 90%;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
            position: relative;
        }

        .modal-content p {
            font-size: 15px;
            font-weight: bold;
            margin-top: 2.5rem;
        }

        .modal-content i {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #999;
        }

        .modal-content i:hover {
            color: #e53935;
        }

        .modal-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-confirm {
            background-color: #e53935;
            color: white;
        }

        .btn-confirm:hover {
            background-color: #c62828;
        }

        .btn-cancel {
            background-color: #9e9e9e;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #757575;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        #modalSukses {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 1001;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-sukses-content {
            background: #4caf50;
            color: white;
            padding: 20px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            animation: popIn 0.4s ease-in-out;
        }

        @keyframes popIn {
            from {
                transform: scale(0.7);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <!-- Profile and Sidebarmenu -->
            <?php
            include("sidebarmenu.php");
            ?>
            <!-- /Profile and Sidebarmenu -->

            <!-- top navigation -->
            <?php
            include("header.php");
            ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Berita</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Daftar Berita</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <!-- Tombol Tambah Form -->
                                <button id="toggleFormBtn" class="btn btn-success" data-toggle="collapse" data-target="#formSPT">+ Tambah Berita Baru</button>

                                <!-- Form Tambah -->
                                <div id="formSPT" class="collapse" style="margin-top: 20px;">
                                    <form action="proses/proses_tambahberita.php" method="post" enctype="multipart/form-data">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="judul">Judul Berita</label>
                                                <input type="text" class="form-control" id="judul" name="judul" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Berita</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar">Upload Gambar</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggal_terbit">Tanggal Terbit</label>
                                                <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="penulis">Penulis</label>
                                                <input type="text" class="form-control" id="penulis" name="penulis" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 2rem;">Simpan</button>
                                        </div>
                                    </form>
                                </div>

                                <hr>

                                <form action="downloadberita.php" name="downloaddata_kgb-kp" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Semua Berita (PDF)</button></a>
                                    </div>
                                </form>
                                <div class="x_content">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Deskripsi Berita</th>
                                                <th>Gambar Berita</th>
                                                <th>Tanggal Terbit</th>
                                                <th>Nama Penulis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                echo "<tr>
                                                        <td>$no</td>
                                                        <td>" . htmlspecialchars($data['judul']) . "</td>
                                                        <td>" . htmlspecialchars($data['deskripsi']) . "</td>
                                                        <td>";
                                                if (!empty($data['gambar'])) {
                                                    echo '<img src="../images/' . htmlspecialchars($data['gambar']) . '" alt="Gambar Berita" width="100">';
                                                } else {
                                                    echo '<span>Tidak ada gambar</span>';
                                                }
                                                echo "</td>
                                                        <td>" . htmlspecialchars($data['tanggal']) . "</td>
                                                        <td>" . htmlspecialchars($data['penulis']) . "</td>
                                                        <td>
                                                            <a href='downloadberita.php?id=" . $data['id'] . "' class='btn btn-success btn-xs'><i class='fa fa-download'></i></a>
                                                            <a href='editberita.php?id=" . $data['id'] . "' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i></a>
                                                            <button type='button' class='btn btn-sm btn-danger' onclick='tampilkanModal({$data['id']})'>Hapus</button>
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
            <!-- /page content -->

            <!-- Modal Box -->
            <div id="modalKonfirmasi">
                <div class="modal-content">
                    <i class="fa-solid fa-xmark" onclick="handleKonfirmasi(false)"></i>
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    <div class="modal-buttons">
                        <button class="btn btn-confirm" onclick="handleKonfirmasi(true)">Ya</button>
                        <button class="btn btn-cancel" onclick="handleKonfirmasi(false)">Batal</button>
                    </div>
                </div>
            </div>
            <!-- Modal Box -->

            <!-- Modal Sukses -->
            <div id="modalSukses">
                <div class="modal-sukses-content">
                    <p>Data telah dihapus</p>
                </div>
            </div>
            <!-- Modal Sukses -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#formSPT').on('show.bs.collapse', function() {
                $('#toggleFormBtn')
                    .removeClass('btn-success')
                    .addClass('btn-danger')
                    .text('× Batalkan');
            });

            $('#formSPT').on('hide.bs.collapse', function() {
                $('#toggleFormBtn')
                    .removeClass('btn-danger')
                    .addClass('btn-success')
                    .text('+ Tambah Data');
            });
        });
    </script>
    <script>
        window.onload = function() {
            document.getElementById('modalKonfirmasi').style.display = 'none';
            document.getElementById('modalSukses').style.display = 'none';
        };

        let idTerpilih = null;

        function tampilkanModal(id) {
            idTerpilih = id;
            document.getElementById('modalKonfirmasi').style.display = 'flex';
        }

        function handleKonfirmasi(setuju) {
            document.getElementById('modalKonfirmasi').style.display = 'none';

            if (setuju && idTerpilih !== null) {
                fetch(`proses/hapusberita.php?id=${idTerpilih}`, {
                        method: 'POST'
                    })
                    .then(response => {
                        if (response.ok) {
                            // Tampilkan modal sukses
                            document.getElementById('modalSukses').style.display = 'flex';

                            // Setelah 2 detik, sembunyikan dan muat ulang halaman
                            setTimeout(() => {
                                document.getElementById('modalSukses').style.display = 'none';
                                window.location.href = 'daftarberita.php';
                            }, 3000);
                        } else {
                            alert("Gagal menghapus data.");
                        }
                    })
                    .catch(error => {
                        console.error("Terjadi kesalahan:", error);
                        alert("Terjadi kesalahan saat menghapus data.");
                    });
            }
        }
    </script>
</body>

</html>