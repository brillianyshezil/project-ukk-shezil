<?php
require '../koneksi.php';

// Ambil data dari form
$nama = $_POST['nama_petugas'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];
$id = $_POST['id_petugas'];

// Query untuk memperbarui data di tabel 'petugas'
$sql = mysqli_query($koneksi, "UPDATE petugas SET 
    nama_petugas = '$nama', 
    username = '$user', 
    password = '$pass', 
    telp = '$telp', 
    level = '$level' 
    WHERE id_petugas = '$id'");

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
