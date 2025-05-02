<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

$id = intval($_GET['id_berkas']);
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_berkasdigital WHERE id_berkas='$id'"));

if (!isset($_GET['id_berkas']) || empty($_GET['id_berkas'])) {
    echo "<script>alert('ID tidak valid'); window.location='databerkasdigital.php';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Berkas Digital</title>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            max-width: 600px;
        }

        h3 {
            color: #495057;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button.btn {
            border-radius: 8px;
            font-size: 16px;
            padding: 10px 20px;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button.btn-primary {
            background-color: #007bff;
            border: none;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        button.btn-default {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
        }

        button.btn-default:hover {
            background-color: #e2e6ea;
        }

        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h3>Edit Data Berkas Digital</h3>
        <form action="proses/update_berkasdigital.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_berkas" value="<?= $data['id_berkas'] ?>">

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" value="<?= htmlspecialchars($data['nip']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Dokumen</label>
                <input type="text" name="nama_dokumen" value="<?= htmlspecialchars($data['nama_dokumen']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori Dokumen</label>
                <input type="text" name="kategori_dokumen" value="<?= htmlspecialchars($data['kategori_dokumen']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Upload</label>
                <input type="date" name="tanggal_upload" value="<?= htmlspecialchars($data['tanggal_upload']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>File Dokumen (Kosongkan jika tidak ingin diganti)</label>
                <input type="file" name="file_path" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"><?= htmlspecialchars($data['keterangan']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="databerkasdigital.php" class="btn btn-default">Batal</a>
        </form>
    </div>
</body>

</html>