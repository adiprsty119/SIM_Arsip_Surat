<?php include 'header.php'; ?>
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Galeri Foto dan Kegiatan</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <?php
      include '../koneksi/koneksi.php';
      $sql = mysqli_query($db, "SELECT * FROM tb_galeri ORDER BY tanggal DESC");
      while($data = mysqli_fetch_array($sql)) {
    ?>
      <div class="col-md-3 col-sm-4">
        <div class="card mb-4 shadow-sm">
          <img src="uploads/<?php echo $data['foto']; ?>" class="img-fluid" alt="Foto Kegiatan">
          <div class="card-body">
            <p class="card-text"><strong><?php echo $data['judul']; ?></strong></p>
            <p><?php echo date("d M Y", strtotime($data['tanggal'])); ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<?php include 'footer.php'; ?>
