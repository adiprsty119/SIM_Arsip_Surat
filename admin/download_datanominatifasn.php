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
        <td>{$data['usia']}</td>
        <td>{$data['jenis_kelamin']}</td>
        <td>{$data['agama']}</td>
        <td>{$data['pangkat_golongan']}</td>
        <td>{$data['pangkat_tmt']}</td>
        <td>{$data['nama_jabatan_eselon']}</td>
        <td>{$data['jabatan_eselon_tmt']}</td>
        <td>{$data['bulan_masakerja']}</td>
        <td>{$data['tahun_masakerja']}</td>
        <td>{$data['nama_diklat']}</td>
        <td>{$data['bulan_diklat']}</td>
        <td>{$data['tahun_diklat']}</td>
        <td>{$data['jumlah_jam_diklat']}</td>
        <td>{$data['asal']}</td>
        <td>{$data['tingkat_pendidikan_terakhir']}</td>
        <td>{$data['jurusan']}</td>
        <td>{$data['instansi_sekolah']}</td>
        <td>{$data['tahun_lulus_pendidikan']}</td>
        <td>{$data['no_ijazah']}</td>
        <td>{$data['karpeg']}</td>
        <td>{$data['kgb']}</td>
    </tr>";
    $no++;
}
echo "</table>";
