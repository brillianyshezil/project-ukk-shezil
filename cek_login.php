<?php
require 'koneksi.php'; // Pastikan koneksi ke database berhasil

$user = $_POST['username'];
$pass = $_POST['password'];

// Query untuk cek username dan password
$sql = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$user' AND password='$pass'");

// Cek apakah data ditemukan
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);
    session_start();
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['nik'] = $data['nik'];
    header('Location: masyarakat.php'); // Redirect ke halaman masyarakat
    exit();
} else {
    echo "<script>
        alert('Username atau Password tidak ditemukan');
        window.location.href='index.php';
    </script>";
}
?>
