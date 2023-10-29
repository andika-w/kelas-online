
<?php

session_start();
if (!isset($_SESSION['level'])) {
    header("Location: pages/autentikasi/login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}

require '../function.php';


$no = 1;
$kelas = query("SELECT * FROM kelas");


if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "../../inc/head.php"?>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include "../../inc/navbar.php"?>

  <!-- Main Sidebar Container -->
  <?php include "../../inc/sidebar.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Pelajar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10">
            <!-- /.card -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Daftar Kelas</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="b	tn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody><?php foreach ($kelas as $row): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["kode"]; ?></td>
                <td><?= $row["nama_kelas"]; ?></td>
                <td>Rp.<?= $row["harga"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"];?>">edit</a>
                    <a href="hapus_kelas.php?id=<?= $row["id"];?>" onclick="return confirm('hapus?');">hapus</a>
                </td>
            </tr>
            <?php $no ++; ?>
            <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php include "../../../inc/script.php"  ?>
</body>
</html>
