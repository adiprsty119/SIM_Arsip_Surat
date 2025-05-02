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
        <th>Nama Dokumen</th>
        <th>Kategori</th>
        <th>Tanggal Upload</th>
        <th>File</th>
        <th>Keterangan</th>
</tr>";

$query = mysqli_query($db, "SELECT * FROM tb_berkasdigital");
$no = 1;
while ($data = mysqli_fetch_array($query)) {
    echo "<tr>
        <td>{$no}</td>
        <td>{$data['nip']}</td>
        <td>{$data['nama_dokumen']}</td>
        <td>{$data['kategori_dokumen']}</td>
        <td>{$data['tanggal_upload']}</td>
        <td>{$data['file_path']}</td>
        <td>{$data['keterangan']}</td>
    </tr>";
    $no++;
}
echo "</table>";
