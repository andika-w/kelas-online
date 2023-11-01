<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: ../user/halaman_user.php");
}
    require '../function.php';

    $kode_siswa = query("SELECT * FROM kelas ORDER BY id DESC LIMIT 1")[0];

    if (isset($_POST["submit"])) {

        if (tambah_kelas($_POST) > 0) {
            echo "
        <script>
            alert('berhasil di tambahkan')
            document.location.href= 'index.php'
        </script>
        ";
        } else {
            echo mysqli_error($conn);
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <?php include "../../inc/head.php" ?>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
    <?php include "../../inc/navbar.php" ?> 

    <?php include "../../inc/sidebar.php" ?> 


    <!-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tambah siswa</title>
    </head>

    <body>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="kode">kode :</label>
                    <input type="text" name="kode" id="kode" value="MP00<?= $kode_siswa['id']+1 ;?>" readonly>
                </li>
                <li>
                    <label for="kelas">kelas :</label>
                    <input type="text" name="kelas" id="kelas"required>
                </li>
                <li>
                    <label for="harga">harga :</label>
                    <input type="text" name="harga" id="harga" required=>
                </li>
            </ul>
            <button type="submit" name="submit">tambah</button>
        </form>
        <br>
        <a href="kelas.php">kembali</a>
    </body> -->
        <!-- Main content -->
    <section class="content-wrapper">
            <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div cla  ss="col-sm-6">
            <h1 class="m-0">Tambah Kelas</h1>
          </div><!-- /.col -->
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Kelas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Masukkan Kelas Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" id="kode" value="MP00<?= $kode_siswa['id']+1 ;?>" autocomplete="off" readonly>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Nama Kelas" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Kelas" autocomplete="off">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->


    </section>
    <!-- /.content -->
    <?php include "../../inc/script.php" ?>
    </html>