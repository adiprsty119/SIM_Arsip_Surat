<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Berkas Digital</title>

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
                <div class="container">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Data Berkas Digital</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar Berkas Digital</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <!-- Tombol Tambah Form -->
                            <button id="toggleFormBtn" class="btn btn-success" data-toggle="collapse" data-target="#formSPT">+ Tambah Data</button>

                            <!-- Form Tambah -->
                            <div id="formSPT" class="collapse" style="margin-top: 20px;">
                                <form action="proses/simpandata_berkasdigital.php" method="post" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <select name="nip" class="form-control" required>
                                                <option value="">-- Pilih NIP Pegawai --</option>
                                                <?php
                                                $queryNIPPegawai = mysqli_query($db, "SELECT nip, nama_lengkap FROM nominatif_asn ORDER BY nip ASC");
                                                while ($pegawai = mysqli_fetch_array($queryNIPPegawai)) {
                                                    $label = "{$pegawai['nip']} ({$pegawai['nama_lengkap']})";
                                                    echo "<option value='{$pegawai['nip']}'>{$label}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dokumen">Nama Dokumen</label>
                                            <input type="text" name="nama_dokumen" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" name="kategori" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_upload">Tanggal Upload</label>
                                            <input type="date" name="tanggal_upload" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="upload_file">Upload File</label>
                                            <input type="file" name="upload_file" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-top: 2rem;">Simpan</button>
                                    </div>
                                </form>
                            </div>

                            <hr>

                            <form action="download_databerkasdigital.php" name="download_databerkasdigital" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Data</button></a>
                                    <a href="printdata_berkasdigital.php"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Dokumen</button></a>
                                </div>
                            </form>
                            <div class="x_content table-responsive">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Dokumen</th>
                                            <th>Kategori Dokumen</th>
                                            <th>Tanggal Upload</th>
                                            <th>File</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi/koneksi.php';
                                        $no = 1;
                                        $query = mysqli_query($db, "SELECT * FROM tb_berkasdigital ORDER BY id_berkas DESC");
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($data['nip']) . "</td>";
                                            echo "<td>" . htmlspecialchars($data['nama_dokumen']) . "</td>";
                                            echo "<td>" . htmlspecialchars($data['kategori_dokumen']) . "</td>";
                                            echo "<td>" . date("d-m-Y", strtotime($data['tanggal_upload'])) . "</td>";
                                            echo "<td><a href='../berkas/" . htmlspecialchars($data['file_path']) . "' target='_blank'>Lihat File</a></td>";
                                            echo "<td>" . htmlspecialchars($data['keterangan']) . "</td>";
                                            echo "<td>
                                                    <a href='editberkasdigital.php?id_berkas=" . $data['id_berkas'] . "' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i></a>
                                                    <button type='button' class='btn btn-sm btn-danger' onclick='tampilkanModal({$data['id_berkas']})'>Hapus</button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                fetch(`proses/hapusberkas.php?id_berkas=${idTerpilih}`, {
                        method: 'POST'
                    })
                    .then(response => {
                        if (response.ok) {
                            // Tampilkan modal sukses
                            document.getElementById('modalSukses').style.display = 'flex';

                            // Setelah 2 detik, sembunyikan dan muat ulang halaman
                            setTimeout(() => {
                                document.getElementById('modalSukses').style.display = 'none';
                                window.location.href = 'databerkasdigital.php';
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
    <!-- <script type="text/javascript" language="JavaScript">
        function konfirmasi() {
            tanya = confirm("Anda Yakin Akan Menghapus Data ?");
            if (tanya == true) return true;
            else return false;
        }
    </script> -->

</body>

</html>