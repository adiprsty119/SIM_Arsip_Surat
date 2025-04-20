<?php include 'header.php'; ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Laporan Periodik Kasubbag</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Laporan</th>
                        <th>Tanggal</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi/koneksi.php';
                    $no = 1;
                    $query = mysqli_query($db, "SELECT * FROM tb_laporan ORDER BY tanggal DESC");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo date("d M Y", strtotime($data['tanggal'])); ?></td>
                            <td><a href="uploads/<?php echo $data['file']; ?>" target="_blank">Download</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>