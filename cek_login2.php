<?php
require 'koneksi.php'; // Pastikan koneksi ke database berhasil

// Ambil data dari form
$user = $_POST['username'];
$pass = $_POST['password'];

// Amankan data input untuk mencegah SQL Injection
$user = mysqli_real_escape_string($koneksi, $user);
$pass = mysqli_real_escape_string($koneksi, $pass);

// Query untuk cek username dan password
$sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$user' AND password='$pass'");

// Cek apakah data ditemukan
$cek = mysqli_num_rows($sql);

if ($cek > 0) { // jika ditemukan
    $data = mysqli_fetch_array($sql);

    session_start(); // Mulai sesi
    $_SESSION['id_petugas'] = $data['id_petugas']; // Gunakan id_petugas jika itu nama kolomnya
    $_SESSION['user'] = $user;
    $_SESSION['nama'] = $data['nama_petugas'];
    $_SESSION['level'] = $data['level'];

    // Redirect berdasarkan level
    if ($data['level'] == "admin") {
        header('Location: admin/admin.php'); // Redirect ke halaman admin
    } else if ($data['level'] == "petugas") {
        header('Location: petugas/petugas.php'); // Redirect ke halaman petugas
    }
    exit();
} else {
    // Jika username atau password salah
    echo "<script>
        alert('Username atau Password tidak ditemukan');
        window.location.href='index2.php';
    </script>";
}
?>
