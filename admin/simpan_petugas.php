<?php
require '../koneksi.php';

// Ambil data dari form
$nama = $_POST['nama_petugas'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];

// Query untuk menyimpan data ke tabel 'petugas'
$sql = mysqli_query($koneksi, "INSERT INTO petugas(nama_petugas, username, password, telp, level) 
    VALUES('$nama', '$user', '$pass', '$telp', '$level')");

// Periksa apakah query berhasil
if ($sql) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        window.location='admin.php?url=lihat_petugas';
    </script>";
} else {
    echo "<script>
        alert('Data Gagal Disimpan: " . mysqli_error($koneksi) . "');
        window.location='admin.php?url=lihat_petugas';
    </script>";
}
?>
