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
            document.location.href= 'kelas.php'
        </script>
        ";
        } else {
            echo mysqli_error($conn);
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
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
    </body>

    </html>