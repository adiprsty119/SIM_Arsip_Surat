<?php
session_start();

require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');
$koneksi = new mysqli("localhost", "root", "", "db_surat");

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Cek apakah user sudah login
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit();
}

// Query data berita
$sql = "SELECT judul, deskripsi, tanggal, penulis FROM berita ORDER BY tanggal DESC";
$result = $koneksi->query($sql);

// Inisialisasi PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistem Berita');
$pdf->SetTitle('Daftar Berita');
$pdf->SetHeaderData('', '', 'Daftar Berita', '');
$pdf->setHeaderFont(array('dejavusans', '', 12));
$pdf->setFooterFont(array('dejavusans', '', 10));
$pdf->SetMargins(15, 20, 15);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);
$pdf->SetAutoPageBreak(TRUE, 25);
$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();

// Bangun isi HTML
$html = '<h2 style="text-align:center;">Daftar Berita</h2><hr>';

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $judul = htmlspecialchars($row["judul"]);
    $tanggal = htmlspecialchars($row["tanggal"]);
    $deskripsi = nl2br(htmlspecialchars($row["deskripsi"]));
    $penulis = htmlspecialchars($row["penulis"]);

    $html .= "<h3>{$judul}</h3>";
    $html .= "<p><strong>Tanggal:</strong> {$tanggal}</p>";
    $html .= "<p>{$isi}</p><hr>";
  }
} else {
  $html .= '<p>Tidak ada berita ditemukan.</p>';
}

// Tulis HTML ke PDF dan output
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('daftar_berita.pdf', 'D'); // Force download

$koneksi->close();
