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
                size: A4 portrait;
                margin: 20mm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #000;
            padding: 20px;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop h2,
        .kop h3 {
            margin: 0;
        }

        .kop p {
            margin: 5px 0;
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
        <h2>BIRO PEMERINTAHAN, OTSUS DAN KESRA</h2>
        <h3>SETDA PROVINSI PAPUA SELATAN</h3>
        <p>Jl. Alamat No. 1, Merauke - Papua Selatan</p>
    </div>
    <hr>

    <h3 style="text-align:center; margin-bottom: 20px;">DATA NOMINATIF ASN</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Pangkat / Golongan</th>
                <th>TMT Pangkat</th>
                <th>Jabatan</th>
                <th>Pendidikan</th>
                <th>Tahun Lulus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM nominatif_asn");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$data['nip']}</td>
                    <td>{$data['nama_lengkap']}</td>
                    <td>{$data['tempat_lahir']}</td>
                    <td>{$data['tanggal_lahir']}</td>
                    <td>{$data['pangkat_golongan']}</td>
                    <td>{$data['pangkat_tmt']}</td>
                    <td>{$data['nama_jabatan_eselon']}</td>
                    <td>{$data['tingkat_pendidikan_terakhir']}</td>
                    <td>{$data['tahun_lulus_pendidikan']}</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>
