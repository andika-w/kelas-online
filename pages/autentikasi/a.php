<?php
require '../function.php';

if (isset($_POST["register"])) {

    if (regis($_POST) > 0) {
        echo "
            <script>
                alert('berhasil registrasi user')
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
    <title>Document</title>
</head>

<body>
    <h2>registrasi</h2>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">konfirrmasi password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
            <label for="status">status :</label>
                    <select name="status" id="status">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                    </select>
            </li>
            <li>
                <button type="submit" name="register">
                    registrasi
                </button>
            </li>
        </ul>
    </form>
</body>

</html>
