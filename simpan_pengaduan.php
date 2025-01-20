<?php
require 'koneksi.php'; // Pastikan file ini menginisialisasi koneksi $koneksi
$tgl = date('Y/m/d');
$nik = $_POST['nik'];
$isi = $_POST['isi_laporan'];
$ft = $_FILES['foto']['name'];
$file = $_FILES['foto']['tmp_name'];
$st = 0;

// Pastikan $koneksi didefinisikan di 'koneksi.php'
$sql = mysqli_query($koneksi, "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES ('$tgl', '$nik', '$isi', '$ft', '$st')");

move_uploaded_file($file, "foto/" . $ft);

if ($sql) {
    ?>
    <script type="text/javascript">
        alert('Data berhasil disimpan, Terimakasih sudah menulis laporan');
        window.location = "masyarakat.php";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert('Data gagal disimpan, silakan coba lagi.');
        window.location = "tulis_pengaduan.php";
    </script>
    <?php
}
?>
