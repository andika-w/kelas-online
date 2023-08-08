<?php
session_start();
if (isset($_SESSION['level'])) {
	header("location: indeks.php");
}	

require 'function.php';



if (isset($_POST["login"])) {

    $username = htmlspecialchars($_POST["username"]);
    $password = md5($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) > 0 ) {

        $row = mysqli_fetch_assoc($result);

        if ($row['level'] == "admin") { 
            $_SESSION["username"] = $username;
            $_SESSION["level"] = "admin";
            header("location: indeks.php");
            
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

<!DOCTYPE html>
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
</html>