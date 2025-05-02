<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip                     = mysqli_real_escape_string($db, $_POST['nip']);
    $jenis_kenaikan          = mysqli_real_escape_string($db, $_POST['jenis_kenaikan']);
    $pangkat_gol_sebelumnya  = mysqli_real_escape_string($db, $_POST['pangkat_gol_sebelumnya']);
    $pangkat_gol_sekarang    = mysqli_real_escape_string($db, $_POST['pangkat_gol_sekarang']);
    $tmt_kenaikan            = mysqli_real_escape_string($db, $_POST['tmt_kenaikan']);
    $no_sk                   = mysqli_real_escape_string($db, $_POST['no_sk']);
    $tanggal_sk              = mysqli_real_escape_string($db, $_POST['tanggal_sk']);
    $penandatangan_sk        = mysqli_real_escape_string($db, $_POST['penandatanganan_sk']);
    $status_proses           = mysqli_real_escape_string($db, $_POST['status_proses']);

    $file_sk = null;

    // Cek apakah file diunggah
    if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
        $upload_file = $_FILES['berkas'];
        $upload_dir = '../../berkas/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $original_name = basename($upload_file['name']);
        $safe_name     = time() . '_' . preg_replace('/\s+/', '_', $original_name);
        $file_path     = $upload_dir . $safe_name;

        // Validasi jenis file (opsional)
        $allowed_types = [
            'application/pdf',
            'image/jpeg',
            'image/png',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (!in_array($upload_file['type'], $allowed_types)) {
            echo "<script>alert('Jenis file tidak didukung. Hanya PDF, JPG, PNG, DOC yang diperbolehkan.'); window.location='../datakgb-kp.php';</script>";
            exit;
        }

        if (move_uploaded_file($upload_file['tmp_name'], $file_path)) {
            $file_sk = $safe_name;
        } else {
            echo "<script>alert('Gagal mengupload file'); window.location='../datakgb-kp.php';</script>";
            exit;
        }
    }

    // Query insert disesuaikan apakah ada file atau tidak
    $query = "INSERT INTO tb_riwayat_kgp_kp (nip, jenis_kenaikan, pangkat_gol_sebelumnya, pangkat_gol_sekarang, tmt_kenaikan, no_sk, tanggal_sk, penandatanganan_sk, file_sk, status_proses)
              VALUES ('$nip', '$jenis_kenaikan', '$pangkat_gol_sebelumnya', '$pangkat_gol_sekarang', '$tmt_kenaikan', '$no_sk', '$tanggal_sk', '$penandatangan_sk', '$file_sk', '$status_proses')";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil disimpan'); window.location='../datakgb-kp.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan ke database'); window.location='../datakgb-kp.php';</script>";
    }
}
