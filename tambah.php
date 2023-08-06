<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}

require 'function.php';

    $kode_siswa = query("SELECT * FROM siswa ORDER BY id DESC LIMIT 1")[0];
    $kelas = query("SELECT * FROM kelas");

    if (isset($_POST["submit"])) {

        if (tambah($_POST) > 0) {
            echo "
        <script>
            alert('siswa berhasil di tambahkan')
            document.location.href= 'indeks.php'
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
                    <input type="text" name="kode" id="kode" value="K00<?= $kode_siswa['id'] + 1; ?>" readonly>
                </li>
                <li>
                    <label for="nama">nama :</label>
                    <input type="text" name="nama" id="nama" required>
                </li>
                <li>
                <label for="kelas">kelas :</label>
                    <select name="kelas" id="kelas">
                        <?php foreach ($kelas as $row) : ?>
                            <option value= "<?=$row['id'];?> "><?= $row["nama_kelas"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li>
                    <label for="paket">paket :</label>
                    <select name="paket" id="paket">
                            <option value="1 tahun">1 tahun</option>
                            <option value="2 tahun">2 tahun</option>
                            <option value="3 tahun">3 tahun</option>
                    </select>
                </li>
            </ul>
            <button type="submit" name="submit">tambah</button>
        </form>
        <br>
        <a href="indeks.php">kembali</a>
    </body>

    </html>