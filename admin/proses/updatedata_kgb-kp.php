<?php
include '../../koneksi/koneksi.php';

$id_riwayat = $_POST['id_riwayat'];
$nip = $_POST['nip'];
$jenis_kenaikan = $_POST['jenis_kenaikan'];
$pangkat_sebelumnya = $_POST['pangkat_gol_sebelumnya'];
$pangkat_sekarang = $_POST['pangkat_gol_sekarang'];
$tmt_kenaikan = $_POST['tmt_kenaikan'];
$nomor_sk = $_POST['no_sk'];
$tanggal_sk = $_POST['tanggal_sk'];
$penandatanganan_sk = $_POST['penandatanganan_sk'];
$status_proses = $_POST['status_proses'];

// Handle upload file SK jika ada file baru
$file_sk = $_FILES['file_sk']['name'];
$tmp = $_FILES['file_sk']['tmp_name'];

if (!empty($file_sk)) {
    $path = "../../files_sk/" . $file_sk;
    move_uploaded_file($tmp, $path);

    // Update dengan file baru
    $sql = "UPDATE tb_riwayat_kgp_kp SET 
                nip = '$nip',
                jenis_kenaikan = '$jenis_kenaikan',
                pangkat_gol_sebelumnya = '$pangkat_sebelumnya',
                pangkat_gol_sekarang = '$pangkat_sekarang',
                tmt_kenaikan = '$tmt_kenaikan',
                no_sk = '$nomor_sk',
                tanggal_sk = '$tanggal_sk',
                penandatanganan_sk = '$penandatanganan_sk',
                file_sk = '$file_sk',
                status_proses = '$status_proses'
            WHERE id_riwayat = '$id_riwayat'";
} else {
    // Update tanpa ganti file
    $sql = "UPDATE tb_riwayat_kgp_kp SET 
                nip = '$nip',
                jenis_kenaikan = '$jenis_kenaikan',
                pangkat_gol_sebelumnya = '$pangkat_sebelumnya',
                pangkat_gol_sekarang = '$pangkat_sekarang',
                tmt_kenaikan = '$tmt_kenaikan',
                no_sk = '$nomor_sk',
                tanggal_sk = '$tanggal_sk',
                penandatanganan_sk = '$penandatanganan_sk',
                status_proses = '$status_proses'
            WHERE id_riwayat = '$id_riwayat'";
}

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Data berhasil diperbarui.'); window.location='../datakgb-kp.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data.'); window.history.back();</script>";
}
