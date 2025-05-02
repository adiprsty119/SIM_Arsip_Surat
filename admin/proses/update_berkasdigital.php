<?php
include '../../koneksi/koneksi.php';

$id = $_POST['id_berkas'];
$nip = $_POST['nip'];
$nama_dokumen = $_POST['nama_dokumen'];
$kategori_dokumen = $_POST['kategori_dokumen'];
$tanggal_upload = $_POST['tanggal_upload'];
$keterangan = $_POST['keterangan'];

$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_berkasdigital WHERE id_berkas='$id'"));
$folder = '../file_berkas_digital/';

$file_path = $data['file_path']; // Default file_path yang sudah ada

// Jika ada file yang diupload baru, maka ganti file yang lama
if (!empty($_FILES['file_path']['name'])) {
    $file_path = time() . '_berkas_' . basename($_FILES['file_path']['name']);
    move_uploaded_file($_FILES['file_path']['tmp_name'], $folder . $file_path);
}

// Query untuk update data
$query = "UPDATE tb_berkasdigital SET 
            nip='$nip', 
            nama_dokumen='$nama_dokumen', 
            kategori_dokumen='$kategori_dokumen', 
            tanggal_upload='$tanggal_upload', 
            file_path='$file_path', 
            keterangan='$keterangan' 
          WHERE id_berkas='$id'";

if (mysqli_query($db, $query)) {
    echo "<script>alert('Data berhasil diupdate'); window.location='../databerkasdigital.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data'); window.location='../databerkasdigital.php';</script>";
}
