<?php
session_start();
if (isset($_SESSION['level'])) {
	header("location:../../index.php");
}	

require '../function.php';



if (isset($_POST["login"])) {

    $username = htmlspecialchars($_POST["username"]);
    $password = md5($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) > 0 ) {

        $row = mysqli_fetch_assoc($result);

        if ($row['level'] == "admin") { 
            $_SESSION["username"] = $username;
            $_SESSION["level"] = "admin";
            header("location:../../index.php");
            
        } 
        elseif ($row['level'] == "user") {
            $_SESSION["username"] = $username;
            $_SESSION["level"] = "user";
            header("location: user/halaman_user.php");
            
        }
        } else {
            echo "<script>alert('Username atau Password Salah');</script>";
                    }

    }


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h2>login sebagai admin</h2>
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>
            <li>
                <button type="submit" name="login">
                    login
                </button>
            </li>
        </ul>
    </form>
    <a href="regis.php">belum ada akun ?</a>
</body>
</html> -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Kelas</b>Online</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <a href="regis.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
