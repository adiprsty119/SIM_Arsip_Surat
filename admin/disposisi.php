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

    <title>Disposisi Surat</title>

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
                <div class="clearfix">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Disposisi Surat</h3>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <a href="tambah_disposisi.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Disposisi</a>
                    <a href="cetak_disposisi.php" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Surat</th>
                                <th>Tujuan</th>
                                <th>Isi Disposisi</th>
                                <th>Status</th>
                                <th>Tanggal Disposisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi/koneksi.php';
                            $no = 1;
                            $sql = mysqli_query($db, "SELECT * FROM disposisi INNER JOIN tb_suratmasuk ON disposisi.id_surat = tb_suratmasuk.id_suratmasuk ORDER BY id_disposisi DESC");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['no_surat']; ?></td>
                                    <td><?php echo $data['tujuan']; ?></td>
                                    <td><?php echo $data['isi_disposisi']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($data['tanggal_disposisi'])); ?></td>
                                    <td>
                                        <a href="edit_disposisi.php?id=<?php echo $data['id_disposisi']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="hapus_disposisi.php?id=<?php echo $data['id_disposisi']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
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