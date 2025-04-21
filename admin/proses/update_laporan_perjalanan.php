<?php
include "../../koneksi/koneksi.php";

$id = $_POST['id'];
$pegawai = $_POST['pegawai'];
$tanggal = date('Y-m-d');

// Ambil data lama
$old = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_laporan_perjalanan WHERE id='$id'"));
$folder = '../file_laporan/';

$laporan_name = $old['laporan'];
$dokumentasi_name = $old['dokumentasi'];

if ($_FILES['laporan']['name']) {
    if (file_exists($folder . $laporan_name)) unlink($folder . $laporan_name);
    $laporan_name = time() . '_laporan_' . basename($_FILES['laporan']['name']);
    move_uploaded_file($_FILES['laporan']['tmp_name'], $folder . $laporan_name);
}

if ($_FILES['dokumentasi']['name']) {
    if (file_exists($folder . $dokumentasi_name)) unlink($folder . $dokumentasi_name);
    $dokumentasi_name = time() . '_foto_' . basename($_FILES['dokumentasi']['name']);
    move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $folder . $dokumentasi_name);
}

$query = "UPDATE tb_laporan_perjalanan SET pegawai='$pegawai', laporan='$laporan_name', dokumentasi='$dokumentasi_name', tanggal='$tanggal' WHERE id='$id'";

if (mysqli_query($db, $query)) {
    echo "<script>alert('Data berhasil diperbarui');window.location='../laporan_perjalanan.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui');window.location='../laporan_perjalanan.php';</script>";
}
