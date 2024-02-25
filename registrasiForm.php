<?php

require './koneksi.php';

if(isset($_POST['registrasi'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $insert = mysqli_query($c, "INSERT INTO user (username, password, email, level) VALUES ('$username','$password','$email','$level')");

    if($insert){
        echo '
        <script>alert("Berhasil registrasi");
        window.location.href="./login.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah user baru");
        window.location.href="./daftar.php"
        </script>
        ';
    }
}

?>