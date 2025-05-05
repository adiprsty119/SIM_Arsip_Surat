<?php
include '../koneksi/koneksi.php';
$sql = "SELECT * FROM tb_admin WHERE id_admin='" . $_SESSION['id'] . "'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);
?>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-institution"></i> <span> Sim Administrasi </span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
          <li><a><i class="fa fa-file-text"></i> Kategori Surat <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="datasuratmasuk.php"><i class="fa fa-inbox"></i> Surat Masuk</a></li>
              <li><a href="datasuratkeluar.php"><i class="fa fa-send"></i> Surat Keluar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-users-viewfinder"></i> Bagian <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="databagian.php"><i class="fa fa-sitemap"></i> Data Bagian</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-people-group"></i> Kepegawaian <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="datanominatifasn.php"><i class="fa fa-square-poll-vertical"></i> Nominatif ASN</a></li>
              <li><a href="databerkasdigital.php"><i class="fa fa-folder"></i> Berkas Digital</a></li>
              <li><a href="datakgb-kp.php"><i class="fa fa-person-arrow-up-from-line"></i> KGB dan KP</a></li>
              <li><a href="informasikepegawaian.php"><i class="fa fa-circle-info"></i> Informasi Kepegawaian</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-camera"></i> Laporan Kegiatan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="galerikegiatan.php"><i class="fa fa-image"></i> Galeri Foto dan Kegiatan</a></li>
              <li><a href="laporanperiodik.php"><i class="fa fa-book"></i> Laporan Periodik Kasubbag</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-plane"></i> Perjalanan Dinas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="spt_sppd.php"><i class="fa fa-file-pdf-o"></i> SPT dan SPPD</a></li>
              <li><a href="laporan_perjalanan.php"><i class="fa fa-archive"></i> Laporan Materi / Hasil</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-newspaper"></i> Manajemen Berita <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="tambahberita.php"><i class="fa fa-plus"></i> Tambah Berita</a></li>
              <li><a href="daftarberita.php"><i class="fa fa-envelopes-bulk"></i> Daftar Berita</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>