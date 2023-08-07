<?php

session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}

require 'function.php';


$no = 1;
$siswa = query("SELECT * FROM siswa");


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

<a href="logout.php">logout</a>
    
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
                <th>aksi</th>
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
                    <a href="ubah.php?id=<?= $row["id"];?>">edit</a>
                    <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('hapus?');">hapus</a>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php $no ++; ?>
            </tbody>
        </table>
        <ul>
            <li><a href="tambah.php">tambah siswa</a></li>
            <li><a href="kelas/kelas.php">kelas</a></li>
            <li><a href="pembayaran/bayar.php">pembayaran</a></li>
        </ul>
</body>
</html>