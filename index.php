<?php
session_start();
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arsip Surat Pemerintah Provinsi Papua Selatan</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style-news.css">
  <link rel="shortcut icon" href="img/icon.ico">

</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container" style="display: flex; flex-direction: row; justify-content:space-around; width: 100%">
              <div class="navbar-header" style="display: flex;">
                <a href="#">
                  <img src="img/logo_PPS.png" alt="Logo PPS" style="width: 5rem; margin-top: 0.5rem; margin-right: 1rem;">
                </a>
                <a class="navbar-brand" href="#" style="padding-top: 1.5rem; padding-bottom: 0;">
                  ARSIP SURAT <span class="logo-dec">Pemerintah Provinsi Papua Selatan</span>
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#main-header">Beranda</a></li>
                  <li><a href="#news">Sekilas Berita</a></li>
                  <li><a href="#feature">Tentang</a></li>
                  <li><a href="#portfolio">Pengembang</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      Masuk <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="admin/login"><i class="fa fa-sign-in"></i> Admin</a></li>
                      <li><a href="bagian/login"><i class="fa fa-sign-in"></i> Bagian</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h2 class="bnr-sub-title"></h2>
                <h3 class="bnr-sub-title">SISTEM INFORMASI PENGARSIPAN SURAT INTERNAL</h3>
                <h3 class="bnr-sub-title"><span class="logo-dec">BIRO PEMERINTAHAN, OTSUS DAN KESRA</span></h3>
                <h3 class="bnr-sub-title"><span class="logo-dec">SETDA PROVINSI PAPUA SELATAN</span></h3>
                <div class="logo-biro" style="margin-top: 4rem;">
                  <img src="img/logo_biro.png" style="width: 20rem;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--HEADER-->

    <!-- Tampilan Berita -->
    <?php include 'koneksi/koneksi.php'; ?>
    <!-- Tampilan Berita -->
    <section id="news" class="section-padding wow fadeIn delay-05s text-center">
      <h2 class="service-title pad-bt15">SEKILAS BERITA</h2>
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          $query = "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 10";
          $result = mysqli_query($db, $query);

          while ($row = mysqli_fetch_assoc($result)) {
            $judul     = $row['judul'];
            $deskripsi = substr($row['deskripsi'], 0, 120) . '...';
            $gambar    = 'admin/images/' . $row['gambar'];
          ?>
            <div class="slider-item swiper-slide">
              <div class="slider-image-wrapper">
                <img class="slider-image" src="<?php echo $gambar; ?>" alt="SliderImg">
              </div>
              <div class="slider-item-content">
                <h1><?php echo htmlspecialchars($judul); ?></h1>
                <p><?php echo htmlspecialchars($deskripsi); ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="slider-buttons">
          <button class="swiper-button-prev">Prev</button>
          <button class="swiper-button-next">Next</button>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- Tampilan Berita -->

    <!---->
    <section id="feature" class="section-padding wow fadeIn delay-05s" style="margin-top: 5%;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Tentang</h2>
            <p class="sub-title pad-bt15">Website ini berguna untuk pengarsipan Surat Masuk dan Surat Keluar di Biro Pemerinatahan, Otsus dan Kesra Setda Provinsi Papua Selatan</p>
            <p>Surat diarsipkan dalam format PDF lalu disesuaikan nomor urutnya.</p>
            <hr class="bottom-line">
            <p class="sub-title pad-bt15">Pengarsipan Surat itu<strong> PENTING</strong></p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/inbox.png">
              </div>
              <h3 class="pad-bt15">Surat Masuk</h3>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/outbox.png">
              </div>
              <h3 class="pad-bt15">Surat Keluar</h3>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <section id="portfolio" class="section-padding wow fadeInUp delay-05s" style="margin-top: 5%;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Pengembang</h2>
            <p class="sub-title pad-bt15">"TOMA CAHAYA NUSANTARA - Solusinya Milenials"</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/tomaofficial.png" class="img-responsive">
              <figcaption>
                <h2>TOMA CAHAYA NUSANTARA</h2>
                <p>"Solusinya Milenials"</p>
                <p>"Bergerak pada bidang jasa pembuatan aplikasi dan desain grafis"</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-3"></div>
        </div>
        <hr class="bottom-line">
      </div>
    </section>
    <!---->
    <!---->
    <section id="testimonial" class="wow fadeInUp delay-05s">
      <div class="bg-testicolor">
        <div class="container section-padding">
          <div class="row">
            <div class="testimonial-item">
              <ul class="bxslider">
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>Talent wins games, but teamwork and intelligence win championships. </p>
                  </blockquote>
                  <small>Michael Jordan</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>Alone we can do so little, together we can do so much.</p>
                  </blockquote>
                  <small>Helen Keller</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>None of us is as smart as all of us.</p>
                  </blockquote>
                  <small>Ken Blanchard</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>Coming together is a beginning. Keeping together is progress. Working together is success.</p>
                  </blockquote>
                  <small>Henry Ford</small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>&copy; TI UNMUS. All Rights Reserved.</p>
          <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Baker
            -->
            Designed by <a href="https://bootstrapmade.com/">Bootstrap Themes</a>
          </div>
        </div>
      </div>
    </footer>
    <!---->
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.5/swiper-bundle.min.js'></script>
  <script src="js/script.js"></script>
</body>

</html>
