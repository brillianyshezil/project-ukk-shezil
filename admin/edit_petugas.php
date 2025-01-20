<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Data Petugas</title>
  
  <!-- Custom fonts and styles -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }
  </style>
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
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Interface</div>
      <li class="nav-item">
        <a class="nav-link" href="?url=verifikasi_pengaduan">
          <i class="fas fa-check"></i>
          <span>Verifikasi Pengaduan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?url=lihat_petugas">Data Petugas</a>
            <a class="collapse-item" href="#">Data Masyarakat</a>
            <a class="collapse-item" href="#">Data Laporan</a>
            <a class="collapse-item" href="#">Data Tanggapan</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Laporan Petugas</a>
            <a class="collapse-item" href="#">Laporan Masyarakat</a>
            <a class="collapse-item" href="#">Laporan Pengaduan</a>
            <a class="collapse-item" href="#">Laporan Tanggapan</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span>
        </a>
      </li>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h1 class="h3 mb-0 text-gray-800">Edit Data Petugas</h1>
        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">
          <div class="card shadow">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Petugas</h6>
            </div>
            <div class="card-body">
              <a href="javascript:history.back()" class="btn btn-info btn-icon-split mb-3">
                <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                <span class="text">Kembali</span>
              </a>
              <?php 
              require '../koneksi.php';
              $id = $_GET['id'];
              $sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
              $data = mysqli_fetch_array($sql);

              if ($data) { ?>
                <form action="update_petugas.php" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label>ID Petugas</label>
                    <input type="text" name="id_petugas" value="<?= $data['id_petugas']; ?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="<?= $data['nama_petugas']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $data['username']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Telp</label>
                    <input type="text" name="telp" value="<?= $data['telp']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                      <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                      <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : ''; ?>>Petugas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Edit Data" class="btn btn-primary">
                    <input type="reset" value="Kosongkan" class="btn btn-warning">
                  </div>
                </form>
              <?php } else {
                echo "<p>Data tidak ditemukan.</p>";
              } ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Brilliany Shezil</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- End of Content Wrapper -->
  </div>

  <!-- Scripts -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>

</body>
</html>
