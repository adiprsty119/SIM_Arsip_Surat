<?php
include '../../koneksi/koneksi.php';

$id_riwayat = mysqli_real_escape_string($db, $_POST['id_riwayat']);
$nip = mysqli_real_escape_string($db, $_POST['nip']);
$riwayat_pendidikan = mysqli_real_escape_string($db, $_POST['riwayat_pendidikan']);
$riwayat_diklat = mysqli_real_escape_string($db, $_POST['riwayat_diklat']);
$riwayat_jabatan = mysqli_real_escape_string($db, $_POST['riwayat_jabatan']);
$riwayat_mutasi = mysqli_real_escape_string($db, $_POST['riwayat_mutasi']);
$riwayat_penghargaan = mysqli_real_escape_string($db, $_POST['riwayat_penghargaan']);
$tugas_belajar = mysqli_real_escape_string($db, $_POST['tugas_belajar']);
$izin_belajar = mysqli_real_escape_string($db, $_POST['izin_belajar']);
$masa_kerja_tahun = mysqli_real_escape_string($db, $_POST['masa_kerja_tahun']);
$masa_kerja_bulan = mysqli_real_escape_string($db, $_POST['masa_kerja_bulan']);
$catatan_lain = mysqli_real_escape_string($db, $_POST['catatan_lain']);

// Query update
$query = "UPDATE tb_informasikepegawaian SET 
            nip = '$nip',
            riwayat_pendidikan = '$riwayat_pendidikan',
            riwayat_diklat = '$riwayat_diklat',
            riwayat_jabatan = '$riwayat_jabatan',
            riwayat_mutasi = '$riwayat_mutasi',
            riwayat_penghargaan = '$riwayat_penghargaan',
            tugas_belajar = '$tugas_belajar',
            izin_belajar = '$izin_belajar',
            masa_kerja_tahun = '$masa_kerja_tahun',
            masa_kerja_bulan = '$masa_kerja_bulan',
            catatan_lain = '$catatan_lain'
          WHERE id_info = '$id_riwayat'";

$update = mysqli_query($db, $query);

// Cek hasil
if ($update) {
    echo "<script>alert('Data berhasil diperbarui'); window.location='../informasikepegawaian.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($db) . "'); window.history.back();</script>";
}
