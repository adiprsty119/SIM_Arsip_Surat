<?php
include '../koneksi/koneksi.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=nominatif_asn.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border='0' width='100%'>";
echo "<tr><td colspan='10' align='center'><b>BIRO PEMERINTAHAN, OTSUS DAN KESRA</b></td></tr>";
echo "<tr><td colspan='10' align='center'><b>SETDA PROVINSI PAPUA SELATAN</b></td></tr>";
echo "<tr><td colspan='10' align='center'>Jl. Alamat No. 1, Merauke - Papua Selatan</td></tr>";
echo "<tr><td colspan='10'>&nbsp;</td></tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>
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
</tr>";

$query = mysqli_query($db, "SELECT * FROM nominatif_asn");
$no = 1;
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
echo "</table>";
