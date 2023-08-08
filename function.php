<?php

$conn = mysqli_connect("localhost","root","","kelas_online");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result))
    $rows[] = $row;
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT * FROM siswa
            WHERE
            nama LIKE '%$keyword%' OR
            kode LIKE '%$keyword%'
            ";
    return query($query);

}

function tambah($data){
    global $conn;
    $id_kelas = htmlspecialchars($data["kelas"]);
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $paket = htmlspecialchars($data["paket"]);


    $query = "INSERT INTO siswa VALUES ('','$id_kelas','$kode','$nama','$paket')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
    
}


function tambah_kelas($data){
    global $conn;
    $kode = htmlspecialchars($data["kode"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $harga = htmlspecialchars($data["harga"]);


    $query = "INSERT INTO kelas VALUES ('','$kode','$kelas','$harga') ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
    
}

function ubah($data){
    global $conn;
    
    $id =$data["id"];
    $id_kelas = htmlspecialchars($data["kelas_siswa"]);
    $nama = htmlspecialchars($data["nama"]);
    $paket = htmlspecialchars($data["paket"]);
    $query = "UPDATE siswa SET
                id_kelas = '$id_kelas',
                nama = '$nama',
                paket = '$paket'
                WHERE id = $id
            ";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id =$data["id"];
    $kelas = htmlspecialchars($data["kelas"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE kelas SET
                nama_kelas = '$kelas',
                harga = '$harga'
                WHERE id = $id
            ";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
}

function hapus($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id  = $id");

return mysqli_affected_rows($conn);
}

function hapus_kelas($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE id = $id");

return mysqli_affected_rows($conn);
}


function regis($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $passwordtes = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $status = mysqli_real_escape_string($conn, $data["status"]);


    if ($passwordtes !== $password2) {
        echo "  
        <script>
        alert('konfirmasi password salah ');
        </script>";
        return false;
    }



    $password = md5($passwordtes);

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$status')");
    return mysqli_affected_rows($conn);
}

function bayar($data){
    global $conn;
    
    $nama = htmlspecialchars($data["nama"]);
    $kode = htmlspecialchars($data["kode"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $paket = htmlspecialchars($data["paket"]);
    $harga = htmlspecialchars($data["harga"]);
    $bayar = htmlspecialchars($data["bayar"]);

    if ($harga == $bayar) {
        $status = "lunas";
    } elseif ($harga > $bayar) {
        $status = "proses";
    }

    $query = "INSERT INTO transaksi VALUES ('','$kode','$nama','$kelas','$paket','$harga','$bayar','$status')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
    
}

