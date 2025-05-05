<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip    = mysqli_real_escape_string($db, $_POST['nip']);
    $riwayat_pendidikan    = mysqli_real_escape_string($db, $_POST['riwayat_pendidikan']);
    $riwayat_diklat       = mysqli_real_escape_string($db, $_POST['riwayat_diklat']);
    $riwayat_jabatan  = mysqli_real_escape_string($db, $_POST['riwayat_jabatan']);
    $riwayat_mutasi  = mysqli_real_escape_string($db, $_POST['riwayat_mutasi']);
    $riwayat_penghargaan      = mysqli_real_escape_string($db, $_POST['riwayat_penghargaan']);
    $tugas_belajar      = mysqli_real_escape_string($db, $_POST['tugas_belajar']);
    $izin_belajar      = mysqli_real_escape_string($db, $_POST['izin_belajar']);
    $masa_kerja_tahun      = mysqli_real_escape_string($db, $_POST['masa_kerja_tahun']);
    $masa_kerja_bulan      = mysqli_real_escape_string($db, $_POST['masa_kerja_bulan']);
    $catatan_lain      = mysqli_real_escape_string($db, $_POST['catatan_lain']);

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tb_informasikepegawaian (
        nip, riwayat_pendidikan, riwayat_diklat, riwayat_jabatan, riwayat_mutasi, riwayat_penghargaan, tugas_belajar, izin_belajar, masa_kerja_tahun, masa_kerja_bulan, catatan_lain
      ) VALUES (
        '$nip', '$riwayat_pendidikan', '$riwayat_diklat', '$riwayat_jabatan', '$riwayat_mutasi',
        '$riwayat_penghargaan', '$tugas_belajar', '$izin_belajar',
        '$masa_kerja_tahun', '$masa_kerja_bulan', '$catatan_lain'
      )";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='../informasikepegawaian.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($db) . "'); window.history.back();</script>";
    }
}
