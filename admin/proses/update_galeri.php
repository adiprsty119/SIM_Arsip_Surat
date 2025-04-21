<?php
include '../../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $judul = mysqli_real_escape_string($db, $_POST['judul']);

    // Biarkan HTML dari summernote masuk tanpa htmlentities supaya formatting tetap
    $keterangan = $_POST['keterangan'];
    $tanggal = date('Y-m-d');

    // Ambil data galeri lama
    $data_lama = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_galeri WHERE id='$id'"));
    $foto_lama = $data_lama['foto'];

    $folder = '../img/foto_galeri/';
    $query = "";

    // Jika ada file baru diupload
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed_ext)) {
            $nama_file = time() . '_' . preg_replace('/\\s+/', '_', $foto);
            $target = $folder . $nama_file;

            if (move_uploaded_file($tmp, $target)) {
                // Hapus file lama jika ada
                if (!empty($foto_lama) && file_exists($folder . $foto_lama)) {
                    unlink($folder . $foto_lama);
                }

                $query = "UPDATE tb_galeri 
                          SET judul='$judul', keterangan='$keterangan', foto='$nama_file', tanggal='$tanggal' 
                          WHERE id='$id'";
            } else {
                echo "<script>alert('Gagal upload file baru'); window.location='../galerikegiatan.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Ekstensi file tidak didukung. Gunakan JPG, JPEG, atau PNG.'); window.location='../galerikegiatan.php';</script>";
            exit;
        }
    } else {
        // Tanpa mengganti foto
        $query = "UPDATE tb_galeri 
                  SET judul='$judul', keterangan='$keterangan', tanggal='$tanggal' 
                  WHERE id='$id'";
    }

    // Jalankan query
    $update = mysqli_query($db, $query);

    if ($update) {
        echo "<script>alert('Data galeri berhasil diupdate'); window.location='../galerikegiatan.php';</script>";
    } else {
        echo "<script>alert('Gagal update data'); window.location='../galerikegiatan.php';</script>";
    }
}
