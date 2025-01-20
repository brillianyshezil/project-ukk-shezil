<?php
require '../koneksi.php';
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan ID
$sql = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id'");

// Periksa apakah query berhasil
if ($sql) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        window.location='admin.php?url=lihat_petugas';
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus: " . mysqli_error($koneksi) . "');
        window.location='admin.php?url=lihat_petugas';
    </script>";
}
?>
