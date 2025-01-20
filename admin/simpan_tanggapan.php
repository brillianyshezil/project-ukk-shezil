<?php
require '../koneksi.php';

// Mulai sesi jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validasi apakah id_pengaduan tersedia
if (!isset($_POST['id_pengaduan']) || empty($_POST['id_pengaduan'])) {
    die("ID pengaduan tidak ditemukan.");
}

// Ambil data dari form
$id_pengaduan = $_POST['id_pengaduan'];
$tgl = $_POST['tgl_tanggapan'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$st = 'selesai';

// Insert ke tabel tanggapan
$sql = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) 
VALUES ('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')");

// Update status di tabel pengaduan
$update_st = mysqli_query($koneksi, "UPDATE pengaduan SET status='$st' WHERE id_pengaduan='$id_pengaduan'");

// Cek apakah query berhasil
if ($sql && $update_st) {
    ?>
    <script type="text/javascript">
        alert('Laporan Sudah Ditanggapi');
        window.location = "admin.php?url=verifikasi_pengaduan";
    </script>
    <?php
} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}
?>
