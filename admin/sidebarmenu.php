<?php
include '../koneksi/koneksi.php';
$sql      = "SELECT * FROM tb_admin where id_admin='" . $_SESSION['id'] . "'";
$query    = mysqli_query($db, $sql);
$data     = mysqli_fetch_array($query);
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-institution"></i> <span> Arsip Surat</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/<?php echo $data['gambar']; ?>" height="55" width="55" alt="" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2><?php echo $_SESSION['nama']; ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-file-text"></i> Administrasi Surat <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="datasuratmasuk.php"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
              <li><a href="datasuratkeluar.php"><i class="fa fa-send"></i>Surat Keluar</a></li>
              <li><a href="disposisi.php"><i class="fa fa-comments"></i>Disposisi</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-users-rectangle"></i> Bagian <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="databagian.php"><i class="fa  fa-inbox"></i>Data Bagian</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-people-group"></i> Data Kepegawaian <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="datanominatifasn.php"><i class="fa  fa-table"></i>Data Nominatif ASN</a></li>
              <li><a href="databerkasdigital.php"><i class="fa  fa-table"></i>Data Berkas Digital</a></li>
              <li><a href="datakgb-kp.php"><i class="fa  fa-table"></i>Data KGB & KP</a></li>
              <li><a href="informasikepegawaian.php"><i class="fa  fa-circle-info"></i>Informasi Kepegawaian</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-plane-departure"></i> Perjalanan Dinas | PD <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="spt-sppd.php"><i class="fa  fa-table"></i>SPT & SPPD</a></li>
              <li><a href="materihasil-pd.php"><i class="fa  fa-table"></i>Materi Hasil PD</a></li>
              <li><a href="laporan-pd.php"><i class="fa  fa-table"></i>Laporan PD</a></li>
              <li><a href="dokumentasi-pd.php"><i class="fa  fa-image"></i>Dokumentasi PD</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>