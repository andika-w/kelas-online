<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}
require '../pages/function.php';

$id = $_GET["id"];
$ssw = query("SELECT * FROM siswa WHERE id = $id")[0];
$idkelas = $ssw['id_kelas'];
$kls = query("SELECT * FROM kelas WHERE id = $idkelas")[0];

if ($ssw['paket'] == "1 tahun") {
    $paket = 1 ;
} if ($ssw['paket'] == "2 tahun"){
    $paket = 2;
} if ($ssw['paket'] == "3 tahun"){
    $paket = 3;
}

$totharga = $kls['harga'] * $paket ;


if (isset($_POST["submit"])) {
    
    if (bayar($_POST) > 0) {
        echo "
        <script>
        alert('pembayaran berhasil')
        document.location.href= 'bayar.php'
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
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <h3>proses pembayaran</h3>
            <input type="hidden" name="id" value="<?= $ssw["id"]; ?>">
            <ul>
                <li>
                    <label for="kode">kode :</label>
                    <input type="text" name="kode" id="kode" readonly value="<?= $ssw["kode"]; ?>">
                </li>
                <li>
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" readonly value="<?= $ssw["nama"]; ?>">
                </li>
                <li>
                    <label for="kelas">kelas :</label>
                    <input type="text" name="kelas" id="kelas" readonly value="<?= $kls["nama_kelas"]; ?>">
                </li>
                <li>
                    <label for="paket">paket :</label>
                    <input type="text" name="paket" id="paket" readonly value="<?= $ssw["paket"]; ?>">
                </li>
                <li>
                    <label for="harga">harga : Rp.</label>
                    <input type="text" name="harga" id="harga" readonly value="<?= $totharga; ?>">
                </li>
                <li>
                    <label for="bayar">bayar : Rp.</label>
                    <input type="number" min="100000" max="<?= $kls["harga"]; ?>;" name="bayar" id="bayar">
                </li>
        </ul>
        <button type="submit" name="submit">bayar</button>
    </form>
    <br>
    <a href="bayar.php">kembali</a>
</body>

</html>
