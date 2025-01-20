<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "appm");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];

// Query untuk menyimpan data
$query = "INSERT INTO masyarakat (nik, nama, username, password, telp) 
          VALUES ('$nik', '$nama', '$username', '$password', '$telp')";
$result = mysqli_query($koneksi, $query);

// Cek hasil query dan tampilkan alert
if ($result) {
    // Jika berhasil, tampilkan alert dan redirect ke halaman login
    echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'index.php';</script>";
} else {
    // Jika gagal, tampilkan error
    echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.location.href = 'index.php';</script>";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
