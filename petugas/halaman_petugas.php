<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    switch ($url) {

        case 'verifikasi_pengaduan':
            include 'verifikasi_pengaduan.php';
            break;
        case 'detail_pengaduan':
            include 'detail_pengaduan.php';
            break;
    }
} else {
    // Include koneksi database
    require '../koneksi.php';

    // Jalankan query untuk mendapatkan jumlah laporan dengan status '0'
    $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status = '0'");
    $cek = mysqli_num_rows($sql); // Hitung jumlah laporan

    ?>
    <!-- Tambahkan link font dan ikon di bagian head -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <div style="font-family: 'Nunito', sans-serif; background-color: #f8f9fc; padding: 50px 20px;">
        <div style="max-width: 800px; margin: 0 auto;">
            <!-- Card Selamat Datang -->
            <div style="background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 30px; text-align: center; margin-bottom: 20px;">
                <h2 style="color: #4e73df; font-weight: 700;"><i class="fas fa-user-circle"></i> Selamat Datang!</h2>
                <hr style="margin: 20px 0; border: none; border-top: 1px solid #e3e6f0;">
                <h4 style="color: #1cc88a; font-weight: 600;">Anda Login Sebagai:</h4>
                <h2 style="margin: 10px 0; color: #20c997; font-weight: 800;"><i class="fas fa-user"></i> <?php echo $_SESSION['nama']; ?></h2>
            </div>

            <!-- Card Statistik -->
            <div class="row" style="display: flex; gap: 20px;">
                <!-- Card Laporan Pengaduan -->
                <div style="flex: 1; background: #fff; border-left: 4px solid #4e73df; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <div style="display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <div style="font-size: 12px; font-weight: bold; text-transform: uppercase; color: #4e73df; margin-bottom: 5px;">Laporan Pengaduan:</div>
                            <div style="font-size: 24px; font-weight: bold; color: #5a5c69;">Ada <?php echo $cek; ?> Laporan dari Masyarakat</div>
                        </div>
                        <div>
                            <i class="fas fa-comments fa-4x" style="color: #e3e6f0;"></i>
                            <span class="badge badge-danger badge-counter"><?php echo $cek; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
