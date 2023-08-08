<?php

session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}

require '../function.php';
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
                <th>total</th>
                <th>status</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                foreach ($siswa as $row):
                    $kode = $row["kode"];
                    $cek = mysqli_query($conn, "SELECT * FROM transaksi WHERE kode_siswa = '$kode'");
                    if (mysqli_num_rows($cek) > 0) {
                        $status = "lunas";
                    } else {
                        $status = "proses";
                    }
            ?>
                        <tr>
                        <td><?=$no?></td>
                        <td>K00<?=$row["id"];?></td>
                        <td><?=$row["nama"];?></td>
                        <td><?=$row["paket"];?></td>
                            <?php
                            $id_kelas = $row['id_kelas'];
                            $kelas = query("SELECT nama_kelas, harga from kelas where id =  $id_kelas");
                            foreach ($kelas as $rowkelas):
                            ?>
                        <td><?=$rowkelas["nama_kelas"];?></td>
                        <?php

                        if ($row['paket'] == "1 tahun") {
                            $paket = 1 ;
                        } if ($row['paket'] == "2 tahun"){
                            $paket = 2;
                        } if ($row['paket'] == "3 tahun"){
                            $paket = 3;
                        }
                        $harga = $rowkelas['harga'] * $paket;
                        ?>
                        <td><?= $harga ?></td>
                            <?php endforeach;?>
                        <td><?= $status?></td>
                        <td>
                            <?php
                            if($status == "lunas"){
                            echo "selesai";
                            } if($status == "proses"){
                            echo '<a href="proses.php?id=' . $row["id"] . '">bayar</a>';
                            }
                            ?>
                    </td>
                </tr>
                <?php $no++;?>
                <?php endforeach;?>

        </tbody>
    </table>
    <a href="../indeks.php">balik</a>
</body>

</html>