<?php

require '../koneksi.php';

if(isset($_POST['tambahuser'])){
    $username = $_POST['NamaUser'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $level = $_POST['level'];

    $insert = mysqli_query($c, "INSERT INTO user (username, password, email, level) VALUES ('$username','$password','$email','$level')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah user baru");
        window.location.href="../user.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah user baru");
        window.location.href="../user.php"
        </script>
        ';
    }
}

?>