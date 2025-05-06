<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak valid'); window.location='daftarberita.php';</script>";
    exit;
}

$id_berita = intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM berita WHERE id='$id_berita'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
            margin-bottom: 50px;
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

        select.form-control,
        input {
            width: 100%;
            height: 4.5rem;
            padding: 12px 14px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            /* appearance: none; */
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
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

        a.btn-secondary {
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #dc3545;
            /* Merah bootstrap */
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.btn-secondary:hover {
            background-color: #c82333;
            /* Merah lebih gelap saat hover */
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
            transform: scale(1.03);
        }

        /* Styling untuk elemen gambar berita */
        .image {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .current-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .current-image p {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Edit Berita</h3>
        <form action="proses/updateberita.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="image">
                <?php if (!empty($data['gambar'])): ?>
                    <div class="current-image">
                        <p>Gambar sebelumnya:</p>
                        <img src="images/<?= htmlspecialchars($data['gambar']); ?>" alt="Gambar Berita" width="200">
                    </div>
                <?php endif; ?>
                <div class="current-image" id="preview-container" style="display:none;">
                    <p>Upload gambar saat ini:</p>
                    <img id="preview-image" src="#" alt="Preview Gambar Baru" width="200">
                </div>
            </div>

            <label for="gambar">Upload Gambar Baru</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">

            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['judul']); ?>" required>

            <label for="deskripsi">Deskripsi Berita</label>
            <textarea class="form-control" name="deskripsi" rows="5" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>

            <label for="tanggal_terbit">Tanggal Terbit</label>
            <input type="date" class="form-control" name="tanggal_terbit" value="<?= htmlspecialchars($data['tanggal']); ?>" required>

            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" name="penulis" value="<?= htmlspecialchars($data['penulis']); ?>" required>

            <!-- Tombol Simpan -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="daftarberita.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("gambar").addEventListener("change", function(event) {
            const input = event.target;
            const previewContainer = document.getElementById("preview-container");
            const previewImage = document.getElementById("preview-image");

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = "block";
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.style.display = "none";
            }
        });
    </script>

</body>

</html>