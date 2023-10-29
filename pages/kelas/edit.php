<?php
require '../function.php';
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: ../user/halaman_user.php");
}
$id = $_GET["id"];

$ssw = query("SELECT * FROM kelas WHERE id = $id")[0];



if (isset($_POST["submit"])) {

    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('berhasil di ubah')
            document.location.href= 'kelas.php'
        </script>
        ";
    } else {
        echo
        mysqli_error($conn);
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
        <h3>ubah data</h3>
        <input type="hidden" name="id" value="<?= $ssw["id"]; ?>">
        <ul>
            <li>
                <label for="kode">kode :</label>
                <input type="text" name="kode" id="kode" required value="<?= $ssw["kode"]; ?>" readonly>
            </li>
            <li>
                <label for="kelas">kelas :</label>
                <input type="text" name="kelas" id="kelas" required value="<?= $ssw["nama_kelas"]; ?>">
            </li>
            <li>
                <label for="harga">harga :</label>
                <input type="text" name="harga" id="harga" required value="<?=$ssw["harga"]; ?>">
            </li>
            
        </ul>
        <button type="submit" name="submit">ubah</button>
    </form>
    <br>
    <a href="kelas.php">kembali</a>
</body>

</html>