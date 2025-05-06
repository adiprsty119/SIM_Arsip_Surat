<?php
session_start();
include '../../koneksi/koneksi.php';

// Cek apakah request method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<script>alert('Permintaan tidak valid.'); window.history.back();</script>";
    exit;
}

// CSRF Token Check (asumsi Anda menyisipkan token di form)
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo "<script>alert('Token tidak valid.'); window.history.back();</script>";
    exit;
}

// Ambil dan sanitasi input
$judul     = trim($_POST['judul']);
$deskripsi = trim($_POST['deskripsi']);
$penulis   = trim($_POST['penulis']);
$tanggal   = $_POST['tanggal_terbit'];

// Validasi tanggal
if (!DateTime::createFromFormat('Y-m-d', $tanggal)) {
    echo "<script>alert('Format tanggal tidak valid.'); window.history.back();</script>";
    exit;
}

// Validasi gambar
if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
    echo "<script>alert('Upload gambar gagal.'); window.history.back();</script>";
    exit;
}

// Validasi ukuran gambar (maks 10MB)
if ($_FILES['gambar']['size'] > 10 * 1024 * 1024) {
    echo "<script>alert('Ukuran gambar maksimal 2MB.'); window.history.back();</script>";
    exit;
}

// Validasi tipe MIME gambar
$allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
$mime_type = mime_content_type($_FILES['gambar']['tmp_name']);
if (!in_array($mime_type, $allowed_types)) {
    echo "<script>alert('Tipe gambar tidak diperbolehkan.'); window.history.back();</script>";
    exit;
}

// Generate nama file unik
$ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
$unique_filename = uniqid('img_', true) . '.' . $ext;
$target_path = "../images/" . $unique_filename;

// Pindahkan file
if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
    echo "<script>alert('Gagal menyimpan gambar.'); window.history.back();</script>";
    exit;
}

// Gunakan prepared statement
$stmt = $db->prepare("INSERT INTO berita (judul, deskripsi, gambar, tanggal, penulis) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    error_log("Prepare failed: " . $db->error);
    echo "<script>alert('Terjadi kesalahan.'); window.history.back();</script>";
    exit;
}
$stmt->bind_param("sssss", $judul, $deskripsi, $unique_filename, $tanggal, $penulis);

if ($stmt->execute()) {
    echo "<script>alert('Berita berhasil ditambahkan!'); window.location.href='../daftarberita.php';</script>";
} else {
    error_log("Execute failed: " . $stmt->error);
    echo "<script>alert('Terjadi kesalahan saat menyimpan data.'); window.history.back();</script>";
}

$stmt->close();
$db->close();
