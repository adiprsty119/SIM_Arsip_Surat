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

    <title>Data KGB & KP</title>

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
                        <h3>Data KGB & KP ASN</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Riwayat Kenaikan ASN</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <!-- Tombol Tambah Form -->
                                <button class="btn btn-success" data-toggle="collapse" data-target="#formSPT">+ Tambah Data</button>

                                <!-- Form Tambah -->
                                <div id="formSPT" class="collapse" style="margin-top: 20px;">
                                    <form action="proses/simpandata_kgb-kp.php" method="post" enctype="multipart/form-data">
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
                                                <label for="jenis_kenaikan">Jenis Kenaikan</label>
                                                <select name="jenis_kenaikan" class="form-control" required>
                                                    <option value="">-- Pilih Jenis Kenaikan --</option>
                                                    <option value="">Kenaikan Gaji Berkala (KGB)</option>
                                                    <option value="">Kenaikan Pangkat (KP)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pangkat_sebelumnya">Pangkat Sebelumnya</label>
                                                <input type="text" name="pengkat_sebelumnya" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pangkat_sekarang">Pengkat Sekarang</label>
                                                <input type="text" name="pangkat_sekarang" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tmt_kenaikan">TMT Kenaikan</label>
                                                <input type="text" name="tmt_kenaikan" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_sk">Nomor SK</label>
                                                <input type="text" name="no_sk" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_sk">Tanggal SK</label>
                                                <input type="date" name="tanggal_sk" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="penandatanganan_sk">Penandatanganan SK</label>
                                                <input type="text" name="penandatanganan_sk" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_proses">Status Proses</label>
                                                <select name="status_proses" class="form-control" required>
                                                    <option value="">-- Pilih Jenis Status --</option>
                                                    <option value="">Sudah</option>
                                                    <option value="">Belum</option>
                                                    <option value="">Ditolak</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 2rem;">Simpan</button>
                                        </div>
                                    </form>
                                </div>

                                <hr>

                                <form action="downloaddata_kgb-kp.php" name="downloaddata_kgb-kp" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Data</button></a>
                                        <a href="printdata_kgb-kp.php"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Dokumen</button></a>
                                    </div>
                                </form>
                                <div class="x_content">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Jenis Kenaikan</th>
                                                <th>Pangkat Sebelumnya</th>
                                                <th>Pangkat Sekarang</th>
                                                <th>TMT Kenaikan</th>
                                                <th>No. SK</th>
                                                <th>Tanggal SK</th>
                                                <th>Penandatangan SK</th>
                                                <th>Status Proses</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $sql = mysqli_query($db, "SELECT * FROM tb_riwayat_kgp_kp ORDER BY tmt_kenaikan DESC");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                echo "<tr>
                                                <td>$no</td>
                                                <td>{$data['nip']}</td>
                                                <td>{$data['jenis_kenaikan']}</td>
                                                <td>{$data['pangkat_gol_sebelumnya']}</td>
                                                <td>{$data['pangkat_gol_sekarang']}</td>
                                                <td>{$data['tmt_kenaikan']}</td>
                                                <td>{$data['no_sk']}</td>
                                                <td>{$data['tanggal_sk']}</td>
                                                <td>{$data['penandatanganan_sk']}</td>
                                                <td>{$data['status_proses']}</td>
                                                <td>
                                                <a href='editdatakgb-kp.php?id={$data['id_riwayat']}' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>
                                                <a href='hapusdatakgb-kp.php?id={$data['id_riwayat']}' onclick='return konfirmasi()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Hapus</a>
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
    <script type="text/javascript" language="JavaScript">
        function konfirmasi() {
            tanya = confirm("Anda Yakin Akan Menghapus Data ?");
            if (tanya == true) return true;
            else return false;
        }
    </script>

</body>

</html>