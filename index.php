<?php

session_start();
if (!isset($_SESSION['level'])) {
    header("Location: pages/autentikasi/login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
} 

require 'pages/function.php';


$no = 1;
$siswa = query("SELECT * FROM siswa");


if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"?>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include "inc/navbar.php"?>

  <!-- Main Sidebar Container -->
  <?php include "inc/sidebar.php"?>

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
                <h3 class="card-title">Daftar Pelajar</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Paket</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach ($siswa as $row): ?>
					<tr>
						<td><?= $no ?></td>
						<td>K00<?= $row["id"]; ?></td>
						<td><?= $row["nama"]; ?></td>
						
						<?php
							$id_kelas = $row['id_kelas'];
							$kelas = query("SELECT nama_kelas from kelas where id = $id_kelas");
							foreach ($kelas as $rowkelas) :
						?>

						<td><?= $rowkelas["nama_kelas"]; ?> </td>
						<td><?= $row["paket"]; ?></td>
						<?php endforeach; ?>
						<td>
							<a class="btn btn-primary" href="ubah.php?id=<?= $row["id"];?>">edit</a>
							<a class="btn btn-danger" href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('hapus?');">hapus</a>
						</td>
						<?php endforeach; ?>
					</tr>
          <?php $no ++; ?>
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

<?php include "inc/script.php"  ?>
</body>
</html>
