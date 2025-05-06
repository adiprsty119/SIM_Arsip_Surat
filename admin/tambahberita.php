<?php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
include '../koneksi/koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            max-width: 700px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        h2 {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            color: #495057;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            margin-left: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4"><i class="fa fa-plus"></i> Tambah Berita Baru</h2>

        <form action="proses/proses_tambahberita.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Berita</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
            </div>

            <div class="form-group">
                <label for="tanggal_terbit">Tanggal Terbit</label>
                <input type="date" class="form-control-file" id="tanggal_terbit" name="tanggal_terbit" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Berita</button>
            <a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </form>
    </div>

</body>

</html>