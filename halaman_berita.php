<?php
session_start();
include "koneksi/koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM berita WHERE id = $id";
$result = $db->query($sql);

if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
} else {
    echo "Berita tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($data['judul']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_halamanberita.css">
</head>

<body>
    <div class="berita">
        <h1><?= htmlspecialchars($data['judul']) ?></h1>
        <div class="tanggal"><?= date('d M Y', strtotime($data['tanggal'])) ?></div>
        <img src="img/<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['judul']) ?>">
        <p><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>
    </div>
</body>

</html>