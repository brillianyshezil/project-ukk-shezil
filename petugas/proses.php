<?php
require '../koneksi.php';

// Pastikan pengguna sudah login
session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script type='text/javascript'>
            alert('Anda Belum Login');
            window.location.href = 'index.php'; // Ganti dengan halaman login
          </script>";
    exit();
}

// Cek apakah ID pengaduan ada di URL dan valid
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_pengaduan = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Perbarui status pengaduan menjadi 'proses'
    $sql = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id_pengaduan'";
    if (mysqli_query($koneksi, $sql)) {
        // Redirect ke halaman verifikasi setelah berhasil
        header('Location: petugas.php?url=verifikasi_pengaduan');
        exit();
    } else {
        echo "<script>alert('Gagal memperbarui status pengaduan');</script>";
    }
} else {
    echo "<script>alert('ID pengaduan tidak valid');</script>";
}
?>
