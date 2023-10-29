<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: ../user/halaman_user.php");
}
require '../function.php';
$no = 1;
$kelas = query("SELECT * FROM kelas");
?>

<!DOCTYPE html>
<html lang="en">
<heads>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kelas online</title>
</heads>
<body>
    <a href="../logout.php">logout</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>no</th>
                <th>kode</th>
                <th>kelas</th>
                <th>harga</th>
                <th>aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($kelas as $row): ?>
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
        <a href="tambah_kelas.php">tambah kelas</a>
        <a href="../indeks.php">kembali</a>
</body>
</html>