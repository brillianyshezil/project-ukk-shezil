<?php
if (isset($_GET['url']))
{
    $url=$_GET['url'];

    switch($url)
    {
        case 'tulis_pengaduan';
        include 'tulis_pengaduan.php';
        break;

        case 'lihat_pengaduan';
        include 'lihat_pengaduan.php';
        break;

        case 'detail_pengaduan';
        include 'detail_pengaduan.php';
        break;

        case 'lihat_tanggapan';
        include 'lihat_tanggapan.php';
        break;

    }
}
else {
    ?>
    <!-- Tambahkan link font dan ikon di bagian head -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <div style="font-family: 'Nunito', sans-serif; background-color: #f8f9fc; padding: 50px 20px;">
        <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 30px; text-align: center;">
            <h2 style="color: #4e73df; font-weight: 700;"><i class="fas fa-user-circle"></i> Selamat Datang!</h2>
            <p style="margin: 15px 0; font-size: 16px; color: #5a5c69;">Aplikasi Pelaporan Pengaduan Masyarakat (APPM)</p>
            <p style="margin: 15px 0; font-size: 14px; color: #858796;">
                Aplikasi ini dibuat untuk melaporkan pelanggaran yang terjadi pada lingkungan masyarakat.
            </p>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #e3e6f0;">
            <div style="margin-top: 15px;">
                <h4 style="color: #1cc88a; font-weight: 600;">Anda Login Sebagai:</h4>
                <h2 style="margin: 10px 0; color: #20c997; font-weight: 800;"><i class="fas fa-user"></i> <?php echo $_SESSION['nama']; ?></h2>
            </div>
        </div>
    </div>
    <?php
}
?>
