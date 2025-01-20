<?php
$koneksi = mysqli_connect("localhost", "root", "", "appm");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
