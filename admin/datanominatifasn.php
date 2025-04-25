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

    <title>Data Nominatif ASN</title>

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
                <div class="container">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Data Nominatif ASN</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar ASN</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <!-- Tombol Tambah Form -->
                            <button class="btn btn-success" data-toggle="collapse" data-target="#formSPT">+ Tambah Data</button>

                            <!-- Form Tambah -->
                            <div id="formSPT" class="collapse" style="margin-top: 20px;">
                                <form action="proses/simpandata_nominatifasn.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- Kolom 1 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="text" name="nip" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="namapegawai">Nama Lengkap</label>
                                                <input type="text" name="namapegawai" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempatlahir">Tempat Lahir</label>
                                                <input type="text" name="tempatlahir" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggallahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggallahir" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Usia</label>
                                                <input type="text" name="usia" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin">Jenis Kelamin</label>
                                                <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select name="agama" id="agama" class="form-control" required>
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pangkatgolongan">Pangkat Golongan</label>
                                                <input type="text" name="pangkatgolongan" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pangkattmt">Pangkat TMT</label>
                                                <input type="text" name="pangkattmt" accept="application/pdf" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- Kolom 1 -->

                                        <!-- Kolom 2 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="namajabataneselon">Nama Jabatan Eselon</label>
                                                <input type="text" name="namajabataneselon" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabataneselon">Jabatan Eselon TMT</label>
                                                <input type="text" name="jabataneselon" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bulanmasakerja">Bulan Masa Kerja</label>
                                                <input type="number" name="bulanmasakerja" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahunmasakerja">Tahun Masa Kerja</label>
                                                <input type="number" name="namapegawai" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="namadiklat">Nama Pendidikan dan Pelatihan (Diklat) yang diikuti</label>
                                                <input type="text" name="namadiklat" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bulandiklat">Bulan Diklat</label>
                                                <input type="number" name="bulandiklat" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahundiklat">Tahun Diklat</label>
                                                <input type="number" name="tahundiklat" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlahjamdiklat">Jumlah Jam Diklat yang diikuti</label>
                                                <input type="text" name="jumlahjamdiklat" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="asal">Asal</label>
                                                <select name="asal" id="asal" class="form-control" required>
                                                    <option value="">-- Pilih Jenis --</option>
                                                    <option value="OAP">OAP</option>
                                                    <option value="Non-OAP">Non-OAP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Kolom 2 -->

                                        <!-- Kolom 3 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tingkatpendidikanterakhir">Tingkat Pendidikan Terakhir</label>
                                                <select name="tingkatpendidikanterakhir" id="tingkatpendidikanterakhir" class="form-control" required>
                                                    <option value="">-- Pilih Tingkatan Pendidikan --</option>
                                                    <option value="SMASederajat">SMA Sederajat</option>
                                                    <option value="D-III">D-III</option>
                                                    <option value="D-IV">D-IV</option>
                                                    <option value="S-I">S-I</option>
                                                    <option value="S-II">S-II</option>
                                                    <option value="S-III">S-III</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan Pada Tingkat Pendidikan Terakhir</label>
                                                <input type="text" name="jurusan" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="universitas">Nama Instansi/Perguruan Tinggi</label>
                                                <input type="text" name="universitas" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahunlulus">Tahun Lulus Pendidikan Terakhir</label>
                                                <input type="number" name="tahunlulus" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="noijazah">No Ijazah Pendidikan Terakhir</label>
                                                <input type="text" name="noijazah" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="karpeeg">Karpeg</label>
                                                <input type="text" name="karpeg" accept="application/pdf" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kgb">KGB</label>
                                                <input type="text" name="kgb" accept="application/pdf" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- Kolom 3 -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>

                            <hr>

                            <form action="download_datanominatifasn.php" name="download_datanominatifasn" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Data</button></a>
                                    <a href="printdatanominatifasn.php"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print Dokumen</button></a>
                                </div>
                            </form>
                            <div class="x_content table-responsive">
                                <table id="tabel_nominatifasn" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Pangkat Golongan</th>
                                            <th>Pangkat TMT</th>
                                            <th>Nama Jabatan Eselon</th>
                                            <th>Jabatan Eselon TMT</th>
                                            <th>Bulan Masa Kerja</th>
                                            <th>Tahun Masa Kerja</th>
                                            <th>Diklat yang diikuti</th>
                                            <th>Bulan-Tahun Pelaksanaan Diklat</th>
                                            <th>Total Jam Diklat</th>
                                            <th>Usia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Asal</th>
                                            <th>Tahun Masakerja</th>
                                            <th>Tingkat Pendidikan Terakhir</th>
                                            <th>Nomor Ijazah</th>
                                            <th>Jurusan</th>
                                            <th>Instansi Sekolah/Universitas</th>
                                            <th>Tahun Lulus Pendidikan</th>
                                            <th>Karpeg</th>
                                            <th>KGB</th>
                                            <!-- Tambah kolom lain sesuai kebutuhan -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi/koneksi.php';
                                        $query = mysqli_query($db, "SELECT * FROM nominatif_asn");
                                        $no = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo "<tr>
                                            <td>$no</td>
                                            <td>{$row['nip']}</td>
                                            <td>{$row['nama_lengkap']}</td>
                                            <td>{$row['tempat_lahir']}, {$row['tanggal_lahir']}</td>
                                            <td>{$row['pangkat_golongan']}</td>
                                            <td>{$row['pangkat_tmt']}</td>
                                            <td>{$row['nama_jabatan_eselon']}</td>
                                            <td>{$row['jabatan_eselon_tmt']}</td>
                                            <td>{$row['bulan_masakerja']}</td>
                                            <td>{$row['tahun_masakerja']}</td>
                                            <td>{$row['nama_diklat']}</td>
                                            <td>{$row['bulan_diklat']}-{$row['tahun_diklat']}</td>
                                            <td>{$row['jumlah_jam_diklat']}</td>
                                            <td>{$row['usia']}</td>
                                            <td>{$row['jenis_kelamin']}</td>
                                            <td>{$row['agama']}</td>
                                            <td>{$row['asal']}</td>
                                            <td>{$row['tahun_masakerja']}</td>
                                            <td>{$row['tingkat_pendidikan_terakhir']}</td>
                                            <td>{$row['no_ijazah']}</td>
                                            <td>{$row['jurusan']}</td>
                                            <td>{$row['instansi_sekolah']}</td>
                                            <td>{$row['tahun_lulus_pendidikan']}</td>
                                            <td>{$row['karpeg']}</td>
                                            <td>{$row['kgb']}</td>
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
    <script>
        $(document).ready(function() {
            $('#tabel_nominatifasn').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Maaf, data tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Data tidak tersedia",
                    infoFiltered: "(disaring dari total _MAX_ data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>
</body>

</html>
