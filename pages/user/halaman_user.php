<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
}
require '../function.php';

$no = 1;
$nok = 1;
$siswa = query("SELECT * FROM siswa");
$kelas = query("SELECT * FROM kelas");

if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kelas online</title>
</head>
<body>
    <a href="../logout.php">logout</a>

    <h2>siswa yang bergabung</h2>
    
    <form action="" method="post">

    <input type="text" name="keyword" autocomplete="off">
    <button type="submit" name="cari">cari</button>

    </form>


        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>no</th>
                <th>kode</th>
                <th>nama</th>
                <th>kelas</th>
                <th>paket</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($siswa as $row): ?>
            <tr>
                <td><?= $no ?></td>
                <td>K00<?= $row["id"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["kelas"]; ?></td>
                <td><?= $row["paket"]; ?></td>

            </tr>
            <?php $no ++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>



        <h2>daftar kelas</h2>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>no</th>
                <th>kode</th>
                <th>kelas</th>
                <th>harga</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($kelas as $row): ?>
            <tr>
                <td><?= $nok ?></td>
                <td><?= $row["kode"]; ?></td>
                <td><?= $row["kelas"]; ?></td>
                <td>Rp.<?= $row["harga"]; ?></td>   
            </tr>
            <?php $nok ++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>