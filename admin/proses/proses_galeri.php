<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($db, $_POST['judul']);
    $keterangan = mysqli_real_escape_string($db, $_POST['keterangan']);
    $tanggal = date('Y-m-d');

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    // FIX: path upload (dari proses_galeri.php ke folder foto_galeri/)
    $folder = '../img/foto_galeri/';

    // Validasi ekstensi
    $allowed_ext = ['jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed_ext)) {
        $nama_file = time() . '_' . preg_replace('/\s+/', '_', $foto);
        $target = $folder . $nama_file;

        // Cek apakah folder ada
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        // Proses pindahkan file
        if (move_uploaded_file($tmp, $target)) {
            $query = "INSERT INTO tb_galeri (judul, keterangan, foto, tanggal)
                      VALUES ('$judul', '$keterangan', '$nama_file', '$tanggal')";
            $insert = mysqli_query($db, $query);

            if ($insert) {
                echo "<script>alert('Galeri berhasil ditambahkan'); window.location='../galerikegiatan.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan ke database'); window.location='../galerikegiatan.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal memindahkan file ke folder galeri'); window.location='../galerikegiatan.php';</script>";
        }
    } else {
        echo "<script>alert('Hanya file JPG, JPEG, PNG yang diperbolehkan'); window.location='../galerikegiatan.php';</script>";
    }
}
