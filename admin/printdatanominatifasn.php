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
                size: A4 landscape;
                margin: 20mm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 6px;
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

    <h3 style="text-align:center; margin-bottom: 20px; font-size: 1rem;">DATA NOMINATIF ASN</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pangkat Golongan</th>
                <th>Pangkat TMT</th>
                <th>Nama Jabatan Eselon</th>
                <th>Jabatan Eselon TMT</th>
                <th>Bulan Masa Kerja</th>
                <th>Tahun Masa Kerja</th>
                <th>Diklat yang diikuti</th>
                <th>Bulan Diklat</th>
                <th>Tahun Diklat</th>
                <th>Jumlah Jam Diklat yang diikuti</th>
                <th>Asal</th>
                <th>Tingkat Pendidikan Terakhir</th>
                <th>Jurusan Pada Tingkat Pendidikan Terakhir</th>
                <th>Nama Instansi/Perguruan Tinggi</th>
                <th>Tahun Lulus Pendidikan Terakhir</th>
                <th>Nomor Ijazah Pendidikan Terakhir</th>
                <th>Karpeg</th>
                <th>KGB</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM nominatif_asn");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>" . htmlspecialchars($data['nip']) . "</td>
                    <td>" . htmlspecialchars($data['nama_lengkap']) . "</td>
                    <td>" . htmlspecialchars($data['tempat_lahir']) . "</td>
                    <td>" . htmlspecialchars($data['tanggal_lahir']) . "</td>
                    <td>" . htmlspecialchars($data['usia']) . "</td>
                    <td>" . htmlspecialchars($data['jenis_kelamin']) . "</td>
                    <td>" . htmlspecialchars($data['agama']) . "</td>
                    <td>" . htmlspecialchars($data['pangkat_golongan']) . "</td>
                    <td>" . htmlspecialchars($data['pangkat_tmt']) . "</td>
                    <td>" . htmlspecialchars($data['nama_jabatan_eselon']) . "</td>
                    <td>" . htmlspecialchars($data['jabatan_eselon_tmt']) . "</td>
                    <td>" . htmlspecialchars($data['bulan_masakerja']) . "</td>
                    <td>" . htmlspecialchars($data['tahun_masakerja']) . "</td>
                    <td>" . htmlspecialchars($data['nama_diklat']) . "</td>
                    <td>" . htmlspecialchars($data['bulan_diklat']) . "</td>
                    <td>" . htmlspecialchars($data['tahun_diklat']) . "</td>
                    <td>" . htmlspecialchars($data['jumlah_jam_diklat']) . "</td>
                    <td>" . htmlspecialchars($data['asal']) . "</td>
                    <td>" . htmlspecialchars($data['tingkat_pendidikan_terakhir']) . "</td>
                    <td>" . htmlspecialchars($data['jurusan']) . "</td>
                    <td>" . htmlspecialchars($data['instansi_sekolah']) . "</td>
                    <td>" . htmlspecialchars($data['tahun_lulus_pendidikan']) . "</td>
                    <td>" . htmlspecialchars($data['no_ijazah']) . "</td>
                    <td>" . htmlspecialchars($data['karpeg']) . "</td>
                    <td>" . htmlspecialchars($data['kgb']) . "</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>