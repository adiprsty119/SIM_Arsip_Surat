<?php
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id_berkas = $_GET['id'];
    $stmt = $db->prepare("SELECT file_path FROM tb_berkasdigital WHERE id_berkas = ?");
    $stmt->bind_param("i", $id_berkas);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $file_path = '../../berkas/' . $data['file_path'];
        $stmt_delete = $db->prepare("DELETE FROM tb_berkasdigital WHERE id_berkas = ?");
        $stmt_delete->bind_param("i", $id_berkas);

        if ($stmt_delete->execute()) {
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            echo "<script>
                    alert('Data dan file berhasil dihapus');
                    window.location='../databerkasdigital.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus data');
                    window.location='../databerkasdigital.php';
                  </script>";
        }
        $stmt_delete->close();
    } else {
        echo "<script>
                alert('Data tidak ditemukan');
                window.location='../databerkasdigital.php';
              </script>";
    }
    $stmt->close();
} else {
    echo "<script>
            alert('ID tidak valid');
            window.location='../databerkasdigital.php';
          </script>";
}
