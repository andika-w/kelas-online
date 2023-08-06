<?php 
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: user/halaman_user.php");
}
require 'function.php';

$id = $_GET["id"];


    if( hapus($id) > 0){
        echo "
        <script>
            alert('data berhasil di hapus')
            document.location.href= 'indeks.php'
        </script>
        ";
        } else {
            echo mysqli_error($conn);
        }
    ?>