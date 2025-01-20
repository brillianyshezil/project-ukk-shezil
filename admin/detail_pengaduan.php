<?php
session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script type='text/javascript'>
            alert('Anda Belum Login');
            window.location.href = 'index.php'; // Ganti dengan halaman login
          </script>";
    exit();
}

require '../koneksi.php';

// Cek apakah ID pengaduan ada di URL dan valid
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('<p>ID pengaduan tidak ditemukan.</p>');
}

// Amankan ID pengaduan
$id_pengaduan = mysqli_real_escape_string($koneksi, $_GET['id']);

// Jalankan query untuk mengambil data pengaduan berdasarkan ID
$sql = "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
$result = mysqli_query($koneksi, $sql);

// Cek apakah query berhasil dan data ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    die('<p>Data pengaduan tidak ditemukan.</p>');
}

$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APPM - Detail Pengaduan</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(180deg, #6a11cb 10%, #2575fc 100%);">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="masyarakat.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-keyboard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APPM</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="petugas.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Interface</div>
            <li class="nav-item">
                <a class="nav-link" href="?url=verifikasi_pengaduan">
                    <i class="fas fa-edit"></i>
                    <span>Verifikasi Pengaduan</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h1 style="font-size: clamp(1.8rem, 2.5vw, 3rem);">Aplikasi Pelaporan Pengaduan Masyarakat</h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h6>
                        </div>
                        <div class="card-body">
                        <a href="javascript:history.back()" class="btn btn-info btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>

                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label>Tanggal Pengaduan</label>
                                <input type="text" name="tgl_pengaduan" value="<?php echo htmlspecialchars($data['tgl_pengaduan']); ?>" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tulis Laporan</label>
                                <textarea class="form-control" rows="7" name="isi_laporan" readonly><?php echo htmlspecialchars($data['isi_laporan']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Bukti Foto</label><br>
                                <?php if (!empty($data['foto']) && file_exists("../foto/" . $data['foto'])): ?>
                                    <img src="../foto/<?php echo htmlspecialchars($data['foto']); ?>" width="300" alt="Bukti Foto">
                                <?php else: ?>
                                    <p class="text-danger">Foto tidak tersedia</p>
                                <?php endif; ?>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->

           
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Brilliany Shezil</span>
                    </div>
                </div>
            </footer>  
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>
