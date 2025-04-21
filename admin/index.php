<?php
session_start();
include "login/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIM ADMINISTRASI PEMOTKESRA PPS</title>

  <!-- Stylesheets -->
  <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <link href="../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet">
  <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/icon.ico">

  <style>
    .carousel-fade .carousel-inner .item {
      transition: opacity 1s ease-in-out;
      opacity: 0;
      position: absolute;
      width: 100%;
      left: 0;
      top: 0;
    }

    .carousel-fade .carousel-inner .active {
      opacity: 1;
      position: relative;
      z-index: 2;
    }

    .carousel-inner {
      position: relative;
      overflow: hidden;
    }

    .carousel-inner .item img {
      width: 100%;
      height: auto;
      max-height: 400px;
      object-fit: cover;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <?php include("sidebarmenu.php"); ?>
      <?php include("header.php"); ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <br>
        <div class="row">
          <div class="col-md-12">
            <center>
              <h1><b>Selamat Datang, <?php echo $_SESSION['nama']; ?></b></h1>
            </center>
          </div>
        </div>
        <br>

        <!-- Statistik -->
        <div class="row">
          <?php
          include '../koneksi/koneksi.php';

          $jumlah1 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_suratmasuk"));
          $jumlah2 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_suratkeluar"));
          $jumlah3 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tb_bagian"));
          ?>

          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-inbox"></i></div>
              <div class="count"><?php echo $jumlah1; ?></div>
              <h3>Surat Masuk</h3>
              <p>Telah diarsipkan</p>
            </div>
          </div>

          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-send"></i></div>
              <div class="count"><?php echo $jumlah2; ?></div>
              <h3>Surat Keluar</h3>
              <p>Telah diarsipkan</p>
            </div>
          </div>

          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-group"></i></div>
              <div class="count"><?php echo $jumlah3; ?></div>
              <h3>Bagian</h3>
              <p>Telah didaftarkan</p>
            </div>
          </div>
        </div>

        <!-- Galeri Kegiatan -->
        <div class="row">
          <div class="col-md-12">
            <div class="x_title">
              <h2>Update Kegiatan Terbaru <small>Seluruh Aktifitas Kegiatan Terbaru Akan Muncul Disini</small></h2> <!-- Ubah sesuai kebutuhan -->
              <div class="clearfix"></div>
            </div>
            <?php
            $galeri = mysqli_query($db, "SELECT * FROM tb_galeri ORDER BY id DESC LIMIT 5");
            ?>
            <div id="sliderGaleri" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
              <div class="carousel-inner">
                <?php
                $aktif = true;
                while ($g = mysqli_fetch_array($galeri)) {
                  $activeClass = $aktif ? 'active' : '';
                  $filePath = "img/foto_galeri/{$g['foto']}";
                  $src = file_exists($filePath) ? $filePath : "img/foto_galeri";
                  echo "
                    <div class='item $activeClass'>
                      <img class='img-responsive' src='$src' alt='{$g['judul']}'>
                      <div class='carousel-caption'>
                        <h1>{$g['judul']}</h1>
                      </div>
                    </div>";
                  $aktif = false;
                }
                ?>
              </div>
              <a class="left carousel-control" href="#sliderGaleri" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#sliderGaleri" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
        <!-- End Galeri -->

      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          SIM ADMINISTRASI Pemerintah Papua Selatan - by <a href="https://www.instagram.com/id.toma/">TOMA</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->

    </div>
  </div>

  <!-- Scripts -->
  <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
  <script src="../assets/vendors/Chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendors/gauge.js/dist/gauge.min.js"></script>
  <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <script src="../assets/vendors/iCheck/icheck.min.js"></script>
  <script src="../assets/vendors/skycons/skycons.js"></script>
  <script src="../assets/vendors/Flot/jquery.flot.js"></script>
  <script src="../assets/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../assets/vendors/Flot/jquery.flot.time.js"></script>
  <script src="../assets/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../assets/vendors/Flot/jquery.flot.resize.js"></script>
  <script src="../assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../assets/vendors/flot.curvedlines/curvedLines.js"></script>
  <script src="../assets/vendors/DateJS/build/date.js"></script>
  <script src="../assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <script src="../assets/vendors/moment/min/moment.min.js"></script>
  <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../assets/build/js/custom.min.js"></script>
</body>

</html>
