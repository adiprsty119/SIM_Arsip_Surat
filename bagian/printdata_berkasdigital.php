<?php
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Data Nominatif ASN</title>
    <style>
        @media print {
            @page {
                size: A4 potrait;
                margin: 20mm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            padding: 10px;
        }

        .kop {
            display: flex;
            flex-direction: row;
            justify-content: center;
            text-align: center;
            font-size: 1rem;
            margin-bottom: 20px;
            gap: 3rem;
        }

        .kop h2,
        .kop h3 {
            margin: 0;
        }

        .kop p {
            margin: 5px 0;
        }

        .kop .logo-pemprov img {
            width: 5.5rem;
        }

        .kop .logo-biro img {
            width: 5rem;
        }

        hr {
            border: 1px solid #000;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: center;
        }

        td {
            padding: 6px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="kop">
        <div class="logo-pemprov">
            <img src="../img/logo_PPS.png">
        </div>
        <div class="nomenklatur">
            <h2>BIRO PEMERINTAHAN, OTSUS DAN KESRA</h2>
            <h3>SETDA PROVINSI PAPUA SELATAN</h3>
            <p>Jl. Alamat No. 1, Merauke - Papua Selatan</p>
        </div>
        <div class="logo-biro">
            <img src="../img/logo_biro.png">
        </div>
    </div>
    <hr>

    <h3 style="text-align:center; margin-bottom: 20px; font-size: 1rem;">DATA BERKAS DIGITAL</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Dokumen</th>
                <th>Kategori Dokumen</th>
                <th>Tanggal Upload</th>
                <th>File</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM tb_berkasdigital");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>" . htmlspecialchars($data['nip']) . "</td>
                    <td>" . htmlspecialchars($data['nama_dokumen']) . "</td>
                    <td>" . htmlspecialchars($data['kategori_dokumen']) . "</td>
                    <td>" . htmlspecialchars($data['tanggal_upload']) . "</td>
                    <td>" . htmlspecialchars($data['file_path']) . "</td>
                    <td>" . htmlspecialchars($data['keterangan']) . "</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>