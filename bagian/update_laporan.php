<?php
include '../koneksi/koneksi.php';

// Cek apakah ID laporan ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data laporan berdasarkan ID
    $sql = mysqli_query($db, "SELECT * FROM tb_laporan WHERE id = '$id'");
    $data = mysqli_fetch_array($sql);
    if (!$data) {
        echo "<script>alert('Laporan tidak ditemukan'); window.location='laporanperiodik.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID laporan tidak ditemukan'); window.location='laporanperiodik.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($db, $_POST['judul']);
    $tanggal = date('Y-m-d');

    // Periksa jika ada file yang diupload
    if ($_FILES['file']['name']) {
        $file = $_FILES['file']['name'];
        $tmp  = $_FILES['file']['tmp_name'];
        $folder = "../file_laporan/";

        // Validasi tipe file
        $allowed_ext = ['pdf'];
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed_ext)) {
            // Nama file unik
            $nama_file = time() . '_' . preg_replace('/\s+/', '_', $file);
            $target = $folder . $nama_file;

            if (move_uploaded_file($tmp, $target)) {
                // Update data di database dengan file baru
                $query = "UPDATE tb_laporan_perjalanan SET judul = '$judul', file = '$nama_file', tanggal = '$tanggal' WHERE id = '$id'";
                $update = mysqli_query($db, $query);

                if ($update) {
                    echo "<script>alert('Laporan berhasil diperbarui'); window.location='laporanperiodik.php';</script>";
                } else {
                    echo "<script>alert('Gagal memperbarui laporan'); window.location='laporanperiodik.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengupload file'); window.location='laporanperiodik.php';</script>";
            }
        } else {
            echo "<script>alert('Hanya file PDF yang diperbolehkan'); window.location='laporanperiodik.php';</script>";
        }
    } else {
        // Jika tidak ada file baru, update hanya judul
        $query = "UPDATE tb_laporan SET judul = '$judul', tanggal = '$tanggal' WHERE id = '$id'";
        $update = mysqli_query($db, $query);

        if ($update) {
            echo "<script>alert('Laporan berhasil diperbarui'); window.location='laporanperiodik.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui laporan'); window.location='laporanperiodik.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Laporan | Arsip Surat Pemerintah Papua Selatan</title>

    <!-- CSS -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- Sidebar -->
            <?php include("sidebarmenu.php"); ?>

            <!-- Header -->
            <?php include("header.php"); ?>

            <!-- Page Content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit Laporan Periodik</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Edit Data Laporan Periodik</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <!-- Form untuk edit laporan -->
                                    <form action="update_laporan.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="judul">Judul Laporan</label>
                                            <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File Laporan (PDF) <small>Jika tidak ingin mengubah file, biarkan kosong</small></label>
                                            <input type="file" id="file" name="file" class="form-control" accept=".pdf">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <footer>
                <div class="pull-right">
                    Arsip Surat Pemerintah Papua Selatan - Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>

        </div>
    </div>

    <!-- JS -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <script src="../assets/build/js/custom.min.js"></script>
</body>

</html>