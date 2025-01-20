<?php
// Memulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pastikan koneksi database tersedia
require '../koneksi.php';

// Cek apakah session nik sudah ada
$sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'");

// Cek apakah query berhasil
if (!$sql) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Cek apakah ada data yang ditemukan
$jumlah_data = mysqli_num_rows($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data Pengaduan</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <div class="container-fluid p-0" style="margin-left: 1rem; margin-right: 1rem;">
                    <!-- Tabel Data Pengaduan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($jumlah_data > 0): ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>NIK</th>
                                                <th>Isi Laporan</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($data = mysqli_fetch_array($sql)): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($data['id_pengaduan']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['tgl_pengaduan']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['nik']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['isi_laporan']); ?></td>
                                                    <td>
                                                        <?php if (!empty($data['foto'])): ?>
                                                            <?php echo htmlspecialchars($data['foto']); ?>
                                                        <?php else: ?>
                                                            Tidak ada foto
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td>
                                                        <a href="detail_pengaduan.php?id=<?php echo htmlspecialchars($data['id_pengaduan']); ?>" class="btn btn-info btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Detail & Veriifikasi</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-center">Tidak ada data pengaduan.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
