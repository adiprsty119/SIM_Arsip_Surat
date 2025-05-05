<?php
session_start();
include "../koneksi/koneksi.php";
include "login/ceksession.php";

if (!isset($_GET['id_riwayat']) || empty($_GET['id_riwayat'])) {
    echo "<script>alert('ID tidak valid'); window.location='datakgb-kp.php';</script>";
    exit;
}

$id = intval($_GET['id_riwayat']);
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_riwayat_kgp_kp WHERE id_riwayat='$id'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data KGB-KP</title>
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
    </style>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Edit Data KGB-KP</h3>
        <form action="proses/updatedata_kgb-kp.php" method="POST" enctype="multipart/form-data">

            <!-- Hidden field untuk ID -->
            <input type="hidden" name="id_riwayat" value="<?= $data['id_riwayat']; ?>">

            <!-- NIP -->
            <label for="nip">NIP</label>
            <select name="nip" class="form-control" required>
                <option value="">Pilih NIP Pegawai</option>
                <?php
                $nip_q = mysqli_query($db, "SELECT * FROM nominatif_asn");
                while ($nip_data = mysqli_fetch_assoc($nip_q)) {
                    $selected = ($nip_data['nip'] == $data['nip']) ? 'selected' : '';
                    echo "<option value='{$nip_data['nip']}' $selected>{$nip_data['nip']} - {$nip_data['nama']}</option>";
                }
                ?>
            </select>

            <!-- Jenis Kenaikan -->
            <label for="jenis_kenaikan">Jenis Kenaikan</label>
            <select name="jenis_kenaikan" class="form-control" required>
                <option value="">Pilih Jenis Kenaikan</option>
                <option value="KGB" <?= $data['jenis_kenaikan'] == 'KGB' ? 'selected' : '' ?>>KGB</option>
                <option value="KP" <?= $data['jenis_kenaikan'] == 'KP' ? 'selected' : '' ?>>KP</option>
            </select>

            <!-- Pangkat Sebelumnya -->
            <label for="pangkat_gol_sebelumnya">Pangkat Sebelumnya</label>
            <input class="input" type="text" name="pangkat_gol_sebelumnya" value="<?= $data['pangkat_gol_sebelumnya']; ?>" class="form-control" required>

            <!-- Pangkat Sekarang -->
            <label style="margin-top: 1.5rem;" for="pangkat_gol_sekarang">Pangkat Sekarang</label>
            <input class="input" type="text" name="pangkat_gol_sekarang" value="<?= $data['pangkat_gol_sekarang']; ?>" class="form-control" required>

            <!-- TMT Kenaikan -->
            <label style="margin-top: 1.5rem;" for="tmt_kenaikan">TMT Kenaikan</label>
            <input class="input" type="date" name="tmt_kenaikan" value="<?= $data['tmt_kenaikan']; ?>" class="form-control" required>

            <!-- Nomor SK -->
            <label style="margin-top: 1.5rem;" for="no_sk">Nomor SK</label>
            <input class="input" type="text" name="no_sk" value="<?= $data['no_sk']; ?>" class="form-control" required>

            <!-- Tanggal SK -->
            <label style="margin-top: 1.5rem;" for="tanggal_sk">Tanggal SK</label>
            <input class="input" type="date" name="tanggal_sk" value="<?= $data['tanggal_sk']; ?>" class="form-control" required>

            <!-- Penandatanganan SK -->
            <label style="margin-top: 1.5rem;" for="penandatanganan_sk">Penandatanganan SK</label>
            <input class="input" type="text" name="penandatanganan_sk" value="<?= $data['penandatanganan_sk']; ?>" class="form-control" required>

            <!-- Upload File SK -->
            <label style="margin-top: 1.5rem;" for="file_sk">Upload File SK</label>
            <div class="mb-2">
                <?php if (!empty($data['file_sk'])): ?>
                    <a href="../../files_sk/<?= $data['file_sk']; ?>" target="_blank">Lihat File Lama</a>
                <?php endif; ?>
            </div>
            <input class="input" type="file" name="file_sk" class="form-control">

            <!-- Status Proses -->
            <label style="margin-top: 1.5rem;" for="status_proses">Status Proses</label>
            <select name="status_proses" class="form-control" required>
                <option value="">Pilih Jenis Status</option>
                <option value="Sudah" <?= $data['status_proses'] == 'Sudah' ? 'selected' : '' ?>>Sudah</option>
                <option value="Belum" <?= $data['status_proses'] == 'Belum' ? 'selected' : '' ?>>Belum</option>
                <option value="Ditolak" <?= $data['status_proses'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
            </select>

            <!-- Tombol Simpan -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="datakgb-kp.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>