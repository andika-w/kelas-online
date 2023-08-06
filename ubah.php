<?php
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}
require 'function.php';

$id = $_GET["id"];

$ssw = query("SELECT * FROM siswa WHERE id = $id")[0];
$id_kelas = $ssw['id_kelas'];
$kls = query("SELECT * FROM kelas WHERE id = $id_kelas")[0];


if (isset($_POST["submit"])) {
    
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil di ubah')
        document.location.href= 'indeks.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal di ubah')
        document.location.href= 'indeks.php'
        </script>
        ";
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
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" required value="<?= $ssw["nama"]; ?>">
                </li>
                <li>    
                    <label for="kelas_siswa">kelas :</label>
                    <select name="kelas_siswa" id="kelas_siswa">
                        <option value="1"<?php if ($kls['nama_kelas'] == "inggris") { echo 'selected'; }?>>inggris</option>
                        <option value="3"<?php if ($kls['nama_kelas'] == "matematika") { echo 'selected'; }?>>matematika</option>
                        <option value="4"<?php if ($kls['nama_kelas'] == "sejarah") { echo 'selected'; }?>>sejarah</option>
                        <option value="5"<?php if ($kls['nama_kelas'] == "kikmia") { echo 'selected'; }?>>kimia</option>
                        <option value="6"<?php if ($kls['nama_kelas'] == "fisika") { echo 'selected'; }?>>fisika</option>
                        <option value="7"<?php if ($kls['nama_kelas'] == "geografi") { echo 'selected'; }?>>geografi</option>
                        <option value="8"<?php if ($kls['nama_kelas'] == "ekonomi") { echo 'selected'; }?>>ekonomi</option>
                        <option value="9"<?php if ($kls['nama_kelas'] == "seni") { echo 'selected'; }?>>seni</option>
                    </select>
                </li>
                <li>
                    <label for="paket">paket :</label>
                    <select name="paket" id="paket">
                        <option <?php if ($ssw['paket'] == "1 tahun") { echo 'selected'; }?>>1 tahun</option>
                        <option <?php if ($ssw['paket'] == "2 tahun") { echo 'selected'; }?>>2 tahun</option>
                        <option <?php if ($ssw['paket'] == "3 tahun") { echo 'selected'; }?>>3 tahun</option>
                    </select>
                </li>
        </ul>
        <button type="submit" name="submit">ubah</button>
    </form>
    <br>
    <a href="indeks.php">kembali</a>
</body>

</html>

