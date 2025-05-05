<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

if (!isset($_GET['id_info']) || empty($_GET['id_info'])) {
    echo "<script>alert('ID tidak valid'); window.location='informasikepegawaian.php';</script>";
    exit;
}

$id = intval($_GET['id_info']);
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_informasikepegawaian WHERE id_info='$id'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Informasi Kepegawaian</title>
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
        <h3>Edit Data Informasi Kepegawaian</h3>
        <form action="proses/updatedata_infokepegawaian.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_info" value="<?= $data['id_info'] ?>">

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" value="<?= htmlspecialchars($data['nip']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Riwayat Pendidikan</label>
                <input type="text" name="riwayat_pendidikan" value="<?= htmlspecialchars($data['riwayat_pendidikan']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Riwayat Diklat</label>
                <input type="text" name="riwayat_diklat" value="<?= htmlspecialchars($data['riwayat_diklat']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Riwayat_Jabatan</label>
                <input type="text" name="riwayat_jabatan" value="<?= htmlspecialchars($data['riwayat_jabatan']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Riwayat Mutasi</label>
                <input type="text" name="riwayat_mutasi" value="<?= htmlspecialchars($data['riwayat_mutasi']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Riwayat_Penghargaan</label>
                <input type="text" name="riwayat_penghargaan" class="form-control" value="<?= htmlspecialchars($data['riwayat_penghargaan']) ?>">
            </div>

            <div class="form-group">
                <label>Tugas Belajar</label>
                <input type="number" name="tugas_belajar" class="form-control" value="<?= htmlspecialchars($data['tugas_belajar']) ?>">
            </div>

            <div class="form-group">
                <label>Izin Belajar</label>
                <input type="number" name="izin_belajar" class="form-control" value="<?= htmlspecialchars($data['izin_belajar']) ?>">
            </div>

            <div class="form-group">
                <label>Masa Kerja Tahun</label>
                <input type="number" name="masa_kerja_tahun" class="form-control" value="<?= htmlspecialchars($data['masa_kerja_tahun']) ?>">
            </div>

            <div class="form-group">
                <label>Masa Kerja Bulan</label>
                <input type="number" name="masa_kerja_bulan" class="form-control" value="<?= htmlspecialchars($data['masa_kerja_bulan']) ?>">
            </div>

            <div class="form-group">
                <label>Catatan Lain</label>
                <input type="text" name="catatan_lain" class="form-control" value="<?= htmlspecialchars($data['catatan_lain']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="databerkasdigital.php" class="btn btn-default">Batal</a>
        </form>
    </div>
</body>

</html>