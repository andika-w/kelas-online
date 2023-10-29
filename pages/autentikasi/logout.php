<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "
<script>
    alert('berhasil logout')
    document.location.href= 'login.php'
</script>
";

header("location:login.php");
exit;

?>

