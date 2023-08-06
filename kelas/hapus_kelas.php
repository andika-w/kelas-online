<?php 
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
} elseif ($_SESSION['level'] == "user") {
    header("Location: ../user/halaman_user.php");
}
require '../function.php';

$id = $_GET["id"];


    if( hapus_kelas($id) > 0){
        echo "
        <script>
            alert('berhasil di hapus')
            document.location.href= 'kelas.php'
        </script>
        ";
        } else {
            echo "
        <script>
            alert('gagal di hapus')
            document.location.href= 'kelas.php'
    </script>
        ";
        }
